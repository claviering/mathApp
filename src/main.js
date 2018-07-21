// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import VueRouter from 'vue-router'
import bank from './components/bank/bank.vue'
import addTopic from './components/add_topic/add_topic.vue'
import classify from './components/classify/classify.vue'
import detail from './components/detail/detail.vue'
import './site.css'
Vue.use(VueRouter)

Vue.config.productionTip = false

var router1 = new VueRouter({
  routes: [
    {path: '', redirect: '/bank'},
    {path: '/bank', component: bank},
    {path: '/addTopic', component: addTopic},
    {path: '/classify', component: classify},
    {path: '/detail', component: detail}
  ]
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: { App },
  template: '<App/>',
  router: router1
})
