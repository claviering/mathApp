<template>
    <div class="addKnow">
      <el-carousel indicator-position="none">
        <el-carousel-item v-for="item in items" :key="item">
            <div :class="item">我是思维导图</div>
        </el-carousel-item>
      </el-carousel>
      <el-carousel indicator-position="none">
        <el-carousel-item v-for="item in items2" :key="item">
            <div :class="item">我是思维导图</div>
        </el-carousel-item>
      </el-carousel>
    </div>
</template>

<script>
export default {
  data () {
    return {
      items: {
        url1: 'a',
        url2: 'b',
        url3: 'c',
        url4: 'd',
        url5: 'e'
      },
      items2: {
        url1: 'e',
        url2: 'd',
        url3: 'c',
        url4: 'b',
        url5: 'a'
      }
    }
  }
}
</script>

<style scoped>
.addKnow{
    width: 100%;
    height: 84%;
}
.el-carousel__item h3 {
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 300px;
    margin: 0;
}
.el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
}
.el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
}
.a{
    width: 100%;
    height: 100%;
    background-image: url(img/1.jpeg);
    background-size: 100%;
}
.b{
    width: 100%;
    height: 100%;
    background-image: url(img/2.jpeg);
    background-size: 100%;
}
.c{
    width: 100%;
    height: 100%;
    background-image: url(img/3.jpeg);
    background-size: 100%;
}
.d{
    width: 100%;
    height: 100%;
    background-image: url(img/4.jpeg);
    background-size: 100%;
}
.e{
    width: 100%;
    height: 100%;
    background-image: url(img/5.jpeg);
    background-size: 100%;
}
</style>
