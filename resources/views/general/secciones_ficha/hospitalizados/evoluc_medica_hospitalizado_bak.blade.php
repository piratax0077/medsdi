  <style>



  </style>
<!--EXAMEN MÉDICO  - DETALLES-->

    @include('general.secciones_ficha.hospitalizados.hospitalizacion_enfermeria')




<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card-a">
        <div class="card-header-a" id="evol_med_hosp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open" type="button" data-toggle="collapse" data-target="#evol_med_hosp_c" aria-expanded="false" aria-controls="evol_med_hosp_c">
                Atención Médica Hospitalización
            </button>
        </div>
        <div id="evol_med_hosp_c" class="open" aria-labelledby="evol_med_hosp" data-parent="#evol_med_hosp">
            <div class="card-body-aten-a">
                <div id="form-orl-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="evol_med_hosp" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex_ingreso_hosp_tab" data-toggle="tab" href="#ex_ingreso_hosp" role="tab" aria-controls="ex_ingreso_hosp" aria-selected="true">Examen Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="" data-toggle="tab" href="#evolucion_hosp" role="tab" aria-controls="evolucion_hosp" aria-selected="true">Evolución diaria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="receta_urg-tab" data-toggle="tab" href="#receta_urg" role="tab" aria-controls="receta_urg" aria-selected="true">Receta e Indicaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="sol_examenes_urg-tab" data-toggle="tab" href="#sol_examenes_urg" role="tab" aria-controls="sol_examenes_urg" aria-selected="true">Sol. Exámenes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="urg_dest_ind-tab" data-toggle="tab" href="#urg_dest_ind" role="tab" aria-controls="urg_dest_ind" aria-selected="true">Destino-Traslados</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="evol_med_hosp">
                                <!--INGRESO-->
                                <div class="tab-pane fade show" id="ex_ingreso_hosp" role="tabpanel" aria-labelledby="ex_ingreso_hosp_tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                            <h6 class="t-aten">Examen ingreso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm" for="motivo">Motivo de Ingreso</label>
                                            <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm" for="antecedentes">Aproximación Gravedad</label>
                                            <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="examen_fisico">Examen Físico </label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="EXAMEN FÍSICO Y PRUEBAS DIAGNÓSTICAS"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="otras_indicaciones">Otras Indicaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="otras_indicaciones" id="otras_indicaciones" placeholder="SOLO INDICACIONES GENERALES LAS RECETAS EXAMENES CURACIONES USE LAS PESTAÑAS SIGUIENTES "></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <!--EVOLUCION DIARIA-->
                                <div class="tab-pane fade show active" id="evolucion_hosp" role="tabpanel" aria-labelledby="evolucion_hosp_tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                            <h6 class="t-aten d-inline ">EVOLUCIÓN DIARIA</h6>
                                            <div class="d-inline btn-group btn-group-xs float-md-right" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-info-light-c btn-xxs d-inline float-right"
                                                    onclick="mostrarNuevaEvolucionPaciente({{ $contador_div_evaluaciones }})"><i class="feather icon-plus"></i>
                                                    Nueva evolución</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor_evoluciones_paciente">
                                        @if (count($controles_ciclo) > 0)
                                        <div class="row">
                                            <div class="col-sm-12 pb-0 mb-2 d-inline">
                                                <div class="pt-3 d-inline">
                                                    <h6 class="t-aten d-inline ml-3">Control de ciclo de ingreso</h6>
                                                </div>
                                            </div>
                                        </div>
                                            @php $count = 1; @endphp
                                            @foreach ($controles_ciclo as $cc)
                                                <div class="col-sm-12 pb-0 mb-2 d-inline">
                                                    <p class="pt-3 d-inline">
                                                        {{ $cc->created_at->format('d/m/Y H:i') }} {{ $cc->nombre }}
                                                    </p>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                <div class="card  pt-3 pb-1  mb-3">
                                                    <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura"
                                                                    id="temperatura" value="{{ $cc->datos_evolucion->temperatura }}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                                                                    value="{{ $cc->datos_evolucion->pulso }}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md-col-lg-col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAS</label>
                                                                <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                                                                    value="{{ $cc->datos_evolucion->pas }}" oninput="calcularPAM()">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                                                                    value="{{ $cc->datos_evolucion->pad }}" oninput="calcularPAM()">
                                                            </div>
                                                        </div>
                                                        <!--el PAM esla presion arterial media hay una formula-->
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAM</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                                                                    value="{{ $cc->datos_evolucion->pam }}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                                                                    value="{{ $cc->datos_evolucion->peso }}" oninput="calcularIMC()">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                                                    value="{{ $cc->datos_evolucion->talla }}" oninput="calcularIMC()">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <!--el IMC es el indice de masa corporal hay una formula-->
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                                                                    value="{{ $cc->datos_evolucion->imc }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                                                                <select name="tipo_respiracion_servicio{{ $count }}" id="tipo_respiracion_servicio{{ $count }}" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event, {{ $count }})">
                                                                    <option value="0" @php if($cc->datos_evolucion->tipo_respiracion == '') echo 'selected' @endphp>Seleccione</option>
                                                                    <option value="Normal" @php if($cc->datos_evolucion->tipo_respiracion == "Normal") echo 'selected' @endphp>Normal</option>
                                                                    <option value="Agitada" @php if($cc->datos_evolucion->tipo_respiracion == "Agitada") echo 'selected' @endphp>Agitada</option>
                                                                    <option value="Dificultosa" @php if($cc->datos_evolucion->tipo_respiracion == "Dificultosa") echo 'selected' @endphp>Dificultosa</option>
                                                                    <option value="Signos de hipoxia" @php if($cc->datos_evolucion->tipo_respiracion == "Signos de hipoxia") echo 'selected' @endphp>Signos de hipoxia</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        @php if($cc->datos_evolucion->tipo_respiracion == '') $clase = 'd-none'; else $clase ='' @endphp
                                                        <div class="col-sm-9 {{ $clase }}" id="select_info_respiracion_servicio{{ $count }}">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">F/R</label>
                                                                        <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                                                            value="{{ $cc->datos_evolucion->fr }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                                                        <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                                                            value="{{ $cc->datos_evolucion->sat_fio2 }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">FI O2 (%)</label>
                                                                        <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                                                            value="{{ $cc->datos_evolucion->sat_o2 }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                                                        <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="Naricera" @php if($cc->datos_evolucion->dispositivo_servicio == 'Naricera') echo 'selected' @endphp>Naricera</option>
                                                                            <option value="Mascarilla simple" @php if($cc->datos_evolucion->dispositivo_servicio == 'Mascarilla simple') echo 'selected' @endphp>Mascarilla simple</option>
                                                                            <option value="Mascarilla C/reservorio" @php if($cc->datos_evolucion->dispositivo_servicio == 'Mascarilla C/reservorio') echo 'selected' @endphp>Mascarilla C/reservorio</option>
                                                                            <option value="Tubo nasotraqueal" @php if($cc->datos_evolucion->dispositivo_servicio == 'Tubo nasotraqueal') echo 'selected' @endphp>Tubo nasotraqueal</option>
                                                                            <option value="Tubo orotraqueal" @php if($cc->datos_evolucion->dispositivo_servicio == 'Tubo orotraqueal') echo 'selected' @endphp>Tubo orotraqueal</option>
                                                                            <option value="Traqueostoma" @php if($cc->datos_evolucion->dispositivo_servicio == 'Traqueostoma') echo 'selected' @endphp>Traqueostoma</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">HGT</label>
                                                                <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                                                                    id="hemoglucotest" value="{{ $cc->datos_evolucion->hemoglucotest }}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Glasgow</label>
                                                                <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                                                                    value="{{ $cc->datos_evolucion->glasgow }}" >

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">EVA</label>
                                                                <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                                                                    value="{{ $cc->datos_evolucion->eva }}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Otras Pruebas</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                    name="otras_pruebas" id="otras_pruebas">{{ $cc->datos_evolucion->otras_pruebas }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                                                            <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                                                            <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                                                                id="gravedad_e_conc" value="{{ $cc->datos_evolucion->gravedad }}" >
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <button type="button" class="btn btn-icon btn-danger-light-c"
                                                                onclick="eliminarEvolucionAgregada({{ $cc->id }})" disabled><i class="feather icon-x"></i>
                                                            </button>
                                                            {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                @php $count++; @endphp
                                            @endforeach

                                        @else
                                            @if($enfermera)
                                                <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
                                                    <div class="form-row">
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temperatura"
                                                                    id="temperatura" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                                                                    value="{!! old('pulso') !!}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md-col-lg-col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAS</label>
                                                                <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                                                                    value="{!! old('presion_pas') !!}" oninput="calcularPAM()">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAD</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                                                                    value="{!! old('presion_pad') !!}" oninput="calcularPAM()">
                                                            </div>
                                                        </div>
                                                        <!--el PAM esla presion arterial media hay una formula-->
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">PAM</label>
                                                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                                                                    value="{!! old('presion_pam') !!}" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                                                                    value="{!! old('peso') !!}" oninput="calcularIMC()">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                                                    value="{!! old('talla') !!}" oninput="calcularIMC()">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 col-md col-lg col-xl">
                                                            <div class="form-group">
                                                                <!--el IMC es el indice de masa corporal hay una formula-->
                                                                <label class="floating-label-activo-sm">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                                                                    value="{!! old('imc') !!}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                                                                <select name="tipo_respiracion_servicio" id="tipo_respiracion_servicio" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Agitada">Agitada</option>
                                                                    <option value="Dificultosa">Dificultosa</option>
                                                                    <option value="Signos de hipoxia">Signos de hipoxia</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9 d-none" id="select_info_respiracion_servicio">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">F/R</label>
                                                                        <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                                                            value="{!! old('fr') !!}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                                                        <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                                                            value="{!! old('saturacion') !!}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">FI 02 (%)</label>
                                                                        <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                                                            value="{!! old('saturacion_oxigeno') !!}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                                                        <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="Naricera">Naricera</option>
                                                                            <option value="Mascarilla simple">Mascarilla simple</option>
                                                                            <option value="Mascarilla C/reservorio">Mascarilla C/reservorio</option>
                                                                            <option value="Tubo nasotraqueal">Tubo nasotraqueal</option>
                                                                            <option value="Tubo orotraqueal">Tubo orotraqueal</option>
                                                                            <option value="Traqueostoma">Traqueostoma</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">HGT</label>
                                                                <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                                                                    id="hemoglucotest" value="{!! old('hemoglucotest') !!}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">

                                                                <label class="floating-label-activo-sm">Glasgow</label>
                                                                <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                                                                    value="{!! old('glasgow') !!}" >

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">EVA</label>
                                                                <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                                                                    value="{!! old('c_eva') !!}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Otras Pruebas</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                    name="otras_pruebas" id="otras_pruebas"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                                                            <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                                                            <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                                                                id="gravedad_e_conc" value="{!! old('gravedad_e_conc') !!}" >
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-success-light-c"
                                                                onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                    </div>
                                    @if(!$enfermera)
                                    <h6>Evoluciones</h6>
                                    <div id="contenedor_nueva_evolucion"></div>

                                    @endif
                                    <div class="form-row mt-4">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div id="contenedor"></div>
                                            <div class="table-responsive">
                                                <table id="tabla_evol_hosp" class="table mt-3 table-bordered table-xs tabla_evol_hosp">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle" style="display:none">id</th>
                                                            <th class="align-middle" style="display:none">id_resp</th>
                                                            <th class="align-middle">Evolución</th>
                                                            <th class="align-middle">Recetas</th>
                                                            <th class="align-middle">Exámenes</th>
                                                            <th class="align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--RECETARIO-->
                                <div class="tab-pane fade show" id="receta_urg" role="tabpanel" aria-labelledby="receta_urg_tab">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                                            @foreach ($tipos_receta as $tipo_receta)
                                                <li class="nav-item">
                                                    <a class="nav-link-wizard"
                                                        onclick="mostrarFormularioReceta({{ $tipo_receta->id }})"
                                                        id="rec_t{{ $tipo_receta->id }}" data-toggle="pill"
                                                        href="#rec_{{ $tipo_receta->id }}" role="tab"
                                                        aria-controls="rec_{{ $tipo_receta->id }}"
                                                        aria-selected="true">Receta {{ $tipo_receta->descripcion }}</a>
                                                </li>
                                            @endforeach
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" onclick="mostrarFormularioReceta(3)"
                                                    id="procedimiento_div_tab" data-toggle="pill"
                                                    href="#procedimiento_div" role="tab"
                                                    aria-controls="procedimiento_div" aria-selected="true"
                                                    toogle="true">Procedimientos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-wizard" onclick="mostrarFormularioReceta(4)"
                                                    id="curaciones_div_tab" data-toggle="pill"
                                                    href="#curaciones_div" role="tab"
                                                    aria-controls="procedimiento_div" aria-selected="true"
                                                    toogle="true">Curaciones</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link-wizard" onclick="mostrarFormularioReceta(4)" id="indicaciones_tab" data-toggle="pill" href="#indicaciones" role="tab" aria-controls="indicaciones" aria-selected="true" toogle="true">Otras Indicaciones</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content" id="pills-tablas_examenes">
                                            <!--TAB 1-->
                                            <div class="tab-pane fade show" id="rec_1" role="tabpanel"
                                                aria-labelledby="rec_1">
                                                <div class="form-row">
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label">Medicamento</label>
                                                            <input type="text" id="nombre_medicamento_ficha_dental"
                                                                name="nombre_medicamento_ficha_dental"
                                                                onblur="getDosis_sdi();"
                                                                class="form-control form-control-sm">
                                                            <input type="hidden" id="id_medicamento_ficha_dental"
                                                                name="id_medicamento_ficha_dental"
                                                                class="form-control " value="">
                                                            <input type="hidden" id="id_medicamento_cant_comp"
                                                                name="id_medicamento_cant_comp" class="form-control "
                                                                value="">
                                                            <input type="hidden" id="id_medicamento_tipo_control"
                                                                name="id_medicamento_tipo_control"
                                                                class="form-control" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label
                                                                class="floating-label-activo-sm">Composición:</label>
                                                            <div id="nombre_composicion_farmaco"
                                                                name="nombre_composicion_farmaco" class="p-t-5">
                                                            </div>
                                                            <div id="mensaje_med_control" name="mensaje_med_control"
                                                                class="alert-warning"></div>

                                                        </div>
                                                    </div>
                                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Presentación</label>
                                                            <select class="form-control form-control-sm"
                                                                id="dosis_medicamento_ficha_dental"
                                                                name="dosis_medicamento_ficha_dental"
                                                                onchange="getFrecuencia_sdi();getCantComp_sdi();">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Posología</label>
                                                            <select class="form-control form-control-sm"
                                                                id="frecuencia_medicamento_ficha_dental"
                                                                name="frecuencia_medicamento_ficha_dental">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo"
                                                        style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Presentación</label>
                                                            <input type="text"
                                                                name="dosis_medicamento_ficha_dental_2"
                                                                id="dosis_medicamento_ficha_dental_2"
                                                                class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo"
                                                        style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Posología</label>
                                                            <input type="text"
                                                                name="frecuencia_medicamento_ficha_dental_2"
                                                                id="frecuencia_medicamento_ficha_dental_2"
                                                                class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Vía de Administración</label>
                                                            <select class="form-control form-control-sm"
                                                                id="via_administracion_ficha_dental"
                                                                name="via_administracion_ficha_dental"
                                                                onchange="validar_via_administracion_sdi();">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">V&iacute;a Oral</option>
                                                                <option value="2">V&iacute;a Sublingual</option>
                                                                <option value="3">V&iacute;a T&oacute;pica
                                                                </option>
                                                                <option value="4">V&iacute;a Oftalmol&oacute;gica
                                                                </option>
                                                                <option value="5">V&iacute;a &Oacute;tica</option>
                                                                <option value="6">V&iacute;a Inhalatoria</option>
                                                                <option value="7">V&iacute;a Nasal</option>
                                                                <option value="8">V&iacute;a Rectal</option>
                                                                <option value="9">V&iacute;a Vaginal</option>
                                                                <option value="10">V&iacute;a parental</option>
                                                                <option value="11">Otra Vía</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill"
                                                            id="div_observaciones_medicamento_ficha_dental"
                                                            style="display: none;">
                                                            <label class="floating-label">Otra vía de
                                                                Administración</label>
                                                            <input type="text"
                                                                id="observaciones_medicamento_ficha_dental"
                                                                name="observaciones_medicamento_ficha_dental"
                                                                class="form-control form-control-sm " disabled>
                                                        </div>
                                                    </div>
                                                    {{--  <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Periodo</label>
                                                            <select class="form-control form-control-sm" id="periodo_ficha_dental" name="periodo_ficha_dental" onchange="validar_periodo_sdi();">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">SOS</option>
                                                                <option value="2">Dosis unica</option>
                                                                <option value="3">3 d&iacute;as</option>
                                                                <option value="4">5 d&iacute;as</option>
                                                                <option value="5">7 d&iacute;as</option>
                                                                <option value="6">10 d&iacute;as</option>
                                                                <option value="7">15 d&iacute;as</option>
                                                                <option value="8">30 d&iacute;as</option>
                                                                <option value="9">Permanente</option>
                                                                <option value="10">V&iacute;a parental</option>
                                                                <option value="11">Otro Periodo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill" id="div_observaciones_periodo_ficha_dental" style="display: none;">
                                                            <label class="floating-label">Otro Periodo</label>
                                                            <input type="text" id="observaciones_periodo_ficha_dental" name="observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>  --}}
                                                    {{-- cantidad de medicamento a despachar o comprar    --}}
                                                    {{--  <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label">Cantidad Comprar/Despachar</label>
                                                            <select class="form-control form-control-sm" id="cantidad_comprar" name="cantidad_comprar" onchange="validar_cantidad_comprar_sdi();">
                                                                <option value="0">Seleccione</option>
                                                                <option value="999">Otra Cantidad</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill" id="div_otra_cantidad_a_comprar" style="display: none;">
                                                            <label class="floating-label">Otra Cantidad</label>
                                                            <input type="text" id="otra_cantidad_a_comprar" name="otra_cantidad_a_comprar" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>  --}}

                                                    <div class="col-sm-6">
                                                        <button type="button" onclick="indicar_medicamento_sdi(1)"
                                                            class="btn btn-success btn-sm float-right"><i
                                                                class="fa fa-plus"></i> Agregar Medicamento</button>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="tabla_medicamento_cirugia_sdi"
                                                                class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_tipo_control</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_producto</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Medicamentos</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">farmaco</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_presentacion</td>
                                                                        {{-- <td class="text-center align-middle text-wrap">Presentación</td> --}}
                                                                        <td class="text-center align-middle text-wrap"
                                                                            hidden="hidden">id_receta_dosis</td>
                                                                        <td
                                                                            class="text-center align-middle text-wrap hidden">
                                                                            Posología</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Via Adm.</td>
                                                                        <th class="text-center align-middle">Eliminar
                                                                        </th>
                                                                </thead>
                                                                <tbody id="tbody_tabla_medicamento_cirugia_sdi">
                                                                    @foreach ($recetas as $r)
                                                                        <tr>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_tipo_control }}</td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">{{ $r->id_producto }}
                                                                            </td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap">
                                                                                {{ $r->nombre_medicamento }}</td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">{{ $r->farmaco }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_presentacion }}</td>
                                                                            {{-- <td class="text-center align-middle text-wrap">{{ $r->dosis }}</td> --}}
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_receta_dosis }}</td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap hidden">
                                                                                {{ $r->frecuencia }}</td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap">
                                                                                {{ $r->via_administracion }}</td>
                                                                            <td class="text-center align-middle">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    onclick="eliminar_medicamento_sdi({{ $r->id }})"><i
                                                                                        class="fa fa-trash"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--TAB 2-->
                                            <div class="tab-pane fade show" id="rec_2" role="tabpanel"
                                                aria-labelledby="rec_2">
                                                <div class="form-row">
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Ingrese Nombre
                                                                Medicamento</label>
                                                            <input type="text"
                                                                id="manual_nombre_medicamento_ficha_dental"
                                                                name="nombre_medicamento_ficha_dental"
                                                                class="form-control form-control-sm">
                                                            <input type="hidden"
                                                                id="manual_id_medicamento_ficha_dental"
                                                                name="manual_id_medicamento_ficha_dental"
                                                                value="0">
                                                            <input type="hidden" id="med_faltante" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Farmaco</label>
                                                            <input type="text"
                                                                id="manual_nombre_composicion_farmaco"
                                                                name="manual_nombre_composicion_farmaco"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo
                                                                Control</label>
                                                            <select name="manual_tipo_control"
                                                                id="manual_tipo_control"
                                                                class="form-control form-control-sm">
                                                                <option value="">Seleccione</option>
                                                                @if ($receta_control)
                                                                    @foreach ($receta_control as $control)
                                                                        @if ($control->cod_control !== 8)
                                                                            <option
                                                                                value="{{ $control->cod_control }}">
                                                                                {{ $control->descripcion }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Ingrese
                                                                Presentación</label>
                                                            <input type="text"
                                                                id="manual_dosis_medicamento_ficha_dental"
                                                                name="manual_dosis_medicamento_ficha_dental"
                                                                class="form-control form-control-sm">

                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Ingrese
                                                                Posología</label>
                                                            <input type="text"
                                                                id="manual_frecuencia_medicamento_ficha_dental"
                                                                name="manual_frecuencia_medicamento_ficha_dental"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Vía de
                                                                Administración</label>
                                                            <select class="form-control form-control-sm"
                                                                id="manual_via_administracion_ficha_dental"
                                                                name="manual_via_administracion_ficha_dental"
                                                                onchange="validar_via_administracion_manual_sdi();">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">V&iacute;a Oral</option>
                                                                <option value="2">V&iacute;a Sublingual</option>
                                                                <option value="3">V&iacute;a T&oacute;pica
                                                                </option>
                                                                <option value="4">V&iacute;a Oftalmol&oacute;gica
                                                                </option>
                                                                <option value="5">V&iacute;a &Oacute;tica</option>
                                                                <option value="6">V&iacute;a Inhalatoria</option>
                                                                <option value="7">V&iacute;a Nasal</option>
                                                                <option value="8">V&iacute;a Rectal</option>
                                                                <option value="9">V&iacute;a Vaginal</option>
                                                                <option value="10">V&iacute;a parental</option>
                                                                <option value="11">Otra Vía</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill"
                                                            id="div_manual_observaciones_via_administracion_ficha_dental"
                                                            style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra vía de
                                                                Administración</label>
                                                            <input type="text"
                                                                id="manual_observaciones_via_administracion_ficha_dental"
                                                                name="manual_observaciones_via_administracion_ficha_dental"
                                                                class="form-control form-control-sm " disabled>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            {{--  <div class="col-sm-6">
                                                                <div class="form-group mb-1">
                                                                    <label><strong>Uso Crónico</strong></label>
                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                        <input type="checkbox" id="manual_medicamento_uso_cronico">
                                                                        <label for="manual_medicamento_uso_cronico" class="cr"></label>
                                                                    </div>
                                                                    <div class="alert-primary" id="manual_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                                </div>
                                                            </div>  --}}
                                                            <div class="col-sm-6">
                                                                <button type="button"
                                                                    onclick="indicar_medicamento_manual_sdi()"
                                                                    class="btn btn-success btn-sm float-right"><i
                                                                        class="fa fa-plus"></i> Agregar Medicamento
                                                                    Manual</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                {{--  <div class="col-sm-6">
                                                    <button type="button" onclick="indicar_medicamento_sdi(2)"
                                                        class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                                </div>  --}}
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="tabla_medicamento_2"
                                                                class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_tipo_control</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_producto</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Medicamentos</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">farmaco</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_presentacion</td>
                                                                        {{-- <td class="text-center align-middle text-wrap">Presentación</td> --}}
                                                                        <td class="text-center align-middle text-wrap"
                                                                            hidden="hidden">id_receta_dosis</td>
                                                                        <td
                                                                            class="text-center align-middle text-wrap hidden">
                                                                            Posología</td>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_via_administracion</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Vía Adm.</td>
                                                                        <th class="text-center align-middle">Eliminar
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbody_tabla_medicamento_manual">
                                                                    @foreach ($recetas as $r)
                                                                        <tr>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_tipo_control }}</td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">{{ $r->id_producto }}
                                                                            </td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap">
                                                                                {{ $r->nombre_medicamento }}</td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">{{ $r->farmaco }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_presentacion }}</td>
                                                                            {{-- <td class="text-center align-middle text-wrap">{{ $r->dosis }}</td> --}}
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $r->id_receta_dosis }}</td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap hidden">
                                                                                {{ $r->frecuencia }}</td>
                                                                            <td
                                                                                class="text-center align-middle text-wrap">
                                                                                {{ $r->via_administracion }}</td>
                                                                            <td class="text-center align-middle">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    onclick="eliminar_medicamento_sdi({{ $r->id }})"><i
                                                                                        class="fa fa-trash"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--TAB 3-->
                                            <div class="tab-pane fade show" id="procedimiento_div" role="tabpanel"
                                                aria-labelledby="procedimiento_div_tab">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="ind_med">Vías y Cateter</label>
                                                            <select name="ind_med" id="ind_med"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('ind_med','div_ind_med','obs_ind_med',5);">
                                                                <option selected value="0">Seleccione</option>
                                                                <option value="Cateter o vía venosa periférica">Cateter
                                                                    o vía venosa periférica</option>
                                                                <option value="Cateter venoso central">Cateter venoso
                                                                    central</option>
                                                                <option value="Catéter subcutáneo">Catéter subcutáneo
                                                                </option>
                                                                <option value="otra">otra </option>
                                                                <option value="Otra Indicación">Otra Indicación
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_med"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_med">Descripción <i>Otra
                                                                    Indicación</i></label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_med" id="obs_ind_med"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="ind_cur">Curaciones</label>
                                                            <select name="ind_cur" id="ind_cur"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('ind_cur','div_ind_cur','obs_ind_cur',9);">
                                                                <option selected value="0">Seleccione</option>
                                                                <option value="Retiro de puntos">Retiro de puntos
                                                                </option>
                                                                <option value="Curación simple">Curación simple
                                                                </option>
                                                                <option value="Curación Avanzada">Curación Avanzada
                                                                </option>
                                                                <option value="Curación c/afrontamiento">Curación
                                                                    c/afrontamiento</option>
                                                                <option value="Sutura">Sutura</option>
                                                                <option value="Otra Indicación">Otra Indicación
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_cur"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_cur">Descripción <i>Otra
                                                                    Indicación</i></label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_cur" id="obs_ind_cur"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="ind_proc">Sondas y procedimientos</label>
                                                            <select name="ind_proc" id="ind_proc"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('ind_proc','div_ind_proc','obs_ind_proc',9);">
                                                                <option selected value="0">Seleccione</option>
                                                                <option value="Sonda folley con medición de diuresis">
                                                                    Sonda folley con medición de diuresis</option>
                                                                <option value="Sonda folley sin medición de diuresis">
                                                                    Sonda folley sin medición de diuresis</option>
                                                                <option value="Sonda folley con irrigación vesical">
                                                                    Sonda folley con irrigación vesical</option>
                                                                <option value="Cateterismo vesical">Cateterismo vesical
                                                                </option>
                                                                <option value="Sonda Nasogástrica">Sonda Nasogástrica
                                                                </option>
                                                                <option value="Sonda Nasogástrica con lavado gástrico">
                                                                    Sonda Nasogástrica con lavado gástrico</option>
                                                                <option
                                                                    value="Sonda Nasogástrica medición de contenido">
                                                                    Sonda Nasogástrica medición de contenido</option>
                                                                <option value="6">otra</option>
                                                                <option value="9">Otra </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_proc"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_proc">Descripción <i>Otra
                                                                    Indicación</i></label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_proc" id="obs_ind_proc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="ind_inmmed">Inmovilización</label>
                                                            <select name="ind_inmmed" id="ind_inmmed"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('ind_inmmed','div_ind_inmmed','obs_ind_inmmed',9);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Vendaje en 8">Vendaje en 8</option>
                                                                <option value="Cabestrillo">Cabestrillo</option>
                                                                <option value="Férula">Férula</option>
                                                                <option value="Vendaje Compresivo">Vendaje Compresivo
                                                                </option>
                                                                <option value="Valva de yeso braquiopalmar">Valva de
                                                                    yeso braquiopalmar</option>
                                                                <option value="Valva de yeso antebraquiopalmar">Valva
                                                                    de yeso antebraquiopalmar</option>
                                                                <option value="yeso bota larga">yeso bota larga
                                                                </option>
                                                                <option value="yeso bota corta">yeso bota corta
                                                                </option>
                                                                <option value="9">Otra Inmovilización</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_inmmed"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_inmmed">Descripción <i>Otra
                                                                    Indicación</i></label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_inmmed" id="obs_ind_inmmed"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="ind_cv_inmmed_urg" >Control de ciclo</label>
                                                            <select name="ind_cv_inmmed_urg" id="ind_cv_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_cv_inmmed_urg','div_ind_cv_inmmed_urg','obs_ind_cv_inmmed_urg',6);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Cada media hora">Cada media hora</option>
                                                                <option value="Cada hora">Cada hora</option>
                                                                <option value="Cada dos horas">Cada dos horas</option>
                                                                <option value="Cada 4 horas">Cada 4 horas</option>
                                                                <option value="Suspender">Suspender</option>
                                                                <option value="6">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_cv_inmmed_urg" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_ind_cv_inmmed_urg">Descripción <i>Otra Indicación</i></label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_cv_inmmed_urg" id="obs_ind_cv_inmmed_urg"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">

                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="ind_pp">Preparar para</label>
                                                            <select name="ind_pp" id="ind_pp"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('ind_pp','div_ind_pp','obs_ind_pp',9);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Cirugía">Cirugía</option>
                                                                <option value="Traslado">Traslado</option>
                                                                <option value="etc">etc</option>
                                                                <option value="etc">etc</option>
                                                                <option value="Valva de yeso braquiopalmar">Valva de
                                                                    yeso braquiopalmar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_pp"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_b_com">Descripción <i>Otra
                                                                    Indicación</i></label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_pp" id="obs_ind_pp"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Vigilar Signos de
                                                                Alerta</label>
                                                            <input type="text" id="ind_vig_sig" name="ind_vig_sig"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div> --}}


                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_med_servicio">Otras
                                                                Indicaciones (Indicar nombre)</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_med_servicio" id="obs_ind_med_servicio" onkeydown="mostrarObservaciones()" placeholder="Indique nombre de procedimiento y el tipo (llene aqui)"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2 d-none" id="observaciones_otras_indicaciones">
                                                        <div class="form-group">
                                                            <label
                                                                class="floating-label-activo-sm">Observaciones</label>
                                                            <input type="text" id="obs_detalle_ind_med"
                                                                name="obs_detalle_ind_med"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-2">
                                                        <button type="button" class="btn btn-outline-success btn-sm float-right" onclick="indicar_procedimiento_sdi()"><i class="fas fa-save"></i> Guardar</button>
                                                    </div>
                                                    {{-- PROCEDIMIENTOS --}}
                                                    <!--Tabla-->
                                                    <div class="col-sm-12 mt-2">
                                                        <div class="table-responsive">
                                                            <table id="tabla_procedimientos_servicio"
                                                                class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_procedimiento</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Procedimiento</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Vigilar Signos de Alerta</td>
                                                                        <th class="text-center align-middle">Eliminar
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(isset($procedimientos))
                                                                        @foreach ($procedimientos as $p)
                                                                            <tr>
                                                                                <td class="text-center align-middle text-wrap hidden"
                                                                                    hidden="hidden">
                                                                                    {{ $p->id_procedimiento }}</td>
                                                                                <td
                                                                                    class="text-center align-middle text-wrap">
                                                                                    {{ $p->datos_procedimiento->nombre_procedimiento }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle text-wrap">
                                                                                    <input type="text" id="ind_vig_sig{{ $p->id }}" name="ind_vig_sig{{ $p->id }}" class="form-control form-control-sm">
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm"
                                                                                        onclick="eliminar_procedimiento_sdi({{ $p->id }})"><i
                                                                                            class="fa fa-trash"></i></button>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--Cierre: Tabla-->


                                                </div>

                                            </div>

                                            <!--TAB 4-->
                                            <div class="tab-pane fade show" id="curaciones_div" role="tabpanel" aria-labelledby="curaciones_div_tab">
                                                <div class="form-row">
                                                    <div class="col-sm-12">
                                                        <div class="table-responsive">
                                                            <table id="tabla_curaciones_procedimientos"
                                                                class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center align-middle text-wrap hidden"
                                                                            hidden="hidden">id_procedimiento</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Procedimiento</td>
                                                                        <td class="text-center align-middle text-wrap">
                                                                            Vigilar Signos de Alerta</td>
                                                                        <th class="text-center align-middle">Eliminar
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(isset($curaciones))
                                                                        @foreach ($curaciones as $c)
                                                                        <tr>
                                                                                <td class="text-center align-middle text-wrap hidden"
                                                                                    hidden="hidden">
                                                                                    {{ $c->id }}</td>
                                                                                <td
                                                                                    class="text-center align-middle text-wrap">
                                                                                    {{ $c->datos_curacion->nombre_procedimiento }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle text-wrap">
                                                                                    <input type="text" id="ind_vig_sig{{ $c->id }}" name="ind_vig_sig{{ $c->id }}" class="form-control form-control-sm">
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm"
                                                                                        onclick="eliminarCuracion({{ $c->id }})"><i
                                                                                            class="fa fa-trash"></i></button>
                                                                                </td>
                                                                            </tr>
                                                                        </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--DIV DE TABLA -->


                                            <!--Cierre: Tabla-->
                                            <!-- DIV MEDICAMENTO FALTANTE-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-sm-12 mt-3 mb-2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="ranking_recetas_switch">
                                                            <label class="custom-control-label text-primary"
                                                                for="ranking_recetas_switch"><strong><u>Ranking de
                                                                        recetas controladas del
                                                                        paciente</u></strong></label>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="ranking_recetas" style="display:none">
                                                        <div class="col-sm-12 col-md-12">
                                                            <h6 class="text-c-blue mb-3">Recetas propias</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Tipo de control</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option value="S" data-select2-id="0">
                                                                        Seleccione una opción</option>
                                                                    <option value="1"> Control Psicotrópicos
                                                                    </option>
                                                                    <option value="2"> Control Estupefacientes
                                                                    </option>
                                                                    <option value="3"> Receta cheque </option>
                                                                    <option value="4"> Receta Retenida Simple
                                                                    </option>
                                                                    <option value="5"> Receta Retenida C/Codeína
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input class="form-control form-control-sm" type="text"
                                                                placeholder="Nº de recetas">
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <h6 class="text-c-blue mb-3">Recetas totales</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Tipo de control</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="" name="">
                                                                    <option value="S" data-select2-id="0">
                                                                        Seleccione una opción</option>
                                                                    <option value="1"> Control Psicotrópicos
                                                                    </option>
                                                                    <option value="2"> Control Estupefacientes
                                                                    </option>
                                                                    <option value="3"> Receta cheque </option>
                                                                    <option value="4"> Receta Retenida Simple
                                                                    </option>
                                                                    <option value="5"> Receta Retenida C/Codeína
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input class="form-control form-control-sm" type="text"
                                                                placeholder="Nº de recetas">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </div>

                                    <!--SOL EXÁMENES-->
                                    <div class="tab-pane fade show" id="sol_examenes_urg" role="tabpanel" aria-labelledby="sol_examenes_urg-tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                <h6 class="t-aten">Solicitud de exámenes</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Tipo Examen</label>

                                                    <select class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                                        <option value="0">Seleccione</option>
                                                        @foreach ($examenMedico as $exa)
                                                            <option value="{{ $exa->cod_examen }}">
                                                                {{ $exa->nombre_examen }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                                                    <select class="form-control form-control-sm" name="sub_tipo_examen" id="sub_tipo_examen">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Examen</label>
                                                    <select class="form-control form-control-sm" name="examen" id="examen">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Lado</label>
                                                    <select class="form-control form-control-sm" id="lado" name="lado">
                                                        <option value="0" selected>Seleccione</option>
                                                        <option value="Derecho">Derecho</option>
                                                        <option value="Izquierdo">Izquierdo</option>
                                                        <option value="Bilateral">Bilateral</option>
                                                        <option value="N/C">No corresponde</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Prioridad</label>
                                                    <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Baja</option>
                                                        <option value="2">Media</option>
                                                        <option value="3">Alta</option>
                                                        <option value="4">Urgente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group mb-1">
                                                    <label><strong>Con Contraste</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="imagenologia_con_contraste" disabled='disabled' >
                                                        <label for="imagenologia_con_contraste" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="mensaje_imagenologia_con_contraste" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" onclick="indicar_examen_cirugia();" id="agregar_examen_tabla" class="btn btn-info btn-sm float-right">
                                                    <i class="fa fa-plus"></i> Agregar Examen
                                                </button>
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                <!--Tabla-->
                                                <div class="table-responsive">
                                                    <table id="tabla_examen_cirugia" class="table table-bordered table-sm tabla_examenes_ficha">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle" style="display:none">id</th>
                                                                <th class="align-middle" style="display:none">Nombre Examen</th>
                                                                <th class="align-middle">Nombre Examen</th>
                                                                <th class="align-middle">Lado</th>
                                                                <th class="align-middle">Tipo</th>
                                                                {{--  <th class=" align-middle">Sub-Tipo</th>  --}}
                                                                <th class="align-middle">Prioridad</th>
                                                                <th class="align-middle">Con Contraste</th>
                                                                <th class="align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--Cierre Tabla-->
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-12 text-center">
                                                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                                                {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                                                {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                                                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal"  class="btn btn-danger btn-sm mb-2"><i class="fas fa-file-pdf"></i> Generar PDF Orden de Exámenes</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--INDICACIONES Y DESTINO-->
                                    <div class="tab-pane fade show" id="urg_dest_ind" role="tabpanel" aria-labelledby="urg_dest_ind-tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                <h6 class="t-aten">Indicaciones traslado / alta </h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Traslado:</label>
                                                    <select name="dest" id="dest" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dest','div_detalle_dest','obs_dest',4);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="1">Clínica</option>
                                                        <option value="2"> Mismo Hospital</option>
                                                        <option value="3"> Domicilio</option>
                                                        <option value="4">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_detalle_dest" style="display:none">
                                                    <label class="floating-label-activo-sm">Otro Lugar (Describir)</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_dest" id="obs_dest"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Medio de Traslado</label>
                                                    <select name="trasl_en" id="trasl_en" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('trasl_en','div_detalle_trasl_en','obs_trasl_en',3);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="1">Por sus medios</option>
                                                        <option value="2">Ambulancia</option>
                                                        <option value="3">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_detalle_trasl_en" style="display:none">
                                                    <label class="floating-label-activo-sm">Otro  (Describir)</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_trasl_en" id="obs_trasl_en"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Condiciones al alta Urg</label>
                                                    <select name="cond_alt" id="cond_alt" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cond_alt','div_detalle_cond_alt','obs_cond_alt',4);">
                                                        <option selected value="0">Seleccione</option>
                                                        <option value="1">Estable</option>
                                                        <option value="2">Grave</option>
                                                        <option value="3">Bién con ind de control consultorio</option>
                                                        <option value="4">Otro</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_detalle_cond_alt" style="display:none">
                                                    <label class="floating-label-activo-sm">Otro (Describir)</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cond_alt" id="obs_cond_alt"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Indicaciones Médicas</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="fl_resultado_ex">Resultado Exámenes</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="fl_resultado_ex" id="fl_resultado_ex"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    const contenedor = document.getElementById('contenedor');
    const boton = document.getElementById('agregar');
    let contador = 1;
    /* Definimos una variable global para los IDs */
    var idCounter = 2;

    boton.addEventListener('click', () => {
      const textarea = document.createElement('textarea');
      textarea.placeholder = `Evolución ${contador}`;
      textarea.name = `campo_${contador}`;
      contenedor.appendChild(textarea);
      contador++;
    });

    var creatinina = 0;

    function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }
    {{--  METODOS DE RECETA  --}}
    /** Indicar medicamento **/
    function i_medicamento()
    {
        ver_medicamento_ficha_medica_sdi();
        $('#indicar_recetario').modal({backdrop: 'static', keyboard: false});
    }

    function mostrarNuevaEvolucionPaciente(counter) {
        let url = "{{ route('enfermeria.mostrar_nueva_evolucion_paciente') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                $('#contenedor_nueva_evolucion').html(resp);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function asignar_nuevo_triage_paciente(id_triage) {
        $('#id_triage').val(id_triage);
        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');

        $.ajax({
            url: "{{ route('enfermeria.asignar_nuevo_triage_paciente') }}",
            type: 'POST',
            data: {
                id_triage: id_triage,
                id_paciente: idPaciente,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
                if (data.mensaje == 'OK') {
                    $('#modal_asignar_triage').modal('hide');
                    swal({
                        title: "Triage Asignado",
                        text: "El triage ha sido asignado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    }).then(function() {
                        let paciente = data.paciente;
                        console.log(paciente);
                        $('#info_paciente_triage').empty();
                        $('#info_paciente_triage').append(`
                        <div class="alert ` + paciente.clase +
                            ` text-white" role="alert" onclick="abrir_atencion_paciente(` +
                            paciente.id + `)">
                            <i class="fas fa-check"></i>&nbsp; &nbsp; ` + paciente.nombres + ` ` + paciente
                            .apellido_uno + ` ` + paciente.apellido_dos + ` <strong>` + paciente
                            .descripcion + `</strong>
                        </div>
                        `);
                    })
                } else {
                    console.log(data);
                }
            },
            error: function(data) {
                console.log(data.responseText);
            }
        });
    }

    function indicar_procedimiento_sdi() {
        var ind_med = $('#ind_med').val();
        var ind_cur = $('#ind_cur').val();
        var ind_proc = $('#ind_proc').val();
        var ind_inmmed = $('#ind_inmmed').val();
        var ind_cc = $('#ind_cv_inmmed_urg').val();
        var ind_pp = $('#ind_pp').val();
        var ind_vig_sig = $('#ind_vig_sig').val();

        var obs_ind_med = $('#obs_ind_med_servicio').val();
        var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

        var params = new URLSearchParams(location.search);
        var id_paciente = params.get('id_paciente');


        var valido = 0;
        var mensaje = '';

        // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
        // }

        // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Curaciones.\n';
        // }

        // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
        // }

        // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
        // }

        // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Control de ciclo.\n';
        // }

        // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Preparar para.\n';
        // }

        // if ($.trim(ind_vig_sig) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
        // }

        // if ($.trim(obs_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Observaciones.\n';
        // }

        // if ($.trim(obs_detalle_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
        // }


        if (valido == 0) {
            let data = {
                ind_med: ind_med,
                ind_cur: ind_cur,
                ind_proc: ind_proc,
                ind_inmmed: ind_inmmed,
                ind_cc: ind_cc,
                ind_pp: ind_pp,
                ind_vig_sig: ind_vig_sig,
                id_paciente: id_paciente,
                obs_ind_med: obs_ind_med,
                obs_detalle_ind_med: obs_detalle_ind_med,
                _token: "{{ csrf_token() }}"
            };

            console.log(data);
            var url = "{{ route('indicar_procedimiento_sdi') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.status == 1) {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                        });
                        if(curaciones.length > 0){
                            curaciones.forEach(function(curacion) {
                                let datos = curacion.datos_curacion;
                                // Ahora puedes trabajar con datos como un objeto JSON
                                console.log(curacion);
                                $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm" >
                                                <i class="fas fa-edit"></i>

                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${procedimiento.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                `);
                            });
                        }

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        } else {
            swal({
                title: "Indicación de Procedimiento.",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function eliminar_procedimiento_sdi(id) {
            swal({
                title: "Eliminar Procedimiento.",
                text: 'Al "Aceptar" Elimina el procedimiento.\n',
                icon: "warning",
                buttons: ["Cancelar", 'Aceptar'],
            }).then((result) => {
                console.log(result);
                if (result == true) {
                    eliminar_procedimiento_sdi_ajax(id);
                } else {
                    console.log('regresar');
                }
            });
        }

        function suspender_procedimiento_sdi(id) {
            var url = "{{ route('suspender_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(procedimientos);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                var html = '<span class="badge badge-warning">Suspendido </span>';
                            } else {
                                var html = '';
                            }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_hosp tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                    <td class="text-center align-middle text-wrap">
                                        <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                    </td>
                                    <td class="text-center align-middle text-wrap">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                            <i class="fas fa-trash"></i>Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                            onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                            <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                            ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                        </button>
                                    </td>
                                </tr>
                            `);

                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function eliminar_procedimiento_sdi_ajax(id) {
            var url = "{{ route('eliminar_procedimiento_sdi') }}";
            var id_paciente = $('#id_paciente').val();
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        id: id,
                        id_paciente: id_paciente,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;
                        console.log(curaciones);
                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_hosp tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            if (procedimiento.estado == 0) {
                                    var html = '<span class="badge badge-warning">Suspendido </span>';
                                } else {
                                    var html = '';
                                }
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(datos);
                            $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_procedimientos_hosp tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap">
                                            <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                        </td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                                <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                                ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                            </button>
                                        </td>
                                    </tr>
                                `);
                        });

                        curaciones.forEach(function(curacion) {
                            let datos = curacion.datos_curacion;
                            // Ahora puedes trabajar con datos como un objeto JSON
                            console.log(curacion);
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm" >
                                            <i class="fas fa-edit"></i>

                                        </button>
                                    </td>
                                </tr>
                            `);
                        });

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function eliminarCuracion(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('eliminar_curacion') }}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                                "id_paciente": $('#id_paciente').val()
                            },
                            success: function(data) {

                                // convertir json a objeto
                                var obj = JSON.parse(data);
                                var curaciones = obj.curaciones;
                                $('#tabla_curaciones_servicio tbody').empty();
                                $('#tabla_curaciones_procedimientos tbody').empty();
                                curaciones.forEach(curacion => {
                                    let datos = curacion.datos_curacion;
                                    $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `);
                                    $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap hidden" hidden="hidden">${curacion.id}</td>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${curacion.id}" name="ind_vig_sig${curacion.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                `);
                                });

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });

        }

    function eliminarEvolucionPaciente(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function indicar_examen_cirugia()
    {
        var tipo_examen = $("#tipo_examen option:selected").text();
        var id_tipo_examen = $("#tipo_examen").val();
        var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
        var examen = $("#examen option:selected").text();
        var prioridad = $("#prioridad option:selected").text();

        var valido = 0;
        var mensaje = '';

        // Validaciones
        if($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione'){
            valido = 1;
            mensaje += ' Debe seleccionar Tipo Examen\n';
        }
        if($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione'){
            valido = 1;
            mensaje += ' Debe seleccionar Examen\n';
        }
        if($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione'){
            valido = 1;
            mensaje += ' Debe seleccionar Prioridad\n';
        }

        if(valido == 0)
        {
            $('.examenes_sin_registros').remove();
            var i = $('#tabla_examen_cirugia tr').length;
            var fila = '';

            fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
            fila +=     '<td class="text-center align-middle text-wrap">' + $('<div>').text(examen).html() + '</td>';
            fila +=     '<td class="text-center align-middle text-wrap">' + $('<div>').text(tipo_examen).html() + '</td>';
            fila +=     '<td class="text-center align-middle text-wrap">' + $('<div>').text(prioridad).html() + '</td>';

            var text_con_contraste = 'N/C';
            if($('#imagenologia_con_contraste').prop('checked'))
                text_con_contraste = 'Con Contraste';

            fila +=     '<td class="text-center align-middle text-wrap">' + text_con_contraste + '</td>';
            fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen(\'row' + i + '\');">Quitar</div></td>';
            fila += '</tr>';

            i++;
            $('#tabla_examen_cirugia tr:first').after(fila);

            // Verificar si necesita agregar CREATININA
            if($('#imagenologia_con_contraste').prop('checked'))
            {
                $('#tabla_examen_cirugia tr').each(function(key, value)
                {
                    $(value).find('td').each(function(key_td, value_td)
                    {
                        if(key_td == 0)
                        {
                            if($(value_td).text() == 'CREATININA EN SANGRE')
                            {
                                creatinina = 1;
                            }
                        }
                    });
                });

                if(creatinina == 0)
                {
                    fila = '';
                    fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">SANGRE</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Media</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_contraste(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';
                    $('#tabla_examen_cirugia tr:first').after(fila);
                }
            }

            // Limpiar formulario después de agregar
            $("#tipo_examen").val('');
            $("#sub_tipo_examen").val('');
            $("#examen").val('');
            $("#prioridad").val(2);
            $('#imagenologia_con_contraste').prop('checked', false);
            $('#mensaje_imagenologia_con_contraste').hide();
        }
        else
        {
            swal({
                title: "Ingreso de examen(es).",
                text: mensaje,
                icon: "error",
            });
        }
    }



        function eliminar_examen_contraste(id_row)
        {
            swal({
                title: "Eliminar Examen relacionado con contraste.",
                text: 'Al "Aceptar" Elimina el examen relacionado con contraste.\n',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                }
                else
                {
                    $('#tabla_examen_cirugia [id='+id_row+']').remove();
                    creatinina = 0;
                }
            });
        }

     function mostrarFormularioReceta(id) {
        console.log(id);
        if (id == 1) {
            $('#rec_1').addClass('show active');
            $('#rec_2').removeClass('show active');
            $('#procedimiento_div').removeClass('show active');
            $('#curaciones_div').removeClass('show active');
        } else if (id == 2) {
            $('#rec_2').addClass('show active');
            $('#rec_1').removeClass('show active');
            $('#procedimiento_div').removeClass('show active');
            $('#curaciones_div').removeClass('show active');
        } else if (id == 3) {
            $('#rec_1').removeClass('show active');
            $('#rec_2').removeClass('show active');
            $('#procedimiento_div').addClass('show active');
            $('#curaciones_div').removeClass('show active');
        }else{
            console.log('es 4');
            $('#rec_1').removeClass('show active');
            $('#rec_2').removeClass('show active');
            $('#procedimiento_div').removeClass('show active');
            $('#curaciones_div').addClass('show active');
        }
    }

    function calcularPAM(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var pas = $('#pas' + id).val();
        if (pas == '') {
            pas = 0;
        }
        var pad = $('#pad' + id).val();
        // if(pad == ''){
        //     pad = 0;
        // }
        // var pam = ((parseInt(pas) * 2) + parseInt(pad)) / 3;
        // $('#pam' + id).val(pam.toFixed(2));

        var resultado = ((parseInt(pad) * 2) + parseInt(pas));
        $('#pam' + id).val((parseInt(resultado) / 3).toFixed(2));
    }

    function calcularIMC(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var talla = $('#talla' + id).val();
        var peso = $('#peso' + id).val();
        console.log(talla);
        console.log(peso);
        if (talla == '' || peso == '') {
            return;
        }
        var height = talla / 100;
        var imc = peso / (height ** 2);
        $('#imc' + id).val(imc.toFixed(2));
    }

    function eliminarEvolucionAgregada(id) {
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de eliminar esta evolución?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmarEliminarEvolucionAgregada(id);
            }
        })
    }

    function confirmarEliminarEvolucionAgregada(id){
        let url = "{{ route('enfermeria.eliminar_evolucion_agregada') }}";
        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');
        $.ajax({
            url: url,
            type: 'post',
            data: {
                id: id,
                id_paciente: idPaciente,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución eliminada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').append(vista);
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrarDatosRespiracion(e, idEvolucion = null){
        console.log(e);
        let id = idEvolucion ? idEvolucion : '';
        let value = e.target.value;
        console.log(value);
        if(value == 0){
            $('#select_info_respiracion_servicio'+id).addClass('d-none');
        }else{
            $('#select_info_respiracion_servicio'+id).removeClass('d-none');
        }

    }

    function cerrarModalMedicamentosFicha_sdi()
    {
        swal({
            title: "Ingreso de medicamento(s).",
            text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Receta" para guardar cambios.',
            icon: "warning",
            buttons: ["Aceptar", 'Cancelar'],
        }).then((result) => {
            if (result == true)
            {
                console.log('regresar');
            } else {

                $('#indicar_recetario').modal('hide');
            }
        })
    };

    function getDosis_sdi()
    {

        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        console.log(id_medicamento);

        let url = "{{ route('dental.getDosis') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    id_medicamento: id_medicamento,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let dosis = $('#dosis_medicamento_ficha_dental');

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                            '</option>');
                    })

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function getFrecuencia_sdi()
    {

        let id_dosis = $('#dosis_medicamento_ficha_dental').val();
        //console.log(dosis);

        let url = "{{ route('dental.getFrecuencia') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    id_dosis: id_dosis,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let dosis = $('#frecuencia_medicamento_ficha_dental');

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        dosis.append('<option value="' + v.id + '">' + v.indic +
                            '</option>');
                    })

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function getCantComp_sdi()
    {

        var cant_comp = $('#dosis_medicamento_ficha_dental option:selected').attr('data-cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    cant_comp: cant_comp,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let select_cant_comp = $('#cantidad_comprar');
                    let select_cant_comp2 = $('#med_cronicomes');

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +'</option>');
                    })
                    select_cant_comp.append('<option value="999">Otra Cantidad</option>');
                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function validar_via_administracion_sdi()
    {
        if($('#via_administracion_ficha_dental').val() == 11)
        {
            $('#div_observaciones_medicamento_ficha_dental').show();
            $('#observaciones_medicamento_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_medicamento_ficha_dental').hide();
            $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');
            $('#observaciones_medicamento_ficha_dental').val('');
        }
    }

    function validar_periodo_sdi()
    {
        if($('#periodo_ficha_dental').val() == 11)
        {
            $('#div_observaciones_periodo_ficha_dental').show();
            $('#observaciones_periodo_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_periodo_ficha_dental').hide();
            $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');
            $('#observaciones_periodo_ficha_dental').val('');
        }
    }

    function validar_cantidad_comprar_sdi()
    {
        if($('#cantidad_comprar').val() == 999)
        {
            $('#div_otra_cantidad_a_comprar').show();
            $('#otra_cantidad_a_comprar').removeAttr('disabled');
        }
        else
        {
            $('#div_otra_cantidad_a_comprar').hide();
            $('#otra_cantidad_a_comprar').attr('disabled','disabled');
            $('#otra_cantidad_a_comprar').val('');
        }
    }

    function indicar_medicamento_sdi()
    {

        let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
        let farmaco = $('#nombre_composicion_farmaco').html();
        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        let id_tipo_control = $('#id_medicamento_tipo_control').val();

        let id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
        let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

        let id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

        let dosis_medicamento_ficha_dental_2 = $('#dosis_medicamento_ficha_dental_2').val();
        let frecuencia_medicamento_ficha_dental_2 = $('#frecuencia_medicamento_ficha_dental_2').val();

        let id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

        {{--  let id_periodo_ficha_dental = $('#periodo_ficha_dental').val();  --}}
        {{--  let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#observaciones_periodo_ficha_dental').val();  --}}

        {{--  let id_cantidad_comprar = $('#cantidad_comprar').val();  --}}
        {{--  let cantidad_comprar = $('#cantidad_comprar option:selected').text();  --}}

        {{--  let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar').val();  --}}


        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[0]).text().split("\n").join("")));
            }
        });

        // console.log('indicar_medicamento');
        // console.log('lista_med');
        // console.log(lista_med);

        if($.inArray(id_medicamento,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($('#id_medicamento_ficha_dental').val() != '')
            {
                if($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 || dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental == 'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }
                if($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 || frecuencia_medicamento_ficha_dental == 'Seleccione una opción' || frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }
            }
            else
            {
                if( dosis_medicamento_ficha_dental_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Dosis\n';
                }
                else
                {
                    dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
                }
                if( frecuencia_medicamento_ficha_dental_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
                }
                else
                {
                    frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
                }
            }

            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else if($('#cantidad_comprar').val() == '999')
            {
                if( $.trim(otra_cantidad_a_comprar) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Cantidad a Comprar\n';
                }
                else
                {
                    cantidad_comprar = otra_cantidad_a_comprar;
                }
            }  --}}

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_dosis_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_frecuencia_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }

                //$("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
                {{--  var nFilas = $("#tabla_medicamento_cirugia_sdi tr").length;  --}}
                $('#nombre_medicamento_ficha_dental').val('');
                $('id_medicamento_ficha_dental').val('');

                $('#nombre_composicion_farmaco').html('');

                {{--  $('#dosis_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
                $('#dosis_medicamento_ficha_dental').val(0);

                {{--  $('#frecuencia_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
                $('#frecuencia_medicamento_ficha_dental').val(0);

                $('#dosis_medicamento_ficha_dental_2').val('');
                $('#frecuencia_medicamento_ficha_dental_2').val('');

                $('#via_administracion_ficha_dental').val(0);
                $('#observaciones_medicamento_ficha_dental').val('');
                $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');

                {{--  $('#periodo_ficha_dental').val(0);
                $('#observaciones_periodo_ficha_dental').val('');
                $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');



                $('#cantidad_comprar').val(0);
                $('#otra_cantidad_a_comprar').val('');
                $('#otra_cantidad_a_comprar').attr('disabled','disabled');

                $('#mensaje_med_control').html('');  --}}


                $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();
                //$("#adicionados").append(nFilas - 1);
                //$("#sub_tipo_examen").empty();
                //$("#nro_orden").disabled();

            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text:mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function eliminar_medicamento_sdi(id_row)
    {
        $('#tabla_medicamento_cirugia_sdi [id='+id_row+']').remove();
    }

    function enviar_medicamento_faltante_sdi()
    {
        var med_faltante = $.trim($('#med_faltante').val());
        var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

        if(med_faltante != '')
        {
            /** registro */
            let url = "{{ route('medicamentoFaltante.registro')}}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional: id_profesional,
                    nombre: med_faltante,
                    droga: med_droga,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#med_faltante').val('');
                        $('#no_existe_switch').prop( "checked", false );
                        $('#no_existe').hide();

                    }
                    else{

                        swal({
                            title: "Problema al Enviar solicitud.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        else
        {
            swal({
                title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
        }

    }

    // function ver_pdf_receta(id_ficha_atencion)
    // {
    //     let url = "{{ route('pdf.receta_medicamentos') }}";
    //     Fancybox.show(
    //         [
    //             {
    //             src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion,
    //             type: "iframe",
    //             preload: false,
    //             },
    //         ]
    //     );
    // }
    {{--  METODOS DE RECETA  FIN --}}


    {{--  CARGAR MEDICAMENTOS DE FICHA MEDICA  --}}
    function ver_medicamento_ficha_medica_sdi()
    {

        let url = "{{ route('profesional.receta.ver') }}";

        var _token = CSRF_TOKEN;
        var id_ficha = $('#id_fc').val();
        $('#tabla_medicamento_cirugia_sdi').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_ficha:id_ficha
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_medicamento_ficha_medica_sdi-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_tipo_control</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_producto</td>';
                html += '        <td class="text-center align-middle text-wrap">Medicamentos</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">Farmaco</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_presentacion</td>';
                html += '        <td class="text-center align-middle text-wrap">Presentación</td>';
                html += '        <td class="text-center align-middle text-wrap" hidden="hidden">id_receta_dosis</td>';
                html += '        <td class="text-center align-middle text-wrap hidden">Posología</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_via_administracion</td>';
                html += '        <td class="text-center align-middle text-wrap">Vía Adm.</td>';
                {{--  html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>';
                html += '        <td class="text-center align-middle text-wrap">Periodo</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>';
                html += '        <td class="text-center align-middle text-wrap">Comprar</td>';  --}}
                html += '        <th class="text-center align-middle">Eliminar</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';

                if(data.estado == 1)
                {
                    var i = 1;
                    $.each(data.registros, function(index, value)
                    {
                        console.log(value);
                        if(value.detalle.length > 0)
                        {
                            $.each(value.detalle, function(index_2, value_2)
                            {

                                html += '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">';
                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_tipo_control + '</td>';

                                if(value_2.id_tipo_control == 8)
                                {
                                    html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.producto + '</td>';

                                    var data= value_2.producto;
                                    arr = $.parseJSON(data);
                                    var text_producto = '';
                                    $.each(arr,function(key,value)
                                    {
                                        text_producto += ''+value.nombre+': '+value.cantidad+'<br/>';
                                    });

                                    html +=     '<td class="text-center align-middle text-wrap">' + text_producto + '</td>';
                                }
                                else
                                {
                                    html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_producto + '</td>';
                                    html +=     '<td class="text-center align-middle text-wrap">' + value_2.producto + '</td>';
                                }

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.farmaco + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_presentacion + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.presentacion + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_receta_dosis + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.posologia + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_via_administracion + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.via_administracion + '</td>';

                                {{--  html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_periodo + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.periodo + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.uso_cronico + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.cantidad + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.cantidad_compra + '</td>';  --}}

                                html +=     '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>';
                                html += '</tr>';
                                i++;
                            });
                        }
                    });
                }
                else
                {
                    html += '<tr class="medicamentos_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="15">'+data.msj+'</td>';
                    html += '</tr>';
                }

                html += '</tbody>';

                $('#tabla_medicamento_cirugia_sdi').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function alerta_registro_medicamento_sdi()
    {

        swal({
            title: "Ingreso de medicamento(s) exitoso.",
            text: "Recuerde 'Guardar Ficha Clínica' para finalizar el proceso.",
            icon: "success",
            // buttons: "Aceptar",
            //SuccessMode: true,
        });
        //alert("ingreso de medicamento(s) exitoso, favor terminar el registro.");
        $('#nombre_medicamento_ficha_dental').val('');
        $('#dosis_medicamento_ficha_dental').val('');
        $('#frecuencia_medicamento_ficha_dental').val('');
        $('#via_administracion_ficha_dental').val('0');
        {{--  $('#periodo_ficha_dental').val('0');  --}}
    }

    function agregarEvolucionPaciente(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var fecha = $('#fecha' + id).val();
        var hora = $('#hora' + id).val();
        var temperatura = $('#temperatura' + id).val();
        var pulso = $('#pulso' + id).val();
        var pas = $('#pas' + id).val();
        var pad = $('#pad' + id).val();
        var pam = $('#pam' + id).val();
        var frec_resp = $('#fr' + id).val();
        var peso = $('#peso' + id).val();
        var talla = $('#talla' + id).val();
        var imc = $('#imc' + id).val();
        var tipo_respiracion_servicio = $('#tipo_respiracion_servicio' + id).val();
        var sat_fio2 = $('#saturacion_fio2' + id).val();
        var sat_o2 = $('#saturacion_oxigeno' + id).val();
        var dispositivo_servicio = $('#dispositivo_servicio' + id).val();
        var hemoglucotest = $('#hemoglucotest' + id).val();
        var glasgow = $('#glasgow' + id).val();
        var c_eva = $('#c_eva' + id).val();
        var otras_pruebas = $('#otras_pruebas' + id).val();
        var gravedad_e_conc = $('#gravedad_e_conc' + id).val();

        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');



        var data = {
            id_paciente: idPaciente,
            fecha: fecha,
            hora: hora,
            temperatura: temperatura,
            pulso: pulso,
            pas: pas,
            pad: pad,
            pam: pam,
            frec_resp: frec_resp,
            peso: peso,
            talla: talla,
            imc: imc,
            tipo_respiracion_servicio: tipo_respiracion_servicio,
            sat_fio2: sat_fio2,
            sat_o2: sat_o2,
            dispositivo_servicio: dispositivo_servicio,
            hemoglucotest: hemoglucotest,
            glasgow: glasgow,
            c_eva: c_eva,
            otras_pruebas: otras_pruebas,
            gravedad_e_conc: gravedad_e_conc,
            idCounter: idCounter,
            idEvolucion: idEvolucion,
            id_ficha_atencion: $('#id_fc').val(),
            _token: '{{ csrf_token() }}'
        }

        let url = "{{ route('enfermeria.agregar_evolucion_paciente') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución agregada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').html(vista);
                    $('#contenedor_nueva_evolucion').empty();
                    idCounter++;
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function registrar_medicamentos_ficha_sdi()
    {
        var rows1 = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");

                rol['id_tipo_control'] = $.trim($(data[0]).text().split("\n").join(""));//id_tipo_control

                rol['id_producto'] = $.trim($(data[1]).text().split("\n").join(""));//id_medicamento
                rol['producto'] = $.trim($(data[2]).text().split("\n").join(""));//nombre_medicamento_ficha_dental
                rol['componente'] = $.trim($(data[3]).text().split("\n").join(""));//nombre_medicamento_ficha_dental

                rol['id_dosis'] = $.trim($(data[4]).text().split("\n").join(""));//id_dosis_medicamento_ficha_dental
                rol['dosis'] = $.trim($(data[5]).text().split("\n").join(""));//dosis_medicamento_ficha_dental

                rol['id_posologia'] = $.trim($(data[6]).text().split("\n").join(""));//id_frecuencia_medicamento_ficha_dental
                rol['posologia'] = $.trim($(data[7]).text().split("\n").join(""));//frecuencia_medicamento_ficha_dental

                rol['id_via_administracion'] = $.trim($(data[8]).text().split("\n").join(""));//id_via_administracion_ficha_dental
                rol['via_administracion'] = $.trim($(data[9]).text().split("\n").join(""));//via_administracion_ficha_dental

                {{--  rol['id_periodo'] = $.trim($(data[10]).text().split("\n").join(""));//id_periodo_ficha_dental
                rol['periodo'] = $.trim($(data[11]).text().split("\n").join(""));//periodo_ficha_dental

                rol['uso_cronico'] = $.trim($(data[12]).text().split("\n").join(""));//medicamento_uso_cronico

                rol['cantidad'] = $.trim($(data[13]).text().split("\n").join(""));//id_cantidad_comprar
                rol['cantidad_comprar'] = $.trim($(data[14]).text().split("\n").join(""));//cantidad_comprar  --}}

                rows1.push(rol);
            }
        });

        console.log(rows1);

        $('#medicamentos').val(JSON.stringify(rows1));

        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        var _token = CSRF_TOKEN;


        // let url = "{{ route('detalle_receta.registro_medicamentos') }}";
        let url = "{{ route('profesional.receta.registro') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                medicamentos: JSON.stringify(rows1),
                id_ficha: id_ficha_atencion,
                id_ingreso_paciente: '0',
                id_recuperacion: '0',
                id_sala: '0',
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                {{--  data = JSON.parse(data);  --}}
                console.log(data)

                if(data.falla == '0'){
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: 'Medicamentos registrados con Exito.',
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{-- MEDICAMENTO MANUAL --}}
    function validar_via_administracion_manual_sdi()
    {
        if($('#manual_via_administracion_ficha_dental').val() == 11)
        {
            $('#div_manual_observaciones_via_administracion_ficha_dental').show();
            $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
            $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled','disabled');
            $('#manual_observaciones_via_administracion_ficha_dental').val('');
        }
    }

    function validar_periodo_manual_sdi()
    {
        if($('#manual_periodo_ficha_dental').val() == 11)
        {
            $('#div_manual_observaciones_periodo_ficha_dental').show();
            $('#manual_observaciones_periodo_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_periodo_ficha_dental').hide();
            $('#manual_observaciones_periodo_ficha_dental').attr('disabled','disabled');
            $('#manual_observaciones_periodo_ficha_dental').val('');
        }
    }
    function indicar_indicacion_sdi()
    {

        let indicacion = $('#indicacion').val();
        let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
        let farmaco = $('#manual_nombre_composicion_farmaco').val();
        let tipo_control = $('#manual_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

        {{--  let cantidad_comprar = $('#manual_cantidad_comprar').val();
        let cantidad_numero_comprar = $('#manual_cantidad_numero').val();  --}}

        let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

        {{--  let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();  --}}



        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#manual_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($.trim(tipo_control) == '0')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Tipo Control.\n';
            }

            if($.trim(farmaco) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Farmaco.\n';
            }

            if($.trim(dosis_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }


            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else
            {
                const regex = /\(\d+\) \w+ \w+/g;
                if (!regex.test(cantidad_comprar))
                {
                    console.log('no cuadra');
                    valido = 1;
                    mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                }
                else
                {
                    console.log('correcto');
                }
            }  --}}

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila


                // var text = cantidad_comprar;
                // var inicio = text.indexOf('(')+1;
                // var fin = text.indexOf(')');
                // var cantidad_num = text.substring(inicio, fin);


                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }


                $('#manual_nombre_medicamento_ficha_dental').val('');
                $('#manual_id_medicamento_ficha_dental').val('');
                $('#manual_nombre_composicion_farmaco').val('');
                $('#manual_dosis_medicamento_ficha_dental').val('');
                $('#manual_frecuencia_medicamento_ficha_dental').val('');
                {{--  $('#manual_cantidad_comprar').val('');  --}}
                $('#manual_via_administracion_ficha_dental').val(0);
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
                {{--  $('#manual_periodo_ficha_dental').val(0);  --}}
                {{--  $('#manual_observaciones_periodo_ficha_dental').val('');  --}}

                {{--  $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();  --}}

            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }
    function indicar_medicamento_manual_sdi()
    {

        let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
        let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
        let farmaco = $('#manual_nombre_composicion_farmaco').val();
        let tipo_control = $('#manual_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

        {{--  let cantidad_comprar = $('#manual_cantidad_comprar').val();
        let cantidad_numero_comprar = $('#manual_cantidad_numero').val();  --}}

        let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

        {{--  let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();  --}}



        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#manual_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($.trim(tipo_control) == '0')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Tipo Control.\n';
            }

            if($.trim(farmaco) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Farmaco.\n';
            }

            if($.trim(dosis_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }


            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo cantidad a comprar.\n';
            }
            else
            {
                const regex = /\(\d+\) \w+ \w+/g;
                if (!regex.test(cantidad_comprar))
                {
                    console.log('no cuadra');
                    valido = 1;
                    mensaje += 'El campo de cantidad a comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                }
                else
                {
                    console.log('correcto');
                }
            }  --}}

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila


                // var text = cantidad_comprar;
                // var inicio = text.indexOf('(')+1;
                // var fin = text.indexOf(')');
                // var cantidad_num = text.substring(inicio, fin);


                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }


                $('#manual_nombre_medicamento_ficha_dental').val('');
                $('#manual_id_medicamento_ficha_dental').val('');
                $('#manual_nombre_composicion_farmaco').val('');
                $('#manual_dosis_medicamento_ficha_dental').val('');
                $('#manual_frecuencia_medicamento_ficha_dental').val('');
                {{--  $('#manual_cantidad_comprar').val('');  --}}
                $('#manual_via_administracion_ficha_dental').val(0);
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
                {{--  $('#manual_periodo_ficha_dental').val(0);  --}}
                {{--  $('#manual_observaciones_periodo_ficha_dental').val('');  --}}

                {{--  $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();  --}}

            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    {{--  function indicar_medicamento_magistral_sdi()
    {

        let id_medicamento = 0;
        let farmaco = '';

        let tipo_control = $('#magistral_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#magistral_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#magistral_frecuencia_medicamento_ficha_dental').val();

        let id_via_administracion_ficha_dental = $('#magistral_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#magistral_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#magistral_observaciones_via_administracion_ficha_dental').val();

        let id_periodo_ficha_dental = $('#magistral_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#magistral_periodo_ficha_dental option:selected').text();
        let observaciones_periodo_ficha_dental = $('#magistral_observaciones_periodo_ficha_dental').val();

        let cantidad_comprar = $('#magistral_cantidad_comprar').val();
        // $('#magistral_medicamento_uso_cronico').val();

        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        var array_med = [];
        var text_med = '';
        $('.componente').each(function(key, elemento)
        {
            var nombre = $(elemento).find( '#magistral_nombre_medicamento_ficha_dental' ).val();
            var cantidad = $(elemento).find( '#magistral_cantidad_medicamento_ficha_dental' ).val();

            if(nombre == '' || cantidad == '')
            {
                valido = 1;
                mensaje += 'Debe completar de forma correcto los Compuestos o Cantidades.\n';
            }

            array_med.push( {'nombre':nombre, 'cantidad':cantidad } );
            text_med += ''+nombre+':'+cantidad+'<br>';
        });


        if($.inArray(text_med,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#magistral_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(tipo_control) == '')
            {
                valido = 1;
                mensaje += 'Debe seleccionar el Tipo de Control.\n';
            }

            if($.trim(dosis_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }

            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#magistral_periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else
            {
                // const regex = /\(\d+\) \w+ \w+/g;
                // if (!regex.test(cantidad_comprar))
                // {
                //     console.log('no cuadra');
                //     valido = 1;
                //     mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                // }
                // else
                // {
                //     console.log('correcto');
                // }
            }

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

                // var text = cantidad_comprar;
                // var inicio = text.indexOf('(')+1;
                // var fin = text.indexOf(')');
                // var cantidad_num = text.substring(inicio, fin);

                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + JSON.stringify(array_med) + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + text_med + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden"></td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + periodo_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>' +
                                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                console.log(fila);

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                var html_comp = '';
                html_comp += '<div class="form-row componente">';
                html_comp += '    <div class="col-sm-8 mt-6">';
                html_comp += '        <div class="form-group">';
                html_comp += '            <label class="floating-label-activo-sm">Ingrese los Compuestos</label>';
                html_comp += '            <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">';
                html_comp += '        </div>';
                html_comp += '    </div>';
                html_comp += '    <div class="col-sm-4 mt-6">';
                html_comp += '        <div class="form-group">';
                html_comp += '            <label class="floating-label-activo-sm">Ingrese la cantidad</label>';
                html_comp += '            <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">';
                html_comp += '        </div>';
                html_comp += '    </div>';
                html_comp += '</div>';

                $('.div_componentes').html('');
                $('.div_componentes').html(html_comp);

                $('#magistral_tipo_control').val('8');
                $('#magistral_dosis_medicamento_ficha_dental').val('');
                $('#magistral_frecuencia_medicamento_ficha_dental').val('');
                $('#magistral_via_administracion_ficha_dental').val('');
                $('#magistral_observaciones_via_administracion_ficha_dental').val('');
                $('#magistral_periodo_ficha_dental').val('');
                $('#magistral_observaciones_periodo_ficha_dental').val('');
                $('#magistral_cantidad_comprar').val('');

                $( "#magistral_medicamento_uso_cronico" ).prop( "checked", false ).change();

            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text:mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }  --}}

    function agregar_componente()
    {
        var cant = $('.componente').length+1;
        var html = '';
        html += '<div class="form-row componente">';
        html += '    <div class="col-sm-8 mt-6">';
        html += '        <div class="form-group">';
        html += '            <label class="floating-label-activo-sm">Ingrese los Compuestos</label>';
        html += '            <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-4 mt-6">';
        html += '        <div class="form-group">';
        html += '            <label class="floating-label-activo-sm">Ingrese la cantidad</label>';
        html += '            <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('.div_componentes').append(html);
    }

    function cargarCantidadComprar(cantidad, unidad, input)
    {
        var valor = $('#'+cantidad).val();
        var valor_text = $('#'+cantidad+' option:selected').text();
        var unid = $('#'+unidad).val();
        $('#'+input).val(valor_text+' '+unid);
        $('#'+input+'_label').html(valor_text+' '+unid);
    }

</script>
