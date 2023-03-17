import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({command, mode, ssrBuild}) => {
    if (command === 'serve') {
        return {
            server: {
                host: '0.0.0.0',
                hmr: {
                    host: 'localhost',
                    // host: 'tall-stack.test',
                },
                watch: {
                    usePolling: true,
                },
            },
            build: {
                manifest: true,
                outDir: 'public/build',
                rollupOptions: {
                    input: 'resources/js/app.js',
                },
                target: ['esnext']
            },
            plugins: [
                laravel({
                    input: ['resources/js/app.js'],
                    refresh: true,
                }),
            ]
        }
    } else {
        return {
            server: {
                host: '0.0.0.0',
                hmr: {
                    host: 'localhost',
                    // host: 'tall-stack.test',
                },
                watch: {
                    usePolling: true,
                },
            },
            build: {
                manifest: true,
                outDir: 'public/build',
                rollupOptions: {
                    input: 'resources/js/app.js',
                },
                target: ['esnext']
            },
            plugins: [
                laravel({
                    input: ['resources/js/app.js'],
                    refresh: true,
                }),
            ]
        }
    }

});
