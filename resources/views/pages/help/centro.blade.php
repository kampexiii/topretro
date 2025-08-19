<?php
/**
 * Ruta completa del archivo: resources/views/pages/help/centro.blade.php
 */
?>
{{-- resources/views/pages/help/centro.blade.php --}}
@extends('layouts.app')

@section('title', 'Centro de Ayuda — TopRetro')

@section('content')
<main class="container-outer py-10 max-w-4xl space-y-8">
  <header class="flex items-center gap-4">
    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-10 w-auto">
    <div>
      <h1 class="text-2xl md:text-3xl font-heading font-bold">Centro de Ayuda</h1>
      <p class="text-slate-300">Guías, tutoriales y resolución de problemas.</p>
    </div>
  </header>

  {{-- Bloques de ayuda rápidos --}}
  <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <article class="card-soft p-6">
      <h2 class="font-semibold text-lg mb-2">Cuenta y Acceso</h2>
      <ul class="list-disc ml-5 text-slate-200 space-y-1">
        <li>Crear cuenta y confirmar correo</li>
        <li>Iniciar/Cerrar sesión</li>
        <li>Restablecer contraseña</li>
      </ul>
    </article>

    <article class="card-soft p-6">
      <h2 class="font-semibold text-lg mb-2">Uso de TopRetro</h2>
      <ul class="list-disc ml-5 text-slate-200 space-y-1">
        <li>Buscar y filtrar cinemáticas</li>
        <li>Agregar a “Mi Lista”</li>
        <li>Reproducir tráiler y vídeo</li>
      </ul>
    </article>

    <article class="card-soft p-6">
      <h2 class="font-semibold text-lg mb-2">Preferencias</h2>
      <ul class="list-disc ml-5 text-slate-200 space-y-1">
        <li>Tema claro/oscuro</li>
        <li>Idioma (próximamente)</li>
        <li>Notificaciones (próximamente)</li>
      </ul>
    </article>

    <article class="card-soft p-6">
      <h2 class="font-semibold text-lg mb-2">Soporte</h2>
      <ul class="list-disc ml-5 text-slate-200 space-y-1">
        <li><a class="text-tcs-sky hover:underline" href="{{ route('help.faq') }}">Preguntas frecuentes</a></li>
        <li><a class="text-tcs-sky hover:underline" href="{{ route('contact.create') }}">Contacto</a></li>
        <li><a class="text-tcs-sky hover:underline" href="{{ route('info.corporativa') }}">Información corporativa</a></li>
      </ul>
    </article>
  </section>

  {{-- CTA --}}
  <section class="card-soft p-6 flex items-center justify-between gap-4 flex-col md:flex-row">
    <div>
      <h3 class="text-lg font-semibold">¿No encuentras lo que buscas?</h3>
      <p class="text-slate-300">Envíanos tu consulta y te responderemos lo antes posible.</p>
    </div>
    <a href="{{ route('contact.create') }}" class="px-4 py-2 rounded-lg bg-tcs-indigo text-white hover:bg-tcs-sky font-semibold">
      Abrir formulario de contacto
    </a>
  </section>
</main>
@endsection
