@echo off
REM Script de verificación rápida de reCAPTCHA para MediChile Sistema

echo ===================================================
echo   Verificación de configuración de reCAPTCHA v2
echo ===================================================
echo.

REM Verificar si existe el archivo .env
if not exist .env (
    echo [ERROR] No se encontró el archivo .env
    echo    Copia .env.example a .env y configura tus claves de reCAPTCHA
    exit /b 1
)

echo [VERIFICANDO] Variables de entorno...
echo.

REM Verificar RECAPTCHA_SITE_KEY
findstr /C:"RECAPTCHA_SITE_KEY=" .env >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] RECAPTCHA_SITE_KEY encontrada en .env
) else (
    echo [ERROR] RECAPTCHA_SITE_KEY no está configurada en .env
    set ERRORS=1
)

REM Verificar RECAPTCHA_SECRET_KEY
findstr /C:"RECAPTCHA_SECRET_KEY=" .env >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] RECAPTCHA_SECRET_KEY encontrada en .env
) else (
    echo [ERROR] RECAPTCHA_SECRET_KEY no está configurada en .env
    set ERRORS=1
)

echo.
echo [VERIFICANDO] Archivos de configuración...
echo.

REM Verificar config/services.php
findstr /C:"recaptcha" config\services.php >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] config\services.php tiene configuración de reCAPTCHA
) else (
    echo [ERROR] config\services.php NO tiene configuración de reCAPTCHA
    set ERRORS=1
)

REM Verificar vista de login
findstr /C:"g-recaptcha" resources\views\auth\Registros\ingreso_registro.blade.php >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] Vista de login tiene el widget de reCAPTCHA
) else (
    echo [ERROR] Vista de login NO tiene el widget de reCAPTCHA
    set ERRORS=1
)

REM Verificar HomeController
findstr /C:"g-recaptcha-response" app\Http\Controllers\HomeController.php >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] HomeController tiene validación de reCAPTCHA
) else (
    echo [ERROR] HomeController NO tiene validación de reCAPTCHA
    set ERRORS=1
)

echo.
echo ===================================================
if defined ERRORS (
    echo [ADVERTENCIA] Se encontraron errores en la configuración
    echo.
    echo Consulta CONFIGURACION_RECAPTCHA.md para más información
    exit /b 1
) else (
    echo [OK] Configuración de reCAPTCHA OK!
    echo.
    echo Pasos siguientes:
    echo    1. Ejecuta: php artisan config:clear
    echo    2. Ejecuta: php artisan cache:clear
    echo    3. Visita /Ingreso en tu navegador
    echo    4. Haz clic en ¿Olvidó su contraseña?
    echo    5. Verifica que el reCAPTCHA se cargue correctamente
)
echo ===================================================
echo.
pause
