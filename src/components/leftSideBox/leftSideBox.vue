<template>
    <transition name="goRight">
        <div class="leftSideBox" v-show="leftSideShow">
            <div class="leftSideImg">
                <img src="../../../static/img/th.jpg">
            </div>
            <div class="leftSideInfo">
               <p v-on:click="loginIn">登录</p>
            </div>
        </div>
    </transition>
</template>

<script>
export default{
  computed: {
    leftSideShow: function () {
      return this.$store.state.leftSideShow
    }
  },
  methods: {
    loginIn: function () {
      this.$store.commit('changeLeftSideShow')
      this.$router.push('/loginIn')
      this.$store.commit('change', 4)
    }
  }
}
</script>

<style scoped lang="css">
.leftSideBox{
    height: 84%;
    width: 40%;
    background-color: black;
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
    text-decoration: underline;
    color: white;
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
