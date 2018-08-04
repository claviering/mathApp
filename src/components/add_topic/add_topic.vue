<template>
    <div class="addTopic">
        <div class="ques">
            <div class="quesText">{{lang[index].title}}</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 5, maxRows: 8}"
              :placeholder="lang[index].pleaseTitle"
              v-model="textarea1">
            </el-input>
        </div>
        <div class="point">
            <div class="pointText">{{lang[index].point}}</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 5, maxRows: 8}"
              :placeholder="lang[index].pleasePoint"
              v-model="textarea2">
            </el-input>
        </div>
        <div class="point">
            <div class="pointText">{{lang[index].ans}}</div>
            <el-input
              type="textarea"
              :autosize="{ minRows: 4, maxRows: 6}"
              :placeholder="lang[index].pleaseAns"
              v-model="textarea3">
            </el-input>
        </div>
    </div>
</template>

<script>
export default{
  data () {
    return {
      lang: [{title: '题目', point: '解题思路/提示', ans: '答案', pleaseTitle: '请输入题目', pleasePoint: '请输入思路，提示', pleaseAns: '请输入答案'},
        {title: 'Title', point: 'Point', ans: 'answer', pleaseTitle: 'Please Input Title', pleasePoint: 'Please Input Point', pleaseAns: 'Please Input Answer'}],
      textarea1: '',
      textarea2: '',
      textarea3: ''
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
