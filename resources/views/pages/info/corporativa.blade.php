<?php
/**
 * Ruta completa del archivo: resources/views/pages/info/corporativa.blade.php
 */
?>
{{-- resources/views/pages/info/corporativa.blade.php --}}
@extends('layouts.app')

@section('title', 'Información Corporativa — TopRetro')

@section('content')
<main class="container-outer py-10 max-w-3xl">
  <div class="card-soft p-6 md:p-8 space-y-6">
    <div class="flex items-center gap-4">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-10 w-auto">
      <h2 class="text-2xl font-heading font-bold">Información Corporativa</h2>
    </div>

    <p class="text-slate-200">
      TopRetro es una plataforma especializada en las cinemáticas de videojuegos. Nuestro equipo está compuesto por
      apasionados del gaming y la tecnología.
    </p>

    <section>
      <h3 class="text-xl font-semibold mb-2">Nuestra misión</h3>
      <p class="text-slate-200">Brindar la mejor experiencia de entretenimiento, reuniendo las mejores cinemáticas y contenido audiovisual en un solo lugar.</p>
    </section>

    <section>
      <h3 class="text-xl font-semibold mb-2">Equipo</h3>
      <p class="text-slate-200">Un equipo multidisciplinar de desarrolladores, diseñadores y expertos en gaming trabajando para ofrecer una plataforma estable, innovadora y atractiva.</p>
    </section>

    <section>
      <h3 class="text-xl font-semibold mb-2">Planes futuros</h3>
      <ul class="list-disc ml-6 space-y-1 text-slate-200">
        <li>Integración con redes sociales para compartir cinemáticas.</li>
        <li>Modo offline (en evaluación).</li>
        <li>Eventos en vivo y charlas sobre lanzamientos.</li>
      </ul>
    </section>
  </div>
</main>
@endsection
