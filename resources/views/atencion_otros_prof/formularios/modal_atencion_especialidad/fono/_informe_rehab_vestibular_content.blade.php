@php $p = $irv_prefix ?? 'irv'; @endphp
<div class="row">
    <div class="col-12 my-3">
        <h6 class="f-20 text-c-blue">Informe Rehabilitación Vestibular</h6>
    </div>
     <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control form-control-sm" name="{{ $p }}_fecha" id="{{ $p }}_fecha">
                    </div>
                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <label class="floating-label-activo-sm" for="{{ $p }}_med_tte">Médico Tratante</label>
                        <input type="text" class="form-control form-control-sm" name="{{ $p }}_med_tte" id="{{ $p }}_med_tte">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="{{ $p }}_dg">Diagnóstico</label>
                        <input type="text" class="form-control form-control-sm" name="{{ $p }}_dg" id="{{ $p }}_dg">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="floating-label-activo-sm" for="{{ $p }}_ses_prog">Sesiones programadas</label>
                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_ses_prog" id="{{ $p }}_ses_prog">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="floating-label-activo-sm" for="{{ $p }}_ses_pend">Sesiones pendientes</label>
                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_ses_pend" id="{{ $p }}_ses_pend">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <h6 class="tit-gen mb-2">Apreciación e interpretación de Tratamiento</h6>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <div class="form-row">
                    <div class="col-sm-6 mt-1">
                        <label class="floating-label-activo-sm">Fecha evaluación inicial</label>
                        <input type="date" class="form-control form-control-sm" name="{{ $p }}_eval_ini" id="{{ $p }}_eval_ini">
                    </div>
                    <div class="col-sm-6 mt-1">
                        <label class="floating-label-activo-sm">Fecha evaluación actual</label>
                        <input type="date" class="form-control form-control-sm" name="{{ $p }}_eval_act" id="{{ $p }}_eval_act">
                    </div>
                </div>

                {{-- Test agudeza visual --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Test agudeza visual
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"name="{{ $p }}_com_avisual" id="{{ $p }}_com_avisual"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_avisual_ini" id="{{ $p }}_avisual_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                         <input type="number" class="form-control form-control-sm" name="{{ $p }}_avisual_act" id="{{ $p }}_avisual_act">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Test apoyo monopodal --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Test apoyo monopodal
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="{{ $p }}_com_amonopodal" id="{{ $p }}_com_amonopodal"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_amonopodal_ini" id="{{ $p }}_amonopodal_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_amonopodal_act" id="{{ $p }}_amonopodal_act">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Test alcance funcional --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Test alcance funcional
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="{{ $p }}_com_alcfunc" id="{{ $p }}_com_alcfunc"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_alcfunc_ini" id="{{ $p }}_alcfunc_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_alcfunc_act" id="{{ $p }}_alcfunc_act">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Timed up and go --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Timed up and go
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="{{ $p }}_com_tugo" id="{{ $p }}_com_tugo"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_tugo_ini" id="{{ $p }}_tugo_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_tugo_act" id="{{ $p }}_tugo_act">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Test marcha dinámica DGI --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Test marcha dinámica DGI
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="{{ $p }}_com_dgi" id="{{ $p }}_com_dgi"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_dgi_ini" id="{{ $p }}_dgi_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_dgi_act" id="{{ $p }}_dgi_act">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Test discapacidad por mareo DHI --}}
                <div class="form-row mt-3">
                    <div class="col-12">
                        <div class="card-lineal">
                            <div class="card-header-lineal">
                                Test discapacidad por mareo DHI
                            </div>
                            <div class="card-body-lineal">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <label class="floating-label-activo-sm">Comentario</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="{{ $p }}_com_dhi" id="{{ $p }}_com_dhi"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos Inicio</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_dhi_ini" id="{{ $p }}_dhi_ini">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                        <label class="floating-label-activo-sm">Puntos actuales</label>
                                        <input type="number" class="form-control form-control-sm" name="{{ $p }}_dhi_act" id="{{ $p }}_dhi_act">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                  <div class="form-row mt-2">
                    <div class="col-sm-12">
                        <label class="floating-label-activo-sm">Conclusión y apreciación del profesional</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="{{ $p }}_conclusion" id="{{ $p }}_conclusion"></textarea>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <label class="floating-label-activo-sm" for="{{ $p }}_nomb_prof">Nombre profesional tratante</label>
                        <input type="text" class="form-control form-control-sm" name="{{ $p }}_nomb_prof" id="{{ $p }}_nomb_prof">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm" for="{{ $p }}_prox_ctrl">Próximo Control</label>
                        <input type="date" class="form-control form-control-sm" name="{{ $p }}_prox_ctrl" id="{{ $p }}_prox_ctrl">
                    </div>
                </div>

              
            </div>
            <div class="card-footer">
                  <div class="row mt-3">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-danger-light-c btn-sm" id="{{ $p }}_btn_pdf" onclick="generarPDFinformeVest_{{ $p }}()"><i class="fas fa-file-pdf"></i> Ver PDF</button>
                        <button type="button" class="btn btn-primary-light-c btn-sm" onclick="dameUltimosPuntosEquilibrio_{{ $p }}()"><i class="feather icon-upload"></i> Cargar últimos puntos</button>
                        <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function dameUltimosPuntosEquilibrio_{{ $p }}() {
        var id_paciente = $('#id_paciente_fc').val();
        if (!id_paciente) {
            swal({ title: 'Atención', text: 'No se encontró el paciente activo.', icon: 'warning' });
            return;
        }

        $.ajax({
            url: "{{ route('fono.valoracion.equilibrio.get') }}",
            type: 'GET',
            data: { id_paciente: id_paciente },
            success: function(res) {
                if (!res.success || res.total === 0) {
                    swal({ title: 'Sin registros', text: 'No se encontraron valoraciones de equilibrio para este paciente.', icon: 'info' });
                    return;
                }

                // Registros vienen ordenados DESC: primero=más reciente, último=más antiguo
                var ultimo  = res.registros[0].datos_parsed;
                var primero = res.registros[res.total - 1].datos_parsed;

                // Helper: extrae puntaje numérico de un set de claves con valores "1"=Normal/"2"=Alterado
                // Devuelve cuántos intentos son Normal (valor 1)
                function contarNormales(datos, claves) {
                    var normales = 0;
                    claves.forEach(function(k) {
                        if (datos[k] == '1' || datos[k] == 1) normales++;
                    });
                    return normales;
                }

                function extraerPuntos(datos) {
                    return {
                        tav:   datos['tav_met_bpm']  || '',
                        amp:   contarNormales(datos, ['pi_int_uno','pd_int_uno','pi_int_dos','pd_int_dos','pi_int_tres','pd_int_tres']),
                        alcf:  contarNormales(datos, ['pi-af_int_uno','pd-af_int_uno','pi-af_int_dos','pd-af_int_dos','pi-af_int_tres','pd-af_int_tres']),
                        tuag:  contarNormales(datos, ['tuag_int_uno','tuag_int_dos']),
                        dgi:   datos['dgi-1']        || '',
                        dhi:   datos['dhi_total']    || ''
                    };
                }

                var ini = extraerPuntos(primero);
                var act = extraerPuntos(ultimo);

                var p = '{{ $p }}';
                var mapa = {
                    avisual_ini:     ini.tav,
                    avisual_act:     act.tav,
                    amonopodal_ini:  ini.amp,
                    amonopodal_act:  act.amp,
                    alcfunc_ini:     ini.alcf,
                    alcfunc_act:     act.alcf,
                    tugo_ini:        ini.tuag,
                    tugo_act:        act.tuag,
                    dgi_ini:         ini.dgi,
                    dgi_act:         act.dgi,
                    dhi_ini:         ini.dhi,
                    dhi_act:         act.dhi
                };
                $.each(mapa, function(campo, valor) {
                    if (valor !== '' && valor !== undefined) {
                        $('#' + p + '_' + campo).val(valor);
                    }
                });

                // Informar cuántos registros se encontraron
                var msg = 'Puntos cargados correctamente.\n'
                        + 'Inicio: primera sesión (' + res.registros[res.total - 1].created_at.substring(0,10) + ')\n'
                        + 'Actuales: última sesión (' + res.registros[0].created_at.substring(0,10) + ')';
                if (res.total === 1) msg = 'Solo existe un registro. Los puntos Inicio y Actuales son del mismo día (' + res.registros[0].created_at.substring(0,10) + ').';
                swal({ title: 'Datos cargados', text: msg, icon: 'success' });
            },
            error: function() {
                swal({ title: 'Error', text: 'No se pudo obtener los datos de equilibrio.', icon: 'error' });
            }
        });
    }

    function generarPDFinformeVest_{{ $p }}() {
        var p = '{{ $p }}';
        var btn = $('#' + p + '_btn_pdf');
        btn.prop('disabled', true).html('<i class="feather icon-loader"></i> Generando...');

        var datos = {};
        var campos = [
            'fecha','med_tte','dg','ses_prog','ses_pend',
            'eval_ini','eval_act',
            'com_avisual','avisual_ini','avisual_act',
            'com_amonopodal','amonopodal_ini','amonopodal_act',
            'com_alcfunc','alcfunc_ini','alcfunc_act',
            'com_tugo','tugo_ini','tugo_act',
            'com_dgi','dgi_ini','dgi_act',
            'com_dhi','dhi_ini','dhi_act',
            'conclusion','nomb_prof','prox_ctrl'
        ];
        campos.forEach(function(c) {
            datos[c] = $('#' + p + '_' + c).val() || '';
        });

        $.ajax({
            url: "{{ route('fono.informe.rehab.pdf') }}",
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                hora_medica:       $('#hora_medica').val(),
                id_paciente_fc:    $('#id_paciente_fc').val(),
                id_profesional_fc: $('#id_profesional_fc').val(),
                datos:             JSON.stringify(datos)
            },
            success: function(response) {
                btn.prop('disabled', false).html('<i class="feather icon-file"></i> Ver PDF');
                if (response.ruta) {
                    var w = 900, h = 650;
                    var l = (screen.width  - w) / 2;
                    var t = (screen.height - h) / 2;
                    window.open(response.ruta, 'PDF_IRV', 'width=' + w + ',height=' + h + ',top=' + t + ',left=' + l);
                } else {
                    swal({ title: 'Error', text: response.error || 'No se pudo generar el PDF.', icon: 'error' });
                }
            },
            error: function() {
                btn.prop('disabled', false).html('<i class="feather icon-file"></i> Ver PDF');
                swal({ title: 'Error', text: 'No se pudo conectar con el servidor.', icon: 'error' });
            }
        });
    }
</script>
