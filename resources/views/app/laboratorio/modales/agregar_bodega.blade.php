<div id="agregar_bodega" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir bodega</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">



                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_bodega_agregar" id="nombre_bodega_agregar" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ubicación</label>
                                <input type="text" name="direccion_bodega_agregar" id="direccion_bodega_agregar" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="descripcion_bodega">Descripción</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion_bodega_agregar" name="descripcion_bodega_agregar" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="email">Correo electrónico</label>
                                <input type="email" class="form-control form-control-sm" id="email_bodega_agregar" name="email_bodega_agregar" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="telefono">Teléfono</label>
                                <input type="telefono" class="form-control form-control-sm" id="telefono_bodega_agregar" name="telefono_bodega_agregar" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="tpo_prod_bodega_agregar">Seleccionar Tipo de Productos</label>
                            <select class="form-control form-control-sm" name="tpo_prod_bodega_agregar" id="tpo_prod_bodega_agregar" multiple="multiple">
                                <optgroup label="Farmacia">
                                    @if(isset($tipos_productos))
                                    @foreach($tipos_productos as $c)
                                        <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Lista de materiales e insumos con autorización</label>
                                <select class="form-control form-control-sm" name="cont_ca_bodega_agregar" id="cont_ca_bodega_agregar" multiple="multiple">
                                    <optgroup label="Farmacia">
                                        @if(isset($tipos_productos))
                                        @foreach($tipos_productos as $c)
                                            <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_bodega()"><i class="feather icon-plus"></i> Añadir</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL editar_bodega -->
<div id="editar_bodega" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar bodega</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <h6 class="t-aten">Ingrese los datos de la Bodega</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Responsable</label>
                                <select class="form-control form-control-sm" id="responsable_editar" name="responsable_editar" multiple></select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_bodega_editar" id="nombre_bodega_editar" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ubicación</label>
                                <input type="text" name="direccion_bodega_editar" id="direccion_bodega_editar" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="descripcion_bodega">Descripción</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion_bodega_editar" name="descripcion_bodega_editar" required>
                            </div>
                        </div>
                       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="email">Correo electrónico</label>
                                <input type="email" class="form-control form-control-sm" id="email_bodega_editar" name="email_bodega_editar" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="telefono">Teléfono</label>
                                <input type="telefono" class="form-control form-control-sm" id="telefono_bodega_editar" name="telefono_bodega_editar" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="tpo_prod">Seleccionar tipo de productos</label>
                            <select class="form-control form-control-sm" name="tpo_prod_bodega_editar" id="tpo_prod_bodega_editar" multiple="multiple">
                                <optgroup label="Farmacia">
                                    @if(isset($tipos_productos))
                                    @foreach($tipos_productos as $c)
                                        <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Lista de materiales e insumos con autorización</label>
                                <select class="form-control form-control-sm" name="cont_ca_bodega_editar" id="cont_ca_bodega_editar" multiple="multiple">
                                    <optgroup label="Farmacia">
                                        @if(isset($tipos_productos))
                                        @foreach($tipos_productos as $c)
                                            <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_registro_bodega()"><i class="feather icon-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<div id="agregar_bodega_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega_editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir nuevo responsable</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="t-aten">Ingrese datos responsable</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Seleccione bodega</label>
                                <select name="bodega_para_responsable" id="bodega_para_responsable" class="form-control form-control-sm">
                                    @foreach($bodegas as $b)
                                        <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Buscar Rut</label>
                                <input type="text" class="form-control form-control-sm" name="prof_resp" id="prof_resp" onkeypress="buscarResponsable(event,'agregar')">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Selecciona un responsable</label>
                                <select class="form-control form-control-sm" id="select_responsable">
                                    @foreach($profesionales as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido_uno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="numero_turno">N° / T</label>
                                <input type="number" class="form-control form-control-sm" id="numero_turno" >
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_responsable_bodega()"><i class="feather icon-plus"></i> Añadir</button>
            </div>
        </div>
    </div>
</div>

<!-- HIDDENS -->
<input type="hidden" id="idbodega">
 <script>


    $(document).ready(function() {
        $('#tpo_prod').select2();
        $('#cont_ca').select2();

        $('#tpo_prod_bodega_editar').select2();
        $('#cont_ca_bodega_editar').select2();

        $('#responsable_editar').select2();
    });
    function añadir_bodega() {
        limpiar_formulario();
        $('#agregar_bodega_editar').modal('show');
    }

    function limpiar_formulario() {
        $('#nombre_bodega').val('');
        $('#desc_bodega').val('');
        $('#prof_resp').val('');
        $('#select_responsable').val('');
        $('#tpo_prod').val([]);
        $('#cont_ca').val([]);
        $('#Icon').val('');
    }

    function guardar_bodega(){
        var nombre = $('#nombre_bodega_agregar').val();
        var ubicacion = $('#direccion_bodega_agregar').val();
        var descripcion = $('#descripcion_bodega_agregar').val();
        var email = $('#email_bodega_agregar').val();
        var telefono = $('#telefono_bodega_agregar').val();
        var tpos_productos = $('#tpo_prod_bodega_agregar').val();
        var cont_ca = $('#cont_ca_bodega_agregar').val();
        var id_institucion = $('#id_institucion').val();

        if(nombre == '' || ubicacion == '' || descripcion == '' || tpos_productos == '' || cont_ca == ''){
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });

        } else {
            var data = {
                nombre: nombre,
                ubicacion: ubicacion,
                descripcion: descripcion,
                email: email,
                telefono: telefono,
                tpos_productos: tpos_productos,
                cont_ca: cont_ca,
                id_institucion: id_institucion,
                _token: '{{ csrf_token() }}',
            };


            $.ajax({
                url: '{{ route("bodega.guardar_bodega") }}',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'

                        });
                        $('#agregar_bodega').modal('hide');
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                    } else {
                        alert('Error al guardar el registro');
                    }
                },
                error: function(data) {
                    console.log(data);
                    alert('Error al guardar el registro');
                }
            });
        }

    }

    function buscarResponsable(event,opcion) {
        var rut = event.target.value + event.key; // El rut que se está ingresando
        // Crear una nueva solicitud AJAX con jquery
        $.ajax({
            url: '/buscar_rut_profesional_bodega',
            type: 'POST',
            data: {
                rut: rut,
                _token: '{{ csrf_token() }}',
            },
            success: function(responsables) {
                console.log(responsables);
                var responsablesArray = JSON.parse(responsables);

                if(opcion == 'agregar'){
                    // Vacía el select
                    $('#select_responsable').empty();

                    // Llena el select con los responsables devueltos
                    responsablesArray.forEach(function(responsable) {
                        $('#select_responsable').append('<option value="' + responsable.id + '">' + responsable.nombre + ' '+responsable.apellido_uno+'</option>');
                    });
                }else{
                    // Vacía el select
                    $('#select_responsable').empty();

                    // Llena el select con los responsables devueltos
                    responsablesArray.forEach(function(responsable) {
                        $('#select_responsable').append('<option value="' + responsable.id + '">' + responsable.nombre + ' '+responsable.apellido_uno+'</option>');
                    });
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function dameRutResponsable(idResponsable,opcion) {

        $.ajax({
            url: '/devolver_rut_profesional',
            type: 'POST',
            data: {
                id: idResponsable,
                _token: '{{ csrf_token() }}',
            },
            success: function(paciente) {
                console.log(paciente);
                console.log(JSON.parse(paciente));
                paciente = JSON.parse(paciente);
                if(opcion == 'agregar'){
                    $('#prof_resp').val(paciente.rut);
                }else{
                    $('#prof_resp').val(paciente.rut);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editar_registro_bodega(){
        var idbodega = $('#idbodega').val();
        var nombre_bodega = $('#nombre_bodega_editar').val();
        var direcccion_bodega = $('#direccion_bodega_editar').val();
        var descripcion_bodega = $('#descripcion_bodega_editar').val();
        var email_bodega = $('#email_bodega_editar').val();
        var telefono_bodega = $('#telefono_bodega_editar').val();
        var id_responsables = $('#responsable_editar').val();
        var prof_resp = $('#prof_resp_editar').val();
        var tpo_prod = $('#tpo_prod_bodega_editar').val();
        var cont_ca = $('#cont_ca_bodega_editar').val();
        var id_institucion = $('#id_institucion').val();

        var data = {
            idbodega: idbodega,
            nombre_bodega: nombre_bodega,
            direcccion_bodega: direcccion_bodega,
            descripcion_bodega: descripcion_bodega,
            email_bodega: email_bodega,
            telefono_bodega: telefono_bodega,
            id_responsables: id_responsables,
            prof_resp: prof_resp,
            tpo_prod: tpo_prod,
            cont_ca: cont_ca,
            id_institucion: id_institucion,
            _token: '{{ csrf_token() }}',
        }

        console.log(data);

        if (nombre_bodega == '' || descripcion_bodega == '' || id_responsables == '' || prof_resp == '' || tpo_prod == '' || cont_ca == '' ) {
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });
        } else {
            var data = {
                idbodega: idbodega,
                nombre_bodega: nombre_bodega,
                direcccion_bodega: direcccion_bodega,
                descripcion_bodega: descripcion_bodega,
                email_bodega: email_bodega,
                telefono_bodega: telefono_bodega,
                id_responsables: id_responsables,
                prof_resp: prof_resp,
                tpo_prod: tpo_prod,
                cont_ca: cont_ca,
                id_institucion: id_institucion,
                _token: '{{ csrf_token() }}',
            };

            $.ajax({
                url: '{{ route("bodega.editar_registro_bodega") }}',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#editar_bodega').modal('hide');
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                    } else {
                        swal({
                            title: 'Error',
                            text: data.mensaje,
                            icon: 'error',
                            button: 'Aceptar'
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                    swal({
                        title: 'Error',
                        text: data.responseText,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            });
        }
    }

function guardar_responsable_bodega(){
        var bodega_para_responsable = $('#bodega_para_responsable').val();
        var id_responsable = $('#select_responsable').val();
        var prof_resp = $('#prof_resp').val();
        var numero_turno = $('#numero_turno').val();
        var id_institucion = $('#id_institucion').val();

        if (numero_turno == '' || id_responsable == '' || prof_resp == '') {
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });
        } else {
            var data = {
                bodega_para_responsable: bodega_para_responsable,
                id_responsable: id_responsable,
                prof_resp: prof_resp,
                numero_turno: numero_turno,
                id_institucion: id_institucion,
                _token: '{{ csrf_token() }}',
            };


            $.ajax({
                url: '/guardar_responsable_bodega',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'

                        });
                        $('#agregar_bodega_editar').modal('hide');
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                    } else {
                        swal({
                            title: 'Error',
                            text: data.mensaje,
                            icon: 'error',
                            button: 'Aceptar'
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                    alert('Error al guardar el registro');
                }
            });
        }

    }

    function eliminar_bodega(id) {
        swal({
                title: "Eliminar Bodega",
                text: "¿Está seguro que desea eliminar la bodega?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_bodega(id);
                }
            });
    }

    function confirmar_eliminar_bodega(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('bodega.eliminar_bodega') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 'ok') {
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                        swal({
                            title: "Bodega",
                            text: "Bodega Eliminada Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar bodega",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar bodega",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    // function editar_registro_bodega(){
    //     var nombre_bodega = $('#nombre_bodega_editar').val();
    //     var direccion = $('#direccion_bodega_editar').val();
    //     var email = $('#email_bodega_editar').val();
    //     var telefono = $('#telefono_bodega_editar').val();
    //     var descripcion_bodega = $('#descripcion_bodega_editar').val();
    //     var tpo_prod = $('#tpo_prod_bodega_editar').val();
    //     var cont_ca = $('#cont_ca_bodega_editar').val();
    //     var id_bodega = $('#idbodega').val();
    //     var id_institucion = $('#id_institucion').val();

    //     var data = {
    //         nombre_bodega: nombre_bodega,
    //         direccion: direccion,
    //         email: email,
    //         telefono: telefono,
    //         descripcion_bodega: descripcion_bodega,
    //         tpo_prod: tpo_prod,
    //         cont_ca: cont_ca,
    //         id_bodega: id_bodega,
    //         id_institucion: id_institucion,
    //     }

    //     console.log(data);

    //     if (nombre_bodega == '' || direccion == '' || email == '' || telefono == '' || descripcion_bodega == '' || tpo_prod == '' || cont_ca == '') {
    //         return swal({
    //             title: 'Error',
    //             text: 'Debe completar todos los campos',
    //             icon: 'error',
    //             button: 'Aceptar'
    //         });
    //     } else {
    //         var data = {
    //             nombre_bodega: nombre_bodega,
    //             direccion: direccion,
    //             email: email,
    //             telefono: telefono,
    //             descripcion_bodega: descripcion_bodega,
    //             tpo_prod: tpo_prod,
    //             cont_ca: cont_ca,
    //             id_bodega: id_bodega,
    //             id_institucion: id_institucion,
    //             _token: '{{ csrf_token() }}',
    //         };

    //         $.ajax({
    //             url: '{{ route("bodegas.editar_bodega") }}',
    //             type: 'POST',
    //             data: data,
    //             success: function(data) {
    //                 console.log(data);
    //                 if (data.estado == 1) {
    //                     swal({
    //                         title: 'Registro guardado',
    //                         text: 'El registro se ha guardado correctamente',
    //                         icon: 'success',
    //                         button: 'Aceptar'
    //                     });
    //                     $('#contenedor_bodegas').empty();
    //                     $('#contenedor_bodegas').append(data.v);
    //                     // ocultar modal
    //                     $('#editar_bodega').modal('hide');
    //                 } else {
    //                     swal({
    //                         title: 'Error',
    //                         text: data.mensaje,
    //                         icon: 'error',
    //                         button: 'Aceptar'
    //                     });
    //                 }
    //             },
    //             error: function(data) {
    //                 console.log(data);
    //                 swal({
    //                     title: 'Error',
    //                     text: data.responseText,
    //                     icon: 'error',
    //                     button: 'Aceptar'
    //                 });
    //             }
    //         });
    //     }
    // }
    function editar_bodega(idbodega){
        $('#editar_bodega').modal('show');
        let id_institucion = "{{ $institucion->id }}";
        $.ajax({
            url: '{{ route("bodegas.edit", "id") }}'.replace('id', idbodega),
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}',
                id_institucion: id_institucion,
            },
            success: function(data) {
                console.log(data);
                let bodega = data.bodega;
                $('#idbodega').val(bodega.id);
                let responsables = data.responsables;
                let tipos_productos = bodega.tipos_productos;
                let tipos_productos_autorizados = bodega.tipo_productos_autorizacion;

                var tipos_productos_array = tipos_productos;
                var tipos_productos_autorizados_array = tipos_productos_autorizados;
                console.log(tipos_productos_array);
                $('#select_responsable').val(bodega.id_responsable);
                // Llenar los campos del formulario
                $('#nombre_bodega_editar').val(bodega.nombre);
                $('#direccion_bodega_editar').val(bodega.direccion);
                $('#descripcion_bodega_editar').val(bodega.descripcion);
                $('#email_bodega_editar').val(bodega.email);
                $('#telefono_bodega_editar').val(bodega.telefono);
                $('#tpo_prod_bodega_editar').val(tipos_productos_array).trigger('change');
                $('#cont_ca_bodega_editar').val(tipos_productos_autorizados_array).trigger('change');
                $('#prof_resp_editar').val(bodega.rut_responsable);
                $('#responsable_editar').empty();
                responsables.forEach(function(responsable) {
                    // Puedes mostrar nombre + apellido_uno + apellido_dos
                    let nombreCompleto = responsable.nombre + ' ' + responsable.apellido_uno + (responsable.apellido_dos ? ' ' + responsable.apellido_dos : '');
                    $('#responsable_editar').append('<option value="' + responsable.id + '">' + nombreCompleto + '</option>');
                });
                $('#responsable_editar').val(bodega.responsables.map(r => r.id)).trigger('change');
            },
            error: function(data) {
                console.log(data);
            }
        });

    }
</script>
