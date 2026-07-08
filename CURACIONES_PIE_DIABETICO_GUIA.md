# Sistema de Curaciones Pié Diabético

## Descripción General
Sistema para registrar y gestionar curaciones de pie diabético en pacientes hospitalizados, con seguimiento detallado de valoración y curación.

## Migración Creada
**Archivo:** `2026_02_05_000001_create_curaciones_pie_diabetico_table.php`

## Estructura de la Tabla `curaciones_pie_diabetico`

### Campos Principales
| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | BIGINT AUTO_INCREMENT | Identificador único |
| `id_paciente` | BIGINT | FK a tabla pacientes |
| `id_responsable` | BIGINT | FK a tabla users (enfermera/profesional) |
| `id_ficha_atencion` | BIGINT nullable | FK a ficha_atencion |
| `fecha` | DATE | Fecha de la curación |
| `hora` | TIME | Hora de la curación |
| `datos_valoracion_pie_diabetico` | LONGTEXT | JSON con datos de valoración |
| `datos_curacion_pie_diabetico` | LONGTEXT | JSON con datos de curación |
| `estado` | VARCHAR | `pendiente`, `en_proceso`, `completado` |
| `activo` | TINYINT | 1=activo, 0=eliminado |
| `observaciones` | TEXT | Observaciones generales |
| `created_at` | TIMESTAMP | Fecha de creación |
| `updated_at` | TIMESTAMP | Fecha de actualización |

---

## JSON: datos_valoracion_pie_diabetico

Almacena los datos de la pestaña **"Valoración"** (tab `val_pie`)

### Campos del JSON

#### 1. Aspecto
- **`aspecto_pie_diab`**: integer (1-6)
  - 1: Eritematoso
  - 2: Enrojecido
  - 3: Amarillo pálido
  - 4: Necrótico grisáceo
  - 5: Necrótico negruzco
  - 6: Observaciones (campo personalizado)
- **`obs_aspecto_pie_diab`**: string (cuando se selecciona opción 6)

#### 2. Mayor Extensión
- **`mayor_extension`**: integer (1-6)
  - 1: 0-1 cm
  - 2: 1-3 cm
  - 3: 3-6 cm
  - 4: 6-10 cm
  - 5: >10 cm
  - 6: Observaciones
- **`obs_mayor_extension`**: string

#### 3. Profundidad
- **`profundidad_curacion`**: integer (1-6)
  - 1: 0
  - 2: 0-1 cm
  - 3: 1-2 cm
  - 4: 2-3 cm
  - 5: >3 cm
  - 6: Otros
- **`obs_profundidad_curacion`**: string

#### 4. Exudado - Cantidad
- **`exudado_cantidad_curacion`**: integer (1-6)
  - 1: Ausente
  - 2: Escaso
  - 3: Moderado
  - 4: Abundante
  - 5: Muy abundante
  - 6: Otros
- **`obs_exudado_cantidad_curacion`**: string

#### 5. Exudado - Calidad
- **`exudado_calidad_curacion`**: integer (1-6)
  - 1: Sin exudado
  - 2: Seroso
  - 3: Turbio
  - 4: Purulento
  - 5: Purulento gangrenoso
  - 6: Otros
- **`obs_exudado_calidad_curacion`**: string

#### 6. Tejido Esfacelado o Necrótico
- **`tejido_esf`**: integer (1-6)
  - 1: Ausente
  - 2: <25%
  - 3: 25-50%
  - 4: >50-75%
  - 5: >75%
  - 6: Otros
- **`obs_tejido_esf`**: string

#### 7. Tejido Granulatorio
- **`tejido_granu`**: integer (1-6)
  - 1: 100%
  - 2: 99-75%
  - 3: <75-50%
  - 4: <50-25%
  - 5: <25%
  - 6: Otros
- **`obs_tejido_granu`**: string

#### 8. Edema
- **`edema_curacion`**: integer (1-6)
  - 1: Ausente
  - 2: +
  - 3: ++
  - 4: +++
  - 5: ++++
  - 6: Otros
- **`obs_edema_curacion`**: string

#### 9. Dolor
- **`dolor_curacion`**: integer (1-6)
  - 1: 0-1
  - 2: 2-3
  - 3: 4-6
  - 4: 7-8
  - 5: 9-10
  - 6: Otros
- **`obs_dolor_curacion`**: string

#### 10. Piel Circundante
- **`piel_circun`**: integer (1-6)
  - 1: Sana
  - 2: Descamada
  - 3: Eritematosa
  - 4: Macerada
  - 5: Gangrena
  - 6: Otros
- **`obs_piel_circun`**: string

#### 11. Puntaje Total
- **`ptos_tot_ev_diab`**: numeric (suma de valoraciones)

#### 12. Observaciones Generales
- **`obs_orin`**: string (observaciones de curación pié diabético)

#### 13. Antecedentes Relevantes - Enfermedad Actual
- **`pat_prop`**: array (multiselect)
  - 1: Hipertensión
  - 2: Diabetes
  - 3: Hipercolesterolemia
  - 4: Hiperlipidemia
  - 5: Cáncer
  - 6: Obesidad
  - 7: Hipertiroidismo
  - 8: Hipotiroidismo
  - 9: Cirugías
  - 10: Inmunodepresión
  - 11: Tabaquismo
  - 12: Insuficiencia venosa
  - 13: Insuficiencia arterial
  - 14: Sustancias Ilícitas

#### 14. Medicamentos / Tratamientos
- **`sint_act`**: array (multiselect)
  - 1: Hipoglicemiantes
  - 2: Antibióticos
  - 3: Corticosteroides
  - 4: Tratamiento Anticoagulante
  - 5: Otros

#### 15. Resultado de Exámenes
- **`ot_pat_act`**: string (textarea)

---

## JSON: datos_curacion_pie_diabetico

Almacena los datos de la pestaña **"Curación"** (tab `curac_pie`)

### Campos del JSON

#### 1. Toma de Cultivo
- **`cp_cult`**: integer (1-2, 6)
  - 1: No
  - 2: Si
  - 6: Observaciones
- **`obs_cp_cult`**: string

#### 2. Tipos de Debridamiento
- **`cp_td`**: integer (1-8)
  - 1: Quirúrgico
  - 2: Cortante
  - 3: Enzimático
  - 4: Autolítico
  - 5: Osmótico
  - 6: Larval
  - 7: Mecánico
  - 8: Otros
- **`obs_cp_td`**: string

#### 3. Duchoterapia
- **`cp_duch`**: integer (1-3)
  - 1: Si
  - 2: No
  - 3: Observaciones
- **`obs_cp_duch`**: string

#### 4. Tipo de Antisépticos
- **`pie_ant`**: array (multiselect)
  - 1: Solución fisiológica
  - 2: Bialcohol

#### 5. Tipo de Apósitos y Materiales
- **`tpo_aposc`**: array (multiselect)
  - 1: Apósitos Pasivos
  - 2: Apósito Interactivo (Espuma Hidrofílica)
  - 3: Apósito Bioactivo (Alginato)
  - 4: Apósitos Mixtos
  - 5: Vasocontrictores
  - 6: Otros

#### 6. Observaciones de Curación
- **`ot_pat_act`**: string (textarea con observaciones de la curación)

---

## Ejemplo de Uso

### Crear una Curación

```php
use App\Models\CuracionesPieDiabetico;

$curacion = CuracionesPieDiabetico::create([
    'id_paciente' => 123,
    'id_responsable' => Auth::user()->id,
    'id_ficha_atencion' => 456,
    'fecha' => now()->toDateString(),
    'hora' => now()->toTimeString(),
    'datos_valoracion_pie_diabetico' => [
        'aspecto_pie_diab' => 2,
        'obs_aspecto_pie_diab' => null,
        'mayor_extension' => 3,
        'obs_mayor_extension' => null,
        'profundidad_curacion' => 2,
        'obs_profundidad_curacion' => null,
        'exudado_cantidad_curacion' => 3,
        'obs_exudado_cantidad_curacion' => null,
        'exudado_calidad_curacion' => 2,
        'obs_exudado_calidad_curacion' => null,
        'tejido_esf' => 2,
        'obs_tejido_esf' => null,
        'tejido_granu' => 3,
        'obs_tejido_granu' => null,
        'edema_curacion' => 2,
        'obs_edema_curacion' => null,
        'dolor_curacion' => 3,
        'obs_dolor_curacion' => null,
        'piel_circun' => 2,
        'obs_piel_circun' => null,
        'ptos_tot_ev_diab' => 25,
        'obs_orin' => 'Paciente con evolución favorable',
        'pat_prop' => [2, 11], // Diabetes y Tabaquismo
        'sint_act' => [1, 2], // Hipoglicemiantes y Antibióticos
        'ot_pat_act' => 'Glicemia: 120 mg/dl'
    ],
    'datos_curacion_pie_diabetico' => [
        'cp_cult' => 2, // Si
        'obs_cp_cult' => null,
        'cp_td' => 2, // Cortante
        'obs_cp_td' => null,
        'cp_duch' => 1, // Si
        'obs_cp_duch' => null,
        'pie_ant' => [1, 2], // Solución fisiológica y Bialcohol
        'tpo_aposc' => [2, 3], // Espuma Hidrofílica y Alginato
        'ot_pat_act' => 'Curación sin complicaciones'
    ],
    'estado' => 'completado',
    'activo' => 1
]);
```

### Consultar Curaciones de un Paciente

```php
// Con el scope del modelo
$curaciones = CuracionesPieDiabetico::activos()
    ->delPaciente($idPaciente)
    ->orderBy('created_at', 'desc')
    ->get();

// Acceder a datos JSON (automáticamente convertidos a arrays por el modelo)
foreach($curaciones as $curacion) {
    $aspecto = $curacion->datos_valoracion_pie_diabetico['aspecto_pie_diab'];
    $enfermedades = $curacion->datos_valoracion_pie_diabetico['pat_prop']; // array
    $cultivo = $curacion->datos_curacion_pie_diabetico['cp_cult'];
}
```

### Actualizar Estado

```php
$curacion = CuracionesPieDiabetico::find($id);
$curacion->estado = 'completado';
$curacion->save();
```

### Eliminar (Soft Delete)

```php
$curacion = CuracionesPieDiabetico::find($id);
$curacion->activo = 0;
$curacion->save();
```

---

## Ejecutar la Migración

```bash
php artisan migrate
```

Para revertir:
```bash
php artisan migrate:rollback --step=1
```

---

## Notas Importantes

1. **Campos JSON**: Los datos de valoración y curación se almacenan como JSON/longText para flexibilidad
2. **Multiselect**: Los campos `pat_prop`, `sint_act`, `pie_ant` y `tpo_aposc` son arrays
3. **Casting Automático**: El modelo convierte automáticamente los JSON a arrays de PHP
4. **Foreign Keys**: Se crean relaciones con pacientes, users y ficha_atencion
5. **Soft Delete**: Usar campo `activo` en lugar de delete real
6. **Estados**: Gestión de estados: pendiente, en_proceso, completado

---

## Integración con el Formulario

El formulario en `hospitalizacion_enfermeria.blade.php` (tab `cur_pd`) debe:

1. Recopilar todos los campos del tab "Valoración" (`val_pie`)
2. Recopilar todos los campos del tab "Curación" (`curac_pie`)
3. Enviar vía AJAX a un controlador que guarde en la tabla
4. Llamar función similar a `guardar_curacion_pie_diab()` que ya existe en el onclick del botón

### Función JavaScript Sugerida

```javascript
function guardar_curacion_pie_diab() {
    let datosValoracion = {
        aspecto_pie_diab: $('#aspecto_pie_diab').val(),
        obs_aspecto_pie_diab: $('#obs_aspecto_pie_diab').val(),
        mayor_extension: $('#mayor_extension').val(),
        obs_mayor_extension: $('#obs_mayor_extension').val(),
        profundidad_curacion: $('#profundidad_curacion').val(),
        obs_profundidad_curacion: $('#obs_profundidad_curacion').val(),
        exudado_cantidad_curacion: $('#exudado_cantidad_curacion').val(),
        obs_exudado_cantidad_curacion: $('#obs_exudado_cantidad_curacion').val(),
        exudado_calidad_curacion: $('#exudado_calidad_curacion').val(),
        obs_exudado_calidad_curacion: $('#obs_exudado_calidad_curacion').val(),
        tejido_esf: $('#tejido_esf').val(),
        obs_tejido_esf: $('#obs_tejido_esf').val(),
        tejido_granu: $('#tejido_granu').val(),
        obs_tejido_granu: $('#obs_tejido_granu').val(),
        edema_curacion: $('#edema_curacion').val(),
        obs_edema_curacion: $('#obs_edema_curacion').val(),
        dolor_curacion: $('#dolor_curacion').val(),
        obs_dolor_curacion: $('#obs_dolor_curacion').val(),
        piel_circun: $('#piel_circun').val(),
        obs_piel_circun: $('#obs_piel_circun').val(),
        ptos_tot_ev_diab: $('#ptos_tot_ev_diab').val(),
        obs_orin: $('#obs_orin').val(),
        pat_prop: $('#pat_prop').val(), // multiselect array
        sint_act: $('#sint_act').val(), // multiselect array
        ot_pat_act: $('#ot_pat_act').val()
    };

    let datosCuracion = {
        cp_cult: $('#cp_cult').val(),
        obs_cp_cult: $('#obs_cp_cult').val(),
        cp_td: $('#cp_td').val(),
        obs_cp_td: $('#obs_cp_td').val(),
        cp_duch: $('#cp_duch').val(),
        obs_cp_duch: $('#obs_cp_duch').val(),
        pie_ant: $('#pie_ant').val(), // multiselect array
        tpo_aposc: $('#tpo_aposc').val(), // multiselect array
        ot_pat_act: $('#ot_pat_act').val() // observaciones de curación
    };

    $.ajax({
        url: '/ruta/guardar-curacion-pie-diabetico',
        method: 'POST',
        data: {
            _token: CSRF_TOKEN,
            id_paciente: ID_PACIENTE,
            datos_valoracion: datosValoracion,
            datos_curacion: datosCuracion
        },
        success: function(response) {
            // Recargar tabla o mostrar mensaje
        }
    });
}
```

---

## Autor
Sistema de Curaciones Pié Diabético - MediChile
Fecha: 5 de Febrero 2026
