#!/bin/bash
# Script de verificación rápida de reCAPTCHA para MediChile Sistema

echo "==================================================="
echo "  Verificación de configuración de reCAPTCHA v2"
echo "==================================================="
echo ""

# Verificar si existe el archivo .env
if [ ! -f .env ]; then
    echo "❌ ERROR: No se encontró el archivo .env"
    echo "   Copia .env.example a .env y configura tus claves de reCAPTCHA"
    exit 1
fi

# Verificar si las variables de reCAPTCHA están configuradas
SITE_KEY=$(grep "RECAPTCHA_SITE_KEY=" .env | cut -d '=' -f2)
SECRET_KEY=$(grep "RECAPTCHA_SECRET_KEY=" .env | cut -d '=' -f2)

echo "📋 Verificando variables de entorno..."
echo ""

if [ -z "$SITE_KEY" ] || [ "$SITE_KEY" = "" ]; then
    echo "❌ RECAPTCHA_SITE_KEY no está configurada en .env"
    ERRORS=true
else
    echo "✅ RECAPTCHA_SITE_KEY: ${SITE_KEY:0:20}..."
fi

if [ -z "$SECRET_KEY" ] || [ "$SECRET_KEY" = "" ]; then
    echo "❌ RECAPTCHA_SECRET_KEY no está configurada en .env"
    ERRORS=true
else
    echo "✅ RECAPTCHA_SECRET_KEY: ${SECRET_KEY:0:20}..."
fi

echo ""
echo "📁 Verificando archivos de configuración..."
echo ""

# Verificar config/services.php
if grep -q "recaptcha" config/services.php; then
    echo "✅ config/services.php tiene configuración de reCAPTCHA"
else
    echo "❌ config/services.php NO tiene configuración de reCAPTCHA"
    ERRORS=true
fi

# Verificar vista de login
if grep -q "g-recaptcha" resources/views/auth/Registros/ingreso_registro.blade.php; then
    echo "✅ Vista de login tiene el widget de reCAPTCHA"
else
    echo "❌ Vista de login NO tiene el widget de reCAPTCHA"
    ERRORS=true
fi

# Verificar HomeController
if grep -q "g-recaptcha-response" app/Http/Controllers/HomeController.php; then
    echo "✅ HomeController tiene validación de reCAPTCHA"
else
    echo "❌ HomeController NO tiene validación de reCAPTCHA"
    ERRORS=true
fi

echo ""
echo "==================================================="
if [ "$ERRORS" = true ]; then
    echo "⚠️  Se encontraron errores en la configuración"
    echo ""
    echo "📖 Consulta CONFIGURACION_RECAPTCHA.md para más información"
    exit 1
else
    echo "✅ ¡Configuración de reCAPTCHA OK!"
    echo ""
    echo "🧪 Pasos siguientes:"
    echo "   1. Ejecuta: php artisan config:clear"
    echo "   2. Ejecuta: php artisan cache:clear"
    echo "   3. Visita /Ingreso en tu navegador"
    echo "   4. Haz clic en '¿Olvidó su contraseña?'"
    echo "   5. Verifica que el reCAPTCHA se cargue correctamente"
fi
echo "==================================================="
