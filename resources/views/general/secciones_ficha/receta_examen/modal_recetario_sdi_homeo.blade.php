<!-- modal indicar_recetario sdi homeopatia -->
<div id="indicar_recetario_homeo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_recetario_homeo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Recetario SDI Homeopatía</h5>
                <input type="hidden" id="id_profesional_homeo" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" aria-label="Close" onclick="cerrarModalMedicamentosHomeo_sdi();">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes_homeo" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link-wizard active " id="rec_auto_homeo_tab" data-toggle="pill" href="#rec_auto_homeo" role="tab" aria-controls="rec_auto_homeo" aria-selected="true">Receta auto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="rec_manual_homeo_tab" data-toggle="pill" href="#rec_manual_homeo" role="tab" aria-controls="rec_manual_homeo" aria-selected="false" title="No encontró medicamento">Receta Manual</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link-wizard" id="rec_magistral_homeo_tab" data-toggle="pill" href="#rec_magistral_homeo" role="tab" aria-controls="rec_magistral_homeo" aria-selected="false" title="Preparación magistral">Recetario Magistral</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes_homeo">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="rec_auto_homeo" role="tabpanel" aria-labelledby="rec_auto_homeo_tab">
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Medicamento</label>
                                            <input type="text" id="nombre_medicamento_homeo" name="nombre_medicamento_homeo" onblur="getDosis_homeo();" class="form-control form-control-sm">
                                            <input type="hidden" id="id_medicamento_homeo" name="id_medicamento_homeo" class="form-control " value="">
                                            <input type="hidden" id="id_medicamento_cant_comp_homeo" name="id_medicamento_cant_comp_homeo" class="form-control " value="">
                                            <input type="hidden" id="id_medicamento_tipo_control_homeo" name="id_medicamento_tipo_control_homeo" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Composición:</label>
                                            <div id="nombre_composicion_farmaco_homeo" name="nombre_composicion_farmaco_homeo" class="p-t-5"></div>
                                            <div id="mensaje_med_control_homeo" name="mensaje_med_control_homeo" class="alert-warning"></div>
                                        </div>
                                    </div>
                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                    <div class="col-sm-6 mt-2 medicamento_activo_homeo">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Presentación</label>
                                            <select class="form-control form-control-sm" id="dosis_medicamento_homeo" name="dosis_medicamento_homeo" onchange="getFrecuencia_homeo();getCantComp_homeo();getRecomendaciones_homeo();">
                                                <option>Seleccione una opción</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2 medicamento_activo_homeo">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Posología</label>
                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_homeo"
                                                name="frecuencia_medicamento_homeo">
                                                <option>Seleccione una opción</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                    <div class="col-sm-6 mt-2 medicamento_inactivo_homeo" style="display:none;">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Presentación</label>
                                            <input type="text" name="dosis_medicamento_homeo_2" id="dosis_medicamento_homeo_2" class="form-control form-control-sm ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2 medicamento_inactivo_homeo" style="display:none;">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Posología</label>
                                            <input type="text" name="frecuencia_medicamento_homeo_2" id="frecuencia_medicamento_homeo_2" class="form-control form-control-sm ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                            <select class="form-control form-control-sm" id="via_administracion_homeo" name="via_administracion_homeo" onchange="validar_via_administracion_homeo();">
                                                <option value="0">Seleccione</option>
                                                <option value="1">V&iacute;a Oral</option>
                                                <option value="2">V&iacute;a Sublingual</option>
                                                <option value="3">V&iacute;a T&oacute;pica</option>
                                                <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                                <option value="5">V&iacute;a &Oacute;tica</option>
                                                <option value="6">V&iacute;a Inhalatoria</option>
                                                <option value="7">V&iacute;a Nasal</option>
                                                <option value="8">V&iacute;a Rectal</option>
                                                <option value="9">V&iacute;a Vaginal</option>
                                                <option value="10">V&iacute;a parental</option>
                                                <option value="11">Otra Vía</option>
                                            </select>
                                        </div>
                                        <div class="form-group fill" id="div_observaciones_medicamento_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                            <input type="text" id="observaciones_medicamento_homeo" name="observaciones_medicamento_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Periodo</label>
                                            <select class="form-control form-control-sm" id="periodo_homeo" name="periodo_homeo" onchange="validar_periodo_homeo();">
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
                                        <div class="form-group fill" id="div_observaciones_periodo_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                            <input type="text" id="observaciones_periodo_homeo" name="observaciones_periodo_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>
                                    {{-- cantidad de medicamento a despachar o comprar    --}}
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Cantidad Comprar/Despachar</label>
                                            <select class="form-control form-control-sm" id="cantidad_comprar_homeo" name="cantidad_comprar_homeo" onchange="validar_cantidad_comprar_homeo();">
                                                <option value="0">Seleccione</option>
                                                <option value="999">Otra Cantidad</option>
                                            </select>
                                        </div>
                                        <div class="form-group fill" id="div_otra_cantidad_a_comprar_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra Cantidad</label>
                                            <input type="text" id="otra_cantidad_a_comprar_homeo" name="otra_cantidad_a_comprar_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>
                                     {{-- recomendaciones    --}}
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill" id="div_recomendaciones_homeo">
                                            <label class="floating-label-activo-sm">Recomendaciones</label>
                                            <select class="form-control form-control-sm" id="recomendaciones_homeo" name="recomendaciones_homeo" onchange="validar_recomendaciones_homeo();">
                                                <option value="0">Seleccione</option>
                                                <option value="999">Otra Recomendación</option>
                                            </select>
                                        </div>
                                        <div class="form-group fill" id="div_otra_recomendacion_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra Recomendación / Libre</label>
                                            <textarea id="otra_recomendacion_homeo" name="otra_recomendacion_homeo" class="form-control form-control-sm" rows="2" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label><strong>Uso Crónico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="medicamento_uso_cronico_homeo">
                                                        <label for="medicamento_uso_cronico_homeo" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="mensaje_uso_cronico_homeo" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_homeo()"
                                                    class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TAB 2-->
                            <div class="tab-pane fade show" id="rec_manual_homeo" role="tabpanel" aria-labelledby="rec_manual_homeo_tab">
                                <div class="form-row">

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ingrese Nombre Medicamento</label>
                                            <input type="text" id="manual_nombre_medicamento_homeo" name="manual_nombre_medicamento_homeo" class="form-control form-control-sm">
                                            <input type="hidden" id="manual_id_medicamento_homeo" name="manual_id_medicamento_homeo" value="0">
                                            <input type="hidden" id="med_faltante_homeo" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Farmaco</label>
                                            <input type="text" id="manual_nombre_composicion_farmaco_homeo" name="manual_nombre_composicion_farmaco_homeo" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo Control</label>
                                            <select name="manual_tipo_control_homeo" id="manual_tipo_control_homeo" class="form-control form-control-sm">
                                                <option value="">Seleccione</option>
                                                @if($receta_control)
                                                    @foreach ($receta_control as $control)
                                                        @if($control->cod_control !== 8)
                                                            <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Presentación</label>
                                            <input type="text" id="manual_dosis_medicamento_homeo" name="manual_dosis_medicamento_homeo" class="form-control form-control-sm">

                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Posología</label>
                                            <input type="text" id="manual_frecuencia_medicamento_homeo" name="manual_frecuencia_medicamento_homeo" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                            <select class="form-control form-control-sm" id="manual_via_administracion_homeo" name="manual_via_administracion_homeo" onchange="validar_via_administracion_manual_homeo();">
                                                <option value="0">Seleccione</option>
                                                <option value="1">V&iacute;a Oral</option>
                                                <option value="2">V&iacute;a Sublingual</option>
                                                <option value="3">V&iacute;a T&oacute;pica</option>
                                                <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                                <option value="5">V&iacute;a &Oacute;tica</option>
                                                <option value="6">V&iacute;a Inhalatoria</option>
                                                <option value="7">V&iacute;a Nasal</option>
                                                <option value="8">V&iacute;a Rectal</option>
                                                <option value="9">V&iacute;a Vaginal</option>
                                                <option value="10">V&iacute;a parental</option>
                                                <option value="11">Otra Vía</option>
                                            </select>
                                        </div>
                                        <div class="form-group fill" id="div_manual_observaciones_via_administracion_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                            <input type="text" id="manual_observaciones_via_administracion_homeo" name="manual_observaciones_via_administracion_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <div class="col-sm-3 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Periodo</label>
                                            <select class="form-control form-control-sm" id="manual_periodo_homeo" name="manual_periodo_homeo" onchange="validar_periodo_manual_homeo();">
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
                                        <div class="form-group fill" id="div_manual_observaciones_periodo_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                            <input type="text" id="manual_observaciones_periodo_homeo" name="manual_observaciones_periodo_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <input type="hidden" id="manual_cantidad_comprar_homeo" name="manual_cantidad_comprar_homeo" value="">

                                    <div class="col-sm-3  mt-2">
                                        <label class="floating-label-activo-sm">Cantidad a Comprar</label>
                                        <select name="manual_cantidad_numero_homeo" id="manual_cantidad_numero_homeo" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero_homeo', 'manual_cantidad_tipo_unidad_homeo', 'manual_cantidad_comprar_homeo')">
                                            <option value="1">(1) Uno</option>
                                            <option value="2">(2) Dos</option>
                                            <option value="3">(3) Tres</option>
                                            <option value="4">(4) Cuatro</option>
                                            <option value="5">(5) Cinco</option>
                                            <option value="6">(6) Seis</option>
                                            <option value="7">(7) Siete</option>
                                            <option value="8">(8) Ocho</option>
                                            <option value="9">(9) Nueve</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  mt-2">
                                        <label class="floating-label-activo-sm">Presentación</label>
                                        <select name="manual_cantidad_tipo_unidad_homeo" id="manual_cantidad_tipo_unidad_homeo" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero_homeo', 'manual_cantidad_tipo_unidad_homeo', 'manual_cantidad_comprar_homeo')">
                                            <option value="Ampolla(s)">Ampolla(s)</option>
                                            <option value="Caja(s)">Caja(s)</option>
                                            <option value="Franco(s)">Franco(s)</option>
                                            <option value="Unidad(es)">Unidad(es)</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  mt-2">
                                        <label id="manual_cantidad_comprar_label_homeo"></label>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label><strong>Uso Crónico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="manual_medicamento_uso_cronico_homeo">
                                                        <label for="manual_medicamento_uso_cronico_homeo" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="manual_mensaje_uso_cronico_homeo" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_manual_homeo()"
                                                    class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento Manual</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

							<!--TAB 3-->
							<div class="tab-pane fade show" id="rec_magistral_homeo" role="tabpanel" aria-labelledby="rec_magistral_homeo_tab">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <button type="button" onclick="agregar_componente_homeo();" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Componente a Receta Magistral</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo Control</label>
                                            <select name="magistral_tipo_control_homeo" id="magistral_tipo_control_homeo" class="form-control form-control-sm">
                                                <option value="">Seleccione</option>
                                                @if($receta_control)
                                                    @foreach ($receta_control as $control)
                                                        @if($control->cod_control == 8)
                                                            <option value="{{ $control->cod_control }}" selected>{{ $control->descripcion }}</option>
                                                        @else
                                                            @if(intval($control->cod_control) != 6 && intval($control->cod_control) != 7)
                                                                {{-- <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option> --}}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="label">Si Receta Magistra Posee Elementos con Control Debe seleccionar el Tipo de Control Adecuado</label>
                                    </div>
                                </div>

                                <div class="div_componentes_homeo">
                                    <div class="form-row componente">
                                        <div class="col-sm-8 mt-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ingrese los Compuestos</label>
                                                <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_homeo" id="magistral_nombre_medicamento_homeo" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ingrese la cantidad</label>
                                                <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_homeo" id="magistral_cantidad_medicamento_homeo" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-4 mt-2">
                                        <label class="floating-label-activo-sm">Presentación</label>
                                        <select name="magistral_dosis_medicamento_homeo" id="magistral_dosis_medicamento_homeo" class="form-control form-control-sm">
                                            <option value="Cápsulas de gelatina duras">Cápsulas de gelatina duras</option>
                                            <option value="Colirios">Colirios</option>
                                            <option value="Comprimidos">Comprimidos</option>
                                            <option value="Cremas">Cremas</option>
                                            <option value="Enemas">Enemas</option>
                                            <option value="Granulados">Granulados</option>
                                            <option value="Jeringas precargadas">Jeringas precargadas</option>
                                            <option value="Papelillos">Papelillos</option>
                                            <option value="Polvos">Polvos</option>
                                            <option value="Pomadas">Pomadas</option>
                                            <option value="Soluciones">Soluciones</option>
                                            <option value="Supositorios">Supositorios</option>
                                            <option value="Suspensiones">Suspensiones</option>
                                            <option value="Viales">Viales</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">CSP</label>
                                            <input type="text" id="magistral_cantidad_comprar_homeo" name="magistral_cantidad_comprar_homeo" class="form-control form-control-sm" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Posología</label>
                                            <input type="text" id="magistral_frecuencia_medicamento_homeo" name="magistral_frecuencia_medicamento_homeo" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                            <select class="form-control form-control-sm" id="magistral_via_administracion_homeo" name="magistral_via_administracion_homeo" onchange="validar_via_administracion_magistral_homeo();">
                                                <option value="0">Seleccione</option>
                                                <option value="1">V&iacute;a Oral</option>
                                                <option value="2">V&iacute;a Sublingual</option>
                                                <option value="3">V&iacute;a T&oacute;pica</option>
                                                <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                                <option value="5">V&iacute;a &Oacute;tica</option>
                                                <option value="6">V&iacute;a Inhalatoria</option>
                                                <option value="7">V&iacute;a Nasal</option>
                                                <option value="8">V&iacute;a Rectal</option>
                                                <option value="9">V&iacute;a Vaginal</option>
                                                <option value="10">V&iacute;a parental</option>
                                                <option value="11">Otra Vía</option>
                                            </select>
                                        </div>
                                        <div class="form-group fill" id="div_magistral_observaciones_via_administracion_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                            <input type="text" id="magistral_observaciones_via_administracion_homeo" name="magistral_observaciones_via_administracion_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Periodo</label>
                                            <select class="form-control form-control-sm" id="magistral_periodo_homeo" name="magistral_periodo_homeo" onchange="validar_periodo_magistral_homeo();">
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
                                        <div class="form-group fill" id="div_magistral_observaciones_periodo_homeo" style="display: none;">
                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                            <input type="text" id="magistral_observaciones_periodo_homeo" name="magistral_observaciones_periodo_homeo" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <input type="hidden" id="magistral_cantidad_comprar_homeo" name="magistral_cantidad_comprar_homeo" value="">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label class="floating-label-activo-sm">Cantidad a Despachar</label>
                                                    <select name="magistral_cantidad_numero_homeo" id="magistral_cantidad_numero_homeo" class="form-control form-control-sm" onchange="cargarCantidadComprar('magistral_cantidad_numero_homeo', 'magistral_cantidad_tipo_unidad_homeo', 'magistral_cantidad_comprar_homeo')">
                                                        <option value="1">(1) Una Unidad</option>
                                                        <option value="2">(2) Dos Unidad</option>
                                                        <option value="3">(3) Tres Unidad</option>
                                                        <option value="4">(4) Cuatro Unidad</option>
                                                        <option value="5">(5) Cinco Unidad</option>
                                                        <option value="6">(6) Seis Unidad</option>
                                                        <option value="7">(7) Siete Unidad</option>
                                                        <option value="8">(8) Ocho Unidad</option>
                                                        <option value="9">(9) Nueve Unidad</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="floating-label-activo-sm">Presentación</label>
                                                    <select name="magistral_cantidad_tipo_unidad_homeo" id="magistral_cantidad_tipo_unidad_homeo" class="form-control form-control-sm" onchange="cargarCantidadComprar('magistral_cantidad_numero_homeo', 'magistral_cantidad_tipo_unidad_homeo', 'magistral_cantidad_comprar_homeo')">
                                                        <option value="Cápsulas de gelatina duras">Cápsulas de gelatina duras</option>
                                                        <option value="Colirios">Colirios</option>
                                                        <option value="Comprimidos">Comprimidos</option>
                                                        <option value="Cremas">Cremas</option>
                                                        <option value="Enemas">Enemas</option>
                                                        <option value="Granulados">Granulados</option>
                                                        <option value="Jeringas precargadas">Jeringas precargadas</option>
                                                        <option value="Papelillos">Papelillos</option>
                                                        <option value="Polvos">Polvos</option>
                                                        <option value="Pomadas">Pomadas</option>
                                                        <option value="Soluciones">Soluciones</option>
                                                        <option value="Supositorios">Supositorios</option>
                                                        <option value="Suspensiones">Suspensiones</option>
                                                        <option value="Viales">Viales</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label id="magistral_cantidad_comprar_label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Cantidad a Despachar</label>
                                            <input type="text" id="magistral_cantidad_comprar_homeo" name="magistral_cantidad_comprar_homeo" class="form-control form-control-sm">
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label><strong>Uso Crónico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="magistral_medicamento_uso_cronico">
                                                        <label for="magistral_medicamento_uso_cronico" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="magistral_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_magistral_homeo()" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento Magistral</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--DIV DE TABLA -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-12 mt-3">
                                        <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                                        <!--Tabla-->
                                        <div class="table-responsive">
                                            <!-- Botón temporal para pruebas -->
                                            {{-- <div class="mb-2">
                                                <button type="button" onclick="agregarMedicamentoPrueba()" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-flask"></i> Agregar Medicamento de Prueba
                                                </button>
                                                <small class="text-muted ml-2">Solo para testing - eliminar en producción</small>
                                            </div> --}}
                                            <table id="tabla_medicamento_homeopatia_sdi" class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_tipo_control</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_producto</td>
                                                        <td class="text-center align-middle text-wrap">Medicamento</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">farmaco</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_presentacion</td>
                                                        <td class="text-center align-middle text-wrap">Presentación</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_receta_dosis</td>
                                                        <td class="text-center align-middle text-wrap">Posología</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_via_administracion</td>
                                                        <td class="text-center align-middle text-wrap">Vía Adm.</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>
                                                        <td class="text-center align-middle text-wrap">Periodo</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>
                                                        <td class="text-center align-middle text-wrap">Comprar</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">recomendacion</td>
                                                        <th class="text-center align-middle">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--Cierre: Tabla-->
                                    </div>
                                    <div class="modal-footer">
                                        {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                                        {{--  <button type="button" onclick="alerta_registro_medicamento_sdi();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>  --}}
                                        <button type="button" onclick="registrar_medicamentos_homeo();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>
                                    </div>
                                </div>
                            </div>

                            <!-- DIV MEDICAMENTO FALTANTE-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12 mt-3 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="ranking_recetas_switch">
                                            <label class="custom-control-label text-primary" for="ranking_recetas_switch"><strong><u>Ranking  de recetas controladas del paciente</u></strong></label>
                                        </div>
                                    </div>
                                    <div class="row" id="ranking_recetas" style="display:none">
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-3">Recetas propias</h6>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group fill">
                                                <label class="floating-label">Tipo de control</label>
                                                <select class="form-control form-control-sm" id="tipo_control_receta_propia" name="tipo_control_receta_propia" onchange="buscar_cantidad_receta_propia();">
                                                    <option value="0">Seleccione una opción</option>
                                                    @foreach ($receta_control as $tipo_receta_control)
                                                        <option value="{{ $tipo_receta_control->tipo_control }}">{{ $tipo_receta_control->descripcion }}</option>
                                                    @endforeach
                                                    {{-- <option value="S" data-select2-id="0">Seleccione una opción</option> --}}
                                                    {{-- <option value="1"> Control Psicotrópicos</option> --}}
                                                    {{-- <option value="2"> Control Estupefacientes</option> --}}
                                                    {{-- <option value="3"> Receta cheque </option> --}}
                                                    {{-- <option value="4"> Receta Retenida Simple</option> --}}
                                                    {{-- <option value="5"> Receta Retenida C/Codeína</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas" name="receta_propia_cantidad" id="receta_propia_cantidad">
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-3">Recetas totales</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label">Tipo de control</label>
                                                <select class="form-control form-control-sm" id="tipo_control_recetas_totales" name="tipo_control_recetas_totales" onchange="buscar_cantidad_receta_totales();">
                                                    <option value="0">Seleccione una opción</option>
                                                    @foreach ($receta_control as $tipo_receta_control)
                                                        <option value="{{ $tipo_receta_control->tipo_control }}">{{ $tipo_receta_control->descripcion }}</option>
                                                    @endforeach
                                                    {{-- <option value="1"> Control Psicotrópicos</option> --}}
                                                    {{-- <option value="2"> Control Estupefacientes</option> --}}
                                                    {{-- <option value="3"> Receta cheque </option> --}}
                                                    {{-- <option value="4"> Receta Retenida Simple</option> --}}
                                                    {{-- <option value="5"> Receta Retenida C/Codeína</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas" name="receta_totales_cantidad" id="receta_totales_cantidad">
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
    var creatinina_homeo = 0;

    {{--  METODOS DE RECETA HOMEOPATIA  --}}
    /** Indicar medicamento homeopatía **/
    function i_medicamento_homeo()
    {
        // Función equivalente a ver_medicamento_ficha_medica_sdi para homeopatía
        $('#tabla_medicamento_homeopatia_sdi tbody').empty(); // Solo limpiar el tbody, no toda la tabla
        $('#nombre_medicamento_homeo').val('');
        $('#dosis_medicamento_homeo').val('');
        $('#frecuencia_medicamento_homeo').val('');
        $('#id_medicamento_homeo').val('');
        $('#id_medicamento_tipo_control_homeo').val('');
        $('#mensaje_med_control_homeo').val('');
        $('#indicar_recetario_homeo').modal('show', {backdrop: 'static', keyboard: false});
    }

    function cerrarModalMedicamentosHomeo_sdi() {
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

                $('#indicar_recetario_homeo').modal('hide');
            }
        })
    }
    $(document).ready(function() {
        {{--  MEDICAMENTOS  --}}
        $("#nombre_medicamento_homeo").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticuloHomeopatia') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        if( data.length == 0 )
                        {
                            $('.medicamento_activo_homeo').hide();
                            $('.medicamento_inactivo_homeo').show();
                            $('#dosis_medicamento_homeo').val('');
                            $('#frecuencia_medicamento_homeo').val('');
                            $('#id_medicamento_homeo').val('');
                            $('#id_medicamento_tipo_control_homeo').val('');
                            $('#mensaje_med_control_homeo').val('');
                        }
                        else
                        {
                            $('.medicamento_activo_homeo').show();
                            $('.medicamento_inactivo_homeo').hide();
                            $('#dosis_medicamento_homeo').val('');
                            $('#frecuencia_medicamento_homeo').val('');
                            $('#id_medicamento_homeo').val('');
                            $('#id_medicamento_tipo_control_homeo').val('');
                            $('#mensaje_med_control_homeo').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#nombre_medicamento_homeo').val(ui.item.label); // display the selected text
                $('#id_medicamento_homeo').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco_homeo').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_homeo').val(ui.item.control); // save selected id to input
                if(ui.item.control == 1 )
                    $('#mensaje_med_control_homeo').html('Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"');
                else
                    $('#mensaje_med_control_homeo').html('');

                return false;
            }
        });

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
                    $('#medicamento_uso_cronico_homeo').change(function(){
                        if($('#medicamento_uso_cronico_homeo').is(':checked') )
                        {
                            $('#mensaje_uso_cronico_homeo').show();
                        }
                        else
                        {
                            $('#mensaje_uso_cronico_homeo').hide();
                        }
                    });

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
        $('#manual_medicamento_uso_cronico_homeo').change(function(){
            if($('#manual_medicamento_uso_cronico_homeo').is(':checked') )
            {
                $('#manual_mensaje_uso_cronico_homeo').show();
            }
            else
            {
                $('#manual_mensaje_uso_cronico_homeo').hide();
            }
        });
    });

    function getDosis_homeo()
    {
        var id_medicamento = $('#id_medicamento_homeo').val();
        $.ajax({
            url: "{{ route('dental.getDosisHomeopatia') }}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                id_medicamento: id_medicamento
            },
            success: function(data) {
                console.log(data)

                    if (data != null) {

                        // data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#dosis_medicamento_homeo');

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.cont_rec +
                                '</option>');
                        })

                    } else {



                    }
            }
        });
    }

    function getFrecuencia_homeo()
    {
        var id_dosis = $('#dosis_medicamento_homeo option:selected').data('id');
        var cant_comp = $('#dosis_medicamento_homeo option:selected').data('cant_comp');
        $('#magistral_cantidad_comprar_homeo').val(cant_comp);
        $.ajax({
            url: "{{ route('dental.getFrecuenciaHomeopatia') }}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                id_dosis: id_dosis
            },
            success: function(data) {
                console.log(data)

                    if (data != null) {

                        // data = JSON.parse(data);
                        console.log(data)
                        let frecuencia = $('#frecuencia_medicamento_homeo');

                        frecuencia.find('option').remove();
                        frecuencia.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            frecuencia.append('<option value="' + v.frecuencia + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.indic +
                                '</option>');
                        })

                    } else {


                    }
            }
        });
    }

     function getCantComp_homeo() {

        var cant_comp = $('#dosis_medicamento_homeo option:selected').data('cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp_homeo') }}";
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
                    let select_cant_comp = $('#cantidad_comprar_homeo');

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

    function getRecomendaciones_homeo()
    {
        var id_dosis = $('#dosis_medicamento_homeo option:selected').data('id');
        var id_medicamento = $('#id_medicamento_homeo').val();
        $.ajax({
            url: "{{ route('presentacion.getRecomendacionesHomeopatia') }}",
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                id_dosis: id_dosis,
                id_medicamento: id_medicamento
            },
            success: function(data) {
                console.log(data)
                let recomendacion_select = $('#recomendaciones_homeo');
                let div_recomendacion_select = $('#div_recomendaciones_homeo');
                let div_otra_recomendacion = $('#div_otra_recomendacion_homeo');
                let otra_recomendacion_input = $('#otra_recomendacion_homeo');

                if (data != null && data.length > 0) {
                    // Si hay recomendaciones, mostramos el select y ocultamos el textarea
                    div_recomendacion_select.show();
                    div_otra_recomendacion.hide();
                    otra_recomendacion_input.attr('disabled', 'disabled');

                    recomendacion_select.find('option').remove();
                    recomendacion_select.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        recomendacion_select.append('<option value="' + v.id + '" data-id="'+v.id+'" >' + v.nombre +
                            '</option>');
                    })
                    recomendacion_select.append('<option value="999">Otra Recomendación / Libre</option>');
                } else {
                    // Si no hay recomendaciones, ocultamos select y mostramos textarea libre
                    div_recomendacion_select.hide();
                    div_otra_recomendacion.show();
                    otra_recomendacion_input.removeAttr('disabled');
                    otra_recomendacion_input.focus();

                    recomendacion_select.find('option').remove();
                    recomendacion_select.append('<option value="999" selected>Libre</option>');
                }
            }
        });

    }

    function validar_via_administracion_homeo()
    {
        if($('#via_administracion_homeo').val() == 11)
        {
            $('#div_observaciones_medicamento_homeo').show();
            $('#observaciones_medicamento_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_medicamento_homeo').hide();
            $('#observaciones_medicamento_homeo').attr('disabled','disabled');
            $('#observaciones_medicamento_homeo').val('');
        }
    }

    function validar_periodo_homeo()
    {
        if($('#periodo_homeo').val() == 11)
        {
            $('#div_observaciones_periodo_homeo').show();
            $('#observaciones_periodo_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_periodo_homeo').hide();
            $('#observaciones_periodo_homeo').attr('disabled','disabled');
            $('#observaciones_periodo_homeo').val('');
        }
    }

    function validar_cantidad_comprar_homeo()
    {
        if($('#cantidad_comprar_homeo').val() == 999)
        {
            $('#div_otra_cantidad_a_comprar_homeo').show();
            $('#otra_cantidad_a_comprar_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_otra_cantidad_a_comprar_homeo').hide();
            $('#otra_cantidad_a_comprar_homeo').attr('disabled','disabled');
            $('#otra_cantidad_a_comprar_homeo').val('');
        }
    }

    function validar_recomendaciones_homeo(){
        if($('#recomendaciones_homeo').val() == 999)
        {
            $('#div_otra_recomendacion_homeo').show();
            $('#otra_recomendacion_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_otra_recomendacion_homeo').hide();
            $('#otra_recomendacion_homeo').attr('disabled','disabled');
            $('#otra_recomendacion_homeo').val('');
        }
    }

    function indicar_medicamento_homeo()
    {
        let nombre_medicamento_homeo = $('#nombre_medicamento_homeo').val();
        let farmaco = $('#nombre_composicion_farmaco_homeo').html();
        let id_medicamento = $('#id_medicamento_homeo').val();
        let id_tipo_control = $('#id_medicamento_tipo_control_homeo').val();

        let id_dosis_medicamento_homeo = $('#dosis_medicamento_homeo').val();
        let dosis_medicamento_homeo = $('#dosis_medicamento_homeo option:selected').text();

        let id_frecuencia_medicamento_homeo = $('#frecuencia_medicamento_homeo').val();
        let frecuencia_medicamento_homeo = $('#frecuencia_medicamento_homeo option:selected').text();

        let dosis_medicamento_homeo_2 = $('#dosis_medicamento_homeo_2').val();
        let frecuencia_medicamento_homeo_2 = $('#frecuencia_medicamento_homeo_2').val();

        let id_via_administracion_homeo = $('#via_administracion_homeo').val();
        let via_administracion_homeo = $('#via_administracion_homeo option:selected').text();

        let observaciones_medicamento_homeo = $('#observaciones_medicamento_homeo').val();

        let id_periodo_homeo = $('#periodo_homeo').val();
        let periodo_homeo = $('#periodo_homeo option:selected').text();

        let observaciones_periodo_homeo = $('#observaciones_periodo_homeo').val();

        let id_cantidad_comprar = $('#cantidad_comprar_homeo').val();
        let cantidad_comprar = $('#cantidad_comprar_homeo option:selected').text();

        let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar_homeo').val();

        let recomendacion_homeo = '';
        if ($('#recomendaciones_homeo').val() != '0' && $('#recomendaciones_homeo').val() != '999' && $('#div_recomendaciones_homeo').is(':visible')) {
            recomendacion_homeo = $('#recomendaciones_homeo option:selected').text();
        } else if ($('#recomendaciones_homeo').val() == '999' || $('#div_otra_recomendacion_homeo').is(':visible')) {
            recomendacion_homeo = $('#otra_recomendacion_homeo').val();
        }

        var lista_med = [];
        $('#tabla_medicamento_homeopatia_sdi tbody tr').each(function(i, n) {
            var data = $(this).find("td");
            if (data.length > 1) {
                lista_med.push($.trim($(data[1]).text().split("\n").join(""))); // Usar índice 1 para id_producto
            }
        });

        console.log('Lista medicamentos existentes:', lista_med);
        console.log('ID medicamento a agregar:', id_medicamento);

        if($.inArray(id_medicamento,lista_med) == -1)
        {
            var medicamento_uso_cronico = 0;
            if($('#medicamento_uso_cronico_homeo').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_homeo) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            console.log('Validando medicamento...', {
                nombre_medicamento_homeo,
                id_medicamento,
                dosis_medicamento_homeo,
                frecuencia_medicamento_homeo
            });

            if($('#id_medicamento_homeo').val() != '')
            {
                if($.trim(dosis_medicamento_homeo) == '' || dosis_medicamento_homeo == 0 || dosis_medicamento_homeo == 'Seleccione una opción' || dosis_medicamento_homeo == 'Seleccione')
                {
                    console.log('Error en presentación');
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }
                if($.trim(frecuencia_medicamento_homeo) == '' || frecuencia_medicamento_homeo == 0 || frecuencia_medicamento_homeo == 'Seleccione una opción' || frecuencia_medicamento_homeo == 'Seleccione')
                {
                    console.log('Error en posología');
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }
            }
            else
            {
                // Para medicamentos no encontrados en autocomplete, usar campos manuales
                if( dosis_medicamento_homeo_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Dosis\n';
                }
                else
                {
                    dosis_medicamento_homeo = dosis_medicamento_homeo_2;
                }
                if( frecuencia_medicamento_homeo_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
                }
                else
                {
                    frecuencia_medicamento_homeo = frecuencia_medicamento_homeo_2;
                }
            }

            // Simplificar validación para pruebas - hacer vía de administración opcional
            if($.trim(via_administracion_homeo) == '' || via_administracion_homeo == 0 || $.trim(via_administracion_homeo) == 'Seleccione')
            {
                // Asignar valor por defecto
                via_administracion_homeo = 'Vía Oral';
                id_via_administracion_homeo = 1;
            }
            else if($('#via_administracion_homeo').val() == 11)
            {
                if( $.trim(observaciones_medicamento_homeo) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_homeo = observaciones_medicamento_homeo;
                }
            }

            // Simplificar validación de período
            if($.trim(periodo_homeo) == '' || periodo_homeo == 0 || $.trim(periodo_homeo) == 'Seleccione')
            {
                // Asignar valor por defecto
                periodo_homeo = '7 días';
                id_periodo_homeo = 5;
            }
            else if($('#periodo_homeo').val() == 11)
            {
                if( $.trim(observaciones_periodo_homeo) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_homeo = observaciones_periodo_homeo;
                }
            }

            // Simplificar validación de cantidad
            if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
            {
                // Asignar valor por defecto
                cantidad_comprar = '1 Unidad';
                id_cantidad_comprar = 1;
            }
            else if($('#cantidad_comprar_homeo').val() == '999')
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
            }

            console.log('Validación completada. Válido:', valido == 0);

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_homeopatia_sdi tbody tr').length + 1;

                var periodo_val = periodo_homeo && periodo_homeo.trim() !== '' ? periodo_homeo : '-';
                var cantidad_val = cantidad_comprar && cantidad_comprar.trim() !== '' ? cantidad_comprar : '-';

                console.log('Agregando medicamento a la tabla...');
                console.log('Datos del medicamento:', {
                    nombre_medicamento_homeo,
                    dosis_medicamento_homeo,
                    frecuencia_medicamento_homeo,
                    via_administracion_homeo,
                    periodo_val,
                    cantidad_val
                });

                var fila = '<tr class="tabla_medicamento_homeopatia_sdi" id="row' + i + '">' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (id_tipo_control || '') + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (id_medicamento || '0') + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + nombre_medicamento_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (farmaco || '') + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (id_dosis_medicamento_homeo || '0') + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + dosis_medicamento_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (id_frecuencia_medicamento_homeo || '0') + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + via_administracion_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo_homeo + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + periodo_val + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (id_cantidad_comprar || '0') + '</td>' +
                    '<td class="text-center align-middle text-wrap">' + cantidad_val + '</td>' +
                    '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + (recomendacion_homeo || '') + '</td>' +
                    '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i + '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_homeo(\'row' + i + '\');">Quitar</div></td>'+
                '</tr>';

                console.log('Fila HTML generada:', fila);

                $('#tabla_medicamento_homeopatia_sdi tbody').append(fila);

                console.log('Fila agregada. Total de filas en tbody:', $('#tabla_medicamento_homeopatia_sdi tbody tr').length);

                // Limpiar campos
                $('#nombre_medicamento_homeo').val('');
                $('#id_medicamento_homeo').val('');
                $('#nombre_composicion_farmaco_homeo').html('');
                $('#dosis_medicamento_homeo').val(0);
                $('#frecuencia_medicamento_homeo').val(0);
                $('#dosis_medicamento_homeo_2').val('');
                $('#frecuencia_medicamento_homeo_2').val('');
                $('#via_administracion_homeo').val(0);
                $('#observaciones_medicamento_homeo').val('');
                $('#periodo_homeo').val(0);
                $('#observaciones_periodo_homeo').val('');
                $('#cantidad_comprar_homeo').val(0);
                $('#otra_cantidad_a_comprar_homeo').val('');
                $('#recomendaciones_homeo').val(0);
                $('#otra_recomendacion_homeo').val('').attr('disabled', 'disabled');
                $('#div_otra_recomendacion_homeo').hide();
                $('#div_recomendaciones_homeo').show();
                $('#mensaje_med_control_homeo').html('');
                $("#medicamento_uso_cronico_homeo").prop("checked", false).change();
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
                text: 'El medicamento está Recetado',
                icon: "warning",
            });
        }
    }

    function eliminar_medicamento_homeo(id_row)
    {
        // Confirmar eliminación
        swal({
            title: "Eliminar medicamento homeopático",
            text: "¿Está seguro que desea eliminar este medicamento homeopático de la receta?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Obtener información del medicamento antes de eliminarlo
                var fila = $('#tabla_medicamento_homeopatia_sdi [id=' + id_row + ']');
                var celdas = fila.find('td');

                if (celdas.length > 0) {
                    var id_tipo_control = $.trim($(celdas[0]).text());
                    var id_producto = $.trim($(celdas[1]).text());
                    var nombre_medicamento = $.trim($(celdas[2]).text());

                    // Eliminar visualmente
                    fila.remove();

                    // Eliminar de la base de datos inmediatamente
                    eliminarMedicamentoHomeopatiaDB(id_producto, nombre_medicamento, id_tipo_control);

                    console.log('Medicamento homeopático eliminado: ' + nombre_medicamento);

                    // Mostrar mensaje de éxito
                    swal({
                        title: "Medicamento eliminado",
                        text: "El medicamento homeopático ha sido eliminado de la receta",
                        icon: "success",
                        timer: 2000,
                        buttons: false
                    });
                }
            }
        });
    }

    function eliminarMedicamentoHomeopatiaDB(id_producto, nombre_medicamento, id_tipo_control)
    {
        let id_ficha_atencion = $('#id_fc').val();
        let id_profesional = $('#id_profesional_fc').val() || $('#id_profesional_homeo').val();
        let id_paciente = $('#id_paciente_fc').val();
        var _token = CSRF_TOKEN;

        // Usar la misma ruta que los medicamentos normales
        let url = "{{ route('profesional.receta.eliminar_medicamento') }}";

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                id_ficha: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_producto: id_producto,
                nombre_medicamento: nombre_medicamento,
                id_tipo_control: id_tipo_control
            },
        })
        .done(function(data) {
            console.log('Respuesta eliminación homeopatía BD:', data);

            if (data && data.estado == 1) {
                console.log('Medicamento homeopático eliminado correctamente de la BD');
            } else {
                console.log('Error al eliminar homeopatía de BD:', data);
                // En caso de error, mostrar mensaje pero no recargar para evitar conflictos
                swal({
                    title: "Advertencia",
                    text: "El medicamento se eliminó visualmente pero puede que persista en la base de datos. Regenere la receta para sincronizar.",
                    icon: "warning"
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Error AJAX eliminando medicamento homeopático:', jqXHR, ajaxOptions, thrownError);

            // En caso de error, mostrar mensaje de advertencia
            swal({
                title: "Error de conexión",
                text: "No se pudo eliminar el medicamento del servidor. Regenere la receta para sincronizar.",
                icon: "error"
            });
        });
    }

    // Funciones para receta manual
    function validar_via_administracion_manual_homeo()
    {
        if($('#manual_via_administracion_homeo').val() == 11)
        {
            $('#div_manual_observaciones_via_administracion_homeo').show();
            $('#manual_observaciones_via_administracion_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_via_administracion_homeo').hide();
            $('#manual_observaciones_via_administracion_homeo').attr('disabled','disabled');
            $('#manual_observaciones_via_administracion_homeo').val('');
        }
    }

    function validar_periodo_manual_homeo()
    {
        if($('#manual_periodo_homeo').val() == 11)
        {
            $('#div_manual_observaciones_periodo_homeo').show();
            $('#manual_observaciones_periodo_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_periodo_homeo').hide();
            $('#manual_observaciones_periodo_homeo').attr('disabled','disabled');
            $('#manual_observaciones_periodo_homeo').val('');
        }
    }

    // Funciones para receta magistral
    function validar_via_administracion_magistral_homeo()
    {
        if($('#magistral_via_administracion_homeo').val() == 11)
        {
            $('#div_magistral_observaciones_via_administracion_homeo').show();
            $('#magistral_observaciones_via_administracion_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_magistral_observaciones_via_administracion_homeo').hide();
            $('#magistral_observaciones_via_administracion_homeo').attr('disabled','disabled');
            $('#magistral_observaciones_via_administracion_homeo').val('');
        }
    }

    function validar_periodo_magistral_homeo()
    {
        if($('#magistral_periodo_homeo').val() == 11)
        {
            $('#div_magistral_observaciones_periodo_homeo').show();
            $('#magistral_observaciones_periodo_homeo').removeAttr('disabled');
        }
        else
        {
            $('#div_magistral_observaciones_periodo_homeo').hide();
            $('#magistral_observaciones_periodo_homeo').attr('disabled','disabled');
            $('#magistral_observaciones_periodo_homeo').val('');
        }
    }

    function indicar_medicamento_manual_homeo()
    {
        // Similar a indicar_medicamento_homeo pero para la receta manual
        let nombre_medicamento = $('#manual_nombre_medicamento_homeo').val();
        let farmaco = $('#manual_nombre_composicion_farmaco_homeo').val();
        let id_tipo_control = $('#manual_tipo_control_homeo').val();
        let dosis_medicamento = $('#manual_dosis_medicamento_homeo').val();
        let frecuencia_medicamento = $('#manual_frecuencia_medicamento_homeo').val();
        let id_via_administracion = $('#manual_via_administracion_homeo').val();
        let via_administracion = $('#manual_via_administracion_homeo option:selected').text();
        let observaciones_medicamento = $('#manual_observaciones_via_administracion_homeo').val();
        let id_periodo = $('#manual_periodo_homeo').val();
        let periodo = $('#manual_periodo_homeo option:selected').text();
        let observaciones_periodo = $('#manual_observaciones_periodo_homeo').val();
        let cantidad_comprar = $('#manual_cantidad_comprar_homeo').val();

        var valido = 0;
        var mensaje = '';

        if($.trim(nombre_medicamento) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Medicamento.\n';
        }

        if(valido == 0)
        {
            var medicamento_uso_cronico = $('#manual_medicamento_uso_cronico_homeo').is(':checked') ? 1 : 0;

            var i = $('#tabla_medicamento_homeopatia_sdi tbody tr').length + 1;

            var fila = '<tr class="tabla_medicamento_homeopatia_sdi" id="row' + i + '">' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_medicamento manual
                '<td class="text-center align-middle text-wrap">' + nombre_medicamento + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_dosis manual
                '<td class="text-center align-middle text-wrap">' + dosis_medicamento + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_frecuencia manual
                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion + '</td>' +
                '<td class="text-center align-middle text-wrap">' + via_administracion + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo + '</td>' +
                '<td class="text-center align-middle text-wrap">' + periodo + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_cantidad manual
                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden"></td>' + // recomendacion
                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i + '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_homeo(\'row' + i + '\');">Quitar</div></td>'+
            '</tr>';

            $('#tabla_medicamento_homeopatia_sdi tbody').append(fila);

            // Limpiar campos manuales
            $('#manual_nombre_medicamento_homeo').val('');
            $('#manual_nombre_composicion_farmaco_homeo').val('');
            $('#manual_tipo_control_homeo').val('');
            $('#manual_dosis_medicamento_homeo').val('');
            $('#manual_frecuencia_medicamento_homeo').val('');
            $('#manual_via_administracion_homeo').val(0);
            $('#manual_periodo_homeo').val(0);
            $('#manual_cantidad_comprar_homeo').val('');
            $("#manual_medicamento_uso_cronico_homeo").prop("checked", false).change();
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

    // Función para receta magistral
    function indicar_medicamento_magistral_homeo()
    {
        let componente = $('#magistral_nombre_medicamento_homeo').val();
        let cantidad = $('#magistral_cantidad_medicamento_homeo').val();
        let tipo_control = $('#magistral_tipo_control_homeo').val();
        let dosis = $('#magistral_dosis_medicamento_homeo').val();
        let cantidad_comprar = $('#magistral_cantidad_comprar_homeo').val();
        let frecuencia = $('#magistral_frecuencia_medicamento_homeo').val();
        let id_via_administracion = $('#magistral_via_administracion_homeo').val();
        let via_administracion = $('#magistral_via_administracion_homeo option:selected').text();
        let id_periodo = $('#magistral_periodo_homeo').val();
        let periodo = $('#magistral_periodo_homeo option:selected').text();

        var valido = 0;
        var mensaje = '';

        if($.trim(componente) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Compuesto.\n';
        }

        if(valido == 0)
        {
            var medicamento_uso_cronico = $('#magistral_medicamento_uso_cronico').is(':checked') ? 1 : 0;

            var i = $('#tabla_medicamento_homeopatia_sdi tbody tr').length + 1;
            var nombre_completo = componente + ' - ' + cantidad;

            var fila = '<tr class="tabla_medicamento_homeopatia_sdi" id="row' + i + '">' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_medicamento magistral
                '<td class="text-center align-middle text-wrap">' + nombre_completo + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + componente + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_dosis magistral
                '<td class="text-center align-middle text-wrap">' + dosis + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_frecuencia magistral
                '<td class="text-center align-middle text-wrap">' + frecuencia + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion + '</td>' +
                '<td class="text-center align-middle text-wrap">' + via_administracion + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo + '</td>' +
                '<td class="text-center align-middle text-wrap">' + periodo + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_cantidad magistral
                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +
                '<td class="text-center align-middle text-wrap hidden" hidden="hidden"></td>' + // recomendacion
                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i + '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_homeo(\'row' + i + '\');">Quitar</div></td>'+
            '</tr>';

            $('#tabla_medicamento_homeopatia_sdi tbody').append(fila);

            // Limpiar campos magistrales
            $('#magistral_nombre_medicamento_homeo').val('');
            $('#magistral_cantidad_medicamento_homeo').val('');
            $('#magistral_dosis_medicamento_homeo').val('Cápsulas de gelatina duras');
            $('#magistral_cantidad_comprar_homeo').val('');
            $('#magistral_frecuencia_medicamento_homeo').val('');
            $('#magistral_via_administracion_homeo').val(0);
            $('#magistral_periodo_homeo').val(0);
            $("#magistral_medicamento_uso_cronico").prop("checked", false).change();
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

    function agregar_componente_homeo() {
        // Función para agregar más componentes a la receta magistral
        var nuevo_componente = `
            <div class="form-row componente">
                <div class="col-sm-8 mt-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Ingrese los Compuestos</label>
                        <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_homeo" value="">
                    </div>
                </div>
                <div class="col-sm-4 mt-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Ingrese la cantidad</label>
                        <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_homeo" value="">
                    </div>
                </div>
            </div>
        `;
        $('.div_componentes_homeo').append(nuevo_componente);
    }

    function registrar_medicamentos_homeo()
    {
        var rows1 = [];
        console.log('Iniciando registro de medicamentos homeopáticos...');

        $('#tabla_medicamento_homeopatia_sdi tbody tr').each(function(i, n) {
            var data = $(this).find("td");
            console.log('Procesando fila', i, 'con', data.length, 'columnas');

            // Validar que la fila tenga suficientes columnas (mínimo 15)
            if (data.length < 15) {
                console.log('Saltando fila', i, 'por tener insuficientes columnas:', data.length);
                return true; // Continuar con la siguiente iteración
            }

            var rol = {};

            rol['id_tipo_control'] = $.trim($(data[0]).text().split("\n").join("")); //id_tipo_control
            rol['id_producto'] = $.trim($(data[1]).text().split("\n").join("")); //id_medicamento
            rol['producto'] = $.trim($(data[2]).text().split("\n").join("")); //nombre_medicamento
            rol['componente'] = $.trim($(data[3]).text().split("\n").join("")); //farmaco

            rol['id_dosis'] = $.trim($(data[4]).text().split("\n").join("")); //id_dosis_medicamento
            rol['dosis'] = $.trim($(data[5]).text().split("\n").join("")); //dosis_medicamento

            rol['id_posologia'] = $.trim($(data[6]).text().split("\n").join("")); //id_frecuencia_medicamento
            rol['posologia'] = $.trim($(data[7]).text().split("\n").join("")); //frecuencia_medicamento

            rol['id_via_administracion'] = $.trim($(data[8]).text().split("\n").join("")); //id_via_administracion
            rol['via_administracion'] = $.trim($(data[9]).text().split("\n").join("")); //via_administracion

            rol['id_periodo'] = $.trim($(data[10]).text().split("\n").join("")); //id_periodo
            rol['periodo'] = $.trim($(data[11]).text().split("\n").join("")); //periodo

            rol['uso_cronico'] = $.trim($(data[12]).text().split("\n").join("")); //medicamento_uso_cronico

            rol['cantidad'] = $.trim($(data[13]).text().split("\n").join("")); //id_cantidad_comprar
            rol['cantidad_comprar'] = $.trim($(data[14]).text().split("\n").join("")); //cantidad_comprar
            rol['comentario'] = $.trim($(data[15]).text().split("\n").join("")); //recomendacion

            console.log('Datos extraídos de fila', i, ':', rol);

            // Validar campos críticos antes de agregar
            if (!rol.producto || rol.producto === '' ||
                !rol.dosis || rol.dosis === '' ||
                !rol.posologia || rol.posologia === '' ||
                !rol.via_administracion || rol.via_administracion === '' ||
                !rol.periodo || rol.periodo === '' ||
                !rol.cantidad_comprar || rol.cantidad_comprar === '') {

                console.log('Saltando fila', i, 'por campos incompletos:', {
                    producto: rol.producto,
                    dosis: rol.dosis,
                    posologia: rol.posologia,
                    via_administracion: rol.via_administracion,
                    periodo: rol.periodo,
                    cantidad_comprar: rol.cantidad_comprar
                });
                return true; // Continuar con la siguiente iteración
            }

            console.log('Fila', i, 'validada correctamente, agregando a rows1');
            rows1.push(rol);
        });

        console.log('Medicamentos homeopáticos validados para registrar:', rows1);

        if(rows1.length == 0) {
            swal({
                title: "Receta Homeopática",
                text: "Debe agregar al menos un medicamento homeopático válido con todos los campos requeridos",
                icon: "warning",
            });
            return;
        }

        // Obtener variables necesarias - usar las mismas que el modal principal
        let id_profesional = $('#id_profesional_fc').val() || $('#id_profesional_homeo').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        var _token = CSRF_TOKEN;

        console.log('Variables de registro:', {
            id_profesional: id_profesional,
            id_lugar_atencion: id_lugar_atencion,
            id_paciente: id_paciente,
            id_ficha_atencion: id_ficha_atencion
        });

        // Usar la misma ruta que los medicamentos normales
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
                tipo_receta: 'homeopatia' // Identificador para distinguir recetas homeopáticas
            },
        })
        .done(function(data) {
            console.log('Respuesta del servidor:', data)

            if (data != null) {
                console.log(data)

                if(data.falla == '0') {
                    swal({
                        title: "Receta Homeopática",
                        text: 'Medicamentos homeopáticos registrados con éxito.',
                        icon: "success",
                    });

                    // Limpiar la tabla después del registro exitoso
                    $('#tabla_medicamento_homeopatia_sdi tbody').empty();

                    // Cerrar el modal
                    $('#indicar_recetario_homeo').modal('hide');

                    // Recargar la lista de medicamentos registrados si existe la función
                    if (typeof cargarMedicamentosRegistrados === 'function') {
                        cargarMedicamentosRegistrados();
                    }
                }
                else {
                    swal({
                        title: "Error en Receta Homeopática",
                        text: 'Falla en el registro, intente nuevamente.',
                        icon: "error",
                    });
                }
            }
            else {
                swal({
                    title: "Error en Receta Homeopática",
                    text: 'Sin retorno de registro, intente nuevamente.',
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Error AJAX:', jqXHR, ajaxOptions, thrownError)
            swal({
                title: "Error de Conexión",
                text: 'Error al conectar con el servidor. Intente nuevamente.',
                icon: "error",
            });
        });
    }

    // Función de prueba para agregar un medicamento de ejemplo
    function agregarMedicamentoPrueba() {
        console.log('Agregando medicamento de prueba...');

        var fila = '<tr class="tabla_medicamento_homeopatia_sdi" id="rowprueba">' +
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_tipo_control
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">999</td>' + // id_producto
            '<td class="text-center align-middle text-wrap">Medicamento de Prueba</td>' + // nombre
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">Principio Activo</td>' + // farmaco
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_presentacion
            '<td class="text-center align-middle text-wrap">Tabletas 500mg</td>' + // presentacion
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // id_frecuencia
            '<td class="text-center align-middle text-wrap">1 cada 8 horas</td>' + // posologia
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>' + // id_via
            '<td class="text-center align-middle text-wrap">Vía Oral</td>' + // via_administracion
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">5</td>' + // id_periodo
            '<td class="text-center align-middle text-wrap">7 días</td>' + // periodo
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' + // uso_cronico
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>' + // id_cantidad
            '<td class="text-center align-middle text-wrap">1 Caja</td>' + // cantidad
            '<td class="text-center align-middle text-wrap hidden" hidden="hidden">Recomendación de prueba</td>' + // recomendacion
            '<td class="text-center align-middle text-wrap"><div name="remove" id="prueba" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_homeo(\'rowprueba\');">Quitar</div></td>'+
        '</tr>';

        $('#tabla_medicamento_homeopatia_sdi tbody').append(fila);
        console.log('Medicamento de prueba agregado. Total filas:', $('#tabla_medicamento_homeopatia_sdi tbody tr').length);
    }

    // Función auxiliar para cargar cantidad a comprar
    function cargarCantidadComprar(selectNumero, selectTipoUnidad, inputCantidad) {
        var numero = $('#' + selectNumero).val();
        var tipoUnidad = $('#' + selectTipoUnidad).val();
        var cantidad = numero + ' ' + tipoUnidad;
        $('#' + inputCantidad).val(cantidad);

        // Actualizar label si existe
        var labelId = inputCantidad.replace('_homeo', '_label_homeo');
        if ($('#' + labelId).length) {
            $('#' + labelId).text(cantidad);
        }
    }

    // Función para mostrar/ocultar el ranking de recetas
    $(document).ready(function() {
        $('#ranking_recetas_switch').change(function() {
            if ($(this).is(':checked')) {
                $('#ranking_recetas').show();
            } else {
                $('#ranking_recetas').hide();
            }
        });
    });

    // Función para cargar medicamentos registrados después del éxito
    function cargarMedicamentosRegistrados() {
        console.log('Cargando medicamentos registrados...');

        let id_ficha = $('#id_fc').val();
        if (!id_ficha) {
            console.log('No se encontró ID de ficha');
            return;
        }

        let url = "{{ route('detalle_receta.ver_medicamentos') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_ficha: id_ficha
            }
        })
        .done(function(data) {
            console.log('Medicamentos cargados:', data);

            // Si existe una tabla de medicamentos registrados, actualizarla
            if ($('#tabla_medicamentos_registrados').length) {
                actualizarTablaMedicamentos(data);
            }

            // También actualizar cualquier otra visualización de medicamentos
            if (typeof actualizarVisualizacionMedicamentos === 'function') {
                actualizarVisualizacionMedicamentos(data);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Error al cargar medicamentos:', jqXHR, ajaxOptions, thrownError);
        });
    }

    // Función auxiliar para actualizar tabla de medicamentos
    function actualizarTablaMedicamentos(medicamentos) {
        if (!medicamentos || !medicamentos.length) {
            console.log('No hay medicamentos para mostrar');
            return;
        }

        const tbody = $('#tabla_medicamentos_registrados tbody');
        if (!tbody.length) {
            console.log('No se encontró tabla de medicamentos registrados');
            return;
        }

        tbody.empty();

        medicamentos.forEach(function(medicamento, index) {
            let fila = `<tr>
                <td class="text-center">${index + 1}</td>
                <td>${medicamento.producto || 'N/A'}</td>
                <td>${medicamento.dosis || 'N/A'}</td>
                <td>${medicamento.posologia || 'N/A'}</td>
                <td>${medicamento.via_administracion || 'N/A'}</td>
                <td>${medicamento.periodo || 'N/A'}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-danger" onclick="eliminarMedicamentoRegistrado(${medicamento.id})">
                        <i class="feather icon-trash-2"></i>
                    </button>
                </td>
            </tr>`;
            tbody.append(fila);
        });
    }


</script>

