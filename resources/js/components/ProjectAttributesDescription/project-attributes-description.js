import Utils from './../../Utils';
import BaseComp from './../BaseComp';
/**
 * ProjectAttributesDescription
 */
class ProjectAttributesDescription extends BaseComp {
    
    constructor() {
        super();
        this.elementId = Utils.generateUniqueId();
    }

    async connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];

        const avatar = this.getAttribute('avatar-title');
        const terminal = this.getAttribute('terminal-title');
        const background = this.getAttribute('background-title');
        const theme = this.getAttribute('theme-id');
        const themeUIOptions = this.getAttribute('theme-data')

        try {
            
            const storedApiToken = localStorage.getItem('login_token');

            let headers = new Headers();
            headers.append('Authorization', `Bearer ${storedApiToken}`);
            headers.append('Content-Type', 'application/json');

            const response = await fetch(`/api/project/${ projectId }/attributes`, {
                method: 'GET',
                headers: headers,
            });

            const data = await response.json();

            if (response.ok) {

                const projectAttributes = data.message;

                const dataObject = {};
                projectAttributes.forEach(attribute => {
                    dataObject[attribute.attribute_key] = attribute.attribute_value;
                })

                dashStore.setProjectData(projectId, dataObject);

                this.eventBus.publish(BaseComp.eventName(BaseComp.CHANGED, this.constructor.name), {
                    projectId: projectId,
                });

            } else {
                console.error('Error getting project info', response);
            }

        } catch (error) {
            console.error('Error:', error);
        }

        this.innerHTML = `
            <style>
            </style>
            <div>
                <ul>
                    <li>
                        <label for="avatar">Avatar: </label><span name="avatar">${ avatar }</span>
                    </li>
                    <li>
                        <label for="work-terminal">Work Terminal: </label><span name="terminal">${ terminal }</span>
                    </li>
                    <li>
                        <label for="background">Background: </label><span name="background">${ background }</span>
                    </li>
                    <li>
                        <label for="theme">Theme: </label>
                        <select name="theme" theme-id = ${ theme }>
                            <option>Pick theme...</option>
                            ${ themeUIOptions }
                        </select>
                    </li>
                </ul>
                <button name="saveAttrs" data-ui="save-project-attrs"
                        class="bg-yellow-500 text-white hover:bg-yellow-600 active:bg-slate-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">SAVE</button>
            </div>
        `;

        const avatarAwardTitle = this.querySelector('[name="avatar"]')
        const terminalAwardTitle = this.querySelector('[name="terminal"]')
        const backgroungAwardTitle = this.querySelector('[name="background"]')

        this.eventBus.addListener('avatarBtnClicked', (event) => {
            avatarAwardTitle.innerText = event.awardTitle
        });

        this.eventBus.addListener('terminalBtnClicked', (event) => {
            terminalAwardTitle.innerText = event.awardTitle
        });
        
        this.eventBus.addListener('backgroundBtnClicked', (event) => {
            backgroungAwardTitle.innerText = event.awardTitle
        });

        this.querySelector('[name="theme"]').addEventListener('change', (change) => {

            let themeId = change.target.value

            dashStore.setProjectData(projectId, {
                theme_id: themeId,
            });

            this.eventBus.publish('themePicked', {
                projectAttrType: 'theme_id',
                themeId: themeId,
            });
        });

        this.querySelector('[name="saveAttrs"]').addEventListener('click', this.saveAttributePics);
    }

    async saveAttributePics() {

        const storedApiToken = localStorage.getItem('login_token');
        
        const projectAttributesUrl = `/api/project/${projectId}/attributes`;
        
        const projectData = dashStore.getProjectData(projectId);
       
        // Set up the headers for the request, including the API token
        const headers = new Headers();
        headers.append('Authorization', `Bearer ${storedApiToken}`);
        // headers.append('Accept', 'application/json');
        headers.append('Content-Type', 'application/json');

        try {
            const response = await fetch(projectAttributesUrl, {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(projectData)
            });

            if (response.ok) {
                console.log('Attributes saved successfully:', response);
            } else {
                console.error('Error saving selections:', response);
            }

        } catch (error) {
            console.error('Error:', error);
        }
       
    }


}


customElements.define('project-attributes-description', ProjectAttributesDescription);