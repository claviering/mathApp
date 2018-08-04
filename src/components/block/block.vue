<!-- 空白组件，用来填充左边弹出框 -->
<template>
    <div class="block" v-if="showBlock" v-on:click="clickBlock"></div>
</template>

<script>
export default{
  computed: {
    showBlock: function () {
      return this.$store.state.leftSideShow
    }
  },
  methods: {
    clickBlock: function () {
      this.$store.commit('changeLeftSideShow')
    }
  }
}
</script>

<style scoped>
.block{
    width: 60%;
    height: 92%;
    position: absolute;
    right: 0;
    top: 0;
    background-color: rgba(255,255,255,255,0);
    z-index: 52;
}
</style>
