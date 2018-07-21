<template>
  <div id="app">
    <apphead></apphead>
    <router-view></router-view>
    <tabbar></tabbar>
  </div>
</template>

<script>

import tabbar from './components/tabbar/tabbar.vue'
import apphead from './components/apphead/apphead.vue'

export default {
  name: 'App',
  data () {
    return {
    }
  },
  components: {
    'tabbar': tabbar,
    'apphead': apphead
  }
}
</script>

<style>
#app {
  width: 100%;
  height: 100%;
}
</style>
