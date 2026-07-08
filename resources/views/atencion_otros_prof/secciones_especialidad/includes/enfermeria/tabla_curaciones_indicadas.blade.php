{{--
    Tabla de curaciones indicadas por médico
    Esta tabla muestra las curaciones pendientes que fueron indicadas por el médico
    y que la enfermera debe realizar.

    Variables requeridas:
    - $curaciones: Colección de curaciones indicadas
    - $enfermera: Boolean indicando si es enfermera (para habilitar/deshabilitar acciones)
--}}

<div class="row mb-3">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h6 class="t-aten mb-2">
            <i class="feather icon-clipboard text-primary"></i>
            Curaciones indicadas por médico
        </h6>
        <div class="table-responsive">
            <table id="tabla_curaciones_servicio" class="display table table-striped table-sm table-hover dt-responsive nowrap" style="width:100%">
                <thead class="thead-light">
                    <tr>
                        <th class="align-middle text-center" style="width:15%">Fecha y Hora</th>
                        <th class="align-middle text-center" style="width:20%">Procedimiento</th>
                        <th class="align-middle text-center" style="width:15%">Vigilar</th>
                        <th class="align-middle text-center" style="width:15%">Estado</th>
                        <th class="align-middle text-center" style="width:15%">Materiales</th>
                        <th class="align-middle text-center" style="width:20%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($curaciones) && count($curaciones) > 0)
                        @foreach($curaciones as $c)
                            <tr>
                                <td class="align-middle">
                                    <small class="d-block"><strong>{{ $c->fecha ?? 'N/A' }}</strong> {{ $c->hora ?? '' }}</small>
                                    <small class="text-muted">{{ $c->responsable ?? '' }}</small>
                                </td>
                                <td class="align-middle">
                                    @if(isset($c->datos_curacion) && $c->datos_curacion)
                                        {{ $c->datos_curacion->nombre_procedimiento ?? 'Sin procedimiento' }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           id="vigilancia_curacion_servicio{{ $c->id }}"
                                           value="{{ $c->otros }}"
                                           placeholder="Observar..."
                                           @if(!isset($enfermera) || !$enfermera) disabled @endif />
                                </td>
                                <td class="align-middle text-center">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox"
                                               id="curaciones_servicio_listo{{ $c->id }}"
                                               onchange="cambiarTextoLabelCuracion({{ $c->id }})"
                                               @if(!isset($enfermera) || !$enfermera) disabled @endif
                                               @if($c->estado == 1) checked @endif>
                                        <label for="curaciones_servicio_listo{{ $c->id }}" class="cr"></label>
                                    </div>
                                    <br>
                                    <label for="" id="label_curacion_{{ $c->id }}" class="mb-0">
                                        @if($c->estado == 1)
                                            <span class="badge badge-success">Listo</span>
                                        @else
                                            <span class="badge badge-warning">Pendiente</span>
                                        @endif
                                    </label>
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#modalAgregarInsumos_{{ $c->id }}"
                                            @if(!isset($enfermera) || !$enfermera) disabled @endif
                                            onclick="cargarInsumosCuracion({{ $c->id }})">
                                        <i class="feather icon-package"></i> Insumos
                                    </button>
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button"
                                            class="btn btn-outline-warning btn-sm"
                                            onclick="agregarObservacionesCuracion({{ $c->id }},'{{ $c->datos_curacion->nombre_procedimiento ?? '' }}','{{ $c->otros ?? '' }}')"
                                            @if(!isset($enfermera) || !$enfermera) disabled @endif
                                            title="Agregar observaciones">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="eliminarCuracion({{ $c->id }})"
                                            @if(!isset($enfermera) || !$enfermera) disabled @endif
                                            title="Eliminar curación">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                <i class="feather icon-info"></i> No hay curaciones indicadas por el médico
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modales para insumos de cada curación --}}
@if(isset($curaciones) && count($curaciones) > 0)
    @foreach($curaciones as $c)
        <!-- Modal Agregar Insumos para Curación {{ $c->id }} -->
        <div class="modal fade" id="modalAgregarInsumos_{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="modalAgregarInsumosLabel_{{ $c->id }}" aria-hidden="true"
            data-insumos='@json(!empty($c->insumos_utilizados) ? (json_decode($c->insumos_utilizados, true) ?: []) : [])'>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalAgregarInsumosLabel_{{ $c->id }}">
                            <i class="feather icon-package"></i>
                            Insumos para: {{ $c->datos_curacion->nombre_procedimiento ?? 'Curación' }}
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="contenedor_insumos_curacion_{{ $c->id }}">
                            <div class="text-center py-3">
                                <i class="fas fa-spinner fa-spin"></i> Cargando insumos...
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="guardarInsumosCuracion({{ $c->id }})">
                            <i class="feather icon-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
<script>
    /**
     * Carga el formulario de insumos para una curación específica
     */
    function cargarInsumosCuracion(curacionId) {
        let contenedorId = `contenedor_insumos_curacion_${curacionId}`;
        let modalId = `#modalAgregarInsumos_${curacionId}`;
        console.log(`Cargando insumos para curación ID: ${curacionId}`);

        if (!document.getElementById(contenedorId)) {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No se encontró el modal de insumos para esta curación'
            });
            return;
        }

        // Mover el modal al body para evitar que quede atrapado dentro del form/tabs
        // (esto soluciona el problema de que aparece el fondo oscuro pero no el modal)
        $(modalId).appendTo('body');

        // Abrir el modal de forma explícita para evitar depender solo del data-target
        $(modalId).modal('show');

        // Mostrar spinner mientras carga
        document.getElementById(contenedorId).innerHTML = `
            <div class="text-center py-3">
                <i class="fas fa-spinner fa-spin"></i> Cargando insumos...
            </div>
        `;

        // Crear el formulario con tabla
        let formulario = `
            <div class="form-group">
                <label class="font-weight-bold">Seleccionar Insumos</label>
                <table id="tabla_insumos_${curacionId}" class="table table-sm table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Insumo / Material</th>
                            <th class="text-center" style="width:100px">Cantidad</th>
                            <th>Observaciones</th>
                            <th class="text-center" style="width:40px">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_insumos_${curacionId}">
                        <tr>
                            <td colspan="4" class="text-center text-muted py-2">
                                <small>Sin insumos agregados. Haga clic en "+" para agregar.</small>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-sm btn-info" onclick="agregarFilaInsumo(${curacionId})">
                    <i class="feather icon-plus"></i> Agregar Insumo
                </button>
            </div>
        `;

        document.getElementById(contenedorId).innerHTML = formulario;

        // Precargar insumos previamente guardados (si existen)
        let modalEl = document.getElementById(`modalAgregarInsumos_${curacionId}`);
        if (modalEl && modalEl.dataset.insumos) {
            let insumosGuardados = [];
            try {
                insumosGuardados = JSON.parse(modalEl.dataset.insumos);
            } catch (e) {
                insumosGuardados = [];
            }
            if (Array.isArray(insumosGuardados) && insumosGuardados.length > 0) {
                insumosGuardados.forEach(function (ins) {
                    agregarFilaInsumo(curacionId, ins);
                });
            }
        }
    }

    /**
     * Agrega una nueva fila al formulario de insumos
     * @param {number} curacionId - ID de la curación
     * @param {object} datos - (opcional) datos del insumo para precargar la fila
     */
    function agregarFilaInsumo(curacionId, datos = {}) {
        let tbody = document.getElementById(`tbody_insumos_${curacionId}`);

        // Limpiar el tbody si tiene el mensaje de vacío
        if (tbody.innerHTML.includes('Sin insumos agregados')) {
            tbody.innerHTML = '';
        }

        let numFila = tbody.querySelectorAll('tr').length + 1;
        let fila = document.createElement('tr');
        fila.id = `fila_insumo_${curacionId}_${numFila}`;

        fila.innerHTML = `
            <td>
                <input type="text" class="form-control form-control-sm insumo_nombre_${curacionId}"
                       placeholder="Ej: Gasa estéril, Alcohol" />
            </td>
            <td class="text-center">
                <input type="number" class="form-control form-control-sm insumo_cantidad_${curacionId}"
                       placeholder="Cant." min="1" value="1" style="width:100%;" />
            </td>
            <td>
                <input type="text" class="form-control form-control-sm insumo_obs_${curacionId}"
                       placeholder="Observaciones..." />
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger"
                        onclick="this.parentElement.parentElement.remove()">
                    <i class="feather icon-trash-2"></i>
                </button>
            </td>
        `;

        tbody.appendChild(fila);

        // Precargar valores cuando se pasan datos guardados (asignación segura por .value)
        if (datos && datos.nombre !== undefined) {
            fila.querySelector(`.insumo_nombre_${curacionId}`).value = datos.nombre || '';
            fila.querySelector(`.insumo_cantidad_${curacionId}`).value = datos.cantidad || 1;
            fila.querySelector(`.insumo_obs_${curacionId}`).value = datos.observaciones || '';
        }
    }

    /**
     * Guarda los insumos de la curación
     */
    function guardarInsumosCuracion(curacionId) {
        let tbody = document.getElementById(`tbody_insumos_${curacionId}`);

        if (!tbody) {
            swal({
                icon: 'error',
                title: 'Error',
                text: 'No se encontró el formulario de insumos'
            });
            return;
        }

        let filas = tbody.querySelectorAll('tr');
        let insumos = [];

        filas.forEach((fila) => {
            let nombre = fila.querySelector(`.insumo_nombre_${curacionId}`);
            let cantidad = fila.querySelector(`.insumo_cantidad_${curacionId}`);
            let obs = fila.querySelector(`.insumo_obs_${curacionId}`);

            if (nombre && nombre.value.trim() !== '') {
                insumos.push({
                    nombre: nombre.value,
                    cantidad: cantidad ? cantidad.value : 1,
                    observaciones: obs ? obs.value : ''
                });
            }
        });

        // Enviar datos al servidor
        let data = {
            id_curacion: curacionId,
            insumos: insumos,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: '{{ route("enfermeria.guardar_insumos_curacion") }}',
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function(resp) {
                if (resp.exito) {
                    swal({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Insumos guardados correctamente',
                        timer: 1500
                    });
                    // Sincronizar el data-insumos para que al reabrir muestre lo recién guardado
                    let modalEl = document.getElementById(`modalAgregarInsumos_${curacionId}`);
                    if (modalEl) {
                        modalEl.dataset.insumos = JSON.stringify(insumos);
                    }
                    $(`#modalAgregarInsumos_${curacionId}`).modal('hide');
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: resp.mensaje || 'Error al guardar insumos'
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en la solicitud al servidor'
                });
            }
        });
    }

    /**
     * Cambia el texto del label de estado de curación
     */
    function cambiarTextoLabelCuracion(curacionId) {
        let checkbox = document.getElementById(`curaciones_servicio_listo${curacionId}`);
        let label = document.getElementById(`label_curacion_${curacionId}`);

        if (checkbox && label) {
            if (checkbox.checked) {
                label.innerHTML = '<span class="badge badge-success">Listo</span>';
            } else {
                label.innerHTML = '<span class="badge badge-warning">Pendiente</span>';
            }

            // Guardar el cambio en el servidor
            guardarEstadoCuracion(curacionId, checkbox.checked ? 1 : 0);
        }
    }

    /**
     * Guarda el estado de la curación en la base de datos
     */
    function guardarEstadoCuracion(curacionId, estado) {
        $.ajax({
            url: '{{ route("enfermeria.actualizar_estado_curacion") }}',
            type: 'POST',
            data: {
                id_curacion: curacionId,
                estado: estado,
                _token: CSRF_TOKEN
            },
            success: function(resp) {
                if (!resp.exito) {
                    swal({
                        icon: 'warning',
                        title: 'Aviso',
                        text: resp.mensaje || 'No se pudo guardar el cambio'
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    /**
     * Abre un modal para agregar observaciones a la curación
     */
    function agregarObservacionesCuracion(curacionId, procedimiento, otros) {
        let contenidoModal = `
            <div class="form-group">
                <label class="font-weight-bold">Procedimiento</label>
                <input type="text" class="form-control form-control-sm" value="${procedimiento}" disabled />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Observaciones</label>
                <textarea class="form-control form-control-sm" id="obs_curacion_${curacionId}"
                          rows="4" placeholder="Escriba las observaciones aquí...">${otros || ''}</textarea>
            </div>
        `;

        swal({
            title: 'Observaciones de la Curación',
            content: {
                element: 'div',
                attributes: {
                    innerHTML: contenidoModal
                }
            },
            buttons: {
                cancel: 'Cancelar',
                confirm: {
                    text: 'Guardar',
                    value: true
                }
            }
        }).then(function(value) {
            if (value) {
                let obs = document.getElementById(`obs_curacion_${curacionId}`).value;
                guardarObservacionesCuracion(curacionId, obs);
            }
        });
    }

    /**
     * Guarda las observaciones de la curación
     */
    function guardarObservacionesCuracion(curacionId, observaciones) {
        $.ajax({
            url: '{{ route("enfermeria.actualizar_observaciones_curacion") }}',
            type: 'POST',
            data: {
                id_curacion: curacionId,
                otros: observaciones,
                _token: CSRF_TOKEN
            },
            success: function(resp) {
                if (resp.exito) {
                    swal({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Observaciones guardadas correctamente',
                        timer: 1500
                    });
                } else {
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: resp.mensaje || 'Error al guardar observaciones'
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en la solicitud al servidor'
                });
            }
        });
    }

    /**
     * Elimina una curación
     */
    function eliminarCuracion(curacionId) {
        swal({
            title: '¿Está seguro?',
            text: '¿Desea eliminar esta curación? Esta acción no se puede deshacer.',
            icon: 'warning',
            buttons: ['Cancelar', 'Eliminar'],
            dangerMode: true
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '{{ route("enfermeria.eliminar_curacion") }}',
                    type: 'POST',
                    data: {
                        id_curacion: curacionId,
                        _token: CSRF_TOKEN
                    },
                    success: function(resp) {
                        if (resp.exito) {
                            swal({
                                icon: 'success',
                                title: 'Eliminado',
                                text: 'La curación ha sido eliminada',
                                timer: 1500
                            }).then(function() {
                                // Recargar la tabla
                                location.reload();
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: resp.mensaje || 'Error al eliminar'
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error en la solicitud al servidor'
                        });
                    }
                });
            }
        });
    }
</script>
