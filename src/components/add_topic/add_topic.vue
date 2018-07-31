<template>
    <div class="addTopic">
        <div class="ques">
            <div class="quesText">题目</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 5, maxRows: 8}"
              placeholder="请输入题目"
              v-model="textarea1">
            </el-input>
        </div>
        <div class="point">
            <div class="pointText">解题思路/提示</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 5, maxRows: 8}"
              placeholder="请输入思路，提示"
              v-model="textarea2">
            </el-input>
        </div>
        <div class="point">
            <div class="pointText">答案</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 4, maxRows: 6}"
              placeholder="请输入答案"
              v-model="textarea3">
            </el-input>
        </div>
    </div>
</template>

<script>
export default{
  data () {
    return {
      textarea1: '',
      textarea2: '',
      textarea3: ''
    }
  }
}

</script>

<style scoped>
.addTopic{
    height: 84%;
    width: 90%;
    margin-left: 5%;
    margin-right: 5%;
}
.ques{
    width: 100%;
    height: 35%;
}
.quesText{
    width: 100%;
    height: 30%;
    font-weight: 900;
    font-size: 2em;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 3%;
}
.point{
    width: 100%;
    height: 30%;
    margin-top: 5%;
}
.pointText{
    width: 100%;
    height: 20%;
    font-weight: 900;
    font-size: 1.5em;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 6%;
}
</style>
