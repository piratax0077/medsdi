<div class="tab-pane fade show" id="ns" role="tabpanel" aria-labelledby="ns-tab">
    <div class="row">
        <div class="col-sm-12 col-md-12 ">
         <div class="card">
               <div class="card-body pt-3 pb-2">
                    <h5  class="text-c-blue">Control de Niño Sano</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="card">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @if ($cns_tipo)
                        @foreach ($cns_tipo as $cns_t)
                            @if ($loop->first)
                                <button class="btn nav-link-pill active" id="{{ $cns_t->CnsTipoTemplate->alias }}-tab" data-toggle="pill" data-target="#{{ $cns_t->CnsTipoTemplate->alias }}" type="button" role="tab" aria-controls="{{ $cns_t->CnsTipoTemplate->alias }}" aria-selected="true">{{ $cns_t->nombre }}</button>
                            @else
                                <button class="btn nav-link-pill" id="{{ $cns_t->CnsTipoTemplate->alias }}-tab" data-toggle="pill" data-target="#{{ $cns_t->CnsTipoTemplate->alias }}" type="button" role="tab" aria-controls="{{ $cns_t->CnsTipoTemplate->alias }}" aria-selected="false">{{ $cns_t->nombre }}</button>
                            @endif
                        @endforeach
                    @endif
                    {{-- <button class="btn nav-link-pill active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Embarazo parto y puerperio</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nsdos-tab" data-toggle="pill" data-target="#nsdos" type="button" role="tab" aria-controls="nsdos" aria-selected="false">0 a 7 días</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nstres-tab" data-toggle="pill" data-target="#nstres" type="button" role="tab" aria-controls="nstres" aria-selected="false">1 mes</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nscuatro-tab" data-toggle="pill" data-target="#nscuatro" type="button" role="tab" aria-controls="nscuatro" aria-selected="false">2 a 5 meses</button> --}}
                    {{-- <button class="btn nav-link-pill" id="v-pinscinco" data-toggle="pill" data-target="#nscinco" type="button" role="tab" aria-controls="nscinco" aria-selected="false">6 a 11 meses</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nsseis-tab" data-toggle="pill" data-target="#nsseis" type="button" role="tab" aria-controls="nsseis" aria-selected="false">12 a 23 meses</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nssiete-tab" data-toggle="pill" data-target="#nssiete" type="button" role="tab" aria-controls="nssiete" aria-selected="false">2 a 4 años</button> --}}
                    {{-- <button class="btn nav-link-pill" id="nsocho-tab" data-toggle="pill" data-target="#nsocho" type="button" role="tab" aria-controls="nsocho" aria-selected="false">6 a 9 años</button> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">

                        @if ($cns_tipo_template)
                            @foreach ($cns_tipo_template as $cns_temp)
                                @if ($loop->first)
                                    <div class="tab-pane fade show active" id="{{ $cns_temp->alias }}" role="tabpanel" aria-labelledby="{{ $cns_temp->alias }}-tab">
                                @else
                                    <div class="tab-pane fade show " id="{{ $cns_temp->alias }}" role="tabpanel" aria-labelledby="{{ $cns_temp->alias }}-tab">
                                @endif
                                        <input type="hidden" name="{{ $cns_temp->alias }}_id_cns_tipo" id="{{ $cns_temp->alias }}_id_cns_tipo" value="{{ $cns_temp->CnsTipo->id }}">
                                        <input type="hidden" name="{{ $cns_temp->alias }}_id_cns_template" id="{{ $cns_temp->alias }}_id_cns_template" value="{{ $cns_temp->id }}">
                                        <input type="hidden" name="{{ $cns_temp->alias }}_nombre" id="{{ $cns_temp->alias }}_nombre" value="{{ $cns_temp->CnsTipo->nombre }}">
                                        {!! $cns_temp->cuerpo !!}
                                        <div class="row">
                                            <div class="col-sm-6 text-center">

                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <button type="button" id="{{ $cns_temp->alias }}_btn_limpiar" class="btn btn-sm btn-secondary mr-2" onclick="limpiar_etapa_cns('{{ $cns_temp->alias }}')"><i class=" feather icon-x"></i> Limpiar</button>
                                                <button type="button" id="{{ $cns_temp->alias }}_btn_guardar" class="btn btn-sm btn-info" onclick="registrar_etapa_cns('{{ $cns_temp->alias }}')"><i class=" feather icon-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ TABLA RESUMEN: REGISTROS CNS DEL PACIENTE ============ --}}
    <div class="row mt-3" id="cns_registros" style="display: none;">
        <div class="col-sm-12 col-md-10 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="text-primary mb-0">Registros guardados del paciente</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered" id="tabla_cns_registros">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Control / Etapa</th>
                                    <th>Fecha registro</th>
                                    <th>Campos con datos</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_cns_registros">
                                <tr id="cns_registros_vacio">
                                    <td colspan="4" class="text-center text-muted">Sin registros para este paciente.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('general.secciones_ficha.pediatria.modals.modal_prev_accidentes')
@include('general.secciones_ficha.pediatria.modals.imc_5_19_val_ref')



<script>

    $(document).ready(function () {
        cargarCns();
    });

    function cimc()
    {
        var peso = $('#pesoIMC_59').val();
        var altura = $('#alturaIMC_59').val();
        var valido = 1;
        var mensaje = '';
        if(peso == 0 || peso == '')
        {
            mensaje += 'Campo Peso Requerido\n';
            valido = 0;
        }
        if(altura == 0 || altura == '')
        {
            mensaje += 'Campo Altura Requerido\n';
            valido = 0;
        }

        if(valido == 1)
        {
            var alturaMetro = altura/100;
            var imc = Math.round(peso / (alturaMetro + alturaMetro));
            var leyenda = '';

            if (imc <= 21)
            {
                leyenda = "Está delgado. Debe engordar " + Math.round(alturaMetro * alturaMetro * 20.5 - peso) + " kilos";
            }
            else if(imc >= 26)
            {
                leyenda = "Tiene sobrepeso. Debe adelgazar " + Math.round(peso - alturaMetro * alturaMetro * 25.5) + " kilos";
            }
            else
            {
                leyenda = "Esta en  peso ideal";
            }
            //var hr = document.createElement('hr');
            //var spanIMC = document.createElement('span');
            //spanIMC.textContent = `IMC: ${imc} - ${leyenda}`;
            //var divResultado = document.querySelector('#resultado');
            //divResultado.appendChild(hr);
            //divResultado.appendChild(spanIMC);
            $('#resultadoIMC_59').val(imc);
        }
        else
        {
            swal({
                title: "Calculo de IMC",
                text: mensaje,
                icon: "warning",
            });
        }

    }

    function limpiar_etapa_cns(seccion)
    {
        $('#'+seccion).find('input, textarea, select').each(function(key, element)
        {
            var tipo_campo = $(element).prop('nodeName');
            var id_campo = $(element).attr('id');
            var valor_campo = $(element).val();

            if(tipo_campo == 'INPUT')
            {
                $(element).val('');
            }
            else if(tipo_campo == 'TEXTAREA')
            {
                $(element).val('');
            }
            else if(tipo_campo == 'SELECT')
            {
                $(element).val(1);
                $(element).trigger('change');
            }

        });
    }

    function registrar_etapa_cns(seccion)
    {
        var registro_temp = {};
        $('#'+seccion).find('input, textarea, select').each(function(key, element)
        {
            temp = {};
            var tipo_campo = $(element).prop('nodeName');
            var id_campo = $(element).attr('id');
            var valor_campo = $(element).val();

            registro_temp[id_campo] = valor_campo;
        });

        console.log('📝 Datos a guardar:', registro_temp);

        var ficha_atencion = $('#id_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_cns_tipo = $('#'+seccion+'_id_cns_tipo').val();
        var id_cns_template = $('#'+seccion+'_id_cns_template').val();
        var nombre = $('#'+seccion+'_nombre').val();
        // El responsable es el paciente mismo (menor/bebé) si no existe campo específico
        var id_responsable = $('#id_responsable_fc').val() || id_paciente;
        let url = "{{ route('ficha.registro.cns') }}";

        var _token = CSRF_TOKEN;

        console.log('🔑 Parámetros:', {
            id_cns_tipo, id_cns_template, id_ficha_atencion: ficha_atencion,
            id_paciente, nombre, seccion
        });

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_cns_tipo : id_cns_tipo,
                id_cns_template : id_cns_template,
                id_ficha_atencion : ficha_atencion,
                id_lugar_atencion : id_lugar_atencion,
                id_responsable : id_responsable,
                id_paciente : id_paciente,
                id_profesional : id_profesional,
                nombre : nombre,
                cuerpo : JSON.stringify(registro_temp),

            },
        })
        .done(function(data)
        {
            console.log('✅ Respuesta del servidor:', data);

            if (data !== 'null')
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro Control Niño Sano.",
                        text: nombre+"\nRegistro Exitoso.",
                        icon: "success",
                    }).then(() => {
                        // Recargar datos sin bloquear
                        cargarCns();
                    });
                }
                else
                {
                    swal({
                        title: "Registro Control Niño Sano.",
                        text: nombre+"\nError: " + (data.msj || 'Falla en Registro') + "\nIntente nuevamente.",
                        icon: "error",
                    });
                    console.error('❌ Error en registro:', data);
                }
            }
            else
            {
                swal({
                    title: "Registro Control Niño Sano.",
                    text: nombre+"\nFalla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.error('❌ Error AJAX:', jqXHR, ajaxOptions, thrownError);
            swal({
                title: "Error en la solicitud",
                text: "Error: " + (jqXHR.responseJSON?.message || thrownError) + "\nRevise la consola para más detalles.",
                icon: "error",
            });
        });
    }

    function cargarCns()
    {
        @if ($cns_registros)
            var datos = {!! $cns_registros !!};
        @else
            var datos = [];
        @endif

        console.log('📋 Registros CNS del paciente encontrados:', datos);

        var $tbody = $('#tbody_cns_registros');
        $tbody.empty();

        if (!datos || datos.length === 0) {
            console.log('ℹ️ El paciente no tiene registros CNS guardados.');
            $tbody.html('<tr><td colspan="4" class="text-center text-muted">Sin registros para este paciente.</td></tr>');
            return;
        }

        var filas = 0;

        $.each(datos, function (key, value)
        {
            /** El registro debe tener template asociado para saber a qué pestaña pertenece */
            if (!value.cns_tipo_template || !value.cns_tipo_template.alias) {
                console.warn('⚠️ Registro CNS sin template asociado (omitido):', value);
                return true; // continue
            }

            var alias = value.cns_tipo_template.alias;
            var nombreControl = value.cns_tipo_template.nombre || value.nombre || alias;
            console.log('📌 Cargando datos para sección:', alias, '(registro #' + value.id + ')');

            /** El cuerpo puede venir como string JSON o como objeto ya parseado */
            var temp;
            try {
                temp = (typeof value.cuerpo === 'string') ? $.parseJSON(value.cuerpo) : value.cuerpo;
            } catch (e) {
                console.error('❌ Cuerpo JSON inválido en registro #' + value.id, value.cuerpo, e);
                return true; // continue
            }

            if (!temp) {
                return true; // continue
            }

            /** Recolectar campos con datos reales para la tabla */
            var camposConDatos = [];

            $.each(temp, function (key2, value2)
            {
                var $campo = $('#'+key2);
                var existe = $campo.length > 0;
                var cargado = (value2 !== '' && value2 !== null && value2 !== '1');

                if(cargado)
                {
                    camposConDatos.push(key2 + ': ' + value2);

                    if(existe)
                    {
                        $campo.val(value2);
                        var tipo_campo = $campo.prop('nodeName');
                        if(tipo_campo == 'SELECT')
                        {
                            $campo.trigger('change');
                        }
                    }
                }
            });

            /** Fecha de registro */
            var fecha = value.created_at ? value.created_at.replace('T', ' ').substring(0, 16) : '-';

            /** Detalle de campos con datos */
            var detalle = camposConDatos.length > 0
                ? camposConDatos.join('<br>')
                : '<span class="text-muted">Sin datos capturados</span>';

            $tbody.append(
                '<tr>' +
                    '<td>' + value.id + '</td>' +
                    '<td>' + nombreControl + '</td>' +
                    '<td>' + fecha + '</td>' +
                    '<td><small>' + detalle + '</small></td>' +
                '</tr>'
            );
            filas++;
        });

        if (filas === 0) {
            $tbody.html('<tr><td colspan="4" class="text-center text-muted">Sin registros válidos para este paciente.</td></tr>');
        }
    }

</script>
