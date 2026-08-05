/* =============================================================================
   ICONOS SDI - Motor de la libreria
   =============================================================================

   QUE HACE ESTE ARCHIVO
   ---------------------
   1. Descarga sprite.svg una sola vez y lo inserta escondido dentro del <body>.
      (Esto es lo que soluciona el problema conocido de Safari, que no permite
       usar <use> apuntando a un archivo SVG externo.)

   2. Busca todas las etiquetas <i class="sdi sdi-nombre"></i> de la pagina
      y les inserta adentro el dibujo del icono.

   3. Queda vigilando la pagina: si mas adelante aparecen iconos nuevos
      (por ejemplo dentro de un modal o de una tabla cargada por AJAX),
      los dibuja automaticamente tambien.

   NO NECESITA jQuery NI NINGUNA OTRA LIBRERIA.

   ========================================================================== */

(function () {
    'use strict';

    // -------------------------------------------------------------------------
    // CONFIGURACION
    // -------------------------------------------------------------------------

    /** Prefijo de las clases. Debe coincidir con el usado en build.php */
    var PREFIJO = 'sdi';

    /** Espacios de nombres que exige el estandar SVG */
    var NS_SVG   = 'http://www.w3.org/2000/svg';
    var NS_XLINK = 'http://www.w3.org/1999/xlink';


    // -------------------------------------------------------------------------
    // 1. AVERIGUAR DONDE ESTA sprite.svg
    // -------------------------------------------------------------------------
    // Se deduce solo, a partir de la ruta de este mismo archivo .js.
    // Tambien se puede indicar a mano asi:
    //     <script src=".../sdi-icons.js" data-sprite="/images/iconos-sdi/sprite.svg"></script>
    // -------------------------------------------------------------------------

    var etiquetaScript = document.currentScript || (function () {
        var todos = document.getElementsByTagName('script');
        return todos[todos.length - 1];
    })();

    var rutaSprite = etiquetaScript ? etiquetaScript.getAttribute('data-sprite') : null;

    if (!rutaSprite && etiquetaScript && etiquetaScript.src) {
        // Cambia "sdi-icons.js" por "sprite.svg" manteniendo la misma carpeta
        rutaSprite = etiquetaScript.src.replace(/[^\/]+$/, 'sprite.svg');
    }


    // -------------------------------------------------------------------------
    // 2. FUNCIONES DE APOYO
    // -------------------------------------------------------------------------

    /**
     * Lee las clases de un elemento y devuelve el nombre del icono.
     * Ejemplo: class="sdi sdi-lock text-danger"  ->  "sdi-lock"
     *
     * Devuelve null si no encuentra ninguna (por ejemplo si solo tiene
     * clases de tamano como sdi-lg).
     */
    function obtenerNombreIcono(elemento) {
        var clases = elemento.className;

        // En los SVG className no es texto, por eso se valida
        if (typeof clases !== 'string') {
            clases = elemento.getAttribute('class') || '';
        }

        var lista = clases.split(/\s+/);

        // Clases que son de tamano, color o efecto: NO son nombres de icono
        var noSonIconos = /^(sdi|sdi-(xs|sm|lg|xl|[2-4]x|16|20|24|32|48|64|fw|espacio|espacio-izq|circulo|girar|latido|primary|info|success|danger|warning|purple|dark|muted|white|rotar-90|rotar-180|rotar-270|espejo-h|espejo-v))$/;

        for (var i = 0; i < lista.length; i++) {
            var clase = lista[i];

            if (clase.indexOf(PREFIJO + '-') === 0 && !noSonIconos.test(clase)) {
                return clase;
            }
        }

        return null;
    }


    /**
     * Crea el dibujo (<svg><use></use></svg>) que apunta al icono del sprite.
     */
    function crearDibujo(nombreIcono) {
        var svg = document.createElementNS(NS_SVG, 'svg');
        var use = document.createElementNS(NS_SVG, 'use');

        // href es el estandar actual; xlink:href se agrega por compatibilidad
        // con navegadores antiguos (Safari viejo, Edge Legacy).
        use.setAttribute('href', '#' + nombreIcono);
        use.setAttributeNS(NS_XLINK, 'xlink:href', '#' + nombreIcono);

        svg.setAttribute('focusable', 'false');
        svg.appendChild(use);

        return svg;
    }


    /**
     * Dibuja un icono dentro de una etiqueta que todavia esta vacia.
     */
    function dibujarIcono(elemento) {
        // Si ya tiene el dibujo adentro, no se hace nada (evita duplicados)
        if (elemento.querySelector('svg')) {
            return;
        }

        var nombreIcono = obtenerNombreIcono(elemento);

        if (!nombreIcono) {
            return;
        }

        // ---------------------------------------------------------------------
        // ACCESIBILIDAD
        // ---------------------------------------------------------------------
        // Si el icono NO tiene texto propio (aria-label o title), significa que
        // es decorativo: se oculta a los lectores de pantalla para no molestar.
        //
        // Si SI tiene texto, se marca como imagen con significado para que el
        // lector de pantalla lo lea.
        // ---------------------------------------------------------------------
        var tieneTexto = elemento.hasAttribute('aria-label') ||
                         elemento.hasAttribute('title');

        if (tieneTexto) {
            elemento.setAttribute('role', 'img');
        } else {
            elemento.setAttribute('aria-hidden', 'true');
        }

        elemento.appendChild(crearDibujo(nombreIcono));
    }


    /**
     * Recorre un trozo de la pagina y dibuja todos los iconos que encuentre.
     */
    function dibujarIconosDe(contenedor) {
        if (!contenedor || !contenedor.querySelectorAll) {
            return;
        }

        var iconos = contenedor.querySelectorAll('.' + PREFIJO);

        for (var i = 0; i < iconos.length; i++) {
            dibujarIcono(iconos[i]);
        }
    }


    // -------------------------------------------------------------------------
    // 3. DESCARGAR E INSERTAR EL SPRITE
    // -------------------------------------------------------------------------

    function cargarSprite(cuandoTermine) {
        // Si el sprite ya fue insertado antes, no se descarga de nuevo
        if (document.getElementById(PREFIJO + '-sprite')) {
            cuandoTermine();
            return;
        }

        if (!rutaSprite) {
            console.warn('[Iconos SDI] No se pudo determinar la ruta de sprite.svg. ' +
                         'Agrega el atributo data-sprite en la etiqueta <script>.');
            return;
        }

        // Se usa XMLHttpRequest (y no fetch) porque funciona en todos los
        // navegadores, incluidos los mas antiguos, sin necesidad de parches.
        var peticion = new XMLHttpRequest();

        peticion.open('GET', rutaSprite, true);

        peticion.onload = function () {
            if (peticion.status < 200 || peticion.status >= 300) {
                console.warn('[Iconos SDI] No se pudo cargar sprite.svg (codigo ' + peticion.status + ')');
                return;
            }

            var contenedor = document.createElement('div');

            contenedor.id = PREFIJO + '-sprite';
            contenedor.innerHTML = peticion.responseText;

            // Se esconde visualmente pero sigue disponible para <use>.
            // No se usa display:none porque algunos navegadores antiguos
            // dejan de resolver las referencias en ese caso.
            contenedor.style.cssText = 'position:absolute;width:0;height:0;overflow:hidden;';
            contenedor.setAttribute('aria-hidden', 'true');

            document.body.insertBefore(contenedor, document.body.firstChild);

            cuandoTermine();
        };

        peticion.onerror = function () {
            console.warn('[Iconos SDI] Error de red al cargar sprite.svg');
        };

        peticion.send();
    }


    // -------------------------------------------------------------------------
    // 4. VIGILAR LA PAGINA
    // -------------------------------------------------------------------------
    // Este sistema carga mucho contenido con AJAX (modales, tablas, fichas).
    // Este observador se encarga de dibujar los iconos que aparezcan despues.
    // -------------------------------------------------------------------------

    function vigilarCambios() {
        if (!window.MutationObserver) {
            return; // Navegador muy antiguo: los iconos iniciales igual funcionan
        }

        var observador = new MutationObserver(function (cambios) {
            for (var i = 0; i < cambios.length; i++) {
                var agregados = cambios[i].addedNodes;

                for (var j = 0; j < agregados.length; j++) {
                    var nodo = agregados[j];

                    // Solo interesan los elementos HTML (tipo 1)
                    if (nodo.nodeType !== 1) {
                        continue;
                    }

                    // El elemento agregado puede ser el icono en si...
                    if (nodo.classList && nodo.classList.contains(PREFIJO)) {
                        dibujarIcono(nodo);
                    }

                    // ...o puede ser un bloque que contiene iconos adentro
                    dibujarIconosDe(nodo);
                }
            }
        });

        observador.observe(document.body, {
            childList: true,
            subtree: true
        });
    }


    // -------------------------------------------------------------------------
    // 5. PUESTA EN MARCHA
    // -------------------------------------------------------------------------

    function iniciar() {
        cargarSprite(function () {
            dibujarIconosDe(document);
            vigilarCambios();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciar);
    } else {
        iniciar();
    }


    // -------------------------------------------------------------------------
    // 6. FUNCION PUBLICA (opcional)
    // -------------------------------------------------------------------------
    // Si alguna vez insertas iconos con JavaScript y quieres forzar que se
    // dibujen de inmediato, puedes llamar:
    //
    //     SdiIconos.actualizar();
    //     SdiIconos.actualizar(document.getElementById('mi-modal'));
    // -------------------------------------------------------------------------

    window.SdiIconos = {
        actualizar: function (contenedor) {
            dibujarIconosDe(contenedor || document);
        }
    };

})();
