# 🚀 GUÍA DE IMPLEMENTACIÓN - CheckSDI Security Fix

## ⏱️ Tiempo Estimado: 20-30 minutos

---

## 🔧 PASO A PASO

### PASO 1: Respaldar Archivos (5 min)

Antes de cualquier cambio, hacer backup:

```bash
# Desde terminal en c:\laragon\www\medichile_sistema\

# Backup de Funciones.php
copy "app\Helpers\Funciones.php" "app\Helpers\Funciones.php.backup"

# Backup de EscritorioPaciente.php
copy "app\Http\Controllers\EscritorioPaciente.php" "app\Http\Controllers\EscritorioPaciente.php.backup"

# Backup de check_sdi.blade.php
copy "resources\views\check_sdi.blade.php" "resources\views\check_sdi.blade.php.backup"
```

---

### PASO 2: Actualizar `Funciones.php` (10 min)

**Archivo**: `app/Helpers/Funciones.php`

#### BUSCAR (línea ~160):
```php
public function validTokenPermApp($token)
{
    if($token)
    {
        $state = Funciones::checkStatePermApp($token);
        if($state['registro']['estado'] != 1)
        {
            abort(401);
        }else{
            return $state['registro'];
        }
    }else{
        abort(401);
    }
}
```

#### REEMPLAZAR POR:
```php
/**
 * Valida el token con validaciones exhaustivas
 * ✅ Verifica existencia
 * ✅ Verifica estado = 1
 * ✅ Verifica que no haya expirado (fecha_termino)
 * ✅ Verifica que no haya expirado (fecha_exp)
 * ✅ Verifica que esté dentro del período válido
 */
public static function validTokenPermApp($token)
{
    if (!$token) {
        \Log::warning('validTokenPermApp: Token vacío');
        abort(401);
    }

    $token = trim($token);
    
    // 1. Validar que el token existe
    $registro = LogUsersDevices::where('token', $token)->first();
    
    if (!$registro) {
        \Log::warning('validTokenPermApp: Token no encontrado', ['token' => substr($token, 0, 5)]);
        abort(401);
    }

    $now = \Carbon\Carbon::now();

    // 2. Validar que el estado sea 1 (activo)
    if ($registro->estado != 1) {
        \Log::warning('validTokenPermApp: Token inactivo', [
            'token' => substr($token, 0, 5),
            'estado' => $registro->estado
        ]);
        abort(401);
    }

    // 3. Validar que no haya expirado (fecha_termino)
    if ($now > $registro->fecha_termino) {
        \Log::warning('validTokenPermApp: Token vencido (fecha_termino)', [
            'token' => substr($token, 0, 5)
        ]);
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // 4. Validar que no haya expirado (fecha_exp)
    if ($now > $registro->fecha_exp) {
        \Log::warning('validTokenPermApp: Token completamente expirado (fecha_exp)', [
            'token' => substr($token, 0, 5)
        ]);
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // 5. Validar que se use dentro del período de validez
    if ($now < $registro->fecha_ingreso) {
        \Log::warning('validTokenPermApp: Token usado antes de fecha_ingreso', [
            'token' => substr($token, 0, 5)
        ]);
        abort(401);
    }

    // ✅ Token válido
    \Log::debug('validTokenPermApp: Token válido', ['token' => substr($token, 0, 5)]);
    return $registro;
}
```

---

### PASO 3: Actualizar `EscritorioPaciente.php` (10 min)

**Archivo**: `app/Http/Controllers/EscritorioPaciente.php`

#### BUSCAR (línea ~343 - dentro de `checkSdi()`):
```php
if($request->token)
{
    Funciones::disablePermApp($request->token);
}

$permiso = Funciones::generatePermApp($id_user_create,...);
```

#### REEMPLAZAR POR:
```php
// ✅ NUEVA VALIDACIÓN: Si hay token anterior, validar que no esté activo
if($request->token)
{
    $state = Funciones::checkStatePermApp($request->token);
    
    // Si el token anterior está activo, rechazar nueva solicitud
    if($state['estado'] == 1 && 
       isset($state['registro']) && 
       $state['registro']->estado == 1)
    {
        \Log::warning('checkSdi: Intento de generar token mientras uno activo existe', [
            'token_anterior' => substr($request->token, 0, 5),
            'id_recept' => $id_user_recept
        ]);
        
        // Devolver a pantalla de espera con token existente
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
    
    // Desactivar token anterior
    Funciones::disablePermApp($request->token);
}

$permiso = Funciones::generatePermApp($id_user_create,...);

\Log::info('checkSdi: Nuevo token generado', [
    'token' => substr($permiso['app']['token'], 0, 5),
    'id_recept' => $id_user_recept,
    'id_tipo' => $id_tipo
]);
```

---

### PASO 4: Actualizar `check_sdi.blade.php` (8 min)

**Archivo**: `resources/views/check_sdi.blade.php`

#### EN LA SECCIÓN `@section('page-script')`:

BUSCAR:
```javascript
function checkToken(){
    @php
    if(Auth::check()) 
        echo 'let url = "Check_sdi_token";';
    else
        echo 'let url = "Check_sdi_token_external";';
    @endphp
```

REEMPLAZAR POR:
```javascript
let intentos = 0;
const MAX_INTENTOS = 40; // 40 * 3 segundos = 2 minutos máximo

function checkToken(){
    intentos++;
    
    // ✅ NUEVA VALIDACIÓN: No exceder máximo de intentos
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
```

LUEGO BUSCAR Y REEMPLAZAR la función `success`:

BUSCAR:
```javascript
success: (resp)=>{
    if(resp.estado==1)
    {
        if(resp.registro.estado==1)
        {
            if(token_ != '')
            top.location.href=$('#url_nueva').val()+'/'+token_;
            else
            {
                if($('#url_nueva').val().indexOf("?") > -1)
                    top.location.href=$('#url_nueva').val()+'&token='+token;
                else
                    top.location.href=$('#url_nueva').val()+'?token='+token;
            }
        }else{
            setTimeout(checkToken,3000);
        }
    }else{
        setTimeout(checkToken,3000);
    }
},
```

REEMPLAZAR POR:
```javascript
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
```

BUSCAR la función de error:

BUSCAR:
```javascript
error: (resp)=>{
    console.warn(resp);
}
```

REEMPLAZAR POR:
```javascript
error: (xhr)=>{
    console.warn('Error en checkToken:', xhr);
    if (xhr.status === 401 || xhr.status === 403) {
        mostrarError('Acceso denegado. Token inválido.');
    } else {
        mostrarError('Error de conexión. Reintentando...');
        setTimeout(checkToken, 3000);
    }
}
```

AGREGA DESPUÉS DE `checkToken()` estas funciones:

```javascript
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
```

#### EN LA SECCIÓN `@section('content')`:

BUSCAR:
```html
<div class="container">
```

REEMPLAZAR POR:
```html
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

            <!-- Contenedor de mensajes de error -->
            <div id="contenedor-mensajes"></div>
        </div>
    </div>
</div>
```

---

### PASO 5: Agregar Estilos a CSS (2 min)

EN `@section('page-styles')`, AGREGAR:

```html
<style>
    .color-azul{
        color: #4680ff;
    }
    .color-azul:hover{
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
```

---

### PASO 6: Probar los Cambios (5 min)

1. **Abrir navegador en incógnito**
2. **Ir a**: `http://localhost/Mis_pacientes`
3. **Clickear**: "Editar datos médicos" en un paciente
4. **Pantalla de espera**: Debería mostrar "Procesando..."
5. **Presionar "Volver"**: 
   - ✅ CORRECTO: Muestra "Ya existe una solicitud en curso"
   - ❌ INCORRECTO: Genera nuevo token
6. **Esperar 60 segundos**: Token debería aprobarse
7. **Ver datos médicos**: Debería funcionar

---

### PASO 7: Probar Seguridad (5 min)

**Prueba 1**: Token Expirado
```
1. Copiar URL con token: /Mi_Ficha_Medica?token=abc123
2. Esperar 10 minutos
3. Acceder a URL guardada
4. Resultado esperado: ❌ Error 401 (Token expirado)
```

**Prueba 2**: Token Inactivo
```
1. Abrir /Check_sdi_external
2. Presionar "Volver"
3. Token anterior se desactiva
4. Intentar usar URL anterior
5. Resultado esperado: ❌ Error 401 (Token desactivado)
```

**Prueba 3**: Solicitud Simultánea
```
1. Abrir /Check_sdi_external (genera Token A)
2. Inmediatamente presionar "Volver"
3. Resultado esperado: ⚠️ "Ya existe una solicitud en curso"
```

---

### PASO 8: Verificar Logs (Opcional)

```bash
# Revisar archivo de logs
cat "storage/logs/laravel.log"

# Buscar mensajes de validTokenPermApp
grep "validTokenPermApp" storage/logs/laravel.log

# Buscar mensajes de checkSdi
grep "checkSdi" storage/logs/laravel.log
```

Deberías ver logs como:
```
[2026-04-22 14:35:21] local.WARNING: validTokenPermApp: Token inactivo {"token":"abc12",...}
[2026-04-22 14:35:22] local.WARNING: checkSdi: Intento de generar token mientras uno activo existe
[2026-04-22 14:35:23] local.INFO: checkSdi: Nuevo token generado {"token":"def45",...}
```

---

## ✅ CHECKLIST DE IMPLEMENTACIÓN

- [ ] Hacer backup de 3 archivos
- [ ] Actualizar `Funciones.php` (método validTokenPermApp)
- [ ] Actualizar `EscritorioPaciente.php` (método checkSdi)
- [ ] Actualizar `check_sdi.blade.php` (JavaScript y HTML)
- [ ] Verificar que no hay errores de sintaxis
- [ ] Limpiar cache: `php artisan cache:clear`
- [ ] Limpiar config: `php artisan config:clear`
- [ ] Probar en navegador incógnito
- [ ] Prueba 1: Token expirado
- [ ] Prueba 2: Token inactivo
- [ ] Prueba 3: Solicitud simultánea
- [ ] Revisar logs en storage/logs/laravel.log
- [ ] Notificar a usuarios de cambios

---

## ⚠️ TROUBLESHOOTING

### Error: "Call to undefined method Carbon\Carbon::parse()"

**Solución**: Asegurar que `Carbon` esté importado:
```php
use Carbon\Carbon;
```

### Error: "Undefined variable: LogUsersDevices"

**Solución**: Asegurar que el modelo esté importado en `Funciones.php`:
```php
use App\Models\LogUsersDevices;
```

### Página en blanco en check_sdi.blade.php

**Solución**: 
1. Ejecutar: `php artisan view:clear`
2. Ejecutar: `php artisan cache:clear`
3. Refrescar navegador (Ctrl+F5)

### Token no se desactiva correctamente

**Solución**:
1. Verificar que `fecha_termino` esté en BD
2. Revisar timezone en `.env`
3. Verificar que `disablePermApp()` está siendo llamado

---

## 📞 SOPORTE

Si algo falla, revisa:

1. **Laravel Logs**: `storage/logs/laravel.log`
2. **Browser Console**: F12 → Console
3. **Network Tab**: F12 → Network (para ver respuestas AJAX)
4. **Database**: Revisar tabla `log_users_devices`

---

## 🎉 ¡LISTO!

Los cambios están implementados. El sistema ahora es **mucho más seguro** contra intentos de acceso no autorizado.

**Resumen de mejoras:**
- ✅ Validación exhaustiva de fechas
- ✅ Rechazo de tokens activos duplicados
- ✅ Máximo intentos de polling
- ✅ Mejor manejo de errores
- ✅ Logging detallado para auditoría

