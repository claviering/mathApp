<template>
  <div id="app">
    <apphead></apphead>
    <leftSideBox></leftSideBox>
    <router-view></router-view>
    <tabbar v-show="showTabbar"></tabbar>
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
      animate: ''
    }
  },
  components: {
    'tabbar': tabbar,
    'apphead': apphead,
    'leftSideBox': leftSideBox
  },
  computed: {
    showTabbar: function () {
      return this.$store.state.ShowTabbar
    }
  }
}
</script>

<style>
#app {
  width: 100%;
  height: 100%;
}
</style>
