<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\RedirectResponse;
use App\Article;
use App\Tag;
use App\Category;

class AdminArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::All();
    	return view('admin.articles.index',compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show',compact('article'));
    }

    public function create()
    {
        $tags = Tag::lists('name','id');
        $categories = Category::lists('name', 'id');
    	return view('admin.articles.create',compact('tags','categories'));
    }


    public function store(CreateArticleRequest $request)
    {
        $input = $request->All();
        $article = Article::Create($input);
        $tag_list = $request->input('tags');
        $article->tags()->attach(isset($tag_list)?$tag_list:[]);
        return redirect('admin/articles/');
    }

    public function edit($id)
    {
        $tags = Tag::lists('name','id');
        $categories = Category::lists('name', 'id');
    	$article = Article::FindOrFail($id);
    	return view('admin.articles.edit' , compact('article','tags','categories'));
    }

    public function update($id , UpdateArticleRequest $request)
    {
        
        $article = Article::FindOrFail($id);
        $article->update($request->All());
        $tag_list = $request->input('tags');
        $article->tags()->sync(isset($tag_list)?$tag_list:[]);
        return redirect('admin/articles/' . $id);
    }

    public function destroy($id)
    {
        $article = Article::FindOrFail($id);
        $article->delete();
        return redirect('admin/articles/');        
    }
}
