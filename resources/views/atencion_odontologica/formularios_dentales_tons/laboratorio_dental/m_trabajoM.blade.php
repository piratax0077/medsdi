<div id="modal_orden_trabajoM" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_orden_trabajoM"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Orden de trabajo mayor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_orden_trabajo_mayor" method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_trabajo_mayor" id="ficha_id_trabajo_mayor">
                       {{--   value=" @if ($ficha != null) {{ $ficha->id }}@endif">--}}
                    <input type="hidden" name="paciente_trabajo_mayor" id="paciente_trabajo_mayor"
                        value="">

                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">N° Orden</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_mayor"
                                id="nro_orden_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();
                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Clinica/Dr./Dra</label>
                            <input type="text" class="form-control form-control-sm" name="clinica_doctor_trabajo_mayor"
                                id="clinica_doctor_trabajo_mayor" value="{{ $profesional->nombres }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut Profesional</label>
                            <input type="text" class="form-control form-control-sm" name="rut_profesional_trabajo_mayor"
                                id="rut_profesional_trabajo_mayor" value="{{ $profesional->rut }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre Paciente</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="paciente_nombre_trabajo_mayor"
                                id="paciente_nombre_trabajo_mayor"
                                value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}"
                                disabled>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="paciente_rut_trabajo_mayor"
                                id="paciente_rut_trabajo_mayor" value="{{ $paciente->rut }}" disabled>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Guia</label>
                            <input type="text" class="form-control form-control-sm" name="guia_trabajo_mayor"
                                id="guia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Color</label>
                            <input type="text" class="form-control form-control-sm" name="color_trabajo_mayor"
                                id="color_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Urgencia</label>
                            <input type="text" class="form-control form-control-sm" name="urgencia_trabajo_mayor"
                                id="urgencia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Material</label>
                            <input type="text" class="form-control form-control-sm" name="material_trabajo_mayor"
                                id="material_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Trabajo a realizar</label>
                            <input type="text" class="form-control form-control-sm"
                                name="trabajo_realizar_trabajo_mayor" id="trabajo_realizar_trabajo_mayor">

                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <input type="text" class="form-control form-control-sm" name="comentarios_trabajo_mayor"
                                id="comentarios_trabajo_mayor">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Protesis c/implante</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Marca Implante</label>
                            <select class="form-control form-control-sm" name="marca_implante_trabajo_mayor"
                                id="marca_implante_trabajo_mayor">
                                @foreach ($marcas_implantes as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Medida Implante</label>
                            <input type="text" class="form-control form-control-sm" name="medida_implante_trabajo_mayor"
                                id="medida_implante_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Aditamentos</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">N° Replicas</label>
                            <input type="text" class="form-control form-control-sm" name="nro_replicas_trabajo_mayor"
                                id="nro_replicas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">N° Tornillos</label>
                            <input type="text" class="form-control form-control-sm" name="nro_tornillos_trabajo_mayor"
                                id="nro_tornillos_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Otros</label>
                            <input type="text" class="form-control form-control-sm" name="otros_trabajo_mayor"
                                id="otros_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Proximas Citas</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">Cubetas</label>
                            <input type="text" class="form-control form-control-sm" name="cubetas_trabajo_mayor"
                                id="cubetas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P.Articulación</label>
                            <input type="text" class="form-control form-control-sm" name="p_articulacion_trabajo_mayor"
                                id="p_articulacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P. Dientes</label>
                            <input type="text" class="form-control form-control-sm" name="p_dientes_trabajo_mayor"
                                id="p_dientes_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label-activo-sm">P. Metal</label>
                            <input type="text" class="form-control form-control-sm" name="p_metal_trabajo_mayor"
                                id="p_metal_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Bizcocho</label>
                            <input type="text" class="form-control form-control-sm" name="bizcocho_trabajo_mayor"
                                id="bizcocho_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Terminación</label>
                            <input type="text" class="form-control form-control-sm" name="terminacion_trabajo_mayor"
                                id="terminacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">Compostura</label>
                            <input type="text" class="form-control form-control-sm" name="compostura_trabajo_mayor"
                                id="compostura_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_trabajo_mayor_dental()">Ver documento en PDF</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info" onclick="guardar_trabajo_mayor_dental()">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function lab_dent_mayor() {
        $('#modal_orden_trabajoM').modal('show');
    }

    function generar_pdf_trabajo_mayor_dental() {
    console.log('pdf orden trabajo mayor');
    let campos = [
        { id: '#nro_orden_trabajo_mayor', nombre: 'N° orden' },
        { id: '#id_profesional_fc', nombre: 'ID Profesional' },
        { id: '#id_paciente', nombre: 'ID Paciente' },
        { id: '#guia_trabajo_mayor', nombre: 'Guía' },
        { id: '#color_trabajo_mayor', nombre: 'Color' },
        { id: '#urgencia_trabajo_mayor', nombre: 'Urgencia' },
        { id: '#material_trabajo_mayor', nombre: 'Material' },
        { id: '#trabajo_realizar_trabajo_mayor', nombre: 'Trabajo a realizar' },
        { id: '#comentarios_trabajo_mayor', nombre: 'Comentarios' },
        { id: '#marca_implante_trabajo_mayor', nombre: 'Marca implante' },
        { id: '#medida_implante_trabajo_mayor', nombre: 'Medida implante' },
        { id: '#nro_replicas_trabajo_mayor', nombre: 'N° Réplicas' },
        { id: '#nro_tornillos_trabajo_mayor', nombre: 'N° Tornillos' },
        { id: '#otros_trabajo_mayor', nombre: 'Otros' },
        { id: '#cubetas_trabajo_mayor', nombre: 'Cubetas' },
        { id: '#p_articulacion_trabajo_mayor', nombre: 'Prueba articulación' },
        { id: '#p_dientes_trabajo_mayor', nombre: 'Prueba dientes' },
        { id: '#p_metal_trabajo_mayor', nombre: 'Prueba metal' },
        { id: '#bizcocho_trabajo_mayor', nombre: 'Bizcocho' },
        { id: '#terminacion_trabajo_mayor', nombre: 'Terminación' },
        { id: '#compostura_trabajo_mayor', nombre: 'Compostura' }
    ];

    let valido = 1;
    let mensaje = '';
    let data = {};

    campos.forEach(campo => {
        let valor = $(campo.id).val().trim();
        if (valor === '') {
            valido = 0;
            mensaje += `<li>${campo.nombre}</li>`;
        } else {
            data[campo.clave] = valor;
        }
    });

    if (!valido) {
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
    } else {
        let url = "{{ ROUTE('dental.generar_pdf_trabajo_mayor') }}";
       let data = {
        nro_orden_trabajo_mayor: $('#nro_orden_trabajo_mayor').val(),
        clinica_doctor_trabajo_mayor: $('#clinica_doctor_trabajo_mayor').val(),
        rut_profesional_trabajo_mayor: $('#rut_profesional_trabajo_mayor').val(),
        id_profesional: $('#id_profesional_fc').val(),
        paciente_trabajo_mayor: $('#id_paciente').val(),
        guia_trabajo_mayor: $('#guia_trabajo_mayor').val(),
        color_trabajo_mayor: $('#color_trabajo_mayor').val(),
        urgencia_trabajo_mayor: $('#urgencia_trabajo_mayor').val(),
        material_trabajo_mayor: $('#material_trabajo_mayor').val(),
        trabajo_realizar_trabajo_mayor: $('#trabajo_realizar_trabajo_mayor').val(),
        comentarios_trabajo_mayor: $('#comentarios_trabajo_mayor').val(),
        marca_implante_trabajo_mayor: $('#marca_implante_trabajo_mayor').val(),
        _medida_implantetrabajo_mayor: $('#medida_implante_trabajo_mayor').val(),
        nro_replicas_trabajo_mayor: $('#nro_replicas_trabajo_mayor').val(),
        nro_tornillos_trabajo_mayor: $('#nro_tornillos_trabajo_mayor').val(),
        otros_trabajo_mayor: $('#otros_trabajo_mayor').val(),
        cubetas_trabajo_mayor: $('#cubetas_trabajo_mayor').val(),
        p_articulacion_trabajo_mayor: $('#p_articulacion_trabajo_mayor').val(),
        p_dientes_trabajo_mayor: $('#p_dientes_trabajo_mayor').val(),
        p_metal_trabajo_mayor: $('#p_metal_trabajo_mayor').val(),
        bizcocho_trabajo_mayor: $('#bizcocho_trabajo_mayor').val(),
        terminacion_trabajo_mayor: $('#terminacion_trabajo_mayor').val(),
        compostura_trabajo_mayor: $('#compostura_trabajo_mayor').val(),
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        _token: CSRF_TOKEN
       }

       $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 'ok'){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text: resp.mensaje
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
       });
    }
}

</script>
