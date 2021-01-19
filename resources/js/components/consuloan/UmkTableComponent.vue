<template>
    <div>
        <section
            class="section-aboutus wrap-blance blancejqurey bg-section2 clearfix"
        >
            <div id="blance1" class="featured-aboutus float-left">
                <img src="/consuloan/images/umktable.jpg" alt="image" />
            </div>
            <div id="blance2" style="padding: 3% 3% 3% 3%" class="info-aboutus float-left">
                <div class="title-section style2 left">
                    <h1>
                        {{TranslateModule.contents.data_umk}}
                    </h1>
                    <div class="sub-title">
                        {{TranslateModule.contents.data_umk_desc}}
                    </div>
                </div>
            </div>
        </section>

        <v-container>
            <v-row>
                <v-col cols="12">
                    <center><div class="title">{{TranslateModule.contents.data_umk_table}}</div></center>
                </v-col>
                <v-col cols="12">
                    <v-data-table
                        :headers="headers"
                        :items="items"
                        :items-per-page="5"
                        class="elevation-1"
                    >
                        <template v-slot:item.nilai_umr="{ item }">
                            {{item.nilai_umr.toLocaleString()}}
                        </template>
                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    data() {
        return {
            headers: [
                {
                    text: "Kab/ Kota",
                    align: "left",
                    value: "kab.namakota[0].nama"
                },
                { text: "Tahun", value: "tahun" },
                { text: "Nilai UMK", value: "nilai_umr" },
            ],
            items: []
        };
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
    mounted(){
        // this.items.length ? this.getUmrs() : null
        this.getUmrs()
    },
    methods:{
        getUmrs(){
            return new Promise((resolve,reject)=>{
                axios.get('/api/v1/umr').then(res=>{
                    this.items = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        }
    }
};
</script>

<style></style>
