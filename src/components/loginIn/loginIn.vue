<template>
  <div class="loginIn">
      <el-tabs v-model="activeName2" type="card">
        <el-tab-pane label="Sign In" name="first">
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group id="exampleInputGroup2"
                            label="Your Name:"
                            label-for="exampleInput2">
                <b-form-input id="exampleInput2"
                              type="text"
                              v-model="form.name"
                              required
                              placeholder="Enter name">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            label="Password:"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput1"
                              v-model="form.password"
                              required
                              placeholder="Enter password">
                </b-form-input>
              </b-form-group>

              <b-form-group id="exampleGroup4">
              </b-form-group>
              <b-form-checkbox value="me">Remeber me</b-form-checkbox>
              <b-button id="loginButton" type="submit" variant="primary">Sign In</b-button>
            </b-form>
        </el-tab-pane>
        <el-tab-pane label="Sign Up" name="second">
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
              <b-form-group id="exampleInputGroup2"
                            label="Your Name:"
                            label-for="exampleInput2">
                <b-form-input id="exampleInput2"
                              type="text"
                              v-model="form.name"
                              required
                              placeholder="Enter name">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            label="Password:"
                            label-for="exampleInput1"
                            description="">
                <b-form-input id="exampleInput1"
                              v-model="form.password"
                              required
                              placeholder="Enter password">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleInputGroup1"
                            label="Password again:"
                            label-for="exampleInput2"
                            description="">
                <b-form-input id="exampleInput2"
                              v-model="form.password"
                              required
                              placeholder="Enter password">
                </b-form-input>
              </b-form-group>
              <b-form-group id="exampleGroup4">
              </b-form-group>
              <b-button id="loginButton" type="submit" variant="primary">Sign Up</b-button>
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
