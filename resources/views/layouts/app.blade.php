<?php
/**
 * Ruta completa del archivo: resources/views/layouts/app.blade.php
 */
?>
{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es" class="scroll-smooth" data-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'TopRetro')</title>

  {{-- Fuentes (puedes cambiar por tus preferidas) --}}
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Instrument+Sans:400,500,600,700|Poppins:400,600,700" rel="stylesheet" />

  {{-- Vite: Tailwind v4 + JS --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  @stack('head')
</head>
<body class="bg-black text-white min-h-screen flex flex-col font-sans">
  {{-- Header opcional --}}
  @includeIf('components.layout.header')

  <div class="@if(!isset($headerPadding) || $headerPadding) pt-16 md:pt-20 @endif flex-1">
    @yield('content')
  </div>

  {{-- Footer opcional --}}
  @includeIf('components.layout.footer')

  @stack('scripts')
</body>
</html>
