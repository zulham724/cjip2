<template>
    <section class="flat-row section-iconbox">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="title-section style3 left">
                        <h1 class="title">
                            {{ TranslateModule.contents.whyinvest }}
                        </h1>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="title-section padding-left50">
                        <div class="sub-title style3">
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
                    <div class="iconbox style3">
                        <div class="box-header">
                            <div class="box-icon">
                                <!-- <i class="ti-map-alt"></i> -->
                                <v-img
                                    width="120px"
                                    :src="icons[i].src"
                                ></v-img>
                            </div>
                        </div>

                        <div class="box-content">
                            <h5 class="box-title">
                                {{ infrastucture.nama_infrastruktur }}
                            </h5>

                            <div
                                style="text-align:left"
                                v-html="infrastucture.detail"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapState } from "vuex";
export default {
    data() {
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
            ]
        };
    },
    watch: {
        "TranslateModule.to": {
            handler: function() {
                this.getIntrastructure();
            },
            deep: true
        }
    },
    computed: {
        ...mapState(["TranslateModule"])
    },
    mounted() {
        this.getIntrastructure();
    },
    methods: {
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
};
</script>

<style>
.container: {
    padding: 0;
}
.col-lg-7: {
    padding: 0;
}
</style>
