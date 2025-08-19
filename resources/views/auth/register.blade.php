<?php
/**
 * Ruta completa del archivo: resources/views/auth/register.blade.php
 */
?>
{{-- resources/views/auth/register.blade.php --}}
@php($headerMode = 'sticky')
@php($headerPadding = true)
@extends('layouts.app')

@section('title', 'Crear cuenta — TopRetro')

@section('content')
<main class="min-h-[calc(100vh-10rem)] grid place-items-center">
  <section class="w-full max-w-md mx-auto px-4 md:px-0">
    <div class="card-soft p-6 md:p-8">
      <div class="flex flex-col items-center gap-3 mb-6">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-12 w-auto">
        <h1 class="text-2xl font-semibold">Crear cuenta</h1>
      </div>

      @if ($errors->any())
        <div class="mb-4 rounded-lg bg-yellow-500/10 text-yellow-300 border border-yellow-500/30 px-4 py-3 text-sm">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <x-auth.register-form />

      <div class="mt-6 text-sm text-slate-300 text-center">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="hover:text-tcs-sky font-medium">Inicia sesión</a>
      </div>
    </div>
  </section>
</main>
@endsection
