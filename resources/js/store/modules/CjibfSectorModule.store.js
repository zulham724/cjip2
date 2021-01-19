import axios from 'axios'
const state = {
    cjibf_sectors: []
}

// Mutations
const mutations = {
    setCjibfSectors(state, payload) {
        state.cjibf_sectors = payload.cjibf_sectors
    }
}

// Getter functions
const getters = {

}


// Actions
const actions = {
    getCjibfSectors({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/cjibfsektor').then(res => {
                commit('setCjibfSectors', { cjibf_sectors: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getCjibfSector({ commit }, sectorId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/cjibfsektor/${cjibfSectorId}`).then(res => {
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