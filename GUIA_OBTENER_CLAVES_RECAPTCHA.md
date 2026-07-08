# 🔑 Guía Paso a Paso: Obtener Claves de Google reCAPTCHA v2

## 📝 Paso 1: Acceder a Google reCAPTCHA Admin

1. Abre tu navegador
2. Ve a: **https://www.google.com/recaptcha/admin/create**
3. Inicia sesión con tu cuenta de Google (si no lo has hecho ya)

---

## 📋 Paso 2: Crear un Nuevo Sitio

Completa el formulario con la siguiente información:

### **Etiqueta (Label)**
```
MediChile Sistema
```
*(O cualquier nombre descriptivo para identificar tu proyecto)*

### **Tipo de reCAPTCHA**
Selecciona: **reCAPTCHA v2**

Luego marca: **Casilla "No soy un robot"**

### **Dominios (Domains)**

**Para DESARROLLO LOCAL:**
```
localhost
127.0.0.1
```

**Para PRODUCCIÓN:**
```
tu-dominio.com
www.tu-dominio.com
```

⚠️ **IMPORTANTE:** 
- NO incluyas `http://` ni `https://`
- NO incluyas puertos (como `:8000`)
- Solo escribe el dominio limpio

**Ejemplos CORRECTOS:**
- ✅ `localhost`
- ✅ `med-sdi.cl`
- ✅ `www.med-sdi.cl`

**Ejemplos INCORRECTOS:**
- ❌ `http://localhost`
- ❌ `localhost:8000`
- ❌ `https://med-sdi.cl`

### **Propietarios (Owners)**
Deja tu email de Google o agrega emails adicionales de administradores

### **Términos de Servicio**
✅ Marca la casilla: "Acepto los Términos de Servicio de reCAPTCHA"

---

## 🔐 Paso 3: Obtener las Claves

Después de hacer clic en **"Enviar"**, Google te mostrará:

### **Clave del sitio (Site Key)**
```
Ejemplo: 6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```
👉 Esta clave se usa en el **FRONTEND** (vista HTML)

### **Clave secreta (Secret Key)**
```
Ejemplo: 6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
```
👉 Esta clave se usa en el **BACKEND** (servidor PHP)

---

## 💾 Paso 4: Configurar el Archivo .env

1. Abre el archivo `.env` en la raíz de tu proyecto MediChile
2. Agrega o modifica estas líneas (al final del archivo):

```env
# Google reCAPTCHA v2
RECAPTCHA_SITE_KEY=TU_SITE_KEY_AQUI
RECAPTCHA_SECRET_KEY=TU_SECRET_KEY_AQUI
```

3. Reemplaza:
   - `TU_SITE_KEY_AQUI` con la **Clave del sitio**
   - `TU_SECRET_KEY_AQUI` con la **Clave secreta**

**Ejemplo real:**
```env
RECAPTCHA_SITE_KEY=6LdXk9YpAAAAABcdefghijklmnopqrstuvwxyz12345
RECAPTCHA_SECRET_KEY=6LdYk9YpAAAAAAbcdefghijklmnopqrstuvwxyz67890
```

---

## ⚙️ Paso 5: Limpiar la Caché de Laravel

Abre tu terminal (PowerShell o CMD) en la raíz del proyecto y ejecuta:

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 🧪 Paso 6: Probar el reCAPTCHA

### Opción A: Ejecutar script de verificación
```bash
verificar_recaptcha.bat
```

### Opción B: Prueba manual
1. Inicia tu servidor Laravel:
   ```bash
   php artisan serve
   ```

2. Abre tu navegador en: `http://localhost:8000/Ingreso`

3. Haz clic en **"¿Olvidó su contraseña?"**

4. Verifica que aparezca la casilla de reCAPTCHA:
   ```
   ☐ No soy un robot
   ```

5. Intenta enviar el formulario:
   - **SIN marcar el captcha**: Debe mostrar error
   - **CON el captcha marcado**: Debe procesar correctamente

---

## ✅ Verificación Visual

Si todo está correcto, deberías ver:

1. **En la página de recuperación de contraseña:**
   - Campo de email
   - Widget de reCAPTCHA (casilla "No soy un robot")
   - Botón "Recuperar contraseña"

2. **Al completar el captcha:**
   - Aparece una marca verde ✓ en la casilla

3. **Al enviar el formulario:**
   - Si el captcha NO está marcado → Error
   - Si el captcha SÍ está marcado → Éxito (envía el correo)

---

## 🔧 Solución de Problemas

### Problema: El captcha no aparece

**Posibles causas:**
- Las claves en `.env` están mal copiadas
- No ejecutaste `php artisan config:clear`
- El dominio no está registrado en Google reCAPTCHA
- Problema de conexión a internet

**Solución:**
1. Verifica que las claves en `.env` no tengan espacios extras
2. Ejecuta los comandos de limpieza de caché
3. Abre la consola del navegador (F12) y busca errores
4. Verifica que el dominio en Google reCAPTCHA incluya `localhost`

### Problema: Error "Invalid site key"

**Causa:** La `RECAPTCHA_SITE_KEY` es incorrecta

**Solución:**
1. Ve a https://www.google.com/recaptcha/admin
2. Verifica la clave del sitio
3. Cópiala nuevamente en `.env`
4. Ejecuta `php artisan config:clear`

### Problema: El formulario se envía sin validar

**Causa:** El backend no está validando correctamente

**Solución:**
1. Verifica que `HomeController.php` tenga la validación (línea 1252)
2. Asegúrate de que el formulario tenga `name="g-recaptcha-response"`
3. Revisa los logs de Laravel: `storage/logs/laravel.log`

---

## 📚 Referencias Útiles

- **Documentación oficial de Google reCAPTCHA:** https://developers.google.com/recaptcha/docs/display
- **Admin Console:** https://www.google.com/recaptcha/admin
- **Documentación Laravel HTTP Client:** https://laravel.com/docs/http-client

---

## 🔒 Recordatorios de Seguridad

- ✅ Mantén tu `RECAPTCHA_SECRET_KEY` privada
- ✅ NO la compartas en repositorios públicos
- ✅ Asegúrate de que `.env` esté en `.gitignore`
- ✅ Usa claves diferentes para desarrollo y producción

---

¿Necesitas ayuda? Consulta el archivo `CONFIGURACION_RECAPTCHA.md` para más detalles técnicos.
