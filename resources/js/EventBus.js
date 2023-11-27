import StoreInterface from './StoreInterface';


class EventBus extends StoreInterface {
   
    constructor(store, initialState = {}) {
        super()
        this.listeners = {};
        this.state = initialState;
        this.reducers = {};
        this.dataStore = store;
    }

    getState() {
        return { ...this.state };
    }

    addListener(event, callback) {
        if (!this.listeners[event]) {
            this.listeners[event] = [];
        }
        this.listeners[event].push(callback);
    }

    publish(event, data = {}) {
        if (this.listeners[event]) {
            this.listeners[event].forEach(callback => callback(data));
        }
    }

    dispatch(action) {
        if (this.reducers[action.type]) {
            this.state = this.reducers[action.type](this.state, action);
            this.publish('stateChange', this.state);
        }
    }

    combineReducers(reducerMap) {
        Object.keys(reducerMap).forEach(key => {
            this.reducers[key] = reducerMap[key];
        });
    }

    /**
     *
     *
     * @param {*} projectId
     * @param {*} data
     * @memberof EventBus
     * @implements StoreInterface
     */
    setProjectData(projectId, data) {
        this.dataStore.setProjectData(projectId, data);
    }

    /**
     *
     *
     * @param {*} projectId
     * @returns
     * @memberof EventBus
     * @implements StoreInterface
     */
    getProjectData(projectId) {
        return this.dataStore.getProjectData(projectId);
    }

    /**
     *
     *
     * @param {*} projectId
     * @memberof EventBus
     * @implements StoreInterface
     */
    clearProjectData(projectId) {
        this.dataStore.clearProjectData(projectId);
    }
}

if (typeof window !== 'undefined') {
    window.EventBus = EventBus;
}

export default EventBus;