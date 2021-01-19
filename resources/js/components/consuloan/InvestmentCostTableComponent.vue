<template>
    <div>
        <section
            class="section-aboutus wrap-blance blancejqurey bg-section2 clearfix"
        >
            <div id="blance1" class="featured-aboutus float-left">
                <img src="/consuloan/images/invesmentcost.jpg" alt="image" />
            </div>
            <div id="blance2" style="padding: 3% 3% 3% 3%" class="info-aboutus float-left">
                <div class="title-section style2 left">
                    <h1>
                        {{TranslateModule.contents.invest_price}}
                    </h1>
                    <div class="sub-title">
                        {{TranslateModule.contents.invest_price_desc}}
                    </div>
                </div>
            </div>
        </section>

        <v-container>
            <v-row>
                <v-col cols="12">
                    <center><div class="title">{{TranslateModule.contents.electric_table}}</div></center>
                </v-col>
                <v-col cols="12">
                    <v-data-table
                        :headers="datatables.biayaListrik.headers"
                        :items="datatables.biayaListrik.items"
                        :items-per-page="5"
                        class="elevation-1"
                    >
                    </v-data-table>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <center><div class="title">{{TranslateModule.contents.water_table}}</div></center>
                </v-col>
                <v-col cols="12">
                    <v-data-table
                        :headers="datatables.jenisKatUserAir.headers"
                        :items="datatables.jenisKatUserAir.items"
                        :items-per-page="5"
                        class="elevation-1"
                    >
                        <template v-slot:item.air.category="{ item }">
                            {{item.user_category}}
                            <div v-for="category in item.air" :key="category.id">
                                {{category.category}}
                            </div>
                        </template>
                        <template v-slot:item.air.first="{ item }">
                            <br>
                            <div v-for="category in item.air" :key="category.id">
                                {{category.first}}
                            </div>
                        </template>
                        <template v-slot:item.air.second="{ item }">
                            <br>
                            <div v-for="category in item.air" :key="category.id">
                                {{category.second}}
                            </div>
                        </template>
                        <template v-slot:item.air.third="{ item }">
                            <br>
                            <div v-for="category in item.air" :key="category.id">
                                {{category.third}}
                            </div>
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
            datatables:{
                biayaListrik:{
                    headers: [
                        {
                            text: "Kategori Pengguna",
                            align: "left",
                            value: "kategori.user_category"
                        },
                        { text: "Code", value: "code" },
                        { text: "Kapasitas", value: "capacity" },
                        { text: "Tarif", value: "tarif" },
                    ],
                    items: []
                },
                jenisKatUserAir:{
                    headers: [
                        { text: "Kategori Pengguna", value: "air.category" },
                        { text: "I (0-10m3)", value: "air.first" },
                        { text: "II (11-20m3)", value: "air.second" },
                        { text: "III (> 20m3)", value: "air.third" },
                    ],
                    items: []
                }
            }
        };
    },
    mounted(){
        this.getBiayaListriks()
        this.getJenisKatUserAirs()
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
    methods:{
        getBiayaListriks(){
            return new Promise((resolve,reject)=>{
                axios.get('/api/v1/biayalistrik').then(res=>{
                    this.datatables.biayaListrik.items = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        getJenisKatUserAirs(){
            return new Promise((resolve,reject)=>{
                axios.get('/api/v1/jeniskatuserair').then(res=>{
                    this.datatables.jenisKatUserAir.items = res.data
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
