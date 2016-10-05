<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{

	public function articles()
	{
		return $this->hasMany('App\Article');
	}


	protected $fillable = [
		        'name',
           		'url',
		        'subscibtion',
		        'published',
		        'published_at',
	];

	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	public function scopeIsPublished($query)
	{
		return $query->where('published','=','1')->where('published_at','<=', Carbon::now());
	}

	protected $table = 'Categories';
    //
}
