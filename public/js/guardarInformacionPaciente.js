/**
 * Funciones globales para guardar la información del paciente.
 * Se carga desde un script externo y usa la ruta definida en header.
 */
(function(window, $) {
    'use strict';

    function getCsrfToken() {
        var tokenElement = document.querySelector('meta[name="csrf-token"]');
        return tokenElement ? tokenElement.getAttribute('content') : null;
    }

    window.editarInformacionPaciente = function() {
        $('#modal_editar_paciente').modal('show');
        $('#info_paciente').css('display', 'none');
        $('#info_paciente-edit').css('display', 'block');
    };

    window.cancelarInformacionPaciente = function() {
        $('#info_paciente').css('display', 'block');
        $('#info_paciente-edit').css('display', 'none');
    };

    function getErrorMessageFromResponse(jqXHR) {
        if (jqXHR && jqXHR.responseJSON) {
            if (jqXHR.responseJSON.msj) {
                return jqXHR.responseJSON.msj;
            }

            if (jqXHR.responseJSON.message) {
                return jqXHR.responseJSON.message;
            }
        }

        if (jqXHR && jqXHR.responseText) {
            try {
                var parsedResponse = JSON.parse(jqXHR.responseText);
                if (parsedResponse && parsedResponse.msj) {
                    return parsedResponse.msj;
                }

                if (parsedResponse && parsedResponse.message) {
                    return parsedResponse.message;
                }
            } catch (e) {
                return jqXHR.responseText;
            }
        }

        return 'No se pudo completar la actualización. Intente nuevamente.';
    }

    function getDireccionPaciente(paciente) {
        if (!paciente) {
            return 'Sin información';
        }

        var direccion = '';

        if (typeof paciente.direccion === 'string' && paciente.direccion.trim()) {
            direccion = paciente.direccion.trim();
        } else if (paciente.direccion && typeof paciente.direccion === 'object') {
            if (paciente.direccion.direccion && paciente.direccion.direccion.trim()) {
                direccion = paciente.direccion.direccion.trim();
            }
        } else if (paciente.direccion_text && paciente.direccion_text.trim()) {
            direccion = paciente.direccion_text.trim();
        }

        if (paciente.numero_direccion && paciente.numero_direccion.trim()) {
            direccion = direccion ? direccion + ' ' + paciente.numero_direccion.trim() : paciente.numero_direccion.trim();
        }

        return direccion || 'Sin información';
    }

    window.guardarInformacionPaciente = function() {
        var CSRF_TOKEN = getCsrfToken();
        var id_paciente = $('#id_paciente').val();
        var nombres = $('#paciente_nombre_edit').val();
        var apellido_uno = $('#paciente_apellido_uno_edit').val();
        var apellido_dos = $('#paciente_apellido_dos_edit').val();
        var fecha_nac = $('#paciente_fn_edit').val();
        var sexo = $('#paciente_sexo_edit').val();
        var direccion = $('#paciente_dir_edit').val();
        var region = $('#paciente_region_edit').val();
        var comuna = $('#paciente_comuna_edit').val();
        var email = $('#paciente_email_edit').val();
        var telefono = $('#paciente_telefono_edit').val();
        var convenio = $('#paciente_convenio_edit').val();

        var data = {
            id: id_paciente,
            nombre: nombres,
            apellido_uno: apellido_uno,
            apellido_dos: apellido_dos,
            fecha_nacimiento: fecha_nac,
            sexo: sexo,
            direccion: direccion,
            region: region,
            ciudad: comuna,
            email: email,
            telefono: telefono,
            convenio: convenio,
            _token: CSRF_TOKEN
        };

        var url = window.GUARDAR_PACIENTE_URL || '';

        if (!url) {
            console.error('Guardar informacion paciente URL no está definida.');
            return;
        }

        $.ajax({
            url: url,
            type: 'get',
            data: data,
        })
        .done(function(data) {
            console.log('Respuesta del servidor:', data);
            if (data && data.estado == 1) {
                var paciente = data.paciente;
                var direccion = getDireccionPaciente(paciente);

                $('#nombre_completo_paciente').text(paciente.nombres + ' ' + paciente.apellido_uno + ' ' + paciente.apellido_dos);
                $('#fecha_nac_paciente').text(paciente.fecha_nac);
                $('#sexo_paciente').text(paciente.sexo == 'M' ? 'Masculino' : 'Femenino');
                $('#email_paciente_').text(paciente.email);
                $('#telefono_paciente_').text(paciente.telefono_uno);
                $('#comuna_region_paciente').html(paciente.ciudad + '<br> ' + paciente.region);
                $('#prevision_paciente').text(paciente.prevision ? paciente.prevision : 'Sin información');
                $('#direccion_paciente_').text(direccion);

                swal({
                    title: 'Actualización de Paciente',
                    text: 'Actualización Exitosa',
                    icon: 'success',
                });

                window.cancelarInformacionPaciente();
                return;
            }

            swal({
                title: 'Actualización de Paciente',
                text: 'Falla en Actualización.\nIntente de nuevo.',
                icon: 'error',
            });
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            var mensaje = getErrorMessageFromResponse(jqXHR);
            console.log(jqXHR, ajaxOptions, thrownError);

            swal({
                title: 'Actualización de Paciente',
                text: mensaje,
                icon: 'error',
            });
        });
    };

    /* Contacto de emergencia - editar / cancelar / guardar / buscar ciudades */
    window.editarInformacionContacto = function() {
        $('#modal_editar_contacto').modal('show');
        $('#info_contacto').css('display', 'none');
        $('#info_contacto-edit').css('display', 'block');
    };

    window.cancelarInformacionContacto = function() {
        $('#info_contacto').css('display', 'block');
        $('#info_contacto-edit').css('display', 'none');
    };

    window.guardarInformacionContacto = function() {
        var CSRF_TOKEN = getCsrfToken();

        var id_paciente = $('#id_paciente').val();
        var rut = $('#contacto_rut_edit').val();
        var nombre = $('#contacto_nombre_edit').val();
        var apellido_uno = $('#contacto_apellido_uno').val();
        var apellido_dos = $('#contacto_apellido_dos').val();
        var fn = $('#contacto_fn_edit').val();
        var sexo = $('#contacto_sexo_edit').val();
        var direccion = $('#contacto_dir_edit').val();
        var region = $('#contacto_region_edit').val();
        var comuna = $('#contacto_comuna_edit').val();
        var parentezco = $('#parentezco_contacto_emergencia').val();
        var telefono = $('#contacto_telefono_edit').val().trim();
        var email = $('#contacto_email_edit').val().trim();

        if (!telefono && !email) {
            swal({
                title: 'Datos incompletos',
                text: 'Debe ingresar al menos un teléfono o un correo electrónico.',
                icon: 'warning',
                buttons: 'Aceptar'
            });

            return;
        }

        var data = {
            id_paciente: id_paciente,
            rut: rut,
            nombre: nombre,
            apellido_uno: apellido_uno,
            apellido_dos: apellido_dos,
            fn: fn,
            sexo: sexo,
            direccion: direccion,
            region: region,
            comuna: comuna,
            email: email,
            telefono: telefono,
            parentezco: parentezco,
            _token: CSRF_TOKEN
        };

        var url = window.GUARDAR_CONTACTO_EMERGENCIA_URL || '';
        if (!url) {
            console.error('Guardar contacto URL no está definida.');
            return;
        }

        $.ajax({
            url: url,
            type: 'post',
            data: data,
        })
        .done(function(data) {
            console.log('Respuesta del servidor:', data);
            try {
                if (typeof data === 'string') data = JSON.parse(data);
            } catch (e) {}

            if (data && data.estado == 1) {
                var contacto = data.contacto || data.contactoEmergencia || {};

                var direccionTexto = 'Sin información';
                if (data.direccion && data.direccion.direccion) {
                    // respuesta antigua con estructura anidada
                    try {
                        direccionTexto = data.direccion.direccion.direccion || direccionTexto;
                    } catch (e) {}
                } else if (contacto) {
                    direccionTexto = getDireccionPaciente(contacto);
                }

                $('#nombre_completo_contacto').text((contacto.nombres || '') + ' ' + (contacto.apellido_uno || ''));
                $('#apellidos_contacto').text((contacto.apellido_uno || '') + ' ' + (contacto.apellido_dos || ''));
                $('#direccion_contacto').text(direccionTexto);
                $('#email_contacto_').text(contacto.email || '');
                $('#telefono_contacto').text(contacto.telefono_uno || '');
                $('#comuna_region_contacto').html((contacto.ciudad || '') + '<br> ' + (contacto.region || ''));

                swal({
                    title: 'Actualización de Contacto',
                    text: 'Actualización Exitosa',
                    icon: 'success',
                });

                window.cancelarInformacionContacto();
                return;
            }

            var mensaje = (data && data.msj) ? data.msj : 'Falla en Actualización. Intente de nuevo.';
            swal({
                title: 'Actualización de Contacto',
                text: mensaje,
                icon: 'error',
            });
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            var mensaje = getErrorMessageFromResponse(jqXHR);
            console.log(jqXHR, ajaxOptions, thrownError);

            swal({
                title: 'Actualización de Contacto',
                text: mensaje,
                icon: 'error',
            });
        });
    };


    window.limpiarCamposContactoEmergencia = function(mantenerRut = true) {
        const rutActual = $('#contacto_rut_edit').val();

        $('#contacto_nombre_edit').val('');
        $('#contacto_apellido_uno').val('');
        $('#contacto_apellido_dos').val('');
        $('#contacto_email_edit').val('');
        $('#contacto_telefono_edit').val('');
        $('#contacto_fn_edit').val('');
        $('#contacto_sexo_edit').val('');
        $('#contacto_dir_edit').val('');
        $('#contacto_region_edit').val('0');
        $('#contacto_comuna_edit').html('<option value="0">Seleccione comuna</option>');
        $('#parentezco_contacto_emergencia').val('');

        if (mantenerRut) {
            $('#contacto_rut_edit').val(rutActual);
        } else {
            $('#contacto_rut_edit').val('');
        }
    }

    window.buscarRutContactoEmergencia = function() {
        const rut = $('#contacto_rut_edit').val().trim();

        if (!rut) {
            swal({ title: 'Ingrese un RUT para buscar', icon: 'warning', buttons: 'Aceptar' });
            return;
        }

        limpiarCamposContactoEmergencia(true);

        $('#mensaje_busqueda_contacto').text('Buscando paciente...').removeClass('text-success text-danger').addClass('text-muted');

        $.ajax({
            url: window.BUSCAR_RUT_CONTACTO_URL,
            type: 'GET',
            data: { rut: rut }
        })
        .done(function(response) {
            let data = response;

            if (typeof response === 'string') {
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    data = null;
                }
            }

            if (!data || data === 'null' || data === null) {
                limpiarCamposContactoEmergencia(true);
                $('#mensaje_busqueda_contacto').text('No se encontró un paciente con ese RUT.').removeClass('text-muted').addClass('text-danger');
                swal({ title: 'No se encontró un paciente con ese RUT', icon: 'warning', buttons: 'Aceptar' });
                return;
            }

            if (data.tipo_paciente === 'NO') {
                limpiarCamposContactoEmergencia(true);
                $('#mensaje_busqueda_contacto').text('El RUT no corresponde a un paciente activo.').removeClass('text-muted').addClass('text-danger');
                swal({ title: 'El RUT no corresponde a un paciente activo', icon: 'info', buttons: 'Aceptar' });
                return;
            }

            const nombres = data.nombres || data.nombre || '';
            const apellidoUno = data.apellido_uno || '';
            const apellidoDos = data.apellido_dos || '';
            const email = data.email || '';
            const telefono = data.telefono_uno || data.telefono || '';
            const fechaNac = data.fecha_nac || '';
            const sexo = data.sexo || '';

            $('#contacto_nombre_edit').val(nombres);
            $('#contacto_apellido_uno').val(apellidoUno);
            $('#contacto_apellido_dos').val(apellidoDos);
            $('#contacto_email_edit').val(email);
            $('#contacto_telefono_edit').val(telefono);
            $('#contacto_fn_edit').val(fechaNac);
            $('#contacto_sexo_edit').val(sexo);
            $('#contacto_rut_edit').val(data.rut || rut);

            let direccion = '';
            let numeroDir = '';
            let ciudad = null;
            let regionId = null;
            let ciudadId = null;

            if (data.Direccion) {
                const direccionData = Array.isArray(data.Direccion) ? data.Direccion[0] : data.Direccion;
                if (direccionData) {
                    direccion = direccionData.direccion || '';
                    numeroDir = direccionData.numero_dir || '';
                    ciudad = direccionData.Ciudad || direccionData.ciudad || null;
                }
            }

            if (ciudad) {
                ciudadId = ciudad.id || '';
                regionId = ciudad.id_region || (ciudad.Region ? ciudad.Region.id : null);
            }

            $('#contacto_dir_edit').val([direccion, numeroDir].filter(Boolean).join(' ').trim());

            if (regionId) {
                $('#contacto_region_edit').val(regionId);
                buscarCiudadContactoEmergencia(ciudadId);
            } else {
                $('#contacto_region_edit').val('0');
                $('#contacto_comuna_edit').html('<option value="0">Seleccione comuna</option>');
            }

            $('#mensaje_busqueda_contacto').text('Datos del paciente cargados correctamente.').removeClass('text-muted text-danger').addClass('text-success');
            swal({ title: 'Paciente encontrado', text: 'Se completaron los datos del formulario.', icon: 'success', buttons: 'Aceptar' });
        })
        .fail(function(xhr) {
            console.error(xhr);
            limpiarCamposContactoEmergencia(true);
            $('#mensaje_busqueda_contacto').text('No se pudo completar la búsqueda.').removeClass('text-muted').addClass('text-danger');
            swal({ title: 'Error al buscar el paciente', icon: 'error', buttons: 'Aceptar' });
        });
    }

    window.buscarCiudadContactoEmergencia = function(ciudadId = 0) {
        const region = $('#contacto_region_edit').val();

        if (!region || region === '0') {
            $('#contacto_comuna_edit').html('<option value="0">Seleccione comuna</option>');
            return;
        }

        $.ajax({
            url: "{{ route('buscar_ciudad_region') }}",
            type: 'GET',
            data: { region: region }
        })
        .done(function(response) {
            let data = response;

            if (typeof response === 'string') {
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    data = [];
                }
            }

            const ciudades = $('#contacto_comuna_edit');
            ciudades.find('option').remove();
            ciudades.append('<option value="0">Seleccione comuna</option>');

            $(data).each(function(i, v) {
                ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
            });

            if (ciudadId) {
                ciudades.val(ciudadId);
            }
        });
    }

    window.buscar_ciudad_contacto = function(id_ciudad = 0) {
        var region = $('#contacto_region_edit').val();
        var url = window.BUSCAR_CIUDADES_REGION_URL || '';
        if (!url) {
            console.error('Buscar ciudades URL no está definida.');
            return;
        }

        $.ajax({
            url: url,
            type: 'get',
            data: { region: region },
        })
        .done(function(data) {
            try {
                if (typeof data === 'string') data = JSON.parse(data);
            } catch (e) {}

            if (data != null) {
                var ciudades = $('#contacto_comuna_edit');
                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });

                if (id_ciudad != 0) ciudades.val(id_ciudad);
            } else {
                swal({
                    title: 'Error',
                    text: 'Error al cargar las ciudades',
                    icon: 'error',
                    buttons: 'Aceptar',
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    };
})(window, jQuery);
