<script>
    window.GUARDAR_PACIENTE_URL = @json(route('asistente.paciente.modificar'));
    window.GUARDAR_CONTACTO_EMERGENCIA_URL = @json(route('profesional.paciente.contacto.sidebar.crear'));
    window.BUSCAR_CIUDADES_REGION_URL = @json(route('profesional.buscar_ciudad_region'));
    window.BUSCAR_RUT_CONTACTO_URL = @json(route('paciente.buscar_rut_paciente'));
    window.BUSCAR_CIUDADES_CONTACTO_URL = @json(route('profesional.buscar_ciudad_region'));
</script>
<script src="{{ asset('js/guardarInformacionPaciente.js') }}?v={{ file_exists(public_path('js/guardarInformacionPaciente.js')) ? filemtime(public_path('js/guardarInformacionPaciente.js')) : time() }}"></script>
