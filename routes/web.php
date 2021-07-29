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
Route::get('/feedback/create', 'FeedbackController@create')
    ->name('feedbackCreate');
Route::post('/feedback/create', 'FeedbackController@create')
    ->middleware('feedBack.validate');

Route::get('/user', 'DataBase\UserController@index')
    ->name('user');

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
    'as' => 'admin::news::',
    'middleware' => ['auth', 'admin.verify']
], function(){
    Route::get('/', "NewsController@index")
        ->name('index');

    Route::get('/create', 'NewsController@create')
        ->name('create');

    Route::post('/create', 'NewsController@create')
        ->middleware('news.create.validate')
        ->name('create');

    Route::get('/update', 'NewsController@update')
        ->name('update');

    Route::post('/update', 'NewsController@update')
        ->middleware('news.update.validate')
        ->name('update');

    Route::get('/delete/{id}', 'NewsController@delete')
        ->name('delete');

});

/**
 * Админка пользователей
 */
Route::group([
    'prefix' => 'admin/users',
    'namespace' => 'Admin',
    'as' => 'admin::users::',
    'middleware' => 'admin.verify'
], function(){
    Route::get('/', "UsersController@index")
        ->name('index');

    Route::get('/update', 'UsersController@update')
        ->name('update');

    Route::post('/update', 'UsersController@update')
        ->middleware('users.validate')
        ->name('update');

    Route::get('/delete/{id}', 'UsersController@delete')
        ->name('delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Авторизация через Vk
 */
Route::group([
    'prefix' => 'social',
    'as' => 'social::'
], function () {
    Route::get('/loginvk', 'SocialController@loginVk')
        ->name('loginVk');

    Route::get('/responsevk', 'SocialController@responseVk')
        ->name('responseVk');
});

/**
 * Авторизация через Fb
 */
Route::group([
    'prefix' => 'social',
    'as' => 'social::'
], function () {
    Route::get('/loginfb', 'SocialController@loginFb')
        ->name('loginFb');

    Route::get('/responsefb', 'SocialController@responseFb')
        ->name('responsefb');
});
