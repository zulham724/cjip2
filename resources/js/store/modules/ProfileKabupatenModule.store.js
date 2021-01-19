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
    getProfile({ commit }, profilKabupatenId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/profilkabupaten/${profilKabupatenId}`).then(res => {
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
