<?php
/**
 * Ruta completa del archivo: resources/views/pages/legal/privacidad.blade.php
 */
?>
{{-- resources/views/pages/legal/privacidad.blade.php --}}
@extends('layouts.app')

@section('title', 'Política de Privacidad — TopRetro')

@section('content')
<x-legal.layout
  title="Política de Privacidad"
  updated="{{ now()->toDateString() }}"
  intro="Cómo recopilamos, usamos y protegemos tus datos en TopRetro."
>
  <h2>1. Responsable del tratamiento</h2>
  <p>TopRetro (topretro.es) es responsable del tratamiento de los datos personales tratados en el sitio.</p>

  <h2>2. Datos que tratamos</h2>
  <ul>
    <li>Datos de cuenta: nombre, email y contraseña cifrada.</li>
    <li>Uso básico del servicio: favoritos, búsquedas y visitas a fichas.</li>
    <li>Comunicaciones de soporte (si nos contactas).</li>
  </ul>

  <h2>3. Finalidades</h2>
  <p>Prestación del servicio (autenticación, favoritos), soporte y mejora de la plataforma.</p>

  <h2>4. Base legal</h2>
  <p>Ejecución del servicio solicitado (cuenta), interés legítimo (mejora), y tu consentimiento cuando corresponda.</p>

  <h2>5. Conservación</h2>
  <p>Mientras mantengas la cuenta o según plazos legales aplicables.</p>

  <h2>6. Derechos</h2>
  <p>Acceso, rectificación, supresión, oposición, limitación y portabilidad. Escríbenos desde <a href="{{ route('contact.create') }}">Contacto</a>.</p>

  <h2>7. Seguridad</h2>
  <p>Contraseñas cifradas, controles de acceso, y prácticas de seguridad razonables.</p>

  <h2>8. Terceros</h2>
  <p>No vendemos datos. Podemos usar proveedores (hosting, email) bajo contrato y confidencialidad.</p>
</x-legal.layout>
@endsection
