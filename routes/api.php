<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authen;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\JobOrdesController;
use App\Http\Controllers\menu;
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

Route::get('menuList',[PermissionController::class,'menuFor']);

Route::get('listofMenu',[menu::class,'index_menu']);

// customers
Route::post('SaveCus',[CustomersController::class,'store']);
Route::post('DeleteCus',[CustomersController::class,'Delete']);
Route::post('ModifyCus',[CustomersController::class,'update']);
Route::get('LoadCus',[CustomersController::class,'LoadCus']);

// Devices
Route::post('SaveDevice',[DevicesController::class,'store']);
Route::post('ModifyDevice',[DevicesController::class,'update']);
Route::get('ShowDevices',[DevicesController::class,'show']);
Route::get('ShowCustomerDevice',[DevicesController::class,'showSpecific']);

// JO
Route::post('SaveJO',[JobOrdesController::class,'store']);
Route::post('ModifyJO',[JobOrdesController::class,'update']);
Route::get('getJONumber',[JobOrdesController::class,'showSpecific']);
Route::get('getJO',[JobOrdesController::class,'show']);