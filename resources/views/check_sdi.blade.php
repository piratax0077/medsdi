<!-- BASE -->
@extends('layouts.base')

<!-- STYLES -->
@section('page-styles')
<style>
    .color-azul{
        color: #4680ff;
    }
    .color-azul:hover{
        color: #4680ff;
    }
    .advertencia {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    .tiempo-restante {
        font-weight: bold;
        font-size: 18px;
        color: #4680ff;
    }
</style>
@endsection

<!-- SCRIPT -->
@section('page-script')
    <!-- Tablas ficha médica única-->
    <script>
        let intentos = 0;
        const MAX_INTENTOS = 40; // 40 * 3 segundos = 2 minutos máximo

        $(document).ready(function(){
            checkToken();
        });

        function checkToken(){
            intentos++;

            // ✅ NUEVA VALIDACIÓN: No exceder máximo de intentos
            if (intentos > MAX_INTENTOS) {
                mostrarError('Ha expirado el tiempo para procesar la solicitud. Por favor, intente nuevamente.');
                return;
            }

            @php
            if(Auth::check())
                echo 'let url = "Check_sdi_token";';
            else
                echo 'let url = "Check_sdi_token_external";';
            @endphp

            var _token = $('input[name=_token]').val();
            var token_ = $('#token_').val();   // TOKEN EXTERNO - URL EXTERNA
            var token = '{{$token}}'; // TOKEN APP

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    token: token // TOKEN INTERNO - URL CON LOGIN AUTH
                },
                success: (resp)=>{
                    if(resp.estado==1) {
                        if(resp.registro && resp.registro.estado==1) {
                            // ✅ Token válido y aprobado
                            redirigir(token, token_);
                        } else {
                            // Esperando aprobación
                            var tiempo_restante = resp.tiempo_restante || resp.tiempo || 0;
                            $('#tiempo-restante').text(Math.ceil(tiempo_restante) + ' seg');
                            setTimeout(checkToken, 3000);
                        }
                    } else {
                        // Token vencido o inválido
                        mostrarError('La solicitud ha expirado. ' + resp.msj);
                    }
                },
                error: (xhr)=>{
                    console.warn('Error en checkToken:', xhr);
                    if (xhr.status === 401 || xhr.status === 403) {
                        mostrarError('Acceso denegado. Token inválido.');
                    } else {
                        mostrarError('Error de conexión. Reintentando...');
                        setTimeout(checkToken, 3000);
                    }
                }
            });
        }

        function redirigir(token, token_){
            if(token_ != '') {
                top.location.href=$('#url_nueva').val()+'/'+token_;
            } else {
                var url_nueva = $('#url_nueva').val();
                if(url_nueva.indexOf("?") > -1) {
                    top.location.href = url_nueva + '&token=' + token;
                } else {
                    top.location.href = url_nueva + '?token=' + token;
                }
            }
        }

        function mostrarError(mensaje){
            var html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                       '<strong>Error:</strong> ' + mensaje +
                       '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>' +
                       '</div>';
            $('#contenedor-mensajes').html(html);
        }
    </script>

@endsection

<!-- CONTENT -->
@section('content')
@csrf
    <input type="hidden" id="token_" value="{{$token_ ?? ''}}">
    <input type="hidden" id="token" value="{{$token}}">
    <input type="hidden" id="url_nueva" value="{{$url_nueva}}">

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                       <h4>SOLICITUD SDI</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Se ha generado una solicitud de permiso a su aplicación</h5>
                        <p class="card-text">Debe ingresar a su aplicacion y validar el permiso.</p>
                        <p class="card-text">Fecha y hora para validar permiso: <span class="badge badge-primary">{{$fecha_termino}}</span></p>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary mt-1 mb-3" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                <!-- Contenedor de mensajes de error -->
                <div id="contenedor-mensajes" class="mt-3"></div>
            </div>
        </div>
    </div>


@endsection


