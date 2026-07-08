<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contrato de Trabajo - Profesional</title>
    <style>
        @page {
            margin: 2cm 1.5cm;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #0071bc;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #0071bc;
            font-size: 18pt;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
            font-size: 10pt;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #0071bc;
            color: white;
            padding: 8px 12px;
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 10px;
        }
        .field {
            margin-bottom: 8px;
        }
        .field-label {
            font-weight: bold;
            display: inline-block;
            width: 180px;
        }
        .field-value {
            display: inline-block;
        }
        .clausula {
            text-align: justify;
            margin-bottom: 15px;
        }
        .firma-section {
            margin-top: 50px;
            page-break-inside: avoid;
        }
        .firma-box {
            display: inline-block;
            width: 45%;
            text-align: center;
            margin-top: 40px;
        }
        .firma-line {
            border-top: 1px solid #333;
            margin: 60px 20px 5px 20px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9pt;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table td {
            padding: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>CONTRATO DE TRABAJO</h1>
        <p><strong>MEDICHILE - Sistema de Diagnóstico Integral</strong></p>
        <p>{{ date('d/m/Y') }}</p>
    </div>

    <div class="section">
        <div class="section-title">DATOS DEL PROFESIONAL</div>
        <div class="field">
            <span class="field-label">Nombre Completo:</span>
            <span class="field-value">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</span>
        </div>
        <div class="field">
            <span class="field-label">RUT:</span>
            <span class="field-value">{{ $profesional->rut }}</span>
        </div>
        <div class="field">
            <span class="field-label">Email:</span>
            <span class="field-value">{{ $profesional->email }}</span>
        </div>
        <div class="field">
            <span class="field-label">Teléfono:</span>
            <span class="field-value">{{ $profesional->telefono_uno }}</span>
        </div>
        <div class="field">
            <span class="field-label">Fecha de Nacimiento:</span>
            <span class="field-value">{{ date('d/m/Y', strtotime($profesional->fecha_nacimiento)) }}</span>
        </div>
    </div>

    @if(isset($contrato))
    <div class="section">
        <div class="section-title">DATOS DEL CONTRATO</div>
        <table>
            <tr>
                <td><strong>Tipo de Contrato:</strong></td>
                <td>{{ $contrato->tipo_contrato == 1 ? 'Indefinido' : 'Plazo Fijo' }}</td>
            </tr>
            <tr>
                <td><strong>Fecha de Inicio:</strong></td>
                <td>{{ date('d/m/Y', strtotime($contrato->fecha_inicio)) }}</td>
            </tr>
            @if($contrato->tipo_contrato == 2 && !empty($contrato->fecha_termino))
            <tr>
                <td><strong>Fecha de Término:</strong></td>
                <td>{{ date('d/m/Y', strtotime($contrato->fecha_termino)) }}</td>
            </tr>
            @endif
            <tr>
                <td><strong>Lugar de Trabajo:</strong></td>
                <td>{{ $lugar_atencion->nombre ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">REMUNERACIONES Y BENEFICIOS</div>
        <table>
            <tr>
                <td><strong>Sueldo Base Imponible:</strong></td>
                <td>${{ number_format($contrato->monto_imponible, 0, ',', '.') }}</td>
            </tr>
            @if($contrato->locomocion > 0)
            <tr>
                <td><strong>Asignación de Locomoción:</strong></td>
                <td>${{ number_format($contrato->locomocion, 0, ',', '.') }}</td>
            </tr>
            @endif
            @if($contrato->colacion > 0)
            <tr>
                <td><strong>Asignación de Colación:</strong></td>
                <td>${{ number_format($contrato->colacion, 0, ',', '.') }}</td>
            </tr>
            @endif
            @if($contrato->asignacion_familiar > 0)
            <tr>
                <td><strong>Asignación Familiar:</strong></td>
                <td>${{ number_format($contrato->asignacion_familiar, 0, ',', '.') }} ({{ $contrato->asignacion_familiar_cantidad }} cargas)</td>
            </tr>
            @endif
            @if($contrato->caja_compensacion > 0)
            <tr>
                <td><strong>Caja de Compensación:</strong></td>
                <td>{{ $contrato->caja_compensacion_porcentaje }}%</td>
            </tr>
            @endif
        </table>
    </div>

    <div class="section">
        <div class="section-title">JORNADA LABORAL</div>
        <table>
            <tr>
                <td><strong>Días Laborales:</strong></td>
                <td>{{ $contrato->dias_laborales ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Horario de Entrada:</strong></td>
                <td>{{ $contrato->hora_ingreso ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Horario de Salida:</strong></td>
                <td>{{ $contrato->hora_salida ?? 'N/A' }}</td>
            </tr>
            @if(!empty($contrato->hora_inicio_colacion))
            <tr>
                <td><strong>Horario de Colación:</strong></td>
                <td>{{ $contrato->hora_inicio_colacion }} a {{ $contrato->hora_termino_colacion }}</td>
            </tr>
            @endif
        </table>
    </div>

    @if(!empty($contrato->banco))
    <div class="section">
        <div class="section-title">DATOS BANCARIOS</div>
        <table>
            <tr>
                <td><strong>Banco:</strong></td>
                <td>{{ $contrato->banco }}</td>
            </tr>
            <tr>
                <td><strong>Número de Cuenta:</strong></td>
                <td>{{ $contrato->n_cta }}</td>
            </tr>
            <tr>
                <td><strong>Sucursal:</strong></td>
                <td>{{ $contrato->sucursal ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
    @endif
    @endif

    <div class="section">
        <div class="section-title">CLÁUSULAS GENERALES</div>
        <div class="clausula">
            <strong>PRIMERA:</strong> El trabajador se compromete a desempeñar las funciones propias de su cargo profesional, cumpliendo con las normas, reglamentos internos y protocolos establecidos por la institución.
        </div>
        <div class="clausula">
            <strong>SEGUNDA:</strong> El trabajador declara conocer y aceptar el Reglamento Interno de Orden, Higiene y Seguridad de la empresa, comprometiéndose a cumplir todas sus disposiciones.
        </div>
        <div class="clausula">
            <strong>TERCERA:</strong> El pago de las remuneraciones se efectuará mensualmente mediante depósito en la cuenta bancaria señalada, dentro de los primeros 5 días hábiles del mes siguiente.
        </div>
        <div class="clausula">
            <strong>CUARTA:</strong> El trabajador tendrá derecho a feriado legal anual de 15 días hábiles por cada año de servicios prestados.
        </div>
        <div class="clausula">
            <strong>QUINTA:</strong> Ambas partes se comprometen a mantener la confidencialidad de la información a la que tengan acceso en virtud de este contrato.
        </div>
    </div>

    <div class="firma-section">
        <p style="text-align: justify; margin-bottom: 30px;">
            Las partes firman el presente contrato en señal de conocimiento y aceptación de todas sus cláusulas en la ciudad de _________________, a los _____ días del mes de _____________ del año _______.
        </p>

        <div style="width: 100%;">
            <div class="firma-box" style="float: left;">
                <div class="firma-line"></div>
                <p><strong>FIRMA DEL TRABAJADOR</strong></p>
                <p>{{ $profesional->nombre }} {{ $profesional->apellido_uno }}</p>
                <p>RUT: {{ $profesional->rut }}</p>
            </div>

            <div class="firma-box" style="float: right;">
                <div class="firma-line"></div>
                <p><strong>FIRMA DEL EMPLEADOR</strong></p>
                <p>MEDICHILE</p>
                <p>Representante Legal</p>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>

    <div class="footer">
        <p>Este documento es de carácter oficial y confidencial - MEDICHILE © {{ date('Y') }}</p>
    </div>
</body>
</html>
