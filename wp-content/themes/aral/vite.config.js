import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import liveReload from 'vite-plugin-live-reload'
import path from 'path'

export default defineConfig({
  plugins: [
    liveReload(['**/*.php'])
  ],
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "./src/styles/global.scss";`, // Adjust based on your folder structure
      },
    },
    postcss: {
      plugins: [
        tailwindcss(),
        autoprefixer(),
      ],
    },
  },
  server: {
    watch: {
      usePolling: true,
      ignored: ['**/node_modules/**'],
    },
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'), // Ensure that this points to your src folder
    },
  },
  build: {
    rollupOptions: {
      input: {
        main: './src/main.js', // Your main JS entry point
      },
      output: {
        entryFileNames: 'assets/js/main.js', // Consistent file name for JS
        chunkFileNames: 'assets/js/[name].js',
        assetFileNames: 'assets/css/[name].[ext]' // Consistent file name for CSS
      },
    },
  },
})
