@extends('template.direccion_salud.template')

@section('content')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Manejo de Lista de Espera</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('ministerio.home') }}">Mi Escritorio</a>
                            </li>
                            <li class="breadcrumb-item active">Lista de Espera</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-b-10">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-top bg-info">
                        <h5 class="font-weight-bold">Lista de Espera</h5>
                    </div>
                    <div class="card-body-aten-a shadow-none">

                        <!-- Filtros -->
                        <div class="row mb-3 align-items-end">
                            <div class="col-md-4 mb-2">
                                <label class="floating-label-activo-sm">Buscar paciente</label>
                                <input type="text" class="form-control form-control-sm" id="le_buscar"
                                    placeholder="Nombre, RUT..."
                                    onkeydown="if(event.key==='Enter') buscar_lista_espera();">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="floating-label-activo-sm">Especialidad</label>
                                <select class="form-control form-control-sm" id="le_especialidad">
                                    <option value="">Todas</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="floating-label-activo-sm">Estado</label>
                                <select class="form-control form-control-sm" id="le_estado">
                                    <option value="">Todos</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="citado">Citado</option>
                                    <option value="atendido">Atendido</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <button type="button" class="btn btn-info-light-c btn-sm w-100" onclick="buscar_lista_espera();">
                                    <i class="feather icon-search"></i> Buscar
                                </button>
                            </div>
                        </div>

                        <div class="text-center py-5 text-muted">
                            <i class="feather icon-clock" style="font-size:3rem; color:#ccc;"></i>
                            <p class="mt-3">Esta funcionalidad estará disponible próximamente.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function buscar_lista_espera() {
        swal({ title: 'Próximamente', text: 'Esta funcionalidad estará disponible pronto.', icon: 'info', buttons: 'Aceptar' });
    }
</script>

@endsection
