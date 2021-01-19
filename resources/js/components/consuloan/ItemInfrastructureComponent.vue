<template>
    <div v-if="item">
        <div class="container">
            <div class="row align-items-center justify-content-center" @click="dialog = true">
                <img width="120px" :src="icon.src" />
            </div>
            <div
                class="row align-items-center justify-content-center mt-5  "
            >
                <div class="subtitle-1 white--text">
                    {{ item.nama_infrastruktur }}
                </div>
            </div>
        </div>

        <v-dialog v-model="dialog" width="800">
            <v-card >
                <v-card-title class="headline yellow lighten-2 " primary-title>
                    {{ item.nama_infrastruktur }}
                </v-card-title>

                <v-card-text>
                    <div class="row align-items-center justify-content-center">
                        <img :src="`/storage/${item.gambar}`" alt="">
                    </div>
                    <div
                        class="container"
                        style="text-align:left"
                        v-html="item.detail"
                    ></div>
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
import { mapState } from "vuex";
export default {
    props: {
        item: null,
        icon: null,
        img: null
    },
    data() {
        return {
            dialog: false
        };
    }
};
</script>

<style></style>
