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
                    <v-spacer></v-spacer>
                    <v-btn text @click="exportHtml()" :loading="loading" :disabled="loading">Submit</v-btn>
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col cols="12">
                            <v-form lazy-validation ref="form">
                                <v-row>
                                    <v-text-field
                                        v-model="form.title"
                                        label="title"
                                    ></v-text-field>
                                </v-row>
                                <v-row>
                                    <v-text-field
                                        v-model="form.subject"
                                        label="subject"
                                    ></v-text-field>
                                </v-row>
                                <v-row>
                                    <EmailEditor
                                        style="width:100%;min-height:80vh"
                                        ref="editor"
                                        v-on:load="editorLoaded"
                                    />
                                </v-row>
                            </v-form>
                        </v-col>
                        <v-col cols="12">
                            <div id="review" v-show="false"></div>
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
    data() {
        return {
            dialog: false,
            form: {},
            loading: false
        };
    },
    mounted(){

    },
    methods: {
        store() {},
        editorLoaded() {
            this.$refs.editor.loadDesign(sample);
        },
        saveDesign() {
            this.$refs.editor.saveDesign(design => {
                console.log("saveDesign", design);
            });
        },
        exportHtml() {
            this.loading = true
            this.$refs.editor.exportHtml(data => {
                // console.log("exportHtml", data);
                // $('#review').html(data.html)
                // html2canvas(document.getElementById('review')).then(function(canvas) {
                //     // document.getElementById('review').appendChild(canvas);
                //     // console.log(document.getElementById('review'),canvas)
                // });
                const access = {
                    title: this.form.title,
                    subject: this.form.subject,
                    body: data.html
                };
                this.$store.dispatch("MailTemplate/store",access).then(res => {}).finally(()=>this.loading = this.dialog = false);
            });
        }
    }
};
</script>

<style></style>
