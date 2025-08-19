<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/CategoriasController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /** /categoria?categoria=PC */
    public function index(Request $request)
    {
        $categoria = trim((string) $request->query('categoria'));
        if ($categoria === '') {
            return redirect()->route('home');
        }
        return $this->renderCategoria($categoria);
    }

    /** /categoria/{categoria} */
    public function show(string $categoria)
    {
        return $this->renderCategoria($categoria);
    }

    private function renderCategoria(string $categoria)
    {
        $peliculas = DB::table('peliculas')
            ->select('id','titulo','poster_url')
            ->where('categoria', $categoria)
            ->orderBy('titulo')
            ->get();

        return view('pages.categorias.index', [
            'categoria' => $categoria,
            'peliculas' => $peliculas,
        ]);
    }
}
