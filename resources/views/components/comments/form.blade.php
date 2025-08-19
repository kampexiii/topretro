<?php
/**
 * Ruta completa del archivo: resources/views/components/comments/form.blade.php
 */
?>
{{-- resources/views/components/comments/form.blade.php --}}
@props(['peliculaId' => null])

@auth
  <form method="POST" action="{{ route('pelicula.comentarios.store', $peliculaId) }}" class="space-y-3">
    @csrf
    <div>
      <label for="contenido" class="block mb-1 text-sm text-slate-200">Tu comentario</label>
      <textarea id="contenido" name="contenido" rows="3"
        class="w-full rounded-lg bg-white/10 text-white placeholder-slate-400 border border-white/10 focus:border-tcs-sky focus:ring-0 px-3 py-2"
        placeholder="Escribe algo…" required>{{ old('contenido') }}</textarea>
    </div>
    <x-ui.button type="submit" variant="primary">Publicar</x-ui.button>
  </form>
@else
  <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-lg bg-white/10 text-white px-4 py-2 font-semibold ring-1 ring-white/20 hover:bg-white/15">
    Inicia sesión para comentar
  </a>
@endauth
