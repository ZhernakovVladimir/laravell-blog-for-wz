<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
	'name',
	'url' ,    
	'published'
	];
    protected $table = 'tags1';

    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }

    public function scopeIsPublished($query)
    {
    	return $query->where('published','=','1');
    }
}
