<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//-------------------------MEDICINE------------------------//


Route::get('/medicine',[MedicineController::class,'index'])->name('medicine')->middleware(['auth:admin']);
Route::controller(MedicineController::class)->middleware(['auth:admin'])->group(function(){
    Route::get('medicine/create','create')->name('medicine.create');
    Route::post('medicine/store','store')->name('medicine.store');
    Route::get('medicine/edit/{id}','edit')->name('medicine.edit');
    Route::put('medicine/update/{id}','update')->name('medicine.update');
    Route::get('medicine/show/{id}','show')->name('medicine.show');
    Route::delete('medicine/destroy/{id}','destroy')->name('medicine.destroy');
    Route::get('medicine/editPrice/{id}','editPrice')->name('medicine.editPrice');
    Route::post('medicine/updatePrice/{id}','updatePrice')->name('medicine.updatePrice');
});



//-------------------------ADMIN------------------------//


Route::get('/index', [AdminController::class, 'index'])->name('index')->middleware(['auth:admin']);
Route::get('/register', [AdminController::class, 'register'])->name('register')->middleware(['auth:admin']);
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/store', [AdminController::class, 'store'])->name('store')->middleware(['auth:admin']);
Route::post('/save', [AdminController::class, 'save'])->name('save');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout')->middleware(['auth:admin']);



//-------------------------UPDATE------------------------//


Route::get('/update',[UpdateController::class,'index'])->name('update')->middleware(['auth:admin']);
Route::controller(UpdateController::class)->middleware(['auth:admin'])->group(function(){
    Route::get('update/create','create')->name('update.create');
    Route::post('update/store','store')->name('update.store');
    Route::get('update/edit/{id}','edit')->name('update.edit');
    Route::post('update/update/{id}','update')->name('update.update');
    Route::get('update/show/{id}','show')->name('update.show');
    Route::delete('update/destroy/{id}','destroy')->name('update.destroy');
});




//-------------------------USER------------------------//


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/activate/{id}', [UserController::class, 'activate'])->name('user.activate');
    Route::get('/user/deactivate/{id}', [UserController::class, 'deactivate'])->name('user.deactivate');
});