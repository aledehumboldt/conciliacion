<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\Bypass\BypasMinController;
use App\Http\Controllers\Bypass\BypasImsiController;
use App\Http\Controllers\Bypass\BypasWhitelistController;
use App\Http\Controllers\Bypass\BypassController;
use App\Http\Controllers\Bypass\BypassAmbosController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExclusioneController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ContactarController;
use App\Http\Controllers\ProvisioningController;
use App\Http\Controllers\AprovisionamientosController;
use App\Http\Controllers\minMasivoController;
use App\Http\Controllers\imsiMasivoController;
use App\Http\Controllers\ambosMasivoController;
use App\Http\Controllers\proofController;
use App\Http\Controllers\whitelistMasivoController;
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
Route::get('documentacion', [ProvisioningController::class, 'index'])->name('documentacion.index');

Route::post('documentacion', [ProvisioningController::class, 'storeFile'])->name('storeFile');

Route::get('storage/{name}', [ProvisioningController::class, 'downloadFile'])->name('download');

Route::post('documentacion/1', [ProvisioningController::class, 'storeCategory'])->name('storeCategory');

//-------------------------------------------------Fin Almacenamiento de archivos------------------------------------------------

//---------------------------------------------------Incidencias------------------------------------

Route::get('incidencias/export', [IncidenciaController::class, 'export'])->name('incidencias.export');

Route::post('incidencias/{incidencia}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('incidencias/destroy/{id}/', [IncidenciaController::class, 'destroy']);

//--------------------------------------------------Fin Incidencias--------------------------------

//-------------------------------------------------Bypass MIN------------------------------------------------
Route::get('bypassMin', [BypasMinController::class, 'index'])->name('bypassMin.index');

Route::get('bypassMin/show', [BypasMinController::class, 'show'])->name('bypassMin.show');

Route::post('bypassMin', [BypasMinController::class, 'store'])->name('bypassMin.store');

Route::post('bypassMin/{id}', [BypasMinController::class, 'destroy'])->name('bypassMin.destroy');

Route::put('bypassMin/{id}', [BypasMinController::class, 'update'])->name('bypassMin.update');

Route::get('bypassMin/create', [BypasMinController::class, 'create'])->name('bypassMin.create');

Route::get('bypassMin/import', [BypasMinController::class, 'import'])->name('bypassMin.import');
//-------------------------------------------------Fin BypassMIN-----------------------------------------------

//-------------------------------------------------Bypass MIN Masivo-------------------------------------------
Route::get('minMasivo', [minMasivoController::class, 'index'])->name('minMasivo.index');

Route::post('minMasivo/import', [minMasivoController::class, 'import'])->name('minMasivo.import');
//-------------------------------------------------Fin Bypass MIN Masivo---------------------------------------

//-------------------------------------------------Bypass imsi Masivo-----------------------------------------
Route::get('imsiMasivo', [imsiMasivoController::class, 'index'])->name('imsiMasivo.index');

Route::post('imsiMasivo/import', [imsiMasivoController::class, 'import'])->name('imsiMasivo.import');
//-------------------------------------------------Fin Bypass imsi Masivo-------------------------------

//-------------------------------------------------Bypass ambos Masivo-----------------------------------------
Route::get('ambosMasivo', [ambosMasivoController::class, 'index'])->name('ambosMasivo.index');

Route::post('ambosMasivo/import', [ambosMasivoController::class, 'import'])->name('ambosMasivo.import');
//-------------------------------------------------Fin Bypass ambos Masivo-------------------------------

//-------------------------------------------------Bypass Whitelist Masivo-------------------------------------
Route::get('whitelistMasivo', [whitelistMasivoController::class, 'index'])->name('whitelistMasivo.index');

Route::post('whitelistMasivo/import', [whitelistMasivoController::class, 'import'])->name('whitelistMasivo.import');
//-------------------------------------------------Fin Bypass Whitelist Masivo---------------------------------

//-------------------------------------------------Bypass IMSI------------------------------------------------
Route::get('bypassImsi', [BypasImsiController::class, 'index'])->name('bypassImsi.index');

Route::get('bypassImsi/show', [BypasImsiController::class, 'show'])->name('bypassImsi.show');

Route::post('bypassImsi', [BypasImsiController::class, 'store'])->name('bypassImsi.store');

Route::post('bypassImsi/{id}', [BypasImsiController::class, 'destroy'])->name('bypassImsi.destroy');

Route::put('bypassImsi/{id}', [BypasImsiController::class, 'update'])->name('bypassImsi.update');

Route::get('bypassImsi/create', [BypasImsiController::class, 'create'])->name('bypassImsi.create');
//-------------------------------------------------Fin Bypass IMSI---------------------------------------------

//-------------------------------------------------Bypass Whitelist--------------------------------------------
Route::get('bypassWhitelist', [BypasWhitelistController::class, 'index'])->name('bypassWhitelist.index');

Route::get('bypassWhitelist/show', [BypasWhitelistController::class, 'show'])->name('bypassWhitelist.show');

Route::post('bypassWhitelist', [BypasWhitelistController::class, 'store'])->name('bypassWhitelist.store');

Route::post('bypassWhitelist/{id}', [BypasWhitelistController::class, 'destroy'])->name('bypassWhitelist.destroy');

Route::put('bypassWhitelist/{id}', [BypasWhitelistController::class, 'update'])->name('bypassWhitelist.update');

Route::get('bypassWhitelist/create', [BypasWhitelistController::class, 'create'])->name('bypassWhitelist.create');
//-------------------------------------------------Fin Bypass Whitelist------------------------------------------------

//-------------------------------------------------Bypass Ambos------------------------------------------------
Route::get('bypassAmbos/create', [BypassAmbosController::class, 'create'])->name('bypassAmbos.create');

Route::post('bypassAmbos', [BypassAmbosController::class, 'store'])->name('bypassAmbos.store');

Route::post('bypassAmbos/{id}', [BypasWhitelistController::class, 'destroy'])->name('bypassAmbos.destroy');
//-------------------------------------------------Fin Bypass Ambos------------------------------------------------

//-------------------------------------------------Aprovisionamientos------------------------------------------------
Route::get('aprovisionamientos', [AprovisionamientosController::class, 'index'])->name('aprovisionamientos');

Route::get('aprovisionamientos/conexion', [AprovisionamientosController::class, 'conexion'])->name('aprovisionamientos.conexion');

Route::get('aprovisionamientos/desconexion', [AprovisionamientosController::class, 'desconexion'])->name('aprovisionamientos.desconexion');
//-------------------------------------------------Fin Aprovisionamientos------------------------------------------------

//------------------------------------------------Proof-----------------------------------------------
Route::get('proof', [proofController::class, 'index'])->name('proof');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('password', ResetController::class);
    Route::resource('incidencias', IncidenciaController::class)->except(['show','store','destroy']);
    Route::resource('bypass', BypassController::class);
    Route::resource('contactar', ContactarController::class);
});