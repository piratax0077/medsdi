@extends('template.adm_cm.template')

@section('style')
<!-- Summernote CSS -->
<link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
<style>
p {
    color: #59636d;
    word-wrap: break-word !important;
    font-size: 14px;
}
.ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content  m-top">
		<!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-2">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Prestaciones Laboratorio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h6 class="text-dark f-20 d-inline">Prestaciones del Laboratorio <span id="valor_uco_header"></span>
								<div class="btn-group mr-2 d-inline float-md-right ml-4">
                                <button type="button" class="btn btn-sm btn-info " onclick="ag_procedimiento();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir prestación</button>
                            </div>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="display table w-100 table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="tabla_prestaciones_dentales" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cantidad bloques</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($prestaciones))
                                @foreach ($prestaciones as $mi_trabajo)
                                    <tr>
                                        <td>{{ $mi_trabajo->nombre }}</td>
                                        <td>{{ $mi_trabajo->descripcion }}</td>
                                        <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                                        <td>${{ number_format($mi_trabajo->valor,0,',','.') }}</td>

                                        <td>
                                            <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                                            <button class="btn btn-success btn-icon" type="button" onclick="asignar_procedimiento({{ $mi_trabajo->id }}, '{{ addslashes($mi_trabajo->nombre) }}')"><i class="fas fa-user"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMostrarPrestacion" tabindex="-1" aria-labelledby="modalMostrarPrestacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalMostrarPrestacionLabel">Editar prestación</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_prestacion_editar" name="id_prestacion_editar" value="">
            <div class="form-row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="nombre_prestacion">Nombre del procedimiento</label>
                        <input type="text" name="nombre_prestacion" id="nombre_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="descripcion_prestacion">Descripción</label>
                        <input type="text" name="descripcion_prestacion" id="descripcion_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_bloques_prestacion">Cantidad Bloques</label>
                        <input type="number" name="cantidad_bloques_prestacion" id="cantidad_bloques_prestacion" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">




                    <div class="form-group">
                    	<div class="contenedor-input">
                        <label class="floating-label-activo-sm" for="valor_prestacion">Valor</label>
                        <span class="signo">$</span>
                        <input type="number" name="valor_prestacion" id="valor_prestacion" class="input-icono form-control form-control-sm">
                    	</div>
                    </div>
                </div>
                <div class="col-md-12">
                	<h6 class="text-c-blue" for="indicaciones_prestacion">Indicaciones del procedimiento para el paciente</h6>
                    <div class="form-group">
                        <textarea name="indicaciones_prestacion" id="indicaciones_prestacion" class="form-control form-control-sm" rows="4" placeholder="INGRESE LAS INDICACIONES QUE EL PACIENTE DEBE SEGUIR PARA ESTE PROCEDIMIENTO"></textarea>
                    </div>
                </div>
            </div>


            <button type="button" class="btn btn-info btn-sm float-right" id="btn_guardar_procedimiento" onclick="editar_prestacion()"><i class="feather icon-save"></i> Guardar cambios</button>
            {{-- <table class="table w-100" id="table_procedimientos_propios_dental">
                <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>UCO</th>
                        <th>¿Laboratorio?</th>
                        <th>Bloques</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mis_trabajos_profesional as $mi_trabajo)
                        <tr>
                            <td>{{ $mi_trabajo->descripcion }}</td>
                            <td>{{ $mi_trabajo->uco }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                    <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </td>
                            <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                            <td>
                                <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        </div>
    </div>
</div>

{{--  MODAL PROCEDIMIENTO  --}}
    <div id="a_procedimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_procedimiento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir Prestación</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_nombre" id="a_procedimeinto_nombre" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Descripción</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_descripcion" id="a_procedimeinto_descripcion" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Cantidad Bloques</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_cantidad_bloques" id="a_procedimeinto_cantidad_bloques" step="1" max="24" value="">
                                    </div>
                                </div>


                                <div class="form-group ">
                                	<div class="contenedor-input">
                                    	<label class="floating-label-activo-sm">Valor </label>
                                    	<span class="signo">$</span>
                                        <input class="form-control form-control-sm input-icono" type="number" name="a_procedimeinto_valor" id="a_procedimeinto_valor" step="1"  value="0" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_procedimiento()"><i class="feather icon-plus"></i> Añadir prestación</button>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('page-script')



<!-- Summernote JS -->
<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('summernote/lang/summernote-es-ES.js') }}"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicializar DataTable
        $('#tabla_prestaciones_dentales').DataTable({
            "language": {
                "url": "{{ asset('js/Spanish.json') }}"
            },
            "order": [[0, "asc"]],
            "columnDefs": [{
                "targets": [3],
                "orderable": false
            }]
        });

        // Inicializar Select2 en el select de profesionales
        $('#asignar_id_profesional').select2({
            placeholder: 'Seleccione uno o más profesionales...',
            allowClear: true,
            width: '100%',
            dropdownParent: $('#asignar_procedimiento_modal'),
            language: {
                noResults: function() { return 'No se encontraron resultados'; },
                searching: function() { return 'Buscando...'; }
            }
        });

        // Inicializar Summernote en el textarea de indicaciones
        $('#indicaciones_prestacion').summernote({
            lang: 'es-ES',
            height: 200,
            placeholder: 'Ingrese las indicaciones que el paciente debe seguir para este procedimiento...',
            toolbar: [
                ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

    function ag_procedimiento(){
        $('#a_procedimiento').modal('show');
    }

    function mostrar_procedimiento(id){
        console.log(id);
        let data = {
            id: id,
            _token: CSRF_TOKEN,
        }

        let url = '{{ ROUTE("profesional.mostrar_prestacion_lab") }}';

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == "ok"){
                    // Abrir modal
                    $('#modalMostrarPrestacion').modal('show');
                    // Guardar el ID de la prestación
                    $('#id_prestacion_editar').val(id);
                    // Llenar los campos del modal
                    $('#nombre_prestacion').val(response.procedimiento.nombre);
                    $('#descripcion_prestacion').val(response.procedimiento.descripcion);
                    $('#cantidad_uco').val(response.procedimiento.cantidad_uco);
                    $('#cantidad_bloques_prestacion').val(response.procedimiento.cantidad_bloques);
                    $('#valor_prestacion').val(response.procedimiento.valor);
                    // Cargar indicaciones en Summernote
                    $('#indicaciones_prestacion').summernote('code', response.procedimiento.indicaciones || '');

                }


            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function editar_prestacion(){
        let id = $('#id_prestacion_editar').val();
        let nombre = $('#nombre_prestacion').val();
        let descripcion = $('#descripcion_prestacion').val();
        let cantidad_bloques = $('#cantidad_bloques_prestacion').val();
        let valor = $('#valor_prestacion').val();
        let indicaciones = $('#indicaciones_prestacion').summernote('code');

        // Validaciones
        if(!id || id == ''){
            swal({
                title: 'Error',
                text: 'No se ha seleccionado una prestación para editar',
                icon: 'error'
            });
            return;
        }

        if(!nombre || nombre.trim() == ''){
            swal({
                title: 'Error',
                text: 'El nombre del procedimiento es requerido',
                icon: 'error'
            });
            return;
        }

        if(!descripcion || descripcion.trim() == ''){
            swal({
                title: 'Error',
                text: 'La descripción del procedimiento es requerida',
                icon: 'error'
            });
            return;
        }

        if(!cantidad_bloques || cantidad_bloques == ''){
            swal({
                title: 'Error',
                text: 'La cantidad de bloques es requerida',
                icon: 'error'
            });
            return;
        }

        if(!valor || valor == ''){
            swal({
                title: 'Error',
                text: 'El valor es requerido',
                icon: 'error'
            });
            return;
        }

        let data = {
            id: id,
            nombre: nombre,
            descripcion: descripcion,
            cantidad_bloques: cantidad_bloques,
            valor: valor,
            indicaciones: indicaciones,
            _token: CSRF_TOKEN,
        }

        let url = '{{ route("profesional.actualizar_prestacion_lab") }}';

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(response.status == "ok"){
                    swal({
                        title: 'Éxito',
                        text: 'La prestación ha sido actualizada correctamente',
                        icon: 'success'
                    }).then(() => {
                        // Cerrar modal
                        $('#modalMostrarPrestacion').modal('hide');
                        // Recargar la página para ver los cambios
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.message || 'No se pudo actualizar la prestación',
                        icon: 'error'
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error al actualizar la prestación',
                    icon: 'error'
                });
            }
        });
    }

    function guardar_procedimiento(){
        let nombre = $('#a_procedimeinto_nombre').val();
        let descripcion = $('#a_procedimeinto_descripcion').val();
        let cantidad_bloques = $('#a_procedimeinto_cantidad_bloques').val();
        let valor = $('#a_procedimeinto_valor').val();
        let valido = 1;
        let mensaje = '';
        // validar campos
        if(nombre == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido nombre\n';
        }
        // if(descripcion == 0)
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido descripcion\n';
        // }
        if(cantidad_bloques == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido cantidad bloques\n';
        }


        if(valido == 1)
        {
            let data = {
                id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                nombre : nombre,
                descripcion : descripcion,
                minutos_bloque : 15,
                cantidad_bloques : cantidad_bloques,
                valor : valor,
                otros : '',
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.procedimiento.registrar') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null && data.estado == 1) {
                    // cerrar modal
                    $('#a_procedimiento').modal('hide');
                    let registros = data.registros;
                    // Obtener instancia de DataTable
                    var table = $('#tabla_prestaciones_dentales').DataTable();
                    // Limpiar la tabla
                    table.clear();
                    // Agregar filas
                    $(registros).each(function(i, v) {
                        table.row.add([
                            v.nombre,
                            v.descripcion,
                            v.cantidad_bloques,
                            '$' + v.valor,
                            `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${v.id})"><i class="feather icon-x"></i></button>
                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${v.id})"><i class="feather icon-edit"></i></button>
                            <button class="btn btn-success btn-icon" type="button" onclick="asignar_procedimiento(${v.id}, '${v.nombre.replace(/'/g, "\\'")}')" ><i class="fas fa-user"></i></button>`
                        ]);
                    });
                    // Redibujar la tabla
                    table.draw();
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar Procedimiento",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

        }
        else
        {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_procedimiento(id){
            swal({
                title:'Eliminar Procedimiento',
                text:'¿Está seguro que desea eliminar el procedimiento?',
                icon:'warning',
                buttons:["Cancelar","Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    confirmar_eliminar_procedimiento(id);
                }
            });
        }

        function confirmar_eliminar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("adm_cm.examen.eliminar") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    swal({
                        title: 'Éxito',
                        text: 'El procedimiento ha sido eliminado correctamente',
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(error){
                    console.log(error.responseText);
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al eliminar el procedimiento',
                        icon: 'error'
                    });
                }
            });
        }

    function asignar_procedimiento(id, nombre){
        $('#form_asignar_procedimiento')[0].reset();
        $('#asignar_id_profesional').val(null).trigger('change');
        $('#asignar_id_procedimiento').val(id);
        $('#asignar_procedimiento_nombre').val(nombre);
        $('#asignar_procedimiento_modal').modal('show');
    }

    function guardar_asignacion_procedimiento(){
        let id_procedimiento = $('#asignar_id_procedimiento').val();
        let id_lugar_atencion = $('#asignar_id_lugar_atencion').val();
        let ids_profesionales = $('#asignar_id_profesional').val();

        if(!id_procedimiento){
            swal({ title: 'Error', text: 'No hay procedimiento seleccionado', icon: 'error', buttons: 'Aceptar' });
            return;
        }
        if(!id_lugar_atencion){
            swal({ title: 'Error', text: 'Debe seleccionar un lugar de atención', icon: 'error', buttons: 'Aceptar' });
            return;
        }
        if(!ids_profesionales || ids_profesionales.length === 0){
            swal({ title: 'Error', text: 'Debe seleccionar al menos un profesional', icon: 'error', buttons: 'Aceptar' });
            return;
        }

        let data = {
            id_procedimiento: id_procedimiento,
            id_lugar_atencion: id_lugar_atencion,
            ids_profesionales: ids_profesionales,
            _token: CSRF_TOKEN,
        };

        $.ajax({
            type: 'POST',
            url: '{{ route("adm_cm.procedimiento.asignar") }}',
            data: data,
            success: function(response){
                if(response.estado == 1){
                    let msg = response.asignados + ' asignación(es) exitosa(s)';
                    if(response.omitidos > 0) msg += ', ' + response.omitidos + ' ya existía(n) y se omitió(eron)';
                    swal({ title: 'Éxito', text: msg, icon: 'success', buttons: 'Aceptar' })
                        .then(() => { $('#asignar_procedimiento_modal').modal('hide'); });
                } else {
                    swal({ title: 'Error', text: response.mensaje || 'Error al asignar el procedimiento', icon: 'error', buttons: 'Aceptar' });
                }
            },
            error: function(xhr){
                let msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error en la solicitud';
                swal({ title: 'Error', text: msg, icon: 'error', buttons: 'Aceptar' });
            }
        });
    }
</script>

{{-- MODAL ASIGNAR PROCEDIMIENTO A PROFESIONAL --}}
<div id="asignar_procedimiento_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_asignar_procedimiento" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Asignar Procedimiento a Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_asignar_procedimiento">
                    <input type="hidden" id="asignar_id_procedimiento" name="asignar_id_procedimiento" value="">

                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Procedimiento</label>
                        <input class="form-control form-control-sm" type="text" id="asignar_procedimiento_nombre" value="" disabled>
                    </div>

                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Lugar de Atención</label>
                        <select class="form-control form-control-sm" name="asignar_id_lugar_atencion" id="asignar_id_lugar_atencion" required>
                            <option value="">Seleccionar...</option>
                            @if(isset($institucion) && $institucion)
                                <option value="{{ $institucion->id_lugar_atencion }}" selected>{{ $institucion->nombre }}</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Profesional(es)</label>
                        <select class="form-control form-control-sm" name="asignar_id_profesional[]" id="asignar_id_profesional" multiple="multiple" required>
                            @if(isset($profesionales))
                                @foreach($profesionales as $prof)
                                    <option value="{{ $prof->id }}">{{ $prof->nombre }} {{ $prof->apellido_uno }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="guardar_asignacion_procedimiento()">Asignar</button>
            </div>
        </div>
    </div>
</div>
@endsection
