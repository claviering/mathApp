<template>
  <div class="apphead">
    <commonHead :left_icon="left_icon" :middle_title="middle_title" :right_icon="right_icon" :nowSide="side[0]" v-if="side[0] == Hindex"></commonHead>
    <commonHead :left_icon="title1LeftIcon" :middle_title='title1' :right_icon="title1RightIcon" :nowSide="side[1]" v-if="side[1] == Hindex"></commonHead>
    <commonHead :left_icon="title2LeftIcon" :middle_title='title2' :right_icon="title2RightIcon" :nowSide="side[2]" v-if="side[2] == Hindex"></commonHead>
    <commonHead :left_icon="title3LeftIcon" :middle_title='title3' :right_icon="title3RightIcon" :nowSide="side[3]" v-if="side[3] == Hindex"></commonHead>
  </div>
</template>

<script>

import commonHead from './../commonHead/commonHead.vue'

export default {
  data () {
    return {
      side: ['0', '1', '2', '3', '4', '5'],
      left_icon: 'icon-more',
      middle_title: '首页',
      right_icon: 'icon-add',
      title1LeftIcon: 'title1LeftIcon',
      title1: '添加题目',
      title1RightIcon: 'title1RightIcon',
      title2LeftIcon: 'title2LeftIcon',
      title2: '归类于',
      title2RightIcon: 'title2RightIcon',
      title3LeftIcon: 'title3LeftIcon',
      title3: '知识点',
      title3RightIcon: 'icon-more'
    }
  },
  components: {
    'commonHead': commonHead
  },
  computed: {
    Hindex: function () {
      return this.$store.state.nowPage
    }
  }
}
</script>

<style>
    .apphead{
        width: 100%;
        height: 8%;
    }
</style>
