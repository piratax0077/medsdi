  <style>



  </style>
  <!--EXAMEN MÉDICO  - DETALLES-->

  @include('general.secciones_ficha.hospitalizados.hospitalizacion_enfermeria')




  <div class="row">

      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

          <div class="card-a">
              <div class="card-header-a" id="evol_med_hosp">
                  <button
                      class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open @if ($enfermera) collapsed @endif"
                      type="button" data-toggle="collapse" data-target="#evol_med_hosp_c"
                      aria-expanded="@if ($enfermera) false @else true @endif"
                      aria-controls="evol_med_hosp_c">
                      Atención Médica Hospitalización
                  </button>
              </div>
              <div id="evol_med_hosp_c" class="collapse @if (!$enfermera) show @endif"
                  aria-labelledby="evol_med_hosp" data-parent="#evol_med_hosp">
                  <div class="card-body-aten-a">
                      <div id="form-orl-adulto">
                          <div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                  <ul class="nav nav-tabs-aten nav-fill mb-3" id="evol_med_hosp" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link-aten text-reset" id="ex_ingreso_hosp_tab" data-toggle="tab"
                                              href="#ex_ingreso_hosp" role="tab" aria-controls="ex_ingreso_hosp"
                                              aria-selected="true">Examen Ingreso</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link-aten text-reset active" id="evolucion_hosp_tab" data-toggle="tab"
                                              href="#evolucion_hosp" role="tab" aria-controls="evolucion_hosp"
                                              aria-selected="true">Evolución diaria</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link-aten text-reset" id="procedimiento_div_tab" data-toggle="tab"
                                              href="#procedimiento_div" role="tab" aria-controls="procedimiento_div"
                                              aria-selected="true">Procedimientos y curaciones</a>
                                      </li>
                                      {{-- <li class="nav-item">
                                          <a class="nav-link-aten text-reset" id="sol_examenes_urg-tab"
                                              data-toggle="tab" href="#sol_examenes_urg" role="tab"
                                              aria-controls="sol_examenes_urg" aria-selected="true">Sol. Exámenes</a>
                                      </li> --}}
                                      <li class="nav-item">
                                          <a class="nav-link-aten text-reset" id="urg_dest_ind-tab" data-toggle="tab"
                                              href="#urg_dest_ind" role="tab" aria-controls="urg_dest_ind"
                                              aria-selected="true">Destino-Traslados</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                  <div class="tab-content" id="evol_med_hosp">
                                      <!--INGRESO-->
                                      <div class="tab-pane fade show" id="ex_ingreso_hosp" role="tabpanel"
                                          aria-labelledby="ex_ingreso_hosp_tab">
                                          <div class="form-row">
                                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                  <h6 class="t-aten">Examen ingreso</h6>
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-6">
                                                  <label class="floating-label-activo-sm" for="motivo">Motivo de
                                                      Ingreso</label>
                                                  <input type="text" class="form-control form-control-sm"
                                                      name="motivo" id="motivo">
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label class="floating-label-activo-sm"
                                                      for="antecedentes">Aproximación Gravedad</label>
                                                  <input type="text" class="form-control form-control-sm"
                                                      name="antecedentes" id="antecedentes">
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                  <label class="floating-label-activo-sm" for="examen_fisico">Examen
                                                      Físico </label>
                                                  <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                      name="examen_fisico" id="examen_fisico" placeholder="EXAMEN FÍSICO Y PRUEBAS DIAGNÓSTICAS"></textarea>
                                              </div>
                                          </div>


                                          <div class="form-row">
                                              <!--Formulario / Diagnóstico-->

                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                                                            <label
                                                                class="floating-label-activo-sm">Hipótesis
                                                                Diagnóstica</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm"
                                                                name="descripcion_hipotesis"
                                                                id="descripcion_hipotesis"
                                                                value="{{ $fichaAtencion->hipotesis_diagnostico }}" data-input_igual="ingreso_sol_pab_modal_diagnostico_preoperatorio" onblur="cargarIgual('descripcion_hipotesis')">
                                                        @else
                                                            <label
                                                                class="floating-label-activo-sm">Hipótesis
                                                                Diagnóstica</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm"
                                                                name="descripcion_hipotesis"
                                                                id="descripcion_hipotesis"
                                                                value="{!! old('descripcion_hipotesis') !!}">
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10 != null)
                                                            <label
                                                                class="floating-label-activo-sm">Diagnóstico
                                                                CIE-10</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm"
                                                                name="descripcion_cie"
                                                                id="descripcion_cie"
                                                                value="{{ $fichaAtencion->diagnostico_ce10 }}">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm"
                                                                name="id_descripcion_cie"
                                                                id="id_descripcion_cie"
                                                                value="{{ $fichaAtencion->diagnostico_ce10 }}">
                                                        @else
                                                            <label
                                                                class="floating-label-activo-sm">Diagnóstico
                                                                CIE-10</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm"
                                                                name="descripcion_cie"
                                                                id="descripcion_cie"
                                                                value="{!! old('descripcion_cie') !!}">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm"
                                                                name="id_descripcion_cie"
                                                                id="id_descripcion_cie"
                                                                value="{!! old('id_descripcion_cie') !!}">
                                                        @endif
                                                    </div>

                                              <!--Cierre: Formulario / Diagnóstico-->
                                          </div>

                                          <div class="form-row">
                                              <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                  <label class="floating-label-activo-sm"
                                                      for="otras_indicaciones">Otras Indicaciones</label>
                                                  <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                      name="otras_indicaciones" id="otras_indicaciones"
                                                      placeholder="SOLO INDICACIONES GENERALES LAS RECETAS EXAMENES CURACIONES USE LAS PESTAÑAS SIGUIENTES "></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <!--EVOLUCION DIARIA-->
                                      <div class="tab-pane fade show active" id="evolucion_hosp" role="tabpanel" aria-labelledby="evolucion_hosp_tab">

                                          @if (!$enfermera)
                                              <div class="form-row">
                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                      <h6 class="t-aten">Evolución diaria</h6>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                      <button type="button"
                                                          class="btn btn-primary btn-sm float-right mb-2"
                                                          onclick="mostrar_nueva_evolucion_hosp();"><i
                                                              class="feather icon-plus"></i> Nueva Evolución</button>
                                                  </div>
                                              </div>
                                              <div id="contenedor_nueva_evolucion_prof">
                                                  <p class="pt-3 d-inline mb-3">
                                                      @php
                                                          //imprimir la fecha y la hora actual
                                                          $fecha = \Carbon\Carbon::parse(now());
                                                          $fecha = $fecha->format('d-m-Y H:i');
                                                          echo $fecha .
                                                              ' Responsable: <strong> ' .
                                                              \Auth::user()->name .
                                                              '</strong>';
                                                      @endphp
                                                  </p>
                                                  <div class="form-row mt-4">
                                                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                          <div class="form-group">
                                                              <label class="floating-label-activo-sm"
                                                                  for="nueva_evolucion_hosp">Nueva Evolución
                                                                  Médica</label>
                                                              <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                  name="nueva_evolucion_hosp" id="nueva_evolucion_hosp"></textarea>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-12">
                                                          <button type="button"
                                                              class="btn btn-info btn-sm float-right mb-2"
                                                              onclick="guardar_nueva_evolucion_hosp();"><i
                                                                  class="feather icon-save"></i> Guardar Evolución</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endif
                                          <div class="form-row mt-4">
                                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                  <div id="contenedor"></div>
                                                  <div class="table-responsive">
                                                      <table id="tabla_evol_hosp"
                                                          class="table mt-3 table-bordered table-xs tabla_evol_hosp w-100">
                                                          <thead>
                                                              <tr>
                                                                  <th class="align-middle" style="display:none">id
                                                                  </th>
                                                                  <th class="align-middle" style="display:none">
                                                                      id_resp</th>
                                                                  <th class="align-middle">Evolución</th>
                                                                  <th class="align-middle">Responsable</th>
                                                                  <th class="align-middle">Fecha</th>
                                                                  <th class="align-middle">Acciones</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach ($evoluciones as $evol)
                                                                  <tr>
                                                                      <td class="align-middle" style="display:none">
                                                                          {{ $evol->id }}</td>
                                                                      <td class="align-middle" style="display:none">
                                                                          {{ $evol->id_responsable }}</td>
                                                                      <td class="align-middle">{{ $evol->evolucion }}
                                                                      </td>
                                                                      <td class="align-middle">{{ $evol->responsable }}
                                                                      </td>
                                                                      <td class="align-middle">
                                                                          {{ \Carbon\Carbon::parse($evol->created_at)->format('d-m-Y H:i') }}
                                                                      </td>
                                                                      <td class="align-middle">

                                                                          <button type="button"
                                                                              class="btn btn-warning-light-c btn-icon"
                                                                              @if ($enfermera) disabled @endif
                                                                              onclick="editar_evolucion_hosp({{ $evol->id }})"><i
                                                                                  class="feather icon-edit"></i> </button>
                                                                          <button type="button"
                                                                              class="btn btn-danger-light-c btn-icon "
                                                                              @if ($enfermera) disabled @endif
                                                                              onclick="eliminar_evolucion_hosp({{ $evol->id }});"><i
                                                                                  class="feather icon-x"></i></button>

                                                                      </td>
                                                                  </tr>
                                                              @endforeach
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!--PROCEDIMIENTOS Y CURACIONES-->
                                      <div class="tab-pane fade show" id="procedimiento_div" role="tabpanel" aria-labelledby="procedimiento_div_tab">
                                        <div class="form-row">
                                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                  <h6 class="t-aten">Procedimientos y curaciones</h6>
                                              </div>
                                          </div>
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
                                                                <!--<option value="otra">otra </option>-->
                                                                <option value="Otra Indicación">Otra Indicación
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_med"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_med">Otra indicación</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_med" id="obs_ind_med" placeholder="DESCRIBA"></textarea>
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
                                                                for="obs_ind_cur">Otra indicación</label>
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
                                                               <!-- <option value="6">otra</option>-->
                                                                <option value="9">Otra </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_proc"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_proc">Otra</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_proc" id="obs_ind_proc" placeholder="DESCRIBA"></textarea>
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
                                                                <option value="yeso bota larga">Yeso bota larga
                                                                </option>
                                                                <option value="yeso bota corta">Yeso bota corta
                                                                </option>
                                                                <option value="9">Otra Inmovilización</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_inmmed"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_ind_inmmed">Otra Inmovilización</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_inmmed" id="obs_ind_inmmed" placeholder="DESCRIBA"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm" for="ind_cv_inmmed_urg" >Control de ciclo</label>
                                                            <select name="ind_cv_inmmed_urg" id="ind_cv_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_cv_inmmed_urg','div_ind_cv_inmmed_urg','obs_ind_cv_inmmed_urg',6);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Cada media hora">CC/Cada media hora</option>
                                                                <option value="Cada hora">CC/Cada hora</option>
                                                                <option value="Cada dos horas">CC/Cada dos horas</option>
                                                                <option value="Cada 4 horas">CC/Cada 4 horas</option>
                                                                <option value="Suspender">Suspender</option>
                                                                <option value="6">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_cv_inmmed_urg" style="display:none;">
                                                            <label class="floating-label-activo-sm" for="obs_ind_cv_inmmed_urg">Otro</label>
                                                            <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_cv_inmmed_urg" id="obs_ind_cv_inmmed_urg" placeholder="DESCRIBA"></textarea>
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
                                                                <option value="etc">Etc</option>
                                                                <option value="Valva de yeso braquiopalmar">Valva de
                                                                    yeso braquiopalmar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_ind_pp"
                                                            style="display:none;">
                                                            <label class="floating-label-activo-sm"
                                                                for="obs_b_com">Otro</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                name="obs_ind_pp" id="obs_ind_pp" placeholder="DESCRIBA"></textarea>
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
                                                                Indicaciones</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                name="obs_ind_med_servicio" id="obs_ind_med_servicio" onkeydown="mostrarObservaciones()" placeholder="INDIQUE NOMBRE DE PROCEDIMIENTO Y DESCRIPCIÓN"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm"
                                                                for="tipo_soluc_parent_ind">Tipos de soluciones parenterales</label>
                                                            <select name="tipo_soluc_parent_ind" id="tipo_soluc_parent_ind"
                                                                class="form-control form-control-sm"
                                                                onchange="evaluar_para_carga_detalle('tipo_soluc_parent_ind','div_tipo_soluc_parent_ind','obs_tipo_soluc_parent_ind',9);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Suero fisiologico">Suero fisiologico</option>
                                                                <option value="Suero glucosado">Suero glucosado</option>
                                                                <option value="Sangre">Sangre</option>
                                                                <option value="Hemoderivados">Hemoderivados</option>
                                                                <option value="Alimentos">Alimentos</option>
                                                            </select>
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
                                                        <button type="button" class="btn btn-info  float-right" onclick="indicar_procedimiento_sdi()" @if($enfermera) disabled @endif><i class="feather icon-save"></i> Guardar</button>
                                                    </div>
                                                    {{-- PROCEDIMIENTOS --}}
                                                    <!--Tabla-->
                                                    <div class="col-sm-12 mt-2">
                                                        <div class="table-responsive">
                                                            <table id="tabla_procedimientos_servicio"
                                                                class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="hidden"
                                                                            hidden="hidden">id_procedimiento</td>
                                                                        <th>
                                                                            Procedimiento</td>
                                                                        <th>
                                                                            Alertas e incidencias</td>
                                                                        <th>Acciónes
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(isset($procedimientos) && count($procedimientos) > 0)
                                                                    @foreach ($procedimientos as $p)
                                                                        <tr >
                                                                            <td class="text-wrap hidden"
                                                                                hidden="hidden">
                                                                                {{ $p->id_procedimiento }}</td>
                                                                            <td
                                                                                class="text-wrap">
                                                                                {{ $p->datos_procedimiento->nombre_procedimiento }} @if($p->estado == 0) <span class="badge badge-warning">Suspendido</span> @endif
                                                                            </td>
                                                                            <td
                                                                                class="text-wrap">
                                                                                <input type="text" id="ind_vig_sig{{ $p->id }}" name="ind_vig_sig{{ $p->id }}" class="form-control form-control-sm">
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-xxs"
                                                                                    onclick="eliminar_procedimiento_sdi({{ $p->id }})" @if($enfermera) disabled @endif><i
                                                                                        class="feather icon-x"></i> Eliminar</button>
                                                                                        @if($p->estado == 0)
                                                                                        <button type="button"
                                                                                        class="btn btn-success btn-xxs"
                                                                                        onclick="suspender_procedimiento_sdi({{ $p->id }})" @if($enfermera) disabled @endif><i class="fas fa-ban"></i> Reponer</button>
                                                                                        @else
                                                                                        <button type="button"
                                                                                        class="btn btn-warning btn-xxs"
                                                                                        onclick="suspender_procedimiento_sdi({{ $p->id }})" @if($enfermera) disabled @endif><i class="fas fa-ban"></i> Suspender</button>
                                                                                        @endif
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
                                      <!--INDICACIONES Y DESTINO-->
                                      <div class="tab-pane fade show" id="urg_dest_ind" role="tabpanel"
                                          aria-labelledby="urg_dest_ind-tab">
                                          <div class="form-row">
                                              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                  <h6 class="t-aten">Indicaciones traslado / alta </h6>
                                              </div>
                                          </div>
                                          <form>
                                              <div class="form-row">
                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                      <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                          id="ev-nutricional" role="tablist">
                                                          <li class="nav-item">
                                                              <a class="nav-link-aten text-reset"
                                                                  id="info_hospitalizacion-tab" data-toggle="tab"
                                                                  href="#info_hospitalizacion" role="tab"
                                                                  aria-controls="info_hospitalizacion"
                                                                  aria-selected="true">Info. Hospitalización</a>
                                                          </li>
                                                          <li class="nav-item">
                                                              <a class="nav-link-aten text-reset active"
                                                                  id="info-ingreso-hosp-tab" data-toggle="tab"
                                                                  href="#info-ingreso-hosp" role="tab"
                                                                  aria-controls="info-ingreso-hosp"
                                                                  aria-selected="true">Info. Ingreso</a>
                                                          </li>
                                                          <li class="nav-item">
                                                              <a class="nav-link-aten text-reset"
                                                                  id="indicaciones-hosp-tab" data-toggle="tab"
                                                                  href="#indicaciones-hosp" role="tab"
                                                                  aria-controls="indicaciones-hosp"
                                                                  aria-selected="false"
                                                                  onclick="dame_examenes_hosp()">Indicaciones
                                                                  ingreso</a>
                                                          </li>
                                                          {{--  <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="archivos-hosp-pab-tab" data-toggle="tab"
                                                                    href="#archivos-hosp-pab" role="tab" aria-controls="archivos-hosp-pab"
                                                                    aria-selected="false">Archivos</a>
                                                            </li>  --}}
                                                      </ul>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                      <div class="tab-content" id="info-ingreso">
                                                          <!--INFO HOSPITALIZACIÓN-->
                                                          <div class="tab-pane fade show"
                                                              id="info_hospitalizacion" role="tabpanel"
                                                              aria-labelledby="info_hospitalizacion-tab">
                                                              
                                                              <div class="form-row">
                                                                  <div
                                                                      class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                       <div class="card-informacion">
                                                                        <div class="card-header-lineal">
                                                                            <h5 class="text-dark mb-0">Detalle de la hospitalización</h5>
                                                                        </div>
                                                                          <div class="card-body">
                                                                              <div class="form-row">
                                                                                  <div
                                                                                      class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Hospitalizar
                                                                                              en:</label>
                                                                                          <select name="hospen"
                                                                                              id="hospen"
                                                                                              data-titulo="Hospitalización"
                                                                                              class="form-control form-control-sm"
                                                                                              onchange="evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);">
                                                                                              <option
                                                                                                  value="1"
                                                                                                  selected>Clínica
                                                                                              </option>
                                                                                              <option
                                                                                                  value="2">
                                                                                                  Hospital</option>
                                                                                              <option
                                                                                                  value="3">
                                                                                                  Otro (Describir)
                                                                                              </option>
                                                                                          </select>
                                                                                      </div>
                                                                                      <div class="form-group"
                                                                                          id="div_detalle_hospen"
                                                                                          style="display:none">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Otro
                                                                                              lugar
                                                                                              (Describir)</label>
                                                                                          <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                              name="obs_hospen" id="obs_hospen"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Nombre
                                                                                              de la
                                                                                              Institución</label>
                                                                                          <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                                                              onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Servicio</label>
                                                                                          <select
                                                                                              name="hosp_enserv"
                                                                                              id="hosp_enserv"
                                                                                              data-titulo="Es Urgencia Qx.?"
                                                                                              class="form-control form-control-sm"
                                                                                              onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                                                                              <option
                                                                                                  value="1"
                                                                                                  selected>Servicio
                                                                                                  Urgencia</option>
                                                                                              <option
                                                                                                  value="2">
                                                                                                  Sala</option>
                                                                                              <option
                                                                                                  value="3">
                                                                                                  UTI</option>
                                                                                              <option
                                                                                                  value="4">
                                                                                                  Otro</option>
                                                                                          </select>
                                                                                      </div>
                                                                                      <div class="form-group"
                                                                                          id="div_detalle_hosp_enserv"
                                                                                          style="display:none">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Otro
                                                                                              Servicio
                                                                                              (Describir)</label>
                                                                                          <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3"
                                                                                              onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Motivo</label>
                                                                                          <select
                                                                                              name="motivo_hosp"
                                                                                              id="motivo_hosp"
                                                                                              data-titulo="Otro Tratamiento"
                                                                                              data-input_igual="motivo_hosp_indicaciones"
                                                                                              class="form-control form-control-sm"
                                                                                              onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);"
                                                                                              onblur="cargarIgualSelect('motivo_hosp')">
                                                                                              <option
                                                                                                  value="0">
                                                                                                  Seleccione
                                                                                              </option>
                                                                                              <option
                                                                                                  value="1">
                                                                                                  Cirugía</option>
                                                                                              <option
                                                                                                  value="2">
                                                                                                  Tratamiento Médico
                                                                                              </option>
                                                                                              <option
                                                                                                  value="3">
                                                                                                  Estudio Clínico
                                                                                              </option>
                                                                                              <option
                                                                                                  value="4">
                                                                                                  Observación
                                                                                              </option>
                                                                                              <option
                                                                                                  value="5">
                                                                                                  Otro</option>
                                                                                          </select>
                                                                                      </div>
                                                                                      <div class="form-group"
                                                                                          id="div_motivo_hosp"
                                                                                          style="display:none">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Otro
                                                                                              tratamiento
                                                                                              (Describir)</label>
                                                                                          <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"
                                                                                              onfocus="this.rows=3" onblur="this.rows=1;" data-input_igual="motivo_hosp_indicaciones"
                                                                                              name="obs_motivo_hosp" id="obs_motivo_hosp" onchange="cargarIgual('obs_motivo_hosp')"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div
                                                                                      class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Obs.
                                                                                              a la
                                                                                              Hospitalización</label>
                                                                                          <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                                                              onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <!--INFO. INGRESO-->
                                                          <div class="tab-pane fade show active"
                                                              id="info-ingreso-hosp" role="tabpanel"
                                                              aria-labelledby="info-ingreso-hosp-tab">
                                                              <div class="form-row">
                                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card-informacion">
                                                                        <div class="card-header-lineal">
                                                                            <h5 class="text-dark mb-0">Información del paciente</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-row">
                                                                                <!--NOMBRE-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-user text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Paciente
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                            {{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                 <!--EDAD-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue  d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-calendar text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Edad
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                           {{ \Carbon\Carbon::createFromDate($paciente->fecha_nac)->age }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <!--PREVISIÓN-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-file-plus text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Previsión
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                            {{ $paciente->Prevision->first()->nombre }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <!--TELÉFONO 1-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-phone text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Teléfono
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                            {{ $paciente->telefono_uno }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <!--EMAIL-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-mail text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Email
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                            {{ $paciente->email }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <!--ENF. CRÓNICAS-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 col-lg-3 col-xl-4 col-xxl-3 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-danger d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-heart text-danger" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-danger d-block font-weight-bold">
                                                                                            Enfermedades Crónicas
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold">
                                                                                            @php
                                                                                              $patalogias_cronicas =
                                                                                                  '';
                                                                                          @endphp
                                                                                          @foreach ($patoligias_cronicas as $patologia_cronica)
                                                                                              @php
                                                                                                  $temp = json_decode(
                                                                                                      $patologia_cronica->data,
                                                                                                  );
                                                                                                  echo $temp->nombre;
                                                                                                  $patalogias_cronicas .=
                                                                                                      $temp->nombre;
                                                                                              @endphp
                                                                                              @if ($patologia_cronica->comentario)
                                                                                                  ,{{ $patologia_cronica->comentario }}
                                                                                                  @php
                                                                                                      $patalogias_cronicas .=
                                                                                                          ', ' .
                                                                                                          $patologia_cronica->comentario;
                                                                                                  @endphp
                                                                                              @endif
                                                                                              ;
                                                                                              @php
                                                                                                  $patalogias_cronicas .=
                                                                                                      ';';
                                                                                              @endphp
                                                                                          @endforeach
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>

                                                                                 <div
                                                                                      class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-6 my-2">
                                                                                      <label
                                                                                          class="floating-label-activo-sm">Otros
                                                                                          antecedentes
                                                                                          médicos</label>
                                                                                      <input type="text"
                                                                                          class="form-control form-control-sm"
                                                                                          name="ingreso_sol_pab_modal_otros_antecedentes"
                                                                                          id="ingreso_sol_pab_modal_otros_antecedentes"
                                                                                          value="">
                                                                                      <input type="hidden"
                                                                                          name="ingreso_sol_pab_modal_patalogias_cronicas"
                                                                                          id="ingreso_sol_pab_modal_patalogias_cronicas"
                                                                                          value="{{ $patalogias_cronicas }}">
                                                                                  </div>
                                                                        
           
                                                                                  <!--<div
                                                                                      class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-4 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0"><strong>Nombre:
                                                                                          </strong></label>
                                                                                      <label
                                                                                          class="ml-0">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-2 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0"><strong>Edad:
                                                                                          </strong></label>
                                                                                      <label
                                                                                          class="ml-0">{{ \Carbon\Carbon::createFromDate($paciente->fecha_nac)->age }}</label>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0"><strong>Previsión:
                                                                                          </strong></label>
                                                                                      <label
                                                                                          class="ml-0">{{ $paciente->Prevision->first()->nombre }}</label>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-2 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0"><strong>Teléfono:
                                                                                          </strong></label>
                                                                                      <label
                                                                                          class="ml-0"></label>
                                                                                  </div>-->
                                                                                  {{--<div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0"><strong>Email:
                                                                                          </strong></label>
                                                                                      <label
                                                                                          class="ml-0">{{ $paciente->email }}</label>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-0">
                                                                                      <label
                                                                                          class="font-weight-bold ml-0 text-danger">Enfermedades
                                                                                          Crónicas:</label>
                                                                                      <label class="ml-0">
                                                                                          @php
                                                                                              $patalogias_cronicas =
                                                                                                  '';
                                                                                          @endphp
                                                                                          @foreach ($patoligias_cronicas as $patologia_cronica)
                                                                                              @php
                                                                                                  $temp = json_decode(
                                                                                                      $patologia_cronica->data,
                                                                                                  );
                                                                                                  echo $temp->nombre;
                                                                                                  $patalogias_cronicas .=
                                                                                                      $temp->nombre;
                                                                                              @endphp
                                                                                              @if ($patologia_cronica->comentario)
                                                                                                  ,{{ $patologia_cronica->comentario }}
                                                                                                  @php
                                                                                                      $patalogias_cronicas .=
                                                                                                          ', ' .
                                                                                                          $patologia_cronica->comentario;
                                                                                                  @endphp
                                                                                              @endif
                                                                                              ;
                                                                                              @php
                                                                                                  $patalogias_cronicas .=
                                                                                                      ';';
                                                                                              @endphp
                                                                                          @endforeach
                                                                                      </label>
                                                                                  </div>--}}
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>

                                                              <div class="form-row mt-3">
                                                                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                      <div class="card-informacion">
                                                                        <div class="card-header-lineal">
                                                                            <h5 class="text-dark mb-0">Profesional tratante</h5>
                                                                        </div>
                                                                          <div class="card-body">
                                                                              <div class="form-row mb-3">
                                                                                 <!--PROFESIONAL-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-user text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Profesional
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold text-capitalize">
                                                                                            {{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                 <!--ESPECIALIDAD-->
                                                                                <div class="d-flex align-items-center col-sm-12 col-md-6 my-2">
                                                                                    <!-- Icono -->
                                                                                    <div class="mr-3">
                                                                                        <div class="rounded-circle bg-light-blue d-flex align-items-center justify-content-center"
                                                                                             style="width:50px;height:50px;">
                                                                                            <i class="feather icon-plus-circle text-primary" style="font-size:24px;"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Datos -->
                                                                                    <div>
                                                                                        <small class="text-muted d-block font-weight-bold">
                                                                                            Especialidad
                                                                                        </small>
                                                                                        <h6 class="mb-0 font-weight-bold text-capitalize">
                                                                                            @if ($profesional->SubTipoEspecialidad()->first())
                                                                                              {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
                                                                                          @else
                                                                                              {{ $profesional->TipoEspecialidad()->first()->nombre }}
                                                                                          @endif
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                              </div>
                                                                              <div class="form-row">
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                                      <label
                                                                                          class="floating-label-activo-sm">Clínica
                                                                                          - Hospital</label>
                                                                                      <input type="text"
                                                                                          class="form-control form-control-sm"
                                                                                          id="hosp_en"
                                                                                          name="hosp_en"
                                                                                          value="{{ $lugar_atencion->nombre }}">
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                                      <label
                                                                                          class="floating-label-activo-sm">Diagnósticos
                                                                                      </label>
                                                                                      <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=8"
                                                                                          onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso" value="{{ $fichaAtencion->hipotesis_diagnostico }}"> </textarea>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                                      <div class="form-group">
                                                                                          <label
                                                                                              class="floating-label-activo-sm">Servicio</label>
                                                                                          <input type="text"
                                                                                              class="form-control form-control-sm"
                                                                                              name="serv_hosp"
                                                                                              id="serv_hosp"
                                                                                              value="">
                                                                                      </div>
                                                                                  </div>
                                                                                  <div
                                                                                      class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                                      <div class="form-group">
                                                                                          <div
                                                                                              class="custom-control custom-switch">
                                                                                              <input
                                                                                                  type="checkbox"
                                                                                                  class="custom-control-input"
                                                                                                  id="esp-3">
                                                                                              <label
                                                                                                  class="custom-control-label"
                                                                                                  for="esp-3">¿Preparar
                                                                                                  para
                                                                                                  Cirugía?</label>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <!--INDICACIONES INGRESO-->
                                                          <div class="tab-pane fade show" id="indicaciones-hosp"
                                                              role="tabpanel"
                                                              aria-labelledby="indicaciones-hosp-tab">
                                                              <div id="evol_med_urgencia" class="open"
                                                                  aria-labelledby="med_urgen"
                                                                  data-parent="#med_urgen">
                                                                  <div class="row">
                                                                      <div
                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                           <div class="card-informacion">
                                                                            <div class="card-header-lineal">
                                                                                <h5 class="text-dark mb-0">Indicaciones de
                                                                                  ingreso</h5>
                                                                            </div>
                                                                              <div class="card-body">
                                                                                  <div class="row">
                                                                                      <div
                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                          <ul class="nav nav-tabs-aten nav-fill mb-3"
                                                                                              id="ingreso-hosp"
                                                                                              role="tablist">
                                                                                              <li
                                                                                                  class="nav-item">
                                                                                                  <a class="nav-link-aten text-reset active"
                                                                                                      id="ingreso-examenes-tab"
                                                                                                      data-toggle="tab"
                                                                                                      href="#ingreso-examenes"
                                                                                                      role="tab"
                                                                                                      aria-controls="ingreso-examenes"
                                                                                                      aria-selected="true">Exámenes</a>
                                                                                              </li>
                                                                                              <li
                                                                                                  class="nav-item">
                                                                                                  <a class="nav-link-aten text-reset"
                                                                                                      id="medicamentos-ingreso-hosp-tab"
                                                                                                      data-toggle="tab"
                                                                                                      href="#medicamentos-ingreso-hosp"
                                                                                                      role="tab"
                                                                                                      aria-controls="medicamentos-ingreso-hosp"
                                                                                                      aria-selected="true">Medicamentos</a>
                                                                                              </li>
                                                                                              <li
                                                                                                  class="nav-item">
                                                                                                  <a class="nav-link-aten text-reset"
                                                                                                      id="ctrl-enfermeria-tab"
                                                                                                      data-toggle="tab"
                                                                                                      href="#ctrl-enfermeria"
                                                                                                      role="tab"
                                                                                                      aria-controls="ctrl-enfermeria"
                                                                                                      aria-selected="true">Control
                                                                                                      enfermería</a>
                                                                                              </li>
                                                                                          </ul>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="row">
                                                                                      <div
                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                          <div class="tab-content"
                                                                                              id="ingreso-hosp">
                                                                                              <!--EXAMENES-->
                                                                                              <div class="tab-pane fade show active"
                                                                                                  id="ingreso-examenes"
                                                                                                  role="tabpanel"
                                                                                                  aria-labelledby="ingreso-examenes-tab">
                                                                                                  <div
                                                                                                      class="form-row">
                                                                                                      <div
                                                                                                          class="col-md-12 d-none">
                                                                                                          <div
                                                                                                              class="form-group">
                                                                                                              <label
                                                                                                                  for=""
                                                                                                                  class="floating-label-activo-sm">Motivo</label>
                                                                                                              <input
                                                                                                                  type="text"
                                                                                                                  name="motivo_hosp_indicaciones"
                                                                                                                  id="motivo_hosp_indicaciones"
                                                                                                                  class="form-control form-control-sm"
                                                                                                                  value="Cirugía">
                                                                                                          </div>
                                                                                                      </div>
                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                          <button
                                                                                                              type="button"
                                                                                                              class="btn btn-info
                                                                                                                             float-right mb-2"
                                                                                                              onclick="mostrar_nuevo_examen(1000)"><i
                                                                                                                  class="fas fa-plus"></i>
                                                                                                              Nuevo
                                                                                                              examen</button>
                                                                                                      </div>
                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                          <div id="contenedor_examenes_hosp"
                                                                                                              class="d-none">
                                                                                                              <div
                                                                                                                  class="form-row">
                                                                                                                  <div
                                                                                                                      class="col-sm-6">
                                                                                                                      <div
                                                                                                                          class="form-group fill">
                                                                                                                          <label
                                                                                                                              class="floating-label-activo-sm">Tipo
                                                                                                                              Examen</label>
                                                                                                                          <select
                                                                                                                              class="form-control form-control-sm"
                                                                                                                              name="tipo_examen_hosp"
                                                                                                                              id="tipo_examen_hosp">
                                                                                                                              <option
                                                                                                                                  value="0">
                                                                                                                                  Seleccione
                                                                                                                              </option>
                                                                                                                              @foreach ($examenMedico as $exa)
                                                                                                                                  <option
                                                                                                                                      value="{{ $exa->cod_examen }}">
                                                                                                                                      {{ $exa->nombre_examen }}
                                                                                                                                  </option>
                                                                                                                              @endforeach
                                                                                                                          </select>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  <div
                                                                                                                      class="col-sm-6">
                                                                                                                      <div
                                                                                                                          class="form-group fill">
                                                                                                                          <label
                                                                                                                              class="floating-label-activo-sm">Sub-tipo
                                                                                                                              de
                                                                                                                              Examen</label>

                                                                                                                          <select
                                                                                                                              class="form-control form-control-sm"
                                                                                                                              name="sub_tipo_examen_hosp"
                                                                                                                              id="sub_tipo_examen_hosp">
                                                                                                                              <option
                                                                                                                                  value="">
                                                                                                                                  Seleccione
                                                                                                                              </option>
                                                                                                                          </select>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  <div
                                                                                                                      class="col-sm-6">
                                                                                                                      <div
                                                                                                                          class="form-group fill">
                                                                                                                          <label
                                                                                                                              class="floating-label-activo-sm">Examen</label>
                                                                                                                          <select
                                                                                                                              class="form-control form-control-sm"
                                                                                                                              name="examen_hosp"
                                                                                                                              id="examen_hosp">
                                                                                                                              <option
                                                                                                                                  value="">
                                                                                                                                  Seleccione
                                                                                                                              </option>
                                                                                                                          </select>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  <div
                                                                                                                      class="col-sm-6">
                                                                                                                      <div
                                                                                                                          class="form-group fill">
                                                                                                                          <label
                                                                                                                              class="floating-label-activo-sm">Prioridad</label>
                                                                                                                          <select
                                                                                                                              class="form-control form-control-sm"
                                                                                                                              id="prioridad_hosp"
                                                                                                                              name="prioridad_hosp">
                                                                                                                              <option
                                                                                                                                  value="0">
                                                                                                                                  Seleccione
                                                                                                                              </option>
                                                                                                                              <option
                                                                                                                                  value="1">
                                                                                                                                  Baja
                                                                                                                              </option>
                                                                                                                              <option
                                                                                                                                  value="2"
                                                                                                                                  selected>
                                                                                                                                  Media
                                                                                                                              </option>
                                                                                                                              <option
                                                                                                                                  value="3">
                                                                                                                                  Alta
                                                                                                                              </option>
                                                                                                                              <option
                                                                                                                                  value="4">
                                                                                                                                  Urgente
                                                                                                                              </option>
                                                                                                                          </select>
                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                                  <div
                                                                                                                      class="col-sm-12  mb-3">
                                                                                                                      <button
                                                                                                                          type="button"
                                                                                                                          class="btn btn-danger btn-sm"
                                                                                                                          onclick="$('#contenedor_examenes_hosp').addClass('d-none')"><i
                                                                                                                              class="feather icon-x"></i>
                                                                                                                          Ocultar</button>
                                                                                                                      <button
                                                                                                                          type="button"
                                                                                                                          onclick="indicar_examen_ficha();"
                                                                                                                          id="agregar_examen_tabla"
                                                                                                                          class="btn btn-info btn-sm">
                                                                                                                          <i
                                                                                                                              class="feather icon-plus"></i>
                                                                                                                          Añadir
                                                                                                                          Examen
                                                                                                                      </button>
                                                                                                                  </div>
                                                                                                              </div>
                                                                                                          </div>
                                                                                                      </div>

                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                          <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                                                                          <!--Tabla-->
                                                                                                          <div
                                                                                                              class="table-responsive">
                                                                                                              <table
                                                                                                                  id="tabla_examen_ficha_hosp"
                                                                                                                  class="table table-bordered table-xs f-10">
                                                                                                                  <thead>
                                                                                                                      <tr>
                                                                                                                          <th
                                                                                                                              class="align-middle">
                                                                                                                              Nombre
                                                                                                                              Examen
                                                                                                                          </th>
                                                                                                                          <th
                                                                                                                              class="align-middle">
                                                                                                                              Tipo
                                                                                                                          </th>
                                                                                                                          <th
                                                                                                                              class="align-middle">
                                                                                                                              Sub-Tipo
                                                                                                                          </th>

                                                                                                                          <th
                                                                                                                              class="align-middle">
                                                                                                                              Prioridad
                                                                                                                          </th>
                                                                                                                          <th
                                                                                                                              class="align-middle">
                                                                                                                              Acciones
                                                                                                                          </th>
                                                                                                                      </tr>
                                                                                                                  </thead>
                                                                                                                  <tbody>
                                                                                                                    @foreach($examenes_solicitados as $e)
                                                                                                                        <tr>
                                                                                                                            <td class="text-wrap">{{ $e->datos_examen->examen }}</td>
                                                                                                                            <td class="text-wrap">{{ $e->datos_examen->tipo_examen }}</td>
                                                                                                                            <td class="text-wrap">{{ $e->datos_examen->sub_tipo_examen }}</td>
                                                                                                                            <td>
                                                                                                                                @if($e->datos_examen->prioridad == 1)
                                                                                                                                    Baja
                                                                                                                                @elseif($e->datos_examen->prioridad == 2)
                                                                                                                                    Media
                                                                                                                                @elseif($e->datos_examen->prioridad == 3)
                                                                                                                                    Alta
                                                                                                                                @elseif($e->datos_examen->prioridad == 4)
                                                                                                                                    Urgente
                                                                                                                                @endif
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_examen_solicitado_hosp({{ $e->id }});"><i class="feather icon-trash-2"></i></button>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                  </tbody>
                                                                                                              </table>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!--MEDICAMENTOS-->
                                                                                              <div class="tab-pane fade show"
                                                                                                  id="medicamentos-ingreso-hosp"
                                                                                                  role="tabpanel"
                                                                                                  aria-labelledby="medicamentos-ingreso-hosp-tab">
                                                                                                  <div
                                                                                                      class="form-row">
                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                          <button
                                                                                                              type="button"
                                                                                                              class="btn btn-info btn-sm float-right mb-2"
                                                                                                              onclick="mostrar_nuevo_medicamento(1000)"><i
                                                                                                                  class="feather icon-plus"></i>
                                                                                                              Nuevo
                                                                                                              medicamento</button>
                                                                                                      </div>
                                                                                                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"
                                                                                                          id="contenedor_nuevo_medicamento">

                                                                                                      </div>

                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                                          <table
                                                                                                              class="table table-bordered table-xs"
                                                                                                              id="tabla_medicamentos">
                                                                                                              <thead>
                                                                                                                  <tr>
                                                                                                                      <th>Nombre
                                                                                                                      </th>
                                                                                                                      <th>Dosis
                                                                                                                      </th>
                                                                                                                      <th>Frecuencia
                                                                                                                      </th>
                                                                                                                      <th>Acción
                                                                                                                      </th>
                                                                                                                  </tr>
                                                                                                              </thead>
                                                                                                              <tbody>
                                                                                                                  <!-- Aquí se insertarán los medicamentos -->

                                                                                                              </tbody>
                                                                                                          </table>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>
                                                                                              <!--CONTROL ENFERMERIA-->
                                                                                              <div class="tab-pane fade show"
                                                                                                  id="ctrl-enfermeria"
                                                                                                  role="tabpanel"
                                                                                                  aria-labelledby="ctrl-enfermeria-tab">
                                                                                                  <div
                                                                                                      class="form-row">
                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                          <div
                                                                                                              class="form-group">
                                                                                                              <label
                                                                                                                  class="floating-label-activo-sm">Control
                                                                                                                  enfermería</label>
                                                                                                              <select
                                                                                                                  name="control_enfermeria_hosp"
                                                                                                                  id="control_enfermeria_hosp"
                                                                                                                  class="form-control form-control-sm"
                                                                                                                  onchange="evaluar_para_carga_detalle('control_enfermeria_hosp','div_control_enfermeria_hosp','obs_control_enfermeria',4);">
                                                                                                                  <option
                                                                                                                      value="0">
                                                                                                                      Seleccione
                                                                                                                  </option>
                                                                                                                  <option
                                                                                                                      value="1">
                                                                                                                      Cada
                                                                                                                      media
                                                                                                                      hora
                                                                                                                  </option>
                                                                                                                  <option
                                                                                                                      value="2">
                                                                                                                      Cada
                                                                                                                      1
                                                                                                                      hora
                                                                                                                  </option>
                                                                                                                  <option
                                                                                                                      value="3">
                                                                                                                      Cada
                                                                                                                      6
                                                                                                                      hora
                                                                                                                  </option>
                                                                                                                  <option
                                                                                                                      value="4">
                                                                                                                      Otro
                                                                                                                  </option>
                                                                                                              </select>
                                                                                                          </div>
                                                                                                          <div
                                                                                                              class="form-group">
                                                                                                              <div id="div_control_enfermeria_hosp"
                                                                                                                  style="display: none">

                                                                                                              </div>
                                                                                                          </div>
                                                                                                      </div>
                                                                                                      <div
                                                                                                          class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                          <div
                                                                                                              class="form-group">
                                                                                                              <label
                                                                                                                  for="otras_ind_hosp"
                                                                                                                  class="floating-label-activo-sm">Otras
                                                                                                                  indicaciones</label>
                                                                                                              <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3"
                                                                                                                  onblur="this.rows=1;" name="otras_ind_hosp" id="otras_ind_hosp"></textarea>
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
                                                          <!--ARCHIVO-->
                                                          <div class="tab-pane fade show" id="archivos-hosp-pab"
                                                              role="tabpanel"
                                                              aria-labelledby="archivos-hosp-pab-tab">
                                                              <form>
                                                                  <div class="form-row mb-2">
                                                                      <div class="col-sm-12 col-md-12 col-lg-12">
                                                                          <div class="card-informacion">
                                                                              <div class="card-body">
                                                                                  <h6 class="mb-2 text-c-blue">
                                                                                      ARCHIVOS</h6>
                                                                                  <div class="dropzone dz-clickable"
                                                                                      id=""
                                                                                      action="">
                                                                                      <div class="dropzone"
                                                                                          id="misArchivosHosp"
                                                                                          action="{{ route('profesional.archivo.carga') }}">
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                          <div class="form-row mb-2">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
                                                    <button type="button" class="btn btn-info"
                                                              onclick="guardar_hospitalizacion()" @if ($enfermera) disabled @endif><i
                                                                  class="feather icon-save"></i> Guardar y enviar</button>
                                                    <button type="button" class="btn btn-danger"
                                                              onclick="generar_pdf_hospitalizacion()"><i
                                                                  class="fas fa-file-pdf"></i> Ver formulario (PDF)</button>
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
      var myDropzone_receta_enf = null;

      function inicializarDropzoneRecetaEnf() {
          if (typeof Dropzone === 'undefined') {
              return;
          }

          if ($('#dropzone_receta_enf').length === 0) {
              return;
          }

          var dropzoneElement = document.querySelector('#dropzone_receta_enf');
          if (dropzoneElement && dropzoneElement.dropzone) {
              return;
          }

          try {
              myDropzone_receta_enf = new Dropzone('#dropzone_receta_enf', {
                  url: "{{ route('profesional.imagen.carga') }}",
                  method: 'post',
                  createImageThumbnails: true,
                  addRemoveLinks: true,
                  headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}",
                  },
                  acceptedFiles: 'image/*,application/pdf',
                  maxFilesize: 4,
                  maxFiles: 5,
                  dictDefaultMessage: 'Arrastre la imagen/PDF de la receta aquí o haga clic para subir.',
                  dictFallbackMessage: 'Su navegador no admite la carga de archivos mediante arrastrar y soltar.',
                  dictFallbackText: 'Utilice el formulario alternativo a continuación para cargar sus archivos.',
                  dictFileTooBig: 'El archivo es demasiado grande. Tamaño máximo: 4 MB.',
                  dictInvalidFileType: 'No puede subir archivos de este tipo. Solo imágenes y PDF.',
                  dictCancelUpload: 'Cancelar carga',
                  dictUploadCanceled: 'Subida cancelada.',
                  dictCancelUploadConfirmation: '¿Está seguro de que desea cancelar esta carga?',
                  dictRemoveFile: 'Eliminar archivo',
                  dictMaxFilesExceeded: 'No puede cargar más archivos. Máximo 5 archivos.',
                  success: function(file) {
                      cargar_lista_archivo_receta_enf(myDropzone_receta_enf);
                      if (file.previewElement) {
                          file.previewElement.classList.add('dz-success');
                      }
                  },
                  error: function(file, message) {
                      if (file.previewElement) {
                          file.previewElement.classList.add('dz-error');
                          if (typeof message !== 'string' && message.error) {
                              message = message.error;
                          } else if (typeof message === 'object' && message.message) {
                              message = message.message;
                          }
                          for (let node of file.previewElement.querySelectorAll('[data-dz-errormessage]')) {
                              node.textContent = message;
                          }
                      }
                  },
                  removedfile: function(file) {
                      cargar_lista_archivo_receta_enf(myDropzone_receta_enf);
                      if (file.previewElement != null && file.previewElement.parentNode != null) {
                          file.previewElement.parentNode.removeChild(file.previewElement);
                      }
                      return this._updateMaxFilesReachedClass();
                  },
                  canceled: function(file) {
                      cargar_lista_archivo_receta_enf(myDropzone_receta_enf);
                      return this.emit('error', file, this.options.dictUploadCanceled);
                  },
              });
          } catch (error) {
              console.error('Error al crear Dropzone receta enf:', error);
          }
      }

      function cargar_lista_archivo_receta_enf(obj_dropzone) {
          if (!obj_dropzone) {
              console.log('cargar_lista_archivo_receta_enf: obj_dropzone es null');
              return;
          }

          let lista_archivo = [];
          let temp = obj_dropzone.getAcceptedFiles();

          $.each(temp, function(index, value) {
              if (value.status === 'success' && value.xhr !== undefined) {
                  try {
                      var archivo_temp = JSON.parse(value.xhr.response);
                      console.log('Response parseado archivo ' + index + ':', archivo_temp);

                      // Tomar datos de img (ya que usamos profesional.imagen.carga)
                      if (archivo_temp.img) {
                          lista_archivo[index] = [
                              archivo_temp.img.url,
                              archivo_temp.img.original_file_name,
                              archivo_temp.img.nombre_img,
                              archivo_temp.img.file_extension,
                          ];
                          console.log('Archivo ' + index + ' procesado correctamente:', lista_archivo[index]);
                      } else {
                          console.warn('Archivo ' + index + ' no tiene estructura esperada');
                      }
                  } catch(e) {
                      console.error('Error parseando response archivo ' + index + ':', e);
                  }
              }
          });

          console.log('Lista final de archivos:', lista_archivo);
          $('#input_lista_archivo_receta_enf').val(JSON.stringify(lista_archivo));
      }

      setTimeout(function() {
          inicializarDropzoneRecetaEnf();
      }, 0);

    //   boton.addEventListener('click', () => {
    //       const textarea = document.createElement('textarea');
    //       textarea.placeholder = `Evolución ${contador}`;
    //       textarea.name = `campo_${contador}`;
    //       contenedor.appendChild(textarea);
    //       contador++;
    //   });

      var creatinina = 0;

      function evaluar_para_carga_detalle(select, div, input, valor) {
          var valor_select = $('#' + select + '').val();
          if (valor_select == valor) $('#' + div + '').show();
          else {
              $('#' + div + '').hide();
              $('#' + input + '').val('');
          }
      }

      function guardar_traslado_paciente() {
          let params = new URLSearchParams(location.search);
          let id_paciente = $('#id_paciente').val() || params.get('id_paciente');
          let id_ficha_atencion = $('#id_fc').val();
          let id_lugar_atencion = $('#id_lugar_atencion').val();

          let destino = $('#dest').val();
          let obs_dest = $('#obs_dest').val();
          let traslado_en = $('#trasl_en').val();
          let obs_trasl_en = $('#obs_trasl_en').val();
          let condicion = $('#cond_alt').val();
          let obs_cond_alt = $('#obs_cond_alt').val();
          let observaciones = $('#obs_hospitalizar').val();
          let resultado = $('#fl_resultado_ex').val();
          let id_servicio_interno = $('#id_servicio_interno').val() || null;

          if (!id_paciente || !id_ficha_atencion || !id_lugar_atencion) {
              swal({
                  title: "Error",
                  text: "Faltan datos del paciente o de la ficha de atención.",
                  icon: "error",
                  button: "Aceptar",
              });
              return;
          }

          let detalle_observaciones = {
              obs_dest: obs_dest,
              obs_trasl_en: obs_trasl_en,
              obs_cond_alt: obs_cond_alt,
              obs_hospitalizar: observaciones
          };

          $.ajax({
              url: "{{ route('adm_hospital.registrar_alta_paciente') }}",
              type: 'POST',
              data: {
                  _token: "{{ csrf_token() }}",
                  id_paciente: id_paciente,
                  id_ficha_atencion: id_ficha_atencion,
                  id_lugar_atencion: id_lugar_atencion,
                  destino: destino,
                  traslado_en: traslado_en,
                  condicion: condicion,
                  observaciones: observaciones,
                  resultado: resultado,
                  id_servicio_interno: id_servicio_interno,
                  detalle_observaciones: JSON.stringify(detalle_observaciones)
              },
              success: function(resp) {
                  if (resp.mensaje === 'OK') {
                      swal({
                          title: "Guardado",
                          text: "Traslado/alta registrado correctamente.",
                          icon: "success",
                          button: "Aceptar",
                      });
                  } else {
                      swal({
                          title: "Error",
                          text: "No se pudo registrar el traslado/alta.",
                          icon: "error",
                          button: "Aceptar",
                      });
                  }
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
                  swal({
                      title: "Error",
                      text: "Ocurrió un error al guardar el traslado/alta.",
                      icon: "error",
                      button: "Aceptar",
                  });
              }
          });
      }
      {{--  METODOS DE RECETA  --}}
      /** Indicar medicamento **/
      function i_medicamento() {
          ver_medicamento_ficha_medica_sdi();
          $('#indicar_recetario').modal({
              backdrop: 'static',
              keyboard: false
          });
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
          var idPaciente = $('#id_paciente').val() || urlParams.get('id_paciente');

          $.ajax({
              url: "{{ route('enfermeria.asignar_nuevo_triage_paciente') }}",
              type: 'POST',
              data: {
                  id_triage: id_triage,
                  id_paciente: idPaciente,
                  id_ficha_atencion: $('#id_fc').val(),
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

                            $('#descripcion_urgencia'+paciente.id).html(paciente.descripcion);
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
                  id_ficha_atencion: "{{ $fichaAtencion->id }}",
                  id_lugar_atencion: "{{ $lugar_atencion->id }}",
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
                                                        class="form-control form-control-sm" disabled>
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="" disabled>
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                          });
                          if (curaciones.length > 0) {
                              curaciones.forEach(function(curacion) {
                                  // Determinar si la curación está suspendida
                                  let htmlSuspendido = '';
                                  if (curacion.estado_procedimiento == 0) {
                                      htmlSuspendido = '<span class="badge badge-warning">SUSPENDIDO</span> ';
                                  }

                                  let datos = curacion.datos_curacion;
                                  // Ahora puedes trabajar con datos como un objeto JSON
                                  console.log(curacion);
                                  $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${htmlSuspendido}${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" onchange="cambiarTextoLabelCuracion(${curacion.id})" @if(!$enfermera) disabled @endif ${curacion.estado == 1 ? 'checked' : ''}>
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div><br>
                                            <label for="" id="label_curacion_${curacion.id}">${curacion.estado == 1 ? 'Listo' : 'Pendiente'}</label>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos_${curacion.id}" @if(!$enfermera) disabled @endif onclick="cargarInsumosCuracion(${curacion.id})">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-warning-light-c btn-icon" onclick="agregarObservacionesCuracion(${curacion.id},'${datos.nombre_procedimiento}','nueva')" @if(!$enfermera) disabled @endif><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion(${curacion.id})" @if(!$enfermera) disabled @endif><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                `);

                                  $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                `);
                              });
                          }
                          // limpiamos los select
                            $('#ind_med').val(0);
                            $('#ind_cur').val(0);
                            $('#ind_proc').val(0);
                            $('#ind_inmmed').val(0);
                            $('#ind_cv_inmmed_urg').val(0);
                            $('#ind_pp').val(0);
                            $('#ind_vig_sig').val('');
                            $('#obs_ind_med_servicio').val('');
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
                          // Determinar si la curación está suspendida
                          let htmlSuspendido = '';
                          if (curacion.estado_procedimiento == 0) {
                              htmlSuspendido = '<span class="badge badge-warning">Suspendido</span> ';
                          }

                          let datos = curacion.datos_curacion;
                          // Ahora puedes trabajar con datos como un objeto JSON
                          console.log(curacion);
                          $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${htmlSuspendido}${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" onchange="cambiarTextoLabelCuracion(${curacion.id})" @if(!$enfermera) disabled @endif ${curacion.estado == 1 ? 'checked' : ''}>
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div><br>
                                        <label for="" id="label_curacion_${curacion.id}">${curacion.estado == 1 ? 'Listo' : 'Pendiente'}</label>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos_${curacion.id}" @if(!$enfermera) disabled @endif onclick="cargarInsumosCuracion(${curacion.id})">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-warning-light-c btn-icon" onclick="agregarObservacionesCuracion(${curacion.id},'${datos.nombre_procedimiento}','nueva')" @if(!$enfermera) disabled @endif><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion(${curacion.id})" @if(!$enfermera) disabled @endif><i class="feather icon-x"></i></button>
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
                          // Determinar si la curación está suspendida
                          let htmlSuspendido = '';
                          if (curacion.estado_procedimiento == 0) {
                              htmlSuspendido = '<span class="badge badge-warning">SUSPENDIDO</span> ';
                          }

                          let datos = curacion.datos_curacion;
                          // Ahora puedes trabajar con datos como un objeto JSON
                          console.log(curacion);
                          $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${htmlSuspendido}${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" onchange="cambiarTextoLabelCuracion(${curacion.id})" @if(!$enfermera) disabled @endif ${curacion.estado == 1 ? 'checked' : ''}>
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div><br>
                                        <label for="" id="label_curacion_${curacion.id}">${curacion.estado == 1 ? 'Listo' : 'Pendiente'}</label>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos_${curacion.id}" @if(!$enfermera) disabled @endif onclick="cargarInsumosCuracion(${curacion.id})">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-warning-light-c btn-icon" onclick="agregarObservacionesCuracion(${curacion.id},'${datos.nombre_procedimiento}','nueva')" @if(!$enfermera) disabled @endif><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion(${curacion.id})" @if(!$enfermera) disabled @endif><i class="feather icon-x"></i></button>
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
                              "id_ficha_atencion": $('#id_fc').val(),
                              "id_paciente": $('#id_paciente').val()
                          },
                          success: function(data) {
                                console.log(data);
                              // convertir json a objeto
                              var obj = JSON.parse(data);
                              var curaciones = obj.curaciones;
                              var procedimientos = obj.procedimientos;
                              $('#tabla_curaciones_servicio tbody').empty();
                              $('#tabla_curaciones_procedimientos tbody').empty();
                              curaciones.forEach(curacion => {
                                  // Determinar si la curación está suspendida
                                  let htmlSuspendido = '';
                                  if (curacion.estado_procedimiento == 0) {
                                      htmlSuspendido = '<span class="badge badge-warning">SUSPENDIDO</span> ';
                                  }

                                  let datos = curacion.datos_curacion;
                                  $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="align-middle">${htmlSuspendido}${datos.nombre_procedimiento}</td>
                                        <td class="align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" onchange="cambiarTextoLabelCuracion(${curacion.id})" @if(!$enfermera) disabled @endif ${curacion.estado == 1 ? 'checked' : ''}>
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div><br>
                                            <label for="" id="label_curacion_${curacion.id}">${curacion.estado == 1 ? 'Listo' : 'Pendiente'}</label>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary-light-c btn-xxs" data-toggle="modal" data-target="#modalAgregarInsumos_${curacion.id}" @if(!$enfermera) disabled @endif onclick="cargarInsumosCuracion(${curacion.id})">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-warning-light-c btn-icon" onclick="agregarObservacionesCuracion(${curacion.id},'${datos.nombre_procedimiento}','nueva')" @if(!$enfermera) disabled @endif><i class="feather icon-edit"> </i></button>
                                            <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminarCuracion(${curacion.id})" @if(!$enfermera) disabled @endif><i class="feather icon-x"></i></button>
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
                              $('#tabla_procedimientos_servicio tbody').empty();
                              $('#tabla_procedimientos_hosp tbody').empty();
                              procedimientos.forEach(procedimiento => {
                                  if (procedimiento.estado == 0) {
                                      var html = '<span class="badge badge-warning">Suspendido </span>';
                                  } else {
                                      var html = '';
                                  }
                                  let datos = JSON.parse(procedimiento.datos_procedimiento);
                                  $('#tabla_procedimientos_servicio tbody').append(`
                                    <tr>
                                        <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                        <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                        <td class="text-center align-middle text-wrap">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})" @if(!$enfermera) disabled @endif>
                                                <i class="fas fa-trash"></i>Eliminar
                                            </button>
                                            <button type="button"
                                                class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                                onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})" @if(!$enfermera) disabled @endif>
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
                              swal("La curación ha sido eliminada correctamente.", {
                                  icon: "success",
                              });
                          },
                          error: function(data) {
                              console.log(data);
                          }
                      });
                  }
              });

      }

      function agregarObservacionesCuracion(id, procedimiento, observaciones) {
          // abrir modal
          $('#modalObservacionesCuracion').modal('show');
          $('#procedimiento_curacion').html(procedimiento);
          $('#observaciones_curacion').val(observaciones);
          $('#id_curacion').val(id);
      }

      function eliminarEvolucionPaciente(id) {
          let idEvolucion = $('#evolucion' + id).val();
          console.log(idEvolucion);
          // Elimina el elemento con el ID proporcionado
          $('#contenedor_evolucion_' + id).remove();
      }

      function indicar_examen_cirugia() {

          var tipo_examen = $("#tipo_examen option:selected").text();
          var id_tipo_examen = $("#tipo_examen").val();
          var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
          var id_sub_tipo_examen = $("#sub_tipo_examen").val();
          var examen = $("#examen option:selected").text();
          var id_examen = $("#examen").val();
          var prioridad = $("#prioridad option:selected").text();
          var lado = $("#lado option:selected").text();
          var id_paciente = $('#id_paciente').val();

          var imagenologia_con_contraste = 'N/C';
          if ($('#imagenologia_con_contraste').is(':checked'))
              imagenologia_con_contraste = 'Con Contraste';

          var valido = 0;
          var mensaje = '';

          if ($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) ==
              'Seleccione') {
              valido = 1;
              mensaje += ' Debe seleccionar Tipo Examen\n';
          }
          if ($.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) ==
              'Seleccione') {
              valido = 1;
              mensaje += ' Debe seleccionar Sub Tipo Examen\n';
          }
          if ($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione') {
              valido = 1;
              mensaje += ' Debe seleccionar Examen\n';
          }
          if ($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione') {
              valido = 1;
              mensaje += ' Debe seleccionar Prioridad\n';
          }


          if (valido == 0) {
              let data = {
                  tipo_examen: tipo_examen,
                  id_tipo_examen: id_tipo_examen,
                  sub_tipo_examen: sub_tipo_examen,
                  id_sub_tipo_examen: id_sub_tipo_examen,
                  examen: examen,
                  id_examen: id_examen,
                  prioridad: prioridad,
                  lado: lado,
                  id_paciente: id_paciente,
                  imagenologia_con_contraste: imagenologia_con_contraste,
                  id_ficha_atencion: $('#id_fc').val(),
                  id_lugar_atencion: $('#id_lugar_atencion').val(),
                  _token: "{{ csrf_token() }}"
              }

              var url = "{{ route('examen.indicar_examen_cirugia') }}";
              $.ajax({
                      url: url,
                      type: "post",
                      data: data,
                      dataType: "json",
                  })
                  .done(function(data) {
                      console.log(data);
                      if (data.estado == 'success') {
                          let examenes = data.examenes;
                          $('#tabla_examen_cirugia tbody').empty();
                          $('#tabla_examenes_servicios tbody').empty();
                          examenes.forEach(function(resp) {
                              let examen = resp.datos_examen;
                              $('#tabla_examen_cirugia tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${examen.examen}</td>
                                    <td class="text-center align-middle text-wrap">${examen.lado}</td>
                                    <td class="text-center align-middle text-wrap">${examen.tipo_examen}</td>
                                    <td class="text-center align-middle text-wrap">${examen.prioridad}</td>
                                    <td class="text-center align-middle text-wrap">${examen.imagenologia_con_contraste}</td>
                                    <td class="text-center align-middle"><div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia(${resp.id});"><i class="fas fa-trash"></i></div></td>
                                </tr>
                            `);
                              $('#tabla_examenes_servicios tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">` + resp.fecha + ` ` + resp.hora +
                                  ` <br> ` + resp.responsable + `</td>
                                    <td class="text-center align-middle text-wrap">` + examen.examen + `</td>
                                    <td class="text-center align-middle text-wrap">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="examenes_servicio_listo` + resp.id + `" checked="">
                                            <label for="examenes_servicio_listo` + resp.id + `" class="cr"></label>
                                        </div>
                                        </td>
                                        <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-outline-info btn-sm has-ripple" data-target="#modalAgregarInsumos" data-toggle="modal">Insumos<span class="ripple ripple-animate" style="height: 66.375px; width: 66.375px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -15.25px; left: -1.53125px;"></span></button></td>
                                    </tr>
                            `);
                          });
                          swal({
                              title: "Ingreso de examen(es).",
                              text: data.mensaje,
                              icon: "success",
                              buttons: "Aceptar",
                              //SuccessMode: true,
                          })
                      } else {
                          swal({
                              title: "Ingreso de examen(es).",
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
                  title: "Ingreso de examen(es).",
                  text: mensaje,
                  icon: "error",
                  buttons: "Aceptar",
                  //SuccessMode: true,
              });
          }

          // $('.examenes_sin_registros').remove();


          // if ($('#imagenologia_con_contraste').prop('checked')) {
          //     $('#tabla_examen_cirugia tr').each(function(key, value) {
          //         $(value).find('td').each(function(key_td, value_td) {
          //             if (key_td == 0) {
          //                 if ($(value_td).text() == 'CREATININA EN SANGRE') {
          //                     creatinina = 1;
          //                 }
          //             }
          //         });
          //     });
          //     if (creatinina == 0) {
          //         fila = '';
          //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
          //         fila += '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
          //         fila += '<td class="text-center align-middle text-wrap">SANGRE</td>';
          //         //fila =     '<td>' + sub_tipo_examen + '</td>';
          //         fila += '<td class="text-center align-middle text-wrap">Media</td>';
          //         fila += '<td class="text-center align-middle text-wrap">N/C</td>';
          //         fila += '<td class="text-center align-middle"><div name="remove" id="' + i +
          //             '" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_contraste(\'row' + i +
          //             '\');"><i class="fas fa-trash"></i></div></td>';
          //         fila += '</tr>';
          //         $('#tabla_examen_cirugia tr:first').after(fila);
          //         i++;
          //         creatinina = 1;
          //     }
          // }




          $("#tipo_examen").val('');
          $("#sub_tipo_examen").val('');
          $("#examen").val('');
          $("#prioridad").val(2);
          $('#imagenologia_con_contraste').prop('checked', false);
          $('#mensaje_imagenologia_con_contraste').hide();
          $("#lado").val(0);
      }



      function eliminar_examen_contraste(id_row) {
          swal({
              title: "Eliminar Examen relacionado con contraste.",
              text: 'Al "Aceptar" Elimina el examen relacionado con contraste.\n',
              icon: "warning",
              buttons: ["Aceptar", 'Cancelar'],
          }).then((result) => {
              if (result == true) {
                  console.log('regresar');
              } else {
                  $('#tabla_examen_cirugia [id=' + id_row + ']').remove();
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
          } else {
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

      function confirmarEliminarEvolucionAgregada(id) {
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
                  let controles_ciclo = resp.controles_ciclo;
                  if (mensaje == 'OK') {
                      swal({
                          title: 'Éxito',
                          text: 'Evolución eliminada correctamente',
                          icon: 'success',
                          button: 'Aceptar'
                      });

                      // Destruir DataTable si existe y limpiar
                      if ($.fn.DataTable.isDataTable('#tabla_cont_ciclo')) {
                          let table = $('#tabla_cont_ciclo').DataTable();
                          table.clear();
                          table.destroy();
                          $('#tabla_cont_ciclo').empty();
                      }

                      // Reconstruir estructura completa de la tabla con estilos originales
                      let tableHtml = '<thead>';
                      tableHtml += '<tr>';
                      tableHtml += '<th class="text-center align-middle" style="display:none">id</th>';
                      tableHtml += '<th class="text-center align-middle">Fecha/hora</th>';
                      tableHtml += '<th class="text-center align-middle">T°</th>';
                      tableHtml += '<th class="text-center align-middle">Pulso</th>';
                      tableHtml += '<th class="text-center align-middle">PAS</th>';
                      tableHtml += '<th class="text-center align-middle">PAD</th>';
                      tableHtml += '<th class="text-center align-middle">PAM</th>';
                      tableHtml += '<th class="text-center align-middle">FR</th>';
                      tableHtml += '<th class="text-center align-middle">Otros</th>';
                      tableHtml += '<th class="text-center align-middle">Estado</th>';
                      tableHtml += '<th class="text-center align-middle">Acciones</th>';
                      tableHtml += '</tr>';
                      tableHtml += '</thead>';
                      tableHtml += '<tbody>';

                      // Iterar sobre los controles_ciclo y agregar las filas
                      if (controles_ciclo && controles_ciclo.length > 0) {
                          controles_ciclo.forEach(function(control, index) {
                              let datos = control.datos_evolucion;

                              // Formatear fecha y hora desde el campo created_at
                              let fechaHora = '';
                              if (control.created_at) {
                                  let fechaObj = new Date(control.created_at);
                                  let dia = String(fechaObj.getDate()).padStart(2, '0');
                                  let mes = String(fechaObj.getMonth() + 1).padStart(2, '0');
                                  let anio = fechaObj.getFullYear();
                                  let horas = String(fechaObj.getHours()).padStart(2, '0');
                                  let minutos = String(fechaObj.getMinutes()).padStart(2, '0');
                                  fechaHora = dia + '/' + mes + '/' + anio + ' ' + horas + ':' +
                                      minutos;
                              }

                              tableHtml += '<tr>';
                              tableHtml += '<td style="display:none">' + control.id + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + fechaHora +
                                  '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .temperatura || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pulso ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pas ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pad ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pam ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .frec_resp || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">';
                              tableHtml += 'HGT: ' + (datos.hemoglucotest || '') + '<br>';
                              tableHtml += 'GLASGOW: ' + (datos.glasgow || '') + '<br>';
                              tableHtml += 'EVA: ' + (datos.c_eva || '') + '<br>';
                              tableHtml += 'OTRAS: ' + (datos.otras_pruebas || '');
                              tableHtml += '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .gravedad_e_conc || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">';
                              tableHtml +=
                                  '<button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionAgregada(' +
                                  control.id + ')">';
                              tableHtml += '<i class="feather icon-x"></i></button>';
                              tableHtml += '</td>';
                              tableHtml += '</tr>';
                          });
                      } else {
                          // Si no hay datos, mostrar mensaje
                          tableHtml +=
                              '<tr><td colspan="11" class="text-center">No hay evoluciones registradas</td></tr>';
                      }

                      tableHtml += '</tbody>';

                      // Insertar HTML completo en la tabla
                      $('#tabla_cont_ciclo').html(tableHtml);

                      // Reinicializar DataTable solo si hay datos
                      if (controles_ciclo && controles_ciclo.length > 0) {
                          $('#tabla_cont_ciclo').DataTable({
                              language: {
                                  url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                              },
                              responsive: true,
                              order: [
                                  [1, 'desc']
                              ], // Ordenar por fecha descendente (columna 1 ahora que hay ID)
                              pageLength: 10,
                              columnDefs: [{
                                      orderable: false,
                                      targets: -1
                                  }, // Deshabilitar ordenamiento en columna de acciones
                                  {
                                      visible: false,
                                      targets: 0
                                  } // Ocultar columna ID
                              ]
                          });
                      }

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

      function mostrarDatosRespiracion(e, idEvolucion = null) {
          console.log(e);
          let id = idEvolucion ? idEvolucion : '';
          let value = e.target.value;
          console.log(value);
          if (value == 0) {
              $('#select_info_respiracion_servicio' + id).addClass('d-none');
          } else {
              $('#select_info_respiracion_servicio' + id).removeClass('d-none');
          }

      }

      function cerrarModalMedicamentosFicha_sdi() {
          swal({
              title: "Ingreso de medicamento(s).",
              text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Receta" para guardar cambios.',
              icon: "warning",
              buttons: ["Aceptar", 'Cancelar'],
          }).then((result) => {
              if (result == true) {
                  console.log('regresar');
              } else {

                  $('#indicar_recetario').modal('hide');
              }
          })
      };

      function getDosis_sdi_enf() {
          let id_medicamento = $('#id_medicamento_adm_enf').val();
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
                      let dosis = $('#dosis_receta_enf');

                      dosis.find('option').remove();
                      dosis.append('<option value="0">Seleccione</option>');
                      $(data).each(function(i, v) { // indice, valor
                          dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                              '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                              '</option>');
                      })

                  } else {
                      console.log('no hay datos');
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });


      }

      function agregarMedicamentoReceta(parametros, receta_am) {
          let url = "{{ route('detalle_receta.registro_receta') }}";
          let id_paciente = $('#id_paciente').val();
          let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
          let dataId = selectedOption.data('id');
          var _token = CSRF_TOKEN;
          $.ajax({

              url: url,
              type: "POST",
              data: {
                  _token: _token,
                  id_ficha: $('#id_fc').val(),
                  id_lugar_atencion: $('#id_lugar_atencion').val(),
                  id_tipo_control: parametros.id_tipo_control,
                  id_medicamento: parametros.id_medicamento,
                  nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                  id_dosis_medicamento_ficha_dental: dataId,
                  nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                  nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                  id_frecuencia_medicamento_ficha_dental: parametros.id_frecuencia_medicamento_ficha_dental,
                  via_administracion: parametros.via_administracion_ficha_dental,
                  id_via_administracion: parametros.id_via_administracion_ficha_dental,
                  farmaco: parametros.farmaco,
                  observaciones: parametros.observaciones_medicamento_ficha_dental,
                  uso_cronico: parametros.medicamento_uso_cronico,
                  id_paciente: id_paciente,
                  receta_am: receta_am,
              },
              success: function(resp) {
                  console.log(resp);
                  let mensaje = resp.status;
                  if (mensaje == 'success') {
                      let medicamentos = resp.data;

                      // Destruir DataTable si existe
                      if ($.fn.DataTable.isDataTable('#tabla_medicamento_cirugia_sdi_enfermera_adm')) {
                          $('#tabla_medicamento_cirugia_sdi_enfermera_adm').DataTable().destroy();
                      }

                      $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                      $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm').empty();
                      $('#tbody_tabla_medicamento_manual').empty();
                      $('#tabla_tratamientos_servicio tbody').empty();

                      medicamentos.forEach(medicamento => {
                          console.log(medicamento);
                          if (medicamento.id_dosis == null) {
                              medicamento.dosis = medicamento.nombre_dosis;
                          }

                          if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                              medicamento.id_frecuencia == 1000) {
                              medicamento.indicaciones = medicamento.nombre_frecuencia;
                          }

                          // Fila para tabla de tratamientos servicio (común para todos)
                          let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td><input type="text" disabled></td>
                                        <td class="p-0">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                                <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                            </div><br>
                                            <label>Pendiente</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                        </td>
                                        <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                                    </tr>`;

                          // Medicamentos SIN id_enfermera (null o 0) - Indicados por el médico
                          if (!medicamento.id_enfermera || medicamento.id_enfermera == null ||
                              medicamento.id_enfermera == 0 || medicamento.id_enfermera === undefined
                              ) {
                              // Fila para tabla del médico
                              let fila_medico = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                        </tr>`;

                              // Fila para tabla de enfermería (para que puedan administrar los medicamentos del médico)
                              var fila_enf_medico = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                            <td class="text-center align-middle text-wrap" id="repeticiones_medicamento_${medicamento.id}">${medicamento.contador_dosis || 1}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco || ''}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental || ''}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental || ''}</td>
                                            <td class="text-center align-middle text-wrap hidden">${medicamento.indicaciones || ''}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion || ''}</td>
                                            <td class="text-center align-middle" id="tiempo_restante_${medicamento.id}">
                                                ${medicamento.estado_tratamiento == 1 && medicamento.tiempo_transcurrido ? '<span>Hace: ' + medicamento.tiempo_transcurrido + '</span>' : '<span>-</span>'}
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento_enf(${medicamento.id})" id="btn_administrar_${medicamento.id}" disabled>
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente_enf_adm${medicamento.id}" onchange="cambiarTextoLabelTratamiento(${medicamento.id})" ${medicamento.estado_tratamiento == 1 ? 'checked' : ''} disabled>
                                                    <label for="registro_alternativo_paciente_enf_adm${medicamento.id}" class="cr"></label>
                                                </div>
                                                <label id="label_tratamiento_enf_adm_${medicamento.id}">${medicamento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="tratamiento_finalizado_enf_adm${medicamento.id}" onchange="finalizar_tratamiento_enf(${medicamento.id})" ${medicamento.finalizado == 1 ? 'checked' : ''} disabled>
                                                    <label for="tratamiento_finalizado_enf_adm${medicamento.id}" class="cr"></label>
                                                </div>
                                            </td>
                                        </tr>`;

                              $('#tbody_tabla_medicamento_cirugia_sdi').append(fila_medico);
                              $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm').append(
                                  fila_enf_medico);
                              $('#tbody_tabla_medicamento_manual').append(fila_medico);
                          }

                          // Medicamentos CON id_enfermera (> 0) - Creados por enfermería
                          // if(medicamento.id_enfermera && medicamento.id_enfermera != null && medicamento.id_enfermera !== undefined && medicamento.id_enfermera > 0){
                          //     var fila_enf = `<tr id="row${medicamento.id}">
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                        //                     <td class="text-center align-middle text-wrap">${medicamento.contador_dosis || 1}</td>
                        //                     <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco || ''}</td>
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental || ''}</td>
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental || ''}</td>
                        //                     <td class="text-center align-middle text-wrap hidden">${medicamento.indicaciones || ''}</td>
                        //                     <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion || ''}</td>
                        //                     <td class="text-center align-middle text-wrap">${medicamento.via_administracion || ''}</td>
                        //                     <td class="text-center align-middle" id="tiempo_restante_${medicamento.id}">
                        //                         ${medicamento.estado_tratamiento == 1 && medicamento.tiempo_transcurrido ? '<span>Hace: ' + medicamento.tiempo_transcurrido + '</span>' : '<span>-</span>'}
                        //                     </td>
                        //                     <td class="text-center align-middle">
                        //                         <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento_enf(${medicamento.id})" id="btn_administrar_${medicamento.id}">
                        //                             <i class="fas fa-check"></i>
                        //                         </button>
                        //                     </td>
                        //                     <td class="text-center align-middle">
                        //                         <div class="switch switch-success d-inline m-r-10">
                        //                             <input type="checkbox" id="registro_alternativo_paciente_enf_adm${medicamento.id}" onchange="cambiarTextoLabelTratamiento(${medicamento.id})" ${medicamento.estado_tratamiento == 1 ? 'checked' : ''}>
                        //                             <label for="registro_alternativo_paciente_enf_adm${medicamento.id}" class="cr"></label>
                        //                         </div>
                        //                         <label id="label_tratamiento_enf_adm_${medicamento.id}">${medicamento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>
                        //                     </td>
                        //                     <td class="text-center align-middle">
                        //                         <div class="switch switch-success d-inline m-r-10">
                        //                             <input type="checkbox" id="tratamiento_finalizado_enf_adm${medicamento.id}" onchange="finalizar_tratamiento_enf(${medicamento.id})" ${medicamento.finalizado == 1 ? 'checked' : ''}>
                        //                             <label for="tratamiento_finalizado_enf_adm${medicamento.id}" class="cr"></label>
                        //                         </div>
                        //                     </td>
                        //                 </tr>`;
                          //     $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm').append(fila_enf);
                          // }

                          $('#tabla_tratamientos_servicio tbody').append(fila_);
                      });

                      // Reinicializar DataTable para tabla de enfermería
                      if ($('#tabla_medicamento_cirugia_sdi_enfermera_adm tbody tr').length > 0) {
                          $('#tabla_medicamento_cirugia_sdi_enfermera_adm').DataTable({
                              "language": {
                                  "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                              },
                              "order": [
                                  [2, "asc"]
                              ],
                              "pageLength": 10,
                              "columnDefs": [{
                                  "targets": [0, 1, 4, 5, 6, 7],
                                  "visible": false
                              }],
                              "autoWidth": false,
                              "responsive": false
                          });
                      }

                      swal({
                          title: "Medicamento Agregado",
                          icon: "success",
                          // buttons: "Aceptar",
                          //SuccessMode: true,
                      });
                  }
              },
              error: function(error) {
                  console.log(error.responseText);
              }
          })
      }

      function limpiar_campos_medicamento_sdi() {
          $('#nombre_medicamento_ficha_dental').val('');
          $('#nombre_composicion_farmaco').html('');
          $('#id_medicamento_ficha_dental').val('');
          $('#id_medicamento_tipo_control').val('');
          $('#mensaje_med_control').val('');
          $('#dosis_medicamento_ficha_dental').val('');
          $('#frecuencia_medicamento_ficha_dental').val('');
          $('#via_administracion_ficha_dental').val('');
          $('#observaciones_medicamento_ficha_dental').val('');
          $('#medicamento_uso_cronico').prop('checked', false);
          $('#mensaje_uso_cronico').hide();

      }

      function getFrecuencia_sdi() {

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

      function getCantComp_sdi() {

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
                          select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +
                              '</option>');
                      })
                      select_cant_comp.append('<option value="999">Otra Cantidad</option>');
                  } else {



                  }

              })
              .fail(function(jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });

      };

      function getFrecuencia_sdi_enf() {

          let id_dosis = $('#dosis_receta_enf').val();
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
                      let dosis = $('#frecuencia_medicamento_ficha_enf');

                      dosis.find('option').remove();
                      dosis.append('<option value="0">Seleccione</option>');
                      $(data).each(function(i, v) { // indice, valor
                          dosis.append('<option value="' + v.id + '">' + v.indic +
                              '</option>');
                      })

                  } else {
                      console.log('no hay datos');
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });
      };

      function getCantComp_sdi_enf() {

          var cant_comp = $('#dosis_receta_enf option:selected').attr('data-cant_comp');
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
                      let select_cant_comp = $('#cantidad_comprar_enf');

                      select_cant_comp.find('option').remove();
                      select_cant_comp.append('<option value="0">Seleccione</option>');
                      $(data).each(function(i, v) { // indice, valor
                          select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +
                              '</option>');
                      })
                      select_cant_comp.append('<option value="999">Otra Cantidad</option>');
                  } else {
                      console.log('no hay datos');
                  }

              })
              .fail(function(jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });

      };

      function validar_via_administracion_sdi() {
          if ($('#via_administracion_ficha_dental').val() == 11) {
              $('#div_observaciones_medicamento_ficha_dental').show();
              $('#observaciones_medicamento_ficha_dental').removeAttr('disabled');
          } else {
              $('#div_observaciones_medicamento_ficha_dental').hide();
              $('#observaciones_medicamento_ficha_dental').attr('disabled', 'disabled');
              $('#observaciones_medicamento_ficha_dental').val('');
          }
      }

      function validar_periodo_sdi() {
          if ($('#periodo_ficha_dental').val() == 11) {
              $('#div_observaciones_periodo_ficha_dental').show();
              $('#observaciones_periodo_ficha_dental').removeAttr('disabled');
          } else {
              $('#div_observaciones_periodo_ficha_dental').hide();
              $('#observaciones_periodo_ficha_dental').attr('disabled', 'disabled');
              $('#observaciones_periodo_ficha_dental').val('');
          }
      }

      function validar_cantidad_comprar_sdi() {
          if ($('#cantidad_comprar').val() == 999) {
              $('#div_otra_cantidad_a_comprar').show();
              $('#otra_cantidad_a_comprar').removeAttr('disabled');
          } else {
              $('#div_otra_cantidad_a_comprar').hide();
              $('#otra_cantidad_a_comprar').attr('disabled', 'disabled');
              $('#otra_cantidad_a_comprar').val('');
          }
      }

      // function indicar_medicamento_sdi()
      // {

      //     let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
      //     let farmaco = $('#nombre_composicion_farmaco').html();
      //     let id_medicamento = $('#id_medicamento_ficha_dental').val();
      //     let id_tipo_control = $('#id_medicamento_tipo_control').val();

      //     let id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
      //     let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

      //     let id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
      //     let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

      //     let dosis_medicamento_ficha_dental_2 = $('#dosis_medicamento_ficha_dental_2').val();
      //     let frecuencia_medicamento_ficha_dental_2 = $('#frecuencia_medicamento_ficha_dental_2').val();

      //     let id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
      //     let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

      //     let observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

      //     {{--  let id_periodo_ficha_dental = $('#periodo_ficha_dental').val();  --}}
      //     {{--  let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();  --}}

      //     {{--  let observaciones_periodo_ficha_dental = $('#observaciones_periodo_ficha_dental').val();  --}}

      //     {{--  let id_cantidad_comprar = $('#cantidad_comprar').val();  --}}
      //     {{--  let cantidad_comprar = $('#cantidad_comprar option:selected').text();  --}}

      //     {{--  let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar').val();  --}}


      //     var lista_med = [];
      //     $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
      //         if (i > 0) {
      //             rol = {};
      //             var data = $(this).find("td");
      //             lista_med.push($.trim($(data[0]).text().split("\n").join("")));
      //         }
      //     });

      //     // console.log('indicar_medicamento');
      //     // console.log('lista_med');
      //     // console.log(lista_med);

      //     if($.inArray(id_medicamento,lista_med) == -1)
      //     {

      //         var medicamento_uso_cronico = 0;
      //         if($('#medicamento_uso_cronico').is(':checked'))
      //             medicamento_uso_cronico = 1;

      //         var valido = 0;
      //         var mensaje = '';

      //         if($.trim(nombre_medicamento_ficha_dental) == '')
      //         {
      //             valido = 1;
      //             mensaje += 'Debe completar el campo Medicamento.\n';
      //         }

      //         if($('#id_medicamento_ficha_dental').val() != '')
      //         {
      //             if($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 || dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental == 'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione')
      //             {
      //                 valido = 1;
      //                 mensaje += 'Debe completar el campo Presentación.\n';
      //             }
      //             if($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 || frecuencia_medicamento_ficha_dental == 'Seleccione una opción' || frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental == 'Seleccione')
      //             {
      //                 valido = 1;
      //                 mensaje += 'Debe completar el campo Posología.\n';
      //             }
      //         }
      //         else
      //         {
      //             if( dosis_medicamento_ficha_dental_2 == '')
      //             {
      //                 valido = 1;mensaje += 'Debe completar el campo Dosis\n';
      //             }
      //             else
      //             {
      //                 dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
      //             }
      //             if( frecuencia_medicamento_ficha_dental_2 == '')
      //             {
      //                 valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
      //             }
      //             else
      //             {
      //                 frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
      //             }
      //         }

      //         if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
      //         {
      //             valido = 1;
      //             mensaje += 'Debe completar el campo Via de Administración.\n';
      //         }
      //         else if($('#via_administracion_ficha_dental').val() == 11)
      //         {
      //             if( $.trim(observaciones_medicamento_ficha_dental) == '')
      //             {
      //                 valido = 1;
      //                 mensaje += 'Debe ingresar Otra Vía Administración\n';
      //             }
      //             else
      //             {
      //                 via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
      //             }
      //         }

      //         {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
    //         {
    //             valido = 1;
    //             mensaje += 'Debe completar el campo Periodo.\n';
    //         }
    //         else if($('#periodo_ficha_dental').val() == 11)
    //         {
    //             if( $.trim(observaciones_periodo_ficha_dental) == '')
    //             {
    //                 valido = 1;
    //                 mensaje += 'Debe ingresar Otro Periodo\n';
    //             }
    //             else
    //             {
    //                 periodo_ficha_dental = observaciones_periodo_ficha_dental;
    //             }
    //         }

    //         if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
    //         {
    //             valido = 1;
    //             mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
    //         }
    //         else if($('#cantidad_comprar').val() == '999')
    //         {
    //             if( $.trim(otra_cantidad_a_comprar) == '')
    //             {
    //                 valido = 1;
    //                 mensaje += 'Debe ingresar Cantidad a Comprar\n';
    //             }
    //             else
    //             {
    //                 cantidad_comprar = otra_cantidad_a_comprar;
    //             }
    //         }  --}}

      //         if(valido == 0)
      //         {
      //             $('.medicamentos_sin_registros').remove()

      //             var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

      //             var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +

      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
      //                             '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_dosis_medicamento_ficha_dental + '</td>' +
      //                             '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_frecuencia_medicamento_ficha_dental + '</td>' +
      //                             '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

      //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
      //                             '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

      //                             '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
      //                         '</tr>';

      //             i++;

      //             $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

      //             /** enviando a table de medicamento faltante */
      //             if($('#id_medicamento_ficha_dental').val() == '')
      //             {
      //                 $('#med_faltante').val(nombre_medicamento_ficha_dental);
      //                 enviar_medicamento_faltante_sdi();
      //             }

      //             //$("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
      //             {{--  var nFilas = $("#tabla_medicamento_cirugia_sdi tr").length;  --}}
      //             $('#nombre_medicamento_ficha_dental').val('');
      //             $('id_medicamento_ficha_dental').val('');

      //             $('#nombre_composicion_farmaco').html('');

      //             {{--  $('#dosis_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
      //             $('#dosis_medicamento_ficha_dental').val(0);

      //             {{--  $('#frecuencia_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
      //             $('#frecuencia_medicamento_ficha_dental').val(0);

      //             $('#dosis_medicamento_ficha_dental_2').val('');
      //             $('#frecuencia_medicamento_ficha_dental_2').val('');

      //             $('#via_administracion_ficha_dental').val(0);
      //             $('#observaciones_medicamento_ficha_dental').val('');
      //             $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');

      //             {{--  $('#periodo_ficha_dental').val(0);
    //             $('#observaciones_periodo_ficha_dental').val('');
    //             $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');



    //             $('#cantidad_comprar').val(0);
    //             $('#otra_cantidad_a_comprar').val('');
    //             $('#otra_cantidad_a_comprar').attr('disabled','disabled');

    //             $('#mensaje_med_control').html('');  --}}


      //             $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();
      //             //$("#adicionados").append(nFilas - 1);
      //             //$("#sub_tipo_examen").empty();
      //             //$("#nro_orden").disabled();

      //         }
      //         else
      //         {
      //             swal({
      //                 title: "Ingreso de medicamento(s).",
      //                 text:mensaje,
      //                 icon: "error",
      //                 // buttons: "Aceptar",
      //                 //SuccessMode: true,
      //             });
      //         }
      //     }
      //     else
      //     {
      //         swal({
      //             title: "Ingreso de medicamento(s).",
      //             text:'El medicamento está Recetado',
      //             icon: "warning",
      //             // buttons: "Aceptar",
      //             //SuccessMode: true,
      //         });
      //     }
      // }

    //   function indicar_medicamento_sdi(id) {
    //       console.log(id);
    //       if (id == 1) {
    //           var nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
    //           var farmaco = $('#nombre_composicion_farmaco').html();
    //           var id_medicamento = $('#id_medicamento_ficha_dental').val();
    //           var id_tipo_control = $('#id_medicamento_tipo_control').val();

    //           var id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
    //           var dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

    //           var id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
    //           var frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

    //           var id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
    //           var via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

    //           var observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

    //       } else {
    //           // luego lo vemos

    //       }


    //       var lista_med = [];
    //       $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
    //           if (i > 0) {
    //               rol = {};
    //               var data = $(this).find("td");
    //               lista_med.push($.trim($(data[0]).text().split("\n").join("")));
    //           }
    //       });

    //       if ($.inArray(id_medicamento, lista_med) == -1) {
    //           var medicamento_uso_cronico = 0;
    //           if ($('#medicamento_uso_cronico').is(':checked'))
    //               medicamento_uso_cronico = 1;

    //           var valido = 0;
    //           var mensaje = '';

    //           if ($.trim(nombre_medicamento_ficha_dental) == '') {
    //               valido = 1;
    //               mensaje += 'Debe completar el campo Medicamento.\n';
    //           }

    //           if ($('#id_medicamento_ficha_dental').val() != '') {
    //               if ($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 ||
    //                   dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental ==
    //                   'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione') {
    //                   valido = 1;
    //                   mensaje += 'Debe completar el campo Presentación.\n';
    //               }
    //               if ($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 ||
    //                   frecuencia_medicamento_ficha_dental == 'Seleccione una opción' ||
    //                   frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental ==
    //                   'Seleccione') {
    //                   valido = 1;
    //                   mensaje += 'Debe completar el campo Posología.\n';
    //               }
    //           } else {
    //               if (dosis_medicamento_ficha_dental_2 == '') {
    //                   valido = 1;
    //                   mensaje += 'Debe completar el campo Dosis\n';
    //               } else {
    //                   dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
    //               }
    //               if (frecuencia_medicamento_ficha_dental_2 == '') {
    //                   valido = 1;
    //                   mensaje += 'Debe completar el campo Frecuencia\n';
    //               } else {
    //                   frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
    //               }
    //           }

    //           if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
    //                   via_administracion_ficha_dental) == 'Seleccione') {
    //               valido = 1;
    //               mensaje += 'Debe completar el campo Via de Administración.\n';
    //           } else if ($('#via_administracion_ficha_dental').val() == 11) {
    //               if ($.trim(observaciones_medicamento_ficha_dental) == '') {
    //                   valido = 1;
    //                   mensaje += 'Debe ingresar Otra Vía Administración\n';
    //               } else {
    //                   via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
    //               }
    //           }

    //           //  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
    //           // {
    //           //     valido = 1;
    //           //     mensaje += 'Debe completar el campo Periodo.\n';
    //           // }
    //           // else if($('#periodo_ficha_dental').val() == 11)
    //           // {
    //           //     if( $.trim(observaciones_periodo_ficha_dental) == '')
    //           //     {
    //           //         valido = 1;
    //           //         mensaje += 'Debe ingresar Otro Periodo\n';
    //           //     }
    //           //     else
    //           //     {
    //           //         periodo_ficha_dental = observaciones_periodo_ficha_dental;
    //           //     }
    //           // }

    //           // if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
    //           // {
    //           //     valido = 1;
    //           //     mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
    //           // }
    //           // else if($('#cantidad_comprar').val() == '999')
    //           // {
    //           //     if( $.trim(otra_cantidad_a_comprar) == '')
    //           //     {
    //           //         valido = 1;
    //           //         mensaje += 'Debe ingresar Cantidad a Comprar\n';
    //           //     }
    //           //     else
    //           //     {
    //           //         cantidad_comprar = otra_cantidad_a_comprar;
    //           //     }
    //           // }

    //           if (valido == 0) {
    //               $('.medicamentos_sin_registros').remove()

    //               var parametros = {
    //                   "id_tipo_control": id_tipo_control,
    //                   "id_medicamento": id_medicamento,
    //                   "nombre_medicamento_ficha_dental": nombre_medicamento_ficha_dental,
    //                   "farmaco": farmaco,
    //                   "id_dosis_medicamento_ficha_dental": id_dosis_medicamento_ficha_dental,
    //                   "dosis_medicamento_ficha_dental": dosis_medicamento_ficha_dental,
    //                   "id_frecuencia_medicamento_ficha_dental": id_frecuencia_medicamento_ficha_dental,
    //                   "frecuencia_medicamento_ficha_dental": frecuencia_medicamento_ficha_dental,
    //                   "id_via_administracion_ficha_dental": id_via_administracion_ficha_dental,
    //                   "via_administracion_ficha_dental": via_administracion_ficha_dental,
    //                   "observaciones_medicamento_ficha_dental": observaciones_medicamento_ficha_dental,
    //                   "medicamento_uso_cronico": medicamento_uso_cronico,
    //               }

    //               agregarMedicamentoReceta(parametros, 1);

    //               // var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

    //               // var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +

    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
    //               //                 '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_dosis_medicamento_ficha_dental + '</td>' +
    //               //                 '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_frecuencia_medicamento_ficha_dental + '</td>' +
    //               //                 '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

    //               //                 '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
    //               //                 '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

    //               //                 '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(\'row' + i + '\');"><i class="fas fa-trash"></i></div></td>'+
    //               //             '</tr>';

    //               // i++;

    //               // $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

    //               /** enviando a table de medicamento faltante */
    //               if ($('#id_medicamento_ficha_dental').val() == '') {
    //                   $('#med_faltante').val(nombre_medicamento_ficha_dental);
    //                   enviar_medicamento_faltante_sdi();
    //               }

    //               limpiar_campos_medicamento_sdi();
    //               //$("#adicionados").append(nFilas - 1);
    //               //$("#sub_tipo_examen").empty();
    //               //$("#nro_orden").disabled();

    //           } else {
    //               swal({
    //                   title: "Ingreso de medicamento(s).",
    //                   text: mensaje,
    //                   icon: "error",
    //                   // buttons: "Aceptar",
    //                   //SuccessMode: true,
    //               });
    //           }
    //       } else {
    //           swal({
    //               title: "Ingreso de medicamento(s).",
    //               text: 'El medicamento está Recetado',
    //               icon: "warning",
    //               // buttons: "Aceptar",
    //               //SuccessMode: true,
    //           });
    //       }
    //   }

      function indicar_medicamento_sdi_enf() {
          // Obtener valores del formulario de enfermería
          var nombre_medicamento_ficha_dental = $('#nom_medic_adm').val();
          var id_medicamento = $('#id_medicamento_adm_enf').val();
          var farmaco = ''; // Este campo no parece estar en el formulario de enfermería

          var id_dosis_medicamento_ficha_dental = $('#dosis_receta_enf').val();
          var dosis_medicamento_ficha_dental = $('#dosis_receta_enf option:selected').text();

          var id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_enf').val();
          var frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_enf option:selected').text();

          var id_via_administracion_ficha_dental = $('#via_ttoy').val();
          var via_administracion_ficha_dental = $('#via_ttoy option:selected').text();

          var observaciones_medicamento_ficha_dental = $('#tolerancia_efectos_adversos').val();

          // Obtener ID de la enfermera (profesional actual)
          var id_enfermera = $('#id_profesional_fc').val();

          // Validar lista de medicamentos ya agregados
          var lista_med = [];
          $('#tbody_tabla_medicamento_cirugia_sdi_enfermera tr').each(function(i, n) {
              if (i > 0) {
                  var data = $(this).find("td");
                  lista_med.push($.trim($(data[1]).text().split("\n").join("")));
              }
          });

          if ($.inArray(id_medicamento, lista_med) == -1) {
              var valido = 0;
              var mensaje = '';

              // Validaciones
              if ($.trim(nombre_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Medicamento.\n';
              }

              if ($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 ||
                  dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental ==
                  'Seleccione') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Dosis.\n';
              }

              if ($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 ||
                  frecuencia_medicamento_ficha_dental == 'Seleccione una opción' ||
                  frecuencia_medicamento_ficha_dental == 'Seleccione') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Posología.\n';
              }

              if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                      via_administracion_ficha_dental) == 'Seleccione') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Vía de Administración.\n';
              } else if ($('#via_ttoy').val() == 8) {
                  var via_tto_otroy = $('#via_tto_otroy').val();
                  if ($.trim(via_tto_otroy) == '') {
                      valido = 1;
                      mensaje += 'Debe ingresar Otra Vía Administración\n';
                  } else {
                      via_administracion_ficha_dental = via_tto_otroy;
                  }
              }

              if (valido == 0) {
                  $('.medicamentos_sin_registros').remove();

                  if (myDropzone_receta_enf) {
                      if (myDropzone_receta_enf.getUploadingFiles().length > 0 || myDropzone_receta_enf.getQueuedFiles().length > 0) {
                          swal({
                              title: "Espere la carga",
                              text: "Aun hay archivos subiendose. Espere a que finalice la carga para continuar.",
                              icon: "warning",
                              button: "Aceptar",
                          });
                          return;
                      }
                      cargar_lista_archivo_receta_enf(myDropzone_receta_enf);
                  }

                  // Preparar parámetros para el AJAX
                  let url = "{{ route('detalle_receta.registro_receta') }}";
                  let id_paciente = $('#id_paciente').val();
                  let selectedOption = $('#dosis_receta_enf option:selected');
                  let id_responsable = $('#resp_adm_tto').val();
                  if(id_responsable == null || id_responsable == '' || id_responsable == 0){
                    swal({
                        title: "Error",
                        text: "Debe seleccionar un responsable para el tratamiento.",
                        icon: "error",
                        button: "Aceptar",
                    });
                    return;
                  }
                  let dataId = selectedOption.data('id');
                  var _token = CSRF_TOKEN;
                  let input_lista_archivo_receta_enf = $('#input_lista_archivo_receta_enf').val();

                  $.ajax({
                      url: url,
                      type: "POST",
                      data: {
                          _token: _token,
                          id_ficha: $('#id_fc').val(),
                          id_lugar_atencion: $('#id_lugar_atencion').val(),
                          id_tipo_control: 0, // La enfermería no tiene tipo control específico
                          id_medicamento: id_medicamento,
                          nombre_medicamento_ficha_dental: nombre_medicamento_ficha_dental,
                          id_dosis_medicamento_ficha_dental: dataId,
                          nombre_dosis_ficha_dental: dosis_medicamento_ficha_dental,
                          nombre_frecuencia_ficha_dental: frecuencia_medicamento_ficha_dental,
                          id_frecuencia_medicamento_ficha_dental: id_frecuencia_medicamento_ficha_dental,
                          via_administracion: via_administracion_ficha_dental,
                          id_via_administracion: id_via_administracion_ficha_dental,
                          farmaco: farmaco,
                          observaciones: observaciones_medicamento_ficha_dental,
                          uso_cronico: 0,
                          id_paciente: id_paciente,
                          id_responsable: id_responsable,
                          receta_am: 1,
                          id_enfermera: id_enfermera, // Campo adicional para identificar que lo guardó enfermería
                          input_lista_archivo_receta_enf: input_lista_archivo_receta_enf
                      },
                      success: function(resp) {
                          console.log(resp);
                          let mensaje = resp.status;
                          if (mensaje == 'success') {
                              let medicamentos = resp.data;
                              let table = $('#tabla_med_adm_hosp').DataTable();
                              table.clear().draw();

                              medicamentos.forEach(medicamento => {
                                  console.log(medicamento);

                                  // Determinar texto de tiempo restante
                                  let tiempoRestante = '-';
                                  if (medicamento.tiempo_transcurrido) {
                                      tiempoRestante = 'Hace: ' + medicamento.tiempo_transcurrido;
                                  }

                                  // Determinar estado del checkbox (checked si estado_tratamiento == 1)
                                  let estadoCheckox = medicamento.estado_tratamiento == 1 ? 'checked' : '';
                                  let estadoLabel = medicamento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE';
                                  let botonEstilo = medicamento.estado_tratamiento == 1 ? 'btn-secondary' : 'btn-success';
                                  let botonDisabled = medicamento.estado_tratamiento == 1 ? 'disabled' : '';

                                  // Construir fila con estructura correcta
                                  let fila = `
                                    <tr id="row${medicamento.id}">
                                        <td class="text-center align-middle" style="display:none">${medicamento.id}</td>
                                        <td class="text-center align-middle" style="display:none">${medicamento.id_responsable || ''}</td>
                                        <td class="text-center align-middle" id="repeticiones_medicamento_${medicamento.id}">${medicamento.contador_dosis || 0}</td>
                                        <td class="text-center align-middle">
                                            ${medicamento.nombre_medicamento || '-'}
                                            <br><small>${medicamento.farmaco || ''}</small>
                                        </td>
                                        <td class="text-center align-middle">${medicamento.nombre_frecuencia || medicamento.indicaciones || '-'}</td>
                                        <td class="text-center align-middle" id="tiempo_restante_${medicamento.id}">
                                            <span>${tiempoRestante}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-sm btn-icon ${botonEstilo}" id="btn_administrar_${medicamento.id}" onclick="administrar_medicamento(${medicamento.id})" ${botonDisabled}>
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente_enf${medicamento.id}" ${estadoCheckox} disabled onchange="cambiarTextoLabelTratamiento(${medicamento.id})">
                                                <label for="registro_alternativo_paciente_enf${medicamento.id}" class="cr"></label>
                                            </div>
                                            <label id="label_tratamiento_enf_${medicamento.id}">${estadoLabel}</label>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tratamiento_finalizado${medicamento.id}">
                                                <label for="tratamiento_finalizado${medicamento.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="agregarObservacionesTratamiento(${medicamento.id},'${medicamento.nombre_medicamento || '-'}')">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_medicamento_sdi_enf(${medicamento.id})">
                                                <i class="feather icon-trash-2"></i>
                                            </button>
                                        </td>
                                    </tr>`;

                                  table.row.add($(fila)).draw(false);
                              });

                              swal({
                                  title: "Medicamento Agregado",
                                  text: "El tratamiento ha sido registrado correctamente",
                                  icon: "success",
                              });

                              // Limpiar campos del formulario
                              limpiar_campos_medicamento_sdi_enf();
                              $('#input_lista_archivo_receta_enf').val('');
                              if (myDropzone_receta_enf) {
                                  myDropzone_receta_enf.removeAllFiles(true);
                              }
                          }
                      },
                      error: function(error) {
                          console.log(error.responseText);
                          swal({
                              title: "Error",
                              text: "Ocurrió un error al guardar el medicamento",
                              icon: "error",
                          });
                      }
                  });

              } else {
                  swal({
                      title: "Ingreso de medicamento(s).",
                      text: mensaje,
                      icon: "error",
                  });
              }
          } else {
              swal({
                  title: "Ingreso de medicamento(s).",
                  text: 'El medicamento ya está registrado',
                  icon: "warning",
              });
          }
      }

      function limpiar_campos_medicamento_sdi_enf() {
          $('#nom_medic_adm').val('');
          $('#id_medicamento_adm_enf').val('');
          $('#dosis_receta_enf').val('');
          $('#frecuencia_medicamento_ficha_enf').val('');
          $('#via_ttoy').val('0');
          $('#tolerancia_efectos_adversos').val('');
          $('#via_tto_otroy').val('');
          $('#div_via_tto_otroy').hide();
      }

      function eliminar_medicamento_sdi(id) {
          swal({
              title: "Eliminar Medicamento",
              text: "¿Está seguro de eliminar el medicamento?",
              icon: "warning",
              buttons: ["Cancelar", "Aceptar"],
              dangerMode: true,
          }).then((willDelete) => {
              if (willDelete) {
                  let url = "{{ route('detalle_receta.eliminar') }}";
                  var _token = CSRF_TOKEN;
                  $.ajax({
                      url: url,
                      type: "POST",
                      data: {
                          _token: _token,
                          id: id,
                      },
                      success: function(resp) {
                          console.log(resp);
                          let mensaje = resp.status;
                          if (mensaje == 'success') {
                              let medicamentos = resp.data;

                              // Destruir DataTable si existe
                              if ($.fn.DataTable.isDataTable(
                                      '#tabla_medicamento_cirugia_sdi_enfermera_adm')) {
                                  $('#tabla_medicamento_cirugia_sdi_enfermera_adm').DataTable()
                                      .destroy();
                              }

                              $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                              $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm').empty();
                              $('#tbody_tabla_medicamento_manual').empty();
                              $('#tabla_tratamientos_servicio tbody').empty();
                              medicamentos.forEach(medicamento => {
                                  console.log(medicamento);
                                  if (medicamento.id_dosis == null) {
                                      medicamento.dosis = medicamento.nombre_dosis;
                                  }

                                  if (medicamento.id_frecuencia == null || medicamento
                                      .id_frecuencia == 0) {
                                      medicamento.indicaciones = medicamento
                                          .nombre_frecuencia;
                                  }

                                  // Fila para tabla de tratamientos servicio (común para todos)
                                  let fila_ = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td><input type="text" disabled></td>
                                            <td class="p-0">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="tratamiento_listo${medicamento.id}">
                                                    <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                                </div><br>
                                                <label>Listo</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                            </td>
                                            <td><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"> </i></button> </td>
                                        </tr>`;

                                  // Medicamentos SIN id_enfermera (null o 0) - Indicados por el médico
                                  if (!medicamento.id_enfermera || medicamento.id_enfermera ==
                                      null || medicamento.id_enfermera == 0 || medicamento
                                      .id_enfermera === undefined) {
                                      // Fila para tabla del médico
                                      var fila_medico = `<tr id="row${medicamento.id}">
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                            <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                            <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                        </tr>`;

                                      // Fila para tabla de enfermería (para que puedan administrar los medicamentos del médico)
                                                                            var fila_enf_medico = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                                                                <td class="text-center align-middle text-wrap" id="repeticiones_medicamento_${medicamento.id}">${medicamento.contador_dosis || 1}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco || ''}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental || ''}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental || ''}</td>
                                        <td class="text-center align-middle text-wrap hidden">${medicamento.indicaciones || ''}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion || ''}</td>
                                        <td class="text-center align-middle" id="tiempo_restante_${medicamento.id}">
                                            ${medicamento.estado_tratamiento == 1 && medicamento.tiempo_transcurrido ? '<span>Hace: ' + medicamento.tiempo_transcurrido + '</span>' : '<span>-</span>'}
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento_enf(${medicamento.id})" id="btn_administrar_${medicamento.id}">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente_enf_adm${medicamento.id}" onchange="cambiarTextoLabelTratamiento(${medicamento.id})" ${medicamento.estado_tratamiento == 1 ? 'checked' : ''}>
                                                <label for="registro_alternativo_paciente_enf_adm${medicamento.id}" class="cr"></label>
                                            </div>
                                            <label id="label_tratamiento_enf_adm_${medicamento.id}">${medicamento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tratamiento_finalizado_enf_adm${medicamento.id}" onchange="finalizar_tratamiento_enf(${medicamento.id})" ${medicamento.finalizado == 1 ? 'checked' : ''}>
                                                <label for="tratamiento_finalizado_enf_adm${medicamento.id}" class="cr"></label>
                                            </div>
                                        </td>
                                    </tr>`;

                                      $('#tbody_tabla_medicamento_cirugia_sdi').append(
                                          fila_medico);
                                      $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm')
                                          .append(fila_enf_medico);
                                      $('#tbody_tabla_medicamento_manual').append(
                                      fila_medico);
                                  }

                                  // Medicamentos CON id_enfermera (> 0) - Creados por enfermería
                                  // if(medicamento.id_enfermera && medicamento.id_enfermera != null && medicamento.id_enfermera !== undefined && medicamento.id_enfermera > 0){
                                  //     var fila_enf = `<tr id="row${medicamento.id}">
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                //         <td class="text-center align-middle text-wrap">${medicamento.contador_dosis || 1}</td>
                                //         <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco || ''}</td>
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental || ''}</td>
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental || ''}</td>
                                //         <td class="text-center align-middle text-wrap hidden">${medicamento.indicaciones || ''}</td>
                                //         <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion || ''}</td>
                                //         <td class="text-center align-middle text-wrap">${medicamento.via_administracion || ''}</td>
                                //         <td class="text-center align-middle" id="tiempo_restante_${medicamento.id}">
                                //             ${medicamento.estado_tratamiento == 1 && medicamento.tiempo_transcurrido ? '<span>Hace: ' + medicamento.tiempo_transcurrido + '</span>' : '<span>-</span>'}
                                //         </td>
                                //         <td class="text-center align-middle">
                                //             <button class="btn btn-success btn-sm btn-icon" onclick="administrar_medicamento_enf(${medicamento.id})" id="btn_administrar_${medicamento.id}">
                                //                 <i class="fas fa-check"></i>
                                //             </button>
                                //         </td>
                                //         <td class="text-center align-middle">
                                //             <div class="switch switch-success d-inline m-r-10">
                                //                 <input type="checkbox" id="registro_alternativo_paciente_enf_adm${medicamento.id}" onchange="cambiarTextoLabelTratamiento(${medicamento.id})" ${medicamento.estado_tratamiento == 1 ? 'checked' : ''}>
                                //                 <label for="registro_alternativo_paciente_enf_adm${medicamento.id}" class="cr"></label>
                                //             </div>
                                //             <label id="label_tratamiento_enf_adm_${medicamento.id}">${medicamento.estado_tratamiento == 1 ? 'ADMINISTRADO' : 'PENDIENTE'}</label>
                                //         </td>
                                //         <td class="text-center align-middle">
                                //             <div class="switch switch-success d-inline m-r-10">
                                //                 <input type="checkbox" id="tratamiento_finalizado_enf_adm${medicamento.id}" onchange="finalizar_tratamiento_enf(${medicamento.id})" ${medicamento.finalizado == 1 ? 'checked' : ''}>
                                //                 <label for="tratamiento_finalizado_enf_adm${medicamento.id}" class="cr"></label>
                                //             </div>
                                //         </td>
                                //     </tr>`;
                                  //     $('#tbody_tabla_medicamento_cirugia_sdi_enfermera_adm').append(fila_enf);
                                  // }

                                  $('#tabla_tratamientos_servicio tbody').append(fila_);
                              });

                              // Reinicializar DataTable para tabla de enfermería
                              if ($('#tabla_medicamento_cirugia_sdi_enfermera_adm tbody tr').length >
                                  0) {
                                  $('#tabla_medicamento_cirugia_sdi_enfermera_adm').DataTable({
                                      "language": {
                                          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                                      },
                                      "order": [
                                          [2, "asc"]
                                      ],
                                      "pageLength": 10,
                                      "columnDefs": [{
                                          "targets": [0, 1, 4, 5, 6, 7],
                                          "visible": false
                                      }],
                                      "autoWidth": false,
                                      "responsive": false
                                  });
                              }

                              swal({
                                  title: "Medicamento Eliminado",
                                  icon: "success",
                                  // buttons: "Aceptar",
                                  //SuccessMode: true,
                              });
                          }
                      },
                      error: function(error) {
                          console.log(error.responseText);
                      }
                  })
              }
          });
      }

      function enviar_medicamento_faltante_sdi() {
          var med_faltante = $.trim($('#med_faltante').val());
          var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

          if (med_faltante != '') {
              /** registro */
              let url = "{{ route('medicamentoFaltante.registro') }}";


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
                  .done(function(data) {

                      if (data !== 'null') {
                          //data = JSON.parse(data);
                          console.log('-----------------------');
                          console.log(data);
                          console.log('-----------------------');
                          if (data.estado == 1) {
                              swal({
                                  title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                                  icon: "success",
                                  // buttons: "Aceptar",
                                  //SuccessMode: true,
                              });
                              $('#med_faltante').val('');
                              $('#no_existe_switch').prop("checked", false);
                              $('#no_existe').hide();

                          } else {

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

          } else {
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

      function ver_medicamento_ficha_medica_sdi() {

          let url = "{{ route('profesional.receta.ver') }}";

          var _token = CSRF_TOKEN;
          var id_ficha = $('#id_fc').val();
          $('#tabla_medicamento_cirugia_sdi').html('');

          $.ajax({

                  url: url,
                  type: "GET",
                  data: {
                      _token: _token,
                      id_ficha: id_ficha
                  },
              })
              .done(function(data) {

                  if (data !== 'null') {
                      //data = JSON.parse(data);
                      console.log('----------ver_medicamento_ficha_medica_sdi-------------');
                      console.log(data);
                      console.log('-----------------------');
                      var html = '';
                      html += '<thead>';
                      html += '    <tr>';
                      html +=
                          '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_tipo_control</td>';
                      html +=
                          '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_producto</td>';
                      html += '        <td class="text-center align-middle text-wrap">Medicamentos</td>';
                      html +=
                          '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">Farmaco</td>';
                      html +=
                          '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_presentacion</td>';
                      html += '        <td class="text-center align-middle text-wrap">Presentación</td>';
                      html +=
                          '        <td class="text-center align-middle text-wrap" hidden="hidden">id_receta_dosis</td>';
                      html += '        <td class="text-center align-middle text-wrap hidden">Posología</td>';
                      html +=
                          '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_via_administracion</td>';
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

                      if (data.estado == 1) {
                          var i = 1;
                          $.each(data.registros, function(index, value) {
                              console.log(value);
                              if (value.detalle.length > 0) {
                                  $.each(value.detalle, function(index_2, value_2) {

                                      html += '<tr class="tabla_medicamento_cirugia_sdi" id="row' +
                                          i + '">';
                                      html +=
                                          '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                          value_2.id_tipo_control + '</td>';

                                      if (value_2.id_tipo_control == 8) {
                                          html +=
                                              '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                              value_2.producto + '</td>';

                                          var data = value_2.producto;
                                          arr = $.parseJSON(data);
                                          var text_producto = '';
                                          $.each(arr, function(key, value) {
                                              text_producto += '' + value.nombre + ': ' +
                                                  value.cantidad + '<br/>';
                                          });

                                          html += '<td class="text-center align-middle text-wrap">' +
                                              text_producto + '</td>';
                                      } else {
                                          html +=
                                              '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                              value_2.id_producto + '</td>';
                                          html += '<td class="text-center align-middle text-wrap">' +
                                              value_2.producto + '</td>';
                                      }

                                      html +=
                                          '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                          value_2.farmaco + '</td>';

                                      html +=
                                          '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                          value_2.id_presentacion + '</td>';
                                      html += '<td class="text-center align-middle text-wrap">' +
                                          value_2.presentacion + '</td>';

                                      html +=
                                          '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                          value_2.id_receta_dosis + '</td>';
                                      html += '<td class="text-center align-middle text-wrap">' +
                                          value_2.posologia + '</td>';

                                      html +=
                                          '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                                          value_2.id_via_administracion + '</td>';
                                      html += '<td class="text-center align-middle text-wrap">' +
                                          value_2.via_administracion + '</td>';

                                      {{--  html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_periodo + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.periodo + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.uso_cronico + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.cantidad + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.cantidad_compra + '</td>';  --}}

                                      html +=
                                          '<td class="text-center align-middle text-wrap"><div name="remove" id="' +
                                          i +
                                          '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' +
                                          i + '\');">Quitar</div></td>';
                                      html += '</tr>';
                                      i++;
                                  });
                              }
                          });
                      } else {
                          html += '<tr class="medicamentos_sin_registros">';
                          html += '    <td class="text-center align-middle " colspan="15">' + data.msj + '</td>';
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

      function alerta_registro_medicamento_sdi() {

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
                  let controles_ciclo = resp.controles_ciclo;

                  if (mensaje == 'OK') {
                      swal({
                          title: 'Éxito',
                          text: 'Evolución agregada correctamente',
                          icon: 'success',
                          button: 'Aceptar'
                      });

                      // Limpiar formulario de nueva evolución
                      $('#contenedor_nueva_evolucion').empty();
                      idCounter++;

                      // Actualizar la tabla de controles de ciclo
                      if (controles_ciclo && controles_ciclo.length > 0) {
                          // Destruir DataTable si existe y limpiar
                          if ($.fn.DataTable.isDataTable('#tabla_cont_ciclo')) {
                              let table = $('#tabla_cont_ciclo').DataTable();
                              table.clear();
                              table.destroy();
                              $('#tabla_cont_ciclo').empty();
                          }

                          // Reconstruir estructura completa de la tabla con estilos originales
                          let tableHtml = '<thead>';
                          tableHtml += '<tr>';
                          tableHtml += '<th class="text-center align-middle" style="display:none">id</th>';
                          tableHtml += '<th class="text-center align-middle">Fecha/hora</th>';
                          tableHtml += '<th class="text-center align-middle">T°</th>';
                          tableHtml += '<th class="text-center align-middle">Pulso</th>';
                          tableHtml += '<th class="text-center align-middle">PAS</th>';
                          tableHtml += '<th class="text-center align-middle">PAD</th>';
                          tableHtml += '<th class="text-center align-middle">PAM</th>';
                          tableHtml += '<th class="text-center align-middle">FR</th>';
                          tableHtml += '<th class="text-center align-middle">Otros</th>';
                          tableHtml += '<th class="text-center align-middle">Estado</th>';
                          tableHtml += '<th class="text-center align-middle">Acciones</th>';
                          tableHtml += '</tr>';
                          tableHtml += '</thead>';
                          tableHtml += '<tbody>';

                          // Iterar sobre los controles_ciclo y agregar las filas
                          controles_ciclo.forEach(function(control, index) {
                              let datos = control.datos_evolucion;

                              // Formatear fecha y hora desde el campo created_at
                              let fechaHora = '';
                              if (control.created_at) {
                                  let fechaObj = new Date(control.created_at);
                                  let dia = String(fechaObj.getDate()).padStart(2, '0');
                                  let mes = String(fechaObj.getMonth() + 1).padStart(2, '0');
                                  let anio = fechaObj.getFullYear();
                                  let horas = String(fechaObj.getHours()).padStart(2, '0');
                                  let minutos = String(fechaObj.getMinutes()).padStart(2, '0');
                                  fechaHora = dia + '/' + mes + '/' + anio + ' ' + horas + ':' +
                                      minutos;
                              }

                              tableHtml += '<tr>';
                              tableHtml += '<td style="display:none">' + control.id + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + fechaHora +
                                  '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .temperatura || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pulso ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pas ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pad ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos.pam ||
                                  '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .frec_resp || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">';
                              tableHtml += 'HGT: ' + (datos.hemoglucotest || '') + '<br>';
                              tableHtml += 'GLASGOW: ' + (datos.glasgow || '') + '<br>';
                              tableHtml += 'EVA: ' + (datos.c_eva || '') + '<br>';
                              tableHtml += 'OTRAS: ' + (datos.otras_pruebas || '');
                              tableHtml += '</td>';
                              tableHtml += '<td class="text-center align-middle">' + (datos
                                  .gravedad_e_conc || '') + '</td>';
                              tableHtml += '<td class="text-center align-middle">';
                              tableHtml +=
                                  '<button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionAgregada(' +
                                  control.id + ')">';
                              tableHtml += '<i class="feather icon-x"></i></button>';
                              tableHtml += '</td>';
                              tableHtml += '</tr>';
                          });

                          tableHtml += '</tbody>';

                          // Insertar HTML completo en la tabla
                          $('#tabla_cont_ciclo').html(tableHtml);

                          // Reinicializar DataTable
                          $('#tabla_cont_ciclo').DataTable({
                              language: {
                                  url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                              },
                              responsive: true,
                              order: [
                                  [1, 'desc']
                              ], // Ordenar por fecha descendente (columna 1 ahora que hay ID)
                              pageLength: 10,
                              columnDefs: [{
                                      orderable: false,
                                      targets: -1
                                  }, // Deshabilitar ordenamiento en columna de acciones
                                  {
                                      visible: false,
                                      targets: 0
                                  } // Ocultar columna ID
                              ]
                          });
                      }
                  } else {
                      swal({
                          title: 'Error',
                          text: 'No se pudo agregar la evolución. Intente nuevamente.',
                          icon: 'error',
                          button: 'Aceptar'
                      });
                  }
              },
              error: function(error) {
                  console.log(error);
              }
          });
      }

      {{-- MEDICAMENTO MANUAL --}}

      function validar_via_administracion_manual_sdi() {
          if ($('#manual_via_administracion_ficha_dental').val() == 11) {
              $('#div_manual_observaciones_via_administracion_ficha_dental').show();
              $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
          } else {
              $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
              $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled', 'disabled');
              $('#manual_observaciones_via_administracion_ficha_dental').val('');
          }
      }

      function validar_periodo_manual_sdi() {
          if ($('#manual_periodo_ficha_dental').val() == 11) {
              $('#div_manual_observaciones_periodo_ficha_dental').show();
              $('#manual_observaciones_periodo_ficha_dental').removeAttr('disabled');
          } else {
              $('#div_manual_observaciones_periodo_ficha_dental').hide();
              $('#manual_observaciones_periodo_ficha_dental').attr('disabled', 'disabled');
              $('#manual_observaciones_periodo_ficha_dental').val('');
          }
      }

      function indicar_indicacion_sdi() {

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

          if ($.inArray(nombre_medicamento_ficha_dental, lista_med) == -1) {

              var medicamento_uso_cronico = 0;
              if ($('#manual_medicamento_uso_cronico').is(':checked'))
                  medicamento_uso_cronico = 1;

              var valido = 0;
              var mensaje = '';

              if ($.trim(nombre_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Medicamento.\n';
              }

              if ($.trim(tipo_control) == '0') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Tipo Control.\n';
              }

              if ($.trim(farmaco) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Farmaco.\n';
              }

              if ($.trim(dosis_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Presentación.\n';
              }

              if ($.trim(frecuencia_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Posología.\n';
              }


              if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                      via_administracion_ficha_dental) == 'Seleccione') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Via de Administración.\n';
              } else if ($('#via_administracion_ficha_dental').val() == 11) {
                  if ($.trim(observaciones_medicamento_ficha_dental) == '') {
                      valido = 1;
                      mensaje += 'Debe ingresar Otra Vía Administración\n';
                  } else {
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

              if (valido == 0) {
                  $('.medicamentos_sin_registros').remove()

                  var i = $('#tabla_medicamento_cirugia_sdi tr')
                  .length; //contador para asignar id al boton que borrara la fila


                  // var text = cantidad_comprar;
                  // var inicio = text.indexOf('(')+1;
                  // var fin = text.indexOf(')');
                  // var cantidad_num = text.substring(inicio, fin);


                  var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento +
                      '</td>' +
                      '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                      '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                      '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                      id_via_administracion_ficha_dental + '</td>' +
                      '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +
                      '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i +
                      '\');">Quitar</div></td>' +
                      '</tr>';

                  i++;

                  $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                  /** enviando a table de medicamento faltante */
                  if ($('#id_medicamento_ficha_dental').val() == '') {
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

              } else {
                  swal({
                      title: "Ingreso de medicamento(s).",
                      text: mensaje,
                      icon: "error",
                  });
              }
          } else {
              swal({
                  title: "Ingreso de medicamento(s).",
                  text: 'El medicamento está Recetado',
                  icon: "warning",
                  // buttons: "Aceptar",
                  //SuccessMode: true,
              });
          }
      }

      function indicar_medicamento_manual_sdi() {

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

          if ($.inArray(nombre_medicamento_ficha_dental, lista_med) == -1) {

              var medicamento_uso_cronico = 0;
              if ($('#manual_medicamento_uso_cronico').is(':checked'))
                  medicamento_uso_cronico = 1;

              var valido = 0;
              var mensaje = '';

              if ($.trim(nombre_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Medicamento.\n';
              }

              if ($.trim(tipo_control) == '0') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Tipo Control.\n';
              }

              if ($.trim(farmaco) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Farmaco.\n';
              }

              if ($.trim(dosis_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Presentación.\n';
              }

              if ($.trim(frecuencia_medicamento_ficha_dental) == '') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Posología.\n';
              }


              if ($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(
                      via_administracion_ficha_dental) == 'Seleccione') {
                  valido = 1;
                  mensaje += 'Debe completar el campo Via de Administración.\n';
              } else if ($('#via_administracion_ficha_dental').val() == 11) {
                  if ($.trim(observaciones_medicamento_ficha_dental) == '') {
                      valido = 1;
                      mensaje += 'Debe ingresar Otra Vía Administración\n';
                  } else {
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

              if (valido == 0) {
                  $('.medicamentos_sin_registros').remove()

                  var i = $('#tabla_medicamento_cirugia_sdi tr')
                  .length; //contador para asignar id al boton que borrara la fila


                  // var text = cantidad_comprar;
                  // var inicio = text.indexOf('(')+1;
                  // var fin = text.indexOf(')');
                  // var cantidad_num = text.substring(inicio, fin);


                  var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento +
                      '</td>' +
                      '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                      '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                      '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' +
                      id_via_administracion_ficha_dental + '</td>' +
                      '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                      '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +
                      '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i +
                      '\');">Quitar</div></td>' +
                      '</tr>';

                  i++;

                  $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                  /** enviando a table de medicamento faltante */
                  if ($('#id_medicamento_ficha_dental').val() == '') {
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

              } else {
                  swal({
                      title: "Ingreso de medicamento(s).",
                      text: mensaje,
                      icon: "error",
                  });
              }
          } else {
              swal({
                  title: "Ingreso de medicamento(s).",
                  text: 'El medicamento está Recetado',
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

      function agregar_componente() {
          var cant = $('.componente').length + 1;
          var html = '';
          html += '<div class="form-row componente">';
          html += '    <div class="col-sm-8 mt-6">';
          html += '        <div class="form-group">';
          html += '            <label class="floating-label-activo-sm">Ingrese los Compuestos</label>';
          html +=
              '            <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">';
          html += '        </div>';
          html += '    </div>';
          html += '    <div class="col-sm-4 mt-6">';
          html += '        <div class="form-group">';
          html += '            <label class="floating-label-activo-sm">Ingrese la cantidad</label>';
          html +=
              '            <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">';
          html += '        </div>';
          html += '    </div>';
          html += '</div>';

          $('.div_componentes').append(html);
      }

      function cargarCantidadComprar(cantidad, unidad, input) {
          var valor = $('#' + cantidad).val();
          var valor_text = $('#' + cantidad + ' option:selected').text();
          var unid = $('#' + unidad).val();
          $('#' + input).val(valor_text + ' ' + unid);
          $('#' + input + '_label').html(valor_text + ' ' + unid);
      }

      // Función para administrar medicamento desde enfermería
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
                            ficha_atencion_id: $('#id_fc').val(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.mensaje == 'OK') {
                                // Buscar el medicamento actualizado en la respuesta (estructura antigua o nueva)
                                let medicamento_actualizado = null;
                                if (response.receta) {
                                    if (Array.isArray(response.receta)) {
                                        // Buscar por id o por id_detalle según la estructura
                                        medicamento_actualizado = response.receta.find(m => m.id == id_tratamiento || m.id_detalle == id_tratamiento);
                                    } else if (response.receta.id == id_tratamiento || response.receta.id_detalle == id_tratamiento) {
                                        medicamento_actualizado = response.receta;
                                    }
                                }

                                // Actualizar el checkbox de estado
                                $('#registro_alternativo_paciente_enf_adm' + id_tratamiento).prop('checked', true);
                                $('#label_tratamiento_enf_adm_' + id_tratamiento).html('ADMINISTRADO');

                                // Actualizar tiempo restante a "0 minutos"
                                $('#tiempo_restante_' + id_tratamiento).html('<span>Hace: 0 minutos</span>');

                                // Actualizar el contador de dosis en la fila (nuevo campo: contador_dosis)
                                if (medicamento_actualizado && (medicamento_actualizado.contador_dosis || medicamento_actualizado.contador_dosis === 0)) {
                                    $('#repeticiones_medicamento_' + id_tratamiento).text(medicamento_actualizado.contador_dosis);
                                }

                                // Si hay otros campos nuevos que quieras actualizar en la UI, agrégalos aquí

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
                        error: function(error) {
                            console.log(error);
                            swal({
                                title: "Error",
                                text: "Ocurrió un error al administrar el medicamento",
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    });
                }
            });
        }

        function finalizar_tratamiento_enf(id_tratamiento) {
            let $checkbox = $('#tratamiento_finalizado_enf_adm' + id_tratamiento);
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

      function eliminar_evolucion_hosp(id_evolucion) {
          swal({
              title: "¿Eliminar evolución médica?",
              text: "Una vez eliminada, no podrá recuperarla.",
              icon: "warning",
              buttons: ["Cancelar", "Eliminar"],
              dangerMode: true,
          }).then((willDelete) => {
              if (willDelete) {
                  let url = "{{ route('profesional.eliminar_evolucion_profesional_hosp') }}";
                  $.ajax({
                      url: url,
                      type: 'POST',
                      data: {
                          id_evolucion: id_evolucion,
                          _token: '{{ csrf_token() }}'
                      },
                      success: function(response) {
                          if (response.mensaje == 'OK') {
                              // Eliminar la fila de la tabla usando DataTables
                              let tabla = $('#tabla_evol_hosp').DataTable();

                              // Buscar la fila que contiene el ID de la evolución
                              tabla.rows().every(function() {
                                  let data = this.data();
                                  // El ID está en la primera columna (índice 0)
                                  if (data && data[0] == id_evolucion) {
                                      this.remove();
                                  }
                              });

                              // Redibujar la tabla
                              tabla.draw();

                              swal({
                                  title: "Éxito",
                                  text: "Evolución médica eliminada correctamente",
                                  icon: "success",
                                  button: "Aceptar",
                              });
                          } else {
                              swal({
                                  title: "Error",
                                  text: response.mensaje ||
                                      "No se pudo eliminar la evolución médica",
                                  icon: "error",
                                  button: "Aceptar",
                              });
                          }
                      },
                      error: function(error) {
                          console.log(error);
                          swal({
                              title: "Error",
                              text: "Ocurrió un error al eliminar la evolución médica",
                              icon: "error",
                              button: "Aceptar",
                          });
                      }
                  });
              }
          });
      }

      function editar_evolucion_hosp(id_evolucion) {
          let evolucion_text = $('#evolucion_medica_text_' + id_evolucion).text().trim();

          $('#evolucion_medica_textarea_' + id_evolucion).val(evolucion_text);
          $('#evolucion_medica_display_' + id_evolucion).hide();
          $('#modalEditarEvolucionProfesionalHosp').show();
      }

      function agregarEvolucionPacienteHospital(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var evolucion = $('#evolucion' + id).val();
        var resumen = $('#resumen_evolucion' + id).val();

        var idPaciente = $('#id_paciente').val();

        var valido = 1;
        var mensaje = '';

        if (evolucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Evolucion\n';
        }
        if (resumen == '') {
            valido = 0;
            mensaje += 'Campo requerido Resumen\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var data = {
            id_paciente: idPaciente,
            evolucion: evolucion,
            resumen: resumen,
            _token: '{{ csrf_token() }}'
        }

        console.log(data);

        let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
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

    function eliminarEvolucionPacienteHospital(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function registrar_salida_paciente(){
        var destino = $('#dest').val();
        var medio_traslado = $('#trasl_en').val();
        var condiciones = $('#cond_alt').val();
        var indicaciones_medicas = $('#obs_hospitalizar').val();
        var resultado_examenes = $('#fl_resultado_ex').val();

        var valido = 1;
        var mensaje = '';

        if(destino == 0){
            valido = 0;
            mensaje += 'Campo requerido Destino\n';
        }
        if(medio_traslado == 0){
            valido = 0;
            mensaje += 'Campo requerido Medio de traslado\n';
        }
        if(condiciones == 0){
            valido = 0;
            mensaje += 'Campo requerido Condiciones\n';
        }
        if(indicaciones_medicas == ''){
            valido = 0;
            mensaje += 'Campo requerido Indicaciones médicas\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }
    }

    function guardar_evolucion_hospital(){
        let evolucion = $('#evolucion1').val();
        let resumen = $('#resumen_evolucion').val();
        let id_paciente = $('#id_paciente').val();

        let valido = 1;
        let mensaje = '';

        if(evolucion == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Evolución</li>';
        }
        if(resumen == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Resumen</li>';
        }

        if(valido == 0){
           return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            evolucion: evolucion,
            resumen: resumen,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        }

        let url = '{{ ROUTE("adm_hospital.registrar_evolucion_paciente_hosp") }}';
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });

    }

    function generar_pdf_hospitalizacion() {
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        let hospen = $('#hospen').val();
        let hospen_text = $('#hospen option:selected').text();
        let nom_inst = $('#nom_inst').val();
        let hosp_enserv = $('#hosp_enserv').val();
        let hos_enserv_text = $('#hosp_enserv option:selected').text();
        let motivo_hosp = $('#motivo_hosp').val();
        let motivo_hosp_text = $('#motivo_hosp option:selected').text();
        let obs_hospitalizar = $('#obs_hospitalizar').val();
        let ingreso_sol_pab_modal_otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes').val();
        let ingreso_sol_pab_modal_otros_antecedentes_text = $('#ingreso_sol_pab_modal_otros_antecedentes option:selected').text();

        // Nuevos campos
        let hosp_origen = $('#hosp_en').val();
        let diagn_ingreso = $('#dg_ingreso').val();
        let serv_hosp = $('#serv_hosp').val();
        let prepararCirugia = $('#esp-3').is(':checked') ? 1 : 0;
        let otras_ind = $('#otras_ind').val();

        let motivo_hosp_indicaciones = $('#motivo_hosp_indicaciones').val();
        let ind_grales_hosp = $('#ind_grales_hosp').val();
        let nombre_medicamento_indicaciones = $('#nombre_medicamento_indicaciones').val();
        let dosis_medicamento_indicaciones = $('#dosis_medicamento_indicaciones').val();
        let frecuencia_medicamento_indicaciones = $('#frecuencia_medicamento_indicaciones').val();
        let control_enfermeria_hosp = $('#control_enfermeria_hosp').val();
        let control_enfermeria_hosp_text = $('#control_enfermeria_hosp option:selected').text();

        let otras_ind_hosp = $('#otras_ind_hosp').val();

        // Validación
        let valido = 1;
        let mensaje = '';
        if (motivo_hosp == 0) {
            valido = 0;
            mensaje += '<li>Motivo de hospitalización</li>';
        }

        if (nom_inst == '') {
            valido = 0;
            mensaje += '<li>Nombre de la institución</li>';
        }

        if(ind_grales_hosp == ''){
            valido = 0;
            mensaje += '<li>Indicaciones examenes preparación</li>';
        }

        if(control_enfermeria_hosp == 0){
            valido = 0;
            mensaje += '<li>Control de enfermería</li>';

        }

        // if (ingreso_sol_pab_modal_otros_antecedentes == '') {
        //     valido = 0;
        //     mensaje += '<li>Observaciones antecedentes médicos</li>';
        // }

        if (valido == 0) {
            $('#ingreso_m_modal').modal('hide');
            return swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            }).then(() => {
                $('#ingreso_m_modal').modal('show');
            });
        }

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                hospen: hospen,
                hospen_text: hospen_text,
                nom_inst: nom_inst,
                hosp_enserv: hosp_enserv,
                hosp_enserv_text: hos_enserv_text,
                motivo_hosp: motivo_hosp,
                motivo_hosp_text: motivo_hosp_text,
                obs_hospitalizar: obs_hospitalizar,
                ingreso_sol_pab_modal_otros_antecedentes: ingreso_sol_pab_modal_otros_antecedentes,
                ingreso_sol_pab_modal_otros_antecedentes_text: ingreso_sol_pab_modal_otros_antecedentes_text,
                hosp_origen: hosp_origen,
                diagn_ingreso: diagn_ingreso,
                serv_hosp: serv_hosp,
                preparar_cirugia: prepararCirugia,
                otras_ind: otras_ind,
                motivo_hosp_indicaciones: motivo_hosp_indicaciones,
                ind_grales_hosp: ind_grales_hosp,
                nombre_medicamento: nombre_medicamento_indicaciones,
                dosis_medicamento: dosis_medicamento_indicaciones,
                frecuencia_medicamento: frecuencia_medicamento_indicaciones,
                control_enfermeria: control_enfermeria_hosp,
                control_enfermeria_text: control_enfermeria_hosp_text,
                otras_indicaciones: otras_ind,
                medicamentos: "",
                _token: CSRF_TOKEN
            };

            let url = '{{ route("profesional.paciente.orden_hospitalizacion") }}';
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (resp) {
                    console.log(resp);
                    if (resp.success) {
                        let width = 800;
                        let height = 600;
                        let left = (screen.width - width) / 2;
                        let top = (screen.height - height) / 2;
                        window.open(resp.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        swal({
                            title: "PDF generado",
                            text: "El PDF ha sido generado correctamente.",
                            icon: "success",
                            buttons: "Aceptar",
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: resp.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function (error) {
                    console.log(error.responseText);
                }
            });
    }

    function guardar_hospitalizacion() {
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        let hospen = $('#hospen').val();
        let hospen_text = $('#hospen option:selected').text();
        let nom_inst = $('#nom_inst').val();
        let hosp_enserv = $('#hosp_enserv').val();
        let hos_enserv_text = $('#hosp_enserv option:selected').text();
        let motivo_hosp = $('#motivo_hosp').val();
        let motivo_hosp_text = $('#motivo_hosp option:selected').text();
        let obs_hospitalizar = $('#obs_hospitalizar').val();
        let ingreso_sol_pab_modal_otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes').val();
        let ingreso_sol_pab_modal_otros_antecedentes_text = $('#ingreso_sol_pab_modal_otros_antecedentes option:selected').text();

        // Nuevos campos
        let hosp_origen = $('#hosp_en').val();
        let diagn_ingreso = $('#dg_ingreso').val();
        let serv_hosp = $('#serv_hosp').val();
        let prepararCirugia = $('#esp-3').is(':checked') ? 1 : 0;
        let otras_ind = $('#otras_ind').val();

        let motivo_hosp_indicaciones = $('#motivo_hosp_indicaciones').val();
        let ind_grales_hosp = $('#ind_grales_hosp').val();
        let nombre_medicamento_indicaciones = $('#nombre_medicamento_indicaciones').val();
        let dosis_medicamento_indicaciones = $('#dosis_medicamento_indicaciones').val();
        let frecuencia_medicamento_indicaciones = $('#frecuencia_medicamento_indicaciones').val();
        let control_enfermeria_hosp = $('#control_enfermeria_hosp').val();
        let control_enfermeria_hosp_text = $('#control_enfermeria_hosp option:selected').text();

        let otras_ind_hosp = $('#otras_ind_hosp').val();


        let valido = 1;
        let mensaje = '';


        if (nom_inst == '') {
            valido = 0;
            mensaje += "<li>Debe ingresar el nombre de la institución.</li>";
        }

        if (motivo_hosp == '') {
            valido = 0;
            mensaje += "<li>Debe seleccionar un motivo de hospitalización.</li>";
        }


         if (valido == 0) {
            $('#ingreso_m_modal').modal('hide');
            return swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            }).then(() => {
                $('#ingreso_m_modal').modal('show');
            });
        }

        let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                hospen: hospen,
                hospen_text: hospen_text,
                nom_inst: nom_inst,
                hosp_enserv: hosp_enserv,
                hosp_enserv_text: hos_enserv_text,
                motivo_hosp: motivo_hosp,
                motivo_hosp_text: motivo_hosp_text,
                obs_hospitalizar: obs_hospitalizar,
                ingreso_sol_pab_modal_otros_antecedentes: ingreso_sol_pab_modal_otros_antecedentes,
                ingreso_sol_pab_modal_otros_antecedentes_text: ingreso_sol_pab_modal_otros_antecedentes_text,
                hosp_origen: hosp_origen,
                diagn_ingreso: diagn_ingreso,
                serv_hosp: serv_hosp,
                preparar_cirugia: prepararCirugia,
                otras_ind: otras_ind,
                motivo_hosp_indicaciones: motivo_hosp_indicaciones,
                ind_grales_hosp: ind_grales_hosp,
                nombre_medicamento: nombre_medicamento_indicaciones,
                dosis_medicamento: dosis_medicamento_indicaciones,
                frecuencia_medicamento: frecuencia_medicamento_indicaciones,
                control_enfermeria: control_enfermeria_hosp,
                otras_indicaciones: otras_ind,
                medicamentos: JSON.stringify(
                    (typeof medicamentos_hospitalizacion !== 'undefined' && Array.isArray(medicamentos_hospitalizacion))
                        ? medicamentos_hospitalizacion
                        : []
                ),
                _token: CSRF_TOKEN
        };

        console.log(data);

        $.ajax({
            url: '{{ route("profesional.paciente.guardar_hospitalizacion") }}',
            type: 'POST',
            data: data,
            success: function (resp) {
                console.log(resp);
                if (resp.success) {
                    swal({
                        title: "Guardado",
                        text: "La solicitud de hospitalización se guardó correctamente.",
                        icon: "success",
                        buttons: "Aceptar"
                    });
                } else {
                    swal({
                        title: "Error",
                        text: resp.mensaje || "Ocurrió un error al guardar.",
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                swal({
                    title: "Error",
                    text: "Ocurrió un error inesperado.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function mostrar_nuevo_medicamento(counter){
        let url = "{{ ROUTE('profesional.mostrar_nuevo_medicamento_hosp') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                $('#contenedor_nuevo_medicamento').empty();
                $('#contenedor_nuevo_medicamento').append(resp.v);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrar_nuevo_examen(counter){
            $('#contenedor_examenes_hosp').toggleClass('d-none');
        }

        function dame_examenes_hosp(){
            let id_ficha_atencion = $('#id_fc').val();
            let url = "{{ ROUTE('examen.dame_examenes_hosp') }}";

            $.ajax({
                type:'get',
                url: url,
                data:{
                    // id_ficha_atencion: id_ficha_atencion,
                    id_paciente: $('#id_paciente').val(),
                },
                success: function(examenes){
                    console.log(examenes);
                    let table = $('#tabla_examen_ficha_hosp').DataTable();
                    // Limpiar la tabla
                    table.clear();

                    // Agregar cada fila
                    examenes.forEach(examen => {
                        table.row.add([
                            examen.datos_examen.examen,
                            examen.datos_examen.tipo_examen,
                            examen.datos_examen.sub_tipo_examen,
                            examen.datos_examen.prioridad,
                            `<button type="button" onclick="eliminar_examen_hosp(${examen.id})" class="btn btn-danger btn-icon" disabled><i class="feather icon-x"></i></button>`
                        ]);
                    });

                    // Dibujar la tabla con los nuevos datos
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function dame_examenes_hosp_enfermera(){
            let id_ficha_atencion = $('#id_fc').val();
            let url = "{{ ROUTE('examen.dame_examenes_hosp') }}";

            $.ajax({
                type:'get',
                url: url,
                data:{
                    // id_ficha_atencion: id_ficha_atencion,
                    id_paciente: $('#id_paciente').val(),
                },
                success: function(examenes){
                    console.log(examenes);
                    let table = $('#tabla_examen_cirugia_enfermeria').DataTable();
                    // Limpiar la tabla
                    table.clear();

                    // Agregar cada fila y los 2 primeros campos ocultos
                    examenes.forEach(examen => {
                        table.row.add([
                            examen.datos_examen.examen,
                            examen.datos_examen.tipo_examen,
                            examen.datos_examen.sub_tipo_examen,
                            examen.datos_examen.prioridad,
                            examen.datos_examen.imagenologia_con_contraste,
                            `<div class="switch switch-success d-inline">
                                <input type="checkbox" id="examenes_hosp${examen.id}" ${examen.estado == 1 ? 'checked' : ''} onchange="cambiarTextoLabelExamen(${examen.id})">
                                <label for="examenes_hosp${examen.id}" class="cr"></label>
                            </div>
                            <br>
                            <label id="label_examen_paciente_hosp${examen.id}">${examen.estado == 1 ? 'REALIZADO' : 'PENDIENTE'}</label>
                            `
                        ]);
                    });

                    // Dibujar la tabla con los nuevos datos
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function eliminar_examen_hosp(id_examen){
                swal({
                    title: "Eliminar Examen",
                    text: "¿Está seguro que desea eliminar el examen?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        eliminar_examen_hosp_confirmar(id_examen);
                    }
                });
        }

        function eliminar_examen_hosp_confirmar(id_examen){
            console.log(id_examen);
            let url ="{{ ROUTE('examen.eliminar_examen_hosp') }}"
            $.ajax({
                type:'get',
                url: url,
                data:{
                    id: id_examen
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.estado == 1){
                        swal({
                            icon:'success',
                            text: resp.mensaje,
                        });
                        dame_examenes_hosp();
                    }
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }
  </script>
