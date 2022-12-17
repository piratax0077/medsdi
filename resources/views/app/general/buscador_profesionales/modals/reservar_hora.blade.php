<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Reservar hora médica</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                                <label class="floating-label-active-sm mb-0">Lugar de atención</label>
                                <select class="form-control form-control-sm" id="modal_reserva_hora_lugar_atencion" name="modal_reserva_hora_lugar_atencion" onchange="carga_calendario_profesional();">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                                {{--  <input type="date" id="calendario" name="calendario">  --}}
                                <div id="calendario_reserva_buscador" name="calendario_reserva_buscador" class="calendar fc fc-unthemed fc-ltr"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
                            </div>
                            <div class="col-md-12 mx-auto" >
                                <div class="row" id="modal_reserva_hora_lista_horas">
                                    {{--  <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
                                        8:00
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
                            Reservar hora</button>  --}}
                        <label class="label">Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
