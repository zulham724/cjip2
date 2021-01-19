<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>
                <v-icon>list</v-icon>
                Mail Template
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
                        Template
                    </div>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-data-table
                        :headers="headers"
                        :items="MailTemplate.items"
                        sort-by="calories"
                        class="elevation-1"
                    >
                        <template v-slot:item.title="{ item }">
                            <div>
                                <div class="body1">{{ item.title }}</div>
                                <div class="caption grey--text">
                                    {{ item.subject }}
                                </div>
                                <div class="caption">
                                    Created at
                                    {{ item.created_at | moment("LLLL") }}
                                </div>
                            </div>
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <edit :item="item"></edit>
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
import { mapState } from "vuex";
import Swal from "sweetalert2";
export default {
    components: {
        Create: () =>
            import("./../../../components/investor/email/mailtemplate/CreateComponent.vue"),
        Edit: () =>
            import("./../../../components/investor/email/mailtemplate/EditComponent.vue")
    },
    data: () => ({
        dialog: false,
        headers: [
            {
                align: "start",
                value: "title"
            },
            {
                value: "actions"
            }
        ],
        dialog: {
            display: false
        }
    }),

    computed: {
        ...mapState(["MailTemplate"])
    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.$store.dispatch("MailTemplate/index");
        },

        show() {},

        edit() {},

        destroy(item) {
            Swal.fire({
                title: "Delete this?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: login => {
                    return this.$store
                        .dispatch("MailTemplate/destroy", item.id)
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
        },

        store() {}
    }
};
</script>

<style></style>
