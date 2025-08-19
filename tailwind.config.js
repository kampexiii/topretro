// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
import aspectRatio from '@tailwindcss/aspect-ratio'
import lineClamp from '@tailwindcss/line-clamp'
import containerQueries from '@tailwindcss/container-queries'
import animate from 'tailwindcss-animate'

export default {
  darkMode: 'class', // Usa <html class="dark"> para activar modo oscuro

  content: [
    // Laravel + Blade
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',

    // Archivos fuente (JS/TS/Vue)
    './resources/**/*.{js,ts,vue}',
  ],

  // Evitar purgado de utilidades generadas dinámicamente
  safelist: [
    // Colores corporativos (texto/fondo/borde)
    { pattern: /(bg|text|from|via|to|border|ring)-(brand|tcs|admin|dark|light)(-|$).*/ },
    // Estados y variantes frecuentes
    { pattern: /(hover|focus|active|disabled):.*/, variants: ['sm','md','lg','xl','2xl'] },
    // Gradientes y animaciones personalizadas
    'bg-gradient-radial','bg-gradient-conic','animate-glow','animate-ambilight','animate-shimmer','animate-parallax-y',
    // Pseudo-elementos usados en subrayados animados
    'after:content-[""]','after:w-full','after:h-[2px]','after:bg-tcs-sky','after:bg-tcs-indigo','after:origin-left',
    'after:transition-transform','after:duration-300','after:scale-x-0','after:scale-x-100',
  ],

  theme: {
    container: {
      center: true,
      padding: { DEFAULT: '1rem', sm: '1.25rem', md: '2rem', lg: '2.5rem', xl: '3rem', '2xl': '4rem' },
      screens: { sm: '640px', md: '768px', lg: '1024px', xl: '1280px', '2xl': '1440px' },
    },

    extend: {
      // Paletas y tokens semánticos
      colors: {
        // Identidad Arcadia/TopRetro
        brand: {
          DEFAULT: '#007BFF', // Azul eléctrico principal
          50:  '#E6F0FF',
          100: '#CCE1FF',
          200: '#99C3FF',
          300: '#66A5FF',
          400: '#3387FF',
          500: '#007BFF',
          600: '#0062CC',
          700: '#004A99',
          800: '#003366',
          900: '#001B33',
          neon: '#00CFFF',
          magenta: '#FF3EA5',
          lime: '#B6FF00',
        },

        // Modos claro/oscuro rápidos
        light: { bg: '#FFFFFF', surface: '#F8FAFC', text: '#1F2937', mute: '#64748B', border: '#E2E8F0' },
        dark:  { bg: '#0B1220', surface: '#0F172A', text: '#E2E8F0', mute: '#94A3B8', border: '#1F2A44' },

        // Admin/Panel (Treecore)
        admin: {
          bg: '#061625',
          surface: '#0F172A',
          text: '#E2E8F0',
          accent: '#00CFFF',
          mystic: '#8B5CF6',
          success: '#10B981',
          warn: '#F59E0B',
          danger: '#EF4444',
        },

        // TreeCore Studio (por compatibilidad)
        tcs: {
          'navy-deep': '#040D1A',
          'indigo':    '#1F4CCC',
          'sky':       '#1AA4F9',
          'silver-light': '#CCCDD0',
          'navy':      '#102366',
          'slate':     '#556068',
        },
      },

      // Tipografías modernas (usa fallbacks si alguna no está cargada)
      fontFamily: {
        // Títulos y branding
        heading: [
          'Bion', 'Poppins', 'Inter', 'Avenir Next', 'Avenir',
          ...defaultTheme.fontFamily.sans,
        ],
        // Texto de interfaz
        body: [
          'Inter', 'Poppins', 'Nunito Sans', 'Avenir Next', 'Avenir',
          ...defaultTheme.fontFamily.sans,
        ],
        // Editorial/serif elegante
        display: ['Playfair Display', 'Merriweather', ...defaultTheme.fontFamily.serif],
        // Monoespaciada moderna
        mono: ['JetBrains Mono', 'Fira Code', ...defaultTheme.fontFamily.mono],
      },

      // Sombras y brillos (neón/gamer)
      boxShadow: {
        'soft': '0 4px 24px rgba(0,0,0,0.10)',
        'elev': '0 10px 30px rgba(0,0,0,0.15)',
        'neon': '0 0 8px rgba(0,207,255,.8), 0 0 18px rgba(0,207,255,.6)',
        'brand': '0 0 12px rgba(0,123,255,.7)',
      },
      dropShadow: {
        'neon': ['0 0 6px #00CFFF', '0 0 12px #00CFFF'],
        'brand': ['0 0 6px #007BFF', '0 0 16px #007BFF'],
      },

      // Fondos y gradientes
      backgroundImage: {
        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        'gradient-conic':  'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
        'grid-slate': 'linear-gradient(#0f172a 1px, transparent 1px), linear-gradient(90deg, #0f172a 1px, transparent 1px)',
      },
      backgroundSize: { 'grid-8': '8px 8px', 'grid-12': '12px 12px' },

      // Transiciones y animaciones avanzadas
      transitionTimingFunction: {
        'out-smooth': 'cubic-bezier(.22,1,.36,1)',
        'in-out-soft': 'cubic-bezier(.45,0,.55,1)',
      },
      keyframes: {
        glow: {
          '0%,100%': { boxShadow: '0 0 12px rgba(0,207,255,.35), 0 0 24px rgba(0,207,255,.25)' },
          '50%':     { boxShadow: '0 0 18px rgba(0,207,255,.7),  0 0 36px rgba(0,207,255,.45)' },
        },
        ambilight: {
          '0%':   { filter: 'drop-shadow(0 0 0 rgba(0,123,255,.0))' },
          '50%':  { filter: 'drop-shadow(0 0 12px rgba(0,123,255,.55))' },
          '100%': { filter: 'drop-shadow(0 0 0 rgba(0,123,255,.0))' },
        },
        shimmer: {
          '0%': { backgroundPosition: '-200% 0' },
          '100%': { backgroundPosition: '200% 0' },
        },
        'parallax-y': {
          '0%': { transform: 'translateY(-6%)' },
          '100%': { transform: 'translateY(6%)' },
        },
        float: {
          '0%,100%': { transform: 'translateY(-2%)' },
          '50%': { transform: 'translateY(2%)' },
        },
        tilt: {
          '0%,100%': { transform: 'rotate(-.6deg)' },
          '50%': { transform: 'rotate(.6deg)' },
        },
        marquee: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
      },
      animation: {
        glow: 'glow 2.8s ease-in-out infinite',
        ambilight: 'ambilight 3.2s ease-in-out infinite',
        shimmer: 'shimmer 2s linear infinite',
        'parallax-y': 'parallax-y 8s ease-in-out infinite alternate',
        float: 'float 6s ease-in-out infinite',
        tilt: 'tilt 10s ease-in-out infinite',
        marquee: 'marquee 20s linear infinite',
      },

      // Tipografía (prosa) por modo
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.light.text'),
            a: { color: theme('colors.brand.600'), textDecoration: 'none', fontWeight: '600' },
            'h1,h2,h3,h4': { color: theme('colors.light.text') },
            code: { backgroundColor: theme('colors.light.surface'), padding: '0.2em 0.4em', borderRadius: '6px' },
          },
        },
        dark: {
          css: {
            color: theme('colors.dark.text'),
            a: { color: theme('colors.brand.400') },
            'h1,h2,h3,h4': { color: theme('colors.dark.text') },
            code: { backgroundColor: theme('colors.dark.surface') },
          },
        },
      }),

      // Bordes y radios suaves
      borderRadius: {
        xl: '1rem',
        '2xl': '1.25rem',
        '3xl': '1.5rem',
      },

      // Filtros y blur (para efectos de vidrio/vidriado)
      backdropBlur: { xs: '2px', '3xl': '28px' },

      // Z-index para overlays/control UI
      zIndex: { 60: '60', 70: '70', 80: '80', 90: '90', 100: '100' },
    },
  },

  plugins: [
    forms,
    typography,
    aspectRatio,
    lineClamp,
    containerQueries,
    animate,
  ],
}
