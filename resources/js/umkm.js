require('./bootstrap');
require('vue2-animate/dist/vue2-animate.min.css')

import Vue from 'vue'
import 'leaflet/dist/leaflet.css';
import "leaflet.markercluster/dist/MarkerCluster.css";
import "leaflet.markercluster/dist/MarkerCluster.Default.css";
import { InertiaApp } from '@inertiajs/inertia-vue';

Vue.use(InertiaApp);

const app = document.getElementById('app');
console.log(app.dataset.page);
new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: {},
            resolveComponent: name => require(`./pages/umkm/${name}`).default,
        },
    }),
}).$mount(app);
