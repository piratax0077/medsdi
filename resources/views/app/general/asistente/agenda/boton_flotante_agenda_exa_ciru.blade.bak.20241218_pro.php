
<!-- BOTÓN FLOTANTE AGENDA (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div class="bs-offset-main bs-canvas-anim">

    {{-- @case(1) --}}
    <button class="btn btn-tipo-agenda btn-agenda-cons btn-agenda-1 shadow-sm" style="display:none; bottom: 63%;" type="button" onclick="cargarAgendaProfesional(1, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Consulta</button>
    {{-- @case(2) --}}
    {{--  --}}
    {{-- @case(3) --}}
    {{-- <button class="btn btn-tipo-agenda btn-agenda-tel btn-agenda-3 shadow-sm" style="display:none; bottom: 37%;" type="button" onclick="cargarAgendaProfesional(3, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> <br>Agenda <br> Telemedicina</button> --}}
    <button class="btn btn-tipo-agenda btn-agenda-tel btn-agenda-3 shadow-sm" style="display:none; bottom: 50%;" type="button" onclick="cargarAgendaProfesional(3, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Telemedicina</button>
    {{-- @case(4) --}}
    <button class="btn btn-tipo-agenda btn-agenda-exa btn-agenda-4 shadow-sm" style="display:none; bottom: 37%;" type="button" onclick="cargarAgendaProfesional(4, '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Examenes</button>

    <input type="hidden" name="id_tipo_agenda" id="id_tipo_agenda" value="1">
</div>

<!-- SCRIPT -->
@section('btn-script-agenda')
    <script type="text/javascript">

        function getInactiveDays(startDate, endDate, activeDays)
        {
            const diffInDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

            for (let i = 0; i <= diffInDays; i++)
            {
                const day = new Date(startDate.getTime() + i * 1000 * 60 * 60 * 24);
                if (!activeDays[day.getDay()]) {
                    activeDaysInRange.push(day);
                }
            }

            return activeDaysInRange;
        }

    </script>
@endsection
