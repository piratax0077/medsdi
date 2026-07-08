# 📋 DOCUMENTACIÓN: Sistema de Curaciones con CuracionRegistro

## 🎯 Resumen

Se ha implementado un **nuevo sistema unificado** para registrar curaciones usando el modelo `CuracionRegistro`. Este sistema reemplaza los modelos antiguos (`CuracionesPlanasServicio`, `CuracionesLppServicio`, etc.) con una solución más flexible y escalable.

---

## 📊 Estructura de Datos

### Tabla: `curaciones_registros`

```sql
- id
- id_ficha_atencion
- id_profesional
- id_paciente
- id_lugar_atencion
- tipo_curacion: 'plana', 'lpp', 'pie_diabetico', 'quemados'
- etapa: 'valoracion', 'curacion', 'mixta'
- datos_valoracion (JSON)
- datos_curacion (JSON)
- observaciones (TEXT)
- estado: 'completado', 'pendiente', etc.
- activo (BOOLEAN)
- fecha (DATE)
- hora (TIME)
- timestamps
```

---

## 🔧 Componentes Implementados

### 1. **Modelo: CuracionRegistro**
📁 `app/Models/CuracionRegistro.php`

**Relaciones:**
- `Profesional()` → Quien realizó la curación
- `Paciente()` → Paciente atendido
- `LugarAtencion()` → Lugar donde se realizó
- `FichaAtencion()` → Ficha médica asociada

---

### 2. **Controlador: EscritorioEnfermerasController**
📁 `app/Http/Controllers/EscritorioEnfermerasController.php`

**Métodos Públicos:**

#### `guardarCuracionRegistro(Request $req)`
Método genérico que guarda cualquier tipo de curación.

**Parámetros requeridos:**
```php
- id_ficha_atencion (obligatorio)
- tipo_curacion: 'plana', 'lpp', 'pie_diabetico', 'quemados' (obligatorio)
- id_paciente
- id_lugar_atencion
- etapa: 'valoracion', 'curacion', 'mixta' (opcional, default: 'mixta')
```

**Respuesta:**
```json
{
    "mensaje": "OK",
    "msj": "Curación registrada exitosamente",
    "data": { /* objeto curación */ }
}
```

#### `obtenerCuracionesRegistro(Request $req)`
Obtiene curaciones filtradas por ficha y tipo.

**Parámetros:**
```php
- id_ficha_atencion
- tipo_curacion
```

#### `eliminarCuracionRegistro(Request $req)`
Desactiva una curación (soft delete).

**Parámetros:**
```php
- id (ID de la curación)
```

---

**Métodos Privados (Helpers):**

- `prepararDatosValoracionPlana(Request $req)` → Extrae datos de valoración de curación plana
- `prepararDatosCuracionPlana(Request $req)` → Extrae datos de curación plana
- `prepararDatosValoracionLpp(Request $req)` → Datos valoración LPP
- `prepararDatosCuracionLpp(Request $req)` → Datos curación LPP
- `prepararDatosValoracionPieDiabetico(Request $req)` → Datos valoración pie diabético
- `prepararDatosCuracionPieDiabetico(Request $req)` → Datos curación pie diabético
- `prepararDatosValoracionQuemados(Request $req)` → Datos valoración quemados
- `prepararDatosCuracionQuemados(Request $req)` → Datos curación quemados

---

### 3. **Rutas**
📁 `routes/web.php`

```php
// Guardar cualquier tipo de curación
Route::post('guardar_curacion_registro', [EscritorioEnfermerasController::class, 'guardarCuracionRegistro'])
    ->name('enfermeria.guardar_curacion_registro');

// Obtener curaciones por ficha y tipo
Route::post('obtener_curaciones_registro', [EscritorioEnfermerasController::class, 'obtenerCuracionesRegistro'])
    ->name('enfermeria.obtener_curaciones_registro');

// Eliminar curación
Route::post('eliminar_curacion_registro', [EscritorioEnfermerasController::class, 'eliminarCuracionRegistro'])
    ->name('enfermeria.eliminar_curacion_registro');
```

---

### 4. **JavaScript de Ejemplo**
📁 `public/js/curacion_registro_ejemplo.js`

**Funciones disponibles:**

```javascript
// Guardar curaciones
guardar_curacion_plana_nuevo()
guardar_curacion_lpp_nuevo()
guardar_curacion_pie_diabetico_nuevo()
guardar_curacion_quemados_nuevo()

// Cargar curaciones
cargarCuracionesPlana()
cargarCuracionesLpp()
cargarCuracionesPieDiabetico()
cargarCuracionesQuemados()

// Otras funciones
mostrarCuracionesEnTabla(curaciones, tipo)
eliminarCuracion(id)
```

---

## 🚀 Cómo Usar

### En la Vista Blade

**1. Cambiar el botón de guardar:**

```blade
<!-- ANTES (usando función antigua) -->
<button onclick="guardar_curacion_plana_servicio()">Guardar</button>

<!-- DESPUÉS (usando nueva función) -->
<button onclick="guardar_curacion_plana_nuevo()">Guardar</button>
```

**2. Incluir el JavaScript:**

```blade
@section('page-script')
    <script src="{{ asset('js/curacion_registro_ejemplo.js') }}"></script>
@endsection
```

---

### En JavaScript

**Ejemplo completo para curación plana:**

```javascript
function guardar_curacion_plana_nuevo() {
    let formData = new FormData();
    
    // Datos obligatorios
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    formData.append('tipo_curacion', 'plana');
    formData.append('etapa', 'mixta');
    formData.append('id_ficha_atencion', $('#id_ficha_atencion').val());
    formData.append('id_paciente', $('#id_paciente').val());
    formData.append('id_lugar_atencion', $('#id_lugar_atencion').val());
    
    // Agregar todos los campos del formulario...
    formData.append('cp_asp', $('#cp_asp-1').val() || '');
    formData.append('cp_dol', $('#cp_dol').val() || '');
    // ... etc
    
    // Enviar
    $.ajax({
        url: "{{ route('enfermeria.guardar_curacion_registro') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.mensaje === 'OK') {
                Swal.fire('¡Éxito!', response.msj, 'success');
            }
        }
    });
}
```

---

## 📝 Campos por Tipo de Curación

### 🔹 CURACIÓN PLANA

**Valoración:**
- cp_asp, cp_dol, cp_ecal, cp_ecant, cp_ed
- cp_me, cp_pielc, cp_pro, cp_tg, cp_tn
- tpo_les_curgen, ptos_tot_ev
- obs_cp_asp, obs_cp_me, obs_cp_pro, etc.

**Curación:**
- cp_cult_plana, cp_td_plana, cp_duch_plana
- cp_lav_plana, cp_sec_plana, cp_cober_plana
- cp_fijac_plana, desc_lesion_plana

---

### 🔹 CURACIÓN LPP

**Valoración:**
- upp_local_eval, upp_gr_eval, upp_diam_eval
- upp_prof_eval, upp_Infec_eval, upp_exud_eval
- upp_tej_nec_eval, upp_tej_gra_eval, upp_epitel_eval
- lpp_patasoc, lpp_puntaje_total

**Curación:**
- lpp_cultivo, lpp_td, lpp_ducha
- lpp_lavado, lpp_secado, lpp_cobertura
- lpp_fijacion

---

### 🔹 PIE DIABÉTICO

**Valoración:**
- pd_zona_afectada, pd_profundidad
- pd_infeccion, pd_isquemia
- pd_puntaje_wagner

**Curación:**
- pd_cultivo, pd_desbridamiento
- pd_lavado, pd_antiseptico
- pd_cobertura, pd_vendaje

---

### 🔹 QUEMADOS

**Valoración:**
- quem_zona_afectada, quem_grado
- quem_superficie, quem_profundidad
- pat_propq, med_quem

**Curación:**
- quem_limpieza, quem_desbridamiento
- quem_topico, quem_aposito
- quem_vendaje

---

## ✅ Ventajas del Nuevo Sistema

1. **Unificado**: Un solo modelo para todos los tipos de curaciones
2. **Flexible**: Los datos JSON permiten agregar campos sin modificar la BD
3. **Escalable**: Fácil agregar nuevos tipos de curaciones
4. **Organizado**: Separación clara entre valoración y curación
5. **Trazable**: Registro de profesional, fecha, hora, lugar
6. **Histórico**: Permite mantener registro completo de evolución

---

## 🔄 Migración desde Sistema Antiguo

Si tienes datos en las tablas antiguas, puedes migrarlos:

```php
// Ejemplo de script de migración
$curaciones_antiguas = CuracionesPlanasServicio::all();

foreach($curaciones_antiguas as $vieja) {
    CuracionRegistro::create([
        'id_ficha_atencion' => $vieja->id_ficha_atencion,
        'id_paciente' => $vieja->id_paciente,
        'tipo_curacion' => 'plana',
        'datos_valoracion' => json_decode($vieja->datos_valoracion_plana, true),
        'datos_curacion' => json_decode($vieja->datos_curacion_plana, true),
        // ... otros campos
    ]);
}
```

---

## 🎨 Ejemplo de Uso en Vista

```blade
<div class="col-md-6 text-right">
    @if(isset($enfermera))
        <button type="button" 
                class="btn btn-outline-success btn-sm" 
                onclick="guardar_curacion_plana_nuevo()">
            <i class="fas fa-save"></i> Guardar Curación Plana
        </button>
    @endif
</div>

<!-- Tabla de curaciones registradas -->
<table id="tabla-curaciones-plana" class="table table-sm">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Responsable</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Se llena dinámicamente con JavaScript -->
    </tbody>
</table>

<script>
    // Cargar curaciones al cargar la página
    $(document).ready(function() {
        cargarCuracionesPlana();
    });
</script>
```

---

## 📞 Soporte

Para cualquier duda sobre la implementación, consulta:
- Archivo de ejemplo: `public/js/curacion_registro_ejemplo.js`
- Métodos del controlador: `EscritorioEnfermerasController.php`
- Modelo: `app/Models/CuracionRegistro.php`

---

**Fecha de implementación:** 2026-06-15  
**Versión:** 1.0
