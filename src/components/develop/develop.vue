<template>
    <div class="develop">
        <el-row>
          <el-col :span="19" v-for="o in 3" :key="o" :offset="2">
            <el-card :body-style="{ padding: '0px'}">
              <img src="./../../../static/img/699.png" class="image">
              <div style="padding: 14px;">
                <span>可爱的蕾姆</span>
                <div class="bottom clearfix">
                  <time class="time">{{ currentDate }}</time>
                  <el-button type="text" class="button">点赞</el-button>
                </div>
              </div>
            </el-card>
          </el-col>
        </el-row>
    </div>
</template>

<script>
export default{
  data () {
    return {
      currentDate: new Date().getYear()
    }
  }
}
</script>

<style scoped lang="css">
.develop{
    width: 100%;
    height: 84%;
}
.time {
    font-size: 13px;
    color: #999;
}
.bottom {
    margin-top: 13px;
    line-height: 12px;
}
.button {
    padding: 0;
    float: right;
}
.image {
    width: 100%;
    display: block;
}
.clearfix:before,
.clearfix:after {
  display: table;
  content: "";
}
.clearfix:after {
  clear: both
}
.el-col{
    margin-bottom: 30px;
}
</style>
