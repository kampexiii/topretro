<?php
/**
 * Ruta completa del archivo: resources/views/pages/usuario/panel.blade.php
 */
?>
{{-- resources/views/pages/usuario/panel.blade.php --}}
@extends('layouts.app')

@section('title', 'Panel de Usuario — TopRetro')

@section('content')
<main class="container-outer py-8 max-w-3xl">
  <h1 class="text-2xl md:text-3xl font-heading font-bold mb-6 text-center">Panel de Usuario</h1>

  @if(session('success'))
    <div class="mb-4 rounded-lg bg-green-500/10 text-green-300 border border-green-500/30 px-4 py-3 text-sm">
      {{ session('success') }}
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

  <div class="card-soft p-6 md:p-8">
    <h2 class="text-xl font-semibold mb-4">Editar Perfil</h2>

    <form method="POST" action="{{ route('usuario.update') }}" class="space-y-4">
      @csrf

      <input type="hidden" name="id" value="{{ $user->id }}">

      <x-ui.input label="Nombre" name="name" type="text" :value="$user->name" required />
      <x-ui.input label="Email" name="email" type="email" :value="$user->email" required />
      <x-ui.input label="Contraseña (deja en blanco si no deseas cambiarla)" name="password" type="password" />

      <div>
        <p class="mb-2 text-sm text-slate-300">Selecciona un avatar:</p>
        <div class="grid grid-cols-5 gap-3">
          @foreach($availableAvatars as $avatar)
            <label class="flex flex-col items-center gap-2 cursor-pointer">
              <input type="radio" name="avatar" value="{{ $avatar }}" class="sr-only"
                     @checked($user->avatar === $avatar)>
              <img src="{{ asset('assets/images/avatars/'.$avatar) }}"
                   alt="Avatar"
                   class="w-14 h-14 rounded-full ring-2 ring-transparent hover:ring-tcs-sky transition">
              <span class="text-xs text-slate-400">{{ pathinfo($avatar, PATHINFO_FILENAME) }}</span>
            </label>
          @endforeach
        </div>
      </div>

      <div class="pt-2">
        <x-ui.button type="submit" variant="primary">Actualizar Perfil</x-ui.button>
      </div>
    </form>
  </div>
</main>
@endsection
