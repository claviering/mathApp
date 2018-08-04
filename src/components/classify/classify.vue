<template>
   <div class="classify">
      <el-checkbox-group v-model="checkList">
        <el-checkbox :label="lang[index].classify1"></el-checkbox>
        <el-checkbox :label="lang[index].classify2"></el-checkbox>
        <el-checkbox :label="lang[index].classify3"></el-checkbox>
        <el-checkbox :label="lang[index].classify4"></el-checkbox>
        <el-checkbox :label="lang[index].classify5"></el-checkbox>
        <el-checkbox :label="lang[index].classify6"></el-checkbox>
        <el-checkbox :label="lang[index].classify7"></el-checkbox>
        <el-checkbox :label="lang[index].classify8"></el-checkbox>
      </el-checkbox-group>
   </div>
</template>

<script>
export default{
  data () {
    return {
      lang: [{classify1: '分类1', classify2: '分类2', classify3: '分类3', classify4: '分类4', classify5: '分类5', classify6: '分类6', classify7: '分类7', classify8: '分类8'},
        {classify1: 'classify', classify2: 'classify', classify3: 'classify', classify4: 'classify', classify5: 'classify', classify6: 'classify', classify7: 'classify', classify8: 'classify'}],
      checkList: ['分类1']
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
.classify{
    width: 80%;
    height: 84%;
    padding-left: 10%;
    display: flex;
    flex-wrap: wrap;
}
.el-checkbox-group{
    padding-top: 20%;
}
.el-checkbox{
    margin-left: 12%;
}
</style>
