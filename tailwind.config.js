/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
  ],
  theme: {
    extend: {
        boxShadow: {
            'outline-l-red-4': '4px 0 0 0 #F55447',
        },
    },
  },
  plugins: [

  ],
}

