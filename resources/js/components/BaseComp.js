class BaseComp extends HTMLElement {
    
    static CLICK = 'clicked'
    static CHANGED = 'changed'
    static DELETED = 'deleted'
   
    connectedCallback() {}

    /**
     * Concatenate the event name with some structure.
     * Easy pattern to use when generating events.
     *
     * @static
     * @param {*} eventType - Event type e.g. [click]
     * @param {*} elementName - Use name of the element that generates the event e.g. [img, CustomImg]
     * @param {string} appendString [Optional] Free choice string to make event more unique.
     * @memberof BaseComp
     */
    static eventName(eventType, elementName, appendString = '') {
        return eventType + '-' + elementName + '-' + appendString;
    }

}

export default BaseComp