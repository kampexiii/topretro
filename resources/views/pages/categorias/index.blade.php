<?php
/**
 * Ruta completa del archivo: resources/views/pages/categorias/index.blade.php
 */
?>
{{-- resources/views/pages/categorias/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Categoría: '.$categoria.' — TopRetro')

@section('content')
<main class="container-outer py-8">
  <header class="mb-6">
    <h1 class="text-2xl md:text-3xl font-heading font-bold">Categoría: {{ $categoria }}</h1>
  </header>

  @if($peliculas->isEmpty())
    <p class="text-slate-300">No hay películas en esta categoría.</p>
  @else
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6">
      @foreach($peliculas as $pelicula)
        <x-ui.poster-card
          :href="route('pelicula.show', $pelicula->id)"
          :title="$pelicula->titulo"
          :poster="'assets/'.ltrim($pelicula->poster_url ?? '', '/')"
        />
      @endforeach
    </div>
  @endif
</main>
@endsection
