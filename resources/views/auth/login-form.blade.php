<?php
/**
 * Ruta completa del archivo: resources/views/components/auth/login-form.blade.php
 */
?>
{{-- resources/views/components/auth/login-form.blade.php --}}
<form method="POST" action="{{ route('login.store') }}" class="space-y-4">
  @csrf

  <x-ui.input
    label="Correo Electrónico"
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
    autocomplete="current-password"
  />

  <div class="flex items-center justify-between pt-2">
    <x-ui.button type="submit" variant="primary">INICIAR SESIÓN</x-ui.button>
    <x-ui.button type="reset"  variant="ghost">LIMPIAR</x-ui.button>
  </div>
</form>
