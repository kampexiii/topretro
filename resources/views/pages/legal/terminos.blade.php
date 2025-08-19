<?php
/**
 * Ruta completa del archivo: resources/views/pages/legal/terminos.blade.php
 */
?>
{{-- resources/views/pages/legal/terminos.blade.php --}}
@extends('layouts.app')

@section('title', 'Términos y Condiciones — TopRetro')

@section('content')
<x-legal.layout
  title="Términos y Condiciones"
  updated="{{ now()->toDateString() }}"
  intro="Condiciones de uso de TopRetro."
>
  <h2>1. Aceptación</h2>
  <p>Al usar TopRetro aceptas estos términos. Si no estás de acuerdo, no utilices el servicio.</p>

  <h2>2. Cuenta</h2>
  <p>Eres responsable de mantener la confidencialidad de tus credenciales y del uso de tu cuenta.</p>

  <h2>3. Uso del servicio</h2>
  <ul>
    <li>No intentes vulnerar seguridad ni extraer datos masivamente.</li>
    <li>No publiques contenido ilegal o que infrinja derechos.</li>
  </ul>

  <h2>4. Contenido</h2>
  <p>Las cinemáticas y materiales corresponden a sus respectivos titulares. TopRetro organiza y facilita su visualización.</p>

  <h2>5. Limitación de responsabilidad</h2>
  <p>El servicio se ofrece “tal cual”. No garantizamos disponibilidad ininterrumpida ni ausencia de errores.</p>

  <h2>6. Cambios en el servicio</h2>
  <p>Podemos modificar o interrumpir funciones. Te avisaremos cuando sea razonable.</p>
</x-legal.layout>
@endsection
