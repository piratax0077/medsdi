<!-- MODAL ABRIR CAJA -->
<div class="modal fade" id="abrircaja" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-dialog-centered" role="document">

        <div class="modal-content border-0 shadow">
            <div class="modal-header ">
                <h2 class="modal-title font-weight-bold">
                    Abrir caja
                </h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_abrircaja();"><span aria-hidden="true">×</span></button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3">
                <div class="form-row">
                    <div class="col-12">
                        <form>
                            <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Seleccione una caja para realizar la apertura</label>
                                    <select id="id_caja" class="form-control" onchange="verificarUltimaCajaOperativa()">
                                      <option value="0">Seleccione caja</option>
                                      <!--CARGAR CAJAS INSCRITAS-->
                                          @foreach ($cajas as $caja)
                                              <option value="{{ $caja->id }}" class="text-uppercase" data-id-lugar-atencion="{{ $caja->id_lugar_atencion }}" data-nombre-caja="{{ $caja->nombre_caja }}" data-ubicacion="{{ $caja->ubicacion }}">{{ $caja->nombre_caja }} - {{ $caja->nombre_lugar_atencion }}</option>
                                         @endforeach
                                    </select>
                                    <small id="info_ultima_caja" class="form-text d-block mt-2" style="font-size: 0.875rem;"></small>
                                </div>
                              </div>
                             {{-- <div class="form-group">
                                 <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Responsable de la caja</label>
                                  <select class="custom-select" required id="responsable_caja">
                                      <option value="0">Seleccione Responsable</option>
                                        @foreach ($listado_recibe_prof as $responsable)
                                              <option value="{{ $responsable->id }}" class="text-uppercase">{{ $responsable->nombre }} {{ $responsable->apellido_uno }} {{ $responsable->apellido_dos }}</option>
                                         @endforeach

                                </select>
                                </div>
                              </div> --}}
                              <div class="form-group">
                                <div class="col-12">
                                     <label  class="text-dark font-weight-bold">Saldo final caja anterior</label>
                                    <input type="text" class="form-control" required placeholder="$0" id="saldo_final_caja_anterior">
                                </div>
                              </div>
                               <div class="form-group">
                                <div class="col-12">
                                    <label  class="text-dark font-weight-bold">Abono inicial de caja</label>
                                    <input type="text" class="form-control" required placeholder="$0" id="abono_inicial_caja">
                                </div>
                              </div>
                        </form>
                    </div>
                     <div class="col-12 px-4">
                        <div class="alert alert-primary text-justify" role="alert">
                            <i class="feather icon-info font-weight-bold "></i> ABONO INICIAL DE CAJA:<br>
                            Este valor corresponde al dinero que se deja disponible al momento de abrir la caja.
                            Su finalidad es contar con efectivo suficiente para entregar vuelto durante las recaudaciones o pagos realizados en el día.
                            <br>
                            Si no necesita asignar un monto inicial para la apertura de esta caja, puede ingresar 0.
                        </div>
                     </div>
                </div>

            <div class="modal-footer">
                <button class="btn btn-info px-4 mt-2" onclick="abrir_caja()">
                    <i class="feather icon-check"></i> Abrir caja
                </button>
            </div>

        </div>

    </div>
</div>
