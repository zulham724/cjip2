/* Module1.store.js */
import axios from 'axios'
// State object
const state = {

}

// Mutations
const mutations = {

}

// Actions
const actions = {
    index() {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/kabkota`).then(res => {
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