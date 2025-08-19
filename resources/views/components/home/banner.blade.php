<?php
/**
 * Ruta completa del archivo: resources/views/components/home/banner.blade.php
 */
?>

{{-- resources/views/components/home/banner.blade.php --}}
@props(['movie' => null])

<section class="relative h-[56vh] md:h-[68vh] w-full overflow-hidden">
  @if($movie)
    <a href="{{ url('pelicula/'.$movie->id) }}" class="absolute inset-0 block">
      <img
        src="{{ asset('assets/'.ltrim($movie->banner_url ?? '', '/')) }}"
        alt="Banner de la película {{ e($movie->titulo) }}"
        class="h-full w-full object-cover"
        loading="eager"
      >
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/10"></div>
    </a>

    <div class="absolute inset-0 flex items-end">
      <div class="container mx-auto px-4 md:px-8 pb-8 md:pb-12 max-w-6xl">
        <h1 class="font-heading text-3xl md:text-5xl font-extrabold drop-shadow">
          {{ e($movie->titulo) }}
        </h1>
        @if(!empty($movie->sinopsis))
          <p class="mt-3 md:mt-4 max-w-3xl text-sm md:text-base text-slate-200 line-clamp-3 md:line-clamp-4">
            {{ e($movie->sinopsis) }}
          </p>
        @endif

        <div class="mt-5 flex flex-wrap gap-3">
          <a href="{{ url('pelicula/'.$movie->id).'?autoplay=1' }}"
             class="inline-flex items-center gap-2 rounded-lg bg-white text-black px-4 py-2 font-semibold hover:bg-slate-100 transition">
            <span>▶</span> Ver ahora
          </a>
          <a href="{{ url('pelicula/'.$movie->id) }}"
             class="inline-flex items-center gap-2 rounded-lg bg-white/10 text-white px-4 py-2 font-semibold ring-1 ring-white/20 hover:bg-white/15 transition">
            ℹ Más información
          </a>
        </div>
      </div>
    </div>
  @else
    <div class="h-[40vh] grid place-items-center">
      <p class="text-slate-300">No hay película para el banner.</p>
    </div>
  @endif
</section>
