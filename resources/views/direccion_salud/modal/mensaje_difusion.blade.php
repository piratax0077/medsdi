<!-- Modal -->
<div class="modal fade" id="modal_mensaje_difusion" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_difusionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_mensaje_difusionLabel">Enviar Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields here -->
                <form id="mensajeForm" method="POST" action="{{ ROUTE('mensaje_difusion_ministerio') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="de_difusion">De:</label>
                        <input type="text" class="form-control" id="de" name="de" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="select_receptores">Receptores:</label>
                        <select class="form-control" id="select_receptores" name="receptores[]" multiple="multiple">
                            <!-- Opciones de ejemplo, reemplaza con tus datos -->
                            <option value="1">Pacientes</option>
                            <option value="2">Directores medicos de hospital</option>
                            <option value="3">Profesionales</option>
                            <option value="4">Directores medicos de CM</option>
                            <option value="5">Laboratorios</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label for="detalle">Detalle:</label>
                        <textarea class="form-control" id="detalle" name="detalle" rows="3" placeholder="Escriba aqui" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Escriba aqui" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="dropzone" id="mis-archivos-difusion-ministerio" action="{{ route('ministerio.imagen.carga') }}" >
                            <!-- Aquí se manejarán las imágenes -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="submit-all" class="btn btn-primary" onclick="enviar_mensaje_difusion_confirmar()">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
