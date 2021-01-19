/* Module1.store.js */
import axios from 'axios'
// State object
const state = {
    drawer: false,
}

// Mutations
const mutations = {
    setDrawer(state, payload) {
        state.drawer = payload.drawer
    }
}

// Actions
const actions = {
    storeInvest({ commit }, access) {
        return new Promise((resolve, reject) => {
            axios.post('/api/v1/loiinterest', access).then(res => {
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