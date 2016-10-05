@extends('user.app')

@section('content')
<h1>Список анонсируемых статей </h1><br>

@unless($articles->isEmpty())
	<ul>
	@foreach($articles as $article)
		<li>
			<ul>
				<li>{!! $article->name !!}</li>
				<ul><li>{!! $article->anons !!}</li></ul>
				
			</ul>
			
		</li>
	@endforeach()
	</ul>
@else
	<h3>Нет анонсируемых статей</h3>
@endif	

@stop
