@extends ('app')
@include('admin.navbar')
@section('content')
<h1>{!! $article->name !!}</h1><br>
<p>url: {!! $article->url !!}</p>   
<p>subscibtion:{!! $article->subscribtion !!}</p>   
<p>category:{!! $article->category->name !!}</p>          
<p>published:{!! $article->published ? 'опубликовано':'не опубликовано' !!}</p>
<p>published_at: {!! $article->published_at !!}</p>
<p>Associated tags: {!! $article->tags()->lists('name')->implode(', ') !!}</p>
<p>Anons: {!! $article->anons !!} </p>                  
 <a href="/admin/articles/{!! $article->id !!}/edit">Редактировать</a>    
@stop
