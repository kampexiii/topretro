<?php
/**
 * Ruta completa del archivo: resources/views/pages/help/ayuda.blade.php
 */
?>
{{-- resources/views/pages/help/ayuda.blade.php --}}
@extends('layouts.app')

@section('title', 'Ayuda — TopRetro')

@section('content')
<main class="container-outer py-10 max-w-3xl">
  <div class="card-soft p-6 md:p-8">
    <div class="flex items-center gap-4 mb-6">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-10 w-auto">
      <h2 class="text-2xl font-heading font-bold">Ayuda Rápida</h2>
    </div>

    <p class="text-slate-200 mb-4">
      Esta sección te guiará en los pasos básicos para usar TopRetro de forma sencilla:
    </p>

    <ul class="list-disc ml-6 space-y-2 text-slate-200">
      <li><strong>Registro e Inicio de Sesión:</strong> Crea tu cuenta con un correo válido y una contraseña segura. Inicia sesión desde la pantalla principal.</li>
      <li><strong>Explorar Cinemáticas:</strong> Navega por tendencias, categorías o usa el buscador para encontrar tus juegos favoritos.</li>
      <li><strong>Añadir a Favoritos:</strong> En la ficha de la película, usa “Agregar a Mi Lista”.</li>
      <li><strong>Modo Claro/Oscuro:</strong> Usa “Cambiar modo” en la esquina superior derecha.</li>
    </ul>

    <p class="mt-6 text-slate-200">
      Para información más detallada, visita el
      <a class="text-tcs-sky hover:underline" href="{{ route('help.center') }}">Centro de Ayuda</a>
      con tutoriales y guías avanzadas.
    </p>
  </div>
</main>
@endsection
