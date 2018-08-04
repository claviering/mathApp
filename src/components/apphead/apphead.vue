<!-- 头部组件 -->
<template>
  <div class="apphead">
    <commonHead :left_icon="left_icon" :middle_title="lang[index].title0" :right_icon="right_icon" v-if="side[0] == Hindex"></commonHead>
    <commonHead :left_icon="langBack[index].back" :middle_title='lang[index].title1' :right_icon="langSave[index].save" v-if="side[1] == Hindex"></commonHead>
    <commonHead :left_icon="langBack[index].back" :middle_title='lang[index].title2' :right_icon="langSubmit[index].submit" v-if="side[2] == Hindex"></commonHead>
    <commonHead :left_icon="langBack[index].back" :middle_title='lang[index].title3' :right_icon="title3RightIcon" v-if="side[3] == Hindex"></commonHead>
    <commonHead :left_icon="langBack[index].back" :middle_title='lang[index].title4' :right_icon="title4RightIcon" v-if="side[4] == Hindex"></commonHead>
    <commonHead :left_icon="langBack[index].back" :middle_title='lang[index].title5' :right_icon="title5RightIcon" v-if="side[5] == Hindex"></commonHead>
  </div>
</template>

<script>

import commonHead from './../commonHead/commonHead.vue'

export default {
  data () {
    return {
      lang: [{title0: '首页', title1: '添加题目', title2: '归类于', title3: '知识点', title4: '登录', title5: '设置'},
        {title0: 'Home Page', title1: 'Add Title', title2: 'Classify', title3: 'Knowledge', title4: 'Login In', title5: 'Setting'}],
      langBack: [{back: 'title1LeftIcon'}, {back: 'title1LeftIconEn'}],
      langSave: [{save: 'title1RightIcon'}, {save: 'title1RightIconEn'}],
      langSubmit: [{submit: 'title2RightIcon'}, {submit: 'title2RightIconEn'}],
      side: ['0', '1', '2', '3', '4', '5'],
      left_icon: 'icon-more',
      middle_title: '首页',
      right_icon: 'icon-add',
      title1LeftIcon: 'title1LeftIcon',
      title1: '添加题目',
      title1RightIcon: 'title1RightIcon',
      title2LeftIcon: 'title1LeftIcon',
      title2: '归类于',
      title2RightIcon: 'title2RightIcon',
      title3LeftIcon: 'title1LeftIcon',
      title3: '知识点',
      title3RightIcon: 'icon-more',
      title4LeftIcon: 'title1LeftIcon',
      title4: '登录',
      title4RightIcon: '',
      title5LeftIcon: 'title1LeftIcon',
      title5: 'setting',
      title5RightIcon: ''
    }
  },
  components: {
    'commonHead': commonHead
  },
  computed: {
    Hindex: function () {
      return this.$store.state.nowPage
    },
    index: function () {
      return this.$store.state.language
    }
  }
}
</script>

<style>
    .apphead{
        width: 100%;
        height: 8%;
        background-color: black;
        color: white;
    }
</style>
