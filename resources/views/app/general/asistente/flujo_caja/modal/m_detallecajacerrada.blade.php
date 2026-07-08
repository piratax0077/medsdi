<!--DETALLE CAJA CERRADA-->
<div class="modal fade" id="detallecajacerrada" tabindex="-1" role="dialog" aria-labelledby="detallecajacerrada" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <!-- Header -->
            <div class="modal-header bg-white border-bottom">
                <div>
                    <h6 class="mb-0 mt-2 f-22 font-weight-bold text-dark mb-2">
                        <i class="feather icon-credit-card icono-primary"></i> Detalle  caja N°2 o nombre
                    </h6>
                </div>

                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_detallecajaabierta();"><span aria-hidden="true">×</span></button>
            </div>
             <div class="modal-body">
                <!-- Estado de la caja -->
                <div class="alert alert-primary ">
                    <div class="form-row">
                        <div class="col-12">
                             
                            <h6 class="mb-2"><span class="badge badge-pill badge-danger">CAJA CERRADA</span></h6>
                       
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="mb-1 text-uppercase">Saldo Cierre</label>
                            <input type="number" class="form-control form-control-sm mr-2 input-caja" disabled placeholder="$0">
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
                                    <h5 class="mb-0 font-weight-bold">
                                        $515.465
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div class="card-lineal shadow-sm h-100">
                            <div class="card-body d-flex align-items-center py-0">
                                    <i class="feather icon-power icono-primary bg-danger f-18"></i>
                                <div>
                                     <small class="d-block text-dark font-weight-bold">
                                        Cierre
                                    </small>
                                    <h5 class="mb-0 font-weight-bold">
                                        12/05/2026 - 19:55
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
                                        Nombre asistente
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
                                <td class="font-weight-bold">$0</td>
                            </tr>

                            <tr class="bg-gris-table">
                                <td class="font-weight-bold text-c-blue">Abono inicial</td>
                                <td class="text-c-blue font-weight-bold">$0</td>
                            </tr>
                            <tr class="bg-light">
                                <td class="font-weight-bold">Total Efectivo</td>
                                <td class="font-weight-bold">$0</td>
                            </tr>
                             <tr class="bg-light">
                                <td class="font-weight-bold">Total Otros</td>
                                <td class="font-weight-bold">$0</td>
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
                                <td class="text-danger font-weight-bold">-$35.000</td>
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
                                <td class="font-weight-bold text-danger">Diferencia caja (-)</td>
                                <td class="text-danger font-weight-bold">-$1.000</td>
                            </tr>

                            <tr class="bg-success-table">
                                <td class="font-weight-bold">
                                    <h5 class="text-success-table">Total caja </h5>
                                </td>
                                <td class="font-weight-bold h5 text-success-table">
                                    $515.465
                                </td>
                            </tr>

                            <tr class="bg-gris-table">
                                <td class="font-weight-bold text-c-blue">Saldo cierre</td>
                                <td class="text-c-blue font-weight-bold">$0</td>
                            </tr>

                        </tbody>

                    </table>
                </div>

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