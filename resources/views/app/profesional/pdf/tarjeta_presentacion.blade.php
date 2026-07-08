<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tarjeta de Presentación</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            background: #ffffff;
        }

        /* ===================== PORTADA ===================== */
        .page-front {
            width: 100%;
            height: 841px;
            background-color: #0b2d2b;
            position: relative;
            text-align: center;
            page-break-after: always;
        }

        /* Esquinas decorativas */
        .corner {
            position: absolute;
            width: 28px;
            height: 28px;
        }
        .corner-tl {
            top: 22px;
            left: 22px;
            border-top: 2px solid #d4a84b;
            border-left: 2px solid #d4a84b;
        }
        .corner-tr {
            top: 22px;
            right: 22px;
            border-top: 2px solid #d4a84b;
            border-right: 2px solid #d4a84b;
        }
        .corner-bl {
            bottom: 22px;
            left: 22px;
            border-bottom: 2px solid #d4a84b;
            border-left: 2px solid #d4a84b;
        }
        .corner-br {
            bottom: 22px;
            right: 22px;
            border-bottom: 2px solid #d4a84b;
            border-right: 2px solid #d4a84b;
        }

        .front-content {
            padding-top: 180px;
        }

        .front-icon {
            font-size: 72px;
            color: #1c9693;
            letter-spacing: 28px;
            margin-bottom: 48px;
        }

        .front-name {
            font-size: 38px;
            color: #ffffff;
            font-weight: normal;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .front-divider {
            width: 120px;
            border-top: 1px solid #d4a84b;
            margin: 0 auto 18px auto;
        }

        .front-specialty {
            font-size: 13px;
            color: #1c9693;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        /* ===================== REVERSO ===================== */

        .back-name {
            font-size: 22px;
            color: #ffffff;
            font-weight: normal;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .back-specialty {
            font-size: 11px;
            color: #1c9693;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .badge-sdi {
            border: 1px solid #1c9693;
            padding: 6px 12px;
            color: #1c9693;
            font-size: 10px;
            letter-spacing: 2px;
        }

        .col-left {
            width: 40%;
            vertical-align: top;
            padding-right: 28px;
            border-right: 1px solid #1a4a47;
        }

        .col-right {
            width: 60%;
            vertical-align: top;
            padding-left: 28px;
        }

        .section-title {
            color: #d4a84b;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .info-label {
            color: #5a8886;
            font-size: 9px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .info-value {
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .info-value-link {
            color: #1c9693;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .location-block {
            margin-bottom: 16px;
        }

        .location-name {
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .location-detail {
            color: #7aadab;
            font-size: 10px;
            margin-bottom: 2px;
        }

        .location-link {
            color: #1c9693;
            font-size: 10px;
        }

        .footer-text {
            color: #3a6a68;
            font-size: 9px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<!-- ===== PÁGINA 1: PORTADA ===== -->
<div class="page-front">
    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>

    <div class="front-content">
        <div class="front-icon">&#9877;&nbsp;&nbsp;&#9877;</div>

        <div class="front-name">
            {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
        </div>

        <div class="front-divider"></div>

        <div class="front-specialty">
            {{ strtoupper($profesional->Especialidad->nombre ?? 'Profesional de la Salud') }}
            @if(!empty($profesional->TipoEspecialidad->nombre))
                &nbsp;&#183;&nbsp; {{ strtoupper($profesional->TipoEspecialidad->nombre) }}
            @endif
        </div>
    </div>
</div>

<!-- ===== PÁGINA 2: REVERSO ===== -->
<div style="width:100%; height:841px; background-color:#0b2d2b; position:relative;">

    <!-- TL corner: top+left funciona en DomPDF -->
    <div style="position:absolute; top:22px; left:22px; width:28px; height:28px; border-top:2px solid #d4a84b; border-left:2px solid #d4a84b;"></div>

    <!-- TR corner: tabla full-width para simular right -->
    <div style="position:absolute; top:22px; left:0; width:100%; height:28px;">
        <table style="width:100%; height:28px; border-collapse:separate; border-spacing:0;"><tr>
            <td style="padding:0;"></td>
            <td style="width:28px; padding:0; border-top:2px solid #d4a84b; border-right:2px solid #d4a84b;"></td>
            <td style="width:22px; padding:0;"></td>
        </tr></table>
    </div>

    <!-- BL corner: bottom+left funciona en DomPDF -->
    <div style="position:absolute; bottom:22px; left:22px; width:28px; height:28px; border-bottom:2px solid #d4a84b; border-left:2px solid #d4a84b;"></div>

    <!-- BR corner: tabla full-width para simular right -->
    <div style="position:absolute; bottom:22px; left:0; width:100%; height:28px;">
        <table style="width:100%; height:28px; border-collapse:separate; border-spacing:0;"><tr>
            <td style="padding:0;"></td>
            <td style="width:28px; padding:0; border-bottom:2px solid #d4a84b; border-right:2px solid #d4a84b;"></td>
            <td style="width:22px; padding:0;"></td>
        </tr></table>
    </div>

    <!-- Contenido principal -->
    <div style="padding:52px 80px 0 80px;">

        <!-- Encabezado: nombre + badge -->
        <table style="width:100%; border-collapse:collapse; border-bottom:1px solid #1a4a47; margin-bottom:28px;">
            <tr>
                <td style="width:75%; vertical-align:top; padding-bottom:20px;">
                    <div class="back-name">{{ $profesional->nombre }} {{ $profesional->apellido_uno }}</div>
                    <div class="back-specialty">
                        {{ strtoupper($profesional->Especialidad->nombre ?? '') }}
                        @if(!empty($profesional->TipoEspecialidad->nombre))
                            &nbsp;&#183;&nbsp; {{ strtoupper($profesional->TipoEspecialidad->nombre) }}
                        @endif
                    </div>
                </td>
                <td style="width:25%; vertical-align:top; text-align:right; padding-bottom:20px;">
                    <span class="badge-sdi">SDI &nbsp;&#9877;</span>
                </td>
            </tr>
        </table>

        <!-- Dos columnas: contacto | centros de atención -->
        <table style="width:100%; border-collapse:collapse;">
            <tr>
                <td class="col-left">
                    <div class="section-title">Contacto Directo</div>

                    @if(!empty($profesional->telefono))
                    <div class="info-label">Tel&#233;fono / WhatsApp</div>
                    <div class="info-value">{{ $profesional->telefono }}</div>
                    @endif

                    @if(!empty($profesional->email))
                    <div class="info-label">Email</div>
                    <div class="info-value-link">{{ $profesional->email }}</div>
                    @endif
                </td>

                <td class="col-right">
                    <div class="section-title">Centros de Atenci&#243;n</div>

                    @forelse($lugares as $lugar)
                    <div class="location-block">
                        <div class="location-name">{{ $lugar->nombre }}</div>
                        @if(!empty($lugar->dir) && !empty($lugar->dir->direccion))
                        <div class="location-detail">{{ $lugar->dir->direccion }}{{ !empty($lugar->dir->numero_dir) ? ' ' . $lugar->dir->numero_dir : '' }}</div>
                        @endif
                        @if(!empty($lugar->telefono))
                        <div class="location-detail">{{ $lugar->telefono }}</div>
                        @endif
                        @if(!empty($lugar->email))
                        <div class="location-link">{{ $lugar->email }}</div>
                        @endif
                    </div>
                    @empty
                    <div class="location-detail">Sin centros de atenci&#243;n registrados.</div>
                    @endforelse
                </td>
            </tr>
        </table>

    </div>

    <!-- Footer anclado al fondo -->
    <div style="position:absolute; bottom:32px; left:0; width:100%; text-align:center; padding-top:12px; border-top:1px solid #1a4a47;">
        <span class="footer-text">SISTEMA DE DIGITALIZACI&#211;N INTEGRAL &nbsp;&#183;&nbsp; MED-SDI &nbsp;&#183;&nbsp; www.med-sdi.cl</span>
    </div>

</div>

</body>
</html>
