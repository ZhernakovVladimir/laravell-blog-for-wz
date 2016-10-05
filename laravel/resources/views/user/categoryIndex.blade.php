@extends('user.app')

@section('content')
<h1>Список статей категории {!! $category->name !!}</h1><br>

@unless($articles->isEmpty())
	<ul>
	@foreach($articles as $article)
		<li><a href="/{!! $category->url !!}/{!! $article->url !!}">{!! $article->name !!}</a></li>
	@endforeach()
	</ul>
@else
	<h3>К сожалению статей в данной категории не обнаружено</h3>
@endif	
{!! $articles->render() !!}
@stop
