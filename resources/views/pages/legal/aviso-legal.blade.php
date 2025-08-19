<?php
/**
 * Ruta completa del archivo: resources/views/pages/legal/aviso-legal.blade.php
 */
?>
{{-- resources/views/pages/legal/aviso-legal.blade.php --}}
@extends('layouts.app')

@section('title', 'Aviso Legal — TopRetro')

@section('content')
<x-legal.layout
  title="Aviso Legal"
  updated="{{ now()->toDateString() }}"
  intro="Información general del sitio y condiciones legales básicas."
>
  <h2>1. Identificación</h2>
  <p>TopRetro — topretro.es — proyecto académico/desarrollado con fines demostrativos.</p>

  <h2>2. Propiedad intelectual</h2>
  <p>Las marcas, logotipos y contenidos pertenecen a sus titulares. Uso con fines informativos/educativos.</p>

  <h2>3. Enlaces</h2>
  <p>TopRetro puede enlazar a sitios de terceros. No nos hacemos responsables de su contenido o políticas.</p>

  <h2>4. Contacto</h2>
  <p>Para consultas legales o de privacidad, usa el formulario de <a href="{{ route('contact.create') }}">Contacto</a>.</p>
</x-legal.layout>
@endsection
