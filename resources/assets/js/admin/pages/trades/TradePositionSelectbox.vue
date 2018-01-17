<template>
    <select v-model="position"
            :name="'trade['+trade_id+'][position_id]'"
            @change="isChanged=true"
            :class="{'bg-yellow' : isChanged }">
        <option value="">--Empty--</option>
        <option v-for="option in positions" :value="option.id" :alt="option.name">
            {{ option.id }}
        </option>
    </select>
</template>

<script>
  export default {
    name    : 'trade-position-selectbox',
    data (){
      return {
        position : this.position_id,
        isChanged: false
      }
    },
    props: ['position_id', 'trade_id','positions'],
    created () {
    },
    watch   : {
      position (newPosition){
        this.isChanged=(this.position_id!=newPosition)
        this.$emit("changed",{position: newPosition , changed: this.isChanged})
      },
      position_id (){
        this.isChanged=false
      }
    },
    computed: {

    }

  }
</script>