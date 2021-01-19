<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{TranslateModule.contents.menu9}}</h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i
                                    ><a href="/home#/">Home</a>
                                </li>
                                <li><a>{{TranslateModule.contents.menu9}}</a></li>
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
        <section class="flat-row section-product2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar shop">
                            <div class="widget widget-nav-menu">
                                <ul class="widget-menu">
                                    <li :class="selectedCjibfSectorId == cjibf_sector.id ? 'active': null" v-for="cjibf_sector in CjibfSectorModule.cjibf_sectors" :key="cjibf_sector.id" @click="getProyeks(cjibf_sector.id)">
                                        <a>{{cjibf_sector.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9" v-if="proyeks != null">
                        <div class="wrap-product clearfix">
                            <transition-group name="fadeLeft">
                            <div class="product style2" v-for="proyek in proyeks.data" :key="proyek.id">
                                <div class="box-product">
                                    <div class="featured-product">
                                        <a v-if="proyek.fotos">
                                            <img
                                                :src="`${AuthModule.storageUrl}/${proyek.fotos[0]}`"
                                                alt="image"
                                        /></a>
                                    </div>
                                    <div class="content-product text-center">
                                        <div class="name">
                                            <span>{{proyek.project_name}}</span>
                                        </div>
                                        <div class="mount">
                                            <span>{{proyek.marketplace.name}}</span>
                                        </div>
                                        <div class="btn-card">
                                            <a
                                                href="#"
                                                class="flat-button style2"
                                                >{{TranslateModule.contents.invest_now}}</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </transition-group>
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
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { mapState } from "vuex"
import ProjectItem from './../../components/consuloan/ProjectItemComponent'
export default {
    data() {
        return {
            selectedCjibfSectorId: null,
            proyeks: null
        };
    },
    components:{
        ProjectItem
    },
    computed: {
        ...mapState(["CjibfSectorModule",'AuthModule','TranslateModule'])
    },
    mounted() {
        this.proyeks == null ? this.getCjibfSectors().then(res=>{
            this.selectedCjibfSectorId = res.data[0].id
            this.getProyeks(this.selectedCjibfSectorId)
        }) : null;
    },
    watch: {
        'TranslateModule.to': {
            handler: function(){
                this.getCjibfSectors()
                this.inputPage(this.proyeks.current_page)
            },
            deep: true
        }
    },
    methods: {
        getCjibfSectors() {
            return new Promise((resolve,reject)=>{
                this.$store.dispatch("getCjibfSectors").then(res=>{
                    this.cjibf_sectors = res.data.map(item=>{
                        this.$store.dispatch('TranslateModule/translate',item.name).then(res=>{
                            item.name = res.text[0]
                        })
                        return item
                    })
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        getProyeks(cjibf_sectorId){
            this.selectedCjibfSectorId = cjibf_sectorId
            this.$store.dispatch('ProjectModule/byCjibfSector',cjibf_sectorId).then(res=>{
                const proyeks = res.data.data.map(proyek=>{
                    proyek.fotos = eval(proyek.fotos)

                    this.$store.dispatch('TranslateModule/translate',proyek.project_name).then(res=>{
                        proyek.project_name = res.text[0]
                    })

                    this.$store.dispatch('TranslateModule/translate',proyek.latar_belakang).then(res=>{
                        proyek.latar_belakang = res.text[0]
                    })

                    proyek.marketplace ? this.$store.dispatch('TranslateModule/translate',proyek.marketplace.name).then(res=>{
                        proyek.marketplace.name = res.text[0]
                    }) : null

                    return proyek
                })
                this.proyeks = {...res.data,data:proyeks}
            })
        },
        nextPage(){
            this.$store.dispatch('ProjectModule/toPage',this.proyeks.next_page_url).then(res=>{
                const proyeks = res.data.data.map(proyek=>{
                    proyek.fotos = eval(proyek.fotos)

                    this.$store.dispatch('TranslateModule/translate',proyek.project_name).then(res=>{
                        proyek.project_name = res.text[0]
                    })

                    this.$store.dispatch('TranslateModule/translate',proyek.latar_belakang).then(res=>{
                        proyek.latar_belakang = res.text[0]
                    })

                    proyek.marketplace ? this.$store.dispatch('TranslateModule/translate',proyek.marketplace.name).then(res=>{
                        proyek.marketplace.name = res.text[0]
                    }) : null

                    return proyek
                })
                this.proyeks = {...res.data,data:proyeks}
            })
        },
        prevPage(){
            this.$store.dispatch('ProjectModule/toPage',this.proyeks.prev_page_url).then(res=>{
                const proyeks = res.data.data.map(proyek=>{
                    proyek.fotos = eval(proyek.fotos)

                    this.$store.dispatch('TranslateModule/translate',proyek.project_name).then(res=>{
                        proyek.project_name = res.text[0]
                    })

                    this.$store.dispatch('TranslateModule/translate',proyek.latar_belakang).then(res=>{
                        proyek.latar_belakang = res.text[0]
                    })

                    proyek.marketplace ? this.$store.dispatch('TranslateModule/translate',proyek.marketplace.name).then(res=>{
                        proyek.marketplace.name = res.text[0]
                    }) : null

                    return proyek
                })
                this.proyeks = {...res.data,data:proyeks}
            })
        },
        inputPage(page){
            this.$store.dispatch('ProjectModule/toPage',`${this.proyeks.path}?page=${page}`).then(res=>{
                const proyeks = res.data.data.map(proyek=>{
                    proyek.fotos = eval(proyek.fotos)

                    this.$store.dispatch('TranslateModule/translate',proyek.project_name).then(res=>{
                        proyek.project_name = res.text[0]
                    })

                    this.$store.dispatch('TranslateModule/translate',proyek.latar_belakang).then(res=>{
                        proyek.latar_belakang = res.text[0]
                    })

                    proyek.marketplace ? this.$store.dispatch('TranslateModule/translate',proyek.marketplace.name).then(res=>{
                        proyek.marketplace.name = res.text[0]
                    }) : null

                    return proyek
                })
                this.proyeks = {...res.data,data:proyeks}
            })
        }
    }
};
</script>

<style></style>
