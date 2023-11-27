/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

// Utills

// Core
import './EventBus.js'; 
import DashStore from "./DashStore.js";

// Import your custom element components
import './components/ProjectAttributesSetting/project-attributes-setting';
import './components/ProjectAttributesPreview/project-attributes-preview';
import './components/ProjectAttributesDescription/project-attributes-description';
import './components/QuestList/quest-list';
import './components/SubmitChanges/submit-changes'
import './components/DeleteItem/delete-item'
import './components/ImageDragDropUpload/ImageDragDropUpload'



window.dashStore = new DashStore();
// window.reduxAdapterStore = new ReduxAdapter();

window.eventBusInstance1 = new EventBus(window.dashStore);
window.eventBusInstance2 = new EventBus(window.dashStore);

window.eventBuses = {
    eventBusSetup: eventBusInstance1,
    eventBusProjectEdit: eventBusInstance2,
};


// Miscellaneous stuff
HTMLElement.prototype.event = function (event, callback, options) {
    this.addEventListener(event, callback, options);
};