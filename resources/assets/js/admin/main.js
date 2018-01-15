import CONFIG from './config.js'
window.axios = require('axios')
import Vue from 'vue'


axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest'
}
import TradesPage from '../admin/pages/trades/TradesPage.vue'

var vm = new Vue({
  el:'#app',
  data(){
    return {

    }
  },
  components:{
    'trades-page': TradesPage
  }
})
