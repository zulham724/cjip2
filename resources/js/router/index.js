import Vue from 'vue'
import multiguard from "vue-router-multiguard"
// const moment = require("moment")
import VueRouter from "vue-router"
import store from "./../store"
Vue.use(VueRouter);

const isLoggedIn = store.getters.isLoggedIn
const auth = (from, to, next) => {
    if (!isLoggedIn) {
        next('/')
    }
    next()
}

const checkIfUserHasProfile = (from, to, next) => {

}

const routes = [{
    path: "/",
    name: "home",
    component: require('./../pages/consuloan/HomePage.vue').default
}, {
    path: "/jatengprofile",
    name: "jatengprofile",
    component: require('./../pages/consuloan/JatengProfilePage.vue').default,
}, {
    path: "/location",
    name: "location",
    component: require('./../pages/consuloan/LocationPage.vue').default,
}, {
    path: "/sector",
    name: "sector",
    component: require('./../pages/consuloan/SectorPage.vue').default,
}, {
    path: "/projectreadiness",
    name: "projectreadiness",
    component: require('./../pages/consuloan/ProjectReadinessPage.vue').default,
}, {
    path: "/editprofile",
    name: "editprofile",
    beforeEnter: multiguard([auth]),
    component: require('./../pages/consuloan/EditProfilePage.vue').default,
}, {
    path: '/profilekabupaten/:profilKabupatenId',
    name: 'profilkabupaten',
    component: require('./../pages/consuloan/ProfileKabupatenPage.vue').default,
    props: true
}, {
    path: '/project/:projectId',
    name: 'project',
    component: require('./../pages/consuloan/ProjectPage.vue').default,
    props: true
}, {
    path: '/invest',
    name: 'invest',
    beforeEnter: multiguard([auth]),
    component: require('./../pages/consuloan/InvestPage.vue').default,
    props: true
}, {
    path: '/berita',
    name: 'posts',
    component: require('./../pages/consuloan/PostListPage.vue').default,
    props: true
}, {
    path: "/berita/:postId",
    name: "itempost",
    component: require('./../pages/consuloan/PostPage.vue').default,
    props: true
}, {
    path: '/faqs',
    name: 'faqs',
    component: require('./../pages/consuloan/FaqPage').default,
}]

const router = new VueRouter({ routes });

export default router;
// --------------