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
    saveTopic: function () {
      var userID = this.$store.state.userID
      var title = this.$store.state.title
      var point = this.$store.state.point
      var answer = this.$store.state.answer
      const axios = require('axios')
      axios.post('', {
        id: userID,
        title: title,
        point: point,
        answer: answer
      })
        .then(function (response) {
          if (response.data.state === '3') {
            this.$message.error('添加成功')
          }
        })
        .then(function (error) {
          this.$message.error(error)
        })
    },
    changeHead: function () {
      this.saveTopic()
      let nPage = this.$store.state.nowPage
      if (nPage === 0) {
        this.$router.push('/addTopic')
        this.$store.commit('change', 1)
        this.$store.commit('hideTabbarShow')
      } else if (nPage === 1) {
        this.$router.push('/classify')
        this.$store.commit('change', 2)
      } else if (nPage === 2) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
        this.$store.commit('showTabbar')
      }
    },
    goBack: function () {
      let nPage = this.$store.state.nowPage
      if (nPage === 1) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
        this.$store.commit('showTabbar')
      } else if (nPage === 2) {
        this.$router.push('/addTopic')
        this.$store.commit('change', 1)
      } else if (nPage === 3) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
      } else if (nPage === 4) {
        this.$router.push('/bank')
        this.$store.commit('change', 0)
        this.$store.commit('changeShow')
        this.$store.commit('showTabbar')
      } else if (nPage === 0) {
        this.$store.commit('changeLeftSideShow')
      } else if (nPage === 5) {
        this.$router.go(-1)
        this.$store.commit('change', 0)
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
    .title2RightIcon:after{
        content: '确定';
    }
    .title1LeftIconEn:after{
        content: 'Back';
    }
    .title1RightIconEn:after{
        content: 'Save';
    }
    .title2RightIconEn:after{
        content: 'Submit';
    }
</style>
