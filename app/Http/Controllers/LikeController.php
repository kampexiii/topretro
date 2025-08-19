<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/LikeController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /** Alterna like/unlike para una película */
    public function toggle(int $pelicula)
    {
        $userId = Auth::id();

        $exists = DB::table('likes')
            ->where('user_id', $userId)
            ->where('pelicula_id', $pelicula)
            ->exists();

        if ($exists) {
            DB::table('likes')
                ->where('user_id', $userId)
                ->where('pelicula_id', $pelicula)
                ->delete();
            return back()->with('success', 'Quitaste tu like.');
        }

        DB::table('likes')->insert([
            'user_id'     => $userId,
            'pelicula_id' => $pelicula,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return back()->with('success', '¡Te gusta esta película!');
    }
}
