# Configuración de reCAPTCHA v2 para MediChile Sistema

## ✅ **Estado Actual**
La vista de login/registro ya está preparada para usar reCAPTCHA. Solo necesitas configurar las claves.

## 📋 **Pasos para Configuración**

### 1️⃣ **Obtener las claves de Google reCAPTCHA**

1. Ve a: https://www.google.com/recaptcha/admin/create
2. Inicia sesión con tu cuenta de Google
3. Completa el formulario:
   - **Etiqueta**: MediChile Sistema (o el nombre que prefieras)
   - **Tipo de reCAPTCHA**: Selecciona **reCAPTCHA v2** → "No soy un robot" (Checkbox)
   - **Dominios**: Agrega tus dominios
     - Para desarrollo local: `localhost` o `127.0.0.1`
     - Para producción: `tu-dominio.com` (sin http://)
   - Acepta los términos de servicio
   - Enviar

4. Google te mostrará dos claves:
   - **Clave del sitio (Site Key)**: Se usa en el frontend
   - **Clave secreta (Secret Key)**: Se usa en el backend

### 2️⃣ **Configurar el archivo .env**

Abre tu archivo `.env` en la raíz del proyecto y agrega estas líneas al final:

```env
# Google reCAPTCHA v2
RECAPTCHA_SITE_KEY=tu_site_key_aqui
RECAPTCHA_SECRET_KEY=tu_secret_key_aqui
```

**Ejemplo:**
```env
RECAPTCHA_SITE_KEY=6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
RECAPTCHA_SECRET_KEY=6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
```

### 3️⃣ **Limpiar la caché de configuración**

Ejecuta estos comandos en la terminal dentro de tu proyecto:

```bash
php artisan config:clear
php artisan cache:clear
```

### 4️⃣ **Verificar la validación en el backend**

El archivo `HomeController.php` ya tiene la validación del reCAPTCHA en la función `recuperarcontrasena()`. 

Si necesitas validar reCAPTCHA en otras funciones, usa este código:

```php
// Validación de reCAPTCHA
$validator = Validator::make($request->all(), [
    'g-recaptcha-response' => 'required',
]);

if ($validator->fails()) {
    return back()->withErrors(['captcha' => 'Por favor completa el captcha.']);
}

// Verificar con Google
$recaptcha = $request->input('g-recaptcha-response');
$secret = config('services.recaptcha.secret_key');
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
$responseKeys = json_decode($response, true);

if (!$responseKeys["success"]) {
    return back()->withErrors(['captcha' => 'Verificación de captcha falló. Por favor intenta nuevamente.']);
}
```

## 🧪 **Probar la Configuración**

1. Ve a la página de login: `/Ingreso`
2. Haz clic en "¿Olvidó su contraseña?"
3. Ingresa un correo electrónico
4. Deberías ver el reCAPTCHA cargado
5. Completa el captcha
6. Envía el formulario

## ⚠️ **Problemas Comunes**

### El captcha no aparece:
- Verifica que las claves en `.env` sean correctas
- Asegúrate de haber ejecutado `php artisan config:clear`
- Verifica la consola del navegador (F12) para ver errores JavaScript
- Confirma que el dominio esté agregado en la configuración de Google reCAPTCHA

### Error "Invalid site key":
- La `RECAPTCHA_SITE_KEY` es incorrecta o está mal copiada
- El dominio actual no está registrado en tu configuración de Google reCAPTCHA

### El formulario se envía sin validar el captcha:
- Verifica que el backend esté validando el campo `g-recaptcha-response`
- Revisa el archivo `HomeController.php` línea 1252

## 📁 **Archivos ya configurados:**

✅ `config/services.php` - Configuración de servicios  
✅ `resources/views/auth/Registros/ingreso_registro.blade.php` - Vista con reCAPTCHA integrado  
✅ `app/Http/Controllers/HomeController.php` - Validación en `recuperarcontrasena()`  

## 🔐 **Seguridad**

- **NUNCA** compartas tu `RECAPTCHA_SECRET_KEY` públicamente
- **NO** subas el archivo `.env` a repositorios públicos
- Usa diferentes claves para desarrollo y producción

## 📞 **Soporte**

Si tienes problemas, verifica:
1. Las claves están correctamente copiadas en `.env` (sin espacios extras)
2. Has limpiado la caché con `php artisan config:clear`
3. El dominio está registrado en Google reCAPTCHA
4. La conexión a internet está funcionando (el captcha se carga desde Google)

---

**¡Configuración lista!** Solo necesitas agregar tus claves de Google reCAPTCHA al archivo `.env` 🚀
