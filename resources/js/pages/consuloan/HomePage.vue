<template>
    <div>
        <slider-component></slider-component>
        <section class="flat-row section-iconbox" style="background-color:#2a62f5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left">
                        <div class="display-2 white--text font-weight-light">
                            {{ TranslateModule.contents.whyinvest }}
                        </div>
                    </div>
                    <hr style="border: 5px solid orange;border-radius: 5px;width: 100px;">
                </div>

                <div class="col-lg-7">
                    <div class="title-section padding-left50">
                        <div class="subtitle-1 style3 white--text">
                            {{ TranslateModule.contents.whyinvestdesc }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div
                    class="col-sm-2"
                    v-for="(infrastucture, i) in infrastuctures"
                    :key="infrastucture.id"
                >
                    <item-infrastructure-component :item="infrastucture" :icon="icons[i]"></item-infrastructure-component>
                </div>
            </div>
        </div>
    </section>
        <!-- <grid-infrastructure-component></grid-infrastructure-component> -->
        <chart-component></chart-component>
        <!-- <grid-post-component></grid-post-component> -->
    </div>
</template>
<script>
import { mapState } from "vuex";
import SliderComponent from './../../components/consuloan/SliderComponent'
import HomeComponent from './../../components/consuloan/HomeComponent'
import GridInfrastructureComponent from './../../components/consuloan/GridInfrastucture'
import GridPostComponent from './../../components/consuloan/GridPostComponent'
import ChartComponent from './../../components/consuloan/ChartComponent'
export default {
    components:{
        SliderComponent,
        HomeComponent,
        GridInfrastructureComponent,
        GridPostComponent,
        ChartComponent,
        ItemInfrastructureComponent: ()=> import('./../../components/consuloan/ItemInfrastructureComponent.vue')
    },
    data(){
        return {
            infrastuctures: null,
            icons: [
                {
                    name: "railway",
                    src: "/svg/supporting/railway.svg"
                },
                {
                    name: "airport",
                    src: "/svg/supporting/airport.svg"
                },
                {
                    name: "electricity",
                    src: "/svg/supporting/electricity.svg"
                },
                {
                    name: "industrial",
                    src: "/svg/supporting/industrial.svg"
                },
                {
                    name: "tollroad",
                    src: "/svg/supporting/tollroad.svg"
                },
                {
                    name: "seaport",
                    src: "/svg/supporting/seaport.svg"
                }
            ],
            images:[
                {
                    name: "railway",
                    src: "/svg/supporting/railway.svg"
                },
                {
                    name: "airport",
                    src: "/svg/supporting/airport.svg"
                },
                {
                    name: "electricity",
                    src: "/svg/supporting/electricity.svg"
                },
                {
                    name: "industrial",
                    src: "/svg/supporting/industrial.svg"
                },
                {
                    name: "tollroad",
                    src: "/svg/supporting/tollroad.svg"
                },
                {
                    name: "seaport",
                    src: "/svg/supporting/seaport.svg"
                }
            ]
        }
    },
    computed: {
        ...mapState(["TranslateModule"])
    },
    watch: {
        "TranslateModule.to": {
            handler: function() {
                this.getIntrastructure();
            },
            deep: true
        }
    },
    mounted(){
        this.getIntrastructure()
    },
    methods:{
        getIntrastructure() {
            axios
                .get("/api/v1/infrastrukturpendukung")
                .then(res => {
                    this.infrastuctures = res.data;
                    this.infrastuctures.map(infrastucture => {
                        this.$store
                            .dispatch(
                                "TranslateModule/translate",
                                infrastucture.detail
                            )
                            .then(res => {
                                infrastucture.detail = res.text[0];
                                return infrastucture;
                            });

                        this.$store
                            .dispatch(
                                "TranslateModule/translate",
                                infrastucture.nama_infrastruktur
                            )
                            .then(res => {
                                infrastucture.nama_infrastruktur = res.text[0];
                                return infrastucture;
                            });
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }

}
</script>

<style>

</style>
