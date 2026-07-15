<!DOCTYPE html>
<html lang="es">
    <head>
        @php
            $assetVersion = config('app.asset_version', '1.0.0');
        @endphp
        @include('atencion_otros_prof.include.head_psicologia')
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ $assetVersion }}">
        <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?v={{ $assetVersion }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Links del REG-->
        <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?v={{ $assetVersion }}">
        <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?v={{ $assetVersion }}">
        <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?v={{ $assetVersion }}">
        <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">
        <!-- data tables css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?v={{ $assetVersion }}">
        <!-- fileupload-custom css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}?v={{ $assetVersion }}">
        <!-- Dropzone CSS (opcional, para que se vea bonito) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />


        <!--Accordion-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?v={{ $assetVersion }}">

        <!--Card Sidebar-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?v={{ $assetVersion }}">

        <!--Pills Modals-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?v={{ $assetVersion }}">

         <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

        <!--Tab wizard_formularios-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?v={{ $assetVersion }}">

        <!--Bs-Canvas-->
        <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?v={{ $assetVersion }}">

        <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?v={{ $assetVersion }}">

        <!-- fancy box -->
        <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />

        <!--Estilo tab secciones -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">
        <!--formulario sm-->
        <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">

        <!-- Summernote -->
        <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">

        <!--Estilos escritorios-->
        <link rel="stylesheet"  href="{{ asset('css/escritorios.css') }}">

		<!-- SERLECT2-->
        <link rel="stylesheet"  href="{{ asset('css/plugins/select2.min.css') }}">

        @yield('css-btn-autorizacion')
        @yield('page-css')

        {{--  /** agregar css */  --}}
        <style>
            .ui-front {
                position: absolute;
                z-index: 2006;
                overflow: auto;
            }
            .select2-container {
                z-index: 3001 !important;
            }
        </style>
    </head>
    <body>
        @include('template.profesional.header')
        @include('template.menuProfesional')

        @yield('Content')

        <!-- Modal de la vista -->
        @yield('Modals')
        @yield('Modals-med-exa')
        @yield('Modals-med-exa-esp')
        @yield('modal-ficha-general-espc')
        {{-- @include('atencion_pediatrica.secciones_especialidad.ficha_pediatria_tipo') --}}
        <!-- Modal de la vista fin -->



        <!-- Required Js -->
        <script src="{{ asset('js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/ripple.js') }}"></script>
        <script src="{{ asset('js/pcoded.min.js') }}"></script>
        <script src="{{ asset('js/documentos.js') }}?v={{ $assetVersion }}"></script>

        <!-- datatable Js -->
        <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
        {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

        <script src="{{ asset('js/sidebar.js') }}?v={{ $assetVersion }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

        <!--Accordion-->
        <script src="{{ asset('js/accordion.js') }}?v={{ $assetVersion }}"></script>

        <!--Tablas-->
        <script src="{{ asset('js/tablas_fmu.js') }}?v={{ $assetVersion }}"></script>
        <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}?v={{ $assetVersion }}"></script>
        <script src="{{ asset('js/tablas_control_cronicos.js') }}?v={{ $assetVersion }}"></script>

        <script src="{{ asset('js/recetas_atencion_medica.js') }}?v={{ $assetVersion }}"></script>
        <script src="{{ asset('js/licencias_atencion_medica.js') }}?v={{ $assetVersion }}"></script>

        <!--Sidebars-->
        <script src="{{ asset('js/bs_canvas.js') }}"></script>
        <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

        <!--Formularios Modals-->
        <script src="{{ asset('js/modals_atencion_medica.js') }}?v={{ $assetVersion }}"></script>

        <!--Form wizard-->
        <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('js/formularios_wizard.js') }}?v={{ $assetVersion }}"></script>

        <!-- datepicker js -->
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

        <!--Tooltips-->
        <script src="{{ asset('js/tooltip_atencion_medica.js') }}?v={{ $assetVersion }}"></script>

        <!--Check-->
        <script src="{{ asset('js/check_atencion_medica.js') }}?v={{ $assetVersion }}"></script>

        <!-- file-upload Js -->
        {{-- <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>


        <!-- mensajes -->
        <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

        <!-- Summernote -->
        <script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>

        {{-- autocomplete
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
        <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


        <!-- select2 Js -->
        <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
        <!-- form-select-custom Js -->
        <script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
        <!-- select2 css -->

        <!--Tablas y Toggle atención ginecobstetrica-->
        <script src="{{ asset('js/atencion_especialidades.js') }}"></script>

        {{--  @include('template.templateAutorizacion')  --}}

        <!-- form-advance custom js -->
        {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?v={{ $assetVersion }}"></script>  --}}

        <!--Apgar-->
        <script src="{{ asset('js/aicalc2.js') }}?v={{ $assetVersion }}"></script>

            <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>


        <!--Botón cards-->
        <script src="{{ asset('js/btn-cards.js') }}?v={{ $assetVersion }}"></script>

        <!--Modals Sidebar derecho-->
        <script src="{{ asset('js/modals_sidebar_esp.js') }}?v={{ $assetVersion }}"></script>
        <!--Tablas y Toggle atención PEDIATRIA-->

        <script src="{{ asset('js/atencion_pediatria.js') }}?v={{ $assetVersion }}"></script>

        <!-- rut -->
        <script src="{{ asset('js/rut.js') }}"></script>

        <!-- funciones generales -->
        <script src="{{ asset('js/funciones.js') }}"></script>


        @yield('page-script-btn-autorizacion')

        <script>
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

			/** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
            function  envio_indicaciones_pdf(id_modal){
                let url = "{{ route('indicacion.medica.registro.envio') }}";
                var id_tipo_documento = 1;
                var id_paciente = $('#id_paciente_fc').val();
                var id_profesional = $('#id_profesional_fc').val();
                var id_ficha_atencion = $('#id_fc').val();
                var id_lugar_atencion = $('#id_lugar_atencion').val();
                var observacion = '';
                // var observacion = $('#observacion').val();
                var documento = '';
                var url_documento = '';
                var cuerpo = '';
                var otro = '';
                var token = CSRF_TOKEN;

                if(id_tipo_documento == 1)
                {
                    documento = $('#'+id_modal+' embed').attr('data-documento');
                    url_documento = $('#'+id_modal+' embed').attr('data-url');
                }
                else
                {
                    // cuerpo = $('#cuerpo').val();
                }
                var datos = {};
                datos._token = token;
                datos.id_tipo_documento = id_tipo_documento;
                datos.id_paciente = id_paciente;
                datos.id_profesional = id_profesional;
                datos.id_ficha_atencion = id_ficha_atencion;
                datos.id_lugar_atencion = id_lugar_atencion;
                datos.observacion = observacion;
                datos.documento = documento;
                datos.url = url_documento;
                datos.cuerpo = cuerpo;
                datos.otro = otro;

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: "json",
                    data: datos,
                    success: function(data) {
                        // console.log(data);
                        if(data.estado == 1)
                        {
                            var mensaje = '';
                            mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                            if(data.update_correo.estado == 1)
                                mensaje = 'Documento enviado por correo al Paciente.\n';
                            else
                                mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                            swal({
                                title: "Indicación Enviada al Paciente",
                                text: mensaje,
                                icon: "success",
                            });
                        }
                        else
                        {
                            var texto_error = '';

                            if(data.estado ==  0)
                            {
                                if('error' in data)
                                {
                                    $.each(data.error, function (indexInArray, valueOfElement) {
                                        texto_error += indexInArray+': '+valueOfElement+'\n';
                                    });
                                }
                            }
                            swal({
                                title: "Indicación Enviada al Paciente",
                                text: data.msj+'\n'+texto_error,
                                icon: "warning",
                            });
                        }
                    }
                });
            }
            /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function editarInformacionContacto(){
            $('#modal_editar_contacto').modal('show');
            $('#info_contacto').css('display', 'none');
            $('#info_contacto-edit').css('display', 'block');
        }



        function cancelarInformacionContacto(){
            $('#info_contacto').css('display', 'block');
            $('#info_contacto-edit').css('display', 'none');
        }

        </script>
        @yield('js_inferior')
        @include('includes.guardar_informacion_paciente')
        @yield('page-script')
        @yield('page-script-ficha-atencion'){{-- ficha_orl.blade --}}
        @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
        @yield('page-script-med-exa') {{--  seccion receta y exmaenes --}}
        @yield('page-script-med-exa-esp') {{-- seccion receta y exmaenes especiales --}}
        @yield('js-sidebar') {{-- seccion js side bar --}}

    </body>
</html>
