import Utils from './../../Utils';
import BaseComp from './../BaseComp';
/**
 * ImageDragDropUpload
 */

class ImageDragDropUpload extends HTMLElement {
    
    reqUrlFull

    constructor() {
        super();
    }

    connectedCallback() {
    
        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];

        this.reqUrlFull = this.getAttribute('apiPoint');
        
        this.innerHTML = `  
            <div class="image-dd-upload p-1 md:p-2">  
                <div class="image-dd-upload__drag-area border-0" id="drop-area">
                    <div class="mt-4 relative mb-3" data-te-input-wrapper-init>
                        <input type="file" id="fileInput" accept="image/*" style="display: none">
                        <label class="rounded border-0"for="fileInput">Drag & Drop or Click to Upload</label>
                    </div>
                </div>
                <div class="image-dd-upload__preview flex w-1/4 aspect-square flex-wrap mt-4">
                    <div class="w-full">
                        <img 
                            alt="gallery"
                            class="block h-full w-full rounded-lg object-cover object-center"
                            src="./../../../images/plc-hld.png" />
                    </div>
                </div>
                <div class="image-dd-upload__file-name mt-4 relative mb-3" data-te-input-wrapper-init>
                    <input
                        type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.33rem] text-xs leading-[1.5] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="uploadImageInp"
                        name="uploadImageInp"
                        placeholder=""
                        value=""/>
                    <label
                        for="uploadImageInp"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-xs leading-[1.5] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.75rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.75rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Image file name
                    </label>
                </div>
                <button>
                    <svg width="64px" height="64px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.5292 3.47023L12.5292 1.47023C12.5192 1.46023 12.5092 1.46023 12.5092 1.45023C12.4492 1.39023 12.3692 1.34023 12.2892 1.30023C12.2792 1.30023 12.2792 1.30023 12.2692 1.29023C12.1892 1.26023 12.1092 1.25023 12.0292 1.24023C11.9992 1.24023 11.9792 1.24023 11.9492 1.24023C11.8892 1.24023 11.8292 1.26023 11.7692 1.28023C11.7392 1.29023 11.7192 1.30023 11.6992 1.31023C11.6192 1.35023 11.5392 1.39023 11.4792 1.46023L9.47922 3.46023C9.18922 3.75023 9.18922 4.23023 9.47922 4.52023C9.76922 4.81023 10.2492 4.81023 10.5392 4.52023L11.2592 3.80023V9.00023C11.2592 9.41023 11.5992 9.75023 12.0092 9.75023C12.4192 9.75023 12.7492 9.41023 12.7492 9.00023V3.81023L13.4692 4.53023C13.6192 4.68023 13.8092 4.75023 13.9992 4.75023C14.1892 4.75023 14.3792 4.68023 14.5292 4.53023C14.8192 4.24023 14.8192 3.76023 14.5292 3.47023Z" fill="#0073ff"></path> <path opacity="0.4" d="M16.19 6H7.81C4.17 6 2 8.17 2 11.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V11.82C22 8.17 19.83 6 16.19 6Z" fill="#0073ff"></path> <path d="M21.3 12.23H17.82C16.84 12.23 15.97 12.77 15.53 13.65L14.69 15.31C14.49 15.71 14.09 15.96 13.65 15.96H10.37C10.06 15.96 9.62 15.89 9.33 15.31L8.49 13.66C8.05 12.79 7.17 12.24 6.2 12.24H2.7C2.31 12.24 2 12.55 2 12.94V16.2C2 19.83 4.18 22 7.82 22H16.2C19.63 22 21.74 20.12 22 16.78V12.93C22 12.55 21.69 12.23 21.3 12.23Z" fill="#0073ff"></path> </g></svg>
                </button>
            </div>
        `;

        this.dropArea = this.querySelector('#drop-area');
        this.fileInput = this.querySelector('#fileInput');

        this.imgsHolder = this.querySelector(".image-dd-upload__preview > div")
        this.img = this.querySelector(".image-dd-upload__preview img")
        this.input = this.querySelector(".image-dd-upload__file-name input")

        this.setupListeners();
    }




    setupListeners() {
        this.dropArea.addEventListener('dragover', this.handleDragOver.bind(this));
        this.dropArea.addEventListener('drop', this.handleDrop.bind(this));
        this.fileInput.addEventListener('change', this.handleFileSelect.bind(this));
    }

    handleDragOver(e) {
        e.preventDefault();
        this.dropArea.classList.add('drag-over');
    }

    handleDrop(e) {
        e.preventDefault();
        this.dropArea.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        this.handleFiles(files);
    }

    handleFileSelect() {
        const files = this.fileInput.files;
        this.handleFiles(files);
    }

    async handleFiles(files) {

        this.eventBus.publish(`handleFiles`, {
        })

        try {

            const storedApiToken = localStorage.getItem('login_token'); 

            let headers = new Headers();
                        headers.append('Authorization', `Bearer ${storedApiToken}`);

            const formData = new FormData();
            // Loop through the files and append each one with a unique name
            for (let i = 0; i < files.length; i++) {
                formData.append(`file${i}`, files[i]);
            }

            const response = await fetch(this.reqUrlFull, {
                method: "POST",
                headers: headers,
                body: formData
            });

            const data = await response.json();

            if (response.ok) {

                this.eventBus.publish(BaseComp.eventName(BaseComp.CHANGED, this.constructor.name), {
                    
                });

                // FIXME: localhsot url
                this.img.remove()
                data.files.forEach(img => {
                    const newImage = document.createElement('img');
                    newImage.src = `./images/${img.path}`;
                    newImage.alt = 'new image';
                    this.imgsHolder.appendChild(newImage);

                    this.input.value += img.name + '|' + img.memeType + ','
                });
                
                //  FIXME: Make ia a unique name and add in all HTML. value -> eg. 'comp-value'
                this.setAttribute('value', this.input.value)
                this.input.focus()

            } else {
                console.error('Error ...', response);
            }

        } catch (error) {
            console.error('Error:', error);
        }
    }
}

customElements.define('image-drag-drop-upload', ImageDragDropUpload);