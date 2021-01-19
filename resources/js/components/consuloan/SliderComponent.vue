<template>
    <div>
        <v-carousel
            :show-arrows="false"

        >
            <v-carousel-item
                reverse-transition="fade-transition"
                transition="fade-transition"
                style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url('/images/slide1.jpg');background-size:cover"
            >
                <v-container class="fill-height">
                    <v-row
                        align="start"
                        justify="center"
                    >
                        <v-col cols="12">
                                <div :class="`${$vuetify.breakpoint.xsOnly ? 'display-1' : 'display-2'} white--text mb-3 font-weight-medium`">{{TranslateModule.contents.title}}</div>
                                <div :class="`${$vuetify.breakpoint.xsOnly ? 'title' : 'display-1'} white--text mb-5`">{{TranslateModule.contents.subheading_1}}</div>
                                <v-btn class="yellow darken-1 black--text" target="_blank" href="https://wa.wizard.id/d97550">{{TranslateModule.contents.contactus}}</v-btn>
                                <v-btn color="yellow darken-1" icon @click="dialog = true"><v-icon>mdi-magnify</v-icon></v-btn>
                                <!-- <v-btn
                                v-if="$vuetify.breakpoint.mdAndUp"
                                class="yellow darken-1 black--text" target="_blank" href="https://wa.wizard.id/d97550">{{TranslateModule.contents.contactus}}</v-btn> -->
                                <!-- <auth-component v-else></auth-component> -->
                        </v-col>
                    </v-row>
                </v-container>
            </v-carousel-item>
            <v-carousel-item
                reverse-transition="fade-transition"
                transition="fade-transition"
                style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url('/images/slide2.jpg');background-size:cover"
            >
                <v-container class="fill-height">
                    <v-row
                        align="center"
                        justify="center"
                    >
                        <v-col cols="12">
                                <div :class="`${$vuetify.breakpoint.xsOnly ? 'display-1' : 'display-2'} white--text mb-3 font-weight-medium`">{{TranslateModule.contents.title}}</div>
                                <div :class="`${$vuetify.breakpoint.xsOnly ? 'title' : 'display-1'} white--text mb-5`">{{TranslateModule.contents.subheading_1}}</div>
                                <v-btn class="yellow darken-1 black--text" target="_blank" href="https://wa.wizard.id/d97550">{{TranslateModule.contents.contactus}}</v-btn>
                                <v-btn color="yellow darken-1" icon @click="dialog = true"><v-icon>mdi-magnify</v-icon></v-btn>
                                <!-- <v-btn
                                v-if="$vuetify.breakpoint.mdAndUp"
                                class="yellow darken-1 black--text" target="_blank" href="https://wa.wizard.id/d97550">{{TranslateModule.contents.contactus}}</v-btn> -->
                                <!-- <auth-component v-else></auth-component> -->
                        </v-col>
                    </v-row>
                </v-container>
            </v-carousel-item>
        </v-carousel>

        <v-dialog v-model="dialog" width="800">
            <v-card >
                <v-card-text>
                    <div class="container">
                        <search-component></search-component>
                    </div>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="dialog = false">
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    components:{
        SearchComponent: ()=> import('./../../components/consuloan/SearchComponent.vue'),
    },
    data(){
        return {
            dialog: false
        }
    },
    computed:{
        ...mapState(['SettingModule','TranslateModule'])
    },
    mounted(){
        // console.log(this.$vuetify.breakpoint)
    },
    methods:{

    }
};
</script>

<style scoped>
    .v-image__image{
        filter: brightness(50%)
    }
</style>
