import axios from 'axios'
const state = {
    settings: JSON.parse(localStorage.getItem('settings')) || [],
}

// Mutations
const mutations = {
    setSettings(state, payload) {
        state.settings = payload.settings
        localStorage.setItem('settings', JSON.stringify(state.settings))
    },
    setSetting(state, payload) {
        key = state.settings.filter((setting, key) => key == payload.key)
        key ? state.settings[key] = payload.value : state.settings[payload.key] = payload.value
    }
}

// Getter functions
const getters = {
    getSettings(state) {
        return state.settings
    }
}


// Actions
const actions = {
    getSettings({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/consuloan/settings').then(res => {
                commit('setSettings', { settings: res.data })
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