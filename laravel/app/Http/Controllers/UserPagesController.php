<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Article;
use App\Tag;
use App\Comment;
use App\Http\Requests\ContactFeedbackFormRequest;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class UserPagesController extends Controller
{
    public function index()
    {
    	$categories = Category::isPublished()->get();
    	return view('user.index',compact('categories'));
    }

    public function showArticle($category_url,$article_url)
    {    
    	$category = Category::where('url','=', $category_url)->isPublished()->firstOrFail();
    	$article = $category->articles()->where('url','=',$article_url)
                                        ->isPublishedByTag()
                                        ->isPublished()
                                        ->firstOrFail();
        $comments = $article->comments()->get();
    	return view('user.showArticle',compact('article','comments'));
    }

    public function storeComment($category_url,$article_url, CommentRequest $request)
    {
        if(Auth::check())
        {
            $category = Category::where('url','=', $category_url)->isPublished()->firstOrFail();
            $article = $category->articles()->where('url','=',$article_url)
                                            ->isPublishedByTag()
                                            ->isPublished()
                                            ->firstOrFail();
            $comment = new Comment($request->all());
            $article->comments()->save($comment);
        }    

        return redirect('/' . $category->url . '/' .$article->url);
    }

    public function categoryIndex($category_url)
    {
    	$category = Category::where('url','=',$category_url)->isPublished()->firstOrFail();
    	$articles = $category->articles()->isPublishedByTag()->isPublished()->paginate(2);
    	return view('user.categoryIndex',compact('category','articles'));
    }



    public function tagIndex()
    {
    	$tags = Tag::isPublished()->get();
    	return view('user.tagIndex',compact('tags'));
    }

    public function tagArticleIndex($tag_url)
    {
    	$tag = Tag::isPublished()->where('url' , '=' , $tag_url)->firstOrFail();
    	$articles = $tag->articles()->isPublishedByCategory()->isPublished()->get();

    	return view('user.tagArticleIndex',compact('tag','articles'));
    }

    public function about()
    {
        return view('user.about');
    }    

    public function contact(Request $request)
    {
        $message = $request->session()->get('message');
        return view('user.contact',compact('message'));
    }

    public function procContact(ContactFeedbackFormRequest $request)
    {
        
        $admin = \App\User::Where('name' , '=' , 'admin')->firstOrFail();
            mail($admin->email, null, $request->input('comment_text'),'mysite@example.com');
        return redirect('/contact')->with('message','письмо отправлено');
    }

    public function anonce()
    {
        $articles = Article::isAnonced()->
                             isPublishedByCategory()->
                             isPublishedByTag()->
                             isPublished()->get();
        return view('user.anonce ', compact('articles'));
    }
}




