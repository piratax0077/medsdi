@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad/RRHH</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="rrhh_cm" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-prof_salud-tab" data-toggle="tab" href="#pills-prof-salud" role="tab" aria-controls="pills-prof_salud" aria-selected="false">Profesionales de la salud</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-asistentes-tab" data-toggle="tab" href="#pills-asistentes" role="tab" aria-controls="pills-asistentes" aria-selected="false">Asistentes/Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-limpieza-mantencion-tab" data-toggle="tab" href="#pills-limpieza-mantencion" role="tab" aria-controls="pills-limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Cierre: Card Nav Pills-->
            <div class="tab-content" id="rrhh_cm">

                <!--Tab Profesionales de la salud-->
                <div class="tab-pane fade show active"id="pills-prof-salud" role="tabpanel" aria-labelledby="pills-prof-salud-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales Contratados del Centro</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoprofesional">
                                                        <i class="feather icon-plus"></i> Registrar Contrato Profesional
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="card_body_profesionales_contratados">
                                    <table id="tab_profesionales_cont_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Profesion</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto/cuenta</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($profesionales_contratados as $profesional)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>{{ $profesional->nombre }} {{ $profesional->primer_apellido }} {{ $profesional->segundo_apellido }}</strong></span><br>
                                                        <span>{{ $profesional->rut }}</span>
                                                    </td>
                                                    <td class="align-middle text-center"></td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $profesional->especialidad }}</span><br>
                                                        <span>{{ $profesional->tipo_especialidad }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $profesional->tipo_contrato }}</span><br>
                                                        <span>{{ $profesional->fecha_ingreso }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $profesional->horas_semanales }} horas semanales <br> ${{ number_format($profesional->remuneracion_mes, 0, ",", ".") }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datosprofesionalc();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x-circle"></i> Desasociar</button>
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
                <!--Cierre: Tab Profesionales de la salud-->
                <!--Tab asistentes-->
                <div class="tab-pane fade" id="pills-asistentes" role="tabpanel" aria-labelledby="pills-asistentes-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes del Centro</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                     <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoasistentes"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Contrato nuevo/a asistente</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="card_body_asistentes_contratados">
                                    <table id="tab_cont_asistentes_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($asistentes_contratados as $asistente)
                                                <tr>
                                                    <td class="align-middle text-center">{{ $asistente->nombre }} {{ $asistente->apellido_paterno }} {{ $asistente->apellido_materno }}<br>{{ $asistente->rut }}</td>
                                                    <td class="align-middle text-center">{{ $asistente->cargo }}</td>
                                                    <td class="align-middle text-center">{{ $asistente->tipo_contrato }}<br>{{ $asistente->fecha_ingreso }}</td>
                                                    <td class="align-middle text-center">{{ $asistente->telefono }} <br> {{ $asistente->email }}</td>
                                                    <td class="align-middle text-center">${{ number_format($asistente->sueldo_bruto,0,',','.') }} <br>{{ $asistente->horas_contratadas }} hrs.</td>
                                                    <td class="align-middle text-center">
                                                        <button class="btn btn-warning btn-sm has-ripple" onclick="dame_asistente({{ $asistente->id }})" data-toggle="modal" data-target="#editarAsistente"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_asistente({{ $asistente->id }})"><i class="fas fa-trash"></i> </button>
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
                <!--Cierre: Tab asistentes-->

                <!--Tab personal limpieza y mantencion-->
                <div class="tab-pane fade" id="pills-limpieza-mantencion" role="tabpanel" aria-labelledby="pills-limpieza-mantencion-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Limpieza y mantención</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_personalaseoymantencion"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Personal mantención</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_cont_limpieza_mantencionc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>Jaime Kriman</strong></span><br>
                                                    <span>4.345.466-2</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Asistente atención público</span><br>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>Contrato indefinido</span><br>
                                                    <span>20/01/2015</span
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contactoc();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                     <span>44 horas semanales <br> 500.000</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_empresac();">
                                                    <i class="feather icon-edit"></i> Editar</button>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="feather icon-x-circle"></i> Desasociar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Cierre: Tab personal limpieza y mantencion-->
            </div>
            <!--Cierre: Pills-->
        </div>
    </div>
</div>
    @include('app.contabilidad.modals.registrar_asistentes')
    @include('app.contabilidad.modals.liquidacion')
    @include('app.contabilidad.modals.datos_profesional')
    @include('app.contabilidad.modals.datoscuenta')
    @include('app.contabilidad.modals.contacto')
    @include('app.contabilidad.modals.contacto_ser')
    @include('app.contabilidad.modals.editar_profesional')
    @include('app.contabilidad.modals.editar_asistentes')
    @include('app.contabilidad.modals.aseo_mantencion_editar')
    @include('app.contabilidad.modals.aseo_mantencion')

@endsection
<script type="text/javascript">
    function liquidacion (){
        $('#liquidacion').modal('show');
    }
        function datoscuenta(){
        $('#datoscuenta').modal('show');
    }
        function liquidacionot (){
        $('#liquidacionot').modal('show');
    }
    function datoscuentaot(){
        $('#datoscuentaot').modal('show');
    }
    function contactoc(){ $('#contacto').modal('show');}

    function editar_datosprofesionalc(){
        $('#editardatosprofesional').modal('show');
    }
    function editar_datosasistentec(){
        $('#editar_contratoasistentes').modal('show');
    }
    function editar_datos_empresac(){
        $('#editar_personalaseoymantencion').modal('show');
    }
    function registar_datos_empresac(){
        $('#registrar_personalaseoymantencion').modal('show');
    }

    function registrar_nuevo_profesional(){
        let rut = $('#rut_nuevo_profesional').val();
        let f_ingreso = $('#f_ingreso_nuevo_profesional').val();
        let nombre = $('#nombre_nuevo_profesional').val();
        let apellido1 = $('#apellido1_nuevo_profesional').val();
        let apellido2 = $('#apellido2_nuevo_profesional').val();
        let email = $('#email_nuevo_profesional').val();
        let telefono1 = $('#telefono1_nuevo_profesional').val();
        let telefono2 = $('#telefono2_nuevo_profesional').val();
        let direccion = $('#direccion_nuevo_profesional').val();
        let region = $('#region_nuevo_profesional').val();
        let comuna = $('#comuna_nuevo_profesional').val();
        let cargo = $('#cargo_nuevo_profesional').val();
        let profesion = $('#profesion_nuevo_profesional').val();
        let especialidad = $('#especialidad_nuevo_profesional').val();
        let sub_especialidad = $('#sub_especialidad_nuevo_profesional').val();
        let dias_atencion = $('#dias_atencion_nuevo_profesional').val();
        let horario = $('#horario_nuevo_profesional').val();
        let p_hora = $('#p_hora_nuevo_profesional').val();
        let correo_cont = $('#correo-cont').is(':checked');
        let banco = $('#banco_nuevo_profesional').val();
        let n_cta = $('#n_cta_nuevo_profesional').val();
        let sucursal = $('#sucursal_nuevo_profesional').val();

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del profesional</li>';
        }
        if(f_ingreso == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de ingreso del profesional</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del profesional</li>';
        }
        if(apellido1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el primer apellido del profesional</li>';
        }
        if(apellido2 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el segundo apellido del profesional</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el correo electr&oacute;nico del profesional</li>';
        }
        if(telefono1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el tel&eacute;fono del profesional</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la direcci&oacute;n del profesional</li>';
        }
        if(cargo == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el cargo del profesional</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la regi&oacute;n del profesional</li>';
        }
        if(comuna == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la comuna del profesional</li>';
        }
        if(cargo == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el cargo del profesional</li>';
        }
        if(profesion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la profesi&oacute;n del profesional</li>';
        }
        if(especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la especialidad del profesional</li>';
        }
        if(sub_especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sub-especialidad del profesional</li>';
        }
        if(dias_atencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los d&iacute;as de atenci&oacute;n del profesional</li>';
        }
        if(horario == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el horario del profesional</li>';
        }
        if(p_hora == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la cantidad de pacientes por hora del profesional</li>';
        }
        if(banco == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el banco para el dep&oacute;sito del profesional</li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el n&uacute;mero de cuenta para el dep&oacute;sito del profesional</li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sucursal para el dep&oacute;sito del profesional</li>';
        }

        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            return false;
        }


        let data = {
            rut: rut,
            f_ingreso: f_ingreso,
            nombre: nombre,
            apellido1: apellido1,
            apellido2: apellido2,
            email: email,
            telefono1: telefono1,
            telefono2: telefono2,
            direccion: direccion,
            region: region,
            comuna: comuna,
            cargo: cargo,
            profesion: profesion,
            especialidad: especialidad,
            sub_especialidad: sub_especialidad,
            dias_atencion: dias_atencion,
            horario: horario,
            p_hora: p_hora,
            correo_cont: correo_cont,
            banco: banco,
            n_cta: n_cta,
            sucursal: sucursal,
            _token: '{{ csrf_token() }}'
        }


        let url = "{{ route('adm_cm.registrar_profesional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
             console.log(data);
            if (data != null) {
                if(data.estado == 1){
                    swal({
                        title: "Registro Exitoso",
                        text: data.message,
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#card_body_profesionales_contratados').empty();
                    $('#card_body_profesionales_contratados').html(data.v);
                }else{
                    swal({
                        title: "Error",
                        text: data.msj,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            } else {
                swal({
                    title: "Error",
                    text: "Error al registrar profesional",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    /*-Modals personal-*/
    function contacto(id)
        {
            let url = "{{ route('adm_cm.profesional_buscar', ['id_profesional' => '__id__']) }}";
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

</script>
