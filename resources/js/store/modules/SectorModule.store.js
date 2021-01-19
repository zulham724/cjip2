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
    getSectors({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/sektor').then(res => {
                commit('setSectors', { sectors: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getSector({ commit }, sectorId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/sektor/${sectorId}`).then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}
export default {
    state,
    mutations,
    actions,
    getters,
}