<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MobilePushDevice;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\User;
use App\Models\UsersDevices;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // Obtener datos tanto de form-data como de JSON
        $user = trim((string) ($request->input('user') ?: $request->json('user')));
        $pass = (string) ($request->input('pass') ?: $request->json('pass'));

        if (empty($user)) {
            $error['user'] = 'campo requerido';
            $valido = 0;
        }

        if (empty($pass)) {
            $error['pass'] = 'campo requerido';
            $valido = 0;
        }

        if (!$valido) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Debe ingresar usuario y contraseña.',
                'error' => $error,
                'bloqueado' => false,
            ]);
        }

        /*
         * BLOQUEO TEMPORAL DE LOGIN
         * ------------------------------------------------------------------
         * Se controla en backend para que no pueda evitarse limpiando los
         * datos de la app o llamando directamente a la API.
         *
         * Máximo: 3 intentos fallidos.
         * Bloqueo: 15 minutos.
         *
         * La clave se genera por cuenta. No se usa solamente la IP porque
         * varios usuarios pueden compartir la misma red.
         */
        $maxIntentos = 3;
        $segundosBloqueo = 15 * 60;
        $loginNormalizado = mb_strtolower($user);
        $rateLimitKey = 'mobile-login:' . sha1($loginNormalizado);

        // Si ya alcanzó el límite, no intentar autenticar nuevamente.
        if (RateLimiter::tooManyAttempts($rateLimitKey, $maxIntentos)) {
            $segundosRestantes = max(1, RateLimiter::availableIn($rateLimitKey));

            return response()->json([
                'estado' => 0,
                'msj' => 'Acceso temporalmente bloqueado por demasiados intentos fallidos.',
                'bloqueado' => true,
                'intentos_restantes' => 0,
                'segundos_restantes' => $segundosRestantes,
                'minutos_restantes' => (int) ceil($segundosRestantes / 60),
            ]);
        }

        $userModel = User::where('email', $user)->first();

        /*
         * Usamos el mismo mensaje para usuario inexistente y contraseña
         * incorrecta, evitando revelar si una cuenta existe.
         */
        if (!$userModel || !Auth::attempt(['email' => $user, 'password' => $pass])) {
            RateLimiter::hit($rateLimitKey, $segundosBloqueo);

            $intentosRealizados = RateLimiter::attempts($rateLimitKey);
            $intentosRestantes = max(0, $maxIntentos - $intentosRealizados);
            $bloqueado = $intentosRestantes === 0;

            if ($bloqueado) {
                $segundosRestantes = max(1, RateLimiter::availableIn($rateLimitKey));

                return response()->json([
                    'estado' => 0,
                    'msj' => 'Has alcanzado el máximo de 3 intentos. Tu acceso fue bloqueado temporalmente.',
                    'bloqueado' => true,
                    'intentos_restantes' => 0,
                    'segundos_restantes' => $segundosRestantes,
                    'minutos_restantes' => (int) ceil($segundosRestantes / 60),
                ]);
            }

            return response()->json([
                'estado' => 0,
                'msj' => $intentosRestantes === 1
                    ? 'Usuario o contraseña incorrectos. Te queda 1 intento.'
                    : 'Usuario o contraseña incorrectos. Te quedan ' . $intentosRestantes . ' intentos.',
                'bloqueado' => false,
                'intentos_restantes' => $intentosRestantes,
            ]);
        }

        // Login correcto: limpiar completamente el contador de intentos.
        RateLimiter::clear($rateLimitKey);

        $deviceToken = trim((string) $request->input('device_token', ''));
        $deviceUuid = trim((string) $request->input('device_uuid', ''));

        // Si la app no dispone del plugin nativo de dispositivo,
        // recupera el UUID previamente asociado a este token FCM.
        if ($deviceUuid === '' && $deviceToken !== '') {
            $deviceUuid = (string) MobilePushDevice::where(
                    'token_hash',
                    hash('sha256', $deviceToken)
                )
                ->whereNotNull('device_uuid')
                ->where('device_uuid', '<>', '')
                ->latest('id')
                ->value('device_uuid');
        }

        if ($userModel->mobile_two_factor_enabled && !app()->environment('local')) {
            $trustedPushDevice = $deviceToken !== '' && MobilePushDevice::where([
                    'user_id' => $userModel->id,
                    'token_hash' => hash('sha256', $deviceToken),
                    'enabled' => true,
                ])->exists();

            // Permite migrar de forma segura un equipo que ya estaba
            // vinculado en users_devices antes de incorporar FCM.
            $trustedLegacyDevice = $deviceToken !== ''
                && $deviceUuid !== ''
                && UsersDevices::where('id_user', $userModel->id)
                    ->where('uuid', $deviceUuid)
                    ->where('estado', 1)
                    ->exists();

            $trustedDevice = $trustedPushDevice || $trustedLegacyDevice;

            if (!$trustedDevice) {
                Auth::logout();

                return response()->json([
                    'estado' => 2,
                    'msj' => 'La autenticación móvil está activa. Ingresa desde el teléfono vinculado o recupera el acceso desde la web.',
                    'bloqueado' => false,
                ]);
            }
        }

        $paciente = Paciente::where('id_usuario', $userModel->id)->first();
        $profesional = Profesional::where('id_usuario', $userModel->id)->first();
        $rolesPermitidos = $userModel->roles()
            ->whereIn('name', ['Paciente', 'Profesional'])
            ->orderBy('name')
            ->get(['roles.id', 'roles.name'])
            ->values();

        if ($rolesPermitidos->isEmpty()) {
            Auth::logout();

            return response()->json([
                'estado' => 0,
                'msj' => 'Esta cuenta no posee un perfil Paciente o Profesional habilitado para la aplicación.',
                'bloqueado' => false,
            ]);
        }

        // El token se emite solo a perfiles admitidos por la aplicación.
        $token = $userModel->createToken('mobile-app')->plainTextToken;

        // Guarda el token FCM durante el login para que el segundo factor
        // no dependa solamente de la petición posterior de la aplicación.
        if ($deviceToken !== '') {
            $pushUserIds = collect([$userModel->id]);

            if ($deviceUuid !== '') {
                $pushUserIds = $pushUserIds->merge(
                    UsersDevices::where('uuid', $deviceUuid)
                        ->where('estado', 1)
                        ->pluck('id_user')
                );
            }

            foreach ($pushUserIds->filter()->unique() as $pushUserId) {
                MobilePushDevice::updateOrCreate(
                    [
                        'user_id' => $pushUserId,
                        'token_hash' => hash('sha256', $deviceToken),
                    ],
                    [
                        'fcm_token' => $deviceToken,
                        'platform' => 'android',
                        'device_uuid' => $deviceUuid !== '' ? $deviceUuid : null,
                        'enabled' => true,
                        'last_seen_at' => now(),
                    ]
                );
            }
        }

        // La foto pertenece al perfil seleccionado en la aplicación.
        // No usar aquí la foto de otro rol como respaldo, porque una
        // cuenta puede ser Paciente y Profesional al mismo tiempo.
        $userModel->foto_perfil = null;

        $datos['estado'] = 1;
        $datos['msj'] = 'registro';
        $datos['user'] = $userModel;
        $datos['paciente'] = $paciente ?: null;
        $datos['profesional'] = $profesional ?: null;
        $datos['roles'] = $rolesPermitidos;
        $datos['requiere_seleccion_rol'] = $rolesPermitidos->count() > 1;
        $datos['rol_sugerido'] = $rolesPermitidos->count() === 1
            ? $rolesPermitidos->first()->name
            : null;
        $datos['device_uuid'] = $deviceUuid !== '' ? $deviceUuid : null;
        $datos['token'] = $token;
        $datos['bloqueado'] = false;
        $datos['intentos_restantes'] = $maxIntentos;

        return response()->json($datos);
    }

    public function login_farmacia(Request $request) // farmacia
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->user)) {
            $error['user'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->pass)) {
            $error['pass'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $user = User::where('email', $request->user)->first();
            if($user)
            {
            $rol = DB::table('model_has_roles')->whereIn('role_id',[17,7])->where('model_id',$user->id)->first();

            if($user&&$rol)
            {
                if (Auth::attempt(['email' => $request->user, 'password' => $request->pass]))
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro';
                    $datos['user'] = $user;
                    $datos['roles'] = $user->roles()->get();
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'usuario no valido';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'usuario no encotnrado';
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'usuario no encontrado';
        }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requerido';
            $datos['error'] = $error;
        }


        return $datos;
    }
}
