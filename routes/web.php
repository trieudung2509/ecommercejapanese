<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['adminLogin', 'web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'Admin\LoginController@postLogin')->name('admin.postLogin');

Route::group(['middleware' => ['adminLogin', 'web']], function () {
Route::group(['prefix' => 'admin'], function() {
    Route::get('/','Admin\HomeController@index')->name('admin.index');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::group(['prefix' => 'cate_product'], function() {

        Route::get('/', 'Admin\CateProductController@index')->name('admin.cate_product.index');

        Route::get('/create', 'Admin\CateProductController@create')->name('admin.cate_product.create');

        Route::post('/create', 'Admin\CateProductController@postCreate')->name('admin.cate_product.createPost');

        Route::get('/update/{id}', 'Admin\CateProductController@update')->name('admin.cate_product.update');

        Route::post('/update/{id}', 'Admin\CateProductController@postUpdate')->name('admin.cate_product.postUpdate');

        Route::get('/destroy/{id}', 'Admin\CateProductController@destroy')->name('admin.cate_product.destroy');

        Route::post('/status', 'Admin\CateProductController@status')->name('admin.cate_product.status');

    });
    Route::group(['prefix' => 'users'], function() {
        Route::get('/list','Admin\UserController@index')->name('admin.users.list');

        Route::get('/create','Admin\UserController@create')->name('admin.users.create');

        Route::post('/create','Admin\UserController@postCreate')->name('admin.users.createUser');

        Route::get('/update/{id}', 'Admin\UserController@update')->name('admin.users.update');

        Route::post('/update/{id}', 'Admin\UserController@postUpdate')->name('admin.users.postUpdate');

        Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('admin.users.destroy');

        Route::post('/status', 'Admin\UserController@status')->name('admin.users.status');
        
        Route::get('/profile','Admin\UserController@profile')->name('admin.users.profile');
    });

    Route::group(['prefix' => 'cate_post'], function() {
        Route::get('/list','Admin\CatePostController@index')->name('admin.cate_post.list');

        Route::get('/create','Admin\CatePostController@create')->name('admin.cate_post.create');

        Route::post('/create','Admin\CatePostController@postCreate')->name('admin.cate_post.postCreate');

        Route::get('/update/{id}', 'Admin\CatePostController@update')->name('admin.cate_post.update');

        Route::post('/update/{id}', 'Admin\CatePostController@postUpdate')->name('admin.cate_post.postUpdate');

        Route::get('/destroy/{id}', 'Admin\CatePostController@destroy')->name('admin.cate_post.destroy');

        Route::post('/status', 'Admin\CatePostController@status')->name('admin.cate_post.status');
    });

    Route::group(['prefix' => 'post'], function() {
        Route::get('/list','Admin\PostController@index')->name('admin.post.list');

        Route::get('/create','Admin\PostController@create')->name('admin.post.create');

        Route::post('/create','Admin\PostController@postCreate')->name('admin.post.postCreate');

        Route::get('/update/{id}', 'Admin\PostController@update')->name('admin.post.update');

        Route::post('/update/{id}', 'Admin\PostController@postUpdate')->name('admin.post.postUpdate');

        Route::get('/destroy/{id}', 'Admin\PostController@destroy')->name('admin.post.destroy');

        Route::post('/status', 'Admin\PostController@status')->name('admin.post.status');
    });
    Route::get('setting', 'Admin\SettingController@index')->name('admin.setting');

    Route::post('setting/update', 'Admin\SettingController@update')->name('admin.setting.update');
    });
});
