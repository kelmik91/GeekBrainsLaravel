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

Route::get('/welcomeUser', 'WelcomeController@index');

Route::match(['get', 'post'], '/feedback', 'FeedbackController@index')
    ->name('feedback');

/**
 * Вывод новостей
 */
Route::group([
    'prefix' => 'news'
], function () {
Route::get('/', 'NewsController@index')
    ->name('n');

Route::get('/{id}', 'NewsController@newsCategory')
    ->name('newsCategory');

Route::get('/{category}/{id}', 'NewsController@newsCard')
    ->name('newsCard')
    ->where('id', '[0-9]+');
});

Route::get('/auth', 'AuthController@index');

/**
 * Админка новостей
 */
Route::group([
    'prefix' => 'admin/news',
    'namespace' => 'Admin',
    'as' => 'admin::news::'
], function(){
    $controller = 'NewsController';
    Route::get('/', "{$controller}@index")
        ->name('index');

    Route::get('/create', 'NewsController@create')
        ->name('create');

    Route::get('/update', 'NewsController@update')
        ->name('update');

});
