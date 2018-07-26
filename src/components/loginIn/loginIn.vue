<template>
  <div class="loginIn">
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
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
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
      show: true
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
</style>
