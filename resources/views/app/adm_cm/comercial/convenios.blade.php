@extends('template.adm_cm.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Mis Convenios</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Convenios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white font-weight-bolder">Convenios</h5>
                    <button class="btn btn-info btn-sm mx-2 has-ripple float-right" data-toggle="modal" data-target="#nuevoConvenioInstitucion"><i class="fa fa-plus" aria-hidden="true"></i>Registrar nuevo convenio</button>
                </div>
                <div class="card-body">
                    <table id="tabla_convenios_institucion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-wrap text-center align-middle">Convenio</th>
                                <th class="text-center align-middle">Codigo</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Fecha de Atención</th>
                                <th class="text-center align-middle">Paciente</th>
                                <th class="text-center align-middle">Valor Total</th>
                                <th class="text-center align-middle">Estado Consulta</th>
                                <th class="text-center align-middle">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
@endsection

@section('modales')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.convenio_nuevo')
@endsection

@section('page-script')
<script>
    function guardar_nuevo_convenio_institucion(){
        var nombre_convenio = $('#nombre_convenio').val();
        var tipo_convenio = $('#tipo_convenio').val();
        var porcentaje_dcto = $('#porcentaje_dcto').val();
        var tipo_convenio_institucion = $('#tipo_convenio_institucion').val();
        var fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio').val();
        var fecha_final_pago_convenio = $('#fecha_final_pago_convenio').val();
        var rut_representante_convenio = $('#rut_representante_convenio').val();
        var nombre_representante_convenio = $('#nombre_representante_convenio').val();
        var fecha_pago_convenio = $('#fecha_pago_convenio').val();
        var telefono_representante_convenio = $('#telefono_representante_convenio').val();
        var email_representante_convenio = $('#email_representante_convenio').val();
        var direccion_representante_convenio = $('#direccion_representante_convenio').val();
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio').val();

        var valido = 1;
        var mensaje = '';

        if(nombre_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre de convenio</li>';
        }
        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio</li>';
        }
        if(porcentaje_dcto == ''){
            valido = 0;
            mensaje += '<li>Ingrese porcentaje de descuento</li>';
        }
        if(tipo_convenio_institucion == 0){
            valido = 0;
            mensaje += '<li>Seleccione tipo de convenio institución</li>';
        }
        if(fecha_inicial_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha de pago</li>';
        }
        if(fecha_final_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha de finalización de pago</li>';
        }
        if(rut_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese rut representante</li>';
        }
        if(nombre_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese nombre representante</li>';
        }
        if(telefono_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese telefono representante</li>';
        }
        if(email_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese email representante</li>';
        }
        if(direccion_representante_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese direccion representante</li>';
        }
        if(observaciones_nuevo_convenio == ''){
            valido = 0;
            mensaje += '<li>Ingrese observaciones</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ ROUTE('adm_cm.convenio_nuevo') }}",
            type: 'POST',
            data: {
                nombre_convenio: nombre_convenio,
                tipo_convenio: tipo_convenio,
                porcentaje_dcto: porcentaje_dcto,
                tipo_convenio_institucion: tipo_convenio_institucion,
                fecha_inicial_pago_convenio: fecha_inicial_pago_convenio,
                fecha_final_pago_convenio: fecha_final_pago_convenio,
                rut_representante_convenio: rut_representante_convenio,
                nombre_representante_convenio: nombre_representante_convenio,
                telefono_representante_convenio: telefono_representante_convenio,
                email_representante_convenio: email_representante_convenio,
                direccion_representante_convenio: direccion_representante_convenio,
                observaciones_nuevo_convenio: observaciones_nuevo_convenio,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                return console.log(response);
                if(response.status == 200){
                    alert('Convenio registrado correctamente');
                    $('#nuevoConvenioInstitucion').modal('hide');
                    $('#tabla_convenios_institucion').DataTable().ajax.reload();
                }else{
                    alert('Error al registrar convenio');
                }
            }
        });
    }

    function formatoRut(rut)
{
    var valor = rut.value.replace('.','');
    valor = valor.replace(/\-/g,'');

    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    rut.value = cuerpo + '-'+ dv

    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

    suma = 0;
    multiplo = 2;

    for(i=1;i<=cuerpo.length;i++)
    {
        index = multiplo * valor.charAt(cuerpo.length - i);
        suma = suma + index;
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
    }

    dvEsperado = 11 - (suma % 11);
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    rut.setCustomValidity('');
}
</script>
@endsection
