import axios from 'axios'
const state = {
    sectors: []
}

// Mutations
const mutations = {
    setSectors(state, payload) {
        state.sectors = payload.sectors
    }
}

// Getter functions
const getters = {

}


// Actions
const actions = {
    index({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/proyek').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    byCjibfSector({ commit }, sectorId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/proyeks/bycjibfsector/${sectorId}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    toPage({ commit }, url) {
        return new Promise((resolve, reject) => {
            axios.get(url).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getReadyToOfferProjects() {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/proyeks/readytooffer').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        });
    },
    getProspectiveProjects() {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/proyeks/prospectiveproject').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getPotentialProjects() {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/proyeks/potentialproject').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getProject({ commit }, projectId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/proyek/${projectId}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    searchProject({ commit }, key) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/proyeks/search/${key}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
}