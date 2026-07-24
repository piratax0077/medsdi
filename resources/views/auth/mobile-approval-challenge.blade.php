<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}" aria-label="Ir al inicio de MedSDI">
                <img
                    src="{{ asset('images/logo_pais_vertical.png') }}"
                    alt="MedSDI - Salud Digital Integrada"
                    class="h-32 w-auto"
                    style="max-width: 180px;"
                >
            </a>
        </x-slot>
        <div class="text-center">
            <h2 class="text-xl font-semibold text-gray-800">Aprueba este acceso desde tu teléfono</h2>
            <p class="mt-3 text-sm text-gray-600">Abre MED-SDI y revisa “Desafíos de acceso”. Esta solicitud vence en 5 minutos.</p>
            <p id="mobile-2fa-status" class="mt-4 text-sm font-medium text-blue-600">Esperando aprobación…</p>
        </div>
        <script>
            (function poll() {
                fetch(@json(route('mobile-2fa.check')), {headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': @json(csrf_token())}})
                    .then(function (response) { return response.json(); })
                    .then(function (data) {
                        if (data.status === 'approved') return window.location.assign(data.redirect);
                        if (data.status === 'rejected' || data.status === 'expired') {
                            document.getElementById('mobile-2fa-status').textContent = data.status === 'rejected' ? 'Acceso rechazado.' : 'La solicitud expiró.';
                            return;
                        }
                        setTimeout(poll, 2000);
                    }).catch(function () { setTimeout(poll, 3000); });
            })();
        </script>
    </x-jet-authentication-card>
</x-guest-layout>
