@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Список категорий</h1>
	<ul>
		@foreach($categories as $category)
			<li>
				<div>
					<a href="/admin/categories/{!! $category->id !!}">{!! $category->name !!}</a><br>
				</div>
			</li>
		@endforeach
	</ul>
@stop