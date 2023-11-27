import Utils from './../../Utils';
import BaseComp from "./../BaseComp";

/**
 * ProjectAttributesSetting
 */
class ProjectAttributesSetting extends HTMLElement {
    
    constructor() {
        super();
        this.elementId = Utils.generateUniqueId();
    }

    connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];

        const awardId = this.getAttribute('award-id');
        const awardType = this.getAttribute('award-type');
        const awardSrc = this.getAttribute('award-src');
        const awardTitle = this.getAttribute('award-title');

        let currentProjectAttributes = {}

        this.innerHTML = `
            <style>
                project-attributes-setting {
                    display: flex; 
                    flex-direction: column;
                    align-items: center;
                }
                .award-picture img {
                    width: 80px;
                    border-radius: 10px;
                }
                .attributes-set-as {
                    width: 25px;
                    display: flex;
                    justify-content: center;
                }
                .attributes-set-as > .set-as_button.active {
                    background-color: navy
                }
            </style>
            <div class="award-picture">
                <img src="${awardSrc}" alt="Award Picture">
            </div>
            <div>${awardType}</div>
            <div class="attributes-set-as">
                <button class="set-as_button set-avatar-btn hover:bg-slate-600 active:bg-yellow-600 rounded-sm p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#dd6d22}</style><path d="M370.7 96.1C346.1 39.5 289.7 0 224 0S101.9 39.5 77.3 96.1C60.9 97.5 48 111.2 48 128v64c0 16.8 12.9 30.5 29.3 31.9C101.9 280.5 158.3 320 224 320s122.1-39.5 146.7-96.1c16.4-1.4 29.3-15.1 29.3-31.9V128c0-16.8-12.9-30.5-29.3-31.9zM336 144v16c0 53-43 96-96 96H208c-53 0-96-43-96-96V144c0-26.5 21.5-48 48-48H288c26.5 0 48 21.5 48 48zM189.3 162.7l-6-21.2c-.9-3.3-3.9-5.5-7.3-5.5s-6.4 2.2-7.3 5.5l-6 21.2-21.2 6c-3.3 .9-5.5 3.9-5.5 7.3s2.2 6.4 5.5 7.3l21.2 6 6 21.2c.9 3.3 3.9 5.5 7.3 5.5s6.4-2.2 7.3-5.5l6-21.2 21.2-6c3.3-.9 5.5-3.9 5.5-7.3s-2.2-6.4-5.5-7.3l-21.2-6zM112.7 316.5C46.7 342.6 0 407 0 482.3C0 498.7 13.3 512 29.7 512H128V448c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64l98.3 0c16.4 0 29.7-13.3 29.7-29.7c0-75.3-46.7-139.7-112.7-165.8C303.9 338.8 265.5 352 224 352s-79.9-13.2-111.3-35.5zM176 448c-8.8 0-16 7.2-16 16v48h32V464c0-8.8-7.2-16-16-16zm96 32a16 16 0 1 0 0-32 16 16 0 1 0 0 32z"/></svg>
                </button>
                <button class="set-as_button set-terminal-btn hover:bg-slate-600 active:bg-yellow-600 rounded-sm p-1">
                     <svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#bdca12}</style><path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                </button>
                <button class="set-as_button set-background-btn hover:bg-slate-600 active:bg-yellow-600 rounded-sm p-1">
                     <svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#d9a412}</style><path d="M448 80c8.8 0 16 7.2 16 16V415.8l-5-6.5-136-176c-4.5-5.9-11.6-9.3-19-9.3s-14.4 3.4-19 9.3L202 340.7l-30.5-42.7C167 291.7 159.8 288 152 288s-15 3.7-19.5 10.1l-80 112L48 416.3l0-.3V96c0-8.8 7.2-16 16-16H448zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                </button>
            </div>
            `;


        const setAvatarBtn = this.querySelector('.set-avatar-btn')
        const setTerminalBtn = this.querySelector('.set-terminal-btn')
        const setBackgroungBtn = this.querySelector('.set-background-btn')

        this.eventBus.addListener(BaseComp.eventName(BaseComp.CHANGED, 'ProjectAttributesDescription'), (event) => {
            
            if (event.projectId === projectId) {
                const storeProjectAttributes = dashStore.getProjectData(projectId);
                
                if (storeProjectAttributes !== undefined) {
                    this._manadgeBtnStatus(setAvatarBtn, storeProjectAttributes.avatar_id === awardId)
                    this._manadgeBtnStatus(setTerminalBtn, storeProjectAttributes.terminal_id === awardId)
                    this._manadgeBtnStatus(setBackgroungBtn, storeProjectAttributes.background_id === awardId)
                } else {
                    console.log('ERROR', 'No data in store');
                }
            }
        });


        this.eventBus.addListener('avatarBtnClicked', (event) => {
            (dashStore.getProjectData(projectId).avatar_id === awardId) 
                ? setAvatarBtn.classList.add('active') 
                : setAvatarBtn.classList.remove('active');
        });

        this.eventBus.addListener('terminalBtnClicked', (event) => {
            (dashStore.getProjectData(projectId).terminal_id === awardId)
                ? setTerminalBtn.classList.add('active')
                : setTerminalBtn.classList.remove('active');
        });

        this.eventBus.addListener('backgroundBtnClicked', (event) => {
            (dashStore.getProjectData(projectId).background_id === awardId)
                ? setBackgroungBtn.classList.add('active')
                : setBackgroungBtn.classList.remove('active');
        });


        // Event listeners for the attribute buttons
        setAvatarBtn.event('click', 
            () => {
                this.setPickInStore(projectId, 'avatar', awardId)
                this.eventBus.publish('avatarBtnClicked', {
                        projectAttrType: 'avatar_id',
                        awardId: awardId,
                        awardImageUrl: awardSrc,
                        awardTitle: awardTitle
                    }
                );
            }
        );

        setTerminalBtn.event('click', 
            () => {
                this.setPickInStore(projectId, 'terminal', awardId)
                this.eventBus.publish('terminalBtnClicked', {
                        projectAttrType: 'terminal_id',
                        awardId: awardId,
                        awardImageUrl: awardSrc,
                        awardTitle: awardTitle
                    }
                );
            }
        );

        setBackgroungBtn.event('click', 
            () => {
                this.setPickInStore(projectId, 'background', awardId)
                this.eventBus.publish('backgroundBtnClicked', {
                        projectAttrType: 'background_id',
                        awardId: awardId,
                        awardImageUrl: awardSrc,
                        awardTitle: awardTitle
                    }
                );
            }
        );
    }

    /**
     * Put into a store award as project attribute/s.
     *
     * @param Integer pickForProject
     * @param String pickName - For what to use this Award eg. [avatar,terminal...]
     * @param Integer pickValue - Award ID 
     * @returns Boolean
     * @memberof ProjectAttributesSetting
     */
    setPickInStore(pickForProject, pickName, pickValue) 
    {
        if (undefined == window.dashStore) {
            return false
        }

        if (pickName === "avatar") {
            dashStore.setProjectData(pickForProject, {
                avatar_id: pickValue,
            });
            return true
        }

        if (pickName === "terminal") {
            dashStore.setProjectData(pickForProject, {
                terminal_id: pickValue,
            });
            return true
        }

        if (pickName === "background") {
            dashStore.setProjectData(pickForProject, {
                background_id: pickValue,
            });
            return true
        }

        return false
    }

    _manadgeBtnStatus(element, status) 
    {    
        const SET_ACTIVE = 'active'

        if (status) {
            element.classList.add(SET_ACTIVE)
        } else {
            element.classList.remove(SET_ACTIVE)
        }        
    }
}


customElements.define('project-attributes-setting', ProjectAttributesSetting);
