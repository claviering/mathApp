<template>
    <transition name="goRight">
        <div class="leftSideBox" v-show="leftSideShow">
            <div class="leftSideImg">
                <img src="../../../static/img/th.jpg">
            </div>
            <div class="leftSideInfo">
               <p v-on:click="loginIn">{{lang[index].login}}</p>
            </div>
            <div class="leftSetting" v-on:click="goSetting">
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
    text-align: center;
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
.leftSideInfo p{
    color: white;
    margin-top: 0px;
    margin-bottom: 0px;
}
.leftSetting{
  position: relative;
  bottom: -60%;
  display: flex;
  justify-content: center;
}
.leftSetting > p{
  margin: 0px;
    color: white;
    margin-top: 0px;
    margin-bottom: 0px;
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
