<?php
/**
 * Ruta completa del archivo: resources/views/components/home/categorias.blade.php
 */
?>

{{-- resources/views/components/home/categorias.blade.php --}}
@props(['items' => []])
<section class="container mx-auto px-4 md:px-8 max-w-6xl">
  <h2 class="text-xl md:text-2xl font-heading font-bold mb-4">Categorías</h2>
  <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 md:gap-6">
    @foreach($items as [$icon, $label])
      <div class="aspect-square bg-white/5 rounded-2xl ring-1 ring-white/10 hover:ring-white/25 transition grid place-items-center">
        <a href="{{ url('buscador') . '?categoria=' . urlencode($label) }}" class="block p-6">
          <img
            src="{{ asset('assets/images/categorias/'.$icon) }}"
            alt="Categoría {{ $label }}"
            class="w-20 h-20 md:w-24 md:h-24 object-contain"
            loading="lazy"
          >
        </a>
      </div>
    @endforeach
  </div>
</section>
