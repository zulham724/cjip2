/* Module1.store.js */
import axios from 'axios'
// State object
const state = {
    items: []
}

// Mutations
const mutations = {
    set(state, payload) {
        state.items = payload.items
    },
    add(state, payload) {
        state.items.data = [payload.item, ...state.items.data];
    },
    remove(state, payload) {
        const index = state.items.data.findIndex(item => item.id == payload.id);
        state.items.data.splice(index, 1);
    },
}

// Actions
const actions = {
    index({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/userinvestor').then(res => {
                commit('set', { items: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
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