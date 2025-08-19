<?php
/**
 * Ruta completa del archivo: resources/views/components/forms/contact.blade.php
 */
?>
{{-- resources/views/components/forms/contact.blade.php --}}
<form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
  @csrf

  <x-ui.input label="Asunto" name="asunto" type="text" placeholder="Ej: Sugerencia, Error, etc." :value="old('asunto')" required />

  <div>
    <label for="mensaje" class="block mb-1 text-sm text-slate-200">Mensaje</label>
    <textarea id="mensaje" name="mensaje" rows="5"
      class="w-full rounded-lg bg-white/10 text-white placeholder-slate-400 border border-white/10 focus:border-tcs-sky focus:ring-0 px-3 py-2"
      placeholder="Describe tu duda o sugerencia" required>{{ old('mensaje') }}</textarea>
  </div>

  <x-ui.button type="submit" variant="primary">Enviar</x-ui.button>
</form>
