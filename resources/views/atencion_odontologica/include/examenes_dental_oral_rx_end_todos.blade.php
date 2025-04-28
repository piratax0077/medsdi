@php $counter = 100; @endphp
@foreach ($examenes as $e)
    <div id="pieza_dentalrx{{ $counter }}" class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-row" id="contenedor_piezas_ex_oral_end">
                        <div class="col-sm-12 col-md-12">
                            {{-- <div class="card">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <h6 style="text-align: center;color:blue;bold">Subir imagen radiológica</h6>
                                </div>
                            </div>
                            <div class="card-body-aten-a">
                                <div class="dropzone" id="mis-imagenes-imagenes-rx-dental_end_{{ $counter }}" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                        </div> --}}

                            <!-- Vista previa de imágenes existentes -->
                            <div class="form-row mt-2">
                                @if (!empty($e->decoded_imagenes))
                                    @foreach ($e->decoded_imagenes as $imagen)
                                        @foreach ($imagen['paths_imagenes'] ?? [] as $path)
                                            <div>
                                                <a href="javascript:void(0)"
                                                    onclick="amplificar_imagen('{{ $path }}')">
                                                    <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}"
                                                        alt="Imagen del examen" class="img-fluid mx-2 imagen_rx">
                                                </a>
                                                <button type="button" class="btn btn-outline-danger btn-sm my-2"
                                                    onclick="eliminar_rx_end({{ $imagen['id'] }})"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    <p>No hay imágenes disponibles para este examen.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Piezas N°</label>
                                <select class="form-control form-control-sm select2"
                                    name="end_numero_pieza_{{ $counter }}[]"
                                    id="end_numero_pieza_{{ $counter }}" multiple>
                                    @foreach ([11, 12, 13, 14, 15, 16, 17, 18, 21, 22, 23, 24, 25, 26, 27, 28] as $pieza)
                                        <option value="{{ $pieza }}"
                                            {{ isset($e->numero_piezas) && in_array($pieza, (array) $e->numero_piezas) ? 'selected' : '' }}>
                                            {{ $pieza }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                <select name="end_rx_esp_peri_apical{{ $counter }}"
                                    id="end_rx_esp_peri_apical{{ $counter }}" class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('end_rx_esp_peri_apical','end_div_detalle_rx_esp_peri_apical_{{ $counter }}','end_det_rx_esp_peri_apical_{{ $counter }}',4)">
                                    <option value="0" @if ($e->espacio_periodontal == 0) selected @endif>Seleccione
                                    </option>
                                    <option value="1" @if ($e->espacio_periodontal == 1) selected @endif>Normal
                                    </option>
                                    <option value="2" @if ($e->espacio_periodontal == 2) selected @endif>Engrosado
                                    </option>
                                    <option value="3" @if ($e->espacio_periodontal == 3) selected @endif>Ausente
                                    </option>
                                    <option value="4" @if ($e->espacio_periodontal == 4) selected @endif>Otro
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" id="end_div_detalle_rx_esp_peri_apical_{{ $counter }}"
                                style="display:none">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical
                                    <i>(describir)</i></label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                    name="end_det_rx_esp_peri_apical_{{ $counter }}" id="end_det_rx_esp_peri_apical_{{ $counter }}">{{ $e->detalle_espacio ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                <select name="end_h_apical{{ $counter }}" id="end_h_apical{{ $counter }}"
                                    class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('end_h_apical','end_div_detalle_h_apical_{{ $counter }}','aprec_h_apical_{{ $counter }}',5)">
                                    <option value="0" @if ($e->hueso_alveolal == 0) selected @endif>Seleccione
                                    </option>
                                    <option value="1" @if ($e->hueso_alveolal == 1) selected @endif>Normal
                                    </option>
                                    <option value="2" @if ($e->hueso_alveolal == 2) selected @endif>Zona apical
                                        Difusa</option>
                                    <option value="3" @if ($e->hueso_alveolal == 3) selected @endif>Zona apical
                                        Corticalizada</option>
                                    <option value="4" @if ($e->hueso_alveolal == 4) selected @endif>Osteítis
                                        Condensante</option>
                                    <option value="5" @if ($e->hueso_alveolal == 5) selected @endif>Otro
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" id="end_div_detalle_h_apical_{{ $counter }}"
                                style="display:none">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical <i>(describir)</i></label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                    name="aprec_h_apical_{{ $counter }}" id="aprec_h_apical_{{ $counter }}">{{ $e->detalle_hueso ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Informe del radiólogo</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                            name="inf_rad{{ $counter }}" id="inf_rad{{ $counter }}">{{ $e->informe_radiologo ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                            name="end_obs_ex_oral{{ $counter }}" id="end_obs_ex_oral{{ $counter }}">{{ $e->observaciones ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-icon btn-danger-light-c"
            onclick="eliminar_pieza_dental_rx_end({{ $e->id }})"><i class="fas fa-trash"></i></button>
    </div>
    @php $counter++; @endphp
@endforeach

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
