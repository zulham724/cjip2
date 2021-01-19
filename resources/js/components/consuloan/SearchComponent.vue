<template>
  <div>
      <v-autocomplete
        v-model="selectedProject"
        :items="projects"
        :loading="isLoading"
        light
        prepend-icon="mdi-magnify"
        color="yellow"
        hide-no-data
        hide-selected
        item-text="project_name"
        item-value="id"
        :placeholder="TranslateModule.contents.write_something"
        return-object
        :search-input.sync="search"
        @input="goToProject()"
    ></v-autocomplete>
  </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    data(){
        return {
            isLoading: false,
            projects: [],
            selectedProject: null,
            search: null
        }
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
    methods:{
        goToProject(){
            this.$router.push(`/project/${this.selectedProject.id}`)
        }
    },
    watch:{
        search (val) {
            // Items have already been requested
            if (this.isLoading) return

            this.isLoading = true

            this.$store.dispatch('ProjectModule/searchProject',val).then(res=>{
                this.projects = res.data
            }).catch(err=>{

            }).finally(()=>{
                this.isLoading = false
            })
        },
    }
}
</script>

<style>

</style>
