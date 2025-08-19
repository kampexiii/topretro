<?php
/**
 * Ruta completa del archivo: resources/views/pages/home.blade.php
 */
?>

{{-- resources/views/pages/home.blade.php --}}
@php($headerMode = 'sticky')
@php($headerPadding = true)
@extends('layouts.app')

@section('content')
<main class="bg-black text-white font-body">
  <div class="space-y-16 md:space-y-24">

    {{-- 🔥 Banner Principal --}}
    <x-home.banner :movie="$bannerMovie" />

    {{-- 🎮 Categorías --}}
    <x-home.categorias :items="$categorias" />

    {{-- 🔥 Tendencias --}}
    <x-home.tendencias :items="$tendencias" />

    {{-- ⭐ Recomendaciones para ti --}}
    <x-home.recomendaciones :items="$recomendaciones" />

    {{-- 🎬 Mi Lista --}}
    <x-home.mi-lista :items="$favoritos" />

  </div>
</main>
@endsection
