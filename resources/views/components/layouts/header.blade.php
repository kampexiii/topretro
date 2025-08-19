<?php
/**
 * Ruta completa del archivo: resources/views/components/layout/header.blade.php
 */
?>
{{-- resources/views/components/layout/header.blade.php --}}
@php($links = [
    ['Inicio', route('home')],
    ['Nosotros', url('/nosotros')],
    ['Servicios', url('/servicios')],
    ['Proyectos', url('/proyectos')],
    ['Contacto', url('/contacto')],
])
<header
    x-data="{open:false}"
    class="fixed top-0 inset-x-0 z-50 bg-black/70 backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8 h-16 md:h-20">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="TopRetro" class="h-10 w-auto">
            <span class="font-heading text-white font-bold text-lg">TopRetro</span>
        </a>

        {{-- NAVIGATION (Desktop) --}}
        <nav class="hidden md:flex items-center gap-8">
            @foreach($links as [$label,$href])
                <a href="{{ $href }}"
                   class="relative text-sm font-medium text-white hover:text-tcs-sky transition">
                    {{ $label }}
                    {{-- indicador activo --}}
                    @if(request()->url() === $href)
                        <span class="absolute -bottom-2 left-0 right-0 h-[2px] bg-tcs-sky rounded"></span>
                    @endif
                </a>
            @endforeach
        </nav>

        {{-- ACTIONS --}}
        <div class="flex items-center gap-3">
            <button id="theme-toggle"
                class="hidden md:inline-flex px-3 py-2 rounded bg-white/10 hover:bg-white/20 text-xs">
                ☾/☀
            </button>
            <a href="{{ url('login') }}"
               class="hidden md:inline-flex px-4 py-2 bg-tcs-indigo hover:bg-tcs-sky text-white rounded-lg text-sm font-semibold transition">
                Iniciar sesión
            </a>

            {{-- MOBILE MENU BUTTON --}}
            <button @click="open=!open" class="md:hidden text-white text-2xl">☰</button>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open" x-transition class="md:hidden bg-black/95 px-6 py-6 space-y-4">
        @foreach($links as [$label,$href])
            <a href="{{ $href }}" class="block text-white hover:text-tcs-sky">{{ $label }}</a>
        @endforeach
        <a href="{{ url('login') }}" class="block mt-4 bg-tcs-indigo text-white px-4 py-2 rounded-lg">Iniciar sesión</a>
    </div>
</header>
