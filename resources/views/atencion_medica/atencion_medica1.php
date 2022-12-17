<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once('../include/head.php');
    ?>
    <link rel="stylesheet" href="../assets/css/escritorio_profesional.css?t=<?=time()?>">
    <link rel="stylesheet" href="../assets/css/card_estilo.css?t=<?=time()?>">
    <link rel="stylesheet" href="../assets/css/boton-flotante.css?t=<?=time()?>">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <!-- data tables css -->
    <link rel="stylesheet" href="../assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/responsive.bootstrap4.min.css">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="../assets/css/plugins/dropzone.min.css?t=<?=time()?>">

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="../assets/css/accordion.css?t=<?=time()?>">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="../assets/css/card_sidebar.css?t=<?=time()?>">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="../assets/css/pills_modals.css?t=<?=time()?>">

     <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="../assets/css/tab_wizard_formularios.css?t=<?=time()?>">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="../assets/css/bs_canvas.css?t=<?=time()?>">

    <!-- Otros estilos de atencion medica -->
    <link rel="stylesheet" href="../assets/css/estilos_atencion_medica.css?t=<?=time()?>">
</head>
<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    <?php
    require_once('../include/menu_profesional.php');
    require_once('../include/header.php');
    ?>
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12 mb-2">
                            <div class="page-header-title">
                                <h5 class="m-b-10 text-white d-inline ml-4" style="font-size: 1.2rem;"><strong>Registro de Atención Médica</strong></h5>
                                <button type="button" class="btn btn-outline-light btn-sm  d-inline float-right mr-4">Finalizar atención</button>
                                <!--Al finalizar la atención aparece una alerta "¿Está seguro de finalizar la atención médica?, al finalizar la atención me redirige a el escritorio del profesional-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Menú Pills-->
            <div class="row mx-4 mt-n4 mb-0 shadow">
                <div class="col-sm-12 sin_padding bg-info">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            Ficha Clínica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-formularios-atencion" role="tab" aria-controls="pills-formularios-atencion" aria-selected="false">
                            Licencia vxvcxcv</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-fmu-tab" data-toggle="pill" href="#pills-fmu" role="tab" aria-controls="pills-fmu" aria-selected="false">
                            Ficha Médica Única</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-atencion-previas-tab" data-toggle="pill" href="#pills-atencion-previas" role="tab" aria-controls="pills-atencion-previas" aria-selected="false">
                            Atenciones Previas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-examenes-tab " data-toggle="pill" href="#pills-examenes" role="tab" aria-controls="pills-examenes" aria-selected="false">
                            Resultados de Exámenes</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Cierre: Menú Pills-->
            <!--Contenido Pills-->
            <div class="row mx-4 mt-0 shadow" style=" height:740px; overflow: scroll;">
                <div class="col-sm-12 rounded-bottom" style="background-color: #fff;">
                    <div class="tab-content" id="pills-tabContent">
                        <!--Ficha Atención General-->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="col-sm-12">
                                <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                                Ficha de Atención General
                                </h5>
                            </div>
                            <!--Formulario / Menor de edad-->
                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Paciente Menor de Edad</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Nombre del acompañante</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                </div>
                                                <div class="form-group col-md-6" id="form_0">
                                                    <label class="floating-label">Relación</label>
                                                    <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Menor de edad-->
                            <!--Formulario / Motivo de la Consulta-->
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header bg-info">
                                        <h6>Motivo de la Consulta</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <input type="text" class="form-control form-control-sm" name="descripcion_consulta" id="descripcion_consulta">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario /Motivo de la Consulta-->
                            <!--Formulario / Antecedentes-->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Antecedentes-->
                            <!--Formulario / Examen Físico-->
                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Examen Físico</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_examen_fisico" id="descripcion_examen_fisico"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Examen Físico-->
                            <!--Formulario / Signos vitales y otros-->
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-header bg-info align-middle">
                                        <h6 class="float-left d-inline">Signos vitales y Otros</h6>
                                        <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                    </div>
                                    <div class="card-body" id="form_3" style="display:none">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label">Tº</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label">Pulso</label>
                                                    <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Frec. Reposo</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Talla</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">IMC</label>
                                                    <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Estado Nutricional</label>
                                                    <input type="text" class="form-control form-control-sm" name="re" id="re">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group mb-1">
                                                    <label><strong>Presión Arterial</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="p_arterial">
                                                        <label for="p_arterial" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row" id="form_1" style="display:none">
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">BI</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">BD</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">De pié</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Sentado</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group mb-1">
                                                    <label><strong>Comunicación y traslado</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="com_trasl">
                                                        <label for="com_trasl" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row" id="form_2" style="display:none">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Estado de conciencia</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lenguaje</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Traslado</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Signos vitales y otros-->
                            <!--Formulario / Diagnóstico-->
                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Diagnóstico</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Hipótesis Diagnóstica</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnóstico CIE-10</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Diagnóstico-->
                            <!--Otros Formularios-->
                            <div class="row px-3">
                                <!--Modal Indicar Medicamentos-->
                                <div id="modal_indicar_medicamentos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title text-white mt-1" id="modal_indicar_medicamentos">Indicar Medicamento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Medicamento</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Dosis</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Frecuencia</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Vía de Administración</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Periodo</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                            <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle">Medicamento</th>
                                                                            <th class="text-center align-middle">Dosis</th>
                                                                            <th class="text-center align-middle">Frecuencia</th>
                                                                            <th class="text-center align-middle">Vía Administración</th>
                                                                            <th class="text-center align-middle">Periodo</th>
                                                                            <th class="text-center align-middle">Eliminar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><span>Paracetamol</span><br><span>500mg</span></td>
                                                                            <td class="text-center align-middle">1 Comprimido</td>
                                                                            <td class="text-center align-middle">8 Horas</td>
                                                                            <td class="text-center align-middle">Oral</td>
                                                                            <td class="text-center align-middle">7 días</td>
                                                                            <td class="text-center align-middle">
                                                                                <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--Cierre: Tabla-->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">
                                                Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Indicar Medicamentos-->
                                <!--Modal Indicar Exámenes-->
                                <div id="modal_indicar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Nombre del Examen</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Tipo de Examen</label>
                                                                <select class="form-control form-control-sm" id="" name="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label">Prioridad</label>
                                                                <select class="form-control form-control-sm">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Examen</button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle">Nombre Examen</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            <th class="text-center align-middle">Prioridad</th>
                                                                            <th class="text-center align-middle">Eliminar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><span>Hemograma y vhs</span></td>
                                                                            <td class="text-center align-middle">Sangre</td>
                                                                            <td class="text-center align-middle">Urgente</td>
                                                                            <td class="text-center align-middle">
                                                                                <button href="#!" class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--Cierre Tabla-->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">
                                                Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Indicar Exámenes-->
                                <div class="col-md-6 mx-auto">
                                    <!--Botón Modal 01 / Indicar Medicamentos-->
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_indicar_medicamentos"><i class="fa fa-plus"></i> Indicar Medicamento</button>
                                    <!--Cierre: Botón Modal 01 / Indicar Medicamentos-->
                                </div>
                                <div class="col-md-6 mx-auto">
                                    <!--Botón Modal 02 / Indicar Examenes-->
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_indicar_examen"><i class="fa fa-plus"></i> Indicar Examen</button>
                                    <!--Cierre: Botón Modal 02 / Indicar Examenes-->
                                </div>
                            </div>
                            <div class="row px-3 mt-3 mb-3">
                                <div class="col-md-4 mx-auto">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="enf_cronico" name="check_1" data-toggle="modal" data-target="#form_enfermo_cronico">
                                                    <label for="enf_cronico" class="cr"></label>
                                                </div>
                                                <label>¿Es enfermo crónico?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-warning mx-auto" role="alert">
                                                <table class="table table-borderless mt-0 mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                            <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                            <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                            <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="modal_ges">
                                                    <label for="modal_ges" class="cr" data-toggle="modal" data-target="#form_ges"></label>
                                                </div>
                                                <label>Ges</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="alert alert-warning mx-auto my-0" role="alert">
                                            <table class="table table-borderless mt-0 mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02</td>
                                                        <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="otros_formularios_3">
                                                <label for="otros_formularios_3" class="cr"></label>
                                            </div>
                                            <label>Confidencial</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-warning mx-auto" role="alert">
                                                <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro de atención médica es confidencial</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar Ficha Clínica</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Ficha Atención General-->
                        <!--Formularios de Licencia-->
                        <div class="tab-pane fade" id="pills-formularios-atencion" role="tabpanel" aria-labelledby="pills-formularios-atencion-tab">
                            <div class="row pl-2 pr-4">
                                <div class="col-md-12 mx-auto">
                                    <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">Formulario de Licencias Médicas</h5>
                                </div>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tipo_licencia_1">
                                                <label for="tipo_licencia_1" class="cr"></label>
                                            </div>
                                            <label>Enfermedad común o maternal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tipo_licencia_2">
                                                <label for="tipo_licencia_2" class="cr"></label>
                                            </div>
                                            <label>Laboral</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Información del trabajador</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                        Previsión
                                                        </label>
                                                        <select class="form-control form-control-sm" name="" id="">
                                                            <option>Seleccione</option>
                                                            <option>..</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" class="btn btn-sm btn-success btn-block">Verificar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Empleador</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_empleador" id="nombre_empleador">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Reposo</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Desde</label>
                                                        <input type="date" name="daterange" class="form-control form-control-sm"/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hasta</label>
                                                        <input type="date" name="daterange" class="form-control form-control-sm"/>
                                                    </div>
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                        Tipo de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                                            <option>Seleccione una opción</option>
                                                            <option>Total</option>
                                                            <option>Mañana</option>
                                                            <option>Tarde</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                        Lugar de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                                            <option>Seleccione una opción</option>
                                                            <option>Domicilio personal</option>
                                                            <option>Domicilio de familiar</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Dirección</label>
                                                        <input type="person" class="form-control form-control-sm" name="direccion" id="direccion">
                                                    </div>
                                                    <div class="form-group col-sm-4 col-md-4">
                                                        <label class="floating-label">Región / Comuna</label>
                                                        <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                                            <option selected value="0">Seleccione una opción</option>
                                                                <optgroup label="Región de Valparaíso"> 
                                                                    <option>Viña del Mar</option> 
                                                                    <option>Valparaíso</option> 
                                                                    <option>San Felipe</option>
                                                                    <option>etc...</option>
                                                                </optgroup> 
                                                                <optgroup label="Región Metropolitana"> 
                                                                    <option >Santiago</option> 
                                                                    <option >Maipú</option> 
                                                                    <option >etc...</option> 
                                                                </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Información de licencia</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4 mt-2">
                                                        <label class="floating-label">
                                                        Tipo de Licencia
                                                        </label>
                                                        <select class="form-control d-inline form-control-sm" name="" id="">
                                                            <option>Seleccione</option>
                                                            <option>..</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="switch switch-success d-inline m-r-2">
                                                            <input type="checkbox" id="info_licencia_1">
                                                            <label for="info_licencia_1" class="cr"></label>
                                                        </div>
                                                        <label>Recuperabilidad Laboral</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="switch switch-success d-inline m-r-2">
                                                            <input type="checkbox" id="info_licencia_2">
                                                            <label for="info_licencia_2" class="cr"></label>
                                                        </div>
                                                        <label>Inicio Trámite de Invalidez</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico principal</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group fill col-sm-6 col-md-6">
                                                        <label class="floating-label">
                                                        CIE-10
                                                        </label>
                                                        <input type="text" class="form-control form-control-sm" name="cie_10" id="cie_10">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6">
                                                        <label class="floating-label">Diagnóstico</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Otros antecedentes</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12">
                                                        <label class="floating-label">Descripción</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Examenes de apoyo</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <input type="file" class="form-control-file pb-3" id="exampleFormControlFile1">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar Licencia</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Cierre: Formularios de Licencia-->
                        <!--Acceso Ficha Médica Única (FMU)-->
                        <div class="tab-pane fade" id="pills-fmu" role="tabpanel" aria-labelledby="pills-fmu-tab">
                            <div class="row">
                                <div class="col-md-4 mx-auto m-ingreso-ficha">
                                    <!--Ingreso a Ficha Médica Única-->    
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <img src="../assets/images/iconos/candado.svg" alt="" class="img-fluid mb-4 wid-90">
                                            <p class="f-w-400 mb-4">Ingrese uno de los códigos de seguridad que se le ha enviado por correo electrónico</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form>
                                                <div class="form-group">
                                                <label class="floating-label" for="password">Código de seguridad</label>
                                                <input type="password" class="form-control form-control-sm" name="" id="" placeholder="">
                                            </div>
                                            </form>
                                            <button class="btn btn-sm btn-block btn-info mb-2">
                                            Acceder a Ficha Médica Única
                                            </button>
                                            <p class="mb-2 text-muted text-center">¿No has recibido los códigos de seguridad?<br> podemos <a href="recuperarclave.php" class="f-w-400 text-dark"> volver a enviarlos</a></p>
                                        </div>
                                    </div>
                                    <!-- Cierre: Ingreso a Ficha Médica Única-->
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Acceso Ficha Médica Única (FMU)-->
                        <!--Atenciones Médicas Previas-->
                        <div class="tab-pane fade" id="pills-atencion-previas" role="tabpanel" aria-labelledby="pills-atencion-previas-tab">
                            <div class="col-sm-12">
                                <h5 class="text-c-blue mt-5" style="font-size: 1.1rem;">
                                Atenciones Previas
                                </h5>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pb-4">
                                    <table id="atenciones_previas_1" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Diagnóstico</th>
                                                <th class="text-center align-middle">Recetas</th>
                                                <th class="text-center align-middle">Exámenes</th>
                                                <th class="text-center align-middle">Archivos </th>
                                                <th class="text-center align-middle">Ficha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">27/07/2021</td>
                                                <td class="text-center align-middle">Rinitis Vasomotora</td>
                                                <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_cons_receta"><i class="feather icon-file-plus"></i> Ver Receta</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                <button type="button" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#m_cons_ex"><i class="feather icon-file-plus"></i> Ver Exámenes</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant"><i class="feather icon-file-text"></i> Ver Ficha</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">27/08/2021</td>
                                                <td class="text-center align-middle">Rinitis Alergica</td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_cons_receta"><i class="feather icon-file-plus"></i> Ver Receta</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#m_cons_ex"><i class="feather icon-file-plus"></i> Ver Exámenes</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant"><i class="feather icon-file-text"></i> Ver Ficha</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">02/09/2021</td>
                                                <td class="text-center align-middle">Otitis Externa</td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_cons_receta"><i class="feather icon-file-plus"></i> Ver Receta</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#m_cons_ex"><i class="feather icon-file-plus"></i> Ver Exámenes</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant"><i class="feather icon-file-text"></i> Ver Ficha</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Atenciones Médicas Previas-->
                        <!--Atenciones Resultados Examenes-->
                        <div class="tab-pane fade" id="pills-examenes" role="tabpanel" aria-labelledby="pills-examenes-tab">
                            <div class="row px-3">
                                <div class="col-sm-6 mt-5">
                                    <h5 class="text-c-blue" style="font-size: 1.1rem;">
                                        Resultado de Exámenes
                                    </h5>
                                </div>
                                <div class="col-sm-6 mt-5">
                                <!--Modal 04 / Subir Examen-->
                                <div id="modal_adjuntar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_adjuntar_examen" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                                                Adjuntar Examen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Fecha</label>
                                                                <input type="date" class="form-control form-control-sm" name="" id="">
                                                                </input>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Nº de Orden</label>
                                                                <input type="number" name="" id="" type="text" class="form-control form-control-sm">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Nombre del Examen</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Tipo de Examen</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option>Seleccione una opción</option>
                                                                    <option>..</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <form action="../assets/json/file-upload.php" class="dropzone">
                                                                <div class="fallback">
                                                                    <input name="file" type="file" multiple/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" class="btn btn-success btn-sm float-right">
                                                            <i class="fa fa-plus"></i> Agregar Examen</button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle">Fecha</th>
                                                                            <th class="text-center align-middle">Nº Orden</th>
                                                                            <th class="text-center align-middle">Nombre del Examen</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            <th class="text-center align-middle">Examen</th>
                                                                            <th class="text-center align-middle">Eliminar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                                                            <td class="text-center align-middle">7217821</td>
                                                                            <td class="text-center align-middle">Ecografia Doppler</td>
                                                                            <td class="text-center align-middle">Imagenología</td>
                                                                            <td class="text-center align-middle"><button href="#!" class="btn btn-info btn-sm btn-icon"><i class="feather icon-file-text"></i></button></td>
                                                                            <td class="text-center align-middle">
                                                                                <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            <!--Cierre Tabla-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Modal 04 / Subir Examen-->
                                <!--Botón Modal 04 / Subir Examen-->
                                <button type="button" class="btn btn-success btn-sm float-right mt-1" data-toggle="modal" data-target="#modal_adjuntar_examen"><i class="fa fa-plus"></i> Agregar Examen</button>
                                <!--Cierre: Botón Modal 04 / Subir Examen-->
                            </div>
                        </div>
                        <hr>
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-wizard active" id="examenes_general_tab" data-toggle="pill" href="#pills_bandeja_entrada" role="tab" aria-controls="pills-home" aria-selected="true">Bandeja de entrada</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="examenes_general_tab" data-toggle="pill" href="#pills_examenes_general" role="tab" aria-controls="pills-profile" aria-selected="false">Exámenes en general</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tablas_examenes">
                            <div class="tab-pane fade show active" id="pills_bandeja_entrada" role="tabpanel" aria-labelledby="examenes_general_tab">
                                <div class="dt-responsive table-responsive pb-4">
                                    <table id="tabla-2" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Nº de Orden</th>
                                                <th class="text-center align-middle">Nombre del Examen</th>
                                                <th class="text-center align-middle">TIpo de Examen</th>
                                                <th class="text-center align-middle">Examen</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">23/05/2019</td>
                                                <td class="text-center align-middle">782638</td>
                                                <td class="text-center align-middle">Hemograma completo</td>
                                                <td class="text-center align-middle">Examen Sangre</td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills_examenes_general" role="tabpanel" aria-labelledby="examenes_general_tab">
                                <div class="dt-responsive table-responsive pb-4">
                                    <table id="tabla-3" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Nº de Orden</th>
                                                <th class="text-center align-middle">Nombre del Examen</th>
                                                <th class="text-center align-middle">TIpo de Examen</th>
                                                <th class="text-center align-middle">Examen</th>
                                                <th class="text-center align-middle">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">23/05/2019</td>
                                                <td class="text-center align-middle">782638</td>
                                                <td class="text-center align-middle">Hemograma completo</td>
                                                <td class="text-center align-middle">Examen Sangre</td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Examen</button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Atenciones Resultados Examenes-->
                    </div>
                </div>
            </div>
            <!--Cierre:Contenido Pills-->
            <!--Sidebar 1-->    
            <div id="antecedentes_paciente" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
                <header class="bs-canvas-header p-3 bg-info overflow-auto">
                    <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                    <h5 class="d-inline-block text-light mb-0 float-right mt-1">Antecedentes del paciente</h5>
                </header>
                <div class="bs-canvas-content">
                    <div class="accordion" id="accordionExample">
                        <div class="card-sidebar mb-0 rounded-0">
                            <div class="card-header-sidebar" id="headingOne">
                                <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                INFORMACIÓN DEL PACIENTE
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body-sidebar">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Nombres</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            Nombre_1 Nombre_2
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            Apellido_1 Apellido_2 
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            00.000.000-0
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Nacimiento</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            26/08/1993
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Edad</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            27
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Sexo</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            Mujer
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            Calle, Nº...
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            Viña del Mar, Región de Valparaíso
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                                        <div class="col-7 ml-2 text-secondary">
                                            paciente@gmail.com
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                                        <div class="col-7 ml-2 text-secondary">
                                        283764892
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    CONTACTO DE EMERGENCIA
                                    </button>
                                </h2>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body-sidebar">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    0000000-0
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Nombre</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Luis
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Sepúlveda Pino
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Calle Nº... 
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Viña del Mar, Región de Valparaíso
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    paciente@gmail.com
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    283764892
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-sidebar">
                        <div class="card-header-sidebar" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                ANTECEDENTES MÉDICOS
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body-sidebar">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Alergias e Intolerancias a medicamentos</label>
                                    <div class="col-7 ml-2 text-secondary listas_sidebar">
                                        <ul>
                                            <li>Ketoprofeno</li>
                                            <li>Naproxeno</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Otras Alergias e Intolerancias</label>
                                    <div class="col-7 ml-2 text-secondary listas_sidebar">
                                        <ul>
                                        <li>Chocolate</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Operaciones</label>
                                    <div class="col-7 ml-2 text-secondary listas_sidebar">
                                        <ul>
                                            <li>Laparotomía exploradora</li>
                                            <li>Reparación unilateral de hernia inguinal</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Incidentes en Cirugía</label>
                                    <div class="col-7 ml-2 text-secondary listas_sidebar">
                                        <ul>
                                            <li>??</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Grupo Sanguíneo</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    AB-
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Acepta Transfusión de Sangre</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Si
                                    </div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-row mt-1">
                                    <label class="col-4 text-info-2 font-weight-bolder">Donante de Órganos</label>
                                    <div class="col-7 ml-2 text-secondary">
                                    Si
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseThree"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    PATOLOGÍAS CRÓNICAS
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseCuatro" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body-sidebar">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">
                                        ¿Es paciente crónico?
                                        </label>
                                        <div class="col-7 ml-2 text-secondary">
                                        Si
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="form-row mt-1">
                                        <label class="col-4 text-info-2 font-weight-bolder">
                                        Patologías Crónicas
                                        </label>
                                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                                            <ul>
                                                <li>Asma</li>
                                                <li>Hipertensión</li>
                                                <li>Diabetes tipo 1</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCinco" aria-expanded="false" aria-controls="collapseThree">
                                    ATENCIONES MÉDICAS PREVIAS<i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseCinco" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body-sidebar">
                                    <div class="row mr-2">
                                        <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                            <p class="pt-3 pl-2 text-secondary">16 de Junio de 2016 - 13:00 hrs<br>
                                            Otorrinolaringologia<br>
                                            Dr.Jaime Kriman Astorga
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mr-2">
                                        <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                            <p class="pt-3 pl-2 text-secondary">23 de Enero de 2020 - 19:00 hrs<br>
                                            Otorrinolaringologia<br>
                                            Dr.Jaime Kriman Astorga
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mr-2">
                                        <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                            <p class="pt-3 pl-2 text-secondary">18 de Mayo de 2021 - 08:00 hrs<br>
                                            Otorrinolaringologia<br>
                                            Dr.Jaime Kriman Astorga
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mr-2">
                                        <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                            <p class="pt-3 pl-2 text-secondary">01 de Agosto de 2021 - 12:45 hrs<br>
                                            Otorrinolaringologia<br>
                                            Dr.Jaime Kriman Astorga
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
            <!--Cierre: Sidebar 1-->
            <!--Sidebar 2-->   
            <div id="formularios_atencion" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="300px" data-offset="true">
                <header class="bs-canvas-header p-3 bg-info overflow-auto">
                    <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
                    <h5 class="d-inline-block text-light mb-0 float-right mt-1">Formularios Atención</h5>
                </header>
                <div class="bs-canvas-content">
                    <div class="accordion" id="accordion_formularios_atencion">
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="heading_form_generales">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_form_generales" aria-expanded="true" aria-controls="collapse_form_generales"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    FORMULARIOS GENERALES
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_form_generales" class="collapse" aria-labelledby="heading_form_generales" data-parent="#accordion_formularios_atencion">
                                <div class="card-body-sidebar">
                                    <!--Boton Modal Formulario certificado de reposo-->
                                    <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_certificado_reposo">Certificado de reposo</button>

                                    <!--Boton Modal Formulario de interconsulta--> 
                                    <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_interconsulta">Interconsulta</button> 

                                    <!--Boton Modal Formulario de informe médico--> 
                                    <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_inf_medico">Informe Médico</button> 

                                    <!--Boton Modal formulario uso personal--> 
                                    <button type="button" class="btn btn-sm btn-info  btn-block accion_modal_uso_personal">Uso Personal</button>  
                                </div>
                            </div>
                        </div>
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="heading_form_notificaciones">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_form_notificaciones" aria-expanded="false" aria-controls="collapse_form_notificaciones"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    FORMULARIOS DE NOTIFICACIÓN
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_form_notificaciones" class="collapse" aria-labelledby="heading_form_notificaciones" data-parent="#accordion_formularios_atencion">
                                <div class="card-body-sidebar">
                                    <!--Boton Modal Formulario Constancia Ges-->
                                    <button type="button" class="btn btn-sm btn-info btn-block accion_modal_constancia_ges">Constancia GES</button>

                                    <!--Boton Modal Formulario Enfermedades de Declaración Obligatoria -->
                                    <button type="button" class="btn btn-sm btn-info btn-block accion_modal_enfermedades_declaracion_obligatoria">Enfermedades de Declaración Obligatoria</button>

                                    <!--Boton Modal Formulario Reembolso Médico-->
                                    <button type="button" class="btn btn-sm btn-info btn-block accion_modal_reembolso_medico">Reembolso Gastos Médicos</button>

                                    <!--Boton Modal Formulario Reembolso Dental-->
                                    <button type="button" class="btn btn-sm btn-info btn-block accion_modal_reembolso_dental">Reembolso Gastos Dentales</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-sidebar">
                            <div class="card-header-sidebar" id="heading_consentimientos_informados">
                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    CONSENTIMIENTOS INFORMADOS GENERALES
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_formularios_atencion">
                                <div class="card-body-sidebar">
                                    <!--Boton Modal Formulario Antestesia-->
                                    <button type="button" class="btn btn-sm btn-info btn-block accion_modal_anestesia">Antestesia</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!--Cierre: Sidebar 2-->
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Footer-->
    <footer>
     <?php
     require_once('../include/footer.php');
     ?>
    </footer>


<!--***************MODALS*******************-->

<!--Modals Formularios generales--> 

    <!---******* Modal Formulario certificado de reposo ********-->
    <div id="modal_certificado_reposo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_certificado_reposo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Certificado de reposo</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_certificado_reposo">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-sm-12 col-md-12 mb-1 mt-2">
                              <p class="text-c-blue">El Profesional que suscribe certifica que este paciente debe permanecer en reposo</p>
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                              <label class="floating-label-activo-sm">Desde</label>
                                <input type="date" class="form-control form-control-sm" name="date" id="date">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                              <label class="floating-label-activo-sm">Hasta</label>
                                <input type="date" class="form-control form-control-sm" name="date" id="date">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                              <label class="floating-label">Hipótesis Diagnóstica</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                              <label class="floating-label">Comentarios</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario de interconsulta ********-->
    <div id="modal_interconsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Interconsulta</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body mb-0">
                    <form id="interconsulta">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                    <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso"> 
                                        <option>Viña del Mar</option> 
                                        <option>Valparaíso</option> 
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup> 
                                    <optgroup label="Región Metropolitana"> 
                                        <option >Santiago</option> 
                                        <option >Maipú</option> 
                                        <option >etc...</option> 
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </form>
                        <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-interconsulta" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link-modal active" id="pills-tab-inter-especialidad" data-toggle="pill" href="#pills-inter-especialidad" role="tab" aria-controls="pills-home" aria-selected="true">Interconsulta Especialidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-modal" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-interconsulta">
                        <div class="tab-pane fade show active" id="pills-inter-especialidad" role="tabpanel" aria-labelledby="pills-tab-inter-especialidad">
                            <form id="inter-especialidad">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre especialidad o especialista</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Se desea saber</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center mb-2">
                                        <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                    </div>
                                </div>
                                <div class="modal-footer pt-2 pb-0">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form id="inter-especialidad">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Tratamiento</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Comentario</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre del profesional</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha de control</label>
                                        <input type="date" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center mb-2">
                                        <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                    </div>
                                </div>
                                <div class="modal-footer pt-2 pb-0">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar Respuesta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario informe médico ********-->
    <div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Informe Médico</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_informe_medico">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                    <option selected value="0">Seleccione una opción </option>
                                     <optgroup label="Región de Valparaíso"> 
                                         <option>Viña del Mar</option> 
                                         <option>Valparaíso</option> 
                                         <option>San Felipe</option>
                                         <option>etc...</option>
                                     </optgroup> 
                                     <optgroup label="Región Metropolitana"> 
                                         <option >Santiago</option> 
                                         <option >Maipú</option> 
                                         <option >etc...</option> 
                                     </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Descripción</label>
                                <textarea type="text" class="form-control form-control-sm" rows="3" name="" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario uso personal ********-->
    <div id="modal_uso_personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_uso_personal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Uso Personal</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_uso_personal">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirigido a</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Cargo</label>
                                <input type="person" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Mensaje</label>
                                <textarea type="text" class="form-control form-control-sm" rows="12" name="mensaje" id="mensaje"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
       </div>
    </div>


<!--Modals Formularios de Notificación--> 

    <!---******* Modal Formulario Constancia Ges ********-->
    <div id="modal_constancia_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_constancia_ges" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Constancia GES (Artículo 24 Ley 19.966)</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="wizard_constancia_ges">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#datos_prestador_ges" class="nav-link-wizard rounded-0" data-toggle="tab">Datos del prestador</a></li>
                            <li class="tab-wizard-formularios"><a href="#datos_paciente_ges" class="nav-link-wizard rounded-0" data-toggle="tab">Datos del paciente</a></li>
                            <li class="tab-wizard-formularios"><a href="#informacion_medica_ges" class="nav-link-wizard rounded-0" data-toggle="tab">Información médica</a></li>
                             <li class="tab-wizard-formularios"><a href="#constancia_ges" class="nav-link-wizard rounded-0" data-toggle="tab">Constancia</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="datos_prestador_ges">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Prestador</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_institucion" id="nombre_institucion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Dirección</label>
                                            <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre del responsable</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_responsable" id="nombre_responsable">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Rut del responsable</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_responsable" id="rut_responsable">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="datos_paciente_ges">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Paciente</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_paciente" id="rut_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm"  >
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Dirección</label>
                                            <input type="address" class="form-control form-control-sm" name="direccion_paciente" id="direccion_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="email" class="form-control form-control-sm" name="email_paciente" id="email_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono_paciente" id="telefono_paciente">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informacion_medica_ges">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Información Médica</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Confirmación diagnóstica GES</label>
                                            <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_1" id="confirmacion_diagnostica_1">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">¿Confirmación diagnóstica?</label>
                                            <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_2" id="confirmacion_diagnostica_2">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">¿Paciente con tratamiento?</label>
                                            <input type="text" class="form-control form-control-sm" name="paciente_tratamiento" id="paciente_tratamiento">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Notificación</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Hora</label>
                                            <input type="time" class="form-control form-control-sm" name="fecha" id="fecha">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="constancia_ges">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Declaro que con esta <span>fecha</span> y
                                            <span>hora</span>, he tomado conocimiento de que tengo derecho a acceder a las "Garantías Explícitas en Salud" GES, siempre que la atención sea otorgada en la "Red de Prestadores" que me corresponde según Fonasa o la Isapre a la que me encuentro adscrito/a.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario enfermedades de declaración obligatoria ********-->
    <div id="modal_enfermedades_declaracion_obligatoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_enfermedades_declaracion_obligatoria" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Enfermedades de declaración obligatoria E.N.O</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="enfermedades_declaracion_obligatoria">
                        <ul class="nav nav-pills">
                        <li class="tab-wizard-formularios"><a href="#ident_establecimiento_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del establecimiento</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_paciente_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del paciente</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_clinica_paciente_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Información clínica del paciente</a></li>
                        <li class="tab-wizard-formularios"><a href="#notificacion_eno" class="nav-link-wizard rounded-0" data-toggle="tab">Notificación</a></li>
                    <div class="tab-content">
                        <div class="tab-pane pt-4 active show" id="ident_establecimiento_eno">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del establecimiento</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre del establecimiento</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_establecimiento" id="nombre_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Código del establecimiento</label>
                                        <input type="number" class="form-control form-control-sm" name="codigo_establecimiento" id="codigo_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre de oficina provincial</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_oficina_provincial" id="nombre_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Código de oficina provincial</label>
                                        <input type="number" class="form-control form-control-sm" name="codigo_oficina_provincial" id="codigo_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nº de ficha clínica o código de control</label>
                                        <input type="number" class="form-control form-control-sm" name="numero_ficha_control" id="numero_ficha_control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ident_paciente_eno">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del Paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Rut</label>
                                        <input type="person" class="form-control form-control-sm" name="rut_paciente" id="rut_paciente">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nombre completo</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="sexo_paciente" id="sexo_paciente">
                                        </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="nacimiento_paciente" id="nacimiento_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Dirección</label>
                                        <input type="address" class="form-control form-control-sm" name="direccion_paciente" id="direccion_paciente">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Región / Comuna</label>
                                        <select id="prevision" name="prevision" class="form-control form-control-sm"  >
                                            <option selected value="0">Seleccione una opción </option>
                                                <optgroup label="Región de Valparaíso"> 
                                                <option value="1">Viña del Mar</option> 
                                                <option value="2">Valparaíso</option> 
                                                <option value="3">San Felipe</option>
                                                <option value="3">etc...</option>
                                                </optgroup> 
                                                <optgroup label="Región Metropolitana"> 
                                                <option value="10">Santiago</option> 
                                                <option value="11">Maipú</option> 
                                                <option value="12">etc...</option> 
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Correo electrónico</label>
                                        <input type="email" class="form-control form-control-sm" name="email_paciente" id="email_paciente">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm" name="telefono_paciente" id="telefono_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nacionalidad</label>
                                        <input type="text" class="form-control form-control-sm" name="nacionalidad_paciente" id="nacionalidad_paciente">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Código de nacionalidad</label>
                                        <input type="number" class="form-control form-control-sm" name="nacionalidad_paciente" id="nacionalidad_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Seleccione pueblo originario</label>
                                        <select class="form-control form-control-sm" id="pueblo_originario" name="pueblo_originario">
                                        <option value="0">Selecione una opción</option>
                                        <option value="1">Ninguna</option>
                                        <option value="2">Atacameño</option>
                                        <option value="3">Aimara</option>
                                        <option value="5">Colla</option>
                                        <option value="6">etc..</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Ocupación</label>
                                        <input type="text" class="form-control form-control-sm" name="ocupacion_paciente" id="ocupacion_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Condición</label>
                                        <select class="form-control form-control-sm" id="ocupacion_condicion" name="ocupacion_condicion">
                                        <option>Seleccione condición</option>
                                        <option>Inactivo/a</option>
                                        <option>Activo/a</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Categoría</label>
                                        <select class="form-control form-control-sm" id="ocupacion_categoria" name="ocupacion_categoria">
                                            <option>Seleccione categoría</option>
                                            <option>Patrón / Empresario</option>
                                            <option>Empleado</option>
                                            <option>Obrero</option>
                                            <option>Trabajador Independiente</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ident_clinica_paciente_eno">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información clínica del paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnósico Confirmado</label>
                                        <input type="text" class="form-control form-control-sm" name="diagnostico_confirmado" id="diagnostico_confirmado">
                                    </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">CIE-10</label>
                                        <input type="text" class="form-control form-control-sm" name="cie-10" id="cie-10">
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label-activo-sm">Primeros síntomas</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_primeros_sintomas" id="fecha_primeros_sintomas">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label">País de contagio</label>
                                <select class="form-control form-control-sm" id="vacunacion" name="vacunacion">
                                <option>Seleccione una opción</option>
                                <option>Chile</option>
                                <option>Extranjero</option>
                                </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label">País</label>
                                <input type="text" class="form-control form-control-sm" name="pais" id="pais">
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                <h6 class="text-c-blue">Antecedentes de Vacunación</h6>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label">Vacunación</label>
                                <select class="form-control form-control-sm" id="vacunacion" name="vacunacion">
                                <option>Seleccione una opción</option>
                                <option>Si</option>
                                <option>No</option>
                                <option>Ignorado</option>
                                <option>No corresponde</option>
                                </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label-activo-sm">Fecha última dosis</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_ultima_dosis" id="fecha_ultima_dosis">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                <label class="floating-label-activo-sm">Nº última dosis</label>
                                <input type="number" class="form-control form-control-sm" name="numero_ultima_dosis" id="numero_ultima_dosis">
                                </div>
                                </div>
                                <div class="form-row mt-0 pt-0">
                                <div class="form-group col-sm-12 col-md-12">
                                <p class="mb-0 pb-0">Completar solo si la declaración corresponde a TBC</p>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Solo para TBC(NUEVO-RECAIDA)</label>
                                <input type="text" class="form-control form-control-sm" name="nuevo_tbc" id="nuevo_tbc">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">RECAIDAS</label>
                                <input type="text" class="form-control form-control-sm" name="recaidas_tbc" id="recaidas_tbc">
                                </div>
                                </div>
                            </form>
                        </div>
                    <div class="tab-pane pt-4" id="notificacion_eno">
                    <form></form>
                    <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                    <h6 class="text-c-blue">Información del profesional que notifica</h6>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label">Rut</label>
                    <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label">Nombres y Apellidos</label>
                    <input type="text" class="form-control form-control-sm" name="nombre_apellidos" id="nombre_apellidos">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label">Teléfono</label>
                    <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label">Correo Electrónico</label>
                    <input type="email" class="form-control form-control-sm" name="correo" id="correo">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                    <h6 class="text-c-blue">Notificación</h6>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label-activo-sm">Fecha</label>
                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                    <label class="floating-label-activo-sm">Hora</label>
                    <input type="time" class="form-control form-control-sm" name="fecha" id="fecha">
                    </div>          
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <h5 class="text-c-blue text-center mt-3">Instructivo boletín notificación de enfermedades de declaración obligatoria (boletín E.N.O)</h5>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                    <ol class="px-2">
                    <li value="1"><p>Los Items <strong>Nombre; Establecimiento</strong>;<strong>Oficina Provincial</strong>;<strong>Codigos Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo originario declarado</strong>;<strong> Comuna de residencia</strong>, etc. <a href="https://deis.minsal.cl" class="link-negro"> Los puede consultar acá. </a></p></li>
                    <li><p>Para el(la) enfermo(a) que presente 2 o más afecciones de declaración obligatoria, éstas deberán ser registradas en <span class="auto-style1"><strong>FORMULARIOS SEPARADOS</strong></span> para cada una. Sólo en caso de Tuberculosis se registrará en la 2da. línea otro diagnóstico relacionado con esta afección.</p></li>
                    </ol>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                    <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                    </div>
                    </div>
                    </form>
                    </div>
                    <div class="row justify-content-between mx-0 btn-page">
                    <div class="col-sm-6 pl-0">
                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                    </div>
                    <div class="col-sm-6 text-md-right pr-0">
                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                    </div>
                    </div>
                    </div>

    <!---******* Modal Formulario Reembolso gastos médicos ********-->
    <div id="modal_reembolso_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_reembolso_medico" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Reembolso de gastos médicos</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_medicos">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga" class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud" class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso" class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a></li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico" class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_personal_tratante" class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Aseguradora</label>
                                            <input type="text" class="form-control form-control-sm" name="aseguradora" id="aseguradora">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº Poliza</label>
                                            <input type="number" class="form-control form-control-sm" name="num_poliza" id="num_poliza">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Empresa asociada</label>
                                            <input type="text" class="form-control form-control-sm" name="empresa_asociada" id="empresa_asociada">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre Asegurado</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_asegurado" id="nombre_asegurado">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut asegurado</label>
                                            <input type="person" class="form-control form-control-sm" type="rut_asegurado" name="rut_asegurado">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm"  >
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_carga" id="tipo_carga">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_carga" id="numero_carga">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Causa de la solicitud</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Causa</label>
                                            <select class="form-control form-control-sm" id="causa" name="causa">
                                                <option>Accidente</option>
                                                <option>Continuidad de tratamiento</option>
                                                <option>Enfermedad</option>
                                                <option>Embarazo</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Especifique otro</label>
                                            <input type="text" class="form-control form-control-sm" type="causa_otro" name="causa_otro">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" type="diagnostico_causa" name="diagnostico_causa">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Continuidad de tratamiento?</label>
                                            <select class="form-control form-control-sm" id="causa" name="causa">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" type="fecha_accidente" name="fecha_accidente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar del accidente</label>
                                            <select class="form-control form-control-sm " id="lugar_accidente" name="lugar_accidente">
                                                <option>Seleccione una opción</option>
                                                <option>Vía Pública</option>
                                                <option>Hogar</option>
                                                <option>Trayecto al trabajo</option>
                                                <option>Trayecto al hogar</option>
                                                <option>Trabajo</option>
                                                <option>Tránsito</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Por este medio certifico que los datos aportados son verdaderos y autorizo al médico tratante hospitales o cualquier otra institución de salud , para que suministre la información requerida de mi persona o beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del código Sanitario declaro también conocer y autorizar a que todos los antecedentes en esta solicitud de reembolso serán del conocimiento de las diferentes personas que participan en la evaluación, liquidación y traslado de la misma , por lo que libero a la compañía aseguradora de toda responsabilidad en el manejo de la misma. En el caso de requerir confidencialidad, rogamos enviar en sobre cerrado al departamento de salud con el rotulo de confidencial. Recuerde que en el caso de accidente del tránsito, <strong>deberá presentar la liquidación del seguro obligatorio de accidentes personales.</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>                               
                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de prestación</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_prestación" id="fecha_prestación">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Bonos</label>
                                            <input type="text" class="form-control form-control-sm" name="bonos" id="bonos">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Total de documentos</label>
                                            <input type="text" class="form-control form-control-sm" name="total_documentos" id="total_documentos">
                                    </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Boletas</label>
                                            <input type="text" class="form-control form-control-sm" name="boletas" id="boletas">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Recetas</label>
                                            <input type="text" class="form-control form-control-sm" name="recetas" id="recetas">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diferencia reclamada</label>
                                            <input type="text" class="form-control form-control-sm" name="diferencia_reclamada" id="diferencia_reclamada">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros" id="otros">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de reclamos</label>
                                            <input type="number" class="form-control form-control-sm" name="numero_reclamos" id="numero_reclamos">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_ingreso" id="fecha_ingreso">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros" id="otros">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Reclamo anterior</label>
                                            <input type="date" class="form-control form-control-sm" name="reclamo_anterior" id="reclamo_anterior">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Autorización del usuario</label>
                                            <input type="text" class="form-control form-control-sm" name="autorizacion_usuario" id="autorizacion_usuario">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informe_medico">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Informe médico tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_enfermedad" id="fecha_inicio_enfermedad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_primera_consulta" id="fecha_primera_consulta">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de consulta</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_consulta" id="fecha_consulta">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad_paciente" id="edad_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Dirección</label>
                                            <input type="text" class="form-control form-control-sm" name="direccion_paciente" id="direccion_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" name="diagnostico" id="diagnostico">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Control?</label>
                                            <select class="form-control form-control-sm" id="control" name="control">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Embarazo?</label>
                                            <select class="form-control form-control-sm" id="embarazo" name="embarazo">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de semanas</label>
                                            <select class="form-control form-control-sm" id="num_semanas" name="num_semanas">
                                                <option>Seleccione una opción</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                                <option>32</option>
                                                <option>33</option>
                                                <option>34</option>
                                                <option>35</option>
                                                <option>36</option>
                                                <option>37</option>
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>Más</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fur</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_fur" id="fecha_fur">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Complicación en el embarazo?</label>
                                            <select class="form-control form-control-sm" id="complicacion_embarazo" name="complicacion_embarazo">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Accidente?</label>
                                            <select class="form-control form-control-sm" id="accidente" name="accidente">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_accidente" id="fecha_accidente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_accidente" id="tipo_accidente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="lugar_accidente" id="lugar_accidente">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="info_personal_tratante">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Profesional tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_profesional" id="rut_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono_profesional" id="telefono_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Email</label>
                                            <input type="email" class="form-control form-control-sm" name="email_profesional" id="email_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Fecha del informe</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_informe" id="fecha_informe">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario Reembolso gastos dentales ********-->
    <div id="modal_reembolso_dental" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_reembolso_dental" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Reembolso de gastos dentales</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_dentales">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga_dental" class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud_dental" class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso_dental" class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a></li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico_dental" class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#tratamientos_dentales" class="nav-link-wizard rounded-0" data-toggle="tab">Tratamientos dentales</a></li>
                            <li class="tab-wizard-formularios"><a href="#ortodoncia" class="nav-link-wizard rounded-0" data-toggle="tab">Ortodoncia</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_profesional_tratante_dental" class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Aseguradora</label>
                                            <input type="text" class="form-control form-control-sm" name="aseguradora_dental" id="aseguradora_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº Poliza</label>
                                            <input type="number" class="form-control form-control-sm" name="num_poliza_dental" id="num_poliza_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Empresa asociada</label>
                                        <input type="text" class="form-control form-control-sm" name="empresa_asociada_dental" id="empresa_asociada_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nombre Asegurado</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_asegurado_dental" id="nombre_asegurado_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut asegurado</label>
                                            <input type="person" class="form-control form-control-sm" type="rut_asegurado_dental" name="rut_asegurado_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm"  >
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente_dental" id="nombre_paciente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_carga_dental" id="tipo_carga_dental">
                                        </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_carga_dental" id="numero_carga_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Causa de la solicitud</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Causa</label>
                                            <select class="form-control form-control-sm" id="causa_dental" name="causa_dental">
                                                <option>Accidente</option>
                                                <option>Continuidad de tratamiento</option>
                                                <option>Enfermedad</option>
                                                <option>Embarazo</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Especifique otro</label>
                                            <input type="text" class="form-control form-control-sm" type="causa_otro_dental" name="causa_otro_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" type="diagnostico_causa_dental" name="diagnostico_causa_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Continuidad de tratamiento?</label>
                                            <select class="form-control form-control-sm" id="causa_dental" name="causa_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" type="fecha_accidente_dental" name="fecha_accidente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar del accidente</label>
                                            <select class="form-control form-control-sm " id="lugar_accidente_dental" name="lugar_accidente_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Vía Pública</option>
                                                <option>Hogar</option>
                                                <option>Trayecto al trabajo</option>
                                                <option>Trayecto al hogar</option>
                                                <option>Trabajo</option>
                                                <option>Tránsito</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Por este medio certifico que los datos aportados son verdaderos y autorizo al médico tratante hospitales o cualquier otra institución de salud , para que suministre la información requerida de mi persona o beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del código Sanitario declaro también conocer y autorizar a que todos los antecedentes en esta solicitud de reembolso serán del conocimiento de las diferentes personas que participan en la evaluación, liquidación y traslado de la misma , por lo que libero a la compañía aseguradora de toda responsabilidad en el manejo de la misma. En el caso de requerir confidencialidad, rogamos enviar en sobre cerrado al departamento de salud con el rotulo de confidencial. Recuerde que en el caso de accidente del tránsito, <strong>deberá presentar la liquidación del seguro obligatorio de accidentes personales.</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>                             
                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de prestación</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_prestación_dental" id="fecha_prestación_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Bonos</label>
                                            <input type="text" class="form-control form-control-sm" name="bonos_dental" id="bonos_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Total de documentos</label>
                                            <input type="text" class="form-control form-control-sm" name="total_documentos_dental" id="total_documentos_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Boletas</label>
                                            <input type="text" class="form-control form-control-sm" name="boletas_dental" id="boletas_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Recetas</label>
                                            <input type="text" class="form-control form-control-sm" name="recetas_dental" id="recetas_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diferencia reclamada</label>
                                            <input type="text" class="form-control form-control-sm" name="diferencia_reclamada_dental" id="diferencia_reclamada_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros_dental" id="otros_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de reclamos</label>
                                            <input type="number" class="form-control form-control-sm" name="numero_reclamos_dental" id="numero_reclamos_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_ingreso_dental" id="fecha_ingreso_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros_dental" id="otros_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Reclamo anterior</label>
                                            <input type="date" class="form-control form-control-sm" name="reclamo_anterior_dental" id="reclamo_anterior_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Autorización del usuario</label>
                                            <input type="text" class="form-control form-control-sm" name="autorizacion_usuario_dental" id="autorizacion_usuario_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informe_medico_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Informe médico tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_enfermedad_dental" id="fecha_inicio_enfermedad_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_primera_consulta_dental" id="fecha_primera_consulta_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de consulta</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_consulta_dental" id="fecha_consulta_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente_dental" id="nombre_paciente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad_paciente_dental" id="edad_paciente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Dirección</label>
                                            <input type="text" class="form-control form-control-sm" name="direccion_paciente_dental" id="direccion_paciente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" name="diagnostico_dental" id="diagnostico_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Control?</label>
                                            <select class="form-control form-control-sm" id="control_dental" name="control_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Accidente?</label>
                                            <select class="form-control form-control-sm" id="accidente_dental" name="accidente_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_accidente_dental" id="fecha_accidente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_accidente_dental" id="tipo_accidente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="lugar_accidente_dental" id="lugar_accidente_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="tratamientos_dentales">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Tratamientos dentales</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="presntación_dental" id="presntación_dental">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Nº</label>
                                            <input type="number" class="form-control form-control-sm" name="numero_prestacion_dental" id="numero_prestacion_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Cantidad</label>
                                            <input type="number" class="form-control form-control-sm" name="cantidad_dental" id="cantidad_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_dental" id="fecha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Valor unitario</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_dental" id="valor_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Total</label>
                                            <input type="number" class="form-control form-control-sm" name="total_dental" id="total_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="presntación_dental" id="presntación_dental">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Nº</label>
                                            <input type="number" class="form-control form-control-sm" name="numero_prestacion_dental" id="numero_prestacion_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Cantidad</label>
                                            <input type="number" class="form-control form-control-sm" name="cantidad_dental" id="cantidad_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_dental" id="fecha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Valor unitario</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_dental" id="valor_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Total</label>
                                            <input type="number" class="form-control form-control-sm" name="total_dental" id="total_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Laboratorio</label>
                                            <input type="text" class="form-control form-control-sm" name="laboratorio_dental" id="laboratorio_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor total reclamo</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_reclamo_dental" id="valor_reclamo_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ortodoncia">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Ortodoncia</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de aparato</label>
                                            <input type="text" class="form-control form-control-sm" name="aparato_dental_ortodoncia" id="aparato_dental_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de instalación</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_instalacion_ortodoncia" id="fecha_instalacion_ortodoncia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de primer control</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_primer_control_ortodoncia" id="fecha_primer_control_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Duración del tratamiento</label>
                                            <input type="texto" class="form-control form-control-sm" name="duracion_ortodoncia" id="duracion_ortodoncia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor clínico del aparato</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_aparato_ortodoncia" id="valor_aparato_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor de controles clínicos</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_clinico_ortodoncia" id="valor_clinico_ortodoncia">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="info_profesional_tratante_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Profesional tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_profesional" id="rut_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono_profesional_dental" id="telefono_profesional_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Email</label>
                                            <input type="email" class="form-control form-control-sm" name="email_profesional_dental" id="email_profesional_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Fecha del informe</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_informe_dental" id="fecha_informe_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>


<!--Modals Formularios de Consentimientos informados generales-->

    <!---******* Modal Formulario Anestesia ********-->
    <div id="modal_anestesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_anestesia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Consentimiento informado anestesia</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                    <option selected value="0">Seleccione una opción </option>
                                         <optgroup label="Región de Valparaíso"> 
                                         <option>Viña del Mar</option> 
                                         <option>Valparaíso</option> 
                                         <option>San Felipe</option>
                                         <option>etc...</option>
                                     </optgroup> 
                                     <optgroup label="Región Metropolitana"> 
                                         <option >Santiago</option> 
                                         <option >Maipú</option> 
                                         <option >etc...</option> 
                                     </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Edad</label>
                                <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_anestesi" id="fecha_anestesi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>En representeción de</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre del paciente</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_paciente" name="nombre_paciente">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Incapacitado en estos momentos por</label>
                                <input type="text" class="form-control form-control-sm" type="incapacitacion" name="incapacitacion">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>Certifico que el profesional</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre del profesional</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_profesional" name="nombre_profesional">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>Me ha informado acerca de los riesgos y el porqué considera necesario realizar el procedimiento</h6>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre y tipo de anestesia</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_profesional" name="nombre_profesional">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Autoentificación</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modals Consultas previas-->
    <!---******* Modal Ficha ********-->
    <div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_consultaantLabel">Consulta del..... </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="MotConsulta">Motivo de Consulta</label><!--fin autollenado-->
                                    <input id="MotConsulta" type="text" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="AntConsulta">Antecedentes</label><!--fin autollenado-->
                                    <input id="AntConsulta" type="text" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="ExFísico">Examen Físico</label><!--fin autollenado-->
                                    <input id="ExFísico" type="text" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="Dignóstico">Dignóstico</label><!--fin autollenado-->
                                    <input id="Dignóstico" type="text" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="Receta">Receta</label><!--fin autollenado-->
                                    <input id="Receta" type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="Examenes">Examenes</label><!--fin autollenado-->
                                    <input id="Examenes" type="text" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    <!---******* Modal Exámenes ********-->
    <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_exLabel">Exámenes solicitados el.... </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <table id="atenciones_previas_1" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Tipo</th>
                                    <th class="text-center align-middle">Urgencia</th>
                                    <th class="text-center align-middle">Nombre</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Sangre</td>
                                    <td class="text-center align-middle">Normal</td>
                                    <td class="text-center align-middle">Hemograma y vhs</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Otorrinolaríngologico</td>
                                    <td class="text-center align-middle">Normal</td>
                                    <td class="text-center align-middle">Rinomanometría</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Sangre</td>
                                    <td class="text-center align-middle">Urgente</td>
                                    <td class="text-center align-middle">Grupo Sanguíneo</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    <!---******* Modal Recetas ********-->
    <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_recetaLabel">Receta del .... </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <table id="atenciones_previas_2" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Medicamento</th>
                                    <th class="text-center align-middle">Dosis</th>
                                    <th class="text-center align-middle">Posología</th>
                                    <th class="text-center align-middle">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Rigotax_D</td>
                                    <td class="text-center align-middle">50mg</td>
                                    <td class="text-center align-middle">1 al día</td>
                                    <td class="text-center align-middle">30 Cáps</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Prednisona</td>
                                    <td class="text-center align-middle">5 mg</td>
                                    <td class="text-center align-middle">1 cada 12 horas</td>
                                    <td class="text-center align-middle">1 caja de 20 comp</td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Levofloxacino</td>
                                    <td class="text-center align-middle">750 mg</td>
                                    <td class="text-center align-middle">1 al día</td>
                                    <td class="text-center align-middle">10 Comprimidos</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    <!---******* Modal Archivos ********-->
    <div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_archivosLabel">Archivos subidos con la consulta ....</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <table id="atenciones_previas_3" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Tipo</th>                                              
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Sangre</td>
                                    <td class="text-center align-middle">Hemograma y vhs</td>
                                    <td class="text-center align-middle"><button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivo</button></td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Otorrinolaríngologico</td>
                                    <td class="text-center align-middle">Rinomanometría</td>
                                    <td class="text-center align-middle"><button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivo</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button mt-5" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>

<!--Modals Formularios Enfermedades crónicas y GES-->

    <!--******* Modal: ¿Enfermo crónico? *******-->
    <div id="form_enfermo_cronico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_enfermo_cronico" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Controles de enfermedades crónicas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-group fill">
                                <label class="floating-label">Controles de enfermedades crónicas</label>
                                <select class="form-control form-control-sm" id="cronicos" name="cronicos" onchange="mostrar(this.value);">
                                    <option value="n_C">Seleccione una opción</option>
                                    <option value="nc">NO CRÓNICO</option>
                                    <option value="cpeso">OBESIDAD</option>
                                    <option value="chipertension">HIPERTENSIÓN ARTERIAL</option>
                                    <option value="cdiabet">DIABETES</option>
                                    <option value="cinsufren">INSUFICIENCIA RENAL</option>
                                    <option value="cmtumorales">MARCADORES TUMORALES</option>
                                    <option value="creumato">REUMATOLOGÍA</option>
                                    <option value="clitemia">LITEMIA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--CONTROL DE OBESIDAD-->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de obesidad</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nº Control</label>
                                        <input type="text" class="form-control form-control-sm" name="n_control" id="n_control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Peso</label>
                                        <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Variación</label>
                                        <input type="text" class="form-control form-control-sm" name="variacion" id="variacion">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Peso Ideal</label>
                                        <input type="text" class="form-control form-control-sm" name="ideal" id="ideal">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <button class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de obesidad</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="control_obesidad" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Control</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Peso</th>                                      
                                        <th class="text-center align-middle">Variación</th>
                                        <th class="text-center align-middle">Peso Ideal</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">27/07/2021</td>
                                        <td class="text-center align-middle">80 kg</td>
                                        <td class="text-center align-middle">10 kg</td>
                                        <td class="text-center align-middle">70 kg</td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm">
                                            <i class="feather icon-x"></i> Eliminar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">2</td>
                                        <td class="text-center align-middle">27/07/2021</td>
                                        <td class="text-center align-middle">80 kg</td>
                                        <td class="text-center align-middle">10 kg</td>
                                        <td class="text-center align-middle">70 kg</td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm">
                                            <i class="feather icon-x"></i> Eliminar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">3</td>
                                        <td class="text-center align-middle">27/07/2021</td>
                                        <td class="text-center align-middle">80 kg</td>
                                        <td class="text-center align-middle">10 kg</td>
                                        <td class="text-center align-middle">70 kg</td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm">
                                            <i class="feather icon-x"></i> Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--CONTROL DE HIPERTENSIÓN-->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de hipertensión</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nº Control</label>
                                        <input type="text" class="form-control form-control-sm" name="n_control" id="n_control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Presión Sistólica</label>
                                        <input type="text" class="form-control form-control-sm" name="presion" id="presion">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Presión Diastólica</label>
                                        <input type="text" class="form-control form-control-sm" name="presion" id="presion">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Presión Ideal</label>
                                        <input type="text" class="form-control form-control-sm" name="ideal" id="ideal">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <button class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de hipertensión</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="control_hipertension" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Control</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Presión Sistólica</th>                                      
                                        <th class="text-center align-middle">Presión Diastólica</th>
                                        <th class="text-center align-middle">Presión Ideal</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">27/07/2021</td>
                                        <td class="text-center align-middle">180 mmHg</td>
                                        <td class="text-center align-middle">110 mmHg</td>
                                        <td class="text-center align-middle">120/80 mmHg</td>
                                        <td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--CONTROL DE DIABETES-->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de diabetes</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label">Nº Control</label>
                                        <input type="text" class="form-control form-control-sm" name="n_control" id="n_control">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-3 col-md-3">
                                        <label class="floating-label">Peso</label>
                                        <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-3">
                                        <label class="floating-label">Piés</label>
                                        <input type="text" class="form-control form-control-sm" name="pies" id="pies">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-3">
                                        <label class="floating-label">Hg A1c</label>
                                        <input type="text" class="form-control form-control-sm" name="hga1c" id="hga1c">
                                    </div>
                                    <div class="form-group col-sm-3 col-md-3">
                                        <label class="floating-label">Colesterol</label>
                                        <input type="text" class="form-control form-control-sm" name="colesterol" id="colesterol">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Creatina</label>
                                        <input type="text" class="form-control form-control-sm" name="creatina" id="creatina">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Glicosilada postprandial</label>
                                        <input type="text" class="form-control form-control-sm" name="glicosilada_postprandial" id="glicosilada_postprandial">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label">Glicosilada ayuno</label>
                                        <input type="text" class="form-control form-control-sm" name="glicosilada_ayuno" id="glicosilada_ayuno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <button class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de diabetes</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x:auto;">
                                <table id="control_diabetes" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nº Control</th>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Peso</th>                                      
                                            <th class="text-center align-middle">Piés</th>
                                            <th class="text-center align-middle">Hg A1c</th>
                                            <th class="text-center align-middle">Colesterol</th>
                                            <th class="text-center align-middle">Creatina</th>
                                            <th class="text-center align-middle">Glicosilada ayuno</th>
                                            <th class="text-center align-middle">Glicosilada postprandial</th>
                                            <th class="text-center align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">1</td>
                                            <td class="text-center align-middle">27/07/2021</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle">-</td>
                                            <td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--Cierre modal body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>     

    <!--******* Modal: GES *******-->
    <div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Ges</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="form-group fill">
                            <label class="floating-label">Ges</label>
                                <select class="form-control form-control-sm" id="ges" name="ges" onchange="mostrar(this.value);">
                                    <optgroup>
                                        <option value="1">Seleccione una opción</option>
                                        <option value="232">NO GES</option>
                                        <option value="145">PS 01. Enfermedad renal crónica etapa 4 y 5</option>
                                        <option value="146">PS 02. Cardiopatías congénitas operables en menores de 15 años</option>
                                        <option value="147">PS 03. Cáncer cérvico-uterino</option>
                                        <option value="148">PS 04. Alivio del dolor y cuidados paliativos por cáncer avanzado</option>
                                        <option value="149">PS 05. Infarto agudo del miocardio</option>
                                        <option value="150">PS 06. Diabetes Mellitus tipo I</option>
                                        <option value="151">PS 07. Diabetes Mellitus tipo II</option>
                                        <option value="152">PS 08. Cáncer de mama en personas de 15 años y más</option>
                                        <option value="153">PS 09. Disrafias espinales</option>
                                        <option value="154">PS 10. Tratamiento quirúrgico de escoliosis en personas menores de 25 años</option>
                                        <option value="155">PS 11. Tratamiento quirúrgico de cataratas</option>
                                        <option value="156">PS 12. Endoprótesis total de cadera en personas de 65 años y más con artrosis de cadera con limitación funcional severa</option>
                                        <option value="157">PS 13. Fisura Labiopalatina</option>
                                        <option value="158">PS 14. Cáncer en personas menores de 15 años</option>
                                        <option value="159">PS 15. Esquizofrenia</option>
                                        <option value="160">PS 16. Cáncer de testículo en personas de 15 años y más</option>
                                        <option value="161">PS 17. Linfomas en personas de 15 años y más</option>
                                        <option value="162">PS 18. Síndrome de la inmunodeficiencia adquirida VIH/SIDA</option>
                                        <option value="163">PS 19. Infección respiratoria aguda (IRA) de manejo ambulatorio en personas menores de 5 años</option>
                                        <option value="164">PS 20. Neumonia adquirida en la comunidad de manejo ambulatorio en personas de 65 años y más</option>
                                        <option value="165">PS 21. Hipertensión arterial primaria o esencial en personas de 15 años y más</option>
                                        <option value="166">PS 22. Epilepsia no refractaria en personas desde 1 año y menores de 15 años</option>
                                        <option value="167">PS 23. Salud oral integral para niños y niñas de 6 años</option>
                                        <option value="168">PS 24. Prevención de parto prematuro</option>
                                        <option value="169">PS 25. Trastornos de generación del impulso y conducción en personas de 15 años y más, que requieren marcapaso</option>
                                        <option value="170">PS 26. Colecistectomía preventiva del cáncer de vesícula en personas de 35 a 49 años</option>
                                        <option value="171">PS 27. Cáncer gástrico</option>
                                        <option value="172">PS 28. Cáncer de próstata en personas de 15 años y más</option>
                                        <option value="173">PS 29. Vicios de refracción en personas de 65 años y más</option>
                                        <option value="174">PS 30. Estrabismo en personas menores de 9 años</option>
                                        <option value="175">PS 31. Retinopatía diabética</option>
                                        <option value="176">PS 32. Desprendimiento de retina regmatógeno no traumático</option>
                                        <option value="177">PS 33. Hemofilia</option>
                                        <option value="178">PS 34. Depresión en personas de 15 años y más</option>
                                        <option value="179">PS 35. Tratamiento de la hiperplasia benigna de la próstata en personas sintomáticas</option>
                                        <option value="180">PS 36. Órtesis (o ayudas técnicas) para personas de 65 años y más</option>
                                        <option value="181">PS 37. Accidente cerebrovascular isquémico en personas de 15 años y más</option>
                                        <option value="182">PS 38. Enfermedad pulmonar obstructiva crónica de tratamiento ambulatorio</option>
                                        <option value="183">PS 39. Asma bronquial moderada y grave en menores de 15 años</option>
                                        <option value="184">PS 40. Síndrome de dificultad respiratoria en el recién nacido</option>
                                        <option value="185">PS 41. Tratamiento médico en personas de 55 años y más con artrosis de cadera y/o rodilla, leve o moderada</option>
                                        <option value="186">PS 42. Hemorragia subaracnoidea secundaria a ruptura de aneurismas cerebrales</option>
                                        <option value="187">PS 43. Tumores primarios del sistema nervioso central en personas de 15 años y más</option>
                                        <option value="188">PS 44. Tratamiento quirúrgico de hernia del núcleo pulposo lumbar</option>
                                        <option value="189">PS 45. Leucemia en personas de 15 años y más</option>
                                        <option value="190">PS 46. Urgencia odontológica ambulatoria</option>
                                        <option value="191">PS 47. Salud oral integral del adulto de 60 años</option>
                                        <option value="192">PS 48. Politraumatizado grave</option>
                                        <option value="193">PS 49. Traumatismo cráneo encefálico moderado o grave</option>
                                        <option value="194">PS 50. Trauma ocular grave</option>
                                        <option value="195">PS 51. Fibrosis quística</option>
                                        <option value="196">PS 52. Artritis reumatoidea</option>
                                        <option value="197">PS 53. Consumo perjudicial o dependencia de riesgo bajo a moderado de alcohol y drogas en personas menores de 20 años</option>
                                        <option value="198">PS 54. Analgesia del parto</option>
                                        <option value="199">PS 55. Gran quemado</option>
                                        <option value="200">PS 56. Hipoacusia bilateral en personas de 65 años y más que requieren uso de audífono</option>
                                        <option value="201">PS 57. Retinopatía del prematuro</option>
                                        <option value="202">PS 58. Displasia broncopulmonar del prematuro</option>
                                        <option value="203">PS 59. Hipoacusia neurosensorial bilateral del prematuro</option>
                                        <option value="204">PS 60. Epilepsia no refractaria en personas de 15 años y más</option>
                                        <option value="205">PS 61. Asma bronquial en personas de 15 años y más</option>
                                        <option value="206">PS 62. Enfermedad de parkinson</option>
                                        <option value="207">PS 63. Artritis idiopática juvenil</option>
                                        <option value="208">PS 64. Prevención secundaria enfermedad renal crónica terminal</option>
                                        <option value="209">PS 65. Displasia luxante de caderas</option>
                                        <option value="210">PS 66. Salud oral integral de la embarazada</option>
                                        <option value="211">PS 67. Esclerosis múltiple remitente recurrente</option>
                                        <option value="212">PS 68. Hepatitis crónica por virus hepatitis B</option>
                                        <option value="213">PS 69. Hepatitis C</option>
                                        <option value="214">PS 70. Cáncer colorectal en personas de 15 años y más</option>
                                        <option value="215">PS 71. Cáncer de ovario epitelial</option>
                                        <option value="216">PS 72. Cáncer vesical en personas de 15 años y más</option>
                                        <option value="217">PS 73. Osteosarcoma en personas de 15 años y más</option>
                                        <option value="218">PS 74. Tratamiento quirúrgico de lesiones crónicas de la válvula aórtica en personas de 15 años y más</option>
                                        <option value="219">PS 75. Trastorno bipolar en personas de 15 años y más</option>
                                        <option value="220">PS 76. Hipotiroidismo en personas de 15 años y más</option>
                                        <option value="221">PS 77. Tratamiento de hipoacusia moderada en menores de 2 años</option>
                                        <option value="222">PS 78. Lupus eritematoso sistémico</option>
                                        <option value="223">PS 79. Tratamiento quirúrgico de lesiones crónicas de las válvulas mitral y tricuspide en personas de 15 años y más</option>
                                        <option value="224">PS 80. Tratamiento de erradicación del helicobacter pylori</option>
                                        <option value="252">PS 81. Cáncer de Pulmón</option>
                                        <option value="253">PS 82. Cáncer de Tiroides</option>
                                        <option value="254">PS 83. Cáncer Renal</option>
                                        <option value="255">PS 84. Mieloma Múltiple</option>
                                        <option value="256">PS 85. Enfermedad de Alzheimer y otras demencias</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bt-wizard" id="wizard_constancia_ges_2">
                                <ul class="nav nav-pills">
                                    <li class="tab-wizard-formularios"><a href="#datos_prestador_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">Datos del prestador</a></li>
                                    <li class="tab-wizard-formularios"><a href="#datos_paciente_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">Datos del paciente</a></li>
                                    <li class="tab-wizard-formularios"><a href="#informacion_medica_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">Información médica</a></li>
                                    <li class="tab-wizard-formularios"><a href="#constancia_ges_2" class="nav-link-wizard rounded-0" data-toggle="tab">Constancia</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane pt-4 active show" id="datos_prestador_ges_2">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue">Datos del Prestador</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Nombre</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_institucion" id="nombre_institucion">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Dirección</label>
                                                    <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Nombre del responsable</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_responsable" id="nombre_responsable">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Rut del responsable</label>
                                                    <input type="person" class="form-control form-control-sm" name="rut_responsable" id="rut_responsable">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane pt-4" id="datos_paciente_ges_2">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue">Datos del Paciente</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Nombre</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Rut</label>
                                                    <input type="person" class="form-control form-control-sm" name="rut_paciente" id="rut_paciente">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Previsión</label>
                                                    <select id="prevision" name="prevision" class="form-control form-control-sm"  >
                                                        <option value="0">Selecione una opción</option>
                                                        <option value="particular">Particular</option>
                                                        <option value="fonasa">Fonasa</option>
                                                        <option value="banmedica">Banmedica</option>
                                                        <option value="colmena">Colmena</option>
                                                        <option value="cruz verde">Cruz Verde</option>
                                                        <option value="nueva masvida">Nueva MasVida</option>
                                                        <option value="consalud">Consalud</option>
                                                        <option value="control sin costo">Control sin costo</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Dirección</label>
                                                    <input type="address" class="form-control form-control-sm" name="direccion_paciente" id="direccion_paciente">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Correo electrónico</label>
                                                    <input type="email" class="form-control form-control-sm" name="email_paciente" id="email_paciente">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Teléfono</label>
                                                    <input type="tel" class="form-control form-control-sm" name="telefono_paciente" id="telefono_paciente">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane pt-4" id="informacion_medica_ges_2">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue">Información Médica</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">Confirmación diagnóstica GES</label>
                                                    <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_1" id="confirmacion_diagnostica_1">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">¿Confirmación diagnóstica?</label>
                                                    <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_2" id="confirmacion_diagnostica_2">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label">¿Paciente con tratamiento?</label>
                                                    <input type="text" class="form-control form-control-sm" name="paciente_tratamiento" id="paciente_tratamiento">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 class="text-c-blue">Notificación</h6>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Fecha</label>
                                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Hora</label>
                                                    <input type="time" class="form-control form-control-sm" name="fecha" id="fecha">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane pt-4" id="constancia_ges_2">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                    <p>Declaro que con esta <span>fecha</span> y
                                                    <span>hora</span>, he tomado conocimiento de que tengo derecho a acceder a las "Garantías Explícitas en Salud" GES, siempre que la atención sea otorgada en la "Red de Prestadores" que me corresponde según Fonasa o la Isapre a la que me encuentro adscrito/a.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mx-0 btn-page">
                                        <div class="col-sm-6 pl-0">
                                            <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                        </div>
                                        <div class="col-sm-6 text-md-right pr-0">
                                            <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>  
    </div>

    <!--Botón Flotante-->
    <div class="row">
        <div class="col-sm-12">
            <div class="boton-formularios">
                <input type="checkbox" id="btn-mas">
                    <div class="redes">
                        <a id="boton_1" class="fas fa-user fa-2x" data-toggle="canvas" data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right" title="Antecedentes del paciente" data-placement="left" style="cursor:pointer;">
                        </a>
                        <a id="boton_2" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios de atención" data-placement="left" style="cursor:pointer;"></a>
                    </div>
                <div class="btn-mas">
                    <label for="btn-mas" class="fa fa-plus"></label>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Botón Flotante-->

    
    
    <!--Cierre: Footer-->
    <!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
     <div class="ie-warning">
      <h1>Warning!!</h1>
      <p>You are using an outdated version of Internet Explorer, please upgrade
      <br/>to any of the following web browsers to access this website.
      </p>
      <div class="iew-container">
       <ul class="iew-download">
        <li>
            <a href="http://www.google.com/chrome/">
             <img src="assets/images/browser/chrome.png" alt="Chrome">
             <div>Chrome</div>
            </a>
        </li>
        <li>
            <a href="https://www.mozilla.org/en-US/firefox/new/">
             <img src="assets/images/browser/firefox.png" alt="Firefox">
             <div>Firefox</div>
            </a>
        </li>
        <li>
            <a href="http://www.opera.com">
             <img src="assets/images/browser/opera.png" alt="Opera">
             <div>Opera</div>
            </a>
        </li>
        <li>
            <a href="https://www.apple.com/safari/">
             <img src="assets/images/browser/safari.png" alt="Safari">
             <div>Safari</div>
            </a>
        </li>
        <li>
            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
             <img src="assets/images/browser/ie.png" alt="">
             <div>IE (11 & above)</div>
            </a>
        </li>
       </ul>
      </div>
      <p>Sorry for the inconvenience!</p>
     </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

    <!-- datatable Js -->
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/plugins/dataTables.responsive.min.js"></script>
    <script src="../assets/js/pages/data-responsive-custom.js"></script>

    <!--Accordion-->
    <script src="../assets/js/accordion.js"></script>

    <!--Tablas-->
    <script src="../assets/js/tablas_fmu.js"></script>
    <script src="../assets/js/tabla_atenciones_medicas_previas.js"></script>
    <script src="../assets/js/tablas_control_cronicos.js"></script>

    <!--Sidebars-->
    <script src="../assets/js/bs_canvas.js"></script>  

    <!--Modals de atención--> 
    <script src="../assets/js/modals_atencion_medica.js"></script>

    <!--Form wizard-->
    <script src="../assets/js/plugins/jquery.bootstrap.wizard.min.js"></script>
    <script src="../assets/js/fomularios_wizard.js"></script>

    <!-- datepicker js -->
    <script src="assets/js/plugins/moment.min.js"></script>
    <script src="assets/js/plugins/daterangepicker.js"></script>
    <script src="assets/js/pages/ac-datepicker.js"></script>

    <!--Tooltips-->
    <script src="../assets/js/tooltip_atencion_medica.js"></script>

    <!--Check-->
    <script src="../assets/js/check_atencion_medica.js"></script>

</body>

</html>
