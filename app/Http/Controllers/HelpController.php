<?php
/**
 * Ruta completa del archivo: app/Http/Controllers/HelpController.php
 */

namespace App\Http\Controllers;

class HelpController extends Controller
{
    public function index()
    {
        return view('pages.help.ayuda');
    }

    public function center()
    {
        return view('pages.help.centro');
    }

    public function faq()
    {
        return view('pages.help.preguntas');
    }
}
