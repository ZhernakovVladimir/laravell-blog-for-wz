@extends('user.app')

@section('content')
	<h1>Список статей с тегом <b>{!! $tag->name !!}</b></h1><br>
	@unless($articles->isEmpty())
		<ul>
			@foreach($articles as $article)
				<li><a href="/{!! $article->category->url !!}/{!! $article->url !!}">{!! $article->name !!}</a></li>
			@endforeach()
		</ul>
	@else <h3>К сожалению нет статей с таким тегом</h3>
	@endif
@stop