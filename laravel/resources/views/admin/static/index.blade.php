@extends ('app')
@include('admin.navbar')
@section('content')
		<form method="post" action="/admin/static">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label for="about_published">Отображать страницу "О нас"</label>
				<input type="hidden" name="about_published" value="0">
				<input type="checkbox" name="about_published" value="1" {{ $static_pages['about'] ? 'checked' : ''}}>
			</div>
			<div class="form-group">
				<label for="content_published">Отображать страницу "Контакты"</label>
				<input type="hidden" name="contact_published" value="0">
				<input type="checkbox" name="contact_published" value="1" {{ $static_pages['contact'] ? 'checked' : ''}}>
			</div>			
			<div class="form-group">		
				<input type="submit" value="Сохранить изменения" class="btn btn-primary">
			</div>
		</form>
		@if(isset($message))
			<ul class="alert alert-success">
				<li>{!! $message !!}</li>
			</ul>
		@endif
@stop