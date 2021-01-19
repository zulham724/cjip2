<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>Bantuan</v-toolbar-title>
        </v-app-bar>
        <v-container>
            <v-row>
                <v-col cols="3">
                    <v-tabs :centered="false" vertical>
                        <v-tab v-for="jenis_faq in jenis_faqs" :key="jenis_faq.id" @click="getJenisFaq(jenis_faq.id)">
                            <div class="caption">{{jenis_faq.name}}</div>
                        </v-tab>
                    </v-tabs>
                </v-col>
                <v-col cols="9">
                    <v-card>
                        <v-card-text>
                            <v-expansion-panels>
                                <v-expansion-panel
                                v-for="faq in faqs"
                                :key="faq.id"
                                >
                                <v-expansion-panel-header>{{faq.question}}</v-expansion-panel-header>
                                <v-expansion-panel-content style="background-color:white">
                                    <div v-html="faq.answer"></div>
                                </v-expansion-panel-content>
                                </v-expansion-panel>
                            </v-expansion-panels>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

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

<style scoped>
    p {
        color:white
    }
    span{
        color:white
    }
</style>
