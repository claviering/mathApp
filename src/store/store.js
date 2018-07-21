import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  nowPage: 0
}

const mutations = {
  change (state, num) {
    state.nowPage = num
  }
}

export default new Vuex.Store({
  state,
  mutations
})
