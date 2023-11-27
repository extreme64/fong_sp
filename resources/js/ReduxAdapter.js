/**
 * ReduxAdapter allows to gradually transition to Redux while maintaining 
 * a consistent interface for data storage and communication. 
 * 
 * Actual transition to Redux will involve additional changes in how actions, 
 * reducers, middleware, and the Redux store are set up and utilized.
 */

class ReduxAdapter extends StoreInterface {
    
    constructor(reduxStore) {
        super();
        this.reduxStore = reduxStore;
    }

    setProjectData(projectId, data) {
        // Use Redux actions to set data eg.
        this.reduxStore.dispatch({ type: 'SET_PROJECT_DATA', projectId, data });
    }

    getProjectData(projectId) {
        // Use Redux selectors to get data eg.
        return this.reduxStore.getState().projects[projectId] || {};
    }

    clearProjectData(projectId) {
        // Use Redux actions to clear data eg.
        this.reduxStore.dispatch({ type: 'CLEAR_PROJECT_DATA', projectId });
    }
}