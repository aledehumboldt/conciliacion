<?php

use App\Models\Incidencia;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\BypasMinController;
use App\Http\Controllers\BypasImsiController;
use App\Http\Controllers\BypasWhitelistController;
use App\Http\Controllers\bypasController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExclusioneController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ProvisioningController;
use App\Http\Controllers\ContactarController;

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

Route::post('/exclusiones/query', [ExclusioneController::class, 'query'])->name('exclusiones.query');

//Route::get('pdf',[ReporteController::class, 'generar']);

//Route::get('/bypass', [bypasController::class, 'index'])->name('bypass.index');

Route::get('bypass/bypassMin', [BypasMinController::class, 'index'])->name('bypass.bypassMin.index');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('provisioning', ProvisioningController::class);
    Route::resource('password', ResetController::class);
    Route::resource('incidencias', IncidenciaController::class);
    Route::resource('bypass', bypasController::class);
    //Route::resource('/bypass/bypassMin', BypasMinController::class);
    Route::resource('bypass/bypassImsi', BypasImsiController::class);
    Route::resource('bypass/bypassWhitelist', BypasWhitelistController::class);
    Route::resource('contactar', ContactarController::class);
});