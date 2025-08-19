<?php
/**
 * Ruta completa del archivo: resources/views/components/auth/register-form.blade.php
 */
?>
{{-- resources/views/components/auth/register-form.blade.php --}}
<form method="POST" action="{{ route('register.store') }}" class="space-y-4">
  @csrf

  <x-ui.input
    label="Nombre"
    name="name"
    type="text"
    placeholder="Tu nombre"
    :value="old('name')"
    required
    autocomplete="name"
  />

  <x-ui.input
    label="Correo electrónico"
    name="email"
    type="email"
    placeholder="correo@ejemplo.com"
    :value="old('email')"
    required
    autocomplete="email"
  />

  <x-ui.input
    label="Contraseña"
    name="password"
    type="password"
    placeholder="••••••••"
    required
    autocomplete="new-password"
  />

  <x-ui.input
    label="Confirmar contraseña"
    name="password_confirmation"
    type="password"
    placeholder="••••••••"
    required
    autocomplete="new-password"
  />

  <label class="flex items-start gap-2 text-sm text-slate-300">
    <input type="checkbox" name="terms" class="mt-1 rounded border-white/20 bg-white/10">
    <span>
      Acepto los
      <a href="{{ url('/terminos') }}" class="hover:text-tcs-sky">Términos</a>
      y la
      <a href="{{ url('/privacidad') }}" class="hover:text-tcs-sky">Política de Privacidad</a>.
    </span>
  </label>

  <div class="pt-2">
    <x-ui.button type="submit" variant="primary" class="w-full">CREAR CUENTA</x-ui.button>
  </div>
</form>
