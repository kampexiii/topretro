<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/faq.blade.php
 */
?>

@php
  $faqs = [
    "¿Qué es ArcadiaFlix?" => "ArcadiaFlix es una plataforma de streaming dedicada exclusivamente a las cinemáticas de videojuegos.",
    "¿Cuánto cuesta ArcadiaFlix?" => "ArcadiaFlix es completamente gratuito.",
    "¿Dónde puedo ver ArcadiaFlix?" => "En tu móvil, tableta, ordenador y televisión."
  ];
@endphp

<section class="container mx-auto px-6 py-12 space-y-6">
  <h2 class="text-2xl font-bold">Preguntas frecuentes</h2>
  <div class="space-y-4">
    @foreach($faqs as $q => $a)
      <div x-data="{open:false}" class="border-b border-slate-700 pb-2">
        <button @click="open=!open" class="w-full flex justify-between text-left font-semibold">
          <span>{{ $q }}</span>
          <span x-text="open ? '−' : '+'"></span>
        </button>
        <div x-show="open" class="mt-2 text-slate-300">{{ $a }}</div>
      </div>
    @endforeach
  </div>
  <a href="{{ url('register') }}" class="px-6 py-3 rounded-lg bg-tcs-sky text-black font-semibold">Empezar</a>
</section>
