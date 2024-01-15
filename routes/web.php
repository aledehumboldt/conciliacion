<?php

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
use App\Http\Controllers\AlmacenamientoarchivoController;
use App\Http\Controllers\AprovisionamientosController;

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

//-------------------------------------------------Almacenamiento de archivos------------------------------------------------
Route::get('documentacion', [AlmacenamientoarchivoController::class, 'index'])->name('documentacion.index');

//Route::get('documentacion', [AlmacenamientoarchivoController::class, 'loadView'])->name('subirArchivo');

Route::post('documentacion', [AlmacenamientoarchivoController::class, 'storeFile'])->name('storeFile');

Route::get('documentacion/descargar/{name}', [AlmacenamientoarchivoController::class, 'downloadFile'])->name('download');

//-------------------------------------------------Fin Almacenamiento de archivos------------------------------------------------

//---------------------------------------------------Incidencias------------------------------------
Route::get('incidencias/show', [IncidenciaController::class, 'show'])->name('incidencias.show');

Route::post('incidencias/{incidencia}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('incidencias/export', [IncidenciaController::class, 'export'])->name('incidencias.export');
//--------------------------------------------------Fin Incidencias--------------------------------

//-------------------------------------------------Bypass MIN------------------------------------------------
Route::get('bypassMin', [BypasMinController::class, 'index'])->name('bypassMin.index');

Route::get('bypassMin/show', [BypasMinController::class, 'show'])->name('bypassMin.show');

Route::post('bypassMin', [BypasMinController::class, 'store'])->name('bypassMin.store');

Route::post('bypassMin/{id}', [BypasMinController::class, 'destroy'])->name('bypassMin.destroy');

Route::put('bypassMin/{id}', [BypasMinController::class, 'update'])->name('bypassMin.update');
//-------------------------------------------------Fin Bypass MIN------------------------------------------------

//-------------------------------------------------Bypass IMSI------------------------------------------------
Route::get('bypassImsi', [BypasImsiController::class, 'index'])->name('bypassImsi.index');

Route::get('bypassImsi/show', [BypasImsiController::class, 'show'])->name('bypassImsi.show');

Route::post('bypassImsi', [BypasImsiController::class, 'store'])->name('bypassImsi.store');

Route::post('bypassImsi/{id}', [BypasImsiController::class, 'destroy'])->name('bypassImsi.destroy');

Route::put('bypassImsi/{id}', [BypasImsiController::class, 'update'])->name('bypassImsi.update');
//-------------------------------------------------Fin Bypass IMSI------------------------------------------------

//-------------------------------------------------Bypass Whitelist------------------------------------------------
Route::get('bypassWhitelist', [BypasWhitelistController::class, 'index'])->name('bypassWhitelist.index');

Route::get('bypassWhitelist/show', [BypasWhitelistController::class, 'show'])->name('bypassWhitelist.show');

Route::post('bypassWhitelist', [BypasWhitelistController::class, 'store'])->name('bypassWhitelist.store');

Route::post('bypassWhitelist/{id}', [BypasWhitelistController::class, 'destroy'])->name('bypassWhitelist.destroy');

Route::put('bypassWhitelist/{id}', [BypasWhitelistController::class, 'update'])->name('bypassWhitelist.update');
//-------------------------------------------------Fin Bypass Whitelist------------------------------------------------

//-------------------------------------------------Aprovisionamientos------------------------------------------------
Route::get('aprovisionamientos', [AprovisionamientosController::class, 'index'])->name('aprovisionamientos');

Route::get('aprovisionamientos/conexion', [AprovisionamientosController::class, 'conexion'])->name('aprovisionamientos.conexion');

Route::get('aprovisionamientos/desconexion', [AprovisionamientosController::class, 'desconexion'])->name('aprovisionamientos.desconexion');
//-------------------------------------------------Fin Aprovisionamientos------------------------------------------------

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('provisioning', ProvisioningController::class);
    Route::resource('password', ResetController::class);
    Route::resource('incidencias', IncidenciaController::class)->except(['show','store']);
    Route::resource('bypass', bypasController::class);
    Route::resource('contactar', ContactarController::class);
});