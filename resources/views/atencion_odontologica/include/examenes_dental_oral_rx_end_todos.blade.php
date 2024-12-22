@php $counter = 1; @endphp
    @foreach($examenes as $e)
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-row">
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Pieza N°</label>
                        <input class="form-control form-control-sm" type="text" name="end_numero_pieza_{{ $counter }}"id="end_numero_pieza_{{ $counter }}" value="{{ $e->numero_pieza }}">
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                        <select name="end_rx_esp_peri_apical{{ $counter }}" id="end_rx_esp_peri_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_rx_esp_peri_apical','end_div_detalle_rx_esp_peri_apical','end_det_rx_esp_peri_apical',4)">
                            <option @if($e->espacio_periodontal == 0) selected @endif value="0">Seleccione</option>
                            <option @if($e->espacio_periodontal == 1) selected @endif value="1">Normal</option>
                            <option @if($e->espacio_periodontal == 2) selected @endif value="2">Engrosado</option>
                            <option @if($e->espacio_periodontal == 3) selected @endif value="3">Ausente</option>
                            <option @if($e->espacio_periodontal == 4) selected @endif value="4">Otro</option>
                        </select>
                    </div>
                    <div class="form-group"   id="end_div_detalle_rx_esp_peri_apical" style="display:none">
                        <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_det_rx_esp_peri_apical" id="end_det_rx_esp_peri_apical"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                        <select name="end_h_apical{{ $counter }}" id="end_h_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_h_apical','end_div_detalle_h_apical','end_aprec_h_apical',5)">
                            <option @if($e->hueso_alveolal == 0) selected @endif value="0">Seleccione</option>
                            <option @if($e->hueso_alveolal == 1) selected @endif value="1">Normal</option>
                            <option @if($e->hueso_alveolal == 2) selected @endif value="2">Zona apical Difusa</option>
                            <option @if($e->hueso_alveolal == 3) selected @endif value="3">Zona apical Corticalizada</option>
                            <option @if($e->hueso_alveolal == 4) selected @endif value="4">Osteítis Condensante</option>
                            <option @if($e->hueso_alveolal == 5) selected @endif value="5">Otro<i>(describir)</i></option>
                        </select>
                    </div>
                    <div class="form-group"  id="div_detalle_h_apical" style="display:none">
                        <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="end_obs_ex_oral{{ $counter }}" id="end_obs_ex_oral{{ $counter }}">{{ $e->observaciones }}</textarea>
                    </div>
                </div>

            </div>
        </div>
        <!-- Contenedor de Imágenes -->
        <div class="form-row" id="contenedor_piezas_ex_oral">
            @if (!empty($e->decoded_imagenes) && is_array($e->decoded_imagenes))
                @foreach ($e->decoded_imagenes as $imagen)
                    @if (is_array($imagen) && isset($imagen['paths_imagenes']) && is_array($imagen['paths_imagenes']))

                        @foreach ($imagen['paths_imagenes'] as $path)
                        <div>
                            <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path }}')">
                                <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}"  alt="Imagen del examen"  class="img-fluid mx-2 imagen_rx">
                            </a>

                            <button type="button" class="btn btn-outline-danger btn-sm my-2" onclick="eliminar_rx_end({{ $imagen['id']}})"><i class="fas fa-trash"></i></button>
                        </div>

                        @endforeach
                    @else
                        <p>Formato de imagen no válido.</p>
                    @endif
                @endforeach
            @else
                <p>No hay imágenes disponibles para este examen.</p>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_rx_end({{ $e->id }})">X</button>
            </div>
        </div>

    </div>
    @php $counter++; @endphp
    @endforeach


