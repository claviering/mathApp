<template>
    <div id="tabbar" v-on:click="clickTabbar">
        <router-link to="/bank" tag="div" class="box">
            <span class="el-icon-document"></span>
            <div>{{lang[index].my_bank}}</div>
        </router-link>
        <router-link to="/addKnow" tag="div" class="box">
            <span class="el-icon-edit"></span>
            <div>{{lang[index].mind_map}}</div>
        </router-link>
        <router-link to="/develop" tag="div" class="box">
            <span class="el-icon-search"></span>
            <div>{{lang[index].develop}}</div>
        </router-link>
    </div>
</template>

<script>
export default{
  data () {
    return {
      lang: [{my_bank: '我的题库', mind_map: '思维导图', develop: '社交'},
        {my_bank: 'My Bank', mind_map: 'Mind Map', develop: 'Discover'}],
      my_bank: '我的题库',
      mind_map: '思维导图',
      develop: '社交'
    }
  },
  methods: {
    clickTabbar: function () {
      if (this.$store.state.leftSideShow) {
        this.$store.commit('changeLeftSideShow')
      }
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
