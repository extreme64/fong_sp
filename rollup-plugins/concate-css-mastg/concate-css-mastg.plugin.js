import concat from 'concat';

export default {

  name: 'concate-css-mastg',

  generateBundle(outputOptions, bundle) {

    const cssFiles = [];

    for (const fileName in bundle) {
      const file = bundle[fileName];
      if (file.type === 'asset' && file.fileName.endsWith('.css')) {
        cssFiles.push(file.source);
      }
    }
    
    if (cssFiles.length > 0) {
      const concatenatedCSS = concat(cssFiles).toString();
      this.emitFile({
        type: 'asset',
        fileName: 'assets/css/styles.css',
        source: concatenatedCSS,
      });
    }
  },
};