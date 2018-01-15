<script>
  import TradeItem from './TradeItem.vue'
  export default {
    name: 'trade-list',
    data () {
      return {
        selected:[],
        name:[]
      }
    },
    props:['trades','positions', 'tactics'],
    components: {
      'trade-item': TradeItem
    },
    computed:{
      getTrades(){
        return JSON.parse(this.trades).data
      },
      getPositions(){
        return JSON.parse(this.positions)
      },
      getTactics(){
        return JSON.parse(this.tactics)
      }
    },
    created(){
        //console.log(`tactics ${this.tactics}`)
    }

  }
</script>
<style scoped>
    .fully-responsive-table {
        width: 100%;
    }
</style>