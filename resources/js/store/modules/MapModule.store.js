/* Module1.store.js */
import axios from 'axios'
// State object
const state = {
    rtrwlist: JSON.parse(localStorage.getItem('rtrwlist')),
    kabkotalist: JSON.parse(localStorage.getItem('kabkotalist')),
    markers: JSON.parse(localStorage.getItem('markers')),
    filter: {
        markers: {
            markets: JSON.parse(localStorage.getItem('markets')),
            market: JSON.parse(localStorage.getItem('market')),
            cities: JSON.parse(localStorage.getItem('cities')),
            city: JSON.parse(localStorage.getItem('city')),
            sectors: JSON.parse(localStorage.getItem('sectors')),
            sector: JSON.parse(localStorage.getItem('sector'))
        },
        rtrw: {
            rtrpprs: JSON.parse(localStorage.getItem('rtrpprs')),
            nothpds: JSON.parse(localStorage.getItem('nothpds')),
            rtrppr: JSON.parse(localStorage.getItem('rtrppr')),
            nothpd: JSON.parse(localStorage.getItem('nothpd'))
        },
        kabkota: {
            kabupatens: JSON.parse(localStorage.getItem('kabupatens')),
            ibukotas: JSON.parse(localStorage.getItem('ibukotas')),
            kabupaten: JSON.parse(localStorage.getItem('kabupaten')),
            ibukota: JSON.parse(localStorage.getItem('ibukota'))
        }
    }
}

// Mutations
const mutations = {
    setRtRwList(state, payload) {
        state.rtrwlist = payload.rtrwlist
            // localStorage.setItem('rtrwlist', JSON.stringify(payload.rtrwlist))
    },
    setKabKotaList(state, payload) {
        state.kabkotalist = payload.kabkotalist
            // localStorage.setItem('kabkotalist', JSON.stringify(payload.kabkotalist))
    },
    setMarkers(state, payload) {
        state.markers = payload.markers
            // localStorage.setItem('markers', JSON.stringify(payload.markers))
    }
}

// Actions
const actions = {
    getRtRwList({ commit }) {
        return new Promise((resolve, reject) => {
            // IF YOU WANT GET DOWNLOADED DATA DIRECTLY
            // const res = require('./../json/rtrw.json')
            // commit('setRtRwList', { rtrwlist: res })
            // resolve({ data: res })
            // OR IF YOU WANT TO GET API'S DATA
            axios
                .get(
                    "http://103.47.60.254/geoserver/ADMIN/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=ADMIN:rtrwp_330020200106083814&maxFeatures=50&outputFormat=application%2Fjson"
                )
                .then(res => {
                    // commit('setRtRwList', { rtrwlist: res.data })
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                });
        });
    },
    getKabKotaList({ commit }) {
        return new Promise((resolve, reject) => {
            // IF YOU WANT GET DOWNLOADED DATA DIRECTLY
            // const res = require('./../json/kabkota.json')
            // commit('setKabKotaList', { kabkotalist: res })
            // resolve({ data: res })
            // OR IF YOU WANT TO GET API'S DATA
            axios.get('http://geo.dpmptsp.jatengprov.go.id/geoserver/jawatengah/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=jawatengah:peta_propinsi_jawatengah&maxFeatures=50&outputFormat=application%2Fjson').then(res => {
                // commit('setKabKotaList', { kabkotalist: res.data })
                resolve(res)
            }).catch(err => {
                reject(err)
            })
        })
    },
    getMarkers({ commit }) {
        return new Promise((resolve, reject) => {
            // IF YOU WANT GET DOWNLOADED DATA DIRECTLY
            // const res = require('./../json/marker.json')
            // commit('setMarkers', { markers: res })
            // resolve({ data: res })

            // OR IF YOU WANT TO GET API'S DATA
            axios.get('http://cjip.jatengprov.go.id/api/peluang-potensi-investasi-jawa-tengah').then(res => {
                // commit('setMarkers', { markers: res.data })
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