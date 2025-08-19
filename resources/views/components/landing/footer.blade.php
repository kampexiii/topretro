<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/footer.blade.php
 */
?>

@php
  $footerLinks = [
    ["Preguntas Frecuentes","#"],
    ["Contáctanos","#"],
    ["Ayuda","#"],
    ["Términos","#"],
    ["Privacidad","#"],
    ["Política de cookies","#"],
    ["Centro de ayuda","#"],
    ["Redes sociales","#"],
    ["Información corporativa","#"]
  ];
@endphp

<footer class="bg-black/80 text-slate-300 py-12 mt-12">
  <div class="container mx-auto px-6 text-center space-y-6">
    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="ArcadiaFlix" class="mx-auto h-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm">
      @foreach(array_chunk($footerLinks,3) as $group)
        <ul class="space-y-2">
          @foreach($group as [$txt,$url])
            <li><a href="{{ $url }}" class="hover:underline">{{ $txt }}</a></li>
          @endforeach
        </ul>
      @endforeach
    </div>
  </div>
</footer>
