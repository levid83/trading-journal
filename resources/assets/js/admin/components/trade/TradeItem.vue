<template>
    <tr :class="{danger: selectedTrade }">
        <td>
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="selectedTrade" :name="'trade[' + trade.id + '][id]'">
                </label>
            </div>
        </td>
        <td data-title="Id">{{ trade.id }}</td>
        <td data-title="Trader">{{ trader_name }}</td>
        <td data-title="Client">{{ client_name }}</td>
        <td data-title="Asset">{{ trade.underlying }}</td>
        <td data-title="Position" title="">
            <trade-position-selectbox :position_id="position_id" :trade_id="trade_id"></trade-position-selectbox>
        </td>
        <td data-title="Tactic">
            <trade-tactic-selectbox :tactic_id="tactic_id" :trade_id="trade_id"></trade-tactic-selectbox>
        </td>
        <td data-title="Class">{{ trade.asset_class }}</td>
        <td data-title="Action">{{ trade.action }}</td>
        <td data-title="Qty.">{{ trade.quantity }}</td>
        <td data-title="Expiry">{{ trade.expiration }}</td>
        <td data-title="Strike">{{ trade.strike }}</td>
        <td data-title="P/C">{{ trade.put_call }}</td>
        <td data-title="Ask">{{ trade.ask }}</td>
        <td data-title="Bid">{{ trade.bid }}</td>
        <td data-title="Open Comm.">{{ trade.commission_open }}</td>
        <td data-title="Close Comm.">{{ trade.commission_close }}</td>
        <td data-title="P/L">{{ trade.profit }}</td>
        <td data-title="Opened">{{ trade.open_date }}</td>
        <td data-title="Closed">{{ trade.close_date }}</td>
        <td data-title="Status">{{ trade.status }}</td>
        <td>
            <a href="#" title="Edit trade">
                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                </button>
            </a>
        </td>
    </tr>
</template>

<script>
  import TradeTacticSelectbox from './TradeTacticSelectbox.vue'
  import TradePositionSelectbox from './TradePositionSelectbox.vue'

  export default {
    components: {
      'trade-position-selectbox': TradePositionSelectbox,
      'trade-tactic-selectbox'  : TradeTacticSelectbox
    },
    name      : 'trade-item',
    data (){
      return {
        selectedTrade: false,
      }
    },
    props     : ['trade'],
    watch     : {
      selectedTrade (value) {
        if (value) {
          this.$store.trades.dispatch('selectTrade', this.trade['id'])
        } else {
          this.$store.trades.dispatch('deselectTrade', this.trade['id'])
        }
      }
    },
    computed  : {
      trader_name: function ()
      {
        if (this.trade.trader_id.isNull) {
          return '';
        } else {
          return this.trade.trader.account_name;
        }
      },
      client_name: function ()
      {
        if (this.trade.client_id.isNull) {
          return '';
        } else {
          return this.trade.client.account_name;
        }
      },
      trade_id (){
        return this.trade.id
      },
      tactic_id (){
        return this.trade.tactic_id
      },
      position_id (){
        return this.trade.position_id
      }
    },
    created(){

    }
  }
</script>
