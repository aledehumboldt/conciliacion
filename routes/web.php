<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExclusioneController;
use App\Http\Controllers\BypassController;
use App\Http\Controllers\ProvisioningController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/bypass/create', [BypassController::class, 'create'])->name('bypass.create');

Route::post('/bypass/create', [BypassController::class, 'store'])->name('bypass.store');

Route::post('/exclusiones/query', [ExclusioneController::class, 'query'])->name('exclusiones.query');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('provisioning', ProvisioningController::class);
    Route::resource('password', ResetController::class);
});