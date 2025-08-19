/**
 * Ruta completa del archivo: resources/js/bootstrap.js
 */

// Axios básico (útil para peticiones a rutas internas)
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// AlpineJS para UI (toggles, acordeones FAQ, etc.)
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Gestor de tema claro/oscuro a través de <html data-theme="...">
(function manageTheme() {
  const html = document.documentElement;
  const key = 'theme';
  const saved = localStorage.getItem(key);

  if (saved) {
    html.setAttribute('data-theme', saved);
  } else {
    // Por defecto oscuro
    html.setAttribute('data-theme', 'dark');
  }

  // Auto-activar botón con id="theme-toggle" si existe
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('theme-toggle');
    if (btn) {
      btn.addEventListener('click', () => {
        const current = html.getAttribute('data-theme') || 'dark';
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem(key, next);
      });
    }
  });
})();
