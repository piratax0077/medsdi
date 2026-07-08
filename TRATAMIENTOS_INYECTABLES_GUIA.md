# Guía de Tratamientos Inyectables

## Descripción
Sistema para gestionar los tratamientos inyectables de enfermería en 3 modalidades:
1. **Receta Médica**: Con adjunto de imágenes
2. **Inyectable IM/IV**: Registro de incidentes y observaciones
3. **Control de Sueros**: Seguimiento de administración de sueros

## Archivos Creados

### 1. Migración
**Ubicación**: `database/migrations/2026_02_03_203041_create_tratamientos_inyectables_table.php`

**Estructura de la tabla `tratamientos_inyectables`**:
```php
- id (bigint, PK, auto_increment)
- ficha_atencion_id (bigint) - ID de la ficha de atención
- tipo (enum) - Valores: 'receta_medica', 'inyectable_im_iv', 'control_sueros'

// Campos para Receta Médica
- id_receta_sdi (string, nullable) - ID de la receta en sistema SDI
- buscar_receta (boolean, default: false) - Indica si buscar en sistema
- observaciones_receta (text, nullable) - Observaciones de la receta
- imagenes (json, nullable) - Array con información de imágenes adjuntas

// Campos para Inyectable IM/IV
- incidentes_procedimiento (text, nullable) - Incidentes durante procedimiento
- otras_observaciones_procedimiento (text, nullable) - Otras observaciones

// Campos para Control de Sueros
- descripcion_sueros (text, nullable) - Tipo de suero/hora/gotas por minuto
- otros_tratamientos_parenterales (text, nullable) - Otros tratamientos
- observaciones_examen_control (text, nullable) - Observaciones del examen
- control_signos_vitales (text, nullable) - Control de signos vitales

// Campos comunes
- usuario_registro_id (bigint, nullable) - ID del usuario que registró
- created_at (timestamp)
- updated_at (timestamp)
- deleted_at (timestamp, nullable) - Soft deletes
```

### 2. Modelo
**Ubicación**: `app/Models/TratamientoInyectable.php`

**Características**:
- Usa SoftDeletes (eliminación lógica)
- Cast automático de `imagenes` a array
- Cast de `buscar_receta` a boolean
- Constantes para los tipos de tratamiento
- Relaciones con FichaAtencion y User
- Scopes para filtrar por tipo y ficha de atención
- Accessor `tipo_nombre` para obtener el nombre legible del tipo

**Constantes disponibles**:
```php
TratamientoInyectable::TIPO_RECETA_MEDICA       // 'receta_medica'
TratamientoInyectable::TIPO_INYECTABLE_IM_IV    // 'inyectable_im_iv'
TratamientoInyectable::TIPO_CONTROL_SUEROS      // 'control_sueros'
```

### 3. Controlador Actualizado
**Ubicación**: `app/Http/Controllers/EscritorioEnfermerasController.php`

Se agregó el `use App\Models\TratamientoInyectable;` y se actualizaron 3 métodos:

#### 3.1 `guardar_receta_medica_inyectable(Request $request)`
**Datos que recibe**:
- ficha_atencion_id
- id_receta_sdi
- observaciones
- buscar_receta (1 o 0)
- imagenes (JSON string con array de imágenes)

**Retorna**:
```json
{
  "estado": 1,
  "mensaje": "Receta médica guardada correctamente",
  "imagenes_guardadas": 2,
  "tratamiento_id": 15
}
```

#### 3.2 `guardar_inyectable_im_iv(Request $request)`
**Datos que recibe**:
- ficha_atencion_id
- incidentes_procedimiento
- otras_observaciones

**Retorna**:
```json
{
  "estado": 1,
  "mensaje": "Inyectable IM/IV guardado correctamente",
  "tratamiento_id": 16
}
```

#### 3.3 `guardar_control_sueros(Request $request)`
**Datos que recibe**:
- ficha_atencion_id
- descripcion_sueros
- otras_tratamientos
- observaciones_examen
- control_signos_vitales

**Retorna**:
```json
{
  "estado": 1,
  "mensaje": "Control de sueros guardado correctamente",
  "tratamiento_id": 17
}
```

## Instalación

### 1. Ejecutar la migración
Una vez que se configure correctamente la base de datos en el archivo `.env`, ejecutar:

```bash
php artisan migrate
```

Esto creará la tabla `tratamientos_inyectables` en la base de datos.

### 2. Verificar configuración de base de datos
Asegúrate de que el archivo `.env` tenga las credenciales correctas:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medsdi_medichile
DB_USERNAME=root
DB_PASSWORD=tu_password_aqui
```

## Uso del Modelo

### Crear un nuevo registro

#### Receta Médica
```php
use App\Models\TratamientoInyectable;

$tratamiento = TratamientoInyectable::create([
    'ficha_atencion_id' => 123,
    'tipo' => TratamientoInyectable::TIPO_RECETA_MEDICA,
    'id_receta_sdi' => '12345',
    'buscar_receta' => true,
    'observaciones_receta' => 'Receta para antibiótico',
    'imagenes' => [
        ['url' => '/uploads/receta1.jpg', 'nombre_original' => 'receta.jpg'],
        ['url' => '/uploads/receta2.jpg', 'nombre_original' => 'receta2.jpg']
    ],
    'usuario_registro_id' => auth()->id(),
]);
```

#### Inyectable IM/IV
```php
$tratamiento = TratamientoInyectable::create([
    'ficha_atencion_id' => 123,
    'tipo' => TratamientoInyectable::TIPO_INYECTABLE_IM_IV,
    'incidentes_procedimiento' => 'Sin incidentes',
    'otras_observaciones_procedimiento' => 'Paciente toleró bien',
    'usuario_registro_id' => auth()->id(),
]);
```

#### Control de Sueros
```php
$tratamiento = TratamientoInyectable::create([
    'ficha_atencion_id' => 123,
    'tipo' => TratamientoInyectable::TIPO_CONTROL_SUEROS,
    'descripcion_sueros' => 'Suero fisiológico 500ml, inicio 14:00, 20 gotas/min',
    'otros_tratamientos_parenterales' => 'Vitamina B12',
    'observaciones_examen_control' => 'Evolución favorable',
    'control_signos_vitales' => 'PA: 120/80, FC: 72, T: 36.5°C',
    'usuario_registro_id' => auth()->id(),
]);
```

### Consultar registros

#### Obtener todos los tratamientos de una ficha
```php
$tratamientos = TratamientoInyectable::where('ficha_atencion_id', 123)->get();
```

#### Filtrar por tipo usando scope
```php
// Solo recetas médicas
$recetas = TratamientoInyectable::tipo(TratamientoInyectable::TIPO_RECETA_MEDICA)
    ->where('ficha_atencion_id', 123)
    ->get();

// Solo control de sueros
$controles = TratamientoInyectable::tipo(TratamientoInyectable::TIPO_CONTROL_SUEROS)
    ->fichaAtencion(123)
    ->get();
```

#### Con relaciones
```php
$tratamiento = TratamientoInyectable::with(['fichaAtencion', 'usuarioRegistro'])
    ->find(1);

echo $tratamiento->usuarioRegistro->name;
echo $tratamiento->fichaAtencion->numero_ficha;
```

### Actualizar un registro
```php
$tratamiento = TratamientoInyectable::find(1);
$tratamiento->update([
    'observaciones_receta' => 'Observaciones actualizadas'
]);
```

### Eliminar un registro (soft delete)
```php
$tratamiento = TratamientoInyectable::find(1);
$tratamiento->delete(); // Eliminación lógica

// Para eliminar definitivamente
$tratamiento->forceDelete();

// Para recuperar un registro eliminado
TratamientoInyectable::withTrashed()->find(1)->restore();
```

### Acceder al nombre del tipo
```php
$tratamiento = TratamientoInyectable::find(1);
echo $tratamiento->tipo_nombre; // Retorna: "Receta Médica", "Inyectable IM/IV" o "Control de Sueros"
```

## Frontend (JavaScript)

Las funciones JavaScript ya están implementadas en:
`resources/views/atencion_otros_prof/secciones_especialidad/ficha_enfermeria.blade.php`

### Funciones disponibles:
1. `guardar_receta_medica_inyectable()` - Guarda receta médica con imágenes
2. `guardar_inyectable_im_iv()` - Guarda inyectable IM/IV
3. `guardar_control_sueros()` - Guarda control de sueros

### Dropzone para imágenes:
- ID del dropzone: `receta-medica-inyectable-enfermeria`
- Variable global: `myDropzone_receta_medica`
- Función de carga: `cargar_lista_imagenes_receta()`

## Rutas

Las rutas ya están configuradas en `routes/web.php`:

```php
Route::post('/guardar_receta_medica_inyectable', [EscritorioEnfermerasController::class, 'guardar_receta_medica_inyectable'])
    ->name('enfermeria.guardar_receta_medica_inyectable');

Route::post('/guardar_inyectable_im_iv', [EscritorioEnfermerasController::class, 'guardar_inyectable_im_iv'])
    ->name('enfermeria.guardar_inyectable_im_iv');

Route::post('/guardar_control_sueros', [EscritorioEnfermerasController::class, 'guardar_control_sueros'])
    ->name('enfermeria.guardar_control_sueros');
```

## Notas Importantes

1. **Formato de imágenes**: El campo `imagenes` es un JSON que contiene un array con la información de cada imagen:
   ```json
   [
     ["url", "nombre_original", "nombre_img", "extension"],
     ["url2", "nombre_original2", "nombre_img2", "extension2"]
   ]
   ```

2. **Soft Deletes**: La tabla usa eliminación lógica, los registros eliminados se marcan con `deleted_at` pero no se eliminan físicamente.

3. **Usuario que registra**: Se guarda automáticamente el ID del usuario autenticado al crear un registro.

4. **Índices**: La tabla tiene índices en `ficha_atencion_id`, `tipo` y `created_at` para mejorar el rendimiento de las consultas.

## Testing

Para probar la funcionalidad:

1. Abrir la ficha de enfermería
2. Ir a la sección "Administración de Tratamiento Inyectable"
3. En el tab "Tratamiento Inyectable", seleccionar una de las 3 opciones
4. Completar los campos correspondientes
5. En "Receta Médica", arrastrar imágenes al dropzone si es necesario
6. Hacer clic en el botón "Guardar"
7. Verificar que aparece el mensaje de éxito y la página se recarga

## Consultas SQL Útiles

```sql
-- Ver todos los tratamientos inyectables
SELECT * FROM tratamientos_inyectables;

-- Ver solo recetas médicas
SELECT * FROM tratamientos_inyectables WHERE tipo = 'receta_medica';

-- Ver tratamientos de una ficha específica
SELECT * FROM tratamientos_inyectables WHERE ficha_atencion_id = 123;

-- Ver tratamientos con imágenes
SELECT * FROM tratamientos_inyectables 
WHERE tipo = 'receta_medica' 
  AND imagenes IS NOT NULL 
  AND JSON_LENGTH(imagenes) > 0;

-- Contar tratamientos por tipo
SELECT tipo, COUNT(*) as total 
FROM tratamientos_inyectables 
GROUP BY tipo;
```

## Solución de Problemas

### Error al ejecutar migración
Si obtienes un error de conexión a base de datos:
1. Verifica el archivo `.env`
2. Asegúrate de que MySQL está ejecutándose
3. Verifica las credenciales de acceso

### Las imágenes no se guardan
1. Verifica que el dropzone esté funcionando correctamente
2. Revisa la consola del navegador para errores JavaScript
3. Verifica que la función `cargar_lista_imagenes_receta()` se esté ejecutando

### Error 500 al guardar
1. Revisa los logs de Laravel en `storage/logs/laravel.log`
2. Verifica que todos los campos requeridos se estén enviando
3. Asegúrate de que el usuario esté autenticado (`auth()->id()` debe retornar un ID válido)
