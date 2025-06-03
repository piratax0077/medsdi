<div class="row">
    <div class="col-md-4">
            <div class="form-group">
            <label for="nombre_medicamento_indicaciones{{$counter}}" class="floating-label-activo-sm">Nombre medicamento</label>
            <input type="text" name="nombre_medicamento_indicaciones{{$counter}}" id="nombre_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="dosis_medicamento_indicaciones{{$counter}}" class="floating-label-activo-sm">Dosis</label>
            <input type="text" name="dosis_medicamento_indicaciones{{$counter}}" id="dosis_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="frecuencia_medicamento_indicaciones" class="floating-label-activo-sm">Frecuencia</label>
            <input type="text" name="frecuencia_medicamento_indicaciones{{$counter}}" id="frecuencia_medicamento_indicaciones{{$counter}}" class="form-control form-control-sm">
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-12">
        <button type="button" class="btn btn-danger btn-sm" onclick="ocultar_medicamento_hosp({{ $counter }})"><i class="fas fa-trash"></i>Ocultar</button>
        <button type="button" class="btn btn-success btn-sm" onclick="guardar_medicamento_hosp({{ $counter }})"><i class="fas fa-save"></i>Guardar</button>
    </div>
</div>

<script>
    let medicamentos_hospitalizacion = [];
    function guardar_medicamento_hosp(counter) {
        const nombre = $(`#nombre_medicamento_indicaciones${counter}`).val();
        const dosis = $(`#dosis_medicamento_indicaciones${counter}`).val();
        const frecuencia = $(`#frecuencia_medicamento_indicaciones${counter}`).val();

        if (!nombre || !dosis || !frecuencia) {
            alert("Debe completar todos los campos del medicamento.");
            return;
        }

        // Buscar si ya existe uno con el mismo nombre (ignorando mayúsculas/minúsculas)
        const index = medicamentos_hospitalizacion.findIndex(med => med.nombre.toLowerCase() === nombre.toLowerCase());
        const data = { counter, nombre, dosis, frecuencia };

        if (index >= 0) {
            medicamentos_hospitalizacion[index] = data;
            // Actualizar fila
            $(`#fila_medicamento_${counter}`).html(`
                <td>${nombre}</td>
                <td>${dosis}</td>
                <td>${frecuencia}</td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminar_medicamento(${counter})"><i class="fas fa-trash"></i></button></td>
            `);
        } else {
            medicamentos_hospitalizacion.push(data);
            $('#tabla_medicamentos tbody').append(`
                <tr id="fila_medicamento_${counter}">
                    <td>${nombre}</td>
                    <td>${dosis}</td>
                    <td>${frecuencia}</td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminar_medicamento(${counter})"><i class="fas fa-trash"></i></button></td>
                </tr>
            `);
        }

        // Limpiar formulario
        $(`#medicamento_row_${counter}`).remove();
        ocultar_medicamento_hosp(counter);
    }

    function ocultar_medicamento_hosp(counter){
        $('#contenedor_nuevo_medicamento').empty();
        // limpiar campos
        $('#nombre_medicamento_indicaciones'+counter).val('');
        $('#dosis_medicamento_indicaciones'+counter).val('');
        $('#frecuencia_medicamento_indicaciones'+counter).val('');
    }

    function eliminar_medicamento(counter) {
        medicamentos_hospitalizacion = medicamentos_hospitalizacion.filter(m => m.counter !== counter);
        $(`#fila_medicamento_${counter}`).remove();
    }
</script>
