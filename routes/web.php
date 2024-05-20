<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
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

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('login-post',[AuthController::class,'postlogin']);
Route::get('admin/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/', function () {
        return view('page.landing_page');
    });

Route::resource('admin/mitra',MitraController::class);