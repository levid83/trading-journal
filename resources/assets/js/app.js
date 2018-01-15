
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

let Vue = null;
window.Vue = null;

Vue = require('vue');

Vue.config.debug = true
Vue.config.devtools = true

import TradesPage from '../admin/pages/TradesPage.vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
  components: {
    'trades-page': TradesPage
  }
});
