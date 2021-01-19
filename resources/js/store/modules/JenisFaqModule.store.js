import axios from 'axios'
const state = {

}

// Mutations
const mutations = {

}

// Getter functions
const getters = {

}


// Actions
const actions = {
    getJenisFaqs() {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/jenisfaq').then(res => {
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getJenisFaq({ commit }, id) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/jenisfaq/${id}`).then(res => {
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