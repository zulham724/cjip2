import axios from 'axios'
const state = {
    auth: JSON.parse(localStorage.getItem('auth')),
    url: 'http://localhost:8000',
    storageUrl: 'http://cjip.jatengprov.go.id/storage'
}

// Mutations
const mutations = {
    setAuth(state, payload) {
        state.auth = payload.auth
        localStorage.setItem('auth', JSON.stringify(state.auth))
    },
    removeAuth(state, payload) {
        state.auth = ''
        localStorage.removeItem('auth')
    }
}

// Getter functions
const getters = {
    isLoggedIn: state => !!state.auth,
    auth: state => state.auth
}


// Actions
const actions = {
    getAuth({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/user').then(res => {
                commit('setAuth', { auth: res.data })
                resolve(res)
            }).catch(err => {
                commit('removeAuth')
                reject(err)
            })
        })
    },
    login({ commit }, credential) {
        return new Promise((resolve, reject) => {
            axios.post('/api/v1/login', credential).then(res => {
                commit('setAuth', { auth: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    register({ commit }, credential) {
        return new Promise((resolve, reject) => {
            axios.post('/api/v1/register', credential).then(res => {
                commit('setAuth', { auth: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    updateProfile({ commit, dispatch }, credential) {
        return new Promise((resolve, reject) => {
            const access = {
                _method: 'put',
                ...credential
            }
            axios.post('/api/v1/auth', access).then(res => {
                commit('setAuth', { auth: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    logout({ commit }) {
        return new Promise((resolve, reject) => {
            axios.post('/logout').then(res => {
                commit('removeAuth')
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