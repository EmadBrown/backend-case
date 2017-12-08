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
    return view('pages.news');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// route Web NewsController for normal user
Route::get('news' , 'Web\NewsController@index');

// route Web NewsController for normal user
Route::get('news' , 'Web\NewsController@index');

// Admin Routes
Route::prefix('admin')->group(function(){
Route::get('/', 'Admin|AdminController@index')->name('admin.dashboard');
Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
});