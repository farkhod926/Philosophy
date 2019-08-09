<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/','HomeController@index')->name('main');
Route::get('/about','HomeController@about')->name('about');
Route::get('/post/{slug}','HomeController@single')->name('single');
Route::post('/comment','HomeController@store');
Route::get('/category/{slug}','HomeController@category')->name('category.show');
Route::get('/tag/{slug}','HomeController@tag')->name('tag.show');
Route::post('/email','HomeController@email')->name('emails');
Route::get('/search','LiveSearch@index')->name('live.search');



 Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function(){
       Route::get('/', 'DashboardController@index'); 
       Route::resource('/tags', 'TagsController');
       Route::resource('/categories','CategoriesController');
       Route::resource('/posts','PostsController');
       Route::resource('/about','AboutController');
       Route::resource('/comments','CommentsController');
       Route::get('comments/toggle/{id}','CommentsController@toggle')->name('status');
       Route::get('/profile/settings/','ProfileController@show')->name('profile.show');
       Route::get('/profile/settings/edit/','ProfileController@edit')->name('profile.edit');

   });

