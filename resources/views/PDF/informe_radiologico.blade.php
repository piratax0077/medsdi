<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <style>
            .informe-container {
                padding: 20px;
                margin: 20px 0;
            }
            .informe-header {
                background-color: #f8f9fa;
                padding: 15px;
                border-left: 4px solid #4CAF50;
                margin-bottom: 20px;
            }
            .informe-header h2 {
                color: #2c3e50;
                margin: 0 0 10px 0;
                font-size: 18px;
                border-bottom: 2px solid #dee2e6;
                padding-bottom: 10px;
            }
            .datos-paciente {
                margin-bottom: 20px;
            }
            .datos-paciente table {
                width: 100%;
                border-collapse: collapse;
            }
            .datos-paciente td {
                padding: 8px 0;
            }
            .datos-paciente td:first-child {
                font-weight: bold;
                color: #495057;
                width: 150px;
            }
            .informe-content {
                background-color: white;
                padding: 20px;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                min-height: 200px;
                line-height: 1.6;
            }
            .informe-content h1,
            .informe-content h2,
            .informe-content h3,
            .informe-content h4,
            .informe-content h5,
            .informe-content h6 {
                color: #2c3e50;
                margin-top: 15px;
                margin-bottom: 10px;
            }
            .informe-content p {
                margin: 10px 0;
            }
            .informe-content ul,
            .informe-content ol {
                margin: 10px 0;
                padding-left: 30px;
            }
            .informe-content strong {
                font-weight: bold;
            }
            .informe-content em {
                font-style: italic;
            }
            .informe-content u {
                text-decoration: underline;
            }
        </style>
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header_informe_rayo')
    @include('PDF.footer')
    <main>
        <div class="informe-container">

            {{-- Contenido del Informe Radiológico --}}
            <div class="informe-header">
                <h2>Informe Radiológico</h2>
            </div>
            <div class="informe-content">
                {!! $cuerpo['detalle_informe_medico']['informe_medico'] !!}
            </div>

            {{-- Fecha del Informe --}}
            <div style="margin-top: 30px; text-align: right; color: #6c757d; font-size: 12px;">
                <p>Fecha de emisión del informe: {{ $cuerpo['detalle_informe_medico']['fecha_informe_medico'] }}</p>
            </div>
        </div>
    </main>
</html>
