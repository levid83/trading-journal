import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state    : {
    left_open : true,
    preloader : true,
    site_name : 'Vuejs-Admin',
    page_title: null,
    user      : {
      name   : 'Levi',
      picture: '',
      job    : 'Trader'
    }
  },
  mutations: {
    left_menu(state, option) {
      if (option == 'open') {
        state.left_open = true
      } else if (option == 'close') {
        state.left_open = false
      } else if (option == 'toggle') {
        state.left_open = !state.left_open
      }
      if (state.left_open) {
        document.getElementsByTagName('body')[0].classList.remove('left-hidden')
      } else {
        document.getElementsByTagName('body')[0].classList.add('left-hidden')
      }
    },
    routeChange(state, loader) {
      if (loader == 'start') {
        state.preloader = true
      } else if (loader == 'end') {
        state.preloader = false
      }
    },
    changePageTitle(state, title) {
      state.page_title = title
      document.title   = title + ' - ' + state.site_name
    }
  },
  modules  : {}
})

export default store