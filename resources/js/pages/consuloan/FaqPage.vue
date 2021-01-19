<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{TranslateModule.contents.menu4}}</h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i
                                    ><a href="/home#/">Home</a>
                                </li>
                                <li><a>{{TranslateModule.contents.menu4}}</a></li>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget-nav-menu">
                                <ul class="widget-menu">
                                    <li :class="selectedJenisFaqId == jenis_faq.id ? 'active': null" v-for="jenis_faq in jenis_faqs" :key="jenis_faq.id" @click="getJenisFaq(jenis_faq.id)">
                                        <a>{{jenis_faq.name}}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9" v-if="faqs != null">
                        <div class="post-wrap post-list">
                            <v-expansion-panels>
                                <v-expansion-panel
                                v-for="faq in faqs"
                                :key="faq.id"
                                >
                                <v-expansion-panel-header>{{faq.question}}</v-expansion-panel-header>
                                <v-expansion-panel-content>
                                    <div v-html="faq.answer"></div>
                                </v-expansion-panel-content>
                                </v-expansion-panel>
                            </v-expansion-panels>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    data(){
        return {
            jenis_faqs:null,
            selectedJenisFaqId: null,
            faqs:null
        }
    },
    mounted(){
        this.jenis_faqs == null ? this.getJenisFaqs().then(res=>{
            this.selectedJenisFaqId = res.data[0].id
            this.getJenisFaq(this.selectedJenisFaqId)
        }) : null
    },
    watch: {
        'TranslateModule.to': {
            handler: function(){
                this.getJenisFaqs()
                this.getJenisFaq(this.selectedJenisFaqId)
            },
            deep: true
        }
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
    methods:{
        getJenisFaqs(){
            return new Promise((resolve,reject)=>{
                this.$store.dispatch('getJenisFaqs').then(res=>{
                    this.jenis_faqs = res.data.map(item=>{
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
        getJenisFaq(id){
            this.$store.dispatch('getJenisFaq',id).then(res=>{
                this.selectedJenisFaqId = res.data.id
                this.faqs = res.data.faqs.map(item=>{
                    this.$store.dispatch('TranslateModule/translate',item.question).then(res=>{
                        item.question = res.text[0]
                    })
                    this.$store.dispatch('TranslateModule/translate',item.answer).then(res=>{
                        item.answer = res.text[0]
                    })
                    return item
                })
            })
        }
    }
}
</script>

<style>

</style>
