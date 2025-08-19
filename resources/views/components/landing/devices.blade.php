<?php
/**
 * Ruta completa del archivo: resources/views/components/landing/devices.blade.php
 */
?>

@php
  $devices = ["movil.png","tablet.png","ordenador.png","tv.png"];
@endphp

<section class="container mx-auto px-6 py-12 text-center space-y-6">
  <h2 class="text-2xl font-bold">Disfruta en todas partes.</h2>
  <p class="text-slate-300">Reproduce en streaming en móvil, tableta, ordenador y TV sin pagar más.</p>
  <div class="flex justify-center gap-6 flex-wrap">
    @foreach($devices as $dev)
      <img src="{{ asset('assets/images/landing/'.$dev) }}" alt="{{ ucfirst(pathinfo($dev, PATHINFO_FILENAME)) }}" class="w-24 md:w-32 object-contain">
    @endforeach
  </div>
  <a href="{{ url('register') }}" class="px-6 py-3 rounded-lg bg-tcs-sky text-black font-semibold">Empezar</a>
</section>
