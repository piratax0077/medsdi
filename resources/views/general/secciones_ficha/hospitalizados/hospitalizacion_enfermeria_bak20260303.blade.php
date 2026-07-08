
<div class="card-a mt-2">
    <div class="card-header-a" id="enf_hospital">
        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open @if(!$enfermera) collapsed @endif" type="button" data-toggle="collapse" data-target="#enf_hospital_c" aria-expanded="@if($enfermera) true @else false @endif" aria-controls="enf_hospital_c">
            Atención y evolución de enfermería
        </button>
    </div>
    <div id="enf_hospital_c" class="collapse @if($enfermera) show @endif" aria-labelledby="enf_hospital" data-parent="#enf_hospital">
        <div class="card-body-aten-a">
            <div id="form-enf">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ing_enf_tab" data-toggle="tab" href="#ing_enf" role="tab" aria-controls="ing_enf" aria-selected="true">Ingreso al servicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_cont_ciclo_tab" data-toggle="tab" href="#enf_cont_ciclo" role="tab" aria-controls="enf_cont_ciclo" aria-selected="true" onclick="mostrarNuevaEvolucionPaciente(1500)">Controles de Ciclo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_asig_urg_tab" data-toggle="tab" href="#enf_asig_urg" role="tab" aria-controls="enf_asig_urg" aria-selected="true" onclick="$('#tabla_historial_triages').DataTable();">Asignación de Gravedad </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_tto_tab" data-toggle="tab" href="#enf_tto" role="tab" aria-controls="enf_tto" aria-selected="true">Tratamientos diarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_proc_tab" data-toggle="tab" href="#enf_proc" role="tab" aria-controls="enf_proc" aria-selected="true">Procedimientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="enf_examenes_tab" data-toggle="tab" href="#enf_examenes" role="tab" aria-controls="enf_examenes" aria-selected="true" onclick="dame_examenes_hosp_enfermera()">Toma de Exámenes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="orl_adulto">
                            <!--INGRESO ENFERMERIA-->
                            <div class="tab-pane fade show active" id="ing_enf" role="tabpanel" aria-labelledby="ing_enf_tab">
                                <div class="form-row">
                                    <div class="col-12">
                                        <h6 class="tit-gen">Ingreso al servicio</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="ing_enf" role="tabpanel" aria-labelledby="ing_enf_tab">
                                                <div class="form-row mt-3">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                                                        <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm" for="antecedentes">Medio en que llega</label>
                                                        <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm" for="antecedentes">Escala EVA</label>
                                                        <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm" for="examen_fisico">Observaciones de la Hospitalización</label>
                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="EXAMEN ENFERMERÍA"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CONTROL DE CICLO-->
                            <div class="tab-pane fade show" id="enf_cont_ciclo" role="tabpanel" aria-labelledby="enf_cont_ciclo_tab">
                                <div class="form-row">
                                    <div class="col-12">
                                        <h6 class="tit-gen">Control de ciclo</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="enf_cont_ciclo" role="tabpanel" aria-labelledby="enf_cont_ciclo_tab"><br>
                                                <div class="col-sm-12 col-md-12">
                                                    @include('general.secciones_ficha.signos_vitales_ingreso_urgencia')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ASIGNAR GRAVEDAD--><!--enviar email a contacto responsable-->
                            <div class="tab-pane fade show " id="enf_asig_urg" role="tabpanel" aria-labelledby="enf_asig_urg_tab">
                                <div class="row">
                                    @if($enfermera)
                                    @foreach($niveles_urgencia as $nivel_urgencia)
                                    <div class="col-sm-12 col-md">
                                        <div class="card text-center {{ $nivel_urgencia->clase_html }} h-100">
                                            <div class="card-body pt-3 pb-1">
                                                <h4 class="text-white font-weight-bold">{{ $nivel_urgencia->codigo }}</h4>
                                                <p class="card-text text-white font-weight-bold">{{ $nivel_urgencia->descripcion }}</p>
                                                <button type="button"
                                                    class="btn btn-xxs btn-outline-light" onclick="asignar_nuevo_triage_paciente({{ $nivel_urgencia->id }})">ASIGNAR</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="col-sm-12 mt-3">
                                        <div id="info_paciente_triage">
                                            <div class="alert {{ $paciente->clase }} text-white" role="alert" onclick="abrir_atencion_paciente({{ $paciente->id }})">
                                                <i class="fas fa-check"></i>&nbsp; &nbsp; {{ $paciente->nombres }} {{ $paciente->apellido_uno }} <strong>{{ $paciente->descripcion }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabla para mostrar el historial de asignaciones de triage -->
                                    <div class="col-sm-12 mt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm" id="tabla_historial_triages">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha y Hora</th>
                                                        <th class="text-center align-middle">Nivel de Urgencia Asignado</th>
                                                        <th class="text-center align-middle">Responsable de la Asignación</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="historial_triage_paciente">
                                                    @if(isset($historial_triage) && count($historial_triage) > 0)
                                                    @foreach($historial_triage as $historial)
                                                        <tr>
                                                            <td class="text-center align-middle">{{ $historial->created_at }}</td>
                                                            <td class="text-center align-middle" id="descripcion_urgencia{{ $historial->id }}">{{ $historial->descripcion_urgencia }}</td>
                                                            <td class="text-center align-middle">{{ $historial->nombre_profesional }} {{ $historial->apellido_uno_profesional }} {{ $historial->apellido_dos_profesional }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td class="text-center align-middle" colspan="3">No hay historial de asignaciones de triage para este paciente.</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EJECUTAR TRATAMIENTO-->
                            <div class="tab-pane fade show " id="enf_tto" role="tabpanel" aria-labelledby="enf_tto_tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 col-xxl-2">
                                        <ul class="nav flex-column nav-pills mb-3 mb-3" id="enf_urg" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link-aten text-reset active" id="tto_ingreso2_tab" data-toggle="tab" href="#tto_ingreso_2" role="tab" aria-controls="tto_ingreso_2" aria-selected="true">Tto. Administrados</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link-aten text-reset" id="tto_pendiente_externo_tab" data-toggle="tab" href="#tto_pendiente_externo" role="tab" aria-controls="tto_pendiente_externo" aria-selected="flase">Tto. Externos</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xxl-10">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <!--TRATAMIENTOS ADMINISTRADO-->
                                            <div class="tab-pane fade show active" id="tto_ingreso_2" role="tabpanel" aria-labelledby="tto_ingreso2_tab">
                                                <div class="form-row">
                                                    <div class="col-sm-6 col-md-6 mb-3">
                                                        <h6 class="tit-gen"> Tratamientos Pendientes y Administrados</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="tabla_medicamento_cirugia_sdi_enfermera_adm"
                                                                    class="table table-bordered table-xs">
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">id_tipo_control</td>
                                                                            <td class="text-center align-middle text-wrap hidden"
                                                                                hidden="hidden">id_producto</td>
                                                                            <td class="text-center align-middle text-wrap">
                                                                                Repeticiones
                                                                            </td>
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
                                                                            <th class="text-center align-middle">Tiempo Restante</th>
                                                                            <th class="text-center align-middle">Acciones</th>
                                                                            <th class="text-center align-middle">Estado</th>
                                                                            <th class="text-center align-middle">Finalizado</th>
                                                                    </thead>
                                                                <tbody id="tbody_tabla_medicamento_cirugia_sdi_enfermera_adm">
                                                                    @foreach ($recetas as $r)
                                                                        <tr>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                                                {{ $r->id ?? $r['id'] ?? '' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                                                {{ $r->id_producto ?? $r['id_producto'] ?? '' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap" id="repeticiones_medicamento_{{ $r->id ?? $r['id'] ?? '' }}">
                                                                                {{ $r->contador_dosis ?? $r['contador_dosis'] ?? '-' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap">
                                                                                {{ $r->producto ?? $r['producto'] ?? '-' }}
                                                                                <br><small>{{ $r->farmaco ?? $r['farmaco'] ?? '' }}</small>
                                                                                <br><small>{{ $r->presentacion ?? $r['presentacion'] ?? '' }}</small>
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                                                {{ $r->farmaco ?? $r['farmaco'] ?? '' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                                                {{ $r->id_presentacion ?? $r['id_presentacion'] ?? '' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                                                {{ $r->id_receta_dosis ?? $r['id_receta_dosis'] ?? '' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap hidden">
                                                                                {{ $r->posologia ?? $r['posologia'] ?? '-' }}
                                                                            </td>
                                                                            <td class="text-center align-middle text-wrap">
                                                                                {{ $r->via_administracion ?? $r['via_administracion'] ?? '-' }}
                                                                            </td>
                                                                            <td class="text-center align-middle" id="tiempo_restante_{{ $r->id ?? $r['id'] ?? '' }}">
                                                                                @if(($r->estado ?? $r['estado'] ?? 0) == 1 && ($r->tiempo_transcurrido ?? $r['tiempo_transcurrido'] ?? false))
                                                                                    <span>Hace: {{ $r->tiempo_transcurrido ?? $r['tiempo_transcurrido'] }}</span>
                                                                                @else
                                                                                    <span>-</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento_enf({{ $r->id ?? $r['id'] ?? '' }})" id="btn_administrar_{{ $r->id ?? $r['id'] ?? '' }}" @if($enfermera == false) disabled @endif @if(($r->estado ?? $r['estado'] ?? 0) == 1) disabled @endif>
                                                                                    <i class="fas fa-check"></i>
                                                                                </button>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="registro_alternativo_paciente_enf_adm{{ $r->id ?? $r['id'] ?? '' }}" onchange="cambiarTextoLabelTratamiento({{ $r->id ?? $r['id'] ?? '' }})" {{ ($r->estado ?? $r['estado'] ?? 0) == 1 ? 'checked' : '' }} disabled>
                                                                                    <label for="registro_alternativo_paciente_enf_adm{{ $r->id ?? $r['id'] ?? '' }}" class="cr"></label>
                                                                                </div>
                                                                                <label id="label_tratamiento_enf_adm_{{ $r->id ?? $r['id'] ?? '' }}">{{ ($r->estado ?? $r['estado'] ?? 0) == 1 ? 'ADMINISTRADO' : 'PENDIENTE' }}</label>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="tratamiento_finalizado_enf_adm{{ $r->id ?? $r['id'] ?? '' }}" onchange="finalizar_tratamiento_enf({{ $r->id ?? $r['id'] ?? '' }})" {{ ($r->estado ?? $r['estado'] ?? 0) == 1 ? 'checked' : '' }}>
                                                                                    <label for="tratamiento_finalizado_enf_adm{{ $r->id ?? $r['id'] ?? '' }}" class="cr"></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TRATAMIENTOS PENDIENTES-->


                                            <!-- TRATAMIENTOS EXTERNOS -->
                                            <div class="tab-pane fade " id="tto_pendiente_externo" role="tabpanel" aria-labelledby="tto_pendiente_externo_tab">
                                                  @if($enfermera)
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 mb-3 m-t-5">
                                                        <h6 class="tit-gen"> Tratamientos Externos con Receta fuera del sistema <br>(<i>No olvide subir la imagen de receta.</i>)  </h6>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                                                        <div class="form-group">
                                                            <p class="font-weight-bold">
                                                                <script>
                                                                    var f = new Date();
                                                                    document.write(  + f.getDate() + "-" + (f.getMonth()+1) + "-" + f.getFullYear() + " -" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                                                </script>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-9 col-xl-8 col-xxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="resp_adm_tto">Responsable tto</label>
                                                            <select name="resp_adm_tto"  id="resp_adm_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_adm_tto','div_resp_adm_tto','obs_resp_adm_tto',4);">
                                                                <option  value="0">Seleccione</option>
                                                                @if(isset($personal_enfermeria))
                                                                    @foreach($personal_enfermeria as $pe)
                                                                        <option  value="{{ $pe->id }}">{{ $pe->nombre }} {{ $pe->apellido_uno }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_resp_adm_tto" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_av_subj_sc_od">Nombre / Rut</label>
                                                            <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_resp_adm_tto" id="obs_resp_adm_tto" placeholder="Escriba"></textarea>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-sm-12 col-md-3 col-lg-12 col-xl-12 col-xxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="av_subj_sc_od">Indicado Por:</label>
                                                            <select name="med_resp_ind_tto"  id="med_resp_ind_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('med_resp_ind_tto','div_med_resp_ind_tto','obs_med_resp_ind_tto',4);">
                                                                <option  value="0">Seleccione</option>
                                                                <option  value="1">Dr. Juana Perez </option>
                                                                <option  value="2">Dra. Maria la del Barrio</option>
                                                                <option  value="3">alumna en práctica</option>
                                                                <option  value="4">Otro/a</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_med_resp_ind_tto" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_via_ttoy">Nombre /Rut / indica tto</label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_med_resp_ind_tto" id="obs_med_resp_ind_tto" placeholder="Escriba"></textarea>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="nom_medic_adm">Medicamento</label>
                                                            <input type="text" class="form-control form-control-sm" name="nom_medic_adm" id="nom_medic_adm" placeholder="Escriba nombre medicamento" onblur="getDosis_sdi_enf()">
                                                            <input type="hidden" name="id_medicamento_adm_enf" id="id_medicamento_adm_enf">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="av_ret_cc_od">Dosis</label>
                                                            <select class="form-control form-control-sm" name="dosis_receta_enf" id="dosis_receta_enf" onchange="getFrecuencia_sdi_enf(); getCantComp_sdi_enf();"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_ficha_enf" name="frecuencia_medicamento_ficha_enf">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="via_ttoy">Vía de Administración</label>
                                                            <select name="via_ttoy" id="via_ttoy"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('via_ttoy','div_via_tto_otroy','via_tto_otroy',8);">
                                                                <option  value="0">Seleccione</option>
                                                                <option  value="1"> Oral </option>
                                                                <option  value="2">IM</option>
                                                                <option  value="3">IM</option>
                                                                <option  value="4">EV Directa</option>
                                                                <option  value="5">EV Suero</option>
                                                                <option  value="6">Rectal</option>
                                                                <option  value="7">Subcutánea</option>
                                                                <option  value="8">Otro/a</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_via_tto_otroy" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_av_subj_sc_od">Otra vía tto</label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="via_tto_otroy" id="via_tto_otroy" placeholder="Escriba"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-8 col-xxl-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="av_ret_cc_od">Tolerancia / Efectos adversos</label>
                                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="tolerancia_efectos_adversos" id="tolerancia_efectos_adversos"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Dropzone de imagen de receta -->
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-12 col-xxl-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="av_ret_cc_od">Imagen de Receta</label>

                                                            <input type="hidden" name="input_lista_archivo_receta_enf" id="input_lista_archivo_receta_enf" value="">
                                                            <div class="dropzone" id="dropzone_receta_enf" action="{{ route('profesional.archivo.carga') }}"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="btn btn-success btn-sm float-right" onclick="indicar_medicamento_sdi_enf()">Guardar</button>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="form-row">
                                                     <div class="col-sm-12 mt-3">
                                                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                        <!--Tabla-->
                                                        <div class="table-responsive">
                                                            <table id="tabla_med_adm_hosp" class="table table-bordered table-sm tabla_med_adm_hosp">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle" style="display:none">id</th>
                                                                        <th class="text-center align-middle" style="display:none">resp_adm</th>
                                                                        <th class="text-center align-middle">Repeticiones</th>
                                                                        <th class="text-center align-middle">Medicamentos</th>
                                                                        <th class="text-center align-middle">Posología</th>
                                                                        <th class="text-center align-middle">Tiempo Restante</th>
                                                                        <th class="text-center align-middle">Imágenes</th>
                                                                        {{-- <th class="text-center align-middle">Tolerancia</th> --}}
                                                                        <th class="text-center align-middle">Acciones</th>
                                                                        <th class="text-center align-middle">Estado</th>
                                                                        <th class="text-center align-middle">Finalizado</th>
                                                                        <th class="text-center align-middle">Acciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($medicamentos_externos as $r)
                                                                        <tr>
                                                                            <td class="text-center align-middle" style="display:none">{{ $r->id ?? $r['id'] ?? '' }}</td>
                                                                            <td class="text-center align-middle" style="display:none">{{ $r->resp_adm ?? $r['resp_adm'] ?? '' }}</td>
                                                                            <td class="text-center align-middle" id="repeticiones_contador_externo-{{ $r->id }}">{{ $r->contador_dosis ?? $r['contador_dosis'] ?? '-' }}</td>
                                                                            <td class="text-center align-middle">
                                                                                {{ $r->nombre_medicamento ?? $r['nombre_medicamento'] ?? '-' }}
                                                                                <br><small>{{ $r->farmaco ?? $r['farmaco'] ?? '' }}</small>
                                                                                <br><small>{{ $r->presentacion ?? $r['presentacion'] ?? '' }}</small>
                                                                            </td>
                                                                            <td class="text-center align-middle">{{ $r->nombre_frecuencia ?? $r['nombre_frecuencia'] ?? '-' }}</td>
                                                                            <td class="text-center align-middle">
                                                                                @if(($r->tiempo_transcurrido ?? $r['tiempo_transcurrido'] ?? false))
                                                                                    <span>Hace: {{ $r->tiempo_transcurrido ?? $r['tiempo_transcurrido'] }}</span>
                                                                                @else
                                                                                    <span>-</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                @if(!empty($r->otros ?? $r['otros'] ?? null))
                                                                                    @php
                                                                                        $imagenes = json_decode($r->otros ?? $r['otros'], true);
                                                                                        $imagenes = is_array($imagenes) ? $imagenes : [];
                                                                                    @endphp
                                                                                    @if(count($imagenes) > 0)
                                                                                        <button class="btn btn-info btn-sm btn-icon" onclick="ver_imagenes_tratamiento_interno({{ $r->id ?? $r['id'] ?? '' }}, {{ json_encode($imagenes) }})" title="Ver imágenes de receta">
                                                                                            <i class="feather icon-image"></i> {{ count($imagenes) }}
                                                                                        </button>
                                                                                    @else
                                                                                        <span class="text-muted">-</span>
                                                                                    @endif
                                                                                @else
                                                                                    <span class="text-muted">-</span>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento({{ $r->id ?? $r['id'] ?? '' }})" @if(!$enfermera) disabled @endif><i class="fas fa-check"></i> </button>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="registro_alternativo_paciente_enf{{ $r->id ?? $r['id'] ?? '' }}" onchange="cambiarTextoLabelTratamiento({{ $r->id ?? $r['id'] ?? '' }})" {{ ($r->estado ?? $r['estado'] ?? 0) == 1 ? 'checked' : '' }} disabled>
                                                                                    <label for="registro_alternativo_paciente_enf{{ $r->id ?? $r['id'] ?? '' }}" class="cr"></label>
                                                                                </div>
                                                                                <label id="label_tratamiento_enf_{{ $r->id ?? $r['id'] ?? '' }}">{{ ($r->estado ?? $r['estado'] ?? 0) == 1 ? 'ADMINISTRADO' : 'PENDIENTE' }}</label>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="tratamiento_finalizado{{ $r->id ?? $r['id'] ?? '' }}" onchange="finalizar_tratamiento_enf_ext({{ $r->id ?? $r['id'] ?? '' }})" {{ ($r->estado_finalizado ?? $r['estado_finalizado'] ?? 0) == 1 ? 'checked' : '' }} @if(!$enfermera) disabled @endif>
                                                                                    <label for="tratamiento_finalizado{{ $r->id ?? $r['id'] ?? '' }}" class="cr"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="agregarObservacionesTratamiento({{ $r->id ?? $r['id'] ?? '' }}, {{ json_encode($r->nombre_medicamento ?? $r['nombre_medicamento'] ?? '-') }}, {{ json_encode($r->observaciones ?? $r['observaciones'] ?? '') }})" @if(!$enfermera) disabled @endif title="Agregar observaciones">
                                                                                    <i class="feather icon-edit"></i>
                                                                                </button>
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_medicamento_sdi_enf({{ $r->id ?? $r['id'] ?? '' }})" @if(!$enfermera) disabled @endif title="Eliminar tratamiento">
                                                                                    <i class="feather icon-trash-2"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--Cierre Tabla-->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EJECUTAR PROCEDIMIENTO-->
                            <div class="tab-pane fade show " id="enf_proc" role="tabpanel" aria-labelledby="enf_proc_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten mb-2">Curaciones indicadas por médico</h6>
                                        <div class="table-responsive">
                                            <table id="tabla_curaciones_servicio" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Fecha y Hora</th>
                                                        <th class="align-middle">Procedimiento</th>
                                                        <th class="align-middle">Vigilar</th>
                                                        <th class="align-middle">Acción</th>
                                                        <th class="align-middle">materiales</th>
                                                        <th class="align-middle">acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($curaciones))
                                                        @foreach($curaciones as $c)
                                                                <tr>
                                                                    <td>{{ $c->fecha }} {{ $c->hora }} <br> {{ $c->responsable }}</td>
                                                                    <td class="align-middle">{{ $c->datos_curacion->nombre_procedimiento }}</td>
                                                                    <td class="align-middle"><input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio{{ $c->id }}" /></td>
                                                                    <td class="align-middle">
                                                                        <div class="switch switch-success d-inline">
                                                                            <input type="checkbox" id="curaciones_servicio_listo{{ $c->id }}" onchange="cambiarTextoLabelCuracion({{ $c->id }})" @if(!$enfermera) disabled @endif @if($c->estado == 1) checked @endif>
                                                                            <label for="curaciones_servicio_listo{{ $c->id }}" class="cr"></label>
                                                                        </div><br>
                                                                        <label for="" id="label_curacion_{{ $c->id }}">@if($c->estado == 1) Listo @else Pendiente @endif</label>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos_{{ $c->id }}" @if(!$enfermera) disabled @endif onclick="cargarInsumosCuracion({{ $c->id }})">
                                                                            Insumos
                                                                        </button>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        <button type="button" class="btn btn-warning-light-c btn-icon" onclick="agregarObservacionesCuracion({{ $c->id }},'{{ $c->datos_curacion->nombre_procedimiento }}','{{ $c->otros }}')" @if(!$enfermera) disabled @endif><i class="feather icon-edit"> </i></button>
                                                                        <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion({{ $c->id }})" @if(!$enfermera) disabled @endif><i class="feather icon-x"></i></button>
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 w-100">
                                        <div class="form-row mb-3 m-t-15">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                    role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link-aten text-reset" id="cur_simples-tab"
                                                        data-toggle="tab" href="#cur_simples" role="tab" aria-controls="cur_simples"
                                                        aria-selected="false">Cur. simples y retiro de puntos</a>
                                                    <a class="nav-link-aten text-reset active" id="cur_plana-tab"
                                                        data-toggle="tab" href="#cur_plana" role="tab"
                                                        aria-controls="cur_plana" aria-selected="true">Cur. Planas</a>
                                                    <a class="nav-link-aten text-reset" id="cur_lpp-tab"
                                                        data-toggle="tab" href="#cur_lpp" role="tab"
                                                        aria-controls="cur_lpp" aria-selected="false" onclick="$('#lpp_patasoc').select2();">Curación.LPP</a>
                                                    <a class="nav-link-aten text-reset" id="cur_pd-tab"
                                                        data-toggle="tab" href="#cur_pd" role="tab"
                                                        aria-controls="cur_pd" aria-selected="false" onclick="$('#pat_prop').select2(); $('#sint_act').select2(); $('#pie_ant').select2(); $('#tpo_aposc').select2();">Píe Diabético</a>
                                                    <a class="nav-link-aten text-reset" id="cur_quem-tab"
                                                        data-toggle="tab" href="#cur_quem" role="tab"
                                                        aria-controls="cur_quem" aria-selected="false" onclick="$('#pat_propq').select2(); $('#med_quem').select2(); $('#ants_qm').select2(); $('#tpo_aposqm').select2();">Quemados</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-md-8 col-lg-8 col-xl-8 col-xxl-10">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <!--CURACION PLANA-->
                                                    <div class="tab-pane fade show active" id="cur_plana"
                                                        role="tabpanel" aria-labelledby="cur_plana-tab">
                                                        <div class="form-row mx-2">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="t-aten d-inline">Curaciones Planas</h6>
                                                            </div>
                                                        </div>

                                                        <!-- Tabla de curaciones planas existentes -->
                                                        @if(isset($curacion_plana) && count($curacion_plana) > 0)
                                                        <div class="form-row mx-2 mb-3">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-primary mb-2">Curaciones Registradas</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-sm table-bordered">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th width="10%">Fecha</th>
                                                                                <th width="10%">Responsable</th>
                                                                                <th width="15%">Valoración</th>
                                                                                <th width="20%">Datos Principales</th>
                                                                                <th width="25%">Observaciones</th>
                                                                                <th width="20%">Acciones</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($curacion_plana as $cp)
                                                                            <tr>
                                                                                <td>
                                                                                    <small>{{ $cp->fecha ?? 'N/A' }}</small><br>
                                                                                    <small class="text-muted">{{ $cp->hora ?? 'N/A' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    <small>{{ $cp->responsable ?? 'N/A' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    @if(isset($cp->datos_valoracion_plana) && !empty($cp->datos_valoracion_plana))
                                                                                        <small><strong>P.Total:</strong> {{ $cp->datos_valoracion_plana->ptos_tot_ev ?? 'N/A' }}</small><br>
                                                                                        <small><strong>Valoración:</strong> {{ $cp->datos_valoracion_plana->tpo_les_curgen ?? 'N/A' }}</small>
                                                                                    @else
                                                                                        <small class="text-muted">Sin datos</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @if(isset($cp->datos_valoracion_plana) && !empty($cp->datos_valoracion_plana))
                                                                                        @php
                                                                                            $aspectos = ['0'=>'No selec.','1'=>'Eritematoso','2'=>'Enrojecido','3'=>'Amarillo pálido','4'=>'Necrótico'];
                                                                                            $profundidad = ['0'=>'No selec.','1'=>'0','2'=>'0-1 cm','3'=>'1-2 cm','4'=>'2-3 cm','5'=>'>3 cm'];
                                                                                        @endphp
                                                                                        <small><strong>Aspecto:</strong> {{ $aspectos[$cp->datos_valoracion_plana->cp_asp ?? '0'] ?? 'N/A' }}</small><br>
                                                                                        <small><strong>Profundidad:</strong> {{ $profundidad[$cp->datos_valoracion_plana->cp_pro ?? '0'] ?? 'N/A' }}</small>
                                                                                    @else
                                                                                        <small class="text-muted">Sin datos</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <small>{{ $cp->otros ?? 'Sin observaciones' }}</small>
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                                                        onclick="verDetallesCuracionPlana({{ $cp->id }})"
                                                                                        title="Ver detalles">
                                                                                        <i class="fas fa-eye"></i>
                                                                                    </button>
                                                                                    @if($enfermera)
                                                                                    <button type="button" class="btn btn-sm btn-outline-warning"
                                                                                        onclick="editarCuracionPlana({{ $cp->id }})"
                                                                                        title="Editar">
                                                                                        <i class="fas fa-edit"></i>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                                                        onclick="eliminarCuracionPlana({{ $cp->id }})"
                                                                                        title="Eliminar">
                                                                                        <i class="fas fa-trash"></i>
                                                                                    </button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Gráfico de evolución de puntajes -->
                                                        <div class="form-row mx-2 mb-3">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-info mb-3">📊 Evolución de Puntajes de Curación</h6>
                                                                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                    <canvas id="chartPuntajesCuracion" width="400" height="200"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Preparar datos para el gráfico -->
                                                        @php
                                                            $fechasGrafico = [];
                                                            $puntajesGrafico = [];
                                                            $valoresGrafico = [];

                                                            foreach($curacion_plana as $cp) {
                                                                if(isset($cp->datos_valoracion_plana) && !empty($cp->datos_valoracion_plana)) {
                                                                    $fechasGrafico[] = $cp->fecha ?? 'N/A';
                                                                    $puntajesGrafico[] = (int)($cp->datos_valoracion_plana->ptos_tot_ev ?? 0);
                                                                    $valoresGrafico[] = $cp->datos_valoracion_plana->tpo_les_curgen ?? 'Sin valor';
                                                                }
                                                            }
                                                        @endphp

                                                        <script>
                                                            // Datos para el gráfico desde PHP
                                                            const fechasCuracion = @json($fechasGrafico);
                                                            const puntajesCuracion = @json($puntajesGrafico);
                                                            const valoresCuracion = @json($valoresGrafico);

                                                            // Crear el gráfico cuando se carga la página
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const ctx = document.getElementById('chartPuntajesCuracion').getContext('2d');

                                                                const chartPuntajes = new Chart(ctx, {
                                                                    type: 'line',
                                                                    data: {
                                                                        labels: fechasCuracion,
                                                                        datasets: [{
                                                                            label: 'Puntaje Total Evaluación',
                                                                            data: puntajesCuracion,
                                                                            borderColor: '#007bff',
                                                                            backgroundColor: 'rgba(0, 123, 255, 0.1)',
                                                                            borderWidth: 3,
                                                                            fill: true,
                                                                            tension: 0.4,
                                                                            pointBackgroundColor: '#007bff',
                                                                            pointBorderColor: '#0056b3',
                                                                            pointRadius: 6,
                                                                            pointHoverRadius: 8
                                                                        }]
                                                                    },
                                                                    options: {
                                                                        responsive: true,
                                                                        maintainAspectRatio: false,
                                                                        plugins: {
                                                                            title: {
                                                                                display: true,
                                                                                text: 'Evolución del Estado de Curación - Puntajes por Fecha',
                                                                                font: {
                                                                                    size: 16,
                                                                                    weight: 'bold'
                                                                                }
                                                                            },
                                                                            legend: {
                                                                                display: true,
                                                                                position: 'top'
                                                                            },
                                                                            tooltip: {
                                                                                callbacks: {
                                                                                    title: function(context) {
                                                                                        return 'Fecha: ' + context[0].label;
                                                                                    },
                                                                                    label: function(context) {
                                                                                        const index = context.dataIndex;
                                                                                        return [
                                                                                            'Puntaje: ' + context.parsed.y + ' puntos',
                                                                                            'Valoración: ' + valoresCuracion[index]
                                                                                        ];
                                                                                    }
                                                                                }
                                                                            }
                                                                        },
                                                                        scales: {
                                                                            y: {
                                                                                beginAtZero: true,
                                                                                title: {
                                                                                    display: true,
                                                                                    text: 'Puntaje'
                                                                                },
                                                                                grid: {
                                                                                    color: 'rgba(0, 0, 0, 0.1)'
                                                                                }
                                                                            },
                                                                            x: {
                                                                                title: {
                                                                                    display: true,
                                                                                    text: 'Fecha de Curación'
                                                                                },
                                                                                ticks: {
                                                                                    maxRotation: 45,
                                                                                    minRotation: 45
                                                                                }
                                                                            }
                                                                        },
                                                                        interaction: {
                                                                            intersect: false,
                                                                            mode: 'index'
                                                                        }
                                                                    }
                                                                });

                                                                // Ajustar altura del canvas
                                                                document.getElementById('chartPuntajesCuracion').style.height = '300px';
                                                            });
                                                        </script>

                                                        @endif

                                                        <div class="form-row mx-2">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-success mb-2"> ➕ Nueva Curación Plana</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-10"
                                                                    id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active"
                                                                            id="val_hda-tab" data-toggle="tab"
                                                                            href="#val_hda" role="tab"
                                                                            aria-controls="val_hda"
                                                                            aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset"
                                                                            id="cur_hda-tab" data-toggle="tab"
                                                                            href="#cur_hda" role="tab"
                                                                            aria-controls="cur_hda"
                                                                            aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                <div class="tab-content"
                                                                    id="Curación de lesiones planas">
                                                                    <div class="tab-pane fade show active"
                                                                        id="val_hda" role="tabpanel"
                                                                        aria-labelledby="val_hda-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="alert alert-warning"
                                                                                    role="alert">
                                                                                    Si desea ocupar el item de
                                                                                    observaciones debe necesariamente
                                                                                    elegir otra opción para sumar el
                                                                                    puntaje.
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm t-red" for="cp_asp">Aspecto</label>
                                                                                    <select name="cp_asp"
                                                                                            id="cp_asp"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_asp','div_cp_asp','obs_cp_asp',6);actualizarTotal()">
                                                                                        <option value="0">Seleccione</option>
                                                                                        <option value="1">Eritematoso </option>
                                                                                        <option value="2">Enrojecido</option>
                                                                                        <option value="3">Amarillo pálido</option>
                                                                                        <option value="4">Necrótico </option>
                                                                                        <option value="6">Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_asp"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_asp">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_asp" id="obs_cp_asp"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm btn-block"onclick="curac_hda();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_me">Mayor
                                                                                        Extensión</label>
                                                                                        <select name="cp_me"
                                                                                        id="cp_me"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_me','div_cp_me','obs_cp_me',5);actualizarTotal()">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">0-1 cm</option>
                                                                                            <option value="2">1-3 cm</option>
                                                                                            <option value="3">3-6 cm</option>
                                                                                            <option value="4">>6 cm</option>
                                                                                            <option value="5">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_me"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_me">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_me" id="obs_cp_me"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_pro">Profundidad</label>
                                                                                        <select name="cp_pro"
                                                                                        id="cp_pro"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_pro','div_cp_pro','obs_cp_pro1',6);actualizarTotal()">
                                                                                        <option value="0">Seleccione</option>
                                                                                        <option value="1">0</option>
                                                                                        <option value="2">0-1 cm</option>
                                                                                        <option value="3">1-2 cm</option>
                                                                                        <option value="4">2-3 cm</option>
                                                                                        <option value="5"> >3 cm</option>
                                                                                        <option value="6">Otros</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_pro"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_pro">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_pro" id="obs_cp_pro"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ecant">Exudado-Cantidad</label>
                                                                                        <select name="cp_ecant"
                                                                                                id="cp_ecant"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ecant','div_cp_ecant','obs_cp_ecant',6);actualizarTotal()">
                                                                                            <option value="0">Seleccione</option>
                                                                                            <option value="1">Ausente</option>
                                                                                            <option value="2">Escaso</option>
                                                                                            <option value="3">Moderado</option>
                                                                                            <option value="4">Abundante</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_ecant"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ecant">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ecant" id="obs_cp_ecant"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ecal">Exudado-Calidad</label>
                                                                                        <select name="cp_ecal"
                                                                                                id="cp_ecal"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ecal','div_cp_ecal','obs_cp_ecal',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                                                                                                                        <option value="1">Sin exudado</option>
                                                                                            <option value="2">Seroso</option>
                                                                                            <option value="3">Turbio</option>
                                                                                            <option value="4">Purulento</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_ecal"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ecal">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ecal" id="obs_cp_ecal"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_tn">Tejido
                                                                                        esfacelado o necrótico</label>
                                                                                        <select name="cp_tn"
                                                                                                id="cp_tn"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_tn','div_cp_tn','obs_cp_tn',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                                                                                                                        <option value="1">Ausente</option>
                                                                                            <option value="2">25%</option>
                                                                                            <option value="3">25 - 50 %</option>
                                                                                            <option value="4">>50 - 75 %</option>
                                                                                            <option value="5">>75 %</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tn"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_tn">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_tn" id="obs_cp_tn"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_tg">Tejido
                                                                                        granulatorio</label>
                                                                                        <select name="cp_tg"
                                                                                                id="cp_tg"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_tg','div_cp_tg','obs_cp_tg',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                                                                                                                        <option value="1">100- 75 %</option>
                                                                                            <option value="2"> < 75 - 50 % </option>
                                                                                            <option value="3"> < 50 - 25 %</option>
                                                                                            <option value="4"> < 25 % </option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_tg"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_tg">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_tg" id="obs_cp_tg"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_ed">Edema</label>
                                                                                        <select name="cp_ed"
                                                                                                id="cp_ed"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_ed','div_cp_ed','obs_cp_ed',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                                                                                                                        <option value="1">Ausente</option>
                                                                                            <option value="2">+</option>
                                                                                            <option value="3">++</option>
                                                                                            <option value="4">+++</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group" id="div_cp_ed"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_ed">Obs.<i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_ed" id="obs_cp_ed"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_dol">Dolor</label>
                                                                                        <select name="cp_dol"
                                                                                                id="cp_dol"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_dol','div_cp_dol','obs_cp_dol',6);actualizarTotal()">
                                                                                            <option value="0">Seleccione</option>
                                                                                                                                                                                            <option value="1">0 - 1</option>
                                                                                            <option value="2">2 - 3</option>
                                                                                            <option value="3">4 - 6</option>
                                                                                            <option value="4">7 - 10</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_dol"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_dol">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_dol" id="obs_cp_dol"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_pielc">Piel
                                                                                        circundante</label>
                                                                                        <select name="cp_pielc"
                                                                                                id="cp_pielc"
                                                                                                class="form-control form-control-sm"
                                                                                                onchange="evaluar_para_carga_detalle('cp_pielc','div_cp_pielc','obs_cp_pielc',6);actualizarTotal()">
                                                                                            <option selected value="0">Seleccione</option>
                                                                                                                                                                                        <option value="1">Sana</option>
                                                                                            <option value="2">Descamada</option>
                                                                                            <option value="3">Erimatosa</option>
                                                                                            <option value="4">Macerada</option>
                                                                                            <option value="6">Observaciones</option>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_pielc"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_pielc">Obs.
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_pielc" id="obs_cp_pielc"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="bh_dren_1">P.Total</label>
                                                                                    <input type="number"
                                                                                        class="form-control form-control-sm"
                                                                                        name="ptos_tot_ev"
                                                                                        id="ptos_tot_ev">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="tpo_les_curgen">Valoración</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="tpo_les_curgen"
                                                                                        id="tpo_les_curgen">
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm  btn-block"onclick="cur_guia();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cp_gral">Obs.
                                                                                        Valoración Herida</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;"
                                                                                        name="obs_cp_gral" id="obs_cp_gral"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cur_plana">Obs.
                                                                                        Curación Plana</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cur_plana" id="obs_cur_plana"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{-- @if(!$curacion_plana) --}}
                                                                            <button type="button" class="btn btn-outline-success btn-sm float-right my-2" onclick="guardar_curacion_plana_servicio()" @if(!$enfermera) disabled @endif><i class="fas fa-save"></i>Guardar</button>
                                                                        {{-- @else
                                                                            <button type="button" class="btn btn-outline-success btn-sm float-right my-2" onclick="actualizar_curacion_plana_servicio({{ $curacion_plana->id }})" @if(!$enfermera) disabled @endif><i class="fas fa-save"></i>Actualizar</button>
                                                                        @endif --}}
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="cur_hda"
                                                                        role="tabpanel" aria-labelledby="cur_hda-tab">
                                                                        {{-- @include('page.general.secciones_ficha.curacion_lpp') --}}
                                                                        @include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.curacion_plana')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--CURACION LPP-->
                                                    <div class="tab-pane fade " id="cur_lpp" role="tabpanel" aria-labelledby="cur_lpp-tab">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-row mx-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten d-inline">Curaciones LPP</h6>
                                                                </div>
                                                            </div>

                                                            <!-- Tabla de curaciones LPP existentes -->
                                                            @if(isset($curaciones_lpp) && count($curaciones_lpp) > 0)
                                                            <div class="form-row mx-2 mb-3">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-primary mb-2">Curaciones LPP Registradas</h6>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-sm table-bordered">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th>Fecha</th>
                                                                                    <th>Localización</th>
                                                                                    <th>Grado</th>
                                                                                    <th>Diámetro</th>
                                                                                    <th>Profundidad</th>
                                                                                    <th>Infección</th>
                                                                                    <th>Observaciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($curaciones_lpp as $clpp)
                                                                                <tr>
                                                                                    <td><span class="badge badge-info">{{ $clpp->fecha ?? 'N/A' }}</span></td>
                                                                                    <td>
                                                                                        <strong>{{ $clpp->datos_valoracion_lpp->upp_local_eval ?? 'N/A' }}</strong>
                                                                                        @if(isset($clpp->datos_valoracion_lpp->obs_upp_local_eval) && !empty($clpp->datos_valoracion_lpp->obs_upp_local_eval))
                                                                                            <br><small class="text-muted">{{ $clpp->datos_valoracion_lpp->obs_upp_local_eval }}</small>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-{{
                                                                                            ($clpp->datos_valoracion_lpp->upp_gr_eval ?? '') == 'G-0' ? 'success' :
                                                                                            (($clpp->datos_valoracion_lpp->upp_gr_eval ?? '') == 'G-1' || ($clpp->datos_valoracion_lpp->upp_gr_eval ?? '') == 'G-2' ? 'warning' : 'danger')
                                                                                        }}">{{ $clpp->datos_valoracion_lpp->upp_gr_eval ?? 'N/A' }}</span>
                                                                                    </td>
                                                                                    <td>{{ $clpp->datos_valoracion_lpp->upp_diam_eval ?? 'N/A' }}</td>
                                                                                    <td>
                                                                                        {{ $clpp->datos_valoracion_lpp->upp_prof_eval ?? 'N/A' }}
                                                                                        @if(isset($clpp->datos_valoracion_lpp->obs_upp_prof_eval) && !empty($clpp->datos_valoracion_lpp->obs_upp_prof_eval))
                                                                                            <br><small class="text-muted">{{ $clpp->datos_valoracion_lpp->obs_upp_prof_eval }}</small>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge badge-{{ ($clpp->datos_valoracion_lpp->upp_Infec_eval ?? '') == 'No' ? 'success' : 'danger' }}">
                                                                                            {{ $clpp->datos_valoracion_lpp->upp_Infec_eval ?? 'N/A' }}
                                                                                        </span>
                                                                                        @if(isset($clpp->datos_valoracion_lpp->obs_upp_Infec_eval) && !empty($clpp->datos_valoracion_lpp->obs_upp_Infec_eval))
                                                                                            <br><small class="text-muted">{{ $clpp->datos_valoracion_lpp->obs_upp_Infec_eval }}</small>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if(isset($clpp->datos_valoracion_lpp->obs_val_eval_upp) && !empty($clpp->datos_valoracion_lpp->obs_val_eval_upp))
                                                                                            {{ $clpp->datos_valoracion_lpp->obs_val_eval_upp }}
                                                                                        @else
                                                                                            <span class="text-muted">Sin observaciones</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Gráfico de evolución de grados LPP -->
                                                            <div class="form-row mx-2 mb-3">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-info mb-3">📊 Evolución de Grados LPP</h6>
                                                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                        <canvas id="chartGradosLPP" width="400" height="200"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Preparar datos para el gráfico LPP -->
                                                            @php
                                                                $fechasGraficoLPP = [];
                                                                $gradosGraficoLPP = [];
                                                                $localizacionGraficoLPP = [];

                                                                foreach($curaciones_lpp as $clpp) {
                                                                    if(isset($clpp->datos_valoracion_lpp) && !empty($clpp->datos_valoracion_lpp)) {
                                                                        $fechasGraficoLPP[] = $clpp->fecha ?? 'N/A';

                                                                        // Convertir grado a número para el gráfico
                                                                        $grado = $clpp->datos_valoracion_lpp->upp_gr_eval ?? 'G-0';
                                                                        $numeroGrado = (int) str_replace('G-', '', $grado);
                                                                        $gradosGraficoLPP[] = $numeroGrado;

                                                                        $localizacionGraficoLPP[] = $clpp->datos_valoracion_lpp->upp_local_eval ?? '';
                                                                    }
                                                                }
                                                            @endphp

                                                            <script>
                                                                // Datos para el gráfico LPP desde PHP
                                                                const fechasLPP = @json($fechasGraficoLPP);
                                                                const gradosLPP = @json($gradosGraficoLPP);
                                                                const localizacionesLPP = @json($localizacionGraficoLPP);

                                                                // Crear el gráfico LPP cuando se carga la página
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    const ctxLPP = document.getElementById('chartGradosLPP').getContext('2d');

                                                                    const chartLPP = new Chart(ctxLPP, {
                                                                        type: 'line',
                                                                        data: {
                                                                            labels: fechasLPP,
                                                                            datasets: [{
                                                                                label: 'Grado LPP',
                                                                                data: gradosLPP,
                                                                                borderColor: '#dc3545',
                                                                                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                                                                borderWidth: 3,
                                                                                pointBackgroundColor: '#dc3545',
                                                                                pointBorderColor: '#fff',
                                                                                pointBorderWidth: 2,
                                                                                pointRadius: 6,
                                                                                pointHoverRadius: 8,
                                                                                tension: 0.1
                                                                            }]
                                                                        },
                                                                        options: {
                                                                            responsive: true,
                                                                            maintainAspectRatio: false,
                                                                            plugins: {
                                                                                title: {
                                                                                    display: true,
                                                                                    text: 'Evolución del Grado de LPP',
                                                                                    font: { size: 16, weight: 'bold' }
                                                                                },
                                                                                legend: {
                                                                                    display: true,
                                                                                    position: 'top'
                                                                                },
                                                                                tooltip: {
                                                                                    callbacks: {
                                                                                        title: function(tooltipItems) {
                                                                                            return 'Fecha: ' + tooltipItems[0].label;
                                                                                        },
                                                                                        label: function(context) {
                                                                                            const index = context.dataIndex;
                                                                                            return [
                                                                                                'Grado: G-' + context.parsed.y,
                                                                                                'Localización: ' + (localizacionesLPP[index] || 'N/A')
                                                                                            ];
                                                                                        }
                                                                                    }
                                                                                }
                                                                            },
                                                                            scales: {
                                                                                y: {
                                                                                    beginAtZero: true,
                                                                                    max: 5,
                                                                                    ticks: {
                                                                                        stepSize: 1,
                                                                                        callback: function(value) {
                                                                                            return 'G-' + value;
                                                                                        }
                                                                                    },
                                                                                    title: {
                                                                                        display: true,
                                                                                        text: 'Grado LPP'
                                                                                    }
                                                                                },
                                                                                x: {
                                                                                    title: {
                                                                                        display: true,
                                                                                        text: 'Fecha'
                                                                                    }
                                                                                }
                                                                            },
                                                                            interaction: {
                                                                                intersect: false,
                                                                                mode: 'index'
                                                                            }
                                                                        }
                                                                    });

                                                                    // Ajustar altura del canvas
                                                                    document.getElementById('chartGradosLPP').style.height = '300px';
                                                                });
                                                            </script>

                                                            @endif

                                                            <div class="form-row mx-2">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-success mb-2"> ➕ Nueva Curación LPP</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="enf_urgencia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="val_lpp-tab" data-toggle="tab" href="#val_lpp" role="tab" aria-controls="val_lpp" aria-selected="true">Valoración</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="cur1_lpp-tab" data-toggle="tab" href="#cur1_lpp" role="tab" aria-controls="cur1_lpp" aria-selected="true">Curación</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="curidados_lpp-tab" data-toggle="tab" href="#curidados_lpp" role="tab" aria-controls="curidados_lpp" onclick="$('#lpp_medprotliq').select2(); $('#lpp_medproddesc').select2(); $('#lpp_medprevext').select2();" aria-selected="true">Cuidado y Prevensión</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                    <div class="tab-content" id="Curación de lesiones planas">
                                                                        <div class="tab-pane fade show active" id="val_lpp" role="tabpanel" aria-labelledby="val_lpp-tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_local_eval">Localización</label>
                                                                                        <select name="upp_local_eval" id="upp_local_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_local_eval','div_upp_local_eval','obs_upp_local_eval',15);">
                                                                                            <option value="0" selected>Seleccione </option>
                                                                                            <option value="Cabeza">Cabeza </option>
                                                                                            <option value="Frente">Frente</option>
                                                                                            <option value="Oreja">Oreja</option>
                                                                                            <option value="Mejilla">Mejilla</option>
                                                                                            <option value="Omoplato">Omoplato</option>
                                                                                            <option value="Costillas">Costillas</option>
                                                                                            <option value="Pecho">Pecho</option>
                                                                                            <option value="Sacro">Sacro</option>
                                                                                            <option value="Trocanter">Trocanter</option>
                                                                                            <option value="Genitales">Genitales</option>
                                                                                            <option value="Rodilla">Rodilla</option>
                                                                                            <option value="Cóndilos">Cóndilos</option>
                                                                                            <option value="Dedos">Dedos</option>
                                                                                            <option value="Talones">Talones</option>
                                                                                            <option value="Maleolo">Maleolo</option>
                                                                                            <option value="Otras">Otras</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_local_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_local_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_local_eval" id="obs_upp_local_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_gr_eval">Grado</label>
                                                                                        <select name="upp_gr_eval" id="upp_gr_eval" class="form-control form-control-sm">
                                                                                            <option value="G-0" selected>G-0 </option>
                                                                                            <option value="G-1">G-1</option>
                                                                                            <option value="G-2">G-2</option>
                                                                                            <option value="G-3">G-3</option>
                                                                                            <option value="G-4">G-4</option>
                                                                                            <option value="G-5">G-5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="upp_diam_eval">Diámetro</label>
                                                                                        <select name="upp_diam_eval" id="upp_diam_eval" class="form-control form-control-sm">
                                                                                            <option value="Seleccione" selected>Seleccione</option>
                                                                                            <option value="Menor de 1 cm.">Menor de 1 cm.</option>
                                                                                            <option value="Entre 1 y 2 cms.">Entre 1 y 2 cms.</option>
                                                                                            <option value="Entre 2 y 3 cms.">Entre 2 y 3 cms.</option>
                                                                                            <option value="Entre 3 y 4 cms.">Entre 3 y 4 cms.</option>
                                                                                            <option value="Entre 5 y 6 cms.">Entre 5 y 6 cms.</option>
                                                                                            <option value="Entre 7 y 8 cms.">Entre 7 y 8 cms.</option>
                                                                                            <option value="Entre 9 y 10 cms.">Entre 9 y 10 cms.</option>
                                                                                            <option value="Entre 11 y 12 cms.">Entre 11 y 12 cms.</option>
                                                                                            <option value="Entre 12 y 15 cms.">Entre 12 y 15 cms.</option>
                                                                                            <option value="Mayor de 15 cms..">Mayor de 15 cms..</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Profundidad</label>
                                                                                        <select name="upp_prof_eval" id="upp_prof_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_prof_eval','div_upp_prof_eval','obs_upp_prof_eval',11);">
                                                                                            <option value="0" selected>Seleccione</option>
                                                                                            <option value="Epidermis">Epidermis</option>
                                                                                            <option value="Dermis">Dermis</option>
                                                                                            <option value="Hipodermis">Hipodermis</option>
                                                                                            <option value="Otros">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_prof_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_prof_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_prof_eval" id="obs_upp_prof_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="bh_dren_1">Infección</label>
                                                                                        <select name="upp_Infec_eval" id="upp_Infec_eval" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('upp_Infec_eval','div_upp_Infec_eval','obs_upp_Infec_eval',11);">
                                                                                            <option value="0" selected>Seleccione</option>
                                                                                            <option value="No">No</option>
                                                                                            <option value="Solo presencia de pus">Solo presencia de pus</option>
                                                                                            <option value="Presencia de pus + necrosis">Presencia de pus + necrosis</option>
                                                                                            <option value="Absceso">Absceso</option>
                                                                                            <option value="Absceso + área Necrótica">Absceso + área Necrótica</option>
                                                                                            <option value="Otros">Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_upp_Infec_eval" style="display:none;">
                                                                                        <label class="floating-label-activo-sm" for="obs_upp_Infec_eval">Otras <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_upp_Infec_eval" id="obs_upp_Infec_eval"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Patologías de riesgo y Fac. agravantes</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_patasoc" id="lpp_patasoc" multiple="multiple">
                                                                                        <option value="Hipertensión">Hipertensión</option>
                                                                                        <option value="Diabetes">Diabetes</option>
                                                                                        <option value="Hipercolesterolemia">Hipercolesterolemia</option>
                                                                                        <option value="Hiperlipidemia">Hiperlipidemia</option>
                                                                                        <option value="Cancer">Cancer</option>
                                                                                        <option value="Obesidad">Obesidad</option>
                                                                                        <option value="Hipertiroidismo">Hipertiroidismo</option>
                                                                                        <option value="Hipotiroidismo">Hipotiroidismo</option>
                                                                                        <option value="Cirugías reciente">Cirugías reciente</option>
                                                                                        <option value="Infección Sistémica">Infección Sistémica</option>
                                                                                        <option value="Infección local">Infección local</option>
                                                                                        <option value="Fístulas">Fístulas</option>
                                                                                        <option value="Otras(Agregar en Observaciones)">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin"> Observaciones Patología Asociada</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_pa_eval_upp" id="obs_pa_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin">Obs. Valoración LPP</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_val_eval_upp" id="obs_val_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @if($enfermera) <button type="button" class="btn btn-outline-success btn-sm my-2 float-right" onclick="guardar_curacion_lpp()"><i class="fas fa-save"></i>Guardar</button> @endif
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="cur1_lpp" role="tabpanel" aria-labelledby="cur1_lpp-tab">
                                                                            {{-- @include('page.general.secciones_ficha.curacion_heridas') --}}
                                                                             @include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.curacion_lpp')
                                                                        </div>
                                                                        <div class="tab-pane fade show" id="curidados_lpp" role="tabpanel" aria-labelledby="curidados_lpp-tab">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Medidas liquidas</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medprotliq" id="lpp_medprotliq" multiple="multiple">
                                                                                        <option value="1">Soluciones Locales Humectantes</option>
                                                                                        <option value="2">Soluciones Locales Hidratantes</option>
                                                                                        <option value="3">Soluciones Locales Hidratantes</option>
                                                                                        <option value="4">AGEHO : LINOLEICO , PALMITICO </option>
                                                                                        <option value="5">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Dispositivos de descarga</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medproddesc" id="lpp_medproddesc" multiple="multiple">
                                                                                        <option value="1">Dispositivo de descarga local</option>
                                                                                        <option value="2">Dispositivo de descarga General</option>
                                                                                        <option value="3">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="floating-label-activo-sm" for="lpp_patasoc">Seleccionar Medidas preventivas Externas</label>
                                                                                    <select class="form-control form-control-sm" name="lpp_medprevext" id="lpp_medprevext" multiple="multiple">
                                                                                        <option value="1">Colchón especial</option>
                                                                                        <option value="2">Picarón</option>
                                                                                        <option value="3">Movilización frecuente</option>
                                                                                        <option value="3">Masajes</option>
                                                                                        <option value="4">Otras(Agregar en Observaciones)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_orin"> Observaciones Med de prevención y cuidado</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="obs_pa_eval_upp" id="obs_pa_eval_upp"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--PIE DIABÉTICO-->
                                                    <div class="tab-pane fade" id="cur_pd" role="tabpanel"
                                                        aria-labelledby="cur_pd-tab">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                    <div class="form-group">
                                                                        <h6 class="t-aten">Curación Pié Diabético</h6>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Tabla de curaciones pie diabético existentes -->
                                                            @if(isset($curaciones_pie_diabetico) && count($curaciones_pie_diabetico) > 0)
                                                            <div class="form-row mx-2 mb-3">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-primary mb-2">Curaciones Pie Diabético Registradas</h6>


                                                                    <div class="table-responsive">
                                                                        <table class="table table-sm table-bordered">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th>Fecha/Hora</th>
                                                                                    <th>Aspecto</th>
                                                                                    <th>Extensión</th>
                                                                                    <th>Profundidad</th>
                                                                                    <th>Exudado</th>
                                                                                    <th>Tejido</th>
                                                                                    <th>Puntaje Total</th>
                                                                                    <th>Responsable</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($curaciones_pie_diabetico as $cpd)
                                                                                <tr>
                                                                                    <td>
                                                                                        <span class="badge badge-info">{{ $cpd->fecha ?? 'N/A' }}</span>
                                                                                        @if(isset($cpd->hora))
                                                                                            <br><small class="text-muted">{{ $cpd->hora }}</small>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            // Debug: verificar estructura de datos - forzar decode JSON
                                                                                            $valoracionData = null;

                                                                                            // Forzar conversión a JSON string y luego decode
                                                                                            $jsonString = json_encode($cpd->datos_valoracion_pie_diabetico);
                                                                                            $valoracionData = json_decode($jsonString);

                                                                                            $aspectoValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => 'Eritematoso',
                                                                                                '2' => 'Enrojecido',
                                                                                                '3' => 'Amarillo pálido',
                                                                                                '4' => 'Necrótico grisáceo',
                                                                                                '5' => 'Necrótico negruzco',
                                                                                                '6' => 'Observaciones'
                                                                                            ];

                                                                                            $aspecto = $valoracionData->aspecto_pie_diab ?? '0';
                                                                                            $aspectoTexto = $aspectoValores[$aspecto] ?? 'N/A';
                                                                                        @endphp


                                                                                        <span class="badge badge-{{ $aspecto >= '4' ? 'danger' : ($aspecto >= '2' ? 'warning' : ($aspecto == '0' ? 'secondary' : 'success')) }}">
                                                                                            {{ $aspectoTexto }}
                                                                                        </span>

                                                                                        @if(isset($valoracionData->obs_aspecto_pie_diab) && !empty($valoracionData->obs_aspecto_pie_diab))
                                                                                            <br><small class="text-muted">{{ $valoracionData->obs_aspecto_pie_diab }}</small>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            $extensionValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => '0-1 cm',
                                                                                                '2' => '1-3 cm',
                                                                                                '3' => '3-5 cm',
                                                                                                '4' => '5-10 cm',
                                                                                                '5' => '>10 cm'
                                                                                            ];
                                                                                            $extension = $valoracionData->mayor_extension ?? '0';
                                                                                            $extensionTexto = $extensionValores[$extension] ?? 'N/A';
                                                                                        @endphp

                                                                                        <span class="badge badge-{{ $extension == '0' ? 'secondary' : ($extension >= '4' ? 'danger' : 'warning') }}">
                                                                                            {{ $extensionTexto }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            $profundidadValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => 'Superficial',
                                                                                                '2' => 'Profunda',
                                                                                                '3' => 'Muy profunda'
                                                                                            ];
                                                                                            $profundidad = $valoracionData->profundidad_curacion ?? '0';
                                                                                            $profundidadTexto = $profundidadValores[$profundidad] ?? 'N/A';
                                                                                        @endphp

                                                                                        <span class="badge badge-{{ $profundidad == '0' ? 'secondary' : ($profundidad >= '2' ? 'danger' : 'warning') }}">
                                                                                            {{ $profundidadTexto }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            $cantidadValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => 'Ausente',
                                                                                                '2' => 'Escaso',
                                                                                                '3' => 'Moderado',
                                                                                                '4' => 'Abundante'
                                                                                            ];

                                                                                            $calidadValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => 'Seroso',
                                                                                                '2' => 'Sanguinolento',
                                                                                                '3' => 'Purulento'
                                                                                            ];

                                                                                            $cantidad = $valoracionData->exudado_cantidad_curacion ?? '0';
                                                                                            $calidad = $valoracionData->exudado_calidad_curacion ?? '0';
                                                                                        @endphp

                                                                                        <small>
                                                                                            <strong>Cantidad:</strong> {{ $cantidadValores[$cantidad] ?? 'N/A' }}<br>
                                                                                            <strong>Calidad:</strong> {{ $calidadValores[$calidad] ?? 'N/A' }}
                                                                                        </small>
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            $tejidoValores = [
                                                                                                '0' => 'Sin selección',
                                                                                                '1' => 'Ausente',
                                                                                                '2' => '<25%',
                                                                                                '3' => '25-50%',
                                                                                                '4' => '50-75%',
                                                                                                '5' => '>75%'
                                                                                            ];

                                                                                            $esfacelado = $valoracionData->tejido_esf ?? '0';
                                                                                            $granulacion = $valoracionData->tejido_granu ?? '0';
                                                                                        @endphp

                                                                                        <small>
                                                                                            <strong>Esfacelado:</strong> {{ $tejidoValores[$esfacelado] ?? 'N/A' }}<br>
                                                                                            <strong>Granulación:</strong> {{ $tejidoValores[$granulacion] ?? 'N/A' }}
                                                                                        </small>
                                                                                    </td>
                                                                                    <td>
                                                                                        @php
                                                                                            $puntaje = $valoracionData->ptos_tot_ev_diab ?? null;
                                                                                        @endphp

                                                                                        @if(!empty($puntaje) && $puntaje != '0')
                                                                                            <span class="badge badge-{{ $puntaje >= 15 ? 'danger' : ($puntaje >= 10 ? 'warning' : 'success') }}">
                                                                                                {{ $puntaje }} pts
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="text-muted">Sin puntaje</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        <small class="text-success">
                                                                                            {{ $cpd->responsable ?? 'N/A' }}
                                                                                        </small>
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Gráfico de evolución de puntajes pie diabético -->
                                                            <div class="form-row mx-2 mb-3">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-info mb-3">📊 Evolución de Puntajes Pie Diabético</h6>
                                                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                        <canvas id="chartPuntajesPieDiabetico" width="400" height="200"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Preparar datos para el gráfico pie diabético -->
                                                            @php
                                                                $fechasGraficoPD = [];
                                                                $puntajesGraficoPD = [];
                                                                $aspectosGraficoPD = [];

                                                                foreach($curaciones_pie_diabetico as $cpd) {
                                                                    // Manejar tanto JSON string como objeto - forzar decode JSON
                                                                    $valoracionData = null;

                                                                    // Forzar conversión a JSON string y luego decode
                                                                    $jsonString = json_encode($cpd->datos_valoracion_pie_diabetico);
                                                                    $valoracionData = json_decode($jsonString);

                                                                    if(isset($valoracionData) && !empty($valoracionData)) {
                                                                        $fechasGraficoPD[] = $cpd->fecha ?? 'N/A';

                                                                        // Obtener puntaje, asegurándonos de convertir a entero
                                                                        $puntaje = $valoracionData->ptos_tot_ev_diab ?? '0';
                                                                        $puntajesGraficoPD[] = (int)$puntaje;

                                                                        // Obtener aspecto para tooltip
                                                                        $aspectoValores = [
                                                                            '0' => 'Sin selección', '1' => 'Eritematoso', '2' => 'Enrojecido',
                                                                            '3' => 'Amarillo pálido', '4' => 'Necrótico grisáceo', '5' => 'Necrótico negruzco', '6' => 'Observaciones'
                                                                        ];
                                                                        $aspecto = $valoracionData->aspecto_pie_diab ?? '0';
                                                                        $aspectosGraficoPD[] = $aspectoValores[$aspecto] ?? 'N/A';
                                                                    }
                                                                }
                                                            @endphp

                                                            <script>
                                                                // Datos para el gráfico pie diabético desde PHP
                                                                const fechasPieDiabetico = @json($fechasGraficoPD);
                                                                const puntajesPieDiabetico = @json($puntajesGraficoPD);
                                                                const aspectosPieDiabetico = @json($aspectosGraficoPD);

                                                                // Crear el gráfico pie diabético cuando se carga la página
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    const ctxPD = document.getElementById('chartPuntajesPieDiabetico').getContext('2d');

                                                                    const chartPD = new Chart(ctxPD, {
                                                                        type: 'line',
                                                                        data: {
                                                                            labels: fechasPieDiabetico,
                                                                            datasets: [{
                                                                                label: 'Puntaje Pie Diabético',
                                                                                data: puntajesPieDiabetico,
                                                                                borderColor: '#fd7e14',
                                                                                backgroundColor: 'rgba(253, 126, 20, 0.1)',
                                                                                borderWidth: 3,
                                                                                pointBackgroundColor: '#fd7e14',
                                                                                pointBorderColor: '#fff',
                                                                                pointBorderWidth: 2,
                                                                                pointRadius: 6,
                                                                                pointHoverRadius: 8,
                                                                                tension: 0.1
                                                                            }]
                                                                        },
                                                                        options: {
                                                                            responsive: true,
                                                                            maintainAspectRatio: false,
                                                                            plugins: {
                                                                                title: {
                                                                                    display: true,
                                                                                    text: 'Evolución del Puntaje de Pie Diabético',
                                                                                    font: { size: 16, weight: 'bold' }
                                                                                },
                                                                                legend: {
                                                                                    display: true,
                                                                                    position: 'top'
                                                                                },
                                                                                tooltip: {
                                                                                    callbacks: {
                                                                                        title: function(tooltipItems) {
                                                                                            return 'Fecha: ' + tooltipItems[0].label;
                                                                                        },
                                                                                        label: function(context) {
                                                                                            const index = context.dataIndex;
                                                                                            return [
                                                                                                'Puntaje: ' + context.parsed.y + ' puntos',
                                                                                                'Aspecto: ' + (aspectosPieDiabetico[index] || 'N/A')
                                                                                            ];
                                                                                        }
                                                                                    }
                                                                                }
                                                                            },
                                                                            scales: {
                                                                                y: {
                                                                                    beginAtZero: true,
                                                                                    max: 30,
                                                                                    ticks: {
                                                                                        stepSize: 5
                                                                                    },
                                                                                    title: {
                                                                                        display: true,
                                                                                        text: 'Puntaje Total'
                                                                                    }
                                                                                },
                                                                                x: {
                                                                                    title: {
                                                                                        display: true,
                                                                                        text: 'Fecha'
                                                                                    }
                                                                                }
                                                                            },
                                                                            interaction: {
                                                                                intersect: false,
                                                                                mode: 'index'
                                                                            }
                                                                        }
                                                                    });

                                                                    // Ajustar altura del canvas
                                                                    document.getElementById('chartPuntajesPieDiabetico').style.height = '300px';
                                                                });
                                                            </script>

                                                            @endif

                                                            <div class="form-row mx-2">
                                                                <div class="col-sm-12">
                                                                    <h6 class="text-success mb-2"> ➕ Nueva Curación Pie Diabético</h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                                        id="enf_urgencia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active"
                                                                                id="val_pie-tab" data-toggle="tab"
                                                                                href="#val_pie" role="tab"
                                                                                aria-controls="val_pie"
                                                                                aria-selected="true">Valoración</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset"
                                                                                id="curac_pie-tab" data-toggle="tab"
                                                                                href="#curac_pie" role="tab"
                                                                                aria-controls="curac_pie"
                                                                                aria-selected="true" >Curación</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="alert alert-warning" role="alert">
                                                                        Si desea ocupar el item de observaciones debe
                                                                        necesariamente elegir otra opción para sumar el
                                                                        puntaje.
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-11">
                                                                    <div class="tab-content" id="pie_diab">
                                                                        <div class="tab-pane fade show active"
                                                                            id="val_pie" role="tabpanel"
                                                                            aria-labelledby="val_pie-tab">
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="aspecto_pie_diab">Aspecto</label>
                                                                                        <select name="aspecto_pie_diab"
                                                                                            id="aspecto_pie_diab"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('aspecto_pie_diab','div_aspecto_pie_diab','obs_aspecto_pie_diab',6); actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Erimatoso </option>
                                                                                            <option value="2">
                                                                                                Enrojecido</option>
                                                                                            <option value="3">
                                                                                                Amarillo pálido</option>
                                                                                            <option value="4">
                                                                                                Necrótico grisáceo
                                                                                            </option>
                                                                                            <option value="5">
                                                                                                Necrótico negruzco
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_aspecto_pie_diab"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_aspecto_pie_diab">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_aspecto_pie_diab" id="obs_aspecto_pie_diab"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary btn-sm  btn-block"onclick="p_diab();">
                                                                                            <i
                                                                                                class="feather icon-plus"></i>
                                                                                            Guía</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="mayor_extension">Mayor
                                                                                            Extensión</label>
                                                                                        <select name="mayor_extension"
                                                                                            id="mayor_extension"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('mayor_extension','div_mayor_extension','obs_mayor_extension',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0-1
                                                                                                cm</option>
                                                                                            <option value="2">1-3
                                                                                                cm</option>
                                                                                            <option value="3">3-6
                                                                                                cm</option>
                                                                                            <option value="4">6-10
                                                                                                cm</option>
                                                                                            <option value="5">>10
                                                                                                cm</option>
                                                                                            <option value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_mayor_extension"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_mayor_extension">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_mayor_extension" id="obs_mayor_extension"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="profundidad_curacion">Profundidad</label>
                                                                                        <select name="profundidad_curacion"
                                                                                            id="profundidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('profundidad_curacion','div_profundidad_curacion','obs_profundidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0
                                                                                            </option>
                                                                                            <option value="2">0-1
                                                                                                cm</option>
                                                                                            <option value="3">1-2
                                                                                                cm</option>
                                                                                            <option value="4">2-3
                                                                                                cm</option>
                                                                                            <option value="5"> >3
                                                                                                cm </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_profundidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_profundidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_profundidad_curacion" id="obs_profundidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="exudado_cantidad_curacion">Exudado-Cantidad</label>
                                                                                        <select name="exudado_cantidad_curacion"
                                                                                            id="exudado_cantidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('exudado_cantidad_curacion','div_exudado_cantidad_curacion','obs_exudado_cantidad_curacion',11);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente</option>
                                                                                            <option value="2">
                                                                                                Escaso</option>
                                                                                            <option value="3">
                                                                                                Moderado</option>
                                                                                            <option value="4">
                                                                                                Abundante</option>
                                                                                            <option value="5">Muy
                                                                                                abundante</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group "
                                                                                        id="div_exudado_cantidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_exudado_cantidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_exudado_cantidad_curacion" id="obs_exudado_cantidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="exudado_calidad_curacion">Exudado-Calidad</label>
                                                                                        <select name="exudado_calidad_curacion"
                                                                                            id="exudado_calidad_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('exudado_calidad_curacion','div_exudado_calidad_curacion','obs_exudado_calidad_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">Sin
                                                                                                exudado </option>
                                                                                            <option value="2">
                                                                                                Seroso</option>
                                                                                            <option value="3">
                                                                                                Turbio</option>
                                                                                            <option value="4">
                                                                                                Purulento </option>
                                                                                            <option value="5">
                                                                                                Purulento gangrenoso
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_exudado_calidad_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_exudado_calidad_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_exudado_calidad_curacion" id="obs_exudado_calidad_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tejido_esf">Tejido
                                                                                            esfacelado o
                                                                                            necrótico</label>
                                                                                        <select name="tejido_esf"
                                                                                            id="tejido_esf"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('tejido_esf','div_tejido_esf','obs_tejido_esf',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente</option>
                                                                                            <option value="2">
                                                                                                < 25 %</option>
                                                                                            <option value="3">25 -
                                                                                                50 %</option>
                                                                                            <option value="4">>50
                                                                                                - 75 %</option>
                                                                                            <option value="5">>75
                                                                                                %</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_tejido_esf"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_tejido_esf">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_tejido_esf" id="obs_tejido_esf"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tejido_granu">Tejido
                                                                                            granulatorio</label>
                                                                                        <select name="tejido_granu"
                                                                                            id="tejido_granu"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('tejido_granu','div_tejido_granu','obs_tejido_granu',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="1">
                                                                                                Seleccione </option>
                                                                                            <option value="1">100
                                                                                                % </option>
                                                                                            <option value="2">99 -
                                                                                                75 %</option>
                                                                                            <option value="3">
                                                                                                < 75 - 50 %</option>
                                                                                            <option value="4">
                                                                                                < 50 - 25 %</option>
                                                                                            <option value="5">
                                                                                                < 25 %</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_tejido_granu"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_tejido_granu">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_tejido_granu" id="obs_tejido_granu"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="edema_curacion">Edema</label>
                                                                                        <select name="edema_curacion"
                                                                                            id="edema_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('edema_curacion','div_edema_curacion','obs_edema_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Ausente </option>
                                                                                            <option value="2">+
                                                                                            </option>
                                                                                            <option value="3">++
                                                                                            </option>
                                                                                            <option value="4">+++
                                                                                            </option>
                                                                                            <option value="5">++++
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group "
                                                                                        id="div_edema_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_edema_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_edema_curacion" id="obs_edema_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="dolor_curacion">Dolor</label>
                                                                                        <select name="dolor_curacion"
                                                                                            id="dolor_curacion"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('dolor_curacion','div_dolor_curacion','obs_dolor_curacion',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">0 -
                                                                                                1</option>
                                                                                            <option value="2">2 -
                                                                                                3</option>
                                                                                            <option value="3">4 -
                                                                                                6</option>
                                                                                            <option value="4">7 -
                                                                                                8</option>
                                                                                            <option value="5">9 -
                                                                                                10</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_dolor_curacion"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_dolor_curacion">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_dolor_curacion" id="obs_dolor_curacion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="piel_circun">Piel
                                                                                            circundante</label>
                                                                                        <select name="piel_circun"
                                                                                            id="piel_circun"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('piel_circun','div_piel_circun','obs_piel_circun',6);actualizarTotalPieDiabetico()">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option value="1">
                                                                                                Sana </option>
                                                                                            <option value="2">
                                                                                                Descamada</option>
                                                                                            <option value="3">
                                                                                                Erimatosa</option>
                                                                                            <option value="4">
                                                                                                Macerada</option>
                                                                                            <option value="5">
                                                                                                Gangrena</option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_piel_circun"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_piel_circun">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_piel_circun" id="obs_piel_circun"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ptos_tot_ev_diab">P.Total</label>
                                                                                        <input type="number"
                                                                                            class="form-control form-control-sm"
                                                                                            name="ptos_tot_ev_diab"
                                                                                            id="ptos_tot_ev_diab">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm  btn-block"onclick="g_pdiab();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="obs_orin">Obs.
                                                                                            Curación Pié
                                                                                            Diabético</label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=3;"
                                                                                            name="obs_orin" id="obs_orin"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <!--ANTECEDENTES RELEVANTES-->
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6
                                                                                                class="t-aten mt-2 mb-2">
                                                                                                ANTECEDENTES RELEVANTES
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="pat_prop">Enfermedad
                                                                                                actual</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="pat_prop"
                                                                                                id="pat_prop"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Hipertensión
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Diabetes</option>
                                                                                                <option
                                                                                                    value="3">
                                                                                                    Hipercolesterolemia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="4">
                                                                                                    Hiperlipidemia
                                                                                                </option>
                                                                                                <option
                                                                                                    value="5">
                                                                                                    Cancer</option>
                                                                                                <option
                                                                                                    value="6">
                                                                                                    Obesidad</option>
                                                                                                <option
                                                                                                    value="7">
                                                                                                    Hipertiroidismo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="8">
                                                                                                    Hipotiroidismo
                                                                                                </option>
                                                                                                <option
                                                                                                    value="9">
                                                                                                    Cirugías</option>
                                                                                                <option
                                                                                                    value="10">
                                                                                                    Inmunodepresión
                                                                                                </option>
                                                                                                <option
                                                                                                    value="11">
                                                                                                    Tabaquismo</option>
                                                                                                <option
                                                                                                    value="12">
                                                                                                    Insuficiencia venosa
                                                                                                </option>
                                                                                                <option
                                                                                                    value="13">
                                                                                                    Insuficiencia
                                                                                                    arterial</option>
                                                                                                <option
                                                                                                    value="14">
                                                                                                    Sustancias Ilícitas
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="sint_act">Medicamentos
                                                                                                / Tratamientos</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="sint_act"
                                                                                                id="sint_act"
                                                                                                multiple="multiple">
                                                                                                <option
                                                                                                    value="1">
                                                                                                    Hipoglicemiantes
                                                                                                </option>
                                                                                                <option
                                                                                                    value="2">
                                                                                                    Antibióticos
                                                                                                </option>
                                                                                                <option
                                                                                                    value="3">
                                                                                                    Corticosteroides
                                                                                                </option>
                                                                                                <option
                                                                                                    value="4">
                                                                                                    Tratamiento
                                                                                                    Anticoagulante
                                                                                                </option>
                                                                                                <option
                                                                                                    value="5">
                                                                                                    Otros</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="ot_pat_act">Resultado
                                                                                                de exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                                onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                        </div>
                                                                                        <button type="button" class="btn btn-outline-success btn-sm my-2 float-right" onclick="guardar_curacion_pie_diab()" @if(!$enfermera) disabled @endif><i class="fas fa-save"></i>Guardar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade show"
                                                                            id="curac_pie" role="tabpanel"
                                                                            aria-labelledby="curac_pie-tab">
                                                                            @php
                                                                                $datosCuracionLpp = null;
                                                                                if (isset($curaciones_lpp[0]) && isset($curaciones_lpp[0]->datos_curacion_lpp)) {
                                                                                    $datosCuracionLpp = $curaciones_lpp[0]->datos_curacion_lpp;
                                                                                    if (is_string($datosCuracionLpp)) {
                                                                                        $decodedCur = json_decode($datosCuracionLpp);
                                                                                        if (json_last_error() === JSON_ERROR_NONE) {
                                                                                            $datosCuracionLpp = $decodedCur;
                                                                                        }
                                                                                    }
                                                                                    if (is_array($datosCuracionLpp)) {
                                                                                        $datosCuracionLpp = json_decode(json_encode($datosCuracionLpp));
                                                                                    }
                                                                                }
                                                                                if (!is_object($datosCuracionLpp)) {
                                                                                    $datosCuracionLpp = (object) [];
                                                                                }
                                                                                if (isset($curaciones_lpp[0])) {
                                                                                    $curaciones_lpp[0]->datos_curacion_lpp = $datosCuracionLpp;
                                                                                }
                                                                            @endphp
                                                                            <div class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_cult">Toma de
                                                                                            Cultivo</label>
                                                                                        <select name="cp_cult"
                                                                                            id="cp_cult"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_cult ?? null) == 1 ? 'selected' : '' }}  value="1">No
                                                                                            </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_cult ?? null) == 2 ? 'selected' : '' }} value="2">Si
                                                                                            </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_cult ?? null) == 6 ? 'selected' : '' }} value="6">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_cult"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_cult">Observaciones
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_cult" id="obs_cp_cult">{{ $datosCuracionLpp->obs_cp_cult ?? '' }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_td">Tipos de
                                                                                            debridamiento</label>
                                                                                        <select name="cp_td"
                                                                                            id="cp_td"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 1 ? 'selected' : '' }} value="1">
                                                                                                Quirúrgico </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 2 ? 'selected' : '' }} value="2">
                                                                                                Cortante</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 3 ? 'selected' : '' }} value="3">
                                                                                                Enzimático</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 4 ? 'selected' : '' }} value="4">
                                                                                                Autolítico</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 5 ? 'selected' : '' }} value="5">
                                                                                                Osmótico</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 6 ? 'selected' : '' }} value="6">
                                                                                                Larval</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 7 ? 'selected' : '' }} value="7">
                                                                                                Mecánico</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_td ?? null) == 8 ? 'selected' : '' }} value="8">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_td"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_td">Otras
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_td" id="obs_cp_td">{{ $datosCuracionLpp->obs_cp_td ?? '' }} </textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="cp_duch">Duchoterapia</label>
                                                                                        <select name="cp_duch"
                                                                                            id="cp_duch"
                                                                                            class="form-control form-control-sm"
                                                                                            onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                            <option selected
                                                                                                value="0">
                                                                                                Seleccione</option>
                                                                                            <option {{ ($datosCuracionLpp->cp_duch ?? null) == 1 ? 'selected' : '' }} value="1">Si
                                                                                            </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_duch ?? null) == 2 ? 'selected' : '' }} value="2">No
                                                                                            </option>
                                                                                            <option {{ ($datosCuracionLpp->cp_duch ?? null) == 3 ? 'selected' : '' }} value="3">
                                                                                                Observaciones</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group"
                                                                                        id="div_cp_duch"
                                                                                        style="display:none;">
                                                                                        <label
                                                                                            class="floating-label-activo-sm t-red"
                                                                                            for="obs_cp_duch">Observaciones
                                                                                            <i>(Describir)</i></label>
                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                            name="obs_cp_duch" id="obs_cp_duch">{{ $datosCuracionLpp->obs_cp_duch ?? '' }}</textarea>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-row mt-2">
                                                                                        <div
                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Tipo de
                                                                                                Antisépticos y
                                                                                                materiales usados</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="pie_ant">Tipo de
                                                                                                antisepticos</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="pie_ant"
                                                                                                id="pie_ant"
                                                                                                multiple="multiple">
                                                                                                <option {{ in_array(1, $curaciones_lpp[0]->datos_curacion_lpp->pie_ant ?? []) ? 'selected' : '' }}
                                                                                                    value="1">
                                                                                                    Solución fisiológica
                                                                                                </option>
                                                                                                <option {{ in_array(2, $curaciones_lpp[0]->datos_curacion_lpp->pie_ant ?? []) ? 'selected' : '' }}
                                                                                                    value="2">
                                                                                                    Bialcohol</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="tpo_aposc">Tipo
                                                                                                de apósitos y
                                                                                                materiales</label>
                                                                                            <select
                                                                                                class="form-control form-control-sm"
                                                                                                name="tpo_aposc"
                                                                                                id="tpo_aposc"
                                                                                                multiple="multiple">
                                                                                                <option {{ in_array(1, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="1">
                                                                                                    Apósitos Pasivos
                                                                                                </option>
                                                                                                <option {{ in_array(2, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="2">
                                                                                                    Apósito Interactivo
                                                                                                    (Espuma Hidrofílica)
                                                                                                </option>
                                                                                                <option {{ in_array(3, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="3">
                                                                                                    Apósito Bioactivo
                                                                                                    (Alginato)</option>
                                                                                                <option {{ in_array(4, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="4">
                                                                                                    Apósitos Mixtos
                                                                                                </option>
                                                                                                <option {{ in_array(5, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="5">
                                                                                                    Vasocontrictores
                                                                                                </option>
                                                                                                <option {{ in_array(6, $curaciones_lpp[0]->datos_curacion_lpp->tpo_aposc ?? []) ? 'selected' : '' }}
                                                                                                    value="6">
                                                                                                    Otros</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div
                                                                                            class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="antisep">Observaciones</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act">{{ isset($curaciones_lpp) ? $curaciones_lpp[0]->datos_curacion_lpp->ot_pat_act ?? '' : '' }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-outline-success btn-sm w-100 my-2" onclick="guardar_curacion_pie_diab()" @if(!$enfermera) disabled @endif><i class="fas fa-save"></i> Guardar Curación</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--QUEMADOS-->
                                                    <div class="tab-pane fade" id="cur_quem" role="tabpanel"
                                                        aria-labelledby="cur_quem-tab">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <h6 class="t-aten">Curación Quemados</h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Tabla de curaciones quemados existentes -->
                                                        @if(isset($curaciones_quemados) && count($curaciones_quemados) > 0)
                                                        <div class="form-row mx-2 mb-3">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-primary mb-2">Curaciones Quemados Registradas</h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-sm table-bordered">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>Fecha/Hora</th>
                                                                                <th>Superficie Quemada</th>
                                                                                <th>Grado</th>
                                                                                <th>Infección</th>
                                                                                <th>Tipo Quemadura</th>
                                                                                <th>Tipo Curación</th>
                                                                                <th>Responsable</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($curaciones_quemados as $cq)
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="badge badge-info">{{ $cq->fecha ?? 'N/A' }}</span>
                                                                                    @if(isset($cq->hora))
                                                                                        <br><small class="text-muted">{{ $cq->hora }}</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        // Forzar conversión JSON para obtener datos
                                                                                        $valoracionDataQ = json_decode(json_encode($cq->datos_valoracion_quemados));

                                                                                        $superficieValores = [
                                                                                            '0' => 'Sin selección',
                                                                                            '1' => '< 9%',
                                                                                            '2' => '9-18%',
                                                                                            '3' => '> 18%',
                                                                                            '4' => 'Otros'
                                                                                        ];

                                                                                        $superficie = $valoracionDataQ->qmsupqm ?? '0';
                                                                                        $superficieTexto = $superficieValores[$superficie] ?? 'N/A';
                                                                                    @endphp

                                                                                    <span class="badge badge-{{ $superficie == '0' ? 'secondary' : ($superficie == '3' ? 'danger' : ($superficie == '2' ? 'warning' : 'success')) }}">
                                                                                        {{ $superficieTexto }}
                                                                                    </span>

                                                                                    @if(isset($valoracionDataQ->obs_qmsupqm) && !empty($valoracionDataQ->obs_qmsupqm))
                                                                                        <br><small class="text-muted">{{ $valoracionDataQ->obs_qmsupqm }}</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        $gradoValores = [
                                                                                            '0' => 'Sin selección',
                                                                                            '1' => 'Primer grado',
                                                                                            '2' => 'Segundo grado',
                                                                                            '3' => 'Tercer grado',
                                                                                            '4' => 'Mixta',
                                                                                            '11' => 'Observaciones'
                                                                                        ];

                                                                                        $grado = $valoracionDataQ->qmdr ?? '0';
                                                                                        $gradoTexto = $gradoValores[$grado] ?? 'N/A';
                                                                                    @endphp

                                                                                    <span class="badge badge-{{ $grado == '0' ? 'secondary' : ($grado == '3' || $grado == '4' ? 'danger' : ($grado == '2' ? 'warning' : 'success')) }}">
                                                                                        {{ $gradoTexto }}
                                                                                    </span>

                                                                                    @if(isset($valoracionDataQ->obs_qmdr) && !empty($valoracionDataQ->obs_qmdr))
                                                                                        <br><small class="text-muted">{{ $valoracionDataQ->obs_qmdr }}</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        $infeccionValores = [
                                                                                            '0' => 'Sin selección',
                                                                                            '1' => 'No',
                                                                                            '2' => 'Si'
                                                                                        ];

                                                                                        $infeccion = $valoracionDataQ->qm_presinf ?? '0';
                                                                                        $infeccionTexto = $infeccionValores[$infeccion] ?? 'N/A';
                                                                                    @endphp

                                                                                    <span class="badge badge-{{ $infeccion == '0' ? 'secondary' : ($infeccion == '2' ? 'danger' : 'success') }}">
                                                                                        {{ $infeccionTexto }}
                                                                                    </span>
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        $tipoQuemaduraValores = [
                                                                                            '0' => 'Sin selección',
                                                                                            '1' => 'Solar',
                                                                                            '2' => 'Por Líquidos',
                                                                                            '3' => 'Vapores y gases',
                                                                                            '4' => 'Sust. Químicas',
                                                                                            '5' => 'Electricidad',
                                                                                            '6' => 'Fuego directo',
                                                                                            '11' => 'Otros'
                                                                                        ];

                                                                                        $tipoQ = $valoracionDataQ->qm_tq ?? '0';
                                                                                        $tipoQTexto = $tipoQuemaduraValores[$tipoQ] ?? 'N/A';
                                                                                    @endphp

                                                                                    <span class="badge badge-{{ $tipoQ == '0' ? 'secondary' : ($tipoQ == '4' || $tipoQ == '5' || $tipoQ == '6' ? 'danger' : 'info') }}">
                                                                                        {{ $tipoQTexto }}
                                                                                    </span>

                                                                                    @if(isset($valoracionDataQ->obs_qm_tq) && !empty($valoracionDataQ->obs_qm_tq))
                                                                                        <br><small class="text-muted">{{ $valoracionDataQ->obs_qm_tq }}</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        $tipoCuracionValores = [
                                                                                            '0' => 'Sin selección',
                                                                                            '1' => 'Plana superficial',
                                                                                            '2' => 'Con remoción de tejidos',
                                                                                            '3' => 'Aseo quirúrgico',
                                                                                            '11' => 'Otros'
                                                                                        ];

                                                                                        $tipoC = $valoracionDataQ->qm_tc ?? '0';
                                                                                        $tipoCTexto = $tipoCuracionValores[$tipoC] ?? 'N/A';
                                                                                    @endphp

                                                                                    <span class="badge badge-{{ $tipoC == '0' ? 'secondary' : ($tipoC == '3' ? 'warning' : ($tipoC == '2' ? 'info' : 'primary')) }}">
                                                                                        {{ $tipoCTexto }}
                                                                                    </span>

                                                                                    @if(isset($valoracionDataQ->obs_qm_tc) && !empty($valoracionDataQ->obs_qm_tc))
                                                                                        <br><small class="text-muted">{{ $valoracionDataQ->obs_qm_tc }}</small>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <small class="text-success">
                                                                                        {{ $cq->responsable ?? 'N/A' }}
                                                                                    </small>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Gráfico de distribución de grados de quemaduras -->
                                                        <div class="form-row mx-2 mb-3">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-info mb-3">📊 Distribución de Grados de Quemaduras</h6>
                                                                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                                    <canvas id="chartGradosQuemados" width="400" height="200"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Preparar datos para el gráfico quemados -->
                                                        @php
                                                            $gradosDistribucion = [];
                                                            $fechasQuemados = [];

                                                            foreach($curaciones_quemados as $cq) {
                                                                $valoracionDataQ = json_decode(json_encode($cq->datos_valoracion_quemados));

                                                                if(isset($valoracionDataQ) && !empty($valoracionDataQ)) {
                                                                    $fechasQuemados[] = $cq->fecha ?? 'N/A';
                                                                    $grado = $valoracionDataQ->qmdr ?? '0';

                                                                    // Contabilizar grados para gráfico de distribución
                                                                    if (!isset($gradosDistribucion[$grado])) {
                                                                        $gradosDistribucion[$grado] = 0;
                                                                    }
                                                                    $gradosDistribucion[$grado]++;
                                                                }
                                                            }

                                                            $gradoLabels = [];
                                                            $gradoCounts = [];
                                                            $gradoColors = [];

                                                            $gradoValores = [
                                                                '1' => 'Primer grado',
                                                                '2' => 'Segundo grado',
                                                                '3' => 'Tercer grado',
                                                                '4' => 'Mixta'
                                                            ];

                                                            $colores = [
                                                                '1' => '#28a745', // Verde
                                                                '2' => '#ffc107', // Amarillo
                                                                '3' => '#dc3545', // Rojo
                                                                '4' => '#6f42c1'  // Púrpura
                                                            ];

                                                            foreach($gradosDistribucion as $grado => $count) {
                                                                if($grado != '0' && isset($gradoValores[$grado])) {
                                                                    $gradoLabels[] = $gradoValores[$grado];
                                                                    $gradoCounts[] = $count;
                                                                    $gradoColors[] = $colores[$grado] ?? '#6c757d';
                                                                }
                                                            }
                                                        @endphp

                                                        <script>
                                                            // Datos para el gráfico de quemados desde PHP
                                                            const gradoLabelsQuemados = @json($gradoLabels);
                                                            const gradoCountsQuemados = @json($gradoCounts);
                                                            const gradoColorsQuemados = @json($gradoColors);

                                                            // Crear el gráfico de quemados cuando se carga la página
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const ctxQ = document.getElementById('chartGradosQuemados').getContext('2d');

                                                                const chartQuemados = new Chart(ctxQ, {
                                                                    type: 'doughnut',
                                                                    data: {
                                                                        labels: gradoLabelsQuemados,
                                                                        datasets: [{
                                                                            label: 'Distribución de Grados',
                                                                            data: gradoCountsQuemados,
                                                                            backgroundColor: gradoColorsQuemados,
                                                                            borderColor: '#fff',
                                                                            borderWidth: 2,
                                                                            hoverBorderWidth: 3
                                                                        }]
                                                                    },
                                                                    options: {
                                                                        responsive: true,
                                                                        maintainAspectRatio: false,
                                                                        plugins: {
                                                                            title: {
                                                                                display: true,
                                                                                text: 'Distribución de Grados de Quemaduras',
                                                                                font: { size: 16, weight: 'bold' }
                                                                            },
                                                                            legend: {
                                                                                display: true,
                                                                                position: 'bottom',
                                                                                labels: {
                                                                                    padding: 15,
                                                                                    usePointStyle: true
                                                                                }
                                                                            },
                                                                            tooltip: {
                                                                                callbacks: {
                                                                                    label: function(context) {
                                                                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                                                                        const percentage = ((context.parsed * 100) / total).toFixed(1);
                                                                                        return context.label + ': ' + context.parsed + ' pacientes (' + percentage + '%)';
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                });

                                                                // Ajustar altura del canvas
                                                                document.getElementById('chartGradosQuemados').style.height = '300px';
                                                            });
                                                        </script>

                                                        @endif

                                                        <div class="form-row mx-2">
                                                            <div class="col-sm-12">
                                                                <h6 class="text-success mb-2"> ➕ Nueva Curación Quemados</h6>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-2"
                                                                    id="enf_urgencia" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active"
                                                                            id="val_quem-tab" data-toggle="tab"
                                                                            href="#val_quem" role="tab"
                                                                            aria-controls="val_quem"
                                                                            aria-selected="true">Valoración</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset"
                                                                            id="curac_quem-tab" data-toggle="tab"
                                                                            href="#curac_quem" role="tab"
                                                                            aria-controls="curac_quem"
                                                                            aria-selected="true">Curación</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="quemados">
                                                                    <div class="tab-pane fade show active"
                                                                        id="val_quem" role="tabpanel"
                                                                        aria-labelledby="val_quem-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qmsupqm">Superficie
                                                                                        quemada</label>
                                                                                    <select name="qmsupqm"
                                                                                        id="qmsupqm"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qmsupqm','div_qmsupqm','obs_qmsupqm',4);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            < 9% </option>
                                                                                        <option value="2">9-18%
                                                                                        </option>
                                                                                        <option value="3"> >18%
                                                                                        </option>
                                                                                        <option value="4">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qmsupqm"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qmsupqm">Otras
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qmsupqm" id="obs_qmsupqm"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-sm btn-block"onclick="quem();">
                                                                                        <i
                                                                                            class="feather icon-plus"></i>
                                                                                        Guía</button>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qmdr">Grado
                                                                                        quemadura</label>
                                                                                    <select name="qmdr"
                                                                                        id="qmdr"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qmdr','div_qmdr','obs_qmdr',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Primer
                                                                                            grado</option>
                                                                                        <option value="2">Segundo
                                                                                            grado</option>
                                                                                        <option value="3">Tercer
                                                                                            grado</option>
                                                                                        <option value="4">Mixta
                                                                                        </option>
                                                                                        <option value="11">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qmdr"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qmdr">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qmdr" id="obs_qmdr"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="bh_dren_1">Infección</label>
                                                                                    <select name="qm_presinf"
                                                                                        id="qm_presinf"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_presinf','div_qm_presinf','obs_qm_presinf',2);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">No
                                                                                        </option>
                                                                                        <option value="2">Si
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_presinf"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qm_presinf">Observaciones
                                                                                        Infección
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_presinf" id="obs_qm_presinfr"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="qm_tq">Tipo
                                                                                        quemadura</label>
                                                                                    <select name="qm_tq"
                                                                                        id="qm_tq"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_tq','div_qm_tq','obs_qm_tq',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Solar
                                                                                        </option>
                                                                                        <option value="2">Por
                                                                                            Liquidos</option>
                                                                                        <option value="3">Vapores
                                                                                            y gases</option>
                                                                                        <option value="4">Sust.
                                                                                            Químicas</option>
                                                                                        <option value="5">
                                                                                            Eléctricidad</option>
                                                                                        <option value="6">Fuego
                                                                                            directo</option>
                                                                                        <option value="11">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_tq"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_qm_tq">Otra causa
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_tq" id="obs_qm_tq"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="qm_tc">Tipo
                                                                                        curación</label>
                                                                                    <select name="qm_tc"
                                                                                        id="qm_tc"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('qm_tc','div_qm_tc','obs_qm_tc',11);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Plana
                                                                                            superficial</option>
                                                                                        <option value="2">Con
                                                                                            remoción de tejidos</option>
                                                                                        <option value="3">Aseo
                                                                                            quirúrgico</option>
                                                                                        <option value="11">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_qm_tc"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_bh_dren_1">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_qm_tc" id="obs_qm_tc"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <!--ANTECEDENTES RELEVANTES-->
                                                                                <div class="form-row mt-2">
                                                                                    <div
                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">
                                                                                            Antecedentes relevantes</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="pat_propq">Enfermedad
                                                                                            actual</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="pat_propq"
                                                                                            id="pat_propq"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Hipertensión</option>
                                                                                            <option value="2">
                                                                                                Diabetes</option>
                                                                                            <option value="3">
                                                                                                Hipercolesterolemia
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Hiperlipidemia</option>
                                                                                            <option value="5">
                                                                                                Cáncer</option>
                                                                                            <option value="6">
                                                                                                Obesidad</option>
                                                                                            <option value="7">
                                                                                                Hipertiroidismo</option>
                                                                                            <option value="8">
                                                                                                Hipotiroidismo</option>
                                                                                            <option value="9">
                                                                                                Cirugías</option>
                                                                                            <option value="10">
                                                                                                Inmunodepresión</option>
                                                                                            <option value="11">
                                                                                                Tabaquismo</option>
                                                                                            <option value="12">
                                                                                                Insuficiencia venosa
                                                                                            </option>
                                                                                            <option value="13">
                                                                                                Insuficiencia arterial
                                                                                            </option>
                                                                                            <option value="14">
                                                                                                Sustancias Ilícitas
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="med_quem">Medicamentos
                                                                                            / Tratamientos</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="med_quem"
                                                                                            id="med_quem"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Hipoglicemiantes
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Antibióticos</option>
                                                                                            <option value="3">
                                                                                                Corticosteroides
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Tratamiento
                                                                                                Anticoagulante</option>
                                                                                            <option value="5">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ot_pat_act">Resultado
                                                                                            de exámenes</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=4"
                                                                                            onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show" id="curac_quem"
                                                                        role="tabpanel"
                                                                        aria-labelledby="curac_quem-tab">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="cp_cult">Toma de
                                                                                        Cultivo</label>
                                                                                    <select name="cp_cult"
                                                                                        id="cp_cult"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',3);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">No
                                                                                        </option>
                                                                                        <option value="2">Si
                                                                                        </option>
                                                                                        <option value="3">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_cult"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="obs_cp_cult">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_cult" id="obs_cp_cult"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        for="cp_td">Tipos de
                                                                                        debridamiento</label>
                                                                                    <select name="cp_td"
                                                                                        id="cp_td"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Quirúrgico </option>
                                                                                        <option value="2">
                                                                                            Cortante</option>
                                                                                        <option value="3">
                                                                                            Enzimático</option>
                                                                                        <option value="4">
                                                                                            Autolítico</option>
                                                                                        <option value="5">
                                                                                            Osmótico</option>
                                                                                        <option value="6">Larval
                                                                                        </option>
                                                                                        <option value="7">
                                                                                            Mecánico</option>
                                                                                        <option value="8">Otros
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_td"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_td">Otras
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_td" id="obs_cp_td"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="cp_duch">Duchoterapia</label>
                                                                                    <select name="cp_duch"
                                                                                        id="cp_duch"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                                                                                        <option selected
                                                                                            value="0">Seleccione
                                                                                        </option>
                                                                                        <option value="1">Si
                                                                                        </option>
                                                                                        <option value="2">No
                                                                                        </option>
                                                                                        <option value="3">
                                                                                            Observaciones</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_cp_duch"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red"
                                                                                        for="obs_cp_duch">Observaciones
                                                                                        <i>(Describir)</i></label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_cp_duch" id="obs_cp_duch"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row mt-2">
                                                                                    <div
                                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Tipo de
                                                                                            Antisépticos y materiales
                                                                                            usados</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="ants_qm">Tipo de
                                                                                            antisepticos y
                                                                                            cremas</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="ants_qm"
                                                                                            id="ants_qm"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Solución fisiológica
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Bialcohol</option>
                                                                                            <option value="3">
                                                                                                Sulfadiazina de
                                                                                                plata(Platsul)</option>
                                                                                            <option value="4">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                        <div class="form-group"
                                                                                            style="margin-top:2%">
                                                                                            <label
                                                                                                class="floating-label-activo-sm"
                                                                                                for="ot_qx_ac">Anote
                                                                                                Otro Antiséptico o
                                                                                                crema</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                name="ot_qx_ac" id="ot_qx_ac"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label
                                                                                            class="floating-label-activo-sm"
                                                                                            for="tpo_aposqm">Tipo de
                                                                                            apósitos y
                                                                                            materiales</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="tpo_aposqm"
                                                                                            id="tpo_aposqm"
                                                                                            multiple="multiple">
                                                                                            <option value="1">
                                                                                                Apósitos Pasivos
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                Apósito
                                                                                                Interactivo(Espuma
                                                                                                Hidrofílica)</option>
                                                                                            <option value="3">
                                                                                                Apósito
                                                                                                Bioactivo(Alginato)
                                                                                            </option>
                                                                                            <option value="4">
                                                                                                Apósitos Mixtos</option>
                                                                                            <option value="5">
                                                                                                Vasocontrictores
                                                                                            </option>
                                                                                            <option value="6">
                                                                                                Otros</option>
                                                                                        </select>
                                                                                        <div class="form-group"
                                                                                            style="margin-top:2%">
                                                                                            <label
                                                                                                class="floating-label-activo-sm mt-10"
                                                                                                for="ot_qx_apos">Anote
                                                                                                Otro Tipo de
                                                                                                apósitos</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                                                name="ot_qx_apos" id="ot_qx_apos"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"
                                                                        for="obs_gen_cur_qx">Observaciones Curación
                                                                        Quemados</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=3;"
                                                                        name="obs_gen_cur_qx" id="obs_gen_cur_qx"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-outline-success btn-sm my-2 float-right" onclick="guardar_curacion_quemados()" @if(!$enfermera) disabled @endif><i class="fas fa-save"></i>Guardar</button>
                                                    </div>
                                                    <!--CURACIONES SIMPLES -->
                                                    <div class="tab-pane fade show " id="cur_simples" role="tabpanel" aria-labelledby="cur_simples-tab">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <h6 class="t-aten">Curaciones Simples y retiro de puntos</h6>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="tipo_cur_simples">Tipo de Curación</label>
                                                                            <select name="tipo_cur_simples" id="tipo_cur_simples" class="form-control form-control-sm">
                                                                                <option value="">Seleccione</option>
                                                                                @foreach($curaciones as $c)
                                                                                    <option value="{{ $c->id }}">{{ $c->datos_curacion->nombre_procedimiento }}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm" for="obs_cur_simples">Observaciones</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cur_simples" id="obs_cur_simples"></textarea>
                                                                        </div>
                                                                    </div>
                                                                        <button type="button" class="btn btn-outline-success btn-sm float-right my-2">Agregar</button>

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
                            <!--EXÁMENES-->
                            <div class="tab-pane fade show " id="enf_examenes" role="tabpanel" aria-labelledby="enf_examenes_tab">
                                <div class="form-row">
                                    <div class="col-12">
                                        <h6 class="tit-gen">Toma Exámenes</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="av_subj_sc_od">Responsable</label>
                                                    <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_pto','div_resp_pto','nom_resp_pto',4);">
                                                        <option  value="0">Seleccione</option>
                                                        @if(isset($personal_enfermeria))
                                                            @foreach($personal_enfermeria as $pe)
                                                                <option  value="{{ $pe->id }}">{{ $pe->nombre }} {{ $pe->apellido_uno }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_resp_pto" style="display:none;">
                                                    <label class="floating-label-activo-sm" for="nom_resp_pto">Nombre / Rut</label>
                                                    <textarea class="form-control form-control-sm" drows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_pto" id="nom_resp_pto" placeholder="Anote datos"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="nom_examenes">Examen</label>
                                                    <select name="" id="" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @foreach ($examenes_solicitados as $examen)
                                                            <option value="{{ $examen->id }}">{{ $examen->datos_examen->examen }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="av_ret_cc_od">Observaciones</label>
                                                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_examen" id="obs_examen"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                </div>
                                                <label>Tomado</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-12 mt-3">
                                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                            <!--Tabla-->
                                            <div class="table-responsive">
                                                <table id="tabla_examen_cirugia_enfermeria" class="table table-bordered table-sm  w-100">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th class="text-center align-middle" style="display:none">id</th>
                                                            <th class="text-center align-middle" style="display:none">Nombre Examen</th> --}}
                                                            <th class="text-center align-middle">Nombre Examen</th>
                                                            <th class="text-center align-middle">Lado</th>
                                                            <th class="text-center align-middle">Tipo</th>
                                                            {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                                            <th class="text-center align-middle">Prioridad</th>
                                                            <th class="text-center align-middle">Con Contraste</th>
                                                            <th class="text-center align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--Cierre Tabla-->
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
    // Variable para controlar permisos de enfermera
    const ES_ENFERMERA = {{ $enfermera ? 'true' : 'false' }};

    function guardar_curacion_pie_diab() {
        let datosValoracion = {
            aspecto_pie_diab: $('#aspecto_pie_diab').val(),
            obs_aspecto_pie_diab: $('#obs_aspecto_pie_diab').val(),
            mayor_extension: $('#mayor_extension').val(),
            obs_mayor_extension: $('#obs_mayor_extension').val(),
            profundidad_curacion: $('#profundidad_curacion').val(),
            obs_profundidad_curacion: $('#obs_profundidad_curacion').val(),
            exudado_cantidad_curacion: $('#exudado_cantidad_curacion').val(),
            obs_exudado_cantidad_curacion: $('#obs_exudado_cantidad_curacion').val(),
            exudado_calidad_curacion: $('#exudado_calidad_curacion').val(),
            obs_exudado_calidad_curacion: $('#obs_exudado_calidad_curacion').val(),
            tejido_esf: $('#tejido_esf').val(),
            obs_tejido_esf: $('#obs_tejido_esf').val(),
            tejido_granu: $('#tejido_granu').val(),
            obs_tejido_granu: $('#obs_tejido_granu').val(),
            edema_curacion: $('#edema_curacion').val(),
            obs_edema_curacion: $('#obs_edema_curacion').val(),
            dolor_curacion: $('#dolor_curacion').val(),
            obs_dolor_curacion: $('#obs_dolor_curacion').val(),
            piel_circun: $('#piel_circun').val(),
            obs_piel_circun: $('#obs_piel_circun').val(),
            ptos_tot_ev_diab: $('#ptos_tot_ev_diab').val(),
            obs_orin: $('#obs_orin').val(),
            pat_prop: $('#pat_prop').val(), // multiselect array
            sint_act: $('#sint_act').val(), // multiselect array
            ot_pat_act: $('#ot_pat_act').val()
        };

        let datosCuracion = {
            cp_cult: $('#cp_cult').val(),
            obs_cp_cult: $('#obs_cp_cult').val(),
            cp_td: $('#cp_td').val(),
            obs_cp_td: $('#obs_cp_td').val(),
            cp_duch: $('#cp_duch').val(),
            obs_cp_duch: $('#obs_cp_duch').val(),
            pie_ant: $('#pie_ant').val(), // multiselect array
            tpo_aposc: $('#tpo_aposc').val(), // multiselect array
            ot_pat_act: $('#ot_pat_act').val() // observaciones de curación
        };

        console.log(datosValoracion, datosCuracion);

        $.ajax({
            url: '{{ route("enfermeria.guardar_curacion_pie_diabetico_servicio") }}',
            method: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                datos_valoracion: datosValoracion,
                datos_curacion: datosCuracion
            },
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'OK'){
                    swal({
                        title: "Éxito",
                        text: "Curación de pie diabético guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "No se pudo guardar la curación de pie diabético",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
                // Recargar tabla o mostrar mensaje
            }
        });
    }

    function administrar_medicamento(id){
        swal({
            title: "Administrar medicamento",
            text: "¿Está seguro que desea administrar este medicamento?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                administrar_medicamento_confirmar(id);
            }
        });
    }

    function administrar_medicamento_confirmar(id){
        let url = "{{ route('enfermeria.administrar_tratamiento') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                tipo: 'externo', // Identificar que es medicamento externo
                ficha_atencion_id: $('#id_fc').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK') {
                    // Buscar el medicamento actualizado en la respuesta
                    let medicamento_actualizado = null;
                    if (response.receta) {
                        if (Array.isArray(response.receta)) {
                            medicamento_actualizado = response.receta.find(m => m.id == id || m.id_detalle == id);
                        } else if (response.receta.id == id || response.receta.id_detalle == id) {
                            medicamento_actualizado = response.receta;
                        }
                    }

                    // Actualizar el checkbox de estado
                    $('#registro_alternativo_paciente_enf' + id).prop('checked', true);
                    $('#label_tratamiento_enf_' + id).html('ADMINISTRADO');

                    // Calcular y mostrar fecha de administración
                    let fecha_admin = new Date();
                    let fecha_formateada = fecha_admin.toLocaleDateString('es-CL', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    // Buscar la fila del medicamento
                    let $fila = $('#btn_administrar_' + id).closest('tr');

                    // Actualizar la celda de fecha-hora si existe (penúltima columna visible)
                    if ($fila.length > 0) {
                        // Buscar la celda de tiempo restante directamente
                        let $celdaTiempo = $fila.find('td').filter(function() {
                            return $(this).find('#tiempo_restante_' + id).length > 0;
                        });

                        if ($celdaTiempo.length === 0) {
                            // Si no la encontró así, buscar por índice (generalmente es la 6ª columna)
                            $celdaTiempo = $fila.find('td').eq(5);
                        }
                    }

                    // Actualizar tiempo restante con formato del backend
                    if(response.tiempo_transcurrido) {
                        $('#tiempo_restante_' + id).html('<span class="text-success font-weight-bold">Hace: ' + response.tiempo_transcurrido + '</span>');
                    } else {
                        $('#tiempo_restante_' + id).html('<span class="text-success font-weight-bold">Administrado ahora</span>');
                    }

                    // Actualizar el contador de dosis
                    if (medicamento_actualizado && (medicamento_actualizado.contador_dosis || medicamento_actualizado.contador_dosis === 0)) {
                        $('#repeticiones_medicamento_' + id).text(medicamento_actualizado.contador_dosis);
                    } else if(response.receta && response.receta.contador_dosis !== undefined) {
                        $('#repeticiones_medicamento_' + id).text(response.receta.contador_dosis);
                    }

                    // Deshabilitar el botón de administrar y cambiar color
                    $('#btn_administrar_' + id).prop('disabled', true).addClass('btn-secondary').removeClass('btn-success');

                    swal({
                        title: "Éxito",
                        text: "Medicamento administrado correctamente a las " + fecha_formateada,
                        icon: "success",
                        button: "Aceptar",
                    }).then(() => {
                        // Recargar la tabla con los datos actualizados si existe
                        if(response.receta) {
                            // Si response.receta es un array, usar el primero
                            let datos = Array.isArray(response.receta) ? response.receta : [response.receta];
                            actualizarTablaMedicamentos(datos);
                        }
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje || "No se pudo administrar el medicamento",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error){
                console.error("Error al administrar medicamento:", error);
                swal({
                    title: "Error",
                    text: "Ocurrió un error al administrar el medicamento",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function administrar_medicamento_enf(id_tratamiento) {
        swal({
            title: "¿Administrar medicamento?",
            text: "Se registrará la fecha y hora de administración",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: false,
        }).then((confirmar) => {
            if (confirmar) {
                let url = "{{ route('enfermeria.administrar_tratamiento') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id_tratamiento: id_tratamiento,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.mensaje == 'OK') {
                            // Buscar el medicamento actualizado en la respuesta
                            let medicamento_actualizado = null;
                            if (response.receta) {
                                if (Array.isArray(response.receta)) {
                                    medicamento_actualizado = response.receta.find(m => m.id == id_tratamiento || m.id_detalle == id_tratamiento);
                                } else if (response.receta.id == id_tratamiento || response.receta.id_detalle == id_tratamiento) {
                                    medicamento_actualizado = response.receta;
                                }
                            }

                            // Actualizar el checkbox de estado
                            $('#registro_alternativo_paciente_enf_adm' + id_tratamiento).prop('checked', true);
                            $('#label_tratamiento_enf_adm_' + id_tratamiento).html('ADMINISTRADO');

                            // Deshabilitar el botón de administrar
                            $('#btn_administrar_' + id_tratamiento).prop('disabled', true);

                            // Actualizar tiempo restante a "0 min"
                            $('#tiempo_restante_' + id_tratamiento).html('<span>Hace: 0 min</span>');

                            // Actualizar el contador de dosis
                            if (medicamento_actualizado && (medicamento_actualizado.contador_dosis || medicamento_actualizado.contador_dosis === 0)) {
                                $('#repeticiones_medicamento_' + id_tratamiento).text(medicamento_actualizado.contador_dosis);
                            }

                            swal({
                                title: "Éxito",
                                text: "Medicamento administrado correctamente",
                                icon: "success",
                                button: "Aceptar",
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: response.mensaje || "No se pudo administrar el medicamento",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al administrar medicamento:", error);
                        swal({
                            title: "Error",
                            text: "Ocurrió un error al procesar la solicitud",
                            icon: "error",
                            button: "Aceptar",
                        });
                    }
                });
            }
        });
    }

    // Función auxiliar para actualizar tabla de medicamentos externos (DataTable)
    function actualizarTablaMedicamentos(medicamentos) {
        // Verificar si viene como array o como objeto único
        let listaMedicamentos = Array.isArray(medicamentos) ? medicamentos : [medicamentos];

        // Si existe DataTable, actualizarla
        if ($.fn.DataTable.isDataTable('#tabla_med_adm_hosp')) {
            let tabla = $('#tabla_med_adm_hosp').DataTable();

            // Limpiar la tabla
            tabla.clear();

            // Agregar los medicamentos actualizados
            listaMedicamentos.forEach(function(tratamiento) {
                let tiempoTranscurrido = '-';
                if(tratamiento.estado_tratamiento == 1 && tratamiento.fecha_administrado && tratamiento.hora_administrado) {
                    tiempoTranscurrido = 'Hace: ' + (tratamiento.tiempo_transcurrido || '0 min');
                }

                let disabled = ES_ENFERMERA ? '' : 'disabled';

                let fila = [
                    tratamiento.id,
                    tratamiento.id_responsable || '',
                    tratamiento.contador_dosis || '-',
                    `${tratamiento.nombre_medicamento || '-'}<br><small>${tratamiento.composicion || ''}</small><br><small>${tratamiento.nombre_dosis || ''}</small>`,
                    tratamiento.nombre_frecuencia || '-',
                    tiempoTranscurrido,
                    (() => {
                        // Procesamiento de imágenes
                        let imagenes = [];
                        if (tratamiento.otros) {
                            try {
                                imagenes = JSON.parse(tratamiento.otros);
                            } catch(e) {
                                imagenes = [];
                            }
                        }
                        if (Array.isArray(imagenes) && imagenes.length > 0) {
                            return `<button class="btn btn-info btn-sm btn-icon" onclick="ver_imagenes_tratamiento_interno(${tratamiento.id}, ${JSON.stringify(imagenes).replace(/"/g, '&quot;')})" title="Ver imágenes de receta">
                                <i class="feather icon-image"></i> ${imagenes.length}
                            </button>`;
                        }
                        return '-';
                    })(),
                    `<div class="switch switch-success d-inline m-r-10">
                        <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento(${tratamiento.id})" ${disabled} ${tratamiento.estado_tratamiento == 1 ? 'disabled' : ''}>
                            <i class="fas fa-check"></i>
                        </button>
                    </div>`,
                    `<div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" id="registro_alternativo_paciente_enf${tratamiento.id}" onchange="cambiarTextoLabelTratamiento(${tratamiento.id})" ${tratamiento.estado_tratamiento == 1 ? 'checked' : ''} disabled>
                        <label for="registro_alternativo_paciente_enf${tratamiento.id}" class="cr"></label>
                    </div>
                    <label id="label_tratamiento_enf_${tratamiento.id}">${tratamiento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>`,
                    `<div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" id="tratamiento_finalizado${tratamiento.id}" ${tratamiento.estado_finalizado == 1 ? 'checked' : ''}>
                        <label for="tratamiento_finalizado${tratamiento.id}" class="cr"></label>
                    </div>`,
                    `<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="agregarObservacionesTratamiento(${tratamiento.id},'${(tratamiento.nombre_medicamento || '-').replace(/'/g, "\\'")}')" ${disabled} title="Agregar observaciones">
                        <i class="feather icon-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_medicamento_sdi_enf(${tratamiento.id})" ${disabled} title="Eliminar tratamiento">
                        <i class="feather icon-trash-2"></i>
                    </button>`
                ];

                tabla.row.add(fila);
            });

            // Redibujar la tabla
            tabla.draw();
        }
    }

    function ver_imagenes_tratamiento_interno(tratamiento_id, imagenes) {
        let html = '<div class="row" style="max-height: 500px; overflow-y: auto;">';

        // imagenes es un array de objetos con {url, nombre, original}
        if (Array.isArray(imagenes) && imagenes.length > 0) {
            imagenes.forEach(function(imagen, index) {
                let url = imagen.url || imagen[0]; // Puede ser objeto o array
                let nombre = imagen.nombre || imagen.original || imagen[1] || 'Imagen ' + (index + 1);

                html += `
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <img src="${url}" class="card-img-top" alt="${nombre}" style="height: 300px; object-fit: cover; cursor: pointer;" onclick="window.open('${url}', '_blank')">
                            <div class="card-body p-2">
                                <small class="text-muted">${nombre}</small>
                            </div>
                        </div>
                    </div>
                `;
            });
        } else {
            html += '<div class="col-12"><p class="text-center text-muted">No hay imágenes disponibles</p></div>';
        }

        html += '</div>';

        var wrapper = document.createElement('div');
        wrapper.innerHTML = html;

        swal({
            title: 'Imágenes de Receta',
            content: wrapper,
            button: "Cerrar"
        });
    }

    function eliminar_medicamento_sdi_enf(id) {
        // Lógica para eliminar tratamiento
        console.log("Eliminar tratamiento con ID:", id);
        swal({
            title: "¿Está seguro de eliminar este tratamiento?",
            text: "Esta acción no se puede deshacer",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                eliminarTratamiento(id);
            }
        });
    }
        function eliminarTratamiento(id) {
            let url = "{{ route('detalle_receta.eliminar_registro_receta') }}";
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                success: function(response) {
                    console.log("Tratamiento eliminado:", response);
                    if(response.status === 'success') {
                        // Verificar si la tabla está inicializada como DataTable
                        let tabla = null;
                        let esDataTable = $.fn.DataTable.isDataTable('#tabla_med_adm_hosp');

                        if(esDataTable) {
                            tabla = $('#tabla_med_adm_hosp').DataTable();
                            tabla.destroy();
                        }

                        // Limpiar el tbody completamente
                        let tbody = $('#tabla_med_adm_hosp tbody');
                        tbody.empty();

                        // Iterar sobre los tratamientos recibidos y construir HTML
                        response.data.forEach(function(tratamiento) {
                            // Calcular el tiempo transcurrido si existe
                            let tiempoTranscurrido = '-';
                            if(tratamiento.estado_tratamiento == 1 && tratamiento.tiempo_transcurrido) {
                                tiempoTranscurrido = 'Hace: ' + tratamiento.tiempo_transcurrido;
                            }

                            // Determinar estado del botón administrar
                            let btn_disabled = (tratamiento.estado_tratamiento == 1) ? 'disabled' : '';
                            let btn_class = (tratamiento.estado_tratamiento == 1) ? 'btn-secondary' : 'btn-success';
                            let disabled = ES_ENFERMERA ? '' : 'disabled';

                            // Construir el HTML de la fila
                            let fila = `
                                <tr>
                                    <td class="text-center align-middle" style="display:none">${tratamiento.id}</td>
                                    <td class="text-center align-middle" style="display:none">${tratamiento.id_responsable || ''}</td>
                                    <td class="text-center align-middle" id="repeticiones_contador_externo-${tratamiento.id}">${tratamiento.contador_dosis || '-'}</td>
                                    <td class="text-center align-middle">
                                        ${tratamiento.nombre_medicamento || '-'}
                                        <br><small>${tratamiento.farmaco || ''}</small>
                                        <br><small>${tratamiento.nombre_dosis || ''}</small>
                                    </td>
                                    <td class="text-center align-middle">${tratamiento.nombre_frecuencia || '-'}</td>
                                    <td class="text-center align-middle">
                                        <span>${tiempoTranscurrido}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        ${(() => {
                                            // Procesamiento de imágenes
                                            let imagenes = [];
                                            if (tratamiento.otros) {
                                                try {
                                                    imagenes = JSON.parse(tratamiento.otros);
                                                } catch(e) {
                                                    imagenes = [];
                                                }
                                            }
                                            if (Array.isArray(imagenes) && imagenes.length > 0) {
                                                return `<button class="btn btn-info btn-sm btn-icon" onclick="ver_imagenes_tratamiento_interno(${tratamiento.id}, ${JSON.stringify(imagenes).replace(/"/g, '&quot;')})" title="Ver imágenes de receta">
                                                    <i class="feather icon-image"></i> ${imagenes.length}
                                                </button>`;
                                            }
                                            return '-';
                                        })()}
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <button class="btn btn-sm btn-icon ${btn_class}" id="btn_administrar_${tratamiento.id}" onclick="administrar_medicamento(${tratamiento.id})" ${disabled} ${btn_disabled}>
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="registro_alternativo_paciente_enf${tratamiento.id}" onchange="cambiarTextoLabelTratamiento(${tratamiento.id})" ${tratamiento.estado_tratamiento == 1 ? 'checked' : ''} disabled>
                                            <label for="registro_alternativo_paciente_enf${tratamiento.id}" class="cr"></label>
                                        </div>
                                        <label id="label_tratamiento_enf_${tratamiento.id}">${tratamiento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="tratamiento_finalizado${tratamiento.id}" onchange="finalizar_tratamiento_enf_ext(${tratamiento.id})" ${tratamiento.estado_finalizado == 1 ? 'checked' : ''} ${disabled}>
                                            <label for="tratamiento_finalizado${tratamiento.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="agregarObservacionesTratamiento(${tratamiento.id},'${(tratamiento.nombre_medicamento || '-').replace(/'/g, "\\'")}')" ${disabled} title="Agregar observaciones">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_medicamento_sdi_enf(${tratamiento.id})" ${disabled} title="Eliminar tratamiento">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;

                            tbody.append(fila);
                        });

                        // Si hay datos, reinicializar el DataTable
                        if(response.data && response.data.length > 0) {
                            $('#tabla_med_adm_hosp').DataTable({
                                "language": {
                                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                },
                                "pageLength": 10,
                                "columnDefs": [
                                    {
                                        "targets": [0, 1],
                                        "visible": false
                                    }
                                ],
                                "autoWidth": false,
                                "responsive": false
                            });
                        }

                        // Mostrar mensaje de éxito
                        swal({
                            title: "Éxito",
                            text: response.message || "Tratamiento eliminado correctamente",
                            icon: "success",
                            button: "Aceptar",
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: response.message || "No se pudo eliminar el tratamiento",
                            icon: "error",
                            button: "Aceptar",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al eliminar tratamiento:", error);
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al eliminar el tratamiento",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            });
        }


    // Función para cambiar el texto del label del tratamiento
    function cambiarTextoLabelTratamiento(id){
        let url = "{{ route('enfermeria.cambiar_estado_tratamiento') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_tratamiento: id,
                observaciones: $('#observaciones_tratamiento_'+id).val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log(response);
                if(response.mensaje == 'OK' || response.status == 'success') {
                    // Actualizar estado
                    let estado = $('#registro_alternativo_paciente_enf' + id).is(':checked');
                    $('#label_tratamiento_enf_' + id).html(estado ? 'ADMINISTRADO' : 'PENDIENTE');

                    swal({
                        title: "Actualizado",
                        text: "Estado del tratamiento actualizado correctamente",
                        icon: "success",
                        timer: 1500,
                        buttons: false
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cambiar estado:", error);
            }
        });
    }

    // Función para agregar observaciones al tratamiento
    function agregarObservacionesTratamiento(id, nombreMedicamento, observaciones = '') {
        swal({
            title: "Agregar Observaciones",
            text: "Medicamento: " + nombreMedicamento,
            content: {
                element: "textarea",
                attributes: {
                    placeholder: "Escriba sus observaciones aquí...",
                    value: observaciones || '',
                    id: "swal-observaciones-input",
                    rows: 4,
                    style: "width:100%"
                }
            },
            buttons: {
                cancel: "Cancelar",
                confirm: {
                    text: "Guardar",
                    closeModal: false,
                }
            },
        }).then((confirm) => {
            if (confirm) {
                let observacion = document.getElementById("swal-observaciones-input").value;

                if (!observacion || observacion.trim() === '') {
                    swal("Error", "Debe ingresar una observación", "error");
                    return;
                }

                let url = "{{ route('enfermeria.actualizar_observacion_tratamiento') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id_detalle: id,
                        observacion: observacion,
                        enfermera: true, // Indicar que es enfermería para encriptar en el backend
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.estado == 1 || response.mensaje == 'OK') {
                            swal({
                                title: "Actualizado",
                                text: "La observación ha sido guardada correctamente",
                                icon: "success",
                                button: "Aceptar",
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: response.mensaje || "No se pudo guardar la observación",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    },
                    error: function(error) {
                        console.error("Error al guardar observación:", error);
                        swal({
                            title: "Error",
                            text: "Ocurrió un error al guardar la observación",
                            icon: "error",
                            button: "Aceptar",
                        });
                    }
                });
            }
        });
    }
     function finalizar_tratamiento_enf_ext(id_tratamiento) {
            let $checkbox = $('#tratamiento_finalizado' + id_tratamiento);
            let nuevoEstado = $checkbox.is(':checked');

            swal({
                title: nuevoEstado ? "¿Finalizar tratamiento?" : "¿Reactivar tratamiento?",
                text: nuevoEstado ? "El tratamiento quedará finalizado." : "El tratamiento volverá a estar activo.",
                icon: "warning",
                buttons: ["Cancelar", "Confirmar"],
                dangerMode: false,
            }).then((confirmar) => {
                if (confirmar) {
                    let url = "{{ route('enfermeria.finalizar_tratamiento') }}";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            id_tratamiento: id_tratamiento,
                            tipo:'externo',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.mensaje == 'OK') {
                                $checkbox.prop('checked', response.finalizado == 1);

                                let $btn = $('#btn_administrar_' + id_tratamiento);
                                if ($btn.length) {
                                    if (response.finalizado == 1) {
                                        $btn.prop('disabled', true).addClass('btn-secondary').removeClass('btn-success');
                                    } else {
                                        $btn.prop('disabled', false).addClass('btn-success').removeClass('btn-secondary');
                                    }
                                }

                                swal({
                                    title: "Éxito",
                                    text: response.finalizado == 1 ? "Tratamiento finalizado" : "Tratamiento reactivado",
                                    icon: "success",
                                    button: "Aceptar",
                                });
                            } else {
                                $checkbox.prop('checked', !nuevoEstado);
                                swal({
                                    title: "Error",
                                    text: response.msj || "No se pudo actualizar el tratamiento",
                                    icon: "error",
                                    button: "Aceptar",
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            $checkbox.prop('checked', !nuevoEstado);
                            swal({
                                title: "Error",
                                text: "Ocurrió un error al finalizar el tratamiento",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    });
                } else {
                    $checkbox.prop('checked', !nuevoEstado);
                }
            });
        }

        function guardar_curacion_quemados(){
            // Recopilar datos de valoración
            let datosValoracion = {
                qmsupqm: $('#qmsupqm').val(),
                obs_qmsupqm: $('#obs_qmsupqm').val(),
                qmdr: $('#qmdr').val(),
                obs_qmdr: $('#obs_qmdr').val(),
                qm_presinf: $('#qm_presinf').val(),
                obs_qm_presinf: $('#obs_qm_presinf').val(),
                qm_tq: $('#qm_tq').val(),
                obs_qm_tq: $('#obs_qm_tq').val(),
                qm_tc: $('#qm_tc').val(),
                obs_qm_tc: $('#obs_qm_tc').val(),
                pat_propq: $('#pat_propq').val(), // multiselect array
                med_quem: $('#med_quem').val(),   // multiselect array
                ot_pat_act: $('#ot_pat_act').val()
            };

            // Recopilar datos de curación
            let datosCuracion = {
                cp_cult: $('#cp_cult').val(),
                obs_cp_cult: $('#obs_cp_cult').val(),
                cp_td: $('#cp_td').val(),
                obs_cp_td: $('#obs_cp_td').val(),
                cp_duch: $('#cp_duch').val(),
                obs_cp_duch: $('#obs_cp_duch').val(),
                ants_qm: $('#ants_qm').val(),     // multiselect array
                ot_qx_ac: $('#ot_qx_ac').val(),
                tpo_aposqm: $('#tpo_aposqm').val(), // multiselect array
                ot_qx_apos: $('#ot_qx_apos').val()
            };

            // Observaciones generales
            let observaciones = $('#obs_gen_cur_qx').val();

            // Validación básica
            if (!datosValoracion.qmsupqm || datosValoracion.qmsupqm === '0') {
                swal({
                    title: 'Error',
                    text: 'Debe seleccionar la superficie quemada',
                    icon: 'error',
                    button: 'Aceptar'
                });
                return;
            }

            if (!datosValoracion.qmdr || datosValoracion.qmdr === '0') {
                swal({
                    title: 'Error',
                    text: 'Debe seleccionar el grado de quemadura',
                    icon: 'error',
                    button: 'Aceptar'
                });
                return;
            }

            // Preparar datos para envío
            let datos = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_paciente: $('#id_paciente').val(),
                id_ficha_atencion: $('#id_fc').val(),
                datos_valoracion: datosValoracion,
                datos_curacion: datosCuracion,
                observaciones: observaciones
            };

            console.log('Datos a enviar:', datos);

            // Envío AJAX
            $.ajax({
                url: "{{ route('enfermeria.guardar_curacion_quemados_servicio') }}",
                type: 'POST',
                data: datos,
                beforeSend: function() {
                    swal({
                        title: 'Guardando...',
                        text: 'Por favor espere',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: function() {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    console.log('Respuesta del servidor:', response);

                    if (response.mensaje === 'OK') {
                        swal({
                            title: 'Éxito',
                            text: response.msj,
                            icon: 'success',
                            button: 'Aceptar'
                        }).then((result) => {
                            // Limpiar formulario
                            limpiarFormularioQuemados();
                            // Recargar datos si es necesario
                            // cargar_curaciones_quemados();
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: response.msj || 'Error al guardar la curación',
                            icon: 'error',
                            button: 'Aceptar'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error AJAX:', xhr.responseText);
                    let mensajeError = 'Error al guardar la curación';

                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensajeError = xhr.responseJSON.msj;
                    } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errores) {
                        mensajeError = 'Errores de validación: ' + Object.values(xhr.responseJSON.errores).join(', ');
                    }

                    swal({
                        title: 'Error',
                        text: mensajeError,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            });
        }

        // Función para limpiar el formulario
        function limpiarFormularioQuemados() {
            // Limpiar selects
            $('#qmsupqm, #qmdr, #qm_presinf, #qm_tq, #qm_tc, #cp_cult, #cp_td, #cp_duch').val('0');

            // Limpiar textareas
            $('#obs_qmsupqm, #obs_qmdr, #obs_qm_presinf, #obs_qm_tq, #obs_qm_tc').val('');
            $('#obs_cp_cult, #obs_cp_td, #obs_cp_duch, #ot_qx_ac, #ot_qx_apos, #obs_gen_cur_qx, #ot_pat_act').val('');

            // Limpiar multiselects
            $('#pat_propq, #med_quem, #ants_qm, #tpo_aposqm').val(null).trigger('change');

            // Ocultar campos de observaciones
            $('#div_qmsupqm, #div_qmdr, #div_qm_presinf, #div_qm_tq, #div_qm_tc').hide();
            $('#div_cp_cult, #div_cp_td, #div_cp_duch').hide();
        }

        // Funciones para manejar la tabla de curaciones planas
        function verDetallesCuracionPlana(id) {
            $.ajax({
                url: '/curacion_plana_detalle/' + id,
                method: 'GET',
                success: function(response) {
                    if (response.curacion) {
                        let detalles = '<div class="row">';
                        detalles += '<div class="col-md-6">';
                        detalles += '<h6 class="text-primary">Datos de Valoración:</h6>';

                        if (response.curacion.datos_valoracion_plana) {
                            detalles += '<p><strong>Aspecto:</strong> ' + getTextoOpcion('aspecto', response.curacion.datos_valoracion_plana.cp_asp) + '</p>';
                            detalles += '<p><strong>Mayor Extensión:</strong> ' + getTextoOpcion('extension', response.curacion.datos_valoracion_plana.cp_me) + '</p>';
                            detalles += '<p><strong>Profundidad:</strong> ' + getTextoOpcion('profundidad', response.curacion.datos_valoracion_plana.cp_pro) + '</p>';
                            detalles += '<p><strong>Exudado Cantidad:</strong> ' + getTextoOpcion('exudado_cantidad', response.curacion.datos_valoracion_plana.cp_ecant) + '</p>';
                            detalles += '<p><strong>Exudado Calidad:</strong> ' + getTextoOpcion('exudado_calidad', response.curacion.datos_valoracion_plana.cp_ecal) + '</p>';
                            detalles += '<p><strong>Tejido Necrótico:</strong> ' + getTextoOpcion('tejido_necrotico', response.curacion.datos_valoracion_plana.cp_tn) + '</p>';
                            detalles += '<p><strong>Tejido Granulatorio:</strong> ' + getTextoOpcion('tejido_granulatorio', response.curacion.datos_valoracion_plana.cp_tg) + '</p>';
                            detalles += '<p><strong>Edema:</strong> ' + getTextoOpcion('edema', response.curacion.datos_valoracion_plana.cp_ed) + '</p>';
                            detalles += '<p><strong>Dolor:</strong> ' + getTextoOpcion('dolor', response.curacion.datos_valoracion_plana.cp_dol) + '</p>';
                            detalles += '<p><strong>Piel Circundante:</strong> ' + getTextoOpcion('piel_circundante', response.curacion.datos_valoracion_plana.cp_pielc) + '</p>';
                            detalles += '<p><strong>Puntos Total:</strong> ' + (response.curacion.datos_valoracion_plana.ptos_tot_ev || 'N/A') + '</p>';
                            detalles += '<p><strong>Valoración:</strong> ' + (response.curacion.datos_valoracion_plana.tpo_les_curgen || 'N/A') + '</p>';
                        }

                        detalles += '</div><div class="col-md-6">';
                        detalles += '<h6 class="text-primary">Datos de Curación:</h6>';

                        if (response.curacion.datos_curacion_plana) {
                            detalles += '<p><strong>Detalles de curación:</strong> ' + (response.curacion.datos_curacion_plana.detalles || 'N/A') + '</p>';
                        }

                        if (response.curacion.observaciones) {
                            detalles += '<h6 class="text-primary">Observaciones:</h6>';
                            detalles += '<p>' + response.curacion.observaciones + '</p>';
                        }

                        detalles += '</div></div>';

                        swal({
                            title: 'Detalles de la Curación - ' + response.curacion.fecha,
                            html: detalles,
                            width: '800px',
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText: 'Cerrar'
                        });
                    }
                },
                error: function() {
                    swal('Error', 'No se pudieron cargar los detalles', 'error');
                }
            });
        }

        function editarCuracionPlana(id) {
            swal({
                title: 'Editar Curación',
                text: 'Esta función está en desarrollo. Por ahora puede crear una nueva curación.',
                icon: 'info',
                confirmButtonText: 'Entendido'
            });
        }

        function eliminarCuracionPlana(id) {
            swal({
                title: '¿Está seguro?',
                text: 'Esta acción eliminará permanentemente la curación',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/eliminar_curacion_plana/' + id,
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            if (response.mensaje === 'OK') {
                                swal('Eliminado', 'La curación ha sido eliminada', 'success');
                                location.reload(); // Recargar para actualizar tabla
                            } else {
                                swal('Error', response.msj || 'No se pudo eliminar', 'error');
                            }
                        },
                        error: function() {
                            swal('Error', 'Error al eliminar la curación', 'error');
                        }
                    });
                }
            });
        }

        function getTextoOpcion(campo, valor) {
            const opciones = {
                aspecto: { '1': 'Eritematoso', '2': 'Enrojecido', '3': 'Amarillo pálido', '4': 'Necrótico', '6': 'Observaciones' },
                extension: { '1': '0-1 cm', '2': '1-3 cm', '3': '3-6 cm', '4': '>6 cm', '5': 'Observaciones' },
                profundidad: { '1': '0', '2': '0-1 cm', '3': '1-2 cm', '4': '2-3 cm', '5': '>3 cm', '6': 'Otros' },
                exudado_cantidad: { '1': 'Ausente', '2': 'Escaso', '3': 'Moderado', '4': 'Abundante', '6': 'Observaciones' },
                exudado_calidad: { '1': 'Sin exudado', '2': 'Seroso', '3': 'Turbio', '4': 'Purulento', '6': 'Observaciones' },
                tejido_necrotico: { '1': 'Ausente', '2': '25%', '3': '25-50%', '4': '>50-75%', '5': '>75%', '6': 'Observaciones' },
                tejido_granulatorio: { '1': '100-75%', '2': '<75-50%', '3': '<50-25%', '4': '<25%', '6': 'Observaciones' },
                edema: { '1': 'Ausente', '2': '+', '3': '++', '4': '+++', '6': 'Observaciones' },
                dolor: { '1': '0-1', '2': '2-3', '3': '4-6', '4': '7-10', '6': 'Observaciones' },
                piel_circundante: { '1': 'Sana', '2': 'Descamada', '3': 'Eritematosa', '4': 'Macerada', '6': 'Observaciones' }
            };

            return opciones[campo] && opciones[campo][valor] ? opciones[campo][valor] : 'N/A';
        }
</script>

