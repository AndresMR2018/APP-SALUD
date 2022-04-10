<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NutricionistaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// ============================= RUTAS PUBLICAS ============================ //

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contactanos',[HomeController::class,'contactanos'])->name('home.contactanos');
Route::get('/nosotros',[HomeController::class, 'nosotros'])->name('home.nosotros');
Route::post('/contactar',[HomeController::class, 'contactar'])->name('home.contactar');

Route::post('/login2',[LoginController::class,'login'])->name('login2');

// ============================= RUTAS PARA ADMINISTRADOR GLOBAL ============================ //
Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
Route::resource('administrador',AdminController::class);
Route::resource('paciente',PacienteController::class);

Route::get('/login-administrador',[LoginController::class,'loginAdmin'])->name('login.administrador');

Route::get('/paciente/eliminar/{id}',[PacienteController::class,'eliminarPaciente'])->name('paciente.eliminar');
Route::get('/paciente/datos-antropometricos',[PacienteController::class,'datosAntropometricos'])->name('paciente.datosAntropometricos');
Route::post('/paciente/datos-antropometricos',[PacienteController::class,'guardarDatosAntropometricos'])->name('paciente.guardarDatosAntropometricos');
Route::post('/paciente/actualizar',[PacienteController::class,'actualizarPaciente'])->name('paciente.actualizar');


// Route::get('/create',[AdminController::class,'create'])->name('administracion.create');
Route::get('/listado',[AdminController::class,'listar'])->name('administrador.listar');
// Route::post('/update',[AdminController::class,'update'])->name('administracion.update');
Route::get('/',[AdminController::class,'dashboard'])->name('administrador.dashboard');

// Route::post('/guardar',[AdminController::class,'store'])->name('administracion.store');

// Route::get('/listado/pacientes',[AdminController::class,'listarPacientes'])->name('administrador.indexPaciente');
Route::post('/registrar',[RegController::class,'registrarAdmin'])->name('administrador.registrar');
Route::resource('nutricionista',NutricionistaController::class);
});


// ================================== RUTAS PARA NUTRICIONISTAS ============================ //
Route::group(['prefix' => 'nutricionista', 'middleware'=>'nutri'], function () {
    Route::get('/',[NutricionistaController::class,'dashboard'])->name('nutricionista.dashboard');
    Route::post('/login-nutricionista',[LoginController::class,'loginPaciente'])->name('login.nutricionista');
   });

// ============================= RUTAS PARA CLIENTES ============================ //
Route::group(['middleware'=>'paciente'], function () {
    Route::get('/perfil',[ClienteController::class,'dashboard'])->name('cliente.dashboard');
    Route::get('/mi-cuenta',[ClienteController::class,'miCuenta'])->name('cliente.cuenta');
    Route::post('/login-paciente',[LoginController::class,'loginPaciente'])->name('login.paciente');
   });



