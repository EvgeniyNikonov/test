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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'HomeController@index')->name('home');

    /**
     * Пользователи
     */
    Route::resource('users', 'Users\UserController');

    /**
     * Товары
     */
    Route::resource('products', 'Products\ProductController');

});
