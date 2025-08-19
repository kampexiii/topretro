<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/Auth/RegisterController.php
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    /**
     * Procesa el alta de usuario y envía verificación.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required','string','max:100'],
            'email'                 => ['required','string','email','max:255','unique:users,email'],
            'password'              => ['required','string','min:6','max:64','confirmed'],
            'terms'                 => ['accepted'],
        ], [
            'terms.accepted' => 'Debes aceptar los términos y la política de privacidad.',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Autologin
        Auth::login($user);
        $request->session()->regenerate();

        // Enviar verificación
        $user->sendEmailVerificationNotification();

        // Redirigir a aviso de verificación
        return redirect()->route('verification.notice')->with('message', 'Te hemos enviado un enlace de verificación.');
    }
}
