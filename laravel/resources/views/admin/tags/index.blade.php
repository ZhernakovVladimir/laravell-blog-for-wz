@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Список тегов</h1>
	<ul>
		@foreach($tags as $tag)
			<li>
				<div>
					<a href="/admin/tags/{!! $tag->id !!}">{!! $tag->name !!}</a><br>
				</div>
			</li>
		@endforeach
	</ul>
@stop