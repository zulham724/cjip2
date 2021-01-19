import Vue from 'vue'
import multiguard from "vue-router-multiguard"
// const moment = require("moment")
import VueRouter from "vue-router"
import store from "./../store"
import Swal from 'sweetalert2'
Vue.use(VueRouter);

const routes = [{
    path: '/',
    name: 'home',
    redirect: '/mailcampaign',
    component: require('./../pages/investor/HomePage.vue').default
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
