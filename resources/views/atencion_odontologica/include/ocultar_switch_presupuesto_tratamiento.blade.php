@once
    <style>
        .columna-switch-presupuesto-oculta {
            display: none !important;
        }
    </style>
    <script>
        (function () {
            function ocultarColumnasSwitchPresupuesto() {
                document.querySelectorAll('table').forEach(function (tabla) {
                    const encabezados = Array.from(tabla.querySelectorAll('thead th'));
                    encabezados.forEach(function (encabezado, indice) {
                        if (encabezado.textContent.trim().toLowerCase() !== 'presupuesto') return;

                        const selectorColumna = 'tbody tr td:nth-child(' + (indice + 1) + ')';
                        const celdas = Array.from(tabla.querySelectorAll(selectorColumna));
                        const contieneSwitch = celdas.some(function (celda) {
                            return celda.querySelector(
                                'input[id^="presupuestoCheck"], input[onchange*="togglePresupuesto"]'
                            );
                        });
                        if (!contieneSwitch) return;

                        encabezado.classList.add('columna-switch-presupuesto-oculta');
                        celdas.forEach(function (celda) {
                            celda.classList.add('columna-switch-presupuesto-oculta');
                        });
                    });
                });
            }

            window.ocultarColumnasSwitchPresupuesto = ocultarColumnasSwitchPresupuesto;
            document.addEventListener('DOMContentLoaded', ocultarColumnasSwitchPresupuesto);
            document.addEventListener('draw.dt', ocultarColumnasSwitchPresupuesto);

            const iniciarObservador = function () {
                if (!document.body || document.body.dataset.observadorSwitchPresupuesto === '1') return;
                document.body.dataset.observadorSwitchPresupuesto = '1';
                let pendiente = false;
                new MutationObserver(function () {
                    if (pendiente) return;
                    pendiente = true;
                    requestAnimationFrame(function () {
                        pendiente = false;
                        ocultarColumnasSwitchPresupuesto();
                    });
                }).observe(document.body, { childList: true, subtree: true });
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', iniciarObservador);
            } else {
                iniciarObservador();
                ocultarColumnasSwitchPresupuesto();
            }
        })();
    </script>
@endonce
