<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/reparto.blade.php
 */
?>
{{-- resources/views/components/pelicula/reparto.blade.php --}}
@props(['pelicula', 'reparto' => collect()])

@php $slug = $pelicula->slug ?? null; @endphp

@if($reparto->isEmpty())
  <p class="text-slate-400">No hay reparto cargado.</p>
@else
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
    @foreach($reparto as $index => $actorItem)
      @php
        $n = $index + 1;
        $actorImg = $slug ? asset("assets/images/cinematics/$slug/reparto/{$n}actor.jpg") : null;
        $personajeImg = $slug ? asset("assets/images/cinematics/$slug/reparto/{$n}personaje.jpg") : null;
      @endphp
      <div class="rounded-xl ring-1 ring-white/10 bg-white/5 p-3 text-center">
        @if($actorImg)
          <img src="{{ $actorImg }}" alt="Actor: {{ e($actorItem->actor) }}" class="w-full aspect-[2/3] object-cover rounded-lg mb-2">
        @endif
        <p class="text-sm text-white font-semibold">{{ $actorItem->actor }}</p>
        <p class="text-xs text-slate-400">({{ $actorItem->personaje }})</p>
        @if($personajeImg)
          <img src="{{ $personajeImg }}" alt="Personaje: {{ e($actorItem->personaje) }}" class="w-full aspect-[2/3] object-cover rounded-lg mt-2">
        @endif
      </div>
    @endforeach
  </div>
@endif
