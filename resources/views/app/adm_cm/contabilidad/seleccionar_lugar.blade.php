<!-- Modal de Selección de Lugar de Atención -->
<div class="modal fade" id="modalSeleccionarLugar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title">
                    <i class="feather icon-map-pin mr-2"></i>
                    Seleccione Lugar de Atención
                </h5>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-info mb-4">
                    <i class="feather icon-info mr-2"></i>
                    Tiene acceso a múltiples lugares de atención. Seleccione el que desea gestionar.
                </div>

                @if(isset($contador))
                <div class="contador-info mb-4 p-3 bg-light rounded">
                    <h6 class="mb-2">
                        <i class="feather icon-user mr-2"></i>
                        {{ $contador->nombres }} {{ $contador->apellido_uno }} {{ $contador->apellido_dos }}
                    </h6>
                    <small class="text-muted d-block">
                        <strong>RUT:</strong> {{ $contador->rut }} |
                        <strong>Email:</strong> {{ $contador->email }}
                    </small>
                </div>
                @endif

                <h6 class="mb-3">Lugares de Atención Disponibles:</h6>

                <div class="lugares-grid">
                    @if(isset($lugares_atencion))
                        @foreach($lugares_atencion as $lugar)
                            <a href="{{ route('contabilidad.cargar_lugar', $lugar->id_lugar_atencion) }}"
                               class="lugar-item card mb-3 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <div class="lugar-icon mr-3">
                                        <i class="feather icon-map-pin" style="font-size: 24px; color: #43b9ce;"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 font-weight-bold">
                                            {{ $lugar->LugarAtencion->nombre ?? 'Lugar de Atención #' . $lugar->id_lugar_atencion }}
                                        </h6>
                                        @if($lugar->LugarAtencion && $lugar->LugarAtencion->direccion)
                                            <small class="text-muted d-block">
                                                <i class="feather icon-navigation mr-1"></i>
                                                {{ $lugar->LugarAtencion->direccion->direccion ?? 'Dirección no disponible' }} {{ $lugar->LugarAtencion->direccion->numero_dir }}
                                            </small>
                                        @endif
                                        @if($lugar->id_institucion)
                                            <small class="text-muted d-block">
                                                <i class="feather icon-building mr-1"></i>
                                                Institución ID: {{ $lugar->id_institucion }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="lugar-arrow">
                                        <i class="feather icon-chevron-right" style="font-size: 20px; color: #6c757d;"></i>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #43b9ce 0%, #2d5f8d 100%);
    }

    .lugar-item {
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border: 2px solid #e9ecef;
        cursor: pointer;
    }

    .lugar-item:hover {
        border-color: #43b9ce;
        box-shadow: 0 5px 15px rgba(67, 185, 206, 0.3) !important;
        transform: translateY(-2px);
        text-decoration: none;
        color: inherit;
    }

    .lugares-grid {
        max-height: 400px;
        overflow-y: auto;
    }

    .lugares-grid::-webkit-scrollbar {
        width: 8px;
    }

    .lugares-grid::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .lugares-grid::-webkit-scrollbar-thumb {
        background: #43b9ce;
        border-radius: 10px;
    }
</style>

@if(isset($mostrar_modal) && $mostrar_modal)
<script>
    // Esperar a que el DOM esté completamente cargado
    document.addEventListener('DOMContentLoaded', function() {
        // Usar Bootstrap 5 API nativa (sin jQuery)
        var modalElement = document.getElementById('modalSeleccionarLugar');
        if (modalElement) {
            var modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    });
</script>
@endif

