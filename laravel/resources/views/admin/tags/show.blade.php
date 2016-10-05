@extends ('app')
@include('admin.navbar')
@section('content')
<h1>{!! $tag->name !!}</h1><br>
<p>url:{!! $tag->url !!}</p>                
<p>published:{!! $tag->published ? 'опубликовано':'не опубликовано' !!}</p>                  
 <a href="/admin/tags/{!! $tag->id !!}/edit">Редактировать</a>    
@stop