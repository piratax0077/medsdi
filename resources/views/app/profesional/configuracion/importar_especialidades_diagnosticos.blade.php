@extends('template.profesional.template')

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb mt-2">
                            <li class="breadcrumb-item">
                                <a href="{{ route('profesional.home') }}">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Importar especialidades de diagnósticos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8">

                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <strong>Error:</strong>
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Revise el archivo:</strong>

                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0 text-c-blue">
                            Importar especialidades
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Formato requerido:</strong>
                            el archivo debe incluir las columnas
                            <code>id</code> e
                            <code>id_especialidad</code>.
                            Los IDs de especialidad deben estar separados
                            por coma.
                        </div>

                        <form
                            action="{{ route('diagnosticos.dental.procesar.especialidades') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            id="form-importacion-diagnosticos"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="archivo">
                                    Archivo Excel o CSV
                                </label>

                                <input
                                    type="file"
                                    name="archivo"
                                    id="archivo"
                                    class="form-control"
                                    accept=".xlsx,.xls,.csv"
                                    required
                                >

                                <small class="form-text text-muted">
                                    Tamaño máximo: 10 MB.
                                </small>
                            </div>

                            <div class="text-right">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    id="btn-importar"
                                >
                                    <i class="feather icon-upload"></i>
                                    Importar y actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if(session('resultado_importacion'))
                    @php
                        $resultado = session('resultado_importacion');
                    @endphp

                    <div class="card shadow-sm mt-3">
                        <div class="card-header">
                            <h5 class="mb-0 text-c-blue">
                                Resultado
                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6 col-md-3 mb-3">
                                    <h4 class="text-success">
                                        {{ $resultado['actualizados'] }}
                                    </h4>
                                    <small>Actualizados</small>
                                </div>

                                <div class="col-6 col-md-3 mb-3">
                                    <h4 class="text-info">
                                        {{ $resultado['sin_cambios'] }}
                                    </h4>
                                    <small>Sin cambios</small>
                                </div>

                                <div class="col-6 col-md-3 mb-3">
                                    <h4 class="text-warning">
                                        {{ $resultado['no_encontrados'] }}
                                    </h4>
                                    <small>No encontrados</small>
                                </div>

                                <div class="col-6 col-md-3 mb-3">
                                    <h4 class="text-secondary">
                                        {{ $resultado['omitidos'] }}
                                    </h4>
                                    <small>Omitidos</small>
                                </div>
                            </div>

                            @if(!empty($resultado['errores']))
                                <div class="table-responsive mt-3">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fila</th>
                                                <th>ID</th>
                                                <th>Motivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resultado['errores'] as $error)
                                                <tr>
                                                    <td>{{ $error['fila'] }}</td>
                                                    <td>{{ $error['id'] }}</td>
                                                    <td>{{ $error['motivo'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#form-importacion-diagnosticos').on('submit', function () {
            const boton = $('#btn-importar');

            boton.prop('disabled', true);
            boton.html(
                '<span class="spinner-border spinner-border-sm"></span> ' +
                'Procesando...'
            );
        });
    });
</script>
@endsection
