<!DOCTYPE html>
<html lang="es">

<head>
   
    <link rel="stylesheet" href="../assets/css/boton-flotante.css">
    <!--Estilos base-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Estilos escritorios-->  
    <link rel="stylesheet" href="../assets/css/escritorios.css">
    <!--Estilos formularios sm-->  
    <link rel="stylesheet" href="../assets/css/formulario_sm.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="../assets/css/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/responsive.bootstrap4.min.css">
    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="../assets/css/tabs-secciones.css">
     <!--Tags-->
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap-tagsinput-typeahead.css">
    <link rel="stylesheet" href="../assets/css/card_estilo.css">
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="../assets/css/plugins/dropzone.min.css">
    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="../assets/css/accordion.css?t=<?=time()?>">
    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="../assets/css/card_sidebar.css?t=<?=time()?>">
    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="../assets/css/pills_modals.css">
    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="../assets/css/tab_wizard_formularios.css">
    <!--Bs-Canvas-->
    <link rel="stylesheet" href="../assets/css/bs_canvas.css">
    <!--formulario sm-->
    <link rel="stylesheet" href="../assets/css/formulario_sm.css">
    <!--Nav azul sm-->
    <link rel="stylesheet" href="../assets/css/nav_azul_sm.css">
    <!-- Otros estilos de atencion medica -->
    <link rel="stylesheet" href="../assets/css/estilos_atencion_medica.css">

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
    require_once("../include/sidebar_derecho_orl.php");
    ?>
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--HEADER-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN PSICOLOGIA ADULTO</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">16 de Marzo, 2023</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE: HEADER-->
            <!-- TAB GENERAL -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false">Licencia</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Atenciones previas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="examenes-tab" data-toggle="tab" href="#examenes" role="tab" aria-controls="examenes" aria-selected="false">Exámenes</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TAB GENERAL-->
            <!--CONTENIDO DE TAB-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-general">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            <?php
                            require_once('../seccion_general/ficha_psico_adulto.php');
                            ?>               
                        </div>
                         <!--Licencia-->
                        <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            <?php
                            require_once('../secciones_ficha/licencia.php');
                            ?>               
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            <?php
                            require_once('../secciones_ficha/fmu.php');
                            ?>               
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            <?php
                            require_once('../secciones_ficha/atenciones_previas.php');
                            ?>               
                        </div>
                        <!--Exámenes-->
                        <div class="tab-pane fade show" id="examenes" role="tabpanel" aria-labelledby="examenes-tab">
                            <?php
                            require_once('../secciones_ficha/examenes.php');
                            ?>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->


     
     <!--BOTÓN FLOTANE-->
    <div class="row">
        <div class="col-sm-12">
            <div class="boton-formularios">
                <input type="checkbox" id="btn-mas">
                <div class="redes">
                    <a id="boton_1" class="fas fa-user fa-2x" data-toggle="canvas" data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right" title="Antecedentes del paciente" data-placement="left"></a>
                    <a id="boton_2" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios de atención" data-placement="left"></a>
                </div>
                <div class="btn-mas">
                    <label for="btn-mas" class="fa fa-plus"></label>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Botón flotante-->
    

   

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

    <!-- form-advance custom js -->
    <script src="../assets/js/pages/form-advance-custom.js"></script>

    <!--Accordion-->
    <script src="../assets/js/accordion.js"></script>

    <!--Sidebars-->
    <script src="../assets/js/bs_canvas.js"></script>

    <!--Botón cards-->
    <script src="../assets/js/btn-cards.js"></script>

    <!--Modals Sidebar derecho--> 

    <!--Tablas y Toggle atención especialidades--> 
    <script src="../assets/js/atencion_especialidades.js"></script>

    <!--Form wizard-->
    <script src="../assets/js/plugins/jquery.bootstrap.wizard.min.js"></script>
    <script src="../assets/js/fomularios_wizard.js"></script>

    <!-- datepicker js -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <script src="../assets/js/plugins/daterangepicker.js"></script>
    <script src="../assets/js/pages/ac-datepicker.js"></script>

    <!--Tooltips-->
    <script src="../assets/js/tooltip_atencion_medica.js"></script>

   
</body>

</html>