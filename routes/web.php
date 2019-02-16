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

// Route::get('/admin', function () {
//     return view('admin', [
//         'title' => 'Artikel 1'
//     ]);
// });

// Route::get('/test', function () {
//     return view('test', [
//         'title' => 'Artikel Test'
//     ]);
// });

// // Tambahan
// Route::get('/index', function () {
//     return view('article.index', [
//         'title' => 'Artikel Index'
//     ]);
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('article', 'ArticleController@index')->name('article.index')->middleware('auth');
// Route::get('article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
// Route::get('article/{id}/edit', 'ArticleController@edit')->name('article.edit')->middleware('auth');
// Route::post('article', 'ArticleController@store')->name('article.store')->middleware('auth');
// Route::put('article/{id}/edit', 'ArticleController@update')->name('article.update')->middleware('auth');
// Route::delete('article/{id}/delete', 'ArticleController@destroy')->name('article.delete')->middleware('auth');

Route::resource('article', 'ArticleController')->middleware('auth');