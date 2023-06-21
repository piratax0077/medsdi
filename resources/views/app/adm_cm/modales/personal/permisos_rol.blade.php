<div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Permisos para Asistentes Agregar/Modificar/Eliminar </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <input type="hidden" name="permisos_rol_id" id="permisos_rol_id" value="">
            </div>
            <div class="modal-body">
                <div class="row" >
                    @if(isset($lista_tipo_asistente))
                        @foreach ($lista_tipo_asistente as $tipo_asistente)
                            <div class="col-md-12">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" data-rol="{{ str_replace([' ', 'Publico', 'Consulta','Administrativo'], ['', 'Caja','','Adm'], $tipo_asistente->nombre) }}" id="rol_permiso_{{ $tipo_asistente->id }}" onchange="modificar_rol({{ $tipo_asistente->id }}, 'Asistente', 'rol_permiso_{{ $tipo_asistente->id }}' )">
                                    <label class="custom-control-label" for="rol_permiso_{{ $tipo_asistente->id }}">{{ $tipo_asistente->nombre }}</label>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- <div class="col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="rol_permiso_1">
                            <label class="custom-control-label" for="rol_permiso_1">permiso 1 (nombres de permisos x definir)</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="rol_permiso_2">
                            <label class="custom-control-label" for="rol_permiso_2">permiso 2 (nombres de permisos x definir)</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="rol_permiso_3">
                            <label class="custom-control-label" for="rol_permiso_3">permiso 3 (nombres de permisos x definir)</label>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button> --}}
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function roles_permisos(tipo, id_asistente, roles)
    {
        var mensaje = '';
        if(tipo == '')
        {
            mensaje = 'Rol Actual del Asistente requerido.';
             swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }
        if(id_asistente == '')
        {
            mensaje = 'ID Asistente requerido';
             swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var temp = roles.split(',');

        /** limpieza */
        $('#permisos_rol').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
            {
                $(element).prop('checked', '');
            }
            else if($(element).attr('type') == 'hidden')
            {
                $(element).val('');
            }
        });

        /** activar */
        $('#permisos_rol').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
            {
                temp.forEach(element2 => {
                    if(element2 == $(element).attr('data-rol'))
                        $(element).prop('checked', true);
                });
            }
        });

        $('#permisos_rol').modal('show');
        $('#permisos_rol_id').val(id_asistente);
    }

    function modificar_rol(id_tipo, id_tipo_movimiento, id_checkbox )
    {
        let _token = CSRF_TOKEN;
        let url = "{{ route('adm_cm.personal.asistente.actualizar.rol') }}";

        var movimiento = 0;
        if($('#'+id_checkbox).prop('checked'))
            movimiento = 1;
        else
            movimiento = 0;

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_user : $('#permisos_rol_id').val(),
                id_tipo : $('#'+id_checkbox).attr('data-rol'),
                id_tipo_movimiento : id_tipo_movimiento,
                movimiento : movimiento,
            },
        })
        .done(function(data) {
            if (data != null) {
                if(data.estado == 1)
                {
                    swal({
                        title: "Actualizacion de permiso",
                        text: 'Registro Exitoso.',
                        icon: "success",
                        buttons: "Aceptar",
                    });
                    cargar_tabla_asistentes();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Actualizacion de permiso",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar ingresar personal",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


</script>
