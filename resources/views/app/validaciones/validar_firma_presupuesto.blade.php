<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validación de firma MEDSDI</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #243447;
        }
        .wrap {
            max-width: 680px;
            margin: 50px auto;
            padding: 0 18px;
        }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 12px 35px rgba(28, 58, 92, .10);
        }
        .ok { color: #16794d; }
        .bad { color: #b42318; }
        h1 { margin-top: 0; font-size: 24px; }
        .fila {
            padding: 10px 0;
            border-bottom: 1px solid #edf1f5;
        }
        .fila:last-child { border-bottom: 0; }
        .label {
            display: block;
            font-size: 12px;
            color: #738294;
            margin-bottom: 3px;
        }
        .valor { font-weight: 600; }
        .nota {
            margin-top: 20px;
            color: #6c7885;
            font-size: 13px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        @if($valido)
            <h1 class="ok">✓ Firma electrónica válida</h1>

            <div class="fila">
                <span class="label">Documento</span>
                <span class="valor">Presupuesto odontológico N.º {{ $presupuesto->id }}</span>
            </div>

            <div class="fila">
                <span class="label">Paciente</span>
                <span class="valor">
                    {{ trim(($paciente->nombres ?? '').' '.($paciente->apellido_uno ?? '').' '.($paciente->apellido_dos ?? '')) }}
                </span>
            </div>

            @if($paciente && $paciente->rut)
                <div class="fila">
                    <span class="label">RUT paciente</span>
                    <span class="valor">{{ $paciente->rut }}</span>
                </div>
            @endif

            @if($profesional)
                <div class="fila">
                    <span class="label">Profesional tratante</span>
                    <span class="valor">
                        {{ trim(($profesional->nombre ?? '').' '.($profesional->apellido_uno ?? '').' '.($profesional->apellido_dos ?? '')) }}
                    </span>
                </div>
            @endif

            <div class="fila">
                <span class="label">Fecha de firma</span>
                <span class="valor">
                    {{ $presupuesto->firma_paciente_fecha
                        ? \Carbon\Carbon::parse($presupuesto->firma_paciente_fecha)->format('d/m/Y H:i')
                        : 'No informada' }}
                </span>
            </div>

            <div class="fila">
                <span class="label">Estado</span>
                <span class="valor ok">Firma registrada y vigente</span>
            </div>

            <p class="nota">
                Esta página confirma que MEDSDI mantiene un registro de firma electrónica asociado
                a este presupuesto. No se exponen diagnósticos ni prestaciones clínicas.
            </p>
        @else
            <h1 class="bad">Firma no válida o no encontrada</h1>
            <p class="nota">
                El código de validación no corresponde a una firma electrónica activa registrada en MEDSDI.
            </p>
        @endif
    </div>
</div>
</body>
</html>
