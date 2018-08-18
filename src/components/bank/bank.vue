<!-- 题库组件 -->
<template>
    <div class="bank">
        <el-collapse v-model="activeNames" @change="handleChange" v-for="(value, index) in contents" v-bind:key="index">
          <el-collapse-item :title="value.title" :name="index">
            <el-tag size="mini" type="success" v-for="(classify, index) in value.classify" v-bind:key="index">超小标签</el-tag>
            <div>{{value.point}}</div>
          </el-collapse-item>
        </el-collapse>
        <div class="bank_add" v-on:click="addKnow">
            <span class="icon-add"></span>
        </div>
    </div>
</template>

<script>
export default{
  data () {
    return {
      lang: [{point: '知识点'}, {point: 'Point'}],
      title: '',
      contents: [{'title': '登录/SignIn', 'point': '登录/SignIn'}],
      items: {
        one: '知识点一',
        two: '知识点二',
        three: '知识点三'
      },
      activeNames: 'active'
    }
  },
  watch: {
    '$route': 'updateBank' // 路由有变化的时候执行
  },
  methods: {
    updateBank: function () {
      if (this.$store.state.flagAddKnow) {
        this.getMyBank()
        this.$store.commit('changeFlagAddKnow', false)
      }
    },
    getMyBank: function () {
      var id = localStorage.getItem('token') || this.$store.state.userID
      let vueThis = this
      const axios = require('axios') // 发送请求
      // let host = this.$store.state.host
      let url = '/server/php/bank.php'
      axios.get(url, {
        params: {'id': id}
      })
        .then(function (response) {
          if (response.data.state === '1') {
            vueThis.contents = response.data.content
          }
        })
    },
    changeToliHead: function () {
      this.$store.commit('change', 3)
      this.$router.push('/detail')
    },
    addKnow: function () {
      this.$router.push('/addTopic')
      this.$store.commit('change', 1)
    },
    handleChange: function () {
      console.log('0')
    }
  },
  computed: {
    index: function () {
      return this.$store.state.language
    }
  },
  created: function () {
    this.getMyBank()
  }
}
</script>

<style scoped>
@import './dis/style.css';
.bank{
    width: 90%;
    height: 84%;
    padding-left: 10%;
}
.bank_add{
    width: 10%;
    margin-top: 20px;
    margin-left: 1%;
}
.icon-add{
    font-size: 2em;
    padding-bottom: 60px;
}
.title{
    margin-left: 10%;
}
</style>
