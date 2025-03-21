<!--datos convenio-->
<div id="nuevoConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevoConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Convenio para profesional {{ $profesional->nombres }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <!--Pills-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    {{-- ENTREGA DE BONOS DE ASISTENTE AL PROFESIONAL O ENCARGADO - TIPO NO PROGRAMA--}}
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1 active" id="pills-convenio_personal_profesional-tab" data-toggle="pill" href="#pills-convenio_personal_profesional" role="tab" aria-controls="pills-convenio_personal_profesional" aria-selected="true">
                                            Convenios a Empresas
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-convenio_institucion_isapres-tab" data-toggle="pill" href="#pills-convenio_institucion_isapres" role="tab" aria-controls="pills-convenio_institucion_isapres" aria-selected="true">
                                            Convenios a Instituciones
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-convenio_ffaa_caja_comp-tab" data-toggle="pill" href="#pills-convenio_institucion_isapres" role="tab" aria-controls="pills-convenio_institucion_isapres" aria-selected="true">
                                            Convenios a FFAA y Cajas de compensación
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4" id="pills-tab">
                                    <div class="tab-pane fade show active " id="pills-convenio_personal_profesional" role="tabpanel" aria-labelledby="pills-convenio_personal_profesional-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                    <input type="text" class="form-control" id="nombre_convenio" name="nombre_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                    <select name="tipo_convenio" id="tipo_convenio" class="form-control" multiple="multiple">
                                                        <option value="0">Seleccione</option>
                                                        @foreach($tipoproducto_convenios as $key_tc => $value_tc)
                                                            <option value="{{ $value_tc->id }}">{{ $value_tc->descripcion }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                    <input type="text" class="form-control" name="porcentaje_dcto" id="porcentaje_dcto">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio" name="fecha_inicial_pago_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control" value="" id="fecha_final_pago_convenio" name="fecha_final_pago_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="switch switch-success d-inline">
                                                    <input type="checkbox" id="tratamiento_listo_30" onchange="cambiarTextoLabel(30)">
                                                    <label for="tratamiento_listo_30" class="cr"></label>
                                                </div>
                                                <br>
                                                <label class="floating-label-activo-sm">Indefinido</label>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Tipo de atención @if($profesional->id_especialidad == 2) dental @else médica @endif</label>
                                                    <select name="tipo_atencion_medica" id="tipo_atencion_medica" class=" form-control form-control-sm">
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="Valor de presupuesto">Valor de presupuesto</option>
                                                        <option value="Controles">Controles</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
                                                <div class="form-group fill">
                                                    <label class="floating-label-activo-sm">Valor</label>
                                                    <input name="valor_convenio" id="valor_convenio" type="number" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div> --}}

                                        <hr>


                                    </div>
                                    <div class="tab-pane fade show " id="pills-convenio_institucion_isapres" role="tabpanel" aria-labelledby="pills-convenio_institucion_isapres-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-2">Convenios</h6>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_1" onclick="evaluar_convenio(1)">
                                                    <label class="custom-control-label" id="text_convenio_1"
                                                        for="convenio_1">Particular</label>
                                                        <div style="display: none" id="valor_convenio_1">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control"  placeholder="Indique condiciones" >
                                                        </div>

                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_2" placeholder="Indique condiciones" onclick="evaluar_convenio(2)">
                                                    <label class="custom-control-label" id="text_convenio_2"
                                                        for="convenio_2">Fonasa</label>
                                                        <div style="display: none" id="valor_convenio_2">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>

                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_3" onclick="evaluar_convenio(3)">
                                                    <label class="custom-control-label" id="text_convenio_3" for="convenio_3">Todas las
                                                        Isapres</label>
                                                        <div style="display: none" id="valor_convenio_3">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_4" onclick="evaluar_convenio(4)">
                                                    <label class="custom-control-label" id="text_convenio_4"
                                                        for="convenio_4">Banmédica</label>
                                                        <div style="display: none" id="valor_convenio_4">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_5" onclick="evaluar_convenio(5)">
                                                    <label class="custom-control-label" id="text_convenio_5"
                                                        for="convenio_5">Colmena</label>
                                                        <div style="display: none" id="valor_convenio_5">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_6" onclick="evaluar_convenio(6)">
                                                    <label class="custom-control-label" id="text_convenio_6" for="convenio_6">Nueva
                                                        Masvida</label>
                                                        <div style="display: none" id="valor_convenio_6">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_7" onclick="evaluar_convenio(7)">
                                                    <label class="custom-control-label" id="text_convenio_7"
                                                        for="convenio_7">Consalud</label>
                                                        <div style="display: none" id="valor_convenio_7">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_8" onclick="evaluar_convenio(8)">
                                                    <label class="custom-control-label" id="text_convenio_8" for="convenio_8">Cruz
                                                        Blanca</label>
                                                        <div style="display: none" id="valor_convenio_8">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_9" onclick="evaluar_convenio(9)">
                                                    <label class="custom-control-label" id="text_convenio_9" for="convenio_9">Cruz del
                                                        Norte</label>
                                                        <div style="display: none" id="valor_convenio_9">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_10" onclick="evaluar_convenio(10)">
                                                    <label class="custom-control-label" id="text_convenio_10" for="convenio_10">Vida
                                                        Tres</label>
                                                        <div style="display: none" id="valor_convenio_10">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_11" onclick="evaluar_convenio(11)">
                                                    <label class="custom-control-label" id="text_convenio_11" for="convenio_11">Fundación
                                                    </label>
                                                    <div style="display: none" id="valor_convenio_11">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_12" onclick="evaluar_convenio(12)">
                                                    <label class="custom-control-label" id="text_convenio_12"
                                                        for="convenio_12">Isalud</label>
                                                        <div style="display: none" id="valor_convenio_12">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show " id="pills-convenio_ffaa_caja_comp-tab" role="tabpanel" aria-labelledby="pills-convenio_institucion_isapres-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-2">Convenios</h6>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_1" onclick="evaluar_convenio(1)">
                                                    <label class="custom-control-label" id="text_convenio_1"
                                                        for="convenio_1">Particular</label>
                                                        <div style="display: none" id="valor_convenio_1">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control"  placeholder="Indique condiciones" >
                                                        </div>

                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_2" placeholder="Indique condiciones" onclick="evaluar_convenio(2)">
                                                    <label class="custom-control-label" id="text_convenio_2"
                                                        for="convenio_2">Fonasa</label>
                                                        <div style="display: none" id="valor_convenio_2">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>

                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_3" onclick="evaluar_convenio(3)">
                                                    <label class="custom-control-label" id="text_convenio_3" for="convenio_3">Todas las
                                                        Isapres</label>
                                                        <div style="display: none" id="valor_convenio_3">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_4" onclick="evaluar_convenio(4)">
                                                    <label class="custom-control-label" id="text_convenio_4"
                                                        for="convenio_4">Banmédica</label>
                                                        <div style="display: none" id="valor_convenio_4">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_5" onclick="evaluar_convenio(5)">
                                                    <label class="custom-control-label" id="text_convenio_5"
                                                        for="convenio_5">Colmena</label>
                                                        <div style="display: none" id="valor_convenio_5">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_6" onclick="evaluar_convenio(6)">
                                                    <label class="custom-control-label" id="text_convenio_6" for="convenio_6">Nueva
                                                        Masvida</label>
                                                        <div style="display: none" id="valor_convenio_6">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_7" onclick="evaluar_convenio(7)">
                                                    <label class="custom-control-label" id="text_convenio_7"
                                                        for="convenio_7">Consalud</label>
                                                        <div style="display: none" id="valor_convenio_7">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_8" onclick="evaluar_convenio(8)">
                                                    <label class="custom-control-label" id="text_convenio_8" for="convenio_8">Cruz
                                                        Blanca</label>
                                                        <div style="display: none" id="valor_convenio_8">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_9" onclick="evaluar_convenio(9)">
                                                    <label class="custom-control-label" id="text_convenio_9" for="convenio_9">Cruz del
                                                        Norte</label>
                                                        <div style="display: none" id="valor_convenio_9">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_10" onclick="evaluar_convenio(10)">
                                                    <label class="custom-control-label" id="text_convenio_10" for="convenio_10">Vida
                                                        Tres</label>
                                                        <div style="display: none" id="valor_convenio_10">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_11" onclick="evaluar_convenio(11)">
                                                    <label class="custom-control-label" id="text_convenio_11" for="convenio_11">Fundación
                                                    </label>
                                                    <div style="display: none" id="valor_convenio_11">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones" >
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_12" onclick="evaluar_convenio(12)">
                                                    <label class="custom-control-label" id="text_convenio_12"
                                                        for="convenio_12">Isalud</label>
                                                        <div style="display: none" id="valor_convenio_12">
                                                            <select name="" id="" class="form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Pago con bono o programa</option>
                                                                <option value="2">Descuentos</option>
                                                            </select>
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea name="observaciones_nuevo_convenio" id="observaciones_nuevo_convenio" cols="30" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button>
                                <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_profesional()"><i class="fas fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    function evaluar_convenio(id) {
        var result = false;
        if ($('#convenio_' + id).is(':checked')) {
            result = true;
            $('#valor_convenio_' + id).css('display', 'block');
        } else {
            result = false;
            $('#valor_convenio_' + id).css('display', 'none');
        }

        // Captura del valor del select e input (si están visibles)
        if (result) {
            const selectValue = $('#valor_convenio_' + id + ' select').val();
            const inputValue = $('#valor_convenio_' + id + ' input[type="text"]').val();

            console.log(`Convenio ${id} seleccionado:`);
            console.log(`- Opción seleccionada: ${selectValue}`);
            console.log(`- Condición ingresada: ${inputValue}`);
        } else {
            console.log(`Convenio ${id} deseleccionado.`);
        }
    }



</script>
