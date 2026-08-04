<!--BOTON-->
<button type="button" class="btn btn-agenda btn-simbologia-agenda d-inline float-right mb-2 mt-0 ml-2 mr-3" onclick="abrir_simbologia_agenda();" data-toggle="tooltip" data-placement="top" title="Significado de estados de agenda"><i class="fas fa-info"></i></button>
<!--MODAL-->
<div class="modal fade" id="modal_simbologia_agenda" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_simbologia_agenda" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content simbologia-modal-content">
            <div class="modal-header simbologia-modal-header">
                <h5 class="modal-title text-white">
                    <i class="fas fa-info-circle mr-2"></i>Significado de los estados de la agenda
                </h5>
                <button type="button" class="close simbologia-close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_simbologia_agenda').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body simbologia-modal-body">
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#1a49a3;"></span>
                            <span class="simbologia-label">Hora Pre Reservada</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#FCAB33;"></span>
                            <span class="simbologia-label">Hora Reservada</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#94BF61;"></span>
                            <span class="simbologia-label">Hora Confirmada</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#A06CC1;"></span>
                            <span class="simbologia-label">En espera de atención</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#EFBA9D;"></span>
                            <span class="simbologia-label">Realizando Atención</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#2DC2C1;"></span>
                            <span class="simbologia-label">Atención Realizada</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item">
                            <span class="simbologia-dot" style="background-color:#d0cece;"></span>
                            <span class="simbologia-label">Horario No Disponible</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="simbologia-item simbologia-item-last">
                            <span class="simbologia-dot" style="background-color:#dc3545;"></span>
                            <span class="simbologia-label">Horario Bloqueado</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer simbologia-modal-footer">
                <button type="button" class="btn btn-block simbologia-btn-entendido" data-dismiss="modal" onclick="cerrar_simbologia_agenda();">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-simbologia-agenda {
        width: 34px;
        height: 34px;
        padding: 0;
        border-radius: 50%;
        background-color: #1a49a3;
        border: none;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background-color .2s ease, color .2s ease;
    }
    .btn-simbologia-agenda:hover,
    .btn-simbologia-agenda:focus {
        background-color: #14397f;
        color: #fff;
    }

    .simbologia-modal-content {
        border: none;
        border-radius: 16px;
        overflow: hidden;
    }
    .simbologia-modal-header {
        background: linear-gradient(120deg, #1a49a3 0%, #2DC2C1 100%);
        border-bottom: none;
        padding: 18px 22px;
    }
    .simbologia-modal-header .modal-title {
        font-weight: 700;
        font-size: 1.05rem;
    }
    .simbologia-close {
        color: #fff;
        opacity: .9;
        text-shadow: none;
        font-weight: 400;
        font-size: 1.4rem;
    }
    .simbologia-close:hover {
        color: #fff;
        opacity: 1;
    }

    .simbologia-modal-body {
        padding: 18px 22px 8px;
    }
    .simbologia-item {
        display: flex;
        align-items: center;
        padding: 12px 8px;
        border-bottom: 1px solid #f0f1f5;
    }
    .simbologia-item-last {
        border-bottom: none;
    }
    .simbologia-dot {
        width: 16px;
        height: 16px;
        min-width: 16px;
        border-radius: 50%;
        margin-right: 12px;
        box-shadow: 0 0 0 4px rgba(0, 0, 0, .04);
    }
    .simbologia-label {
        color: #2b2f3a;
        font-weight: 600;
        font-size: .92rem;
    }

    .simbologia-modal-footer {
        border-top: 1px solid #f0f1f5;
        padding: 14px 22px 20px;
    }
    .simbologia-btn-entendido {
        background-color: #1a49a3;
        color: #fff;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px;
    }
    .simbologia-btn-entendido:hover {
        color: #fff;
        opacity: .92;
    }

    @media (max-width: 767.98px) {
        .simbologia-item {
            border-bottom: 1px solid #f0f1f5;
        }
        .col-sm-12.col-md-6:last-child .simbologia-item {
            border-bottom: none;
        }
    }
</style>

<script type="text/javascript">
      /**CIERRE MODAL**/
    function abrir_simbologia_agenda()
    {
        $('#modal_simbologia_agenda').modal('show');
    }
    function cerrar_simbologia_agenda() {
        $('#modal_simbologia_agenda').modal ('hide');
      }
    /**CIERRE: CIERRE MODAL**/

</script>
