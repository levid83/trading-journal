<template>
    <select v-model="tactic"
            :name="'trade['+trade_id+'][tactic_id]'"
            @change="isChanged=true"
            :class="{ 'bg-yellow' : isChanged }">
        <option value="">-----</option>
        <option v-for="option in tactics" v-bind:value="option.id">
            {{ option.name }}
        </option>
    </select>
</template>

<script>
  export default {
    name    : 'trade-tactic-selectbox',
    data (){
      return {
        tactic   : this.tactic_id,
        isChanged: false
      }
    },
    props   : ['tactic_id', 'trade_id', 'tactics'],
    created () {

    },
    watch   : {
      tactic (newTactic, oldTactic){
        this.isChanged=(this.tactic_id!=newTactic)
        this.$emit("changed",{tactic: newTactic , changed: this.isChanged});
      },
      tactic_id (){
        this.isChanged=false
      }
    },
    computed: {

    }

  }
</script>