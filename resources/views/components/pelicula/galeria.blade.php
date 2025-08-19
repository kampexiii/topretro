<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/galeria.blade.php
 */
?>
{{-- resources/views/components/pelicula/galeria.blade.php --}}
@props(['galeria' => collect()])

@if($galeria->isEmpty())
  <p class="text-slate-400">No hay imágenes en la galería.</p>
@else
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
    @foreach($galeria as $img)
      <figure class="overflow-hidden rounded-xl ring-1 ring-white/10 bg-white/5">
        <img src="{{ asset('assets/'.ltrim($img->image_url ?? '', '/')) }}"
             alt="{{ e($img->descripcion ?? 'Imagen de galería') }}"
             class="w-full h-full object-cover hover:scale-[1.03] transition">
      </figure>
    @endforeach
  </div>
@endif
