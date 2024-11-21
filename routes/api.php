<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//-------------------------USER------------------------//


Route::post('/register/email', [UserController::class, 'emailRegister']);

Route::post('/login/email', [UserController::class, 'emailLogin'])->middleware('activated');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/medicines', [ApiController::class, 'medicines']);

Route::get('/updates', [ApiController::class, 'updates']);

Route::get('/search', [ApiController::class, 'search'])->middleware(['auth:sanctum','activated']);
