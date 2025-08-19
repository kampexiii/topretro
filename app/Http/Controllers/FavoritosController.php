<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/FavoritosController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritosController extends Controller
{
    /** Grid de favoritos del usuario */
    public function index()
    {
        $userId = Auth::id();

        $favoritos = DB::table('favoritos as f')
            ->join('peliculas as p', 'p.id', '=', 'f.pelicula_id')
            ->where('f.user_id', $userId)
            ->select('p.id', 'p.titulo', 'p.poster_url')
            ->orderBy('p.titulo')
            ->get();

        return view('pages.favoritos.index', ['favoritos' => $favoritos]);
    }

    /** Añadir a favoritos */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pelicula_id' => ['required','integer','exists:peliculas,id'],
        ]);

        $userId = Auth::id();

        $exists = DB::table('favoritos')
            ->where('user_id', $userId)
            ->where('pelicula_id', $data['pelicula_id'])
            ->exists();

        if (!$exists) {
            DB::table('favoritos')->insert([
                'user_id'     => $userId,
                'pelicula_id' => $data['pelicula_id'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        return back()->with('success', 'Añadido a tu lista.');
    }

    /** Quitar de favoritos */
    public function destroy(int $peliculaId)
    {
        DB::table('favoritos')
            ->where('user_id', Auth::id())
            ->where('pelicula_id', $peliculaId)
            ->delete();

        return back()->with('success', 'Eliminado de tu lista.');
    }
}
