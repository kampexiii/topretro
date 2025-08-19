<?php
/**
 * Ruta completa del archivo: resources/views/pages/contacto/create.blade.php
 */
?>
{{-- resources/views/pages/contacto/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Contacto — TopRetro')

@section('content')
<main class="container-outer py-10 max-w-2xl">
  <div class="card-soft p-6 md:p-8">
    <div class="flex items-center gap-4 mb-6">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-10 w-auto">
      <h2 class="text-2xl font-heading font-bold">Contáctanos</h2>
    </div>

    <p class="text-slate-200 mb-4">
      ¿Tienes alguna duda, sugerencia o problema? Rellena este formulario y te responderemos pronto.
    </p>

    @if(session('message'))
      <div class="mb-4 rounded-lg bg-green-500/10 text-green-300 border border-green-500/30 px-4 py-3 text-sm">
        {{ session('message') }}
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

    <x-forms.contact />
  </div>
</main>
@endsection
