@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Редактирование тега</h1>

		<form method="post" action="/admin/tags/{!! $tag->id !!}">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group">
				<label for="name">Название</label>
				<input type="text" name="name" class="form-control" value="{!! $tag->name !!}">
			</div>
			<div class="form-group">

				<label for="url">URL</label>
				<input type="text" name="url" class="form-control" value="{!! $tag->url !!}">
			</div>
			<div class="form-group">
				<label for="published">Опубликовано</label>
				<input type="hidden" name="published" value="0">
				<input type="checkbox" name="published" value="1" {!! $tag->published ? 'checked' : '' !!}>
			
			<div class="form-group">		
				<input type="submit" value="Сохранить изменения" class="btn btn-primary">
			</div>
		</form>

		<form method="post" action="/admin/tags/{!! $tag->id !!}" onsubmit="return confirm('Удалить этот тэг?');">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_method" value="DELETE">
			<div class="form-group">		
				<input type="submit" value="Удалить" class="btn btn-primary" >
			</div>
		</form>
		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
				@endforeach
			</ul>
		@endif
@stop
