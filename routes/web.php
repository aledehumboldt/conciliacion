<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\BypasMinController;
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

//------------------------------------------Incidencias---------------------------------------------
Route::get('incidencias', [IncidenciaController::class, 'index'])->name('incidencias.index');

Route::get('incidencias/create', [IncidenciaController::class, 'create'])->name('incidencias.create');

Route::get('incidencias/show', [IncidenciaController::class, 'show'])->name('incidencias.show');

Route::post('incidencias/{id}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('incidencias/{id}/edit', [IncidenciaController::class, 'edit'])->name('incidencias.edit');

Route::put('incidencias/{id}', [IncidenciaController::class, 'update'])->name('incidencias.update');

Route::delete('incidencias/{id}', [IncidenciaController::class, 'destroy'])->name('incidencias.destroy');

Route::get('incidencias/export', [IncidenciaController::class, 'export'])->name('incidencias.export');
//--------------------------------------------------Fin Incidencias--------------------------------

//-------------------------------------------------Bypass MIN------------------------------------------------
Route::get('bypass/bypassMin/consultar', [BypasMinController::class, 'show'])->name('bypass.bypassMin.show');

Route::post('bypass/bypassMin/store', [BypasMinController::class, 'store'])->name('bypass.bypassMin.store');

Route::get('bypass/bypassMin/crear', [BypasMinController::class, 'create'])->name('bypass.bypassMin.create');

Route::get('bypass/bypassMin/editar/{id}', [BypasMinController::class, 'edit'])->name('bypass.bypassMin.edit');

Route::delete('bypass/bypassMin/{id}', [BypasMinController::class, 'destroy'])->name('bypass.bypassMin.destroy');

Route::delete('bypass/bypassMin/consultar/{id}', [BypasMinController::class, 'destroy'])->name('bypass.bypassMin.destroy');

Route::put('bypass/bypassMin/{id}', [BypasMinController::class, 'update'])->name('bypass.bypassMin.update');

Route::get('bypass/bypassMin/', [BypasMinController::class, 'index'])->name('bypass.bypassMin.index');

Route::post('bypass/bypassMin/store', [IncidenciaController::class, 'store'])->name('bypass.bypassMin.store-incidenciaincluir');

Route::post('bypass/bypassMin/{id}', [IncidenciaController::class, 'store'])->name('bypass.bypassMin.store-incidencia');

//-------------------------------------------------Fin Bypass MIN------------------------------------------------

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('provisioning', ProvisioningController::class);
    Route::resource('password', ResetController::class);
    //Route::resource('incidencias', IncidenciaController::class);
    Route::resource('bypass', bypasController::class);
    Route::resource('contactar', ContactarController::class);
});