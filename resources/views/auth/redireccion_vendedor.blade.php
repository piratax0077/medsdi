<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Redireccionando...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background: #f0f4f8; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; font-family: sans-serif; }
    </style>
</head>
<body>
<script>
    let segundos = 4;

    const timer = Swal.fire({
        title: '¡Bienvenido!',
        html: 'Serás redirigido al portal de ventas en <strong>' + segundos + '</strong> segundo(s)...',
        icon: 'success',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            const intervalo = setInterval(() => {
                segundos--;
                const contenido = Swal.getHtmlContainer();
                if (contenido) {
                    contenido.querySelector('strong').textContent = segundos;
                }
                if (segundos <= 0) {
                    clearInterval(intervalo);
                    window.location.replace('{{ $url_destino }}');
                }
            }, 1000);
        }
    });
</script>
</body>
</html>
