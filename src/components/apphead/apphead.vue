<template>
  <div class="apphead">
    <commonHead make="00" :left_icon="left_icon" :middle_title="middle_title" :right_icon="right_icon" :nowSide="side[0]" v-on:send="getData" v-bind:tag=nowPage v-if="side[0] == nowPage"></commonHead>
    <commonHead make="11" :left_icon="title2LeftIcon" :middle_title='title2' :right_icon="title2RightIcon" :nowSide="side[1]" v-on:send="getData" v-bind:tag=nowPage v-if="side[1] == nowPage"></commonHead>
    <commonHead make="22" :left_icon="title3LeftIcon" :middle_title='title3' :right_icon="title3RightIcon" :nowSide="side[2]" v-on:send="getData" v-bind:tag=nowPage v-if="side[2] == nowPage"></commonHead>
  </div>
</template>

<script>

import commonHead from './../commonHead/commonHead.vue'

export default {
  data () {
    return {
      nowPage: 0,
      side: ['0', '1', '2', '3', '4', '5'],
      left_icon: 'icon-more',
      middle_title: '首页',
      right_icon: 'icon-add',
      title2LeftIcon: 'title2LeftIcon',
      title2: '添加题目',
      title2RightIcon: 'title2RightIcon',
      title3LeftIcon: 'title3LeftIcon',
      title3: '归类于',
      title3RightIcon: 'title3RightIcon'
    }
  },
  components: {
    'commonHead': commonHead
  },
  methods: {
    getData: function (nowPag) {
      this.nowPage = nowPag
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
