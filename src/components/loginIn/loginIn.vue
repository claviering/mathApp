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
                              :placeholder="lang[index].pleaseInputName">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            :label="lang[index].password"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput1"
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
              <b-form-group id="exampleInputGroup2"
                            :label="lang2[index].name"
                            label-for="exampleInput2">
                <b-form-input id="exampleInput2"
                              type="text"
                              v-model="form.name"
                              required
                              :placeholder="lang2[index].name">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            :label="lang2[index].password"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput1"
                              v-model="form.password"
                              required
                              :placeholder="lang2[index].password">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            :label="lang2[index].passwordAgain"
                            label-for="exampleInput2"
                            description="">
                <b-form-input id="exampleInput2"
                              v-model="form.password"
                              required
                              :placeholder="lang2[index].passwordAgain">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleGroup4">
              </b-form-group>
              <b-button id="loginButton" type="submit" variant="primary">{{lang2[index].signUp}}</b-button>
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
      lang: [{signIn: '登录', name: '你的名字: ', pleaseInputName: '请输入名字', password: '密码', pleaseInputPassword: '请输入密码', remeberMe: '自动登录'},
        {signIn: 'Sign In', name: 'Your Name: ', pleaseInputName: 'Please Input Name', password: 'password', pleaseInputPassword: 'Please Input Password', remeberMe: 'Remeber Me'}],
      lang2: [{signUp: '注册', name: '你的名字: ', password: '密码: ', passwordAgain: '确认密码'},
        {signUp: 'Sign Up', name: 'Your Name: ', password: 'Password: ', passwordAgain: 'Password Again'}],
      form: {
        password: '',
        name: ''
      },
      show: true,
      activeName2: 'first'
    }
  },
  methods: {
    onSubmit () {
      console.log(this.form)
    },
    onReset (evt) {
      evt.preventDefault()
      /* Reset our form values */
      this.form.password = ''
      this.form.name = ''
      /* Trick to reset/clear native browser form validation state */
      this.show = false
      this.$nextTick(() => { this.show = true })
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
