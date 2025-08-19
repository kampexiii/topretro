<?php
/**
 * Ruta completa del archivo: routes/web.php
 */

use Illuminate\Support\Facades\Route;

// Controladores principales
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContactController;
// Interacciones
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VotosController;
use App\Http\Controllers\ComentarioController;

// Verificación email (nativo)
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth (públicas para formularios)
Route::get('/login',    [LoginController::class, 'show'])->name('login');
Route::post('/login',   [LoginController::class, 'store'])->name('login.store');
Route::post('/logout',  [LoginController::class, 'destroy'])->name('logout');

Route::get('/register',  [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Películas (ficha pública)
Route::get('/pelicula/{id}', [PeliculaController::class, 'show'])->name('pelicula.show');

/*
|--------------------------------------------------------------------------
| Verificación de email (nativo Laravel)
|--------------------------------------------------------------------------
*/
// Aviso: requiere verificar email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Enlace de verificación (click desde el email)
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca el email como verificado
    return redirect()->route('home')->with('success', '¡Email verificado con éxito!');
})->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

// Reenviar email de verificación
Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Hemos enviado un nuevo enlace de verificación a tu correo.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren autenticación + email verificado)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Buscador
    Route::get('/buscador',          [BuscadorController::class, 'index'])->name('buscador.index');
    Route::get('/buscador/buscar',   [BuscadorController::class, 'search'])->name('buscador.search'); // JSON

    // Favoritos
    Route::get('/favoritos',                 [FavoritosController::class, 'index'])->name('favoritos.index');
    Route::post('/favoritos',                [FavoritosController::class, 'store'])->name('favoritos.store');
    Route::delete('/favoritos/{pelicula}',   [FavoritosController::class, 'destroy'])->name('favoritos.destroy');

    // Usuario
    Route::get('/usuario/panel',     [UserController::class, 'panel'])->name('usuario.panel');
    Route::post('/usuario/actualizar',[UserController::class, 'update'])->name('usuario.update');

    // Ayuda
    Route::get('/ayuda',           [HelpController::class, 'index'])->name('help.index');
    Route::get('/ayuda/centro',    [HelpController::class, 'center'])->name('help.center');
    Route::get('/ayuda/preguntas', [HelpController::class, 'faq'])->name('help.faq');

    // Categorías
    Route::get('/categoria',               [CategoriasController::class, 'index'])->name('categoria.index');  // ?categoria=PC
    Route::get('/categoria/{categoria}',   [CategoriasController::class, 'show'])->name('categoria.show');

    // Contacto
    Route::get('/contacto',  [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

    // Información corporativa
    Route::get('/info-corporativa', fn () => view('pages/info/corporativa'))->name('info.corporativa');

    // Interacciones: Likes / Votos / Comentarios
    Route::post('/pelicula/{pelicula}/like', [LikeController::class, 'toggle'])->name('pelicula.like');
    Route::post('/pelicula/{pelicula}/voto', [VotosController::class, 'store'])->name('pelicula.voto');
    Route::post('/pelicula/{pelicula}/comentarios', [ComentarioController::class, 'store'])->name('pelicula.comentarios.store');
    Route::delete('/pelicula/{pelicula}/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('pelicula.comentarios.destroy');
});

/*
|--------------------------------------------------------------------------
| Páginas Legales (públicas)
|--------------------------------------------------------------------------
*/
Route::view('/legal/privacidad',       'pages.legal.privacidad')->name('legal.privacidad');
Route::view('/legal/politica-cookies', 'pages.legal.politica-cookies')->name('legal.cookies');
Route::view('/legal/terminos',         'pages.legal.terminos')->name('legal.terminos');
Route::view('/legal/aviso-legal',      'pages.legal.aviso-legal')->name('legal.aviso');
