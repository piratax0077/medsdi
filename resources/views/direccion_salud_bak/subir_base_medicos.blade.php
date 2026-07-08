@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Subir Base de Datos de Médicos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}">Mi Escritorio</a>
                            </li>
                            <li class="breadcrumb-item active">Subir Base de Datos Médicos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-top bg-info">
                        <h5 class="font-weight-bold">Carga de Base de Datos de Médicos</h5>
                    </div>
                    <div class="card-body-aten-a shadow-none">

                        <div class="alert alert-info" role="alert">
                            <i class="feather icon-info mr-2"></i>
                            Suba un archivo Excel o CSV con el listado de médicos. El sistema procesará e importará los registros automáticamente.
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label class="floating-label-activo-sm">Archivo (Excel .xlsx / CSV .csv)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivo_base_medicos" accept=".xlsx,.xls,.csv">
                                    <label class="custom-file-label" for="archivo_base_medicos">Seleccionar archivo...</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-info btn-sm" onclick="subir_base_medicos();">
                                <i class="feather icon-upload"></i> Procesar e importar
                            </button>
                        </div>

                        <!-- Resultado -->
                        <div id="resultado_importacion" class="mt-3" style="display:none;"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // Mostrar nombre del archivo seleccionado
    $('#archivo_base_medicos').on('change', function () {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').text(fileName || 'Seleccionar archivo...');
    });

    function subir_base_medicos() {
        var fileInput = document.getElementById('archivo_base_medicos');
        if (!fileInput.files.length) {
            swal({ title: 'Archivo requerido', text: 'Debe seleccionar un archivo para continuar.', icon: 'warning', buttons: 'Aceptar' });
            return;
        }
        swal({ title: 'Próximamente', text: 'Esta funcionalidad estará disponible pronto.', icon: 'info', buttons: 'Aceptar' });
    }
</script>

@endsection
