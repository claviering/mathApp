<template>
    <transition name="goRight">
        <div class="leftSideBox" v-show="leftSideShow">
            <div class="leftSideImg">
                <img src="../../../static/img/th.jpg">
            </div>
            <div class="leftSideInfo">
              <span class="icon-login"></span>
              <p v-on:click="loginIn">{{lang[index].login}}</p>
            </div>
            <div class="leftSetting" v-on:click="goSetting">
              <span class="el-icon-setting"></span>
              <p id="setting">{{lang[index].setting}}</p>
            </div>
        </div>
    </transition>
</template>

<script>
export default{
  data () {
    return {
      lang: [{login: '登录', setting: '设置'}, {login: 'Log In', setting: 'Setting'}]
    }
  },
  computed: {
    leftSideShow: function () {
      return this.$store.state.leftSideShow
    },
    index: function () {
      return this.$store.state.language
    }
  },
  methods: {
    loginIn: function () {
      this.$store.commit('changeLeftSideShow')
      this.$router.push('/loginIn')
      this.$store.commit('hideTabbarShow')
      this.$store.commit('change', 4)
    },
    goSetting: function () {
      this.$store.commit('changeLeftSideShow')
      this.$router.push('/setting')
      this.$store.commit('change', 5)
    }
  }
}
</script>

<style scoped lang="css">
@import 'login/style.css';
.leftSideBox{
    height: 84%;
    width: 40%;
    background-color: rgba(0,0,0,0.5);
    z-index: 100;
    position: absolute;
}
.leftSideImg{
    padding-left: 10px;
    margin-top: 10px;
    padding-bottom: 10px;
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
.leftSideImg img{
    width: 130px;
    height: 130px;
}
.leftSideInfo{
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
.leftSideInfo .icon-login{
  padding-left: 30px;
}
.leftSideInfo p{
    color: white;
    float: right;
    padding-right: 50px;
    margin-top: 0px;
    margin-bottom: 0px;
}
.leftSetting{
  position: relative;
  bottom: -60%;
}
.leftSetting .el-icon-setting{
  padding-left: 30px;
  color: white;
}
.leftSetting > p{
    margin: 0px;
    color: white;
    margin-top: 0px;
    margin-bottom: 0px;
    float: right;
    padding-right: 50px;
}
.goRight-enter, .goRight-leave-to{
    left: -40%;
}
.goRight-enter-active, .goRight-leave-active{
    transition: left 0.5s;
}
.goRight-enter-to, .goRight-leave{
    left: 0%;
}
</style>
