<div class="modal fade" id="modal_validar_certificado">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_validar_certificadoLabel">Validar Certificado de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_certificado">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function abrir_validar_certificado()
    {
        $('#modal_validar_certificado').modal('show');
        $('#cuerpo_modal_validar_certificado').html('');

        let url = "{{ route('validar.certificado') }}";

        var _token = '{{ csrf_token() }}';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_2: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_3: "{{ app('request')->input('tkx') }}",
                tkx_4: "{{ str_shuffle(app('request')->input('tkx')) }}",
                tkx_5: "{{ str_shuffle(app('request')->input('tkx')) }}",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    var html = '';
                    /** DOCUMENTO */
                    html += '<div class="row">';
                    html += '   <div class="col-6">Tipo de Documento: </div><div class="col-6">'+data.documento.tipo_control+'</div>';
                    html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                    html += '   <div class="col-6">Fecha de Elaboración: </div><div class="col-6">'+data.documento.fecha_elaboracion+'</div>';
                    html += '</div>';
                    /** PROFESIONAL */
                    html += '<div class="row mt-2">';
                    html += '   <div class="col-6">Profesional Responsable: </div><div class="col-6" style="line-height: 0.8rem;">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span style="font-size:9px;">'+data.profesional.rut+'</span></div>';
                    html += '</div>';
                    /** PACIENTE */
                    html += '<div class="row mt-2">';
                    html += '   <div class="col-6">Paciente Receptor: </div><div class="col-6" style="line-height: 0.8rem;">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span style="font-size:9px;">'+data.paciente.rut+'</span></div>';
                    html += '</div>';

                    $('#cuerpo_modal_validar_certificado').html(html);
                }
                else
                {
                    $('#cuerpo_modal_validar_certificado').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
