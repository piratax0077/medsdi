<!--datos convenio-->
<div id="nuevoConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevoConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">xConvenio para profesional {{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</h5>
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
                                            Empresas
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-convenio_institucion_isapres-tab" data-toggle="pill" href="#pills-convenio_institucion_isapres" role="tab" aria-controls="pills-convenio_institucion_isapres" aria-selected="true">
                                            Instituciones
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-convenio_ffaa_caja_comp-tab" data-toggle="pill" href="#pills-convenio_ffaa_caja_comp" role="tab" aria-controls="pills-convenio_institucion_isapres" aria-selected="true">
                                            FFAA y Cajas de compensación
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-convenio_especiales-tab" onclick="$('#productos_convenio_especiales').select2();" data-toggle="pill" href="#pills-convenio_especiales" role="tab" aria-controls="pills-convenio_especiales" aria-selected="true">
                                            Especiales
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4" id="pills-tab">
                                    <div class="tab-pane fade show active " id="pills-convenio_personal_profesional" role="tabpanel" aria-labelledby="pills-convenio_personal_profesional-tab">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-start">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Rut empresa</label>
                                                    <input type="text" class="form-control form-control-sm" id="rut_empresa" name="rut_empresa" oninput="formatoRut(this)">
                                                </div>
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="buscar_empresa()"><i class="fas fa-search"></i></button>
                                            </div>
                                            <div class="col-md-8" >
                                                <div class="d-none" id="contenedor_empresa">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombre empresa</label>
                                                        <input type="text" class="form-control form-control-sm" id="nombre_empresa" name="nombre_empresa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Giro empresa</label>
                                                        <input type="text" class="form-control form-control-sm" id="giro_empresa" name="giro_empresa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Región</label>
                                                        <select name="region_empresa" id="region_empresa" class="form-control form-control-sm" onchange="buscar_ciudad()">
                                                            <option value="0">Seleccione</option>
                                                            @foreach ($regiones as $r)
                                                                <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select name="ciudad_empresa" id="ciudad_empresa" class="form-control form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" id="direccion_empresa" name="direccion_empresa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm" id="telefono_empresa" name="telefono_empresa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electrónico</label>
                                                        <input type="email" class="form-control form-control-sm" id="correo_empresa" name="correo_empresa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                        <textarea class="form-control form-control-sm" id="observaciones_empresa" name="observaciones_empresa" rows="3"></textarea>
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="registrar_empresa()">Guardar Empresa</button>
                                                </div>
                                                <div class="d-none" id="contenedor_empresa_encontrada">
                                                    <h6 class="text-c-blue mb-2">Convenios</h6>
                                                    <div id="info_empresa">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nombre empresa</td>
                                                                    <td id="nombre_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Giro empresa</td>
                                                                    <td id="giro_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Región</td>
                                                                    <td id="region_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ciudad</td>
                                                                    <td id="ciudad_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dirección</td>
                                                                    <td id="direccion_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Teléfono</td>
                                                                    <td id="telefono_empresa_encontrada"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Correo Electrónico</td>
                                                                    <td id="correo_empresa_encontrada"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none" id="contenedor_nuevo_convenio">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Empresa</th>
                                                            <th>Tipo Convenio</th>
                                                            <th>Porcentaje</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="contenedor_tipos_convenios">
                                                    </tbody>
                                                </table>
                                                <div class="row d-none" id="contenedor_tipo_convenio">
                                                    <div class="col-md-12">
                                                        <div class="form-group flex-grow-1 me-2">
                                                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                            <input type="text" class="form-control form-control-sm" id="nombre_convenio" name="nombre_convenio">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                            <select name="tipo_convenio1" id="tipo_convenio1" class="form-control">
                                                                <option value="0">Seleccione</option>
                                                                @foreach($tipoproducto_convenios as $key_tc => $value_tc)
                                                                    <option value="{{ $value_tc->id }}">{{ $value_tc->descripcion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Porcentaje</label>
                                                            <input type="text" class="form-control form-control-sm" name="porcentaje_dcto1" id="porcentaje_dcto1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-success btn-sm float-right" onclick="guardar_tipo_convenio(1)"><i class="fas fa-save"></i></button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio1" name="fecha_inicial_pago_convenio1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Final</label>
                                                            <input type="date" class="form-control" value="" id="fecha_final_pago_convenio1" name="fecha_final_pago_convenio1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-flex justify-content-between">
                                                        <div class="switch switch-success d-inline">
                                                            <input type="checkbox" id="convenio_infinito1" name="convenio_infinito1" class="switch-input" onchange="document.getElementById('fecha_final_pago_convenio1').disabled = this.checked;">
                                                            <label for="convenio_infinito1" class="cr"></label>
                                                        </div>
                                                        <br>
                                                        <label class="floating-label-activo-sm">Indefinido</label>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea name="observaciones_nuevo_convenio1" id="observaciones_nuevo_convenio1" cols="30" rows="4" class="form-control"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-12" id="contenedor_tipos_convenio_empresa"></div>






                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="nuevo_tipo_convenio()"><i class="fas fa-plus"></i></button>
                                                {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button> --}}

                                            </div>


                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="pills-convenio_institucion_isapres" role="tabpanel" aria-labelledby="pills-convenio_institucion_isapres-tab">
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
                                                            <input type="number" class="form-control"  placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                            <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                                        <input type="number" class="form-control" placeholder="Indique condiciones" >
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
                                        <div class="row" id="contenedor_nuevo_convenio_prevision">
                                            <div class="col-md-12">

                                                <div class="row d-none" id="contenedor_tipo_convenio_prevision">

                                                    {{-- Fila 1: Nombre --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                            <input type="text" class="form-control form-control-sm" id="nombre_convenio_prevision1" name="nombre_convenio_prevision1">
                                                        </div>
                                                    </div>

                                                    {{-- Fila 2: Tipo / Porcentaje / Lugar --}}
                                                    <div class="col-md-5" id="col_tipo_convenio_prevision">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                            <select name="tipo_convenio_prevision1" id="tipo_convenio_prevision1" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                @foreach($tipoproducto_convenios as $key_tc => $value_tc)
                                                                    <option value="{{ $value_tc->id }}">{{ $value_tc->descripcion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="col_porcentaje_prevision">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Porcentaje (%)</label>
                                                            <input type="text" class="form-control form-control-sm" name="porcentaje_dcto_prevision1" id="porcentaje_dcto_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="col_lugar_atencion_prevision">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Lugar de Atención</label>
                                                            <select name="lugar_atencion_convenio_prevision1" id="lugar_atencion_convenio_prevision1" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                @foreach($lugares_atencion as $key_la => $value_la)
                                                                    <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- Fila 3: Valor / Garantía / Campos Fonasa (ocultos hasta activar Fonasa) --}}
                                                    <div class="col-md-6" id="col_valor_prevision">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor</label>
                                                            <input type="number" class="form-control form-control-sm" id="valor_prevision1" name="valor_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="col_valor_garantia_prevision">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Valor Garantía</label>
                                                            <input type="number" class="form-control form-control-sm" id="valor_garantia_prevision1" name="valor_garantia_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-none" id="col_nivel_fonasa">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Niveles</label>
                                                            <select class="form-control form-control-sm" id="nivel_fonasa_prevision1" name="nivel_fonasa_prevision1">
                                                                <option value="">-</option>
                                                                <option value="1">Nivel 1</option>
                                                                <option value="2">Nivel 2</option>
                                                                <option value="3">Nivel 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-none" id="col_copago_fonasa">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Copago Fonasa</label>
                                                            <input type="number" class="form-control form-control-sm" id="copago_fonasa_prevision1" name="copago_fonasa_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-none" id="col_bono_fonasa">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Bono Fonasa</label>
                                                            <input type="number" class="form-control form-control-sm" id="bono_fonasa_prevision1" name="bono_fonasa_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 d-none" id="col_tpo_espera_fonasa">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tpo. Espera</label>
                                                            <input type="number" class="form-control form-control-sm" id="tpo_espera_prevision1" name="tpo_espera_prevision1" placeholder="días" min="0">
                                                        </div>
                                                    </div>

                                                    {{-- Fila 4: Fechas / Indefinido / Acciones --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                            <input type="date" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio_prevision1" name="fecha_inicial_pago_convenio_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Final</label>
                                                            <input type="date" class="form-control form-control-sm" value="" id="fecha_final_pago_convenio_prevision1" name="fecha_final_pago_convenio_prevision1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="floating-label-activo-sm d-block">Indefinido</label>
                                                        <div class="d-flex align-items-center">
                                                            <div class="switch switch-success d-inline mr-2">
                                                                <input type="checkbox" id="convenio_infinito_prevision1" name="convenio_infinito_prevision1" class="switch-input" onchange="document.getElementById('fecha_final_pago_convenio_prevision1').disabled = this.checked;">
                                                                <label for="convenio_infinito_prevision1" class="cr"></label>
                                                            </div>

                                                            <button type="button" class="btn btn-sm btn-success" onclick="guardar_tipo_convenio_prevision(1)"><i class="fas fa-save"></i></button>
                                                        </div>
                                                    </div>

                                                    {{-- Fila 5: Observaciones --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea name="observaciones_nuevo_convenio_prevision" id="observaciones_nuevo_convenio_prevision" class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-12" id="contenedor_tipos_convenio_prevision"></div>






                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="nuevo_tipo_convenio_prevision()"><i class="fas fa-plus"></i></button>
                                                {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button> --}}

                                            </div>


                                        </div>

                                        {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button> --}}
                                        {{-- <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_profesional()"><i class="fas fa-save"></i> Guardar</button> --}}
                                    </div>

                                    <div class="tab-pane fade" id="pills-convenio_ffaa_caja_comp" role="tabpanel" aria-labelledby="pills-convenio_ffaa_caja_comp-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-2">Convenios</h6>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa1" onclick="evaluar_convenio(1)">
                                                    <label class="custom-control-label" id="text_convenio_ffa1" for="convenio_ffa1">Ejército</label>
                                                    <div style="display: none" id="valor_convenio_ffa1">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa2" onclick="evaluar_convenio(2)">
                                                    <label class="custom-control-label" id="text_convenio_ffa2" for="convenio_ffa2">Armada</label>
                                                    <div style="display: none" id="valor_convenio_ffa2">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa3" onclick="evaluar_convenio(3)">
                                                    <label class="custom-control-label" id="text_convenio_ffa3" for="convenio_ffa3">Bomberos</label>
                                                    <div style="display: none" id="valor_convenio_ffa3">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa4" onclick="evaluar_convenio(4)">
                                                    <label class="custom-control-label" id="text_convenio_ffa4" for="convenio_ffa4">Fuerza Aérea</label>
                                                    <div style="display: none" id="valor_convenio_ffa4d">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa5" onclick="evaluar_convenio(5)">
                                                    <label class="custom-control-label" id="text_convenio_ffa5" for="convenio_ffa5">Carabineros</label>
                                                    <div style="display: none" id="valor_convenio_ffa5">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa6" onclick="evaluar_convenio(6)">
                                                    <label class="custom-control-label" id="text_convenio_ffa6" for="convenio_ffa6">PDI</label>
                                                    <div style="display: none" id="valor_convenio_ffa6">
                                                        <select class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa7" onclick="evaluar_convenio(7)">
                                                    <label class="custom-control-label" id="text_convenio_ffa7" for="convenio_ffa7">Caja Los Andes</label>
                                                    <div style="display: none" id="valor_convenio_ffa7">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa8" onclick="evaluar_convenio(8)">
                                                    <label class="custom-control-label" id="text_convenio_ffa8" for="convenio_ffa8">Caja La Araucana</label>
                                                    <div style="display: none" id="valor_convenio_ffa8">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa9" onclick="evaluar_convenio(9)">
                                                    <label class="custom-control-label" id="text_convenio_ffa9" for="convenio_ffa9">Caja 18 de Septiembre</label>
                                                    <div style="display: none" id="valor_convenio_ffa9">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_ffa10" onclick="evaluar_convenio(10)">
                                                    <label class="custom-control-label" id="text_convenio_ffa10" for="convenio_ffa10">Caja Los Héroes</label>
                                                    <div style="display: none" id="valor_convenio_ffa10">
                                                        <select name="" id="" class="form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Pago con bono o programa</option>
                                                            <option value="2">Descuentos</option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Indique condiciones">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row" id="contenedor_nuevo_convenio_ffa">
                                            <div class="row d-none" id="contenedor_tipo_convenio_ffa">
                                                    <div class="col-md-12">
                                                        <div class="form-group flex-grow-1 me-2">
                                                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                            <input type="text" class="form-control form-control-sm" id="nombre_convenio_ffa1" name="nombre_convenio_ffa1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                            <select name="tipo_convenio_ffa1" id="tipo_convenio_ffa1" class="form-control">
                                                                <option value="0">Seleccione</option>
                                                                @foreach($tipoproducto_convenios as $key_tc => $value_tc)
                                                                    <option value="{{ $value_tc->id }}">{{ $value_tc->descripcion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Porcentaje</label>
                                                            <input type="text" class="form-control form-control-sm" name="porcentaje_dcto_ffa1" id="porcentaje_dcto_ffa1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Lugar de Atención</label>
                                                            <select name="lugar_atencion_convenio_ffa1" id="lugar_atencion_convenio_ffa1" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                @foreach($lugares_atencion as $key_la => $value_la)
                                                                    <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-success btn-sm float-right" onclick="guardar_tipo_convenio_ffa(1)"><i class="fas fa-save"></i></button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio_ffa1" name="fecha_inicial_pago_convenio_ffa1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Fecha Final</label>
                                                            <input type="date" class="form-control" value="" id="fecha_final_pago_convenio_ffa1" name="fecha_final_pago_convenio_ffa1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-flex justify-content-between">
                                                        <div class="switch switch-success d-inline">
                                                            <input type="checkbox" id="convenio_infinito_ffa1" name="convenio_infinito_ffa1" class="switch-input" onchange="document.getElementById('fecha_final_pago_convenio_ffa1').disabled = this.checked;">
                                                            <label for="convenio_infinito_ffa1" class="cr"></label>
                                                        </div>
                                                        <br>
                                                        <label class="floating-label-activo-sm">Indefinido</label>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea name="observaciones_nuevo_convenio_ffa" id="observaciones_nuevo_convenio_ffa" cols="30" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-12" id="contenedor_tipos_convenio_ffa"></div>






                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="nuevo_tipo_convenio_ffa()"><i class="fas fa-plus"></i></button>
                                                {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button> --}}

                                            </div>


                                        </div>
                                        {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right mx-2">Solicitar incorporación nuevo convenio</button> --}}
                                        {{-- <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_profesional()"><i class="fas fa-save"></i> Guardar</button> --}}
                                    </div>
                                    <div class="tab-pane fade" id="pills-convenio_especiales" role="tabpanel" aria-labelledby="pills-convenio_especiales-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Lugar Atención</label>
                                                    <select name="lugar_atencion_convenio_especiales" id="lugar_atencion_convenio_especiales" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @foreach($lugares_atencion as $key_la => $value_la)
                                                            <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_convenio_especiales" name="nombre_convenio_especiales">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                    <select name="tipo_convenio_especiales" id="tipo_convenio_especiales" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @foreach($tipos_convenio as $key_tc => $value_tc)
                                                            <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                    <input type="text" class="form-control form-control-sm" name="porcentaje_dcto_especiales" id="porcentaje_dcto_especiales">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio Inst</label>
                                                    <select name="tipo_convenio_institucion_especiales" id="tipo_convenio_institucion_especiales" class="form-control form-control-sm ">
                                                        <option value="0">Seleccione</option>
                                                        @foreach($tipos_convenio_institucion as $key_tc => $value_tc)
                                                            <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio_especiales" name="fecha_inicial_pago_convenio_especiales">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_final_pago_convenio_especiales" name="fecha_final_pago_convenio_especiales">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group ">
                                                    <label class="floating-label-activo-sm" for="productos_convenio_especiales">Productos a Convenir</label>
                                                    <select class="form-control form-control-sm" name="productos_convenio_especiales" id="productos_convenio_especiales" multiple="multiple">
                                                        @foreach($tipoproducto_convenios as $tp)
                                                            <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Rut representante</label>
                                                    <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" id="rut_representante_convenio" name="rut_representante_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre representante</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_representante_convenio" name="nombre_representante_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Telefono</label>
                                                    <input type="text" class="form-control form-control-sm" id="telefono_representante_convenio" name="telefono_representante_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Email</label>
                                                    <input type="text" class="form-control form-control-sm" id="email_representante_convenio" name="email_representante_convenio">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Direccion</label>
                                                    <input type="text" class="form-control form-control-sm" id="direccion_representante_convenio" name="direccion_representante_convenio">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <textarea name="observaciones_nuevo_convenio_especiales" id="observaciones_nuevo_convenio_especiales" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_institucion()"><i class="fas fa-save"></i> Guardar</button>
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
<input type="hidden" name="id_empresa" id="id_empresa">
<script>
    function evaluar_convenio(id) {
        var marcado = $('#convenio_' + id).is(':checked');

        // -- Regla 1: Particular (id=1) bloquea todos los demás --
        if (id === 1) {
            if (marcado) {
                // Desmarcar y deshabilitar convenios 2–12
                for (var i = 2; i <= 12; i++) {
                    $('#convenio_' + i)
                        .prop('checked', false)
                        .prop('disabled', true)
                        .closest('.custom-control').css('opacity', '0.45');
                    $('#valor_convenio_' + i).hide();
                }
            } else {
                // Re-habilitar convenios 2–12
                for (var i = 2; i <= 12; i++) {
                    $('#convenio_' + i)
                        .prop('disabled', false)
                        .closest('.custom-control').css('opacity', '1');
                }
            }
        }

        // -- Regla 2: mostrar/ocultar campos Fonasa según si convenio_2 está activo --
        _actualizar_campos_fonasa();

        // -- Regla 3: mostrar/ocultar el formulario de tipo convenio según si hay alguna previsión seleccionada --
        _actualizar_contenedor_tipo_convenio_prevision();
    }

    function _actualizar_contenedor_tipo_convenio_prevision() {
        var hayAlguno = false;
        for (var i = 1; i <= 12; i++) {
            if ($('#convenio_' + i).is(':checked')) {
                hayAlguno = true;
                break;
            }
        }
        if (hayAlguno) {
            $('#contenedor_tipo_convenio_prevision').removeClass('d-none');
        } else {
            $('#contenedor_tipo_convenio_prevision').addClass('d-none');
        }
    }

    function guardar_nuevo_convenio_institucion(){
        console.log('Guardar nuevo convenio especial');

        var nombre_convenio = $('#nombre_convenio_especiales').val();
        var tipo_convenio = $('#tipo_convenio_especiales').val();
        var porcentaje_dcto = $('#porcentaje_dcto_especiales').val();
        var tipo_convenio_institucion = $('#tipo_convenio_institucion_especiales').val();
        var fecha_inicial_pago_convenio = $('#fecha_inicial_pago_convenio_especiales').val();
        var fecha_final_pago_convenio = $('#fecha_final_pago_convenio_especiales').val();
        var productos_convenio = $('#productos_convenio_especiales').val();
        var observaciones_nuevo_convenio = $('#observaciones_nuevo_convenio_especiales').val();
var id_lugar_atencion = @if(isset($institucion)) "{{ $institucion->id_lugar_atencion }}" @else null @endif;
        var id_empresa = $('#id_empresa').val() || 0;

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
            mensaje += '<li>Seleccione fecha inicial</li>';
        }
        if(fecha_final_pago_convenio == ''){
            valido = 0;
            mensaje += '<li>Seleccione fecha final</li>';
        }
        if(productos_convenio == null){
            valido = 0;
            mensaje += '<li>Seleccione productos a convenir</li>';
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

        // Preparar datos en el mismo formato que guardar_tipo_convenio_ffa
        var data = {
            nombre_convenio: nombre_convenio,
            tipo_convenio: tipo_convenio,
            id_lugar_atencion: id_lugar_atencion,
            porcentaje: porcentaje_dcto,
            fecha_inicio: fecha_inicial_pago_convenio,
            fecha_termino: fecha_final_pago_convenio,
            observaciones: observaciones_nuevo_convenio,
            convenios: 'Especial', // Identificador para convenios especiales
            conveniosSeleccionados: [],
            id_empresa: id_empresa,
            productos_convenio: productos_convenio,
            tipo_convenio_institucion: tipo_convenio_institucion,
            _token: "{{ csrf_token() }}"
        };

        console.log(data);

        $.ajax({
            url: "{{ ROUTE('profesional.guardar_tipo_convenio') }}",
            type: 'POST',
            data: data,
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: 'Convenio registrado',
                        text: response.mensaje,
                        icon: 'success'
                    });
                    $('#nuevoConvenioInstitucion').modal('hide');
                    location.reload();
                }else{
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Error al registrar convenio',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error){
                console.error('Error:', error);
                swal({
                    title: 'Error',
                    text: 'Error al procesar la solicitud',
                    icon: 'error'
                });
            }
        });
    }

    function _actualizar_campos_fonasa() {
        var fonasa_activo = $('#convenio_2').is(':checked');

        // Verificar si hay algún convenio no-fonasa seleccionado (ids 1, 3-12)
        var otro_activo = false;
        var ids_no_fonasa = [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        ids_no_fonasa.forEach(function(i) {
            if ($('#convenio_' + i).is(':checked')) otro_activo = true;
        });

        var $solo_fonasa = $('#col_nivel_fonasa, #col_copago_fonasa, #col_bono_fonasa, #col_tpo_espera_fonasa');
        var $solo_otros  = $('#col_tipo_convenio_prevision, #col_porcentaje_prevision, #col_lugar_atencion_prevision, #col_valor_prevision, #col_valor_garantia_prevision');

        if (fonasa_activo && !otro_activo) {
            // Solo Fonasa: mostrar campos fonasa, ocultar tipo/porcentaje/lugar/valor/garantía
            $solo_fonasa.removeClass('d-none');
            $solo_otros.addClass('d-none');
            $('#valor_prevision1, #valor_garantia_prevision1').val('');
            $('#tipo_convenio_prevision1').val('0');
            $('#porcentaje_dcto_prevision1').val('');
            $('#lugar_atencion_convenio_prevision1').val('0');
        } else if (!fonasa_activo && otro_activo) {
            // Solo otros: mostrar tipo/porcentaje/lugar/valor/garantía, ocultar campos fonasa
            $solo_fonasa.addClass('d-none');
            $solo_otros.removeClass('d-none');
            $('#nivel_fonasa_prevision1').val('');
            $('#copago_fonasa_prevision1').val('');
            $('#bono_fonasa_prevision1').val('');
            $('#tpo_espera_prevision1').val('');
        } else if (fonasa_activo && otro_activo) {
            // Ambos: mostrar todo
            $solo_fonasa.removeClass('d-none');
            $solo_otros.removeClass('d-none');
        } else {
            // Ninguno: ocultar todo
            $solo_fonasa.addClass('d-none');
            $solo_otros.addClass('d-none');
            $('#nivel_fonasa_prevision1, #copago_fonasa_prevision1, #bono_fonasa_prevision1, #tpo_espera_prevision1').val('');
            $('#valor_prevision1, #valor_garantia_prevision1').val('');
            $('#tipo_convenio_prevision1').val('0');
            $('#porcentaje_dcto_prevision1').val('');
            $('#lugar_atencion_convenio_prevision1').val('0');
        }
    }


    function buscar_empresa(){
        let rut = $('#rut_empresa').val();
        if(rut == ''){
            swal({
                title: 'Error',
                text: 'Debe ingresar un rut',
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: '{{ ROUTE("profesional.buscar_empresa") }}',
            type: 'POST',
            data: {
                rut: rut,
                _token: CSRF_TOKEN
            },
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });
                    $('#contenedor_empresa_encontrada').removeClass('d-none');
                    $('#contenedor_empresa').addClass('d-none');
                    $('#contenedor_nuevo_convenio').removeClass('d-none');
                    $('#id_empresa').val(data.empresa.id);
                    $('#nombre_empresa_encontrada').text(data.empresa.nombre_empresa);
                    $('#giro_empresa_encontrada').text(data.empresa.giro_empresa);
                    $('#region_empresa_encontrada').text(data.empresa.region.nombre);
                    $('#ciudad_empresa_encontrada').text(data.empresa.ciudad.nombre);
                    $('#direccion_empresa_encontrada').text(data.empresa.direccion_empresa);
                    $('#telefono_empresa_encontrada').text(data.empresa.telefono_empresa);
                    $('#correo_empresa_encontrada').text(data.empresa.correo_empresa);

                    $('#nombre_convenio').val(data.empresa.nombre_convenio);
                    $('#porcentaje_dcto').val(data.empresa.porcentaje);
                    $('#fecha_inicial_pago_convenio').val(data.empresa.fecha_inicio);
                    $('#fecha_final_pago_convenio').val(data.empresa.fecha_termino);
                    $('#observaciones_nuevo_convenio1').val(data.empresa.observaciones);

                    let todos_convenios = data.todos_convenios;
                    $('#contenedor_tipos_convenios').empty();
                    todos_convenios.forEach(e => {
                        $('#contenedor_tipos_convenios').append(
                        `
                            <tr>
                                <td>${data.empresa.nombre_empresa}</td>
                                <td>${e.descripcion} </td>
                                <td>${e.porcentaje} %</td>
                                <td>
                                    <button class="btn btn-outline-warning btn-sm has-ripple" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_tipo_convenio(${e.id})"><i class="fas fa-trash"> </i> </button> </td>
                            </tr>
                        `
                        );
                    });

                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                    $('#contenedor_empresa_encontrada').addClass('d-none');
                    $('#contenedor_empresa').removeClass('d-none');
                    $('#contenedor_nuevo_convenio').addClass('d-none');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function registrar_empresa(){
        let rut = $('#rut_empresa').val();
        let nombre = $('#nombre_empresa').val();
        let direccion = $('#direccion_empresa').val();
        let giro = $('#giro_empresa').val();
        let region = $('#region_empresa').val();
        let ciudad = $('#ciudad_empresa').val();
        let telefono = $('#telefono_empresa').val();
        let correo = $('#correo_empresa').val();
        let observaciones = $('#observaciones_empresa').val();

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un rut</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un nombre</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una dirección</li>';
        }
        if(giro == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un giro</li>';
        }
        if(region == 0 || region == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar una región</li>';
        }
        if(ciudad == '' || ciudad == 0){
            valido = 0;
            mensaje += '<li>Debe ingresar una ciudad</li>';
        }
        if(telefono == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un teléfono</li>';
        }
        if(correo == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un correo</li>';
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

        let data = {
            rut: rut,
            nombre: nombre,
            giro: giro,
            direccion: direccion,
            region: region,
            ciudad: ciudad,
            telefono: telefono,
            correo: correo,
            observaciones: observaciones,
            _token: CSRF_TOKEN
        }

        console.log(data);

        $.ajax({
            url: '{{ ROUTE("profesional.registrar_empresa") }}',
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });
                    buscar_empresa();
                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function convenio_infinito(){
        if($('#convenio_infinito').is(':checked')){
            $('#fecha_final_pago_convenio').prop('disabled', true);
        }else{
            $('#fecha_final_pago_convenio').prop('disabled', false);
        }
    }

    function nuevo_tipo_convenio(){
        $('#contenedor_tipo_convenio').toggleClass('d-none');
    }

    function nuevo_tipo_convenio_prevision(){
        $('#contenedor_tipo_convenio_prevision').toggleClass('d-none');
    }

    function nuevo_tipo_convenio_ffa(){
        $('#contenedor_tipo_convenio_ffa').toggleClass('d-none');
    }

    function guardar_nombre_convenio(){

        let nombre = $('#nombre_convenio').val();
        if(nombre == ''){
            swal({
                title: 'Error',
                text: 'Debe ingresar un nombre',
                icon: 'error'
            });
            return false;
        }
        nuevo_tipo_convenio();
    }

    function guardar_tipo_convenio(count){
        let nombre_convencion = $('#nombre_convenio').val();
        let tipo_convenio = $('#tipo_convenio'+count).val();
        let porcentaje = $('#porcentaje_dcto'+count).val();
        let fecha_inicio = $('#fecha_inicial_pago_convenio'+count).val();
        let fecha_termino = $('#fecha_final_pago_convenio'+count).val();
        let observaciones = $('#observaciones_nuevo_convenio'+count).val();
        let id_empresa = $('#id_empresa').val();

        let valido = 1;
        let mensaje = '';

        if(nombre_convencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un nombre de convenio</li>';
        }

        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un tipo de convenio</li>';
        }
        if(porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un porcentaje</li>';
        }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una fecha de inicio</li>';
        }
        if(fecha_termino == '' && $('#convenio_infinito').is(':checked') == false){
            //valido = 0;
            //mensaje += '<li>Debe ingresar una fecha de término</li>';
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

        let data = {
            nombre_convenio: nombre_convencion,
            tipo_convenio: tipo_convenio,
            porcentaje: porcentaje,
            fecha_inicio: fecha_inicio,
            fecha_termino: fecha_termino,
            observaciones: observaciones,
            id_empresa: id_empresa,
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: '{{ ROUTE("profesional.guardar_tipo_convenio") }}',
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });

                    let todos_convenios = data.todos_convenios;
                    $('#contenedor_tipos_convenios').empty();
                    todos_convenios.forEach(e => {
                        $('#contenedor_tipos_convenios').append(
                        `
                            <tr>
                                <td>${e.descripcion} </td>
                                <td>${e.porcentaje} %</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"> </i> </button> </td>
                            </tr>
                        `
                        );
                    });
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    let convenios = data.convenios;
                    convenios.forEach(convenio => {
                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + convenio.nombre_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.rut_empresa + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.tipo_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_inicio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_termino + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.porcentaje + ' %</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function guardar_tipo_convenio_prevision(count){
        let nombre_convencion = $('#nombre_convenio_prevision'+count).val();
        let tipo_convenio = $('#tipo_convenio_prevision'+count).val();
        let id_lugar_atencion = $('#lugar_atencion_convenio_prevision'+count).val();
        let porcentaje = $('#porcentaje_dcto_prevision'+count).val();
        let fecha_inicio = $('#fecha_inicial_pago_convenio_prevision'+count).val();
        let fecha_termino = $('#fecha_final_pago_convenio_prevision'+count).val();
        let observaciones = $('#observaciones_nuevo_convenio_prevision').val();
        let id_empresa = $('#id_empresa').val();

        let valido = 1;
        let mensaje = '';

        if(nombre_convencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un nombre de convenio</li>';
        }

        if(id_lugar_atencion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un lugar de atención</li>';
        }

        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un tipo de convenio</li>';
        }
        // if(porcentaje == ''){
        //     valido = 0;
        //     mensaje += '<li>Debe ingresar un porcentaje</li>';
        // }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una fecha de inicio</li>';
        }
        if(fecha_termino == '' && $('#convenio_infinito').is(':checked') == false){
            //valido = 0;
            //mensaje += '<li>Debe ingresar una fecha de término</li>';
        }


        var convenios = '';
        for (let i = 1; i < 13; i++) {
            if ($('#convenio_' + i).prop('checked')) {
                convenios = convenios + $('#text_convenio_' + i).text() + ',';
            }
        }
        let conveniosSeleccionados = [];

        $('.custom-control-input:checked').each(function () {
            const id = $(this).attr('id').split('_')[1]; // Extrae el ID numérico
            const selectValue = $('#valor_convenio_' + id + ' select').val();
            const inputValue = $('#valor_convenio_' + id + ' input[type="number"]').val();

            conveniosSeleccionados.push({
                convenio: $('#text_convenio_' + id).text().replace(/\s+/g, ' ').trim(), // Elimina saltos de línea y espacios extra
                opcion: selectValue,
                condicion: inputValue
            });
        });

        if(convenios == ''){
            valido = 0;
            mensaje += '<li>Seleccione al menos un convenio</li>';
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


        let data = {
            nombre_convenio: nombre_convencion,
            tipo_convenio: tipo_convenio,
            id_lugar_atencion: id_lugar_atencion,
            porcentaje: porcentaje,
            fecha_inicio: fecha_inicio,
            fecha_termino: fecha_termino,
            observaciones: observaciones,
            convenios: convenios,
            conveniosSeleccionados: conveniosSeleccionados,
            id_empresa: id_empresa,
            nivel_fonasa: $('#nivel_fonasa_prevision1').val(),
            copago_fonasa: $('#copago_fonasa_prevision1').val(),
            bono_fonasa: $('#bono_fonasa_prevision1').val(),
            tpo_espera: $('#tpo_espera_prevision1').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);
        $.ajax({
            url: '{{ ROUTE("profesional.guardar_tipo_convenio") }}',
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });

                    let todos_convenios = data.todos_convenios;
                    $('#contenedor_tipos_convenios_prevision').empty();
                    todos_convenios.forEach(e => {
                        $('#contenedor_tipos_convenios_prevision').append(
                        `
                            <tr>
                                <td>${e.nombre_convenio}</td>
                                <td>${e.descripcion} </td>
                                <td>${e.porcentaje} %</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"> </i> </button> </td>
                            </tr>
                        `
                        );
                    });
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    let convenios = data.convenios;
                    convenios.forEach(convenio => {
                        // Procesar los convenios
                        let conveniosHtml = '';
                        if (convenio.convenios_array && convenio.convenios_array.length > 0) {
                            convenio.convenios_array.forEach(conv => {
                                conveniosHtml += '<span class="badge badge-info mb-1">' + conv + '</span><br>';
                            });
                        } else {
                            conveniosHtml = '<span class="text-muted">Sin convenios</span>';
                        }

                        let tipoAtencion = convenio.tipo_atencion || '';
                        let porcentaje = (convenio.porcentaje !== null && convenio.porcentaje !== undefined) ? convenio.porcentaje + '%' : '0%';
                        let valor = convenio.valor ? '$' + Number(convenio.valor).toLocaleString('es-CL') : '$0';
                        let valorGarantia = convenio.valor_garantia ? '$' + Number(convenio.valor_garantia).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let valorCopagoFonasa = convenio.valor_copago_fonasa ? '$' + Number(convenio.valor_copago_fonasa).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let valorBonFonasa = convenio.valor_bon_fonasa ? '$' + Number(convenio.valor_bon_fonasa).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let lugarAtencion = convenio.lugar_atencion_nombre || '<span class="text-muted">-</span>';

                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + conveniosHtml + '</td>';
                        fila += '<td class="align-middle text-center">' + tipoAtencion + '</td>';
                        fila += '<td class="align-middle text-center">' + porcentaje + '</td>';
                        fila += '<td class="align-middle text-right">' + valor + '</td>';
                        fila += '<td class="align-middle text-right">' + valorGarantia + '</td>';
                        fila += '<td class="align-middle text-right">' + valorCopagoFonasa + '</td>';
                        fila += '<td class="align-middle text-right">' + valorBonFonasa + '</td>';
                        fila += '<td class="align-middle text-center">' + lugarAtencion + '</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function guardar_tipo_convenio_ffa(count){
        let nombre_convencion = $('#nombre_convenio_ffa'+count).val();
        let id_lugar_atencion = $('#lugar_atencion_convenio_ffa'+count).val();
        let tipo_convenio = $('#tipo_convenio_ffa'+count).val();
        let porcentaje = $('#porcentaje_dcto_ffa'+count).val();
        let fecha_inicio = $('#fecha_inicial_pago_convenio_ffa'+count).val();
        let fecha_termino = $('#fecha_final_pago_convenio_ffa'+count).val();
        let observaciones = $('#observaciones_nuevo_convenio_ffa').val();
        let id_empresa = $('#id_empresa').val();

        let valido = 1;
        let mensaje = '';

        if(nombre_convencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un nombre de convenio</li>';
        }

        if(id_lugar_atencion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un lugar de atención</li>';
        }

        if(tipo_convenio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un tipo de convenio</li>';
        }
        if(porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar un porcentaje</li>';
        }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar una fecha de inicio</li>';
        }
        if(fecha_termino == '' && $('#convenio_infinito').is(':checked') == false){
            //valido = 0;
            //mensaje += '<li>Debe ingresar una fecha de término</li>';
        }


        var convenios = '';
        for (let i = 1; i < 13; i++) {
            if ($('#convenio_ffa' + i).prop('checked')) {
                convenios = convenios + $('#text_convenio_ffa' + i).text() + ',';
            }
        }
        let conveniosSeleccionados = [];

        $('.custom-control-input:checked').each(function () {
            const id = $(this).attr('id').split('_')[1]; // Extrae el ID numérico
            const selectValue = $('#valor_convenio_' + id + ' select').val();
            const inputValue = $('#valor_convenio_' + id + ' input[type="number"]').val();

            conveniosSeleccionados.push({
                convenio: $('#text_convenio_' + id).text().replace(/\s+/g, ' ').trim(), // Elimina saltos de línea y espacios extra
                opcion: selectValue,
                condicion: inputValue
            });
        });

        if(convenios == ''){
            valido = 0;
            mensaje += '<li>Seleccione al menos un convenio</li>';
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


        let data = {
            nombre_convenio: nombre_convencion,
            id_lugar_atencion: id_lugar_atencion,
            tipo_convenio: tipo_convenio,
            porcentaje: porcentaje,
            fecha_inicio: fecha_inicio,
            fecha_termino: fecha_termino,
            observaciones: observaciones,
            convenios: convenios,
            conveniosSeleccionados: conveniosSeleccionados,
            id_empresa: id_empresa,
            _token: CSRF_TOKEN
        }

        console.log(data);
        $.ajax({
            url: '{{ ROUTE("profesional.guardar_tipo_convenio") }}',
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });

                    let todos_convenios = data.todos_convenios;
                    $('#contenedor_tipos_convenios_prevision').empty();
                    todos_convenios.forEach(e => {
                        $('#contenedor_tipos_convenios_prevision').append(
                        `
                            <tr>
                                <td>${e.nombre_convenio}</td>
                                <td>${e.descripcion} </td>
                                <td>${e.porcentaje} %</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"> </i> </button> </td>
                            </tr>
                        `
                        );
                    });
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    let convenios = data.convenios;
                    convenios.forEach(convenio => {
                        // Procesar los convenios
                        let conveniosHtml = '';
                        if (convenio.convenios_array && convenio.convenios_array.length > 0) {
                            convenio.convenios_array.forEach(conv => {
                                conveniosHtml += '<span class="badge badge-info mb-1">' + conv + '</span><br>';
                            });
                        } else {
                            conveniosHtml = '<span class="text-muted">Sin convenios</span>';
                        }

                        let tipoAtencion = convenio.tipo_atencion || '';
                        let porcentaje = (convenio.porcentaje !== null && convenio.porcentaje !== undefined) ? convenio.porcentaje + '%' : '0%';
                        let valor = convenio.valor ? '$' + Number(convenio.valor).toLocaleString('es-CL') : '$0';
                        let valorGarantia = convenio.valor_garantia ? '$' + Number(convenio.valor_garantia).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let valorCopagoFonasa = convenio.valor_copago_fonasa ? '$' + Number(convenio.valor_copago_fonasa).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let valorBonFonasa = convenio.valor_bon_fonasa ? '$' + Number(convenio.valor_bon_fonasa).toLocaleString('es-CL') : '<span class="text-muted">-</span>';
                        let lugarAtencion = convenio.lugar_atencion_nombre || '<span class="text-muted">-</span>';

                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + conveniosHtml + '</td>';
                        fila += '<td class="align-middle text-center">' + tipoAtencion + '</td>';
                        fila += '<td class="align-middle text-center">' + porcentaje + '</td>';
                        fila += '<td class="align-middle text-right">' + valor + '</td>';
                        fila += '<td class="align-middle text-right">' + valorGarantia + '</td>';
                        fila += '<td class="align-middle text-right">' + valorCopagoFonasa + '</td>';
                        fila += '<td class="align-middle text-right">' + valorBonFonasa + '</td>';
                        fila += '<td class="align-middle text-center">' + lugarAtencion + '</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                }
            }
        });
    }

    function eliminar_tipo_convenio(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el tipo de convenio?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_tipo_convenio(id);
            }
        });
    }

    function confirmar_eliminar_tipo_convenio(id){
        let url = "{{ ROUTE('profesional.eliminar_tipo_convenio') }}";
        let data = {
            id: id,
            id_empresa: $('#id_empresa').val(),
            _token: CSRF_TOKEN
        }
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    let convenios = data.convenios;
                    convenios.forEach(convenio => {
                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + convenio.nombre_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.rut_empresa + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.tipo_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_inicio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_termino + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.porcentaje + ' %</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function eliminar_tipo_convenio_prevision(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el tipo de convenio?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_tipo_convenio_prevision(id);
            }
        });
    }

    function confirmar_eliminar_tipo_convenio_prevision(id){
        let url = "{{ ROUTE('profesional.eliminar_tipo_convenio') }}";
        let data = {
            id: id,
            id_empresa: $('#id_empresa').val(),
            _token: CSRF_TOKEN
        }
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.mensaje,
                        icon: 'success'
                    });
                    $('#tabla_convenios_profesional').DataTable().destroy();
                    $('#tabla_convenios_profesional tbody').empty();
                    let convenios = data.convenios;
                    let convenios_prevision = data.convenios_prevision;
                    convenios.forEach(convenio => {
                        let fila = '<tr>';
                        fila += '<td class="align-middle text-center">' + convenio.nombre_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.rut_empresa + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.tipo_convenio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_inicio + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.fecha_termino + '</td>';
                        fila += '<td class="align-middle text-center">' + convenio.porcentaje + ' %</td>';
                        fila += '<td class="align-middle text-center">';
                        fila += '<button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio(' + convenio.id + ')" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>';
                        fila += '<button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio(' + convenio.id + ')"><i class="fas fa-trash"></i> </button>';
                        fila += '</td>';
                        fila += '</tr>';
                        $('#tabla_convenios_profesional tbody').append(fila);
                    });
                    $('#tabla_convenios_profesional').DataTable({
                        "language": {
                            "url": "{{ asset('js/Spanish.json') }}"
                        }
                    });
                    $('#contenedor_tipos_convenios_prevision').empty();
                    convenios_prevision.forEach( convenio => {
                        $('#contenedor_tipos_convenios_prevision').append(
                        `
                            <tr>
                                <td>${convenio.nombre_convenio}</td>
                                <td>${convenio.descripcion} </td>
                                <td>${convenio.porcentaje} %</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_tipo_convenio_prevision(${convenio.id})"><i class="fas fa-trash"> </i> </button> </td>
                            </tr>
                        `
                        );
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }
</script>
