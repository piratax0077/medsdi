@once
<style>
    .modal-grupo-dental .modal-content { border:0; border-radius:15px; overflow:hidden; box-shadow:0 22px 55px rgba(18,42,70,.28); }
    .modal-grupo-dental .modal-header { align-items:center; padding:15px 20px; border:0; background:linear-gradient(135deg,#22aeb7 0%,#36bcc2 100%)!important; }
    .modal-grupo-dental .modal-title { margin:0; color:#fff; font-size:1.15rem; font-weight:700; }
    .modal-grupo-dental .modal-header .close { display:flex; align-items:center; justify-content:center; width:42px; height:42px; margin:-5px -5px -5px auto; padding:0; border-radius:50%; background:rgba(8,79,98,.48); color:#fff; text-shadow:none; opacity:1; }
    .modal-grupo-dental .modal-body { padding:18px 20px 12px; background:#f7f9fc; }
    .modal-grupo-dental .grupo-dental-formulario { padding:16px; border:1px solid #dce5ef; border-radius:12px; background:#fff; }
    .modal-grupo-dental .grupo-dental-ayuda { display:flex; align-items:flex-start; gap:8px; margin-bottom:14px; padding:9px 11px; border-radius:8px; background:#eaf6f8; color:#17636d; font-size:.8rem; }
    .modal-grupo-dental .grupo-dental-imagen { display:flex; align-items:center; justify-content:center; min-height:220px; padding:12px; border:1px solid #e2e9f1; border-radius:12px; background:#fff; }
    .modal-grupo-dental .grupo-dental-imagen img { max-height:210px; object-fit:contain; }
    .modal-grupo-dental .form-group { margin-bottom:.8rem; }
    .modal-grupo-dental .form-control { min-height:42px; border-color:#cbd7e5; border-radius:8px; background:#fff; }
    .modal-grupo-dental textarea.form-control { min-height:72px; }
    .modal-grupo-dental .grupo-dental-guardar { min-height:44px; border:0; border-radius:9px; background:#2fb47c; font-weight:700; box-shadow:0 4px 10px rgba(47,180,124,.2); }
    .modal-grupo-dental .grupo-dental-guardar:hover { background:#269b69; transform:translateY(-1px); }
    .modal-grupo-dental .grupo-dental-listado-titulo { display:flex; align-items:center; justify-content:space-between; margin:18px 0 8px; color:#24415f; }
    .modal-grupo-dental .table-responsive { border:1px solid #dce5ef; border-radius:10px; background:#fff; }
    .modal-grupo-dental .table { margin:0; }
    .modal-grupo-dental .table thead th { padding:.7rem .55rem; border-color:#dce5ef; background:#edf2f7; color:#40566f; font-size:.72rem; letter-spacing:.02em; text-transform:uppercase; white-space:nowrap; }
    .modal-grupo-dental .table tbody td { padding:.65rem .5rem; border-color:#edf1f5; font-size:.78rem; vertical-align:middle; }
    .modal-grupo-dental .modal-footer { padding:11px 20px; border-top:1px solid #dce5ef; background:#fff; }
    .modal-grupo-dental .modal-footer .btn { min-width:110px; border-radius:8px; }
    .modal-grupo-dental .accion-presupuesto-grupo { display:inline-flex; align-items:center; justify-content:center; width:38px; height:38px; padding:0; border-radius:50%; }
    @media (max-width:767.98px) {
        .modal-grupo-dental .modal-dialog { margin:.5rem; }
        .modal-grupo-dental .modal-body { padding:12px; }
        .modal-grupo-dental .grupo-dental-imagen { min-height:130px; margin-top:10px; }
        .modal-grupo-dental .grupo-dental-imagen img { max-height:120px; }
    }
</style>
<script>
    function normalizarLocalizacionGrupoDental(valor) {
        return String(valor || '').trim().toLowerCase().replace(/_/g, ' ');
    }

    window.piezasDeGrupoDental = function (localizacion) {
        const lugar = normalizarLocalizacionGrupoDental(localizacion);
        let cuadrantes = [];
        if (lugar.includes('boca completa')) cuadrantes = [1, 2, 3, 4, 5, 6, 7, 8];
        else if (lugar.includes('maxilar superior')) cuadrantes = [1, 2, 5, 6];
        else if (lugar.includes('maxilar inferior')) cuadrantes = [3, 4, 7, 8];
        const piezas = [];
        cuadrantes.forEach(function (cuadrante) {
            for (let posicion = 1; posicion <= 8; posicion++) piezas.push(cuadrante + '.' + posicion);
        });
        return piezas;
    };

    window.sincronizarGruposPresupuestoDental = function (grupos, presupuesto) {
        const lista = Array.isArray(grupos) ? grupos : Object.values(grupos || {});
        const idPresupuesto = Number((presupuesto && presupuesto.id) || $('#id_presupuesto').val() || 0);
        const piezasGrupo = new Set();
        lista.filter(function (grupo) {
            return Number(grupo.presupuesto) === 1
                && (!idPresupuesto || !grupo.id_presupuesto || Number(grupo.id_presupuesto) === idPresupuesto);
        }).forEach(function (grupo) {
            window.piezasDeGrupoDental(grupo.localizacion || grupo.lugar || grupo.pieza).forEach(function (pieza) { piezasGrupo.add(String(pieza)); });
        });
        window.piezasGruposPresupuestoDental = Array.from(piezasGrupo);
        $('[data-selector-pieza]').each(function () {
            const $pieza = $(this), pertenece = piezasGrupo.has(String($pieza.data('selector-pieza')));
            $pieza.toggleClass('is-in-budget-group', pertenece);
            if (pertenece) $pieza.addClass('is-in-budget');
            else if (!$pieza.hasClass('is-in-budget-individual')) $pieza.removeClass('is-in-budget');
        });
        $('#odontograma_plan_od_general .pieza').each(function () {
            const $pieza = $(this);
            const numero = String($pieza.data('pieza') || $pieza.attr('data-numero') || $pieza.find('[data-pieza]').data('pieza') || '');
            const pertenece = piezasGrupo.has(numero);
            $pieza.toggleClass('presupuestada-por-grupo', pertenece);
            if (pertenece) $pieza.addClass('seleccionada');
            else if (!$pieza.hasClass('presupuestada-individual')) $pieza.removeClass('seleccionada');
        });
        if (typeof window.sincronizarOdontogramaPresupuesto === 'function') window.sincronizarOdontogramaPresupuesto(window.odontograma_global || []);
        $(document).trigger('dental:grupos-presupuesto-actualizados', [lista, Array.from(piezasGrupo)]);
    };

    window.mejorarAccionesPresupuestoGrupoDental = function (raiz) {
        const $raiz = raiz ? $(raiz) : $(document);
        $raiz.find('button[onclick*="sacar_de_presupuesto"]').each(function () {
            $(this).addClass('accion-presupuesto-grupo btn-outline-danger').removeClass('btn-danger')
                .attr({'title':'Sacar del presupuesto','aria-label':'Sacar del presupuesto'})
                .html('<i class="feather icon-minus-circle"></i><span class="sr-only">Sacar del presupuesto</span>');
        });
        $raiz.find('button[onclick*="cargar_a_presupuesto"]').each(function () {
            $(this).addClass('accion-presupuesto-grupo btn-outline-success')
                .attr({'title':'Agregar al presupuesto','aria-label':'Agregar al presupuesto'})
                .html('<i class="feather icon-shopping-cart"></i><span class="sr-only">Agregar al presupuesto</span>');
        });
    };

    $(function () {
        $('[id^="tratamiento_maxilar_"], [id^="tratamiento_boca_completa"]').addClass('modal-grupo-dental');
        $('.modal-grupo-dental .btn-success.btn-block').addClass('grupo-dental-guardar');
        window.mejorarAccionesPresupuestoGrupoDental(document);
        if (typeof window.grupos_odontograma_global !== 'undefined') {
            window.sincronizarGruposPresupuestoDental(window.grupos_odontograma_global || []);
        }
    });

    $(document).on('shown.bs.modal draw.dt', function (evento) {
        window.mejorarAccionesPresupuestoGrupoDental(evento.target || document);
    });

    $(document).ajaxSuccess(function (_evento, _xhr, opciones, respuesta) {
        const datosCrudos = opciones && opciones.data;
        const datos = typeof datosCrudos === 'string' ? datosCrudos : $.param(datosCrudos || {});
        if (!/(^|&)tipo=gral(&|$)/.test(datos) || !respuesta || Number(respuesta.status) !== 1) return;
        if (respuesta.todos) window.sincronizarGruposPresupuestoDental(respuesta.todos, respuesta.presupuesto);
        window.mejorarAccionesPresupuestoGrupoDental(document);
    });

    window.notificarGrupoDentalGuardado = function (respuesta, localizacion) {
        // La respuesta del guardado ya actualiza el listado del modal. Evitamos
        // lanzar dos consultas paralelas que pueden pintar datos antiguos al final.
        if (typeof window.actualizar_presupuesto === 'function') window.actualizar_presupuesto();
        if (typeof window.refrescar_resaltado_presupuesto_plan_general === 'function') window.refrescar_resaltado_presupuesto_plan_general();
        if (respuesta && respuesta.todos) window.sincronizarGruposPresupuestoDental(respuesta.todos, respuesta.presupuesto);
        $(document).trigger('dental:grupo-guardado', [respuesta, localizacion]);
    };
</script>
@endonce
