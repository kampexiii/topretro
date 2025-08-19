<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/hero.blade.php
 */
?>

<section class="relative h-[70vh] flex items-center justify-center text-center">
    <div class="absolute inset-0 bg-[url('/assets/images/landing/hero.jpg')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="relative z-10 space-y-4">
        <h1 class="text-4xl md:text-6xl font-bold">Disfruta de los videojuegos como nunca antes.</h1>
        <p class="text-lg md:text-xl">Disfruta donde quieras. Totalmente gratuito.</p>
        <a href="{{ url('register') }}" class="px-6 py-3 rounded-lg bg-tcs-sky text-black font-semibold">Empezar</a>
    </div>
</section>
