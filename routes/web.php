<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\Bypass\MinController;
use App\Http\Controllers\Bypass\ImsiController;
use App\Http\Controllers\Bypass\WhitelistController;
use App\Http\Controllers\Bypass\BypassController;
use App\Http\Controllers\Bypass\AmbosController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExclusioneController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ContactarController;
use App\Http\Controllers\ProvisioningController;
use App\Http\Controllers\AprovisionamientoController;
use App\Http\Controllers\Masivo_bypass\MinController as MasivoMin;
use App\Http\Controllers\Masivo_bypass\ImsiController as MasivoImsi;
use App\Http\Controllers\Masivo_bypass\AmbosController as MasivoAmbos;
use App\Http\Controllers\Masivo_bypass\WhitelistController as MasivoWhitelist;

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
Route::get('incidencias/show', [IncidenciaController::class, 'show'])->name('incidencias.show');

Route::post('incidencias/{incidencia}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('incidencias/filtro', [IncidenciaController::class, 'filtro'])->name('incidencias.filtro');

Route::get('incidencias/export', [IncidenciaController::class, 'export'])->name('incidencias.export');
//--------------------------------------------------Fin Incidencias--------------------------------

//-------------------------------------------------Bypass MIN------------------------------------------------
Route::get('bypassMin', [MinController::class, 'index'])->name('bypassMin.index');

Route::get('bypassMin/show', [MinController::class, 'show'])->name('bypassMin.show');

Route::post('bypassMin', [MinController::class, 'store'])->name('bypassMin.store');

Route::post('bypassMin/{id}', [MinController::class, 'destroy'])->name('bypassMin.destroy');

Route::put('bypassMin/{id}', [MinController::class, 'update'])->name('bypassMin.update');

Route::get('bypassMin/create', [MinController::class, 'create'])->name('bypassMin.create');

Route::get('bypassMin/import', [MinController::class, 'import'])->name('bypassMin.import');
//-------------------------------------------------Fin BypassMIN-----------------------------------------------

//-------------------------------------------------Bypass Masivo-------------------------------------------
Route::get('minMasivo', [MasivoMin::class, 'index'])->name('minMasivo.index');

Route::post('minMasivo/import', [MasivoMin::class, 'import'])->name('minMasivo.import');

Route::get('imsiMasivo', [MasivoImsi::class, 'index'])->name('imsiMasivo.index');

Route::post('imsiMasivo/import', [MasivoImsi::class, 'import'])->name('imsiMasivo.import');

Route::get('ambosMasivo', [MasivoAmbos::class, 'index'])->name('ambosMasivo.index');

Route::post('ambosMasivo/import', [MasivoAmbos::class, 'import'])->name('ambosMasivo.import');

Route::get('whitelistMasivo', [MasivoWhitelist::class, 'index'])->name('whitelistMasivo.index');

Route::post('whitelistMasivo/import', [MasivoWhitelist::class, 'import'])->name('whitelistMasivo.import');
//-------------------------------------------------Fin Bypass Masivo---------------------------------

//-------------------------------------------------Bypass IMSI------------------------------------------------
Route::get('bypassImsi', [ImsiController::class, 'index'])->name('bypassImsi.index');

Route::get('bypassImsi/show', [ImsiController::class, 'show'])->name('bypassImsi.show');

Route::post('bypassImsi', [ImsiController::class, 'store'])->name('bypassImsi.store');

Route::post('bypassImsi/{id}', [ImsiController::class, 'destroy'])->name('bypassImsi.destroy');

Route::put('bypassImsi/{id}', [ImsiController::class, 'update'])->name('bypassImsi.update');

Route::get('bypassImsi/create', [ImsiController::class, 'create'])->name('bypassImsi.create');
//-------------------------------------------------Fin Bypass IMSI---------------------------------------------

//-------------------------------------------------Bypass Whitelist--------------------------------------------
Route::get('bypassWhitelist', [WhitelistController::class, 'index'])->name('bypassWhitelist.index');

Route::get('bypassWhitelist/show', [WhitelistController::class, 'show'])->name('bypassWhitelist.show');

Route::post('bypassWhitelist', [WhitelistController::class, 'store'])->name('bypassWhitelist.store');

Route::post('bypassWhitelist/{id}', [WhitelistController::class, 'destroy'])->name('bypassWhitelist.destroy');

Route::put('bypassWhitelist/{id}', [WhitelistController::class, 'update'])->name('bypassWhitelist.update');

Route::get('bypassWhitelist/create', [WhitelistController::class, 'create'])->name('bypassWhitelist.create');
//-------------------------------------------------Fin Bypass Whitelist------------------------------------------------

//-------------------------------------------------Bypass Ambos------------------------------------------------
Route::get('bypassAmbos/create', [AmbosController::class, 'create'])->name('bypassAmbos.create');

Route::post('bypassAmbos', [AmbosController::class, 'store'])->name('bypassAmbos.store');

Route::post('bypassAmbos/{id}', [WhitelistController::class, 'destroy'])->name('bypassAmbos.destroy');
//-------------------------------------------------Fin Bypass Ambos------------------------------------------------

//-------------------------------------------------Aprovisionamientos------------------------------------------------
Route::get('aprovisionamientos', [AprovisionamientoController::class, 'index'])->name('aprovisionamientos');

Route::get('aprovisionamientos/conexion', [AprovisionamientoController::class, 'conexion'])->name('aprovisionamientos.conexion');

Route::get('aprovisionamientos/desconexion', [AprovisionamientoController::class, 'desconexion'])->name('aprovisionamientos.desconexion');
//-------------------------------------------------Fin Aprovisionamientos------------------------------------------------

//------------------------------------------------Proof-----------------------------------------------
//Route::get('proof', '[]')->name('proof');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('password', ResetController::class);
    Route::resource('incidencias', IncidenciaController::class)->except(['show','store']);
    Route::resource('bypass', BypassController::class);
    Route::resource('contactar', ContactarController::class);
});