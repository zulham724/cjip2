<template>
    <div>
        <v-app-bar  app>
            <v-toolbar-title>Lokasi</v-toolbar-title>
        </v-app-bar>

        <!-- MAP  -->
        <l-map :zoom="zoom" :center="center" style="z-index:10;width:100%;height:500px;">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <v-marker-cluster v-if="markers != null">
                <l-marker
                    v-for="marker in markers.features"
                    :key="marker.id"
                    :icon="
                        icon({
                            iconUrl: marker.properties.marker_image
                        })
                    "
                    :lat-lng="
                        latLng(
                            marker.geometry.coordinates[0],
                            marker.geometry.coordinates[1]
                        )
                    "
                >
                    <l-popup>
                        <v-card width="500px">
                            <v-carousel
                                v-if="marker.properties.fotos"
                                height="150px"
                            >
                                <v-carousel-item
                                    v-for="(item, i) in marker.properties.fotos"
                                    :key="i"
                                    :src="
                                        `http://cjip.jatengprov.go.id/storage/${item}`
                                    "
                                    reverse-transition="fade-transition"
                                    transition="fade-transition"
                                ></v-carousel-item>
                            </v-carousel>
                            <v-card-title>
                                {{ marker.properties.market }}
                            </v-card-title>
                            <v-card-text>
                                <div class="body-1">
                                    {{ marker.properties.title }}
                                </div>
                                <div class="caption grey--text">
                                    {{
                                        marker.properties.eksisting.substring(
                                            0,
                                            200
                                        )
                                    }}...
                                </div>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn
                                    text
                                    @click="$router.push(`/project/${marker.properties.id}`)"
                                    >{{
                                        TranslateModule.contents.read_more
                                    }}</v-btn
                                >
                            </v-card-actions>
                        </v-card>
                    </l-popup>
                </l-marker>
            </v-marker-cluster>
            <v-geosearch :options="geosearchOptions"></v-geosearch>
            <l-geo-json
                v-if="geojsons.rtrw != null"
                :geojson="geojsons.rtrw"
                :options="options"
                :options-style="styleFunction"
            ></l-geo-json>
            <l-geo-json
                v-if="geojsons.kabkota != null"
                :geojson="geojsons.kabkota"
                :options="options"
                :options-style="styleFunction"
            ></l-geo-json>
            <l-control position="bottomleft" style="z-index:1000;width:inherit">
                <v-speed-dial
                    v-model="fab"
                    bottom
                    left
                    direction="top"
                    transition="slide-y-reverse-transition"
                >
                    <template v-slot:activator>
                        <v-tooltip right style="z-index:100000">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    v-on="on"
                                    v-model="fab"
                                    color="blue en-2"

                                >
                                    <v-icon v-if="fab">mdi-close</v-icon>
                                    <v-icon v-else>mdi-filter</v-icon>
                                    Filter
                                </v-btn>
                            </template>
                            <span>{{TranslateModule.contents.search}}</span>
                        </v-tooltip>
                    </template>
                    <v-tooltip right style="z-index:100000">
                        <template v-slot:activator="{ on }">
                            <v-btn
                                v-on="on"
                                @click="dialog.marker = true"

                                small
                                color="green"
                            >
                                <v-icon>mdi-map-marker</v-icon> Proyek
                                <!-- Marker -->
                            </v-btn>
                        </template>
                        <span>{{TranslateModule.contents.search_marker}}</span>
                    </v-tooltip>
                    <v-tooltip right style="z-index:100000">
                        <template v-slot:activator="{ on }">
                            <v-btn
                                v-on="on"
                                @click="dialog.rtrw = true"

                                small
                                color="indigo"
                            >
                                <v-icon>mdi-map-marker-radius</v-icon> RT RW
                                <!-- RT RW -->
                            </v-btn>
                        </template>
                        <span>{{TranslateModule.contents.search_rtrw}}</span>
                    </v-tooltip>

                    <v-tooltip right style="z-index:100000">
                        <template v-slot:activator="{ on }">
                            <v-btn
                                v-on="on"
                                @click="dialog.kabkota = true"

                                small
                                color="red"
                            >
                                <v-icon>mdi-home-map-marker</v-icon> Kab/ Kota
                                <!-- Kab Kota -->
                            </v-btn>
                        </template>
                        <span>{{TranslateModule.contents.search_city}}</span>
                    </v-tooltip>
                </v-speed-dial>
            </l-control>
        </l-map>
        <!-- END MAP  -->

        <v-dialog style="z-index:10000" v-model="dialog.marker" width="600">
            <v-card>
                <v-card-title class="headline " primary-title>
                    <div class="body-1">
                        {{ TranslateModule.contents.filter_marker }}
                    </div>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="reset()">
                        <v-icon>mdi-refresh</v-icon>
                        {{ TranslateModule.contents.reset }}
                    </v-btn>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_market }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterMarker()"
                                    chips
                                    multiple
                                    :items="filter.markers.markets"
                                    v-model="filter.markers.market"
                                >
                                </v-autocomplete>
                            </v-row>
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_sector }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterMarker()"
                                    chips
                                    multiple
                                    :items="filter.markers.sectors"
                                    v-model="filter.markers.sector"
                                >
                                </v-autocomplete>
                            </v-row>
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_area }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterMarker()"
                                    chips
                                    multiple
                                    :items="filter.markers.cities"
                                    v-model="filter.markers.city"
                                >
                                </v-autocomplete>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>
            </v-card>
        </v-dialog>

        <v-dialog style="z-index:10000" v-model="dialog.rtrw" width="600">
            <v-card>
                <v-card-title class="headline " primary-title>
                    <div class="body-1">
                        {{ TranslateModule.contents.filter_rtrw }}
                    </div>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="reset()">
                        <v-icon>mdi-refresh</v-icon>
                        {{ TranslateModule.contents.reset }}
                    </v-btn>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_rtrppr }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterRtRw()"
                                    chips
                                    multiple
                                    :items="filter.rtrw.rtrpprs"
                                    v-model="filter.rtrw.rtrppr"
                                >
                                </v-autocomplete>
                            </v-row>
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_nothpd }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterRtRw()"
                                    chips
                                    multiple
                                    :items="filter.rtrw.nothpds"
                                    v-model="filter.rtrw.nothpd"
                                >
                                </v-autocomplete>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>
            </v-card>
        </v-dialog>

        <v-dialog style="z-index:10000" v-model="dialog.kabkota" width="600">
            <v-card>
                <v-card-title class="headline " primary-title>
                    <div class="body-1">
                        {{ TranslateModule.contents.filter_city }}
                    </div>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="reset()">
                        <v-icon>mdi-refresh</v-icon>
                        {{ TranslateModule.contents.reset }}
                    </v-btn>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_city }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterKabKota()"
                                    chips
                                    multiple
                                    :items="filter.kabkota.kabupatens"
                                    v-model="filter.kabkota.kabupaten"
                                >
                                </v-autocomplete>
                            </v-row>
                            <v-row>
                                <div class="caption grey--text">
                                    {{ TranslateModule.contents.show_central }}
                                </div>
                            </v-row>
                            <v-row>
                                <v-autocomplete
                                    @input="filterKabKota()"
                                    chips
                                    multiple
                                    :items="filter.kabkota.ibukotas"
                                    v-model="filter.kabkota.ibukota"
                                >
                                </v-autocomplete>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import axios from "axios";
import { latLng, icon } from "leaflet";
import { OpenStreetMapProvider } from "leaflet-geosearch";
import { mapState } from "vuex";
export default {
    name: "LocationPage",
    data() {
        return {
            fab: false,
            dialog: {
                marker: false,
                kabkota: false,
                rtrw: false
            },
            zoom: 8,
            center: [-6.96878, 110.123734],
            url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
            attribution:
                '&copy; <a href="https://ardata.co.id">CV ARDATA MEDIA</a> contributors',
            geojsons: {
                rtrw: null,
                kabkota: null
            },
            options: {
                style: {
                    weight: 1,
                },
                onEachFeature: function onEachFeature(feature, layer) {
                    // console.log(feature,layer)
                }
            },
            geosearchOptions: {
                provider: new OpenStreetMapProvider()
            },
            markers: null,
            filter: {
                markers: {
                    markets: null,
                    market: null,
                    cities: null,
                    city: null,
                    sectors: null,
                    sector: null
                },
                rtrw: {
                    rtrpprs: null,
                    nothpds: null,
                    rtrppr: null,
                    nothpd: null
                },
                kabkota: {
                    kabupatens: null,
                    ibukotas: null,
                    kabupaten: null,
                    ibukota: null
                }
            },
        };
    },
    computed: {
        ...mapState(["MapModule", "SettingModule", "TranslateModule"]),
        styleFunction() {
        return (feature) => {
            return {
                weight: 1,
                color: "#000",
                opacity: 1,
                fillColor: feature.properties.color,
                fillOpacity: 0.5
            };
        };
        },
    },
    watch: {
        markers: function(value) {
            // console.log(value);
        },
        "TranslateModule.to": {
            handler: function() {
                this.getMarkers();
            },
            deep: true
        }
    },
    mounted() {
        this.getMarkers();
        this.getRtRwList();
        this.getKabKotaList();
    },
    methods: {
        latLng,
        icon,
        getRtRwList() {
            this.$store.dispatch("MapModule/getRtRwList").then(res => {
                this.geojsons.rtrw = res.data;

                let min = 0;
                let max = 0;
                let total = this.geojsons.rtrw.features.length
                this.geojsons.rtrw.features.forEach((feature,f)=>{
                    // console.log(JSON.stringify(feature).length)
                    let number = JSON.stringify(feature).length
                    f == 0 ? min = max = number : null
                    number < min ? min = number : null
                    number > max ? max = number : null
                })

                // get range 0:1
                this.geojsons.rtrw.features.forEach(feature=>{
                    let number = JSON.stringify(feature).length
                    let res = (number-min)/(max-min)
                    feature.properties.color = this.getColor(res)
                    // console.log(this.getColor(res))
                })

                this.filter.rtrw.rtrpprs = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.rtrppr;
                        })
                    )
                ];

                this.filter.rtrw.nothpds = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.nothpd;
                        })
                    )
                ];
            });
        },
        getColor(value){
            var hue=((1-value)*120).toString(10);
            return ["hsl(",hue,",100%,50%)"].join("");
        },
        getKabKotaList() {
            this.$store.dispatch("MapModule/getKabKotaList").then(res => {
                this.geojsons.kabkota = res.data;
                // console.log(this.geojsons)
                let min = 0;
                let max = 0;
                let total = this.geojsons.kabkota.features.length
                this.geojsons.kabkota.features.forEach((feature,f)=>{
                    // console.log(JSON.stringify(feature).length)
                    let number = JSON.stringify(feature).length
                    f == 0 ? min = max = number : null
                    number < min ? min = number : null
                    number > max ? max = number : null
                })

                // get range 0:1
                this.geojsons.kabkota.features.forEach(feature=>{
                    let number = JSON.stringify(feature).length
                    let res = (number-min)/(max-min)
                    feature.properties.color = this.getColor(res)
                    // console.log(this.getColor(res))
                })

                this.filter.kabkota.kabupatens = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.Kabupaten_;
                        })
                    )
                ];

                this.filter.kabkota.ibukotas = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.Ibukota;
                        })
                    )
                ];
            });
        },
        getMarkers() {
            this.$store.dispatch("MapModule/getMarkers").then(res => {
                let markers = res.data.features.map(item => {
                    // this.$store.dispatch('TranslateModule/translate',item.properties.title).then(res=>{
                    //     item.properties.title = res.text[0]
                    // })

                    // this.$store.dispatch('TranslateModule/translate',item.properties.eksisting).then(res=>{
                    //     item.properties.eksisting = res.text[0]
                    // })

                    return item;
                });

                this.markers = { ...res.data, features: markers };

                this.filter.markers.markets = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.market;
                        })
                    )
                ];

                this.filter.markers.sectors = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.sektor;
                        })
                    )
                ];

                this.filter.markers.cities = [
                    ...new Set(
                        res.data.features.map(feature => {
                            return feature.properties.kab_kota;
                        })
                    )
                ];
            });
        },
        filterMarker() {
            let filter = {};
            this.filter.markers.market
                ? (filter.market = this.filter.markers.market)
                : null;
            this.filter.markers.sector
                ? (filter.sektor = this.filter.markers.sector)
                : null;
            this.filter.markers.city
                ? (filter.city = this.filter.markers.city)
                : null;
            this.markers = {
                ...this.MapModule.markers,
                features: this.MapModule.markers.features.filter(item => {
                    for (var key in filter) {
                        for (const value in key) {
                            if (item.properties[key] == filter[key][value]) {
                                return true;
                            }
                        }
                    }
                    return false;
                })
            };
            // console.log(filter)
            this.dialog.marker = false;
        },
        filterRtRw() {
            let filter = {};
            this.filter.rtrw.rtrppr
                ? (filter.rtrppr = this.filter.rtrw.rtrppr)
                : null;
            this.filter.rtrw.nothpd
                ? (filter.nothpd = this.filter.rtrw.nothpd)
                : null;
            this.geojsons.rtrw = {
                ...this.MapModule.rtrwlist,
                features: this.MapModule.rtrwlist.features.filter(item => {
                    for (var key in filter) {
                        for (const value in key) {
                            if (item.properties[key] == filter[key][value]) {
                                return true;
                            }
                        }
                    }
                    return false;
                })
            };
            // console.log(filter)
            this.dialog.rtrw = false;
        },
        filterKabKota() {
            let filter = {};
            this.filter.kabkota.kabupaten
                ? (filter.Kabupaten_ = this.filter.kabkota.kabupaten)
                : null;
            this.filter.kabkota.ibukota
                ? (filter.Ibukota = this.filter.kabkota.ibukota)
                : null;
            this.geojsons.kabkota = {
                ...this.MapModule.kabkotalist,
                features: this.MapModule.kabkotalist.features.filter(item => {
                    for (var key in filter) {
                        for (const value in key) {
                            if (item.properties[key] == filter[key][value]) {
                                return true;
                            }
                        }
                    }
                    return false;
                })
            };
            // console.log(filter)
            this.dialog.kabkota = false;
        },
        reset() {
            this.markers = this.MapModule.markers;
            this.geojsons.rtrw = this.MapModule.rtrwlist;
            this.geojsons.kabkota = this.MapModule.kabkotalist;
            this.filter.markers.market = this.filter.kabkota.kabupaten = this.filter.kabkota.ibukota = this.filter.rtrw.nothpd = this.filter.rtrw.rtrppr = this.filter.markers.city = this.filter.markers.sector = null;
            this.dialog.rtrw = this.dialog.kabkota = this.dialog.marker = false;
        }
    }
};
</script>

<style></style>
