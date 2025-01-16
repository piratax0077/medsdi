@php
    use Illuminate\Support\Str;

    // Crear un array para almacenar el estado final de cada pieza
    $piezasEstado = [];

    foreach ($odontograma as $pieza) {
        $codigoPieza = $pieza['pieza'];
        $tratamiento = $pieza['tratamiento'] ?? '';
        $diagnostico = $pieza['diagnostico'] ?? '';
        $estado = $pieza['estado'] ?? '';

        // Lógica para determinar el tipo de imagen
        if (Str::contains($diagnostico, 'Carie')) {
            $piezasEstado[$codigoPieza] = 'carie';
        } elseif (Str::contains($tratamiento, 'Implante')) {
            if ($estado == '0') {
                $piezasEstado[$codigoPieza] = 'ausente';
            } else {
                $piezasEstado[$codigoPieza] = 'implante';
            }
        } else {
            $piezasEstado[$codigoPieza] = 'normal';
        }
    }
@endphp
<!--ODONTOGRAMA SUPERIOR ADULTOS-->
<div class="col-md-12 d-flex flex-row align-items-end justify-content-center">
    @foreach (range(18, 11) as $i)
        @php
            $codigoPieza = '1.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
            $codigoPiezaImagen = '1' . ($i % 10); // Para las imágenes
            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

            // Determinar la imagen según el estado
            switch ($estadoPieza) {
                case 'carie':
                    $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                    break;
                case 'ausente':
                    $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                    break;
                case 'implante':
                    $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                    break;
                default:
                    $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                    break;
            }
        @endphp

        <div class="text-center mx-1">

            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                <img src="{{ asset($imagen) }}" class="wid-40 img-fluid" role="button"
                    onclick="info_odontograma('{{ $codigoPieza }}');">
            </div>
            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2">{{ $codigoPieza }}</label>
        </div>
    @endforeach
    {{-- Piezas 2.1 - 2.8 --}}
    @foreach (range(21, 28) as $i)
        @php
            $codigoPieza = '2.' . ($i % 10); // Genera códigos 2.1, 2.2, ..., 2.8
            $codigoPiezaImagen = '2' . ($i % 10); // Para las imágenes
            $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal';

            // Determinar la imagen según el estado
            switch ($estadoPieza) {
                case 'carie':
                    $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                    break;
                case 'ausente':
                    $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                    break;
                case 'implante':
                    $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                    break;
                default:
                    $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                    break;
            }
        @endphp

        <div class="text-center mx-1">

            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                <img src="{{ asset($imagen) }}" class="wid-40 img-fluid" role="button"
                    onclick="info_odontograma('{{ $codigoPieza }}');">
            </div>
            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2">{{ $codigoPieza }}</label>
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

            // Determinar la imagen según el estado
            switch ($estadoPieza) {
                case 'carie':
                    $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                    break;
                case 'ausente':
                    $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                    break;
                case 'implante':
                    $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                    break;
                default:
                    $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                    break;
            }
        @endphp

        <div class="text-center mx-1">
            <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2">{{ $codigoPieza }}</label>
            <div class="diente_adulto" id="t{{ $codigoPieza }}">
                <img src="{{ asset($imagen) }}" class="wid-40 img-fluid" role="button"
                    onclick="info_odontograma('{{ $codigoPieza }}');">
            </div>

        </div>
    @endforeach
    @foreach (range(31, 38) as $i)
    @php
        $codigoPieza = '3.' . ($i % 10); // Genera códigos 3.1, 3.2, ..., 3.8
        $codigoPiezaImagen = '3' . ($i % 10); // Para las imágenes
        $estadoPieza = $piezasEstado[$codigoPieza] ?? 'normal'; // Estado preprocesado en PHP principal

        // Determinar la imagen según el estado
        switch ($estadoPieza) {
            case 'carie':
                $imagen = "images/dental/dientes/carie/carie{$codigoPiezaImagen}.png";
                break;
            case 'ausente':
                $imagen = "images/dental/dientes/diente-ausente/dau{$codigoPiezaImagen}.png";
                break;
            case 'implante':
                $imagen = "images/dental/dientes/implante/impl{$codigoPiezaImagen}.png";
                break;
            default:
                $imagen = "images/dental/dientes/d{$codigoPiezaImagen}.png";
                break;
        }
    @endphp

    <div class="text-center mx-1">
        <label data-ndiente="{{ $codigoPieza }}" class="nav-label-dent mt-2">{{ $codigoPieza }}</label>
        <div class="diente_adulto" id="t{{ $codigoPieza }}">
            <img src="{{ asset($imagen) }}" class="wid-40 img-fluid" role="button"
                onclick="info_odontograma('{{ $codigoPieza }}');">
        </div>
    </div>
@endforeach
</div>
