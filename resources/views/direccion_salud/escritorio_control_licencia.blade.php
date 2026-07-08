@extends('template.direccion_salud.template')

@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Control de Licencias</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row m-b-10">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h6 class="font-weight-bold text-dark f-20">Control de Licencias</h6>
                        </div>
                        <div class="card-body">
                            <!-- Buscador de pacientes por RUT -->
                            <div class="form-group">
                                <label for="rut_paciente">Buscar paciente por RUT:</label>
                                <div class="input-group">
                                    <input type="text" id="rut_paciente" class="form-control" placeholder="Ingrese RUT">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="buscar_paciente" onclick="buscar_paciente()">Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Resultado de búsqueda -->
                            <div id="resultado_paciente"></div>
                            <!-- Mapa de geolocalización -->
                            <div id="mapa_paciente" style="height: 400px; display:none;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('page-script')
<script>
    function buscar_paciente(){
        let rut = $('#rut_paciente').val();
        if(!rut){
            swal({
                title: "Error",
                text: "Por favor, ingrese un RUT válido.",
                icon: "error",
            });
            return;
        }

        $.ajax({
            url: "{{ route('lab.exa.asistente.buscar_paciente_rut') }}",
            type: 'GET',
            data: { rut: rut },
            success: function(response) {
                console.log(response);
                if (response.estado === 1 && response.registro) {
                    var paciente = response.registro;
                    var html = `
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5>${paciente.nombres} ${paciente.apellido_uno} ${paciente.apellido_dos}</h5>
                                <p><b>RUT:</b> ${paciente.rut}</p>
                                <p><b>Email:</b> ${paciente.email}</p>
                                <p><b>Teléfono:</b> ${paciente.telefono_uno || ''}</p>
                                <button class="btn btn-success" id="seleccionar_paciente" data-id="${paciente.id}">Seleccionar y geolocalizar</button>
                            </div>
                        </div>
                    `;
                    $('#resultado_paciente').html(html);
                } else {
                    $('#resultado_paciente').html('<div class="alert alert-danger">Paciente no encontrado.</div>');
                }
            },
            error: function() {
                $('#resultado_paciente').html('<div class="alert alert-danger">Ocurrió un error al buscar el paciente.</div>');
                $('#mapa_paciente').hide();
            }
        });
    }
</script>
@endsection
