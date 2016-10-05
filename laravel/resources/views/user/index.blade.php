@extends('user.app')
@section('content')
<h1>Список категорий</h1>
<ul>
	@foreach($categories as $category)
		<li><a href="/{!! $category->url !!}"><h2>{!! $category->name !!}</h2></a>
			<ul>
				<li>
					<p>{!! $category->subscibtion !!}</p>
				</li>
			</ul>
		</li>
	@endforeach()
</ul>

@stop