<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/VotosController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VotosController extends Controller
{
    /** Crea o actualiza el voto (1..5) del usuario para una película */
    public function store(Request $request, int $pelicula)
    {
        $data = $request->validate([
            'valor' => ['required','integer','min:1','max:5'],
        ]);

        $userId = Auth::id();

        $exists = DB::table('votos')
            ->where('user_id', $userId)
            ->where('pelicula_id', $pelicula)
            ->exists();

        if ($exists) {
            DB::table('votos')
                ->where('user_id', $userId)
                ->where('pelicula_id', $pelicula)
                ->update([
                    'valor' => $data['valor'],
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('votos')->insert([
                'user_id'     => $userId,
                'pelicula_id' => $pelicula,
                'valor'       => $data['valor'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        return back()->with('success', 'Tu voto se ha guardado.');
    }
}
