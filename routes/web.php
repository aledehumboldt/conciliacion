<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support;
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
use App\Http\Controllers\RtbController;
use App\Http\Controllers\Masivo_bypass\MinController as MasivoMin;
use App\Http\Controllers\Masivo_bypass\ImsiController as MasivoImsi;
use App\Http\Controllers\Masivo_bypass\AmbosController as MasivoAmbos;
use App\Http\Controllers\Masivo_bypass\WhitelistController as MasivoWhitelist;
use App\Http\Controllers\ImsiKiController;

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

Route::post('documentacion', [ProvisioningController::class, 'store'])->name('store');

Route::get('storage/{name}', [ProvisioningController::class, 'download'])->name('download');

Route::post('documentacion/1', [ProvisioningController::class, 'category'])->name('category');

//-------------------------------------------------Fin Almacenamiento de archivos------------------------------------------------

//---------------------------------------------------Incidencias------------------------------------

Route::get('incidencias/export', [IncidenciaController::class, 'export'])->name('incidencias.export');

Route::post('incidencias/{incidencia}', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('incidencias/destroy/{id}/', [IncidenciaController::class, 'destroy']);

//--------------------------------------------------Fin Incidencias--------------------------------

//-------------------------------------------------Bypass MIN------------------------------------------------
Route::get('bypassMin/show', [MinController::class, 'show'])->name('bypassMin.show');

Route::post('bypassMin/{id}', [MinController::class, 'destroy'])->name('bypassMin.destroy');

Route::get('bypassMin/import', [MinController::class, 'import'])->name('bypassMin.import');
//-------------------------------------------------Fin BypassMIN-----------------------------------------------

//-------------------------------------------------Bypass IMSI------------------------------------------------
Route::get('bypassImsi/show', [ImsiController::class, 'show'])->name('bypassImsi.show');

Route::post('bypassImsi/{id}', [ImsiController::class, 'destroy'])->name('bypassImsi.destroy');
//-------------------------------------------------Fin Bypass IMSI---------------------------------------------

//-------------------------------------------------Bypass Whitelist--------------------------------------------
Route::get('bypassWhitelist/show', [WhitelistController::class, 'show'])->name('bypassWhitelist.show');

Route::post('bypassWhitelist/{id}', [WhitelistController::class, 'destroy'])->name('bypassWhitelist.destroy');
//-------------------------------------------------Fin Bypass Whitelist------------------------------------------------

//-------------------------------------------------Bypass Ambos---------------------------------------
Route::get('bypassAmbos/create', [AmbosController::class, 'create'])->name('bypassAmbos.create');

Route::post('bypassAmbos', [AmbosController::class, 'store'])->name('bypassAmbos.store');

Route::post('bypassAmbos/{id}', [WhitelistController::class, 'destroy'])->name('bypassAmbos.destroy');
//-------------------------------------------------Fin Bypass Ambos-----------------------------------

//-------------------------------------------------Bypass Masivo-----------------------------------------
Route::get('minMasivo', [MasivoMin::class, 'index'])->name('minMasivo.index');

Route::post('minMasivo/import', [MasivoMin::class, 'import'])->name('minMasivo.import');

Route::post('minMasivo/download', [MasivoMin::class, 'download'])->name('minMasivo.download');

Route::get('imsiMasivo', [MasivoImsi::class, 'index'])->name('imsiMasivo.index');

Route::post('imsiMasivo/import', [MasivoImsi::class, 'import'])->name('imsiMasivo.import');

Route::post('imsiMasivo/download', [MasivoImsi::class, 'download'])->name('imsiMasivo.download');

Route::get('ambosMasivo', [MasivoAmbos::class, 'index'])->name('ambosMasivo.index');

Route::post('ambosMasivo/import', [MasivoAmbos::class, 'import'])->name('ambosMasivo.import');

Route::post('ambosMasivo/download', [MasivoImsi::class, 'download'])->name('ambosMasivo.download');

Route::get('whitelistMasivo', [MasivoWhitelist::class, 'index'])->name('whitelistMasivo.index');

Route::post('whitelistMasivo/import', [MasivoWhitelist::class, 'import'])->name('whitelistMasivo.import');
//-------------------------------------------------Fin Bypass Masivo---------------------------------------

//-------------------------------------------------Aprovisionamientos---------------------------------------------------------------------
Route::get('aprovisionamientos', [AprovisionamientoController::class, 'index'])->name('aprovisionamientos');

Route::get('aprovisionamientos/conexion', [AprovisionamientoController::class, 'conexion'])->name('aprovisionamientos.conexion');

Route::get('aprovisionamientos/desconexion', [AprovisionamientoController::class, 'desconexion'])->name('aprovisionamientos.desconexion');
//-------------------------------------------------Fin Aprovisionamientos------------------------------------------------------------------
//-------------------------------------------------KI Invisibles--------------------------------------------------------------------------
Route::get('invisibles_ki', [ImsiKiController::class, 'index'])->name('invisibles_ki');

Route::get('invisibles_ki/masivo', [ImsiKiController::class, 'masivo'])->name('invisibles_ki.masivo');

Route::get('invisibles_ki/individual', [ImsiKiController::class, 'individual'])->name('invisibles_ki.individual');

Route::get('invisibles_ki/{data?}', [ImsiKiController::class, 'data'])->name('invisibles_ki.data');

Route::get('/imsi_ki/{imsi_ki}/edit', [ImsiKiController::class, 'edit'])->name('imsi_ki.edit');

Route::delete('/imsi-kis/{id}', [ImsiKiController::class, 'destroy'])->name('imsi-kis.destroy');

Route::post('invisibles_ki', [ImsiKiController::class, 'store'])->name('invisibles_ki.store');

Route::get('invisibles_ki/create', [ImsiKiController::class, 'create'])->name('imsi_kis.create');

//-------------------------------------------------Fin KI Invisibles--------------------------------------------------------------------------

//------------------------------------------------Plataforma-RTB-----------------------------------------------

Route::get('plataformas/Rtb', [RtbController::class, 'index'])->name('rtb');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('exclusiones', ExclusioneController::class);
    Route::resource('password', ResetController::class);
    Route::resource('incidencias', IncidenciaController::class)->except(['show','store','destroy']);
    Route::resource('bypassMin', MinController::class)->except(['show','edit','destroy']);
    Route::resource('bypassImsi', ImsiController::class)->except(['show','edit','destroy']);
    Route::resource('bypassWhitelist', WhitelistController::class)->except(['show','edit','destroy']);
    Route::resource('bypass', BypassController::class);
    Route::resource('contactar', ContactarController::class);
});