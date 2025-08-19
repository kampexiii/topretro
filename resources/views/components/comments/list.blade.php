<?php
/**
 * Ruta completa del archivo: resources/views/components/comments/list.blade.php
 */
?>
{{-- resources/views/components/comments/list.blade.php --}}
@props(['items' => collect(), 'peliculaId' => null])

<div class="space-y-4">
  @forelse($items as $c)
    <article class="rounded-xl ring-1 ring-white/10 bg-white/5 p-4">
      <header class="flex items-center justify-between mb-2">
        <div class="flex items-center gap-2">
          <img src="{{ asset('assets/images/avatars/'.($c->avatar ?? 'avatar1.png')) }}"
               alt="avatar" class="w-8 h-8 rounded-full">
          <div>
            <p class="text-sm font-semibold text-white">{{ $c->name ?? 'Usuario' }}</p>
            <p class="text-xs text-slate-400">{{ \Illuminate\Support\Carbon::parse($c->created_at)->diffForHumans() }}</p>
          </div>
        </div>
        @auth
          @if($c->user_id === auth()->id())
            <form method="POST" action="{{ route('pelicula.comentarios.destroy', [$peliculaId, $c->id]) }}">
              @csrf
              @method('DELETE')
              <button class="text-xs px-2 py-1 rounded bg-white/10 hover:bg-white/20 ring-1 ring-white/10">
                Eliminar
              </button>
            </form>
          @endif
        @endauth
      </header>
      <p class="text-slate-200 whitespace-pre-line">{{ $c->contenido }}</p>
    </article>
  @empty
    <p class="text-slate-400">Sé el primero en comentar.</p>
  @endforelse
</div>
