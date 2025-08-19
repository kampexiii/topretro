<?php
/**
 * Ruta completa del archivo: resources/views/pages/favoritos/index.blade.php
 */
?>
{{-- resources/views/pages/favoritos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Mis Favoritos — TopRetro')

@section('content')
<main class="min-h-[calc(100vh-10rem)]">
  <section class="container-outer py-8">
    <h1 class="text-2xl md:text-3xl font-heading font-bold mb-6">Mis Favoritos</h1>

    @if($favoritos->isEmpty())
      <p class="text-slate-300">No tienes películas en tu lista de favoritos.</p>
    @else
      <x-favoritos.grid :items="$favoritos" />
    @endif
  </section>
</main>
@endsection
