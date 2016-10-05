<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    //
    protected $table = 'StaticPages';
    protected $fillable = [
    	'name','published'	
    ];
}
