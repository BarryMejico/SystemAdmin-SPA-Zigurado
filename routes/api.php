<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/Authenticated', function () {
    return true;
});

Route::post('register',[Authen::class,'register']);
Route::post('login',[Authen::class,'login']);
Route::post('logout',[Authen::class,'logout']);
Route::get('thatProfile',[Authen::class,'profile_code']);

 
