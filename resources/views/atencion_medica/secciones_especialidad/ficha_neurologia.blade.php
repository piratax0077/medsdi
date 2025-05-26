<!-- FICHA ATENCION GENERAL -->
<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 ">
        <div class="row">
            <!--MENSAJE ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                <div class="alert-atencion alert alert-success-b alert-dismissible fade show" role="alert" id="mensaje_historias"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha') }}" method="POST">
                    <div class="col-sm-12 col-md-12">
                        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        @csrf

                        <div class="tab-content" id="med-contenido">
                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                            <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <!--Formulario / Menor de edad-->
                                            @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
                                            <!--Cierre: Formulario / Menor de edad-->

                                            <!--Motivo consulta-->
                                            @include('general.secciones_ficha.motivo')
                                            <!--Cierre: Formulario /Motivo de la Consulta-->

                                            <!--Formulario / Signos vitales y otros-->
                                              {{-- @include('general.secciones_ficha.signos_vitales') --}}
                                            <!--Cierre: Formulario / Signos vitales y otros-->

                                            <!-- hospitalizacion -->
                                            {{--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="hospitalizar_paciente">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                            Hospitalizar Paciente
                                                        </button>
                                                    </div>
                                                    <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                                        <div class="card-body-aten-a shadow-none">
                                                            @include('general.hospitalizacion.hospitalizar')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <!-- cierre hospitalizacion -->

                                            <!-- ges -->
                                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                            <!-- cierre ges -->

                                            <hr>

                                            <!--Diagnóstico-->
                                            @include('general.secciones_ficha.diagnostico')
                                            <!--Cierre: Formulario / Diagnóstico-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  div de botones  --}}
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                    @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                </form>
            </div>
        </div>
    </div>
</div>
<!--CIERRE: FICHA ATENCION GENERAL-->

