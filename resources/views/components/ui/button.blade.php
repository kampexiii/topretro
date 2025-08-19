<?php
/**
 * Ruta completa del archivo: resources/views/components/ui/button.blade.php
 */
?>
{{-- resources/views/components/ui/button.blade.php --}}
@props([
  'variant' => 'primary', // primary | secondary | ghost
  'type' => 'button',
])

@php
$classes = match($variant) {
  'primary'   => 'bg-tcs-indigo hover:bg-tcs-sky text-white',
  'secondary' => 'bg-white text-black hover:bg-slate-100',
  'ghost'     => 'bg-white/10 text-white hover:bg-white/20',
  default     => 'bg-tcs-indigo hover:bg-tcs-sky text-white',
};
@endphp

<button type="{{ $type }}" {{ $attributes->class([
  'px-4 py-2 rounded-lg text-sm font-semibold transition',
  $classes
]) }}>
  {{ $slot }}
</button>
