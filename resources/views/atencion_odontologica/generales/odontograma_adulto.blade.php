@php
    use Illuminate\Support\Str;

    /**
     * Normaliza textos clínicos para que las comparaciones funcionen igual
     * con mayúsculas, minúsculas y acentos.
     */
    $normalizarTextoOdontograma = static function ($valor) {
        return Str::lower(Str::ascii(trim((string) $valor)));
    };

    /**
     * Resuelve UNA condición visual desde un registro del historial.
     *
     * Se usa diagnostico + tratamiento porque el historial de MedSDI devuelve:
     * - diagnostico: descripción de tratamientos_dental
     * - tratamiento/descripcion: prestación registrada en odontogramas_pacientes
     *
     * Si el registro no representa una condición gráfica conocida devuelve null
     * y se conserva el último estado clínico válido de la pieza.
     */
    $resolverEstadoVisualOdontograma = static function ($registro) use ($normalizarTextoOdontograma) {
        $estadoRegistro = (int) data_get($registro, 'estado', 0);

        // Un tratamiento cancelado no debe modificar la imagen clínica vigente.
        if ($estadoRegistro === 3) {
            return null;
        }

        $tratamiento = $normalizarTextoOdontograma(
            data_get($registro, 'tratamiento', data_get($registro, 'descripcion', ''))
        );
        $diagnostico = $normalizarTextoOdontograma(
            data_get($registro, 'diagnostico', data_get($registro, 'diagnostico_descripcion', ''))
        );

        $texto = trim($diagnostico . ' ' . $tratamiento);

        // Estados específicos primero para no confundirlos con términos genéricos.
        if (Str::contains($texto, ['implante', 'implantologia'])) {
            // Conserva el comportamiento histórico de MedSDI:
            // implante pendiente (estado 0) se representa como pieza ausente.
            return $estadoRegistro === 0 ? 'ausente' : 'implante';
        }

        if (Str::contains($texto, ['pulpectomia'])) {
            return 'pulpectomia';
        }

        if (Str::contains($texto, ['pulpotomia'])) {
            return 'pulpotomia';
        }

        if (Str::contains($texto, [
            'endodoncia',
            'tratamiento de conducto',
            'tratamiento conducto',
            'conducto radicular',
        ])) {
            return 'endodoncia';
        }

        if (Str::contains($texto, [
            'corona en mal estado',
            'corona mal estado',
            'corona defectuosa',
        ])) {
            return 'corona_mal_estado';
        }

        if (Str::contains($texto, ['corona provisoria', 'corona provisional'])) {
            return 'corona_provisoria';
        }

        if (Str::contains($texto, ['perno munon', 'perno muñon', 'perno y munon', 'perno y muñon'])) {
            return 'perno_munon';
        }

        if (Str::contains($texto, ['resto radicular', 'residuo radicular', 'remanente radicular'])) {
            return 'residuo_radicular';
        }

        if (Str::contains($texto, ['protesis removible', 'prótesis removible'])) {
            return 'protesis_removible';
        }

        if (Str::contains($texto, ['ribbond'])) {
            return 'ribbond';
        }

        if (Str::contains($texto, ['extraccion', 'exodoncia'])) {
            return 'extraccion';
        }

        if (Str::contains($texto, ['impactado', 'incluido'])) {
            return 'impactado';
        }

        if (Str::contains($texto, ['fractura', 'fracturado'])) {
            return 'fractura';
        }

        if (Str::contains($texto, ['movilidad'])) {
            return 'movilidad';
        }

        if (Str::contains($texto, ['abfraccion'])) {
            return 'abfraccion';
        }

        if (Str::contains($texto, ['abrasion'])) {
            return 'abrasion';
        }

        if (Str::contains($texto, ['atricion'])) {
            return 'atricion';
        }

        if (Str::contains($texto, ['erosion'])) {
            return 'erosion';
        }

        if (Str::contains($texto, ['obturacion'])) {
            return 'obturacion';
        }

        if (Str::contains($texto, ['ortodoncia', 'ortodontico', 'ortodontica'])) {
            return 'ortodoncia';
        }

        if (Str::contains($texto, ['sellante', 'sellado de fosas', 'sellado fosas'])) {
            return 'sellante';
        }

        if (Str::contains($texto, ['surco'])) {
            return 'surco';
        }

        if (Str::contains($texto, ['fluor', 'fluoracion', 'fluoruracion'])) {
            return 'fluor';
        }

        if (Str::contains($texto, ['corona'])) {
            return 'corona';
        }

        if (Str::contains($texto, ['carie'])) {
            return 'carie';
        }

        if (Str::contains($texto, ['diente ausente', 'pieza ausente', 'ausencia dentaria'])) {
            return 'ausente';
        }

        if (Str::contains($texto, ['diente sano', 'pieza sana'])) {
            return 'normal';
        }

        if (Str::contains($texto, ['otro tratamiento', 'otro tto'])) {
            return 'otro_tto';
        }

        return null;
    };

    /**
     * Devuelve la imagen correcta para una pieza adulta y su estado clínico.
     * Las rutas siguen exactamente la estructura existente en
     * public/images/dental/dientes.
     */
    $imagenEstadoOdontograma = static function ($estado, $codigo) {
        $rutas = [
            'carie'               => "images/dental/dientes/carie/carie{$codigo}.png",
            'ausente'             => "images/dental/dientes/diente-ausente/dau{$codigo}.png",
            'extraccion'          => "images/dental/dientes/extraccion/porhacer/extraccion_{$codigo}.png",
            'fractura'            => "images/dental/dientes/fractura/fractura_{$codigo}.png",
            'impactado'           => "images/dental/dientes/impactado/impactado_{$codigo}.png",
            'endodoncia'          => "images/dental/dientes/endodoncia/endo{$codigo}.png",
            'pulpotomia'          => "images/dental/dientes/pulpotomia/pulpotomia{$codigo}.png",
            'pulpectomia'         => "images/dental/dientes/pulpectomia/pulpectomia_{$codigo}.png",
            'implante'            => "images/dental/dientes/implante/impl{$codigo}.png",
            'movilidad'           => "images/dental/dientes/movilidad/movilidad_{$codigo}.png",
            'perno_munon'         => "images/dental/dientes/perno-munon/hecho/perno_munon_{$codigo}.png",
            'corona'              => "images/dental/dientes/corona/hecho/corona_{$codigo}.png",
            'corona_provisoria'   => "images/dental/dientes/corona-provisoria/hecho/cp_hecho_{$codigo}.png",
            'corona_mal_estado'   => "images/dental/dientes/corona_mal_estado/c_malestado{$codigo}.png",
            'protesis_removible'  => "images/dental/dientes/protesis-removible/p_removible{$codigo}.png",
            'residuo_radicular'   => "images/dental/dientes/residuo-radicular/hecho/rr_{$codigo}.png",
            'ribbond'             => "images/dental/dientes/ribbond/hecho/ribbond_{$codigo}.png",
            'sellante'            => "images/dental/dientes/sellante/sellante_{$codigo}.png",
            'surco'               => "images/dental/dientes/surco/surco_{$codigo}.png",
            'atricion'            => "images/dental/dientes/atricion/atricion{$codigo}.png",
            'abrasion'            => "images/dental/dientes/abrasion/abrasion{$codigo}.png",
            'abfraccion'          => "images/dental/dientes/abfraccion/abfraccion{$codigo}.png",
            'erosion'             => "images/dental/dientes/erosion/erosion{$codigo}.png",
            'obturacion'          => "images/dental/dientes/obturacion/obturacion{$codigo}.png",
            'ortodoncia'          => "images/dental/dientes/ortodoncia/ortodoncia{$codigo}.png",
            'fluor'               => "images/dental/dientes/fluor/fluor{$codigo}.png",
            'otro_tto'            => "images/dental/dientes/otro-tto/otro-tto{$codigo}.png",
        ];

        return $rutas[$estado] ?? "images/dental/dientes/d{$codigo}.png";
    };

    // El odontograma representa el historial completo del paciente.
    // La última condición clínica reconocida de cada pieza es la que se dibuja.
    $piezasEstado = [];

    if (isset($odontograma_historial)) {
        $historialPorPieza = [];

        foreach ($odontograma_historial as $registro) {
            if ((int) data_get($registro, 'urgencia', 0) === 1) {
                continue;
            }

            $codigoPieza = trim((string) data_get($registro, 'pieza', ''));
            if ($codigoPieza === '') {
                continue;
            }

            $historialPorPieza[$codigoPieza][] = $registro;
        }

        foreach ($historialPorPieza as $codigoPieza => $historial) {
            $estadoFinal = 'normal';

            foreach ($historial as $registro) {
                $nuevoEstado = $resolverEstadoVisualOdontograma($registro);

                if ($nuevoEstado !== null) {
                    $estadoFinal = $nuevoEstado;
                }
            }

            $piezasEstado[$codigoPieza] = $estadoFinal;
        }
    }
@endphp
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <h1 class="text-c-blue mt-1 mb-1 f-22 d-inline">Odontograma Adulto</h1>
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-purple d-inline float-md-right mr-2">Ver simbología</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <!--ODONTOGRAMA SUPERIOR ADULTOS-->
                <div class="col-md-12 d-flex flex-row align-items-end justify-content-center mt-3">
                    @foreach (range(18, 11) as $i)
                        @php
                            $codigoPieza = '1.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
                            $codigoPiezaImagen = '1' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                            // Imagen centralizada según la simbología clínica
                            $imagen = $imagenEstadoOdontograma($estadoPieza, $codigoPiezaImagen);
                        @endphp

                        <div class="text-center mx-1">

                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');"
                                    data-estado-clinico="{{ $estadoPieza }}"
                                    title="Pieza {{ $codigoPieza }} · {{ str_replace('_', ' ', ucfirst($estadoPieza)) }}">
                            </div>
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                        </div>
                    @endforeach
                    {{-- Piezas 2.1 - 2.8 --}}
                    @foreach (range(21, 28) as $i)
                        @php
                            $codigoPieza = '2.' . ($i % 10); // Genera códigos 2.1, 2.2, ..., 2.8
                            $codigoPiezaImagen = '2' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

                            // Imagen centralizada según la simbología clínica
                            $imagen = $imagenEstadoOdontograma($estadoPieza, $codigoPiezaImagen);
                        @endphp

                        <div class="text-center mx-1">

                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');"
                                    data-estado-clinico="{{ $estadoPieza }}"
                                    title="Pieza {{ $codigoPieza }} · {{ str_replace('_', ' ', ucfirst($estadoPieza)) }}">
                            </div>
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                        </div>
                    @endforeach
                </div>
                <!--ODONTOGRAMA INFERIOR ADULTOS-->
                <div class="col-md-12 d-flex flex-row align-items-start justify-content-center mt-5">
                    @foreach (range(48, 41) as $i)
                        @php
                            $codigoPieza = '4.' . ($i % 10); // Genera códigos 4.1, 4.2, ..., 4.8
                            $codigoPiezaImagen = '4' . ($i % 10); // Para las imágenes
                            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal'; // Estado preprocesado en PHP principal

                            // Imagen centralizada según la simbología clínica
                            $imagen = $imagenEstadoOdontograma($estadoPieza, $codigoPiezaImagen);
                        @endphp

                        <div class="text-center mx-1">
                            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2 font-weight-bold">{{ $codigoPieza }}</label>
                            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                                <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                    onclick="info_odontograma('{{ $codigoPieza }}');"
                                    data-estado-clinico="{{ $estadoPieza }}"
                                    title="Pieza {{ $codigoPieza }} · {{ str_replace('_', ' ', ucfirst($estadoPieza)) }}">
                            </div>

                        </div>
                    @endforeach
                    @foreach (range(31, 38) as $i)
                    @php
                        $codigoPieza = '3.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
                        $codigoPiezaImagen = '3' . ($i % 10); // Para las imágenes
                        $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal'; // Estado preprocesado en PHP principal

                        // Imagen centralizada según la simbología clínica
                        $imagen = $imagenEstadoOdontograma($estadoPieza, $codigoPiezaImagen);
                    @endphp

                    <div class="text-center mx-1">
                        <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent font-weight-bold mt-2">{{ $codigoPieza }}</label>
                        <div class="diente_adulto" id="t{{ $codigoPieza }}">
                            <img src="{{ asset($imagen) }}" class="wid-60 img-fluid" role="button"
                                onclick="info_odontograma('{{ $codigoPieza }}');"
                                    data-estado-clinico="{{ $estadoPieza }}"
                                    title="Pieza {{ $codigoPieza }} · {{ str_replace('_', ' ', ucfirst($estadoPieza)) }}">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--SIMBOLOGIA ADULTO-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Simbología del odontograma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/diente-sano/diente-sano15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente sano</h6>
                  </div>
            </div>
        </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/diente-ausente/dau15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente ausente</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/extraccion/porhacer/extraccion_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Extracción</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/fractura/fractura_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Fractura</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/impactado/impactado_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Diente Impactado</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/carie/carie15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Caries</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/endodoncia/endo15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Endodoncia</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/pulpotomia/pulpotomia15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Pulpotomía</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/pulpectomia/pulpectomia_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Pulpectomía</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/implante/impl15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Implante</h6>
                  </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/movilidad/movilidad_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Movilidad</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/perno-munon/hecho/perno_munon_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Perno muñón</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona/hecho/corona_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona-provisoria/hecho/cp_hecho_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona provisoria</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/corona_mal_estado/c_malestado15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Corona en mal estado</h6>
                  </div>
            </div>
        </div>
       
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/protesis-removible/p_removible15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Prótesis removible</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/residuo-radicular/hecho/rr_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Resto radicular</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/ribbond/hecho/ribbond_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Ribbond</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/sellante/sellante_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Sellante</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/surco/surco_15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Surco</h6>
                  </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/atricion/atricion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Atrición</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/abrasion/abrasion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Abrasión</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/abfraccion/abfraccion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Abfracción</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/erosion/erosion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Erosión</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/obturacion/obturacion15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Obturación</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/ortodoncia/ortodoncia15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Ortodoncia</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/fluor/fluor15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Fluor</h6>
                  </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <div class="media align-middle">
                  <img src="{{ asset('images/dental/dientes/otro-tto/otro-tto15.png') }}" class="align-self-center wid-50 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-5">Otro Tratamiento</h6>
                  </div>
            </div>
        </div>
         <!--<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="media align-middle">
                  <img src="" class="align-self-center wid-40 mr-1" alt="...">
                  <div class="media-body">
                    <h6 class="pt-4"></h6>
                  </div>
            </div>
        </div>-->

        <!-------------->

        </div>
    </div>
  </div>
</div>
</div>
