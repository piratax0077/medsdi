@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
@endsection

@section('breadcrumb')
<div class="page-header-title">
    <h5 class="m-b-10 font-weight-bold">Recursos Humanos</h5>
</div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ ROUTE('contabilidad.home') }}">Escritorio Contabilidad</a></li>
    <li class="breadcrumb-item active">Recursos Humanos</li>
</ul>
@endsection

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <main>
                        <section id="rrhh" class="view active">
                            <div class="section-toolbar">
                                <div><p class="eyebrow">RECURSOS HUMANOS</p><h2>Personal del centro</h2><p>Contratos, contacto y datos bancarios.</p></div>
                                <button class="primary" data-modal="worker-modal">+ Registrar trabajador</button>
                            </div>
                            <div class="tabs" data-table-tabs>
                                <button class="active" data-filter="all">Todos</button>
                                <button data-filter="profesional">Profesionales de salud</button>
                                <button data-filter="administrativo">Administrativos</button>
                                <button data-filter="mantencion">Mantención</button>
                            </div>
                            <article class="panel table-panel">
                                <div class="table-tools">
                                    <span id="worker-count"></span>
                                </div>
                                <div class="table-wrap">
                                    <table id="workers-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Trabajador</th>
                                                <th>Cargo</th>
                                                <th>Contrato</th>
                                                <th>Remuneración</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </article>
                        </section>
                    </main>

                    <div class="modal-backdrop" id="modal-backdrop"></div>

                    <dialog id="worker-modal">
                        <form id="worker-form">
                            <div class="modal-head"><div><p class="eyebrow">RECURSOS HUMANOS</p><h3>Registrar trabajador</h3></div><button type="button" class="close">×</button></div>
                            <div class="form-grid">
                                <label>RUT<input name="rut" required placeholder="12.345.678-9"></label>
                                <label>Tipo<select name="type" required><option value="profesional">Profesional de salud</option><option value="administrativo">Administrativo</option><option value="mantencion">Mantención</option></select></label>
                                <label class="wide">Nombre completo<input name="name" required></label>
                                <label>Cargo<input name="role" required></label>
                                <label>Especialidad<input name="specialty"></label>
                                <label>Fecha de ingreso<input name="start" type="date" required></label>
                                <label>Sueldo base<input name="salary" type="number" min="0" required></label>
                                <label>Correo<input name="email" type="email"></label>
                                <label>Teléfono<input name="phone"></label>
                            </div>
                            <div class="modal-actions"><button type="button" class="secondary close">Cancelar</button><button class="primary">Guardar trabajador</button></div>
                        </form>
                    </dialog>

                    <div id="toast"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        // Datos reales desde Laravel
        window.profesionalesData = @json($profesionales ?? []);
        window.asistentesData = @json($asistentes ?? []);
    </script>
    <script src="{{ asset('js/app_dashboard.js') }}"></script>
@endsection
