<?php
/**
 * Ruta completa del archivo: resources/views/components/layout/footer.blade.php
 */
?>
{{-- resources/views/components/layout/footer.blade.php --}}
@php($footerLinks = [
    ['Política de Privacidad', url('/privacidad')],
    ['Política de Cookies', url('/cookies')],
    ['Aviso Legal', url('/aviso-legal')],
    ['Contacto', url('/contacto')],
])
<footer class="bg-tcs-navy-deep text-slate-300 py-12 mt-16">
  <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12">

    {{-- Logo + Slogan --}}
    <div class="flex flex-col items-center md:items-start space-y-4">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-12 w-auto">
      <p class="text-sm text-slate-400">Code. Connect. Create.</p>
    </div>

    {{-- Links --}}
    <div class="flex flex-col items-center space-y-2">
      <h3 class="font-semibold text-white mb-2">Enlaces</h3>
      <ul class="space-y-2 text-sm">
        @foreach($footerLinks as [$label,$href])
          <li><a href="{{ $href }}" class="hover:text-tcs-sky transition">{{ $label }}</a></li>
        @endforeach
      </ul>
    </div>

    {{-- Social --}}
    <div class="flex flex-col items-center md:items-end space-y-3">
      <h3 class="font-semibold text-white">Síguenos</h3>
      <div class="flex gap-4 text-slate-400">
        <a href="https://instagram.com" class="hover:text-tcs-sky" aria-label="Instagram">📷</a>
        <a href="https://linkedin.com" class="hover:text-tcs-sky" aria-label="LinkedIn">💼</a>
        <a href="https://github.com/kampexiii" class="hover:text-tcs-sky" aria-label="GitHub">🐱</a>
      </div>
    </div>
  </div>

  <div class="mt-8 border-t border-white/10 pt-6 text-center text-xs text-slate-500">
    © {{ date('Y') }} TopRetro.es — Todos los derechos reservados.
  </div>
</footer>
