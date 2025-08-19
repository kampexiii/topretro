<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/mobile.blade.php
 */
?>

<div class="md:hidden flex flex-col items-center justify-center h-screen space-y-6">
    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="ArcadiaFlix" class="w-40 h-auto">
    <div class="flex gap-4">
        <a href="{{ url('login') }}" class="px-4 py-2 rounded-lg bg-tcs-indigo text-white">Login</a>
        <a href="{{ url('register') }}" class="px-4 py-2 rounded-lg bg-tcs-sky text-white">Register</a>
    </div>
</div>
