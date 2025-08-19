<?php
/**
 * Ruta completa del archivo: resources/views/components/buscador/keyboard.blade.php
 */
?>
{{-- resources/views/components/buscador/keyboard.blade.php --}}
@php
  $filas = [
    ['1','2','3','4','5'],
    ['6','7','8','9','0'],
    ['Q','W','E','R','T'],
    ['Y','U','I','O','P'],
    ['A','S','D','F','G'],
    ['H','J','K','L','←'],
    ['Z','X','C','V','B'],
    ['N','M','Espacio','Limpiar'],
  ];
@endphp

<div class="space-y-2 select-none">
  @foreach($filas as $fila)
    <div class="flex gap-2">
      @foreach($fila as $tecla)
        @php
          $grow = in_array($tecla, ['Espacio']) ? 'flex-1' : '';
        @endphp
        <button
          type="button"
          class="px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 ring-1 ring-white/10 text-sm {{ $grow }}"
          @click="key('{{ $tecla }}')"
        >
          {{ $tecla }}
        </button>
      @endforeach
    </div>
  @endforeach
</div>
