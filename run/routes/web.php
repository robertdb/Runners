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

/******* Posts *************/
Route::get('/home', [
    'uses' => 'PostController@index',
    'as' => 'home',
    'middleware' => 'auth'
]);

Route::post('/posts', [
    'uses' => 'PostController@store',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::put('/posts/edit', [
    'uses' => 'PostController@edit',
    'as' => 'post.edit'
]);

Route::get('/posts/{post_id}/delete', [
    'uses' => 'PostController@delete',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

/******* Races *************/
Route::get('/races', [
    'uses' => 'RaceController@index',
    'as' => 'races',
    'middleware' => 'auth'
]);

Route::get('/races/{id}', [
    'uses' => 'RaceController@showRace',
    'as' => 'race',
    'middleware' => 'auth'
]);


/******* Profile *************/
// ruta harcodeada, va recibir un id de usuario
Route::get('/profile', function () {
    return view('profile');
});
