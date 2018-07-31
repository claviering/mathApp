<template>
    <div id="tabbar">
        <router-link to="/bank" tag="div" class="box">
            <div>{{my_bank}}</div>
        </router-link>
        <router-link to="/addKnow" tag="div" class="box">
            <div>{{mind_map}}</div>
        </router-link>
        <router-link to="/develop" tag="div" class="box">
            <div>{{develop}}</div>
        </router-link>
    </div>
</template>

<script>
export default{
  data () {
    return {
      my_bank: '我的题库',
      mind_map: '思维导图',
      develop: '社交圈'
    }
  }
}
</script>

<style scoped>
    #tabbar{
        width: 100%;
        height: 8%;
        background-color: #fff;
        position: fixed;
        bottom: 0px;
        left: 0px;
        z-index: 50;
        display: flex;
        align-items: center;
    }
    .box{
        float: left;
        height: 100%;
        width: 33%;
        color: #000;
        font-size: 1em;
        display: flex;
        align-items: center;
        justify-content: center;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(235,235,235);
    }
    .box:first-child{
        width: 34%;
    }
    .router-link-active{
        color: green;
    }
</style>
