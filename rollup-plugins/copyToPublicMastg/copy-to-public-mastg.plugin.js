import path  from 'path';
import copy from 'rollup-plugin-copy';

export default function copyToPublicMastg(options = {}) {

    const { SRC, DST } = options;

    return {
        name: 'copyToPublicMastg',
        
        generateBundle(outputOptions, bundle) {

            console.log('\n| --- Copy To Public: \n\n');

            console.log(SRC, DST);
            copy({
                targets: [
                    { src: path.join(`${SRC}/css`, '**/*'), dest: `${DST}/css` },
                    { src: path.join(`${SRC}/js`, '**/*'), dest: `${DST}/js` },
                ],
                verbose: true,
            })
        }
    }
}