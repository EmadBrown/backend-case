<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  
Route::get('/news' , 'Api\NewsApiController@index');
   
Route::middleware('auth:api')->group( function () {
    
    Route::post('/grade/{studentNumber}' , 'Api\GradeApiController@index');
    
});

 