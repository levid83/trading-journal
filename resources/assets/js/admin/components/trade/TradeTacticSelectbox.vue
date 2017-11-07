<template>
    <select v-model="tactic" :name="'trade['+trade_id+'][tactic_id]'" @change="isChanged=true" :class="{ danger : isChanged }">
        <option value="">-----</option>
        <option v-for="option in tactics" v-bind:value="option.id">
            {{ option.name }}
        </option>
    </select>
</template>

<script>
  export default {
    data (){
      return {
           tactic: this.tactic_id,
           isChanged: false
      }
    },
    name: 'trade-tactic-selectbox',
    props: ['tactic_id', 'trade_id'],
    created () {
      if (this.tactics.length == 0 && !this.$store.getters.isTacticLoading) {
        this.$store.dispatch('allTactics');
      }
    },
    watch:{
      tactic (newTactic){
          this.$store.dispatch('updateTradeTactic',{trade: this.trade_id,tactic: newTactic})
      }
    },
    computed: {
      tactics () {
        return this.$store.getters.allTactics
      }
    }


  }
</script>