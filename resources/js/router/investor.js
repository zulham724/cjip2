import Vue from 'vue'
import multiguard from "vue-router-multiguard"
// const moment = require("moment")
import VueRouter from "vue-router"
import store from "./../store"
import Swal from 'sweetalert2'
Vue.use(VueRouter);

const isLoggedIn = store.getters.isLoggedIn
const auth = (from, to, next) => {
    if (!isLoggedIn) {
        next('/')
    }
    next()
}

const checkUserProfile = (from, to, next) => {
    if (store.getters.auth.profile == null) {
        Swal.fire({
            icon: 'info',
            title: 'Maaf',
            text: 'Anda harus mengisi biodata'
        })
        return next('/')
    }
    return next()
}

const routes = [{
    path: '/',
    name: 'home',
    component: require('./../pages/investor/HomePage.vue').default
}, {
    path: '/investment',
    name: 'investment',
    beforeEnter: multiguard([checkUserProfile]),
    component: require('./../pages/investor/InvestmentPage.vue').default,
}, {
    path: '/faq',
    name: 'faq',
    component: require('./../pages/investor/FaqPage.vue').default
}, {
    path: '/location',
    name: 'location',
    component: require('./../pages/investor/LocationPage.vue').default
}, {
    path: '/email',
    name: 'email',
    component: require('./../pages/investor/EmailPage.vue').default
}, {
    path: '/mailcampaign',
    name: 'mailcampaign',
    component: require('./../pages/investor/email/CampaignPage.vue').default
}, {
    path: '/mailtemplatelist',
    name: 'mailtemplatelist',
    component: require('./../pages/investor/email/TemplateListPage.vue').default
}, {
    path: '/mailtemplate',
    name: 'mailtemplate',
    component: require('./../pages/investor/email/TemplatePage.vue').default
}, ]

const router = new VueRouter({ routes });

export default router;
// --------------