<template>
   <div class="setting">
      <div class="settingBox1">
          <el-button>{{LanguageObjArray[index].notif}}</el-button>
            <el-select v-model="value" :placeholder="LanguageObjArray[index].placeHolderText" @change="selected">
                <el-option
                  v-for="item in options"
                  :key="item.value"
                  :label="item.label"
                  :value="item.value">
                </el-option>
          </el-select>
      </div>
      <div class="settingBox2">
          <el-button>{{LanguageObjArray[index].about}}</el-button>
          <el-button style="margin-left: 0px">{{LanguageObjArray[index].switchAccount}}</el-button>
          <el-button style="margin-left: 0px">{{LanguageObjArray[index].logOut}}</el-button>
      </div>
   </div>
</template>

<script>
export default{
  data () {
    return {
      index: 0,
      LanguageObjArray: [
        {notif: '通知', placeHolderText: '语言', about: '关于', switchAccount: '切换用户', logOut: '退出登录'},
        {notif: 'Notifications', placeHolderText: 'Language', about: 'About', switchAccount: 'Switch Account', logOut: 'Log Out'}
      ],
      options: [{
        value: '0',
        label: '中文'
      }, {
        value: '1',
        label: 'English'
      }],
      value: ''
    }
  },
  methods: {
    selected: function (value) {
      this.$store.commit('changeLanguage', value)
      this.index = value
    }
  }
}
</script>

<style scopd>
.setting{
    width: 100%;
    height: 92%;
    position: absolute;
    bottom: 0px;
    left: 0px;
    background-color: rgb(235, 235, 235);
    z-index: 51;
    margin: 0;
}
.setting .el-button{
    outline:none;
    width: 100%;
    margin-top: 1px;
    margin-left: 0px;
    text-align: left;
    border: 0px;
}
.el-select{
    width: 100%;
    margin: 1px 0 0 0;
    text-align: left;
    border: 0px;
}
.el-select input::-webkit-input-placeholder{
    color: black;
}
.settingBox1{
  margin-top: 10%;
}
.settingBox2{
  margin-top: 10%;
}
</style>
