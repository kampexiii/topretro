<?php
/**
 * Ruta completa del archivo: resources/views/components/home/tendencias.blade.php
 */
?>

{{-- resources/views/components/home/tendencias.blade.php --}}
@props(['items' => collect()])

<section class="container mx-auto px-4 md:px-8 max-w-6xl">
  <h2 class="text-xl md:text-2xl font-heading font-bold mb-4">Tendencias</h2>

  @if($items && $items->isNotEmpty())
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6">
      @foreach($items as $i => $pelicula)
        <div class="relative group">
          <a href="{{ url('pelicula/'.$pelicula->id) }}" class="block overflow-hidden rounded-xl ring-1 ring-white/10 hover:ring-white/25 transition">
            <img
              src="{{ asset('assets/'.ltrim($pelicula->poster_url ?? '', '/')) }}"
              alt="Póster de la película {{ e($pelicula->titulo) }}"
              class="w-full aspect-[2/3] object-cover transform group-hover:scale-[1.04] transition"
              loading="lazy"
            >
          </a>
          <span class="tcs-number-badge">{{ $loop->iteration }}</span>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-slate-300">No hay tendencias disponibles.</p>
  @endif

  {{-- Estilo específico y minimal: badge numerado --}}
  <style>
    .tcs-number-badge{
      position:absolute; top:0.5rem; left:0.5rem;
      display:inline-flex; align-items:center; justify-content:center;
      width:2rem; height:2rem; border-radius:9999px;
      background:rgba(0,0,0,.6); color:#fff; font-weight:800;
      backdrop-filter:saturate(1.2) blur(2px);
      border:1px solid rgba(255,255,255,.15);
    }
  </style>
</section>
