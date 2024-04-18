/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./src/**/*.{html,js}",
          "./node_modules/flowbite/**/*.js",
          "./resources/**/*.blade.php",
          "./resources/**/*.js",
          "./resources/**/*.vue",
          './vendor/wireui/wireui/resources/**/*.blade.php',
          './vendor/wireui/wireui/ts/**/*.ts',
          './vendor/wireui/wireui/src/View/**/*.php',
          './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  ],
    theme: {
      extend: {
        backgroundColor: {
            '758173': '#758173',
          },
      },
    },
    plugins: [],
  }
