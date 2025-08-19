<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/hero.blade.php
 */
?>
{{-- resources/views/components/pelicula/hero.blade.php --}}
@props(['pelicula', 'ficha' => null])

@php
  $banner = asset('assets/'.ltrim($pelicula->banner_url ?? '', '/'));
  $titulo = $pelicula->titulo ?? 'Película';
  $sinopsisCorta = $pelicula->sinopsis_corta ?? '';
  $trailer = $pelicula->trailer_url ?? null;
  $video   = $pelicula->video_url ?? null;
@endphp

<section class="relative h-[56vh] md:h-[68vh] w-full overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ $banner }}" alt="Banner {{ e($titulo) }}" class="h-full w-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-black/10"></div>
  </div>

  <div class="relative h-full container-outer flex items-end">
    <div class="pb-8 md:pb-12 max-w-4xl">
      <h1 class="font-heading text-3xl md:text-5xl font-extrabold">{{ e($titulo) }}</h1>

      <div class="mt-2 flex flex-wrap gap-3 text-sm text-slate-300">
        @if($ficha?->release_date)<span>{{ e($ficha->release_date) }}</span>@endif
        @if($ficha?->genero)<span>• {{ e($ficha->genero) }}</span>@endif
        @if($ficha?->clasificacion_pegi)<span>• PEGI {{ e($ficha->clasificacion_pegi) }}</span>@endif
      </div>

      @if($sinopsisCorta)
        <p class="mt-3 text-slate-200 line-clamp-3">{{ e($sinopsisCorta) }}</p>
      @endif

      <div class="mt-5 flex flex-wrap gap-3 items-center">
        @if($video)
          <button
            @click="openPlayer('{{ e($video) }}')"
            class="inline-flex items-center gap-2 rounded-lg bg-white text-black px-4 py-2 font-semibold hover:bg-slate-100 transition">
            ▶ Ver ahora
          </button>
        @endif

        @if($trailer)
          <button
            @click="openPlayer('{{ e($trailer) }}')"
            class="inline-flex items-center gap-2 rounded-lg bg-white/10 text-white px-4 py-2 font-semibold ring-1 ring-white/20 hover:bg-white/15 transition">
            🎬 Tráiler
          </button>
        @endif

        {{-- Slot para acciones externas (fav, like, vote, etc.) --}}
        {{ $slot }}

        {{-- Placeholders por si luego añades más acciones --}}
        {{-- <button class="rounded-lg bg-white/10 px-3 py-2 ring-1 ring-white/20 hover:bg-white/15">👍</button>
        <button class="rounded-lg bg-white/10 px-3 py-2 ring-1 ring-white/20 hover:bg-white/15">👎</button> --}}
      </div>
    </div>
  </div>
</section>
