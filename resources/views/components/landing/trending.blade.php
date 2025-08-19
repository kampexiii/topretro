<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/trending.blade.php
 */
?>

@php
  $trending = ["trending1.jpg","trending2.jpg","trending3.jpg","trending4.jpg","trending5.jpg"];
@endphp

<section class="container mx-auto px-6 py-12">
  <h2 class="text-2xl font-bold mb-6">Tendencias ahora</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
    @foreach($trending as $i => $img)
      <div class="relative">
        <span class="absolute top-2 left-2 bg-black/70 text-white px-2 py-1 rounded-full text-xs font-bold">{{ $i+1 }}</span>
        <img src="{{ asset('assets/images/landing/'.$img) }}" alt="Trending {{ $i+1 }}" class="rounded-lg w-full object-cover aspect-[2/3]">
      </div>
    @endforeach
  </div>
</section>
