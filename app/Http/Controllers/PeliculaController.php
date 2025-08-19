<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/PeliculaController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    public function show(Request $request, int $id)
    {
        // Película actual
        $pelicula = DB::table('peliculas')->where('id', $id)->first();
        if (!$pelicula) {
            return redirect()->route('home');
        }

        // Incrementar visitas
        DB::table('peliculas')->where('id', $id)->increment('visitas');

        // Ficha técnica
        $ficha = DB::table('ficha_tecnica')
            ->select('director','duracion','pais','release_date','genero','clasificacion_pegi','presupuesto','recaudacion')
            ->where('pelicula_id', $id)
            ->first();

        // Reparto y galería
        $reparto = DB::table('reparto')->select('actor','personaje')->where('pelicula_id', $id)->get();
        $galeria = DB::table('galeria')->select('image_url','descripcion')->where('pelicula_id', $id)->get();

        // Navegación Siguiente/Anterior por ID
        $prev = DB::table('peliculas')
            ->select('id','titulo','poster_url')
            ->where('id', '<', $id)
            ->orderByDesc('id')
            ->first();

        $next = DB::table('peliculas')
            ->select('id','titulo','poster_url')
            ->where('id', '>', $id)
            ->orderBy('id')
            ->first();

        // Interacciones de usuario
        $isFav = false;
        $liked = false;
        $myVote = null;

        if (Auth::check()) {
            $userId = Auth::id();

            $isFav = DB::table('favoritos')->where([
                ['user_id', '=', $userId],
                ['pelicula_id', '=', $id],
            ])->exists();

            $liked = DB::table('likes')->where([
                ['user_id', '=', $userId],
                ['pelicula_id', '=', $id],
            ])->exists();

            $myVote = optional(
                DB::table('votos')->where([
                    ['user_id', '=', $userId],
                    ['pelicula_id', '=', $id],
                ])->first()
            )->valor;
        }

        // Métricas de votos
        $agg = DB::table('votos')
            ->where('pelicula_id', $id)
            ->selectRaw('AVG(valor) as avg_val, COUNT(*) as cnt')
            ->first();
        $votosAvg   = $agg?->avg_val ? (float)$agg->avg_val : null;
        $votosCount = (int)($agg->cnt ?? 0);

        // Comentarios con nombre y avatar
        $comentarios = DB::table('comentarios as c')
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->where('c.pelicula_id', $id)
            ->orderByDesc('c.created_at')
            ->select('c.id','c.user_id','c.contenido','c.created_at','u.name','u.avatar')
            ->get();

        return view('pages.pelicula.show', compact(
            'pelicula','ficha','reparto','galeria',
            'isFav','liked','myVote','votosAvg','votosCount','comentarios',
            'prev','next'
        ));
    }
}
