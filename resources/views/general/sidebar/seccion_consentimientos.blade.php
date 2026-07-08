 <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_side_bar">
        <div class="card-body-sidebar">
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_tto()";>+ Consentimiento tratamiento</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_revtto()";>+ Revocación consentimiento</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="certificado_alta()";>+ Certificado de alta</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="solalta()";>+ Solicitar alta voluntaria</button>
            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rechtto()";>+ Rechazo Tratamiento</button>
        </div>
    </div>
    @include("general.modal.m_aconsent_tto")
    @include("general.modal.m_revocacionconsent")
    @include("general.modal.m_certificado_alta")
    @include("general.modal.m_sol_alta")
    @include("general.modal.m_rech_tto")
<script>
    // JS SECCION CONSENTIMIENTOS
    function guia_vac() {
        $('#m_tabla_vac').modal('show');
    }
</script>

   