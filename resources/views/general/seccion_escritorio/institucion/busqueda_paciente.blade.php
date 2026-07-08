@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb mt-3">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Buscar pacientes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Buscador de pacientes-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Buscar pacientes</h4>
                                    {{--
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                        <i class="feather icon-plus"></i> Registrar paciente
                                    </button>
                                    --}}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion->id }}">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    {{--  <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="" oninput="formatoRut(this)">  --}}
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_nombre" id="busqueda_nombre" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <label class="floating-label-activo-sm">Apellido</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_apellido" id="busqueda_apellido" value="">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <button type="button" class="btn btn-info btn-block btn-sm" onclick="buscar_paciente();"><i class="feather icon-search"></i> Buscar paciente</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table id="tabla_pacientes_asistente" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Paciente</th>
                                                <th class="align-middle">Nacimiento</th>
                                                <th class="align-middle">Contacto</th>
                                                <th class="align-middle">Convenio</th>
                                                <th class="align-middle">Tipo de usuario</th>
                                                <th class="align-middle">Estado Paciente</th>
                                                <th class="align-middle">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  @foreach ($asistente->Paciente_normal() as $pa )
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ $pa->nombre }}
                                                        {{ $pa->apellido_uno }}
                                                        {{ $pa->apellido_dos }}
                                                        <br>
                                                        {{ $pa->rut }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ \Carbon\Carbon::parse($pa->fecha_nac)->format('d-m-Y') }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $pa->Direccion()->first()->direccion }}
                                                        #{{ $pa->Direccion()->first()->numero_dir }},
                                                        {{ $pa->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        <br>
                                                        {{ $pa->email }}
                                                        <br>
                                                        {{ $pa->telefono_uno }}
                                                        </td>
                                                    <td class="align-middle">
                                                    {{ $pa->Prevision()->first()->nombre }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary">
                                                            @if (isset($pa->Premium()->first()->id))
                                                                Premiun
                                                            @else
                                                                Básico
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach  --}}
                                        </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection

@section('modales')
    <!-- Modal para marcar estado del paciente -->
    <div class="modal fade" id="modal_estado_paciente" tabindex="-1" role="dialog" aria-labelledby="modalEstadoPaciente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modalEstadoPaciente">
                        <i class="feather icon-alert-triangle"></i> Marcar Estado del Paciente
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_paciente_estado" name="id_paciente_estado">
                    <input type="hidden" id="id_lugar_atencion_estado" name="id_lugar_atencion_estado">

                    <div class="form-group">
                        <label class="floating-label-activo" for="nombre_paciente_estado">Paciente</label>
                        <input type="text" class="form-control form-control-sm" id="nombre_paciente_estado" readonly>
                    </div>

                    <div class="form-group">
                        <label class="floating-label-activo" for="tipo_estado_paciente">Tipo de Estado <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" id="tipo_estado_paciente" name="tipo_estado_paciente">
                            <option value="">Seleccione un estado</option>
                            <option value="1">Paciente Conflictivo</option>
                            <option value="2">Paciente VIP</option>
                            <option value="3">Paciente con Restricciones</option>
                            <option value="4">Paciente con Deuda</option>
                            <option value="5">Paciente Moroso</option>
                            <option value="6">Paciente Prioritario</option>
                            <option value="7">Otro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="floating-label-activo" for="id_profesional_estado floating-label-activo">Profesional que marca <span class="text-danger">*</span></label>
                        <select class="form-control form-control-sm" id="id_profesional_estado" name="id_profesional_estado">
                            <option value="">Seleccione un profesional</option>
                            @if(isset($profesionales))
                                @foreach($profesionales as $prof)
                                    <option value="{{ $prof->id }}">{{ $prof->nombre }} {{ $prof->apellido_uno }} {{ $prof->apellido_dos }} - {{ $prof->especialidad }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="floating-label-activo" for="observaciones_estado floating-label-activo">Observaciones <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-sm" id="observaciones_estado" name="observaciones_estado" rows="4" placeholder="Ingrese las observaciones sobre el estado del paciente..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="feather icon-x"></i> Cancelar
                    </button>
                    <button type="button" class="btn btn-info btn-sm" onclick="guardar_estado_paciente();">
                        <i class="feather icon-save"></i> Guardar Estado
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Cierre Modal para marcar estado del paciente -->
    <!-- Modal para ver detalle del paciente -->
    <div class="modal fade" id="modal_detalle_paciente" tabindex="-1" role="dialog" aria-labelledby="modalDetallePaciente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modalDetallePaciente">
                        <i class="feather icon-eye"></i> Detalle del Paciente
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí se cargará el detalle del paciente mediante AJAX -->
                    <div id="detalle_paciente_contenido">
                        Cargando...
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cierre Modal para ver detalle del paciente -->
@endsection

@section('page-script')
    <script>
        $(document).ready(function()
        {
            {{-- ****** VALIDACIONDEFORMULARIOS ****** --}}
            {{--  VALIDACION RUT BUSQUEDA --}}
            $("#busqueda_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            {{--  $('#busqueda_rut').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                },
                messages: {
                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                },
            });  --}}

            // datatable
            $('#tabla_pacientes_asistente').DataTable();

        });

        function buscar_paciente()
        {
            var table = $('#tabla_pacientes_asistente').DataTable();
            table.clear().draw();
            var rut = $('#busqueda_rut').val();
            var nombre = $('#busqueda_nombre').val();
            var apellido = $('#busqueda_apellido').val();
            if(rut == '' && nombre == '' && apellido == ''){
                swal({
                    title: "Busqueda de Paciente.",
                    text:"Debe Ingresar al menos un datos de busqueda.",
                    icon: "error",
                });
                $('#busqueda_rut').focus();
                return false;
            }

            // Mostrar mensaje de cargando
            swal({
                title: 'Buscando...',
                text: 'Por favor espere mientras se realiza la búsqueda.',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
            });

            let url = "{{ route('laboratorio.buscar_paciente_rut') }}";
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    rut: rut,
                    nombre: nombre,
                    apellido: apellido,
                },
            })
            .done(function(data) {
                console.log(data);
                swal.close();
                if (data.estado == 1 && Array.isArray(data.registros) && data.registros.length > 0)
                {
                    var rows = [];
                    $.each(data.registros, function(key, value){
                        var direccion = value.direccion ? value.direccion.direccion : '';
                        var numero_dir = value.direccion ? value.direccion.numero_dir : '';
                        var ciudad = (value.direccion && value.direccion.ciudad && value.direccion.ciudad.nombre) ? value.direccion.ciudad.nombre : '';
                        var contacto = direccion + ' #' + numero_dir + ', ' + ciudad + '<br>' + value.email + '<br>' + value.telefono_uno;
                        var tipo_usuario = '<span class="badge badge-primary">' + (value.premiun == 1 ? 'Premiun' : 'Basico') + '</span>';
                        var estado_paciente = value.estado;
                        var estado_html = '';
                        if(estado_paciente == 1){
                            estado_html = '<span class="badge badge-danger" data-toggle="tooltip">Conflictivo</span>';
                        }else if(estado_paciente == 2){
                            estado_html = '<span class="badge badge-success" data-toggle="tooltip">VIP</span>';
                        }else if(estado_paciente == 3){
                            estado_html = '<span class="badge badge-warning" data-toggle="tooltip">Con Restricciones</span>';
                        }else if(estado_paciente == 4){
                            estado_html = '<span class="badge badge-dark" data-toggle="tooltip">Con Deuda</span>';
                        }else if(estado_paciente == 5){
                            estado_html = '<span class="badge badge-secondary" data-toggle="tooltip">Moroso</span>';
                        }else if(estado_paciente == 6){
                            estado_html = '<span class="badge badge-info" data-toggle="tooltip">Prioritario</span>';
                        }else if(estado_paciente == 7){
                            estado_html = '<span class="badge badge-primary" data-toggle="tooltip">Otro</span>';
                        }else{
                            estado_html = '<span class="badge badge-purple">Normal</span>';
                        }
                        var acciones = '<button class="btn btn-warning btn-icon mr-1" onclick="abrir_modal_estado('+value.id+', \''+value.nombres+' '+value.apellido_uno+' '+value.apellido_dos+'\')" data-toggle="tooltip" data-placement="top" title="Marcar estado del paciente"><i class="feather icon-alert-triangle"></i></button>';
                        acciones += '<button class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Ver detalle del paciente" onclick="ver_detalle_paciente('+value.id+')"><i class="feather icon-eye"></i></button>';
                        rows.push([
                            value.nombres + ' ' + value.apellido_uno + ' ' + value.apellido_dos + '<br>' + value.rut,
                            value.fecha_nac,
                            contacto,
                            value.prevision && value.prevision.nombre ? value.prevision.nombre : '',
                            tipo_usuario,
                            estado_html,
                            acciones
                        ]);
                    });
                    table.rows.add(rows).draw();
                }
                else
                {
                    table.clear().draw();
                    swal({
                        title: "Sin resultados",
                        text: "Paciente no encontrado",
                        icon: "warning",
                        timer: 2000,
                        buttons: false
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                swal.close();
                swal({
                    title: "Error",
                    text: "Ocurrió un error al buscar pacientes.",
                    icon: "error",
                    timer: 2000,
                    buttons: false
                });
            });
        }

        function ver_detalle_paciente(id_paciente){
            let url = "{{ route('asistente_adm.detalle_paciente') }}";
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    id_paciente: id_paciente,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    // Construir HTML con los datos del paciente
                    let html = '';
                    let paciente = data.paciente;
                    let info_estado = data.info_estado;

                    html += '<div class="row">';
                    html += '    <div class="col-md-6">';
                    html += '        <div class="card mb-3">';
                    html += '            <div class="card-header bg-info text-white">';
                    html += '                <h6 class="mb-0 text-white"><i class="feather icon-user"></i> Información Personal</h6>';
                    html += '            </div>';
                    html += '            <div class="card-body">';
                    html += '                <p><strong>Nombre:</strong> ' + paciente.nombres + ' ' + paciente.apellido_uno + ' ' + paciente.apellido_dos + '</p>';
                    html += '                <p><strong>RUT:</strong> ' + paciente.rut + '</p>';
                    html += '                <p><strong>Fecha de Nacimiento:</strong> ' + paciente.fecha_nac + '</p>';
                    html += '                <p><strong>Sexo:</strong> ' + (paciente.sexo == 'M' ? 'Masculino' : 'Femenino') + '</p>';
                    html += '                <p><strong>Email:</strong> ' + (paciente.email || 'No registrado') + '</p>';
                    html += '                <p><strong>Teléfono:</strong> ' + (paciente.telefono_uno || 'No registrado') + '</p>';
                    html += '            </div>';
                    html += '        </div>';
                    html += '    </div>';

                    html += '    <div class="col-md-6">';

                    // Información del Estado del Paciente
                    if (info_estado) {
                        let badge_class = '';
                        switch(data.estado_paciente.estado) {
                            case 1: badge_class = 'danger'; break;
                            case 2: badge_class = 'success'; break;
                            case 3: badge_class = 'warning'; break;
                            case 4: badge_class = 'dark'; break;
                            case 5: badge_class = 'secondary'; break;
                            case 6: badge_class = 'info'; break;
                            case 7: badge_class = 'primary'; break;
                            default: badge_class = 'light';
                        }

                        html += '        <div class="card mb-3">';
                        html += '            <div class="card-header bg-warning text-white">';
                        html += '                <h6 class="mb-0"><i class="feather icon-alert-triangle"></i> Estado del Paciente</h6>';
                        html += '            </div>';
                        html += '            <div class="card-body">';
                        html += '                <p><strong>Estado:</strong> <span class="badge badge-' + badge_class + '">' + info_estado.tipo_estado + '</span></p>';
                        html += '                <p><strong>Fecha Registro:</strong> ' + new Date(info_estado.fecha_registro).toLocaleDateString('es-CL') + '</p>';
                        html += '                <p><strong>Lugar Atención:</strong> ' + (info_estado.lugar_atencion || 'No especificado') + '</p>';
                        html += '                <p><strong>Responsable:</strong> ' + (info_estado.responsable || 'No especificado') + '</p>';
                        html += '                <p><strong>Observaciones:</strong></p>';
                        html += '                <p class="text-muted">' + (info_estado.observaciones || 'Sin observaciones') + '</p>';
                        html += '            </div>';
                        html += '        </div>';
                    } else {
                        html += '        <div class="card mb-3">';
                        html += '            <div class="card-header bg-light">';
                        html += '                <h6 class="mb-0"><i class="feather icon-info"></i> Estado del Paciente</h6>';
                        html += '            </div>';
                        html += '            <div class="card-body">';
                        html += '                <p class="text-muted">Este paciente no tiene estados registrados.</p>';
                        html += '            </div>';
                        html += '        </div>';
                    }

                    html += '    </div>';
                    html += '</div>';

                    $('#detalle_paciente_contenido').html(html);
                }
                else
                {
                    $('#detalle_paciente_contenido').html('<div class="alert alert-danger" role="alert">No se pudo cargar el detalle del paciente.</div>');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                $('#detalle_paciente_contenido').html('<div class="alert alert-danger" role="alert">Ocurrió un error al cargar el detalle del paciente.</div>');
            });
            // abrir modal con detalle del paciente
            $('#modal_detalle_paciente').modal('show');
        }

        function abrir_modal_estado(id_paciente, nombre_paciente){
            $('#id_paciente_estado').val(id_paciente);
            $('#id_lugar_atencion_estado').val($('#id_lugar_atencion').val());
            $('#nombre_paciente_estado').val(nombre_paciente);
            $('#tipo_estado_paciente').val('');
            $('#id_profesional_estado').val('');
            $('#observaciones_estado').val('');
            $('#modal_estado_paciente').modal('show');
        }

        function guardar_estado_paciente(){
            var id_paciente = $('#id_paciente_estado').val();
            var id_lugar_atencion = $('#id_lugar_atencion_estado').val();
            var tipo_estado = $('#tipo_estado_paciente').val();
            var id_profesional = $('#id_profesional_estado').val();
            var observaciones = $('#observaciones_estado').val();

            // Validaciones
            if(tipo_estado == ''){
                swal({
                    title: "Error",
                    text: "Debe seleccionar un tipo de estado",
                    icon: "error",
                    buttons: "Aceptar",
                });
                return false;
            }

            if(id_profesional == ''){
                swal({
                    title: "Error",
                    text: "Debe seleccionar el profesional que marca el estado",
                    icon: "error",
                    buttons: "Aceptar",
                });
                return false;
            }

            if(observaciones.trim() == ''){
                swal({
                    title: "Error",
                    text: "Debe ingresar observaciones sobre el estado del paciente",
                    icon: "error",
                    buttons: "Aceptar",
                });
                return false;
            }

            let url = "{{ route('asistente_adm.guardar_estado_paciente') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id_paciente: id_paciente,
                    id_lugar_atencion: id_lugar_atencion,
                    tipo_estado: tipo_estado,
                    id_profesional: id_profesional,
                    observaciones: observaciones,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    $('#modal_estado_paciente').modal('hide');
                    swal({
                        title: "Estado guardado",
                        text: "El estado del paciente se ha guardado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                    // Recargar la búsqueda
                    buscar_paciente();
                }
                else
                {
                    swal({
                        title: "Error",
                        text: data.msj,
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                swal({
                    title: "Error",
                    text: "Ocurrió un error al guardar el estado del paciente",
                    icon: "error",
                    buttons: "Aceptar",
                });
            });
        }
    </script>
@endsection
