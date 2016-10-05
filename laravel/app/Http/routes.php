<?php

//--------- Login - logout
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('register','Auth\AuthController@getRegister');
Route::post('register','Auth\AuthController@postRegister');



//-------------- Admin --------------
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{
	Route::get('/', 'AdminCategoriesController@index');
	Route::resource('categories', 'AdminCategoriesController');
	Route::resource('tags', 'AdminTagsController');
	Route::resource('articles', 'AdminArticlesController');
	Route::get('static', 'AdminStaticPagesController@index');
	Route::post('static', 'AdminStaticPagesController@saveSettings');
});	

//--------------- User ---------------

Route::get('/','UserPagesController@index');

			//-------Static Pages
Route::group(['middleware' => 'static'], function()
{
	Route::get('/about','UserPagesController@about');
	Route::get('/contact','UserPagesController@contact');
	Route::post('/contact','UserPagesController@procContact');
});


Route::get('/anonce','UserPagesController@anonce');
Route::get('/tags','UserPagesController@tagIndex');
Route::get('/tags/{tag_url}','UserPagesController@tagArticleIndex');
Route::get('{category_url}','UserPagesController@categoryIndex');
Route::get('{category_url}/{article_url}','UserPagesController@showArticle');
Route::post('{category_url}/{article_url}','UserPagesController@storeComment');




