<div id="liquid_prof_institucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquid_prof_institucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine">Detalle Liquidación Profesionales Institución <span id="nombre_profesional_liquidacion"></span></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span onclick="cerrarModal()"; aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!-- Pills Pagos de atencion y Pagos de productos -->
                <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_tipo_pago" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset active" id="pago_atenciones_liqinst-tab" data-toggle="tab" href="#pago_atenciones_liqinst" role="tab" aria-controls="pago_atenciones_liqinst" aria-selected="true">Pago Atenciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="ventas_productos_liq_inst-tab" data-toggle="tab" href="#ventas_productos_liq_inst" role="tab" aria-controls="ventas_productos_liq_inst" aria-selected="false">Ventas de productos</a>
                    </li>
                </ul>
                <div class="tab-content" id="liq_tipo_pago">
                    <!--PAGO ATENCIONES-->
                    <div class="tab-pane fade show active" id="pago_atenciones_liqinst" role="tabpanel" aria-labelledby="pago_atenciones_liqinst-tab">
                        <form>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="liq_profes_inst" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="edit_info-tipo_contrato_liqinst-tab" data-toggle="tab" href="#edit_info-tipo_contrato_liqinst" role="tab" aria-controls="edit_info-tipo_contrato_liqinst" aria-selected="true">Info Contrato</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="fonasa_liq_inst-tab" data-toggle="tab" href="#fonasa_liq_inst" role="tab" aria-controls="fonasa_liq_inst" aria-selected="false">Fonasa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="isapre_liq_inst-tab" data-toggle="tab" href="#isapre_liq_inst" role="tab" aria-controls="isapre_liq_inst" aria-selected="false">Isapres</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="particular_liq_inst-tab" data-toggle="tab" href="#particular_liq_inst" role="tab" aria-controls="particular_liq_inst" aria-selected="false">Particulares y Efectivo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="a_pagar_prof-tab" data-toggle="tab" href="#a_pagar_prof" role="tab" aria-controls="a_pagar_prof" aria-selected="false">Valor a Pagar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="liq_profes_inst">
                                        <!--INFO CONTRATO-->
                                        <div class="tab-pane fade show active" id="edit_info-tipo_contrato_liqinst" role="tabpanel" aria-labelledby="edit_info-tipo_contrato_liqinst-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-lineal">
                                                        <div class="card-header-lineal">
                                                            Información de contrato
                                                        </div>
                                                        <div class="card-body-lineal">
                                                            <div class="form-row">
                                                                <div class="col-sm-2">
                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                        <a class="nav-link-aten text-reset active" id="exam-rn-traumato-tab" data-toggle="tab" href="#info_liq_inst_fijo" role="tab" aria-controls="info_liq_inst_fijo" aria-selected="true">Valor Fijo</a>
                                                                        <a class="nav-link-aten text-reset" id="info_liq_inst_variable-tab" data-toggle="tab" href="#info_liq_inst_variable" role="tab" aria-controls="info_liq_inst_variable" aria-selected="false">Variable</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-10">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active" id="info_liq_inst_fijo" role="tabpanel" aria-labelledby="info_liq_inst_fijo-tab">
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <h6 class="mb-3">Valor Fijo</h6>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-6 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="valor_fijo" class="floating-label-activo-sm font-weight-semibold">Valor Fijo Mensual ($)</label>
                                                                                            <input type="text" class="form-control form-control-sm bg-light" id="valor_fijo" readonly placeholder="Valor fijo según contrato">
                                                                                            <small class="text-muted">Este valor está definido en el contrato del profesional</small>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-sm-6 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="valor_bonificacion" class="floating-label-activo-sm font-weight-semibold">Bonificación</label>
                                                                                            <input type="text" class="form-control form-control-sm bg-light" id="valor_bonificacion" placeholder="Bonificación según contrato" onblur="calcular_remuneracion_total()">
                                                                                            <small class="text-muted">Este valor no está definido en el contrato del profesional</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade " id="info_liq_inst_variable" role="tabpanel" aria-labelledby="info_liq_inst_variable-tab">
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <h6 class="mb-3">Parámetros del Convenio</h6>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="porcentaje_variable" class="floating-label-activo-sm font-weight-semibold">Porcentaje Comisión (%)</label>
                                                                                            <input class="form-control form-control-sm" type="text" id="porcentaje_variable" placeholder="Ej: 30%">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="gastos_comunes_variable" class="floating-label-activo-sm font-weight-semibold">Gastos Comunes ($)</label>
                                                                                            <input class="form-control form-control-sm" type="text" id="gastos_comunes_variable" placeholder="Ej: 50000">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="gastos_box_variable" class="floating-label-activo-sm font-weight-semibold">Gastos Box ($)</label>
                                                                                            <input class="form-control form-control-sm" type="text" id="gastos_box_variable" placeholder="Ej: 30000">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <hr class="my-3">
                                                                                <h6 class="mb-3">Resumen de Valores</h6>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="total_variable_profesional" class="floating-label-activo-sm font-weight-semibold">Total Valor Variable ($)</label>
                                                                                            <input type="text" class="form-control form-control-sm bg-light" name="total_variable_profesional" id="total_variable_profesional" readonly placeholder="Calculado automáticamente">
                                                                                            <small class="form-text text-muted">Este valor se calcula automáticamente según los parámetros ingresados</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr> <br>                                                              
                                                            <div class="form-row">
                                                                <div class="col-12">
                                                                      <h6 class="mb-3 text-c-blue">Total General del Contrato</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="valor_total_prof" class="floating-label-activo-sm font-weight-semibold">Valor Total a Liquidar ($)</label>
                                                                        <input type="text" id="valor_total_prof" class="form-control form-control-lg bg-light border-primary font-weight-bold text-primary" readonly placeholder="Total calculado">
                                                                        <small class="form-text">Suma de todos los valores según tipo de contrato (fijo o variable)</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--INFO FONASA-->
                                        <div class="tab-pane fade show" id="fonasa_liq_inst" role="tabpanel" aria-labelledby="fonasa_liq_inst-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-lineal">
                                                        <div class="card-header-lineal">
                                                            Fonasa
                                                        </div>
                                                        <div class="card-body-lineal">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6> Total del Mes</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos mes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="numero_bonos_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Total Copago</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="total_copago_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Total Seguros</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="total_seguros_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Bonificación a Cobrar</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="bonificacion_cobrar_mes">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6>Desglose recibidos por el Profesional</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6>Desglose pendiente</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copago pendiente</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Enviado a Cobro (Bonif + Seguros)</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
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
                                        </div>
                                        <!--INFO ISAPRES-->
                                        <div class="tab-pane fade show" id="isapre_liq_inst" role="tabpanel" aria-labelledby="isapre_liq_inst-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-lineal">
                                                        <div class="card-header-lineal">
                                                            Isapre
                                                        </div>
                                                        <div class="card-body-lineal">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6> Total del Mes</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos mes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="numero_bonos_isapre_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Total Copago</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="total_copago_isapre_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Total Seguros</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="total_seguros_isapre_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Bonificación a Cobrar</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="bonificacion_cobrar_isapre_mes">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6> Desglose recibidos Por el Profesional</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos Recibidos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copago Recibidos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6>Desglose pendiente</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 mt-2">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Bonos Pendientes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copago pendiente</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-sm-6 col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Enviado a Cobro (Bonif + Seguros)</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
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
                                        </div>
                                        <!--INFO PARTICULAR-->
                                        <div class="tab-pane fade show" id="particular_liq_inst" role="tabpanel" aria-labelledby="particular_liq_inst-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-lineal">
                                                        <div class="card-header-lineal">
                                                            Particulares y Efectivo
                                                        </div>
                                                        <div class="card-body-lineal">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6>Total Recibidos</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">N° Atenciones</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="numero_atenciones_particulares">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Valor Particulares</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="valor_particulares_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copagos recibidos</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="copagos_recibidos_mes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-3">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Efectivo Recibido</label>
                                                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="efectivo_recibido_mes">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <h6>Total Pendiente</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-3 col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm"> Particulares Pendientes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Copagos Pendientes</label>
                                                                                    <input class="form-control form-control-sm" type="text" id="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Total Efectivo Pendiente</label>
                                                                                    <input type="number" disabled="disabled" class="form-control form-control-sm" type="text" id="">
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
                                        </div>
                                        <!--INFO LIQUIDACION-->
                                        <div class="tab-pane fade show" id="a_pagar_prof" role="tabpanel" aria-labelledby="a_pagar_prof-tab">
                                            <form>
                                                <!-- Sección de Fechas y Total -->
                                                <div class="card-lineal mb-3">
                                                    <div class="card-header-lineal">
                                                        <i class="feather icon-calendar"></i> Período de Liquidación
                                                    </div>
                                                    <div class="card-body-lineal">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label for="edit_empleado_fecha_inicio" class="floating-label-activo-sm font-weight-semibold">Fecha Inicio</label>
                                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_inicio" id="edit_empleado_fecha_inicio">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label for="edit_empleado_fecha_termino" class="floating-label-activo-sm font-weight-semibold">Fecha Término</label>
                                                                <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_termino" id="edit_empleado_fecha_termino" onchange="dame_valor_pagar()">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                                <label for="total_valor_pagar" class="floating-label-activo-sm font-weight-semibold">Valor Total Calculado ($)</label>
                                                                <input type="text" name="total_valor_pagar" id="total_valor_pagar" class="form-control form-control-sm bg-light font-weight-bold text-primary" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sección de Haberes -->
                                                <div class="card-lineal mb-3">
                                                    <div class="card-header-lineal">
                                                        <i class="fas fa-plus-circle"></i> Haberes (Ingresos)
                                                    </div>
                                                    <div class="card-body-lineal">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                                <label for="numero_bonos_fisico" class="floating-label-activo-sm font-weight-semibold">N° Bonos Físico</label>
                                                                <input type="number" class="form-control form-control-sm" name="numero_bonos_fisico" id="numero_bonos_fisico" placeholder="0">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                                <label for="valores_fonasa_liquidacion" class="floating-label-activo-sm font-weight-semibold">Valores Fonasa ($)</label>
                                                                <input type="text" class="form-control form-control-sm bg-light" name="valores_fonasa_liquidacion" id="valores_fonasa_liquidacion" readonly placeholder="$0">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                                <label for="valores_isapre_liquidacion" class="floating-label-activo-sm font-weight-semibold">Valores Isapre ($)</label>
                                                                <input type="text" class="form-control form-control-sm bg-light" name="valores_isapre_liquidacion" id="valores_isapre_liquidacion" readonly placeholder="$0">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                                <label for="valores_particulares_liquidacion" class="floating-label-activo-sm font-weight-semibold">Valores Particulares ($)</label>
                                                                <input type="text" class="form-control form-control-sm bg-light" name="valores_particulares_liquidacion" id="valores_particulares_liquidacion" readonly placeholder="$0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sección de Descuentos -->
                                                <div class="card-lineal mb-3">
                                                    <div class="card-header-lineal text-danger">
                                                        <i class="fas fa-minus-circle"></i> Descuentos
                                                    </div>
                                                    <div class="card-body-lineal">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                <label for="valor_pagar_institucion_liquidacion" class="floating-label-activo-sm font-weight-semibold">Valor a pagar a Institución ($)</label>
                                                                <input type="text" class="form-control form-control-sm bg-light" name="valor_pagar_institucion_liquidacion" id="valor_pagar_institucion_liquidacion" readonly placeholder="$0">
                                                                <small class="form-text">Descuentos por gastos institucionales</small>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                <label for="valor_recibidos_liquidacion" class="floating-label-activo-sm font-weight-semibold">Valores Recibidos ($)</label>
                                                                <input type="text" class="form-control form-control-sm bg-light" name="valor_recibidos_liquidacion" id="valor_recibidos_liquidacion" readonly placeholder="$0">
                                                                <small class="form-text">Anticipos o pagos ya recibidos</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Total Líquido a Pagar -->
                                                <div class="card-lineal border-primary">
                                                    <div class="card-header-lineal bg-primary text-white border-primary">
                                                        <i class="fas fa-dollar-sign"></i> Total Bonificación
                                                    </div>
                                                    <div class="card-body-lineal border-primary">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label for="total_pagar_liquidacion_profesional" class="floating-label-activo-sm font-weight-bold">Monto Final ($)</label>
                                                                <input type="text" name="total_pagar_liquidacion_profesional" id="total_pagar_liquidacion_profesional" class="form-control form-control-lg bg-white border-primary font-weight-bold text-primary text-center" readonly placeholder="$0" style="font-size: 1.5rem;">
                                                                <small class="form-text text-center">Este es el valor neto que recibirá el profesional</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Total Monto Imponible -->
                                                <div class="card-lineal border-info mb-3">
                                                    <div class="card-header-lineal bg-info border-info text-white">
                                                        <i class="fas fa-calculator"></i> Total Monto Imponible
                                                    </div>
                                                    <div class="card-body-lineal border-info">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label for="monto_imponible_liquidacion_profesional" class="floating-label-activo-sm font-weight-bold">Monto Imponible ($)</label>
                                                                <input type="text" name="monto_imponible_liquidacion_profesional" id="monto_imponible_liquidacion_profesional" class="form-control form-control-lg bg-white border-primary font-weight-bold text-primary text-center" readonly placeholder="$0" style="font-size: 1.5rem;">
                                                                <small class="form-text text-muted text-center">Este es el valor antes de descuentos legales</small>
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
                    </div>
                    <!--VENTAS PRODUCTOS-->
                    <div class="tab-pane fade show" id="ventas_productos_liq_inst" role="tabpanel" aria-labelledby="ventas_productos_liq_inst-tab">
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <!-- Sección de Período -->
                                    <div class="card-lineal mb-3">
                                        <div class="card-header-lineal">
                                            <i class="feather icon-calendar"></i> Período de Liquidación - Ventas de Productos
                                        </div>
                                        <div class="card-body-lineal">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label for="fecha_inicio_liq" class="floating-label-activo-sm font-weight-semibold">Fecha Inicio</label>
                                                    <input type="date" class="form-control form-control-sm" name="fecha_inicio_liq" id="fecha_inicio_liq">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label for="fecha_termino_liq" class="floating-label-activo-sm font-weight-semibold">Fecha Término</label>
                                                    <input type="date" class="form-control form-control-sm" name="fecha_termino_liq" id="fecha_termino_liq" onchange="dame_valor_pagar_venta_prod()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sección de Cálculos -->
                                    <div class="card-lineal mb-3">
                                        <div class="card-header-lineal">
                                            <i class="fas fa-shopping-cart"></i> Información de Ventas
                                        </div>
                                        <div class="card-body-lineal">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label for="total_valor_pagar_venta_prod" class="floating-label-activo-sm font-weight-semibold">Valor Total Vendido ($)</label>
                                                    <input type="text" name="total_valor_pagar_venta_prod" id="total_valor_pagar_venta_prod" class="form-control form-control-sm bg-light font-weight-bold" readonly placeholder="$0">
                                                    <small class="form-text">Total de productos vendidos en el período</small>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    <label for="porcentaje_a_pagar" class="floating-label-activo-sm font-weight-semibold">Porcentaje de Comisión (%)</label>
                                                    <input type="text" class="form-control form-control-sm bg-light font-weight-bold" name="porcentaje_a_pagar" id="porcentaje_a_pagar" readonly placeholder="0%">
                                                    <small class="form-text">Porcentaje según convenio del profesional</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Total a Pagar -->
                                    <div class="card-lineal border-primary">
                                        <div class="card-header-lineal bg-primary text-white">
                                            <i class="fas fa-dollar-sign"></i> Total Comisión por Ventas
                                        </div>
                                        <div class="card-body-lineal">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label for="total_a_pagar_profesional_venta_prod" class="floating-label-activo-sm font-weight-bold">Monto a Pagar al Profesional ($)</label>
                                                    <input type="text" name="total_a_pagar_profesional_venta_prod" id="total_a_pagar_profesional_venta_prod" class="form-control form-control-lg bg-white border-primary font-weight-bold text-success text-center" readonly placeholder="$0" style="font-size: 1.5rem;">
                                                    <small class="form-text text-center">Este es el valor de comisión por ventas de productos que recibirá el profesional</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar </button>
                <button type="button" class="btn btn-danger" onclick="generarPdf()"><i class="fas fa-file-pdf"></i> Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function liquidacion_prof_cm() {
        $('#liquid_prof_institucion').modal('show');
    }
    function cerrarModal() {
        $('#liq_prof_institucion').modal('hide');
    }

    function dame_valor_pagar() {
        let fecha_inicio = $('#edit_empleado_fecha_inicio').val();
        let fecha_termino = $('#edit_empleado_fecha_termino').val();
        let id_profesional = $('#id_profesional_liquidacion').val();

        $.ajax({
            url: '{{ route("laboratorio.estadisticas.buscar") }}',
            type: 'GET',
            data: {
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_termino,
                id_profesional: id_profesional,
                tipo_estadistica: 'comisiones_liquidacion_profesional'
            },
            success: function(response) {
                console.log(response);
                $('#total_valor_pagar').val(response.total_valor);
                $('#numero_bonos_fisico').val(response.bonos.length);
                let total_fonasa = 0;
                response.bonos.forEach(bono => {
                    console.log(bono);
                    if(bono.id_tipo_bono == 1 || bono.id_tipo_bono == 3){ //fonasa
                        total_fonasa++;
                    }
                });
                $('#valores_fonasa_liquidacion').val(total_fonasa);
                $('#total_pagar_liquidacion_profesional').val(response.total_valor_convenio);
                // sumamos el total imponible con el valor convenio
                let monto_imponible = parseFloat($('#monto_imponible_liquidacion_profesional').val()) || 0;
                let valor_convenio = parseFloat(response.total_valor_convenio) || 0;
                $('#monto_imponible_liquidacion_profesional').val( (monto_imponible + valor_convenio).toFixed(0) );
                // Aquí puedes renderizar los resultados
                //$('#grafico_comision').html(response || '<div class="alert alert-info">No hay resultados para el rango seleccionado.</div>');
            },
            error: function(error) {
                console.log(error);
                $('#total_valor_pagar').html('<div class="alert alert-danger">Error al buscar.</div>');
            }
        });
    }

    function calcular_remuneracion_total(){
        let valor_fijo = parseFloat($('#valor_fijo').val()) || 0;
        let bonificacion = parseFloat($('#valor_bonificacion').val()) || 0;

        let remuneracion_total = valor_fijo + bonificacion;

        $('#valor_total_prof').val(remuneracion_total.toFixed(0));
    }

    function dame_valor_pagar_venta_prod(){
    let fecha_inicio = $('#fecha_inicio_liq').val();
    let fecha_termino = $('#fecha_termino_liq').val();
    let id_profesional = $('#id_profesional_liquidacion').val();

    $.ajax({
        url: '{{ route("laboratorio.estadisticas.buscar") }}',
        type: 'GET',
        data: {
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_termino,
            id_profesional: id_profesional,
            tipo_estadistica: 'comisiones_liquidacion_profesional_venta_prod'
        },
        success: function(response) {
            console.log(response);
            $('#total_valor_pagar_venta_prod').val(response.total_valor);
            $('#porcentaje_a_pagar').val(response.porcentaje + '%');

            $('#total_a_pagar_profesional_venta_prod').val( (response.total_valor * (response.porcentaje / 100)).toFixed(0) );
        },
        error: function(error) {
            console.log(error);
            $('#total_valor_pagar_venta_prod').html('<div class="alert alert-danger">Error al buscar.</div>');
        }
    });
    }

    function generarPdf() {
        swal({
            title: 'Generar Liquidación Profesional',
            text: "¿Desea generar la liquidación del profesional?",
            icon: 'info',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Generar PDF',
                    value: true,
                    visible: true,
                    className: 'btn-primary',
                    closeModal: true
                }
            }
        }).then((confirmar) => {
            if (confirmar) {
                generarPdfConfirmar();
                // cerrar modal
                $('#liquid_prof_institucion').modal('hide');
            }
        });
    }

    function generarPdfConfirmar(){
        let id_profesional = $('#id_profesional_liquidacion').val();
        let fecha_inicio = $('#edit_empleado_fecha_inicio').val();
        let fecha_termino = $('#edit_empleado_fecha_termino').val();

        // Si fecha_inicio está vacía, intentar con el campo de ventas productos
        if (!fecha_inicio || fecha_inicio === '') {
            fecha_inicio = $('#fecha_inicio_liq').val();
        }

        // Si fecha_termino está vacía, intentar con el campo de ventas productos
        if (!fecha_termino || fecha_termino === '') {
            fecha_termino = $('#fecha_termino_liq').val();
        }

        // Validar que las fechas no estén vacías
        if (!fecha_inicio || fecha_inicio === '') {
            swal('Error', 'Debe seleccionar una fecha de inicio', 'error');
            return;
        }

        if (!fecha_termino || fecha_termino === '') {
            swal('Error', 'Debe seleccionar una fecha de término', 'error');
            return;
        }

        Fancybox.show(
                [{
                    src: "{{ route('laboratorio.profesional.liquidacion.pdf') }}?id_profesional=" + id_profesional + "&fecha_inicio=" + fecha_inicio + "&fecha_termino=" + fecha_termino,
                    type: "iframe",
                    preload: false,
                }, ]
        );
    }
</script>
