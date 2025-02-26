import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/build/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return 'vendor'; // Mantener vendor separado
                    }
    
                    // Divide los componentes grandes
                    if (id.includes('resources/js/components/')) {
                        const name = id.split('/').pop().replace('.jsx', '');
                        return `components/${name}`; // Crea un chunk por cada componente
                    }
                }
            }
        }
    }
    
});
