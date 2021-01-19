<template>
    <div>
        <v-carousel
            cycle
            hide-delimiter-background
            :show-arrows="false"
            v-if="item"
        >
            <v-carousel-item v-for="image in item.fotos" :key="image" @click="dialog = true">
                <v-img
                    width="250"
                    :src="`${AuthModule.storageUrl}/${image}`"
                >
                    <template v-slot:placeholder>
                        <v-row
                            class="fill-height ma-0"
                            align="center"
                            justify="center"
                        >
                            <v-progress-circular
                                indeterminate
                                color="grey lighten-5"
                            ></v-progress-circular>
                        </v-row>
                    </template>
                    <template v-slot:default>
                        <v-container fill-height>
                            <v-row
                                class="fill-height"
                                justify="start"
                                align="end"
                            >
                                <v-col
                                    cols="12"
                                    style="background-color:black;opacity:0.6"
                                >
                                    <div class="caption white--text">
                                        {{ item.project_name }}
                                    </div>
                                </v-col>
                            </v-row>
                        </v-container>
                    </template>
                </v-img>
            </v-carousel-item>
        </v-carousel>

        <!-- dialog  -->
        <v-dialog v-model="dialog" width="500">
            <v-card>
                <v-card-title class="headline" primary-title>
                    Invest
                </v-card-title>

                <v-card-text>
                    <v-form lazy-validation ref="form">
                        <v-row>
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

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn rounded outlined :loading="loading" :disabled="loading" @click="storeInvest()">
                        Submit
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <!-- end dialog  -->
    </div>
</template>

<script>
import { mapState } from "vuex";
import Swal from 'sweetalert2'
export default {
    props: {
        item: null,
    },
    data() {
        return {
            dialog: false,
            currencies:[{
                name: 'IDR',
                value: 'Rp'
            },{
                name: 'USD',
                value: '$'
            }],
            form:{},
            loading: false,
            rule: [v => !!v || "Required!"],
        };
    },
    computed: {
        ...mapState(["AuthModule"])
    },
    methods:{
        storeInvest(){
            if(this.$refs.form.validate()){
                this.loading = true
                let access = {
                    sektor_id: this.item.by_sector.name,
                    lokasi_investasi: this.item.by_user.namakota[0].nama,
                    kab_kota_id: this.item.kabkota.id,
                }

                this.form.selected_currency == 'IDR'
                ? access.nilai_rp = this.form.invest_value
                : access.nilai_usd = this.form.invest_value

                this.$store.dispatch('InvestorModule/storeInvest', access).then(res=>{
                    this.$store.dispatch('getAuth').then(res=>{
                        this.loading = this.dialog = false
                        Swal.fire({
                            icon:'success',
                            title: 'Submitted',
                        })
                    })
                }).catch(err=>{
                    this.loading = this.dialog = false
                })
            }
        }
    }
};
</script>

<style></style>
