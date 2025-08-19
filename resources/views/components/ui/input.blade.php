<?php
/**
 * Ruta completa del archivo: resources/views/components/ui/input.blade.php
 */
?>
{{-- resources/views/components/ui/input.blade.php --}}
@props([
  'label' => null,
  'name' => null,
  'type' => 'text',
  'placeholder' => '',
  'value' => '',
  'required' => false,
])
<div>
  @if($label)
    <label for="{{ $name }}" class="block mb-1 text-sm text-slate-200">{{ $label }}</label>
  @endif

  <input
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value }}"
    @required($required)
    {{ $attributes->class([
      'w-full rounded-lg bg-white/10 text-white placeholder-slate-400',
      'border border-white/10 focus:border-tcs-sky focus:ring-0 outline-none',
      'px-3 py-2'
    ]) }}
  >
</div>
