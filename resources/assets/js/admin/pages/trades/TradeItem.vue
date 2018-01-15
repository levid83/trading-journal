<template>
    <tr :class="{danger: selected }">
        <td>
            <div class="checkbox">
                <label>
                    <input type="checkbox"
                           v-model="selected"
                           @change="selectToggle"
                           :name="'trade[' + item.id + '][id]'">
                </label>
            </div>
        </td>
        <td data-title="Id">{{ item.id }}</td>
        <td data-title="Trader">{{ trader_name }}</td>
        <td data-title="Client">{{ client_name }}</td>
        <td data-title="Asset">{{ item.underlying }}</td>
        <td data-title="Position" title="">
            <template v-if="selected">
                <trade-position-selectbox
                    :positions="positions"
                    :position_id="position_id"
                    :trade_id="trade_id"
                    @changed="onPositionChange"
                ></trade-position-selectbox>
            </template>
            <template v-else>
                {{ position_id }}
            </template>
        </td>
        <td data-title="Tactic">
            <template v-if="selected">
                <trade-tactic-selectbox
                        :tactics="tactics"
                        :tactic_id="tactic_id"
                        :trade_id="trade_id"
                        @changed="onTacticChange"
                ></trade-tactic-selectbox>
            </template>
            <template v-else>
                {{ tactic_name }}
            </template>
            <button class="btn btn-primary btn-sm" title="Save"
                    v-if="canSave && !isSaving"
                    @click.prevent="save"
            ><i class="fa fa-floppy-o" aria-hidden="true"></i>
            </button>
            <span v-if="isSaving"> <i class="fa fa-refresh fa-spin"></i></span>
        </td>
        <td data-title="Class">{{ item.asset_class }}</td>
        <td data-title="Action">{{ item.action }}</td>
        <td data-title="Qty.">{{ item.quantity }}</td>
        <td data-title="Expiry">{{ item.expiration }}</td>
        <td data-title="Strike">{{ item.strike }}</td>
        <td data-title="P/C">{{ item.put_call }}</td>
        <td data-title="Ask">{{ item.ask }}</td>
        <td data-title="Bid">{{ item.bid }}</td>
        <td data-title="Open Comm.">{{ item.commission_open }}</td>
        <td data-title="Close Comm.">{{ item.commission_close }}</td>
        <td data-title="P/L">{{ item.profit }}</td>
        <td data-title="Opened">{{ item.open_date }}</td>
        <td data-title="Closed">{{ item.close_date }}</td>
        <td data-title="Status">{{ item.status }}</td>

    </tr>
</template>


<script>
  import TradeTacticSelectbox from './TradeTacticSelectbox.vue'
  import TradePositionSelectbox from './TradePositionSelectbox.vue'
  export default {
    name      : 'trade-item',
    data (){
      return {
        selected: false,
        item: this.trade,
        item_changes:{},
        isSaving: false,
      }
    },
    props     : ['trade','positions','tactics'],
    components: {
      'trade-position-selectbox': TradePositionSelectbox,
      'trade-tactic-selectbox'  : TradeTacticSelectbox
    },
    computed  : {
      trader_name(){
        if (this.item.trader_id.isNull) {
          return '';
        } else {
          return this.item.trader.account_name;
        }
      },
      client_name(){
        if (this.item.client_id.isNull) {
          return '';
        } else {
          return this.item.client.account_name;
        }
      },
      trade_id(){
        return this.item.id
      },
      tactic_id(){
        return this.item.tactic_id
      },
      tactic_name(){
        if (!this.tactic_id){
          return '';
        }else{
          return this.tactics.find((item)=>item.id==this.tactic_id).name
        }
      },
      position_id(){
        return this.item.position_id
      },
      isSelected(){
        return this.selected
      },
      canSave(){
        return this.isSelected && this.hasChanges
      },
      hasChanges(){
        return Object.keys(this.item_changes).length>0
      },

    },
    methods:{
      selectToggle(){
        if (!this.selected){
          this.item_changes={}
        }
      },
      save(){
        this.isSaving=true;
        axios.put(`/admin/trades/${this.item.id}`,this.item_changes)
          .then((result)=>{
           // console.log(result.data)
            this.isSaving=false
            if (this.item_changes.hasOwnProperty('position_id')){
              this.item.position_id=this.item_changes.position_id
            }
            if (this.item_changes.hasOwnProperty('tactic_id')){
              this.item.tactic_id=this.item_changes.tactic_id
            }
            this.item_changes={}
            this.selected=false
          })
          .catch((error)=>console.log(error))

      },

      onPositionChange({position, changed}){
        if (changed) {
          this.$set(this.item_changes, 'position_id', position)
        }else{
          this.$delete(this.item_changes,'position_id');
        }
      },
      onTacticChange({tactic, changed}){
        if (changed) {
          this.$set(this.item_changes, 'tactic_id', tactic)
        }else{
          this.$delete(this.item_changes,'tactic_id');
        }
      },
    },
    created(){

    }
  }
</script>
