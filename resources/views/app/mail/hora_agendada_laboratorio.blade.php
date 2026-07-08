<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hora Agendada</title>
</head>

<body style="margin:0; padding:0; background-color:#eef3f9;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td align="center" style="padding:40px 15px;">

<table width="100%" style="
    max-width:640px;
    background:#ffffff;
    border-radius:30px;
    overflow:hidden;
    font-family:'Segoe UI', Arial, sans-serif;
    box-shadow:0 12px 45px rgba(15,23,42,0.08);
">

<!-- TOP BAR -->
<tr>
<td style="
    height:7px;
    background:linear-gradient(90deg,#1a49a3 0%, #31bebe 100%);
"></td>
</tr>

<!-- HEADER -->
<tr>
<td style="
    text-align:center;
    padding:42px 30px 22px 30px;
">

<img 
   src="https://www.med-sdi.cl/images/logo_pais_vertical.png"
    alt="SDI"
    width="95"
    style="

        padding:14px;
    "
>

</td>
</tr>

<!-- HERO -->
<tr>
<td style="padding:0 45px 20px 45px; text-align:center;">

<p style="
    margin:0;
    font-size:13px;
    letter-spacing:2px;
    text-transform:uppercase;
    color:#31bebe;
    font-weight:700;
">
Hora Médica Agendada
</p>

<h2 style="
    margin:18px 0 12px 0;
    color:#0f172a;
    font-size:20px;
    line-height:42px;
    font-weight:700;
">
Hola, {{ $detalle['body']['nombre_paciente'] }}
</h2>

<p style="
    margin:0;
    color:#64748b;
    font-size:17px;
    line-height:30px;
">
Tu hora fue agendada correctamente.<br>
Puedes confirmar o cancelar tu cita utilizando los botones inferiores.
</p>

</td>
</tr>

<!-- CARD FECHA Y HORA -->
<tr>
<td style="padding:10px 35px 10px 35px;">

<table width="100%" style="
    background:#ffffff;
    border:1px solid #e2e8f0;
    border-radius:24px;
">

<tr>

<!-- FECHA -->
<td width="50%" align="center" style="
    padding:28px 20px;
    border-right:1px solid #edf2f7;
">

<img src="https://www.med-sdi.cl/images/email/calendario_1.png" alt="Fecha"
    width="34"
    style="margin-bottom:10px;"
>

<p style="
    margin:0;
    font-size:14px;
    font-weight: 700;
    color:#64748b;
">
Fecha
</p>

<p style="
    margin:8px 0 0 0;
    font-size:17px;
    font-weight:700;
    color:#1a49a3;
">
{{ $detalle['body']['fecha'] }}
</p>

</td>

<!-- HORA -->
<td width="50%" align="center" style="
    padding:28px 20px;
">

<img 
       src="https://www.med-sdi.cl/images/email/reloj_1.png" alt="Hora"
    width="34"
    style="margin-bottom:10px;"
>

<p style="
    margin:0;
    font-size:14px;
    color:#64748b;
     font-weight: 700;
">
Hora
</p>

<p style="
    margin:8px 0 0 0;
    font-size:17px;
    font-weight:700;
    color:#1a49a3;
">
{{ $detalle['body']['hora'] }}
</p>

</td>

</tr>
</table>

</td>
</tr>

<!-- BOTONES -->
<tr>
<td align="center" style="padding:35px 25px 20px 25px;">

<table border="0" cellspacing="0" cellpadding="0">
<tr>

<!-- CONFIRMAR -->
<td align="center"
    style="
        border-radius:50px;
        background:linear-gradient(135deg,#31bebe 0%, #1995a8 100%);
        box-shadow:0 10px 25px rgba(49,190,190,0.28);
    "
>

<a href="{{ $detalle['body']['link_confirmacion'] }}" 
   style="
        display:inline-block;
        padding:17px 32px;
        color:#ffffff;
        text-decoration:none;
        font-size:15px;
        font-weight:700;
   ">
Confirmar hora
</a>

</td>

<td width="14"></td>

<!-- CANCELAR -->
<td align="center"
    style="
        border-radius:50px;
        background:linear-gradient(135deg,#ef4444 0%, #dc2626 100%);
        box-shadow:0 10px 25px rgba(239,68,68,0.22);
    "
>

<a href="{{ $detalle['body']['link_cancelacion'] }}" 
   style="
        display:inline-block;
        padding:17px 32px;
        color:#ffffff;
        text-decoration:none;
        font-size:15px;
        font-weight:700;
   ">
Cancelar hora
</a>

</td>

</tr>
</table>


</td>
</tr>

<!-- INFORMACION -->
<tr>
<td style="padding:10px 35px 25px 35px;">

<table width="100%" style="
    background:#ffffff;
    border:1px solid #e2e8f0;
    border-radius:24px;
    overflow:hidden;
">

<!-- HEADER -->
<tr>
<td colspan="2" style="
    background:#f8fbff;
    padding:22px 24px;
    border-bottom:1px solid #e2e8f0;
">

<p style="
    margin:0;
    font-size:18px;
    color:#1a49a3;
    font-weight:700;
">
Información de tu Atención
</p>

</td>
</tr>

<!-- PROCEDIMIENTO -->
<tr>
<td style="
    padding:18px 24px;
    font-size:14px;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Procedimiento
</td>

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
{{ $detalle['body']['procedimiento'] }}
</td>
</tr>

@if(!empty($detalle['body']['indicaciones']))
<tr style="background:#fcfdff;">

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Indicaciones
</td>

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
{!! $detalle['body']['indicaciones'] !!}
</td>

</tr>
@endif

<tr>

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Lugar
</td>

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
{{ $detalle['body']['lugar_atencion'] }}
</td>

</tr>

<tr style="background:#fcfdff;">

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#1a49a3;
    font-weight:700;
">
Dirección
</td>

<td style="
    padding:18px 24px;
    font-size:14px;
    color:#475569;
">
{{ $detalle['body']['direccion'] }}
</td>

</tr>

</table>

</td>
</tr>

<!-- ALERTA -->
<tr>
<td style="padding:0 35px 30px 35px;">

<table width="100%" style="
    background:#eef4ff;
    border-left:4px solid #1a49a3;
    border-radius:14px;
    padding:18px;
">

<tr>
<td style="
    font-size:14px;
    color:#1e3a8a;
    line-height:24px;
">

<strong>Importante:</strong><br>
Presentarse en la consulta con 15 minutos de anticipación.

</td>
</tr>

</table>

</td>
</tr>

<!-- FOOTER -->
<tr>
<td style="
    background:#f1f5f9;
    border-top:1px solid #dbe4ee;
    padding:38px 40px;
    text-align:center;
">

<p style="
    margin:0;
    font-size:13px;
    line-height:26px;
    color:#64748b;
">

Este correo fue enviado por

<span style="font-weight:700;">
Salud Digital Integrada
</span>

<br>

<span style="
    font-size:12px;
">
© <span id="year"></span> SDI · Todos los derechos reservados
</span>

</p>

</td>
</tr>

</table>

</td>
</tr>
</table>

<script>
document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
