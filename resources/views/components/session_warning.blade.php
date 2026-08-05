@if(session('warning'))
    <div id="sdi-toast-warning" class="sdi-toast" role="alert" aria-live="assertive">
        <div class="sdi-toast-icono">
            <i class="feather icon-alert-triangle"></i>
        </div>
        <div class="sdi-toast-cuerpo">
            <strong class="sdi-toast-titulo">Advertencia</strong>
            <p class="sdi-toast-texto">{{ session('warning') }}</p>
        </div>
        <button type="button" class="sdi-toast-cerrar" onclick="sdiCerrarToastWarning();" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="sdi-toast-progreso"></div>
    </div>

    <script>
        function sdiCerrarToastWarning() {
            var toast = document.getElementById('sdi-toast-warning');
            if (!toast) return;
            toast.classList.add('sdi-toast-salir');
            setTimeout(function () {
                if (toast && toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 350);
        }

        setTimeout(function () {
            sdiCerrarToastWarning();
        }, 45000);
    </script>
@endif
