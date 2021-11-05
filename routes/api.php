<?php

use App\Http\Controllers\passportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[passportAuthController::class,'registerUser']);
Route::post('login',[passportAuthController::class,'loginUser']);
//add this middleware to ensure that every request is authenticated
Route::middleware('auth:api')->group(function(){
    Route::get('user', [passportAuthController::class,'authenticatedUserDetails']);
});


