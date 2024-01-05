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

Route::get('incidencias/consultar', [IncidenciaController::class, 'show'])->name('incidencias.show');

Route::get('incidencias/store', [IncidenciaController::class, 'create'])->name('incidencias.create');

Route::get('incidencias/editar/{id}', [IncidenciaController::class, 'edit'])->name('incidencias.edit');

Route::put('incidencias/editar/{id}', [IncidenciaController::class, 'update'])->name('incidencias.update');

Route::post('incidencias/crear/{id}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::delete('incidencias/{id}', [IncidenciaController::class, 'destroy'])->name('incidencias.destroy');

Route::get('incidencias', [IncidenciaController::class, 'index'])->name('incidencias.index');

Route::get('bypass/bypassMin/consultar', [BypasMinController::class, 'show'])->name('bypass.bypassMin.show');

Route::post('bypass/bypassMin/store', [BypasMinController::class, 'store'])->name('bypass.bypassMin.store');

Route::get('bypass/bypassMin/crear', [BypasMinController::class, 'create'])->name('bypass.bypassMin.create');

Route::delete('bypass/bypassMin/{id}', [BypasMinController::class, 'destroy'])->name('bypass.bypassMin.destroy');

Route::delete('bypass/bypassMin/consultar/{id}', [BypasMinController::class, 'destroy'])->name('bypass.bypassMin.destroy');

Route::get('bypass/bypassMin', [BypasMinController::class, 'index'])->name('bypass.bypassMin.index');

Route::post('bypass/bypassMin/{id}', [IncidenciaController::class, 'store'])->name('bypass.bypassMin.store-incidencia');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('provisioning', ProvisioningController::class);
    Route::resource('password', ResetController::class);
    //Route::resource('incidencias', IncidenciaController::class);
    Route::resource('bypass', bypasController::class);
    Route::resource('contactar', ContactarController::class);
});