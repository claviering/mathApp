import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const state = {
  nowPage: 0, // 0:知识页面，1: 添加页面 2: 分类页面 3:知识点页面 4: 登录页面 5: setting页面
  show: false,
  leftSideShow: false, // 控制左边滑块显示
  ShowTabbar: true, // 控制底部显示隐藏
  language: 0, // 控制APP语言,默认是中文，value: 0 英语: value: 1
  userID: -1, // 登录app的用户ID
  userName: '', // 用户名字
  usericourl: '', // 用户头像url
  toRemenberUser: 0, // 是否记住用户登录
  title: '', // 保存用户输入的题目
  point: '', // 保存用户输入的提示
  answer: '', // 保存用户输入的答案
  classifies: [], // 保存选择的分类
  flagAddKnow: false, // 标记是否成功添加知识点
  host: '127.0.0.1', // 服务器地址
  url: {
    bank: 'http://127.0.0.1:80/server/php/bank.php',
    signIn: 'http://127.0.0.1:80/server/php/signIn.php',
    signUp: 'http://127.0.0.1:80/server/php/signUp.php'
  }
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
  },
  changeLanguage (state, newLanguage) {
    state.language = newLanguage
  },
  remenberUser (state) {
    state.toRemenberUser = 1
  },
  setUserID (state, id) {
    state.userID = id
  },
  saveTitle (state, title) {
    state.title = title
  },
  savePoint (state, point) {
    state.point = point
  },
  saveAnswer (state, answer) {
    state.answer = answer
  },
  setClassifies (state, classifies) {
    this.state.classifies = classifies
  },
  changeFlagAddKnow (state, flag) {
    state.flagAddKnow = flag
  },
  logOut (state) {
    state.toRemenberUser = 0
    state.userID = -1
  },
  setusericourl (state, url) {
    state.usericourl = url
  },
  setusername (state, name) {
    state.userName = name
  }
}

export default new Vuex.Store({
  state,
  mutations
})
