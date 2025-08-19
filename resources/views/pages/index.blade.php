<?php
/**
 * Ruta completa del archivo: resources/views/pages/index.blade.php
 */
?>

{{-- resources/views/pages/index.blade.php --}}
@extends('layouts.app')

@section('content')
<main class="bg-black text-white font-body">

  {{-- 🔹 Landing Mobile --}}
  <x-landing.mobile />

  {{-- 🔹 Landing Desktop --}}
  <div class="hidden md:block">
      <x-landing.navbar />
      <x-landing.hero />
      <hr class="border-slate-700">
      <x-landing.trending />
      <hr class="border-slate-700">
      <x-landing.devices />
      <hr class="border-slate-700">
      <x-landing.faq />
      <hr class="border-slate-700">
      <x-landing.footer />
  </div>

</main>
@endsection
