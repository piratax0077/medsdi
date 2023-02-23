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
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>
    
@endsection

<!-- CONTENT -->
@section('content')
    <div class="container-fluid">
        <!-- MENU -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">FICHA MÉDICA ÚNICA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                <!--
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Link
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Link</a>
                </li>
                -->
                </ul>
                <form class="d-flex">                
                <a class="btn btn-outline-success mr-1" href="Mi_Ficha_Medica_Pdf?token={{$token}}&funcionalidad=D" target="_blank">DOWNLOAD FICHA</a>
                <a class="btn btn-outline-success" href="Mi_Ficha_Medica_Pdf?token={{$token}}&funcionalidad=V" target="_blank">IMPRIMIR FICHA</a>
                </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="mt-4">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-link active" href="#">RESUMEN</a>
                <!--
                <a class="nav-link" href="#">Antecedentes Básicos del paciente</a>
                <a class="nav-link" href="#">Transfusiones y donación de órganos</a>
                -->
            </nav>
        </div>    
    </div>    
    
    <!-- ANTECEDENTES BASICOS -->
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Antecedentes Básicos del paciente</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Información del Paciente</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4">Nombre: <span id="nombre">{{$paciente->nombres}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Apellidos: <span id="apellido">{{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Rut: <span id="rut">{{$paciente->rut}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Fecha nacimiento: <span id="edad">{{$paciente->fecha_nac}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Edad: <span id="edad">{{$paciente->edad}}</span></label>                                                                                                        </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Teléfono: <span id="telefono">{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Dirección: <span id="direccion">{{$paciente->apellido_uno}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Comuna/Región: <span id="comuna">{{$paciente->apellido_uno}}</span></label>                                                                        
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Contacto de Emergencia</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4">Nombre: <span id="nombre_contacto">{{$contacto_emergencia->nombre}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Apellidos: <span id="apellido_contacto">{{$contacto_emergencia->apellido_uno}} {{$contacto_emergencia->apellido_dos}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Rut: <span id="rut_contacto">{{$contacto_emergencia->rut}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Edad: <span id="edad_contacto">{{$contacto_emergencia->edad}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Teléfono: <span id="telefono_contacto">{{$contacto_emergencia->telefono}}</span></label>                                                                        
                                </div>
                                <div class="form-group fill">
                                    <label for="inputEmail4">Parentezco: <span id="direccion_contacto">{{$contacto_emergencia->parentezco}}</span></label>                                                                        
                                </div>
                                
                            </div>                           
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>


    <!-- RESUMEN -->
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>RESUMEN</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Grupo Sanguíneo</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="grupo_sanguineo">{{$grupo_sanguineo->nombre_gs}}</span></label>                                                                        
                                </div>        
                                <div class="row">
                                    <div class="col-md-12"><h5>Medicamentos de Uso Crónico</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="medicamento_uso_cronico"></span></label>                                                                        
                                </div>   
                                <div class="row">
                                    <div class="col-md-12"><h5>¿Acepta Transfusiones?</h5></div>
                                </div>               
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="acepta_transfusiones"></span></label>                                                                        
                                </div>                                        
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Últimas Cirugías</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="ultimas_cirugias"></span></label>                                                                        
                                </div>        
                                <div class="row">
                                    <div class="col-md-12"><h5>Enfermedades Crónicas</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="enfermedades_cronicas"></span></label>                                                                        
                                </div>   
                                <div class="row">
                                    <div class="col-md-12"><h5>Alergias</h5></div>
                                </div>       
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="alergias"></span></label>                                                                        
                                </div>   
                            </div>                           
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

    <!-- TRANSFUCIONES -->
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRANSFUSIONES Y DONACIÓN DE ÓRGANOS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Donante Total</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="grupo_sanguineo"></span></label>                                                                        
                                </div>        
                                <div class="row">
                                    <div class="col-md-12"><h5>Donante Parcial</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="medicamento_uso_cronico">{{$antecedentes_paciente->dona_organos_parcial}}</span></label>                                                                        
                                </div>   
                                <div class="row">
                                    <div class="col-md-12"><h5>Organos a Donar</h5></div>
                                </div>               
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="acepta_transfusiones">{{$antecedentes_paciente->dona_organos}}</span></label>                                                                        
                                </div>        
                                <div class="row">
                                    <div class="col-md-12"><h5>Donar Sangre</h5></div>
                                </div>               
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="acepta_transfusiones">{{$antecedentes_paciente->dona_sangre}}</span></label>                                                                        
                                </div>                                    
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12"><h5>Realiza Transfusiones</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="ultimas_cirugias">{{$antecedentes_paciente->transfusion}}</span></label>                                                                        
                                </div>        
                                <div class="row">
                                    <div class="col-md-12"><h5>Impedimento Donar</h5></div>
                                </div>   
                                <div class="form-group fill">
                                    <label for="inputEmail4"><span id="enfermedades_cronicas">{{$antecedentes_paciente->impedimento_donar}}</span></label>                                                                        
                                </div>                                  
                            </div>                           
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>



    <!-- 
        TRATAMIENTO 
        CONTROL DE PATOLOGÍAS CRÓNICAS | HIPERTENSIÓN ARTERIAL | OBESIDAD | DIABETES         
    -->
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>CONTROL DE PATOLOGÍAS CRÓNICAS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="accordion" id="accordionExample">
                                    <div class="card mb-0">
                                        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="mb-0"><a href="#!"  class="color-azul">HIPERTENSIÓN ARTERIAL</a></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0">
                                        <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <h5 class="mb-0"><a href="#!" class="collapsed color-azul" >OBESIDAD</a></h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <h5 class="mb-0"><a href="#!" class="collapsed color-azul" >DIABETES</a></h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>


    <!--  
        TRATAMIENTO MÉDICOS
        TRATAMIENTOS ODONTOLÓGICOS
        TRATAMIENTO ODONTOLÓGICO POR PIEZA 
        TRATAMIENTO Y ANTECEDENTES PREVIOS
    -->
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRATAMIENTO MÉDICOS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">

                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRATAMIENTOS ODONTOLÓGICOS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                                
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRATAMIENTO ODONTOLÓGICO POR PIEZA </h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                                
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>
    <div class="container-fluid">            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TRATAMIENTO Y ANTECEDENTES PREVIOS</h5>
                    </div>
                    <div class="card-body">                                             
                        <div class="row">
                            <div class="col-sm-12">
                                
                            </div>        
                        </div>                        
                    </div>
                </div>    
            </div>
        </div>                              
    </div>

@endsection


