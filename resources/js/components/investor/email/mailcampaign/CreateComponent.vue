<template>
    <div>
        <v-dialog v-model="dialog" width="80vw">
            <template v-slot:activator="{ on }">
                <v-btn text v-on="on">
                    Create
                </v-btn>
            </template>

            <v-card>
                <v-card-title primary-title>
                    Form
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-form lazy-validation ref="form">
                                <v-row>
                                    <v-text-field
                                        prepend-icon="event"
                                        :rules="[v => !!v || 'Required']"
                                        v-model="form.title"
                                        label="Title"
                                    ></v-text-field>
                                </v-row>
                                <v-row>
                                    <v-autocomplete
                                        prepend-icon="event"
                                        label="Choose Template"
                                        :items="MailTemplate.items"
                                        v-model="form.templates"
                                        multiple
                                        return-object
                                        item-text="title"
                                        item-value="id"
                                    >
                                    </v-autocomplete>
                                </v-row>
                                <v-row>
                                    <v-menu
                                        ref="menu"
                                        v-model="menu"
                                        :close-on-content-click="false"
                                        :return-value.sync="form.run_at"
                                        transition="scale-transition"
                                        offset-y
                                        min-width="290px"
                                    >
                                        <template v-slot:activator="{ on }">
                                            <v-text-field
                                                :rules="[
                                                    v => !!v || 'Required'
                                                ]"
                                                v-model="form.run_at"
                                                label="Run at"
                                                prepend-icon="event"
                                                readonly
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="form.run_at"
                                            no-title
                                            scrollable
                                        >
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="menu = false"
                                                >Cancel</v-btn
                                            >
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="
                                                    $refs.menu.save(form.run_at)
                                                "
                                                >OK</v-btn
                                            >
                                        </v-date-picker>
                                    </v-menu>
                                </v-row>
                                <v-row align="center" justify="center">
                                    <v-autocomplete
                                        :rules="[v => !!v || 'Required']"
                                        v-model="form.investor_recipients"
                                        :items="UserInvestor.items"
                                        chips
                                        prepend-icon="email"
                                        item-text="email"
                                        item-value="id"
                                        return-object
                                        small-chips
                                        label="Send to"
                                        multiple
                                    >
                                    </v-autocomplete>
                                    <v-btn text dense @click="sendToAll()"
                                        >Send to all</v-btn
                                    >
                                </v-row>
                            </v-form>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="store" :loading="loading" :disabled="loading">
                        submit
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    data() {
        return {
            dialog: false,
            menu: false,
            form: {},
            loading: false
        };
    },
    components: {
        Item: () => import("./../mailtemplate/ItemComponent.vue")
    },
    computed: {
        ...mapState(["UserInvestor", "SettingModule", "MailTemplate"])
    },
    created() {
        this.initialize();
    },
    methods: {
        initialize() {
            this.$store.dispatch("UserInvestor/index");
            this.$store.dispatch("MailTemplate/index");
        },
        store() {
            console.log(this.form);
            if (this.$refs.form.validate()) {
                this.loading = true
                this.$store
                    .dispatch("MailCampaign/store", this.form)
                    .then(res => {}).finally(()=>this.loading = this.dialog = false);
            }
        },
        sendToAll() {
            this.form.investor_recipients = this.UserInvestor.items;
            this.$forceUpdate();
        }
    }
};
</script>

<style></style>
