<template>
  <div class="loginIn">
      <el-tabs v-model="activeName2" type="card">
        <el-tab-pane :label="lang[index].signIn" name="first">
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group id="exampleInputGroup2"
                            :label="lang[index].name"
                            label-for="exampleInput2">
                <b-form-input id="exampleInput2"
                              type="text"
                              v-model="form.name"
                              required
                              @keydown="inputingName"
                              :placeholder="lang[index].pleaseInputName">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            :label="lang[index].password"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput1"
                              type="password"
                              v-model="form.password"
                              required
                              :placeholder="lang[index].pleaseInputPassword">
                </b-form-input>
              </b-form-group>

              <b-form-group id="exampleGroup4">
              </b-form-group>
              <b-form-checkbox value="me">{{lang[index].remeberMe}}</b-form-checkbox>
              <b-button id="loginButton" type="submit" variant="primary">{{lang[index].signIn}}</b-button>
            </b-form>
        </el-tab-pane>
        <el-tab-pane :label="lang2[index].signUp" name="second">
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group id="exampleInputGroup3"
                            :label="lang2[index].name"
                            label-for="exampleInput2">
                <b-form-input id="exampleInput3"
                              type="text"
                              v-model="form.signUpname"
                              required
                              :placeholder="lang2[index].name">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup4"
                            :label="lang2[index].password"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput4"
                              v-model="form.signUpPassword"
                              required
                              type="password"
                              :placeholder="lang2[index].password">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup5"
                            :label="lang2[index].passwordAgain"
                            label-for="exampleInput2"
                            description="">
                <b-form-input id="exampleInput5"
                              v-model="form.signUpPasswordAgain"
                              required
                              type="password"
                              :placeholder="lang2[index].passwordAgain">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleGroup5">
              </b-form-group>
              <b-button id="loginButton1" type="submit" variant="primary">{{lang2[index].signUp}}</b-button>
            </b-form>
        </el-tab-pane>
      </el-tabs>
  </div>
</template>

<script>
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.component('b-form', BootstrapVue.bForm)
export default {
  data () {
    return {
      checkNameMessage: [{error: '名字格式不对'}, {error: 'name error'}],
      checkPasswordMessage: [{error: '密码格式不对'}, {error: 'password error'}],
      lang: [{signIn: '登录', name: '你的名字: ', pleaseInputName: '请输入名字', password: '密码', pleaseInputPassword: '请输入密码', remeberMe: '自动登录'},
        {signIn: 'Sign In', name: 'Your Name: ', pleaseInputName: 'Please Input Name', password: 'password', pleaseInputPassword: 'Please Input Password', remeberMe: 'Remeber Me'}],
      lang2: [{signUp: '注册', name: '你的名字: ', password: '密码: ', passwordAgain: '确认密码'},
        {signUp: 'Sign Up', name: 'Your Name: ', password: 'Password: ', passwordAgain: 'Password Again'}],
      form: {
        password: '',
        name: '',
        signUpname: '',
        signUpPassword: '',
        signUpPasswordAgain: ''
      },
      show: true,
      activeName2: 'first'
    }
  },
  methods: {
    inputingName () {
      console.log(this.form.name)
    },
    onSubmit () {
      var flagName = this.checkName(this.form.name)
      var flagPassword = this.checkPassword(this.form.password)
      if (!flagName) {
        this.$message.error(this.checkNameMessage[this.$store.state.language].error)
        this.form.name = ''
        return
      }
      if (!flagPassword) {
        this.$message.error(this.checkPasswordMessage[this.$store.state.language].error)
        this.form.password = ''
        return
      }
      const axios = require('axios')
      axios.post('/server/php/login.php', {
        name: this.form.name,
        password: this.form.password
      })
        .then(function (response) {
          console.log(response)
        })
        .then(function (error) {
          console.log(error)
        })
    },
    onReset (evt) {
      evt.preventDefault()
      /* Reset our form values */
      this.form.password = ''
      this.form.name = ''
      /* Trick to reset/clear native browser form validation state */
      this.show = false
      this.$nextTick(() => { this.show = true })
    },
    checkName: function (str) {
      var patrn = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/
      if (!patrn.exec(str)) {
        return false
      }
      return true
    },
    checkPassword: function (str) {
      var patrn = /^(?![a-zA-z]+$)(?!\d+$)(?![!@#$%^&*]+$)[a-zA-Z\d!@#$%^&*]+$/
      if (!patrn.exec(str)) {
        return false
      }
      return true
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
.loginIn{
    width: 100%;
    height: 84%;
    z-index: -1;
    display: flex;
    align-items: center;
    justify-content: center;
}
#loginButton{
  display: block;
  margin-top: 5%;
}
</style>
