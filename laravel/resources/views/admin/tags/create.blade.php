@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Создание тега</h1>

		<form method="post" action="/admin/tags">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="name">Название</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="url">URL</label>
				<input type="text" name="url" class="form-control">
			</div>
			<div class="form-group">
				<label for="published">Опубликовано</label>
				<input type="hidden" name="published" value="0">
				<input type="checkbox" name="published" value="1" checked>
			</div>
			<div class="form-group">		
				<input type="submit" value="Создать тег" class="btn btn-primary">
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
