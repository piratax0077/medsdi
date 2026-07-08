<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Certificado de Reposo</title>
	<style>
		@page {
			margin: 24px 30px;
		}

		body {
			font-family: DejaVu Sans, Arial, sans-serif;
			font-size: 12px;
			color: #333;
			margin: 0;
		}

		.header {
			text-align: center;
			margin-bottom: 18px;
		}

		.logo {
			width: 150px;
			margin-bottom: 10px;
		}

		.title {
			font-size: 18px;
			font-weight: bold;
			color: #0f6e6d;
			text-transform: uppercase;
			margin: 0 0 6px;
		}

		.subtitle {
			font-size: 11px;
			color: #666;
			margin: 0;
		}

		.box {
			border: 1px solid #d9e2e1;
			border-radius: 8px;
			padding: 14px 16px;
			margin-bottom: 14px;
		}

		.box h3 {
			margin: 0 0 10px;
			font-size: 13px;
			color: #0f6e6d;
			text-transform: uppercase;
			letter-spacing: 0.4px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		td {
			vertical-align: top;
			padding: 4px 0;
		}

		.label {
			width: 22%;
			font-weight: bold;
			color: #4b4b4b;
		}

		.value {
			width: 28%;
		}

		.paragraph {
			line-height: 1.6;
			text-align: justify;
			margin: 0;
		}

		.two-col {
			width: 100%;
		}

		.two-col td {
			width: 50%;
			vertical-align: top;
			padding-right: 10px;
		}

		.qr-wrap {
			text-align: center;
			margin-top: 6px;
		}

		.qr-wrap img {
			width: 110px;
			height: 110px;
		}

		.signature {
			margin-top: 32px;
			text-align: center;
		}

		.signature-line {
			display: inline-block;
			width: 280px;
			border-top: 1px solid #333;
			padding-top: 6px;
			font-size: 11px;
		}

		.muted {
			color: #777;
			font-size: 10px;
		}

		.small {
			font-size: 11px;
		}
	</style>
</head>
<body>
	@php
		$pacienteNombre = $array_paciente['nombre'] ?? 'Paciente';
		$pacienteRut = $array_paciente['rut'] ?? '-';
		$pacienteSexo = $array_paciente['sexo'] ?? '-';
		$pacienteTelefono = $array_paciente['telefono_uno'] ?? '-';
		$pacienteEmail = $array_paciente['email'] ?? '-';
		$pacienteDireccion = $array_paciente['direccion'] ?? '-';

		$fechaEmision = $array_ficha_atencion['created_at'] ?? date('d/m/Y');
		$fechaInicio = $detalle_certificado['fecha_inicio'] ?? '-';
		$fechaTermino = $detalle_certificado['fecha_termino'] ?? '-';
		$hipotesis = $detalle_certificado['hipotesis'] ?? '-';
		$comentarios = $detalle_certificado['comentarios'] ?? '';

		$profesionalNombre = $array_profesional['nombre'] ?? '-';
		$profesionalRut = $array_profesional['rut'] ?? '-';
		$profesionalEspecialidad = $array_profesional['especialidad'] ?? '-';
		$profesionalColegio = $array_profesional['num_colegio'] ?? '-';

		$lugarNombre = $array_lugar_atencion['nombre'] ?? '-';
		$lugarDireccion = $array_lugar_atencion['direccion'] ?? '-';
		$lugarComuna = $array_lugar_atencion['comuna'] ?? '-';
		$lugarRegion = $array_lugar_atencion['region'] ?? '-';

		$qrDocumento = $array_ficha_atencion['qr'] ?? null;
		$qrProfesional = $array_profesional['qr'] ?? null;
	@endphp

	<div class="header">
		<img class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}" alt="MediChile">
		<p class="title">Certificado de Reposo</p>
		<p class="subtitle">Emitido el {{ $fechaEmision }}</p>
	</div>

	<div class="box">
		<h3>Datos del paciente</h3>
		<table>
			<tr>
				<td class="label">Nombre</td>
				<td class="value">{{ $pacienteNombre }}</td>
				<td class="label">RUT</td>
				<td class="value">{{ $pacienteRut }}</td>
			</tr>
			<tr>
				<td class="label">Sexo</td>
				<td class="value">{{ $pacienteSexo }}</td>
				<td class="label">Teléfono</td>
				<td class="value">{{ $pacienteTelefono }}</td>
			</tr>
			<tr>
				<td class="label">Correo</td>
				<td class="value" colspan="3">{{ $pacienteEmail }}</td>
			</tr>
			<tr>
				<td class="label">Dirección</td>
				<td class="value" colspan="3">{{ $pacienteDireccion }}</td>
			</tr>
		</table>
	</div>

	<div class="box">
		<h3>Indicación médica</h3>
		<p class="paragraph">
			Se certifica que el paciente <strong>{{ $pacienteNombre }}</strong> debe permanecer en reposo médico desde
			<strong>{{ $fechaInicio }}</strong> hasta <strong>{{ $fechaTermino }}</strong>.
		</p>
		<table style="margin-top: 10px;">
			<tr>
				<td class="label">Hipótesis diagnóstica</td>
				<td>{{ $hipotesis }}</td>
			</tr>
			@if(!empty($comentarios))
			<tr>
				<td class="label">Comentarios</td>
				<td>{{ $comentarios }}</td>
			</tr>
			@endif
		</table>
	</div>

	<table class="two-col">
		<tr>
			<td>
				<div class="box" style="min-height: 220px;">
					<h3>Datos del profesional</h3>
					<table>
						<tr>
							<td class="label">Profesional</td>
							<td>{{ $profesionalNombre }}</td>
						</tr>
						<tr>
							<td class="label">RUT</td>
							<td>{{ $profesionalRut }}</td>
						</tr>
						<tr>
							<td class="label">Especialidad</td>
							<td>{{ $profesionalEspecialidad }}</td>
						</tr>
						<tr>
							<td class="label">N° Colegio</td>
							<td>{{ $profesionalColegio }}</td>
						</tr>
						<tr>
							<td class="label">Centro</td>
							<td>{{ $lugarNombre }}</td>
						</tr>
						<tr>
							<td class="label">Dirección</td>
							<td>{{ $lugarDireccion }}</td>
						</tr>
						<tr>
							<td class="label">Comuna / Región</td>
							<td>{{ $lugarComuna }} / {{ $lugarRegion }}</td>
						</tr>
					</table>
				</div>
			</td>
			<td>
				<div class="box" style="min-height: 220px;">
					<h3>Verificación</h3>
					<p class="paragraph small">Este documento puede verificarse mediante los códigos QR incorporados.</p>
					<div class="qr-wrap">
						@if(!empty($qrDocumento))
							<div>
								<img src="data:image/svg+xml;base64,{{ base64_encode($qrDocumento) }}" alt="QR documento">
								<div class="muted">QR del certificado</div>
							</div>
						@endif
					</div>
					<div class="qr-wrap" style="margin-top: 14px;">
						@if(!empty($qrProfesional))
							<div>
								<img src="data:image/svg+xml;base64,{{ base64_encode($qrProfesional) }}" alt="QR profesional">
								<div class="muted">QR del profesional</div>
							</div>
						@endif
					</div>
				</div>
			</td>
		</tr>
	</table>

	<div class="signature">
		<div class="signature-line">
			{{ $profesionalNombre }}<br>
			<span class="muted">{{ $profesionalEspecialidad }}</span>
		</div>
	</div>
</body>
</html>
