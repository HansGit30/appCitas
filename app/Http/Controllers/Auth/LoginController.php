<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function redirectToGoogle()
    {
        //return Socialite::driver('google')->redirect();
        return Socialite::driver('google')
            ->stateless()
            ->with(['prompt' => 'select_account']) // 🌟 ESTA ES LA CLAVE
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        //$user = Socialite::driver('google')->user();
        try {
            // Obtenemos los datos desde Google usando stateless para evitar el error de estado
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Buscamos si ya tienes un usuario registrado con ese correo
            $user = User::where('email', $googleUser->getEmail())->first();

            // Si el correo no existe en tu base de datos, creamos el usuario automáticamente
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(\Illuminate\Support\Str::random(16)), // Contraseña aleatoria
                ]);
            }

            // Iniciamos la sesión del usuario en Laravel
            Auth::login($user, true);

            // Guardamos el agente de usuario (dispositivo) en tu tabla nativa 'sessions'
            DB::table('sessions')
                ->where('id', session()->getId())
                ->update([
                    'user_id' => $user->id,
                    'user_agent' => request()->header('User-Agent')
                ]);

            // 🌟 CAMBIO AQUÍ: Forzamos la redirección directa a la ruta que creamos en web.php
            return redirect('/inicio');
        } catch (\Exception $e) {
            // Si algo truena internamente, te regresará al login con un aviso
            return redirect('/login')->with('error', 'Hubo un problema al conectar con Google.');
        }
    }


    public function authenticated(Request $request, User $user)
    {
        $device = $request->header('User-Agent');
        //$user->sessions()->create(['device'=> $device]);
        return redirect()->intended('/inicio');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleGithubCallback()
    {
        // Añadimos ->stateless() aquí
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::where('email', $githubUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => bcrypt('123456789') // Te recomiendo cambiar esto luego por Str::random(16)
            ]);
        }

        // Recuerda iniciar sesión y redirigir para que no te dé el error anterior
        auth()->login($user, true);

        return redirect('/inicio');
    }
}
