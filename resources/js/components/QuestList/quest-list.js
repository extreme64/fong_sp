import Utils from './../../Utils';
import BaseComp from '../BaseComp';

class ProjectQuestList extends BaseComp {
   
    constructor() {
        super();
        this.elementId = Utils.generateUniqueId();
    }

    connectedCallback() {

        const eventBusName = this.getAttribute('event-bus-name');
        this.eventBus = window.eventBuses[eventBusName];


        const title = this.getAttribute('title');
        const score = this.getAttribute('score');
        const level = this.getAttribute('level');
        const status = (this.getAttribute('status') == 0) ? "No win" : "Win";
        const created_at = this.getAttribute('created_at');
        const done_at = this.getAttribute('done_at');
        const abilities_used = this.getAttribute('abilities_used');

        this.innerHTML = `
            <style>
            </style>
            <div class="list__wrap p-2  border rounded-lg">
                <div class="grid sm:grid-cols-1 grid-cols-2">
                    <div class="list__created_at text-xs col-span-1">${created_at}</div>
                    <div class="list__done_at text-xs text-end col-span-1">${done_at}</div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="list__title col-span-1">${title}</div>
                </div>
                <div class="grid xs:grid-cols-1 lg:grid-cols-12">
                    <div class="list__status col-span-3">${status}</div>
                    <div class="list__score col-span-3">${score}</div>
                    <div class="list__level col-span-1">${level}</div>
                    <div class="list__abilities_used text-xs">${abilities_used}</div>          
                </div>
            </div>
        `;


    }


}

customElements.define('project-quest-list', ProjectQuestList);