<template>
<div>
    <v-card dark v-if="item">
        <v-card-title>
            <v-row>
                <v-col>
                    <div class="body-1">Thank You For Investing in </div>
                    <div class="body-1">{{item.lokasi_investasi}}</div>
                </v-col>
            </v-row>
        </v-card-title>
        <v-card-text>
            <div class="title font-weight-bold">
                {{item.nilai_rp.length > 0 ?
                `Rp. ${parseInt(item.nilai_rp).toLocaleString()}` :
                `$ ${parseInt(item.nilai_usd).toLocaleString()}`}}
            </div>
            <div class="body-1">{{item.sektor_id}}</div>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <!-- <v-btn rounded outlined>Detail</v-btn> -->
        </v-card-actions>
    </v-card>
</div>
</template>

<script>
export default {
    props:{
        item: null
    }
}
</script>

<style>

</style>
