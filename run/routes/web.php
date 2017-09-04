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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [
    'uses' => 'PostController@index',
    'as' => 'home',
    'middleware' => 'auth'
]);

Route::post('/post', [
    'uses' => 'PostController@store',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::put('/edit', [
    'uses' => 'PostController@edit',
    'as' => 'post.edit'
]);

// ruta harcodeada, va recibir un id de usuario
Route::get('/profile', function () {
    return view('profile');
});
