# Diagrama de Flujo - Sistema CheckSDI

## 📊 FLUJO ACTUAL (CON VULNERABILIDAD)

```
┌──────────────────────────────────────────────────────────────────────┐
│                     FLUJO DE GENERACIÓN DE TOKEN                      │
└──────────────────────────────────────────────────────────────────────┘

    USUARIO                          NAVEGADOR                    SERVIDOR
       │                                 │                            │
       │ Click "Editar datos médicos"   │                            │
       ├────────────────────────────────>│                            │
       │                                 │ GET /Check_sdi_external    │
       │                                 ├───────────────────────────>│
       │                                 │                      checkSdi()
       │                                 │                    Genera Token A
       │                                 │<───────────────────────────┤
       │                                 │ Vista check_sdi.blade      │
       │                 ┌───────────────┴────────────────────┐       │
       │                 │  PANTALLA DE ESPERA                │       │
       │                 │  ┌─────────────────────────────┐   │       │
       │                 │  │ Procesando...               │   │       │
       │                 │  │ Token A: abc123...          │   │       │
       │                 │  │ Tiempo: 60 seg              │   │       │
       │                 │  └─────────────────────────────┘   │       │
       │                 └───────────────────────────────────┘       │
       │                                 │                            │
       │  ❌ AQUÍ EL USUARIO PRESIONA  │  Polling cada 3 seg        │
       │     "VOLVER" EN NAVEGADOR      │  GET /Check_sdi_token      │
       │                                 ├───────────────────────────>│
       │     o hace refresh              │                    Estado=0
       │                                 │<───────────────────────────┤
       │                                 │                            │
       │                                 │ ⚠️ URL LLEVA Token A:     │
       │                                 │    /Check_sdi_external     │
       │ Click "Volver"                 │    ?token=abc123&...       │
       │                                 │                            │
       ├────────────────────────────────>│ GET /Check_sdi_external    │
       │                                 │    ?token=abc123&...       │
       │                                 ├───────────────────────────>│
       │                                 │                      checkSdi()
       │                                 │     ❌ PROBLEMA:
       │                                 │     disablePermApp(abc123)
       │                                 │     → Estado: 1 → 3
       │                                 │     
       │                                 │     Genera Token B
       │                                 │<───────────────────────────┤
       │                                 │ Vista check_sdi.blade      │
       │                                 │ Token B: def456...         │
       │                                 │                            │
       │                                 │ Polling para Token B       │
       │  Usuario presiona "Volver"     │  GET /Check_sdi_token      │
       │  en navegador NUEVAMENTE       │  (con Token B)             │
       │                                 │                            │
       │     o espera                    │ Estado Token B: 1          │
       │     o copia URL anterior       │                            │
       │                                 │ Redirige a:                │
       │                                 │ /Mi_Ficha_Medica           │
       │                                 │ ?token=abc123 ❌ ANTIGUO   │
       │                                 │<───────────────────────────┤
       │                                 │                            │
       │  ⚠️ AQUÍ ESTÁ EL BUG:         │ GET /Mi_Ficha_Medica       │
       │  Usuario accede con Token A    │ ?token=abc123 (ya está 3)  │
       │  (que fue desactivado)         ├───────────────────────────>│
       │                                 │                            │
       │  Presiona botón "Atrás"        │   miFichaMedica()          │
       │  o tiene URL en historial      │   validTokenPermApp()      │
       │                                 │   ❌ FALLA: Estado=3      │
       │  URL: .../Mi_Ficha?token=abc123 │   Debería abort(401)      │
       │                                 │   PERO SI VALIDACIÓN       │
       │  Copia URL y la comparte       │   ES DÉBIL, ACEPTA         │
       │                                 │                            │
       │                                 │   ACCEDE SIN AUTORIZACIÓN  │
       │                                 │<───────────────────────────┤
       └─────────────────────────────────┘                            │


┌──────────────────────────────────────────────────────────────────────┐
│        TABLA log_users_devices - ESTADO DESPUÉS DE VOLVER            │
└──────────────────────────────────────────────────────────────────────┘

ID │ Token    │ Estado │ Fecha Termino │ Fecha Exp │ Desactivado │ Usado
───┼──────────┼────────┼───────────────┼───────────┼─────────────┼──────
 5 │ abc123.. │ 3 ✗    │ 2026-04-22... │ 2026-04-23 │ NULL ❌    │ NULL
 6 │ def456.. │ 1 ✓    │ 2026-04-22... │ 2026-04-23 │ NULL       │ NULL
   │          │        │               │           │             │


┌──────────────────────────────────────────────────────────────────────┐
│                    FLUJO MEJORADO (CON PROTECCIONES)                 │
└──────────────────────────────────────────────────────────────────────┘

    USUARIO                          NAVEGADOR                    SERVIDOR
       │                                 │                            │
       │ Click "Editar datos médicos"   │                            │
       ├────────────────────────────────>│                            │
       │                                 │ GET /Check_sdi_external    │
       │                                 ├───────────────────────────>│
       │                                 │                      checkSdi()
       │                                 │                    
       │                                 │    ✅ NUEVA VALIDACIÓN:
       │                                 │    ¿Existe Token A activo?
       │                                 │    NO → Generar Token A
       │                                 │<───────────────────────────┤
       │                                 │ Vista check_sdi.blade      │
       │                 ┌───────────────┴────────────────────┐       │
       │                 │  PANTALLA DE ESPERA                │       │
       │                 │  ┌─────────────────────────────┐   │       │
       │                 │  │ Procesando...               │   │       │
       │                 │  │ Token A: abc123...          │   │       │
       │                 │  │ Tiempo restante: 60 seg     │   │       │
       │                 │  └─────────────────────────────┘   │       │
       │                 └───────────────────────────────────┘       │
       │                                 │                            │
       │  Click "Volver"                │  Token A SIGUE ACTIVO      │
       │                                 │  No debería permitir       │
       │  o presiona refresh             │  generar Token B           │
       │                                 │                            │
       ├────────────────────────────────>│ GET /Check_sdi_external    │
       │                                 │ ?token=abc123&...         │
       │                                 ├───────────────────────────>│
       │                                 │                      checkSdi()
       │                                 │   
       │                                 │  ✅ NUEVA VALIDACIÓN:
       │                                 │  ¿Token A sigue activo?
       │                                 │  ✅ SÍ → RECHAZAR
       │                                 │  Estado: 401 / 403
       │                                 │<───────────────────────────┤
       │                                 │ 
       │                                 │ Respuesta: "Token en curso"
       │                                 │ Redirect: /Check_sdi_external
       │                                 │ (con mismo Token A)
       │                                 │
       │                 ┌───────────────┴────────────────────┐       │
       │                 │  PANTALLA DE ESPERA (Token A)      │       │
       │                 │  ┌─────────────────────────────┐   │       │
       │                 │  │ Procesando...               │   │       │
       │                 │  │ Token A: abc123...          │   │       │
       │                 │  │ ⚠️ Ya existe solicitud...  │   │       │
       │                 │  │ Tiempo restante: 45 seg     │   │       │
       │                 │  └─────────────────────────────┘   │       │
       │                 └───────────────────────────────────┘       │
       │                                 │                            │
       │  Espera a que termine           │  Polling continúa          │
       │                                 │  GET /Check_sdi_token      │
       │                                 │  (Token A)                 │
       │                                 │                            │
       │  [60 segundos después]          │  Estado: 1                 │
       │                                 │  Aprobado ✅              │
       │                                 │<───────────────────────────┤
       │                                 │                            │
       │                                 │ Redirige a:                │
       │                                 │ /Mi_Ficha_Medica           │
       │                                 │ ?token=abc123 (CORRECTO)   │
       │                                 │<───────────────────────────┤
       │                                 │                            │
       │  Usuario accede a Ficha        │ GET /Mi_Ficha_Medica       │
       │  Médica                         │ ?token=abc123              │
       │                                 ├───────────────────────────>│
       │                                 │                            │
       │                                 │   miFichaMedica()          │
       │                                 │   validTokenPermApp()      │
       │                                 │                            │
       │                                 │   ✅ VALIDACIONES:
       │                                 │   ✅ Token existe          │
       │                                 │   ✅ Estado = 1 (activo)  │
       │                                 │   ✅ Fecha actual <       │
       │                                 │       fecha_termino        │
       │                                 │   ✅ Fecha actual <       │
       │                                 │       fecha_exp            │
       │                                 │   ✅ IP válida            │
       │                                 │<───────────────────────────┤
       │                                 │                            │
       │  ✅ ACCESO CONCEDIDO             │ Datos médicos cargados     │
       │                                 │<───────────────────────────┤
       │                                 │                            │
       └─────────────────────────────────┘                            │

```

---

## 🔐 TABLA COMPARATIVA DE VALIDACIONES

| Validación | ANTES (❌ Vulnerable) | DESPUÉS (✅ Seguro) |
|------------|---------------------|-------------------|
| Token existe | Sí | Sí |
| Estado = 1 | Sí (débil) | Sí (exhaustivo) |
| No expirado fecha_termino | ❌ NO | ✅ SÍ |
| No expirado fecha_exp | ❌ NO | ✅ SÍ |
| Dentro período válido | ❌ NO | ✅ SÍ |
| Rechaza tokens activos duplicados | ❌ NO | ✅ SÍ |
| Registra IP/User-Agent | ❌ NO | 🔄 En progreso |
| Auditoría de desactivación | ❌ NO | ✅ SÍ |
| Máximo intentos en polling | ❌ NO | ✅ SÍ |
| Rate limiting | ❌ NO | 🔄 En progreso |

---

## 🔍 CÓDIGO VULNERABLE vs CÓDIGO SEGURO

### ❌ VALIDACIÓN ACTUAL (VULNERABLE)

```php
// Funciones.php - Línea 160
public static function validTokenPermApp($token)
{
    if($token)
    {
        $state = Funciones::checkStatePermApp($token);
        if($state['registro']['estado'] != 1)  // ⚠️ Solo verifica estado
        {
            abort(401);
        }else{
            return $state['registro'];  // ❌ DEVUELVE sin más validaciones
        }
    }else{
        abort(401);
    }
}
```

**Problemas:**
- No valida `fecha_termino`
- No valida `fecha_exp`
- No valida que `fecha_ingreso` haya pasado
- Acepta tokens desactivados (estado=3) si contiene error

---

### ✅ VALIDACIÓN MEJORADA (SEGURA)

```php
// Nuevo código
public static function validTokenPermApp($token)
{
    if (!$token) {
        abort(401);
    }

    $token = trim($token);
    $registro = LogUsersDevices::where('token', $token)->first();
    
    if (!$registro) {
        \Log::warning('Token no encontrado', ['token' => substr($token, 0, 5)]);
        abort(401);
    }

    $now = now();

    // ✅ Validar que el estado sea 1 (activo)
    if ($registro->estado != 1) {
        \Log::warning('Token inactivo', ['estado' => $registro->estado]);
        abort(401);
    }

    // ✅ Validar que no haya expirado (fecha_termino)
    if ($now > $registro->fecha_termino) {
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // ✅ Validar que no haya expirado (fecha_exp)
    if ($now > $registro->fecha_exp) {
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // ✅ Validar que se use dentro del período de validez
    if ($now < $registro->fecha_ingreso) {
        abort(401);
    }

    return $registro;  // ✅ Token completamente válido
}
```

**Mejoras:**
- ✅ Valida todas las fechas
- ✅ Marca como expirado si es necesario
- ✅ Logging detallado
- ✅ Rechazo de tokens no iniciados

---

## 🎯 CASOS DE USO - ANTES vs DESPUÉS

### Caso 1: Usuario Normal (Flujo Correcto)

```
ANTES:  ✅ Funciona
DESPUÉS: ✅ Funciona (más seguro)
```

### Caso 2: Usuario Presiona "Volver"

```
ANTES:  ❌ FALLA - Token anterior se acepta
DESPUÉS: ✅ Se rechaza con mensaje "Token en curso"
```

### Caso 3: Usuario Copia URL Antigua

```
ANTES:  ⚠️ PELIGRO - Funciona si validación débil
DESPUÉS: ❌ Se rechaza - Token desactivado
```

### Caso 4: Token Expirado Manually

```
ANTES:  ❌ PELIGRO - Podría aceptarse
DESPUÉS: ✅ Se rechaza - Validación de fecha_exp
```

### Caso 5: Token Reutilizado desde Otro Dispositivo

```
ANTES:  ⚠️ PELIGRO - Funciona
DESPUÉS: ✅ Se rechaza - IP/User-Agent validation (futuro)
```

---

## 🔔 RECOMENDACIONES FINALES

1. **Aplicar INMEDIATAMENTE** los cambios en `validTokenPermApp()`
2. **Rechazar tokens activos duplicados** en `checkSdi()`
3. **Agregar máximo intentos** en `check_sdi.blade.php`
4. **Ejecutar migración** para auditoría
5. **Monitorear logs** de tokens rechazados
6. **Limpiar tokens expirados** periódicamente
7. **Implementar IP/User-Agent validation** en siguiente sprint

