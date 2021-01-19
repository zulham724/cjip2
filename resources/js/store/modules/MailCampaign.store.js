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
        state.items.splice(0, 0, payload.item)
    },
    remove(state, payload) {
        state.items.splice(state.items.findIndex(item => item.id == payload.id), 1)
    }
}

// Actions
const actions = {
    index({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/mailcampaign').then(res => {
                commit('set', { items: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    store({ commit }, access) {
        return new Promise((resolve, reject) => {
            axios.post('/api/v1/mailcampaign', access).then(res => {
                commit('add', { item: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    destroy({ commit }, id) {
        return new Promise((resolve, reject) => {
            let access = {
                _method: 'delete'
            }
            axios.post(`/api/v1/mailcampaign/${id}`, access).then(res => {
                commit('remove', { id: id })
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