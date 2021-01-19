<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>Investasi Saya</v-toolbar-title>
        </v-app-bar>
        <v-container>
            <div class="body-1 white--text">Choose Project to Invest</div>
            <v-row>
                <v-col cols="12">
                    <RecycleScroller
                        v-if="projects"
                        style="height:30vh"
                        direction="horizontal"
                        :items="projects"
                        :item-size="300"
                        key-field="id"
                        v-slot="{ item }"
                    >
                        <invest-item-component
                            :item="item"
                        ></invest-item-component>
                    </RecycleScroller>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="8">
                    <v-card dark>
                        <v-card-title>
                            Manual Form
                        </v-card-title>
                        <v-card-text>
                            <v-form lazy-validation ref="form">
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="form.sektor_id"
                                            :rules="rule"
                                            rounded
                                            outlined
                                            label="Sector"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-select
                                            v-model="form.kab_kota_id"
                                            :rules="rule"
                                            :items="cities"
                                            item-text="nama"
                                            item-value="id"
                                            rounded
                                            outlined
                                            label="Kab/Kota"
                                        ></v-select>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="form.lokasi_investasi"
                                            :rules="rule"
                                            rounded
                                            outlined
                                            label="Location"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="4">
                                        <v-select
                                            rounded
                                            outlined
                                            :rules="rule"
                                            :items="currencies"
                                            item-text="name"
                                            item-value="name"
                                            label="Choose Currency"
                                            v-model="form.selected_currency"
                                        ></v-select>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field
                                            v-model="form.invest_value"
                                            :rules="rule"
                                            rounded
                                            outlined
                                            label="Investment Value"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn rounded outlined @click="storeInvest()" :loading="loading" :disabled="loading">Submit</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
                <v-col cols="4">
                    <RecycleScroller
                        v-if="invested"
                        style="height:50vh"
                        :items="AuthModule.auth.loi_interests"
                        :item-size="250"
                        key-field="id"
                        v-slot="{ item }"
                    >
                        <loi-component :item="item"></loi-component>
                    </RecycleScroller>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { mapState } from "vuex";
import InvestItemComponent from "./../../components/investor/InvestItemComponent";
import LoiComponent from "./../../components/investor/LoiComponent";
import Swal from 'sweetalert2'
export default {
    components: {
        InvestItemComponent,
        LoiComponent
    },
    data() {
        return {
            projects: null,
            currencies:[{
                name: 'IDR',
                value: 'Rp'
            },{
                name: 'USD',
                value: '$'
            }],
            invested: [
                {
                    city: "Kabupaten Pemalang",
                    name:
                        "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit ea velit alias doloribus itaque aperiam aliquam eveniet neque nisi blanditiis. Odio nam cumque in eaque expedita accusantium quo error. Non?",
                    value: "IDR 9.000.000"
                }
            ],
            cities: [],
            rule: [v => !!v || "Required!"],
            form:{},
            loading: false
        };
    },
    computed: {
        ...mapState(["SettingModule", "AuthModule",'InvestorModule'])
    },
    mounted() {
        this.getProjects();
        this.getCities();
    },
    methods: {
        getProjects() {
            this.$store.dispatch("ProjectModule/index").then(res => {
                this.projects = res.data.map(project => {
                    project.fotos = eval(project.fotos);
                    return project;
                });
            });
        },
        getCities() {
            this.$store.dispatch("CityModule/index").then(res => {
                this.cities = res.data;
            });
        },
        storeInvest(){
            if(this.$refs.form.validate()){
                this.loading = true
                let access = {
                    sektor_id: this.form.sektor_id,
                    lokasi_investasi: this.form.lokasi_investasi,
                    kab_kota_id: this.form.kab_kota_id,
                }

                this.form.selected_currency == 'IDR'
                ? access.nilai_rp = this.form.invest_value
                : access.nilai_usd = this.form.invest_value

                this.$store.dispatch('InvestorModule/storeInvest', access).then(res=>{
                    this.$store.dispatch('getAuth').then(res=>{
                        this.loading = false
                        Swal.fire({
                            icon:'success',
                            title: 'Submitted',
                        })
                    })
                }).catch(err=>{
                    this.loading = false
                })
            }
        }
    }
};
</script>

<style></style>
