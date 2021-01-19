/* Module1.store.js */
import axios from 'axios'
// State object
const state = {
    items: []
}

// Mutations
const mutations = {
    set(state, payload) {
        state.items = [...payload.items]
    }
}

// Actions
const actions = {
    index({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/economicgrowth').then(res => {
                commit('set', { items: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    }
}

// Getter functions
const getters = {

}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}