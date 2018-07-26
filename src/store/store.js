import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  nowPage: 0,
  show: false,
  leftSideShow: false
}

const mutations = {
  change (state, num) {
    state.nowPage = num
  },
  changeShow (state) {
    state.show = !state.show
  },
  changeLeftSideShow (state) {
    state.leftSideShow = !state.leftSideShow
  }
}

export default new Vuex.Store({
  state,
  mutations
})
