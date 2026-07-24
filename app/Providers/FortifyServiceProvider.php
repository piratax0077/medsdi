<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Laravel\Fortify\Contracts\LoginResponse::class, \App\Http\Responses\LoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Permite iniciar sesión con correo electrónico o RUT
        Fortify::authenticateUsing(function (Request $request) {
            $login = trim($request->email ?? '');

            // Detectar si el campo contiene un RUT chileno (ej: 12345678-9 o 12.345.678-9)
            $esRut = (bool) preg_match('/^\d{1,2}\.?\d{3}\.?\d{3}-[\dkK]$/i', $login);

            if ($esRut) {
                // Normalizar RUT: quitar puntos y convertir 'k' a mayúscula
                $rutNormalizado = strtoupper(str_replace('.', '', $login));

                // Buscar el paciente por RUT y obtener su usuario asociado
                $paciente = Paciente::where('rut', $rutNormalizado)->first();

                if (!$paciente || !$paciente->id_usuario) {
                    return null;
                }

                $user = User::find($paciente->id_usuario);
            } else {
                // Buscar usuario por correo electrónico
                $user = User::where('email', $login)->first();
            }

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
