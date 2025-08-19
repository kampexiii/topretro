<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/ComentarioController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    /** Publica un comentario */
    public function store(Request $request, int $pelicula)
    {
        $data = $request->validate([
            'contenido' => ['required','string','min:2','max:1000'],
        ]);

        DB::table('comentarios')->insert([
            'user_id'     => Auth::id(),
            'pelicula_id' => $pelicula,
            'contenido'   => $data['contenido'],
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return back()->with('success', 'Comentario publicado.');
    }

    /** Elimina un comentario propio */
    public function destroy(int $pelicula, int $comentario)
    {
        DB::table('comentarios')
            ->where('id', $comentario)
            ->where('pelicula_id', $pelicula)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Comentario eliminado.');
    }
}
