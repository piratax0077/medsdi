<div class="modal fade" id="ficha_profesional" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ficha_profesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <!--Cargar foto del profesional-->
                <img class="img-radius img-fluid wid-50 mr-2" id="modal_info_pro_foto" src="{{ asset('images/img_perfil/6187674.png') }}" alt="Nombre del Médico">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title text-primary my-auto" id="modal_info_pro_nombre">Jaime Kriman Astorga</h5>
                        <h6 class="modal-title text-primary my-auto" id="modal_info_pro_especialidad"><span id="modal_info_pro_tipo_especialidad">Especialidad</span><span id="modalinfo_pro_sub_tipo_especialidad">: Otorrinolaringología</span></h6>
                    </div>
                </div>

                <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close" onclick="$('#ficha_profesional').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ficha_profesional">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row" id="modal_info_pro_academicos">
                                {{--    --}}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="bg-info p-15" style="text-align:center">
                        <h5 class="modal-title text-white">Lugares de Atención</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="display table table-striped table-hover dt-responsive table-sm" style="width:100%" id="modal_info_pro_lugar_atencion">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nombre</th>
                                        <th style="text-align:center">Convenios</th>
                                        <th style="text-align:center">Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--    --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#ficha_profesional').modal('hide')">Cerrar</button>
            </div>
        </div>
    </div>
</div>
