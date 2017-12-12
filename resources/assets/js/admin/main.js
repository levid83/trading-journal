import CONFIG from './config.js'
window.axios = require('axios')
import Vue from 'vue'
import VueRouter from 'vue-router'
window.store = require('./store/store.js')
import router from './router/router.js'

import BootstrapVue from 'bootstrap-vue';
import ToggleButton from 'vue-js-toggle-button'

axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest'
}

Vue.use(VueRouter)

Vue.use(ToggleButton)
Vue.use(BootstrapVue);

var vm = new Vue({
  store,
  router,
})
vm.$mount('#app');
