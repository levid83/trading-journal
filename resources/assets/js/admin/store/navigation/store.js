import 'es6-promise/auto'
import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations.js'
Vue.use(Vuex)

//=======vuex store start===========
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
    },
    cal_events: [{
      id   : 0,
      title: 'Office',
      start: '2017-04-30',
      end  : '2017-04-30'
    }, {
      id   : 1,
      title: 'Holidays',
      start: '2017-04-01',
      end  : '2017-04-01'
    }]
  },
  mutations: mutations
})
//=======vuex store end===========
export default store
