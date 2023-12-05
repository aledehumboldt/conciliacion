<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExclusioneController;
use App\Http\Controllers\AprovController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetController;
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

Route::get('/aprov/usuarios/reset', [ResetController::class, 'index'])->name('password.change');

Route::patch('/aprov/usuarios/reset', [ResetController::class, 'update'])->name('password.update');

Route::get('/aprov/usuarios/restablecer/{id}', [ResetController::class, 'edit'])->name('password.reset');

Route::resource('exclusiones/usuarios', ExclusioneController::class)->middleware(Authenticate::class);

Route::get('aprov/documentos', [AprovController::class,'docs'])->name('docs')->middleware(Authenticate::class);

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('exclusiones/', [ExclusioneController::class, 'show'])->name('exclusiones.show');

Route::post('exclusiones/', [ExclusioneController::class, 'storage'])->name('exclusiones.storage');