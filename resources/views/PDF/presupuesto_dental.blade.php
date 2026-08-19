<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            margin: 18mm 14mm 58mm 14mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: center; }
        th { background-color: #004a8f; color: white; }
        .no-border td { border: none; }
        .text-end { text-align: right; }
        .firma td { border: none; padding-top: 40px; }
        .encabezado { margin: 0 0 14px; border: none; }
        .encabezado td { border: none; vertical-align: middle; }
        .logo-medsdi { width: 190px; height: auto; }
        .titulo-documento { text-align: right; color: #004a8f; }
        .titulo-documento h2 { margin: 0 0 4px; font-size: 20px; }
        .titulo-documento p { margin: 0; color: #66788a; }
        .datos-emision { margin-bottom: 12px; }
        .datos-emision td { width: 50%; padding: 9px 11px; text-align: left; vertical-align: top; }
        .datos-emision .titulo-bloque { display: block; margin-bottom: 5px; color: #004a8f; font-size: 12px; text-transform: uppercase; }
        .datos-emision span { display: block; margin-bottom: 2px; }
        .convenio { margin: 10px 0 14px; padding: 9px 12px; border: 1px solid #9ed9c0; background: #edf9f3; color: #176b45; }
        .resumen-total { width: 44%; margin: 16px 0 0 auto; }
        .resumen-total td { text-align: right; }
        .resumen-total .total td { background: #004a8f; color: white; font-size: 14px; font-weight: bold; }

        /* =========================================================
         * FOOTER DE VALIDACIÓN
         * DomPDF repite los elementos position:fixed en cada página.
         * El margen inferior de @page reserva el espacio necesario.
         * ========================================================= */
        .footer-validacion {
            position: fixed;
            left: 0;
            right: 0;
            bottom: -50mm;
            height: 46mm;
            border-top: 1px solid #d8e1ea;
            padding-top: 4mm;
            background: #fff;
        }

        .footer-validacion table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .footer-validacion td {
            border: none;
            width: 33.333%;
            padding: 0 3mm;
            vertical-align: top;
            text-align: center;
        }

        .footer-validacion.dos-columnas td {
            width: 50%;
        }

        .footer-qr {
            width: 68px;
            height: 68px;
            margin: 0 auto 3px;
            padding: 3px;
            border: 2px solid #004a8f;
            border-radius: 5px;
            background: #fff;
        }

        .footer-qr img {
            width: 100%;
            height: 100%;
        }

        .footer-titulo {
            margin: 0 0 2px;
            color: #004a8f;
            font-size: 8.5px;
            font-weight: bold;
            line-height: 1.15;
        }

        .footer-texto {
            margin: 0;
            color: #56697b;
            font-size: 6.7px;
            line-height: 1.2;
        }

        .footer-nombre {
            margin: 2px 0 0;
            color: #1f2d3d;
            font-size: 7.2px;
            font-weight: bold;
            line-height: 1.15;
        }

        .footer-codigo {
            margin-top: 2px;
            color: #7b8794;
            font-size: 5.8px;
            line-height: 1.1;
        }

        .footer-nota {
            margin-top: 3px;
            text-align: center;
            color: #7b8794;
            font-size: 5.8px;
            line-height: 1.15;
        }

    </style>
</head>
<body>
    @php
        $profesional = $profesional ?? null;
        $lugarAtencion = $lugarAtencion ?? null;
    @endphp
    <table class="encabezado">
        <tr>
            <td><img class="logo-medsdi" src="{{ public_path('images/logo_.png') }}" alt="MEDSDI"></td>
            <td class="titulo-documento">
                <h2>
                    {{ !empty($esPresupuestoUrgencia)
                        ? 'Presupuesto de Urgencia Odontológica'
                        : 'Presupuesto Odontológico' }}
                </h2>
                @if(!empty($presupuestoReporte))
                    <p>Presupuesto N.&ordm; {{ $presupuestoReporte->id }}</p>
                @endif
            </td>
        </tr>
    </table>

    <table class="datos-emision">
        <tr>
            <td>
                <strong class="titulo-bloque">Profesional tratante</strong>
                <span><strong>{{ trim(($profesional->nombre ?? '').' '.($profesional->apellido_uno ?? '').' '.($profesional->apellido_dos ?? '')) }}</strong></span>
                @if(data_get($profesional ?? null, 'TipoEspecialidad.nombre'))<span>{{ data_get($profesional, 'TipoEspecialidad.nombre') }}</span>@endif
                @if($profesional->rut ?? null)<span>RUT: {{ $profesional->rut }}</span>@endif
                @if($profesional->telefono_uno ?? null)<span>Tel.: {{ $profesional->telefono_uno }}</span>@endif
                @if($profesional->email ?? null)<span>{{ $profesional->email }}</span>@endif
            </td>
            <td>
                <strong class="titulo-bloque">Lugar de atenci&oacute;n</strong>
                <span><strong>{{ $lugarAtencion->nombre ?? 'No informado' }}</strong></span>
                @if(data_get($lugarAtencion ?? null, 'Direccion.direccion'))
                    <span>{{ data_get($lugarAtencion, 'Direccion.direccion') }} {{ data_get($lugarAtencion, 'Direccion.numero_dir') }}</span>
                @endif
                @if(data_get($lugarAtencion ?? null, 'Direccion.Ciudad.nombre'))<span>{{ data_get($lugarAtencion, 'Direccion.Ciudad.nombre') }}</span>@endif
                @if($lugarAtencion->telefono ?? null)<span>Tel.: {{ $lugarAtencion->telefono }}</span>@endif
                @if($lugarAtencion->email ?? null)<span>{{ $lugarAtencion->email }}</span>@endif
            </td>
        </tr>
    </table>

    <!-- Resumen -->
    <table class="no-border">
        <tr>
            <td class="text-start"><strong>Paciente:</strong> {{ $paciente->nombres }} {{ $paciente->apellido_uno }}</td>
            <td class="text-end"><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</td>
        </tr>
    </table>

    @if(($porcentajeDescuento ?? 0) > 0)
        <div class="convenio">
            <strong>Convenio aplicado:</strong> {{ $convenioAplicado->nombre_convenio ?? 'Convenio' }}
            &mdash; {{ number_format($porcentajeDescuento, 0, ',', '.') }}% de descuento
        </div>
    @endif

    <!-- Detalle de Tratamientos -->
    <h4>Detalle de Tratamientos</h4>
    <table>
        <thead>
            <tr>
                <th>Pieza Dental</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                {{-- <th>Caras</th> --}}
                {{-- <th>Valor</th> --}}
                @if(($porcentajeDescuento ?? 0) > 0)
                    <th>Descuento</th>
                @endif
                <th>Total</th>
                {{-- <th>Comentarios</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($odontograma as $t)
            <tr>
                <td>{{ $t->pieza }}</td>
                <td>{{ $t->diagnostico }}</td>
                <td>{{ $t->tratamiento }}</td>
                {{-- <td>{{ $t->caras ?? '-' }}</td> --}}
                @php
                    $descuentoTratamiento = round($t->valor * (($porcentajeDescuento ?? 0) / 100));
                    $totalTratamiento = $t->valor - $descuentoTratamiento;
                @endphp
                {{-- <td>${{ number_format($t->valor, 0, ',', '.') }}</td> --}}
                @if(($porcentajeDescuento ?? 0) > 0)
                    <td>${{ number_format($descuentoTratamiento, 0, ',', '.') }}</td>
                @endif
                <td>${{ number_format($totalTratamiento, 0, ',', '.') }}</td>
                {{-- <td>{{ $t->comentarios ?? '-' }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($insumos->where('presupuesto',1)->isEmpty())
        <p style="margin-top: 8px; font-size: 12px; color: #58697a;">No se registraron insumos para este presupuesto.</p>
    @else
    <!-- Insumos -->
    <h4>Insumos Utilizados</h4>
    <table>
        <thead>
            <tr>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Sub-Total</th>
                @if(($porcentajeDescuento ?? 0) > 0)
                    <th>Descuento</th>
                @endif
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos->where('presupuesto',1) as $i)
            <tr>
                <td>{{ $i->insumos }}</td>
                <td>{{ $i->cantidad }}</td>
                <td>{{ $i->tipo_insumo }}</td>
                @php
                    $cantidadInsumo = max(1, (int) $i->cantidad);
                    $subtotalInsumo = (float) $i->valor * $cantidadInsumo;
                    $descuentoInsumo = round($subtotalInsumo * (($porcentajeDescuento ?? 0) / 100));
                @endphp
                <td>${{ number_format($subtotalInsumo, 0, ',', '.') }}</td>
                @if(($porcentajeDescuento ?? 0) > 0)
                    <td>${{ number_format($descuentoInsumo, 0, ',', '.') }}</td>
                @endif
                <td>${{ number_format($subtotalInsumo - $descuentoInsumo, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <!-- Total Final -->
    <table class="resumen-total">
        @if(($porcentajeDescuento ?? 0) > 0)
            <tr><td><strong>Sub-Total</strong></td><td>${{ number_format($subtotalPresupuesto, 0, ',', '.') }}</td></tr>
            <tr><td><strong>Descuento ({{ number_format($porcentajeDescuento, 0, ',', '.') }}%)</strong></td><td>-${{ number_format($descuentoPresupuesto, 0, ',', '.') }}</td></tr>
        @endif
        <tr class="total"><td>Total Presupuesto</td><td>${{ number_format($totalPresupuesto, 0, ',', '.') }}</td></tr>
    </table>

    @php
        /*
         * El backend entrega los QR como SVG sin codificar.
         * También dejamos fallback a los arrays estándar usados por PDF.header/PDF.footer.
         */
        $qrDocumentoVista = $qr_presupuesto
            ?? data_get($array_ficha_atencion ?? [], 'qr')
            ?? data_get($cuerpo ?? [], 'array_ficha_atencion.qr');

        $tokenDocumentoVista = $token_presupuesto
            ?? data_get($array_ficha_atencion ?? [], 'token')
            ?? data_get($cuerpo ?? [], 'array_ficha_atencion.token');

        $qrProfesionalVista = $qr_profesional
            ?? data_get($array_profesional ?? [], 'qr')
            ?? data_get($cuerpo ?? [], 'array_profesional.qr');

        $tokenProfesionalVista = $token_profesional
            ?? data_get($array_profesional ?? [], 'token')
            ?? data_get($cuerpo ?? [], 'array_profesional.token');

        $qrPacienteVista = $qr_paciente ?? null;

        $tokenPacienteVista = $token_paciente
            ?? data_get($presupuestoReporte ?? null, 'firma_paciente_token');

        $firmaPacienteActiva =
            (int) data_get($presupuestoReporte ?? null, 'firma_paciente_estado', 0) === 1
            && !empty($tokenPacienteVista);

        $nombrePacienteFirmaVista = trim(
            ($paciente->nombres ?? '') . ' ' .
            ($paciente->apellido_uno ?? '') . ' ' .
            ($paciente->apellido_dos ?? '')
        );

        $fechaFirmaPacienteVista = data_get(
            $presupuestoReporte ?? null,
            'firma_paciente_fecha'
        );

        $nombreProfesionalVista = trim(
            ($profesional->nombre ?? '') . ' ' .
            ($profesional->apellido_uno ?? '') . ' ' .
            ($profesional->apellido_dos ?? '')
        );

        if ($nombreProfesionalVista === '') {
            $nombreProfesionalVista =
                data_get($array_profesional ?? [], 'nombre')
                ?? data_get($cuerpo ?? [], 'array_profesional.nombre')
                ?? 'Profesional tratante';
        }
    @endphp

    <!-- =========================================================
         FOOTER FIJO DE VALIDACIÓN DIGITAL
         Se repite automáticamente en cada página generada por DomPDF.
         ========================================================= -->
    @if(!empty($qrDocumentoVista) || !empty($qrProfesionalVista) || $firmaPacienteActiva)
        <div class="footer-validacion{{ !$firmaPacienteActiva ? ' dos-columnas' : '' }}">
            <table>
                <tr>
                    {{-- VALIDACIÓN DOCUMENTO --}}
                    <td>
                        @if(!empty($qrDocumentoVista))
                            <div class="footer-qr">
                                <img
                                    src="data:image/svg+xml;base64,{{ base64_encode($qrDocumentoVista) }}"
                                    alt="QR validación documento">
                            </div>
                        @endif

                        <p class="footer-titulo">Validación del documento</p>

                        @if(!empty($tokenDocumentoVista))
                            <p class="footer-codigo">
                                Código: {{ substr($tokenDocumentoVista, 0, 12) }}...
                            </p>
                        @else
                            <p class="footer-texto">Código no disponible</p>
                        @endif
                    </td>

                    {{-- VALIDACIÓN PROFESIONAL --}}
                    <td>
                        @if(!empty($qrProfesionalVista))
                            <div class="footer-qr">
                                <img
                                    src="data:image/svg+xml;base64,{{ base64_encode($qrProfesionalVista) }}"
                                    alt="QR validación profesional">
                            </div>
                        @endif

                        <p class="footer-titulo">Validación del profesional</p>
                        <p class="footer-texto">Firma Digital Avanzada SDI</p>
                        <p class="footer-nombre">
                            Dr. {{ $nombreProfesionalVista }}
                        </p>

                        @if(!empty($tokenProfesionalVista))
                            <p class="footer-codigo">
                                Código: {{ substr($tokenProfesionalVista, 0, 12) }}...
                            </p>
                        @endif
                    </td>

                    {{-- FIRMA PACIENTE --}}
                    @if($firmaPacienteActiva)
                        <td>
                            @if(!empty($qrPacienteVista))
                                <div class="footer-qr">
                                    <img
                                        src="data:image/svg+xml;base64,{{ base64_encode($qrPacienteVista) }}"
                                        alt="QR firma paciente">
                                </div>
                            @endif

                            <p class="footer-titulo">Firma del paciente</p>
                            <p class="footer-texto">Firma electrónica MEDSDI</p>

                            @if(!empty($nombrePacienteFirmaVista))
                                <p class="footer-nombre">
                                    {{ $nombrePacienteFirmaVista }}
                                </p>
                            @endif

                            @if(!empty($fechaFirmaPacienteVista))
                                <p class="footer-texto">
                                    {{ \Carbon\Carbon::parse($fechaFirmaPacienteVista)->format('d/m/Y H:i') }}
                                </p>
                            @endif

                            @if(!empty($tokenPacienteVista))
                                <p class="footer-codigo">
                                    Código: {{ substr($tokenPacienteVista, 0, 12) }}...
                                </p>
                            @endif
                        </td>
                    @endif
                </tr>
            </table>

            <div class="footer-nota">
                MEDSDI · Verifique la autenticidad del documento y sus firmas escaneando los códigos QR.
            </div>
        </div>
    @endif

</body>
</html>
