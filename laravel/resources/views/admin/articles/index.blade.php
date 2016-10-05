@extends ('app')
@include('admin.navbar')
@section('content')
	<h1>Список статей</h1>
	<ul>
		@foreach($articles as $article)
			<li>
				<div>
					<a href="/admin/articles/{!! $article->id !!}">{!! $article->name !!}</a><br>
				</div>
			</li>
		@endforeach
	</ul>
@stop