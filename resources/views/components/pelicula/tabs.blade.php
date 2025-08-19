<?php
/**
 * Ruta completa del archivo: resources/views/components/pelicula/tabs.blade.php
 */
?>
{{-- resources/views/components/pelicula/tabs.blade.php --}}
<nav class="container-outer mt-6">
  <div class="inline-flex rounded-xl bg-white/5 ring-1 ring-white/10 p-1">
    <button class="px-4 py-2 rounded-lg text-sm"
            :class="tab==='sinopsis' ? 'bg-white/15 text-white' : 'text-slate-300 hover:text-white'"
            @click="tab='sinopsis'">Sinopsis</button>
    <button class="px-4 py-2 rounded-lg text-sm"
            :class="tab==='ficha' ? 'bg-white/15 text-white' : 'text-slate-300 hover:text-white'"
            @click="tab='ficha'">Ficha Técnica</button>
    <button class="px-4 py-2 rounded-lg text-sm"
            :class="tab==='reparto' ? 'bg-white/15 text-white' : 'text-slate-300 hover:text-white'"
            @click="tab='reparto'">Reparto</button>
    <button class="px-4 py-2 rounded-lg text-sm"
            :class="tab==='galeria' ? 'bg-white/15 text-white' : 'text-slate-300 hover:text-white'"
            @click="tab='galeria'">Galería</button>
  </div>
</nav>
