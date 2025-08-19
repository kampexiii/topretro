<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/video-modal.blade.php
 */
?>
{{-- resources/views/components/pelicula/video-modal.blade.php --}}
<div x-show="playerOpen"
     x-transition.opacity
     class="fixed inset-0 z-50 bg-black/90 grid place-items-center p-4">
  <div class="relative w-full max-w-5xl aspect-video">
    <button @click="closePlayer()"
            class="absolute -top-10 right-0 text-white/80 hover:text-white text-2xl">×</button>
    <iframe x-show="playerSrc"
            :src="playerSrc"
            allowfullscreen
            allow="autoplay; encrypted-media"
            class="w-full h-full rounded-xl ring-1 ring-white/20 bg-black"></iframe>
  </div>
</div>
