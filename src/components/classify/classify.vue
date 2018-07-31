<template>
   <div class="classify">
      <el-checkbox-group v-model="checkList">
        <el-checkbox label="分类1"></el-checkbox>
        <el-checkbox label="分类2"></el-checkbox>
        <el-checkbox label="分类3"></el-checkbox>
        <el-checkbox label="分类4"></el-checkbox>
        <el-checkbox label="分类5"></el-checkbox>
        <el-checkbox label="分类6"></el-checkbox>
        <el-checkbox label="分类7"></el-checkbox>
        <el-checkbox label="分类8"></el-checkbox>
      </el-checkbox-group>
   </div>
</template>

<script>
export default{
  data () {
    return {
      checkList: ['分类1']
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
