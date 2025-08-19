<?php
/**
 * Ruta completa del archivo: resources/views/auth/login.blade.php
 */
?>
{{-- resources/views/auth/login.blade.php --}}
@php($headerMode = 'sticky')
@php($headerPadding = true)
@extends('layouts.app')

@section('title', 'Iniciar sesión — TopRetro')

@section('content')
<main class="min-h-[calc(100vh-10rem)] grid place-items-center">
  <section class="w-full max-w-md mx-auto px-4 md:px-0">
    <div class="card-soft p-6 md:p-8">
      <div class="flex flex-col items-center gap-3 mb-6">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-12 w-auto">
        <h1 class="text-2xl font-semibold">Iniciar Sesión</h1>
      </div>

      {{-- Alertas --}}
      @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-500/10 text-red-300 border border-red-500/30 px-4 py-3 text-sm">
          {{ session('error') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="mb-4 rounded-lg bg-yellow-500/10 text-yellow-300 border border-yellow-500/30 px-4 py-3 text-sm">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Formulario (componente) --}}
      <x-auth.login-form />

      {{-- Pie --}}
      <div class="mt-6 flex flex-wrap gap-3 justify-between text-sm text-slate-300">
        <a href="{{ url('/forgot-password') }}" class="hover:text-tcs-sky">¿Olvidaste tu contraseña?</a>
        <a href="{{ url('/register') }}" class="hover:text-tcs-sky">Crear cuenta</a>
      </div>
    </div>

    {{-- Volver atrás --}}
    <div class="text-center mt-4">
      <button type="button" class="px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-sm"
              onclick="history.back()">
        VOLVER ATRÁS
      </button>
    </div>
  </section>
</main>
@endsection
