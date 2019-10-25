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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homepage', 'PostController@index')->name('homepage');

Route::post('/homepage/addpost', 'PostController@add')->name('add');

Route::post('/homepage/{post_id}/addcomment', 'CommentController@add')->name('add_comment');

Route::get('/homepage/{post_id}/allcomments', 'PostController@getcomments')->name('get_comments');

Route::delete('/homepage/{post_id}/delete', 'PostController@delete')->name('delete');

Route::get('/homepage/{post_id}/edit', 'PostController@edit')->name('edit');

Route::put('/homepage/{post_id}/edit', 'PostController@editpost')->name('edit_post');

Route::get('/profile', 'PostController@profile')->name('profile');
