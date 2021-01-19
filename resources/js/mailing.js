// FOR IMPORT/REQUIRE ONLY ------------------------
require('./bootstrap')
require('moment/locale/id')
require('vue2-animate/dist/vue2-animate.min.css')
const moment = require('moment')

import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import store from './store'
import router from './router/mailing'
import { mapState } from 'vuex'
import axios from 'axios'
import { LMap, LTileLayer, LMarker, LGeoJson, LPopup, LControlLayers, LControl } from 'vue2-leaflet';
import Vue2LeafletMarkerCluster from 'vue2-leaflet-markercluster'
import { InfoControl, ReferenceChart, ChoroplethLayer } from 'vue-choropleth'
import VGeosearch from 'vue2-leaflet-geosearch';
import 'leaflet/dist/leaflet.css';
import "leaflet.markercluster/dist/MarkerCluster.css";
import "leaflet.markercluster/dist/MarkerCluster.Default.css";
import { RecycleScroller } from 'vue-virtual-scroller'
import 'vue-virtual-scroller/dist/vue-virtual-scroller.css'
import { EmailEditor } from 'vue-email-editor'
// import google analytic js for vue
// import VueAnalytics from 'vue-analytics';

Vue.use(Vuetify)
Vue.use(require("vue-moment"), {
    moment
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// COMPONENT ONLY ---------------------------------------------------------
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
    'auth-component',
    require('./components/consuloan/AuthComponent.vue').default
);

Vue.component('l-map', LMap)
Vue.component('l-tile-layer', LTileLayer)
Vue.component('l-marker', LMarker)
Vue.component('l-geo-json', LGeoJson)
Vue.component('v-marker-cluster', Vue2LeafletMarkerCluster)
Vue.component('l-choropleth-layer', ChoroplethLayer)
Vue.component('l-info-control', InfoControl)
Vue.component('l-reference-chart', ReferenceChart)
Vue.component('v-geosearch', VGeosearch)
Vue.component('l-popup', LPopup);
Vue.component('l-control-layers', LControlLayers);
Vue.component('l-control', LControl)
Vue.component('email-editor', EmailEditor)

// import google analytic js for vue
// import VueAnalytics from 'vue-analytics';

Vue.component('RecycleScroller', RecycleScroller)


// Initialize --------------------------------------------------------------
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        theme: {
            dark: true,
        },
    }),
    router,
    store,
    data() {
        return {

        }
    },
    computed: {
        ...mapState(['SettingModule', 'AuthModule', 'TranslateModule', 'InvestorModule'])
    },
    created() {

    },
    mounted() {
        // this.AuthModule.auth ? this.getAuth() : null
        // this.getAuth()
        // this.SettingModule.settings.length == 0 ?
        //     this.getSettings() :
        //     null
    },
    methods: {
        getSettings() {
            this.$store.dispatch('getSettings')
        },
        getAuth() {
            this.$store.dispatch('getAuth')
        },
    }
});
// -------------------------------------------------------------------------
