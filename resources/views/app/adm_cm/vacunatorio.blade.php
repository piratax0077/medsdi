@extends('template.adm_cm.template')
@section('content')


<!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center mt-3">
                            <div class="col-md-12">
                                <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Enfermería</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="wid-60 align-self-start mr-3"  src="{{ asset('images/iconos/vacunatorio.svg') }}">
                          <div class="media-body">
                           <h4 class="text-c-blue">Vacunatorio y procedimientos de enfermería</h4>
                           <p>Área destinada a vacunación y procedimientos de enfermería orientados a la atención clínica de pacientes</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card py-0">
                    <div class="card-body pb-2 pt-2">
                        <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="prof-vacunatorio-cm-tab" data-toggle="pill" href="#prof-vacunatorio-cm" role="tab" aria-controls="prof-odonto-cm" aria-selected="true">
                                    Profesionales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ex-vacunatorio-cm-tab" data-toggle="pill" href="#ex-vacunatorio-cm" role="tab" aria-controls="ex-odonto-cm" aria-selected="false">
                                    Exámenes
                                </a>
                            </li>
                             {{-- <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="proc-vacunatorio-cm-tab" data-toggle="pill" href="#proc-vacunatorio-cm" role="tab" aria-controls="proc-odonto-cm" aria-selected="false">
                                   Procedimientos
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                <div class="tab-content">
                    <!--PROFESIONALES-->
                    <div class="tab-pane show active" id="prof-vacunatorio-cm" role="tabpanel" aria-labelledby="prof-vacunatorio-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">

                                                <h5 class="d-inline"><i class="feather icon-user icono-primary"></i>Profesionales</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="asociar_profesional();"><i class="feather icon-plus"></i> Añadir profesional</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_prof_imagenologia" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Profesional</th>
                                                    <th>Especialidad</th>
                                                    <th>Contacto</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($enfermeras) && count($enfermeras) > 0)
                                                    @foreach($enfermeras as $enfermera)
                                                        <tr>
                                                            <td>
                                                                <span><strong>{{ $enfermera->nombre.' '.$enfermera->apellido_uno.' '.$enfermera->apellido_dos }}</strong></span><br>
                                                                <span>{{ $enfermera->rut }}</span>
                                                            </td>
                                                            <td>
                                                                {{ $enfermera->especialidad ?? 'N/A' }}
                                                            </td>
                                                            <td>
                                                                <span><i class="feather icon-phone icono-tabla"></i> {{ $enfermera->telefono_uno }}</span> <br>
                                                                <span><i class="feather icon-mail icono-tabla"></i> {{ $enfermera->email }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $enfermera->lugar_atencion ?? 'N/A' }}</span>
                                                            </td>
                                                            <td>
                                                                <label class="switch-moderno">
                                                                    <input type="checkbox" id="switchEstado" onchange="cambiar_estado_profesional({{ $enfermera->id_profesional_lugar }})" {{ $enfermera->estado_contrato == 1 ? 'checked' : '' }}>
                                                                    <span class="switch-slider">
                                                                        <span class="switch-text off">
                                                                            Inactivo
                                                                        </span>
                                                                        <span class="switch-text on">
                                                                            Activo
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-warning btn-icon btn-sm" onclick="contacto({{ $enfermera->id }})" title="Editar"><i class="feather icon-user"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--EXÁMENES-->
                    <div class="tab-pane fade" id="ex-vacunatorio-cm" role="tabpanel" aria-labelledby="ex-vacunatorio-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                     <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Exámenes</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="ag_procedimiento();"><i class="feather icon-plus"></i> Añadir exámenes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_examenes" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Procedimiento</th>
                                                    <th>Código</th>
                                                    <th>Bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($procedimientos as $procedimiento)
                                                    <tr>
                                                        <td>{{ $procedimiento->nombre }}</td>
                                                        <td>{{ $procedimiento->cod_examen }}</td>
                                                         <td>{{ $procedimiento->cantidad_bloques }}</td>
                                                        <td>${{ number_format($procedimiento->valor, 0, ',', '.') }}</td>
                                                        <td>{{ $procedimiento->lugar_atencion ?? 'N/A' }}</td>
                                                        <td>
                                                            <label class="switch-moderno">
                                                                <input type="checkbox" id="switchEstado" {{ $procedimiento->activo == 1 ? 'checked' : '' }}>
                                                                <span class="switch-slider">
                                                                        <span class="switch-text off">
                                                                         Inactivo
                                                                        </span>
                                                                        <span class="switch-text on">
                                                                        Activo
                                                                        </span>
                                                                </span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <button class="btn-warning btn btn-icon" onclick="mostrar_procedimiento({{ $procedimiento->id }})"><i class="feather icon-edit"></i></button>
                                                            <button class="btn-danger btn btn-icon" onclick="eliminar_procedimiento_cm({{ $procedimiento->id }})"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Procedimientos-->
                    <div class="tab-pane fade" id="proc-vacunatorio-cm" role="tabpanel" aria-labelledby="proc-vacunatorio-cm-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header-principal">
                                        <div class="row">
                                            <div class="col-md-12 align-botton">
                                                <h5 class="d-inline"><i class="feather icon-file icono-primary"></i>Procedimiento</h5>
                                                  <button type="button" class="btn btn-info btn-sm d-inline float-md-right" onclick="agregar_procedimiento();"><i class="feather icon-plus"></i> Añadir procedimiento</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                            </div>
                                        </div>
                                        <table id="tabla_proc_imagenologia" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre del exámen</th>
                                                    <th>Descripción</th>
                                                    <th>Cantidad de bloques</th>
                                                    <th>Valor</th>
                                                    <th>Lugar de atención</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>5665456</td>
                                                    <td>Nombre examen</td>
                                                    <td>Descripción</td>
                                                    <td>3</td>
                                                    <td>$30.000</td>
                                                    <td>
                                                        <span>{{ $odontologo->lugar_atencion ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>
                                                        <label class="switch-moderno">
                                                            <input type="checkbox" id="switchEstado">
                                                            <span class="switch-slider">
                                                                    <span class="switch-text off">
                                                                     Inactivo
                                                                    </span>
                                                                    <span class="switch-text on">
                                                                    Activo
                                                                    </span>
                                                            </span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button class="btn-warning btn btn-icon"><i class="feather icon-edit"></i></button>
                                                        <button class="btn-danger btn btn-icon"><i class="feather icon-x"></i></button>
                                                    </td>
                                                </tr>
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
            <!--Cierre: Header-->
            <!--Row Botones-->
            {{--<div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card-deck">
                        <!--Cierre de Card-->
                        <div class="card  subir py-1">
                            <a href="{{ ROUTE('adm_cm.vacunatorio_felicitreclamos') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="{{ asset('images/iconos/estadisticas_2.svg') }}">
                                    <h5 class="mt-3">Reclamos y Felicitaciones</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card py-1 subir">
                            <a href="{{ ROUTE('adm_cm.vacunatorio_personal') }}">
                                <div class="card-body text-center" style="cursor:pointer" data-url="enviar.php">
                                    <img class="wid-80 text-center" src="{{ asset('images/iconos/equipo.svg') }}">
                                    <h5 class="mt-3"> Personal</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card  subir py-1">
                            <a href="{{ ROUTE('adm_cm.vacunatorio_pedidos') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="{{ asset('images/iconos/inventario.svg') }}">
                                    <h5 class="mt-3">Pedidos de Vacunas e Insumos</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card  subir py-1">
                            <a href="{{ ROUTE('adm_cm.vacunatorio_instalaciones') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="{{ asset('images/iconos/perfiles.svg') }}">
                                    <h5 class="mt-3">Instalaciones</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>



    <!--Cierre: Container Completo-->
    {{--  MODAL EXAMEN RÁPIDO  --}}
    <div id="a_procedimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_procedimiento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir Procedimiento</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_nombre" id="a_procedimeinto_nombre" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Descripción</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_descripcion" id="a_procedimeinto_descripcion" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Cantidad Bloques</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_cantidad_bloques" id="a_procedimeinto_cantidad_bloques" step="1" max="24" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Valor $</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_valor" id="a_procedimeinto_valor" step="1"  value="0">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_procedimiento()">Añadir</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalMostrarPrestacion" tabindex="-1" aria-labelledby="modalMostrarPrestacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMostrarPrestacionLabel">Editar prestacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_prestacion_editar" name="id_prestacion_editar" value="">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="nombre_prestacion">Nombre del procedimiento</label>
                            <input type="text" name="nombre_prestacion" id="nombre_prestacion" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="cantidad_bloques_prestacion">Cantidad Bloques</label>
                            <input type="number" name="cantidad_bloques_prestacion" id="cantidad_bloques_prestacion" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="valor_prestacion">Valor</label>
                            <input type="number" name="valor_prestacion" id="valor_prestacion" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="indicaciones_prestacion">Indicaciones del procedimiento para el paciente</label>
                            <textarea name="indicaciones_prestacion" id="indicaciones_prestacion" class="form-control form-control-sm" rows="4" placeholder="Ingrese las indicaciones que el paciente debe seguir para este procedimiento..."></textarea>
                        </div>
                    </div>
                </div>


                <button type="button" class="btn btn-info btn-sm float-right" id="btn_guardar_procedimiento" onclick="editar_prestacion()"><i class="fas fa-plus"></i>  Agregar otro diagnostico</button>
                {{-- <table class="table w-100" id="table_procedimientos_propios_dental">
                    <thead>
                        <tr>
                            <th>Procedimiento</th>
                            <th>UCO</th>
                            <th>¿Laboratorio?</th>
                            <th>Bloques</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mis_trabajos_profesional as $mi_trabajo)
                            <tr>
                                <td>{{ $mi_trabajo->descripcion }}</td>
                                <td>{{ $mi_trabajo->uco }}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                        <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>
                                <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                                <td>
                                    <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                    <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>-->
            </div>
        </div>
    </div>
	@endsection

    @section('page-script')
    <script>
        $(document).ready(function() {
            $('#tabla_prof_imagenologia').DataTable({
                order: [[0, 'asc']], // Ordena por la primera columna (Profesional)
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                }
            });
            $('#tabla_examenes').DataTable({
                order: [[0, 'asc']], // Ordena por la primera columna (Procedimiento)
                responsive: true,
            });
             $('#tabla_proc_imagenologia').DataTable({
                order: [[0, 'asc']], // Ordena por la primera columna (Código)
                responsive: true,
            });
        });
         function contacto(id)
        {
            let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
            url = url.replace('__id__', id);

            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#contacto_prof_rut').html(data.registro.rut);
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function cambiar_estado_profesional(id_profesional, estado) {
            $.ajax({
                url: '{{ route("profesional.cambiar_estado") }}', // Ruta que crearás en Laravel
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN, // Asegúrate de tener CSRF_TOKEN definido
                    id: id_profesional,
                    estado: estado
                },
                success: function(response) {
                    console.log(response);
                    if(response.success){
                        swal({
                            title: "Estado actualizado",
                            text: response.message,
                            icon: "success",
                        }).then(() => {
                            location.reload(); // Recarga la página para reflejar el cambio
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                        });
                    }
                },
                error: function() {
                    swal({
                        title: "Error al cambiar el estado",
                        text: "Ocurrió un error al intentar cambiar el estado del profesional. Por favor, inténtalo de nuevo.",
                        icon: "error",
                    })
                }
            });
        }

    function ag_procedimiento(){
        $('#a_procedimiento').modal('show');
    }
    function guardar_procedimiento(){
        let nombre = $('#a_procedimeinto_nombre').val();
        let descripcion = $('#a_procedimeinto_descripcion').val();
        let cantidad_bloques = $('#a_procedimeinto_cantidad_bloques').val();
        let valor = $('#a_procedimeinto_valor').val();
        let valido = 1;
        let mensaje = '';
        // validar campos
        if(nombre == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido nombre\n';
        }
        // if(descripcion == 0)
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido descripcion\n';
        // }
        if(cantidad_bloques == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido cantidad bloques\n';
        }


        if(valido == 1)
        {
            let data = {
                id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                nombre : nombre,
                descripcion : descripcion,
                minutos_bloque : 15,
                cantidad_bloques : cantidad_bloques,
                valor : valor,
                otros : '',
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.procedimiento.registrar') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        // cerrar modal
                        $('#a_procedimiento').modal('hide');
                        let registros = data.registros;
                        $('#lista_examenes_laboratorio tbody').empty();
                        $(registros).each(function(i, v) { // indice, valor
                            $('#lista_examenes_laboratorio tbody').append(`
                            <tr>
                                <td class="align-items-left text-left">${v.nombre}s</td>
                                <td class="align-items-left text-left">${v.descripcion}</td>
                                <td class="align-items-left text-left">${v.cantidad_bloques}</td>
                                <td class="align-items-left text-left">${v.valor}</td>
                                <td class="align-items-left text-left">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_procedimiento_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar Procedimiento",
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
                        text: "Error al cargar ingresar Procedimiento",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

        }
        else
        {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

     function mostrar_procedimiento(id){
        console.log(id);
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        }

        let url = '{{ ROUTE("profesional.mostrar_prestacion_lab") }}';

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == "ok"){
                    // Abrir modal
                    $('#modalMostrarPrestacion').modal('show');
                    // Guardar el ID de la prestación
                    $('#id_prestacion_editar').val(id);
                    // Llenar los campos del modal
                    $('#nombre_prestacion').val(response.procedimiento.nombre);
                    $('#cantidad_uco').val(response.procedimiento.cantidad_uco);
                    $('#cantidad_bloques_prestacion').val(response.procedimiento.cantidad_bloques);
                    $('#valor_prestacion').val(response.procedimiento.valor);
                    // Cargar indicaciones en Summernote
                    $('#indicaciones_prestacion').summernote('code', response.procedimiento.indicaciones || '');

                }


            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }
    function editar_prestacion(){
            let id = $('#id_prestacion_editar').val();
            let nombre = $('#nombre_prestacion').val();
            let cantidad_bloques = $('#cantidad_bloques_prestacion').val();
            let valor = $('#valor_prestacion').val();
            let indicaciones = $('#indicaciones_prestacion').summernote('code');

            // Validaciones
            if(!id || id == ''){
                swal({
                    title: 'Error',
                    text: 'No se ha seleccionado una prestación para editar',
                    icon: 'error'
                });
                return;
            }

            if(!nombre || nombre.trim() == ''){
                swal({
                    title: 'Error',
                    text: 'El nombre del procedimiento es requerido',
                    icon: 'error'
                });
                return;
            }

            if(!cantidad_bloques || cantidad_bloques == ''){
                swal({
                    title: 'Error',
                    text: 'La cantidad de bloques es requerida',
                    icon: 'error'
                });
                return;
            }

            if(!valor || valor == ''){
                swal({
                    title: 'Error',
                    text: 'El valor es requerido',
                    icon: 'error'
                });
                return;
            }

            let data = {
                id: id,
                nombre: nombre,
                cantidad_bloques: cantidad_bloques,
                valor: valor,
                indicaciones: indicaciones,
                _token: CSRF_TOKEN,
            }

            let url = '{{ route("profesional.actualizar_prestacion_lab") }}';

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.status == "ok"){
                        swal({
                            title: 'Éxito',
                            text: 'La prestación ha sido actualizada correctamente',
                            icon: 'success'
                        }).then(() => {
                            // Cerrar modal
                            $('#modalMostrarPrestacion').modal('hide');
                            // Recargar la página para ver los cambios
                            location.reload();
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: response.message || 'No se pudo actualizar la prestación',
                            icon: 'error'
                        });
                    }
                },
                error: function(error){
                    console.log(error.responseText);
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al actualizar la prestación',
                        icon: 'error'
                    });
                }
            });

        }

        function eliminar_procedimiento_cm(id){
        swal({
            title: "Eliminar procedimiento",
            text: "¿Está seguro que desea eliminar el procedimiento?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_procedimiento(id);
            }
        });
    }

    function confirmar_eliminar_procedimiento(id){
        let data = {
            id : id,
            estado : '0',
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.procedimiento.modificar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let registros = data.registros;

                    // Destruir el DataTable existente si existe
                    if ($.fn.DataTable.isDataTable('#lista_examenes_laboratorio')) {
                        $('#lista_examenes_laboratorio').DataTable().destroy();
                    }

                    // Vaciar el tbody de la tabla
                    $('#lista_examenes_laboratorio tbody').empty();

                    // Agregar los registros actualizados
                    $(registros).each(function(i, v) { // indice, valor
                        // Determinar el estado badge
                        let estadoBadge = v.estado == 1 ?
                            '<span class="badge badge-success">Activo</span>' :
                            '<span class="badge badge-secondary">Inactivo</span>';

                        $('#lista_examenes_laboratorio tbody').append(`
                        <tr>
                            <td>${v.cod_examen || ''}</td>
                            <td>${v.nombre}</td>
                            <td>${v.descripcion}</td>
                            <td>${v.cantidad_bloques}</td>
                            <td>$${new Intl.NumberFormat('es-CL').format(v.valor)}</td>
                            <td>${estadoBadge}</td>
                            <td>
                                <button class="btn btn-info btn-icon btn-sm" type="button" onclick="ver_examen(${v.id})" title="Ver detalles"><i class="feather icon-eye"></i></button>
                                <button class="btn btn-warning btn-icon btn-sm" type="button" onclick="editar_examen(${v.id})" title="Editar"><i class="feather icon-edit"></i></button>
                                <button class="btn btn-danger btn-icon btn-sm" type="button" onclick="eliminar_examen(${v.id})" title="Eliminar"><i class="feather icon-x"></i></button>
                            </td>
                        </tr>
                        `);
                    });

                    // Reinicializar el DataTable
                    $('#lista_examenes_laboratorio').DataTable({
                        responsive: true,
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                        }
                    });

                    // Mostrar mensaje de éxito
                    swal({
                        title: "Éxito",
                        text: "Examen eliminado correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al eliminar el examen",
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
                    text: "Error al eliminar el examen",
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
    @endsection
    @section('modales-profesionales_inst')
        @include('app.adm_cm.modal_adm.asociar_enfermera')
        @include('app.adm_cm.modal_adm.contacto_usuario')
    @endsection
