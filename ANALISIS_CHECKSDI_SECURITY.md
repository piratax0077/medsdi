# Análisis de Seguridad - Ruta CheckSDI y Flujo de Autenticación

## 📋 Resumen del Problema

Cuando solicitas editar datos médicos y presionas "volver a solicitar", el sistema ingresa sin autorización correcta. Esto indica una brecha en el sistema de validación de tokens temporales.

---

## 🔍 Análisis del Flujo Actual

### 1. **Vista: `pacientes_profesional.blade.php`**
- Carga los pacientes usando DataTables AJAX
- Ruta: `profesional.mis_pacientes.ajax`
- Método en Controller: `EscritorioProfesional::mis_pacientes_ajax()`
- Función: Devuelve lista de pacientes con paginación y búsqueda

```php
// Ejemplo de columna de acciones (línea 204)
{ data: 'acciones', name: 'acciones', orderable: false, searchable: false }
```

### 2. **Ruta CheckSDI: Generación de Permiso Temporal**
- **Ruta pública**: `GET /Check_sdi_external` → `EscritorioPaciente::checkSdi()`
- **Parámetros requeridos**: `urla` (URL anterior) y `urln` (URL nueva)
- **Opcional**: `id_recept` (ID usuario receptor), `evento`, `id_tipo`, `token`

#### Flujo en `checkSdi()`:
```
1. Recibe parámetros de la URL
2. Si hay token anterior → Desactiva con Funciones::disablePermApp($token)
3. Genera nuevo permiso → Funciones::generatePermApp(...)
4. Retorna vista check_sdi con nuevo token
```

**Código relevante** (línea 343-410 en EscritorioPaciente.php):
```php
if($request->token)
{
    Funciones::disablePermApp($request->token);
}

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
```

### 3. **Vista Check_SDI: Pantalla de Espera**
- Archivo: `resources/views/check_sdi.blade.php`
- Hace polling cada 3 segundos a `Check_sdi_token` o `Check_sdi_token_external`
- Espera a que el estado del token cambie a 1 (aprobado)
- Luego redirige a la URL nueva con el token

#### Validación del Token (JavaScript):
```javascript
function checkToken(){
    $.ajax({
        url: "Check_sdi_token",
        type: "GET",
        data: {
            token: token // TOKEN GENERADO
        },
        success: (resp)=>{
            if(resp.estado==1 && resp.registro.estado==1)
            {
                // REDIRIGE A URL NUEVA CON TOKEN
                top.location.href=$('#url_nueva').val()+'?token='+token;
            }else{
                // ESPERA 3 SEGUNDOS
                setTimeout(checkToken, 3000);
            }
        }
    });
}
```

### 4. **Validación del Token**
- Método: `EscritorioPaciente::checkSdiToken(Request $request)`
- Valida estado con: `Funciones::checkStatePermApp($token)`
- Retorna estado del registro en tabla `log_users_devices`

### 5. **Acceso a Datos Médicos**
- Método: `EscritorioPaciente::miFichaMedica(Request $request)`
- Valida token con: `Funciones::validTokenPermApp($token)`
- Si el token NO existe o estado ≠ 1 → `abort(401)`

---

## ⚠️ Problemas de Seguridad Identificados

### **Problema Principal: Token Reutilizable**

#### Escenario del Bug:
1. Usuario presiona botón para editar datos médicos
2. Se genera Token A → Se abre pantalla de espera
3. Usuario presiona "Volver" en navegador
4. URL vuelve a `/Check_sdi_external?urln=...`
5. Se llama a `checkSdi()` nuevamente
6. **Si Token A aún existe en BD**: `disablePermApp()` lo desactiva
7. Se genera Token B
8. Usuario va a URL anterior (con Token A todavía en navegador)
9. **PROBLEMA**: La validación en `miFichaMedica()` acepta Token A porque fue desactivado pero NO validado

### **Causas Raíz:**

1. **Validación incompleta en `validTokenPermApp()`**
   ```php
   public function validTokenPermApp($token)
   {
       if($token)
       {
           $state = Funciones::checkStatePermApp($token);
           if($state['registro']['estado'] != 1)  // ❌ Solo valida estado=1
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
   - ❌ No valida que `fecha_termino` no haya pasado
   - ❌ No valida que `fecha_exp` (expiración) no haya pasado
   - ❌ No valida si el token fue desactivado (estado=3)

2. **Sin registro de auditoría en desactivación**
   - Cuando llamas `disablePermApp()`, solo cambia `estado = 3`
   - No hay log de quién y cuándo lo desactivó
   - No hay validación si fue desactivado antes de usarlo

3. **Sin validación de origen (origen del navegador/dispositivo)**
   - El token es válido desde cualquier origen
   - Cualquiera que tenga el token puede acceder

4. **Sin verificación de CSRF token en formulario**
   - La URL puede ser copiada/compartida
   - Falta validación de sesión simultánea

---

## 🛡️ Soluciones Propuestas

### **Solución 1: Mejorar Validación del Token (Crítico)**

Modificar `validTokenPermApp()` para validar:
- ✅ Token existe en BD
- ✅ Estado = 1 (activo)
- ✅ Fecha actual < fecha_termino (aún válido)
- ✅ Fecha actual < fecha_exp (no expirado)
- ❌ Rechazar si estado = 3 (fue desactivado)

### **Solución 2: Implementar Sistema de One-Time Tokens**

Después de que el token es usado en `miFichaMedica()`:
- Marcar como `usado = 1`
- No permitir reutilización
- Obligar a generar nuevo token para próxima acción

### **Solución 3: Agregar IP y User-Agent Validation**

En `checkStatePermApp()` y `validTokenPermApp()`:
- Guardar IP y User-Agent al generar token
- Validar que IP y User-Agent coincidan en cada uso
- Rechazar si no coinciden

### **Solución 4: Implementar Timeout Estricto**

- Reducir `TIEMPO_ESPERA_CONFIRMACION` (actualmente configurable en .env)
- Aumentar `TIEMPO_EXP_PERMISO`
- Implementar validación de tiempo real en cada petición

### **Solución 5: Mejorar checkSdi() - No Generar Nuevo Token Si Existe Uno Activo**

```php
// ANTES - Peligroso
if($request->token)
{
    Funciones::disablePermApp($request->token);
}
$permiso = Funciones::generatePermApp(...);

// DESPUÉS - Más seguro
if($request->token)
{
    $state = Funciones::checkStatePermApp($request->token);
    if($state['estado'] == 1 && $state['registro']['estado'] == 1)
    {
        // Token aún activo - rechazar nueva solicitud
        return response('Token aún en validación', 403);
    }
    Funciones::disablePermApp($request->token);
}
$permiso = Funciones::generatePermApp(...);
```

---

## 📊 Tabla de Estados en `log_users_devices`

| Estado | Significado | Validez |
|--------|-------------|---------|
| 0 | Pendiente de aprobación | ❌ No accede |
| 1 | Aprobado / Activo | ✅ Accede |
| 2 | ? (No documentado) | ❌ No accede |
| 3 | Desactivado / Cancelado | ❌ No accede |

---

## 🔧 Recomendaciones de Implementación

### **Inmediatas (Críticas):**
1. Reforzar `validTokenPermApp()` - agregar validación de fechas
2. Rechazar tokens con estado != 1
3. Agregar log de uso de token

### **Corto Plazo (1-2 semanas):**
1. Implementar one-time tokens
2. Agregar IP/User-Agent validation
3. Mejorar checkSdi() para no generar token si uno está activo

### **Mediano Plazo (1-2 meses):**
1. Implementar rate limiting en checkSdi()
2. Agregar 2FA para acciones sensibles
3. Mejorar auditoría en LogUsersDevices

---

## 📝 Consideraciones Adicionales

- **Vista `check_sdi.blade.php`** - Actualmente espera polling cada 3 segundos
- **Ruta anónima** - `/Check_sdi_external` no requiere autenticación (por diseño)
- **Tabla `log_users_devices`** - Crece indefinidamente, necesita limpieza periódica
- **Relación con JWT/Sanctum** - Sistema usa tokens personalizados, no utiliza Sanctum

---

## 📋 Archivos Involucrados

- `routes/web.php` - Línea 21 (ruta anónima)
- `routes/web.php` - Línea 567 (ruta AJAX profesional)
- `app/Http/Controllers/EscritorioProfesional.php` - Línea 1339 (mis_pacientes_ajax)
- `app/Http/Controllers/EscritorioPaciente.php` - Línea 343 (checkSdi)
- `app/Helpers/Funciones.php` - Métodos de validación de tokens
- `resources/views/check_sdi.blade.php` - Vista de espera
- `public/js/check_sdi/main.js` - JavaScript de polling
- `resources/views/app/profesional/pacientes_profesional.blade.php` - Vista principal

