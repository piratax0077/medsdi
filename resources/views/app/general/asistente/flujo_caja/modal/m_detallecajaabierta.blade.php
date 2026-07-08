<!--DETALLE CAJA ABIERTA-->
<div class="modal fade" id="detallecajaabierta" tabindex="-1" role="dialog" aria-labelledby="detallecajaabierta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-white border-bottom">
                <div>
                    <h6 class="mb-0 mt-2 f-22 font-weight-bold text-dark">
                        <i class="feather icon-credit-card icono-primary"></i> <span id="modal_caja_titulo">Detalle de caja</span>
                    </h6>
                </div>

                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_detallecajaabierta();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_caja_operativa_cierre" value="">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="card py-0">
                            <div class="card-body pb-2 pt-2">
                                <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset active" id="caja-cierre-tab" data-toggle="pill" href="#caja-cierre" role="tab" aria-controls="caja-cierre" aria-selected="true">
                                            Cerrar caja
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="caja-entrega-tab" data-toggle="pill" href="#caja-entrega" role="tab" aria-controls="caja-entrega" aria-selected="false">
                                            Entregar caja
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="transaccionesopen-tab" data-toggle="pill" href="#transaccionesopen" role="tab" aria-controls="caja-entrega" aria-selected="false">
                                            Transacciones
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                        <div class="tab-content">
                            <!--CERRAR CAJA-->
                            <div class="tab-pane show active" id="caja-cierre" role="tabpanel" aria-labelledby="caja-cierre-tab">
                                <div class="alert alert-success shadow-sm">
                                    <div class="form-row">
                                        <div class="col-12">
                                             <div class="font-weight-semibold  mb-md-0">
                                            <h6 class="mb-2"><span class="badge badge-pill badge-success">CAJA ABIERTA</span></h6>
                                            <span class="f-16">Ingrese la cantidad de dinero que quedará en la caja luego del cierre</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-3 mt-3">
                                            <label class="mb-1 text-uppercase">Saldo Cierre</label>
                                            <input type="number" id="saldo_cierre" class="form-control form-control-sm mr-2 input-caja" placeholder="$0">
                                        </div>
                                        <div class="form-group col-3 mt-3">
                                            <label class="mb-1 text-uppercase">Diferencia</label>
                                            <input type="number" id="diferencia_cierre" class="form-control form-control-sm mr-2 input-caja" placeholder="$0">
                                        </div>
                                        <div class="form-group col-3 mt-3">
                                            <label class="mb-1 text-uppercase">Observaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="observaciones_cierre"></textarea>
                                        </div>
                                        <div class="form-group col-3 mt-3">
                                            <label class="mb-1 text-uppercase"></label>
                                            <button class="btn btn-danger btn-sm btn-block mt-1" onclick="cerrarCaja();"><i class="feather icon-x"></i> Cerrar caja</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ENTREGAR (TRASPASAR) CAJA-->
                            <div class="tab-pane fade" id="caja-entrega" role="tabpanel" aria-labelledby="caja-entrega-tab">
                                <div class="alert alert-success  shadow-sm">
                                    <div class="form-row">
                                        <div class="col-12">
                                             <div class="font-weight-semibold  mb-md-0">
                                            <h6 class="mb-2"><span class="badge badge-pill badge-success">CAJA ABIERTA</span></h6>
                                            <span class="f-16">Ingrese la cantidad de dinero que quedará en la caja luego de la entrega</span>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 mt-3">
                                            <label class="mb-1 text-uppercase">Responsable actual</label>
                                            <input type="text" id="responsable_actual_entrega" class="form-control form-control-sm" disabled>
                                        </div>
                                        <div class="form-group col-6 mt-3">
                                            <label class="mb-1 text-uppercase">Saldo a entregar</label>
                                            <input type="number" id="saldo_entregar" class="form-control form-control-sm mr-2 input-caja" placeholder="$0" required="">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="mb-1 text-uppercase">Entregar caja a</label>
                                            <select id="nuevo_responsable" class="form-control form-control-sm" required>
                                                <option value="">Seleccione usuario</option>
                                                @foreach($lista_asistentes as $responsable)
                                                      <option value="{{ $responsable->id }}" class="text-uppercase">{{ $responsable->nombres }} {{ $responsable->apellido_uno }} {{ $responsable->apellido_dos }}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="mb-1 text-uppercase">Observaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="observaciones_entrega"></textarea>
                                        </div>
                                         <div class="form-group col-3">
                                            <label class="mb-1 text-uppercase"></label>
                                            <button class="btn btn-warning btn-sm btn-block mt-1" onclick="entregarCaja()"><i class="feather icon-check"></i> Entregar caja</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ENTREGAR (TRASPASAR) CAJA-->
                            <div class="tab-pane fade" id="transaccionesopen" role="tabpanel" aria-labelledby="transaccionesopen-tab">
                                <div class="row my-4">
                                    <div class="col-12 mb-3 ">
                                    <h5 class="text-dark"><i class="feather icon-credit-card icono-primary"></i> Transacciones (00/00/0000)<!--PONER FECHA DEL CIERRE--> </h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                        <div class="table-responsive">
                                <div class="dt-responsive table-responsive">
                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Paciente</th>
                                                <th class="align-middle">Convenio</th>
                                                <th class="align-middle">Tipo atención</th>
                                                <th class="align-middle">Profesional</th>
                                                <th class="align-middle">Boleta</th>
                                                <th class="align-middle">Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Juan Perez<br>
                                                    18.233.434-1</strong>
                                                </td>
                                                <td>
                                                    Banmédica<br>
                                                    <small>CÓD: 723874</small>
                                                </td>
                                                 <td class="text-wrap">
                                                    <span>Consulta</span><br>
                                                    <small>Bono emitido por institución</small><!--CLASE-->
                                                </td>
                                                 <td class="text-wrap">
                                                    <strong>Jaime Kriman<br>
                                                    823982934-9</strong>
                                                    <br>
                                                    <small>Otorrinolaringología</small>
                                                </td>  <td>
                                                   #564654654
                                                </td>
                                                <td>
                                                    $45.000<br>
                                                    <small>Débito</small> <!--MEDIO DE PAGO-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Juan Perez<br>
                                                    18.233.434-1</strong>
                                                </td>
                                                <td>
                                                    Fonasa<br>
                                                    <small>CÓD: 234432</small>
                                                </td>
                                                <td>
                                                    <span>Programa</span><br>
                                                    <span>N° 732847</span><br>
                                                    <small>Bono emitido por institución</small><!--CLASE-->
                                                </td>
                                                <td class="text-wrap">
                                                    <strong>Jaime Kriman<br>
                                                    823982934-9</strong>
                                                    <br>
                                                    <small>Otorrinolaringología</small>
                                                </td>  <td>
                                                   #564654654
                                                </td>
                                                <td>
                                                    $45.000<br>
                                                    <small>Débito</small> <!--MEDIO DE PAGO-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-row mb-4">
                    <div class="col-6 mb-2">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center py-0">
                                    <i class="feather icon-credit-card icono-primary badge-success f-18"></i>
                                <div>
                                     <small class="d-block text-dark font-weight-bold">
                                        Total acumulado
                                    </small>
                                    <h5 class="mb-0 font-weight-bold" id="caja_total_acumulado_card">
                                        $0
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center py-0">
                                    <i class="feather icon-check icono-primary f-18"></i>
                                <div>
                                     <small class="d-block text-dark font-weight-bold">
                                        Apertura
                                    </small>
                                    <h5 class="mb-0 font-weight-bold" id="caja_fecha_apertura">
                                        --/--/---- - --:--
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center py-0">
                                    <i class="feather icon-user icono-primary f-18"></i>
                                <div>
                                     <small class="d-block text-dark font-weight-bold">
                                        Responsable de la caja
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        <span id="modal_caja_responsable">Nombre asistente</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center py-0">
                                <i class="feather icon-home icono-primary f-18"></i>
                                <div>
                                    <small class="d-block text-dark font-weight-bold">
                                        Institución
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        Insi(Casa Matriz)
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
               </div>
                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered  table-sm">
                        <tbody>
                            <tr class="bg-light">
                                <td class="font-weight-bold">Saldo anterior</td>
                                <td class="font-weight-bold" id="caja_saldo_anterior">$0</td>
                            </tr>

                            <tr class="bg-gris-table">
                                <td class="font-weight-bold text-c-blue">Abono inicial</td>
                                <td class="text-c-blue font-weight-bold" id="caja_abono_inicial">$0</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="font-weight-bold">Total Efectivo</td>
                                <td class="font-weight-bold" id="caja_total_efectivo">$0</td>
                            </tr>
                             <tr class="bg-light">
                                <td class="font-weight-bold">Total Bonos</td>
                                <td class="font-weight-bold" id="caja_total_bonos">0</td>
                            </tr>
                             <tr class="bg-light">
                                <td class="font-weight-bold">Total Otros</td>
                                <td class="font-weight-bold" id="caja_total_otros">$0</td>
                            </tr>

                            <!--<tr class="bg-light">
                                <td class="font-weight-bold">Total Débito</td>
                                <td class="font-weight-bold">$0</td>
                            </tr>


                            <tr class="bg-light">
                                <td class="font-weight-bold">Total Crédito</td>
                                <td  class="font-weight-bold">$0</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="font-weight-bold">Total Cheques</td>
                                <td class="font-weight-bold">$0</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="font-weight-bold text-danger">Notas de crédito (-)</td>
                                <td class="text-danger">-$35.000</td>
                            </tr>
                             <tr class="bg-light">
                                <td class="font-weight-bold text-danger">Devoluciones (-)</td>
                                <td class="text-danger font-weight-bold">-$35.045</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="font-weight-bold text-danger">Total Gastos (-)</td>
                                <td class="text-danger font-weight-bold">-$38.243</td>
                            </tr>-->
                            <tr class="bg-light">
                                <td class="font-weight-bold">Total Acumulado</td>
                                <td class="font-weight-bold" id="caja_total_acumulado">$0</td>
                            </tr>

                            <tr class="bg-success-table">
                                <td class="font-weight-bold">
                                    <h5 class="text-success-table">Total caja </h5>
                                </td>
                                <td class="font-weight-bold h5 text-success-table" id="caja_total_caja">
                                    $0
                                </td>
                            </tr>

                            <tr class="bg-gris-table">
                                <td class="font-weight-bold text-c-blue">Saldo cierre</td>
                                <td class="text-c-blue font-weight-bold" id="caja_saldo_cierre_display">$0</td>
                            </tr>

                        </tbody>

                    </table>
                </div>


            </div>

        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
