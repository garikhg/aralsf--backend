import {defineConfig} from 'vite';
import path from 'path';
import liveReload from 'vite-plugin-live-reload';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        liveReload(__dirname + '/**/*.php')
    ],
    root: '',
    build: {
        outDir: 'build',
        emptyOutDir: true,
        manifest: true,
        target: 'es2018',
        minify: true,
        write: true,

        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'src/main.js'),
                'editor-style': path.resolve(__dirname, 'src/styles/editor-style.scss'),
            },
            output: {
                entryFileNames: `[name].js`,
                chunkFileNames: `[name].js`,
                assetFileNames: `[name].[ext]`
            }
        },

        css: {
            preprocessorOptions: {
                scss: {
                       // @import "${path.resolve(__dirname, 'src/styles/editor-style.scss')}";
                    // Global SCSS variables or mixins can be imported here
                    additionalData: `
                        @import "${path.resolve(__dirname, 'src/styles/variables.scss')}";
                    `
                }
            }
        }
    },
});
