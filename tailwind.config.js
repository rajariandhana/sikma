/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        // require('flowbite/plugin')
    ],
    // content: [
    //     "./node_modules/flowbite/**/*.js"
    // ],
    safelist:[
    'text-red-800','text-orange-800','text-amber-800','text-yellow-800','text-lime-800','text-green-800',
    'text-emerald-800','text-teal-800','text-cyan-800','text-sky-800','text-blue-800','text-indigo-800','text-violet-800',
    'text-purple-800','text-fuchsia-800','text-pink-800','text-rose-800',

    'bg-red-300','bg-orange-300','bg-amber-300','bg-yellow-300','bg-lime-300','bg-green-300',
    'bg-emerald-300','bg-teal-300','bg-cyan-300','bg-sky-300','bg-blue-300','bg-indigo-300','bg-violet-300',
    'bg-purple-300','bg-fuchsia-300','bg-pink-300','bg-rose-300',
    ],
  }
