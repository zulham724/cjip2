<template>
    <div>
        <v-dialog v-model="dialog" width="80vw">
            <template v-slot:activator="{ on }">
                <v-icon small class="mr-2" v-on="on"
                    >mdi-eye</v-icon
                >
            </template>

            <v-card>
                <v-card-title primary-title>
                    Template
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <div id="review"></div>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import sample from "./../Sample.json";
import html2canvas from 'html2canvas'
import $ from 'jquery'
export default {
    props: {
        item: null
    },
    data() {
        return {
            dialog: false,
            form: {},
            loading: false
        };
    },
    created(){

    },
    mounted(){
        setInterval(()=>{
            $('#review').html(this.item.body)
        },1000)
    },
    methods: {
    }
};
</script>

<style></style>
