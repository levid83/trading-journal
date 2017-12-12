<template>
    <trade-list></trade-list>
</template>

<script>
  import tradeStoreModule from './store/trade.js'
  import TradeList from '../components/trade/TradeList.vue'

  export default {
    name      : 'trades-page',
    beforeRouteUpdate  (to, from, next) {
      //get the view's data from the backend API
      axios.get(`/admin${to.path}`)
           .then(response =>
           {
             console.log('beforeRouteUpdate ')
             console.log(response)
             next()
           })
           .catch(error => console.log(error))
    },
    created(){
      console.log('created')
      this.$store.registerModule('trades', tradeStoreModule)
    },
    components: {
      'trade-list': TradeList
    }
  }
</script>