@php
    $twoFactorSwitchId = $switchId ?? 'mobile-two-factor';
    $twoFactorUpdateUrl = $updateUrl ?? '#';
    $twoFactorEnabled = (bool) ($enabled ?? false);
    $twoFactorRole = $role ?? 'usuario';
@endphp

<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex">
    <div class="card flex-fill border-0 shadow-sm">
        <div class="card-header bg-primary d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="feather icon-shield mr-2 text-white" style="font-size: 20px;"></i>
                <h5 class="mb-0 text-white">Aumenta la seguridad de tu cuenta</h5>
            </div>
            <span class="badge badge-light text-primary">Recomendado</span>
        </div>

        <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="pr-3">
                    <h6 class="font-weight-bolder mb-1">Aprobación desde la aplicación móvil</h6>
                    <p class="text-muted mb-0">
                        Cada nuevo acceso a MED-SDI desde la web deberá ser aprobado desde el teléfono vinculado a tu cuenta.
                    </p>
                </div>

                <div class="custom-control custom-switch flex-shrink-0 mt-1">
                    <input
                        type="checkbox"
                        class="custom-control-input"
                        id="{{ $twoFactorSwitchId }}"
                        {{ $twoFactorEnabled ? 'checked' : '' }}
                    >
                    <label class="custom-control-label" for="{{ $twoFactorSwitchId }}"></label>
                </div>
            </div>

            <div class="alert alert-warning py-2 px-3 mb-3">
                <div class="d-flex align-items-start">
                    <i class="feather icon-alert-triangle mr-2 mt-1"></i>
                    <div>
                        <strong>Antes de activarla</strong>
                        <div class="small">
                            Primero debes iniciar sesión en la aplicación móvil MED-SDI con esta misma cuenta. Esto permitirá registrar el token y vincular tu teléfono con tu usuario.
                        </div>
                    </div>
                </div>
            </div>

            <h6 class="font-weight-bolder mb-3">Cómo activar la protección</h6>

            <div class="d-flex mb-3">
                <div class="badge badge-primary rounded-circle d-flex align-items-center justify-content-center mr-3 flex-shrink-0"
                    style="width: 28px; height: 28px;">1</div>
                <div>
                    <div class="font-weight-bolder">Inicia sesión en la app</div>
                    <small class="text-muted">Abre MED-SDI en tu teléfono e ingresa con la misma cuenta que utilizas en la web.</small>
                </div>
            </div>

            <div class="d-flex mb-3">
                <div class="badge badge-primary rounded-circle d-flex align-items-center justify-content-center mr-3 flex-shrink-0"
                    style="width: 28px; height: 28px;">2</div>
                <div>
                    <div class="font-weight-bolder">Vincula el teléfono</div>
                    <small class="text-muted">Al iniciar sesión, la aplicación registrará de forma segura el dispositivo y su token de notificaciones.</small>
                </div>
            </div>

            <div class="d-flex mb-3">
                <div class="badge badge-primary rounded-circle d-flex align-items-center justify-content-center mr-3 flex-shrink-0"
                    style="width: 28px; height: 28px;">3</div>
                <div>
                    <div class="font-weight-bolder">Activa el interruptor</div>
                    <small class="text-muted">Después de vincular el teléfono, activa esta opción para proteger los siguientes accesos web.</small>
                </div>
            </div>

            <div class="d-flex">
                <div class="badge badge-success rounded-circle d-flex align-items-center justify-content-center mr-3 flex-shrink-0"
                    style="width: 28px; height: 28px;">
                    <i class="feather icon-check" style="font-size: 13px;"></i>
                </div>
                <div>
                    <div class="font-weight-bolder">Protección lista</div>
                    <small class="text-muted">En los próximos ingresos podrás aprobar o rechazar el acceso desde tu teléfono.</small>
                </div>
            </div>

            <div class="alert alert-info py-2 px-3 mt-3 mb-0">
                <small>
                    <i class="feather icon-info mr-1"></i>
                    Mantén instalada la aplicación MED-SDI y sus notificaciones activadas.
                </small>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selector = '#' + @json($twoFactorSwitchId);
        const control = document.getElementById(@json($twoFactorSwitchId));

        if (!control || control.dataset.twoFactorInitialized === '1') {
            return;
        }

        control.dataset.twoFactorInitialized = '1';

        $(selector).on('change', function () {
            const requestedState = control.checked;
            control.disabled = true;

            $.ajax({
                url: @json($twoFactorUpdateUrl),
                method: 'POST',
                data: {
                    _token: @json(csrf_token()),
                    enabled: requestedState ? 1 : 0
                }
            }).done(function () {
                swal(
                    requestedState ? 'Protección activada' : 'Protección desactivada',
                    requestedState
                        ? 'Tu cuenta ahora solicitará aprobación desde el teléfono vinculado al iniciar sesión en la web.'
                        : 'La aprobación desde el teléfono quedó desactivada.',
                    'success'
                );
            }).fail(function (xhr) {
                control.checked = !requestedState;

                const message = xhr.responseJSON && xhr.responseJSON.message
                    ? xhr.responseJSON.message
                    : 'No fue posible guardar la configuración. Inténtalo nuevamente.';

                swal(
                    requestedState
                        ? 'No se pudo activar la protección'
                        : 'No se pudo desactivar la protección',
                    message,
                    'error'
                );
            }).always(function () {
                control.disabled = false;
            });
        });
    });
</script>
