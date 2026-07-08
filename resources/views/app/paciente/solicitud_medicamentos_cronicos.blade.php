<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solicitar Medicamentos - MED-SDI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        .main-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 15px;
        }
        .card-main {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            border: none;
            overflow: hidden;
        }
        .card-header-custom {
            background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }
        .card-header-custom img {
            width: 80px;
            margin-bottom: 15px;
        }
        .card-header-custom h3 {
            margin: 0;
            font-weight: 600;
            font-size: 1.4rem;
        }
        .card-header-custom p {
            margin: 5px 0 0;
            opacity: 0.9;
            font-size: 0.95rem;
        }
        .card-body-custom {
            padding: 30px;
        }
        .info-paciente {
            background: #f0f4ff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #3366CC;
        }
        .info-paciente h6 {
            color: #3366CC;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .info-paciente p {
            color: #555;
            margin: 0;
        }
        .medicamento-item {
            background: #fff;
            border: 1px solid #e0e7ff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 12px;
            position: relative;
        }
        .medicamento-item .btn-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .btn-agregar {
            border: 2px dashed #3366CC;
            background: transparent;
            color: #3366CC;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-agregar:hover {
            background: #f0f4ff;
            color: #2255aa;
        }
        .btn-enviar {
            background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);
            border: none;
            color: white;
            border-radius: 12px;
            padding: 14px 30px;
            font-weight: 600;
            font-size: 1.05rem;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-enviar:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            color: white;
        }
        .footer-text {
            text-align: center;
            color: rgba(255,255,255,0.8);
            font-size: 0.85rem;
            margin-top: 20px;
            padding-bottom: 20px;
        }
        .resultado-container {
            display: none;
            text-align: center;
            padding: 40px 20px;
        }
        .resultado-container .icono-exito {
            font-size: 60px;
            color: #2ed573;
            margin-bottom: 20px;
        }
        .resultado-container h4 {
            color: #333;
            font-weight: 600;
        }
        .resultado-container p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card card-main">
            <div class="card-header-custom">
                <img src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="MED-SDI">
                <h3>Solicitud de Medicamentos Adicionales</h3>
                <p>Complete el formulario para solicitar otros medicamentos</p>
            </div>

            <div class="card-body-custom" id="formulario-solicitud">
                @if(isset($error) && $error)
                    <!-- Estado de error -->
                    <div style="text-align: center; padding: 40px 20px;">
                        <div style="font-size: 60px; color: #ff4757; margin-bottom: 20px;">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h4 style="color: #333; font-weight: 600;">No se pudo cargar el formulario</h4>
                        <p style="color: #666;">{{ $error }}</p>
                    </div>
                @elseif(!isset($paciente) || !$paciente)
                    <!-- Paciente no encontrado -->
                    <div style="text-align: center; padding: 40px 20px;">
                        <div style="font-size: 60px; color: #ffa502; margin-bottom: 20px;">
                            <i class="fas fa-user-slash"></i>
                        </div>
                        <h4 style="color: #333; font-weight: 600;">Paciente no encontrado</h4>
                        <p style="color: #666;">No se pudo verificar su identidad. Contacte a su centro de salud.</p>
                    </div>
                @else
                <!-- Info del paciente -->
                <div class="info-paciente">
                    <h6><i class="fas fa-user-circle me-2"></i>Datos del Paciente</h6>
                    <p><strong>{{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }} {{ $paciente->apellido_dos ?? '' }}</strong></p>
                    <p class="text-muted small">RUT: {{ $paciente->rut ?? '' }}</p>
                </div>

                <h6 class="mb-3" style="color: #3366CC; font-weight: 600;">
                    <i class="fas fa-pills me-2"></i>Medicamentos que desea solicitar
                </h6>

                <div id="lista-medicamentos">
                    <div class="medicamento-item" data-index="1">
                        <button type="button" class="btn-remove" onclick="removerMedicamento(this)" style="display:none;">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="row g-2">
                            <div class="col-12">
                                <label class="form-label small fw-bold">Nombre del medicamento</label>
                                <input type="text" class="form-control med-nombre" placeholder="Ej: Losartán 50mg" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold">Presentación</label>
                                <input type="text" class="form-control med-presentacion" placeholder="Ej: Comprimidos">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-bold">Cantidad</label>
                                <input type="number" class="form-control med-cantidad" placeholder="Ej: 30" min="1">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Observaciones (opcional)</label>
                                <textarea class="form-control med-observaciones" rows="2" placeholder="Indicaciones adicionales..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn-agregar mb-4" onclick="agregarMedicamento()">
                    <i class="fas fa-plus me-2"></i>Agregar otro medicamento
                </button>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Observaciones generales (opcional)</label>
                    <textarea id="observaciones_generales" class="form-control" rows="3" placeholder="Algún comentario adicional para su solicitud..."></textarea>
                </div>

                <button type="button" class="btn btn-enviar" onclick="enviarSolicitud()">
                    <i class="fas fa-paper-plane me-2"></i>Enviar Solicitud
                </button>
                @endif
            </div>

            <!-- Resultado exitoso -->
            <div class="resultado-container" id="resultado-exito">
                <div class="icono-exito">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>¡Solicitud Enviada!</h4>
                <p>Su solicitud de medicamentos ha sido recibida correctamente.<br>Nos pondremos en contacto con usted a la brevedad.</p>
                <p class="text-muted small mt-3">Puede cerrar esta ventana.</p>
            </div>
        </div>

        <div class="footer-text">
            <p>Salud Digital Integrada &copy; {{ date('Y') }} - <a href="https://med-sdi.cl" style="color: white;">med-sdi.cl</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let contadorMedicamentos = 1;

        function agregarMedicamento() {
            contadorMedicamentos++;
            const html = `
                <div class="medicamento-item" data-index="${contadorMedicamentos}">
                    <button type="button" class="btn-remove" onclick="removerMedicamento(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-2">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Nombre del medicamento</label>
                            <input type="text" class="form-control med-nombre" placeholder="Ej: Losartán 50mg" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Presentación</label>
                            <input type="text" class="form-control med-presentacion" placeholder="Ej: Comprimidos">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Cantidad</label>
                            <input type="number" class="form-control med-cantidad" placeholder="Ej: 30" min="1">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Observaciones (opcional)</label>
                            <textarea class="form-control med-observaciones" rows="2" placeholder="Indicaciones adicionales..."></textarea>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('lista-medicamentos').insertAdjacentHTML('beforeend', html);
            actualizarBotonesRemover();
        }

        function removerMedicamento(btn) {
            btn.closest('.medicamento-item').remove();
            actualizarBotonesRemover();
        }

        function actualizarBotonesRemover() {
            const items = document.querySelectorAll('.medicamento-item');
            items.forEach((item, index) => {
                const btnRemove = item.querySelector('.btn-remove');
                btnRemove.style.display = items.length > 1 ? 'flex' : 'none';
            });
        }

        function enviarSolicitud() {
            const items = document.querySelectorAll('.medicamento-item');
            const medicamentos = [];
            let valido = true;

            items.forEach(item => {
                const nombre = item.querySelector('.med-nombre').value.trim();
                if (!nombre) {
                    valido = false;
                    item.querySelector('.med-nombre').classList.add('is-invalid');
                    return;
                }
                item.querySelector('.med-nombre').classList.remove('is-invalid');

                medicamentos.push({
                    nombre: nombre,
                    presentacion: item.querySelector('.med-presentacion').value.trim(),
                    cantidad: item.querySelector('.med-cantidad').value || 0,
                    observaciones: item.querySelector('.med-observaciones').value.trim()
                });
            });

            if (!valido) {
                alert('Por favor, ingrese el nombre de todos los medicamentos.');
                return;
            }

            if (medicamentos.length === 0) {
                alert('Debe agregar al menos un medicamento.');
                return;
            }

            const data = {
                id_paciente: '{{ $paciente->id ?? "" }}',
                token: '{{ $token ?? "" }}',
                medicamentos: medicamentos,
                observaciones_generales: document.getElementById('observaciones_generales').value.trim()
            };

            // Enviar la solicitud via AJAX
            fetch('{{ route("paciente.solicitud_medicamentos_cronicos.guardar") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    document.getElementById('formulario-solicitud').style.display = 'none';
                    document.getElementById('resultado-exito').style.display = 'block';
                } else {
                    alert(result.message || 'Error al enviar la solicitud.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error de conexión. Por favor intente nuevamente.');
            });
        }
    </script>
</body>
</html>
