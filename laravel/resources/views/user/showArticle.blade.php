@extends('user.app')

@section('content')
	<h1>{!! $article->name !!}</h1><br>
	<p>url: {!! $article->url !!}</p>   
	<p>subscibtion:{!! $article->subscribtion !!}</p>   
	<p>category:{!! $article->category->name !!}</p>          
	<p>published:{!! $article->published ? 'опубликовано':'не опубликовано' !!}</p>
	<p>published_at: {!! $article->published_at !!}</p>
	<p>Associated tags: {!! $article->tags()->lists('name')->implode(', ') !!}</p>
	<hr>
@unless($comments->isEmpty())
	<h2>Комментарии к статье</h2><br>
	<ul>
		@foreach($comments as $comment)
			<li><p>{{ $comment->comment_text }}</p></li>
		@endforeach	
	</ul>	
	<hr>
@endif
@if(Auth::user())
	<h2>Добавить свой комментарий</h2>
	{!! Form::open(['url'=>'/'.$article->category->url.'/'.$article->url]) !!}	
					<div class="form-group">
						{!! Form::label('comment_text','текст комментария') !!}
						{!! Form::textarea('comment_text', null,['class'=>'form-control'] )!!}
			
					</div>
					<div class="form-group">		
						{!! Form::submit('Добавить комментарий', ['class'=>'btn btn-primary']) !!}
					</div>

	{!! Form::close() !!}	

				@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
					<li>{!! $error !!}</li>
					@endforeach
				</ul>
				@endif
@else
	<h2>Авторизируйтесь для добавления комментария</h2>
@endif				
@stop
