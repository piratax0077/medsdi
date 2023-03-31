<div id="indicar_examen_oft" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_oft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen / Tratamientos Especialidad Oftalmología</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Oftalmología</label>
                                <select class="form-control form-control-sm" name="tipo_ex_lab_oft" id="tipo_ex_lab_oft" onchange="mostrar_otros('tipo_ex_lab_oft','div_otros_examen_oft','otro');buscar_examen_real('tipo_ex_lab_oft','real_tipo_ex_lab_oft');">
                                    <option value="">Seleccione</option>
                                    @if ($examenes_especialidad)
                                        @foreach ( $examenes_especialidad as $ex_esp)
                                            <option value="{{ $ex_esp->cod_examen }}"  data-multicodigo="" data-contraste="1">{{ $ex_esp->nombre_examen }}</option>
                                        @endforeach
                                    @endif
                                    {{-- <optgroup label="OÌDOS">
                                        <option value="989" data-multicodigo="">Audiometría Niños</option>
                                        <option value="988" data-multicodigo="">Audiometría Adultos</option>
                                        <option value="990" data-multicodigo="">Impedanciometría</option>
                                        <option value="547" data-multicodigo="">Examen Funcional 8º Par Completo</option>
                                        <option value="997" data-multicodigo="">Test de Glicerol</option>
                                        <option value="548" data-multicodigo="">Emisiones Oto-Acústicas</option>
                                        <option value="545" data-multicodigo="">BERA</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="978">Rinomanometría</option>
                                        <option value="8" data-multicodigo="229|243|334">Cultivo y Antibiograma Secreción nasal y Rcto. Eosinófilos</option>
                                    </optgroup>
                                    <optgroup label="FARINGO-LARÍNGE">
                                        <option value="550">Nasofibrolaringoscopía</option>
                                        <option value="11" data-multicodigo="229|243">Cultivo y Antibiograma Frotis Faríngeo Investigar Hongos</option>
                                        <option value="10" data-multicodigo="229|243">Cultivo y Antibiograma Frotis Faríngeo</option>
                                    </optgroup>
                                    <optgroup label="TRATAMIENTOS">
                                        <option value="12">Ejercicios de Rehabilitación Vestibular***</option>
                                        <option value="otro" data-multicodigo="">Otros</option>
                                    </optgroup> --}}
                                </select>
                                <label id="real_tipo_ex_lab_oft" class="f-10 highcharts-strong" data-id=""></label>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Lado</label>
                                <select class="form-control form-control-sm" id="lado_ex_lab_oft" name="lado_ex_lab_oft">
                                    <option value="0" selected>Seleccione</option>
                                    <option value="Derecho">Derecho</option>
                                    <option value="Izquierdo">Izquierdo</option>
                                    <option value="Bilateral">Bilateral</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-sm-6 mt-2" id="div_otros_examen_oft" style="display:none;">
                            <label id="" name="" class="floating-label-activo-sm">Otros Examen</label>
                            <input class="form-control form-control-sm" type="text" name="otro_examen_examen_oft" id="otro_examen_examen_oft" value="">
                        </div> --}}
                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Radiología</label>
                                <select class="form-control form-control-sm" name="tipo_ex_rx_oft" id="tipo_ex_rx_oft" onchange="mostrar_otros('tipo_ex_rx_oft','div_otros_examen_rx_oft','otro');buscar_examen_real('tipo_ex_rx_oft','real_tipo_ex_rx_oft');">
                                    <option value="">Seleccione</option>
                                    @if ($examenes_radiologicos)
                                        @foreach ( $examenes_radiologicos as $ex_radio)
                                            <option value="{{ $ex_radio->cod_examen }}"  data-multicodigo="" data-contraste="1">{{ $ex_radio->nombre_examen }}</option>
                                        @endforeach
                                    @endif
                                    {{-- <optgroup label="OÌDOS">
                                        <option value="468"  data-multicodigo="" data-contraste="1">TAC OIDO DERECHO CON CONTRASTE</option>
                                        <option value="468"  data-multicodigo="" data-contraste="0">TAC OIDO DERECHO SIN CONTRASTE</option>
                                        <option value="468"  data-multicodigo="" data-contraste="1">TAC OIDO IZQUIERDO CON CONTRASTE</option>
                                        <option value="468"  data-multicodigo="" data-contraste="0">TAC OIDO IZQUIERDO SIN CONTRASTE</option>
                                        <option value="510"  data-multicodigo="" data-contraste="1">RNM OIDO DERECHO CON CONTRASTE</option>
                                        <option value="510"  data-multicodigo="" data-contraste="0">RNM OIDO DERECHO SIN CONTRASTE</option>
                                        <option value="510"  data-multicodigo="" data-contraste="1">RNM OIDO IZQUIERDO CON CONTRASTE</option>
                                        <option value="510"  data-multicodigo="" data-contraste="0">RNM OIDO IZQUIERDO SIN CONTRASTE</option>
                                    </optgroup>
                                    <optgroup label="NARIZ">
                                        <option value="469"  data-multicodigo="" data-contraste="1">TAC NARIZ Y CAVIDADES PARANASALES CON CONTRASTE</option>
                                        <option value="469"  data-multicodigo="" data-contraste="0">TAC NARIZ Y CAVIDADES PARANASALES SIN CONTRASTE</option>
                                    </optgroup>
                                    <optgroup label="CUELLO Y GLANDULAS ANEXAS">
                                        <option value="473"  data-multicodigo="" data-contraste="0">ECOTOMOGRAFÍA PARTES BLANDAS DE CUELLO</option>
                                        <option value="503"  data-multicodigo="" data-contraste="0">ECOGRAFIA TIROIDEA </option>
                                        <option value="otro">OTROS</option>
                                    </optgroup> --}}
                                </select>
                                <label id="real_tipo_ex_rx_oft" class="f-10 highcharts-strong"data-id=""></label>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Lado</label>
                                <select class="form-control form-control-sm" id="lado_ex_rx_oft" name="lado_ex_rx_oft">
                                    <option value="0" selected>Seleccione</option>
                                    <option value="Derecho">Derecho</option>
                                    <option value="Izquierdo">Izquierdo</option>
                                    <option value="Bilateral">Bilateral</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1">
                                <label><strong>Con Contraste</strong></label>
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="imagenologia_con_contraste_ex_rx_oft" >
                                    <label for="imagenologia_con_contraste_ex_rx_oft" class="cr"></label>
                                </div>
                                <div class="alert-primary" id="mensaje_imagenologia_con_contraste_ex_rx_oft" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                            </div>
                        </div>

                        {{-- <div class="col-sm-6 mt-2" id="div_otros_examen_rx_oft" style="display:none;">
                            <label id="" name="" class="floating-label-activo-sm">Otros Examen</label>
                            <input class="form-control form-control-sm" type="text" name="otro_examen_examen_rx_oft" id="otro_examen_examen_rx_oft" value="">
                        </div> --}}

                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Prioridad</label>
                                <select class="form-control form-control-sm" name="examen_esp_oft_prioridad" id="examen_esp_oft_prioridad">
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="indicar_examen_oft();"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs tabla_examenes_ficha" id="tabla_examen_esp_oft">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="display:none;">id</th>
                                            <th class="text-center align-middle" style="display:none;">Nombre Real</th>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle">Lado</th>
                                            <th class="text-center align-middle">Tipo</th>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" onclick="registro_examen_ficha_oft();">Guardar</button>
            </div>
        </div>
    </div>
</div>
