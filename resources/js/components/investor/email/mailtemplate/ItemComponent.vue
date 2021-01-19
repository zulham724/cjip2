<template>
  <div>
      <v-list-item v-if="item">
          <v-list-item-title> {{item.title}}</v-list-item-title>
          <v-list-item-subtitle>{{item.subject}}</v-list-item-subtitle>
      </v-list-item>
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
