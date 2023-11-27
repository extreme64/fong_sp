import StoreInterface from './StoreInterface';

class DashStore extends StoreInterface {
  
  constructor() {
    super()
    this.projects = {};
  }

  setProjectData(projectId, data) {
    if (!this.projects[projectId]) {
      this.projects[projectId] = {};
    }
    this.projects[projectId] = { ...this.projects[projectId], ...data };
  }

  getProjectData(projectId) {
    return this.projects[projectId] || {};
  }

  clearProjectData(projectId) {
    this.projects[projectId] = {};
  }
}

export default DashStore;

const dashStore = new DashStore();