@extends ('app')
@include('admin.navbar')
@section('content')
<h1>{!! $category->name !!}</h1><br>
<p>url:{!! $category->url !!}</p>          
<p>subscibtion:{!! $category->subscibtion !!}</p>          
<p>published:{!! $category->published ? 'опубликовано':'не опубликовано' !!}</p>          
<p>published_at:{!! $category->published_at !!}</p>          
 <a href="/admin/categories/{!! $category->id !!}/edit">Редактировать</a>    
@stop