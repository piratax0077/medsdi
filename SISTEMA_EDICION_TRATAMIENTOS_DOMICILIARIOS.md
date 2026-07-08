# Sistema de Edición de Tratamientos Domiciliarios

## Resumen de Implementación

Se ha implementado un sistema completo para editar los tratamientos domiciliarios en la ficha de enfermería.

## Características Implementadas

### 1. Botones de Edición en Tablas

Se agregaron botones de edición (icono de lápiz) en las columnas de "Acciones" de las siguientes tablas:

- **Suero - Vía Venosa**: Permite editar medicamentos, hora inicio, hora término, CC/hora, sitio punción, observaciones y fecha
- **Nutrición Parenteral**: Permite editar observaciones
- **Curaciones**: Permite editar observaciones
- **Otros Procedimientos**: Permite editar procedimiento y observaciones

### 2. Modales de Edición

Se crearon 4 modales Bootstrap para editar cada tipo de tratamiento:

1. `modal_editar_suero_venoso`
2. `modal_editar_nutricion_parenteral`
3. `modal_editar_curacion`
4. `modal_editar_otro_procedimiento`

### 3. Funciones JavaScript

#### Funciones de Apertura de Modales:
- `editar_suero_venoso(id, medicamentos, hora_inicio, hora_termino, cc_hora, sitio_puncion, observaciones, fecha)`
- `editar_nutricion_parenteral(id, observaciones)`
- `editar_curacion(id, observaciones)`
- `editar_otro_procedimiento(id, procedimiento, observaciones)`

#### Funciones de Guardado:
- `guardar_edicion_suero_venoso()`
- `guardar_edicion_nutricion_parenteral()`
- `guardar_edicion_curacion()`
- `guardar_edicion_otro_procedimiento()`

Todas las funciones utilizan AJAX para enviar los datos al servidor y muestran mensajes de confirmación con SweetAlert.

### 4. Backend

#### Controlador: `EscritorioEnfermerasController.php`

**Método agregado:**
```php
public function actualizar_tratamiento_domiciliario(Request $request)
```

**Funcionalidad:**
- Busca el registro de `ControlDomiciliario` por ID
- Actualiza los campos recibidos en el request
- Retorna respuesta JSON con estado de la operación
- Maneja errores con bloques try-catch

**Campos que puede actualizar:**
- medicamentos
- hora_inicio
- hora_termino
- cc_hora
- sitio_puncion
- procedimiento
- fecha
- observaciones

### 5. Rutas

**Nueva ruta agregada en `routes/web.php`:**
```php
Route::post('/actualizar_tratamiento_domiciliario', 
    [App\Http\Controllers\EscritorioEnfermerasController::class, 'actualizar_tratamiento_domiciliario'])
    ->name('enfermeria.actualizar_tratamiento_domiciliario');
```

## Archivos Modificados

1. **Vista:** `resources/views/atencion_otros_prof/secciones_especialidad/ficha_enfermeria.blade.php`
   - Agregados botones de edición en las 4 tablas
   - Agregados 4 modales de edición
   - Agregadas 8 funciones JavaScript

2. **Controlador:** `app/Http/Controllers/EscritorioEnfermerasController.php`
   - Agregado método `actualizar_tratamiento_domiciliario()`

3. **Rutas:** `routes/web.php`
   - Agregada ruta `enfermeria.actualizar_tratamiento_domiciliario`

## Flujo de Funcionamiento

1. El usuario hace clic en el botón de edición (icono de lápiz) en una fila de la tabla
2. Se llama a la función JavaScript correspondiente (`editar_*`) con los datos actuales del registro
3. Se abre el modal de edición con los campos pre-llenados
4. El usuario modifica los datos necesarios
5. Al hacer clic en "Guardar Cambios", se llama a la función `guardar_edicion_*()`
6. La función hace una petición AJAX POST a la ruta `enfermeria.actualizar_tratamiento_domiciliario`
7. El controlador actualiza el registro en la base de datos
8. Se muestra un mensaje de confirmación con SweetAlert
9. La página se recarga automáticamente para mostrar los cambios

## Validaciones y Seguridad

- Se utiliza token CSRF en todas las peticiones AJAX
- Se valida que el ID del registro exista antes de actualizar
- Se manejan errores con bloques try-catch
- Se retornan respuestas JSON apropiadas con códigos de estado HTTP
- Se sanitizan los datos en la vista usando `addslashes()` para evitar problemas con comillas

## Compatibilidad

- Compatible con SweetAlert 1 (usado en el sistema)
- Compatible con jQuery y Bootstrap modales
- Diseño responsive (modales adaptables)

## Mejoras Futuras Sugeridas

1. Agregar validación de campos en el frontend antes de enviar
2. Implementar sistema de permisos para verificar quién puede editar
3. Agregar log de cambios para auditoría
4. Implementar validación más estricta en el backend
5. Agregar opción de editar sin recargar la página (actualización dinámica de la tabla)

## Notas Importantes

- La funcionalidad de edición mantiene el mismo estilo visual que el sistema existente
- Se reutiliza la estructura de modales y estilos de Bootstrap del sistema
- Los mensajes de confirmación utilizan la misma configuración de SweetAlert que el resto del sistema
- El botón de edición se coloca antes del botón de eliminar en la columna de acciones
