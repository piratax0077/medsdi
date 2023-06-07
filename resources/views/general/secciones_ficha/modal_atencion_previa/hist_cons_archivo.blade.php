<div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_archivosLabel">Documentos de esta consulta del Paciente:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_archivos').modal('hide');" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_atenciones_previas_archivos"class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Fecha</th>
                            <th class="text-center align-middle">Tipo</th>
                            <th class="text-center align-middle">Ver</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!--fin autollenado-->
            </div>
            <div class="modal-footer">
                <button type="button mt-5" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_archivos').modal('hide');">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    {{--  function buscar_archivos() {
        $('#m_cons_archivos').modal('show');
    }  --}}

    function buscar_archivos(id_ficha_clinica)
    {

        let url = "{{ route('ficha_atencion.ver_archivos') }}";
        let id_ficha = id_ficha_clinica;
        $('#table_atenciones_previas_archivos tbody').html('');

        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_ficha_atencion_soli: id_ficha
                },
                dataType: "json",
            })
            .done(function(data) {
                if (data != null) {

                    $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                    if(data.estado == 1)
                    {
                        $('#table_atenciones_previas_archivos tbody').html('');
                        var j = 1; //contador para asignar id al boton que borrara la fila
                        $.each(data.registros, function(index, value)
                        {
                            var fecha = formatDate(value.fecha);
                            var tipo = value.tipo;
                            var id = value.id;
                            var id_ficha_archivo = value.id_ficha;
                            var url = value.url;

                            var metodo='';
                            switch (tipo) {
                                case 'Certificado de Reposo':
                                    metodo = 'ver_pdf_certificado_reposo'+'('+id_ficha_archivo+')';
                                    break;
                                case 'Interconsulta':
                                    metodo = 'ver_pdf_interconsulta'+'('+id+')';
                                    break;
                                case 'Informen Medico':
                                    metodo = 'ver_pdf_informe_medico'+'('+id_ficha_archivo+')';
                                    break;
                                case 'Uso Personal':
                                    metodo = 'ver_pdf_uso_personal'+'('+id_ficha_archivo+')';
                                    break;

                                default:
                                    metodo = '';
                                    break;
                            }

                            var fila = '';
                            fila += '<tr class="tr_examen" id="row' + j + '">';
                            fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                            fila += '    <td class="text-center align-middle">' + tipo + '</td>';
                            if(metodo != '')
                                fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'; $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                            else
                                fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                            fila += '</tr>';

                            j++;

                            $('#table_atenciones_previas_archivos tbody').append(fila);

                        });
                    }
                    else
                    {
                        $('#table_atenciones_previas_archivos tbody').html('');
                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#table_atenciones_previas_archivos tbody').append(fila);
                    }

                }
                else
                {
                    $('#table_atenciones_previas_archivos tbody').html('');
                    var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                    $('#table_atenciones_previas_archivos tbody').append(fila);
                }
                $('#m_cons_archivos').modal('show');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

            $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
            $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
            $('#table_atenciones_previas_archivos').DataTable({
                responsive: true,
                "bPaginate": false,
                "searching": false
            });

    }
</script>
