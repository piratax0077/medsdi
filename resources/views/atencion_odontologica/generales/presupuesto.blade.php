@include('atencion_odontologica.include.progreso_circular_tratamiento')
<style>
    .status-circle .circle {
        width: 20px;
        height: 20px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        border: 2px solid #fff;
        /* Opcional: Borde blanco para mejor visibilidad */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        /* Opcional: Sombra suave */
    }

    .promo-banner {
        background-color: #1a49a3!important;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        /* animation: pulse 1.5s infinite alternate; */
    }

    /* Banner de convenio/descuento, alineado al mismo lenguaje visual de las cards del presupuesto */
    .convenio-banner-card {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 18px;
        background: #fff;
        border: 1px solid #dce5ef;
        border-left: 4px solid #2eb4bd;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(31, 55, 86, .06);
    }
    .convenio-banner-card.is-aplicado {
        border-left-color: #2bb673;
        background: #f4fbf7;
    }
    .convenio-banner-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .convenio-banner-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 46px;
        padding: .35em .6em;
        font-size: .85rem;
        font-weight: 700;
        color: #fff;
        background: #2eb4bd;
        border-radius: 20px;
    }
    .convenio-banner-card.is-aplicado .convenio-banner-badge {
        background: #2bb673;
    }
    .convenio-banner-desc {
        display: block;
        color: #63758a;
        font-weight: 400;
        font-size: .88rem;
    }
    .convenio-banner-acciones {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .convenio-banner-estado:empty {
        display: none;
    }

    /* Flex interno del banner de saldo (sin usar d-flex de Bootstrap para que .toggle()/.hide() no queden forzados a mostrarse por el !important) */
    .saldo-banner-flex {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        100% {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
    }

    /* Experiencia unificada de presupuesto dental */
    #form-presup_dent { --presup-primary:#174ea6; --presup-info:#2eb4bd; --presup-border:#dce5ef; --presup-muted:#63758a; --presup-surface:#f7f9fc; }
    #form-presup_dent > .row:first-child .card { border:0; border-radius:12px; box-shadow:0 4px 14px rgba(31,55,86,.10); }
    #form-presup_dent .nav-tabs-aten { gap:4px; padding:4px; border-radius:9px; background:#f1f5f9; }
    #form-presup_dent .nav-tabs-aten .nav-link-aten { min-height:38px; display:flex; align-items:center; justify-content:center; padding:7px 12px; border:1px solid transparent; border-radius:7px; color:#53657a!important; font-weight:600; transition:.2s; }
    #form-presup_dent .nav-tabs-aten .nav-link-aten:hover { background:#fff; color:var(--presup-primary)!important; }
    #form-presup_dent .nav-tabs-aten .nav-link-aten.active { color:#fff!important; background:var(--presup-primary); box-shadow:0 3px 8px rgba(23,78,166,.22); }
    #od_presup_clinico .tit-gen { margin-bottom:4px; color:var(--presup-primary); font-size:1rem; font-weight:700; text-transform:none; }
    #contenedor_piezas_dentales_presupuesto .card-informacion, #contenedor_todos .card-informacion, #contenedor_insumos .card-informacion { margin-bottom:10px; border:1px solid var(--presup-border); border-left:4px solid #6c9ee8; border-radius:10px; background:#fff; box-shadow:0 2px 7px rgba(31,55,86,.05); transition:.2s; }
    #contenedor_piezas_dentales_presupuesto .card-informacion:hover, #contenedor_todos .card-informacion:hover, #contenedor_insumos .card-informacion:hover { border-color:#b9cce3; box-shadow:0 5px 14px rgba(31,55,86,.10); transform:translateY(-1px); }
    #od_presup_clinico .card-informacion .form-control[readonly] { background:var(--presup-surface); color:#33465c; cursor:default; }
    #od_presup_clinico .card-informacion .form-group { margin-bottom:.75rem; }
    #od_presup_clinico .card-informacion .btn-icon { width:34px; height:34px; margin:auto; border-radius:50%; }
    .presupuesto-resumen { border:1px solid #cbd9ea; border-radius:12px; background:#fff; box-shadow:0 4px 13px rgba(31,55,86,.08); overflow:hidden; }
    .presupuesto-resumen .resumen-metrica { min-height:68px; padding:10px 8px; border-right:1px solid #edf1f6; }
    .presupuesto-resumen .resumen-metrica h5 { margin-bottom:3px!important; color:var(--presup-muted)!important; font-size:.72rem; font-weight:700; text-transform:uppercase; }
    .presupuesto-resumen .resumen-metrica p { margin:0; color:#253d5a; font-size:1rem; font-weight:700; }
    .presupuesto-resumen .resumen-destacado { min-height:68px; padding:10px 12px; color:#fff; }
    .presupuesto-resumen .resumen-destacado h5, .presupuesto-resumen .resumen-destacado p { margin:0; color:#fff!important; }
    .presupuesto-acciones { display:flex; flex-wrap:wrap; justify-content:flex-end; gap:8px; padding-top:14px; }
    .presupuesto-acciones .btn { min-height:40px; margin:0!important; border-radius:8px; font-weight:600; }
    .presupuesto-vacio { padding:32px 20px; border:1px dashed #b8c8da; border-radius:10px; background:var(--presup-surface); color:var(--presup-muted); text-align:center; }
    #presup_estado_pago{width:100%!important;table-layout:fixed}
    #presup_estado_pago th,#presup_estado_pago td{white-space:normal!important;word-break:normal;vertical-align:middle}
    #presup_estado_pago th:nth-child(1){width:31%}#presup_estado_pago th:nth-child(2){width:12%}
    #presup_estado_pago th:nth-child(3){width:12%}#presup_estado_pago th:nth-child(4){width:9%}
    #presup_estado_pago th:nth-child(5){width:13%}#presup_estado_pago th:nth-child(6){width:11%}#presup_estado_pago th:nth-child(7){width:12%}
    #presup_estado_pago td:first-child{font-size:.78rem;line-height:1.25}
    .presupuesto-tabla-responsive{overflow-x:hidden}
    #presup_estado_pago_wrapper .dataTables_scroll,#presup_estado_pago_wrapper .dataTables_scrollBody{overflow-x:visible!important}
    .presupuesto-pieza-cell{display:flex;align-items:center;justify-content:center;gap:8px;white-space:nowrap}
    .presupuesto-pieza-cell img{width:30px;height:42px;object-fit:contain;flex:0 0 auto}
    .presupuesto-pieza-cell strong{color:#174ea6;font-size:.82rem}
    @media(max-width:767.98px){#presup_estado_pago th:nth-child(4),#presup_estado_pago td:nth-child(4){display:none}#presup_estado_pago th:nth-child(1){width:29%}#presup_estado_pago th:nth-child(2){width:15%}#presup_estado_pago th:nth-child(3),#presup_estado_pago th:nth-child(5){width:14%}#presup_estado_pago th:nth-child(6),#presup_estado_pago th:nth-child(7){width:14%}.presupuesto-pieza-cell{gap:3px}.presupuesto-pieza-cell img{width:23px;height:34px}#presup_estado_pago th,#presup_estado_pago td{padding:.45rem .25rem;font-size:.7rem}}
    #modalReasignarPresupuesto .modal-content { border:0; border-radius:14px; overflow:hidden; box-shadow:0 18px 45px rgba(20,42,70,.25); }
    #modalReasignarPresupuesto .modal-header { align-items:center; padding:16px 22px; border:0; background:#2eb4bd; color:#fff; }
    #modalReasignarPresupuesto .modal-title { font-weight:700; }
    #modalReasignarPresupuesto .close { width:42px; height:42px; margin:-8px -8px -8px auto; padding:0; border-radius:50%; background:rgba(12,86,113,.45); color:#fff; text-shadow:none; opacity:1; }
    #modalReasignarPresupuesto .modal-body { padding:18px; background:#f5f8fb; }
    #modalReasignarPresupuesto .reasignacion-ayuda { border:1px solid #a8dfe5; border-radius:9px; background:#e5f7f9; color:#075b69; }
    #modalReasignarPresupuesto .reasignacion-resumen { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:10px; }
    #modalReasignarPresupuesto .reasignacion-metrica { padding:13px 15px; border:1px solid #dce5ef; border-radius:10px; background:#fff; }
    #modalReasignarPresupuesto .reasignacion-metrica small { display:block; margin-bottom:4px; color:#63758a; font-size:.7rem; font-weight:700; text-transform:uppercase; }
    #modalReasignarPresupuesto .reasignacion-metrica strong { color:#24415f; font-size:1.2rem; }
    #modalReasignarPresupuesto .reasignacion-seleccion { height:100%; padding:13px 15px; border:1px solid #cbd9ea; border-radius:10px; background:#fff; }
    #modalReasignarPresupuesto .reasignacion-seccion { margin-bottom:12px; border:1px solid #dce5ef; border-radius:10px; background:#fff; overflow:hidden; }
    #modalReasignarPresupuesto .reasignacion-seccion .card-top { padding:11px 14px; border-bottom:1px solid #e8eef5; background:#f8fafc; }
    #modalReasignarPresupuesto .reasignacion-seccion .card-top h6 { margin:0; font-size:.85rem; text-transform:none!important; }
    #modalReasignarPresupuesto .valor-checkbox { width:18px; height:18px; cursor:pointer; }
    #modalReasignarPresupuesto .orden-seleccion { display:inline-flex; align-items:center; justify-content:center; min-width:24px; height:24px; margin-left:6px; border-radius:50%; background:#174ea6; color:#fff; font-size:.72rem; font-weight:700; }
    #modalReasignarPresupuesto .estado-reasignacion { display:inline-flex; align-items:center; gap:5px; padding:4px 8px; border-radius:12px; font-size:.7rem; font-weight:700; white-space:nowrap; }
    #modalReasignarPresupuesto .estado-reasignacion::before { width:8px; height:8px; border-radius:50%; background:currentColor; content:""; }
    #modalReasignarPresupuesto .estado-reasignacion.pagado { background:#e7f7ed; color:#299c55; }
    #modalReasignarPresupuesto .estado-reasignacion.parcial { background:#fff3dd; color:#d98a08; }
    #modalReasignarPresupuesto .estado-reasignacion.pendiente { background:#ffebed; color:#dc3545; }
    #modalReasignarPresupuesto .monto-cubierto { color:#299c55; font-weight:700; white-space:nowrap; }
    #modalReasignarPresupuesto .monto-pendiente { color:#dc3545; font-weight:700; white-space:nowrap; }
    #modalReasignarPresupuesto .modal-footer { border-top:1px solid #dce5ef; background:#fff; }
    @media (max-width:767.98px) { #modalReasignarPresupuesto .reasignacion-resumen { grid-template-columns:1fr; } }
    @media (max-width:991.98px) {
        #form-presup_dent .nav-tabs-aten { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); }
        .presupuesto-resumen .resumen-metrica { border-bottom:1px solid #edf1f6; }
        .presupuesto-acciones { justify-content:stretch; }
        .presupuesto-acciones .btn { flex:1 1 220px; }
    }
</style>

<script>
    function agruparInsumosPresupuesto(insumos) {
        const grupos = new Map();
        (insumos || []).forEach(function (insumo) {
            const idProducto = Number(insumo.id_producto) || 0;
            const clave = idProducto
                ? 'producto:' + idProducto
                : 'nombre:' + String(insumo.insumos || '').trim().toUpperCase();
            if (!grupos.has(clave)) {
                grupos.set(clave, Object.assign({}, insumo, {
                    cantidad: 0,
                    valor_descuento: 0,
                    nuevo_valor: 0,
                    nombre_marca: insumo.nombre_marca && String(insumo.nombre_marca).toLowerCase() !== 'null'
                        ? insumo.nombre_marca
                        : ''
                }));
            }
            const grupo = grupos.get(clave);
            grupo.cantidad += Number(insumo.cantidad) || 0;
            grupo.valor_descuento += Number(insumo.valor_descuento) || 0;
            grupo.nuevo_valor += Number(insumo.nuevo_valor) || 0;
            const prioridad = { error: 3, incompleto: 2, ok: 1 };
            if ((prioridad[insumo.estado_pago] || 3) > (prioridad[grupo.estado_pago] || 0)) {
                grupo.estado_pago = insumo.estado_pago || 'error';
            }
        });
        return Array.from(grupos.values());
    }

    // Render centralizado de los insumos del presupuesto clínico.
    // Se expone en window para que la ficha odontológica pueda refrescar
    // inmediatamente los packs automáticos al agregar un tratamiento.
    window.renderizarInsumosPresupuestoClinico = function (insumos) {
        const $contenedor = $('#contenedor_insumos');
        if (!$contenedor.length) return;

        const escapar = function (valor) {
            return $('<div>').text(valor === null || valor === undefined ? '' : valor).html();
        };

        $contenedor.empty();

        agruparInsumosPresupuesto(insumos).forEach(function (insumo) {
            if (Number(insumo.presupuesto) !== 1 || Number(insumo.urgencia || 0) !== 0) {
                return;
            }

            const cantidad = Number(insumo.cantidad) || 0;
            const valor = Number(insumo.valor) || 0;
            const descuento = Number(insumo.valor_descuento || insumo.descuento) || 0;
            const subtotal = cantidad * valor;
            const total = Math.max(0, subtotal - descuento);
            const nombre = ((insumo.insumos || '') + ' ' + (insumo.nombre_marca || '')).trim();

            $contenedor.append(`
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-insumo-presupuesto="${Number(insumo.id) || 0}">
                    <div class="card-informacion">
                        <div class="card-body pb-0">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-4">
                                    <label class="floating-label-activo-sm">Insumo</label>
                                    <input type="text" class="form-control form-control-sm" value="${escapar(nombre)}" readonly>
                                </div>
                                <div class="form-group col-md-3 col-lg-1">
                                    <label class="floating-label-activo-sm">Cantidad</label>
                                    <input type="text" class="form-control form-control-sm" value="${cantidad}" readonly>
                                </div>
                                <div class="form-group col-md-3 col-lg-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" value="${formatoMoneda(subtotal)}" readonly>
                                </div>
                                <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" value="${descuento ? formatoMoneda(descuento) : ''}" readonly>
                                </div>
                                <div class="form-group col-md-3 col-lg-2">
                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                    <input type="text" class="form-control form-control-sm" value="${formatoMoneda(total)}" readonly>
                                </div>
                                <div class="form-group col-md-1 col-lg-1 d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${Number(insumo.id) || 0},'gral')" title="Quitar insumo">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });

        if (typeof mejorarExperienciaPresupuestoDental === 'function') {
            mejorarExperienciaPresupuestoDental();
        }
    };
</script>

<div id="form-presup_dent"
     data-id-presupuesto="{{ data_get($presupuesto ?? null, 'id', '') }}"
     data-paciente-id="{{ data_get($paciente ?? null, 'id', '') }}">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="od_grl" role="tablist">
                                @if (!$paciente->es_adulto)
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset " id="od_pac_depend_tab" data-toggle="tab"
                                            href="#od_pac_depend" role="tab" aria-controls="od_pac_depend"
                                            aria-selected="true">Paciente Menor de edad y Dependientes</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_convenios_vigentes-tab" data-toggle="tab"
                                        href="#od_convenios_vigentes" role="tab"
                                        aria-controls="od_convenios_vigentes" aria-selected="true"><i class="fas fa-handshake mr-1"></i> Convenios vigentes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="od_presup_clinico-tab"
                                        data-toggle="tab" href="#od_presup_clinico" role="tab"
                                        aria-controls="od_presup_clinico" aria-selected="true"><i class="fas fa-tooth mr-1"></i> Presupuesto clínico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_laboratorio-tab" data-toggle="tab"
                                        href="#od_laboratorio" role="tab" aria-controls="od_laboratorio"
                                        aria-selected="true"><i class="fas fa-flask mr-1"></i> Laboratorio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od__presup_gral-tab" data-toggle="tab"
                                        href="#od__presup_gral" role="tab" aria-controls="od__presup_gral" onclick="actualizar_presupuesto()"
                                        aria-selected="true"><i class="fas fa-calculator mr-1"></i> Resumen general</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_abonos_pres-tab" data-toggle="tab"
                                        href="#od_abonos_pres" role="tab" aria-control="od_abonos_pres"
                                        aria-selected="false" onclick="actualizar_presupuesto()"><i class="fas fa-credit-card mr-1"></i> Pagos y estados</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="tab-content" id="od_grl">
                <!--DEPENDIENTES-->
                <div class="tab-pane fade  {{ !$paciente->es_adulto ? 'show active' : '' }}" id="od_pac_depend"
                    role="tabpanel" aria-labelledby="od_pac_depend_tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active " id="od_at_menor-tab"
                                                    data-toggle="tab" href="#od_at_menor" role="tab"
                                                    aria-controls="od_at_menor" aria-selected="false">Identificación
                                                </a>
                                                <a class="nav-link-aten text-reset" id="od_at_acomp_a-tab"
                                                    data-toggle="tab" href="#od_at_acomp_a" role="tab"
                                                    aria-controls="od_at_acomp_a" aria-selected="true">Acompañantes
                                                    Autorizados</a>
                                                <a class="nav-link-aten text-reset" id="od_at_res_p-tab"
                                                    data-toggle="tab" href="#od_at_res_p" role="tab"
                                                    aria-controls="od_at_res_p" aria-selected="true">Responsable del
                                                    Pago </a>
                                                <a class="nav-link-aten text-reset" id="od_at_part-tab"
                                                    data-toggle="tab" href="#od_at_part" role="tab"
                                                    aria-controls="od_at_part"
                                                    aria-selected="false">Particularidades</a>
                                                <a class="nav-link-aten text-reset" id="od_at_perm-tab"
                                                    data-toggle="tab" href="#od_at_perm" role="tab"
                                                    aria-controls="od_at_perm" aria-selected="false">Solicitar
                                                    Permisos</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="od_at_menor"
                                                    role="tabpanel" aria-labelledby="od_at_menor-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_rut"id="od_id_pte_rut"
                                                                    value="{{ $paciente->rut }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_nomb"id="od_id_pte_nomb"
                                                                    value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">FN</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_fn"id="od_id_pte_fn">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Edad</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_edad"id="od_id_pte_edad"
                                                                    value="{{ $paciente->edad }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Observaciones
                                                                    </label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo"
                                                                        data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                        name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="od_at_acomp_a" role="tabpanel"
                                                    aria-labelledby="od_at_acomp_a-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Parentezco</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label
                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_tel"id="od_id_aca_tel">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_email"id="od_id_aca_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Observaciones
                                                                    </label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo"
                                                                        data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                        name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="od_at_res_p" role="tabpanel"
                                                    aria-labelledby="od_at_res_p-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label
                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_tel"id="od_id_aca_tel">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_email"id="od_id_aca_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-block btn-sm"
                                                                        onclick="abrir_modal_guardar_aceptar_pago(' ');"><i
                                                                            class="fas fa-save"></i> Aceptar
                                                                        Presupuesto y pago</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="od_at_part" role="tabpanel"
                                                    aria-labelledby="od_at_part-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Observaciones
                                                                    Acerca del tipo de Paciente</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico"
                                                                    data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                    name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="od_at_perm" role="tabpanel"
                                                    aria-labelledby="od_at_perm-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Autorización
                                                                        Vigente</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="od_est_aut_v"id="od_est_aut_venc">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Autorización
                                                                        Vencida</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="od_est_aut_venc"id="od_est_aut_venc">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-block btn-sm"
                                                                        onclick="abrir_modal_guardar_aceptar_pago(' ');"><i
                                                                            class="fas fa-save"></i> Solicitar o
                                                                        Renovar autorización</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label
                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico"
                                                                    data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                    name="obs_ex_biom" id="obs_ex_biom"></textarea>
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
                </div>
                <!--CONVENIOS VIGENTES-->
                <div class="tab-pane fade show" id="od_convenios_vigentes" role="tabpanel"
                    aria-labelledby="od_convenios_vigentes_tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Convenios Vigentes</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3 borde-azul">
                                <div class="card-body">
                                     <p class="font-weight-bold"><span class="text-c-blue">Convenio del paciente:</span> {{ $paciente->prevision->nombre }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row row-cols-1 row-cols-md-2 row-cols-lg-6 row-cols-xl-3 row-cols-xxl-5">
                        @if ($convenios_prevision->count() > 0)
                            @foreach ($convenios_prevision as $c)
                                <div class="col-md-3 mb-2">
                                    <div class="card-informacion">
                                        <div class="card-body">
                                            <div class="media">
                                                <img src="{{ asset('images/iconos/usuario_profesional.svg') }}"
                                                    class="mr-3 mt-2 wid-70 rounded-circle" alt="...">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">{{ $c->nombre_convenio }}</h5>
                                                    <p class="mb-2">{{ $c->porcentaje }} % {{ $c->descripcion }}</p>
                                                    @if ($paciente->prevision->nombre == $c->nombre_convenio)
                                                        @if ($presupuesto && (int) $presupuesto->id_convenio_aplicado === (int) $c->id)
                                                            <a href="#" class="btn btn-danger btn-sm" onclick="quitar_convenio_tratamiento({{ $c->id }})">Quitar descuento</a>
                                                        @else
                                                            <a href="#" class="btn btn-primary btn-sm" onclick="aplicar_convenio_tratamiento({{ $c->id }})">Aplicar</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="badge badge-danger">No ha configurado sus convenios. Puede ir directamente
                                desde este <a href="{{ route('profesional.mis_propios_convenios') }}">link </a></span>
                        @endif

                    </div>
                </div>
                <!--PRESUPUESTO CLÍNICO-->
                <div class="tab-pane fade show active" id="od_presup_clinico" role="tabpanel"
                    aria-labelledby="od_presup_clinico_tab">
                    @php
                        $presupuestoActualClinico = $presupuesto ?? null;
                        $filtrarPresupuestoClinico = function ($coleccion) use ($presupuestoActualClinico) {
                            return collect($coleccion)->filter(function ($item) use ($presupuestoActualClinico) {
                                return (int) data_get($item, 'presupuesto', 0) === 1
                                    && (int) data_get($item, 'urgencia', 0) === 0
                                    && (!$presupuestoActualClinico || !data_get($item, 'id_presupuesto') || (int) data_get($item, 'id_presupuesto') === (int) $presupuestoActualClinico->id);
                            });
                        };
                        $piezasClinicasPresupuesto = $filtrarPresupuestoClinico($odontograma);
                        $generalesClinicosPresupuesto = $filtrarPresupuestoClinico($todos);
                        $insumosClinicosPresupuesto = $filtrarPresupuestoClinico($insumos_tratamientos);
                        $cantidadPiezasPresupuesto = $piezasClinicasPresupuesto->count();
                        $cantidadGeneralesPresupuesto = $generalesClinicosPresupuesto->count();
                        $cantidadInsumosPresupuesto = $insumosClinicosPresupuesto->count();
                        $cantidadItemsPresupuesto = $cantidadPiezasPresupuesto + $cantidadGeneralesPresupuesto + $cantidadInsumosPresupuesto;
                        $valores = $generalesClinicosPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor', 0));
                        $valores_piezas = $piezasClinicasPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor', 0));
                        $valores_insumos = $insumosClinicosPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor', 0) * (float) data_get($item, 'cantidad', 1));
                        $descuentosClinicoPresupuesto = $generalesClinicosPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor_descuento', 0))
                            + $piezasClinicasPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor_descuento', 0))
                            + $insumosClinicosPresupuesto->sum(fn ($item) => (float) data_get($item, 'valor_descuento', 0));
                        $totalBrutoClinicoPresupuesto = $valores + $valores_piezas + $valores_insumos + $valores_laboratorio;
                        $totalClinicoPresupuesto = max(0, $totalBrutoClinicoPresupuesto - $descuentosClinicoPresupuesto);
                        $saldoClinicoPresupuesto = max(0, $totalClinicoPresupuesto - $valor_abonado);

                        // Resumen por pieza para el visor gráfico del odontograma (piezas resaltadas + detalle al hacer clic)
                        $piezasPresupuestoDetalle = collect($odontograma)
                            ->where('presupuesto', 1)
                            ->where('urgencia', 0)
                            ->groupBy(fn ($o) => (string) $o->pieza)
                            ->map(function ($tratamientos, $pieza) {
                                $total = $tratamientos->sum('valor');
                                $descuento = $tratamientos->sum(fn ($o) => $o->valor_descuento ?? 0);
                                $aPagar = $total - $descuento;
                                return [
                                    'pieza' => $pieza,
                                    'total' => $total,
                                    'descuento' => $descuento,
                                    'a_pagar' => $aPagar,
                                    'tratamiento' => $tratamientos->count().' '.($tratamientos->count() === 1 ? 'prestación' : 'prestaciones').' · $'.number_format($aPagar, 0, ',', '.'),
                                    'tratamientos' => $tratamientos->map(fn ($o) => [
                                        'descripcion' => $o->descripcion,
                                        'valor' => (float) $o->valor,
                                        'descuento' => (float) ($o->valor_descuento ?? 0),
                                    ])->values(),
                                ];
                            })
                            ->values();
                    @endphp
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                                <div>
                                    <h6 class="tit-gen">Presupuesto clínico</h6>
                                    <small class="text-muted">Revise las prestaciones incluidas antes de solicitar la autorización.</small>
                                </div>
                                <span class="badge badge-primary badge-pill px-3 py-2" id="cantidad_items_presupuesto">{{ $cantidadItemsPresupuesto }} {{ $cantidadItemsPresupuesto === 1 ? 'prestación' : 'prestaciones' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form>
                                    <div class="presupuesto-vacio mb-3" id="presupuesto_clinico_vacio" style="{{ $cantidadItemsPresupuesto === 0 ? '' : 'display:none' }}">
                                        <i class="fas fa-clipboard-list fa-2x mb-2"></i>
                                        <h6 class="mb-1">Este presupuesto todavía no tiene prestaciones</h6>
                                        <p class="mb-0">Agregue tratamientos desde el odontograma o la planificación dental.</p>
                                    </div>

                                    <div class="card-informacion mb-3" id="presupuesto_piezas_visor"
                                        style="{{ $piezasPresupuestoDetalle->isEmpty() ? 'display:none' : '' }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-7 col-xl-8 mb-3 mb-lg-0">
                                                    @if(!empty($odontogramaPediatrico))
                                                        @include('atencion_odontologica.include.selector_odontograma_pediatrico', [
                                                            'id' => 'selector_presupuesto_piezas',
                                                            'inputId' => 'pieza_presupuesto_detalle',
                                                            'modo' => 'presupuesto',
                                                            'multiple' => false,
                                                            'piezasDisponibles' => $piezasPresupuestoDetalle,
                                                            'piezasPresupuesto' => $piezasPresupuestoDetalle,
                                                            'historialPiezas' => $odontograma_historial ?? $odontograma ?? [],
                                                            'titulo' => 'Piezas pediátricas del presupuesto',
                                                            'ayuda' => 'Haga clic en una pieza resaltada para ver su detalle',
                                                        ])
                                                    @else
                                                        @include('atencion_odontologica.include.selector_odontograma', [
                                                            'id' => 'selector_presupuesto_piezas',
                                                            'inputId' => 'pieza_presupuesto_detalle',
                                                            'counter' => 9500,
                                                            'multiple' => false,
                                                            'compacto' => true,
                                                            'autoRefresh' => false,
                                                            'mostrarMensajeVacio' => false,
                                                            'estadosBloqueados' => [],
                                                            'piezasDisponibles' => $piezasPresupuestoDetalle,
                                                            'titulo' => 'Piezas del presupuesto',
                                                            'ayuda' => 'Haga clic en una pieza resaltada para ver su detalle',
                                                        ])
                                                    @endif
                                                    <select class="d-none" id="pieza_presupuesto_detalle" name="pieza_presupuesto_detalle" tabindex="-1" aria-hidden="true"></select>
                                                </div>
                                                <div class="col-lg-5 col-xl-4">
                                                    <div class="presupuesto-detalle-pieza" id="detalle_pieza_presupuesto" data-detalle='@json($piezasPresupuestoDetalle->keyBy('pieza'))'>
                                                        <div class="text-muted text-center py-4" id="detalle_pieza_presupuesto_vacio">
                                                            <i class="fas fa-hand-pointer mb-2 d-block" style="font-size:1.4rem;"></i>
                                                            Seleccione una pieza resaltada para ver sus tratamientos y valores.
                                                        </div>
                                                        <div id="detalle_pieza_presupuesto_contenido" style="display:none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <style>
                                    #detalle_pieza_presupuesto{min-height:100%;padding:.9rem;border:1px solid #dce5ef;border-radius:.65rem;background:#f7f9fc;display:flex;flex-direction:column;justify-content:center}
                                    #detalle_pieza_presupuesto_contenido .detalle-pieza-fila{display:flex;justify-content:space-between;align-items:center;padding:.35rem 0;border-bottom:1px solid #e3eaef}
                                    #detalle_pieza_presupuesto_contenido .detalle-pieza-fila:last-of-type{border-bottom:none}
                                    #detalle_pieza_presupuesto_contenido .detalle-pieza-total{display:flex;justify-content:space-between;align-items:center;padding-top:.5rem;margin-top:.4rem;border-top:2px solid #174ea6}
                                    [data-pieza-presupuesto].presupuesto-pieza-activa > .card-informacion{border:2px solid #7434a4;box-shadow:0 0 0 3px rgba(116,52,164,.15);transition:box-shadow .2s ease}
                                </style>
                                <script>
                                    $(document).on('odontograma:change', '#selector_presupuesto_piezas', function(e, piezasSeleccionadas){
                                        const pieza = (piezasSeleccionadas && piezasSeleccionadas[0]) ? piezasSeleccionadas[0] : null;
                                        const $detalle = $('#detalle_pieza_presupuesto');
                                        const datosPorPieza = $detalle.data('detalle') || {};
                                        const $vacio = $('#detalle_pieza_presupuesto_vacio');
                                        const $contenido = $('#detalle_pieza_presupuesto_contenido');

                                        $('[data-pieza-presupuesto]').removeClass('presupuesto-pieza-activa');

                                        const info = pieza ? datosPorPieza[pieza] : null;
                                        if(!info){
                                            $contenido.hide().empty();
                                            $vacio.show();
                                            return;
                                        }

                                        let filas = info.tratamientos.map(function(t){
                                            const descuentoTto = Number(t.descuento || 0);
                                            const detalleDescuento = descuentoTto > 0 ? ' <small class="text-muted">(desc. '+formatoMoneda(descuentoTto)+')</small>' : '';
                                            return '<div class="detalle-pieza-fila"><span>'+t.descripcion+detalleDescuento+'</span><strong>'+formatoMoneda(Number(t.valor) - descuentoTto)+'</strong></div>';
                                        }).join('');

                                        const totalDescuento = Number(info.descuento || 0);
                                        const totalAPagar = info.a_pagar !== undefined ? Number(info.a_pagar) : Number(info.total);
                                        const filaDescuento = totalDescuento > 0
                                            ? '<div class="detalle-pieza-fila"><span>Descuento</span><strong class="text-danger">-'+formatoMoneda(totalDescuento)+'</strong></div>'
                                            : '';

                                        $contenido.html(
                                            '<h6 class="mb-2">Pieza '+pieza+'</h6>'+
                                            filas+
                                            filaDescuento+
                                            '<div class="detalle-pieza-total"><span class="font-weight-bold">Total pieza</span><span class="font-weight-bold text-c-blue">'+formatoMoneda(totalAPagar)+'</span></div>'
                                        );
                                        $vacio.hide();
                                        $contenido.show();

                                        const $card = $('[data-pieza-presupuesto="'+pieza+'"]').first();
                                        if($card.length){
                                            $card.addClass('presupuesto-pieza-activa');
                                            $card[0].scrollIntoView({behavior:'smooth', block:'center'});
                                        }
                                    });

                                    // Reconstruye el mapa de detalle por pieza (con descuentos actualizados) y refresca el panel si hay una pieza seleccionada
                                    function sincronizarDetallePresupuestoClinico(listaOdontograma){
                                        const $detalle = $('#detalle_pieza_presupuesto');
                                        if(!$detalle.length){ return; }

                                        const mapa = {};
                                        (listaOdontograma || []).forEach(function(o){
                                            if(o.presupuesto != 1 || o.urgencia != 0){ return; }
                                            const pieza = String(o.pieza);
                                            if(!mapa[pieza]){ mapa[pieza] = {pieza: pieza, total: 0, descuento: 0, a_pagar: 0, tratamientos: []}; }
                                            const descuento = Number(o.valor_descuento) || 0;
                                            const valor = Number(o.valor) || 0;
                                            mapa[pieza].total += valor;
                                            mapa[pieza].descuento += descuento;
                                            mapa[pieza].a_pagar += valor - descuento;
                                            mapa[pieza].tratamientos.push({descripcion: o.descripcion, valor: valor, descuento: descuento});
                                        });

                                        $detalle.data('detalle', mapa);

                                        const piezaActivaBtn = $('#selector_presupuesto_piezas [data-selector-pieza].is-selected').first();
                                        if(piezaActivaBtn.length){
                                            $('#selector_presupuesto_piezas').trigger('odontograma:change', [[String(piezaActivaBtn.data('selector-pieza'))]]);
                                        }
                                    }

                                    function sincronizarOdontogramaPresupuesto(listaOdontograma, piezaPreferida){
                                        const $visor = $('#presupuesto_piezas_visor');
                                        const $selector = $('#selector_presupuesto_piezas');
                                        if(!$selector.length){ return; }

                                        const idPresupuestoActual = Number($('#id_presupuesto').val() || 0);
                                        const prestaciones = (listaOdontograma || []).filter(function(o){
                                            const idItem = Number(o.id_presupuesto || 0);
                                            return Number(o.presupuesto) === 1
                                                && Number(o.urgencia) === 0
                                                && (!idPresupuestoActual || !idItem || idItem === idPresupuestoActual);
                                        });
                                        const piezas = new Set(prestaciones.map(function(o){ return String(o.pieza); }));
                                        const estadosVisuales = {};
                                        $('#selector_presupuesto_piezas, #selector_pagos_piezas').find('[data-selector-pieza]').each(function () {
                                            const pieza = String($(this).data('selector-pieza'));
                                            estadosVisuales[pieza] = String($(this).find('img').attr('data-estado-clinico') || 'normal');
                                        });

                                        // El estado verde se comparte entre los selectores pediátricos
                                        // de planificación, presupuesto clínico y pagos. Limpiamos el
                                        // estado anterior y pintamos sólo las piezas que aún pertenecen
                                        // al presupuesto recibido desde el servidor.
                                        $('.selector-odontograma-pediatrico [data-pieza-pediatrica]').each(function(){
                                            const $pieza = $(this);
                                            const numero = String($pieza.data('pieza-pediatrica'));
                                            const presupuestada = piezas.has(numero);
                                            $pieza.toggleClass('is-in-budget', presupuestada);
                                            if (!presupuestada) {
                                                $pieza.removeClass('is-selected').attr('aria-pressed', 'false');
                                            }
                                        });

                                        // Presupuesto y pagos sólo permiten interactuar con piezas
                                        // actualmente incluidas. El selector del plan permanece libre
                                        // para poder incorporar una pieza nueva.
                                        $('#selector_presupuesto_piezas, #selector_pagos_piezas').each(function(){
                                            const $selectorPediatrico = $(this);
                                            $selectorPediatrico.find('[data-pieza-pediatrica]').each(function(){
                                                const $pieza = $(this);
                                                const habilitada = piezas.has(String($pieza.data('pieza-pediatrica')));
                                                $pieza.prop('disabled', !habilitada)
                                                    .toggleClass('is-locked', !habilitada)
                                                    .toggleClass('is-in-budget', habilitada)
                                                    .attr('aria-disabled', habilitada ? 'false' : 'true');
                                            });
                                        });

                                        const cantidadPrestaciones = prestaciones.length;
                                        $('#cantidad_items_presupuesto').text(
                                            cantidadPrestaciones + (cantidadPrestaciones === 1 ? ' prestación' : ' prestaciones')
                                        );
                                        $('#presupuesto_clinico_vacio').toggle(cantidadPrestaciones === 0);

                                        prestaciones.forEach(function(o){
                                            const pieza = String(o.pieza);
                                            if(estadosVisuales[pieza] === 'ausente'){ return; }
                                            const diagnostico = String(o.diagnostico || '').toLowerCase();
                                            const tratamiento = String(o.tratamiento || o.descripcion || '').toLowerCase();
                                            let estado = estadosVisuales[pieza] || 'normal';
                                            if(diagnostico.includes('carie')) estado = 'carie';
                                            if(tratamiento.includes('implante')) estado = Number(o.estado) === 0 ? 'ausente' : 'implante';
                                            if(estado !== 'ausente' && (tratamiento.includes('endodoncia') || tratamiento.includes('pulpotomia') || tratamiento.includes('pulpectomia'))){
                                                estado = 'endodoncia';
                                            }
                                            estadosVisuales[pieza] = estado;
                                        });

                                        const base = @json(asset('images/dental/dientes'));
                                        const basePediatrico = @json(asset('images/dental/odontopediatria'));
                                        const baseDientesPediatricos = @json(asset('images/dientes'));
                                        const esOdontogramaPediatrico = @json(!empty($odontogramaPediatrico));
                                        $('#selector_presupuesto_piezas, #selector_pagos_piezas').each(function(){
                                          $(this).find('[data-selector-pieza]').each(function(){
                                            const $boton = $(this), pieza = String($boton.data('selector-pieza'));
                                            const habilitada = piezas.has(pieza), codigo = pieza.replace('.', '');
                                            const estado = estadosVisuales[pieza] || 'normal';
                                            const rutas = esOdontogramaPediatrico ? {
                                                carie: basePediatrico + '/carie/carie' + codigo + '.png',
                                                ausente: basePediatrico + '/diente-ausente/dau' + codigo + '.png',
                                                endodoncia: basePediatrico + '/pulpotomia/pulpotomia' + codigo + '.png',
                                                normal: baseDientesPediatricos + '/d' + codigo + '.png'
                                            } : {
                                                carie: base + '/carie/carie' + codigo + '.png',
                                                ausente: base + '/diente-ausente/dau' + codigo + '.png',
                                                implante: base + '/implante/impl' + codigo + '.png',
                                                endodoncia: base + '/endodoncia/endo' + codigo + '.png',
                                                normal: base + '/d' + codigo + '.png'
                                            };

                                            $boton.prop('disabled', !habilitada)
                                                .toggleClass('is-enabled', habilitada)
                                                .toggleClass('is-locked', !habilitada)
                                                .toggleClass('is-in-budget', habilitada);
                                            $boton.find('img').attr('src', rutas[estado] || rutas.normal).attr('data-estado-clinico', estado);
                                            if(!habilitada) $boton.removeClass('is-selected').attr('aria-pressed', 'false');
                                          });
                                        });

                                        $visor.toggle(prestaciones.length > 0);
                                        sincronizarDetallePresupuestoClinico(prestaciones);
                                        if (typeof window.renderizarTarjetasPresupuestoClinico === 'function') {
                                            window.renderizarTarjetasPresupuestoClinico(prestaciones);
                                        }

                                        const seleccionActual = String($selector.find('.is-selected').first().data('selector-pieza') || '');
                                        const preferida = piezaPreferida && piezas.has(String(piezaPreferida))
                                            ? String(piezaPreferida)
                                            : (piezas.has(seleccionActual) ? seleccionActual : (piezas.values().next().value || null));
                                        $selector.find('.is-selected').removeClass('is-selected').attr('aria-pressed', 'false');
                                        if(preferida){
                                            const $boton = $selector.find('[data-selector-pieza="' + preferida + '"]');
                                            $boton.addClass('is-selected').attr('aria-pressed', 'true');
                                            $selector.find('.selector-odontograma-generico__resumen').html('<span class="badge badge-primary">' + preferida + '</span>');
                                            $selector.trigger('odontograma:change', [[preferida]]);
                                        } else {
                                            $selector.find('.selector-odontograma-generico__resumen').html('<span class="text-muted">Ninguna pieza seleccionada</span>');
                                            $('#detalle_pieza_presupuesto_contenido').hide().empty();
                                            $('#detalle_pieza_presupuesto_vacio').show();
                                        }

                                        if(typeof mejorarExperienciaPresupuestoDental === 'function'){
                                            mejorarExperienciaPresupuestoDental();
                                        }

                                        if (typeof window.renderizarPlanOdontop === 'function') {
                                            window.renderizarPlanOdontop(listaOdontograma || []);
                                        }

                                        if (typeof sincronizarSelectorPagosPiezas === 'function') {
                                            sincronizarSelectorPagosPiezas(prestaciones);
                                        }

                                        $(document).trigger('odontop:selectores-actualizados', [prestaciones]);
                                    }

                                    window.sincronizarOdontogramaPresupuesto = sincronizarOdontogramaPresupuesto;

                                    window.renderizarTarjetasPresupuestoClinico = function (listaOdontograma) {
                                        const $contenedor = $('#contenedor_piezas_dentales_presupuesto');
                                        if (!$contenedor.length) return;

                                        const listaNormalizada = Array.isArray(listaOdontograma)
                                            ? listaOdontograma
                                            : Object.values(listaOdontograma || {});
                                        const prestaciones = listaNormalizada.filter(function (pieza) {
                                            return Number(pieza.presupuesto) === 1 && Number(pieza.urgencia) === 0;
                                        });

                                        const escapar = function (valor) {
                                            return $('<div>').text(valor === null || valor === undefined ? '' : valor).html();
                                        };

                                        $contenedor.empty();
                                        prestaciones.forEach(function (pieza) {
                                            const valor = Number(pieza.valor || 0);
                                            const descuento = Number(pieza.valor_descuento || 0);
                                            const total = Math.max(0, valor - descuento);
                                            $contenedor.append(`
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-pieza-presupuesto="${escapar(pieza.pieza)}">
                                                    <div class="card-informacion">
                                                        <div class="card-body pb-0">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1">
                                                                    <label class="floating-label-activo-sm">Pieza</label>
                                                                    <input type="text" class="form-control form-control-sm" value="${escapar(pieza.pieza)}" readonly>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Prestaci&oacute;n</label>
                                                                    <textarea class="form-control form-control-sm prestacion-dos-lineas" readonly>${escapar(pieza.descripcion || pieza.tratamiento || 'Sin tratamiento')}</textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                                    <input type="text" class="form-control form-control-sm" value="${formatoMoneda(valor)}" readonly>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                                    <input type="text" class="form-control form-control-sm" value="${descuento ? formatoMoneda(descuento) : ''}" readonly>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                    <label class="floating-label-activo-sm">Total prestaci&oacute;n</label>
                                                                    <input type="text" class="form-control form-control-sm" value="${formatoMoneda(total)}" readonly>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-1 col-xl-1 d-flex align-items-center justify-content-center">
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_odontograma(${Number(pieza.id)})" title="Quitar del presupuesto"><i class="feather icon-x"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            `);
                                        });

                                        if (typeof mejorarExperienciaPresupuestoDental === 'function') {
                                            mejorarExperienciaPresupuestoDental();
                                        }
                                    };

                                    $(function () {
                                        window.renderizarTarjetasPresupuestoClinico(@json(collect($odontograma)->values()));
                                    });
                                </script>

                                <div class="form-row" id="contenedor_piezas_dentales_presupuesto">
                                    @foreach ($odontograma as $o)
                                        @if ($o->presupuesto == 1 && $o->urgencia == 0)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-pieza-presupuesto="{{ $o->pieza }}">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div
                                                                class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1">
                                                                <label class="floating-label-activo-sm">Pieza</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ $o->pieza }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4">
                                                                <label
                                                                    class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="prestación" id="prestación"
                                                                    value="{{ $o->descripcion }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($o->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($o->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="eliminar_odontograma({{ $o->id }})"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-row" id="contenedor_todos">
                                    @foreach ($todos as $diagnostico)
                                        @if ($diagnostico->presupuesto == 1)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-2">
                                                                <label class="floating-label-activo-sm">Grupo de piezas</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    value="{{ $diagnostico->localizacion }}" readonly>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-9 col-lg-4">
                                                                <label
                                                                    class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="prestación" id="prestación"
                                                                    value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($diagnostico->valor, 0, ',', '.') }}" readonly>
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-3 col-lg-1">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-2">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($diagnostico->valor, 0, ',', '.') }}" readonly>
                                                            </div>
                                                            <div class="form-group col-md-1 col-lg-1 d-flex">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-row" id="contenedor_insumos">
                                    @foreach ($insumos_tratamientos as $diagnostico)
                                        @if ($diagnostico->presupuesto == 1 && $diagnostico->urgencia == 0)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 col-lg-4">
                                                                <label class="floating-label-activo-sm">Insumo</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="insumo_pres" id="insumo_pres"
                                                                    value="{{ $diagnostico->insumos }} {{ $diagnostico->nombre_marca }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-1">
                                                                <label
                                                                    class="floating-label-activo-sm">Cantidad</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="cantidad_pres" id="cantidad_pres"
                                                                    value="{{ $diagnostico->cantidad }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ $diagnostico->descuento }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-2">
                                                                <label class="floating-label-activo-sm">Total
                                                                    Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor * $diagnostico->cantidad, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-md-1 col-lg-1 d-flex">

                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="eliminar_insumo({{ $diagnostico->id }},'gral')"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </form>
                            <div id="valores">
                                </br>
                            </div>
                            <div class="container-fluid mt-3 mb-2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                        <h6 class="tit-gen">Detalle de valores del Presupuesto Clínico</h6>
                                    </div>
                                </div>
                                <div class="row align-items-stretch text-center font-weight-bold presupuesto-resumen">
                                    <!-- Total -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="text-c-blue mb-0">Total Grupo/Boca</h5>
                                        <p id="valores_examenes_presupuesto">$ {{ number_format($valores, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Total Piezas -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="text-c-blue mb-0">Total Piezas</h5>
                                        <p id="valores_piezas_presupuesto">$
                                            {{ number_format($valores_piezas, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Insumos -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="text-c-blue mb-0">Insumos</h5>
                                        <p id="valores_insumos_presupuesto">$
                                            {{ number_format($valores_insumos, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="text-c-blue mb-0">Laboratorio</h5>
                                        <p id="valores_laboratorio">${{ number_format($valores_laboratorio,0,',','.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="text-c-blue mb-0">Descuentos</h5>
                                        <p id="valores_descuentos_presupuesto">${{ number_format($descuentosClinicoPresupuesto, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Total Final -->
                                    <div class="col-sm-6 col-md-4 col-lg-2 bg-naranjo resumen-destacado d-flex flex-column justify-content-center">
                                        <h5 class="text-white mb-0">Total Final</h5>
                                        <p class="text-white" id="valores_total_final_presupuesto">$
                                            {{ number_format($totalClinicoPresupuesto, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Abonos -->
                                    <div class="col-sm-6 col-md-4 col-lg-2 bg-info resumen-destacado d-flex flex-column justify-content-center">
                                        <h5 class="text-white mb-0">Abonado</h5>
                                        <p class="text-white" id="valores_abonado_presupuesto">$
                                            {{ number_format($valor_abonado, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2 text-right">
                                    <div><small class="text-muted d-block">Saldo pendiente</small><strong class="text-c-blue f-18" id="saldo_pendiente_presupuesto">${{ number_format($saldoClinicoPresupuesto, 0, ',', '.') }}</strong></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 presupuesto-acciones">
                                    <button type="button" class="btn btn-outline-primary accion-requiere-presupuesto" onclick="generar_pdf()" {{ $cantidadItemsPresupuesto === 0 ? 'disabled' : '' }}>
                                        <i class="fa fa-file-pdf mr-1"></i> Vista PDF
                                    </button>
                                    <button type="button" class="btn btn-info my-2 accion-requiere-presupuesto"
                                        onclick="pedir_autorizacion_presupuesto_dental()" {{ $cantidadItemsPresupuesto === 0 ? 'disabled' : '' }}><i class="fas fa-paper-plane mr-1"></i>
                                        Solicitar autorización</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--LABORATORIO-->
                <div class="tab-pane fade show" id="od_laboratorio" role="tabpanel"
                    aria-labelledby="od_laboratorio-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Laboratorio</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset" id="od_laboratorio_trab-tab"
                                                    data-toggle="tab" href="#od_laboratorio_trab" role="tab"
                                                    aria-controls="od_laboratorio_trab"
                                                    aria-selected="false" onclick="dame_estados_trabajo()">Estados Trabajos</a>
                                                <a class="nav-link-aten text-reset" id="costo_presupuesto_trab-tab"
                                                    data-toggle="tab" href="#costo_presupuesto_trab"
                                                    role="tab" aria-controls="costo_presupuesto_trab"
                                                    aria-selected="false" onclick="dame_estados_trabajo()">Costo/Presupuesto Lab</a>
                                                <a class="nav-link-aten text-reset" id="od_lab_estadopago-tab"
                                                    data-toggle="tab" href="#od_lab_estadopago" role="tab"
                                                    aria-controls="od_lab_estadopago" aria-selected="false">Estados
                                                    de Pago</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--ESTADOS DE TRABAJO-->
                                                <div class="tab-pane fade show active" id="od_laboratorio_trab"
                                                    role="tabpanel" aria-labelledby="od_laboratorio_trab-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Estados de trabajo</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div id="contenedor_ordenes_trabajos_menores_dental">

                                                                @if (isset($ordenes_tm))
                                                                    @foreach ($ordenes_tm as $o)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card-informacion">
                                                                                    <div class="card-body">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Nombre
                                                                                                    Laboratorio</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_nom"
                                                                                                    id="lab_nom"
                                                                                                    value="{{ $o->nombre_lab }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Trabajo
                                                                                                    Requerido</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_ord_trab"
                                                                                                    id="lab_ord_trab"
                                                                                                    value="{{ $o->trabajo_realizar }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.envío</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fenv"
                                                                                                    id="lab_fenv"
                                                                                                    value="{{ $o->fecha_envio }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.entrega</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fent"
                                                                                                    id="lab_fent"
                                                                                                    value="{{ $o->fecha_entrega }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Estado</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_est"
                                                                                                    id="lab_est"
                                                                                                    value="{{ $o->estado == 1 ? 'Pendiente' : 'Otro' }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">N°
                                                                                                    Identificación</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_id_trab"
                                                                                                    id="lab_id_trab"
                                                                                                    value="{{ $o->nro_orden }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                    onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12">
                                                            <div id="contenedor_ordenes_trabajos_mayores_dental">

                                                                @if (isset($ordenes_tmy))
                                                                    @foreach ($ordenes_tmy as $o)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card-informacion">
                                                                                    <div class="card-body">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Nombre
                                                                                                    Laboratorio</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_nom"
                                                                                                    id="lab_nom"
                                                                                                    value="{{ $o->nombre_lab }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Trabajo
                                                                                                    Requerido</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_ord_trab"
                                                                                                    id="lab_ord_trab"
                                                                                                    value="{{ $o->trabajo_realizar }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.envío</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fenv"
                                                                                                    id="lab_fenv"
                                                                                                    value="{{ $o->fecha_envio }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.entrega</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fent"
                                                                                                    id="lab_fent"
                                                                                                    value="{{ $o->fecha_entrega }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Estado</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_est"
                                                                                                    id="lab_est"
                                                                                                    value="{{ $o->estado == 1 ? 'Pendiente' : 'Otro' }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">N°
                                                                                                    Identificación</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_id_trab"
                                                                                                    id="lab_id_trab"
                                                                                                    value="{{ $o->nro_orden }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                    onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--PRESUPUESTO LAB-->
                                                <div class="tab-pane fade show" id="costo_presupuesto_trab"
                                                    role="tabpanel" aria-labelledby="costo_presupuesto_trab-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Presupuesto Laboratorio</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12" id="contenedor_ordenes_trabajos_menores_dental_presup">

                                                        </div>
                                                        <div class="col-md-12" id="contenedor_ordenes_trabajos_mayores_dental_presup">

                                                        </div>
                                                    </div>
                                                    <div class="form-row" id="resumen_costos_lab">
                                                        <div class="col-12">
                                                            <h6 class="sub-aten">Resumen de costos</h6>
                                                        </div>

                                                        @php $suma = 0; @endphp
                                                        @foreach ($ordenes_tm as $o)
                                                            @if($o->presupuesto == 1)
                                                                @php $suma += $o->valor_prestacion; @endphp
                                                            @endif
                                                        @endforeach
                                                        @foreach ($ordenes_tmy as $o)
                                                            @if($o->presupuesto == 1)
                                                                @php $suma += $o->valor_prestacion; @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="col-md-6 offset-md-3">
                                                            <div class="card border-success shadow-sm">
                                                                <div class="card-body text-center">
                                                                    <h5 class="card-title mb-1">Total Prestaciones en Presupuesto</h5>
                                                                    <h4 class="text-success font-weight-bold">{{ number_format($suma, 0, ',', '.') }} CLP</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--ESTADOS DE PAGO-->
                                                <div class="tab-pane fade show " id="od_lab_estadopago"
                                                    role="tabpanel" aria-labelledby="od_lab_estadopago-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Estados de pago</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">N°
                                                                                de presupuesto</label>
                                                                            <select name="n_presupuesto"
                                                                                id="n_presupuesto"
                                                                                class="form-control form-control-sm">
                                                                                <option value="0">Seleccione
                                                                                </option>
                                                                                @if (isset($presupuesto))
                                                                                    <option
                                                                                        value="{{ $presupuesto->id }}">
                                                                                        {{ $presupuesto->id }}
                                                                                    </option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <label
                                                                                class="floating-label-activo-sm">Nombre
                                                                                Laboratorio</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_nom" id="lab_nom">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">N°
                                                                                Identificación</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_id_trab" id="lab_id_trab">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label
                                                                                class="floating-label-activo-sm">F.pago</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_fenv" id="lab_fenv">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label
                                                                                class="floating-label-activo-sm">Cantidad</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_fent" id="lab_fent">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label-activo-sm">
                                                                                Valor Total</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_cost_tot"
                                                                                id="lab_cost_tot">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">
                                                                                Valor Pendiente</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_cost_tot"
                                                                                id="lab_cost_tot">
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label
                                                                                class="floating-label-activo-sm">Observaciones</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2"
                                                                                onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!--PRESUPUESTO GENERAL-->
                <div class="tab-pane fade show" id="od__presup_gral" role="tabpanel"
                    aria-labelledby="od__presup_gral-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Presupuesto general</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Laboratorio</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_lab" id="subtotal_lab">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_lab" id="descuento_lab">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Laboratorio</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_lab" id="total_lab">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Clínico</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_clinico" id="subtotal_clinico"
                                                    value="{{ number_format($valores + $valores_piezas, 0, ',', '.') }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_clinico" id="descuento_clinico"
                                                    value="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Clínico</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_clinico" id="total_clinico"
                                                    value="{{ number_format($valores + $valores_piezas, 0, ',', '.') }}">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Insumos no incluidos</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_insumos" id="subtotal_insumos"
                                                    value="{{ number_format($valores_insumos, 0, ',', '.') }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_insumos" id="descuento_insumos"
                                                    value="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Insumos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_insumos" id="total_insumos"
                                                    value="{{ number_format($valores_insumos, 0, ',', '.') }}">
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="card"
                                        style="border: 2px solid #4268b0 !important;box-shadow: 0px 0px 8px 1px rgb(48 65 148 / 25%), 0px 10px 9px -6px rgb(69 75 135 / 10%) !important;">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="tit-gen">Valor final</h5>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Total presupuesto</label>
                                                    @php $suma = $valores + $valores_piezas + $valores_insumos; @endphp
                                                    <input type="text" class="form-control"
                                                        name="total_presupuesto" id="total_presupuesto"
                                                        value="{{ number_format($suma, 0, ',', '.') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ABONOS Y ESTADOS DE PAGO-->
                <div class="tab-pane fade show" id="od_abonos_pres" role="tabpanel"
                    aria-labelledby="od_abonos_pres-tab">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                <h6 class="tit-gen mb-0">Abonos y estados de pago</h6>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-print mr-1"></i> Presupuesto
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button type="button" class="dropdown-item" onclick="generar_pdf()">
                                            <i class="fas fa-print mr-2 text-primary"></i> Imprimir
                                        </button>
                                        <button type="button" class="dropdown-item" onclick="enviar_presupuesto_dental_por_mail()">
                                            <i class="fas fa-envelope mr-2 text-info"></i> Enviar por mail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="banner_saldo_convenio_wrapper" style="display:none;">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="alert alert-success saldo-banner-alert mb-3" id="banner_saldo_a_favor" style="display:none;">
                                <div class="saldo-banner-flex">
                                    <div><i class="feather icon-info mr-1"></i> El paciente queda con <strong>saldo a favor</strong> de <strong id="banner_saldo_a_favor_monto">$0</strong> tras aplicar el descuento.</div>
                                    <button type="button" class="btn btn-success btn-sm" onclick="abrir_modal_devolucion()"><i class="feather icon-corner-up-left"></i> Registrar devolución</button>
                                </div>
                            </div>
                            <div class="alert alert-warning mb-3" id="banner_saldo_pendiente" style="display:none;">
                                <i class="feather icon-alert-triangle mr-1"></i> Tras el cambio de descuento, el presupuesto queda con un saldo <strong>pendiente</strong> de <strong id="banner_saldo_pendiente_monto">$0</strong>.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1 mb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Presupuesto N°</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="" id=""
                                                            value="{{ $presupuesto ? $presupuesto->id : '' }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="subtotal_presup" id="subtotal_presup"
                                                            value="{{ $presupuesto ? number_format($presupuesto->valor_total, 0, ',', '.') : '' }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="descuento_presup" id="descuento_presup">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="total_presup" id="total_presup">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Abonos</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="abonos_presup" id="abonos_presup"
                                                            value="{{ number_format($valor_abonado, 0, ',', '.') }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="button" class="btn btn-info btn-block btn-sm btn-pagar-presupuesto"
                                                            onclick="pagar_presupuesto();"><i
                                                                class="fa fa-plus"></i> Ingresar Abono</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        @foreach ($convenios_prevision as $c)
                                            @if ($paciente->prevision->nombre == $c->nombre_convenio)
                                                @php
                                                    $convenioYaAplicado = $presupuesto && (int) $presupuesto->id_convenio_aplicado === (int) $c->id;
                                                @endphp
                                                <div class="convenio-banner-card {{ $convenioYaAplicado ? 'is-aplicado' : '' }} my-3">
                                                    <div class="convenio-banner-info">
                                                        <span class="convenio-banner-badge">{{ $c->porcentaje }}%</span>
                                                        <div>
                                                            <strong>{{ $paciente->prevision->nombre }}</strong>
                                                            <span class="convenio-banner-desc">{{ $c->descripcion }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="convenio-banner-acciones">
                                                        <span id="mensaje" class="badge {{ $convenioYaAplicado ? 'badge-success' : '' }} convenio-banner-estado">{{ $convenioYaAplicado ? 'Descuento aplicado' : '' }}</span>
                                                        @if ($convenioYaAplicado)
                                                            <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="quitar_convenio_tratamiento({{ $c->id }})" title="Quitar descuento"><i class="fas fa-times"></i></button>
                                                        @else
                                                            <button type="button" class="btn btn-outline-success btn-sm btn-icon" onclick="aplicar_convenio_tratamiento({{ $c->id }})" title="Aplicar descuento"><i class="fas fa-check"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>

                                @php
                                    // Resumen por pieza para el visor gráfico: color según estado de pago + tooltip con estado clínico y valor a pagar
                                    $piezasPagosDetalle = collect($odontograma)
                                        ->where('presupuesto', 1)
                                        ->where('urgencia', 0)
                                        ->when(data_get($presupuesto ?? null, 'id'), function ($piezas) use ($presupuesto) {
                                            return $piezas->where('id_presupuesto', (int) $presupuesto->id);
                                        })
                                        ->groupBy(fn ($o) => (string) $o->pieza)
                                        ->map(function ($tratamientos, $pieza) use ($valor_abonado) {
                                            $totalPagar = $tratamientos->sum(fn ($o) => $o->valor - ($o->valor_descuento ?? 0));
                                            $estadosPago = $tratamientos->pluck('estado_pago')->filter()->unique();
                                            // Sin abonos efectivos ninguna pieza puede aparecer pagada o con pago parcial,
                                            // aunque una prestación conserve un estado_pago histórico/desactualizado.
                                            $colorPago = (float) $valor_abonado <= 0
                                                ? 'error'
                                                : ($estadosPago->isEmpty() || $estadosPago->contains('error')
                                                    ? 'error'
                                                    : ($estadosPago->contains('incompleto') ? 'incompleto' : 'ok'));
                                            $etiquetaPago = ['ok' => 'Al día', 'incompleto' => 'Pago incompleto', 'error' => 'Pendiente de pago'][$colorPago];
                                            $estadosClinicos = $tratamientos->map(function ($o) {
                                                // match() es PHP 8+; producción corre PHP 7.3, se usa array-lookup en su lugar
                                                $mapaEstadosClinicos = [1 => 'Terminado', 2 => 'En proceso', 3 => 'Citado a control'];
                                                return $mapaEstadosClinicos[(int) $o->estado] ?? 'Pendiente';
                                            })->unique()->values()->implode(', ');
                                            return [
                                                'pieza' => $pieza,
                                                'color_pago' => $colorPago,
                                                'tratamiento' => 'Pago: '.$etiquetaPago.' · Estado: '.$estadosClinicos.' · Valor a pagar: $'.number_format($totalPagar, 0, ',', '.'),
                                            ];
                                        })
                                        ->values();
                                @endphp
                                @if($piezasPagosDetalle->isNotEmpty())
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card-informacion mb-3" id="presupuesto_pagos_visor">
                                            <div class="card-body">
                                                @if(!empty($odontogramaPediatrico))
                                                    @include('atencion_odontologica.include.selector_odontograma_pediatrico', [
                                                        'id' => 'selector_pagos_piezas',
                                                        'inputId' => 'pieza_pagos_detalle',
                                                        'modo' => 'presupuesto',
                                                        'multiple' => false,
                                                        'piezasDisponibles' => $piezasPagosDetalle,
                                                        'piezasPresupuesto' => $piezasPagosDetalle,
                                                        'historialPiezas' => $odontograma_historial ?? $odontograma ?? [],
                                                        'titulo' => 'Estado de pago y clínico por pieza',
                                                        'ayuda' => 'Haga clic en una pieza temporal para filtrar su detalle en la tabla',
                                                    ])
                                                @else
                                                    @include('atencion_odontologica.include.selector_odontograma', [
                                                        'id' => 'selector_pagos_piezas',
                                                        'inputId' => 'pieza_pagos_detalle',
                                                        'counter' => 9600,
                                                        'multiple' => false,
                                                        'compacto' => true,
                                                        'autoRefresh' => false,
                                                        'mostrarMensajeVacio' => false,
                                                        'mostrarEstadoClinico' => true,
                                                        'historialPiezas' => $odontograma ?? [],
                                                        'estadosBloqueados' => [],
                                                        'piezasDisponibles' => $piezasPagosDetalle,
                                                        'titulo' => 'Estado de pago y clínico por pieza',
                                                        'ayuda' => 'Haga clic en una pieza para filtrar su detalle en la tabla',
                                                    ])
                                                @endif
                                                <select class="d-none" id="pieza_pagos_detalle" name="pieza_pagos_detalle" tabindex="-1" aria-hidden="true"></select>
                                                <div class="d-flex flex-wrap align-items-center mt-2" id="filtro_pieza_pagos_wrapper" style="display:none;">
                                                    <span class="badge badge-primary px-2 py-1 mr-2" id="filtro_pieza_pagos_texto"></span>
                                                    <button type="button" class="btn btn-link btn-sm p-0" id="btn_quitar_filtro_pieza_pagos">Quitar filtro</button>
                                                </div>
                                                <div class="leyenda-estados-pago mt-3" aria-label="Leyenda de estados de pago">
                                                    <span><i class="estado-pago-leyenda pendiente"></i>Pendiente</span>
                                                    <span><i class="estado-pago-leyenda parcial"></i>Pago parcial</span>
                                                    <span><i class="estado-pago-leyenda pagado"></i>Pagado</span>
                                                    <small>El fondo azul indica que la pieza pertenece al presupuesto actual.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <style>
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza{position:relative}
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza{position:relative}
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-ok::after,
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-incompleto::after,
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-error::after,
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-ok::after,
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-incompleto::after,
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-error::after{
                                        content:'';position:absolute;top:3px;right:3px;width:9px;height:9px;border-radius:50%;box-shadow:0 0 0 2px #fff;
                                    }
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-ok::after{background:#2bb673}
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-incompleto::after{background:#f4b942}
                                    #selector_pagos_piezas .selector-odontograma-generico__pieza.estado-pago-error::after{background:#e6534d}
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-ok::after{background:#2bb673}
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-incompleto::after{background:#f4b942}
                                    #selector_pagos_piezas .selector-odontograma-pediatrico__pieza.estado-pago-error::after{background:#e6534d}
                                    .leyenda-estados-pago{display:flex;flex-wrap:wrap;align-items:center;gap:12px;color:#53657a;font-size:.76rem}
                                    .leyenda-estados-pago span{display:inline-flex;align-items:center;gap:5px}
                                    .leyenda-estados-pago small{color:#78889a}
                                    .estado-pago-leyenda{display:inline-block;width:10px;height:10px;border-radius:50%;box-shadow:0 0 0 2px #fff,0 0 0 3px #dce5ef}
                                    .estado-pago-leyenda.pendiente{background:#e6534d}.estado-pago-leyenda.parcial{background:#f4b942}.estado-pago-leyenda.pagado{background:#2bb673}
                                </style>
                                <script>
                                    // Calcula, por pieza, el color agregado según estado_pago de sus prestaciones (rojo si alguna sin pagar, amarillo si alguna incompleta, verde si todas ok)
                                    function calcularColoresPagoPorPieza(listaOdontograma){
                                        const mapa = {};
                                        const idPresupuestoActual = Number($('#id_presupuesto').val() || 0);
                                        const textoAbonado = String($('#abonos_presup').val() || '0');
                                        const totalAbonado = Number(textoAbonado.replace(/[^0-9-]/g, '')) || 0;
                                        const sinAbonos = totalAbonado <= 0;
                                        const saldoPendienteDato = $('#abonos_presup').attr('data-saldo-pendiente');
                                        const presupuestoCubierto = totalAbonado > 0
                                            && saldoPendienteDato !== undefined
                                            && saldoPendienteDato !== ''
                                            && Number(saldoPendienteDato) <= 0;
                                        (listaOdontograma || []).forEach(function(o){
                                            if(o.presupuesto != 1 || o.urgencia != 0){ return; }
                                            const idPresupuestoPrestacion = Number(o.id_presupuesto || 0);
                                            if(idPresupuestoActual && idPresupuestoPrestacion && idPresupuestoPrestacion !== idPresupuestoActual){ return; }
                                            const pieza = String(o.pieza);
                                            if(!mapa[pieza]){ mapa[pieza] = { estados: [], clinicos: [], totalPagar: 0 }; }
                                            const descuento = Number(o.valor_descuento) || 0;
                                            // El estado_pago devuelto por el backend es la fuente
                                            // autoritativa por prestación. Antes, si #abonos_presup
                                            // todavía mostraba $0 durante el mismo ciclo AJAX, se
                                            // forzaba erróneamente el selector a rojo aunque la fila
                                            // ya viniera con estado_pago = 'ok'.
                                            const estadoServidor = String(o.estado_pago || '').toLowerCase();
                                            let estadoPagoVisual = 'error';

                                            if (presupuestoCubierto) {
                                                estadoPagoVisual = 'ok';
                                            } else if (
                                                estadoServidor === 'ok' ||
                                                estadoServidor === 'incompleto' ||
                                                estadoServidor === 'error'
                                            ) {
                                                estadoPagoVisual = estadoServidor;
                                            } else if (sinAbonos) {
                                                estadoPagoVisual = 'error';
                                            }

                                            mapa[pieza].estados.push(estadoPagoVisual);
                                            mapa[pieza].totalPagar += (Number(o.valor) || 0) - descuento;
                                            const clinico = Number(o.estado) === 1 ? 'Terminado' : (Number(o.estado) === 2 ? 'En proceso' : (Number(o.estado) === 3 ? 'Citado a control' : 'Pendiente'));
                                            if(mapa[pieza].clinicos.indexOf(clinico) === -1){ mapa[pieza].clinicos.push(clinico); }
                                        });

                                        const resultado = {};
                                        Object.keys(mapa).forEach(function(pieza){
                                            const info = mapa[pieza];
                                            let color = 'ok';
                                            if(info.estados.indexOf('error') !== -1){ color = 'error'; }
                                            else if(info.estados.indexOf('incompleto') !== -1){ color = 'incompleto'; }
                                            const etiquetaPago = color === 'ok' ? 'Al día' : (color === 'incompleto' ? 'Pago incompleto' : 'Pendiente de pago');
                                            resultado[pieza] = {
                                                color: color,
                                                tooltip: 'Pago: '+etiquetaPago+' · Estado: '+info.clinicos.join(', ')+' · Valor a pagar: '+formatoMoneda(info.totalPagar)
                                            };
                                        });
                                        return resultado;
                                    }

                                    // Pinta los indicadores de color/tooltip sobre los botones del selector según el mapa de colores por pieza
                                    function pintarEstadosPagoPiezas(mapaColores){
                                        const $root = $('#selector_pagos_piezas');
                                        if(!$root.length){ return; }
                                        $root.find('[data-selector-pieza]').each(function(){
                                            const $btn = $(this);
                                            const pieza = String($btn.data('selector-pieza'));
                                            $btn.removeClass('estado-pago-ok estado-pago-incompleto estado-pago-error');
                                            const info = mapaColores[pieza];
                                            if(info){
                                                $btn.addClass('estado-pago-'+info.color).attr('title', info.tooltip);
                                            }
                                        });
                                    }

                                    // Punto único de sincronización: se llama tras cada acción AJAX que recalcula estado_pago/descuento (pagos, convenio, reasignación)
                                    function sincronizarSelectorPagosPiezas(listaOdontograma){
                                        const lista = Array.isArray(listaOdontograma) ? listaOdontograma : [];
                                        window.odontogramaPagosActual = lista;

                                        const $selector = $('#selector_pagos_piezas');
                                        if ($selector.length && typeof window.actualizarEstadosClinicosSelectorOdontograma === 'function') {
                                            window.actualizarEstadosClinicosSelectorOdontograma($selector, lista);
                                        }
                                        pintarEstadosPagoPiezas(calcularColoresPagoPorPieza(lista));
                                        if (typeof window.decorarProgresosPresupuesto === 'function') {
                                            window.decorarProgresosPresupuesto();
                                        }
                                    }

                                    // El visor también debe pintarse en la primera carga. Antes solo se
                                    // sincronizaba después de una respuesta AJAX (abono, convenio, etc.).
                                    window.odontogramaPagosActual = @json(collect($odontograma)->where('presupuesto', 1)->where('urgencia', 0)->values());
                                    $(function(){
                                        window.requestAnimationFrame(function(){
                                            sincronizarSelectorPagosPiezas(window.odontogramaPagosActual);
                                        });
                                    });
                                    $(document).on('shown.bs.tab', '#od_abonos_pres-tab', function(){
                                        sincronizarSelectorPagosPiezas(window.odontogramaPagosActual);
                                    });

                                    $(document).on('odontograma:change', '#selector_pagos_piezas', function(e, piezasSeleccionadas){
                                        const pieza = (piezasSeleccionadas && piezasSeleccionadas[0]) ? piezasSeleccionadas[0] : null;
                                        const table = $('#presup_estado_pago').DataTable();
                                        if(pieza){
                                            table.column(1).search('^'+$.fn.dataTable.util.escapeRegex(pieza)+'$', true, false).draw();
                                            $('#filtro_pieza_pagos_texto').text('Mostrando pieza '+pieza);
                                            $('#filtro_pieza_pagos_wrapper').show();
                                        }else{
                                            table.column(1).search('').draw();
                                            $('#filtro_pieza_pagos_wrapper').hide();
                                        }
                                    });

                                    $(document).on('click', '#btn_quitar_filtro_pieza_pagos', function(){
                                        $('#selector_pagos_piezas [data-selector-pieza].is-selected').removeClass('is-selected').attr('aria-pressed', 'false');
                                        $('#selector_pagos_piezas .selector-odontograma-generico__resumen').html('<span class="text-muted">Ninguna pieza seleccionada</span>');
                                        $('#presup_estado_pago').DataTable().column(1).search('').draw();
                                        $('#filtro_pieza_pagos_wrapper').hide();
                                    });

                                    let saldoAFavorDisponible = 0;

                                    // Muestra/oculta los banners de saldo a favor o saldo pendiente tras aplicar/quitar un convenio
                                    function manejarSaldoConvenio(resp, avisar){
                                        const presupuestoCompletado =
                                            resp && (resp.presupuesto_completado === true ||
                                            Number(resp.presupuesto_completado) === 1);

                                        const saldoAFavor = presupuestoCompletado
                                            ? 0
                                            : Math.max(0, Math.round(Number(resp.saldo_a_favor) || 0));

                                        const saldoPendiente = presupuestoCompletado
                                            ? 0
                                            : Math.max(0, Math.round(Number(resp.saldo_pendiente) || 0));

                                        saldoAFavorDisponible = saldoAFavor;

                                        $('#banner_saldo_convenio_wrapper').toggle(saldoAFavor > 0 || saldoPendiente > 0);
                                        $('#banner_saldo_a_favor').toggle(saldoAFavor > 0);
                                        $('#banner_saldo_pendiente').toggle(saldoAFavor <= 0 && saldoPendiente > 0);
                                        $('#banner_saldo_a_favor_monto').text(formatoMoneda(saldoAFavor));
                                        $('#banner_saldo_pendiente_monto').text(formatoMoneda(saldoPendiente));

                                        if(avisar && saldoAFavor > 0){
                                            swal({
                                                title: 'El paciente queda con saldo a favor',
                                                text: 'Tras aplicar el descuento, lo abonado supera el nuevo total en '+formatoMoneda(saldoAFavor)+'. Puede registrar una devolución de dinero o dejarlo como abono para un próximo tratamiento.',
                                                icon: 'info',
                                                buttons: ['Dejarlo como abono', 'Registrar devolución'],
                                            }).then((registrar) => {
                                                if(registrar){ abrir_modal_devolucion(); }
                                            });
                                        }
                                    }

                                    function abrir_modal_devolucion(){
                                        $('#devolucion_saldo_disponible').text(formatoMoneda(saldoAFavorDisponible));
                                        $('#devolucion_monto').val(Math.round(saldoAFavorDisponible));
                                        $('#devolucion_observaciones').val('');
                                        $('#modalDevolucionPresupuesto').modal('show');
                                    }

                                    function confirmar_devolucion_presupuesto(){
                                        const monto = parseInt(String($('#devolucion_monto').val()).replace(/[^0-9]/g, '')) || 0;
                                        if(monto <= 0){
                                            swal({title: 'Error', icon: 'error', text: 'Ingrese un monto de devolución mayor que cero.'});
                                            return;
                                        }
                                        if(monto > saldoAFavorDisponible){
                                            swal({title: 'Error', icon: 'error', text: 'El monto no puede superar el saldo a favor disponible ('+formatoMoneda(saldoAFavorDisponible)+').'});
                                            return;
                                        }

                                        $.ajax({
                                            type: 'post',
                                            url: '{{ ROUTE("dental.registrar_devolucion_presupuesto") }}',
                                            data: {
                                                monto: monto,
                                                metodo_pago: $('#devolucion_metodo').val(),
                                                observaciones: $('#devolucion_observaciones').val(),
                                                id_paciente: $('#id_paciente').val(),
                                                id_ficha_atencion: $('#id_fc').val(),
                                                id_lugar_atencion: $('#id_lugar_atencion').val(),
                                                id_presupuesto: $('#id_presupuesto').val(),
                                                _token: CSRF_TOKEN
                                            },
                                            success: function(resp){
                                                if(resp.estado == 1){
                                                    $('#modalDevolucionPresupuesto').modal('hide');
                                                    swal({title: 'Devolución registrada', text: resp.mensaje, icon: 'success'});
                                                    cargarTablaPagosPresupuesto(resp.pagos || []);
                                                    sincronizarResumenPagoPresupuesto(resp.suma_pagado, null, resp.pagos);
                                                    saldoAFavorDisponible = Math.max(0, saldoAFavorDisponible - monto);
                                                    $('#banner_saldo_a_favor_monto').text(formatoMoneda(saldoAFavorDisponible));
                                                    $('#banner_saldo_a_favor').toggle(saldoAFavorDisponible > 0);
                                                    $('#banner_saldo_convenio_wrapper').toggle(saldoAFavorDisponible > 0);
                                                    const tieneDcto = $('#tiene_dcto').val();
                                                    if(tieneDcto && tieneDcto != 0){
                                                confirmar_aplicar_convenio_tratamiento(tieneDcto, false);
                                                    }
                                                }else{
                                                    swal({title: 'Error', text: resp.mensaje, icon: 'error'});
                                                }
                                            },
                                            error: function(error){
                                                console.log(error.responseText);
                                                swal({title: 'Error', text: 'No fue posible registrar la devolución.', icon: 'error'});
                                            }
                                        });
                                    }

                                    // Si el presupuesto ya tiene un convenio aplicado, refrescamos
                                    // silenciosamente al cargar. No corresponde ofrecer devolución
                                    // solo por abrir nuevamente una atención.
                                    $(function(){
                                        const tieneDctoInicial = $('#tiene_dcto').val();
                                        if(tieneDctoInicial && tieneDctoInicial != 0){
                                            confirmar_aplicar_convenio_tratamiento(
                                                tieneDctoInicial,
                                                false
                                            );
                                        }
                                    });
                                </script>

                                <script>
                                    window.progresosPiezasPresupuesto = window.progresosPiezasPresupuesto || {};
                                    window.progresosPiezasPresupuestoPorPieza = window.progresosPiezasPresupuestoPorPieza || {};
                                    window.progresosPiezasPresupuestoPorId = window.progresosPiezasPresupuestoPorId || {};
                                    window.imagenBasePresupuestoDental = @json(asset(!empty($odontogramaPediatrico) ? 'images/dental/odontopediatria/diente-sano/diente-sano' : 'images/dental/dientes/d'));
                                    window.progresosGruposPresupuesto = window.progresosGruposPresupuesto || {};
                                    window.claveProgresoPresupuesto = function (a, b) {
                                        return String(a || '').trim().toUpperCase() + '|' + String(b || '').trim().toUpperCase();
                                    };
                                    window.actualizarDatosProgresoPresupuestoInterno = function (piezas) {
                                        (piezas || []).forEach(function (pieza) {
                                            const idPresupuestoActual = Number($('#id_presupuesto').val() || 0);
                                            const idPresupuestoPieza = Number(pieza.id_presupuesto || 0);
                                            if (Number(pieza.presupuesto) !== 1 || Number(pieza.urgencia || 0) !== 0) return;
                                            if (idPresupuestoActual && idPresupuestoPieza && idPresupuestoPieza !== idPresupuestoActual) return;
                                            const progreso = pieza.progreso !== null && pieza.progreso !== undefined ? Number(pieza.progreso) : (Number(pieza.estado) === 1 ? 100 : 0);
                                            window.progresosPiezasPresupuestoPorId[String(pieza.id)] = progreso;
                                            window.progresosPiezasPresupuesto[claveProgresoPresupuesto(pieza.descripcion || pieza.tratamiento, pieza.pieza)] = progreso;
                                            window.progresosPiezasPresupuestoPorPieza[String(pieza.pieza || '').trim()] = progreso;
                                            $('#presup_estado_pago tbody tr').filter(function () {
                                                const $celdas = $(this).children('td');
                                                return !$(this).attr('data-odontograma-id')
                                                    && $.trim($celdas.eq(1).text()) === String(pieza.pieza || '').trim()
                                                    && $.trim($celdas.eq(0).text()).toUpperCase() === String(pieza.descripcion || pieza.tratamiento || '').trim().toUpperCase();
                                            }).first().attr('data-odontograma-id', pieza.id);
                                        });
                                        window.decorarProgresosPresupuesto();
                                    };
                                    if (typeof window.actualizarDatosProgresoPresupuesto !== 'function') {
                                        window.actualizarDatosProgresoPresupuesto = function (piezas) {
                                            if (window.MedSDIPresupuestoDental) {
                                                window.MedSDIPresupuestoDental.recibirOdontograma(piezas);
                                            }
                                        };
                                    }
                                    window.actualizarDatosProgresoGruposPresupuesto = function (grupos) {
                                        (grupos || []).forEach(function (grupo) {
                                            const progreso = Number(grupo.progreso || 0) || (Number(grupo.estado) === 0 ? 100 : 25);
                                            window.progresosGruposPresupuesto[claveProgresoPresupuesto(grupo.diagnostico_tratamiento, grupo.localizacion)] = progreso;
                                        });
                                        window.decorarProgresosPresupuesto();
                                    };
                                    window.decorarProgresosPresupuesto = function () {
                                        $('#presup_estado_pago tbody tr').each(function () {
                                            const $celdas = $(this).children('td');
                                            if ($celdas.length < 7) return;
                                            const pieza = $.trim($celdas.eq(1).text());
                                            if (pieza) {
                                                const piezaSelector = pieza.replace(/"/g, '\\"');
                                                const $imagenClinica = $('#selector_pagos_piezas [data-selector-pieza="' + piezaSelector + '"] img, #selector_pagos_piezas [data-pieza-pediatrica="' + piezaSelector + '"] img, #selector_plan_tratamiento_general [data-selector-pieza="' + piezaSelector + '"] img').first();
                                                const imagenClinica = $imagenClinica.attr('src');
                                                const estadoClinico = $imagenClinica.attr('data-estado-clinico') || 'normal';
                                                const tituloImagen = 'Pieza ' + pieza + ' · Estado: ' + estadoClinico.replace(/[-_]/g, ' ');
                                                const src = imagenClinica || (window.imagenBasePresupuestoDental + pieza.replace('.', '') + '.png');
                                                const $piezaVisual = $celdas.eq(1).find('.presupuesto-pieza-cell');
                                                if ($piezaVisual.length) {
                                                    $piezaVisual.find('img').attr({
                                                        src: src,
                                                        title: tituloImagen,
                                                        'data-estado-clinico': estadoClinico
                                                    });
                                                } else {
                                                    $celdas.eq(1).html('<div class="presupuesto-pieza-cell"><img src="' + src + '" alt="Pieza ' + pieza + '" title="' + tituloImagen + '" data-estado-clinico="' + estadoClinico + '"><strong>' + pieza + '</strong></div>');
                                                }
                                            }
                                            const idOdontograma = String($(this).attr('data-odontograma-id') || '');
                                            let progreso = idOdontograma ? window.progresosPiezasPresupuestoPorId[idOdontograma] : undefined;
                                            if (progreso === undefined || progreso === null) progreso = window.progresosPiezasPresupuesto[claveProgresoPresupuesto($celdas.eq(0).text(), $celdas.eq(1).text())];
                                            if (progreso === undefined || progreso === null) progreso = window.progresosPiezasPresupuestoPorPieza[String($celdas.eq(1).text() || '').trim()];
                                            if (progreso !== undefined && progreso !== null) $celdas.eq(6).html(crearProgresoCircularDentalLectura(progreso));
                                        });
                                        $('#presup_estado_pago_gral tbody tr').each(function () {
                                            const $celdas = $(this).children('td');
                                            if ($celdas.length < 7) return;
                                            let progreso = window.progresosGruposPresupuesto[claveProgresoPresupuesto($celdas.eq(0).text(), $celdas.eq(1).text())];
                                            if (progreso === undefined || progreso === null) progreso = window.progresosGruposPresupuesto[claveProgresoPresupuesto($celdas.eq(1).text(), $celdas.eq(0).text())];
                                            if (progreso !== undefined && progreso !== null) $celdas.eq(6).html(crearProgresoCircularDentalLectura(progreso));
                                        });
                                    };
                                    actualizarDatosProgresoPresupuestoInterno(@json(collect($odontograma)->where('presupuesto', 1)->where('urgencia', 0)->values()));
                                    actualizarDatosProgresoGruposPresupuesto(@json(collect($todos)->where('presupuesto', 1)->values()));
                                    $(document).on('draw.dt', function (evento) {
                                        if (!$(evento.target).is('#presup_estado_pago, #presup_estado_pago_gral')) return;
                                        window.requestAnimationFrame(decorarProgresosPresupuesto);
                                    });
                                    $(document).ajaxComplete(function () {
                                        window.requestAnimationFrame(function () {
                                            decorarProgresosPresupuesto();
                                            window.setTimeout(decorarProgresosPresupuesto, 80);
                                        });
                                    });
                                    $(document).on('shown.bs.tab', 'a[href="#od_abonos_pres"]', function () {
                                        decorarProgresosPresupuesto();
                                        window.setTimeout(decorarProgresosPresupuesto, 80);
                                    });
                                    $(function () {
                                        decorarProgresosPresupuesto();
                                        const contenedor = document.getElementById('form-presup_dent');
                                        if (!contenedor || window.observadorProgresosPresupuesto) return;
                                        let pendiente = false;
                                        window.observadorProgresosPresupuesto = new MutationObserver(function (mutaciones) {
                                            const afectaTablas = mutaciones.some(function (mutacion) {
                                                const nodo = mutacion.target.nodeType === 1 ? mutacion.target : mutacion.target.parentElement;
                                                return nodo && (nodo.closest('#presup_estado_pago') || nodo.closest('#presup_estado_pago_gral'));
                                            });
                                            if (!afectaTablas || pendiente) return;
                                            pendiente = true;
                                            window.requestAnimationFrame(function () {
                                                pendiente = false;
                                                decorarProgresosPresupuesto();
                                            });
                                        });
                                        window.observadorProgresosPresupuesto.observe(contenedor, { childList: true, subtree: true });
                                    });
                                </script>


                                <script>
                                    /**
                                     * Presupuesto Dental aislado.
                                     *
                                     * Entrada única:
                                     *   MedSDIPresupuestoDental.recibirOdontograma(lista, piezaPreferida, presupuesto)
                                     *
                                     * No necesita conocer Endodoncia, Periodoncia u otra especialidad.
                                     * Las fichas sólo deben emitir `odontoGeneral:actualizado` o llamar a esta API.
                                     */
                                    (function () {
                                        const API = window.MedSDIPresupuestoDental = window.MedSDIPresupuestoDental || {};
                                        API.odontograma = API.odontograma || [];
                                        API.renderizando = false;

                                        API.idPresupuesto = function () {
                                            const $root = $('#form-presup_dent');
                                            return Number($root.attr('data-id-presupuesto') || $('#id_presupuesto').val() || 0);
                                        };

                                        API.normalizarLista = function (entrada) {
                                            if (Array.isArray(entrada)) return entrada;
                                            if (entrada && Array.isArray(entrada.odontograma_paciente)) return entrada.odontograma_paciente;
                                            if (entrada && Array.isArray(entrada.odontograma)) return entrada.odontograma;
                                            if (entrada && Array.isArray(entrada.piezas)) return entrada.piezas;
                                            return [];
                                        };

                                        API.filtrarPrestaciones = function (lista) {
                                            const idPresupuesto = API.idPresupuesto();
                                            return API.normalizarLista(lista).filter(function (item) {
                                                const idItem = Number(item && item.id_presupuesto || 0);
                                                return item
                                                    && Number(item.presupuesto) === 1
                                                    && Number(item.urgencia || 0) === 0
                                                    && (!idPresupuesto || !idItem || idItem === idPresupuesto);
                                            });
                                        };

                                        API.progreso = function (item) {
                                            if (!item) return 0;
                                            let progreso = item.progreso !== null && item.progreso !== undefined
                                                ? Number(item.progreso)
                                                : (Number(item.estado) === 1 ? 100 : (Number(item.estado) === 2 ? 25 : 0));
                                            if (!Number.isFinite(progreso)) progreso = 0;
                                            return Math.max(0, Math.min(100, progreso));
                                        };

                                        API.htmlProgreso = function (item) {
                                            const progreso = API.progreso(item);
                                            if (typeof window.crearProgresoCircularDentalLectura === 'function') {
                                                return window.crearProgresoCircularDentalLectura(progreso);
                                            }
                                            return '<div class="dental-progress-wheel is-readonly" style="--progress:' + progreso +
                                                '" title="Progreso del tratamiento: ' + progreso + '%"><span class="dental-progress-wheel-value">' +
                                                progreso + '%</span></div>';
                                        };

                                        API.clasePago = function (estadoPago) {
                                            if (estadoPago === 'ok') return 'bg-success';
                                            if (estadoPago === 'incompleto') return 'bg-warning';
                                            return 'bg-danger';
                                        };

                                        API.renderTablaPagos = function (lista) {
                                            if (!$('#presup_estado_pago').length || !$.fn.DataTable) return;
                                            const estadoRenderAnterior = API.renderizando;
                                            API.renderizando = true;
                                            const prestaciones = API.filtrarPrestaciones(lista);
                                            const table = $('#presup_estado_pago').DataTable();
                                            table.clear();

                                            prestaciones.forEach(function (item) {
                                                const valor = Number(item.valor || 0);
                                                const descuento = Number(item.valor_descuento || 0);
                                                const pagar = Math.max(0, valor - descuento);
                                                const row = table.row.add([
                                                    item.descripcion || item.tratamiento || '',
                                                    String(item.pieza || ''),
                                                    formatoMoneda(valor),
                                                    descuento ? formatoMoneda(descuento) : 0,
                                                    formatoMoneda(pagar),
                                                    '<div class="circle ' + API.clasePago(item.estado_pago) + '"></div>',
                                                    API.htmlProgreso(item)
                                                ]).node();

                                                $(row)
                                                    .attr('data-odontograma-id', item.id || '')
                                                    .attr('data-pieza', item.pieza || '')
                                                    .addClass('text-center align-middle status-circle');
                                            });

                                            table.draw(false);

                                            // Decoración de imagen de pieza después del draw de DataTables.
                                            window.requestAnimationFrame(function () {
                                                if (typeof window.decorarProgresosPresupuesto === 'function') {
                                                    window.decorarProgresosPresupuesto();
                                                }
                                            });
                                            API.renderizando = estadoRenderAnterior;
                                        };

                                        API.actualizarResumen = function (lista) {
                                            const prestaciones = API.filtrarPrestaciones(lista);
                                            const cantidad = prestaciones.length;
                                            const total = prestaciones.reduce(function (suma, item) {
                                                return suma + Math.max(0, Number(item.valor || 0) - Number(item.valor_descuento || 0));
                                            }, 0);

                                            $('#cantidad_items_presupuesto').text(
                                                cantidad + (cantidad === 1 ? ' prestación' : ' prestaciones')
                                            );
                                            $('#presupuesto_clinico_vacio').toggle(cantidad === 0);
                                            $('#presupuesto_piezas_visor').toggle(cantidad > 0);

                                            // Sólo actualiza las métricas de piezas; el resto del presupuesto
                                            // (insumos, laboratorio, grupos) conserva sus fuentes propias.
                                            $('#valores_piezas_presupuesto, #valores_piezas_presupuesto_conf')
                                                .text(formatoMoneda(total));
                                        };

                                        API.recibirOdontograma = function (entrada, piezaPreferida, presupuesto) {
                                            if (API.renderizando) return;
                                            API.renderizando = true;
                                            try {
                                                const lista = API.normalizarLista(entrada);

                                                if (presupuesto && presupuesto.id) {
                                                    $('#form-presup_dent').attr('data-id-presupuesto', presupuesto.id);
                                                    if ($('#id_presupuesto').length) $('#id_presupuesto').val(presupuesto.id);
                                                }

                                                API.odontograma = lista.slice();

                                                if (typeof window.sincronizarOdontogramaPresupuesto === 'function') {
                                                    window.sincronizarOdontogramaPresupuesto(API.odontograma, piezaPreferida || null);
                                                } else {
                                                    if (typeof window.renderizarTarjetasPresupuestoClinico === 'function') {
                                                        window.renderizarTarjetasPresupuestoClinico(API.odontograma);
                                                    }
                                                }

                                                API.actualizarResumen(API.odontograma);
                                                API.renderTablaPagos(API.odontograma);

                                                if (typeof window.actualizarDatosProgresoPresupuestoInterno === 'function') {
                                                    window.actualizarDatosProgresoPresupuestoInterno(API.odontograma);
                                                }
                                            } finally {
                                                API.renderizando = false;
                                            }
                                        };

                                        // Eventos neutros: el presupuesto no conoce la ficha que los origina.
                                        document.addEventListener('odontoGeneral:actualizado', function (event) {
                                            const detalle = event && event.detail ? event.detail : {};
                                            const respuesta = detalle.respuesta || {};
                                            const lista = API.normalizarLista(respuesta);
                                            const preferida = detalle.piezas && detalle.piezas.length
                                                ? String(detalle.piezas[0])
                                                : null;

                                            if (lista.length) {
                                                API.recibirOdontograma(lista, preferida, respuesta.presupuesto || null);
                                            }
                                        });

                                        document.addEventListener('dental:presupuesto-actualizado', function (event) {
                                            const detalle = event && event.detail ? event.detail : {};
                                            API.recibirOdontograma(
                                                detalle.odontograma || detalle.respuesta || [],
                                                detalle.pieza || null,
                                                detalle.presupuesto || null
                                            );
                                        });

                                        // Cada vez que se entra en estas pestañas, reponemos el estado canónico
                                        // del componente. Así código histórico externo no deja texto PENDIENTE/
                                        // TERMINADO en lugar del gráfico.
                                        $(document).on('shown.bs.tab', 'a[href="#od_presup_clinico"], a[href="#od_abonos_pres"]', function () {
                                            if (API.odontograma.length) {
                                                API.recibirOdontograma(API.odontograma);
                                            }
                                        });

                                        // Si otro bloque histórico redibuja DataTables, el componente
                                        // repone su representación canónica con gráfico de progreso.
                                        $(document).on('draw.dt', '#presup_estado_pago', function () {
                                            if (API.renderizando || !API.odontograma.length) return;
                                            window.requestAnimationFrame(function () {
                                                API.renderTablaPagos(API.odontograma);
                                            });
                                        });

                                        $(function () {
                                            API.recibirOdontograma(@json(collect($odontograma)->values()));
                                        });
                                    })();
                                </script>

                                <!--P. POR PIEZAS-->
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card-informacion">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Presupuesto por pieza</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="dt-responsive table-responsive presupuesto-tabla-responsive pb-4">
                                                            <table id="presup_estado_pago"
                                                                class="display table table-striped dt-responsive table-sm"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="align-middle">Prestación</th>
                                                                        <th class="align-middle">Pieza / imagen</th>
                                                                        <th class="align-middle">Valor total</th>
                                                                        <th class="align-middle">Descuento</th>
                                                                        <th class="align-middle">Valor a pagar</th>
                                                                        <th class="align-middle">Estado de pago</th>
                                                                        <th class="align-middle">Progreso
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($odontograma as $o)
                                                                        @if ($o->presupuesto == 1 && $o->urgencia == 0 && (!isset($presupuesto) || !$presupuesto || (int) $o->id_presupuesto === (int) $presupuesto->id))
                                                                            @php
                                                                                if ($o->estado == 0) {
                                                                                    $estado = 'PENDIENTE';
                                                                                } elseif ($o->estado == 1) {
                                                                                    $estado = 'TERMINADO';
                                                                                    # code...
                                                                                }elseif($o->estado == 2){
                                                                                    $estado = 'EN PROCESO';
                                                                                }elseif($o->estado == 3){
                                                                                    $estado = 'CITADO A CONTROL';
                                                                                }

                                                                                switch ($o->estado_pago) {
                                                                                    case 'ok':
                                                                                        $color = 'bg-success';
                                                                                        break;
                                                                                    case 'incompleto':
                                                                                        $color = 'bg-warning';
                                                                                        break;
                                                                                    default:
                                                                                        $color = 'bg-danger';
                                                                                        break;
                                                                                }
                                                                            @endphp
                                                                            <tr data-odontograma-id="{{ $o->id }}">
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->descripcion }}</td>
                                                                                <td class="text-center align-middle">
                                                                                    <div class="presupuesto-pieza-cell">
                                                                                        <img src="{{ asset((!empty($odontogramaPediatrico) ? 'images/dental/odontopediatria/diente-sano/diente-sano' : 'images/dental/dientes/d').str_replace('.', '', (string) $o->pieza).'.png') }}" alt="Pieza {{ $o->pieza }}">
                                                                                        <strong>{{ $o->pieza }}</strong>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td class="text-center align-middle">0
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle status-circle">
                                                                                    <div
                                                                                        class="circle {{ $color }}">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    @php $progresoPresupuesto = (int) ($o->progreso ?? ((int) $o->estado === 1 ? 100 : 0)); @endphp
                                                                                    <div class="dental-progress-wheel is-readonly" style="--progress:{{ $progresoPresupuesto }}" title="Progreso del tratamiento: {{ $progresoPresupuesto }}%" role="img" aria-label="Progreso del tratamiento: {{ $progresoPresupuesto }}%"><span class="dental-progress-wheel-value">{{ $progresoPresupuesto }}%</span></div>
                                                                                </td>

                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--P. POR GRUPOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Presupuesto por grupos</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                                                        <div class="dt-responsive table-responsive pb-4">
                                                            <table id="presup_estado_pago_gral"
                                                                class="display table table-striped dt-responsive nowrap table-sm w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">
                                                                            Prestación</th>
                                                                        <th class="text-center align-middle">Grupo
                                                                        </th>
                                                                        <th class="text-center align-middle">Valor
                                                                            total</th>
                                                                        <th class="text-center align-middle">Descuento
                                                                        </th>
                                                                        <th class="text-center align-middle">Valor a
                                                                            pagar</th>
                                                                        <th class="text-center align-middle">Estado
                                                                            Pago</th>
                                                                        <th class="text-center align-middle">Progreso</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($todos as $o)
                                                                        @if ($o->presupuesto == 1 && (int) ($o->urgencia ?? 0) === 0)
                                                                            @php
                                                                                if ($o->estado == 1) {
                                                                                    $estado = 'PENDIENTE';
                                                                                } elseif ($o->estado == 0) {
                                                                                    $estado = 'TERMINADO';
                                                                                    # code...
                                                                                }

                                                                                switch ($o->estado_pago) {
                                                                                    case 'ok':
                                                                                        $color = 'bg-success';
                                                                                        break;
                                                                                    case 'incompleto':
                                                                                        $color = 'bg-warning';
                                                                                        break;
                                                                                    default:
                                                                                        $color = 'bg-danger';
                                                                                        break;
                                                                                }
                                                                            @endphp
                                                                            <tr>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->diagnostico_tratamiento }}
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->localizacion }}</td>
                                                                                <td class="text-center align-middle">
                                                                                    ${{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    $0</td>
                                                                                <td class="text-center align-middle">
                                                                                    ${{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle status-circle">
                                                                                    <div
                                                                                        class="circle {{ $color }}">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    @php $progresoGrupo = (int) ($o->progreso ?? ((int) $o->estado === 0 ? 100 : 25)); @endphp
                                                                                    <div class="dental-progress-wheel is-readonly" style="--progress:{{ $progresoGrupo }}" title="Progreso del tratamiento: {{ $progresoGrupo }}%" role="img" aria-label="Progreso del tratamiento: {{ $progresoGrupo }}%"><span class="dental-progress-wheel-value">{{ $progresoGrupo }}%</span></div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--INSUMOS Y GASTOS GENERALES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Insumos y gastos generales</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                                                        <table id="presup_insumos_pago"
                                                            class="display table table-striped dt-responsive nowrap table-sm w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Insumo</th>
                                                                    <th class="align-middle">Observaciones</th>
                                                                    <th class="align-middle">Cantidad</th>
                                                                    <th class="align-middle">Sub-total</th>
                                                                    <th class="align-middle">Descuento</th>
                                                                    <th class="align-middle">Total</th>
                                                                    <th class="align-middle">Estado de pago</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $insumosPresupuestoAgrupados = collect($insumos_tratamientos)
                                                                        ->where('presupuesto', 1)
                                                                        ->groupBy(fn ($t) => $t->id_producto
                                                                            ? 'producto:'.$t->id_producto
                                                                            : 'nombre:'.mb_strtoupper(trim((string) $t->insumos)));
                                                                @endphp
                                                                @foreach ($insumosPresupuestoAgrupados as $grupoInsumo)
                                                                        @php
                                                                            $t = $grupoInsumo->first();
                                                                            $cantidadAgrupada = $grupoInsumo->sum('cantidad');
                                                                            $total = $cantidadAgrupada * $t->valor;
                                                                        @endphp
                                                                        @php
                                                                            $color = 'bg-danger'; // por defecto: error
                                                                            if ($grupoInsumo->every(fn ($item) => $item->estado_pago == 'ok')) {
                                                                                $color = 'bg-success';
                                                                            } elseif ($grupoInsumo->contains(fn ($item) => $item->estado_pago == 'incompleto')) {
                                                                                $color = 'bg-warning';
                                                                            }
                                                                        @endphp

                                                                        <tr>
                                                                            <td class="align-middle">
                                                                                {{ $t->insumos }}
                                                                                {{ strtolower((string) $t->nombre_marca) === 'null' ? '' : $t->nombre_marca }}</td>
                                                                            <td class="align-middle">
                                                                                {{ $t->observaciones }}
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                {{ $cantidadAgrupada }}</td>
                                                                            <td class="align-middle">
                                                                                {{ number_format($t->valor) }}</td>
                                                                            <td class="align-middle">0</td>
                                                                            <td class="align-middle">
                                                                                {{ number_format($total) }}</td>
                                                                            <td class="align-middle status-circle">
                                                                                <div
                                                                                    class="circle {{ $color }}">
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--TOTAL VALOR-->
                                <div class="row align-items-stretch mx-1 text-center font-weight-bold presupuesto-resumen">
                                    <!-- Total -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="mb-0 text-c-blue">Total Grupo/Boca</h5>
                                        <p id="valores_examenes_presupuesto_conf">$
                                            {{ number_format($valores, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Total Piezas -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="mb-0 text-c-blue">Total Piezas</h5>
                                        <p id="valores_piezas_presupuesto_conf">$
                                            {{ number_format($valores_piezas, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Insumos -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="mb-0 text-c-blue">Insumos</h5>
                                        <p id="valores_insumos_presupuesto_conf">$
                                            {{ number_format($valores_insumos, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Laboratorio -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="mb-0 text-c-blue">Laboratorio</h5>
                                        <p id="valores_laboratorio_conf">${{ number_format($valores_laboratorio, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-6 col-md-4 col-lg resumen-metrica">
                                        <h5 class="mb-0 text-c-blue">Descuentos</h5>
                                        <p id="valores_descuentos_presupuesto_conf">${{ number_format($descuentosClinicoPresupuesto, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-2 bg-naranjo resumen-destacado d-flex flex-column justify-content-center">
                                        <h5 class="text-white">Total Final</h5>
                                        <p class="text-white" id="valores_total_final_presupuesto_conf">$
                                            {{ number_format($totalClinicoPresupuesto, 0, ',', '.') }}
                                        </p>
                                    </div>


                                    <div class="col-sm-6 col-md-4 col-lg-2 bg-info resumen-destacado d-flex flex-column justify-content-center">
                                        <h5 class="text-white">Abonado</h5>
                                        <p class="text-white" id="valores_total_abonado_presupuesto_conf">
                                            ${{ number_format($valor_abonado, 0, ',', '.') }}</p>
                                    </div>


                                    {{-- <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-3 my-2">
                                            @php $total_pago = $valores + $valores_piezas + $valores_insumos; @endphp
                                                <button type="button" class="btn btn-outline-primary btn-sm" style="width: 85px;" onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})">Reasignar Pago</button>
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="pagar_presupuesto()">Pagar</button>
                                            </div> --}}


                                    <!-- Total Final -->
                                    {{-- <div class="col-md-12 d-flex justify-content-between">
                                                <div class="bg-naranjo bg-naranjo rounded-pill py-1 my-1">
                                                    <h5 class="text-white">Total Final</h5>
                                                    <p class="text-white" id="valores_total_final_presupuesto_conf">$ {{ number_format($valores + $valores_piezas + $valores_insumos,0,',','.') }}</p>
                                                </div>
                                                <div class="bg-sucess bg-success rounded-pill py-1 my-1">
                                                    <h5 class="text-white">Abonado</h5>
                                                    <p class="text-white" id="valores_total_abonado_presupuesto_conf">${{ number_format($valor_abonado,0,',','.') }}</p>
                                                </div>
                                                @php $total_pago = $valores + $valores_piezas + $valores_insumos; @endphp
                                                <button type="button" class="btn btn-outline-primary btn-sm" style="width: 85px;" onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})">Reasignar Pago</button>
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="pagar_presupuesto()">Pagar</button>
                                            </div> --}}
                                </div>
                                <div class="d-flex justify-content-end mt-2 mr-1 text-right">
                                    <div><small class="text-muted d-block">Saldo pendiente</small><strong class="text-c-blue f-18" id="saldo_pendiente_presupuesto_conf">${{ number_format($saldoClinicoPresupuesto, 0, ',', '.') }}</strong></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-row  mx-auto mt-3">
                        @php $total_pago = $valores + $valores_piezas + $valores_insumos + $valores_laboratorio; @endphp
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <button type="button" class="btn btn-purple text-center btn-reasignar-presupuesto"
                                onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})"><i
                                    class="fas fa-money-check-alt"></i> Reasignar Pago</button>
                            <button type="button" class="btn btn-info text-center btn-pagar-presupuesto"
                                onclick="pagar_presupuesto()"><i class="fas fa-plus"></i> Pagar</button>
                        </div>
                        <div id="presupuesto_pagado_mensaje" class="alert alert-success text-center mt-3 d-none" role="alert">
                            <i class="feather icon-check-circle"></i>
                            <strong>Presupuesto pagado completamente.</strong> Está cerrado y no admite nuevos abonos.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="total_presupuesto_dental" value="{{ $valores + $valores_piezas + $valores_insumos + $valores_laboratorio }}">
<input type="hidden" name="tiene_dcto" id="tiene_dcto" value="{{ optional($presupuesto)->id_convenio_aplicado ?? 0 }}">
<input type="hidden" name="tiene_reasignacion" id="tiene_reasignacion" value="0">
<!-- MODAL INSUMOS -->
<!-- Modal -->
<div class="modal fade" id="insumosModal" tabindex="-1" aria-labelledby="insumosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insumosModalLabel">Insumos para el tratamiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Profesional</label>
                            <input type="text" name="" id=""
                                class="form-control form-control-sm"
                                value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Paciente</label>
                            <input type="text" name="" id=""
                                class="form-control form-control-sm"
                                value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" name="numero_pieza_tto_modal" id="numero_pieza_tto_modal"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Tratamiento</label>
                            <input type="text" name="tto_modal" id="tto_modal"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Insumos</label>
                            <input type="text" name="insumos_tto" id="insumos_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Cantidad</label>
                            <input type="number" name="insumos_cantidad_tto" id="insumos_cantidad_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Valor</label>
                            <input type="number" name="insumos_valor_tto" id="insumos_valor_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mb-9" name="insumos_obs_tto_modal" id="insumos_obs_tto_modal"
                                cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                        </div>

                    </div>

                    <button type="button" class="btn btn-outline-success btn-sm w-100 my-2"
                        onclick="agregar_insumos_tto()"><i class="fas fa-check"></i> + Agregar</button>
                </div>
                <table class="table table-bordered table-xs w-100" id="table_insumos_tto">
                    <thead>
                        <th>insumo</th>
                        <th>cantidad</th>
                        <th>valor</th>
                        <th>observaciones</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Solicitar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PAGOS -->
<div class="modal fade" id="modalPagoPresupuesto" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pago</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
		          	<span aria-hidden="true">&times;</span>
		        </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion borde-presupuesto">
                                    <div class="card-body px-2 pt-2 pb-0">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label for="total" class="floating-label-activo-sm">Total a pagar</label>
                                                        <input type="text" class="form-control form-control-sm" id="total_pago"
                                                            value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="info_pagos_presupuesto">
                            <!-- Resumen de Pagos del Presupuesto -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card border-success">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-check-circle text-success mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-success">Abonos</h6>
                                            </div>
                                            <h4 class="text-success mb-0" id="monto_abonado_presupuesto">$0</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-info">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-check-circle text-info mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-info">Total Deuda</h6>
                                            </div>
                                            <h4 class="text-info mb-0" id="total_deuda_presupuesto">$0</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-warning">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-clock text-warning mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-warning">Pendiente</h6>
                                            </div>
                                            <h4 class="text-warning mb-0" id="monto_pendiente_presupuesto">$0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Barra de Progreso del Presupuesto -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">Progreso de Pago del Presupuesto</small>
                                    <small class="text-muted" id="porcentaje_pago_presupuesto">0%</small>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                        id="barra_progreso_presupuesto" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>

                            <!-- Tabla de Pagos del Presupuesto -->
                            <div class="mt-4" id="seccion_pagos_presupuesto" style="display: none;">
                                <h6 class="text-muted mb-3">
                                    <i class="feather icon-list mr-2"></i>
                                    Historial de Pagos del Presupuesto
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="tabla_pagos_presupuesto_resumen">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Método</th>
                                                <th>Convenio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_pagos_presupuesto">
                                            <!-- Los pagos se cargarán aquí dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <hr class="my-3">


                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body px-2">
                                        <div class="form-row">
                                            <!-- Monto del pago -->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
                                                <label for="montoPago" class="floating-label-activo-sm">Monto del Pago</label>
                                                <input type="text" class="form-control form-control-sm" id="montoPago" name="montoPago"
                                                    >
                                            </div>
                                            <!-- Monto abonado -->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
                                                <label for="montoAbonado" class="floating-label-activo-sm">Monto Abonado</label>
                                                <input type="text" class="form-control form-control-sm" id="montoAbonado" name="montoAbonado"
                                                    value="${{ number_format($valor_abonado, 0, ',', '.') }}" >
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
                                                <label for="destinoPagoPieza" class="floating-label-activo-sm">Aplicar pago a</label>
                                                <select class="form-control form-control-sm" id="destinoPagoPieza" name="destinoPagoPieza">
                                                    <option value="">Automático (respeta la prioridad actual)</option>
                                                    @foreach ($odontograma as $piezaPago)
                                                        @if ($piezaPago->presupuesto == 1 && $piezaPago->urgencia == 0 && $piezaPago->estado_pago !== 'ok')
                                                            <option value="{{ $piezaPago->id }}">Pieza {{ $piezaPago->pieza }} — {{ $piezaPago->tratamiento }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Los insumos pendientes se cubren siempre antes de la pieza seleccionada.</small>
                                            </div>
                                            <!-- Método de pago -->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
                                                <label for="metodoPago" class="floating-label-activo-sm">Método de Pago</label>
                                                <select class="form-control form-control-sm" id="metodoPago" name="metodoPago" >
                                                    <option value="" selected >Seleccione un método</option>
                                                    <option value="efectivo">Efectivo</option>
                                                    <option value="tarjeta">Tarjeta</option>
                                                    <option value="transferencia">Transferencia Bancaria</option>
                                                </select>
                                            </div>
                                            <!--Convenio-->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
                                                <label class="floating-label-activo-sm">Convenio</label>
                                                <select id="bono_prevision" name="bono_prevision"
                                                    class="form-control form-control-sm">
                                                    <option value="0">Sin convenio</option>
                                                    @foreach ($prevision as $prev)
                                                        <option value="{{ $prev->id }}" {{ (string) $paciente->id_prevision === (string) $prev->id ? 'selected' : '' }}>{{ $prev->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <div class="input-group-append">
                                                <button class="btn btn-outline-primary btn-sm" type="button" onclick="$('#bono_prevision_txt').hide();$('#bono_prevision').show();"><i class="feather icon-edit"></i></button>
                                                    </div> --}}
                                            </div>
                                            <!-- Botón de envío  / BTN CONFIRMACION PAGO-->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-2">
                                                <button type="button" class="btn btn-info btn-sm btn-confirmar-pago" onclick="confirmar_pago()"><i class="feather icon-check"></i> Confirmar Pago</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row d-none">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body px-2">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table table-responsive table-xs" id="table_pagos_presupuesto">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Metodo de pago</th>
                                                                <th>Pago</th>
                                                                <th>Acciones</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pagos_tratamientos_dentales as $pago)
                                                                <tr>
                                                                    <td>{{ $pago->fecha_pago }}</td>
                                                                    <td>{{ $pago->metodo_pago }}</td>
                                                                    <td>{{ number_format($pago->total, 0, ',', '.') }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary btn-icon"><i
                                                                                class="fas fa-search"></i></button>
                                                                        <button type="button" class="btn btn-danger btn-icon"
                                                                            onclick="eliminar_pago_dental({{ $pago->id }})"><i
                                                                                class="feather icon-x"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<!-- MODAL DEVOLUCIÓN DE DINERO (saldo a favor) -->
<div class="modal fade" id="modalDevolucionPresupuesto" tabindex="-1" aria-labelledby="modalDevolucionPresupuestoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDevolucionPresupuestoLabel">Registrar devolución de dinero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info py-2 px-3 mb-3">
                    Saldo a favor disponible: <strong id="devolucion_saldo_disponible">$0</strong>
                </div>
                <div class="form-group">
                    <label for="devolucion_monto" class="floating-label-activo-sm">Monto a devolver</label>
                    <input type="text" class="form-control form-control-sm" id="devolucion_monto" name="devolucion_monto">
                </div>
                <div class="form-group">
                    <label for="devolucion_metodo" class="floating-label-activo-sm">Método de devolución</label>
                    <select class="form-control form-control-sm" id="devolucion_metodo" name="devolucion_metodo">
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="transferencia">Transferencia Bancaria</option>
                    </select>
                </div>
                <div class="form-group mb-0">
                    <label for="devolucion_observaciones" class="floating-label-activo-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" id="devolucion_observaciones" name="devolucion_observaciones" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success btn-sm" onclick="confirmar_devolucion_presupuesto()"><i class="feather icon-corner-up-left"></i> Registrar devolución</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL REASIGNACIÓN PRESUPUESTO -->
<div class="modal fade" id="modalReasignarPresupuesto" tabindex="-1" aria-labelledby="modalReasignarPresupuestoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div><h5 class="modal-title" id="modalReasignarPresupuestoLabel">Reasignación del presupuesto</h5><small>Defina el orden en que se distribuirá el monto abonado</small></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
            </div>
            <div class="modal-body" id="modal_body_reasignar_presupuesto">
                @php
                    // Si el presupuesto tiene un convenio aplicado, todo lo que se compara/muestra aquí debe ser el monto YA descontado.
                    $porcentajeDescuentoReasignacion = 0;
                    if ($presupuesto && $presupuesto->id_convenio_aplicado) {
                        $convenioReasignacion = \App\Models\EmpresasConvenios::find($presupuesto->id_convenio_aplicado);
                        $porcentajeDescuentoReasignacion = $convenioReasignacion ? intval($convenioReasignacion->porcentaje) : 0;
                    }
                    $conDescuentoReasignacion = function ($valor) use ($porcentajeDescuentoReasignacion) {
                        $valor = intval($valor);
                        return $porcentajeDescuentoReasignacion > 0 ? (int) round($valor - ($valor * $porcentajeDescuentoReasignacion / 100)) : $valor;
                    };
                    $totalOdontogramaReasignacion = collect($odontograma)->where('presupuesto', 1)->where('urgencia', 0)->sum(fn ($o) => $conDescuentoReasignacion($o->valor));
                    $totalGruposReasignacion = collect($todos)->where('presupuesto', 1)->sum(fn ($o) => $conDescuentoReasignacion($o->valor));
                    $totalInsumosReasignacion = collect($insumos_tratamientos)->filter(fn ($i) => $i->presupuesto == 1 && $i->urgencia == 0)->sum(fn ($i) => $conDescuentoReasignacion($i->cantidad * $i->valor));
                    $totalPresupuestoReasignacion = $totalOdontogramaReasignacion + $totalGruposReasignacion + $totalInsumosReasignacion;
                @endphp
                <div class="alert reasignacion-ayuda py-2" role="status">
                    <i class="feather icon-info mr-1"></i>
                    <strong>Distribución del nuevo abono:</strong> los insumos se cubren automáticamente, del más económico al más caro. Aquí sólo puede distribuir el remanente entre piezas y grupos.
                </div>
                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="card-informacion borde-presupuesto">
	                		<div class="card-body p-2">
                                <div class="form-row align-items-stretch">
				                    <div class="col-md-7 mb-2 mb-md-0">
				                        <div class="reasignacion-resumen">
				                            <input type="hidden" id="total_presupuesto_a_pagar"
				                                value="{{ $totalPresupuestoReasignacion }}">
				                            <input type="hidden" name="total_abonado_presupuesto" id="total_abonado_presupuesto"
				                                value="{{ $valor_abonado }}">
				                            <input type="hidden" name="total_adeudado_presupuesto"
				                                id="total_adeudado_presupuesto"
				                                value="{{ $totalPresupuestoReasignacion - $valor_abonado }}">
				                            <div class="reasignacion-metrica"><small>Total presupuesto</small><strong id="monto_total">${{ number_format($totalPresupuestoReasignacion, 0, ',', '.') }}</strong></div>
				                            <div class="reasignacion-metrica"><small>Nuevo abono disponible</small><strong class="text-info" id="monto_abonado">$0</strong></div>
				                            <div class="reasignacion-metrica"><small>Saldo pendiente</small><strong class="text-danger" id="monto_adeudado">${{ number_format(max(0, $totalPresupuestoReasignacion - $valor_abonado), 0, ',', '.') }}</strong></div>
				                        </div>
				                    </div>
				                    <div class="col-md-5">
				                        <div class="reasignacion-seleccion" id="info_pagos_seleccionados" aria-live="polite">
                                                <small class="text-muted text-uppercase font-weight-bold">Asignación actual</small>
                                                <h5 class="mb-1 mt-1 text-c-blue" id="monto_seleccionado_reasignacion">$0</h5>
                                                <span class="text-muted" id="estado_seleccion_reasignacion">Seleccione al menos una prestación.</span>
                                            </div>
				                    </div>
			                    </div>
			                </div>
		                </div>
		            </div>
                </div>

                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-informacion reasignacion-seccion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Presupuesto por pieza</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
	                				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_odontograma">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
			                                <th>Pieza / prestación</th>
			                                <th>Valor</th>
			                                <th>Estado actual</th>
			                                <th>Cubierto</th>
			                                <th>Por pagar</th>
			                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($odontograma as $o)
						                                @if ($o->presupuesto == 1 && $o->urgencia == 0)
						                                    @php $valorNetoOdontoReasig = $conDescuentoReasignacion($o->valor); @endphp
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-total="{{ $valorNetoOdontoReasig }}" data-valor="{{ $valorNetoOdontoReasig }}" data-id="{{ $o->id }}"
			                                                data-info="odonto" data-estado="{{ $o->estado_pago ?: 'error' }}"></td>
			                                        <td><strong>Pieza {{ $o->pieza }}</strong><br><small class="text-muted">{{ $o->tratamiento }}</small></td>
			                                        <td>${{ number_format($valorNetoOdontoReasig, 0, ',', '.') }}
			                                            @if($porcentajeDescuentoReasignacion > 0)
			                                                <br><small class="text-muted"><s>${{ number_format($o->valor, 0, ',', '.') }}</s></small>
			                                            @endif
			                                        </td>
			                                        <td class="estado-pago-reasignacion"></td>
			                                        <td class="monto-cubierto">$0</td>
			                                        <td class="monto-pendiente">${{ number_format($valorNetoOdontoReasig, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_odontograma({{ $o->id }})"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
				               		</div>
						         </div>
		            		</div>
	            		</div>
	            	</div>
	            </div>

                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-informacion reasignacion-seccion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Presupuesto por grupo de piezas</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
		                			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_grupos">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
			                                <th>Nombre</th>
			                                <th>Valor</th>
			                                <th>Estado actual</th>
			                                <th>Cubierto</th>
			                                <th>Por pagar</th>
			                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($todos as $o)
                                                                        @if ($o->presupuesto == 1 && (int) ($o->urgencia ?? 0) === 0)
						                                    @php $valorNetoGrupoReasig = $conDescuentoReasignacion($o->valor); @endphp
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-total="{{ $valorNetoGrupoReasig }}" data-valor="{{ $valorNetoGrupoReasig }}" data-id="{{ $o->id }}"
			                                                data-info="gral" data-estado="{{ $o->estado_pago ?: 'error' }}"></td>
			                                        <td>{{ $o->diagnostico_tratamiento }}</td>
			                                        <td>${{ number_format($valorNetoGrupoReasig, 0, ',', '.') }}
			                                            @if($porcentajeDescuentoReasignacion > 0)
			                                                <br><small class="text-muted"><s>${{ number_format($o->valor, 0, ',', '.') }}</s></small>
			                                            @endif
			                                        </td>
			                                        <td class="estado-pago-reasignacion"></td>
			                                        <td class="monto-cubierto">$0</td>
			                                        <td class="monto-pendiente">${{ number_format($valorNetoGrupoReasig, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_diagnostico({{ $o->id }},'gral',this)"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
						            </div>
					        	</div>
	            			</div>
	            		</div>
	            	</div>
            	</div>
		        <div class="form-row">
		        	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-informacion reasignacion-seccion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Insumos y gastos generales</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
	                				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_insumos">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
						                                <th>Nombre</th>
						                                <th>Cantidad</th>
			                                <th>Valor Unitario</th>
			                                <th>Total</th>
			                                <th>Estado actual</th>
			                                <th>Cubierto</th>
			                                <th>Por pagar</th>
			                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($insumos_tratamientos as $i)
						                                @if ($i->presupuesto == 1 && $i->urgencia == 0)
						                                    @php
						                                        $total = $i->cantidad * $i->valor;
						                                        $totalNetoInsumoReasig = $conDescuentoReasignacion($total);
						                                    @endphp
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-valor="{{ $totalNetoInsumoReasig }}" data-id="{{ $i->id }}"
			                                                data-info="insumo" data-estado="{{ $i->estado_pago ?: 'error' }}"></td>
						                                        <td>
                                                                    <strong>{{ $i->insumos }} {{ $i->nombre_marca }}</strong>
                                                                    @php $prestacionInsumo = collect($odontograma)->firstWhere('id', $i->id_tratamiento); @endphp
                                                                    @if($prestacionInsumo)
                                                                        <br><small class="text-muted">Pieza {{ $prestacionInsumo->pieza }} · {{ $prestacionInsumo->tratamiento }}</small>
                                                                    @elseif($i->tipo)
                                                                        <br><small class="text-muted">Prestación general asociada</small>
                                                                    @endif
                                                                </td>
						                                        <td>{{ $i->cantidad }}</td>
						                                        <td>${{ number_format($i->valor, 0, ',', '.') }}</td>
			                                        <td>${{ number_format($totalNetoInsumoReasig, 0, ',', '.') }}
			                                            @if($porcentajeDescuentoReasignacion > 0)
			                                                <br><small class="text-muted"><s>${{ number_format($total, 0, ',', '.') }}</s></small>
			                                            @endif
			                                        </td>
			                                        <td class="estado-pago-reasignacion"></td>
			                                        <td class="monto-cubierto">$0</td>
			                                        <td class="monto-pendiente">${{ number_format($totalNetoInsumoReasig, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_insumo({{ $i->id }})"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
					             	</div>
			    				</div>
	    					</div>
	    				</div>
	    			</div>
    			</div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" id="btn_confirmar_reasignacion" onclick="reasignar_presupuesto_modal()" disabled><i class="feather icon-check mr-1"></i>Aplicar reasignación</button>
            </div>
        </div>
    </div>
</div>

<!-- info_lab_modal -->
<div class="modal fade" id="info_lab_modal" tabindex="-1" aria-labelledby="info_lab_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="info_lab_modalLabel">Información del Laboratorio</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Nombre:</label>
                        <div id="info_lab_nombre"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Dirección:</label>
                        <div id="info_lab_direccion"></div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Teléfono:</label>
                        <div id="info_lab_telefono"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Email:</label>
                        <div id="info_lab_email"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" id="id_pieza_tto">
<input type="hidden" id="tipo_tto">
<script>
    const valoresSeleccionados = [];
    let totalSeleccionado = 0;
    let montoDisponibleReasignar = 0;
    let presupuestoCerradoPorPago = false;

    function marcarPresupuestoComoPagado() {
        presupuestoCerradoPorPago = true;
        montoDisponibleReasignar = 0;
        // El botón principal queda disponible para volver a consultar el estado.
        // Si posteriormente se agrega una prestación, esa consulta reabre el pago.
        $('.btn-pagar-presupuesto').prop('disabled', false)
            .attr('title', 'Consultar estado del presupuesto');
        $('.btn-confirmar-pago').prop('disabled', true)
            .attr('title', 'Presupuesto pagado completamente');
        $('#montoPago, #metodoPago, #bono_prevision').prop('disabled', true);
        $('#presupuesto_pagado_mensaje').removeClass('d-none');
        if (typeof actualizarEstadoCabeceraPlanDental === 'function') {
            actualizarEstadoCabeceraPlanDental(true);
        }
    }

    function marcarPresupuestoComoReabierto(sigueCompletamentePagado) {
        presupuestoCerradoPorPago = false;
        $('.btn-pagar-presupuesto, .btn-confirmar-pago').prop('disabled', false)
            .attr('title', 'Registrar un nuevo abono');
        $('#montoPago, #metodoPago, #bono_prevision').prop('disabled', false);
        $('#presupuesto_pagado_mensaje').addClass('d-none');

        if (sigueCompletamentePagado) {
            marcarPresupuestoComoPagado();
            return;
        }
        if (typeof actualizarEstadoCabeceraPlanDental === 'function') {
            actualizarEstadoCabeceraPlanDental(false);
        }
    }

    function actualizarOrdenVisualReasignacion() {
        document.querySelectorAll('#modalReasignarPresupuesto .valor-checkbox').forEach(function(checkbox) {
            const celda = checkbox.closest('td');
            if (!celda) return;
            const anterior = celda.querySelector('.orden-seleccion');
            if (anterior) anterior.remove();

            const id = parseInt(checkbox.getAttribute('data-id'));
            const info = checkbox.getAttribute('data-info');
            const posicion = valoresSeleccionados.findIndex(function(item) {
                return item.id === id && item.info === info;
            });
            if (posicion >= 0) {
                const orden = document.createElement('span');
                orden.className = 'orden-seleccion';
                orden.title = 'Prioridad de pago';
                orden.textContent = posicion + 1;
                celda.appendChild(orden);
            }
        });
    }

    function ordenarSeleccionReasignacionPorPrioridad() {
        const prioridad = { insumo: 0, odonto: 1, gral: 2 };
        valoresSeleccionados.sort(function(a, b) {
            const comparacionCategoria = (prioridad[a.info] ?? 99) - (prioridad[b.info] ?? 99);
            return comparacionCategoria !== 0 ? comparacionCategoria : a.valor - b.valor;
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('change', function (event) {
            if (event.target.classList.contains('valor-checkbox') && event.target.getAttribute('data-info') !== 'insumo') {
                const checkbox = event.target;
                const id = parseInt(checkbox.getAttribute('data-id'));
                const info = checkbox.getAttribute('data-info');
                const pendienteCelda = checkbox.closest('tr').querySelector('.monto-pendiente');
                const valor = pendienteCelda
                    ? (parseInt(pendienteCelda.textContent.replace(/[^0-9]/g, '')) || 0)
                    : (parseInt(checkbox.getAttribute('data-valor')) || 0);

                if (checkbox.checked) {
                    if (!valoresSeleccionados.some(v => v.id === id && v.info === info)) {
                        valoresSeleccionados.push({ id, info, valor });
                    }
                } else {
                    // Si se desmarca, lo quitamos del array
                    const index = valoresSeleccionados.findIndex(v => v.id === id && v.info === info);
                    if (index !== -1) {
                        valoresSeleccionados.splice(index, 1);
                    }
                }
                ordenarSeleccionReasignacionPorPrioridad();
                actualizarOrdenVisualReasignacion();
            }
        });
    });

    $(document).ready(function() {
        $('#table_pagos_presupuesto').DataTable();
    })
    const verModalAgregarPresupuestoDental = (fun, tipo, id) => {

        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();

        var html = '';

        switch (tipo) {
            case 1:
                html += `
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 2:
                html += `
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input class="form-control" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 3:
                html += `
                    <table>
                        <tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 4:
                html += `
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;


            case 5:

                html += `
                    <table>
                        <tr>
                            <td>Nombre antecedente</td>
                            <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Institución</td>
                            <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                        </tr>
                        <tr>
                            <td>Fecha Evento</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
                break;

            case 6:
                html += `
                    <table>
                        <tr>
                            <td>Nombre alergia</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 7:
                html += `
                    <table>
                        <tr>
                            <td>Nombre Medicamento</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Dosis</td>
                            <td><textarea class="form-control" id="dosis"></textarea></td>
                        </tr>

                    </table>
                `;
                break;
            case 8:
                html += `
                    <table>
                        <tr>
                            <td>Tipo de Discapacidad</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_tipo" id="discapacidad_tipo">
                                    <option value="Auditíva">Auditíva</option>
                                    <option value="Visual">Visual</option>
                                    <option value="Locomotora">Locomotora </option>
                                    <option value="Neurológica">Neurológica</option>
                                    <option value="Fonoarticulatoria">Fonoarticulatoria</option>
                                    <option value="Cognitiva">Cognitiva</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>
                                <input class="form-control form-control-sm" type="text" id="discapacidad_grado">
                            </td>
                        </tr>
                        <tr>
                            <td>Permanente</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
                                    <option value="si">SI</option>
                                    <option value="no">NO</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                `;
                break;
        }

        $('#body-modal-inputs').html(html);
        if (tipo == 7)
            activarMedicamentos('nombre_medicamento_cronico');
        $('#tipo-antecedente-m').val(tipo);
        $('#modal-ingreso').modal(fun);

        if (id != 0) {
            $('#agregar-antecedente').hide();
            $('#modificar-antecedente').show();
            $('#id-antecedente-m').val(id);
            cargarDatosAntecedente(id);
        }

    }

    function verModalAgregarInsumos(id_tto, objetivo, tto, tipo = null) {
        dame_tratamientos_pieza(id_tto);
        limpiar_formulario_insumo();
        console.log(objetivo, tipo);
        $('#insumosModal').modal('show');
        $('#numero_pieza_tto_modal').val(objetivo);
        $('#tto_modal').val(tto);
        $('#id_pieza_tto').val(id_tto);
        $('#tipo_tto').val(tipo);
    }

    function dame_tratamientos_pieza(id) {
        let url = '{{ ROUTE('dental.dame_insumos_tratamiento') }}';
        let data = {
            id: id,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                let insumos = resp.insumos;
                console.log(insumos);
                let table = $('#table_insumos_tto').DataTable();

                // Limpiar la tabla sin perder la configuración de DataTables
                table.clear();

                // Recorrer el array de insumos y agregarlos a la tabla
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                    table.row.add([
                        insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                        insumo.cantidad, // Cantidad utilizada
                        insumo.valor, // Unidad de medida
                        insumo.observaciones // Descripción u observaciones
                    ]);
                });

                // Dibujar la tabla nuevamente con los nuevos datos
                table.draw();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function agregar_insumos_tto() {
        let insumos = $('#insumos_tto').val();
        let cantidad = $('#insumos_cantidad_tto').val();
        let valor = $('#insumos_valor_tto').val();
        let observaciones = $('#insumos_obs_tto_modal').val();
        let id_tto = $('#id_pieza_tto').val();

        let valido = 1;
        let mensaje = '';

        if (insumos == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar insumos </li>';
        }

        if (cantidad == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar cantidad </li>';
        }

        if (valor == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar valor </li>';
        }

        if (valido == 1) {
            let data = {
                insumos: insumos,
                cantidad: cantidad,
                valor: valor,
                id_tto: id_tto,
                id_paciente: dame_id_paciente(),
                id_ficha_atencion: $('#id_fc').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                tipo: $('#tipo_tto').val(),
                observaciones: observaciones,
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = '{{ ROUTE('dental.agregar_insumos_tto') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'ok') {
                        swal({
                            icon: 'success',
                            text: 'Se a agregado los insumos correctamente',
                            title: 'Exito'
                        });
                        limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_tto').DataTable();

                        // Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        // Recorrer el array de insumos y agregarlos a la tabla
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                            table.row.add([
                                insumo.insumos + ' ' + insumo
                                .nombre_marca, // Nombre del insumo
                                insumo.cantidad, // Cantidad utilizada
                                insumo.valor, // Unidad de medida
                                insumo.observaciones // Descripción u observaciones
                            ]);
                        });

                        // Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });

            return false;
        }
    }

    function limpiar_formulario_insumo() {
        $('#insumos_tto').val('');
        $('#insumos_cantidad_tto').val('');
        $('#insumos_valor_tto').val('');
        $('#insumos_obs_tto_modal').val('');
        //    $('#id_pieza_tto').val('');
    }

    function pagar_presupuesto() {
        if (presupuestoCerradoPorPago) {
            const totalVigente = parseInt($('#total_presupuesto_dental').val()) || 0;
            const abonadoVigente = parseInt($('#total_abonado_presupuesto').val()) || 0;
            if (totalVigente > abonadoVigente) {
                marcarPresupuestoComoReabierto(false);
            } else {
                swal('Presupuesto pagado', 'Este presupuesto está cerrado y no admite nuevos abonos.', 'info');
                return;
            }
        }
        total = $('#total_presupuesto_dental').val();
        console.log(formatoMoneda(parseInt(total)));
        // abrir modal
        $('#modalPagoPresupuesto').modal('show');
        $('#total_pago').val(formatoMoneda(parseInt(total)));
        let id_hora_medica = $('#hora_medica').val();
        console.log(id_hora_medica);
        let url = "{{ ROUTE('dental.dame_bono_pago') }}";
        let data = {
            id_hora_medica: id_hora_medica,
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.presupuesto_completado) {
                    marcarPresupuestoComoPagado();
                    $('#modalPagoPresupuesto').modal('hide');
                    swal('Presupuesto pagado', 'El saldo pendiente es $0. El presupuesto está cerrado y no admite nuevos abonos.', 'info');
                    return;
                }
                let valor_presupuesto = $('#total_presupuesto_dental').val();
                let valor_abonado = resp.valor_atencion;
                let deuda = valor_presupuesto - valor_abonado;
                montoDisponibleReasignar = parseInt(resp.monto_disponible_reasignar) || 0;
                if (resp.odontograma) {
                    actualizarOpcionesDestinoPago(resp.odontograma, resp.todos || []);

                    try {
                        actualizarPendientesModalReasignacion(resp);
                    } catch (error) {
                        // El resumen principal y el pago no deben quedar bloqueados
                        // por un problema puramente visual del modal de reasignación.
                        console.error(
                            'Presupuesto: no fue posible refrescar la reasignación, pero el flujo de pago continúa.',
                            error
                        );
                    }
                }

                $('#bono_prevision').val(resp.id_prevision || 0).trigger('change');
                $('#montoAbonado').val(formatoMoneda(resp.valor_atencion || 0));

                // La respuesta de dame_bono_pago contiene la deuda vigente tras
                // agregar piezas/insumos. Refrescar siempre las métricas del modal.
                const totalActual = Number($('#total_presupuesto_dental').val()) || 0;
                const abonadoActual = Number(resp.valor_atencion || 0);
                const saldoActual = Math.max(0, totalActual - abonadoActual);

                sincronizarResumenPagoPresupuesto(
                    abonadoActual,
                    saldoActual,
                    resp.pagos || []
                );

                // Sugerir por defecto el saldo completo a pagar. El usuario puede
                // reemplazarlo por un abono menor.
                if (!$('#montoPago').val()) {
                    $('#montoPago').val(saldoActual);
                }

                // Cargar información histórica del presupuesto.
                cargarInformacionPresupuesto(resp.pagos || []);
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function sincronizarResumenPagoPresupuesto(totalAbonado, saldoPendiente, pagos) {
        const abonado = Math.max(0, parseInt(totalAbonado) || 0);
        const total = parseInt($('#total_presupuesto_dental').val()) || parseInt($('#total_pago').val().replace(/[^0-9]/g, '')) || 0;
        const saldo = Math.max(0, saldoPendiente !== undefined && saldoPendiente !== null
            ? parseInt(saldoPendiente) || 0
            : total - abonado);
        const porcentaje = total > 0 ? Math.min(100, (abonado / total) * 100) : 0;

        $('#montoAbonado').val(formatoMoneda(abonado));
        $('#valores_abonado_presupuesto, #valores_total_abonado_presupuesto_conf').text(formatoMoneda(abonado));
        $('#total_abonado_presupuesto').val(abonado);
        $('#total_adeudado_presupuesto').val(saldo);
        $('#abonos_presup').val(formatoMoneda(abonado));
        // El saldo agregado es la fuente de verdad para el color del visor.
        // Evita que un estado_pago histórico mantenga una pieza roja cuando
        // el presupuesto completo ya quedó cubierto.
        $('#abonos_presup').attr('data-saldo-pendiente', saldo);
        $('#monto_abonado_presupuesto').text(formatoMoneda(abonado));
        $('#monto_pendiente_presupuesto, #saldo_pendiente_presupuesto, #saldo_pendiente_presupuesto_conf').text(formatoMoneda(saldo));
        $('#barra_progreso_presupuesto').css('width', porcentaje + '%');
        $('#porcentaje_pago_presupuesto').text(Math.round(porcentaje) + '%');

        if (Array.isArray(pagos)) cargarTablaPagosPresupuesto(pagos);
    }

    function actualizarOpcionesDestinoPago(odontograma, grupos) {
        const selector = $('#destinoPagoPieza');
        if (!selector.length || !Array.isArray(odontograma)) return;
        const seleccionActual = selector.val();
        selector.empty().append(new Option('Automático (respeta la prioridad actual)', ''));
        odontograma.forEach(function(pieza) {
            if (pieza.presupuesto == 1 && pieza.urgencia == 0 && pieza.estado_pago !== 'ok') {
                selector.append(new Option('Pieza ' + pieza.pieza + ' — ' + (pieza.tratamiento || pieza.descripcion || ''), 'pieza:' + pieza.id));
            }
        });
        if (Array.isArray(grupos)) {
            grupos.forEach(function(grupo) {
                if (grupo.presupuesto == 1 && grupo.estado_pago !== 'ok') {
                    selector.append(new Option(
                        'Grupo ' + (grupo.localizacion || 'dental') + ' — ' + (grupo.diagnostico_tratamiento || grupo.descripcion || ''),
                        'grupo:' + grupo.id
                    ));
                }
            });
        }
        if (selector.find('option[value="' + seleccionActual + '"]').length) selector.val(seleccionActual);
    }

    function normalizarEstadoPagoPostPago(odontograma, response) {
        const lista = Array.isArray(odontograma) ? odontograma : [];
        const saldo = Number(response && response.suma_adeudado != null ? response.suma_adeudado : 0);
        const completado = !!(response && response.presupuesto_completado) || saldo <= 0;

        return lista.map(function (item) {
            if (!item) return item;

            const copia = Object.assign({}, item);

            // Si el presupuesto quedó totalmente cubierto, el estado de pago
            // visual y funcional debe ser autoritativamente "ok" en todas las
            // prestaciones activas del presupuesto.
            if (
                completado &&
                Number(copia.presupuesto) === 1 &&
                Number(copia.urgencia || 0) === 0
            ) {
                copia.estado_pago = 'ok';
            }

            return copia;
        });
    }

    function confirmar_pago() {
        if (presupuestoCerradoPorPago) {
            swal('Presupuesto pagado', 'Este presupuesto está cerrado y no admite nuevos abonos.', 'info');
            return;
        }
        // Obtener valores del formulario
        const total_pago = $('#total_pago').val().replace(/[^0-9]/g, '');
        const montoPago = $('#montoPago').val().replace(/[^0-9]/g, '');
        const montoAbonado = $('#montoAbonado').val().replace(/[^0-9]/g, '');
        const metodoPago = $('#metodoPago').val();
        const bonoPrevision = $('#bono_prevision').val();
        const destinoPagoSeleccionado = $('#destinoPagoPieza').val() || '';
        const partesDestinoPago = destinoPagoSeleccionado.split(':');
        const tipoDestinoPago = partesDestinoPago.length === 2 ? partesDestinoPago[0] : '';
        const idDestinoPago = partesDestinoPago.length === 2 ? partesDestinoPago[1] : '';
        const id_dcto = $('#tiene_dcto').val();
        const abonadoAntesDeEnviar = parseInt(montoAbonado) || 0;
        const botonConfirmar = $('.btn-confirmar-pago');

        // Verificar que todos los campos requeridos estén completos
        if (!montoPago || !montoAbonado || !metodoPago) {
            console.error('Por favor complete todos los campos obligatorios.');
            swal({
                title: 'Error',
                icon: 'error',
                text: 'Por favor complete todos los campos obligatorios.',
            })
            return;
        }


        // Crear objeto JSON con los datos del formulario
        const data = {
            _token: '{{ csrf_token() }}', // Token CSRF
            total_pago: total_pago,
            monto_pago: montoPago,
            monto_abonado: montoAbonado,
            metodo_pago: metodoPago,
            bono_prevision: bonoPrevision,
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            id_destino_pago: idDestinoPago,
            tipo_destino_pago: tipoDestinoPago,
            id_dcto: id_dcto
        };

        botonConfirmar.prop('disabled', true).attr('data-enviando', '1');
        let verificandoPagoPersistido = false;

        // Enviar los datos por AJAX
        $.ajax({
            url: '{{ ROUTE("dental.confirmar_pago_presupuesto_dental") }}',
            method: 'POST',
            data: data,
            success: function(response) {
                console.log('Éxito:', response);
                if (response.estado == 1) {
                    // Actualizar primero los datos críticos; las tablas son secundarias.
                    sincronizarResumenPagoPresupuesto(response.suma_pagado, response.suma_adeudado, response.pagos);
                    let pagos = response.pagos;
                    let table = $('#table_pagos_presupuesto').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();
                    pagos.forEach(function(pago) {
                        let rowNode = table.row.add([
                            pago.fecha_pago,
                            pago.metodo_pago,
                            formatoMoneda(pago.total),
                            `<td>
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                            </td>`
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    });
                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    let odontograma = normalizarEstadoPagoPostPago(
                        response.odontograma,
                        response
                    );
                    response.odontograma = odontograma;

                    // Mantener una sola fuente visual de verdad inmediatamente
                    // después del pago, sin esperar que el usuario cambie de tab.
                    window.odontogramaPagosActual = odontograma;

                    actualizarOpcionesDestinoPago(odontograma, response.todos || []);

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }

                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    sincronizarSelectorPagosPiezas(odontograma);
                    sincronizarDetallePresupuestoClinico(odontograma);

                    if (
                        window.MedSDIPresupuestoDental &&
                        typeof window.MedSDIPresupuestoDental.recibirOdontograma === 'function'
                    ) {
                        window.MedSDIPresupuestoDental.recibirOdontograma(
                            odontograma,
                            null,
                            response.presupuesto || null
                        );
                    }

                    // Algunos componentes/DataTables redibujan en el mismo tick.
                    // Repintamos una vez más al terminar el frame para evitar que
                    // vuelvan a aparecer indicadores rojos obsoletos.
                    window.requestAnimationFrame(function () {
                        sincronizarSelectorPagosPiezas(odontograma);

                        if (
                            window.MedSDIPresupuestoDental &&
                            typeof window.MedSDIPresupuestoDental.renderTablaPagos === 'function'
                        ) {
                            window.MedSDIPresupuestoDental.renderTablaPagos(odontograma);
                        }
                    });

                    let insumos = response.insumos;
                    console.log(insumos);
                    let table_insumos = $('#table_insumos_preimplante').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table_insumos.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                            // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        } else {
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        }

                        table_insumos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                            insumo.observaciones,
                            insumo.cantidad, // Cantidad utilizada
                            insumo.valor, // Unidad de medida
                            total,
                            botones
                        ]);
                    });
                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1 && Number(insumo.urgencia || 0) === 0) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                0, // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();
                    let todos = response.todos;

                    let table_ = $('#presup_estado_pago_gral').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {

                        if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(odonto.valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                     // Limpiar formulario después del pago exitoso
                     $('#montoPago').val('');
                     $('#metodoPago').val('');

                     actualizarPendientesModalReasignacion(response);
                     // La respuesta de confirmar_pago ya contiene el estado definitivo.
                     // Evita que una segunda peticion asincrona vuelva a pintar una pieza
                     // como incompleta justo despues de completar el presupuesto.
                     if (
                         !response.presupuesto_completado &&
                         (!Array.isArray(response.odontograma) || response.odontograma.length === 0)
                     ) {
                         actualizar_presupuesto();
                     }
                     // La respuesta ya contiene los saldos y estados recalculados.
                     cargarInformacionPresupuesto(response.pagos || []);
                     if (response.presupuesto_completado) {
                         marcarPresupuestoComoPagado();
                         $('#saldo_pendiente_presupuesto_conf').text(formatoMoneda(0));

                         // Consolidar el estado visual completo antes de cerrar.
                         sincronizarResumenPagoPresupuesto(
                             response.suma_pagado,
                             0,
                             response.pagos || []
                         );

                         $('#abonos_presup')
                             .val(formatoMoneda(Number(response.suma_pagado || 0)))
                             .attr('data-saldo-pendiente', 0);

                         sincronizarSelectorPagosPiezas(odontograma);

                         if (
                             window.MedSDIPresupuestoDental &&
                             typeof window.MedSDIPresupuestoDental.recibirOdontograma === 'function'
                         ) {
                             window.MedSDIPresupuestoDental.recibirOdontograma(
                                 odontograma,
                                 null,
                                 response.presupuesto || null
                             );
                         }

                         $('#modalPagoPresupuesto').modal('hide');
                         swal({
                             title: 'Presupuesto pagado completamente',
                             text: 'El saldo pendiente quedó en $0. El presupuesto fue cerrado y ya no admite nuevos abonos.',
                             icon: 'success',
                             button: 'Aceptar'
                         });
                     } else {
                         swal({
                             title: 'Pago registrado',
                             text: response.mensaje,
                             icon: 'success'
                         });
                         if (response.pago_asignado_directamente) {
                             $('#modalPagoPresupuesto').modal('hide');
                         } else {
                             $('#modalPagoPresupuesto').one('hidden.bs.modal', function() {
                                 reasignar_presupuesto();
                             }).modal('hide');
                         }
                     }
                } else {
                    if (response.presupuesto_completado) {
                        marcarPresupuestoComoPagado();
                    }
                    swal({
                        title: response.presupuesto_completado ? 'Presupuesto pagado' : 'Error',
                        text: response.mensaje,
                        icon: response.presupuesto_completado ? 'info' : 'error'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                verificandoPagoPersistido = true;
                // Verificar el total real: el pago pudo quedar persistido aunque haya
                // fallado una operación posterior al guardado.
                $.ajax({
                    type: 'post',
                    url: "{{ ROUTE('dental.dame_bono_pago') }}",
                    data: {
                        id_paciente: $('#id_paciente').val(),
                        id_presupuesto: $('#id_presupuesto').val(),
                        _token: CSRF_TOKEN
                    },
                    success: function(estadoReal) {
                        const pagosReales = estadoReal.pagos || [];
                        const abonadoReal = pagosReales.reduce(function(total, pago) {
                            return total + (parseInt(pago.total) || 0);
                        }, 0);
                        sincronizarResumenPagoPresupuesto(abonadoReal, null, pagosReales);
                        if (abonadoReal > abonadoAntesDeEnviar) {
                            $('#montoPago').val('');
                            swal('Pago registrado', 'El pago quedó guardado y el resumen fue recuperado automáticamente.', 'success');
                        } else {
                            swal('No fue posible registrar el pago', 'No se detectó un nuevo abono. Puede intentarlo nuevamente.', 'error');
                        }
                    },
                    error: function() {
                        swal('No fue posible verificar el pago', 'Recargue la ficha antes de volver a confirmar para evitar un pago duplicado.', 'error');
                    },
                    complete: function() {
                        botonConfirmar.removeAttr('data-enviando');
                        if (!presupuestoCerradoPorPago) botonConfirmar.prop('disabled', false);
                    }
                });
            },
            complete: function() {
                if (verificandoPagoPersistido) return;
                botonConfirmar.removeAttr('data-enviando');
                if (!presupuestoCerradoPorPago) botonConfirmar.prop('disabled', false);
            }
        });
    }

    function eliminar_pago_dental(id) {
        swal({
            title: "¿Esta seguro que desea ELIMINAR el Pago?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_pago_dental(id);
            }
        });
    }

    function confirmar_eliminar_pago_dental(id) {
        let url = "{{ ROUTE('dental.eliminar_pago_presupuesto_dental') }}";
        const id_dcto = $('#tiene_dcto').val();
        let data = {
            id: id,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente').val(),
            monto_abonado: $('#abonos_presup').val(),
            total_presupuesto: $('#total_presupuesto_dental').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            id_dcto: id_dcto,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.estado == 'ok') {
                    swal({
                        title: 'Exito',
                        text: resp.mensaje,
                        icon: 'success'
                    });
                    let pagos = resp.pagos;
                    let table = $('#table_pagos_presupuesto').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();
                    pagos.forEach(function(pago) {
                        let rowNode = table.row.add([
                            pago.fecha_pago,
                            pago.metodo_pago,
                            formatoMoneda(pago.total),
                            `<td>
                            <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                        </td>`
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');


                    });

                    let odontograma = resp.odontograma;
                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }

                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(odonto.valor),
                                formatoMoneda(odonto.valor_descuento),
                                formatoMoneda(odonto.valor - odonto.valor_descuento),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });
                    sincronizarSelectorPagosPiezas(odontograma);
                    sincronizarDetallePresupuestoClinico(odontograma);
                    let insumos = resp.insumos;

                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                formatoMoneda(insumo.valor_descuento), // Unidad de medida
                                formatoMoneda(insumo.nuevo_valor),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();

                    $('#contenedor_piezas_dentales_presupuesto').empty();
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                            $('#contenedor_piezas_dentales_presupuesto').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-pieza-presupuesto="${odonto.pieza}">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor)}" >
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor_descuento || 0)}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor - (odonto.valor_descuento || 0))}" >
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger-light-c btn-sm btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `);
                        }
                    });

                    $('#contenedor_insumos').empty();
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        if (insumo.presupuesto == 1 && Number(insumo.urgencia || 0) === 0) {
                            let total = insumo.cantidad * insumo.valor;
                            $('#contenedor_insumos').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Insumo</label>
                                                    <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                </div>
                                                <div class="form-group col-md-3 fill">
                                                    <label class="floating-label-activo-sm">Cantidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                </div>
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                </div>
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-2 d-flex justify-content-center">

                                                    <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }

                    });

                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let descuentos = resp.descuentos;
                    let suma_pagado = resp.suma_pagado;
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos -
                        descuentos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_descuentos_presupuesto').html(formatoMoneda(resp.descuentos));
                    $('#valores_descuentos_presupuesto_conf').html(formatoMoneda(resp.descuentos));
                    $('#valores_laboratorio_conf').html(formatoMoneda(resp.total_lab));
                    $('#descuento_presup').val(formatoMoneda(resp.descuentos));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#total_presup').val(formatoMoneda(total_general));
                    $('#subtotal_clinico').val(formatoMoneda(total_general));
                    $('#total_clinico').val(formatoMoneda(total_general));
                    // guardamos el total en un input hidden
                    $('#total_presupuesto_dental').val(total_general);
                    $('#subtotal_presup').val(formatoMoneda(resp.total_general));
                    $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(
                        suma_pagado)));
                    $('#montoAbonado').val(formatoMoneda(parseInt(suma_pagado)));
                    let todos = resp.todos;

                    let table_ = $('#presup_estado_pago_gral').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {

                        if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(odonto.valor),
                                formatoMoneda(0),
                                formatoMoneda(odonto.nuevo_valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    //actualizar_presupuesto();

                    console.log('Tabla de pagos actualizada');

                    // Actualizar información del presupuesto después de eliminar pago
                    setTimeout(cargarInformacionPresupuesto, 500);
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }

    function actualizarPendientesModalReasignacion(datosActualizados = null) {
        const estados = {};
        if (datosActualizados) {
            [
                ['odonto', datosActualizados.odontograma || []],
                ['gral', datosActualizados.todos || []],
                ['insumo', datosActualizados.insumos || []]
            ].forEach(function(grupo) {
                grupo[1].forEach(function(item) {
                    estados[grupo[0] + '-' + item.id] = item.estado_pago || 'error';
                });
            });
        }

        const filas = Array.from(
            document.querySelectorAll('#modalReasignarPresupuesto .valor-checkbox')
        ).map(function(checkbox) {
            const fila = checkbox.closest('tr');

            // DataTables Responsive y algunos redibujos pueden dejar clones o
            // checkboxes temporales que no pertenecen a una fila completa.
            // Esos nodos no deben romper todo el flujo de pago.
            if (!fila) {
                console.warn('Presupuesto: checkbox de reasignación sin fila asociada.', checkbox);
                return null;
            }

            const clave = checkbox.getAttribute('data-info') + '-' + checkbox.getAttribute('data-id');
            const estado = estados[clave] || checkbox.getAttribute('data-estado') || 'error';
            checkbox.setAttribute('data-estado', estado);

            return {
                checkbox: checkbox,
                fila: fila,
                estado: estado,
                valor: Number(
                    checkbox.getAttribute('data-total') ||
                    checkbox.getAttribute('data-valor')
                ) || 0
            };
        }).filter(Boolean);
        const prioridadEstadoPago = { insumo: 0, odonto: 1, gral: 2 };
        filas.sort(function(a, b) {
            const comparacionCategoria = (prioridadEstadoPago[a.checkbox.getAttribute('data-info')] ?? 99)
                - (prioridadEstadoPago[b.checkbox.getAttribute('data-info')] ?? 99);
            return comparacionCategoria !== 0 ? comparacionCategoria : a.valor - b.valor;
        });

        const abonado = Number($('#total_abonado_presupuesto').val()) || 0;
        const cubiertoCompleto = filas.reduce(function(total, item) {
            return total + (item.estado === 'ok' ? item.valor : 0);
        }, 0);
        let disponibleParcial = Math.max(0, abonado - cubiertoCompleto);

        filas.forEach(function(item) {
            let cubierto = 0;
            let etiqueta = 'Pendiente';
            let clase = 'pendiente';
            // Un estado histórico nunca puede representar cobertura si no
            // existe dinero abonado en el presupuesto actual.
            if (item.estado === 'ok' && abonado > 0) {
                cubierto = item.valor;
                etiqueta = 'Pagado';
                clase = 'pagado';
            } else if (item.estado === 'incompleto' && abonado > 0) {
                cubierto = Math.min(item.valor, disponibleParcial);
                disponibleParcial = Math.max(0, disponibleParcial - cubierto);
                etiqueta = 'Pago parcial';
                clase = 'parcial';
            }

            const pendiente = Math.max(0, item.valor - cubierto);
            item.checkbox.setAttribute('data-total', item.valor);
            item.checkbox.setAttribute('data-valor', pendiente);

            const celdaEstado = item.fila.querySelector('.estado-pago-reasignacion');
            const celdaCubierto = item.fila.querySelector('.monto-cubierto');
            const celdaPendiente = item.fila.querySelector('.monto-pendiente');

            // No asumir que todos los TR del modal tienen exactamente la misma
            // estructura. Si una fila fue generada por código histórico o por
            // DataTables, la ignoramos visualmente sin interrumpir el pago.
            if (!celdaEstado || !celdaCubierto || !celdaPendiente) {
                console.warn(
                    'Presupuesto: fila de reasignación incompleta; se omite del refresco visual.',
                    item.fila
                );
                return;
            }

            celdaEstado.innerHTML =
                '<span class="estado-reasignacion ' + clase + '">' + etiqueta + '</span>';
            celdaCubierto.textContent = formatoMoneda(cubierto);
            celdaPendiente.textContent = formatoMoneda(pendiente);
        });

        const totalPendienteModal = filas.reduce(function(total, item) {
            const celdaPendiente = item.fila
                ? item.fila.querySelector('.monto-pendiente')
                : null;

            if (!celdaPendiente) {
                return total + (Number(item.checkbox.getAttribute('data-valor')) || 0);
            }

            const pendienteTexto = String(celdaPendiente.textContent || '')
                .replace(/[^0-9]/g, '');

            return total + (Number(pendienteTexto) || 0);
        }, 0);

        $('#monto_adeudado').text(
            formatoMoneda(Math.max(0, totalPendienteModal))
        );
    }

    function renderizarGruposModalReasignacion(grupos) {
        const $tbody = $('#table_pagos_reasignar_grupos tbody');
        if (!$tbody.length || !Array.isArray(grupos)) return;

        $tbody.empty();
        grupos.forEach(function(grupo) {
            if (Number(grupo.presupuesto) !== 1 || Number(grupo.urgencia || 0) === 1) return;

            const id = parseInt(grupo.id);
            const valorBruto = parseInt(grupo.valor) || 0;
            const valor = grupo.nuevo_valor !== undefined ? (parseInt(grupo.nuevo_valor) || 0) : valorBruto;
            const tieneDescuento = valor !== valorBruto;
            const estado = String(grupo.estado_pago || 'error');
            const localizacion = $('<div>').text(grupo.localizacion || 'Grupo dental').html();
            const tratamiento = $('<div>').text(grupo.diagnostico_tratamiento || grupo.descripcion || '').html();
            const valorTexto = formatoMoneda(valor) + (tieneDescuento ? ' <br><small class="text-muted"><s>'+formatoMoneda(valorBruto)+'</s></small>' : '');
            $tbody.append(`
                <tr>
                    <td><input type="checkbox" class="valor-checkbox"
                        data-total="${valor}" data-valor="${valor}" data-id="${id}"
                        data-info="gral" data-estado="${estado}"></td>
                    <td><strong>${localizacion}</strong>${tratamiento ? '<br><small class="text-muted">' + tratamiento + '</small>' : ''}</td>
                    <td>${valorTexto}</td>
                    <td class="estado-pago-reasignacion"></td>
                    <td class="monto-cubierto">$0</td>
                    <td class="monto-pendiente">${formatoMoneda(valor)}</td>
                    <td><button type="button" class="btn btn-danger btn-sm"
                        onclick="eliminar_diagnostico(${id},'gral',this)"><i class="feather icon-x"></i></button></td>
                </tr>`);
        });
    }

    function renderizarPiezasModalReasignacion(odontograma) {
        const $tbody = $('#table_pagos_reasignar_odontograma tbody');
        if (!$tbody.length || !Array.isArray(odontograma)) return;

        $tbody.empty();
        odontograma.forEach(function(pieza) {
            if (Number(pieza.presupuesto) !== 1 || Number(pieza.urgencia || 0) === 1) return;

            const id = parseInt(pieza.id);
            const valorBruto = parseInt(pieza.valor) || 0;
            const valor = pieza.nuevo_valor !== undefined ? (parseInt(pieza.nuevo_valor) || 0) : valorBruto;
            const tieneDescuento = valor !== valorBruto;
            const estado = String(pieza.estado_pago || 'error');
            const tratamiento = $('<div>').text(pieza.tratamiento || '').html();
            const valorTexto = formatoMoneda(valor) + (tieneDescuento ? ' <br><small class="text-muted"><s>'+formatoMoneda(valorBruto)+'</s></small>' : '');
            $tbody.append(`
                <tr>
                    <td><input type="checkbox" class="valor-checkbox"
                        data-total="${valor}" data-valor="${valor}" data-id="${id}"
                        data-info="odonto" data-estado="${estado}"></td>
                    <td><strong>Pieza ${pieza.pieza}</strong><br><small class="text-muted">${tratamiento}</small></td>
                    <td>${valorTexto}</td>
                    <td class="estado-pago-reasignacion"></td>
                    <td class="monto-cubierto">$0</td>
                    <td class="monto-pendiente">${formatoMoneda(valor)}</td>
                    <td><button type="button" class="btn btn-danger btn-sm"
                        onclick="eliminar_odontograma(${id})"><i class="feather icon-x"></i></button></td>
                </tr>`);
        });
    }

    function renderizarInsumosModalReasignacion(insumos) {
        const $tbody = $('#table_pagos_reasignar_insumos tbody');
        if (!$tbody.length || !Array.isArray(insumos)) return;

        $tbody.empty();
        agruparInsumosPresupuesto(insumos).forEach(function(insumo) {
            if (Number(insumo.presupuesto) !== 1 || Number(insumo.urgencia || 0) === 1) return;

            const id = parseInt(insumo.id);
            const cantidad = parseInt(insumo.cantidad) || 1;
            const valorBruto = (parseInt(insumo.valor) || 0) * cantidad;
            const valor = insumo.nuevo_valor !== undefined ? (parseInt(insumo.nuevo_valor) || 0) : valorBruto;
            const tieneDescuento = valor !== valorBruto;
            const estado = String(insumo.estado_pago || 'error');
            const nombre = $('<div>').text((insumo.insumos || '') + ' ' + (insumo.nombre_marca || '')).html();
            const valorTexto = formatoMoneda(valor) + (tieneDescuento ? ' <br><small class="text-muted"><s>'+formatoMoneda(valorBruto)+'</s></small>' : '');
            $tbody.append(`
                <tr>
                    <td><input type="checkbox" class="valor-checkbox"
                        data-valor="${valor}" data-id="${id}"
                        data-info="insumo" data-estado="${estado}"></td>
                    <td><strong>${nombre}</strong></td>
                    <td>${cantidad}</td>
                    <td>${formatoMoneda(parseInt(insumo.valor) || 0)}</td>
                    <td>${valorTexto}</td>
                    <td class="estado-pago-reasignacion"></td>
                    <td class="monto-cubierto">$0</td>
                    <td class="monto-pendiente">${formatoMoneda(valor)}</td>
                    <td><button type="button" class="btn btn-danger btn-sm"
                        onclick="eliminar_insumo(${id})"><i class="feather icon-x"></i></button></td>
                </tr>`);
        });
    }

    function abrirModalReasignarPresupuesto(datosActualizados) {
        if (datosActualizados && Array.isArray(datosActualizados.odontograma)) {
            renderizarPiezasModalReasignacion(datosActualizados.odontograma);
        }
        if (datosActualizados && Array.isArray(datosActualizados.todos)) {
            renderizarGruposModalReasignacion(datosActualizados.todos);
        }
        if (datosActualizados && Array.isArray(datosActualizados.insumos)) {
            renderizarInsumosModalReasignacion(datosActualizados.insumos);
        }
        if (datosActualizados && datosActualizados.total_presupuesto !== undefined) {
            const totalNeto = parseInt(datosActualizados.total_presupuesto) || 0;
            $('#total_presupuesto_a_pagar').val(totalNeto);
            $('#monto_total').html(formatoMoneda(totalNeto));
        }
        if (datosActualizados && datosActualizados.total_adeudado !== undefined) {
            $('#total_adeudado_presupuesto').val(parseInt(datosActualizados.total_adeudado) || 0);
        }
        $('#modalReasignarPresupuesto').modal('show');
        $('#table_pagos_reasignar_insumos').closest('.reasignacion-seccion').closest('.form-row').hide();
        let adeudado = $('#total_adeudado_presupuesto').val();
        if (datosActualizados && datosActualizados.monto_disponible_reasignar !== undefined) {
            montoDisponibleReasignar = parseInt(datosActualizados.monto_disponible_reasignar) || 0;
        }
        $('#monto_abonado').html(formatoMoneda(montoDisponibleReasignar));
        const deudaActual = Math.max(0, parseInt(adeudado) || 0);
        $('#monto_adeudado').html(formatoMoneda(deudaActual));
        // limpiamos los check con clase valor-checkbox
        $('.valor-checkbox').prop('checked', false);
        valoresSeleccionados.splice(0, valoresSeleccionados.length);
        totalSeleccionado = 0;
        actualizarOrdenVisualReasignacion();
        $('#monto_seleccionado_reasignacion').text(formatoMoneda(0));
        const tieneNuevoAbono = montoDisponibleReasignar > 0;
        const totalAbonadoRegistrado = datosActualizados
            ? (parseInt(datosActualizados.total_abonado ?? datosActualizados.valor_atencion) || 0)
            : (Number($('#total_abonado_presupuesto').val()) || 0);
        $('.valor-checkbox').prop('disabled', function() {
            return !tieneNuevoAbono
                || $(this).attr('data-info') === 'insumo'
                || $(this).attr('data-estado') === 'ok';
        });
        $('#estado_seleccion_reasignacion')
            .attr('class', tieneNuevoAbono ? 'text-muted' : 'text-warning')
            .text(tieneNuevoAbono
                ? 'Seleccione las piezas o grupos que desea cubrir con el remanente.'
                : (totalAbonadoRegistrado <= 0 && deudaActual > 0
                    ? 'Este presupuesto no registra abonos. Registre un abono antes de asignarlo a una prestación.'
                    : (deudaActual > 0
                    ? 'Todos los abonos ya fueron asignados. Para cubrir el saldo pendiente debe registrar un nuevo abono.'
                    : 'Todos los abonos fueron asignados automáticamente.')));
        $('#btn_confirmar_reasignacion').prop('disabled', true);
        actualizarPendientesModalReasignacion(datosActualizados);
    }

    function reasignar_presupuesto() {
        const boton = $('.btn-reasignar-presupuesto');
        boton.prop('disabled', true);

        $.ajax({
            type: 'post',
            url: "{{ ROUTE('dental.dame_bono_pago') }}",
            data: {
                id_hora_medica: $('#hora_medica').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            },
            success: function(resp) {
                montoDisponibleReasignar = parseInt(resp.monto_disponible_reasignar) || 0;
                abrirModalReasignarPresupuesto(resp);
            },
            error: function(error) {
                console.log(error.responseText);
                swal('No fue posible cargar los abonos', 'Intente nuevamente. Si el problema continúa, recargue la ficha.', 'error');
            },
            complete: function() {
                boton.prop('disabled', false);
            }
        });
    }

    function reasignar_presupuesto_modal() {
        if (!valoresSeleccionados.length || totalSeleccionado <= 0) {
            swal('Seleccione prestaciones', 'Debe elegir al menos una prestación antes de aplicar la reasignación.', 'info');
            return;
        }
        swal({
            title: "¿Confirmar la reasignación?",
            text: "El dinero abonado se aplicará siguiendo el orden numérico indicado en las prestaciones.",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: true,
        }).then((confirm) => {
            if(confirm){
                confirmar_reasignar_presupuesto_modal();
            }
        });
    }

    function confirmar_reasignar_presupuesto_modal(){
        // Crear objeto JSON con los datos del formulario
        const data = {
            _token: '{{ csrf_token() }}', // Token CSRF
            valores: valoresSeleccionados,
            valorPresupuestoTotal: $('#total_presupuesto_a_pagar').val(),
            valorAbonado: $('#total_abonado_presupuesto').val(),
            valorAdeudado: $('#total_adeudado_presupuesto').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
        };

        console.log('Orden de clics:', valoresSeleccionados);


        // Enviar los datos por AJAX
        $.ajax({
            url: '{{ ROUTE("dental.reasignar_presupuesto_dental") }}', // Reemplaza con la URL de tu endpoint en el controlador
            method: 'POST',
            data: data,
            success: function(response) {
                console.log('Éxito:', response);
                if (response.estado == 1) {
                    montoDisponibleReasignar = parseInt(response.monto_disponible_reasignar) || 0;
                    swal({
                        title: 'Exito',
                        text: response.mensaje,
                        icon: 'success'
                    });


                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                            let odontograma = response.odontograma;
                            actualizarOpcionesDestinoPago(odontograma, response.todos || []);

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    sincronizarSelectorPagosPiezas(odontograma);
                    sincronizarDetallePresupuestoClinico(odontograma);

                    let insumos = response.insumos;
                    console.log(insumos);
                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                    agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                0, // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();

                    let todos = response.todos;

                    let table_todos = $('#presup_estado_pago_gral').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table_todos.clear().draw();
                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {
                        if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_todos.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(odonto.valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    actualizarPendientesModalReasignacion(response);
                    montoDisponibleReasignar = 0;
                    $('#monto_abonado').text(formatoMoneda(0));
                    $('.valor-checkbox').prop('checked', false).prop('disabled', true);
                    valoresSeleccionados.splice(0, valoresSeleccionados.length);
                    totalSeleccionado = 0;
                    actualizarOrdenVisualReasignacion();
                    $('#monto_seleccionado_reasignacion').text(formatoMoneda(0));
                    $('#estado_seleccion_reasignacion').attr('class', 'text-warning').text('Abono reasignado. No hay nuevos fondos disponibles.');
                    $('#btn_confirmar_reasignacion').prop('disabled', true);
                    actualizar_presupuesto();
                } else {
                    swal({
                        title: 'error',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            },
        });
    }

    // Función para cargar la información del presupuesto al abrir el modal
    function cargarInformacionPresupuesto(pagosActualizados = null) {
        console.log('Cargando información del presupuesto...');
        let total_presupuesto = parseInt($('#total_presupuesto_dental').val()) || 0;
        let monto_abonado = parseInt($('#montoAbonado').val().replace(/[^0-9]/g, '')) || 0;
        let monto_pendiente = total_presupuesto - monto_abonado;

        // Actualizar valores en las cards
        $('#monto_abonado_presupuesto').text(formatoMoneda(monto_abonado));
        $('#total_deuda_presupuesto').text(formatoMoneda(total_presupuesto));
        $('#monto_pendiente_presupuesto').text(formatoMoneda(monto_pendiente));

        // Actualizar barra de progreso
        let porcentaje = total_presupuesto > 0 ? (monto_abonado / total_presupuesto) * 100 : 0;
        $('#barra_progreso_presupuesto').css('width', porcentaje + '%');
        $('#porcentaje_pago_presupuesto').text(Math.round(porcentaje) + '%');

        // Cargar tabla de pagos desde el DataTable existente
        cargarTablaPagosPresupuesto(pagosActualizados);
    }

    // Función para cargar la tabla de pagos del presupuesto
    function cargarTablaPagosPresupuesto(pagosActualizados = null) {
        const tbody = $('#tbody_pagos_presupuesto');
        tbody.empty();

        if (Array.isArray(pagosActualizados)) {
            if (!pagosActualizados.length) {
                $('#seccion_pagos_presupuesto').hide();
                return;
            }
            $('#seccion_pagos_presupuesto').show();
            pagosActualizados.forEach(function(pago) {
                const metodo = pago.metodo_pago || 'N/A';
                const convenio = pago.convenio_nombre || (pago.prevision ? pago.prevision.nombre : 'Sin convenio');
                tbody.append(`
                    <tr class="text-center">
                        <td class="align-middle">${pago.fecha_pago || 'N/A'}</td>
                        <td class="align-middle"><span class="badge badge-success">${formatoMoneda(pago.total || 0)}</span></td>
                        <td class="align-middle"><span class="badge badge-${metodo.toLowerCase() === 'efectivo' ? 'primary' : metodo.toLowerCase() === 'tarjeta' ? 'info' : 'secondary'}">${metodo.charAt(0).toUpperCase() + metodo.slice(1)}</span></td>
                        <td class="align-middle">${convenio}</td>
                        <td class="align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})" title="Eliminar pago"><i class="feather icon-trash-2"></i></button></td>
                    </tr>
                `);
            });
            return;
        }

        // Obtener datos de la tabla DataTable existente
        const table = $('#table_pagos_presupuesto').DataTable();
        const data = table.rows().data();

        if (data.length > 0) {
            $('#seccion_pagos_presupuesto').show();

            data.each(function(row, index) {
                const fecha = row[0] || 'N/A';
                const metodo = row[1] || 'N/A';
                const monto = row[2] || '$0';
                const acciones = row[3] || '';

                // Extraer el ID del botón de eliminar para reutilizarlo
                const eliminarBtn = $(acciones).find('button[onclick*="eliminar_pago_dental"]');
                const idPago = eliminarBtn.length > 0 ?
                    eliminarBtn.attr('onclick').match(/\d+/)?.[0] : '';

                const convenio = $('#bono_prevision option:selected').text() || 'Sin convenio';

                const fila = `
                    <tr class="text-center">
                        <td class="align-middle">${fecha}</td>
                        <td class="align-middle">
                            <span class="badge badge-success">${monto}</span>
                        </td>
                        <td class="align-middle">
                            <span class="badge badge-${metodo.toLowerCase() === 'efectivo' ? 'primary' : metodo.toLowerCase() === 'tarjeta' ? 'info' : 'secondary'}">
                                ${metodo.charAt(0).toUpperCase() + metodo.slice(1)}
                            </span>
                        </td>
                        <td class="align-middle">${convenio}</td>
                        <td class="align-middle">
                            ${idPago ? `
                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        onclick="eliminar_pago_dental(${idPago})"
                                        title="Eliminar pago">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            ` : ''}
                        </td>
                    </tr>
                `;
                tbody.append(fila);
            });
        } else {
            $('#seccion_pagos_presupuesto').hide();
        }
    }
    /** Mantiene la experiencia visual también cuando los tratamientos se redibujan por AJAX. */
    function mejorarExperienciaPresupuestoDental() {
        const form = document.getElementById('form-presup_dent');
        if (!form) return;

        ['contenedor_piezas_dentales_presupuesto', 'contenedor_todos', 'contenedor_insumos'].forEach(function(id) {
            const contenedor = document.getElementById(id);
            if (!contenedor) return;

            contenedor.querySelectorAll('input[name="prestación"]').forEach(function(input) {
                const textarea = document.createElement('textarea');
                textarea.className = input.className + ' prestacion-dos-lineas';
                textarea.name = input.name;
                textarea.rows = 2;
                textarea.value = input.value;
                textarea.readOnly = true;
                textarea.setAttribute('aria-readonly', 'true');
                textarea.setAttribute('title', input.value);
                input.replaceWith(textarea);
            });

            contenedor.querySelectorAll('input[type="text"]').forEach(function(input) {
                input.readOnly = true;
                input.setAttribute('aria-readonly', 'true');
                input.setAttribute('title', 'Dato informativo del presupuesto');
            });

            contenedor.querySelectorAll('.btn-danger').forEach(function(boton) {
                if (!boton.getAttribute('title')) boton.setAttribute('title', 'Quitar del presupuesto');
                boton.setAttribute('aria-label', 'Quitar prestación del presupuesto');
            });
        });

        const detallePiezasPresupuesto = $('#detalle_pieza_presupuesto').data('detalle') || {};
        const cantidadPiezasVisor = Object.values(detallePiezasPresupuesto).reduce(function(total, pieza) {
            return total + (Array.isArray(pieza.tratamientos) ? pieza.tratamientos.length : 0);
        }, 0);
        const contenedorPiezasAnterior = document.getElementById('contenedor_piezas_dentales_presupuesto');
        const cantidadPiezasAnterior = contenedorPiezasAnterior
            ? contenedorPiezasAnterior.querySelectorAll('.card-informacion').length
            : 0;
        const cantidadGenerales = document.getElementById('contenedor_todos')
            ? document.getElementById('contenedor_todos').querySelectorAll('.card-informacion').length
            : 0;
        const cantidadInsumos = document.getElementById('contenedor_insumos')
            ? document.getElementById('contenedor_insumos').querySelectorAll('.card-informacion').length
            : 0;
        const cantidadItems = Math.max(cantidadPiezasVisor, cantidadPiezasAnterior)
            + cantidadGenerales
            + cantidadInsumos;
        const indicadorCantidad = document.getElementById('cantidad_items_presupuesto');
        const textoCantidad = cantidadItems + (cantidadItems === 1 ? ' prestación' : ' prestaciones');
        if (indicadorCantidad && indicadorCantidad.textContent !== textoCantidad) indicadorCantidad.textContent = textoCantidad;
        const estadoVacio = document.getElementById('presupuesto_clinico_vacio');
        if (estadoVacio) estadoVacio.style.display = cantidadItems === 0 ? '' : 'none';
        form.querySelectorAll('.accion-requiere-presupuesto').forEach(function(boton) {
            boton.disabled = cantidadItems === 0;
        });

        [
            ['valores_total_final_presupuesto', 'valores_abonado_presupuesto', 'saldo_pendiente_presupuesto'],
            ['valores_total_final_presupuesto_conf', 'valores_total_abonado_presupuesto_conf', 'saldo_pendiente_presupuesto_conf']
        ].forEach(function(ids) {
            const total = document.getElementById(ids[0]);
            const abonado = document.getElementById(ids[1]);
            const saldo = document.getElementById(ids[2]);
            if (!total || !abonado || !saldo) return;
            const valorMoneda = function(elemento) {
                return Number((elemento.textContent || '').replace(/[^0-9-]/g, '')) || 0;
            };
            const pendiente = Math.max(0, valorMoneda(total) - valorMoneda(abonado));
            const textoSaldo = '$' + pendiente.toLocaleString('es-CL');
            if (saldo.textContent !== textoSaldo) saldo.textContent = textoSaldo;
        });
    }

    const estiloPrestacionDosLineas = document.createElement('style');
    estiloPrestacionDosLineas.textContent = '.prestacion-dos-lineas{height:50px!important;min-height:50px!important;line-height:1.25!important;resize:none;overflow:hidden;white-space:normal}';
    document.head.appendChild(estiloPrestacionDosLineas);

    document.addEventListener('DOMContentLoaded', function() {
        mejorarExperienciaPresupuestoDental();
        const presupuesto = document.getElementById('form-presup_dent');
        if (presupuesto && window.MutationObserver) {
            new MutationObserver(mejorarExperienciaPresupuestoDental).observe(presupuesto, {
                childList: true,
                subtree: true
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let totalPresupuesto = $('#total_presupuesto_a_pagar').val();

        function actualizarTotal(valor, agregar) {
            let totalAbonado = montoDisponibleReasignar;
            let totalAdeudado = parseInt($('#total_adeudado_presupuesto').val()) || 0;

            totalSeleccionado += agregar ? valor : -valor;
            console.log('Total seleccionado:', totalSeleccionado);
            console.log('Total presupuesto:', totalPresupuesto);
            console.log('Total abonado:', totalAbonado);

            const montoAplicable = Math.min(totalSeleccionado, totalAbonado);
            const diferencia = Math.max(0, totalAbonado - montoAplicable);

            document.getElementById('monto_seleccionado_reasignacion').textContent = formatoMoneda(montoAplicable);
            const estado = document.getElementById('estado_seleccion_reasignacion');
            if (totalSeleccionado <= 0) {
                estado.className = 'text-muted';
                estado.textContent = 'Seleccione al menos una prestación.';
            } else {
                estado.className = 'text-success';
                if (totalSeleccionado < totalAbonado) {
                    estado.className = 'text-warning';
                    estado.textContent = 'Seleccione más piezas o grupos para distribuir todo el remanente. Faltan ' + formatoMoneda(diferencia) + '.';
                } else if (totalSeleccionado > totalAbonado) {
                    estado.textContent = 'El remanente se aplicará parcialmente a la última prestación seleccionada.';
                } else {
                    estado.textContent = 'El remanente quedará completamente distribuido.';
                }
            }
            document.getElementById('btn_confirmar_reasignacion').disabled = totalAbonado <= 0 || totalSeleccionado < totalAbonado;
        }

        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('valor-checkbox') && event.target.getAttribute('data-info') !== 'insumo') {
                const valor = parseInt(event.target.getAttribute('data-valor'));
                actualizarTotal(valor, event.target.checked);
            }
        });
    });

    function aplicar_convenio_tratamiento(id) {
        swal({
            title: "¿Esta seguro que desea aplicar el descuento?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_aplicar_convenio_tratamiento(id);
            }
        });
    }

    function confirmar_aplicar_convenio_tratamiento(id, avisarSaldo = true) {
        let data = {
            id: id,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            monto_abonado: $('#abonos_presup').val(),
            _token: CSRF_TOKEN
        }
        let url = "{{ ROUTE('profesional.aplicar_convenio_tratamiento') }}";
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#mensaje').html('Descuento aplicado').addClass('badge-success');
                $('#tiene_dcto').val(id);
                // Cambiar el botón para que pase a ser "Quitar convenio"
                const boton = document.querySelector(
                    `button[onclick="aplicar_convenio_tratamiento(${id})"]`);
                if (boton) {
                    boton.classList.remove('btn-outline-success');
                    boton.classList.add('btn-danger');
                    boton.innerHTML = '<i class="fas fa-times"></i>';
                    boton.setAttribute('onclick', `quitar_convenio_tratamiento(${id})`);
                }
                let odontograma = resp.odontograma;
                let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_piezas_odontograma.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                    if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }

                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_piezas_odontograma.row.add([
                            odonto.descripcion,
                            odonto.pieza,
                            formatoMoneda(odonto.valor),
                            formatoMoneda(odonto.valor_descuento),
                            formatoMoneda(odonto.valor - odonto.valor_descuento),
                            '<div class="circle ' + clase + '"></div>',
                            estado, // Columna vacía

                        ]).draw(false).node(); // Obtener el nodo de la fila

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }
                });

                sincronizarSelectorPagosPiezas(odontograma);
                sincronizarDetallePresupuestoClinico(odontograma);
                manejarSaldoConvenio(resp, avisarSaldo);

                let insumos = resp.insumos;

                let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                table_insumos_pagos.clear();
                console.log(insumos);
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                    let total = insumo.cantidad * insumo.valor;
                    if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                        if (insumo.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (insumo.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        let rowNode = table_insumos_pagos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca,
                            insumo.observaciones,
                            insumo.cantidad, // Nombre del insumo
                            formatoMoneda(insumo.valor), // Cantidad utilizada
                            formatoMoneda(insumo.valor_descuento), // Unidad de medida
                            formatoMoneda(insumo.nuevo_valor),
                            ' <div class="circle ' + clase + '"></div>',

                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });
                table_insumos_pagos.draw();

                $('#contenedor_piezas_dentales_presupuesto').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-pieza-presupuesto="${odonto.pieza}">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                <label class="floating-label-activo-sm">Pieza</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                <label class="floating-label-activo-sm">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor)}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor_descuento)}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor - odonto.valor_descuento)}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `);
                    }
                });

                $('#contenedor_insumos').empty();
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                        if (insumo.presupuesto == 1 && Number(insumo.urgencia || 0) === 0) {
                        let total = insumo.cantidad * insumo.valor;
                        $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 col-lg-4 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-1 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(insumo.valor_descuento)}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total - insumo.valor_descuento)}">
                                                    </div>
                                                    <div class="form-group col-md-1 col-lg-1 d-flex">

                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                    }

                });

                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let valores_laboratorio = resp.valores[3];
                let descuentos = resp.descuentos;
                let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_laboratorio -
                    descuentos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_descuentos_presupuesto').html(formatoMoneda(resp.descuentos));
                $('#valores_descuentos_presupuesto_conf').html(formatoMoneda(resp.descuentos));
                $('#valores_laboratorio_conf').html(formatoMoneda(resp.total_lab));
                $('#descuento_presup').val(formatoMoneda(resp.descuentos));
                $('#descuento_clinico').val(formatoMoneda(resp.descuentos));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#total_presup').val(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_clinico').val(formatoMoneda(total_general));
                $('#total_presupuesto').val(formatoMoneda(total_general));
                // guardamos el total en un input hidden
                $('#total_presupuesto_dental').val(total_general);
                $('#subtotal_presup').val(formatoMoneda(resp.total_general));
                let todos = resp.todos;

                let table = $('#presup_estado_pago_gral').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                todos.forEach(function(odonto) {

                    if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table.row.add([
                            odonto.localizacion,
                            odonto.diagnostico_tratamiento,
                            formatoMoneda(odonto.valor),
                            formatoMoneda(odonto.valor_descuento),
                            formatoMoneda(odonto.nuevo_valor),
                            ' <div class="circle ' + clase + '"></div>',
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });

                $('#contenedor_todos').empty();
                todos.forEach(t => {
                    if(t.presupuesto == 1){
                         $('#contenedor_todos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2">
                                                            <label class="floating-label-activo-sm">Grupo de piezas</label>
                                                            <input type="text" class="form-control form-control-sm" value="${t.localizacion}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor_descuento)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 fill">
                                                            <label class="floating-label-activo-sm">Total
                                                                prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.nuevo_valor)}">
                                                        </div>
                                                        <div class="form-group col-md-1 col-lg-1 fill">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>`
                                );
                    }
                });
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }

    function quitar_convenio_tratamiento(id) {
        console.log(id);
        let url = "{{ ROUTE('dental.dame_prestaciones_presupuesto') }}";
        let data = {
            id: id,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            monto_abonado: $('#abonos_presup').val(),
            tiene_dcto: $('#tiene_dcto').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#mensaje').html('Descuento retirado').removeClass('badge-success');
                $('#tiene_dcto').val(0);
                // Cambiar el botón para que vuelva a ser "Aplicar convenio"
                const boton = document.querySelector(
                `button[onclick="quitar_convenio_tratamiento(${id})"]`);
                if (boton) {
                    boton.classList.remove('btn-danger');
                    boton.classList.add('btn-outline-success');
                    boton.innerHTML = '<i class="fas fa-check"></i>';
                    boton.setAttribute('onclick', `aplicar_convenio_tratamiento(${id})`);
                }
                let odontograma = resp.odontograma;
                let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_piezas_odontograma.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                    if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }

                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_piezas_odontograma.row.add([
                            odonto.descripcion,
                            odonto.pieza,
                            formatoMoneda((odonto.valor)),
                            0,
                            formatoMoneda((odonto.valor)),
                            '<div class="circle ' + clase + '"></div>',
                            estado, // Columna vacía

                        ]).draw(false).node(); // Obtener el nodo de la fila

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }
                });

                sincronizarSelectorPagosPiezas(odontograma);
                sincronizarDetallePresupuestoClinico(odontograma);
                manejarSaldoConvenio(resp, true);

                $('#contenedor_piezas_dentales_presupuesto').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" data-pieza-presupuesto="${odonto.pieza}">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor)}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(0)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor)}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                    }
                });

                let insumos = resp.insumos;

                let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                table_insumos_pagos.clear();
                console.log(insumos);
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                    let total = insumo.cantidad * insumo.valor;
                    if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
                        if (insumo.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (insumo.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        let rowNode = table_insumos_pagos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca,
                            insumo.observaciones,
                            insumo.cantidad, // Nombre del insumo
                            formatoMoneda(insumo.valor), // Cantidad utilizada
                            0, // Unidad de medida
                            formatoMoneda(total),
                            ' <div class="circle ' + clase + '"></div>',

                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });
                table_insumos_pagos.draw();

                $('#contenedor_insumos').empty();
                agruparInsumosPresupuesto(insumos).forEach(insumo => {
                    if (insumo.presupuesto == 1 && Number(insumo.urgencia || 0) === 0) {
                        let total = insumo.cantidad * insumo.valor;
                        let dcto = insumo.valor - insumo.valor_descuento;
                        $('#contenedor_insumos').append(`
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Insumo</label>
                                                <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                            </div>
                                            <div class="form-group col-md-3 fill">
                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(insumo.valor)}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Total Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                            </div>
                                            <div class="form-group col-md-2 d-flex justify-content-center">

                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    }

                });

                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let valores_laboratorio = resp.valores[3];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_laboratorio;

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#descuento_presup').val('$' + 0);
                $('#valores_descuentos_presupuesto').text('$' + 0);
                $('#valores_descuentos_presupuesto_conf').text('$' + 0);
                $('#valores_laboratorio_conf').text(formatoMoneda(resp.total_lab));
                $('#total_presup').val(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_presupuesto').val(formatoMoneda(total_general));
                $('#descuento_clinico').val(0);
                // guardamos el total en un input hidden
                $('#total_presupuesto_dental').val(total_general);
                $('#subtotal_presup').val(formatoMoneda(total_general));
                let todos = resp.todos;

                let table_todos = $('#presup_estado_pago_gral').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_todos.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                todos.forEach(function(odonto) {

                    if (odonto.presupuesto == 1 && Number(odonto.urgencia || 0) === 0) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_todos.row.add([
                            odonto.localizacion,
                            odonto.diagnostico_tratamiento,
                            formatoMoneda(odonto.valor),
                            0,
                            formatoMoneda(odonto.valor),
                            ' <div class="circle ' + clase + '"></div>',
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });

                $('#contenedor_todos').empty();
                todos.forEach(t => {
                    if(t.presupuesto == 1){
                        $('#contenedor_todos').append(`
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body pb-0">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-2">
                                                                    <label class="floating-label-activo-sm">Grupo de piezas</label>
                                                                    <input type="text" class="form-control form-control-sm" value="${t.localizacion}" readonly>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-9 col-lg-4 fill">
                                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-2 fill">
                                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-1">
                                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-4 col-lg-2 fill">
                                                                    <label class="floating-label-activo-sm">Total
                                                                        prestación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                                </div>
                                                                <div class="form-group col-md-1 col-lg-1 fill">
                                                                    <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>`
                                        );
                    }
                });
                actualizar_presupuesto();
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    /*-Agendar hora medica-*/
    function hora_medica(id_profesional, id_lugar_atencion) {
        $('#modal_reserva_hora_lugar_atencion').val('');
        $('#modal_reserva_dias_atencion').val('');
        $('#modal_reserva_fecha').val('');
        $('#modal_reserva_hora_lista_horas').html('');
        // asigno id profesioanl
        $('#modal_reserva_hora_id_profesional').val(id_profesional);

        // cargo lugares de atencion  y asigno lugar con hora mas proxima
        lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion',
            id_lugar_atencion)

        $('#reservar_hora').modal('show');
    }

    function info_lab(id_lab) {
        let url = "{{ ROUTE('dental.info_laboratorio') }}";
        console.log(id_lab);
        let data = {
            id_lab: id_lab,
            _token: CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#info_lab_nombre').html(resp.laboratorio.nombre);
                $('#info_lab_direccion').html(resp.direccion.direccion+' '+resp.direccion.numero_dir);
                $('#info_lab_telefono').html(resp.laboratorio.telefono);
                $('#info_lab_email').html(resp.laboratorio.email);
                $('#info_lab_modal').modal('show');
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }

    function dame_estados_trabajo(){
        let id_presupuesto = $('#id_presupuesto').val();
        let id_paciente = $('#id_paciente').val();
        let id_profesional = $('#id_profesional').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('dental.dame_estados_trabajo') }}";
        let data = {
            id_presupuesto: id_presupuesto,
            id_paciente: id_paciente,
            id_profesional: id_profesional,
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            _token: CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            beforeSend: function(){
                swal({
                    title: 'Cargando...',
                    text: 'Por favor, espere mientras se procesan los datos.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                swal.close();
                console.log(response);
                if(response.estado == 'ok'){

                    $('#contenedor_ordenes_trabajos_menores_dental_presup').html(response.html);
                    $('#contenedor_ordenes_trabajos_mayores_dental_presup').empty();

                    // Generar HTML adicional para trabajos menores si existen en la respuesta
                    if(response.ordenes_trabajo_menor && response.ordenes_trabajo_menor.length > 0) {
                        // Llenar la tabla de trabajos menores
                        llenarTablaTrabajosMenores(response.ordenes_trabajo_menor);

                        let htmlTrabajosMenores = '';
                        response.ordenes_trabajo_menor.forEach(function(o) {
                            let estadoTexto = o.estado == 1 ? 'Pendiente' : 'Otro';
                            htmlTrabajosMenores += `
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-informacion">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${o.nombre_lab || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${o.trabajo_realizar || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">F.envío</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${o.fecha_envio || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">F.entrega</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${o.fecha_entrega || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Estado</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="${estadoTexto}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">N° Identificación</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${o.nro_orden || ''}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab">${o.observaciones || ''}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        // Usar contenedor diferente para no interferir con la línea original
                        $('#contenedor_ordenes_trabajos_menores_dental').html(htmlTrabajosMenores);
                    }

                    // Generar HTML adicional para trabajos mayores si existen en la respuesta
                    if(response.ordenes_trabajo_mayor && response.ordenes_trabajo_mayor.length > 0) {
                        // Llenar la tabla de trabajos mayores
                        llenarTablaTrabajosMayores(response.ordenes_trabajo_mayor);

                        let htmlTrabajosMayores = '';
                        response.ordenes_trabajo_mayor.forEach(function(o) {
                            let estadoTexto = o.estado == 1 ? 'Pendiente' : 'Otro';
                            htmlTrabajosMayores += `
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-informacion">
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Nombre Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_nom" id="lab_nom" value="${o.nombre_lab || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Trabajo Requerido</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_ord_trab" id="lab_ord_trab" value="${o.trabajo_realizar || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">F.envío</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_fenv" id="lab_fenv" value="${o.fecha_envio || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">F.entrega</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_fent" id="lab_fent" value="${o.fecha_entrega || ''}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">Estado</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_est" id="lab_est" value="${estadoTexto}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                        <label class="floating-label-activo-sm">N° Identificación</label>
                                                        <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab" value="${o.nro_orden || ''}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Observaciones</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab">${o.observaciones || ''}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        // Usar contenedor diferente para no interferir con la línea original
                        $('#contenedor_ordenes_trabajos_mayores_dental').html(htmlTrabajosMayores);
                    }


                    // Reemplazar resumen
                    $('#resumen_costos_lab').replaceWith(response.resumen);
                    let valores_boca_general = response.valores[0];
                    let valores_odontograma = response.valores[1];
                    let valores_insumos = response.valores[2];
                    let valores_lab = response.valores[3];
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_lab;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                    $('#subtotal_clinico').val(formatoMoneda(total_general));
                    $('#total_clinico').val(formatoMoneda(total_general));
                }else{
                    swal({
                        title:'Error',
                        text:response.mensaje,
                        icon:'error'
                    });
                }
            },
            error: function(error) {
                swal.close();
                console.log(error.responseText);
            }
        });
    }

    function llenarTablaTrabajosMenores(ordenes) {
        // Limpiar el tbody de la tabla
        $('#table_trabajos_menores_dental tbody').empty();

        // Si hay órdenes, llenar la tabla
        if(ordenes && ordenes.length > 0) {
            ordenes.forEach(function(orden) {
                let fila = `
                    <tr role="row">
                        <td class="sorting_1">${orden.nro_orden || ''}</td>
                        <td>${orden.clinica_doctor || ''}</td>
                        <td>${orden.guia || ''}</td>
                        <td>${orden.color || ''}</td>
                        <td>${orden.urgencia || ''}</td>
                        <td>${orden.material || ''}</td>
                        <td>${orden.trabajo_realizar || ''}</td>
                        <td>
                            <button type="button" class="btn btn-icon btn-primary" onclick="generar_pdf_trabajo_menor_dental(${orden.id})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_trabajo_menor_dental(${orden.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table_trabajos_menores_dental tbody').append(fila);
            });
        } else {
            // Si no hay órdenes, mostrar fila vacía
            $('#table_trabajos_menores_dental tbody').append(`
                <tr role="row" class="odd">
                    <td class="sorting_1" colspan="8" style="text-align: center;">No hay órdenes de trabajo registradas</td>
                </tr>
            `);
        }
    }

    function verDetalleOrden(id) {
        // Implementar lógica para ver detalle de la orden
        console.log('Ver detalle de orden:', id);
    }

    function editarOrden(id) {
        // Implementar lógica para editar la orden
        console.log('Editar orden:', id);
    }

    function eliminarOrden(id) {
        // Implementar lógica para eliminar la orden
        swal({
            title: "¿Está seguro?",
            text: "¿Desea eliminar esta orden de trabajo?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Aquí iría la lógica AJAX para eliminar
                console.log('Eliminando orden:', id);
            }
        });
    }

    function llenarTablaTrabajosMayores(ordenes) {
        // Limpiar el tbody de la tabla
        $('#table_trabajos_mayores_dental tbody').empty();

        // Si hay órdenes, llenar la tabla
        if(ordenes && ordenes.length > 0) {
            ordenes.forEach(function(orden) {
                let fila = `
                    <tr role="row">
                        <td>${orden.nro_orden || ''}</td>
                        <td>${orden.clinica_doctor || ''}</td>
                        <td>${orden.guia || ''}</td>
                        <td>${orden.color || ''}</td>
                        <td>${orden.urgencia || ''}</td>
                        <td>${orden.material || ''}</td>
                        <td>${orden.trabajo_realizar || ''}</td>
                        <td>
                            <button type="button" class="btn btn-icon btn-primary" onclick="generar_pdf_trabajo_mayor_dental(${orden.id})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_trabajo_mayor_dental(${orden.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table_trabajos_mayores_dental tbody').append(fila);
            });
        } else {
            // Si no hay órdenes, mostrar fila vacía
            $('#table_trabajos_mayores_dental tbody').append(`
                <tr role="row" class="odd">
                    <td colspan="8" style="text-align: center;">No hay órdenes de trabajo mayor registradas</td>
                </tr>
            `);
        }
    }

    function verDetalleOrdenMayor(id) {
        // Implementar lógica para ver detalle de la orden mayor
        console.log('Ver detalle de orden mayor:', id);
    }

    function generarPdfTrabajoMayor(id) {
        // Generar PDF para trabajo mayor
        let url = "{{ route('dental.generar_pdf_trabajo_mayor') }}";
        let data = {
            id_trabajo: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            beforeSend: function(){
                swal({
                    title: 'Generando PDF...',
                    text: 'Por favor, espere mientras se genera el documento.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                swal.close();
                if(response.estado == 'ok') {
                    swal({
                        title: 'PDF Generado',
                        text: 'El documento se ha generado correctamente.',
                        icon: 'success'
                    });
                    // Abrir el PDF en nueva ventana
                    window.open(response.ruta, '_blank');
                } else {
                    swal({
                        title: 'Error',
                        text: response.mensaje || 'Error al generar el PDF',
                        icon: 'error'
                    });
                }
            },
            error: function(error) {
                swal.close();
                console.log(error.responseText);
                swal({
                    title: 'Error',
                    text: 'Error al generar el PDF',
                    icon: 'error'
                });
            }
        });
    }


    /**
     * Genera el PDF del presupuesto dental.
     *
     * El backend ahora usa PdfController en modo "G" y responde JSON:
     * {
     *     estado: 1,
     *     ruta: "http://.../storage/pdf/archivo.pdf"
     * }
     */
    function generar_pdf() {
        const idPaciente = $('#id_paciente_fc').val()
            || $('#id_paciente').val()
            || (typeof dame_id_paciente === 'function' ? dame_id_paciente() : null);

        const idFichaAtencion = $('#id_fc').val();
        const idLugarAtencion = $('#id_lugar_atencion').val();
        const idPresupuesto = $('#id_presupuesto').val();

        if (!idPaciente || !idFichaAtencion || !idLugarAtencion || !idPresupuesto) {
            swal({
                title: 'Datos incompletos',
                text: 'No fue posible identificar el paciente, la ficha, el lugar de atención o el presupuesto.',
                icon: 'warning',
                button: 'Aceptar'
            });
            return;
        }

        // Abrimos la pestaña antes de la petición para evitar que el navegador
        // bloquee window.open() por ejecutarse después de una llamada AJAX.
        const ventanaPdf = window.open('', '_blank');

        if (ventanaPdf) {
            ventanaPdf.document.write(
                '<!doctype html><html><head><title>Generando presupuesto...</title></head>' +
                '<body style="font-family:Arial,sans-serif;text-align:center;padding-top:50px;">' +
                '<p>Generando presupuesto, por favor espere...</p>' +
                '</body></html>'
            );
        }

        $.ajax({
            url: "{{ route('profesional.generar_pdf_presupuesto_dental') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                id_paciente: idPaciente,
                id_ficha_atencion: idFichaAtencion,
                id_lugar_atencion: idLugarAtencion,
                id_presupuesto: idPresupuesto,
                urgencia: 0,
                _token: "{{ csrf_token() }}"
            },
            beforeSend: function () {
                swal({
                    title: 'Generando presupuesto...',
                    text: 'Estamos preparando el PDF y sus códigos QR.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });
            },
            success: function (response) {
                swal.close();

                const estadoCorrecto =
                    response &&
                    (
                        response.estado === 1 ||
                        response.estado === '1' ||
                        response.estado === true ||
                        response.estado === 'ok'
                    );

                if (estadoCorrecto && response.ruta) {
                    if (ventanaPdf && !ventanaPdf.closed) {
                        ventanaPdf.location.href = response.ruta;
                    } else {
                        window.open(response.ruta, '_blank');
                    }
                    return;
                }

                if (ventanaPdf && !ventanaPdf.closed) {
                    ventanaPdf.close();
                }

                swal({
                    title: 'No fue posible generar el presupuesto',
                    text: (response && (response.error || response.mensaje || response.message))
                        ? (response.error || response.mensaje || response.message)
                        : 'El servidor no devolvió una ruta válida para el PDF.',
                    icon: 'error',
                    button: 'Aceptar'
                });
            },
            error: function (xhr) {
                swal.close();

                if (ventanaPdf && !ventanaPdf.closed) {
                    ventanaPdf.close();
                }

                let respuesta = xhr.responseJSON || {};
                let mensaje =
                    respuesta.error ||
                    respuesta.mensaje ||
                    respuesta.message ||
                    'Ha ocurrido un error al generar el reporte.';

                if (respuesta.detalle) {
                    mensaje += '\n\nDetalle: ' + respuesta.detalle;
                }

                console.error('Error al generar presupuesto dental:', {
                    status: xhr.status,
                    responseJSON: xhr.responseJSON,
                    responseText: xhr.responseText
                });

                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        });
    }

    function enviar_presupuesto_dental_por_mail(correoAnterior) {
        const correoPaciente = correoAnterior || @json((string) data_get($paciente ?? null, 'email', ''));
        swal({
            title: 'Enviar presupuesto',
            text: 'Confirme o modifique el correo de destino.',
            icon: 'info',
            content: {
                element: 'input',
                attributes: {
                    type: 'email',
                    value: correoPaciente,
                    placeholder: 'correo@ejemplo.cl',
                    autocomplete: 'email',
                    spellcheck: 'false'
                }
            },
            buttons: ['Cancelar', 'Enviar']
        }).then(function (correoDestino) {
            if (correoDestino === null) return;

            correoDestino = String(correoDestino || '').trim();
            const formatoCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!formatoCorreo.test(correoDestino)) {
                swal('Correo no válido', 'Ingrese una dirección de correo válida.', 'warning')
                    .then(function () { enviar_presupuesto_dental_por_mail(correoDestino); });
                return;
            }

            $.ajax({
                url: "{{ route('profesional.enviar_presupuesto_dental_email') }}",
                type: 'POST',
                data: {
                    id_paciente: $('#id_paciente_fc').val() || $('#id_paciente').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    id_presupuesto: $('#id_presupuesto').val() || null,
                    email: correoDestino,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    swal({
                        title: 'Enviando...',
                        text: 'Estamos generando y adjuntando el presupuesto.',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function (respuesta) {
                    swal('Presupuesto enviado', respuesta.mensaje, 'success');
                },
                error: function (xhr) {
                    const respuesta = xhr.responseJSON || {};
                    const errorEmail = respuesta.errors && respuesta.errors.email
                        ? respuesta.errors.email[0]
                        : null;
                    swal('No fue posible enviar', respuesta.mensaje || errorEmail || respuesta.message || 'Ocurrió un error al enviar el presupuesto.', 'error');
                }
            });
        });
    }

    function editarOrdenMayor(id) {
        // Implementar lógica para editar la orden mayor
        console.log('Editar orden mayor:', id);
    }

    function eliminarOrdenMayor(id) {
        // Implementar lógica para eliminar la orden mayor
        swal({
            title: "¿Está seguro?",
            text: "¿Desea eliminar esta orden de trabajo mayor?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Aquí iría la lógica AJAX para eliminar
                console.log('Eliminando orden mayor:', id);
            }
        });
    }
</script>
