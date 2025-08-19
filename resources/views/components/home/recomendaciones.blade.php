<?php
/**
 * Ruta completa del archivo: resources/views/components/home/recomendaciones.blade.php
 */
?>

{{-- resources/views/components/home/recomendaciones.blade.php --}}
@props(['items' => collect()])

<section class="container mx-auto px-4 md:px-8 max-w-6xl">
  <h2 class="text-xl md:text-2xl font-heading font-bold mb-4">Recomendaciones para ti</h2>

  @if($items && $items->isNotEmpty())
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6">
      @foreach($items as $pelicula)
        <a href="{{ url('pelicula/'.$pelicula->id) }}"
           class="block overflow-hidden rounded-xl ring-1 ring-white/10 hover:ring-white/25 transition">
          <img
            src="{{ asset('assets/'.ltrim($pelicula->poster_url ?? '', '/')) }}"
            alt="Póster de la película {{ e($pelicula->titulo) }}"
            class="w-full aspect-[2/3] object-cover hover:scale-[1.04] transition"
            loading="lazy"
          >
        </a>
      @endforeach
    </div>
  @else
    <p class="text-slate-300">No hay recomendaciones disponibles.</p>
  @endif
</section>
