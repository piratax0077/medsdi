<style>
    .dental-progress-wheel{--progress:0;position:relative;width:58px;height:58px;flex:0 0 58px;border-radius:50%;background:conic-gradient(#20b7c5 0 calc(var(--progress) * 1%),#e4ebf3 calc(var(--progress) * 1%) 100%);box-shadow:0 2px 7px rgba(31,67,111,.18);transition:background .25s ease,transform .2s ease}
    .dental-progress-wheel::before{content:'';position:absolute;inset:7px;border-radius:50%;background:#fff;box-shadow:inset 0 0 0 1px #dbe5f1}
    .dental-progress-wheel::after{content:'';position:absolute;inset:0;border-radius:50%;pointer-events:none;background:linear-gradient(90deg,transparent calc(50% - 1px),#fff calc(50% - 1px),#fff calc(50% + 1px),transparent calc(50% + 1px)),linear-gradient(0deg,transparent calc(50% - 1px),#fff calc(50% - 1px),#fff calc(50% + 1px),transparent calc(50% + 1px));-webkit-mask:radial-gradient(circle,transparent 0 29%,#000 31% 100%);mask:radial-gradient(circle,transparent 0 29%,#000 31% 100%)}
    .dental-progress-wheel:hover{transform:scale(1.06)}
    .dental-progress-wheel-value{position:absolute;inset:0;z-index:2;display:flex;align-items:center;justify-content:center;color:#2455a4;font-size:.76rem;font-weight:700;pointer-events:none}
    .dental-progress-wheel .dental-piece-progress{position:absolute;inset:0;z-index:3;width:100%;height:100%;border:0;border-radius:50%;opacity:0;cursor:pointer}
    .dental-progress-wheel:focus-within{outline:3px solid rgba(32,183,197,.28);outline-offset:3px}
    .dental-progress-wheel .dental-piece-progress:disabled{cursor:wait}
    .dental-progress-wheel.is-readonly{width:52px;height:52px;flex-basis:52px;margin:auto;pointer-events:none;box-shadow:0 1px 5px rgba(31,67,111,.14)}
</style>
<script>
    window.crearProgresoCircularDental = window.crearProgresoCircularDental || function (progreso, funcionCambio) {
        progreso = [0, 25, 50, 75, 100].includes(Number(progreso)) ? Number(progreso) : 0;
        const opciones = [0, 25, 50, 75, 100].map(function (valor) {
            return '<option value="' + valor + '" ' + (valor === progreso ? 'selected' : '') + '>' + valor + '%</option>';
        }).join('');
        return '<div class="dental-progress-wheel" style="--progress:' + progreso + '" title="Progreso del tratamiento: ' + progreso + '%">' +
            '<span class="dental-progress-wheel-value">' + progreso + '%</span>' +
            '<select class="dental-piece-progress" aria-label="Progreso del tratamiento" data-original-progress="' + progreso + '" onchange="' + funcionCambio + '">' + opciones + '</select></div>';
    };
    window.actualizarVisualProgresoDental = window.actualizarVisualProgresoDental || function (select, progreso) {
        $(select).closest('.dental-progress-wheel').css('--progress', progreso)
            .attr('title', 'Progreso del tratamiento: ' + progreso + '%')
            .find('.dental-progress-wheel-value').text(progreso + '%');
    };
    window.crearProgresoCircularDentalLectura = window.crearProgresoCircularDentalLectura || function (progreso) {
        progreso = [0, 25, 50, 75, 100].includes(Number(progreso)) ? Number(progreso) : 0;
        return '<div class="dental-progress-wheel is-readonly" style="--progress:' + progreso + '" title="Progreso del tratamiento: ' + progreso + '%" role="img" aria-label="Progreso del tratamiento: ' + progreso + '%">' +
            '<span class="dental-progress-wheel-value">' + progreso + '%</span></div>';
    };
</script>
