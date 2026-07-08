<div id="modal_odontograma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_odontograma"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="numero_pieza_historia">Historia del diente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="historia_odontograma"
                                class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Diagnóstico</th>
                                        <th class="text-center align-middle">Tratamiento</th>
                                        <th class="text-center align-middle">Tipo Examen</th>
                                        <th class="text-center align-middle">Caras</th>
                                        <th class="text-center align-middle">Responsable de atención</th>
                                        <th class="text-center align-middle">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function info_odontograma(pieza) {
        console.log(pieza);
        
        // Actualizar título del modal primero
        $('#numero_pieza_historia').html(`Historia del diente - Pieza N° ${pieza}`);
        
        // Destruir tabla existente si existe
        if ($.fn.DataTable.isDataTable('#historia_odontograma')) {
            $('#historia_odontograma').DataTable().destroy();
        }
        
        let url ="{{ route('dental.dame_pieza') }}";
        let id_paciente = dame_id_paciente();
        if(id_paciente == '' || id_paciente == null){
            id_paciente = $('#id_paciente').val();
        }
        
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                pieza: pieza,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: id_paciente,
                _token: "{{ csrf_token() }}"
            },
            success: function (response)  {
                console.log(response);
                
                // Verificar si la respuesta está vacía o no tiene datos
                if (!response || response.length === 0) {
                    // Crear una fila con mensaje de "sin información"
                    const dataVacia = [{
                        fecha: '',
                        diagnostico: '',
                        tratamiento: 'No hay información registrada para esta pieza dental',
                        tipo_examen: '',
                        caras: '',
                        responsable: '',
                        estado: ''
                    }];
                    
                    // Inicializar tabla con mensaje
                    $('#historia_odontograma').DataTable({
                        destroy: true,
                        data: dataVacia,
                        columns: [
                            { data: 'fecha', defaultContent: '' },
                            { data: 'diagnostico', defaultContent: '' },
                            { data: 'tratamiento', className: 'text-center text-muted font-italic', defaultContent: '' },
                            { data: 'tipo_examen', defaultContent: '' },
                            { data: 'caras', defaultContent: '' },
                            { data: 'responsable', defaultContent: '' },
                            { data: 'estado', defaultContent: '' }
                        ],
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                            emptyTable: "No hay información registrada para esta pieza dental",
                            zeroRecords: "No se encontraron registros para esta pieza"
                        },
                        searching: false,
                        paging: false,
                        info: false,
                        ordering: false
                    });
                } else {
                    // Mapea los datos si los nombres de las claves no coinciden
                    const tipoExamenMap = {
                        1: 'Gral',
                        2: 'Endodoncia',
                        3: 'Odontopediatría'
                    };
                    
                    // Mapea los datos si los nombres de las claves no coinciden
                    const data = response.map(item => ({
                        fecha: item.fecha || 'N/A',
                        diagnostico: item.diagnostico || 'N/A',
                        tratamiento: item.tratamiento || 'N/A',
                        tipo_examen: tipoExamenMap[item.tipo_examen] || 'Otro',
                        caras: item.diagnosticocaras || 'N/A',
                        responsable: item.profesional || 'N/A',
                        estado: item.estado == 1 ? 'TERMINADO' : 'EN ESPERA'
                    }));

                    // Inicializa o actualiza la tabla con datos
                    $('#historia_odontograma').DataTable({
                        destroy: true,
                        data: data,
                        columns: [
                            { data: 'fecha', defaultContent: 'N/A' },
                            { data: 'diagnostico', defaultContent: 'N/A' },
                            { data: 'tratamiento', defaultContent: 'N/A' },
                            { data: 'tipo_examen', defaultContent: 'N/A' },
                            { data: 'caras', defaultContent: 'N/A' },
                            { data: 'responsable', defaultContent: 'N/A' },
                            { data: 'estado', defaultContent: 'N/A' }
                        ],
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                        },
                        responsive: true,
                        ordering: true,
                        order: [[0, 'desc']] // Ordenar por fecha descendente
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log('Error al obtener información de la pieza:', error);
                
                // Crear tabla con mensaje de error
                const dataError = [{
                    fecha: '',
                    diagnostico: '',
                    tratamiento: 'Error al cargar la información de la pieza dental',
                    tipo_examen: '',
                    caras: '',
                    responsable: '',
                    estado: ''
                }];
                
                $('#historia_odontograma').DataTable({
                    destroy: true,
                    data: dataError,
                    columns: [
                        { data: 'fecha', defaultContent: '' },
                        { data: 'diagnostico', defaultContent: '' },
                        { data: 'tratamiento', className: 'text-center text-danger font-italic', defaultContent: '' },
                        { data: 'tipo_examen', defaultContent: '' },
                        { data: 'caras', defaultContent: '' },
                        { data: 'responsable', defaultContent: '' },
                        { data: 'estado', defaultContent: '' }
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                        emptyTable: "Error al cargar la información",
                        zeroRecords: "Error al cargar la información"
                    },
                    searching: false,
                    paging: false,
                    info: false,
                    ordering: false
                });
            }
        });
        
        $('#modal_odontograma').modal('show');
    }
</script>
