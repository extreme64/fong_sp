
const swellCheckMastg = {

  name: 'swell-check-plugin',
  
  generateBundle(outputOptions, bundle) {
    
    let fileNumber = Object.keys(bundle).length;
    
    console.log("\n\n| --- Swell Check:\n");
    
    const fileMetadata = {
      thresholds: {
        small: 50000,
        medium: 90000,
        large: 150000,
        veryLarge: 200000,
        tooLarge: 300000
      },
      colors: {
        green: '\x1b[92m',
        yellow: '\x1b[93m',
        orange: '\x1b[91m',
        red: '\x1b[91m',
        reset: '\x1b[0m'
      },
      getColorAndType(size) {
        
        if (!size) {
          throw new Error('File size is required');
        }

        if (size < fileMetadata.thresholds.small) {
          return { category: 'small', color: fileMetadata.colors.green };
        } else if (size < fileMetadata.thresholds.medium) {
          return { category: 'medium', color: fileMetadata.colors.yellow };
        } else if (size < fileMetadata.thresholds.large) {
          return { category: 'large', color: fileMetadata.colors.orange };
        } else if (size < fileMetadata.thresholds.veryLarge) {
          return { category: 'very large', color: fileMetadata.colors.red };
        } else {
          return { category: 'too swellen', color: fileMetadata.colors.red };
        }
      }
    };

    let fileSize
    for (const fileName in bundle) {

      fileSize = 0
      
      const file = bundle[fileName];

      try {

        if (file.fileName.endsWith('.css')) {
          fileSize = file.source.toString().length;
        } else if (file.fileName.endsWith('.js')) {
          fileSize = file.code.toString().length;
        }

        const checkFileObject = fileMetadata.getColorAndType(fileSize);

        if(checkFileObject.color === undefined ){
          console.log(` ${file.fileName} failed size check: ${fileSize} bytes`);
          process.exit(1); // exit with a non-zero status code to indicate failure
        }

        console.log(`${checkFileObject.color}|-> File is ${checkFileObject.category}. / ${fileSize/1000} Kb. ${file.fileName}`);

      } catch (error) {
        console.error(file.fileName, error.message);
      }
  
    }

    console.log(`\n${fileMetadata.colors.reset}| --- ${fileNumber} files, done!`);
    console.log('\n');
  }
};

export default swellCheckMastg;