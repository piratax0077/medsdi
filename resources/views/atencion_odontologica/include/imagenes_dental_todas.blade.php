<style>
    .odonto-imagenes-list .odonto-imagen-card {
        border: 1px solid #dfe7f3;
        border-radius: 14px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        box-shadow: 0 8px 24px rgba(20, 49, 93, 0.08);
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .odonto-imagenes-list .odonto-panel {
        border: 1px solid #e5ecf7;
        border-radius: 12px;
        background: #ffffff;
        height: 100%;
    }

    .odonto-imagenes-list .odonto-panel-header {
        background: #eef4ff;
        border-bottom: 1px solid #d8e4fb;
        color: #1f4f97;
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        margin: 0;
        padding: 0.75rem 1rem;
        text-align: center;
    }

    .odonto-imagenes-list .odonto-grid {
        display: grid;
        gap: 0.75rem;
        grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
    }

    .odonto-imagenes-list .odonto-thumb {
        border: 1px solid #e7edf8;
        border-radius: 10px;
        overflow: hidden;
        padding: 0.5rem;
        position: relative;
    }

    .odonto-imagenes-list .odonto-thumb img {
        border-radius: 8px;
        cursor: pointer;
        display: block;
        height: 140px;
        object-fit: cover;
        width: 100%;
    }

    .odonto-imagenes-list .odonto-thumb-meta {
        color: #5b6f8f;
        font-size: 0.78rem;
        margin-top: 0.45rem;
        min-height: 1rem;
    }

    .odonto-imagenes-list .odonto-thumb-actions {
        margin-top: 0.45rem;
    }

    .odonto-imagenes-list .odonto-empty {
        background: #f6f9ff;
        border: 1px dashed #cfdcf2;
        border-radius: 10px;
        color: #657896;
        font-size: 0.86rem;
        margin-bottom: 0;
        padding: 0.9rem;
        text-align: center;
    }

    .odonto-imagenes-list .odonto-summary {
        background: #f9fbff;
        border: 1px solid #e5edf9;
        border-radius: 12px;
        height: 100%;
        padding: 0.9rem 1rem;
    }

    .odonto-imagenes-list .odonto-summary-label {
        color: #314866;
        display: block;
        font-size: 0.78rem;
        font-weight: 700;
        margin-bottom: 0.35rem;
        text-transform: uppercase;
    }

    .odonto-imagenes-list .odonto-remove-card {
        min-width: 44px;
    }
</style>

<div class="odonto-imagenes-list">
    @php $count = 1; @endphp
    @forelse ($imagenes as $imagen)
        <div class="odonto-imagen-card">
            <div class="card-body p-3 p-md-4">
                <div class="form-row">
                    <div class="col-sm-12 col-lg-4 mb-3 mb-lg-0">
                        <div class="odonto-panel">
                            <h6 class="odonto-panel-header">Imágenes Pre</h6>
                            <div class="p-3">
                                @php
                                    $imagenes_pre = collect($imagen->paths_imagenes ?? [])->filter(function ($item) {
                                        return isset($item['momento']) && $item['momento'] === 'Pre';
                                    });
                                @endphp

                                @if ($imagenes_pre->isNotEmpty())
                                    <div class="odonto-grid">
                                        @foreach ($imagenes_pre as $path)
                                            <div class="odonto-thumb">
                                                <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                    <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}" alt="Imagen pre del examen">
                                                </a>
                                                <div class="odonto-thumb-meta">
                                                    @if (!empty($path['id_image_pre']))
                                                        ID Pre: {{ $path['id_image_pre'] }}
                                                    @endif
                                                </div>
                                                <div class="odonto-thumb-actions">
                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="odonto-empty">No hay imágenes Pre disponibles para este examen.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4 mb-3 mb-lg-0">
                        <div class="odonto-panel">
                            <h6 class="odonto-panel-header">Imágenes Post</h6>
                            <div class="p-3">
                                @php
                                    $imagenes_post = collect($imagen->paths_imagenes ?? [])->filter(function ($item) {
                                        return isset($item['momento']) && $item['momento'] === 'Post';
                                    });
                                @endphp

                                @if ($imagenes_post->isNotEmpty())
                                    <div class="odonto-grid">
                                        @foreach ($imagenes_post as $path)
                                            <div class="odonto-thumb">
                                                <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                    <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}" alt="Imagen post del examen">
                                                </a>
                                                <div class="odonto-thumb-meta">
                                                    @if (!empty($path['id_image_post']))
                                                        ID Post: {{ $path['id_image_post'] }}
                                                    @endif
                                                </div>
                                                <div class="odonto-thumb-actions">
                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="odonto-empty">No hay imágenes Post disponibles para este examen.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4">
                        <div class="odonto-summary">
                            <input type="hidden" name="biopsia_odont{{ $count }}" id="biopsia_odont{{ $count }}" value="">
                            <div class="mb-2">
                                <span class="odonto-summary-label">Biopsia</span>
                                <span class="badge @if($imagen->biopsia == 1) badge-success @else badge-secondary @endif">
                                    @if($imagen->biopsia == 1) Sí @else No @endif
                                </span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="odonto-summary-label" for="od_biop_zona{{ $count }}">Zona y Motivo</label>
                                <textarea class="form-control form-control-sm" rows="2" name="od_biop_zona{{ $count }}" id="od_biop_zona{{ $count }}" disabled>{{ $imagen->zona_y_motivo }}</textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label class="odonto-summary-label" for="obs_result_biopsia{{ $count }}">Observaciones / Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="3" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-0 pt-0 pb-3 px-3 px-md-4 text-right">
                <button type="button" class="btn btn-danger odonto-remove-card" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})" title="Eliminar bloque completo">
                    <i class="feather icon-trash-2"></i>
                </button>
            </div>
        </div>
        @php $count++; @endphp
    @empty
        <div class="alert alert-light border text-muted mb-2">
            No hay registros de imágenes para mostrar.
        </div>
    @endforelse
</div>
