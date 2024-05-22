<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
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
Route::get('logout',[AuthController::class,'logout']);
Route::get('/', [LandingPageController::class, 'index']);
Route::get('property', [LandingPageController::class, 'property']);
Route::get('about', [LandingPageController::class, 'about']);
Route::get('contact_us', [LandingPageController::class, 'contact_us']);

Route::get('admin/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::resource('admin/mitra',MitraController::class);
Route::resource('admin/agen',AgentController::class);
Route::resource('admin/property',PropertiController::class);
Route::resource('admin/faq',FaqController::class);
Route::resource('admin/tiket',TiketController::class);
Route::resource('admin/property',PropertiController::class);
Route::resource('admin/about',AboutController::class);