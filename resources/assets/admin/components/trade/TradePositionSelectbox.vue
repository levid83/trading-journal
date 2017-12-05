<template>
    <select v-model="position" :name="'trade['+trade_id+'][position_id]'"  @change="isChanged=true" :class="{ danger : isChanged }">
        <option value="">-----</option>
        <option v-for="option in positions" v-bind:value="option.id" v-bind:alt="option.name">
            {{ option.id }}
        </option>
    </select>
</template>

<script>
  export default {
    data (){
      return {
        position: this.position_id,
        isChanged: false
      }
    },
    name: 'trade-position-selectbox',
    props: ['position_id', 'trade_id'],
    created () {
      if (this.positions.length == 0 && !this.$store.getters.isPositionLoading) {
        this.$store.dispatch('allPositions');
      }
    },
    watch:{
      position (newPosition){
        this.$store.dispatch('updateTradePosition',{trade: this.trade_id,position: newPosition})
      }
    },
    computed: {
      positions () {
        return this.$store.getters.allPositions
      }
    }


  }
</script>