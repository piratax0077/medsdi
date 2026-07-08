@extends('template.laboratorio.laboratorio_profesional.template')

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
                                <h5 class="m-b-10 font-weight-bold"></h5>
                            </div>
                            <ul class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Pacientes de la Institución</a>
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
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Pacientes</h4>
                                    {{--
                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                        <i class="feather icon-plus"></i> Registrar Paciente
                                    </button>
                                    --}}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $lugares_atencion }}">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-sm-3 col-md-3">
                                    {{--  <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="" oninput="formatoRut(this)">  --}}
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_rut" id="busqueda_rut" placeholder="RUT" value="">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_nombre" id="busqueda_nombre" placeholder="Nombre" value="">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Apellido</label>
                                    <input class="form-control form-control-sm" type="text" name="busqueda_apellido" id="busqueda_apellido" placeholder="Apellido" value="">
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="buscar_paciente();"><i class="feather icon-search"></i> Buscar Paciente</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_pacientes_asistente" class="display table table-striped table-hover dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Paciente</th>
                                            <th class="align-middle">Nacimiento</th>
                                            <th class="align-middle">Contacto</th>
                                            <th class="align-middle">Convenio</th>
                                            <th class="align-middle">Tipo de usuario</th>
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
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-primary">
                                                        @if (isset($pa->Premium()->first()->id))
                                                            Premiun
                                                        @else
                                                            Basico
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
    <!--Cierre: Container Completo-->
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
                $('#tabla_pacientes_asistente').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
                    "pageLength": 5,
                    "ordering": false,
                });

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
                        rows.push([
                            value.nombres + ' ' + value.apellido_uno + ' ' + value.apellido_dos + '<br>' + value.rut,
                            value.fecha_nac,
                            contacto,
                            value.prevision && value.prevision.nombre ? value.prevision.nombre : '',
                            tipo_usuario
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
    </script>
@endsection

