<template>
    <article
        v-if="proyek != null"
    >
        <v-container>
            <v-card>
                <v-img :src="`${AuthModule.storageUrl}/${proyek.fotos[0]}`" height="40vh">
                    <template v-slot:default>
                        <v-container fill-height>
                            <v-row class="fill-height" justify="start" align="end">
                                <v-col cols="12" style="background-color:#507CF2">
                                    <h1 class="body-1 white--text">
                                        <a @click="$router.push(`/project/${proyek.id}`)"
                                            >{{proyek.project_name}}</a
                                        >
                                    </h1>
                                </v-col>
                            </v-row>
                        </v-container>
                    </template>
                </v-img>
                <v-card-text>
                    <div class="container">
                        <!-- <span class="category"
                            >{{proyek.marketplace.name}}</span
                        > -->
                        <div class="row justify-content-between">
                            <div class="body-2">{{TranslateModule.contents.project_value}} <b>{{proyek.nilai_investasi}}</b></div>
                            <div class="body-2" v-if="proyek.by_sector">{{TranslateModule.contents.sector}} <b>{{proyek.by_sector.name}}</b></div>
                        </div>
                        <div class="row pt-5 pb-5">
                            <div class="body-2">
                                {{proyek.latar_belakang}}
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <v-btn class="mr-1 mb-1" small rounded color="#2A62F5" dark @click="$router.push(`/project/${proyek.id}`)"
                                >{{TranslateModule.contents.read_more}}</v-btn
                            ><br>
                            <v-btn rounded small color="#F2C21A" light v-if="proyek.by_user.namakota[0]" @click="$router.push(`/profilekabupaten/${proyek.profil_id}`)"
                                >{{TranslateModule.contents.open}} {{proyek.by_user.namakota[0].nama}}</v-btn
                            >
                        </div>
                    </div>
                </v-card-text>
            </v-card>
        </v-container>
    </article>
</template>

<script>
import {mapState} from 'vuex'
export default {
    props:{
        proyek: null
    },
    data(){
        return {

        }
    },
    computed:{
        ...mapState(['AuthModule','TranslateModule'])
    },
    mounted(){

    },
    methods:{

    }
}
</script>

