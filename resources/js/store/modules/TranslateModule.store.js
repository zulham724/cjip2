/* Module1.store.js */
import axios from 'axios'
const translate = require('ya-translate')('trnsl.1.1.20200306T061420Z.978caf2f04a02a41.0c1a17ba2979207d58cd40dc7fa4bcdf254657a5')

// State object
const state = {
    from: null, // USELESS CAUSE THE LIBRARY ALREADY DETECT ITS LANGUAGE
    to: JSON.parse(localStorage.getItem('to')) || {
        name: 'ID',
        value: 'id'
    },
    // ADD THE LANGUAGE YOU LIKE
    languages: [{
            name: 'ID',
            value: 'id'
        },
        // {
        //     name: 'Bahasa Jawa',
        //     value: 'jv'
        // },
        // {
        //     name: 'Jepang',
        //     value: 'ja'
        // },
        {
            name: 'EN',
            value: 'en'
        },
        // {
        //     name: 'Arabic',
        //     value: 'ar'
        // },
        // {
        //     name: 'Korea',
        //     value: 'ko'
        // },
        // {
        //     name: 'Chinese',
        //     value: 'zh'
        // },
        // {
        //     name: 'Thailand',
        //     value: 'th'
        // }
    ],
    // YOU CAN ADD CONTENT TROUGH THIS JSON, OR YOU CAN GET IT FROM API'S DATA FROM VOYAGER AND MUTATE THE PARAMETER,
    // BUT FOR GOOD STRUCTURE JUST USE JSON INSTEAD, BECAUSE DIFFERENT LAYOUT MAY HAVE DIFFERENT CONTENT
    // IT AUTOMATICALLY TRANSLATED AND ACCESS WITH THIS MODULE, EX: TranslateModule.contents.title
    // ADD CONTENT TO JSON WITH ANY LANGUAGE YOU LIKE, CAUSE THE LIBRARY WILL GUESS THE LANGUAGE, AND DO THE OTHER JOB
    // CV ARDATA MEDIA
    contentlists: require('./../json/contents.json'),
    contents: require('./../json/contents.json')
}

// Mutations
const mutations = {
    setTo(state, payload) {
        state.to = payload.to
        localStorage.setItem('to', JSON.stringify(payload.to))
    },
    setContent(state, payload) {
        state.contents = {...state.contents, [payload.key]: payload.value }
    },
}

// Actions
const actions = {
    updateContents({ commit }) {
        for (const key in this.state.TranslateModule.contentlists) {
            translate(this.state.TranslateModule.contentlists[key], this.state.TranslateModule.to.value).then(res => {
                commit('setContent', { key: key, value: res.text[0] })
            })
        }
    },
    translate({ commit }, key) {
        return new Promise((resolve, reject) => {
            translate(key, this.state.TranslateModule.to.value).then(res => {
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