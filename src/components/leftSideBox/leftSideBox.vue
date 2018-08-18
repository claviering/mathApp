<template>
    <transition name="goRight">
        <div class="leftSideBox" v-show="leftSideShow">
            <div class="leftSideImg">
              <el-upload
                class="avatar-uploader"
                action="/server/php/uploadImg.php"
                :show-file-list="false"
                :on-success="handleAvatarSuccess"
                :before-upload="beforeAvatarUpload">
                <img v-if="imageUrl" :src="imageUrl" class="avatar">
                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
              </el-upload>
            </div>
            <div class="leftSideInfo">
              <span class="icon-login"></span>
              <p v-on:click="loginIn" v-if="!isSignIn">{{lang[index].login}}</p>
              <p v-if="isSignIn">{{username}}</p>
            </div>
            <div class="leftSetting" v-on:click="goSetting">
              <span class="el-icon-setting"></span>
              <p id="setting">{{lang[index].setting}}</p>
            </div>
        </div>
    </transition>
</template>

<script>
export default{
  data () {
    return {
      imageUrl: this.$store.state.usericourl,
      lang: [{login: '登录', setting: '设置'}, {login: 'Log In', setting: 'Setting'}]
    }
  },
  computed: {
    username: function () {
      let userName = localStorage.getItem('userName') || '' // 取出用户名
      return userName
    },
    isSignIn: function () {
      return (this.$store.state.userID > -1)
    },
    leftSideShow: function () {
      return this.$store.state.leftSideShow
    },
    index: function () {
      return this.$store.state.language
    }
  },
  methods: {
    handleAvatarSuccess (res, file) {
      this.imageUrl = URL.createObjectURL(file.raw)
    },
    beforeAvatarUpload (file) {
      const isJPG = file.type === 'image/jpeg'
      const isLt2M = file.size / 1024 / 1024 < 2
      if (!isJPG) {
        this.$message.error('上传头像图片只能是 JPG 格式!')
      }
      if (!isLt2M) {
        this.$message.error('上传头像图片大小不能超过 2MB!')
      }
      return isJPG && isLt2M
    },
    loginIn: function () {
      this.$store.commit('changeLeftSideShow')
      this.$router.push('/loginIn')
      this.$store.commit('hideTabbarShow')
      this.$store.commit('change', 4)
    },
    goSetting: function () {
      this.$store.commit('changeLeftSideShow')
      this.$router.push('/setting')
      this.$store.commit('change', 5)
    }
  }
}
</script>

<style scoped lang="css">
@import 'login/style.css';
.leftSideBox{
    height: 84%;s
    width: 50%;
    background-color: rgba(0,0,0,0.5);
    z-index: 100;
    position: absolute;
}
.leftSideImg{
    padding-left: 10px;
    margin-top: 10px;
    padding-bottom: 10px;
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
.leftSideImg img{
    width: 130px;
    height: 130px;
}
.leftSideInfo{
    border-bottom-width: 1px;
    border-bottom-style: solid;
}
.leftSideInfo .icon-login{
  padding-left: 30px;
}
.leftSideInfo p{
    color: white;
    float: right;
    padding-right: 50px;
    margin-top: 0px;
    margin-bottom: 0px;
}
.leftSetting{
  position: relative;
  bottom: -50%;
}
.leftSetting .el-icon-setting{
  padding-left: 30px;
  color: white;
}
.leftSetting > p{
    margin: 0px;
    color: white;
    margin-top: 0px;
    margin-bottom: 0px;
    float: right;
    padding-right: 50px;
}
.goRight-enter, .goRight-leave-to{
    left: -50%;
}
.goRight-enter-active, .goRight-leave-active{
    transition: left 0.5s;
}
.goRight-enter-to, .goRight-leave{
    left: 0%;
}
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409EFF;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
.el-icon-plus{
  color: white;
}
</style>
