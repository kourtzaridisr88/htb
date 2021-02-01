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

Route::apiResource('users', 'UserController')->except(['store'])->middleware(['auth:api']);
Route::get('users/{user}/teleports', 'UserTeleportsController')->middleware(['auth:api']);
Route::put('users/{user}/dimensions/{dimensionID}' ,'UserDimensionsController')->middleware(['auth:api']);
Route::apiResource('dimensions', 'DimensionController')->middleware(['auth:api']);
Route::get('dimensions/{dimension}/users', 'DimensionUsersController')->middleware(['auth:api']);

Route::post('users', 'RegisterController');
Route::post('auth/login', 'LoginController');