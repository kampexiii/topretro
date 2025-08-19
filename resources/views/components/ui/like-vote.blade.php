<?php
/**
 * Ruta completa del archivo: resources/views/components/ui/like-vote.blade.php
 */
?>
{{-- resources/views/components/ui/like-vote.blade.php --}}
@props(['peliculaId' => null, 'liked' => false, 'avg' => null, 'count' => 0, 'myVote' => null])

<div class="flex flex-wrap items-center gap-3">
  {{-- Like toggle --}}
  <form method="POST" action="{{ route('pelicula.like', $peliculaId) }}">
    @csrf
    <button type="submit"
      class="rounded-lg px-3 py-2 ring-1 transition
             {{ $liked ? 'bg-tcs-indigo text-white ring-white/20 hover:bg-tcs-sky' : 'bg-white/10 text-white ring-white/20 hover:bg-white/15' }}"
      title="{{ $liked ? 'Quitar like' : 'Me gusta' }}">
      👍 {{ $liked ? 'Te gusta' : 'Me gusta' }}
    </button>
  </form>

  {{-- Voto estrellas (1..5) --}}
  <form method="POST" action="{{ route('pelicula.voto', $peliculaId) }}" class="flex items-center gap-2">
    @csrf
    <div class="flex items-center">
      @for($i=1; $i<=5; $i++)
        <button name="valor" value="{{ $i }}" class="px-1" title="Votar {{ $i }}" type="submit">
          <span class="text-xl">{{ $myVote && $i <= $myVote ? '★' : '☆' }}</span>
        </button>
      @endfor
    </div>
    <div class="text-sm text-slate-300">
      @if(!is_null($avg))
        <span>{{ number_format($avg, 1) }}/5</span>
        <span class="text-slate-500">({{ $count }})</span>
      @else
        <span>Sin votos</span>
      @endif
    </div>
  </form>
</div>
