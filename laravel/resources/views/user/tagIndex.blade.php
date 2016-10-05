@extends('user.app')

@section('content')
<h1>Список тегов</h1><br>
<ul>
@foreach($tags as $tag)
	<li><a href="/tags/{!! $tag->url !!}">{!! $tag->name !!}</a></li>
@endforeach()
</ul>


@stop
