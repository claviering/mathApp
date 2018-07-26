<template>
  <div id="app">
    <apphead></apphead>
    <leftSideBox></leftSideBox>
    <router-view></router-view>
    <tabbar></tabbar>
  </div>
</template>

<script>

import tabbar from './components/tabbar/tabbar.vue'
import apphead from './components/apphead/apphead.vue'
import leftSideBox from './components/leftSideBox/leftSideBox.vue'

export default {
  name: 'App',
  data () {
    return {
    }
  },
  components: {
    'tabbar': tabbar,
    'apphead': apphead,
    'leftSideBox': leftSideBox
  }
}
</script>

<style>
#app {
  width: 100%;
  height: 100%;
}
</style>
