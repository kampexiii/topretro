<?php
/**
 * Ruta completa del archivo: resources/views/pages/buscador/index.blade.php
 */
?>
{{-- resources/views/pages/buscador/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Buscador — TopRetro')

@section('content')
<main
  class="min-h-[calc(100vh-10rem)]"
  x-data="buscador({
    searchUrl: '{{ route('buscador.search') }}',
    peliculaUrl: '{{ url('pelicula') }}'
  })"
>
  <section class="container-outer py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      {{-- Columna de búsqueda --}}
      <div class="md:col-span-2">
        <h2 class="text-2xl font-heading font-bold mb-4">Búsqueda</h2>

        <x-buscador.search-input />

        <div class="mt-6" id="resultados">
          <template x-if="results.length === 0 && query.length === 0">
            <p class="text-slate-400">Escribe para empezar a buscar películas, géneros o actores…</p>
          </template>
          <template x-if="results.length === 0 && query.length > 0">
            <p class="text-slate-400">No se encontraron resultados para “<span x-text="query"></span>”.</p>
          </template>

          <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4" x-show="results.length">
            <template x-for="item in results" :key="item.id">
              <a
                class="block overflow-hidden rounded-xl ring-1 ring-white/10 hover:ring-white/25 transition"
                :href="peliculaUrl + '/' + item.id"
                :title="item.titulo"
              >
                <img
                  class="w-full aspect-[2/3] object-cover hover:scale-[1.04] transition"
                  :src="asset('assets/', item.poster_url)"
                  :alt="'Póster de '+item.titulo"
                  loading="lazy"
                >
                <div class="p-2 text-sm text-slate-200 line-clamp-2" x-text="item.titulo"></div>
              </a>
            </template>
          </div>
        </div>
      </div>

      {{-- Columna de teclado en pantalla (solo desktop) --}}
      <aside class="hidden md:block">
        <h2 class="text-2xl font-heading font-bold mb-4">Teclado</h2>
        <x-buscador.keyboard />
      </aside>
    </div>
  </section>

  @push('scripts')
  <script>
    // Helper para crear rutas asset('assets/...') desde Alpine
    function asset(prefix, path) {
      path = (path || '').replace(/^\/+/, '');
      return `{{ asset('') }}` + prefix.replace(/^\/+|\/+$/g,'') + '/' + path;
    }

    function buscador({ searchUrl, peliculaUrl }) {
      return {
        query: '',
        results: [],
        loading: false,

        setQuery(v) {
          this.query = v;
          this.search();
        },

        async search() {
          const q = this.query.trim();
          if (!q) { this.results = []; return; }
          this.loading = true;
          try {
            const res = await fetch(`${searchUrl}?q=${encodeURIComponent(q)}`, {
              headers: {'X-Requested-With': 'XMLHttpRequest'}
            });
            if (!res.ok) throw new Error('HTTP ' + res.status);
            this.results = await res.json();
          } catch(e) {
            console.error('Error en la búsqueda:', e);
          } finally {
            this.loading = false;
          }
        },

        // Métodos para el teclado en pantalla
        key(value) {
          if (value === '←') {
            this.query = this.query.slice(0, -1);
          } else if (value === 'Espacio') {
            this.query += ' ';
          } else if (value === 'Limpiar') {
            this.query = '';
          } else {
            this.query += value;
          }
          this.search();
        },

        peliculaUrl,
      }
    }
  </script>
  @endpush
</main>
@endsection
