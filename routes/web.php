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

Route::redirect('/', '/posts');

Route::resource('posts', 'PostController');
Route::resource('tags', 'TagController');
/* Route::get('/posts/tag/{id}', 'MyController@tagPost') -> name('post.tag') ;
Route::post('/posts/tag/{id}', 'MyController@tagPostCreate') -> name('post.tag.create') ; */

Route::get("posts/{idP}/tag/{idT}" , "MyController@removeTagFromPost") -> name("remove.tag.post");