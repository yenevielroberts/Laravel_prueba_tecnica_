
export default {
  content: [
    './resources/viws/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
        colors:{
        primary: '#1E5337', // Verde oscuro (botones, fondo navbar)
        secondary: '#F4E8C1',// Beige claro (fondo general)
        accent: '#F5A623', // Naranja mostaza (resaltados y detalles)
        highlight: '#FFD166',// Amarillo cálido (botones y precios)
        light: '#FFF9EB', // Fondo claro suave
        dark: '#0F2E1D',// Verde casi negro (texto principal) 
    
        redish: '#E76F51', // Rojo-anaranjado (detalles o alertas)
        greenish: '#A7C957',// Verde oliva suave (íconos, etiquetas)
        brown: '#B07B44', // Marrón cálido (fondo de productos)
        }
    },
  },
  plugins: [],
};
