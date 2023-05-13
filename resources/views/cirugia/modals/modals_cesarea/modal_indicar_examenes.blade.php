<div id="indicar_examenes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"  data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen</h5>
                <button type="button" class="close" aria-label="Close"  onclick="cerrarModalExamenesFicha();">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo Examen</label>

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
                            <label class="floating-label">Lado</label>
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
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2" selected>Media</option>
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
                    <div class="col-sm-12">
                        <button type="button" onclick="indicar_examen_cirugia();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_examen_cirugia" class="table table-bordered table-sm tabla_examenes_ficha">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="display:none">id</th>
                                        <th class="text-center align-middle" style="display:none">Nombre Examen</th>
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
            <div class="modal-footer">
                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
            </div>
        </div>
    </div>
</div>
