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

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', function () {return view('admin/index');})->name('admin.index');

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
    
        Route::post('/create','Admin\UserController@createUser')->name('admin.users.createUser');

        Route::get('/update/{id}', 'Admin\UserController@update')->name('admin.users.update');

        Route::post('/update/{id}', 'Admin\UserController@postUpdate')->name('admin.users.postUpdate');
    
        Route::get('/destroy/{id}', 'Admin\UserController@destroy')->name('admin.users.destroy');
    
        Route::post('/status', 'Admin\UserController@status')->name('admin.users.status');
    });
    Route::get('setting', 'Admin\SettingController@index')->name('admin.setting');

    Route::post('setting/update', 'Admin\SettingController@update')->name('admin.setting.update');

});
