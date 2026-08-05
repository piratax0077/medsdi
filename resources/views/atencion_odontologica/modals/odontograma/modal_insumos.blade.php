<div id="modal_insumos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_insumos" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-insumos-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insumosModalLabel"><i class="fas fa-boxes mr-2"></i>Insumos para el tratamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">

              <div class="insumos-bloque insumos-bloque-datos">
                  <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group mb-md-0">
                              <label for="" class="floating-label-activo-sm">Profesional</label>
                              <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                  </div>
                                  <input type="text" name="" id="" class="form-control form-control-sm insumos-input-readonly" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group mb-md-0">
                              <label for="" class="floating-label-activo-sm">Paciente</label>
                              <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user-injured"></i></span>
                                  </div>
                                  <input type="text" name="" id="" class="form-control form-control-sm insumos-input-readonly" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}" readonly>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <h6 class="insumos-titulo-seccion"><i class="fas fa-tooth"></i>Selección del insumo</h6>
              <div class="insumos-bloque">
                  <div class="form-row">
                      <div class="col-md-3" id="tipo_insumo_select">
                        <div class="form-group mb-md-0">
                            <label for="tipoInsumo" class="floating-label-activo-sm">Tipo de Insumo</label>
                            <select name="tipoInsumo" id="tipoInsumo" class="form-control form-control-sm" onchange="dame_marcas_implantes(this)">
                                <option value="0">Seleccione</option>
                                <option value="1">Implantes</option>
                                <option value="2">Instrumental Quirúrgico y Protésico</option>
                                <option value="3">Material de Sutura y Regeneración</option>
                                <option value="4">Insumos Descartables y Bioseguridad</option>
                                <option value="5">Injerto óseo</option>
                                <option value="6">Membranas</option>
                                <option value="7">Tornillos de fijación</option>
                                <option value="8">Aditamentos</option>
                                <option value="9">Otros Insumos</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4 d-none" id="marcas_implantes_select">
                        <div class="form-group mb-md-0">
                            <label for="marcasImplantes" class="floating-label-activo-sm">Marcas Implantes</label>
                            <select name="marcasImplantes" id="marcasImplantes" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                                                    <option value="1">AlphaBio</option>
                                                                    <option value="2">Biohorizons</option>
                                                                    <option value="3">Biomet 3i</option>
                                                                    <option value="4">GMI</option>
                                                                    <option value="5">Mis</option>
                                                                    <option value="6">Neodent</option>
                                                                    <option value="7">Nobel</option>
                                                                    <option value="8">Straumann</option>
                                                                    <option value="9">Zimbie</option>
                                                            </select>
                        </div>
                      </div>
                      <div class="col-md-9" id="insumos_select">
                          <div class="form-group mb-md-0">
                              <label for="" class="floating-label-activo-sm" id="titulo_tipo_insumo">Insumos</label>
                              <select name="nombreInsumo" data-titulo="Ex_cuello" data-seccion="Cuello" id="nombreInsumo" class="form-control form-control-sm">
                                                                    <option value="2">Aloinjerto puros cortical particulado 0.5 cc</option>
                                                                    <option value="3">Aloinjerto puros cortical particulado 1.0 cc</option>
                                                                    <option value="4">Aloinjerto puros cortical particulado 2.0 cc</option>
                                                                    <option value="5">Aloinjerto puros esponjoso particulado 0.5 cc</option>
                                                                    <option value="6">Aloinjerto puros esponjoso particulado 1.0 cc</option>
                                                                    <option value="7">Aloinjerto puros esponjoso particulado 2.0 cc</option>
                                                                    <option value="8">Aloinjerto puros mixto particulado 0.5 cc</option>
                                                                    <option value="9">Aloinjerto puros mixto particulado 1.0 cc</option>
                                                                    <option value="10">Aloinjerto puros mixto particulado 2.0 cc</option>
                                                                    <option value="85">Análogo Alpha bio</option>
                                                                    <option value="86">Análogo Biohorizons</option>
                                                                    <option value="87">Análogo biomet 3i</option>
                                                                    <option value="88">Análogo GMI</option>
                                                                    <option value="76">Análogo mini pilar antir</option>
                                                                    <option value="75">Análogo mini pilar cónico</option>
                                                                    <option value="89">Análogo Mis</option>
                                                                    <option value="90">Análogo Nobel</option>
                                                                    <option value="91">Análogo Straumann</option>
                                                                    <option value="14">Autoinjerto</option>
                                                                    <option value="53">Chincheta 3 MM BMK</option>
                                                                    <option value="54">Chincheta TRUTACK ø 2.5 MM, 3L, 10U</option>
                                                                    <option value="55">Chincheta TRUTACK ø 2.5 MM, 5L, 10U</option>
                                                                    <option value="27">COLLPROTECT MEMBRANE 15 X 20 MM</option>
                                                                    <option value="28">COLLPROTECT MEMBRANE 20 X 30 MM</option>
                                                                    <option value="29">COLLPROTECT MEMBRANE 30 X 40 MM</option>
                                                                    <option value="66">ENCODE DIGITAL</option>
                                                                    <option value="67">ENCODE DIGITAL EXTERNO</option>
                                                                    <option value="15">Injerto aloplástico</option>
                                                                    <option value="30">JASON MEMBRANE 15 X 20 MM</option>
                                                                    <option value="31">JASON MEMBRANE 20 X 30 MM</option>
                                                                    <option value="32">JASON MEMBRANE 30 X 40 MM</option>
                                                                    <option value="16">Maxgraft cancellous 0.5-2.0 mm 0.5 cc</option>
                                                                    <option value="17">Maxgraft cancellous 0.5-2.0 mm 1.0 cc</option>
                                                                    <option value="18">Maxgraft cancellous 0.5-2.0 mm 2.0 cc</option>
                                                                    <option value="21">MEMBRANA DE COLÁGENO BIOMEND 15 X 20 MM</option>
                                                                    <option value="22">MEMBRANA DE COLÁGENO BIOMEND 20 X 30 MM</option>
                                                                    <option value="23">MEMBRANA DE COLÁGENO BIOMEND 30 X 40 MM</option>
                                                                    <option value="24">MEMBRANA DE COLÁGENO BIOMEND EXTEND 15 X 20 MM</option>
                                                                    <option value="25">MEMBRANA DE COLÁGENO BIOMEND EXTEND 20 X 30 MM</option>
                                                                    <option value="26">MEMBRANA DE COLÁGENO BIOMEND EXTEND 30 X 40 MM</option>
                                                                    <option value="33">MEMBRANA OSSEOGUARD ® PTFE TEXTURED 12 X 24 MM</option>
                                                                    <option value="34">MEMBRANA OSSEOGUARD ® PTFE TEXTURED 25 X 30 MM</option>
                                                                    <option value="35">MEMBRANA OSSEOGUARD ® PTFE TR250 12 X 24 ANTERIOR</option>
                                                                    <option value="36">MEMBRANA OSSEOGUARD ® PTFE TR250 20 X 25 POSTERIOR</option>
                                                                    <option value="37">MEMBRANA PTFE PERMANEM 15 X 20 MM</option>
                                                                    <option value="38">MEMBRANA PTFE PERMANEM 20 X 30 MM</option>
                                                                    <option value="39">MEMBRANA PTFE PERMANEM 30 X 40 MM</option>
                                                                    <option value="73">Pilar Angulado</option>
                                                                    <option value="70">Pilar calcinable</option>
                                                                    <option value="59">Pilar de cicatrización Alpha bio</option>
                                                                    <option value="60">Pilar de cicatrización Biohorizons</option>
                                                                    <option value="61">Pilar de cicatrización biomet 3i</option>
                                                                    <option value="62">Pilar de cicatrización GMI</option>
                                                                    <option value="63">Pilar de cicatrización Mis</option>
                                                                    <option value="58">Pilar de cicatrización Neodent GM, TI</option>
                                                                    <option value="64">Pilar de cicatrización Nobel</option>
                                                                    <option value="65">Pilar de cicatrización Straumann</option>
                                                                    <option value="56">Pilar de cicatrización Zimbie</option>
                                                                    <option value="57">Pilar de cicatrización Zimbie MU</option>
                                                                    <option value="74">Pilar recto</option>
                                                                    <option value="71">Pilar tallable</option>
                                                                    <option value="19">REGENEROSS GRAFT PLUG 10MM X 20MM</option>
                                                                    <option value="20">REGENEROSS GRAFT PLUG 6MM X 25MM</option>
                                                                    <option value="1">Sin injerto</option>
                                                                    <option value="69">Tapas de cierre</option>
                                                                    <option value="72">TI-BASE</option>
                                                                    <option value="51">Tornillo autoperforante 1.2 MM</option>
                                                                    <option value="52">Tornillo autoperforante 1.5 MM</option>
                                                                    <option value="68">Tornillo de cobertura Neodent</option>
                                                                    <option value="43">Tornillo de fijación 1.5 D, 11 MM</option>
                                                                    <option value="40">Tornillo de fijación 1.5 D, 3.5 MM</option>
                                                                    <option value="41">Tornillo de fijación 1.5 D, 7 MM</option>
                                                                    <option value="42">Tornillo de fijación 1.5 D, 9 MM</option>
                                                                    <option value="44">Tornillo FIXING SCREW 1.6 MM, 3 L</option>
                                                                    <option value="45">Tornillo FIXING SCREW 1.6 MM, 5 L</option>
                                                                    <option value="46">Tornillo FIXING SCREW 1.6 MM, 7 L</option>
                                                                    <option value="48">Tornillo TENT SCREW 2 MM, 10 L</option>
                                                                    <option value="49">Tornillo TENT SCREW 2 MM, 13 L</option>
                                                                    <option value="50">Tornillo TENT SCREW 2 MM, 15 L</option>
                                                                    <option value="47">Tornillo TENT SCREW 2 MM, 7 L</option>
                                                                    <option value="78">Transfer Alpha bio</option>
                                                                    <option value="79">Transfer Biohorizons</option>
                                                                    <option value="80">Transfer biomet 3i</option>
                                                                    <option value="81">Transfer GMI</option>
                                                                    <option value="82">Transfer Mis</option>
                                                                    <option value="77">Transfer Neodent GM, TI</option>
                                                                    <option value="83">Transfer Nobel</option>
                                                                    <option value="84">Transfer Straumann</option>
                                                                    <option value="11">Xenoinjerto 250-1000 UM 0.5 cc</option>
                                                                    <option value="12">Xenoinjerto 250-1000 UM 1.0 cc</option>
                                                                    <option value="13">Xenoinjerto 250-1000 UM 2.0 cc</option>
                                                            </select>
                          </div>
                      </div>
                  </div>
              </div>

              <h6 class="insumos-titulo-seccion"><i class="fas fa-calculator"></i>Cantidad y valores</h6>
              <div class="insumos-bloque">
                  <div class="form-row align-items-end">
                      <div class="col-6 col-md-3">
                          <div class="form-group mb-0">
                              <label for="" class="floating-label-activo-sm">Cantidad</label>
                              <input type="number" name="cantidad" id="cantidad" class="form-control form-control-sm" min="0" placeholder="0">
                          </div>
                      </div>
                      <div class="col-6 col-md-3">
                          <div class="form-group mb-0">
                              <label for="" class="floating-label-activo-sm">Valor</label>
                              <div class="input-group input-group-sm">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                  </div>
                                  <input type="number" name="precio" id="precio" class="form-control form-control-sm" min="0" placeholder="0">
                              </div>
                          </div>
                      </div>
                      <div class="col-8 col-md-4">
                        <div class="form-group mb-0">
                            <label for="" class="floating-label-activo-sm">Total</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" name="total" id="total" class="form-control form-control-sm insumos-total-input" placeholder="0" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 mt-2 mt-md-0 text-md-right">
                        <button type="button" class="btn btn-primary btn-sm insumos-btn-agregar" onclick="guardar_insumo()" title="Agregar insumo al presupuesto">
                            <i class="feather icon-shopping-cart mr-1"></i>Agregar
                        </button>
                    </div>
                  </div>
              </div>

              <div class="insumos-bloque insumos-bloque-obs">
                  <div class="form-group mb-0">
                      <label for="" class="floating-label-activo-sm">Observaciones</label>
                      <textarea class="form-control caja-texto form-control-sm" name="insumos_obs_tto" id="insumos_obs_tto" cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cerrar</button>
          </div>
        </div>
    </div>
</div>
<style>
    #modal_insumos .modal-body {
        padding: 18px 22px 8px;
    }

    #modal_insumos .insumos-bloque {
        background-color: #f8f9fb;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 16px 16px 6px;
        margin-bottom: 18px;
    }

    #modal_insumos .insumos-bloque-datos {
        background-color: #fff;
        border-color: #e3eaef;
    }

    #modal_insumos .insumos-bloque-obs {
        background-color: #fff;
        padding: 16px;
    }

    #modal_insumos .insumos-titulo-seccion {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        color: #6c757d;
        margin: 0 0 8px 4px;
    }

    #modal_insumos .insumos-titulo-seccion i {
        color: #1A9AA3;
        margin-right: 6px;
    }

    #modal_insumos .insumos-input-readonly {
        background-color: #f1f3f5 !important;
        color: #495057;
        cursor: default;
    }

    #modal_insumos .insumos-total-input {
        background-color: #e9f7f7 !important;
        border-color: #9fd8d8;
        color: #148A8A;
        font-weight: 700;
        cursor: default;
    }

    #modal_insumos .insumos-btn-agregar {
        width: 100%;
        white-space: nowrap;
    }

    #modal_insumos .form-group {
        margin-bottom: 1.4rem;
    }

    #modal_insumos .insumos-bloque .form-row > [class*="col-"]:last-child .form-group,
    #modal_insumos .insumos-bloque-obs .form-group {
        margin-bottom: 0;
    }

    @media (max-width: 767.98px) {
        #modal_insumos .insumos-bloque .form-row > [class*="col-"] {
            margin-bottom: 1rem;
        }
    }
</style>
<script>
    function dame_marcas_implantes(value, tipo = 'nuevo'){
        let id_tipo_insumo = value.value;
        console.log(id_tipo_insumo);
        let tipo_insumo_text = value.options[value.selectedIndex].text;

        $('#titulo_tipo_insumo').html(tipo_insumo_text);
        if(id_tipo_insumo == 1){
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').removeClass('d-none');
            $('#insumos_select').addClass('d-none');
            if(tipo == 'editar'){
                $('#marcas_implantes_select_editar').removeClass('d-none');
                $('#insumos_select_editar').addClass('d-none');
            }
        }else{
            // quitar la clase d-none al select de marcas
            $('#marcas_implantes_select').addClass('d-none');
            $('#insumos_select').removeClass('d-none');
            if(tipo == 'editar'){
                $('#marcas_implantes_select_editar').addClass('d-none');
                $('#insumos_select_editar').removeClass('d-none');
            }
        }
        let url = '{{ ROUTE("dental.dame_implantes_dental") }}';
        let data = {
            id_tipo_insumo: id_tipo_insumo,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(tipo == 'editar'){
                    $('#nombreInsumo_editar').empty();
                    let insumos = resp;
                    insumos.forEach(e => {
                        $('#nombreInsumo_editar').append(`
                        <option value="${e.id}"> ${e.descripcion} </option>
                        `);
                    });
                    return;
                }else{
                    $('#nombreInsumo').empty();
                    let insumos = resp;
                    insumos.forEach(e => {
                        $('#nombreInsumo').append(`
                        <option value="${e.id}"> ${e.descripcion} </option>
                        `);
                    });
                }

            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }
</script>
