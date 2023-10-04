<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersDevicesController;
use App\Http\Controllers\LogUsersDevicesController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfesionalProvisorioController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\VentaManualRecetaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('user/login',[LoginController::class, 'login']);
Route::post('user/login_farmacia',[LoginController::class, 'login_farmacia']);

//USER DEVICES - CRUD
Route::post('/user_devices/registrar',    [UsersDevicesController::class, 'registrar']);
Route::post('/user_devices/modificar',    [UsersDevicesController::class, 'modificar']);
Route::get('/user_devices/ver_registros',[UsersDevicesController::class, 'verRegistros']);
Route::get('/user_devices/ver_registro', [UsersDevicesController::class, 'verRegistro']);
Route::post('/user_devices/estado',       [UsersDevicesController::class, 'estado']);
Route::get('/user_devices/solicitud_registro_equipo', [UsersDevicesController::class, 'solicitarAutorizacion']);


//LOG USER DEVICES - CRUD
Route::post('/log_user_devices/registrar',    [LogUsersDevicesController::class, 'registrar']);
Route::post('/log_user_devices/modificar',    [LogUsersDevicesController::class, 'modificar']);
Route::get('/log_user_devices/ver_registros',[LogUsersDevicesController::class, 'verRegistros']);
Route::get('/log_user_devices/ver_registro', [LogUsersDevicesController::class, 'verRegistro']);
Route::post('/log_user_devices/estado',       [LogUsersDevicesController::class, 'estado']);
Route::get('/log_user_devices/gen_solicitud',       [LogUsersDevicesController::class, 'genSolicitud']);
Route::get('/log_user_devices/check_state_sol',       [LogUsersDevicesController::class, 'checkStateSol']);


//USER DEVICES - CRUD
Route::post('/antecedente/registrar',    [AntecedenteController::class, 'registrar']);
Route::post('/antecedente/modificar',    [AntecedenteController::class, 'modificar']);
Route::get('/antecedente/ver_registros',[AntecedenteController::class, 'verRegistros']);
Route::get('/antecedente/ver_registro', [AntecedenteController::class, 'verRegistro']);
Route::post('/antecedente/estado',       [AntecedenteController::class, 'estado']);


//PROFESIONAL PROVISORIO
Route::post('/profesional_provisorio/registrar',    [ProfesionalProvisorioController::class, 'registrar_profesional_provisorio']);
Route::post('/profesional_provisorio/modificar',    [ProfesionalProvisorioController::class, 'modificar_profesional_provisorio']);

//DOCUMENTOS
Route::get('/documento/ver_registro_recetas', [DocumentoController::class, 'verRegistrosRecetas']);
Route::get('/documento/ver_receta_pdf', [DocumentoController::class, 'verRecetaPDF']);
Route::get('/documento/ver_registro_recetas/{id_paciente}', [DocumentoController::class, 'verRegistrosRecetas']);
Route::get('/documento/ver_receta_pdf/{id}', [DocumentoController::class, 'verRecetaPDF']);
Route::get('/documento/ver_registro_recetas_rut', [DocumentoController::class, 'verRegistrosRecetasRut']);
Route::get('/documento/ver_registro_recetas_rut/{rut}', [DocumentoController::class, 'verRegistrosRecetasRut']);
Route::get('/documento/ver_registro_recetas_id', [DocumentoController::class, 'verRegistrosRecetasId']);

Route::get('/documento/ver_registro_recetas_id/{id}', [DocumentoController::class, 'verRegistrosRecetasId']);
Route::get('/documento/ver_registro_recetas_id/{id}/{token}', [DocumentoController::class, 'verRegistrosRecetasId']);
Route::get('/documento/ver_detalle_recetas', [DocumentoController::class, 'verDetalleRecetas']);
Route::get('/documento/ver_detalle_recetas/{id_ficha}', [DocumentoController::class, 'verDetalleRecetas']);
Route::get('/documento/venta_detalle_recetas', [DocumentoController::class, 'ventaDetalleRecetas']);
Route::get('/documento/venta_detalle_recetas/{lista_productos}', [DocumentoController::class, 'ventaDetalleRecetas']);


//VENTA MANUAL RECETA
Route::post('/venta_manual_receta/registrar', [VentaManualRecetaController::class, 'registrar']);
Route::get('/venta_manual_receta/ver_registro', [VentaManualRecetaController::class, 'verRegistro']);



//  Escritorio Paciente
//Route::get('/paciente/mis_profesionales', [App\Http\Controllers\PacienteController::class, 'getMisProfesionales']);
//Route::get('/paciente/buscar_profesional_1', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_1']);
//Route::get('/paciente/buscar_profesional_2', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_2']);
//Route::get('/paciente/buscar_profesional_3', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_3']);
//
//Route::get('/paciente/getRecetas',      [App\Http\Controllers\PacienteController::class, 'getRecetas']);
//Route::get('/paciente/getLicencias',    [App\Http\Controllers\PacienteController::class, 'getLicencias']);
//Route::get('/paciente/getCertificados', [App\Http\Controllers\PacienteController::class, 'getCertificados']);
//Route::get('/paciente/getExamenes', [App\Http\Controllers\PacienteController::class, 'getExamenes']);
//
//Route::get('/paciente/getInfoPerfil', [App\Http\Controllers\PacienteController::class, 'getInfoPerfil']);
//Route::get('/paciente/updPerfilContacto', [App\Http\Controllers\PacienteController::class, 'updPerfilContacto']);
//Route::get('/paciente/updInfoPersonal', [App\Http\Controllers\PacienteController::class, 'updInfoPersonal']);
//Route::get('/paciente/updPerfilResidencia', [App\Http\Controllers\PacienteController::class, 'updPerfilResidencia']);
//
//Route::get('/paciente/getContacto', [App\Http\Controllers\PacienteController::class, 'getContacto']);
//
//// Funciones Utils
//Route::get('/getPrevisionesAll', [App\Http\Controllers\UtilsController::class, 'getPrevisionesAll']);
//Route::get('/getCuidades', [App\Http\Controllers\UtilsController::class, 'getCuidades']);
//Route::get('/getCuidadesAll', [App\Http\Controllers\UtilsController::class, 'getCuidadesAll']);
//Route::get('/getRegionesAll', [App\Http\Controllers\UtilsController::class, 'getRegionesAll']);
//Route::get('/getRegiones', [App\Http\Controllers\UtilsController::class, 'getRegiones']);
//Route::get('/getContacto', [App\Http\Controllers\UtilsController::class, 'getContacto']);
//Route::get('/setContacto', [App\Http\Controllers\UtilsController::class, 'setContacto']);
//Route::get('/delContacto', [App\Http\Controllers\UtilsController::class, 'delContacto']);
//
//Route::get('/getC10', [App\Http\Controllers\UtilsController::class, 'getC10']);
////Route::resource('paciente', App\Http\Controllers\PacienteController::class);
//
////  Escritorio Asistente Laboratorio
//Route::get('/asistente/laboratorio/getPacientes', [App\Http\Controllers\AsistenteController::class, 'getPacientes']);
//
//// Funciones Vistas
//Route::get('/getMisPacientes', [App\Http\Controllers\UtilsController::class, 'getPacientes']);
