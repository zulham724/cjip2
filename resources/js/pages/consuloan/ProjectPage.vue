<template>
    <div v-if="proyek != null">
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{ proyek.project_name }}</h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i><a>Home</a>
                                </li>
                                <li>
                                    <a>{{
                                        TranslateModule.contents.project
                                    }}</a>
                                </li>
                                <li>
                                    {{
                                        TranslateModule.contents.project_detail
                                    }}
                                </li>
                            </ul>
                        </div>
                        <!-- /.breadcrumbs -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.page-title -->

        <!-- Blog posts -->
        <section class="flat-row project-single">
            <div class="container">
                <div class="row pb-5">
                    <div class="col">
                        <div class="display-1">
                            {{ proyek.project_name }}
                        </div>
                        <div class="body-2 grey--text">
                            {{ proyek.eksisting }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <v-carousel
                            cycle
                            hide-delimiter-background
                            :show-arrows="false"
                        >
                            <v-carousel-item
                                reverse-transition="fade-transition"
                                transition="fade-transition"
                                v-for="foto in proyek.fotos"
                                :key="foto"
                            >
                                <v-img
                                    :src="`${AuthModule.storageUrl}/${foto}`"
                                />
                            </v-carousel-item>
                        </v-carousel>
                    </div>
                    <div class="col-sm-8">
                        <v-tabs v-model="tab">
                            <v-tab
                                key="review"
                                active-class="tab-active"
                                style="border-radius: 20px 20px 0 0;"
                                class="white--text"
                                >{{ TranslateModule.contents.review }}</v-tab
                            >
                            <v-tab
                                key="economy"
                                active-class="tab-active"
                                style="border-radius: 20px 20px 0 0;"
                                class="white--text"
                                >{{
                                    TranslateModule.contents.economy_aspect
                                }}</v-tab
                            >
                            <v-tab
                                key="interface"
                                active-class="tab-active"
                                style="border-radius: 20px 20px 0 0;"
                                class="white--text"
                                >{{ TranslateModule.contents.interface }}</v-tab
                            >
                        </v-tabs>
                        <v-tabs-items v-model="tab">
                            <v-tab-item key="review">
                                <v-card flat color="#F3F6FD">
                                    <v-card-text>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">{{
                                                    TranslateModule.contents
                                                        .area
                                                }}</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.luas_lahan
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">{{
                                                    TranslateModule.contents
                                                        .legality
                                                }}</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.status_kepemilikan
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">{{
                                                    TranslateModule.contents
                                                        .invest_schema
                                                }}</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.skema_investasi
                                                }}</div>
                                            </div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item key="economy">
                                <v-card flat color="#F3F6FD">
                                    <v-card-text>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">{{
                                                    TranslateModule.contents
                                                        .invest_value
                                                }}</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.nilai_investasi
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">NPV</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{ proyek.npv }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">IRR</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{ proyek.irr }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">BC Ration</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.bc_ratio
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">Payback Period</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.playback_period
                                                }}</div>
                                            </div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item key="interface">
                                <v-card flat color="#F3F6FD">
                                    <v-card-text>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">Name</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.cp_nama
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">Phone</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.cp_hp
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">Email</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.cp_email
                                                }}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="body-2 font-weight-bold">Address</div>
                                            </div>
                                            <div class="col-8">
                                                <div class="body-2">: {{
                                                    proyek.cp_alamat
                                                }}</div>
                                            </div>
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                        </v-tabs-items>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6" v-if="proyek.latar_belakang">
                        <div class="body-1 font-weight-bold">Latar Belakang Proyek</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.latar_belakang"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.latar_belakang">
                        <div class="body-1 font-weight-bold">Kondisi saat ini</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.latar_belakang"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.lingkup_pekerjaan">
                        <div class="body-1 font-weight-bold">Ruang Lingkup Proyek</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.lingkup_pekerjaan"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.desain_layout_project">
                        <div class="body-1 font-weight-bold">Desain dan Layout Proyek</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.desain_layout_project"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.ketersediaan_pasar">
                        <div class="body-1 font-weight-bold">Ketersediaan Pasar</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.ketersediaan_pasar"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.ketersediaan_sd">
                        <div class="body-1 font-weight-bold">Ketersediaan Sumber Daya</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.ketersediaan_sd"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.skema_investasi">
                        <div class="body-1 font-weight-bold">Skema Investasi</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.skema_investasi"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                    <div class="col-sm-6" v-if="proyek.nilai_investasi">
                        <div class="body-1 font-weight-bold">Nilai Investasi</div>
                        <v-card color="#F3F6FD" height="400px" style="overflow-y:scroll">
                            <v-card-text>
                                <div class="caption" style="text-align:justify" v-html="proyek.nilai_investasi"></div>
                            </v-card-text>
                        </v-card>
                    </div>
                </div>

                <!-- <div class="row">
                    <h2>{{ TranslateModule.contents.background }}</h2>
                </div>
                <div class="row">
                    <p style="text-align:justify">
                        {{ proyek.latar_belakang }}
                    </p>
                </div>
                <div class="row">
                    <h2>{{ TranslateModule.contents.work_scope }}</h2>
                </div>
                <div class="row">
                    <p style="text-align:justify">
                        {{ proyek.lingkup_pekerjaan }}
                    </p>
                </div> -->
            </div>
        </section>
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    props: {
        projectId: null
    },
    data() {
        return {
            proyek: null,
            tab: "review"
        };
    },
    computed: {
        ...mapState(["AuthModule", "TranslateModule"])
    },
    mounted() {
        this.getProject();
    },
    watch: {
        "TranslateModule.to": {
            handler: function() {
                this.getProject();
            },
            deep: true
        }
    },
    methods: {
        getProject() {
            this.$store
                .dispatch("ProjectModule/getProject", this.projectId)
                .then(res => {
                    let proyek = res.data;

                    proyek.fotos = eval(proyek.fotos);

                    this.$store
                        .dispatch(
                            "TranslateModule/translate",
                            proyek.project_name
                        )
                        .then(res => {
                            proyek.project_name = res.text[0];
                        });

                    this.$store
                        .dispatch("TranslateModule/translate", proyek.eksisting)
                        .then(res => {
                            proyek.eksisting = res.text[0];
                        });

                    this.$store
                        .dispatch(
                            "TranslateModule/translate",
                            proyek.latar_belakang
                        )
                        .then(res => {
                            proyek.latar_belakang = res.text[0];
                        });

                    this.$store
                        .dispatch(
                            "TranslateModule/translate",
                            proyek.lingkup_pekerjaan
                        )
                        .then(res => {
                            proyek.lingkup_pekerjaan = res.text[0];
                            // console.log(proyek.lingkup_pekerjaan,res.text[0])
                        });
                    this.proyek = proyek;
                });
        }
    }
};
</script>

<style>
.v-tab {
    background-color: #4f7cf1;
}
.tab-active {
    background-color: #f2c21a;
}
</style>
