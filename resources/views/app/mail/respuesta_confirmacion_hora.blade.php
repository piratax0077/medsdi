<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? 'Hora confirmada' }}</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef3f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 680px;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(15, 23, 42, .12);
        }

        .bar {
            height: 7px;
            background: linear-gradient(90deg, #1a49a3, #31bebe);
        }

        .content {
            padding: 34px 32px;
            text-align: center;
        }

        .icon {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            margin-bottom: 18px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 10px 0;
            color: #1a49a3;
            font-size: 26px;
            line-height: 34px;
        }

        p {
            margin: 0;
            color: #475569;
            font-size: 15px;
            line-height: 23px;
        }

        .summary-box {
            margin-top: 24px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 18px;
            text-align: left;
        }

        .summary-title {
            font-size: 16px;
            font-weight: bold;
            color: #1a49a3;
            margin-bottom: 14px;
        }

        .row-info {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 0;
            gap: 12px;
        }

        .row-info:last-child {
            border-bottom: 0;
        }

        .label {
            width: 145px;
            min-width: 145px;
            color: #64748b;
            font-size: 13px;
            font-weight: bold;
        }

        .value {
            color: #0f172a;
            font-size: 14px;
            line-height: 21px;
        }

        .notice {
            margin-top: 20px;
            background: #ecfeff;
            border: 1px solid #a5f3fc;
            color: #155e75;
            border-radius: 14px;
            padding: 15px;
            font-size: 14px;
            line-height: 22px;
            text-align: left;
        }

        .notice.warning {
            background: #fff7ed;
            border-color: #fed7aa;
            color: #9a3412;
        }

        .btn {
            margin-top: 24px;
            display: inline-block;
            background: #1a49a3;
            color: #ffffff;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 14px;
        }

        .footer {
            background: #f1f5f9;
            padding: 16px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
            line-height: 19px;
        }

        @media (max-width: 600px) {
            .content {
                padding: 28px 20px;
            }

            .row-info {
                display: block;
            }

            .label {
                width: auto;
                min-width: auto;
                margin-bottom: 3px;
            }
        }
    </style>
</head>
<body>
    @php
        /**
         * Compatible con ambos nombres de variable:
         * - $hora
         * - $hora_medica
         */
        $horaConfirmada = $hora ?? ($hora_medica ?? null);

        $paciente = $horaConfirmada->Paciente ?? $horaConfirmada->paciente ?? null;
        $profesional = $horaConfirmada->Profesional ?? $horaConfirmada->profesional ?? null;
        $lugarAtencion = $horaConfirmada->LugarAtencion ?? $horaConfirmada->lugarAtencion ?? null;

        $esTelemedicina = $esTelemedicina ?? false;

        if ($horaConfirmada && isset($horaConfirmada->tipo_hora_medica)) {
            $esTelemedicina = ($horaConfirmada->tipo_hora_medica == 'T' || $horaConfirmada->tipo_hora_medica == 3);
        }

        $nombrePaciente = '-';
        if ($paciente) {
            $nombrePaciente = trim(($paciente->nombres ?? '') . ' ' . ($paciente->apellido_uno ?? '') . ' ' . ($paciente->apellido_dos ?? ''));
        }

        $nombreProfesional = '-';
        if ($profesional) {
            $nombreProfesional = trim(($profesional->nombre ?? '') . ' ' . ($profesional->apellido_uno ?? '') . ' ' . ($profesional->apellido_dos ?? ''));
        }

        $fechaTexto = '-';
        $horaTexto = '-';

        if ($horaConfirmada && !empty($horaConfirmada->fecha_consulta)) {
            try {
                $fechaTexto = \Carbon\Carbon::parse($horaConfirmada->fecha_consulta)->locale('es')->translatedFormat('l d \d\e F \d\e Y');
            } catch (\Exception $e) {
                $fechaTexto = $horaConfirmada->fecha_consulta;
            }
        }

        if ($horaConfirmada && !empty($horaConfirmada->hora_inicio)) {
            try {
                $horaTexto = \Carbon\Carbon::parse($horaConfirmada->hora_inicio)->format('H:i') . ' hrs';
            } catch (\Exception $e) {
                $horaTexto = $horaConfirmada->hora_inicio;
            }
        }
    @endphp

    <div class="wrapper">
        <div class="card">
            <div class="bar"></div>

            <div class="content">
                <div class="icon">✓</div>

                <h1>{{ $titulo ?? '¡Hora confirmada!' }}</h1>
                <p>{{ $mensaje ?? 'Su hora médica fue confirmada correctamente.' }}</p>

                @if($horaConfirmada)
                    <div class="summary-box">
                        <div class="summary-title">Resumen de su atención</div>

                        <div class="row-info">
                            <div class="label">Estado</div>
                            <div class="value">Confirmada</div>
                        </div>

                        <div class="row-info">
                            <div class="label">Paciente</div>
                            <div class="value">{{ $nombrePaciente ?: '-' }}</div>
                        </div>

                        <div class="row-info">
                            <div class="label">Profesional</div>
                            <div class="value">{{ $nombreProfesional !== '-' ? 'Dr/a. ' . $nombreProfesional : '-' }}</div>
                        </div>

                        <div class="row-info">
                            <div class="label">Fecha</div>
                            <div class="value">{{ ucfirst($fechaTexto) }}</div>
                        </div>

                        <div class="row-info">
                            <div class="label">Hora</div>
                            <div class="value">{{ $horaTexto }}</div>
                        </div>

                        <div class="row-info">
                            <div class="label">Modalidad</div>
                            <div class="value">{{ $esTelemedicina ? 'Telemedicina' : 'Presencial' }}</div>
                        </div>

                        @if($lugarAtencion)
                            <div class="row-info">
                                <div class="label">Lugar de atención</div>
                                <div class="value">{{ $lugarAtencion->nombre ?? '-' }}</div>
                            </div>
                        @endif
                    </div>

                    @if($esTelemedicina)
                        <div class="notice">
                            <strong>Próximo paso:</strong><br>
                            El día de su consulta recibirá un correo con el enlace para ingresar a la videollamada.
                            Le recomendamos conectarse 5 minutos antes y permitir el acceso a cámara y micrófono.
                        </div>
                    @else
                        <div class="notice warning">
                            <strong>Recomendación:</strong><br>
                            Le sugerimos llegar 10 minutos antes de la hora agendada para realizar el proceso de admisión.
                        </div>
                    @endif
                @else
                    <div class="summary-box">
                        <div class="summary-title">Confirmación registrada</div>
                        <div class="row-info">
                            <div class="label">Estado</div>
                            <div class="value">Confirmada</div>
                        </div>
                    </div>
                @endif

                <a href="{{ url('/') }}" class="btn">Volver al inicio</a>
            </div>

            <div class="footer">
                SDI · Salud Digital Integrada<br>
                &copy; {{ date('Y') }} · Todos los derechos reservados
            </div>
        </div>
    </div>
</body>
</html>
