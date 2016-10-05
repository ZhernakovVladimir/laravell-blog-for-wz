@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Редактирование статьи</h1>

			{!! Form::model($article,['url'=>'/admin/articles/'.$article->id,'method'=>'PATCH']) !!}	
			<div class="form-group">
				{!! Form::label('name','Название') !!}
				{!! Form::text('name', null,['class'=>'form-control'] )!!}
	
			</div>
			<div class="form-group">
				{!! Form::label('url','URL') !!}
				{!! Form::text('url',null,['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('subscibtion','Описание') !!}
				{!! Form::textarea('subscibtion',null,['class'=>'form-control']) !!}

			</div>
			<div class="form-group">
				{!! Form::label('category_id','Категория') !!}
				{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
			</div>			
			<div class="form-group">
				{!! Form::label('tags','Ассоциированные тэги') !!}

				{!! Form::select('tags[]' , $tags , $article->tags()->lists('tags1.id')->toArray() , ['class'=>'form-control','id'=>'tagselect','multiple']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('published','Опубликовано') !!}
				{!! Form::hidden('published','0') !!}
				{!! Form::checkbox('published','1',true) !!}
			</div>

			<div class="form-group">
				{!! Form::label('published_at','Дата публикации') !!}
				{!! Form::date('published_at', Carbon\Carbon::now(),['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('anons','Анонс статьи') !!}
				{!! Form::textarea('anons', null,['class'=>'form-control']) !!}
			</div>



			<div class="form-group">		
				{!! Form::submit('Сохранить изменения', ['class'=>'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}

		{!! Form::open([
						'url'=>'/admin/articles/' . $article->id ,
						'method'=>'DELETE',
						'onsubmit'=>'return confirm(\'Удалить этот тэг?\');'	
					   ] ) !!}
		{!! Form::submit('Удалить статью', ['class'=>'btn btn-primary']) !!}
		{!! Form::close() !!}

		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
				@endforeach
			</ul>
		@endif
@stop

@section('footer')
<script type="text/javascript">
  $('#tagselect').select2();
</script>
@stop