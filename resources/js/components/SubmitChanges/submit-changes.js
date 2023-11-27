import Utils from './../../Utils';
import BaseComp from '../BaseComp';

class SubmitChanges extends BaseComp {

    constructor() {
        super();
        this.elementId = Utils.generateUniqueId();
    }

    connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];

        const apiPoint = this.getAttribute('apiPoint')
        const apiAction = this.getAttribute('apiAction')
        const relaodOnSucces = this.getAttribute('relaodOnSucces')

        const projectId = (!this.getAttribute('projectid')) ? '0' : this.getAttribute('projectid');
        const itemClass = this.getAttribute('itemClass')
        const itemId = this.getAttribute('itemId')
        const scopeSelector = document.querySelector(this.getAttribute('scopeselector'));
        const toIncludeIdentifier = this.getAttribute('toincludeidentifier');

        let method = ''
        let reqUrlFull = ''
        let reqUrlTypePart = ''
        const crudType = this.getAttribute('crud-type');
        if (crudType === 'new') {
            reqUrlTypePart = 'new'
            method = 'POST'
            reqUrlFull = `/api/${itemClass}/${reqUrlTypePart}`
        } else if (crudType === 'edit') {
            reqUrlTypePart = 'save'
            method = 'PATCH'
            reqUrlFull = `/api/${itemClass}/${itemId}/${reqUrlTypePart}`
        }

        // NOTE: New way to craft request's url
        if (apiPoint) {
            reqUrlFull = apiPoint
            method = apiAction
        }


        this.innerHTML = `
            <button type="submit" name="submitChanges" class="flex items-center text-xs">
                 <svg class="mx-1" width="48px" height="48px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M16.19 4H7.81C4.17 4 2 6.17 2 9.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V9.81C22 6.17 19.83 4 16.19 4Z" fill="#0073ff"></path> <path d="M21.3 12.23H17.82C16.84 12.23 15.97 12.77 15.53 13.65L14.69 15.31C14.49 15.71 14.09 15.96 13.65 15.96H10.37C10.06 15.96 9.62 15.89 9.33 15.31L8.49 13.66C8.05 12.79 7.17 12.24 6.2 12.24H2.7C2.31 12.24 2 12.55 2 12.94V16.2C2 19.83 4.18 22 7.82 22H16.2C19.63 22 21.74 20.12 22 16.78V12.93C22 12.55 21.69 12.23 21.3 12.23Z" fill="#0073ff"></path> <path d="M14.5295 6.47C14.2395 6.18 13.7595 6.18 13.4695 6.47L12.7495 7.19V2C12.7495 1.59 12.4095 1.25 11.9995 1.25C11.5895 1.25 11.2495 1.59 11.2495 2V7.19L10.5295 6.47C10.2395 6.18 9.75945 6.18 9.46945 6.47C9.17945 6.76 9.17945 7.24 9.46945 7.53L11.4695 9.53C11.4795 9.54 11.4895 9.54 11.4895 9.55C11.5495 9.61 11.6295 9.66 11.7095 9.7C11.8095 9.73 11.8995 9.75 11.9995 9.75C12.0995 9.75 12.1895 9.73 12.2795 9.69C12.3695 9.65 12.4495 9.6 12.5295 9.53L14.5295 7.53C14.8195 7.24 14.8195 6.76 14.5295 6.47Z" fill="#0073ff"></path> </g></svg> SAVE</button>
        `;

        const submitBtn = this.querySelector('[name="submitChanges"]')

        submitBtn.event('click',
            (e) => {
                // this.setPickInStore(projectId, 'avatar', awardId)
                
                postChanges(e)

                this.eventBus.publish(`${itemClass}ChangesSubmited`, {
                    projectId: projectId
                });
            }
        );

       

        const postChanges = async (event) => {

            let inputs = scopeSelector.querySelectorAll(toIncludeIdentifier)

            try {
                const storedApiToken = localStorage.getItem('apiToken');

                let headers = new Headers();
                headers.append('Authorization', `Bearer ${storedApiToken}`);
                headers.append('Content-Type', 'application/json');

                let inputsData = {}

                inputs.forEach((inp) => {

                    let attrName = inp.getAttribute('name')
                    let val = ''
                    if (inp.type === "checkbox"){
                        val = inp.checked
                    } 
                    else if (inp.type === "radio") {
                        if (inp.checked) {
                            val = inp.value
                        }
                    } else {
                        if (!inp.value) {
                            val = inp.getAttribute('value')
                        }else {
                            val = inp.value.trim()
                        }
                    }
                    if(val){
                        console.log('fin val ' + attrName, val);
                        inputsData[attrName] = val
                    }
                })

                if(!reqUrlFull) {
                    throw new Error('API point url, not present!');
                }
                

                const response = await fetch(reqUrlFull, {
                    method: method,
                    headers: headers,
                    body: JSON.stringify(inputsData)
                });

                const data = await response.json();

                if (response.ok) {

                    const message = data.message;
                    console.log(message);

                    this.eventBus.publish(BaseComp.eventName(BaseComp.CHANGED, this.constructor.name), {
                        projectId: projectId,
                        data: message
                    });

                    if(relaodOnSucces){
                        window.location.reload();
                    }

                } else {
                    console.error('Error ...', response);
                }

            } catch (error) {
                console.error('Error:', error);
            }
        }
    }
}

customElements.define('submit-changes', SubmitChanges);