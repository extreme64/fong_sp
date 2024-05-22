import path  from 'path';
import childProcess from 'child_process';

export default function synkMastg(options = {}) {

    return {

        name: 'synkMastg-plugin',

        generateBundle(outputOptions, bundle) {
            
            console.log(`\n| --- Synk Mastg:`);

            const rsyncDistSh = path.join(__dirname, '/rsync-dist.sh');
            const args = [options.SRC, options.DST];

            try {

                console.log(`Running ${rsyncDistSh}...`);

                childProcess.execFile(rsyncDistSh, args, (error, stdout, stderr) => {
                    if (error) {
                        console.error(`exec error: ${error}`);
                        return;
                    }

                    if(stderr) {
                        console.log(`rsync error: ${stderr}\n`);
                    }

                    // Print echos into terminal
                    console.log(`${stdout}`);

                });

            } catch (error) {
                console.error('Error running rsync:', error.message);
            }


        },
    }
}

// export synkMastg;
