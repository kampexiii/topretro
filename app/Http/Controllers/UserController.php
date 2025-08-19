<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/UserController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /** Muestra el panel del usuario con datos básicos y avatares disponibles */
    public function panel()
    {
        $user = Auth::user();

        // Lista de avatares disponibles (puedes moverlo a config/topretro.php si quieres)
        $availableAvatars = [
            'avatar1.png','avatar2.png','avatar3.png','avatar4.png',
            'avatar5.png','avatar6.png','avatar7.png','avatar8.png',
            'avatar9.png','avatar10.png',
        ];

        return view('pages.usuario.panel', [
            'user' => $user,
            'availableAvatars' => $availableAvatars,
        ]);
    }

    /** Actualiza perfil (nombre, email, password opcional, avatar) */
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'     => ['required','string','max:100'],
            'email'    => ['required','email','max:255','unique:users,email,'.$user->id],
            'password' => ['nullable','string','min:6','max:64'],
            'avatar'   => ['nullable','string','max:255'],
        ]);

        $payload = [
            'name'  => $data['name'],
            'email' => $data['email'],
        ];

        if (!empty($data['password'])) {
            $payload['password'] = Hash::make($data['password']);
        }
        if (!empty($data['avatar'])) {
            $payload['avatar'] = $data['avatar'];
        }

        DB::table('users')->where('id', $user->id)->update($payload);

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
