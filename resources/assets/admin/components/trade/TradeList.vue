<template>
    <table class="table-bordered table-striped table-condensed small fully-responsive-table" id="fully-responsive-table">
        <thead>
        <tr>
            <th></th>
            <th class="text-nowrap">Id</th>
            <th class="text-nowrap">Trader</th>
            <th class="text-nowrap">Client</th>
            <th class="text-nowrap">Asset</th>
            <th class="text-nowrap">Position</th>
            <th class="text-nowrap">Tactic</th>
            <th class="text-nowrap">Class</th>
            <th class="text-nowrap">Action</th>
            <th class="text-nowrap">Qty.</th>
            <th class="text-nowrap">Expiry</th>
            <th class="text-nowrap">Strike</th>
            <th class="text-nowrap">P/C</th>
            <th class="text-nowrap">Ask</th>
            <th class="text-nowrap">Bid</th>
            <th>Open Comm.</th>
            <th>Close Comm.</th>
            <th class="text-nowrap">P/L</th>
            <th class="text-nowrap">Opened</th>
            <th class="text-nowrap">Closed</th>
            <th class="text-nowrap">Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
    <template v-for="trade in trades" >
        <trade-item :trade="trade"></trade-item>
    </template>
        </tbody>
    </table>
</template>

<script>
  import TradeItem from './TradeItem.vue'
  export default {
    name: 'trade-list',
    data () {
      return {
      }
    },
    created () {
        this.$store.dispatch('allTrades');
     },

    computed: {
      trades () {
        return this.$store.getters.allTrades
      }
    },
    components: {
      'trade-item': TradeItem
    }
  }
</script>

<style scoped>
    .fully-responsive-table{
        width:100%;
    }
</style>