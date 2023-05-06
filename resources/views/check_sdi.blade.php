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
</style>    
@endsection

<!-- SCRIPT -->
@section('page-script')
    <!-- Tablas ficha médica única-->
    <script src="{{ asset('/js/check_sdi/main.js') }}"></script>
    
@endsection

<!-- CONTENT -->
@section('content')
@csrf
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
                        <!--<a href="{{$url_nueva}}?token={{$token}}" class="btn btn-info"><b>Volver a Solicitar</b></a>-->
                        <a href="Check_sdi?id_recept={{$id_recept}}&urla={{$url_anterior}}&urln={{$url_nueva}}&token={{$token}}" class="btn btn-info"><b>Volver a Solicitar</b></a>
                        <a href="{{$url_anterior}}" class="btn btn-danger"><b>Cancelar Solicitud</b></a>
                        
                    </div>
                    <div class="card-footer text-muted badge badge-primary">
                        @php
                            echo 'Fecha y hora de la solicitud: '.date('Y-m-d H:i:s');                        
                        @endphp
                    </div>
                </div>
            </div>      
        </div>        
    </div>    


@endsection


