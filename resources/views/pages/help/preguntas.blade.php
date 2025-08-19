<?php
/**
 * Ruta completa del archivo: resources/views/pages/help/preguntas.blade.php
 */
?>
{{-- resources/views/pages/help/preguntas.blade.php --}}
@extends('layouts.app')

@section('title', 'Preguntas Frecuentes — TopRetro')

@section('content')
<main class="container-outer py-10 max-w-3xl">
  <header class="mb-6">
    <h1 class="text-2xl md:text-3xl font-heading font-bold">Preguntas Frecuentes</h1>
    <p class="text-slate-300">Guía rápida para las dudas más comunes.</p>
  </header>

  <section class="space-y-3">
    <x-help.faq-item question="¿Qué es TopRetro?">
      TopRetro es una plataforma para disfrutar cinemáticas de videojuegos de forma organizada y gratuita.
    </x-help.faq-item>

    <x-help.faq-item question="¿Necesito cuenta para ver contenido?">
      Puedes explorar sin cuenta, pero para guardar favoritos o personalizar tu perfil necesitas registrarte e iniciar sesión.
    </x-help.faq-item>

    <x-help.faq-item question="¿Cómo agrego una película a Mi Lista?">
      En la ficha de la película usa el botón “＋” o “Agregar a Mi Lista”. La encontrarás luego en <a href="{{ route('favoritos.index') }}" class="text-tcs-sky hover:underline">Favoritos</a>.
    </x-help.faq-item>

    <x-help.faq-item question="Olvidé mi contraseña, ¿qué hago?">
      Usa la opción de recuperación en la pantalla de acceso (próximamente). Si no aparece, contáctanos desde <a href="{{ route('contact.create') }}" class="text-tcs-sky hover:underline">Contacto</a>.
    </x-help.faq-item>

    <x-help.faq-item question="¿TopRetro tiene app móvil?">
      De momento es web responsive. Una app está en la hoja de ruta.
    </x-help.faq-item>
  </section>
</main>
@endsection
