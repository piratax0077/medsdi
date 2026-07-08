# Soluciones de Seguridad - CheckSDI Token System

## 🔧 Archivo 1: Mejoras en `app/Helpers/Funciones.php`

### Método Mejorado: `validTokenPermApp()` - CON VALIDACIÓN COMPLETA

```php
/**
 * Valida el token con validaciones exhaustivas
 * - Verifica existencia del token
 * - Verifica estado activo (1)
 * - Verifica que no haya expirado
 * - Verifica que esté dentro del período de validez
 * - Registra intentos de acceso
 */
public static function validTokenPermApp($token)
{
    if (!$token) {
        abort(401);
    }

    $token = trim($token);
    
    // 1. Validar que el token existe
    $registro = LogUsersDevices::where('token', $token)->first();
    
    if (!$registro) {
        \Log::warning('Token no encontrado', ['token' => substr($token, 0, 5)]);
        abort(401);
    }

    $now = now();

    // 2. Validar que el estado sea 1 (activo)
    if ($registro->estado != 1) {
        \Log::warning('Token inactivo', [
            'token' => substr($token, 0, 5),
            'estado' => $registro->estado,
            'id' => $registro->id
        ]);
        abort(401);
    }

    // 3. Validar que no haya expirado (fecha_termino)
    if ($now > $registro->fecha_termino) {
        \Log::warning('Token vencido (fecha_termino)', [
            'token' => substr($token, 0, 5),
            'fecha_termino' => $registro->fecha_termino,
            'ahora' => $now
        ]);
        // Marcar como expirado
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // 4. Validar que no haya expirado (fecha_exp)
    if ($now > $registro->fecha_exp) {
        \Log::warning('Token completamente expirado (fecha_exp)', [
            'token' => substr($token, 0, 5),
            'fecha_exp' => $registro->fecha_exp,
            'ahora' => $now
        ]);
        // Marcar como expirado
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // 5. Validar que se use dentro del período de validez
    if ($now < $registro->fecha_ingreso) {
        \Log::warning('Token usado antes de su tiempo válido', [
            'token' => substr($token, 0, 5),
            'fecha_ingreso' => $registro->fecha_ingreso,
            'ahora' => $now
        ]);
        abort(401);
    }

    // ✅ Token válido
    return $registro;
}
```

### Método Mejorado: `checkStatePermApp()` - CON FECHA_TERMINO

```php
/**
 * Verifica el estado del token y su período de validez
 */
static public function checkStatePermApp($token)
{
    $datos = array();
    $registro = LogUsersDevices::where('token', trim($token))->first();
    
    if ($registro) {
        $datos['estado'] = 1;
        $datos['msj'] = 'registro encontrado';
        $datos['registro'] = $registro;
        
        // Cálculos de tiempo
        $fechaInicial = $registro->fecha_ingreso;
        $fechaFinal = $registro->fecha_termino;
        $fechaExp = $registro->fecha_exp;
        
        $ahora = \Carbon\Carbon::now();
        $inicial = \Carbon\Carbon::parse($fechaInicial);
        $final = \Carbon\Carbon::parse($fechaFinal);
        $exp = \Carbon\Carbon::parse($fechaExp);
        
        $segundos = $ahora->diffInSeconds($final);
        $segundos_total = $inicial->diffInSeconds($final);
        
        // ✅ Validar que no haya expirado
        if ($ahora > $final) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Token vencido (fecha_termino)';
            $registro->estado = 3;
            $registro->save();
        } elseif ($ahora > $exp) {
            $datos['estado'] = 0;
            $datos['msj'] = 'Token completamente expirado (fecha_exp)';
            $registro->estado = 3;
            $registro->save();
        }
        
        $datos['tiempo'] = $segundos;
        $datos['tiempo_total'] = $segundos_total;
        $datos['tiempo_restante'] = max(0, $segundos);
        
    } else {
        $datos['estado'] = 0;
        $datos['msj'] = 'Token no encontrado';
        $datos['registro'] = null;
    }

    return $datos;
}
```

### Método Mejorado: `disablePermApp()` - CON AUDITORÍA

```php
/**
 * Desactiva un permiso de aplicación
 * Registra quién y cuándo lo desactivó
 */
static public function disablePermApp($token)
{
    $datos = array();
    $registro = LogUsersDevices::where('token', trim($token))->first();
    
    if ($registro) {
        $old_estado = $registro->estado;
        $registro->estado = 3; // 3 = Desactivado
        $registro->desactivado_en = \Carbon\Carbon::now();
        $registro->desactivado_por = \Auth::check() ? \Auth::user()->id : 0;
        
        if ($registro->save()) {
            $datos['estado'] = 1;
            $datos['msj'] = 'Token desactivado correctamente';
            $datos['old_estado'] = $old_estado;
            $datos['new_estado'] = 3;
            
            \Log::info('Token desactivado', [
                'token' => substr($token, 0, 5),
                'id' => $registro->id,
                'desactivado_por' => $registro->desactivado_por,
                'old_estado' => $old_estado
            ]);
        } else {
            $datos['estado'] = 0;
            $datos['msj'] = 'Error al desactivar token';
        }
    } else {
        $datos['estado'] = 0;
        $datos['msj'] = 'Token no encontrado';
    }

    return $datos;
}
```

---

## 🔧 Archivo 2: Mejoras en `app/Http/Controllers/EscritorioPaciente.php`

### Método Mejorado: `checkSdi()` - VALIDA TOKEN ACTIVO

```php
/**
 * Genera permiso temporal para acceso a datos médicos
 * ✅ Valida que no exista un token activo antes de generar uno nuevo
 */
public function checkSdi(Request $request)
{
    $url_anterior = $request->urla ?? 'Inicio';
    $url_nueva = $request->urln ?? 'Mi_Ficha_Medica';
    $id_usuario_recept = (int)($request->id_recept ?? 0);

    // Obtener ID del usuario actual (logeado o externo)
    if (Auth::check()) {
        $id_usuario = Auth::user()->id;
    } else {
        $id_usuario = 0;
    }

    $id_user_create = $id_usuario;

    if ($id_usuario_recept != 0) {
        $id_user_recept = $id_usuario_recept;
    } else {
        $id_user_recept = $id_usuario;
    }

    // ⚠️ NUEVA VALIDACIÓN: Si hay un token anterior ACTIVO, rechazar
    if ($request->token) {
        $state = Funciones::checkStatePermApp($request->token);
        
        if ($state['estado'] == 1 && 
            isset($state['registro']) && 
            $state['registro']->estado == 1) {
            
            \Log::warning('Intento de generar token mientras uno activo existe', [
                'token_anterior' => substr($request->token, 0, 5),
                'id_recept' => $id_user_recept
            ]);
            
            // ❌ Rechazar y redirigir a pantalla de espera con token existente
            return view('check_sdi', [
                'id_recept' => $id_user_recept,
                'url_nueva' => $url_nueva,
                'url_anterior' => $url_anterior,
                'token' => $request->token,
                'token_' => $request->token_ ?? '',
                'fecha_termino' => $state['registro']->fecha_termino,
                'advertencia' => 'Ya existe una solicitud en curso. Por favor espere a que se procese.'
            ]);
        }
        
        // Desactivar token anterior si está inactivo
        Funciones::disablePermApp($request->token);
    }

    // Datos del evento
    $evento = $request->evento ?? 'Ficha Única';
    $nombre = Auth::check() ? Auth::user()->name : '';
    $apellido_p = '';
    $apellido_m = '';
    $lugar = 'Sistema';
    $profesional = Auth::check() ? Auth::user()->name : '';
    $tipo = 'Check SDI';
    $id_tipo = $request->id_tipo ?? 2;

    // Generar nuevo permiso
    $permiso = Funciones::generatePermApp(
        $id_user_create,
        $id_user_recept,
        $evento,
        $nombre,
        $apellido_p,
        $apellido_m,
        $lugar,
        $profesional,
        $tipo,
        $id_tipo
    );

    \Log::info('Nuevo token generado', [
        'token' => substr($permiso['app']['token'], 0, 5),
        'id_recept' => $id_user_recept,
        'id_tipo' => $id_tipo
    ]);

    return view('check_sdi', [
        'id_recept' => $id_user_recept,
        'url_nueva' => $url_nueva,
        'url_anterior' => $url_anterior,
        'token' => $permiso['app']['token'],
        'token_' => $request->token_ ?? '',
        'fecha_termino' => $permiso['app']['fecha_termino']
    ]);
}
```

### Método Mejorado: `checkSdiToken()` - CON LOGGING

```php
/**
 * Valida el estado del token
 * Retorna información para mostrar en pantalla de espera
 */
public function checkSdiToken(Request $request)
{
    if (!$request->token) {
        return response()->json([
            'estado' => 0,
            'msj' => 'Token requerido'
        ], 400);
    }

    $state = Funciones::checkStatePermApp($request->token);
    
    \Log::debug('checkSdiToken - Estado', [
        'token' => substr($request->token, 0, 5),
        'estado' => $state['estado'],
        'registro_estado' => $state['registro']->estado ?? null
    ]);

    return response()->json($state);
}
```

---

## 🔧 Archivo 3: Migración - Agregar Campos a `log_users_devices`

```php
// database/migrations/YYYY_MM_DD_HHMMSS_add_security_fields_to_log_users_devices.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecurityFieldsToLogUsersDevices extends Migration
{
    public function up()
    {
        Schema::table('log_users_devices', function (Blueprint $table) {
            // Auditoría de desactivación
            $table->timestamp('desactivado_en')->nullable()->comment('Cuándo fue desactivado');
            $table->integer('desactivado_por')->nullable()->comment('ID del usuario que lo desactivó');
            
            // Auditoría de uso
            $table->timestamp('usado_en')->nullable()->comment('Cuándo fue usado para acceder');
            $table->integer('usado_por')->nullable()->comment('ID del usuario que lo usó');
            $table->string('ip_origen')->nullable()->comment('IP desde donde se generó');
            $table->string('user_agent')->nullable()->comment('User Agent del navegador');
            
            // Índices para mejor búsqueda
            $table->index('estado');
            $table->index('fecha_exp');
            $table->index('desactivado_en');
        });
    }

    public function down()
    {
        Schema::table('log_users_devices', function (Blueprint $table) {
            $table->dropColumn([
                'desactivado_en',
                'desactivado_por',
                'usado_en',
                'usado_por',
                'ip_origen',
                'user_agent'
            ]);
            
            $table->dropIndex(['estado']);
            $table->dropIndex(['fecha_exp']);
            $table->dropIndex(['desactivado_en']);
        });
    }
}
```

**Para ejecutar:**
```bash
php artisan make:migration add_security_fields_to_log_users_devices
# Editar la migración con el código anterior
php artisan migrate
```

---

## 🔧 Archivo 4: Vista Mejorada `resources/views/check_sdi.blade.php`

```blade
<!-- check_sdi.blade.php - VERSIÓN MEJORADA -->

@extends('layouts.base')

@section('page-styles')
<style>
    .color-azul {
        color: #4680ff;
    }
    .advertencia {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    .tiempo-restante {
        font-weight: bold;
        font-size: 18px;
        color: #4680ff;
    }
</style>
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        checkToken();
    });

    let intentos = 0;
    const MAX_INTENTOS = 40; // 40 * 3 segundos = 2 minutos máximo

    function checkToken(){
        intentos++;
        
        // ❌ Validación: No exceder máximo de intentos
        if (intentos > MAX_INTENTOS) {
            mostrarError('Ha expirado el tiempo para procesar la solicitud. Por favor, intente nuevamente.');
            return;
        }

        @php
        if(Auth::check()) 
            echo 'let url = "Check_sdi_token";';
        else
            echo 'let url = "Check_sdi_token_external";';
        @endphp

        var _token = $('input[name=_token]').val();    
        var token_ = $('#token_').val();   
        var token = '{{$token}}'; 

        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: _token,
                token: token
            },
            success: (resp)=>{
                if(resp.estado==1) {
                    if(resp.registro && resp.registro.estado==1) {
                        // ✅ Token válido y aprobado
                        redirigir(token, token_);
                    } else {
                        // Esperando aprobación
                        var tiempo_restante = resp.tiempo_restante || resp.tiempo || 0;
                        $('#tiempo-restante').text(Math.ceil(tiempo_restante) + ' seg');
                        setTimeout(checkToken, 3000);
                    }
                } else {
                    // Token vencido o inválido
                    mostrarError('La solicitud ha expirado. ' + resp.msj);
                }
            },
            error: (xhr)=>{
                console.warn('Error en checkToken:', xhr);
                if (xhr.status === 401 || xhr.status === 403) {
                    mostrarError('Acceso denegado. Token inválido.');
                } else {
                    mostrarError('Error de conexión. Reintentando...');
                    setTimeout(checkToken, 3000);
                }
            }
        });
    }

    function redirigir(token, token_){
        if(token_ != '') {
            top.location.href=$('#url_nueva').val()+'/'+token_;
        } else {
            var url_nueva = $('#url_nueva').val();
            if(url_nueva.indexOf("?") > -1) {
                top.location.href = url_nueva + '&token=' + token;
            } else {
                top.location.href = url_nueva + '?token=' + token;
            }
        }
    }

    function mostrarError(mensaje){
        var html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                   '<strong>Error:</strong> ' + mensaje + 
                   '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>' +
                   '</div>';
        $('#contenedor-mensajes').html(html);
    }
</script>
@endsection

@section('content')
@csrf    
<input type="hidden" id="token_" value="{{$token_ ?? ''}}">
<input type="hidden" id="token" value="{{$token}}">
<input type="hidden" id="url_nueva" value="{{$url_nueva}}">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            
            <!-- Advertencia si existe -->
            @if(isset($advertencia))
            <div class="advertencia">
                ⚠️ {{$advertencia}}
            </div>
            @endif

            <div class="card">
                <div class="card-body text-center">
                    <h3>Procesando solicitud...</h3>
                    <div class="mt-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Cargando...</span>
                        </div>
                    </div>
                    <p class="mt-4">
                        Tiempo restante: <span class="tiempo-restante" id="tiempo-restante">--</span>
                    </p>
                </div>
            </div>

            <!-- Contenedor de mensajes -->
            <div id="contenedor-mensajes"></div>
        </div>
    </div>
</div>
@endsection
```

---

## 📋 Resumen de Cambios

| Área | Cambio | Impacto |
|------|--------|--------|
| `validTokenPermApp()` | Validación exhaustiva de fechas | 🔴 CRÍTICO |
| `checkStatePermApp()` | Agrega validación de expiración | 🔴 CRÍTICO |
| `disablePermApp()` | Auditoría de desactivación | 🟡 IMPORTANTE |
| `checkSdi()` | Rechaza tokens activos duplicados | 🟡 IMPORTANTE |
| Migración BD | Campos de auditoría | 🟢 MEJORA |
| Vista check_sdi.blade | Máximo intentos + mejor mensajes | 🟡 IMPORTANTE |

---

## ⚠️ Pasos de Implementación

1. **Crear la migración**:
   ```bash
   php artisan make:migration add_security_fields_to_log_users_devices
   ```

2. **Reemplazar métodos en Funciones.php** (líneas 113-250)

3. **Reemplazar método checkSdi() en EscritorioPaciente.php** (líneas 343-410)

4. **Actualizar vista check_sdi.blade.php** (usar nueva versión)

5. **Ejecutar migración**:
   ```bash
   php artisan migrate
   ```

6. **Limpiar tokens antiguos** (opcional):
   ```php
   // Agregar a un comando de limpieza
   LogUsersDevices::where('fecha_exp', '<', now())
       ->whereNotIn('estado', [1])
       ->delete();
   ```

