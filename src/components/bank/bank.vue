<template>
    <div class="bank">
        <el-collapse v-model="activeNames" @change="handleChange">
          <el-collapse-item title="知识点1" name="1">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点2" name="2">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点3" name="3">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点4" name="4">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点5" name="5">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点6" name="6">
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
            <div>可以说我是肥宅，但不可以说我是死肥宅</div>
          </el-collapse-item>
          <el-collapse-item title="知识点7" name="7">
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
  }
}
</script>

<style scoped>
@import './dis/style.css';
.bank{
    width: 100%;
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
}
.title{
    margin-left: 10%;
}
</style>
