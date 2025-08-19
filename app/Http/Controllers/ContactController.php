<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/ContactController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /** Muestra el formulario de contacto */
    public function create()
    {
        return view('pages.contacto.create');
    }

    /** Procesa el envío (sustituye a actions/procesar_contacto.php) */
    public function store(Request $request)
    {
        $data = $request->validate([
            'asunto'  => ['required','string','max:120'],
            'mensaje' => ['required','string','max:2000'],
        ]);

        // Aquí podrías enviar correo o guardar en DB. Dejamos flash de confirmación:
        return back()->with('message', '¡Mensaje enviado! Te responderemos pronto.');
    }
}
