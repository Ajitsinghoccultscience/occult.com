import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    build: {
        // Smaller chunks — only warn above 500 kB
        chunkSizeWarningLimit: 500,
        // CSS per-chunk splitting so unused CSS isn't loaded
        cssCodeSplit: true,
        // Use esbuild (built-in, fastest) for JS minification
        minify: 'esbuild',
        rollupOptions: {
            output: {
                // Cache-friendly hashed filenames
                entryFileNames:   'assets/[name]-[hash].js',
                chunkFileNames:   'assets/[name]-[hash].js',
                assetFileNames:   'assets/[name]-[hash][extname]',
                // Split vendor code into a separate chunk so it can be cached
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return 'vendor';
                    }
                },
            },
        },
    },
});
