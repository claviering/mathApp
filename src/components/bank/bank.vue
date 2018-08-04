<!-- 题库组件 -->
<template>
    <div class="bank">
        <el-collapse v-model="activeNames" @change="handleChange">
          <el-collapse-item :title="lang[index].point" name="1">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="2">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="3">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="4">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="5">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="6">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item :title="lang[index].point" name="7">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
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
      items: {
        one: '知识点一',
        two: '知识点二',
        three: '知识点三'
      },
      activeNames: 'active'
    }
  },
  methods: {
    changeToliHead: function () {
      this.$store.commit('change', 3)
      this.$router.push('/detail')
    },
    addKnow: function () {
      this.$router.push('/addKnow')
    },
    handleChange: function () {
      console.log('11')
    }
  },
  computed: {
    index: function () {
      return this.$store.state.language
    }
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
