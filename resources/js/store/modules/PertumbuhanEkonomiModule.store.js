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
    getPertumbuhanEkonomis() {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/pertumbuhanekonomi').then(res => {
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