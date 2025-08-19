<?php
/**
 * Ruta completa del archivo: resources/views/components/help/faq-item.blade.php
 */
?>
{{-- resources/views/components/help/faq-item.blade.php --}}
@props(['question' => ''])
<details class="group rounded-xl ring-1 ring-white/10 bg-white/5 p-4 open:bg-white/10 transition">
  <summary class="cursor-pointer list-none flex items-center justify-between gap-4">
    <h3 class="font-semibold text-white">{{ $question }}</h3>
    <span class="text-slate-300 transition group-open:rotate-45">+</span>
  </summary>
  <div class="mt-3 text-slate-200">
    {{ $slot }}
  </div>
</details>
