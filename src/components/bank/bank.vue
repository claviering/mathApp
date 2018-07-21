<template>
    <div class="bank">
        <ol class="know_list">
            <li v-on:click="changeToliHead" class="bank_li" v-for="value in items" :key="value.id">{{value}}</li>
        </ol>
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
      }
    }
  },
  methods: {
    changeToliHead: function () {
      this.$store.commit('change', 3)
      this.$router.push('/detail')
    },
    addKnow: function () {
      this.$router.push('/addKnow')
    }
  }
}
</script>

<style scoped>
@import './dis/style.css';
    .bank{
        width: 100%;
        height: 84%;
    }
    .know_list{
        width: 100%;
        font-weight: 900;
        font-size: 2em;
        margin-left: 10%;
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .bank_li{
        line-height: 150%;
    }
    .bank_add{
        width: 10%;
        margin-top: 20px;
        margin-left: 10%;
    }
    .icon-add{
        font-size: 2em;
    }
</style>
