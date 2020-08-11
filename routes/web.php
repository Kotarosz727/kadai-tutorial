<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('posts');
});
Route::resource('posts', 'PostController')->except('edit', 'update', 'destory');
Auth::routes();
Route::post('/comments', 'CommentController@store');

