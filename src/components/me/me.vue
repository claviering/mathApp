<template>
    <div class="myCenter">
        <transition name="openLoginIn" mode="out-in">
            <div class="mytext" v-if="!show">
                <h1 v-on:click="login">账号登录</h1>
                <h1>数据统计</h1>
            </div>
            <loginIn v-else></loginIn>
        </transition>
    </div>
</template>

<script>
import loginIn from './../loginIn/loginIn.vue'
export default {
  components: {
    loginIn
  },
  methods: {
    login: function () {
      this.$store.commit('changeShow')
      this.$store.commit('change', 4)
    }
  },
  computed: {
    show: function () {
      return this.$store.state.show
    }
  }
}
</script>

<style scoped lang="css">
.myCenter{
    width: 100%;
    height: 84%;
}
.myCenter h1{
    margin: 0;
    padding-top: 5%;
}
.mytext{
    padding-left: 10%;
}
.openLoginIn-enter-active, .openLoginIn-leave-active{
    transition: opacity 0.5s;
}
.openLoginIn-enter, .openLoginIn-leave-to{
    opacity: 0;
}

</style>
