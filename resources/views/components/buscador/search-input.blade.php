<?php
/**
 * Ruta completa del archivo: resources/views/components/buscador/search-input.blade.php
 */
?>
{{-- resources/views/components/buscador/search-input.blade.php --}}
<div class="relative">
  <input
    type="text"
    id="buscador-input"
    class="w-full rounded-xl bg-white/10 text-white placeholder-slate-400 border border-white/10 focus:border-tcs-sky focus:ring-0 px-4 py-3"
    placeholder="Buscar películas, géneros, actores, etc..."
    x-model.debounce.200ms="query"
    @input.debounce.200ms="search()"
    autocomplete="off"
  >
  <div class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400" x-show="loading">Buscando…</div>
</div>
