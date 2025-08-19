<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/sinopsis.blade.php
 */
?>
{{-- resources/views/components/pelicula/sinopsis.blade.php --}}
@props(['pelicula'])
@php $sinopsis = $pelicula->sinopsis_larga ?? $pelicula->sinopsis ?? ''; @endphp
<div class="prose prose-invert max-w-none">
  @if($sinopsis)
    <p>{{ $sinopsis }}</p>
  @else
    <p class="text-slate-400">No hay sinopsis disponible.</p>
  @endif
</div>
