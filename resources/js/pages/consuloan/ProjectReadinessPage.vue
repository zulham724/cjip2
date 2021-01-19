<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">
                                {{ TranslateModule.contents.menu7 }}
                            </h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i
                                    ><a href="/home#/">Home</a>
                                </li>
                                <li>
                                    <a>{{ TranslateModule.contents.menu3 }}</a>
                                </li>
                                <li>{{ TranslateModule.contents.menu7 }}</li>
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
        <section class="flat-row blog-list">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <v-card
                            class="mt-12"
                            elevation="12"
                            width="256"
                            style="border-radius: 0 20px 20px 0"
                            color="#B9C9F6"
                        >
                            <v-navigation-drawer
                                floating
                                permanent
                                color="#B9C9F6"
                            >
                                <v-list dense rounded>
                                    <v-list-item-group v-model="selectedMenu">
                                        <v-list-item
                                            ripple
                                            :key="icons[0].name"
                                            @click="getReadyToOfferProjects()"
                                        >
                                            <v-list-item-icon>
                                                <img
                                                    :src="icons[0].src"
                                                />
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title
                                                    style="overflow-wrap:break-word; white-space:pre-line"
                                                    >{{
                                                        TranslateModule.contents
                                                            .ready_to_offer
                                                    }}</v-list-item-title
                                                >
                                            </v-list-item-content>
                                        </v-list-item>
                                        <v-list-item
                                            ripple
                                            :key="icons[0].name"
                                            @click="getProspectiveProjects()"
                                        >
                                            <v-list-item-icon>
                                                <img
                                                    :src="icons[1].src"
                                                >
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title
                                                    style="overflow-wrap:break-word; white-space:pre-line"
                                                    >{{
                                                        TranslateModule.contents
                                                            .prospective_project
                                                    }}</v-list-item-title
                                                >
                                            </v-list-item-content>
                                        </v-list-item>
                                        <v-list-item
                                            ripple
                                            :key="icons[0].name"
                                            @click="getPotentialProjects()"
                                        >
                                            <v-list-item-icon>
                                                <img
                                                    :src="icons[2].src"
                                                />
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title
                                                    style="overflow-wrap:break-word; white-space:pre-line"
                                                    >{{
                                                        potential_project
                                                    }}</v-list-item-title
                                                >
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>
                            </v-navigation-drawer>
                        </v-card>
                        <!-- <div class="sidebar">
                            <div class="widget widget-nav-menu">
                                <ul class="widget-menu">
                                    <li @click="getReadyToOfferProjects()" :class="selectedMenu == 'readyToOffer' ? 'active': null">
                                        <a style="display:inline-flex">
                                            <v-img width="30px" style="margin-right: 10px" :src="icons[0].src"></v-img> {{TranslateModule.contents.ready_to_offer}}
                                        </a>
                                    </li>
                                    <li @click="getProspectiveProjects()" :class="selectedMenu == 'prospectiveProject' ? 'active': null">
                                        <a style="display:inline-flex">
                                            <v-img width="30px" style="margin-right: 10px" :src="icons[1].src"></v-img> {{TranslateModule.contents.prospective_project}}
                                        </a>
                                    </li>
                                    <li @click="getPotentialProjects()" :class="selectedMenu == 'potentialProject' ? 'active': null">
                                        <a style="display:inline-flex">
                                            <v-img width="30px" style="margin-right: 10px" :src="icons[2].src"></v-img> {{potential_project}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9" v-if="proyeks != null">
                        <search-project></search-project>
                        <div class="post-wrap post-list">
                            <article
                                v-if="proyeks.data.length == 0"
                                class="entry border-shadow clearfix"
                            >
                                <div class="content-post">
                                    <h2 class="title-post">
                                        <a>{{
                                            TranslateModule.contents.empty
                                        }}</a>
                                    </h2>
                                </div>
                                <!-- /.contetn-post -->
                            </article>
                            <!-- <transition-group name="fadeLeft"> -->
                                <div class="row">
                                    <div class="col-6" v-for="proyek in proyeks.data"
                                            :key="proyek.id">
                                        <project-item
                                            :proyek="proyek"
                                        ></project-item>
                                    </div>
                                </div>
                            <!-- </transition-group> -->
                        </div>
                        <v-pagination
                            color="#F2C21A"
                            v-model="proyeks.current_page"
                            :length="proyeks.last_page"
                            @next="nextPage"
                            @previous="prevPage"
                            @input="inputPage"
                        ></v-pagination>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
    </div>
</template>

<script>
import { mapState } from "vuex";
import ProjectItem from "./../../components/consuloan/ProjectItemComponent";
import SearchProject from "./../../components/consuloan/SearchComponent";
export default {
    data() {
        return {
            selectedMenu: "readyToOffer",
            proyeks: null,
            icons: [
                {
                    name: "readyToOffer",
                    src: "/svg/readiness/readytooffer.svg"
                },
                {
                    name: "prospective",
                    src: "/svg/readiness/prospective.svg"
                },
                {
                    name: "potential",
                    src: "/svg/readiness/potential.svg"
                }
            ],
            potential_project: "Proyek Potensial"
        };
    },
    computed: {
        ...mapState(["AuthModule", "TranslateModule"])
    },
    components: {
        ProjectItem,
        SearchProject
    },
    watch: {
        "TranslateModule.to": {
            handler: function() {
                this.inputPage(this.proyeks.current_page);
                console.log(this.TranslateModule.to, this.potential_project);
                if (this.TranslateModule.to.value == "id")
                    this.potential_project = "Proyek Potensial";
                if (this.TranslateModule.to.value == "en")
                    this.potential_project = "Potential Project";
            },
            deep: true
        }
    },
    mounted() {
        this.proyeks == null ? this.getReadyToOfferProjects() : null;
    },
    methods: {
        getReadyToOfferProjects() {
            this.selectedMenu = "readyToOffer";
            this.$store
                .dispatch("ProjectModule/getReadyToOfferProjects")
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        },
        getProspectiveProjects() {
            this.selectedMenu = "prospectiveProject";
            this.$store
                .dispatch("ProjectModule/getProspectiveProjects")
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        },
        getPotentialProjects() {
            this.selectedMenu = "potentialProject";
            this.$store
                .dispatch("ProjectModule/getPotentialProjects")
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        },
        nextPage() {
            this.$store
                .dispatch("ProjectModule/toPage", this.proyeks.next_page_url)
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        },
        prevPage() {
            this.$store
                .dispatch("ProjectModule/toPage", this.proyeks.prev_page_url)
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        },
        inputPage(page) {
            this.$store
                .dispatch(
                    "ProjectModule/toPage",
                    `${this.proyeks.path}?page=${page}`
                )
                .then(res => {
                    const proyeks = res.data.data.map(proyek => {
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
                            .dispatch(
                                "TranslateModule/translate",
                                proyek.latar_belakang
                            )
                            .then(res => {
                                proyek.latar_belakang = res.text[0];
                            });

                        return proyek;
                    });
                    this.proyeks = { ...res.data, data: proyeks };
                });
        }
    }
};
</script>

<style></style>
