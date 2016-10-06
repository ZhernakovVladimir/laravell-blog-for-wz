<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Tag;


class Article extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category')	;
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getTagListIdsAttribute()
    {
    	return $this->tags()->lists('id');
    }

    public function getTagListNamesAttribute()
    {
    	return $this->tags()->lists('name');
    }


    public function scopeIsPublishedByTag($query)
    {
      //$tag_ids = Tag::where('published','=','0')->lists('id');
        
      //  $unpublished_articles_id = DB::table('article_tag')->select('article_id')->whereIn('tag_id',$tag_ids)->lists('article_id');
        
        return  $query->whereNotIn('id', function($query){
                    $query->select('article_id')->from('article_tag')
                        ->whereIn('tag_id', function($query){
                            $query->select('id')->from('Tags1')->where('published','=','0');
                        });
                } );
    }

    public function scopeIsPublishedByCategory($query)
    {
        $unpublished_category_ids = DB::table('categories')->select('id')->where('published', '=' , '0')->lists('id');
        return $query->whereNotIn('category_id', $unpublished_category_ids);        
    }

    public function scopeIsAnonced($query)
    {
        return $query->where('published_at', '>' , Carbon::now());
    }
    
    public function scopeIsPublished($query)
    {
        return $query->where('published','=','1');
    } 

	protected $fillable = [
		        'name',// Название
           		'url',// URL
		        'subscibtion',// Описание
		        'published',// Публикация
		        'category_id',// ->Категория
		        'published_at',//Дата пубикации
		        'anons'// Анонс поста
	];

	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	//protected $table = 'articles';
    //
}
