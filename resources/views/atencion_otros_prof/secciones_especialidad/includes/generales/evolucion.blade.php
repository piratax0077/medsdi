<!--EVOLUCION-->
<div class="row">
    <div class="col-md-12 mt-2 mb-0">
        <h6 class="f-20 text-c-blue mb-2">Evolución</h6>
    </div>
</div>
<!--FORMULARIOS-->
<div class="row" id="evoluciones">
    <!--MOTIVO CONSULTA-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="mot-consulta-ev">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left" type="button" data-toggle="collapse" data-target="#mot-consulta-ev-c" aria-expanded="false" aria-controls="mot-consulta-ev-c">
                    Motivo de la consulta
                </button>
            </div>
            <div id="mot-consulta-ev-c" class="collapse show" aria-labelledby="mot-consulta-ev" data-parent="#mot-consulta-ev">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="historia_ingreso_sico">Historia de ingreso</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="historia_ingreso_sico" id="historia_ingreso_sico"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="eval-actual">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval-actual-c" aria-expanded="false" aria-controls="eval-actual-c">
                Evaluación actual
                </button>
            </div>
            <div id="eval-actual-c" class="collapse show" aria-labelledby="eval-actual" data-parent="#eval-actual">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="evaluacion_control">Evaluación actual</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evaluacion_control" id="evaluacion_control"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--PLAN PROPUESTO-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="plan">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-c" aria-expanded="false" aria-controls="plan-c">
                Plan propuesto
                </button>
            </div>
            <div id="plan-c" class="collapse show" aria-labelledby="plan" data-parent="#plan">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="plan_prop_evol">Plan propuesto</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="plan_prop_evol" id="plan_prop_evol"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--RESULTADOS-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="mot-consulta">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                Resultados
                </button>
            </div>
            <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm"for="sesion_n_dex" >Nº Sesión</label>
                            <input type="number" class="form-control form-control-sm" name="sesion_n_dex" id="sesion_n_dex">
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <label class="floating-label-activo-sm"for="evol_result" >Resultados</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evol_result" id="evol_result"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--indic y próximo control-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header-a" id="ind_prox_control">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ind_prox_control-c" aria-expanded="false" aria-controls="ind_prox_control-c">
                Indicaciones y Próximo Control
                </button>
            </div>
            <div id="ind_prox_control-c" class="collapse show" aria-labelledby="ind_prox_control" data-parent="#ind_prox_control">
                <div class="card-body-aten-a">

                    <div class="form-row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }}); dame_plan_tratamiento({{ $id_ficha_atencion }})"><i class="feather icon-calendar"></i> Agendar hora</button>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-8 mx-auto">
                            <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                                <div class="card-top text-center">
                                    <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                </div>
                                <div class="card-body">
                                    <div  class="form-row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <h5 class="text-c-blue"><i class="fas fa-calendar"></i> Fecha:</h5><h5 id="proxima_fecha_atencion" class="font-weight-bold">{{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}</h5>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                            <h5 class="text-c-blue"><i class="fas fa-clock"></i> Horario:</h5><p>  <strong id="proxima_hora_atencion_inicio">{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong> a <strong id="proxima_hora_atencion_fin">{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="evol_indicaciones">Indicaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="evol_indicaciones" id="evol_indicaciones"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="objetivo_logrado" name="objetivo_logrado" checked>
                                <label class="form-check-label" for="objetivo_logrado">¿Objetivo logrado?</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
        <button type="button" class="btn btn-info" onclick="guardar_evolucion()"><i class="feather icon-save"></i> Guardar evolución</button>
    </div>
</div>
<script>
function guardar_evolucion() {
    let datos_control = {};

    $('#evoluciones').find('input, select, textarea').each(function() {
        let name = $(this).attr('name');
        if (!name) return;

        if ($(this).is(':checkbox')) {
            datos_control[name] = $(this).is(':checked') ? 1 : 0;
        } else if ($(this).is(':radio')) {
            if ($(this).is(':checked')) {
                datos_control[name] = $(this).val();
            }
        } else {
            datos_control[name] = $(this).val();
        }
    });

    // Agrega los identificadores adicionales
    const payload = {
        id_ficha_atencion: $('#id_fc').val(),
        id_paciente: $('#id_paciente').val(),
        id_profesional: $('#id_profesional_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        objetivo_logrado: $('#objetivo_logrado').is(':checked') ? 1 : 0,
        datos_control: datos_control,
        _token: CSRF_TOKEN
    };

    console.log(payload);

    // Enviar vía AJAX
    $.ajax({
        url: '{{ route("profesional.guardar_control_nutricional") }}',
        method: 'POST',
         data: payload,
        success: function (response) {
            console.log(response);
                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Evaluación psicologica guardada correctamente.',
                    icon: 'success'
                });
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Hubo un error al guardar la evolución.');
        }
    });
}
</script>
