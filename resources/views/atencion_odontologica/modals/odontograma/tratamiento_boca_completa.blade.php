<div id="tratamiento_boca_completa" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_boca_completa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_tratamiento_dental">Boca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="diagnostico_boca_compl_gral-tab" data-toggle="tab" href="#diagnostico_boca_compl_gral" role="tab" aria-controls="diagnostico_boca_compl_gral" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="tratamiento_boca_compl-tab" data-toggle="tab" href="#tratamiento_boca_compl" role="tab" aria-controls="tratamiento_boca_compl" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="diagnostico_boca_compl_gral" role="tabpanel" aria-labelledby="diagnostico_boca_compl_gral-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_boca_compl_gral"
                                            id="fecha_diag_boca_compl_gral">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_boca_compl_gral_autocomplete" id="diag_seleccionado_boca_compl_gral_autocomplete" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_boca_compl_gral" id="comentarios_diag_boca_compl_gral"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_boca_compl_gral"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_boca_compl_gral">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_boca_compl_gral"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_boca_compl_gral">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental_boca_compl('Boca completa','gral')"><i
                                                class="fa fa-plus"></i> Agregar Diagnostico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_diagnosticos_boca_compl">
                                                @foreach ($boca_completa_gral_diagnosticos as $t)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $t->fecha }}</td>
                                                        <td class="text-center align-middle">{{ $t->diagnostico_tratamiento }}</td>
                                                        <td class="text-center align-middle">{{ $t->terminado == 1 ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                                        <td class="text-center align-middle">{{ $t->comentario }}</td>
                                                        <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_diagnostico_boca_compl({{ $t->id }},'gral')"><i
                                                                    class="fa fa-trash"></i></button>
                                                                    @if($t->presupuesto == 0)
                                                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $t->id }},'gral', this)"></button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $t->id }},'gral', this)"></button>
                                                                @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tratamiento_boca_compl" role="tabpanel" aria-labelledby="tratamiento_boca_compl-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_boca_compl_gral"
                                            id="fecha_proc_boca_compl_gral">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_boca_compl_gral_autocomplete" id="proc_seleccionado_boca_compl_gral_autocomplete" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_boca_compl_gral" id="comentarios_tratamiento_boca_compl_gral"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_boca_compl_gral"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_boca_compl_gral">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_boca_compl_gral"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_boca_compl_gral">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental_boca_compl('Boca completa','gral')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_tratamientos_boca_compl">
                                                @foreach($boca_completa_gral_tratamientos as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $tratamiento->diagnostico_tratamiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl({{ $tratamiento->id }},'gral')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->presupuesto == 0)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                            @else
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                            @endif
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div id="tratamiento_boca_completa_endo" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_boca_completa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_tratamiento_dental">Boca Endodoncia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="diagnostico_boca_compl_endo-tab" data-toggle="tab" href="#diagnostico_boca_compl_endo" role="tab" aria-controls="diagnostico_boca_compl_endo" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="tratamiento_boca_compl_endo-tab" data-toggle="tab" href="#tratamiento_boca_compl_endo" role="tab" aria-controls="tratamiento_boca_compl_endo" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="diagnostico_boca_compl_endo" role="tabpanel" aria-labelledby="diagnostico_boca_compl_endo-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_boca_compl_endo"
                                            id="fecha_diag_boca_compl_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_boca_compl_endo_autocomplete" id="diag_seleccionado_boca_compl_endo_autocomplete" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_boca_compl_endo" id="comentarios_diag_boca_compl_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_boca_compl_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_boca_compl_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_boca_compl_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_boca_compl_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental_boca_compl('Boca completa','endo')"><i
                                                class="fa fa-plus"></i> Agregar Diagnostico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_diagnosticos_boca_compl_endo">
                                                @foreach ($boca_completa_gral_diagnostico_endo as $t)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $t->fecha }}</td>
                                                        <td class="text-center align-middle">{{ $t->diagnostico_tratamiento }}</td>
                                                        <td class="text-center align-middle">{{ $t->terminado == 1 ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                                        <td class="text-center align-middle">{{ $t->comentario }}</td>
                                                        <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_diagnostico_boca_compl({{ $t->id }},'endo')"><i
                                                                    class="fa fa-trash"></i></button>
                                                                    @if($t->presupuesto == 0)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $t->id }},'gral', this)"></button>
                                                            @else
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $t->id }},'gral', this)"></button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tratamiento_boca_compl_endo" role="tabpanel" aria-labelledby="tratamiento_boca_compl_endo-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_boca_compl_endo"
                                            id="fecha_proc_boca_compl_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_boca_compl_endo_autocomplete" id="proc_seleccionado_boca_compl_endo_autocomplete" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_boca_compl_endo" id="comentarios_tratamiento_boca_compl_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_boca_compl_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_boca_compl_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_boca_compl_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_boca_compl_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental_boca_compl('Boca completa','endo')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_tratamientos_boca_compl_endo">
                                                @foreach($boca_completa_gral_tratamiento_endo as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $tratamiento->diagnostico_tratamiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl({{ $tratamiento->id }},'endo')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->presupuesto == 0)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                            @else
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                            @endif
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function boca_completa (tipo_examen){
        $('#tratamiento_boca_completa').modal('show');
    }

    function boca_completa_endo (tipo_examen){
        $('#tratamiento_boca_completa_endo').modal('show');
    }

    function agregar_tratamiento_dental_boca_compl(localizacion_examen, tipo_examen){
        let fecha_proc = $('#fecha_proc_boca_compl_'+tipo_examen).val();
        let proc_seleccionado = $('#proc_seleccionado_boca_compl_'+tipo_examen+'_autocomplete').val();
        let comentarios_tratamiento = $('#comentarios_tratamiento_boca_compl_'+tipo_examen).val();
        let trabajo_terminado = $('#inlineCheckbox1_tratamiento_boca_compl_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let agendar_control = $('#inlineCheckbox2_tratamiento_boca_compl_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = dame_id_paciente();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_especialidad = $('#id_especialidad').val();

        let valido = 1;
        let mensaje = '';

        if(fecha_proc == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una fecha para el tratamiento.\n';
        }
        if(proc_seleccionado == '-1'){
            valido = 0;
            mensaje += 'Debe seleccionar un procedimiento para el tratamiento.\n';
        }
        if(comentarios_tratamiento == ''){
            valido = 0;
            mensaje += 'Debe agregar un comentario. \n';
        }

        if(valido == 0){
            swal({
                title: 'Advertencia',
                text: mensaje,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        let data = {
            'fecha': fecha_proc,
            'diag_seleccionado': proc_seleccionado,
            'comentarios': comentarios_tratamiento,
            'trabajo_terminado': trabajo_terminado,
            'agendar_control': agendar_control,
            'id_ficha_atencion': id_ficha_atencion,
            'id_paciente': id_paciente,
            'id_profesional': id_profesional,
            'id_lugar_atencion': id_lugar_atencion,
            'tipo_examen': tipo_examen,
            'especialidad_examen':'tratamiento',
            'id_especialidad': id_especialidad,
            'localizacion_examen': localizacion_examen,
            '_token': CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.guardar_examen_boca_general') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    var tratamientos = response.boca_completa_gral_tratamiento;
                }else if(tipo_examen == 'endo'){
                    var tratamientos = response.boca_completa_gral_tratamiento_endo;
                }

                if(tipo_examen == 'gral'){
                    $('#tbody_tratamientos_boca_compl').empty();
                    $('#planificacion_boca_completa_tratamientos_gral').empty();
                    $('#contenedor_boca_completa_gral_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {
                        $('#tbody_tratamientos_boca_compl').append(`
                        <tr>
                            <td class="text-center align-middle">${t.fecha}</td>
                            <td class="text-center align-middle">${t.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${t.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${t.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${t.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                ${t.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${t.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                        $('#planificacion_boca_completa_tratamientos_gral').append(`
                        <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Boca completa</label>
                                                <input type="text" class="form-control form-control-sm" value="${t.tipo_examen} ${t.diagnostico_tratamiento}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>`);
                        if(t.presupuesto == 1){
                            $('#contenedor_boca_completa_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${t.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }else if(tipo_examen == 'endo'){
                    $('#tbody_tratamientos_boca_compl_endo').empty();
                    $('#planificacion_boca_completa_tratamientos_endo').empty();
                    $('#contenedor_boca_completa_endo_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {
                        $('#tbody_tratamientos_boca_compl_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${t.fecha}</td>
                            <td class="text-center align-middle">${t.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${t.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${t.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${t.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                ${t.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${t.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                        $('#planificacion_boca_completa_tratamientos_endo').append(`
                        <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Boca completa</label>
                                                <input type="text" class="form-control form-control-sm" value="${t.tipo_examen} ${t.diagnostico_tratamiento}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>`);
                        if(t.presupuesto == 1){
                            $('#contenedor_boca_completa_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${t.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }
                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })
    }

    function agregar_diagnostico_dental_boca_compl(localizacion_examen, tipo_examen){
        let fecha = $('#fecha_diag_boca_compl_'+tipo_examen).val();
        let diagnostico_seleccionado = $('#diag_seleccionado_boca_compl_'+tipo_examen+'_autocomplete').val();
        let comentarios_diag = $('#comentarios_diag_boca_compl_'+tipo_examen).val();
        let trabajo_terminado = $('#inlineCheckbox1_diag_boca_compl_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let agendar_control = $('#inlineCheckbox2_diag_boca_compl_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = dame_id_paciente();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_especialidad = $('#id_especialidad').val();

        let valido = 1;
        let mensaje = '';

        if(fecha == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una fecha para el diagnostico.\n';
        }
        if(diagnostico_seleccionado == ''){
            valido = 0;
            mensaje += 'Debe seleccionar un diagnostico.\n';
        }
        if(comentarios_diag == ''){
            valido = 0;
            mensaje += 'Debe ingresar comentarios para el diagnostico.\n';
        }
        if(valido == 0){
            swal({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        let data = {
            'fecha': fecha,
            'diag_seleccionado': diagnostico_seleccionado,
            'comentarios': comentarios_diag,
            'trabajo_terminado': trabajo_terminado,
            'agendar_control': agendar_control,
            'id_ficha_atencion': id_ficha_atencion,
            'id_paciente': id_paciente,
            'id_profesional': id_profesional,
            'id_lugar_atencion': id_lugar_atencion,
            'tipo_examen': tipo_examen,
            'especialidad_examen':'diagnostico',
            'id_especialidad': id_especialidad,
            'localizacion_examen': localizacion_examen,
            '_token': CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.guardar_examen_boca_general') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    var diagnosticos = response.boca_completa_gral_diagnostico;
                }else if(tipo_examen == 'endo'){
                    var diagnosticos = response.boca_completa_gral_diagnostico_endo;
                }

                if(tipo_examen == 'gral'){
                    $('#tbody_diagnosticos_boca_compl').empty();
                    $('#planificacion_boca_completa_diagnosticos_gral').empty();
                    $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_boca_compl').append(html);
                        $('#planificacion_boca_completa_diagnosticos_gral').append(`
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                                <input type="text" class="form-control form-control-sm" value="${diagnostico.especialidad_examen} ${diagnostico.diagnostico_tratamiento}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }else if(tipo_examen == 'endo'){
                    $('#tbody_diagnosticos_boca_compl_endo').empty();
                    $('#planificacion_boca_completa_diagnosticos_endo').empty();
                    $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_boca_compl_endo').append(html);
                        $('#planificacion_boca_completa_diagnosticos_endo').append(`
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                                <input type="text" class="form-control form-control-sm" value="${diagnostico.especialidad_examen} ${diagnostico.diagnostico_tratamiento}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }

                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));

            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })

    }

    function eliminar_diagnostico_boca_compl(id, tipo_examen){
        swal({
                    title: "¿Esta seguro que desea ELIMINAR el lugar de atención?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete)
                    {
                        confirmar_eliminar_diagnostico_boca_compl(id, tipo_examen);
                    }
                    else
                    {
                        swal({
                            title: "Solicitud Cancelada",
                            icon: "success",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                });
    }

    function confirmar_eliminar_diagnostico_boca_compl(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_diagnostico_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : dame_id_paciente(),
            'id_ficha_atencion' : $('#id_fc').val(),
            'id_lugar_atencion' : $('#id_lugar_atencion').val(),
            '_token': CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                let diagnosticos = response.boca_completa_gral_diagnostico;
                let diagnosticos_endo = response.boca_completa_gral_diagnostico_endo;
                if(tipo_examen == 'gral'){
                    $('#tbody_diagnosticos_boca_compl').empty();
                    $('#planificacion_boca_completa_diagnosticos_gral').empty();
                    $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                    let html = `<tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>

                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                    ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                </td>
                            </tr>`;
                    $('#tbody_diagnosticos_boca_compl').append(html);
                    $('#planificacion_boca_completa_diagnosticos_gral').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Boca completa</label>
                                    <input type="text" class="form-control form-control-sm" value="${diagnostico.tipo_examen} ${diagnostico.diagnostico_tratamiento}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>
                        </div>`
                    );
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                            </div>
                        `);
                    }

                });
                }else if(tipo_examen == 'endo'){
                    $('#tbody_diagnosticos_boca_compl_endo').empty();
                    $('#planificacion_boca_completa_diagnosticos_endo').empty();
                    $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').empty();
                    diagnosticos_endo.forEach(diagnostico => {
                    let html = `<tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>

                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                    ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                </td>
                            </tr>`;
                            $('#tbody_diagnosticos_boca_compl_endo').append(html);
                            $('#planificacion_boca_completa_diagnosticos_endo').append(`
                            <div class="form-row">
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Boca completa</label>
                                                <input type="text" class="form-control form-control-sm" value="${diagnostico.tipo_examen} ${diagnostico.diagnostico_tratamiento}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                    <option selected="" value="1">Uniradicular</option>
                                                    <option value="2">Biradicular</option>
                                                    <option value="2">Triradicular</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                                    <option selected="" value="1">Convenio</option>
                                                    <option value="2">Sin Convenio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>`);
                                    if(diagnostico.presupuesto == 1){
                                        $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').append(`
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                            </div>
                                        `);
                                    }

                        });
                }

                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));


            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })
    }

    function eliminar_tratamiento_boca_compl(id, tipo){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el tratamiento?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete)
            {
                confirmar_eliminar_tratamiento_boca_compl(id, tipo);
            }
            else
            {
                swal({
                    title: "Solicitud Cancelada",
                    icon: "success",
                    buttons: "Aceptar",
                    dangerMode: true,
                });
            }
        });
    }

    function confirmar_eliminar_tratamiento_boca_compl(id, tipo){
        let url = "{{ ROUTE('profesional.eliminar_tratamiento_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : dame_id_paciente(),
            'id_ficha_atencion' : $('#id_fc').val(),
            'id_lugar_atencion' : $('#id_lugar_atencion').val(),
            '_token': CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                let tratamientos = response.boca_completa_gral_tratamiento;
                let tratamientos_endo = response.boca_completa_gral_tratamiento_endo;
                $('#tbody_tratamientos_boca_compl').empty();
                $('#tbody_tratamientos_boca_compl_endo').empty();
                $('#contenedor_boca_completa_gral_tratamientos_presupuesto').empty();
                tratamientos.forEach(tratamiento => {
                    let html = `<tr>
                                    <td class="text-center align-middle">${tratamiento.fecha}</td>
                                    <td class="text-center align-middle">${tratamiento.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${tratamiento.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${tratamiento.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                    $('#tbody_tratamientos_boca_compl').append(html);
                });
                tratamientos_endo.forEach(tratamiento => {
                    let html = `<tr>
                                <td class="text-center align-middle">${tratamiento.fecha}</td>
                                <td class="text-center align-middle">${tratamiento.tratamiento_seleccionado}</td>
                                <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${tratamiento.comentario}</td>

                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${tratamiento.id},'endo')"><i class="feather icon-x"></i></button>
                                    ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral', this);"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                </td>
                            </tr>`;
                            $('#tbody_tratamientos_boca_compl_endo').append(html);
                });
                tratamientos_endo.forEach(tratamiento => {
                    if(tratamiento.presupuesto == 1){
                        $('#contenedor_boca_completa_gral_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${tratamiento.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${tratamiento.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                            </div>
                        `);
                    }

                });
                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });
    }
</script>
