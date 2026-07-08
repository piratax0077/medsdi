@php $counter = 20; @endphp
@foreach ($examenes as $examen)

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <!-- Contenedor de Imágenes -->
                    <div class="form-row" id="contenedor_piezas_ex_oral">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-informacion">
                                <div class="card-top">
                                    <h6 class="text-c-blue">Imagen</h6>
                                </div>
                                <div class="card-body">
                                    @if (!empty($examen->decoded_imagenes) && is_array($examen->decoded_imagenes))
                                            <div class="imagen-gallery">
                                                @foreach ($examen->decoded_imagenes as $imagen)
                                                    @if (is_array($imagen) && isset($imagen['paths_imagenes']) && is_array($imagen['paths_imagenes']))
                                                        @foreach ($imagen['paths_imagenes'] as $path)
                                                        <div class="imagen-card">
                                                            <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path }}')">
                                                                <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}" alt="Imagen del examen" title="Click para amplificar">
                                                            </a>
                                                            <button type="button" class="btn btn-delete" onclick="eliminar_rx({{ $imagen['id']}})" title="Eliminar imagen">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                        <div class="no-imagenes">
                                                            <i class="fas fa-exclamation-triangle mb-2"></i>
                                                            <p class="mb-0">Formato de imagen no válido</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="no-imagenes">
                                                <i class="fas fa-images mb-2" style="font-size: 24px;"></i>
                                                <p class="mb-0">No hay imágenes disponibles para este examen</p>
                                                <small class="text-muted">Las imágenes aparecerán aquí una vez que sean subidas</small>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Pieza N°</label>
                                <select class="form-control form-control-sm select2" name="rx_numero_pieza{{ $counter }}[]" id="rx_numero_pieza{{ $counter }}" multiple>
                                    @foreach (['1.1','1.2','1.3','1.4','1.5','1.6','1.7','1.8','2.1','2.2','2.3','2.4','2.5','2.6','2.7','2.8','3.1','3.2','3.3','3.4','3.5','3.6','3.7','3.8','4.1','4.2','4.3','4.4','4.5','4.6','4.7','4.8'] as $pieza)
                                        <option value="{{ $pieza }}"
                                            @if(is_array($examen->numero_piezas) && in_array($pieza, $examen->numero_piezas)) selected @endif>
                                            {{ $pieza }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                <select name="rx_esp_peri_apical{{ $counter }}" id="rx_esp_peri_apical{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rx_esp_peri_apical{{ $counter }}','div_detalle_rx_esp_peri_apical{{ $counter }}','det_rx_esp_peri_apical{{ $counter }}',4)">
                                    <option value="0">Seleccione</option>
                                    <option @if($examen->espacio_periodontal == 1) selected  @endif value="1">Normal</option>
                                    <option @if($examen->espacio_periodontal == 2) selected  @endif value="2">Engrosado</option>
                                    <option @if($examen->espacio_periodontal == 3) selected  @endif value="3">Ausente</option>
                                    <option @if($examen->espacio_periodontal == 4) selected  @endif value="4">Otro</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_detalle_rx_esp_peri_apical{{ $counter }}" style="display:none">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical (Describir)</label>
                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical{{ $counter }}" id="det_rx_esp_peri_apical{{ $counter }}"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                <select name="h_apical{{ $counter }}" id="h_apical{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('h_apical{{ $counter }}','div_detalle_h_apical{{ $counter }}','aprec_h_apical{{ $counter }}',5)">
                                    <option value="0">Seleccione</option>
                                    <option @if($examen->hueso_alveolal == 1) selected  @endif value="1">Normal</option>
                                    <option @if($examen->hueso_alveolal == 2) selected  @endif value="2">Zona apical Difusa</option>
                                    <option @if($examen->hueso_alveolal == 3) selected  @endif value="3">Zona apical Corticalizada</option>
                                    <option @if($examen->hueso_alveolal == 4) selected  @endif value="4">Osteítis Condensante</option>
                                    <option @if($examen->hueso_alveolal == 5) selected  @endif value="5">Otro (Describir)</option>
                                </select>
                            </div>
                            <div class="form-group"  id="div_detalle_h_apical{{ $counter }}" style="display:none">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical (Describir)</label>
                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical{{ $counter }}" id="aprec_h_apical{{ $counter }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="" class="floating-label-activo-sm">Informe del radiólogo</label>
                    <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $examen->informe }}">
                </div>
                <div class="col-md-6">
                    <label for="" class="floating-label-activo-sm">Observaciones del radiólogo</label>
                    <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $examen->observaciones }}">
                </div>
            </div>


        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-icon btn-warning" onclick="editar_pieza_dental_rx({{ $examen->id }})"><i class="feather icon-edit"></i></button>
            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_rx({{ $examen->id }})"><i class="feather icon-x"></i></button>
        </div>
    </div>
</div>
@php $counter++; @endphp
@endforeach


<script>
$(document).ready(function() {
    // Inicializa todos los select con clase .select2
    $('.select2').select2({
        width: '100%',
        placeholder: "Seleccione piezas",
        allowClear: true
    });
});
</script>