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
                                {{ TranslateModule.contents.menu8 }}
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
                                <li>{{ TranslateModule.contents.menu8 }}</li>
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
                                            v-for="(cjibf_sector, cs) in CjibfSectorModule.cjibf_sectors"
                                            :key="cjibf_sector.id"
                                            @click="getProyeks(cjibf_sector.id)"
                                        >
                                            <v-list-item-icon>
                                                <img
                                                    :src="icons[cs].src"
                                                />
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title
                                                    style="overflow-wrap:break-word; white-space:pre-line"
                                                    >{{ cjibf_sector.name }}</v-list-item-title
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
                                    <li
                                        :class="
                                            selectedCjibfSectorId ==
                                            cjibf_sector.id
                                                ? 'active'
                                                : null
                                        "
                                        v-for="(cjibf_sector,
                                        cs) in CjibfSectorModule.cjibf_sectors"
                                        :key="cjibf_sector.id"
                                        @click="getProyeks(cjibf_sector.id)"
                                    >
                                        <a style="display:inline-flex">
                                            <v-img
                                                width="30px"
                                                style="margin-right: 10px"
                                                :src="icons[cs].src"
                                            ></v-img>
                                            {{ cjibf_sector.name }}
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
                                    <div class="col-6" v-for="proyek in proyeks.data" :key="proyek.id">
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
            selectedCjibfSectorId: null,
            proyeks: null,
            cjibf_sectors: [],
            icons: [
                {
                    name: "manufacture",
                    src: "/svg/sector/manufacture.svg"
                },
                {
                    name: "tourism",
                    src: "/svg/sector/tourism.svg"
                },
                {
                    name: "infrastructure",
                    src: "/svg/sector/infrastructure.svg"
                },
                {
                    name: "agriculture",
                    src: "/svg/sector/agriculture.svg"
                },
                {
                    name: "property",
                    src: "/svg/sector/property.svg"
                },
                {
                    name: "energy",
                    src: "/svg/sector/energy.svg"
                },
                {
                    name: "manufacture",
                    src: "/svg/sector/manufacture.svg"
                },
                {
                    name: "tourism",
                    src: "/svg/sector/tourism.svg"
                },
                {
                    name: "infrastructure",
                    src: "/svg/sector/infrastructure.svg"
                },
                {
                    name: "agriculture",
                    src: "/svg/sector/agriculture.svg"
                }
            ]
        };
    },
    components: {
        ProjectItem,
        SearchProject
    },
    computed: {
        ...mapState(["CjibfSectorModule", "AuthModule", "TranslateModule"])
    },
    watch: {
        "TranslateModule.to": {
            handler: function() {
                this.getCjibfSectors();
                this.inputPage(this.proyeks.current_page);
            },
            deep: true
        }
    },
    mounted() {
        this.proyeks == null
            ? this.getCjibfSectors().then(res => {
                  this.selectedCjibfSectorId = res.data[0].id;
                  this.getProyeks(this.selectedCjibfSectorId);
              })
            : null;
    },
    methods: {
        getCjibfSectors() {
            return new Promise((resolve, reject) => {
                this.$store
                    .dispatch("getCjibfSectors")
                    .then(res => {
                        this.cjibf_sectors = res.data.map(item => {
                            this.$store
                                .dispatch(
                                    "TranslateModule/translate",
                                    item.name
                                )
                                .then(res => {
                                    item.name = res.text[0];
                                });
                            return item;
                        });
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    });
            });
        },
        getProyeks(cjibf_sectorId) {
            this.selectedCjibfSectorId = cjibf_sectorId;
            this.$store
                .dispatch("ProjectModule/byCjibfSector", cjibf_sectorId)
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
