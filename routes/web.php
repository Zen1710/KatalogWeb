<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FotoDenahController;
use App\Http\Controllers\FotoPropertiController;
use App\Http\Controllers\UserController;
use App\Models\FotoDenah;
use App\Models\FotoProperti;
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

// Route::get('/login', function () {
//     return view('auth.login')->name('login');
// });
Route::get('login',[AuthController::class,'login'])->name('login');

Route::post('login-post',[AuthController::class,'postlogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('/', [LandingPageController::class, 'index']);
Route::get('property', [LandingPageController::class, 'property']);
Route::get('property/detail/{id}', [LandingPageController::class, 'property_details']);
Route::get('about', [LandingPageController::class, 'about']);
Route::get('contact_us', [LandingPageController::class, 'contact_us']);
Route::get('faq', [LandingPageController::class, 'faq']);
Route::post('buat-tiket', [TiketController::class, 'store']);
Route::post('kirimulasan/{id}', [LandingPageController::class, 'ulasan']);

Route::middleware('auth')->group(function () {  
Route::get('admin/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::resource('admin/mitra',MitraController::class);
Route::get('admin/mitra/{id}/delete', [MitraController::class, 'destroy']);

Route::resource('admin/agen',AgentController::class);
Route::get('admin/agen/{id}/delete', [AgentController::class, 'destroy']);

Route::resource('admin/property',PropertiController::class);
Route::post('admin/property/status',[PropertiController::class,'status']);
Route::get('admin/property/{id}/delete', [PropertiController::class, 'destroy']);

Route::resource('admin/foto_denahs',FotoDenahController::class);
Route::get('admin/foto_denah/{properti}', [FotoDenahController::class, 'index_properti']);
Route::get('admin/foto_denah/create/{properti}', [FotoDenahController::class, 'create_properti']);
Route::get('admin/foto_denahs/{id}/delete', [FotoDenahController::class, 'destroy']);


Route::resource('admin/foto_propertis',FotoPropertiController::class);
Route::get('admin/foto_properti/{properti}', [FotoPropertiController::class, 'index_properti']);
Route::get('admin/foto_properti/create/{properti}', [FotoPropertiController::class, 'create_properti']);
Route::get('admin/foto_propertis/{id}/delete', [FotoPropertiController::class, 'destroy']);


Route::get('admin/user',[UserController::class,'index']);
Route::post('admin/user',[UserController::class,'store']);
Route::post('admin/user/{id}',[UserController::class,'update']);
Route::get('admin/user/{id}',[UserController::class,'destroy']);

Route::resource('admin/faq',FaqController::class);
Route::get('admin/faq/{id}/delete', [FaqController::class, 'destroy']);

Route::resource('admin/tiket',TiketController::class);
Route::get('admin/tiket/{id}/delete', [TiketController::class, 'destroy']);

Route::resource('admin/about',AboutController::class);
});