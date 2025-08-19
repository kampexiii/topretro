<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/ficha.blade.php
 */
?>
{{-- resources/views/components/pelicula/ficha.blade.php --}}
@props(['ficha' => null])

@if(!$ficha)
  <p class="text-slate-400">No se encontró ficha técnica para esta película.</p>
@else
  <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-slate-200">
    <li><strong>Director:</strong> {{ $ficha->director }}</li>
    <li><strong>Duración:</strong> {{ $ficha->duracion }}</li>
    <li><strong>País:</strong> {{ $ficha->pais }}</li>
    <li><strong>Fecha de Estreno:</strong> {{ $ficha->release_date }}</li>
    <li><strong>Género:</strong> {{ $ficha->genero }}</li>
    <li><strong>Clasificación PEGI:</strong> {{ $ficha->clasificacion_pegi }}</li>
    <li><strong>Presupuesto:</strong> {{ $ficha->presupuesto }}</li>
    <li><strong>Recaudación:</strong> {{ $ficha->recaudacion }}</li>
  </ul>
@endif
