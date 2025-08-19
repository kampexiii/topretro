<?php
/**
 * Ruta completa del archivo: resources/views/pages/legal/politica-cookies.blade.php
 */
?>
{{-- resources/views/pages/legal/politica-cookies.blade.php --}}
@extends('layouts.app')

@section('title', 'Política de Cookies — TopRetro')

@section('content')
<x-legal.layout
  title="Política de Cookies"
  updated="{{ now()->toDateString() }}"
  intro="Información sobre el uso de cookies y tecnologías similares."
>
  <h2>1. ¿Qué son las cookies?</h2>
  <p>Pequeños archivos que almacenan información en tu dispositivo para recordar preferencias y analizar uso.</p>

  <h2>2. Tipos de cookies que usamos</h2>
  <ul>
    <li><strong>Esenciales:</strong> necesarias para iniciar sesión y mantener la sesión.</li>
    <li><strong>Preferencias:</strong> tema claro/oscuro y ajustes no críticos.</li>
    <li><strong>Métricas (opcional):</strong> analítica agregada para mejorar el servicio.</li>
  </ul>

  <h2>3. Gestión de cookies</h2>
  <p>Puedes configurar o borrar cookies desde tu navegador. Algunas funciones podrían verse limitadas.</p>

  <h2>4. Cambios</h2>
  <p>Podremos actualizar esta política. Revisa la fecha de última actualización.</p>
</x-legal.layout>
@endsection
