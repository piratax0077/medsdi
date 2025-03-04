<!DOCTYPE html>
<html lang="es">

<head>
    <title>Prof_laboratorio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}?t={{ time() }}">
    <!-- Rating css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/bars-1to10.css') }}'/>

    <link rel="stylesheet" href='{{ asset('css/boton-flotante.css') }}'/>
    <!--Estilos base-->
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'/>
    <!--Estilos escritorios-->
    <link rel="stylesheet" href='{{ asset('css/escritorios.css') }}'/>
    <!--Estilos formularios sm-->
    <link rel="stylesheet" href='{{ asset('css/formulario_sm.css') }}'/>
    <!-- data tables css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/responsive.bootstrap4.min.css') }}'/>
    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tabs-secciones.css') }}'/>
    <!--Tags-->
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}'/>
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/dropzone.min.css') }}'/>
    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/accordion.css') }}'/>
    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/card_sidebar.css') }}'/>
    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/pills_modals.css') }}'/>
    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tab_wizard_formularios.css') }}'/>
    <!--Bs-Canvas-->
    <link rel="stylesheet" href='{{ asset('css/bs_canvas.css') }}'/>

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>

    @include('template.laboratorio.laboratorio_profesional.menu')
    @include('template.laboratorio.laboratorio_profesional.header')


    @yield('content')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>
    <script src="{{ asset('js/modals_dental.js') }}"></script>

    <!-- bootstrap-tagsinput-latest Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.min.js') }}"></script>

    <!-- form-advance custom js -->
    <script src="{{ asset('js/pages/form-advance-custom.js') }}"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Modals-->
    <script src="{{ asset('js/modals_admin_cm.js') }}"></script>
    <script src="{{ asset('js/modals_centro_medico.js') }}"></script>
    <!--Tablas-->
    <script src="{{ asset('js/tablas_admin_cm.js') }}"></script>
    <script src="{{ asset('js/tablas_centro_medico.js') }}"></script>

    <!--Gráficos-->
    <!-- Rating Js -->
    <script src="{{ asset('js/plugins/jquery.barrating.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
    <!-- peity chart js -->
    <script src="{{ asset('js/plugins/jquery.peity.min.js') }}"></script>

    <!--Gráficos-->
    {{--  <script src="{{ asset('js/graficos/sf-prof-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-prof-admin-cm.js') }}"></script>  --}}

    <script src="{{ asset('js/graficos/sf-lab-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-lab-admin-cm.js') }}"></script>

    <!--Graficos-->
    <!-- sweet alert Js -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/alerta_suscripcion.js') }}"></script>
     <!-- Tablas -->
    <script src="{{ asset('js/facturacion.js') }}"></script>
	<script>
        // function cuenta_corriente() {
        //     $('#dat_bancarios').modal('show');
        // }
        // function rol_profesional_cm() {
        //     $('#rol_permisos_profesional_cm').modal('show');
        // }
        // function horario_profesional_cm() {
        //     $('#horario_usuario').modal('show');
        // }
        // function convenio_profesional_cm() {
        //     $('#convenio_usuario').modal('show');
        // }

    </script>


    <!--Reclamos / Felicitaciones-->
    <script>
        $(document).ready(function() {
        });

    </script>
    @yield('page-script')
</body>

</html>
