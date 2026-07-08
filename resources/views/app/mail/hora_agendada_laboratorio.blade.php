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
    <td class="px-pad" style="padding:18px 26px 12px 26px;">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
            <tr>

                <!-- LOGO -->
                <td class="header-cell" align="left" valign="middle" width="130">
                    <img
                    src="https://www.med-sdi.cl/images/sdi-color-h.svg"
                    width="100"
                    alt="SDI"
                    style="width:100px; display:block;">
                </td>

                <!-- TITULO -->
                <td class="header-title-cell" align="right" valign="middle">
                    <p style="margin:0;font-size:11px; font-family:Helvetica, Arial, sans-serif;letter-spacing:2px;text-transform:uppercase;color:#31bebe;font-weight:700;">
                        Hora Médica Agendada
                    </p>
                </td>

            </tr>
        </table>

    </td>
</tr>

<!-- HERO -->
<tr>
<td style="padding:0 45px 20px 45px; text-align:center;">

<h2 style="
    margin:18px 0 12px 0;
    color:#0f172a;
    font-size:17px;
    line-height:42px;
    font-weight:700;
">
Hola, {{ $detalle['body']['nombre_paciente'] }}
</h2>

<p style="
    margin:0;
    color:#64748b;
    font-size:14px;
    line-height:21px;
">
Tu hora fue agendada correctamente.<br>
Puedes confirmar o cancelar tu cita utilizando los botones inferiores.
</p>

</td>
</tr>

 <!-- FECHA HORA -->
    <tr>
        <td class="px-pad" style="padding:12px 22px;">

            <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
            style="border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">

            <tr>

                <td class="stack-cell" align="center" style="padding:12px;border-right:1px solid #edf2f7;">
                     <img style="width:35px;"
                                        src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                        alt="Día">
                    <p style="font-family:Helvetica, Arial, sans-serif;margin:0;font-size:12px;color:#64748b;font-weight:700;">Fecha</p>
                    <p style="font-family:Helvetica, Arial, sans-serif;margin:3px 0 0 0;font-size:14px;color:#1a49a3;font-weight:700;">
                        {{ $detalle['body']['fecha'] }}
                    </p>
                </td>

                <td class="stack-cell" align="center" style="padding:12px;">
                     <img style="width:35px;"
                                        src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                        alt="Día">
                    <p style="font-family:Helvetica, Arial, sans-serif;margin:0;font-size:12px;color:#64748b;font-weight:700;">Hora</p>
                    <p style="font-family:Helvetica, Arial, sans-serif;margin:3px 0 0 0;font-size:14px;color:#1a49a3;font-weight:700;">
                        {{ $detalle['body']['hora'] }}
                    </p>
                </td>

            </tr>
        </table>

    </td>
</tr>



<!-- BOTONES -->
<tr>
<td align="center" style="padding:20px 20px 20px 20px;">

<table border="0" cellspacing="0" cellpadding="0">
<tr>

<!-- CONFIRMAR -->
<td align="center"
    style="
        border-radius:20px;
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
        border-radius:20px;
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
<td style="padding:0 20px 20px 20px;">

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
     padding:12px 12px;
    border-bottom:1px solid #e2e8f0;
">

<p style="
    margin:0;
    font-size:12px;
     padding:3px;
    color:#1a49a3;
    font-weight:700;
    text-transform: uppercase;
">
Información de su cita
</p>

</td>
</tr>

<!-- PROCEDIMIENTO -->
<tr>
<td style="
     padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Procedimiento
</td>

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
{{ $detalle['body']['procedimiento'] }}
</td>
</tr>

@if(!empty($detalle['body']['indicaciones']))
<tr style="background:#fcfdff;">

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Indicaciones
</td>

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
{!! $detalle['body']['indicaciones'] !!}
</td>

</tr>
@endif

<tr>

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#1a49a3;
    font-weight:700;
    border-bottom:1px solid #f1f5f9;
">
Lugar
</td>

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
    color:#475569;
    border-bottom:1px solid #f1f5f9;
">
<strong>{{ $detalle['body']['lugar_atencion'] }}</strong><br>
<i>{{ $detalle['body']['direccion'] }}</i>
</td>

</tr>

<!--<tr style="background:#fcfdff;">

<td style="
    padding:10px 10px;
    font-size:11px;
    text-transform: uppercase;
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

</tr>-->

</table>

</td>
</tr>

<!-- ALERTA -->
<tr>
<td style="padding:0 20px 20px 20px;">

<table width="100%" style="
    background:#eef4ff;
    border-left:4px solid #1a49a3;
    border-radius:14px;
    padding:14px;
">

<tr>
<td style="
    font-size:12px;
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

 <p style="margin:0;font-size:11px;color:#64748b;line-height:16px;">
    Este correo fue enviado por <strong>SDI</strong><br>
    &copy; {{ date('Y') }} &middot; Todos los derechos reservados
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
