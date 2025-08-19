<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/navbar.blade.php
 */
?>

<nav class="flex justify-between items-center px-6 py-4 bg-black/70 sticky top-0 z-50">
  <a href="{{ url('/') }}">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="ArcadiaFlix" class="h-10">
  </a>
  <div class="flex gap-4">
      <button id="theme-toggle" class="px-3 py-2 bg-slate-800 rounded text-sm">Cambiar modo</button>
      <a href="{{ url('login') }}" class="px-3 py-2 bg-tcs-indigo rounded text-white text-sm">Iniciar sesión</a>
  </div>
</nav>
