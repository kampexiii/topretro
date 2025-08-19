<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/Auth/LoginController.php
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function show()
    {
        // Si ya está autenticado, redirige a Home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    /**
     * Procesa el login.
     */
    public function store(Request $request)
    {
        // Validamos datos
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string','min:6'],
        ]);

        // Intentamos login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // prevenir fixation
            return redirect()->intended(route('home'))
                ->with('success','Bienvenido de nuevo 👋');
        }

        // Error en credenciales
        return back()->withInput($request->only('email'))
                     ->with('error','Credenciales incorrectas.');
    }

    /**
     * Cierra sesión.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success','Has cerrado sesión.');
    }
}
