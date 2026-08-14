<style>
    .modal-plan-pieza .modal-content{border:0;border-radius:14px;overflow:hidden;box-shadow:0 18px 48px rgba(22,48,82,.28)}
    .modal-plan-pieza .modal-header{align-items:center;padding:15px 20px;border:0;background:#35aeb8;color:#fff}
    .modal-plan-pieza .modal-header small,.modal-plan-pieza .modal-header h5{color:#fff!important}
    .modal-plan-pieza .modal-header .close{display:flex;align-items:center;justify-content:center;width:38px;height:38px;padding:0;border-radius:50%;background:rgba(7,83,103,.45);color:#fff;opacity:1;text-shadow:none}
    .modal-plan-pieza .modal-body{padding:20px;background:#f7f9fc}
    .modal-plan-pieza-visual{display:flex;align-items:center;gap:16px;margin-bottom:20px;padding:13px 16px;border:1px solid #d7e3ef;border-radius:11px;background:#fff}
    .modal-plan-pieza-image-wrap{display:flex;align-items:center;justify-content:center;width:72px;height:82px;flex:0 0 72px;border-radius:10px;background:#eef6fa}
    .modal-plan-pieza-image{max-width:50px;max-height:68px;object-fit:contain}
    .modal-plan-pieza-visual small{display:block;color:#718096;font-size:.7rem;font-weight:700;text-transform:uppercase}
    .modal-plan-pieza-visual strong{display:block;color:#174ea6;font-size:1.35rem}
    .modal-plan-pieza .form-group{position:relative;margin-bottom:19px}
    .modal-plan-pieza .floating-label-activo-sm{z-index:2;padding:0 5px;background:#f7f9fc;color:#53657a;font-weight:600}
    .modal-plan-pieza .form-control{min-height:44px;border-color:#cbd8e6;border-radius:8px;background:#fff}
    .modal-plan-pieza .modal-footer{padding:12px 18px;border-top:1px solid #e0e7ef;background:#fff}
    .modal-plan-pieza .modal-footer .btn{min-height:40px;border-radius:8px;font-weight:600}
</style>
<script>
    window.actualizarVisualModalPlanPieza = function (modalId, pieza, pediatrica) {
        const modal = document.querySelector(modalId);
        pieza = String(pieza || '').trim();
        if (!modal || !pieza) return;
        const base = pediatrica ? @json(asset('images/dental/odontopediatria/diente-sano')) + '/diente-sano' : @json(asset('images/dental/dientes')) + '/d';
        const imagen = modal.querySelector('.modal-plan-pieza-image');
        const titulo = modal.querySelector('.modal-plan-pieza-visual strong');
        const piezaEscapada = window.CSS && CSS.escape ? CSS.escape(pieza) : pieza.replace(/"/g, '\\"');
        const imagenClinica = document.querySelector('.is-selected[data-selector-pieza="' + piezaEscapada + '"] img, .is-selected[data-pieza-pediatrica="' + piezaEscapada + '"] img')
            || document.querySelector('[data-selector-pieza="' + piezaEscapada + '"] img[data-estado-clinico], [data-pieza-pediatrica="' + piezaEscapada + '"] img[data-estado-clinico]')
            || document.querySelector('[data-selector-pieza="' + piezaEscapada + '"] img, [data-pieza-pediatrica="' + piezaEscapada + '"] img');
        if (imagen) {
            // El selector ya conoce el estado clínico (caries, endodoncia,
            // implante, ausente, etc.); reutilizar su imagen mantiene el modal
            // sincronizado con el odontograma.
            imagen.src = imagenClinica && imagenClinica.src
                ? imagenClinica.src
                : base + pieza.replace('.', '') + '.png';
            imagen.alt = 'Pieza dental ' + pieza;
            imagen.dataset.estadoClinico = imagenClinica
                ? (imagenClinica.dataset.estadoClinico || 'normal')
                : 'normal';
        }
        if (titulo) titulo.textContent = 'Pieza ' + pieza;
    };
</script>
