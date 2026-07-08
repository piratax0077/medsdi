<div id="m_biopsia_cir" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_biopsia_cir" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Examen de Biopsia </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <!-- Fecha -->
                                <input type="date" class="form-control form-control-sm" name="fecha_biopsia" id="fecha_biopsia" value="<?php echo date('Y-m-d') ?>">

                                </input>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nº de orden</label>
                                <!-- Nº Orden -->
                                <input type="number" class="form-control form-control-sm" name="n_orden_biopsia" id="n_orden_biopsia">

                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco uno</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Zona 1 de toma de muestra</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="zona1" id="zona1" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" title="Imprimir Frasco 1" onclick="imprimirFrasco(1)">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco dos</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Zona 2 de toma de muestra</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="zona2" id="zona2" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" title="Imprimir Frasco 2" onclick="imprimirFrasco(2)">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group">
                                <label class="label">Frasco tres</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Zona 3 de toma de muestra</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="zona3" id="zona3" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" title="Imprimir Frasco 3" onclick="imprimirFrasco(3)">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-2">
                            <div class="form-group fill">
                                <label class="label">Frasco cuatro</label>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Zona 4 de toma de muestra</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="zona4" id="zona4" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" title="Imprimir Frasco 4" onclick="imprimirFrasco(4)">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Patólogo o Laboratorio</label>
                                <input type="text" name="patologo_biopsia" id="patologo_biopsia" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biopsia_orl" id="obs_biopsia_orl"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="alert alert-info alert-sm mb-2" role="alert">
                                <i class="fas fa-info-circle"></i> <strong>Nota:</strong> Todos los frascos especificados se enviarán como una única solicitud de examen de biopsia al laboratorio.
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs" id="table_ex_biopsias">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">localización</th>
                                            <th class="text-center align-middle">Zona</th>
                                            <th class="text-center align-middle">Patólogo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="guardar_biopsia()"><i class="fa fa-save"></i> Guardar Solicitud</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // preguntar si existe la tabla antes de inicializarla para evitar errores al agregar filas dinámicamente
    if ($.fn.DataTable.isDataTable('#table_ex_biopsias')) {
        $('#table_ex_biopsias').DataTable().destroy();
    }
    // Inicializar la tabla de biopsias
    $('#table_ex_biopsias').DataTable({
        "language": {
            "url": "{{ asset('js/Spanish.json') }}"
        },
        "order": [[0, "desc"]], // Ordenar por fecha descendente
        "columnDefs": [
            { "orderable": false, "targets": 5 } // Deshabilitar ordenamiento en la columna de acciones
        ]
    });

    // Cargar los exámenes de biopsia al abrir el modal
    dame_examenes_biopsia();
});
function guardar_biopsia() {
    let fecha = $('#fecha_biopsia').val();
    let n_orden = $('#n_orden_biopsia').val();
    let zona1 = $('#zona1').val();
    let zona2 = $('#zona2').val();
    let zona3 = $('#zona3').val();
    let zona4 = $('#zona4').val();
    let patologo = $('#patologo_biopsia').val();
    let observaciones = $('#obs_biopsia_orl').val();
    let id_ficha_atencion = $('#id_fc').val();

    // Combinar zonas en una cadena de texto
    let zonas_combinadas = '';
    if(zona1 !== '') zonas_combinadas += (zonas_combinadas ? ' | ' : '') + 'Frasco 1: ' + zona1;
    if(zona2 !== '') zonas_combinadas += (zonas_combinadas ? ' | ' : '') + 'Frasco 2: ' + zona2;
    if(zona3 !== '') zonas_combinadas += (zonas_combinadas ? ' | ' : '') + 'Frasco 3: ' + zona3;
    if(zona4 !== '') zonas_combinadas += (zonas_combinadas ? ' | ' : '') + 'Frasco 4: ' + zona4;

    let valido = 1;
    let mensaje = '';

    if(zona1 == '' && zona2 == '' && zona3 == '' && zona4 == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar al menos un frasco</li>';
    }

    if(patologo == '' || patologo.length < 2){
        valido = 0;
        mensaje += '<li>Patólogo debe tener al menos 2 caracteres</li>';
    }

    if(valido == 1){
        let data = {
            fecha: fecha,
            n_orden: n_orden,
            zona: zonas_combinadas,
            zona1: zona1,
            zona2: zona2,
            zona3: zona3,
            zona4: zona4,
            patologo: patologo,
            observaciones: observaciones,
            id_ficha_atencion: id_ficha_atencion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            url: '{{ ROUTE("profesional.guardar_examen_biopsia") }}', // Cambia esta ruta según tu backend
            method: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    // Agregar PDF URL al objeto examen si existe
                    if (response.pdf_url) {
                        response.examen.pdf_url = response.pdf_url;
                    }

                    let mensaje = 'Biopsia guardada exitosamente.';
                    if (response.pdf_url) {
                        mensaje += '\n📄 PDF generado exitosamente.';
                    } else if (response.pdf_error) {
                        console.warn('Error al generar PDF:', response.pdf_error);
                        mensaje += '\n⚠️ PDF no disponible: ' + response.pdf_error;
                    }

                    swal({
                        icon:'success',
                        text: mensaje,
                    });
                    agregarFilaBiopsia(response.examen);
                    // limpiamos los campos
                    limpiarCamposBiopsia();
                } else {
                    swal({
                        icon:'error',
                        title:'Error',
                        text: response.examen || 'Ocurrió un error al guardar el examen.',
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                swal({
                    icon:'error',
                    title:'Error',
                    text:'Error al guardar examen. Intente nuevamente.',
                });
            }
        });
    }else{
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje,
                },
            },
            icon: "error",
            buttons: "Aceptar",
            DangerMode: true,
        });
    }


}

function limpiarCamposBiopsia(){
    // $('#fecha_biopsia').val('');
    $('#n_orden_biopsia').val('');
    $('#zona1').val('');
    $('#zona2').val('');
    $('#zona3').val('');
    $('#zona4').val('');
    $('#patologo_biopsia').val('');
    $('#obs_biopsia_orl').val('');
}

function agregarFilaBiopsia(examen) {
    console.log(examen);
    const tabla = $('#table_ex_biopsias').DataTable(); // Ya está inicializada

    // Generar botones de acción
    let botones = '<button type="button" class="btn btn-sm btn-danger mr-1" onclick="eliminar_ex_biopsia('+examen.id+')"><i class="fas fa-trash"></i> Eliminar</button>';

    // Agregar botón de PDF si está disponible
    if (examen.pdf_url) {
        botones += '<button type="button" class="btn btn-sm btn-success" onclick="descargar_pdf_biopsia(\''+examen.pdf_url+'\')"><i class="fas fa-file-pdf"></i> PDF</button>';
    }

    tabla.row.add([
        examen.fecha,
        examen.id,
        examen.localizacion,
        examen.zona, // Usamos solo una vez la agrupación de frascos
        examen.patologo,
        botones
    ]).draw(false);
}

function eliminar_ex_biopsia(id){
     $.ajax({
        url: '{{ ROUTE("profesional.eliminar_examen_biopsia") }}', // Cambia esta ruta según tu backend
        method: 'get',
        data: {
            id:id,
        },
        success: function(response) {
            console.log(response);
            if (response.success) {
                swal({
                    icon:'success',
                    text:'Exito, se ha eliminado la biopsia',
                });
                let examenes = response.examenes;
                const tabla = $('#table_ex_biopsias').DataTable(); // Ya está inicializada
                tabla.clear().draw(); // 🔥 Limpiar la tabla antes de agregar filas nuevas
                examenes.forEach(examen => {
                    let botones = '<button type="button" class="btn btn-sm btn-danger mr-1" onclick="eliminar_ex_biopsia('+examen.id+')"><i class="fas fa-trash"></i> Eliminar</button>';
                    if (examen.pdf_url) {
                        botones += '<button type="button" class="btn btn-sm btn-success" onclick="descargar_pdf_biopsia(\''+examen.pdf_url+'\')"><i class="fas fa-file-pdf"></i> PDF</button>';
                    }
                    tabla.row.add([
                        examen.fecha,
                        examen.n_orden,
                        examen.localizacion || 'N/A',
                        examen.zona, // Usamos solo una vez la agrupación de frascos
                        examen.patologo,
                        botones
                    ]).draw(false);
                });

            } else {
                swal({
                    icon:'error',
                    title:'Error',
                    text: 'Ocurrió un error al eliminar el examen.',
                });
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            swal({
                icon:'error',
                title:'Error',
                text:'Error al eliminar examen.',
            });
        }
    });
}

function ver_pdf_ex_biopsia(id){
    // $.ajax({
    //     url: '{{ ROUTE("profesional.generar_pdf_biopsias") }}', // Cambia esta ruta según tu backend
    //     method: 'get',
    //     data: {
    //         id:id,
    //         id_ficha_atencion: $('#id_fc').val()
    //     },
    //     success: function(response) {
    //         console.log(response);
    //         if (response.success) {

    //         } else {
    //             alert('Ocurrió un error al eliminar el examen.');
    //         }
    //     },
    //     error: function(xhr) {
    //         console.log(xhr.responseText);
    //         alert('Error al eliminar examen.');
    //     }
    // });
    var data ='id_ficha_atencion='+$('#id_fc').val()+'&id='+id;
    Fancybox.show(
        [
            {
            src: '{{ route("profesional.generar_pdf_biopsias") }}?'+data,
            type: "iframe",
            preload: false,
            },
        ]
    );
}

// Función para descargar PDF desde URL directa
function descargar_pdf_biopsia(pdfUrl) {
    if (!pdfUrl) {
        swal({
            icon: 'warning',
            title: 'PDF no disponible',
            text: 'El PDF aún no ha sido generado.',
        });
        return;
    }

    // Abrir en nueva ventana o descargar
    Fancybox.show(
        [
            {
                src: pdfUrl,
                type: "iframe",
                preload: false,
            },
        ]
    );
}

 function dame_examenes_biopsia(){
            let id_ficha_atencion = $('#id_fc').val();
            console.log(id_ficha_atencion);
            let url = "{{ ROUTE('profesional.dame_examenes_biopsia') }}";

            $.ajax({
                type:'get',
                data:{
                    id_ficha_atencion: id_ficha_atencion,
                },
                url: url,
                success: function(examenes){
                    console.log(examenes);
                    var tabla = $('#table_ex_biopsias').DataTable();
                    tabla.clear().draw();
                    if(examenes.length > 0){
                        examenes.forEach(e => {
                            agregarFilaBiopsia(e);
                        });
                    }
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

// Función para imprimir cada frasco
function imprimirFrasco(numeroFrasco) {
    let zona = $('#zona' + numeroFrasco).val();
    let fecha = $('#fecha_biopsia').val();
    let n_orden = $('#n_orden_biopsia').val();
    let patologo = $('#patologo_biopsia').val();
    let nombre_paciente = $('#nombre_completo_paciente').text().trim().replace(/\s+/g, ' ');
    let rut_paciente = $('#rut_paciente_fc').val() || '';
    let nombre_responsable = $('#nombre_usuario_fc').text().trim();

    if(zona.trim() === '') {
        swal({
            title: "Frasco vacío",
            text: "Debe ingresar una zona para el Frasco " + numeroFrasco,
            icon: "warning",
            buttons: "Aceptar",
        });
        return;
    }

    // Crear ventana de impresión
    let ventana = window.open('', '', 'width=800,height=600');
    let contenido = `
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Frasco ${numeroFrasco}</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 40px;
                    text-align: center;
                }
                .contenedor {
                    border: 2px solid #333;
                    padding: 40px;
                    margin: 20px auto;
                    max-width: 400px;
                    page-break-inside: avoid;
                }
                .titulo {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 30px;
                    text-decoration: underline;
                }
                .dato {
                    font-size: 14px;
                    margin: 15px 0;
                    text-align: left;
                }
                .zona-texto {
                    font-size: 16px;
                    font-weight: bold;
                    margin-top: 40px;
                    padding: 20px;
                    background-color: #f0f0f0;
                    border: 1px solid #999;
                    word-wrap: break-word;
                }
                .codigo-barras {
                    margin-top: 30px;
                    font-size: 12px;
                }
                @media print {
                    body { margin: 0; }
                }
            </style>
        </head>
        <body>
            <div class="contenedor">
                <div class="titulo">FRASCO ${numeroFrasco} - BIOPSIA</div>

                <div class="dato">
                    <strong>Paciente:</strong> ${nombre_paciente}
                </div>

                <div class="dato">
                    <strong>RUT:</strong> ${rut_paciente}
                </div>

                <div class="dato">
                    <strong>Fecha:</strong> ${fecha}
                </div>

                <div class="dato">
                    <strong>Nº Orden:</strong> ${n_orden}
                </div>

                <div class="dato">
                    <strong>Patólogo/Laboratorio:</strong> ${patologo}
                </div>

                <div class="dato">
                    <strong>Patólogo/Laboratorio:</strong> ${patologo}
                </div>

                <div class="dato">
                    <strong>Responsable:</strong> ${nombre_responsable}
                </div>

                <div class="zona-texto">
                    <strong>Zona de toma de muestra:</strong><br>
                    ${zona}
                </div>

                <div class="codigo-barras">
                    Frasco: ${numeroFrasco} | Fecha: ${fecha}
                </div>

            </div>
        </body>
        </html>
    `;

    ventana.document.write(contenido);
    ventana.document.close();
    ventana.print();
}
</script>
