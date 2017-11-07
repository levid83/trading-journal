<template>
    <trade-list></trade-list>
</template>

<script>
  import TradeList from './../components/trade/TradeList.vue'
  export default {
    name: 'trades-page',

    components: {
      'trade-list': TradeList
    }
  }
</script>