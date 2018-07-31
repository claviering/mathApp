import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  nowPage: 0, // 0:知识页面，1: 添加页面 2: 分类页面 3:知识点页面 4: 登录页面
  show: false,
  leftSideShow: false, // 控制左边滑块显示
  ShowTabbar: true // 控制底部显示隐藏
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
  },
  hideTabbarShow (state) {
    state.ShowTabbar = false
  },
  showTabbar (state) {
    state.ShowTabbar = true
  }
}

export default new Vuex.Store({
  state,
  mutations
})
