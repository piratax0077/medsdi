@extends('template.laboratorio.laboratorio_profesional.template')

@section('page-script')
    <script>
        function seleccionar_lugar_atencion() {

            //let email = $('#email_paciente_agregar').val();
            let url = "{{ route('profesional.lugares_atencion_profesional_agenda') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {}
                })
                .done(function(data) {

                    if (data == 'fail') {
                        console.log('fail');
                        swal("Advertencia",
                            "Bienvenido!!\n Debe ingresar en la pestaña Panel de Configuración, Mis Lugares de Atención y registrar por lo menos un lugar de atención.",
                            "warning");
                        //  alert('No tiene lugares de atención asignados, favor registrar uno');
                    } else {

                        let lugares_atencion = $('#lugares_atencion');

                        data = JSON.parse(data);
                        console.log(data);
                        lugares_atencion.find('option').remove();
                        lugares_atencion.append('<option value="0">Seleccione</option>');
                        let contador = 0;
                        console.log(data.length);
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].pivot.estado == '1') {
                                lugares_atencion.append('<option value="' + data[i].id + '">' + data[i].nombre +
                                    '</option>');
                                contador++;
                            }
                        }

                        if (contador == 0) {
                            swal("Oops", "No tiene lugares de atención asignados, favor registrar uno", "error")
                            //  alert('No tiene lugares de atención asignados, favor registrar uno');
                        } else {
                            if (contador == 1) {
                                lugares_atencion.val(data[0].id);
                                window.location.href =
                                    "{{ route('laboratorio.agenda_laboratorio') }}?lugares_atencion=" + data[0].id;
                            } else {
                                $('#modal_seleccionar_lugar_atencion').modal('show');
                                validar_seleccionar_lugar_atencion();
                            }
                        }
                    }
                    // $(data).each(function(i, v) { // indice, valor

                    //     lugares_atencion.append('<option value="' + v.id + '">' + v.nombre +
                    //         '</option>');
                    // })

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function validar_seleccionar_lugar_atencion() {
            var valor = $('#lugares_atencion').val();
            if (valor == "" || valor == 0)
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', true);
            else
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', false);
        }
    </script>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-3">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Escritorio Laboratorio xRadiología</h5>
                            </div>
                            <!--<ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="escritorio_profesional_laboratorio.php">Mi Escritorio</a>
                                </li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card bg-info mb-3">
                        <div class="card-body pt-2 pb-1">
                            <h5 class="text-white f-20">
                                Mi Escritorio
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card-deck">


                        <div class="card subir">
                            <div class="card-body text-center px-2" onclick="seleccionar_lugar_atencion();"
                                style="cursor:pointer">
                                <img class="wid-40 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h6 class="mt-1">Mi <br>agenda</h6>
                            </div>
                        </div>

                        <div class="card subir">
                            <a href="{{ route('laboratorio.cargar.resultados') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Subir <br>exámenes</h6>
                                </div>
                            </a>
                        </div>

                        <div class="card subir">
                            <a href="{{ route('laboratorio.cargar.resultados') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/examenes-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Transcripción <br>de Informe</h6>
                                </div>
                            </a>
                        </div>

                        <div class="card subir">
                            <a href="{{ route('laboratorio.pacientes.profesional.asistente') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                    <h6 class="mt-1">Mis <br>pacientes</h6>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="card-deck mt-2">
                        <div class="card subir">
                            <a href="{{ route('profesional.configuracion') }}">
                                <div class="card-body text-center px-2" style="cursor:pointer">
                                    <img class="wid-40 text-center"
                                        src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                    <h6 class="mt-1"> Panel de <br>configuración</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card  pb-0">
                        <div class="card-header text-center bg-c-info">
                            <div class="row">
                                <div class="col-sm-4 d-inline text-left">
                                    <h5 class="text-white my-2" style="font-size: 1.1rem;">Mi agenda del día</h5>
                                </div>
                                <div class="col-md-4 d-inline text-right mt-1">
                                    <select name="lugares_atencion_agenda" id="lugares_atencion_agenda" class="form-control form-control-sm" onchange="">
                                        <option value="">Seleccione Lugar</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 d-inline text-right mt-1">
                                    <input type="date"  class="form-control form-control-sm" id="buscar_horas" name="buscar_horas">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0 pt-4">
                            <div class="dt-responsive table-responsive align-middle pb-0">
                                <table id="simpletable" class="table table-striped table-bordered nowrap table-sm"
                                    style="height: 100px">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-left">Hora</th>
                                            <th class="text-center align-left">Paciente</th>
                                            <th class="text-center align-left">Lugar Atención</th>
                                            <!--<th class="text-center align-middle">Acción</th>-->
                                        </tr>
                                    </thead>
                                   <tbody>
                                        <tr>
                                            <td class="text-center align-left">{{ $hd->hora_inicio }}</td>
                                            <td class="text-center align-left bg-estado-light-amarillo">
                                                <strong>
                                                    <span>{{ $hd->paciente->nombres . ' ' . $hd->paciente->apellido_uno . ' ' . $hd->paciente->apellido_dos }}</span>
                                                <strong>
                                                <!--<br style="line-height: 1%;"><span>{{ $hd->paciente->rut }}</span>-->
                                            </td>
                                            <td class="text-center align-left">{{ $hd->lugar_atencion->nombre }}</td>
                                         
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
