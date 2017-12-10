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

// Route  logout Normal user
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// route Web NewsController for normal user
Route::get('news' , 'Web\NewsController@index')->name('news');

 
// Admin Routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name  ('admin.login.submit');
    Route::get('/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');
    // Password reset routes
    Route::prefix('password')->group(function(){
        Route::post('/email', 'Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/reset', 'Admin\AdminResetPasswordController@reset');
        Route::get('/rest/{token}', 'Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    });
    
});

// CMS Admin routes
Route::middleware('auth:admin')->group( function () {
   Route::resource('/news' , 'Cms\NewsAdminController' );
   Route::resource('/grade' , 'Cms\GradeAdminController' );
});

