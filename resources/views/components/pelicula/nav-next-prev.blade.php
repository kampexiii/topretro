<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/nav-next-prev.blade.php
 */
?>
{{-- resources/views/components/pelicula/nav-next-prev.blade.php --}}
@props(['prev' => null, 'next' => null])

<nav class="container-outer my-6">
  <div class="flex items-center justify-between gap-3">
    {{-- Anterior --}}
    @if($prev)
      <a href="{{ route('pelicula.show', $prev->id) }}"
         class="group inline-flex items-center gap-3 rounded-xl bg-white/10 hover:bg-white/15 ring-1 ring-white/10 px-3 py-2 transition max-w-[48%]">
        <span class="text-lg">⟵</span>
        <div class="flex items-center gap-3 overflow-hidden">
          <img src="{{ asset('assets/'.ltrim($prev->poster_url ?? '', '/')) }}"
               alt="Anterior: {{ e($prev->titulo) }}"
               class="w-10 h-14 object-cover rounded-md ring-1 ring-white/10">
          <div class="min-w-0">
            <p class="text-xs text-slate-400">Anterior</p>
            <p class="text-sm font-semibold text-white truncate group-hover:underline">{{ $prev->titulo }}</p>
          </div>
        </div>
      </a>
    @else
      <span class="inline-flex items-center gap-3 rounded-xl bg-white/5 ring-1 ring-white/5 px-3 py-2 opacity-50 cursor-not-allowed">
        <span class="text-lg">⟵</span>
        <span class="text-sm">No hay anterior</span>
      </span>
    @endif

    {{-- Siguiente --}}
    @if($next)
      <a href="{{ route('pelicula.show', $next->id) }}"
         class="group inline-flex items-center gap-3 rounded-xl bg-white/10 hover:bg-white/15 ring-1 ring-white/10 px-3 py-2 transition max-w-[48%]">
        <div class="flex items-center gap-3 overflow-hidden">
          <div class="min-w-0 text-right">
            <p class="text-xs text-slate-400">Siguiente</p>
            <p class="text-sm font-semibold text-white truncate group-hover:underline">{{ $next->titulo }}</p>
          </div>
          <img src="{{ asset('assets/'.ltrim($next->poster_url ?? '', '/')) }}"
               alt="Siguiente: {{ e($next->titulo) }}"
               class="w-10 h-14 object-cover rounded-md ring-1 ring-white/10">
        </div>
        <span class="text-lg">⟶</span>
      </a>
    @else
      <span class="inline-flex items-center gap-3 rounded-xl bg-white/5 ring-1 ring-white/5 px-3 py-2 opacity-50 cursor-not-allowed">
        <span class="text-sm">No hay siguiente</span>
        <span class="text-lg">⟶</span>
      </span>
    @endif
  </div>
</nav>
