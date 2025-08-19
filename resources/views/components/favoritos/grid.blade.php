<?php
/**
 * Ruta completa del archivo: resources/views/components/favoritos/grid.blade.php
 */
?>
{{-- resources/views/components/favoritos/grid.blade.php --}}
@props(['items' => collect()])

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6">
  @foreach($items as $fav)
    <x-ui.poster-card
      :href="url('pelicula/'.$fav->id)"
      :title="$fav->titulo"
      :poster="'assets/'.ltrim($fav->poster_url ?? '', '/')"
    />
  @endforeach
</div>
