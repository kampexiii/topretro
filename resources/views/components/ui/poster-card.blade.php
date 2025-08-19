<?php
/**
 * Ruta completa del archivo: resources/views/components/ui/poster-card.blade.php
 */
?>
{{-- resources/views/components/ui/poster-card.blade.php --}}
@props([
  'href' => '#',
  'title' => '',
  'poster' => '', // ruta relativa dentro de /public
])

<a href="{{ $href }}"
   class="block overflow-hidden rounded-xl ring-1 ring-white/10 hover:ring-white/25 transition text-center">
  <img
    src="{{ asset($poster) }}"
    alt="Póster de {{ e($title) }}"
    class="w-full aspect-[2/3] object-cover hover:scale-[1.04] transition"
    loading="lazy"
  >
  <p class="p-2 text-sm text-slate-200 line-clamp-2">{{ $title }}</p>
</a>
