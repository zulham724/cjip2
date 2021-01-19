<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>
                <v-icon>list</v-icon>
                Mail Campaign
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <create></create>
        </v-app-bar>
        <v-container>
            <v-row>
                <v-col>
                    <div class="caption white--text">Home</div>
                    <div class="body1 white--text">
                        <v-icon>list</v-icon>
                        Campaign
                    </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-data-table
                        :headers="headers"
                        :items="MailCampaign.items"
                        sort-by="calories"
                        class="elevation-1"
                    >
                        <template v-slot:item.title="{item}">
                            <div>
                                <div class="body1">{{item.title}}</div>
                                <div class="body2">{{item.recipient_investors.length}} Recipients</div>
                                <div class="caption">Run at {{item.run_at | moment('LLLL')}}</div>
                            </div>
                        </template>
                        <template v-slot:item.sent="{item}">
                            <div>
                                <div class="body1 primary--text">{{(item.sent/item.recipient_investors.length)*100}}%</div>
                                <v-progress-linear :value="(item.sent/item.recipient_investors.length)*100"></v-progress-linear>
                                <div class="body1">{{item.sent}}/ {{item.recipient_investors.length}}</div>
                                <div class="body1">Sent</div>
                            </div>
                        </template>
                        <template v-slot:item.status="{item}">
                            <div>
                                <div v-if="item.sent < item.recipient_investors.length" class="warning--text body1">Running</div>
                                <div v-else class="success--text body1">Done</div>
                            </div>
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <v-icon small @click="destroy(item)">
                                mdi-delete
                            </v-icon>
                        </template>
                        <template v-slot:no-data>
                            <div class="caption grey--text">Empty</div>
                        </template>
                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import {mapState} from 'vuex'
import moment from 'moment'
import Swal from "sweetalert2";
export default {
    data: () => ({
        dialog: false,
        headers: [
            {
                text: '',
                align: "start",
                value: "title"
            },
            {
                text: '',
                align: "start",
                value: "sent"
            },
            {
                text: '',
                align: "start",
                value: "status"
            },
            {
                text: '',
                align: "start",
                value: "actions"
            },
        ],
    }),

    components:{
        create: ()=> import('./../../../components/investor/email/mailcampaign/CreateComponent')
    },

    computed: {
        ...mapState(['MailCampaign']),
    },

    created() {
        this.initialize()
    },

    methods: {
        moment,
        initialize(){
            this.$store.dispatch('MailCampaign/index')
        },
        edit(){

        },
        destroy(item){
            Swal.fire({
                title: "Delete this?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: login => {
                    return this.$store
                        .dispatch("MailCampaign/destroy", item.id)
                        .then(res => {
                            return res;
                        })
                        .catch(err => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            );
                        });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        title: `Deleted`,
                        icon: "success"
                    });
                }
            });
        }
    }
};
</script>

<style></style>
