<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>
                <v-icon>email</v-icon>
                Mailing
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn text @click="saveDesign">Campaign</v-btn>
            <v-btn text @click="exportHtml">Templates</v-btn>
        </v-app-bar>
        <v-container fluid>
            <v-row>
                <EmailEditor style="width:100%;min-height:80vh" ref="editor" v-on:load="editorLoaded" />
            </v-row>
        </v-container>
    </div>
</template>

<script>
import sample from './../../components/investor/email/Sample.json'
export default {
    methods: {
      editorLoaded() {
        this.$refs.editor.loadDesign(sample);
      },
      saveDesign() {
        this.$refs.editor.saveDesign(
          (design) => {
            console.log('saveDesign', design);
          }
        )
      },
      exportHtml() {
        this.$refs.editor.exportHtml(
          (data) => {
            console.log('exportHtml', data);
          }
        )
      }
    }
};
</script>

<style></style>
