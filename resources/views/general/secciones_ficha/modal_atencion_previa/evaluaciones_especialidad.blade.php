<div id="m_eval_espec" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m_paciente" onclick="('#m_eval_espec').modal('hide'); ">Datos de consulta de: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="eval_especialidad_contenido">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" onclick="$('#m_eval_espec').modal('hide'); ">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_evaluaciones_especialidad(id_ficha_clinica){
            let url = "{{ ROUTE('profesional.buscar_evaluaciones_especialidad') }}";
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    id_ficha_atencion: id_ficha_clinica,
                },
                success: function(data){
                    console.log(data);
                    let paciente = data.paciente;
                    let evaluaciones = data.evaluaciones;
                    let nombreCompleto = `${paciente.nombres} ${paciente.apellido_uno} ${paciente.apellido_dos}`;

                    // ✅ Mostrar nombre en el título del modal
                    $('#m_paciente').html(`Datos de consulta de: <strong>${nombreCompleto}</strong>`);
                    // Generar contenido HTML para los campos no nulos
                    let contenido = '<ul class="list-group">';

                    for (const [key, value] of Object.entries(evaluaciones)) {
                        if (value !== null && value !== '' && key !== 'id' && key !== 'id_profesional' && key !== 'id_ficha_atencion' && key !== 'id_ficha_cirugia' && key !== 'id_paciente' && key !== 'created_at' && key !== 'updated_at' && key !== 'estado') {
                            const label = key.replace(/_/g, ' ').toUpperCase();
                            contenido += `<li class="list-group-item"><strong>${label}:</strong> ${value}</li>`;
                        }
                    }

                    contenido += '</ul>';

                    // Insertar el contenido en el modal
                    $('#eval_especialidad_contenido').html(contenido);
                    // abrir modal
                    $('#m_eval_espec').modal('show');
                }
            });
        }
</script>
