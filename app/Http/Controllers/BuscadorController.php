<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/BuscadorController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscadorController extends Controller
{
    /**
     * Vista principal del buscador.
     */
    public function index(Request $request)
    {
        return view('pages.buscador.index');
    }

    /**
     * Endpoint JSON para buscar películas por título, género (ficha_tecnica) o actor (reparto).
     * Sustituye a: actions/buscar_ajax.php
     */
    public function search(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        if ($q === '') {
            return response()->json([]);
        }

        // Normalizamos el término para búsquedas con LIKE
        $needle = "%{$q}%";

        $rows = DB::table('peliculas as p')
            ->leftJoin('ficha_tecnica as f', 'f.pelicula_id', '=', 'p.id')
            ->leftJoin('reparto as r', 'r.pelicula_id', '=', 'p.id')
            ->where(function ($w) use ($needle) {
                $w->where('p.titulo', 'like', $needle)
                  ->orWhere('f.genero', 'like', $needle)
                  ->orWhere('r.actor', 'like', $needle);
            })
            ->select('p.id', 'p.titulo', 'p.poster_url')
            ->distinct()
            ->orderBy('p.visitas', 'desc')
            ->limit(30)
            ->get();

        // Devolvemos exactamente el formato que esperaba tu JS antiguo
        return response()->json($rows);
    }
}
