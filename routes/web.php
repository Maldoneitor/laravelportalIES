<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\empresa;
use App\Http\Controllers\empresaControler;
use App\Http\Controllers\login;
use App\Http\Controllers\main;
use App\Http\Controllers\solicitudPracticasControler;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('registro', [login::class, "registro"])->name("registro");
Route::post('registroPost', [login::class, "registroPost"])->name("registroPost");
Route::post("login", [login::class, "loginPost"])->name("loginPost");
Route::get("login", [login::class, "login"])->name("login");
Route::get('loginJwt/{jwt}', [login::class, "loginJwt"])->name("loginJwt");
Route::get('datosRegistro', [empresaControler::class, "dataRegister"])->name("dataRegister")->middleware("auth");
Route::post('PostdatosRegistro', [empresaControler::class, "dataRegisterPost"])->name("dataRegisterPost")->middleware("auth");
Route::get('mainAdmin', [admin::class, "mainAdmin"])->name("mainAdmin");//->middleware("auth");
Route::get('crearEmpresa', [admin::class, "crearEmpresa"])->name("crearEmpresa")->middleware("auth");
Route::post('crearEmpresaPost', [admin::class, "crearEmpresaPost"])->name("crearEmpresaPost")->middleware("auth");
Route::get('autorizarEmpresa/{ids}', [admin::class, "autorizarEmpresa"])->name("autorizarEmpresa")->middleware("auth");
Route::get('correoEmpresa/{ids}', [admin::class, "correoEmpresa"])->name("correoEmpresa")->middleware("auth");
Route::get('eliminarEmpresa/{ids}', [admin::class, "eliminarEmpresa"])->name("eliminarEmpresa")->middleware("auth");
Route::get('mainEmpresa', [empresa::class, "mainEmpresa"])->name("mainEmpresa")->middleware("auth");
Route::get('verEmpresa/{ids}', [empresa::class, "verEmpresa"])->name("verEmpresa")->middleware("auth");
Route::get('editarEmpresa/{ids}', [empresa::class, "editarEmpresa"])->name("editarEmpresa")->middleware("auth");
Route::post('filtrar', [admin::class, "filtrar"])->name("filtrar")->middleware("auth");
Route::get('cerrar', [login::class, "cerrar"])->name("cerrar")->middleware("auth");
Route::post('UpdateDatosRegistro', [empresaControler::class, "UpdateDatosRegistro"])->name("UpdateDatosRegistro")->middleware("auth");
Route::post('editarEmpresaPost', [empresa::class, "editarEmpresaPost"])->name("editarEmpresaPost")->middleware("auth");
Route::post('enviarEmail', [admin::class, "enviarEmail"])->name("enviarEmail")->middleware("auth");
Route::get('editarEmpresaEmpresa/{ids}', [empresaControler::class, "editarEmpresaEmpresa"])->name("editarEmpresaEmpresa")->middleware("auth");
Route::get('crearTutor', [empresaControler::class, "crearTutor"])->name("crearTutor")->middleware("auth");
Route::post('crearTutor', [empresaControler::class, "crearTutorPost"])->name("crearTutorPost")->middleware("auth");
Route::get('eliminarTutor/{ids}', [empresaControler::class, "eliminarTutor"])->name("eliminarTutor")->middleware("auth");
Route::get('editarTutor/{ids}', [empresaControler::class, "editarTutor"])->name("editarTutor")->middleware("auth");
Route::post('editarTutor/{ids}', [empresaControler::class, "editarTutorPost"])->name("editarTutorPost")->middleware("auth");
Route::get('crearRepresentante', [empresaControler::class, "crearRepresentante"])->name("crearRepresentante")->middleware("auth");
Route::post('crearRepresentante', [empresaControler::class, "crearRepresentantePost"])->name("crearRepresentantePost")->middleware("auth");
Route::get('eliminarRepresentante/{ids}', [empresaControler::class, "eliminarRepresentante"])->name("eliminarRepresentante")->middleware("auth");
Route::get('editarRepresentante/{ids}', [empresaControler::class, "editarRepresentante"])->name("editarRepresentante")->middleware("auth");
Route::post('editarRepresentante/{ids}', [empresaControler::class, "editarRepresentantePost"])->name("editarRepresentantePost")->middleware("auth");
Route::get('crearSede', [empresaControler::class, "crearSede"])->name("crearSede")->middleware("auth");
Route::post('crearSede', [empresaControler::class, "crearSedePost"])->name("crearSedePost")->middleware("auth");
Route::get('eliminarSede/{ids}', [empresaControler::class, "eliminarSede"])->name("eliminarSede")->middleware("auth");
Route::get('editarSede/{ids}', [empresaControler::class, "editarSede"])->name("editarSede")->middleware("auth");
Route::post('editarSede/{ids}', [empresaControler::class, "editarSedePost"])->name("editarSedePost")->middleware("auth");
Route::post('solicitudPracticas', [solicitudPracticasControler::class, "solicitudPracticas"])->name("solicitudPracticas")->middleware("auth");
Route::get('peticionPracticas/{ciclo}/{ids}', [solicitudPracticasControler::class, "peticionPracticas"])->name("peticionPracticas")->middleware("auth");