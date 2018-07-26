<template>
    <div class="comHead" v-bind:side=nowSide>
        <div class="head_more" v-on:click="goBack">
            <span :class=left_icon></span>
        </div>
        <div class="head_title">
            <div>{{middle_title}}</div>
        </div>
        <div class="head_add" v-on:click="changeHead">
            <router-link tag="span" to="/addTopic" :class=right_icon></router-link>
        </div>
    </div>
</template>

<script>
export default{
  data () {
    return {
      title: 'math questions bank',
      isAdd: 1,
      nowPage: 0
    }
  },
  props: [
    'left_icon', 'middle_title', 'right_icon', 'nowSide'
  ],
  methods: {
    changeHead: function () {
      if (this.$store.state.nowPage === 0) {
        this.$router.push('/addTopic')
        this.$store.commit('change', 1)
      } else if (this.$store.state.nowPage === 1) {
        this.$router.push('/classify')
        this.$store.commit('change', 2)
      } else if (this.$store.state.nowPage === 2) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
      }
    },
    goBack: function () {
      if (this.$store.state.nowPage === 1) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
      } else if (this.$store.state.nowPage === 2) {
        this.$router.push('/addTopic')
        this.$store.commit('change', 1)
      } else if (this.$store.state.nowPage === 3) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
      } else if (this.$store.state.nowPage === 4) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
        this.$store.commit('changeShow')
      } else if (this.$store.state.nowPage === 0) {
        this.$store.commit('changeLeftSideShow')
      }
    }
  }
}
</script>

<style scoped>
@import './dis/style.css';
    .comHead{
        margin: 0 0 0 0;
        padding: 0px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-bottom-color: rgb(235,235,235);
    }
    .head_more{
        position: absolute;
        left: 5%;
    }
    .head_title{
        width: 100%;
        text-align: center;
    }
    .head_add{
        position: absolute;
        right: 7%;
    }
    .title1LeftIcon:after{
        content: '返回';
    }
    .title1RightIcon:after{
        content: '保存';
    }
    .title2LeftIcon:after{
        content: '返回';
    }
    .title2RightIcon:after{
        content: '确定';
    }
    .title3LeftIcon:after{
        content: '返回';
    }
</style>
