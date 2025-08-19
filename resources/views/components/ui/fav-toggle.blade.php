<?php
/**
 * Ruta completa del archivo: resources/views/components/ui/fav-toggle.blade.php
 */
?>
{{-- resources/views/components/ui/fav-toggle.blade.php --}}
@props(['peliculaId' => null, 'isFav' => false])

<div class="inline-flex">
  @auth
    @if(!$isFav)
      <form method="POST" action="{{ route('favoritos.store') }}">
        @csrf
        <input type="hidden" name="pelicula_id" value="{{ $peliculaId }}">
        <button type="submit"
                class="rounded-lg bg-white/10 px-3 py-2 ring-1 ring-white/20 hover:bg-white/15"
                title="Agregar a Mi Lista">＋</button>
      </form>
    @else
      <form method="POST" action="{{ route('favoritos.destroy', $peliculaId) }}">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="rounded-lg bg-white/10 px-3 py-2 ring-1 ring-red-400/50 hover:bg-red-500/20"
                title="Quitar de Mi Lista">—</button>
      </form>
    @endif
  @else
    <a href="{{ route('login') }}"
       class="rounded-lg bg-white/10 px-3 py-2 ring-1 ring-white/20 hover:bg-white/15"
       title="Inicia sesión para usar Mi Lista">＋</a>
  @endauth
</div>
