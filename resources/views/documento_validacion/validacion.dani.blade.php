<!DOCTYPE html>
<html lang="es">
<head>
	@include('documento_validacion.include.head')
</head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
<style type="text/css">
	body {
        background-image: url('{{ asset("images/documento/background_valid.jpg") }}');
        background-repeat: no-repeat;
  		background-size: auto;
	}

	.alin-centro {
        margin-top: 2%;
        margin-bottom: 2%;
    }

    .btn-modal-validar {
        color: #1a49a3;
        border-radius: 10px;
        background-color: #fff;
        text-align: left;
        padding: 10px 30px;
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
<body>

	@include('documento_validacion.include.header')

	<!--CONTENIDO-->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alin-centro align-content-center">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-center mb-4">
								<img src="https://med-sdi.cl/images/documento/medichile-logo-w.svg" width="150" alt="Medichile">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center mx-auto mb-2 text-white">
                                <h3 class="text-white">VALIDADOR DE DOCUMENTOS</h3>
                            </div>
                        </div>

                        <!--<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center mx-auto mb-2 text-white">
                                <p>Documento Valido</p>
                            </div>
                        </div>-->
                        <div class="row">	
                        	<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-2 ">       
                             <div class="card" > 
                        	    <div class="card-body">           
                            		<!--<div class="card-head text-center">                
                            			<h5 class="card-title f-20">Validación QR de Documento</h5>            
                            		</div>-->          
                        			<div class="card-body">                
                        				<h4 class="card-subtitle mb-2 text-success text-center"><i class="fas fa-check-circle"></i> Documento Valido</h4>                            
                            				<ul style="list-style: none;">                    
                            					<li style="margin-bottom: 5px;"><span class="font-weight-bold">TIPO</span><br>Receta médica retenida con control de psicotrópicos</li>                    
                            					<li style="margin-bottom: 5px;"><span class="font-weight-bold">FECHA</span><br>29-11-2023</li>                    
                            					<li style="margin-bottom: 5px;"><span class="font-weight-bold">PACIENTE</span><br> Daniela Sepúlveda Bravo</li>                    
                            					<li style="margin-bottom: 5px;"><span class="font-weight-bold">PROFESIONAL</span><br> Jaime Kriman Astorga</li>                    
                            					<li style="margin-bottom: 5px;"><span class="font-weight-bold">CANTIDAD ITEM</span><br>1 </li>      
                            					<li style="margin-bottom: 5px;"><a href="https://med-sdi.cl/pdf_receta/receta_medicamentos?id_ficha_atencion=575&amp;id_receta=22" target="_blank" class="btn btn-success btn-sm" onclick=""><i class="feather icon-file"></i> Ver Documento</a></li>                
                            				</ul>           
                            			</div>        
                                	</div>    
                                </div>
                            </div>
                    	</div>
                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center mx-auto mb-2 text-white"><p>En esta sección podrás acceder a la validación para comprobar autenticidad de nuestros documentos.</p></div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mx-auto text-center">
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_certificado();">Validar Certificado de Documento</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_firma_documento();">Validar Firma del Profesional</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_fecha_documento();">Validar Fecha Elaboración</button>
								
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_paciente_documento();">Validar Paciente</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_profesional_documento();">Validar Profesional</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="modal_validar_certificado" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-c-blue f-18" id="modal_validar_certificadoLabel">Validar Certificado de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_certificado"><div class="row">   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Tipo de Documento: </div><div class="col-12 mb-2">RECETA RETENIDA CON CONTROL DE PSICOTRÓPICOS</div>   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Cantidad de Item: </div><div class="col-12 mb-2">1</div>   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Fecha de Elaboración: </div><div class="col-12 mb-2">29-11-2023</div></div><div class="row">   <div class="col-12 font-weight-bold mb-1" style="font-size:0.85rem;">Profesional Responsable: </div><div class="col-12 mb-1" style="line-height: 1rem;">JAIME KRIMAN ASTORGA<br><span style="font-size:0.85rem;">6187674-k</span></div></div><div class="row mt-2">   <div class="col-12 font-weight-bold mb-1" style="font-size:0.85rem;">Paciente Receptor: </div><div class="col-12" style="line-height: 1rem;">DANIELA SEPÚLVEDA BRAVO<br><span class="mt-2" style="font-size:0.85rem">18382693-k</span></div></div></div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" aria-label="Close"> Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<script>
    function abrir_validar_certificado()
    {
        $('#modal_validar_certificado').modal('show');
        $('#cuerpo_modal_validar_certificado').html('');

        let url = "https://med-sdi.cl/receta/validar.certificado";

        var _token = 'BvWtk1UlFazagegnTcX8QmQISEEVb9JpTjHysWLP';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "VlQskL9TymUUtTMOMcFUNDMyTEUHW1j3ytQIV0AM",
                tkx_2: "3tOVlDI9L0A1cUNMyFMUtQQMyHUjyMUTTWsmVTkE",
                tkx_3: "MTAtNTc1OU9QLTMyQlVDUy03MUsmWEktMjIyVUFH",
                tkx_4: "y3mlHMDQyIkUTtMLONcMstF0UjVUyETWU1AM9QTV",
                tkx_5: "Imkj9OMsWTEQMHULtATyNDyUtclVyTF1UU3VQ0MM",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    var html = '';
                    /** DOCUMENTO */
                    html += '<div class="row">';
                    html += '   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Tipo de Documento</div><div class="col-12 mb-2">'+data.documento.tipo_control+'</div>';
                    html += '   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Cantidad de Item</div><div class="col-12 mb-2">'+data.documento.cantidad_item+'</div>';
                    html += '   <div class="col-12 font-weight-bold" style="font-size:0.85rem;">Fecha de Elaboración</div><div class="col-12 mb-2">'+data.documento.fecha_elaboracion+'</div>';
                    html += '</div>';
                    /** PROFESIONAL */
                    html += '<div class="row">';
                    html += '   <div class="col-12 font-weight-bold mb-1" style="font-size:0.85rem;">Profesional Responsable</div><div class="col-12 mb-1" style="line-height: 1rem;">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span style="font-size:0.85rem;">'+data.profesional.rut+'</span></div>';
                    html += '</div>';
                    /** PACIENTE */
                    html += '<div class="row mt-2">';
                    html += '   <div class="col-12 font-weight-bold mb-1" style="font-size:0.85rem;">Paciente Receptor </div><div class="col-12" style="line-height: 1rem;">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span class="mt-2" style="font-size:0.85rem">'+data.paciente.rut+'</span></div>';
                    html += '</div>';

                    $('#cuerpo_modal_validar_certificado').html(html);
                }
                else
                {
                    $('#cuerpo_modal_validar_certificado').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
        <div class="modal fade" id="modal_validar_firma_documento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-c-blue" id="modal_validar_firma_documentoLabel">Validar Firma de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_firma_documento">

                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<script>
    function abrir_validar_firma_documento()
    {
        $('#modal_validar_firma_documento').modal('show');
        $('#cuerpo_modal_validar_firma_documento').html('');

        let url = "https://med-sdi.cl/receta/validar.firma.documento";

        var _token = 'BvWtk1UlFazagegnTcX8QmQISEEVb9JpTjHysWLP';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "tFQ0TMWVAyHEkylTsU3tQUDUIMyVUO1MMcLjmT9N",
                tkx_2: "VjUQMAIWlsOLFU03mNykcU9TTDH1MEtyMUyQTVtM",
                tkx_3: "MTAtNTc1OU9QLTMyQlVDUy03MUsmWEktMjIyVUFH",
                tkx_4: "UUTy9VyMsNkHMTMjcFUWlU3QOLEtV1MItmDy0TAQ",
                tkx_5: "AMyQUN39TET0VUUkFycDTlMVUIytLtM1jmWHQsOM",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    if(data.profesional_firma.estado == 1)
                    {
                        var html = '';
                        /** FIRMA DE DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-12"><span style="color:green;">'+data.profesional_firma.msj+'</span></div>';
                        html += '</div>';
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Fecha Autorizacion de Firma </div><div class="col-6"><span style="font-weight: bold;">'+data.profesional_firma.fecha_autorizacion+'</span></div>';
                        html += '</div>';

                        /** PROFESIONAL */
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Profesional Responsable </div><div class="col-6" style="line-height: 0.8rem;"><span style="font-weight: bold;">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span style="font-size:9px;">'+data.profesional.rut+'</span></span></div>';
                        html += '</div>';

                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-6">Tipo de Documento </div><div class="col-6">'+data.documento.tipo_control+'</div>';
                        html += '   <div class="col-6">Cantidad de Item </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '   <div class="col-6">Fecha de Elaboración </div><div class="col-6">'+data.documento.fecha_elaboracion+'</div>';
                        html += '</div>';

                        // /** PACIENTE */
                        // html += '<div class="row mt-2">';
                        // html += '   <div class="col-6">Paciente Receptor: </div><div class="col-6" style="line-height: 0.8rem;">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span style="font-size:9px;">'+data.paciente.rut+'</span></div>';
                        // html += '</div>';
                    }
                    else
                    {
                        var html = '';
                        html += '<div class="row">';
                        html += '   <div class="col-12"><span style="color:red;">'+data.profesional_firma.msj+'</span></div>';
                        html += '</div>';
                    }
                    $('#cuerpo_modal_validar_firma_documento').html(html);
                }
                else
                {
                    $('#cuerpo_modal_validar_firma_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
        <div class="modal fade" id="modal_validar_fecha_documento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-c-blue" id="modal_validar_fecha_documentoLabel">Validar Fecha de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_fecha_documento">

                </div>
            </div>
           <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<script>
    function abrir_validar_fecha_documento() {
        $('#modal_validar_fecha_documento').modal('show');
        $('#cuerpo_modal_validar_fecha_documento').html('');

        let url = "https://med-sdi.cl/receta/validar.fecha.documento";

        var _token = 'BvWtk1UlFazagegnTcX8QmQISEEVb9JpTjHysWLP';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "EUmNytcts3W9yTyUQVTMI0DOM1VkLlAQTMUUHFjM",
                tkx_2: "TtIyyMUQMTUEMlH0QLUAtWVymkj9Fs1O3MNTVcUD",
                tkx_3: "MTAtNTc1OU9QLTMyQlVDUy03MUsmWEktMjIyVUFH",
                tkx_4: "OTMj9mTkH03yy1DMNtQVUtlFUAcUTEMyLWUQsIVM",
                tkx_5: "MTVIkTUVyUUDsM3F9AlM0TymMUWQH1yLcQEOjtNt",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    if(data.estado == 1)
                    {

                        var html = '';
                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-6">Fecha de Elaboración </div><div class="col-6"><span style="font-weight: bold;">'+data.documento.fecha_elaboracion+'</div>';
                        if(data.documento.dias_elaborado < 30)
                            html += '   <div class="col-6">Dias desde elaboracion</div><div class="col-6"><span style="font-weight: bold;color:green;">'+data.documento.dias_elaborado+' Día(s)</div>';
                        else
                            html += '   <div class="col-6">Dias desde elaboracion</div><div class="col-6"><span style="font-weight: bold;color:red;">'+data.documento.dias_elaborado+' Día(s)</div>';
                        html += '   <div class="col-6">Tipo de Documento: </div><div class="col-6">'+data.documento.tipo_control+'</div>';
                        // html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '</div>';

                        /** PROFESIONAL */
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Profesional Responsable</div><div class="col-6" style="line-height: 0.8rem;">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span style="font-size:9px;">'+data.profesional.rut+'</span></div>';
                        html += '</div>';

                        /** PACIENTE */
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Paciente Receptor</div><div class="col-6" style="line-height: 0.8rem;">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span style="font-size:9px;">'+data.paciente.rut+'</span></div>';
                        html += '</div>';

                        $('#cuerpo_modal_validar_fecha_documento').html(html);
                    }
                    else
                    {
                        $('#cuerpo_modal_validar_fecha_documento').html('Problema en el proceso de Validación');
                    }
                }
                else
                {
                    $('#cuerpo_modal_validar_fecha_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
        
        <div class="modal fade" id="modal_validar_paciente_documento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-c-blue" id="modal_validar_paciente_documentoLabel">Validar Paciente de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_paciente_documento">

                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<script>
    function abrir_validar_paciente_documento() {
        $('#modal_validar_paciente_documento').modal('show');
        $('#cuerpo_modal_validar_paciente_documento').html('');

        let url = "https://med-sdi.cl/receta/validar.paciente.documento";

        var _token = 'BvWtk1UlFazagegnTcX8QmQISEEVb9JpTjHysWLP';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "TjW9LttHAsMUQDcy01ETMUkQlyM3VNTIUOUmMFyV",
                tkx_2: "UcNVTLtAFskM1MjOyTUy9QVTWIyDQlUm3H0EUMMt",
                tkx_3: "MTAtNTc1OU9QLTMyQlVDUy03MUsmWEktMjIyVUFH",
                tkx_4: "TLUMIDHQUFmkOMUTM3y9yNctjsV0EyVAWQM1ltUT",
                tkx_5: "QWITOmtVDk31LAj9NM0cQyMMUysVTTEtUHUUFylM",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    if(data.estado == 1)
                    {

                        var html = '';
                        /** PACIENTE */
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Nombre </div><div class="col-6" style="line-height: 0.8rem;"><span style="font-weight: bold;">'+data.paciente.nombre+' '+data.paciente.apellido_uno+' '+data.paciente.apellido_dos+'<br><span style="font-size:9px;">'+data.paciente.rut+'</span></span></div>';
                        html += '   <div class="col-6">Email </div><div class="col-6" style="">'+data.paciente.email+'</div>';
                        html += '</div>';

                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-6">Tipo de Documento </div><div class="col-6">'+data.documento.tipo_control+'</div>';
                        html += '   <div class="col-6">Fecha de Elaboración </div><div class="col-6">'+data.documento.fecha_elaboracion+'</div>';
                        // html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '</div>';

                        $('#cuerpo_modal_validar_paciente_documento').html(html);
                    }
                    else
                    {
                        $('#cuerpo_modal_validar_paciente_documento').html('Problema en el proceso de Validación');
                    }
                }
                else
                {
                    $('#cuerpo_modal_validar_paciente_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
        <div class="modal fade" id="modal_validar_profesional_documento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-c-blue" id="modal_validar_profesional_documentoLabel">Validar Profesional de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="" id="cuerpo_modal_validar_profesional_documento">

                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<script>
    function abrir_validar_profesional_documento() {
        $('#modal_validar_profesional_documento').modal('show');
        $('#cuerpo_modal_validar_profesional_documento').html('');

        let url = "https://med-sdi.cl/receta/validar.profesional.documento";

        var _token = 'BvWtk1UlFazagegnTcX8QmQISEEVb9JpTjHysWLP';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                tkx_1: "0TTHsQ1UUFETtcWNVlMO3yyAUtQ9kMjmMUyVDILM",
                tkx_2: "UATVmtsHyN9MQIQM3jtU1yWclOLUMyTVFUM0DTEk",
                tkx_3: "MTAtNTc1OU9QLTMyQlVDUy03MUsmWEktMjIyVUFH",
                tkx_4: "ANMVTymW0tlEVF3Qjt9UUcDQT1yyOIUHkMMUMLTs",
                tkx_5: "F3yy0NHWUQ1UALEQtjTOMUmIDyTVMMTtMcklUsV9",
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                if(data.estado == 1)
                {

                    if(data.estado == 1)
                    {

                        var html = '';

                        /** PROFESIONAL */
                        html += '<div class="row mt-2">';
                        html += '   <div class="col-6">Nombre </div><div class="col-6" style="line-height: 0.8rem;"><span style="font-weight: bold;">'+data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos+'<br><span style="font-size:9px;">'+data.profesional.rut+'</span></span></div>';
                        html += '   <div class="col-6">Email: </div><div class="col-6" style="">'+data.profesional.email+'</div>';
                        // html += '   <div class="col-6">Especialidad: </div><div class="col-6" style="">'+data.profesional.especialidad+'</div>';
                        if(data.profesional.tipo_especialidad != null)
                        html += '   <div class="col-6">Especialidad: </div><div class="col-6" style="">'+data.profesional.tipo_especialidad+'</div>';
                        if(data.profesional.sub_tipo_especialidad != null)
                        html += '   <div class="col-6">Tipo Especialidad: </div><div class="col-6" style="">'+data.profesional.sub_tipo_especialidad+'</div>';
                        if(data.profesional.certificado != null)
                        html += '   <div class="col-6">Certificado: </div><div class="col-6" style="">'+data.profesional.certificado+'</div>';
                        if(data.profesional.numero_certificado != null)
                        html += '   <div class="col-6">Numero Certificado: </div><div class="col-6" style="">'+data.profesional.numero_certificado+'</div>';
                        html += '</div>';

                        /** DOCUMENTO */
                        html += '<div class="row">';
                        html += '   <div class="col-6">Tipo de Documento: </div><div class="col-6">'+data.documento.tipo_control+'</div>';
                        html += '   <div class="col-6">Fecha de Elaboración: </div><div class="col-6">'+data.documento.fecha_elaboracion+'</div>';
                        // html += '   <div class="col-6">Cantidad de Item: </div><div class="col-6">'+data.documento.cantidad_item+'</div>';
                        html += '</div>';

                        $('#cuerpo_modal_validar_profesional_documento').html(html);
                    }
                    else
                    {
                        $('#cuerpo_modal_validar_profesional_documento').html('Problema en el proceso de Validación');
                    }
                }
                else
                {
                    $('#cuerpo_modal_validar_profesional_documento').html('Problema en el proceso de Validación');
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>

	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alin-centro align-content-center">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-center mb-4">
								<img src="{{ asset("images/documento/medichile-logo-w.svg") }}" width="150" alt="Medichile">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center mx-auto mb-2 text-white"><h3 class="text-white">VALIDADOR DE DOCUMENTOS</h3></div>
                        </div>

                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center mx-auto mb-2 text-white">
                                <p>{{ $mensaje }}</p>
                            </div>
                        </div>

                        @if ($card_informacion)
                            {!! $card_informacion !!}
                        @endif
                        {{-- <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto mb-2 text-white">
                                <div class="card" style="color: #000;">
                                	<div class="card-body">
                                		<div class="card-header text-center">
                                        	<h5 class="card-title">Validación QR de Documento X</h5>
                                		</div>
                                	</div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted text-center ">Valido</h6>
                                        <p class="card-text text-center ">Información del documento:</p>

                                        <ul class="f-12" style="list-style: none;">
                                            <li style="margin-bottom: 5px;">Tipo: Receta</li>
                                            <li style="margin-bottom: 5px;">Fecha: 12-11-2023</li>
                                            <li style="margin-bottom: 5px;">Paciente: demo demo </li>
                                            <li style="margin-bottom: 5px;">Profesional: j kriman</li>
                                            <li style="margin-bottom: 5px;">Cantidad Item: 1 </li>
                                            <li style="margin-bottom: 5px;"><button type="button" class="btn btn-info btn-sm">Ver Documento</button></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center mx-auto mb-2 text-white"><p>En esta sección podrás acceder a la validación para comprobar autenticidad de nuestros documentos.</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mx-auto text-center">
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_certificado();">Validar Certificado de Documento</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_firma_documento();">Validar Firma del Profesional</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_fecha_documento();">Validar Fecha Elaboración</button>
								{{-- <button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_estado_documento();">Validar estado de documento</button> --}}
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_paciente_documento();">Validar Paciente</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_profesional_documento();">Validar Profesional</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        @include('documento_validacion.modal.certificado')
        @include('documento_validacion.modal.firma')
        @include('documento_validacion.modal.fecha')
        {{-- @include('documento_validacion.modal.estado_documento') --}}
        @include('documento_validacion.modal.paciente')
        @include('documento_validacion.modal.profesional')

	</div>
	<!--CIERRE CONTENIDO-->





	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/aos.js') }}"></script>

    <script>

    </script>

</body>
</html>
