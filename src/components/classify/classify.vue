<!-- 分类界面 -->
<!-- nowPage = 2 -->
<template>
   <div class="classify">
      <el-checkbox-group v-model="checkList[index]" @change="saveClassifies(index)">
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
      lang: [{classify1: '代数', classify2: '几何', classify3: '分析', classify4: '概率', classify5: '离散', classify6: '计算', classify7: '集合', classify8: '微积分'},
        {classify1: 'Algebra', classify2: 'Geometry', classify3: 'Analysis', classify4: 'Probability', classify5: 'Discrete', classify6: 'Calculation', classify7: 'Set', classify8: 'Calculus'}],
      checkList: [[], []] // 返回选中的项
    }
  },
  computed: {
    index: function () {
      return this.$store.state.language
    }
  },
  methods: {
    saveClassifies: function (index) {
      this.$store.commit('setClassifies', this.checkList[index])
    }
  }
}
</script>

<style scoped>
.classify{
    width: 100%;
    height: 84%;
    display: flex;
    justify-content: center;
}
.el-checkbox-group{
    padding-top: 20%;
    width: 80%;
    height: 100%;
    background-color: rgba(235,235,235,0.9);
    display: flex;
    flex-direction: column;
}
.el-checkbox{
  margin-left: 30px;
}
</style>
