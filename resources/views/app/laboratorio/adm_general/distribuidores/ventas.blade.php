@extends('template.laboratorio.laboratorio_profesional.template')

@section('page-script')
<script>
    var carritoData = {
        items: [],
        total: 0,
        cantidad_items: 0
    };
    // ===== RUTAS PARA EL SISTEMA DE COTIZACIONES =====
            window.cotizacionRoutes = {
                buscarProductos: "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}",
                guardarBorrador: "{{ route('laboratorio.cotizaciones.guardar_borrador') }}",
                vistaPrevia: "{{ route('laboratorio.cotizaciones.vista_previa') }}",
                generar: "{{ route('laboratorio.cotizaciones.generar') }}",
                enviarEmail: "{{ route('laboratorio.cotizaciones.enviar_email') }}",
                historial: "{{ route('laboratorio.cotizaciones.historial', ':cliente_id') }}",
                detalle: "{{ route('laboratorio.cotizaciones.detalle', ':id') }}",
                descargarPdf: "{{ route('laboratorio.cotizaciones.descargar_pdf', ':id') }}",
                anular: "{{ route('laboratorio.cotizaciones.anular', ':id') }}",
                aceptar: "{{ route('laboratorio.cotizaciones.aceptar', ':id') }}",
                rechazar: "{{ route('laboratorio.cotizaciones.rechazar', ':id') }}"
            };
            // ===== FIN RUTAS COTIZACIONES =====

    // ===== FORMAS DE PAGO ACEPTADAS =====
    var formasPago = @json($formas_pago);
    // ===== FIN FORMAS DE PAGO =====

    $(document).ready(function() {
        dame_tipos_productos();
        $('#tabla_historial_productos_prestados').DataTable();
        mostrarBotonVerCarrito();
        actualizarCarritoSilencioso();

        // Verificar periódicamente que el botón flotante siga existiendo
        setInterval(function() {
            if ($('#btn-ver-carrito').length === 0) {
                mostrarBotonVerCarrito();
            }
        }, 500);
    });

    document.addEventListener('DOMContentLoaded', function() {
        Dropzone.autoDiscover = false; // <--- Agrega esto al inicio
        const editorElement = document.querySelector('#campana_mensaje');
        if (editorElement) {
            ClassicEditor
                .create(editorElement, {
                    toolbar: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                        'alignment', '|',
                        'numberedList', 'bulletedList', '|',
                        'outdent', 'indent', '|',
                        'link', 'insertTable', '|',
                        'undo', 'redo'
                    ],
                    language: 'es'
                })
                .then(editor => {
                    window.editorVppb = editor;
                    if (!editor.getData().trim()) {
                        editor.setData('Escriba aquí el contenido del informe...');
                    }
                })
                .catch(error => {
                    console.error('❌ Error inicializando editor VPPB:', error);
                    if (typeof swal === 'function') {
                        swal('Error', 'No se pudo inicializar el editor de texto', 'error');
                    }
                });
        }
        var dropzoneArchivosCamp;
        dropzoneArchivosCamp = new Dropzone("#dropzoneArchivosCamp", {
            url: "{{ route('laboratorio.cargar_archivo_campania') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4, // Tamaño máximo en MiB
            maxFiles: 4,
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar carga",
            dictUploadCanceled: "Subida cancelada.",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "No puede cargar más archivos.",
            autoProcessQueue: false, // Desactiva el procesamiento automático
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("id", "{{ Auth::user()->id }}");
                });
                this.on("success", function(file, response) {
                    // Manejar la respuesta de éxito
                    console.log(response);
                });
                this.on("error", function(file, message) {
                    // Manejar el error
                    console.error(message);
                });
                this.on("removedfile", function(file) {
                    // Manejar la eliminación del archivo
                    console.log("Archivo eliminado");
                });
                this.on("canceled", function(file) {
                    // Manejar la cancelación de la carga
                    console.log("Carga cancelada");
                });
            }
        });
        var dropzoneImagenesCamp;
        dropzoneImagenesCamp = new Dropzone("#dropzoneImagenesCamp", {
            url: "{{ route('laboratorio.cargar_archivo_campania') }}",
            paramName: "file",
            maxFilesize: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra y suelta imágenes aquí o haz clic para subir",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on("success", function(file, response) {
                    console.log('Imagen subida:', response);
                });
                this.on("error", function(file, errorMessage) {
                    console.error('Error al subir imagen:', errorMessage);
                    swal('Error', 'No se pudo subir la imagen: ' + errorMessage, 'error');
                    this.removeFile(file);
                });
            }
        });
    });

    function dame_tipos_productos(){
        url = "{{ route('laboratorio.tipos_productos') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
            },
        })
        .done(function(data)
        {
            console.log('-----------------------');
            console.log(data);
            console.log('-----------------------');
            if(data.estado == 1)
            {
                if(data.tipos.length>0)
                {
                    var html = '<option value="">Seleccione</option>';
                    data.tipos.forEach(element => {
                        html += '<option value="'+element.id+'">'+element.nombre+'</option>';
                    });
                    html += '<option value="0">Otros</option>';
                    $('#tipo_producto_busqueda').html(html);
                    $('#tipo_producto_busqueda_prestamo').html(html);
                    $('#cotiz_tipo_producto').html(html);
                }
                else
                {
                    $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                    $('#tipo_producto_busqueda_prestamo').html('<option value="">No hay registros</option>');
                    $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                }
            }
            else
            {
                $('#tipo_producto_busqueda').html('<option value="">No hay registros</option>');
                $('#cotiz_tipo_producto').html('<option value="">No hay registros</option>');
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al comunicarse con el servidor'
                });
            }
        });
    }

    function seleccionar_producto_audifono(id_producto, precio_venta) {
        console.log('Producto seleccionado ID:', id_producto);

        swal({
            title: '¿Agregar al carrito?',
            content: {
                element: "div",
                attributes: {
                    innerHTML: `
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Cantidad:</label>
                            <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Precio Unitario:</label>
                            <input type="number" id="swal-precio" class="form-control" value="${precio_venta}" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Descuento:</label>
                            <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Observaciones:</label>
                            <textarea id="swal-observaciones" class="form-control" rows="2" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                        </div>
                    `
                }
            },
            buttons: {
                cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Agregar al Carrito",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: false
                }
            }
        }).then((willAdd) => {
            if (willAdd) {
                // Validar campos
                let cantidad = parseInt(document.getElementById('swal-cantidad').value);
                let precio = parseFloat(document.getElementById('swal-precio').value);
                let descuento = parseFloat(document.getElementById('swal-descuento').value);
                let observaciones = document.getElementById('swal-observaciones').value;

                // Validaciones
                if (!cantidad || cantidad <= 0) {
                    swal("Error", "La cantidad debe ser mayor a 0", "error");
                    return;
                }

                if (precio < 0) {
                    swal("Error", "El precio no puede ser negativo", "error");
                    return;
                }

                if (descuento < 0) {
                    swal("Error", "El descuento no puede ser negativo", "error");
                    return;
                }

                if (descuento > precio * cantidad) {
                    swal("Error", "El descuento no puede ser mayor al subtotal", "error");
                    return;
                }

                // Cerrar modal y agregar al carrito
                swal.close();

                let datos = {
                    cantidad: cantidad,
                    precio_unitario: precio,
                    descuento: descuento,
                    observaciones: observaciones
                };

                agregarProductoAlCarrito(id_producto, datos);
            }
        });
    }

    function seleccionar_producto_audifono_prestamo(id_producto, precio_venta){
        console.log('Producto seleccionado ID:', id_producto);

        swal({
            title: '¿Agregar al carrito de préstamos?',
            content: {
                element: "div",
                attributes: {
                    innerHTML: `
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Cantidad:</label>
                            <input type="number" id="swal-cantidad" class="form-control" value="1" min="1" max="100">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Precio Unitario:</label>
                            <input type="number" id="swal-precio" class="form-control" value="${precio_venta}" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Descuento:</label>
                            <input type="number" id="swal-descuento" class="form-control" value="0" min="0" step="0.01">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Fecha de entrega esperada:</label>
                            <input type="date" id="swal-fecha-entrega" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label class="font-weight-bold">Observaciones:</label>
                            <textarea id="swal-observaciones" class="form-control" rows="2" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                        </div>
                    `
                }
            },
            buttons: {
                cancel: {
                    text: "Cancelar",
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Agregar al Carrito",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: false
                }
            }
        }).then((willAdd) => {
            if (willAdd) {
                // Validar campos
                let cantidad = parseInt(document.getElementById('swal-cantidad').value);
                let precio = parseFloat(document.getElementById('swal-precio').value);
                let descuento = parseFloat(document.getElementById('swal-descuento').value);
                let fecha_esperada_entrega = document.getElementById('swal-fecha-entrega').value;
                let observaciones = document.getElementById('swal-observaciones').value;

                // Validaciones
                if (!cantidad || cantidad <= 0) {
                    swal("Error", "La cantidad debe ser mayor a 0", "error");
                    return;
                }

                if (precio < 0) {
                    swal("Error", "El precio no puede ser negativo", "error");
                    return;
                }

                if (descuento < 0) {
                    swal("Error", "El descuento no puede ser negativo", "error");
                    return;
                }

                // if (!fecha_esperada_entrega) {
                //     swal("Error", "Debe ingresar una fecha de entrega esperada", "error");
                //     return;
                // }

                if (descuento > precio * cantidad) {
                    swal("Error", "El descuento no puede ser mayor al subtotal", "error");
                    return;
                }

                // Cerrar modal y agregar al carrito
                swal.close();

                let datos = {
                    cantidad: cantidad,
                    precio_unitario: precio,
                    descuento: descuento,
                    fecha_esperada_entrega: fecha_esperada_entrega,
                    observaciones: observaciones
                };

                agregarProductoAlCarritoPrestamo(id_producto, datos);
            }
        });
    }

    function agregarProductoAlCarrito(id_producto, datos_adicionales = {}) {
        // Validar que el cliente esté seleccionado
        let id_cliente = $('#id_cliente_fc').val();
        if (!id_cliente) {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'Debe seleccionar un cliente primero'
            });
            return;
        }

        // Mostrar loading
        swal({
            title: 'Agregando al carrito...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        let url = "{{ route('laboratorio.carrito.agregar') }}";

        let data = {
            id_producto: id_producto,
            cantidad: datos_adicionales.cantidad || 1,
            id_cliente: id_cliente,
            id_ficha: datos_adicionales.id_ficha || $('#id_fc').val(),
            precio_unitario: datos_adicionales.precio_unitario || 0,
            descuento: datos_adicionales.descuento || 0,
            observaciones: datos_adicionales.observaciones || '',
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
            console.log('Producto agregado al carrito:', response);

            if (response.estado === 1) {
                // Actualizar datos del carrito
                carritoData.total = response.total_carrito;
                carritoData.cantidad_items = response.cantidad_items;

                // Recargar items del carrito desde el servidor
                actualizarCarritoSilencioso();

                // Actualizar UI
                actualizarBadgeCarrito();

                swal({
                    icon: 'success',
                    title: '¡Agregado!',
                    text: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Opcional: Mostrar botón para ver carrito
                mostrarBotonVerCarrito();
            } else {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: response.mensaje
                });
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al agregar al carrito:', jqXHR);

            let mensaje = 'Error al agregar el producto al carrito';
            if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
                mensaje = jqXHR.responseJSON.mensaje;
            }

            swal({
                icon: 'error',
                title: 'Error',
                text: mensaje
            });
        });
    }

    function agregarProductoAlCarritoPrestamo(id_producto, datos_adicionales = {}) {
        // Mostrar loading
        swal({
            title: 'Agregando al carrito de préstamos...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        let url = "{{ route('laboratorio.carrito_prestamos.agregar') }}";

        let data = {
            id_producto: id_producto,
            cantidad: datos_adicionales.cantidad || 1,
            id_cliente: datos_adicionales.id_cliente || $('#id_cliente_fc').val(),
            id_ficha: datos_adicionales.id_ficha || $('#id_fc').val(),
            precio_unitario: datos_adicionales.precio_unitario || 0,
            descuento: datos_adicionales.descuento || 0,
            fecha_devolucion_esperada: datos_adicionales.fecha_esperada_entrega || '',
            observaciones: datos_adicionales.observaciones || '',
            _token: CSRF_TOKEN
        };

        if(data.id_cliente == '' || data.id_ficha == ''){
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No se ha asociado un cliente o ficha clínica'
            });
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
            console.log('Producto agregado al carrito de préstamos:', response);

            if (response.estado === 1) {
                // Actualizar datos del carrito
                carritoData.total = response.total_carrito;
                carritoData.cantidad_items = response.cantidad_items;
                if (response.items) {
                    carritoData.items = response.items;
                }

                // Recargar items del carrito de préstamos desde el servidor
                actualizarCarritoPrestamosSilencioso();

                // Actualizar UI
                actualizarBadgeCarritoPrestamo();

                swal({
                    icon: 'success',
                    title: '¡Agregado al carrito de préstamos!',
                    text: response.mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Opcional: Mostrar botón para ver carrito
                mostrarBotonVerCarritoPrestamo();
            } else {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: response.mensaje
                });
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al agregar al carrito de préstamos:', jqXHR);

            let mensaje = 'Error al agregar el producto al carrito de préstamos';
            if (jqXHR.responseJSON && jqXHR.responseJSON.mensaje) {
                mensaje = jqXHR.responseJSON.mensaje;
            }

            swal({
                icon: 'error',
                title: 'Error',
                text: mensaje
            });
        });
    }

    /**
         * Actualizar badge del carrito
         */
        function actualizarBadgeCarrito() {
            // Actualizar badge del botón flotante
            let badge = $('#badge-carrito');
            badge.text(carritoData.cantidad_items).show();

            // Actualizar badge del botón en el header
            let badgeHeader = $('#badge-carrito-header');
            let totalHeader = $('#total-carrito-header');

            if (carritoData.cantidad_items > 0) {
                // Animación de pulso al actualizar
                badgeHeader.addClass('badge-animated');
                setTimeout(function() {
                    badgeHeader.removeClass('badge-animated');
                }, 500);

                badgeHeader.text(carritoData.cantidad_items).show();
                totalHeader.text('Total: $' + parseFloat(carritoData.total || 0).toFixed(2)).show();

                // Mostrar el botón del carrito si estaba oculto
                $('#btn-abrir-carrito').removeClass('d-none');
            } else {
                badgeHeader.hide();
                totalHeader.hide();
            }
        }

        /**
            * Actualizar badge del carrito de préstamos
            */

        function actualizarBadgeCarritoPrestamo() {
            // Actualizar badge del botón flotante
            let badge = $('#badge-carrito-prestamo');
            if (carritoData.cantidad_items > 0) {
                badge.text(carritoData.cantidad_items).show();
            } else {
                badge.hide();
            }
            // Actualizar badge del botón en el header
            let badgeHeader = $('#badge-carrito-prestamo-header');
            let totalHeader = $('#total-carrito-prestamo-header');

            if (carritoData.cantidad_items > 0) {
                // Animación de pulso al actualizar
                badgeHeader.addClass('badge-animated');
                setTimeout(function() {
                    badgeHeader.removeClass('badge-animated');
                }, 500);

                badgeHeader.text(carritoData.cantidad_items).show();
                totalHeader.text('Total: $' + parseFloat(carritoData.total || 0).toFixed(2)).show();

                // Mostrar el botón del carrito si estaba oculto
                $('#btn-abrir-carrito-prestamo').removeClass('d-none');
            } else {
                badgeHeader.hide();
                totalHeader.hide();
            }

            if ($('#btn-ver-carrito-prestamo').length === 0) {
                let boton = `
                    <button id="btn-ver-carrito-prestamo" class="btn btn-success btn-lg"
                            style="position:fixed; bottom:20px; right:20px; z-index:9999; border-radius:50%; width:60px; height:60px;"
                            onclick="obtenerCarrito()" title="Ver carrito">
                        <i class="feather icon-shopping-cart"></i>
                        <span id="badge-carrito-prestamo" class="badge badge-danger"
                            style="position:absolute; top:-5px; right:-5px; display:none;">0</span>
                    </button>
                `;
                //$('body').append(boton);
            }
        }


        /**
         * Procesar venta
         */
        function procesarVenta() {
            // Construir opciones de formas de pago dinámicamente
            let opcionesFormasPago = formasPago.map(forma => {
                return `<option value="${forma.id}">${forma.nombre}</option>`;
            }).join('');

            // Aquí puedes implementar lógica adicional para procesar la venta
            swal({
                title: 'Procesar Venta',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Forma de Pago:</label>
                                <select id="swal-metodo-pago" class="form-control">
                                    <option value="">Seleccione una forma de pago</option>
                                    ${opcionesFormasPago}
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-obs-venta" class="form-control" rows="3" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirmar Venta",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willProcess) => {
                if (willProcess) {
                    let metodo_pago = document.getElementById('swal-metodo-pago').value;
                    let observaciones = document.getElementById('swal-obs-venta').value;

                    // Validar método de pago
                    if (!metodo_pago) {
                        swal("Error", "Debe seleccionar un método de pago", "error");
                        return;
                    }

                    // Cerrar modal y procesar
                    swal.close();

                    let datos = {
                        metodo_pago: metodo_pago,
                        observaciones: observaciones,
                    };

                    finalizarVenta(datos);
                }
            });
        }

        /**
         * Procesar préstamo
         */


        function procesarPrestamo() {
            // Aquí puedes implementar lógica adicional para procesar el préstamo
            swal({
                title: 'Procesar Préstamo',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: `
                            <div class="form-group text-left">
                                <label class="font-weight-bold">Observaciones:</label>
                                <textarea id="swal-obs-prestamo" class="form-control" rows="3" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
                            </div>
                            <div class="form-group mb-3 text-left">
                            <input type="checkbox" id="garantiaPrestamo" name="garantiaPrestamo" onchange="toggleGarantiaDiv()">
                            <label for="garantiaPrestamo" class="ml-2">¿Se deja garantía?</label>
                            </div>
                            <div id="divGarantia" style="display:none; margin-bottom:15px;">
                            <label for="tipoGarantia">Tipo de garantía:</label>
                            <select id="tipoGarantia" class="form-control mb-2">
                            <option value="">Seleccione tipo</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="cheque">Cheque</option>
                            <option value="documento">Documento</option>
                            <option value="otro">Otro</option>
                            </select>
                            <label for="valorGarantia">Valor de la garantía:</label>
                            <input type="text" id="valorGarantia" class="form-control" placeholder="Ingrese valor">
                            </div>
                        `
                    }
                },
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirmar Préstamo",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: false
                    }
                }
            }).then((willProcess) => {
                if (willProcess) {
                    let observaciones = document.getElementById('swal-obs-prestamo').value;
                    let tiene_garantia = $('#garantiaPrestamo').is(':checked') ? 1 : 0;
                    console.log('tiene_garantia 2', tiene_garantia);
                    if(tiene_garantia){
                        var tipo_garantia = $('#tipoGarantia').val();
                        if(tipo_garantia == '' || tipo_garantia == 0){
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: 'Debe seleccionar un tipo de garantía'
                            });
                            return;
                        }
                        var valor_garantia = parseFloat($('#valorGarantia').val());
                    }
                    // Validar observaciones
                    if (!observaciones) {
                        swal("Error", "Debe ingresar observaciones", "error");
                        return;
                    }

                    // validar garantía
                    if(tiene_garantia){
                        if(!tipo_garantia || tipo_garantia == 0){
                            swal("Error", "Debe seleccionar un tipo de garantía", "error");
                            return;
                        }
                        if(!valor_garantia || isNaN(valor_garantia) || valor_garantia <= 0){
                            swal("Error", "Debe ingresar un valor válido para la garantía", "error");
                            return;
                        }
                    }

                    // Cerrar modal y procesar
                    swal.close();

                    let datos = {
                        observaciones: observaciones,
                        tiene_garantia: tiene_garantia,
                        tipo_garantia: tipo_garantia || '',
                        valor_garantia: valor_garantia || 0
                    };

                    finalizarPrestamo(datos);
                }
            });
        }

        function finalizarPrestamo(datos) {
            let url = "{{ route('laboratorio.carrito_prestamos.procesar_prestamo') }}";

            swal({
                title: 'Procesando préstamo...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_cliente: $('#id_cliente_fc').val(),
                    id_ficha: $('#id_fc').val(),
                    observaciones: datos.observaciones,
                    tiene_garantia: datos.tiene_garantia,
                    tipo_garantia: datos.tipo_garantia || '',
                    valor_garantia: datos.valor_garantia || 0,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                console.log(response);
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarritoPrestamo();

                    swal({
                        icon: 'success',
                        title: '¡Préstamo Exitoso!',
                        html: `
                            <p>${response.mensaje}</p>
                            <p><strong>Items procesados:</strong> ${response.items_procesados}</p>
                            <p><strong>Total:</strong> $${parseFloat(response.total).toFixed(2)}</p>
                        `,
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al procesar préstamo:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo procesar el préstamo'
                });
            });
        }

        /**
         * Finalizar venta (enviar al servidor)
         */
        function finalizarVenta(datos) {
            let url = "{{ route('laboratorio.carrito.procesar_venta') }}";

            swal({
                title: 'Procesando venta...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_cliente: $('#id_cliente_fc').val(),
                    id_ficha: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    id_forma_pago: datos.metodo_pago,
                    observaciones: datos.observaciones,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                console.log(response);
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarrito();

                    swal({
                        icon: 'success',
                        title: '¡Venta Exitosa!',
                        html: `
                            <p>${response.mensaje}</p>
                            <p><strong>Items procesados:</strong> ${response.items_procesados}</p>
                            <p><strong>Total:</strong> $${parseFloat(response.total).toFixed(2)}</p>
                        `,
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al procesar venta:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo procesar la venta'
                });
            });
        }

        /**
         * Obtener y mostrar carrito
         */
        function obtenerCarrito() {
            let url = "{{ route('laboratorio.carrito.obtener') }}";
            let id_cliente = $('#id_cliente_fc').val();

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_cliente: id_cliente
                },
            })
            .done(function(response) {
                console.log('Carrito obtenido:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };

                    mostrarModalCarrito();
                    actualizarBadgeCarrito();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener carrito:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el carrito'
                });
            });
        }

        /**
         * Actualizar carrito sin abrir modal (solo actualiza badge)
         */
        function actualizarCarritoSilencioso() {
            let url = "{{ route('laboratorio.carrito.obtener') }}";
            let id_cliente = $('#id_cliente_fc').val();

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_cliente: id_cliente
                },
            })
            .done(function(response) {
                console.log('Carrito actualizado:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };

                    actualizarBadgeCarrito();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener carrito:', jqXHR);
            });
        }

        /**
         * Actualizar carrito de préstamos sin abrir modal (solo actualiza datos)
         */
        function actualizarCarritoPrestamosSilencioso() {
            let url = "{{ route('laboratorio.carrito_prestamos.obtener') }}";
            let id_cliente = $('#id_cliente_fc').val();
            let id_ficha = $('#id_fc').val();

            if(id_cliente == '' || id_ficha == '') {
                return;
            }

            $.ajax({
                url: url,
                type: "GET",
                data:{
                    id_cliente: id_cliente,
                    id_ficha: id_ficha,
                }
            })
            .done(function(response) {
                console.log('Carrito de préstamos actualizado:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };
                    actualizarBadgeCarritoPrestamo();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al actualizar carrito de préstamos:', jqXHR);
            });
        }

        /**
         * Obtener y mostrar carrito de préstamos
         */
        function obtenerCarritoPrestamo() {
            let url = "{{ route('laboratorio.carrito_prestamos.obtener') }}";
            let id_cliente = $('#id_cliente_fc').val();
            let id_ficha = $('#id_fc').val();

            if(id_cliente == ''){
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se ha asociado un cliente'
                });
                return;
            }

            $.ajax({
                url: url,
                type: "GET",
                data:{
                    id_cliente: id_cliente,
                    id_ficha: id_ficha,
                }
            })
            .done(function(response) {
                console.log('Carrito de préstamos obtenido:', response);
                if (response.estado === 1) {
                    carritoData = {
                        items: response.items,
                        total: response.total,
                        cantidad_items: response.cantidad_items
                    };
                    if(response.items.length > 0) {
                        var nombre_cliente = response.items[0].cliente?.nombres + ' ' + response.items[0].cliente?.apellido_uno;
                    }else{
                        var nombre_cliente = response.nombre_cliente || '';
                    }


                    mostrarModalCarritoPrestamo(nombre_cliente);
                    actualizarBadgeCarritoPrestamo();
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener carrito de préstamos:', jqXHR);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el carrito de préstamos'
                });
            });
        }

        /**
         * Mostrar modal con contenido del carrito
         */
        function mostrarModalCarrito() {
            let html = '<div class="table-responsive">';

            if (carritoData.items.length === 0) {
                html += '<p class="text-center py-4">El carrito está vacío</p>';
            } else {
                html += '<table class="table table-hover">';
                html += '<thead><tr>';
                html += '<th>Producto</th>';
                html += '<th>Cantidad</th>';
                html += '<th>Precio</th>';
                html += '<th>Subtotal</th>';
                html += '<th>Acciones</th>';
                html += '</tr></thead><tbody>';

                carritoData.items.forEach(function(item) {
                    html += '<tr>';
                    html += '<td>';
                    if (item.image_path) {
                        html += '<img src="/' + item.image_path + '" alt="' + item.nombre_producto + '" class="img-thumbnail mr-2" style="width:50px;">';
                    }
                    html += '<div>';
                    html += '<strong>' + item.nombre_producto + '</strong><br>';
                    html += '<small class="text-muted">' + (item.marca_producto || '') + '</small>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="number" class="form-control form-control-sm" value="' + item.cantidad + '" ';
                    html += 'min="1" max="' + (item.stock_disponible || 100) + '" ';
                    html += 'onchange="actualizarCantidadItem(' + item.id + ', this.value)">';
                    html += '</td>';
                    html += '<td>$' + parseFloat(item.precio_unitario).toFixed(2) + '</td>';
                    html += '<td><strong>$' + parseFloat(item.subtotal).toFixed(2) + '</strong></td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-danger" onclick="eliminarItemCarrito(' + item.id + ')" title="Eliminar">';
                    html += '<i class="feather icon-trash-2"></i>';
                    html += '</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                html += '</tbody>';
                html += '<tfoot>';
                html += '<tr class="bg-light">';
                html += '<td colspan="3" class="text-right"><strong>TOTAL:</strong></td>';
                html += '<td colspan="2"><strong class="text-success">$' + parseFloat(carritoData.total).toFixed(2) + '</strong></td>';
                html += '</tr>';
                html += '</tfoot>';
                html += '</table>';

                html += '<div class="text-right mt-3">';
                html += '<button class="btn btn-secondary mr-2" onclick="cerrarModalCarrito()">Cerrar</button>';
                html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
                html += '<button class="btn btn-success" onclick="procesarVenta()"><i class="feather icon-check"></i> Procesar Venta</button>';
                html += '</div>';
            }

            html += '</div>';

            swal({
                title: 'Carrito de Compras',
                icon: 'info',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: '<div class="text-center mb-3"><i class="feather icon-shopping-cart" style="font-size: 2rem; color: #28a745;"></i><h4 class="mt-2">Carrito de Compras</h4></div>' + html
                    }
                },
                buttons: false,
                closeOnClickOutside: true,
                className: 'swal-wide'
            });
        }

        /**
         * Cerrar modal del carrito y refrescar badge
         */
        function cerrarModalCarrito() {
            swal.close();
            // Refrescar el carrito cuando se cierre
            setTimeout(function() {
                actualizarCarritoSilencioso();
            }, 100);
        }

        /**
         * Mostar modal con contenido del carrito de préstamos
         */
        function mostrarModalCarritoPrestamo(nombrecliente = '') {
            let html = '<div class="table-responsive">';
            html += '<div class="mb-2 text-left">';
            html += '<strong>cliente:</strong> ' + (nombrecliente || 'No seleccionado');
            html += '</div>';



            if (carritoData.items.length === 0) {
                html += '<p class="text-center py-4">El carrito de préstamos está vacío</p>';
            } else {
                html += '<table class="table table-hover">';
                html += '<thead><tr>';
                html += '<th>Producto</th>';
                html += '<th>Cantidad</th>';
                html += '<th>Fecha devolución</th>';
                html += '<th>Observaciones</th>';
                html += '<th>Acciones</th>';
                html += '</tr></thead><tbody>';

                carritoData.items.forEach(function(item) {
                    html += '<tr>';
                    html += '<td>';
                    if (item.image_path) {
                        html += '<img src="/' + item.image_path + '" alt="' + item.nombre_producto + '" class="img-thumbnail mr-2" style="width:50px;">';
                    }
                    html += '<div>';
                    html += '<strong>' + item.nombre_producto + '</strong><br>';
                    html += '<small class="text-muted">' + (item.marca_producto || '') + '</small>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>' + item.cantidad + '</td>';
                    html += '<td>' + (item.fecha_devolucion_esperada ? new Date(item.fecha_devolucion_esperada).toLocaleDateString() : '-') + '</td>';
                    html += '<td>' + (item.observaciones || '-') + '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-sm btn-danger" onclick="eliminarItemCarritoPrestamo(' + item.id + ')" title="Eliminar">';
                    html += '<i class="feather icon-trash-2"></i>';
                    html += '</button>';
                    html += '</td>';
                    html += '</tr>';
                });

                html += '</tbody>';
                html += '<tfoot>';
                html += '<tr class="bg-light">';
                html += '<td colspan="2" class="text-right"><strong>TOTAL:</strong></td>';
                html += '<td colspan="3"><strong class="text-success">$' + parseFloat(carritoData.total).toFixed(2) + '</strong></td>';
                html += '</tr>';
                html += '</tfoot>';
                html += '</table>';
                html += '<div class="text-right mt-3">';
                html += '<button class="btn btn-secondary mr-2" onclick="swal.close()">Cerrar</button>';
                html += '<button class="btn btn-danger mr-2" onclick="vaciarCarritoPrestamoCompleto()"><i class="feather icon-trash"></i> Vaciar Carrito</button>';
                html += '<button class="btn btn-success" onclick="procesarPrestamo()"><i class="feather icon-check"></i> Procesar Préstamo</button>';
                html += '</div>';
            }
            html += '</div>';
            swal({
                title: 'Préstamo de Productos',
                icon: 'info',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: '<div class="text-center mb-3"><i class="feather icon-shopping-cart" style="font-size: 2rem; color: #28a745;"></i><h4 class="mt-2">Productos a prestar</h4></div>' + html
                    }
                },
                buttons: false,
                closeOnClickOutside: true,
                className: 'swal-wide'
            });
        }

        /**
         * Actualizar cantidad de un item
         */
        function actualizarCantidadItem(id_item, cantidad) {
            let url = "{{ route('laboratorio.carrito.actualizar_cantidad') }}";

            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    id_item: id_item,
                    cantidad: cantidad,
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                if (response.estado === 1) {
                    // Actualizar carrito
                    obtenerCarrito();
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: response.mensaje
                    });
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al actualizar cantidad:', jqXHR);
            });
        }


        // Ver detalle del producto
        function ver_detalle_producto_audifono(id_producto) {
            console.log('Ver detalle del producto ID:', id_producto);

            // Hacer petición AJAX para obtener detalles completos
            let url = "{{ route('laboratorio.profesional.detalle_producto_audifono', '') }}/" + id_producto;

            $.ajax({
                url: url,
                type: "GET",
            })
            .done(function(data) {
                console.log('Detalle del producto:', data);
                if (data.producto) {
                    mostrar_modal_detalle_producto(data.producto);
                }
            })
            .fail(function() {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el detalle del producto.'
                });
            });
        }

        // Mostrar modal con detalle del producto
        function mostrar_modal_detalle_producto(producto) {
            let imagenUrl = producto.image_path || '';
            if (imagenUrl && !imagenUrl.startsWith('http')) {
                imagenUrl = '/' + imagenUrl;
            }

            let contenido = '<div class="container-fluid">';
            contenido += '<div class="row">';
            contenido += '<div class="col-md-4 text-center">';
            contenido += '<img src="' + (imagenUrl || '/images/no-image.png') + '" class="img-fluid rounded mb-2" onerror="this.src=\'/images/no-image.png\'">';
            contenido += '</div>';
            contenido += '<div class="col-md-8">';
            contenido += '<h5>' + producto.nombre + '</h5>';
            contenido += '<p><strong>Código:</strong> ' + (producto.codigo_interno || 'N/A') + '</p>';
            contenido += '<p><strong>Marca:</strong> ' + (producto.marca.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Tipo:</strong> ' + (producto.tipo_producto.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Stock Actual:</strong> ' + (producto.stock_actual || 0) + '</p>';
            contenido += '<p><strong>Stock Mínimo:</strong> ' + (producto.stock_minimo || 0) + '</p>';
            contenido += '<p><strong>Stock Máximo:</strong> ' + (producto.stock_maximo || 0) + '</p>';
            contenido += '<p><strong>Descripción:</strong> ' + (producto.descripcion || 'Sin descripción') + '</p>';
            if (producto.observaciones) {
                contenido += '<p><strong>Observaciones:</strong> ' + producto.observaciones + '</p>';
            }
            contenido += '</div>';
            contenido += '</div>';
            contenido += '</div>';

            swal({
                title: 'Detalle del Producto',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: contenido
                    }
                },
                buttons: {
                    cancel: "Cerrar",
                    confirm: {
                        text: "Seleccionar",
                        value: true,
                    }
                }
            }).then((seleccionar) => {
                if (seleccionar) {
                    seleccionar_producto_audifono(producto.id, producto.precio_venta);
                }
            });
        }

        /**
         * Eliminar item del carrito
         */
        function eliminarItemCarrito(id_item) {
            swal({
                title: '¿Eliminar producto?',
                text: 'Se eliminará este producto del carrito',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, eliminar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('laboratorio.carrito.eliminar') }}";

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            id_item: id_item,
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        if (response.estado === 1) {
                            // Actualizar carrito
                            obtenerCarrito();

                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: response.mensaje || 'Producto eliminado del carrito',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo eliminar el producto'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al eliminar del carrito:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        /**
         * Eliminar item del carrito de préstamos
         */
        function eliminarItemCarritoPrestamo(id_item) {
            swal({
                title: '¿Eliminar producto del préstamo?',
                text: 'Se eliminará este producto del carrito de préstamos',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, eliminar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    let url = "{{ route('laboratorio.carrito_prestamos.eliminar') }}";
                    let id_cliente = $('#id_cliente_fc').val();

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            id_item: id_item,
                            id_cliente: id_cliente,
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        console.log('Respuesta al eliminar del carrito de préstamos:', response);
                        if (response.estado === 1) {
                            // Actualizar carrito
                            obtenerCarritoPrestamo();

                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: response.mensaje || 'Producto eliminado del carrito de préstamos',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo eliminar el producto'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al eliminar del carrito de préstamos:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }



         {{--  function dame_audifono(id_producto, seccion) {
            console.log('Producto seleccionado ID:', id_producto);

            // cargamos datos del producto en campos del formulario
            let url = "{{ route('laboratorio.cliente.producto.dameProducto', '') }}/" + id_producto;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        let producto = data.producto.producto;
                        $('#id_producto').val(producto.id);
                        // abrir modal de detalle del producto para su control y revision
                        console.log(producto);
                        if(seccion == 'calibracion') {
                            $('#marca_audif').val(producto.marca.nombre || 'N/A');
                            $('#model_audif').val(producto.nombre || 'N/A');
                        }else{
                            $('#marca_rep').val(producto.marca.nombre || 'N/A');
                            $('#modelo_rep').val(producto.nombre || 'N/A');
                        }
                    }
                },
                error: function() {
                    console.error('Error al cargar los datos del producto');
                }
            });
        }  --}}

        function toggleGarantiaDiv() {
            var checked = document.getElementById('garantiaPrestamo').checked;
            document.getElementById('divGarantia').style.display = checked ? 'block' : 'none';
            $('#id_garantia').val(checked ? 1 : 0);
        }

        // Ver detalle del producto
        function ver_detalle_producto_audifono(id_producto) {
            console.log('Ver detalle del producto ID:', id_producto);

            // Hacer petición AJAX para obtener detalles completos
            let url = "{{ route('laboratorio.profesional.detalle_producto_audifono', '') }}/" + id_producto;

            $.ajax({
                url: url,
                type: "GET",
            })
            .done(function(data) {
                console.log('Detalle del producto:', data);
                if (data.producto) {
                    mostrar_modal_detalle_producto(data.producto);
                }
            })
            .fail(function() {
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar el detalle del producto.'
                });
            });
        }

        // Mostrar modal con detalle del producto
        function mostrar_modal_detalle_producto(producto) {
            let imagenUrl = producto.image_path || '';
            if (imagenUrl && !imagenUrl.startsWith('http')) {
                imagenUrl = '/' + imagenUrl;
            }

            let contenido = '<div class="container-fluid">';
            contenido += '<div class="row">';
            contenido += '<div class="col-md-4 text-center">';
            contenido += '<img src="' + (imagenUrl || '/images/no-image.png') + '" class="img-fluid rounded mb-2" onerror="this.src=\'/images/no-image.png\'">';
            contenido += '</div>';
            contenido += '<div class="col-md-8">';
            contenido += '<h5>' + producto.nombre + '</h5>';
            contenido += '<p><strong>Código:</strong> ' + (producto.codigo_interno || 'N/A') + '</p>';
            contenido += '<p><strong>Marca:</strong> ' + (producto.marca.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Tipo:</strong> ' + (producto.tipo_producto.nombre || 'N/A') + '</p>';
            contenido += '<p><strong>Stock Actual:</strong> ' + (producto.stock_actual || 0) + '</p>';
            contenido += '<p><strong>Stock Mínimo:</strong> ' + (producto.stock_minimo || 0) + '</p>';
            contenido += '<p><strong>Stock Máximo:</strong> ' + (producto.stock_maximo || 0) + '</p>';
            contenido += '<p><strong>Descripción:</strong> ' + (producto.descripcion || 'Sin descripción') + '</p>';
            if (producto.observaciones) {
                contenido += '<p><strong>Observaciones:</strong> ' + producto.observaciones + '</p>';
            }
            contenido += '</div>';
            contenido += '</div>';
            contenido += '</div>';

            swal({
                title: 'Detalle del Producto',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: contenido
                    }
                },
                buttons: {
                    cancel: "Cerrar",
                    confirm: {
                        text: "Seleccionar",
                        value: true,
                    }
                }
            }).then((seleccionar) => {
                if (seleccionar) {
                    seleccionar_producto_audifono(producto.id, producto.precio_venta);
                }
            });
        }

          // Seleccionar producto
        {{--  function dame_producto(id_producto) {
            console.log('Producto seleccionado ID:', id_producto);

            // cargamos datos del producto en campos del formulario
            let url = "{{ route('laboratorio.cliente.producto.dameProducto', '') }}/" + id_producto;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    if(data.estado == 1){
                        let producto = data.producto.producto;
                        swal({
                            icon: 'success',
                            title: 'Producto seleccionado',
                            text: 'Ha seleccionado el producto: ' + (producto.nombre || 'Sin nombre'),
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // abrir modal de detalle del producto para su control y revision
                        console.log(producto);
                        if(producto.image_path && !producto.image_path.startsWith('http')){
                            producto.image_path = '/' + producto.image_path;
                        }
                        $('#detalle-codigo-interno').text(producto.codigo_interno || 'N/A');
                        $('#detalle-nombre').text(producto.nombre || 'N/A');
                        $('#detalle-descripcion').text(producto.descripcion || 'N/A');
                        $('#detalle-numero-serie').text(producto.numero_serie || 'N/A');
                        $('#detalle-imagen').attr('src', producto.image_path || '').toggle(!!producto.image_path);

                        // Mostrar calificación con estrellas
                        mostrarCalificacionEstrellas(data.producto.satisfaccion);

                        $('#id_producto_seleccionado').val(producto.id);
                    }
                },
                error: function() {
                    console.error('Error al cargar los datos del producto');
                }
            });
        }  --}}

        /**
         * Buscar cliente por RUT
         */
        function buscar_cliente_venta() {
            let termino = $('#termino_busqueda_cliente').val().trim();

            if (!termino) {
                swal({
                    icon: 'warning',
                    title: 'Campo vacío',
                    text: 'Ingrese un RUT, nombre o email para buscar'
                });
                return;
            }

            // Mostrar loading
            swal({
                title: 'Buscando cliente...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            let url = "{{ route('laboratorio.distribucion.buscar_cliente_venta') }}";

            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    termino: termino
                },
                success: function(response) {
                    swal.close();

                    if (response.status === 'success' && response.cliente) {
                        let cliente = response.cliente;
                        $('#mensaje_inicial').addClass('d-none');
                        // Llenar los datos del cliente seleccionado
                        $('#cliente_sel_rut').text(cliente.rut || '-');
                        $('#cliente_sel_nombre').text(cliente.nombre || '-');
                        $('#cliente_sel_email').text(cliente.email || '-');
                        $('#cliente_sel_telefono').text(cliente.telefono || '-');

                        // Guardar el ID del cliente
                        $('#id_cliente_fc').val(cliente.id);
                        $('#cliente_seleccionado_id').val(cliente.id);
                        $('#cliente_seleccionado_id_post_venta').val(cliente.id);

                        // Limpiar carrito anterior y recargar el del nuevo cliente
                        carritoData = {
                            items: [],
                            total: 0,
                            cantidad_items: 0
                        };
                        actualizarCarritoSilencioso(); // Recargar carrito del nuevo cliente

                        // Mostrar la tarjeta del cliente seleccionado
                        $('#card_cliente_seleccionado').removeClass('d-none');

                        // Ocultar el formulario de búsqueda
                        $('#card_busqueda_cliente').addClass('d-none');

                        // Mostrar el contenedor de búsqueda de productos
                        $('#card-busqueda-productos').slideDown(300);

                        // Limpiar campo de búsqueda
                        $('#termino_busqueda_cliente').val('');

                        swal({
                            icon: 'success',
                            title: 'Cliente encontrado',
                            text: 'Se seleccionó al cliente: ' + cliente.nombre,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'No encontrado',
                            text: response.message || 'No se encontró cliente con los datos ingresados'
                        });
                    }
                },
                error: function(xhr) {
                    swal.close();

                    let mensaje = 'Error al buscar el cliente';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        mensaje = xhr.responseJSON.message;
                    }

                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: mensaje
                    });
                    console.error('Error en AJAX:', xhr);
                }
            });
        }

        /**
         * Deseleccionar cliente
         */
        function deseleccionar_cliente() {
            $('#id_cliente_fc').val('');
            $('#cliente_seleccionado_id').val('');
            $('#cliente_seleccionado_id_post_venta').val('');
            $('#card_cliente_seleccionado').addClass('d-none');

            // Ocultar el contenedor de búsqueda de productos
            $('#card-busqueda-productos').slideUp(300);

            // Mostrar el formulario de búsqueda nuevamente
            $('#card_busqueda_cliente').removeClass('d-none');

            // Limpiar y enfocar el campo de búsqueda
            $('#termino_busqueda_cliente').val('').focus();

            // Mostrar el mensaje inicial
            $('#mensaje_inicial').removeClass('d-none');

            // Limpiar búsqueda de productos
            $('#buscar_producto').val('');
            $('#tipo_producto_busqueda').val('');
            $('#lista_audifonos').html('');

            // Limpiar carrito
            carritoData = {
                items: [],
                total: 0,
                cantidad_items: 0
            };
            actualizarBadgeCarrito();

            swal({
                icon: 'info',
                title: 'Cliente deseleccionado',
                text: 'Puedes buscar otro cliente',
                showConfirmButton: false,
                timer: 1000
            });
        }

        function enter_buscar_productos_audifono(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Evitar el comportamiento por defecto del Enter
        buscar_productos_audifonos(); // Llamar a la función de búsqueda
    }
}

function vaciarCarritoCompleto() {
    swal({
        title: '¿Vaciar carrito?',
        text: 'Se eliminarán todos los productos del carrito',
        icon: 'warning',
        buttons: {
            confirm: {
                text: 'Sí, vaciar',
                value: true,
                closeModal: false
            },
            cancel: {
                text: 'Cancelar',
                value: false,
                closeModal: true
            }
        },
        dangerMode: true
    }).then((willVaciar) => {
        if (willVaciar) {
            let url = "{{ route('laboratorio.carrito.vaciar') }}";

            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: CSRF_TOKEN
                },
            })
            .done(function(response) {
                if (response.estado === 1) {
                    carritoData = {
                        items: [],
                        total: 0,
                        cantidad_items: 0
                    };

                    actualizarBadgeCarrito();
                    swal.close();

                    swal({
                        icon: 'success',
                        title: 'Carrito vaciado',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
}

// Búsqueda de productos (audífonos y repuestos) para venta
        function buscar_productos_audifonos() {
            let termino_busqueda = $('#buscar_producto').val().trim();
            let tipo_producto = $('#tipo_producto_busqueda').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            // Validar que haya al menos 2 caracteres
            if (termino_busqueda.length < 2 && termino_busqueda.length > 0) {
                swal({
                    icon: 'warning',
                    title: 'Búsqueda muy corta',
                    text: 'Por favor ingrese al menos 2 caracteres para buscar.'
                });
                return;
            }

            // Mostrar indicador de carga
            $('#lista_audifonos').html('<div class="text-center py-4"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Buscando productos...</p></div>');

            // URL de la ruta que debes crear en tu backend
            let url = "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    termino: termino_busqueda,
                    tipo_producto: tipo_producto,
                    id_lugar_atencion: id_lugar_atencion
                },
            })
            .done(function(data) {
                console.log('Resultados de búsqueda:', data);
                mostrar_resultados_busqueda_audifonos(data.productos || []);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error en búsqueda:', textStatus, errorThrown);
                $('#lista_audifonos').html(
                    '<div class="alert alert-danger">' +
                    '<i class="feather icon-alert-circle"></i> Error al buscar productos. Por favor intente nuevamente.' +
                    '</div>'
                );
            });
        }

        // Mostrar resultados de búsqueda
        function mostrar_resultados_busqueda_audifonos(productos) {
            let html = '';
            console.log('Productos encontrados:', productos);
            if (productos.length > 0) {
                html += '<div class="alert alert-info mb-3">';
                html += '<i class="feather icon-info"></i> Se encontraron <strong>' + productos.length + '</strong> productos.';
                html += '</div>';
                // se agrega boton de agregar producto nuevo
                html += '<div class="mb-3">';
                html += '    <button type="button" class="btn btn-primary" onclick="abrir_modal_solicitudes()">Solicitar producto nuevo</button>';
                html += '</div>';

                html += '<div class="row">';

                $.each(productos, function(index, producto) {
                    // Construir URL de imagen
                    let imagenUrl = producto.image_path || '';
                    if (imagenUrl && !imagenUrl.startsWith('http')) {
                        imagenUrl = '/' + imagenUrl;
                    }

                    // Card de producto
                    html += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">';
                    html += '    <div class="card h-100 shadow-sm hover-shadow">';
                    html += '        <div class="card-body p-2">';

                    // Imagen del producto
                    html += '            <div class="text-center mb-2">';
                    html += '                <img src="' + (imagenUrl || '/images/no-image.png') + '" ';
                    html += '                     alt="' + (producto.nombre || 'Producto') + '" ';
                    html += '                     class="img-fluid rounded" ';
                    html += '                     style="max-height: 150px; object-fit: contain;" ';
                    html += '                     onerror="this.src=\'/images/no-image.png\'">';
                    html += '            </div>';

                    // Información del producto
                    html += '            <h6 class="mb-1 font-weight-bold text-truncate" title="' + (producto.nombre || 'Sin nombre') + '">';
                    html += '                ' + (producto.nombre || 'Sin nombre');
                    html += '            </h6>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Código:</strong> ' + (producto.codigo_interno || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Marca:</strong> ' + (producto.marca || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Tipo:</strong> ' + (producto.tipo_producto || 'N/A');
                    html += '            </small>';

                    // Stock
                    let stockClass = producto.stock_actual > producto.stock_minimo ? 'text-success' : 'text-danger';
                    html += '            <small class="d-block mb-2 ' + stockClass + '">';
                    html += '                <strong>Stock:</strong> ' + (producto.stock_actual || 0) + ' unidades';
                    html += '            </small>';

                    // Botones de acción
                    html += '            <div class="btn-group btn-group-sm w-100">';
                    html += '                <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_producto_audifono(' + producto.id + ', ' + producto.precio_venta + ')" title="Seleccionar producto">';
                    html += '                    <i class="feather icon-check"></i> Seleccionar';
                    html += '                </button>';
                    html += '                <button type="button" class="btn btn-info btn-sm" onclick="ver_detalle_producto_audifono(' + producto.id + ')" title="Ver detalles">';
                    html += '                    <i class="feather icon-eye"></i>';
                    html += '                </button>';
                    html += '            </div>';

                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                });

                html += '</div>';
            } else {
                html += '<div class="alert alert-warning text-center">';
                html += '    <i class="feather icon-search"></i> ';
                html += '    <strong>No se encontraron productos</strong><br>';
                html += '    <small>Intente con otros términos de búsqueda</small>';
                html += '</div>';
            }

            $('#lista_audifonos').html(html);
        }

    function abrir_modal_solicitudes() {
        $('#modalNuevaSolicitud').modal('show');
    }

    function mostrarBotonVerCarrito() {
    if ($('#btn-ver-carrito').length === 0) {
        let boton = `
            <button id="btn-ver-carrito" class="btn btn-lg"
                    style="position:fixed; bottom:20px; right:20px; z-index:999999; border-radius:50%; width:70px; height:70px; padding:0; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border:none; box-shadow:0 4px 12px rgba(0,0,0,0.15); transition:all 0.3s ease; display:flex; align-items:center; justify-content:center;"
                    onmouseover="this.style.boxShadow='0 6px 20px rgba(0,0,0,0.25)'; this.style.transform='scale(1.1)'"
                    onmouseout="this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'; this.style.transform='scale(1)'"
                    onclick="obtenerCarrito()" title="Ver carrito">
                <i class="feather icon-shopping-cart" style="width:28px; height:28px; color:white;"></i>
                <span id="badge-carrito" class="badge badge-danger"
                      style="position:absolute; top:-8px; right:-8px; min-width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:bold; background:#dc3545; border:2px solid white; z-index:999999 !important;">0</span>
            </button>
        `;
        $('body').append(boton);
        // Actualizar el badge inmediatamente
        actualizarBadgeCarrito();
    }
}

        /**
         * Formatear RUT en el campo de búsqueda
         */
        function formatoRut(input) {
            let valor = input.value.replace(/\./g, '').replace(/-/g, '');

            if (valor.length > 1) {
                let cuerpo = valor.slice(0, -1);
                let digito = valor.slice(-1);

                // Agregar puntos cada 3 dígitos
                cuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                input.value = cuerpo + '-' + digito;
            }
        }
</script>
@endsection
@section('content')
 <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content mt-73">
            <!--Header-->
            <div class="page-header mt-n70">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            <!--<h5 class="m-b-10 font-weight-bold">Distribuidores / Ventas por mayor  </h5>-->
                        </div>
                            <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" title="Escritorio"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                               <a href="{{ route('laboratorio.distribucion_mayor') }}">Distribución</a>
                            </li>
                            <li class="breadcrumb-item active">
                              <a href="#">Ventas por mayor</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>

                           <style>
                                .badge-prestado {
                                        background: #f6ad55;
                                        color: #fff;
                                        font-weight: bold;
                                        padding: 6px 12px;
                                        border-radius: 8px;
                                        position: absolute;
                                        top: 10px;
                                        right: 10px;
                                        z-index: 10;
                                    }
                            </style>
                            <div class="row">
                                <div class="col-12">
                                    <div class="div_form_examen_ocho_par">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <h6 class="text-c-blue f-20 mb-3">Información venta y distribución de audífonos</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="tab-content" id="myTabContent">
                                                    <!--TAB INFORMACIÓN PERSONAL-->
                                                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                                        @if(isset($cliente))
                                                        <div class="card">
                                                            <div class="card-body pb-1">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Motivo de Uso</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Observación General</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                            <div class="pb-1">

                                                                <!-- cliente Seleccionado (oculto inicialmente) -->

                                                                <div class="row d-none" id="card_cliente_seleccionado">
                                                                    <div class="col-12">
                                                                        <div class="card borde-verde mb-3">
                                                                            <div class="card-body py-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-auto pr-0">
                                                                                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center p-2">
                                                                                            <i class="feather icon-check text-white f-20 mr-0"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col mb-3">
                                                                                        <h6 class="mb-0 text-success f-18 font-weight-bold">
                                                                                            cliente Seleccionado
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-2">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                                        <small class="text-muted d-block mb-0">RUT:</small>
                                                                                        <strong id="cliente_sel_rut" class="d-block">-</strong>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                                        <small class="text-muted d-block mb-0">Nombre:</small>
                                                                                        <strong id="cliente_sel_nombre" class="d-block">-</strong>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                                        <small class="text-muted d-block mb-0">Email:</small>
                                                                                        <strong id="cliente_sel_email" class="d-block">-</strong>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                                        <small class="text-muted d-block mb-0">Teléfono:</small>
                                                                                        <strong id="cliente_sel_telefono" class="d-block">-</strong>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-right">
                                                                                        <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_cliente()" title="Cambiar cliente">
                                                                                            <i class="feather icon-refresh-cw"></i> Cambiar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" id="cliente_seleccionado_id" name="cliente_seleccionado_id" value="">
                                                                        <input type="hidden" id="cliente_seleccionado_id_post_venta" name="cliente_seleccionado_id_post_venta" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="alert alert-warning-b mb-3" role="alert" id="mensaje_inicial">
                                                                    <i class="feather icon-alert-triangle mr-2"></i> Para registrar una venta, primero debe asociar un  cliente.
                                                                </div>
                                                                <!-- Buscador de cliente -->
                                                                <div class="card" id="card_busqueda_cliente">
                                                                    <div class="card-header-new-md">
                                                                        <h5>
                                                                            <i class="feather icon-search mr-2 icono-primary"></i>
                                                                            Buscar Cliente
                                                                        </h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <!-- Tipo de búsqueda -->
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="font-weight-bold">Buscar por:</label>
                                                                                <select class="form-control form-control-sm" id="tipo_busqueda_cliente" name="tipo_busqueda_cliente" disabled>
                                                                                    <option value="rut" selected>RUT</option>
                                                                                    <option value="nombre">Nombre</option>
                                                                                    <option value="email">Email</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Campo de búsqueda -->
                                                                            <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                                                                <label class="font-weight-bold">Término de búsqueda:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control form-control-sm" id="termino_busqueda_cliente" oninput="formatoRut(this)" name="termino_busqueda_cliente" placeholder="Ingrese RUT, nombre o email del cliente..." onkeypress="if(event.keyCode==13){buscar_cliente_venta(); return false;}">
                                                                                    <div class="input-group-append">
                                                                                        <button class="btn btn-primary btn-sm" type="button" onclick="buscar_cliente_venta()">
                                                                                            <i class="feather icon-search"></i> Buscar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <small class="form-text text-muted">
                                                                                    <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                                                                </small>
                                                                            </div>

                                                                            <!-- Botón limpiar -->
                                                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <label class="font-weight-bold d-block">&nbsp;</label>
                                                                                <button class="btn btn-outline-secondary btn-xs btn-block" type="button" onclick="limpiar_busqueda_cliente()">
                                                                                    <i class="feather icon-x"></i> Limpiar
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Resultados de búsqueda -->
                                                                        <div class="row mt-3">
                                                                            <div class="col-12">
                                                                                <div id="resultados_busqueda_cliente"></div>
                                                                                <div id="reserva_agregar_cliente_hora" style="display: none;">

                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Nombres</label>
                                                                                                <input type="text" required class="form-control form-control-sm" name="venta_nombres_cliente" id="venta_nombres_cliente">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="venta_apellido_uno" id="venta_apellido_uno">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="venta_apellido_dos" id="venta_apellido_dos">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                                                                <input type="date" class="form-control form-control-sm" name="venta_fecha_nac" id="venta_fecha_nac">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Sexo</label>
                                                                                                <select id="venta_sexo" name="venta_sexo" class="form-control form-control-sm">
                                                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                                                    <option value="F">Femenino</option>
                                                                                                    <option value="M">Masculino</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                                                                <select id="venta_profesion" name="venta_profesion" class="form-control form-control-sm">
                                                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                                                    @if (isset($profesion_oficio))
                                                                                                        @foreach ($profesion_oficio as $prof_ofic)
                                                                                                            <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                                                                <select id="venta_convenio" name="venta_convenio" class="form-control form-control-sm">
                                                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                                                    @if (isset($prevision))
                                                                                                        @foreach ($prevision as $p)
                                                                                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-9 col-md-9">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                                                                <input type="address" class="form-control form-control-sm" name="venta_direccion" id="venta_direccion">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-3 col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                                                                <input type="address" class="form-control form-control-sm" name="venta_numero_dir" id="venta_numero_dir">
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Región</label>
                                                                                                <select id="region_agregar_venta" onchange="buscar_ciudad_venta();" name="region_agregar_venta" class="form-control" required>
                                                                                                    <option value="0">Seleccione Regi&oacute;n</option>
                                                                                                    @if (isset($regiones))
                                                                                                        @foreach ($regiones as $reg)
                                                                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                                                                <select id="ciudad_agregar_venta" name="ciudad_agregar_venta" class="form-control" required>
                                                                                                    <option value="0">Seleccione Ciudad</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                                                                <input type="text" class="form-control form-control-sm" onblur="validar_email_venta()" name="venta_correo" id="venta_correo">
                                                                                                <span id="mensaje_email_venta" style="display:none"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                                                                <input type="tel" class="form-control form-control-sm" name="venta_telefono_uno" id="venta_telefono_uno">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <div class="custom-control custom-switch">
                                                                                                    <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                                                                    <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <div class="custom-control custom-switch">
                                                                                                    <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                                                                    <label class="custom-control-label" for="sms">SMS</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" id="guardar_reserva_cliente" onclick="registrar_cliente_nuevo_venta();" class="btn btn-info">
                                                                                            Registrar cliente y Seleccionar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endif

                                                        <!-- Card busqueda de audifonos -->
                                                        <div class="card px-3 pb-0 pt-2" id="card-busqueda-productos" style="display: none;">
                                                            <div class="row">

                                                                <div class="card-body busqueda_audifono collapse show pt-0" id="busqueda_audifono-1">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-row">
                                                                                    <!-- Tipo de búsqueda -->
                                                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Tipo de Producto</label>
                                                                                        <select class="form-control form-control-sm" id="tipo_producto_busqueda" name="tipo_producto_busqueda">
                                                                                            <option value="">Todos</option>
                                                                                            <option value="1" selected>Audífonos</option>
                                                                                            <option value="2">Repuestos</option>
                                                                                            <option value="3">Pilas</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <!-- Campo de búsqueda -->
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Buscar Producto</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-sm" name="buscar_producto" onkeypress="enter_buscar_productos_audifono(event)" id="buscar_producto" placeholder="Ingrese código, marca, modelo o nombre del producto">
                                                                                            <div class="input-group-append">
                                                                                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_productos_audifonos()">
                                                                                                    <i class="feather icon-search"></i> Buscar
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <small class="form-text text-muted">
                                                                                            Presione Enter o haga clic en Buscar para ver resultados
                                                                                        </small>
                                                                                    </div>
                                                                                    <!-- Botón del Carrito -->
                                                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                        <label class="font-weight-bolder ml-0 mb-0"></label>
                                                                                        <div>
                                                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="obtenerCarrito()" id="btn-abrir-carrito">
                                                                                                <i class="feather icon-shopping-cart"></i> Ver carrito de compras
                                                                                                <span class="badge badge-light ml-1" id="badge-carrito-header" style="display:none;">0</span>
                                                                                            </button>
                                                                                            <small class="form-text text-muted text-center">
                                                                                                <span id="total-carrito-header" style="display:none;">Total: $0.00</span>
                                                                                            </small>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="lista_audifonos"></div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!--Card Información audifono-->
                                                        <div class="card px-3 pb-0 pt-2 d-none">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <button type="button" class="btn btn-info-light-c btn-icon m-0 float-right mb-n2" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                                                        <i class="feather icon-edit"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="card-body info_audifono collapse show pt-0" id="info_audifono-1">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">N° Serie aud. Izq</label>
                                                                                        {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                        {{--  <div> {{ $cliente->apellido_uno }}</div>  --}}
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                        {{--  <div> {{ $cliente->apellido_dos }}
                                                                                        </div>  --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                        <div>
                                                                                            {{--  @if ($cliente->sexo == 'F')
                                                                                                Mujer
                                                                                            @elseif ($cliente->sexo == 'M')
                                                                                                Hombre
                                                                                            @endif  --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                        <div>
                                                                                            {{--  {{ \Carbon\Carbon::parse($cliente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                        <div> Buena</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                                                        {{--  <div> {{ $cliente->rut }} </div>  --}}
                                                                                    </div>

                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                                                        {{--  <div> {{ $cliente->apellido_uno }}</div>  --}}
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                                                        {{--  <div> {{ $cliente->apellido_dos }}
                                                                                        </div>  --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                                                        <div>
                                                                                            {{--  @if ($cliente->sexo == 'F')
                                                                                                Mujer
                                                                                            @elseif ($cliente->sexo == 'M')
                                                                                                Hombre
                                                                                            @endif  --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                                                        <div>
                                                                                            {{--  {{ \Carbon\Carbon::parse($cliente->fecha_nac)->format('d-m-Y') }}  --}}
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                                                        <div> Buena</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--Cierre: audifono-->
                                                                <!--(Editar)Datos audifono-->
                                                                <div class="card-body info_audifono collapse pt-3" id="pinfo_audifono_2">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Marca</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Modelo</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Fecha de entrega</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Satisfacción</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">N° de serie audifono Derecho</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Marca</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Modelo</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Fecha de entrega</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo">Satisfacción</label>
                                                                                    <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                                <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                                <button type="button" onclick="editar_cliente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--Cierre: (Editar)Datos audifono-->
                                                            </div>
                                                            </div>
                                                        <!--Cierre: Card Datos audifono-->


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($cliente))
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <h6 class="tit-gen mb-2">Carga de archivos</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <!-- [ Main Content ] start -->
                                                                <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                                                </div>
                                                                <!-- [ file-upload ] end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
               
        </div>
    </div>

<input type="hidden" name="id_cliente_fc" id="id_cliente_fc" value="">
<input type="hidden" name="id_profesional_fc" id="id_profesional_fc" value="{{ $profesional->id }}">
<input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $laboratorio->id_lugar_atencion }}">

<!--Cierre: Container Completo-->
@include('app.laboratorio.lab_profesional.modal_cont_audifono.calibracion_audifono')
@include('app.laboratorio.lab_profesional.modal_cont_audifono.reparacion_audifono')
@endsection

