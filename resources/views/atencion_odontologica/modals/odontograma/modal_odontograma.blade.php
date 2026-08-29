@once
<style>
    #modal_odontograma .modal-content {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 22px 55px rgba(16, 40, 80, .22);
    }

    #modal_odontograma .modal-header {
        border: 0;
        padding: 18px 24px;
        background: linear-gradient(135deg, #2cb8bd 0%, #2aa8b5 100%) !important;
    }

    #modal_odontograma .modal-body {
        background: #f7f9fc;
        padding: 22px;
    }

    .historia-pieza-resumen {
        background: #fff;
        border: 1px solid #e6edf5;
        border-radius: 16px;
        padding: 18px 20px;
        margin-bottom: 18px;
        box-shadow: 0 5px 18px rgba(28, 73, 126, .06);
    }

    .historia-pieza-icono {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef5ff;
        color: #1658b3;
        font-size: 27px;
        flex: 0 0 auto;
    }

    .historia-pieza-imagen {
        width: 74px;
        height: 88px;
        object-fit: contain;
        filter: drop-shadow(0 4px 5px rgba(27, 55, 92, .12));
    }

    .historia-pieza-visual {
        width: 92px;
        min-height: 102px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, #f5f9ff 0%, #edf4ff 100%);
        border: 1px solid #dce8f7;
        flex: 0 0 auto;
    }

    .historia-estado-actual {
        display: inline-flex;
        align-items: center;
        margin-top: 7px;
        padding: 4px 9px;
        border-radius: 999px;
        background: #eef4ff;
        color: #245dab;
        font-size: 11px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .historia-pieza-numero {
        color: #174da5;
        font-size: 21px;
        font-weight: 700;
        line-height: 1.15;
    }

    .historia-pieza-meta {
        color: #74839a;
        font-size: 13px;
        margin-top: 5px;
    }

    .historia-buscador {
        max-width: 360px;
    }

    .historia-buscador .input-group-text {
        background: #fff;
        border-right: 0;
    }

    .historia-buscador input {
        border-left: 0;
    }

    .historia-timeline {
        position: relative;
        padding-left: 30px;
    }

    .historia-timeline:before {
        content: "";
        position: absolute;
        left: 10px;
        top: 12px;
        bottom: 12px;
        width: 2px;
        background: #dce6f1;
    }

    .historia-item {
        position: relative;
        margin-bottom: 16px;
    }

    .historia-item:last-child {
        margin-bottom: 0;
    }

    .historia-item:before {
        content: "";
        position: absolute;
        left: -27px;
        top: 21px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #2bb3b9;
        border: 3px solid #f7f9fc;
        box-shadow: 0 0 0 2px #bfe7e9;
    }

    .historia-card {
        background: #fff;
        border: 1px solid #e4ebf3;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(35, 71, 113, .05);
    }

    .historia-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 13px 16px;
        background: #fbfcfe;
        border-bottom: 1px solid #edf1f5;
    }

    .historia-fecha {
        color: #1a4fa3;
        font-weight: 700;
        font-size: 14px;
    }

    .historia-card-body {
        padding: 16px;
    }

    .historia-etiqueta {
        color: #77869b;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .45px;
        margin-bottom: 4px;
    }

    .historia-valor {
        color: #26384d;
        font-size: 14px;
        line-height: 1.35;
        word-break: break-word;
    }

    .historia-diagnostico {
        border-left: 3px solid #ef5350;
        padding-left: 10px;
    }

    .historia-tratamiento {
        border-left: 3px solid #2e75d3;
        padding-left: 10px;
    }

    .historia-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }

    .historia-badge.terminado {
        background: #e7f7ed;
        color: #24884a;
    }

    .historia-badge.proceso {
        background: #fff4d9;
        color: #9b6a00;
    }

    .historia-badge.pendiente {
        background: #eef2f7;
        color: #66758a;
    }

    .historia-badge.cancelado {
        background: #fde8e8;
        color: #ba3b3b;
    }

    .historia-vacio {
        text-align: center;
        padding: 42px 20px;
        color: #7c899b;
        background: #fff;
        border: 1px dashed #d5dee9;
        border-radius: 15px;
    }

    .historia-vacio i {
        display: block;
        font-size: 34px;
        margin-bottom: 10px;
        color: #9eabc0;
    }

    @media (max-width: 767.98px) {
        #modal_odontograma .modal-body {
            padding: 14px;
        }

        .historia-pieza-resumen {
            padding: 14px;
        }

        .historia-timeline {
            padding-left: 24px;
        }

        .historia-timeline:before {
            left: 7px;
        }

        .historia-item:before {
            left: -23px;
        }
    }
</style>

<div id="modal_odontograma" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_odontograma_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <div>
                    <div class="text-white-50 f-12 text-uppercase">Odontograma clínico</div>
                    <h5 class="modal-title text-white mt-1 f-18 mb-0" id="modal_odontograma_label">
                        Historia clínica de la pieza
                        <span id="numero_pieza_historia"></span>
                    </h5>
                </div>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="historia-pieza-resumen">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                        <div class="d-flex align-items-center mb-3 mb-md-0">
                            <div class="historia-pieza-visual mr-3">
                                <img id="historia_pieza_imagen"
                                    class="historia-pieza-imagen"
                                    src=""
                                    alt="Imagen clínica de la pieza">
                            </div>
                            <div>
                                <div class="historia-pieza-numero" id="historia_pieza_titulo">Pieza</div>
                                <div class="historia-pieza-meta">
                                    <span id="historia_total_registros">0 registros</span>
                                    <span class="mx-2">•</span>
                                    <span id="historia_ultima_atencion">Sin atenciones registradas</span>
                                </div>
                                <span class="historia-estado-actual" id="historia_estado_actual">
                                    Diente sano
                                </span>
                            </div>
                        </div>

                        <div class="historia-buscador">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="feather icon-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="buscar_historia_odontograma"
                                    placeholder="Buscar diagnóstico, tratamiento...">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="historia_odontograma_timeline" class="historia-timeline"></div>
            </div>
        </div>
    </div>
</div>

<script>
    window.historiaOdontogramaActual = window.historiaOdontogramaActual || [];

    function historiaEscapeHtml(valor) {
        return String(valor === null || valor === undefined ? '' : valor)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function historiaEstadoTexto(estado) {
        const valor = Number(estado);

        if (valor === 1) {
            return { texto: 'Terminado', clase: 'terminado', icono: 'feather icon-check-circle' };
        }

        if (valor === 2) {
            return { texto: 'En proceso', clase: 'proceso', icono: 'feather icon-clock' };
        }

        if (valor === 3) {
            return { texto: 'Cancelado', clase: 'cancelado', icono: 'feather icon-x-circle' };
        }

        return { texto: 'Pendiente', clase: 'pendiente', icono: 'feather icon-circle' };
    }

    function historiaTipoEspecialidad(item) {
        // El backend corregido entrega primero el nombre real de la especialidad.
        if (item.especialidad_texto) {
            return String(item.especialidad_texto);
        }

        if (item.tipo_especialidad_texto) {
            return String(item.tipo_especialidad_texto);
        }

        // Compatibilidad con respuestas antiguas.
        const tipoExamenMap = {
            1: 'Odontología General',
            2: 'Endodoncia',
            3: 'Odontopediatría'
        };

        const valor = item.tipo_examen;

        if (tipoExamenMap[Number(valor)]) {
            return tipoExamenMap[Number(valor)];
        }

        // Nunca mostrar un id numérico como nombre de especialidad.
        if (
            item.tipo_especialidad &&
            !/^\d+$/.test(String(item.tipo_especialidad).trim())
        ) {
            return String(item.tipo_especialidad);
        }

        return 'Odontología';
    }

    function historiaNormalizarTexto(valor) {
        return String(valor || '')
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .trim();
    }

    function historiaResolverEstadoVisual(item) {
        const diagnostico = historiaNormalizarTexto(item.diagnostico);
        const tratamiento = historiaNormalizarTexto(item.tratamiento);
        const texto = (diagnostico + ' ' + tratamiento).trim();
        const contiene = (...terminos) => terminos.some(t => texto.indexOf(t) !== -1);

        if (contiene('implante', 'implantologia')) return Number(item.estado) === 0 ? 'ausente' : 'implante';
        if (contiene('pulpectomia')) return 'pulpectomia';
        if (contiene('pulpotomia')) return 'pulpotomia';
        if (contiene('endodoncia', 'tratamiento de conducto', 'tratamiento conducto', 'conducto radicular')) return 'endodoncia';
        if (contiene('corona en mal estado', 'corona mal estado', 'corona defectuosa')) return 'corona_mal_estado';
        if (contiene('corona provisoria', 'corona provisional')) return 'corona_provisoria';
        if (contiene('perno munon', 'perno y munon')) return 'perno_munon';
        if (contiene('resto radicular', 'residuo radicular', 'remanente radicular')) return 'residuo_radicular';
        if (contiene('protesis removible')) return 'protesis_removible';
        if (contiene('ribbond')) return 'ribbond';
        if (contiene('extraccion', 'exodoncia')) return 'extraccion';
        if (contiene('impactado', 'incluido')) return 'impactado';
        if (contiene('fractura', 'fracturado')) return 'fractura';
        if (contiene('movilidad')) return 'movilidad';
        if (contiene('abfraccion')) return 'abfraccion';
        if (contiene('abrasion')) return 'abrasion';
        if (contiene('atricion')) return 'atricion';
        if (contiene('erosion')) return 'erosion';
        if (contiene('obturacion')) return 'obturacion';
        if (contiene('ortodoncia', 'ortodontico', 'ortodontica')) return 'ortodoncia';
        if (contiene('sellante', 'sellado de fosas', 'sellado fosas')) return 'sellante';
        if (contiene('surco')) return 'surco';
        if (contiene('fluor', 'fluoracion', 'fluoruracion')) return 'fluor';
        if (contiene('corona')) return 'corona';
        if (contiene('carie')) return 'carie';
        if (contiene('diente ausente', 'pieza ausente', 'ausencia dentaria')) return 'ausente';

        return 'normal';
    }

    function historiaRutaImagenPieza(pieza, estado) {
        const codigo = String(pieza || '').replace('.', '');
        const base = @json(asset('images/dental/dientes'));

        const rutas = {
            carie: base + '/carie/carie' + codigo + '.png',
            ausente: base + '/diente-ausente/dau' + codigo + '.png',
            extraccion: base + '/extraccion/porhacer/extraccion_' + codigo + '.png',
            fractura: base + '/fractura/fractura_' + codigo + '.png',
            impactado: base + '/impactado/impactado_' + codigo + '.png',
            endodoncia: base + '/endodoncia/endo' + codigo + '.png',
            pulpotomia: base + '/pulpotomia/pulpotomia' + codigo + '.png',
            pulpectomia: base + '/pulpectomia/pulpectomia_' + codigo + '.png',
            implante: base + '/implante/impl' + codigo + '.png',
            movilidad: base + '/movilidad/movilidad_' + codigo + '.png',
            perno_munon: base + '/perno-munon/hecho/perno_munon_' + codigo + '.png',
            corona: base + '/corona/hecho/corona_' + codigo + '.png',
            corona_provisoria: base + '/corona-provisoria/hecho/cp_hecho_' + codigo + '.png',
            corona_mal_estado: base + '/corona_mal_estado/c_malestado' + codigo + '.png',
            protesis_removible: base + '/protesis-removible/p_removible' + codigo + '.png',
            residuo_radicular: base + '/residuo-radicular/hecho/rr_' + codigo + '.png',
            ribbond: base + '/ribbond/hecho/ribbond_' + codigo + '.png',
            sellante: base + '/sellante/sellante_' + codigo + '.png',
            surco: base + '/surco/surco_' + codigo + '.png',
            atricion: base + '/atricion/atricion' + codigo + '.png',
            abrasion: base + '/abrasion/abrasion' + codigo + '.png',
            abfraccion: base + '/abfraccion/abfraccion' + codigo + '.png',
            erosion: base + '/erosion/erosion' + codigo + '.png',
            obturacion: base + '/obturacion/obturacion' + codigo + '.png',
            ortodoncia: base + '/ortodoncia/ortodoncia' + codigo + '.png',
            fluor: base + '/fluor/fluor' + codigo + '.png',
            normal: base + '/d' + codigo + '.png'
        };

        return rutas[estado] || rutas.normal;
    }

    function historiaNombreEstadoVisual(estado) {
        const nombres = {
            normal: 'Diente sano',
            carie: 'Caries',
            ausente: 'Diente ausente',
            extraccion: 'Extracción',
            fractura: 'Fractura',
            impactado: 'Diente impactado',
            endodoncia: 'Endodoncia',
            pulpotomia: 'Pulpotomía',
            pulpectomia: 'Pulpectomía',
            implante: 'Implante',
            movilidad: 'Movilidad',
            perno_munon: 'Perno muñón',
            corona: 'Corona',
            corona_provisoria: 'Corona provisoria',
            corona_mal_estado: 'Corona en mal estado',
            protesis_removible: 'Prótesis removible',
            residuo_radicular: 'Resto radicular',
            ribbond: 'Ribbond',
            sellante: 'Sellante',
            surco: 'Surco',
            atricion: 'Atrición',
            abrasion: 'Abrasión',
            abfraccion: 'Abfracción',
            erosion: 'Erosión',
            obturacion: 'Obturación',
            ortodoncia: 'Ortodoncia',
            fluor: 'Flúor'
        };

        return nombres[estado] || 'Diente sano';
    }

    function actualizarImagenActualHistoria(pieza, lista) {
        let estadoActual = 'normal';

        // Se respeta el orden del historial recibido: la última condición
        // clínica reconocida queda como estado visual vigente.
        (Array.isArray(lista) ? lista : []).forEach(function(item) {
            if (Number(item.estado) === 3) return;
            estadoActual = historiaResolverEstadoVisual(item);
        });

        $('#historia_pieza_imagen')
            .attr('src', historiaRutaImagenPieza(pieza, estadoActual))
            .attr('alt', 'Pieza ' + pieza + ' - ' + historiaNombreEstadoVisual(estadoActual));

        $('#historia_estado_actual').text(
            historiaNombreEstadoVisual(estadoActual)
        );
    }

    function historiaFormatearFecha(fecha) {
        if (!fecha) return 'Fecha no informada';

        const valor = String(fecha);

        // Si ya viene en formato visible desde backend, lo conservamos.
        const match = valor.match(/^(\d{4})-(\d{2})-(\d{2})(?:[ T](\d{2}):(\d{2})(?::\d{2})?)?/);

        if (!match) return valor;

        const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN',
            'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];

        let resultado = `${match[3]} ${meses[Number(match[2]) - 1]} ${match[1]}`;

        if (match[4] && match[5]) {
            resultado += ` · ${match[4]}:${match[5]}`;
        }

        return resultado;
    }

    function normalizarHistoriaOdontograma(response) {
        return (Array.isArray(response) ? response : []).map(function(item) {
            return {
                fecha: item.fecha || 'N/A',
                diagnostico: item.diagnostico || 'N/A',
                tratamiento: item.tratamiento || 'N/A',
                tipo_examen: historiaTipoEspecialidad(item),
                tipo_especialidad_texto: item.tipo_especialidad_texto || '',
                especialidad_texto: item.especialidad_texto || '',
                caras: item.diagnosticocaras || item.caras || 'N/A',
                responsable: item.profesional || 'N/A',
                estado: item.estado,
                observaciones: item.observaciones || item.observacion || '',
                id_ficha_atencion: item.id_ficha_atencion || null,
                id: item.id || null
            };
        });
    }

    function renderHistoriaOdontograma(lista) {
        const $contenedor = $('#historia_odontograma_timeline');
        $contenedor.empty();

        if (!Array.isArray(lista) || lista.length === 0) {
            $contenedor.html(`
                <div class="historia-vacio">
                    <i class="feather icon-file-text"></i>
                    <div class="font-weight-bold mb-1">Sin historia clínica registrada</div>
                    <div class="f-13">Esta pieza todavía no tiene diagnósticos o tratamientos guardados.</div>
                </div>
            `);
            return;
        }

        lista.forEach(function(item) {
            const estado = historiaEstadoTexto(item.estado);

            const observacionHtml = item.observaciones
                ? `
                    <div class="col-12 mt-3">
                        <div class="historia-etiqueta">Observaciones</div>
                        <div class="historia-valor">${historiaEscapeHtml(item.observaciones)}</div>
                    </div>
                `
                : '';

            const fichaHtml = item.id_ficha_atencion
                ? `<span class="ml-2 text-muted">Ficha #${historiaEscapeHtml(item.id_ficha_atencion)}</span>`
                : '';

            $contenedor.append(`
                <div class="historia-item">
                    <div class="historia-card">
                        <div class="historia-card-header">
                            <div class="historia-fecha">
                                <i class="feather icon-calendar mr-1"></i>
                                ${historiaEscapeHtml(historiaFormatearFecha(item.fecha))}
                                ${fichaHtml}
                            </div>

                            <span class="historia-badge ${estado.clase}">
                                <i class="${estado.icono}"></i>
                                ${estado.texto}
                            </span>
                        </div>

                        <div class="historia-card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="historia-diagnostico">
                                        <div class="historia-etiqueta">Diagnóstico</div>
                                        <div class="historia-valor font-weight-bold">
                                            ${historiaEscapeHtml(item.diagnostico)}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="historia-tratamiento">
                                        <div class="historia-etiqueta">Tratamiento</div>
                                        <div class="historia-valor font-weight-bold">
                                            ${historiaEscapeHtml(item.tratamiento)}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="historia-etiqueta">Especialidad</div>
                                    <div class="historia-valor">
                                        <i class="feather icon-activity mr-1 text-primary"></i>
                                        ${historiaEscapeHtml(item.tipo_examen)}
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <div class="historia-etiqueta">Caras</div>
                                    <div class="historia-valor">
                                        ${historiaEscapeHtml(item.caras)}
                                    </div>
                                </div>

                                <div class="col-md-5 mb-2">
                                    <div class="historia-etiqueta">Responsable de atención</div>
                                    <div class="historia-valor">
                                        <i class="feather icon-user mr-1 text-primary"></i>
                                        ${historiaEscapeHtml(item.responsable)}
                                    </div>
                                </div>

                                ${observacionHtml}
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    function actualizarResumenHistoriaOdontograma(pieza, lista) {
        const total = Array.isArray(lista) ? lista.length : 0;

        $('#numero_pieza_historia').text('N° ' + pieza);
        $('#historia_pieza_titulo').text('Pieza ' + pieza);
        $('#historia_total_registros').text(
            total + (total === 1 ? ' registro' : ' registros')
        );

        if (total > 0) {
            $('#historia_ultima_atencion').text(
                'Última atención: ' + historiaFormatearFecha(lista[total - 1].fecha)
            );
        } else {
            $('#historia_ultima_atencion').text('Sin atenciones registradas');
        }

        actualizarImagenActualHistoria(pieza, lista);
    }

    function filtrarHistoriaOdontograma() {
        const termino = String($('#buscar_historia_odontograma').val() || '')
            .toLowerCase()
            .trim();

        if (!termino) {
            renderHistoriaOdontograma(window.historiaOdontogramaActual);
            return;
        }

        const filtrados = window.historiaOdontogramaActual.filter(function(item) {
            const texto = [
                item.fecha,
                item.diagnostico,
                item.tratamiento,
                item.tipo_examen,
                item.caras,
                item.responsable,
                item.observaciones
            ].join(' ').toLowerCase();

            return texto.indexOf(termino) !== -1;
        });

        renderHistoriaOdontograma(filtrados);
    }

    $(document)
        .off('input.historiaOdontograma', '#buscar_historia_odontograma')
        .on('input.historiaOdontograma', '#buscar_historia_odontograma', filtrarHistoriaOdontograma);

    function info_odontograma(pieza) {
        const url = "{{ route('dental.dame_pieza') }}";
        let id_paciente = dame_id_paciente();

        if (id_paciente === '' || id_paciente === null) {
            id_paciente = $('#id_paciente').val();
        }

        $('#buscar_historia_odontograma').val('');
        $('#numero_pieza_historia').text('N° ' + pieza);
        $('#historia_pieza_titulo').text('Pieza ' + pieza);
        $('#historia_total_registros').text('Cargando...');
        $('#historia_ultima_atencion').text('');
        $('#historia_pieza_imagen').attr('src', historiaRutaImagenPieza(pieza, 'normal'));
        $('#historia_estado_actual').text('Cargando estado...');
        $('#historia_odontograma_timeline').html(`
            <div class="historia-vacio">
                <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                Cargando historia clínica...
            </div>
        `);

        $('#modal_odontograma').modal('show');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                pieza: pieza,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: id_paciente,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                window.historiaOdontogramaActual = normalizarHistoriaOdontograma(response);

                actualizarResumenHistoriaOdontograma(
                    pieza,
                    window.historiaOdontogramaActual
                );

                renderHistoriaOdontograma(window.historiaOdontogramaActual);
            },
            error: function(xhr) {
                window.historiaOdontogramaActual = [];
                actualizarResumenHistoriaOdontograma(pieza, []);

                $('#historia_odontograma_timeline').html(`
                    <div class="historia-vacio text-danger">
                        <i class="feather icon-alert-circle"></i>
                        <div class="font-weight-bold mb-1">No fue posible cargar la historia de la pieza</div>
                        <div class="f-13">Intente nuevamente. Si el problema continúa, revise la consola.</div>
                    </div>
                `);

                console.error('Error al cargar historia odontograma:', xhr);
            }
        });
    }
</script>
@endonce
