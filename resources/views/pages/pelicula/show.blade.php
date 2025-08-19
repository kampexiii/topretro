<?php
/**
 * Ruta completa del archivo: resources/views/pages/pelicula/show.blade.php
 */
?>
{{-- resources/views/pages/pelicula/show.blade.php --}}
@extends('layouts.app')

@section('title', ($pelicula->titulo ?? 'Película').' — TopRetro')

@section('content')
<main
  x-data="{
    tab: 'sinopsis',
    playerOpen:false,
    playerSrc:null,
    openPlayer(src){ this.playerSrc = src; this.playerOpen = true; },
    closePlayer(){ this.playerOpen = false; this.playerSrc = null; }
  }"
>
  {{-- HERO (con acciones: favoritos + like/voto) --}}
  <x-pelicula.hero :pelicula="$pelicula" :ficha="$ficha">
    <div class="flex items-center gap-2">
      <x-ui.fav-toggle :peliculaId="$pelicula->id" :isFav="$isFav" />
      <x-ui.like-vote
        :peliculaId="$pelicula->id"
        :liked="$liked"
        :avg="$votosAvg"
        :count="$votosCount"
        :myVote="$myVote"
      />
    </div>
  </x-pelicula.hero>

  {{-- Navegación Siguiente / Anterior --}}
  <x-pelicula.nav-next-prev :prev="$prev" :next="$next" />

  {{-- TABS --}}
  <x-pelicula.tabs />

  {{-- CONTENIDOS --}}
  <section class="container-outer py-8 space-y-10">
    <div x-show="tab==='sinopsis'" x-transition>
      <x-pelicula.sinopsis :pelicula="$pelicula" />
    </div>
    <div x-show="tab==='ficha'" x-transition>
      <x-pelicula.ficha :ficha="$ficha" />
    </div>
    <div x-show="tab==='reparto'" x-transition>
      <x-pelicula.reparto :pelicula="$pelicula" :reparto="$reparto" />
    </div>
    <div x-show="tab==='galeria'" x-transition>
      <x-pelicula.galeria :galeria="$galeria" />
    </div>

    {{-- Comentarios --}}
    <section class="space-y-4">
      <h2 class="text-xl md:text-2xl font-heading font-bold">Comentarios</h2>
      <x-comments.form :peliculaId="$pelicula->id" />
      <x-comments.list :items="$comentarios" :peliculaId="$pelicula->id" />
    </section>
  </section>

  <x-pelicula.video-modal />
</main>
@endsection
