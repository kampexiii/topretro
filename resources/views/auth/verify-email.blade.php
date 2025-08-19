<?php
/**
 * Ruta completa del archivo: resources/views/auth/verify-email.blade.php
 */
?>
{{-- resources/views/auth/verify-email.blade.php --}}
@extends('layouts.app')

@section('title', 'Verifica tu email — TopRetro')

@section('content')
<main class="min-h-[calc(100vh-10rem)] grid place-items-center">
  <section class="w-full max-w-lg mx-auto px-4 md:px-0">
    <div class="card-soft p-6 md:p-8 text-center">
      <div class="flex flex-col items-center gap-3 mb-6">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-12 w-auto">
        <h1 class="text-2xl font-semibold">Verifica tu correo</h1>
      </div>

      @if (session('message'))
        <div class="mb-4 rounded-lg bg-green-500/10 text-green-300 border border-green-500/30 px-4 py-3 text-sm">
          {{ session('message') }}
        </div>
      @endif

      <p class="text-slate-200 mb-6">
        Te hemos enviado un enlace de verificación a <strong>{{ auth()->user()->email }}</strong>.
        Si no lo encuentras, revisa tu carpeta de spam o solicita uno nuevo.
      </p>

      <form method="POST" action="{{ route('verification.send') }}" class="inline-flex">
        @csrf
        <x-ui.button type="submit" variant="primary">Reenviar enlace</x-ui.button>
      </form>

      <form method="POST" action="{{ route('logout') }}" class="inline-flex ml-3">
        @csrf
        <x-ui.button type="submit" variant="secondary">Cerrar sesión</x-ui.button>
      </form>

      <p class="mt-6 text-sm text-slate-400">
        Una vez verificado, serás redirigido automáticamente cuando accedas de nuevo.
      </p>
    </div>
  </section>
</main>
@endsection
