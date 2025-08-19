<?php
/**
 * Ruta completa del archivo: resources/views/components/legal/layout.blade.php
 */
?>
{{-- resources/views/components/legal/layout.blade.php --}}
@props([
  'title' => '',
  'updated' => null,     // e.g. '2025-08-01'
  'intro' => null,
])

<main class="container-outer py-10 max-w-3xl">
  <article class="card-soft p-6 md:p-8 space-y-6">
    <header class="space-y-2">
      <h1 class="text-2xl md:text-3xl font-heading font-bold">{{ $title }}</h1>
      @if($intro)
        <p class="text-slate-300">{{ $intro }}</p>
      @endif
      @if($updated)
        <p class="text-xs text-slate-400">Última actualización: {{ \Illuminate\Support\Carbon::parse($updated)->format('d/m/Y') }}</p>
      @endif
    </header>

    <div class="prose prose-invert max-w-none prose-headings:font-heading prose-a:text-tcs-sky">
      {{ $slot }}
    </div>
  </article>
</main>
