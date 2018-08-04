<template>
  <div id="app">
    <apphead></apphead>
    <leftSideBox></leftSideBox>
    <block></block>
    <keep-alive>
      <router-view></router-view>
    </keep-alive>
    <tabbar v-show="showTabbar"></tabbar>
  </div>
</template>

<script>

import tabbar from './components/tabbar/tabbar.vue'
import apphead from './components/apphead/apphead.vue'
import leftSideBox from './components/leftSideBox/leftSideBox.vue'
import block from './components/block/block.vue'

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
    'leftSideBox': leftSideBox,
    'block': block
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
