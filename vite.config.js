import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';
import swellCheckMastg from './rollup-plugins/swell-check-mastg/swell-check-mastg.plugin.js';

const optionsCopyToPublic = {
  SRC : `${process.cwd()}/resources`,
  DST    : `${process.cwd()}/public`,
}

export default defineConfig({
  server: {
    watch: {
      include: ['resources/sass/**', 'resources/css/**', 'resources/js/**']
    }
  },
  build: {
    manifest: true,
    outDir: './public/build',
    emptyOutDir: true,
    minify: false,
    rollupOptions: {
      input: {
        'js/app.js': 'resources/js/app.js',
        'css/app.css': 'resources/css/app.css',
      },
      plugins: [
        swellCheckMastg,
        copy({
          targets: [
            { src: `${optionsCopyToPublic.SRC}/css/app.css`, dest: `${optionsCopyToPublic.DST}/css` },
            // { src: `${process.cwd()}/node_modules/tw-elements/css/tw-elements.min.css`, dest: `${optionsCopyToPublic.DST}/css` },
            // { src: `${process.cwd()}/node_modules/tw-elements/js/tw-elements.umd.min.js`, dest: `${optionsCopyToPublic.DST}/js` },
          ],
          verbose: true,
        }),
      ],
    },
  },
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ]
});
