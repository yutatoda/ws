<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[\App\Http\Controllers\AuthController::class,'showRegister'])->name('register');
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
Route::get('/login',[\App\Http\Controllers\AuthController::class,'showLogin'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[\App\Http\Controllers\AuthController::class,'profile'])->name('profile');
    Route::get('/tasks',[\App\Http\Controllers\TaskController::class,'getAllTasks'])->name('tasks');

    Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('user.logout');
});