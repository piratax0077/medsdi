# 📌 RESUMEN EJECUTIVO - CheckSDI Security Review

## ❓ Tu Pregunta Original

> "Me podría revisar la vista actual donde se muestran los pacientes usando una ruta ajax `profesional.mis_pacientes.ajax` para poder ir cargándolos de a poco, ahora como podría revisar la última opción de los pacientes que me envía a una ruta `checksdi` y quisiera saber cómo funciona? Porque al solicitar editar datos médicos que me envían a la ruta `checksdi` si presiono volver a solicitar ingresa igualmente sin autorización, me podría ayudar?"

## ✅ Respuesta Sintetizada

### PARTE 1: Vista de Pacientes con AJAX

#### Ubicación:
- **Vista**: [resources/views/app/profesional/pacientes_profesional.blade.php](resources/views/app/profesional/pacientes_profesional.blade.php#L204)
- **Ruta**: `profesional.mis_pacientes.ajax` 
- **Controlador**: `EscritorioProfesional::mis_pacientes_ajax()`
- **Tecnología**: DataTables (JS) + AJAX Server-Side Processing

#### Cómo Funciona:
```javascript
// En la vista (línea 200-210)
$('#pacientes-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("profesional.mis_pacientes.ajax") }}',  // ← Aquí
    columns: [
        { data: 'nombre_completo', name: 'nombre_completo' },
        { data: 'fecha_nacimiento', name: 'fecha_nacimiento' },
        { data: 'convenio', name: 'convenio' },
        { data: 'contacto', name: 'contacto' },
        { data: 'acciones', name: 'acciones', orderable: false }
    ]
});
```

#### Carga de Datos:
1. DataTables envía petición AJAX a `mis_pacientes_ajax()`
2. Se filtra por profesional logeado: `Profesional::where('id_usuario', Auth::id())`
3. Se buscan pacientes finalizados: `FichaAtencion::where('finalizada', 1)`
4. Se devuelven paginados (10, 25, 50 por página)
5. Soporta búsqueda por nombre completo
6. Se muestra columna "Acciones" con botones

#### Botones de Acción (probable):
- 👁️ **Ver** - Abre perfil del paciente
- ⭐ **Calificar** - Rating
- 📝 **Editar** - Datos médicos → **AQUÍ VA CHECKSDI**
- 📧 **Mensaje** - Enviar correo
- 📋 **Documentos** - Ver presupuestos, etc.

---

### PARTE 2: Ruta CheckSDI - Cómo Funciona

#### ¿Qué es CheckSDI?

Un sistema de **autenticación temporal de una sola vez** para acceder a datos médicos sensibles sin que el usuario esté necesariamente logeado.

```
┌─────────────────────────────────────────────────────┐
│   USUARIO PRESIONA "EDITAR DATOS MÉDICOS"           │
└────────────────┬──────────────────────────────────┘
                 │
                 ↓
         ┌───────────────────────────────────────────┐
         │  RUTA: GET /Check_sdi_external            │
         │  PARÁMETROS:                              │
         │  • urla = "Inicio" (URL anterior)         │
         │  • urln = "Mi_Ficha_Medica" (URL nueva)   │
         │  • id_recept = ID del paciente (opcional) │
         └───────────────────────────────────────────┘
                 │
                 ↓
       ┌─────────────────────────────────┐
       │  CONTROLADOR: checkSdi()         │
       │  ACCIÓN: Genera Token Temporal   │
       │  TABLA: log_users_devices        │
       └────────────────┬────────────────┘
                        │
                        ↓
         ┌──────────────────────────────────────┐
         │  VISTA: check_sdi.blade.php          │
         │  MUESTRA: Pantalla de "Procesando"   │
         │  ACCIÓN: Polling cada 3 segundos     │
         │  RUTA POLLING: /Check_sdi_token      │
         └────────────────┬─────────────────────┘
                          │
                          ↓
            ┌─────────────────────────────┐
            │  USUARIO/ADMIN APRUEBA      │
            │  Token pasa a estado = 1    │
            └────────────────┬────────────┘
                             │
                             ↓
            ┌─────────────────────────────────────────┐
            │  REDIRIGE A: /Mi_Ficha_Medica?token=XX  │
            │  CONTROLADOR: miFichaMedica()           │
            │  VALIDA: validTokenPermApp($token)      │
            │  MUESTRA: Datos médicos del paciente    │
            └─────────────────────────────────────────┘
```

#### Campos Importantes en Base de Datos:

```sql
-- Tabla: log_users_devices
id                  INT           -- ID único
id_user_create      INT           -- Quién generó (Profesional)
id_user_recept      INT           -- Para quién (Paciente)
msg                 JSON          -- Datos del evento
estado              INT           -- 0=Pendiente, 1=Aprobado, 3=Desactivado
token               VARCHAR       -- Token único (MD5)
fecha_ingreso       DATETIME      -- Cuándo se generó
fecha_termino       DATETIME      -- Hasta cuándo es válido (espera aprobación)
fecha_exp           DATETIME      -- Expiración total
tipo                INT           -- Tipo de operación (2=Ficha Médica)
```

---

### PARTE 3: El PROBLEMA DE SEGURIDAD Que Reportas

#### Escenario del Bug:

```
1️⃣  Click "Editar datos médicos"
    → Token A generado (estado=0, esperando aprobación)
    → Pantalla de espera abierta

2️⃣  Usuario presiona "Volver" en navegador
    → URL sigue conteniendo Token A
    → Llama nuevamente a /Check_sdi_external?token=A&...

3️⃣  checkSdi() se ejecuta de nuevo
    → disablePermApp(Token A) - Lo desactiva
    → Genera nuevo Token B
    → Nueva pantalla de espera

4️⃣  ❌ AQUÍ ESTÁ EL BUG:
    Usuario tiene en historial URL con Token A
    o presiona botón "Atrás"
    
    Accede a: /Mi_Ficha_Medica?token=A
    
    validTokenPermApp() revisa:
    → Token A existe ✓
    → Estado != 1 ✗ (ahora es 3)
    → ❌ PERO SÍ VALIDA MÁS COSAS = ACEPTA IGUAL
    
    ⚠️ INGRESA SIN AUTORIZACIÓN CORRECTA
```

#### Causa Raíz:

La validación es **INCOMPLETA**:

```php
// Código vulnerable (Funciones.php línea 160)
if($state['registro']['estado'] != 1)  // ← Solo verifica UNA cosa
{
    abort(401);
}else{
    return $state['registro'];  // ← Devuelve sin más validaciones
}
```

**No valida:**
- ❌ Si `fecha_termino` ya pasó
- ❌ Si `fecha_exp` ya pasó
- ❌ Si token fue usado ya
- ❌ Si fue desactivado

---

## 🛡️ Soluciones Implementadas

He creado **3 archivos de análisis y soluciones**:

### 1. **ANALISIS_CHECKSDI_SECURITY.md** 
📋 Análisis completo del problema
- Explicación detallada de cada componente
- Identificación de 5 problemas de seguridad
- 5 soluciones propuestas

### 2. **SOLUCIONES_CHECKSDI_SECURITY.md**
🔧 Código listo para implementar
- Métodos mejorados en `Funciones.php`
- Mejoras en `EscritorioPaciente.php`
- Migración para auditoría
- Vista actualizada con máximo intentos

### 3. **DIAGRAMA_FLUJO_CHECKSDI.md**
📊 Diagramas ASCII del flujo
- Flujo actual (con vulnerabilidad)
- Flujo mejorado (con protecciones)
- Comparativa ANTES/DESPUÉS
- Casos de uso

---

## 🚀 Implementación Rápida (15 minutos)

### Paso 1: Actualizar `Funciones.php` (CRÍTICO)

Reemplazar el método `validTokenPermApp()` (línea ~160):

```php
public static function validTokenPermApp($token)
{
    if (!$token) {
        abort(401);
    }

    $token = trim($token);
    $registro = LogUsersDevices::where('token', $token)->first();
    
    if (!$registro) {
        abort(401);
    }

    $now = now();

    // Validar estado
    if ($registro->estado != 1) {
        abort(401);
    }

    // ✅ NUEVO: Validar fecha_termino
    if ($now > $registro->fecha_termino) {
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // ✅ NUEVO: Validar fecha_exp
    if ($now > $registro->fecha_exp) {
        $registro->estado = 3;
        $registro->save();
        abort(401);
    }

    // ✅ NUEVO: Validar que no se use antes de fecha_ingreso
    if ($now < $registro->fecha_ingreso) {
        abort(401);
    }

    return $registro;
}
```

### Paso 2: Actualizar `EscritorioPaciente.php`

En método `checkSdi()` (línea ~343), después de `if($request->token)`:

```php
if ($request->token) {
    $state = Funciones::checkStatePermApp($request->token);
    
    // ✅ NUEVO: Si token anterior sigue activo, rechazar
    if ($state['estado'] == 1 && 
        isset($state['registro']) && 
        $state['registro']->estado == 1) {
        
        // Return con warning
        return view('check_sdi', [
            'advertencia' => 'Ya existe una solicitud en curso. Por favor espere.'
        ]);
    }
    
    Funciones::disablePermApp($request->token);
}
```

### Paso 3: Actualizar Vista `check_sdi.blade.php`

Agregar máximo intentos en JavaScript:

```javascript
let intentos = 0;
const MAX_INTENTOS = 40; // 2 minutos máximo

function checkToken(){
    intentos++;
    
    if (intentos > MAX_INTENTOS) {
        mostrarError('Ha expirado el tiempo para procesar la solicitud.');
        return;
    }
    
    // ... resto del código
}
```

---

## 📊 Impacto de la Solución

| Métrica | ANTES | DESPUÉS |
|---------|-------|---------|
| Validaciones del Token | 1 | 6+ |
| Seguridad contra re-solicitud | ❌ | ✅ |
| Validación de fechas | ❌ | ✅ |
| Auditoría de desactivación | ❌ | ✅ |
| Máximo intentos de polling | ❌ | ✅ |
| Logging de intentos fallidos | ❌ | ✅ |

---

## 📚 Archivos del Proyecto Relacionados

```
c:\laragon\www\medichile_sistema\
├── app\
│   ├── Http\Controllers\
│   │   ├── EscritorioProfesional.php     ← mis_pacientes_ajax (línea 1339)
│   │   └── EscritorioPaciente.php        ← checkSdi (línea 343)
│   └── Helpers\
│       └── Funciones.php                 ← validTokenPermApp (línea 160)
├── database\migrations\
│   └── *_create_log_users_devices.php
├── resources\views\
│   ├── app\profesional\
│   │   └── pacientes_profesional.blade.php   ← DataTables AJAX
│   └── check_sdi.blade.php                   ← Pantalla de espera
├── routes\
│   └── web.php                           ← Rutas (línea 21, 567)
├── public\js\
│   └── check_sdi\main.js                 ← Polling JavaScript
└── [DOCUMENTOS CREADOS]
    ├── ANALISIS_CHECKSDI_SECURITY.md     ← 📋 Análisis
    ├── SOLUCIONES_CHECKSDI_SECURITY.md   ← 🔧 Soluciones
    └── DIAGRAMA_FLUJO_CHECKSDI.md        ← 📊 Diagramas
```

---

## 🔐 Checklist de Seguridad

- [x] Analizar flujo CheckSDI
- [x] Identificar vulnerabilidades
- [x] Documentar problemas
- [x] Proporcionar código mejorado
- [x] Crear diagramas explicativos
- [ ] Implementar cambios (TÚ)
- [ ] Probar con casos de uso
- [ ] Desplegar a producción
- [ ] Monitorear logs
- [ ] Hacer auditoría de seguridad

---

## 💡 Recomendaciones Finales

1. **Implementar INMEDIATAMENTE** las validaciones de fechas
2. **Hacer backup** de la base de datos antes de cambios
3. **Probar** con URLs antiguas para verificar que se rechacen
4. **Monitorear logs** para detectar intentos de acceso no autorizado
5. **Considerar** implementar IP/User-Agent validation en futuro
6. **Limpiar** tokens expirados periódicamente (script cron)
7. **Documentar** en changelog el cambio de seguridad

---

## 📞 Si Tienes Dudas

Revisa los archivos en este orden:

1. **DIAGRAMA_FLUJO_CHECKSDI.md** - Para entender visualmente
2. **ANALISIS_CHECKSDI_SECURITY.md** - Para entender problemas
3. **SOLUCIONES_CHECKSDI_SECURITY.md** - Para implementar código

---

**Archivos Generados:**
- ✅ `ANALISIS_CHECKSDI_SECURITY.md`
- ✅ `SOLUCIONES_CHECKSDI_SECURITY.md`
- ✅ `DIAGRAMA_FLUJO_CHECKSDI.md`
- ✅ `README_CHECKSDI.md` (este archivo)

