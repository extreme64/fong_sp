import Utils from '../../Utils';
import BaseComp from '../BaseComp';

class DeleteItem extends BaseComp {

    constructor() {
        super();
        this.elementId = Utils.generateUniqueId();
    }

    connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];

        const projectId = this.getAttribute('projectid');
        const scopeSelector = document.querySelector(this.getAttribute('scopeselector'));
        const toIncludeIdentifier = this.getAttribute('toincludeidentifier');
        
        /**
         * What item is being deleted
         *
         * @var string
         */
        const itemName = this.getAttribute('itemname');
        const itemId = this.getAttribute('id');

        const apiPointUrl = this.getAttribute('apipoint');

        
        
        this.innerHTML = `
            <button type="submit" name="submitDeleteItem" class="flex items-center text-xs">
                <svg width="24px" height="24px" viewBox="-6 -6 36.00 36.00" fill="none" xmlns="http://www.w3.org/2000/svg"><g   id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6" y="-6" width="36.00" height="36.00" rx="9" fill="#e9ecf1" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.0697 5.23C19.4597 5.07 17.8497 4.95 16.2297 4.86V4.85L16.0097 3.55C15.8597 2.63 15.6397 1.25 13.2997 1.25H10.6797C8.34967 1.25 8.12967 2.57 7.96967 3.54L7.75967 4.82C6.82967 4.88 5.89967 4.94 4.96967 5.03L2.92967 5.23C2.50967 5.27 2.20967 5.64 2.24967 6.05C2.28967 6.46 2.64967 6.76 3.06967 6.72L5.10967 6.52C10.3497 6 15.6297 6.2 20.9297 6.73C20.9597 6.73 20.9797 6.73 21.0097 6.73C21.3897 6.73 21.7197 6.44 21.7597 6.05C21.7897 5.64 21.4897 5.27 21.0697 5.23Z" fill="#0073ff"></path> <path opacity="0.3991" d="M19.2297 8.14C18.9897 7.89 18.6597 7.75 18.3197 7.75H5.67975C5.33975 7.75 4.99975 7.89 4.76975 8.14C4.53975 8.39 4.40975 8.73 4.42975 9.08L5.04975 19.34C5.15975 20.86 5.29975 22.76 8.78975 22.76H15.2097C18.6997 22.76 18.8398 20.87 18.9497 19.34L19.5697 9.09C19.5897 8.73 19.4597 8.39 19.2297 8.14Z" fill="#0073ff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58008 17C9.58008 16.5858 9.91586 16.25 10.3301 16.25H13.6601C14.0743 16.25 14.4101 16.5858 14.4101 17C14.4101 17.4142 14.0743 17.75 13.6601 17.75H10.3301C9.91586 17.75 9.58008 17.4142 9.58008 17Z" fill="#0073ff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75 13C8.75 12.5858 9.08579 12.25 9.5 12.25H14.5C14.9142 12.25 15.25 12.5858 15.25 13C15.25 13.4142 14.9142 13.75 14.5 13.75H9.5C9.08579 13.75 8.75 13.4142 8.75 13Z" fill="#0073ff"></path> </g></svg>
            </button>
            `;

        const submitrBtn = this.querySelector('[name="submitDeleteItem"]')
        const nodesToHide = scopeSelector.querySelectorAll(toIncludeIdentifier)


        submitrBtn.event('click',
            (e) => {

                deleteItem(e)

                this.eventBus.publish('DeleteSubmited', {
                    projectId: projectId,
                    itemname: itemName,
                    itemid: itemId
                });
            }
        );

        const deleteItem = async (event) => {

            try {

                const storedApiToken = localStorage.getItem('apiToken');

                let headers = new Headers();
                headers.append('Authorization', `Bearer ${storedApiToken}`);
                headers.append('Content-Type', 'application/json');

                const response = await fetch(apiPointUrl, {
                    method: 'DELETE',
                    headers: headers,
                });

                const data = await response.json();
                if (response.ok) {
                    
                    const message = data.message;

                    this.eventBus.publish(BaseComp.eventName(BaseComp.DELETED, this.constructor.name), {
                        projectId: projectId,
                    });

                    nodesToHide.forEach(node => {
                        node.remove()
                    });

                } else {
                    console.error('Error ...', response);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }

}

customElements.define('delete-item', DeleteItem);