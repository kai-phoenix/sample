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
    return redirect()->route('posts.index');
});
Route::resource('users', 'UserController')->only([
  'create', 'store','edit', 'update'
]);
Route::resource('posts', 'PostController')->except([
  'show',
]);
Route::get('/login', 'SessionController@create')->name('session.create');
Route::post('/login', 'SessionController@store')->name('session.store');
Route::delete('/logout', 'SessionController@destroy')->name('session.destroy');