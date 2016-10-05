@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Создание категории</h1>

		<form method="post" action="/admin/categories">

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
				<label for="subscibtion">Описание</label>
				<textarea  rows="5" name="subscibtion" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="published_at">Дата публикации</label>
				<input type="date" name="published_at" class="form-control" value="{!! Carbon\Carbon::now()->format('Y-m-d') !!}"></input>	
			</div>
			<div class="form-group">		
				<input type="submit" value="Создать категоию" class="btn btn-primary">
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
