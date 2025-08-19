<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/HomeController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ID de usuario (si hay auth; si no, null)
        $userId = Auth::id();

        // --- BANNER PRINCIPAL ---
        $bannerMovie = DB::table('peliculas')
            ->select('id', 'titulo', 'sinopsis', 'banner_url')
            ->orderByDesc('visitas')
            ->first();

        // --- TENDENCIAS (top 5 por visitas) ---
        $tendencias = DB::table('peliculas')
            ->select('id', 'titulo', 'poster_url')
            ->orderByDesc('visitas')
            ->limit(5)
            ->get();

        // --- MI LISTA (favoritos del usuario) ---
        $favoritos = collect();
        if ($userId) {
            $favoritos = DB::table('favoritos as f')
                ->join('peliculas as p', 'f.pelicula_id', '=', 'p.id')
                ->where('f.user_id', $userId)
                ->select('p.id', 'p.titulo', 'p.poster_url')
                ->get();
        }

        // --- RECOMENDACIONES (aleatorio 5) ---
        $recomendaciones = DB::table('peliculas')
            ->select('id', 'titulo', 'poster_url')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // Categorías estáticas (como en tu PHP)
        $categorias = [
            ['nintendo.png',    'Nintendo'],
            ['playstation.png', 'PlayStation'],
            ['xbox.png',        'Xbox'],
            ['steam.png',       'PC'],
        ];

        return view('pages.home', [
            'bannerMovie'     => $bannerMovie,
            'tendencias'      => $tendencias,
            'favoritos'       => $favoritos,
            'recomendaciones' => $recomendaciones,
            'categorias'      => $categorias,
        ]);
    }
}
