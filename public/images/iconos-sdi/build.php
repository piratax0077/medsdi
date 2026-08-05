<?php
/**
 * =============================================================================
 *  ICONOS SDI - Generador del sprite
 * =============================================================================
 *
 *  QUE HACE ESTE ARCHIVO
 *  ---------------------
 *  Lee todos los archivos .svg de la carpeta /svg, los limpia y optimiza,
 *  y con ellos genera dos archivos:
 *
 *      1. sprite.svg  -> un solo archivo con todos los iconos (lo que usa la web)
 *      2. demo.html   -> el catalogo visual para copiar y pegar
 *
 *  COMO SE USA
 *  -----------
 *  Opcion A (la mas facil): abrir en el navegador
 *      http://medsdi.test/images/iconos-sdi/build.php
 *
 *  Opcion B: por consola, parado en esta carpeta
 *      php build.php
 *
 *  Cada vez que agregues, borres o renombres un .svg en /svg,
 *  vuelve a ejecutar este archivo. Nada mas.
 *
 * =============================================================================
 */

// -----------------------------------------------------------------------------
// SEGURIDAD: por navegador solo se permite desde el computador local.
// Esto evita que alguien pueda ejecutar el generador desde internet.
// -----------------------------------------------------------------------------
$esConsola = (php_sapi_name() === 'cli');

if (!$esConsola) {
    $ipsLocales = ['127.0.0.1', '::1', 'localhost'];
    $ipCliente  = $_SERVER['REMOTE_ADDR'] ?? '';

    if (!in_array($ipCliente, $ipsLocales, true)) {
        http_response_code(403);
        exit('Este generador solo puede ejecutarse de forma local.');
    }

    header('Content-Type: text/html; charset=utf-8');
    echo '<meta charset="utf-8"><pre style="font:14px/1.6 monospace;padding:20px;">';
}

// -----------------------------------------------------------------------------
// CONFIGURACION
// -----------------------------------------------------------------------------
$carpetaBase   = __DIR__;
$carpetaSvg    = $carpetaBase . '/svg';
$archivoSprite = $carpetaBase . '/sprite.svg';
$archivoDemo   = $carpetaBase . '/demo.html';

/** Prefijo de las clases y de los id dentro del sprite. Ej: sdi-lock */
$prefijo = 'sdi';


// -----------------------------------------------------------------------------
// FUNCIONES DE APOYO
// -----------------------------------------------------------------------------

/**
 * Convierte el nombre de un archivo a un nombre de icono valido (kebab-case).
 * Ejemplo: "Flujo_Caja 2.svg"  ->  "flujo-caja-2"
 */
function nombreIcono(string $archivo): string
{
    $nombre = pathinfo($archivo, PATHINFO_FILENAME);
    $nombre = mb_strtolower($nombre, 'UTF-8');

    // Acentos y enies -> letras simples (para no romper los selectores CSS)
    $nombre = strtr($nombre, [
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'ñ' => 'n',
    ]);

    // Cualquier cosa que no sea letra o numero se vuelve guion
    $nombre = preg_replace('/[^a-z0-9]+/', '-', $nombre);

    return trim($nombre, '-');
}

/**
 * Toma el bloque <style> que Illustrator deja dentro del SVG
 * (por ejemplo: .st0{fill:#FFF;opacity:0.5;} ) y devuelve un arreglo
 * con la forma:  ['st0' => 'fill:#FFF;opacity:0.5']
 *
 * POR QUE ES NECESARIO
 * Todos los SVG exportados desde Illustrator usan los mismos nombres de clase
 * (.st0, .st1, .st2...). Si se juntan tal cual en un solo sprite, los colores
 * de un icono terminan aplicandose a otro. Por eso convertimos esas clases a
 * estilos propios de cada forma y eliminamos el bloque <style>.
 */
function extraerEstilos(string $svg): array
{
    $mapa = [];

    if (preg_match_all('/<style[^>]*>(.*?)<\/style>/is', $svg, $bloques)) {
        foreach ($bloques[1] as $css) {
            // Busca reglas del tipo  .st0{ ... }
            if (preg_match_all('/\.([a-zA-Z0-9_-]+)\s*\{([^}]*)\}/', $css, $reglas, PREG_SET_ORDER)) {
                foreach ($reglas as $regla) {
                    $clase         = $regla[1];
                    $declaraciones = trim(preg_replace('/\s+/', ' ', $regla[2]));
                    $declaraciones = rtrim($declaraciones, '; ');

                    $mapa[$clase] = $declaraciones;
                }
            }
        }
    }

    return $mapa;
}

/**
 * Reemplaza cualquier color por "currentColor", que es lo que permite
 * que el icono tome el color del texto (y por lo tanto que funcionen
 * clases como text-danger, text-primary, etc.).
 *
 * Importante: NO toca "fill:none" ni "stroke:none", porque esos valores
 * son parte del dibujo (huecos y contornos) y romperian la figura.
 */
function aplicarCurrentColor(string $svg): string
{
    // Formato atributo:  fill="#1A49A3"  ->  fill="currentColor"
    $svg = preg_replace('/(fill|stroke)="(#[0-9A-Fa-f]{3,8}|rgb\([^)]*\)|black|white|[A-Za-z]+)"/', '$1="currentColor"', $svg);

    // Formato estilo:    fill:#1A49A3;   ->  fill:currentColor;
    $svg = preg_replace('/(fill|stroke)\s*:\s*(#[0-9A-Fa-f]{3,8}|rgb\([^)]*\)|black|white)/i', '$1:currentColor', $svg);

    // Restaura los "none", que el paso anterior pudo haber pisado
    $svg = str_replace(
        ['fill="currentColor" /*none*/', 'stroke="currentColor" /*none*/'],
        ['fill="none"', 'stroke="none"'],
        $svg
    );

    return $svg;
}

/**
 * Limpia y optimiza el contenido de un SVG, y lo devuelve listo para
 * insertarse dentro del sprite como <symbol>.
 *
 * Devuelve null si el archivo no se puede procesar.
 */
function procesarSvg(string $ruta, string $nombre): ?array
{
    $svg = file_get_contents($ruta);

    if ($svg === false || trim($svg) === '') {
        return null;
    }

    // 1. Protegemos los "none" para que aplicarCurrentColor() no los cambie
    $svg = preg_replace('/(fill|stroke)="none"/i', '$1="__NONE__"', $svg);
    $svg = preg_replace('/(fill|stroke)\s*:\s*none/i', '$1:__NONE__', $svg);

    // 2. Leemos el viewBox (define la proporcion del icono)
    $viewBox = '0 0 24 24';
    if (preg_match('/viewBox="([^"]+)"/i', $svg, $m)) {
        $viewBox = trim($m[1]);
    }

    // 3. Convertimos las clases .st0/.st1 en estilos propios de cada forma
    $estilos = extraerEstilos($svg);

    // 4. Nos quedamos solo con el contenido interno del <svg>
    if (preg_match('/<svg[^>]*>(.*)<\/svg>/is', $svg, $m)) {
        $contenido = $m[1];
    } else {
        return null;
    }

    // 5. Eliminamos todo lo que no dibuja nada (metadata de Illustrator, etc.)
    $contenido = preg_replace('/<!--.*?-->/s', '', $contenido);
    $contenido = preg_replace('/<\?xml.*?\?>/s', '', $contenido);
    $contenido = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $contenido);
    $contenido = preg_replace('/<metadata>.*?<\/metadata>/is', '', $contenido);
    $contenido = preg_replace('/<title>.*?<\/title>/is', '', $contenido);
    $contenido = preg_replace('/<desc>.*?<\/desc>/is', '', $contenido);

    // 6. Aplicamos los estilos que estaban en el bloque <style>
    //    directamente sobre cada elemento que usaba esa clase.
    foreach ($estilos as $clase => $declaraciones) {
        $contenido = preg_replace(
            '/\sclass="' . preg_quote($clase, '/') . '"/',
            ' style="' . $declaraciones . '"',
            $contenido
        );
    }

    // 7. Los id internos (clipPath, mask...) se renombran con el nombre del
    //    icono adelante, para que dos iconos no choquen entre si dentro
    //    del mismo sprite.
    if (preg_match_all('/id="([^"]+)"/', $contenido, $ids)) {
        foreach (array_unique($ids[1]) as $idOriginal) {
            $idNuevo   = $nombre . '-' . $idOriginal;
            $contenido = str_replace('id="' . $idOriginal . '"', 'id="' . $idNuevo . '"', $contenido);
            $contenido = str_replace('url(#' . $idOriginal . ')', 'url(#' . $idNuevo . ')', $contenido);
            $contenido = str_replace('xlink:href="#' . $idOriginal . '"', 'xlink:href="#' . $idNuevo . '"', $contenido);
        }
    }

    // 8. Todos los colores pasan a currentColor
    $contenido = aplicarCurrentColor($contenido);

    // 9. Devolvemos los "none" a su valor real
    $contenido = str_replace('__NONE__', 'none', $contenido);

    // 10. Compactamos: quitamos saltos de linea y espacios repetidos
    $contenido = preg_replace('/\s+/', ' ', $contenido);
    $contenido = preg_replace('/>\s+</', '><', $contenido);
    $contenido = trim($contenido);

    if ($contenido === '') {
        return null;
    }

    return [
        'viewBox'   => $viewBox,
        'contenido' => $contenido,
    ];
}


// -----------------------------------------------------------------------------
// PROCESO PRINCIPAL
// -----------------------------------------------------------------------------

echo "=====================================\n";
echo "  ICONOS SDI - generando sprite\n";
echo "=====================================\n\n";

if (!is_dir($carpetaSvg)) {
    exit("ERROR: no existe la carpeta /svg\n");
}

$archivos = glob($carpetaSvg . '/*.svg');
sort($archivos, SORT_NATURAL | SORT_FLAG_CASE);

if (empty($archivos)) {
    exit("ERROR: no hay archivos .svg dentro de la carpeta /svg\n");
}

$iconos     = [];
$descartados = [];
$pesoOriginal = 0;

foreach ($archivos as $ruta) {
    $nombre = nombreIcono(basename($ruta));

    if ($nombre === '') {
        $descartados[] = basename($ruta) . ' (nombre no valido)';
        continue;
    }

    if (isset($iconos[$nombre])) {
        $descartados[] = basename($ruta) . ' (nombre repetido)';
        continue;
    }

    $resultado = procesarSvg($ruta, $nombre);

    if ($resultado === null) {
        $descartados[] = basename($ruta) . ' (no se pudo leer)';
        continue;
    }

    $pesoOriginal    += filesize($ruta);
    $iconos[$nombre]  = $resultado;

    echo "  OK  " . str_pad($nombre, 32) . " viewBox: {$resultado['viewBox']}\n";
}

if (empty($iconos)) {
    exit("\nERROR: ningun icono pudo procesarse.\n");
}

// -----------------------------------------------------------------------------
// 1. Generar sprite.svg
// -----------------------------------------------------------------------------
$sprite  = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none">';

foreach ($iconos as $nombre => $datos) {
    $sprite .= '<symbol id="' . $prefijo . '-' . $nombre . '" viewBox="' . $datos['viewBox'] . '">';
    $sprite .= $datos['contenido'];
    $sprite .= '</symbol>';
}

$sprite .= '</svg>';

file_put_contents($archivoSprite, $sprite);

$pesoSprite = strlen($sprite);
$ahorro     = $pesoOriginal > 0 ? round(100 - ($pesoSprite * 100 / $pesoOriginal)) : 0;


// -----------------------------------------------------------------------------
// 2. Generar demo.html (el catalogo visual)
// -----------------------------------------------------------------------------
$tarjetas = '';

foreach ($iconos as $nombre => $datos) {
    $claseCompleta = $prefijo . ' ' . $prefijo . '-' . $nombre;
    $codigoUso     = '<i class="' . $claseCompleta . '"></i>';

    $tarjetas .= '
        <button type="button" class="tarjeta" data-codigo="' . htmlspecialchars($codigoUso, ENT_QUOTES) . '" title="Clic para copiar el codigo">
            <i class="' . $claseCompleta . '"></i>
            <span class="nombre">' . htmlspecialchars($nombre) . '</span>
            <code>' . htmlspecialchars($prefijo . '-' . $nombre) . '</code>
        </button>';
}

$fecha = date('d-m-Y H:i');
$total = count($iconos);

$demo = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Iconos SDI - Catalogo</title>
<link rel="stylesheet" href="sdi-icons.css">
<style>
    :root { --azul:#1a49a3; --gris:#8b93a7; }
    * { box-sizing:border-box; }
    body { font-family:'Nunito',system-ui,-apple-system,'Segoe UI',sans-serif; margin:0; padding:32px; background:#f4f6f9; color:#2b2f3a; }
    h1 { margin:0 0 4px; font-size:1.6rem; }
    .sub { color:var(--gris); margin:0 0 24px; }
    .barra { display:flex; flex-wrap:wrap; gap:12px; align-items:center; margin-bottom:24px; }
    .barra input { flex:1; min-width:220px; padding:10px 14px; border:2px solid var(--azul); border-radius:8px; font-size:.95rem; outline:none; }
    .barra .dato { background:#fff; border-radius:8px; padding:10px 14px; font-size:.85rem; color:var(--gris); }
    .grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:14px; }
    .tarjeta { background:#fff; border:1px solid #eef0f5; border-radius:12px; padding:18px 10px; text-align:center;
               cursor:pointer; font:inherit; transition:.2s; display:flex; flex-direction:column; align-items:center; gap:8px; }
    .tarjeta:hover { border-color:var(--azul); transform:translateY(-2px); box-shadow:0 8px 20px rgba(30,40,80,.08); }
    .tarjeta .sdi { font-size:34px; color:var(--azul); }
    .tarjeta .nombre { font-weight:700; font-size:.85rem; }
    .tarjeta code { font-size:.72rem; color:var(--gris); word-break:break-all; }
    .aviso { position:fixed; left:50%; bottom:28px; opacity:0; visibility:hidden;
             transform:translateX(-50%) translateY(30px);
             background:#1a49a3; color:#fff; padding:12px 22px; border-radius:30px; font-weight:600;
             transition:opacity .25s, transform .25s, visibility .25s; box-shadow:0 8px 24px rgba(30,40,80,.25); }
    .aviso.visible { opacity:1; visibility:visible; transform:translateX(-50%) translateY(0); }
    .vacio { text-align:center; color:var(--gris); padding:40px; display:none; }
    .ejemplos { background:#fff; border-radius:12px; padding:20px; margin-bottom:24px; }
    .ejemplos h2 { font-size:1rem; margin:0 0 14px; }
    .ejemplos .fila { display:flex; flex-wrap:wrap; gap:22px; align-items:flex-end; margin-bottom:20px; }
    .ejemplos .fila:last-child { margin-bottom:0; }
    /* El tamano base va en .item (no en el icono) para que las clases
       sdi-xs / sdi-lg / sdi-2x puedan multiplicarlo y se note la diferencia */
    .ejemplos .item { text-align:center; font-size:22px; }
    .ejemplos .item .sdi { display:block; margin:0 auto 8px; }
    .ejemplos .item span { display:block; font-size:11px; color:var(--gris); }
</style>
</head>
<body>

<h1>Iconos SDI</h1>
<p class="sub">Catalogo generado el $fecha &mdash; haz clic en cualquier icono para copiar su codigo.</p>

<div class="ejemplos">
    <h2>Tamanos</h2>
    <div class="fila">
        <div class="item"><i class="sdi sdi-lock sdi-xs"></i><span>sdi-xs</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-sm"></i><span>sdi-sm</span></div>
        <div class="item"><i class="sdi sdi-lock"></i><span>normal</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-lg"></i><span>sdi-lg</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-xl"></i><span>sdi-xl</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-2x"></i><span>sdi-2x</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-3x"></i><span>sdi-3x</span></div>
    </div>

    <h2>Colores y efectos</h2>
    <div class="fila">
        <div class="item sdi-primary"><i class="sdi sdi-lock"></i><span>sdi-primary</span></div>
        <div class="item sdi-info"><i class="sdi sdi-lock"></i><span>sdi-info</span></div>
        <div class="item sdi-success"><i class="sdi sdi-lock"></i><span>sdi-success</span></div>
        <div class="item sdi-danger"><i class="sdi sdi-lock"></i><span>sdi-danger</span></div>
        <div class="item sdi-warning"><i class="sdi sdi-lock"></i><span>sdi-warning</span></div>
        <div class="item sdi-purple"><i class="sdi sdi-lock"></i><span>sdi-purple</span></div>
        <div class="item sdi-dark"><i class="sdi sdi-lock"></i><span>sdi-dark</span></div>
        <div class="item"><i class="sdi sdi-lock sdi-circulo sdi-primary"></i><span>sdi-circulo</span></div>
        <div class="item"><i class="sdi sdi-reloj-1 sdi-girar sdi-info"></i><span>sdi-girar</span></div>
    </div>
</div>

<div class="barra">
    <input type="search" id="buscador" placeholder="Buscar icono por nombre...">
    <div class="dato"><strong>$total</strong> iconos</div>
    <div class="dato">sprite: <strong>{$pesoSprite} bytes</strong></div>
</div>

<div class="grid" id="grid">$tarjetas
</div>

<p class="vacio" id="vacio">No se encontro ningun icono con ese nombre.</p>

<div class="aviso" id="aviso">Codigo copiado</div>

<script src="sdi-icons.js"></script>
<script>
    // Buscador
    var buscador = document.getElementById('buscador');
    var tarjetas = document.querySelectorAll('.tarjeta');
    var vacio    = document.getElementById('vacio');

    buscador.addEventListener('input', function () {
        var texto = this.value.toLowerCase().trim();
        var visibles = 0;

        tarjetas.forEach(function (t) {
            var coincide = t.querySelector('.nombre').textContent.toLowerCase().indexOf(texto) !== -1;
            t.style.display = coincide ? '' : 'none';
            if (coincide) visibles++;
        });

        vacio.style.display = visibles === 0 ? 'block' : 'none';
    });

    // Copiar al portapapeles
    var aviso = document.getElementById('aviso');

    tarjetas.forEach(function (t) {
        t.addEventListener('click', function () {
            var codigo = this.getAttribute('data-codigo');

            navigator.clipboard.writeText(codigo).then(function () {
                aviso.textContent = 'Copiado: ' + codigo;
                aviso.classList.add('visible');
                setTimeout(function () { aviso.classList.remove('visible'); }, 1800);
            });
        });
    });
</script>

</body>
</html>
HTML;

file_put_contents($archivoDemo, $demo);


// -----------------------------------------------------------------------------
// RESUMEN FINAL
// -----------------------------------------------------------------------------
echo "\n-------------------------------------\n";
echo "  Iconos generados : " . count($iconos) . "\n";
echo "  Peso original    : " . number_format($pesoOriginal / 1024, 1) . " KB\n";
echo "  Peso del sprite  : " . number_format($pesoSprite / 1024, 1) . " KB  (-{$ahorro}%)\n";

if (!empty($descartados)) {
    echo "\n  Archivos omitidos:\n";
    foreach ($descartados as $d) {
        echo "    - $d\n";
    }
}

echo "\n  Archivos actualizados:\n";
echo "    - sprite.svg\n";
echo "    - demo.html\n";
echo "-------------------------------------\n";

if (!$esConsola) {
    echo '</pre><p style="font:15px sans-serif;padding:0 20px;">
            <a href="demo.html" style="display:inline-block;background:#1a49a3;color:#fff;
               padding:12px 22px;border-radius:8px;text-decoration:none;font-weight:600;">
               Ver el catalogo de iconos &rarr;</a></p>';
}
