import Vue from 'vue'
import Vuex from 'vuex'

import { tradeGetters, tacticGetters, positionGetters } from './getters'
import { tradeMutations, tacticMutations, positionMutations } from './mutations'
import { tradeActions, tacticActions, positionActions } from './actions'

Vue.use(Vuex)

export default new Vuex.Store({
  strict   : true,
  state    : {
    trade          : {},
    selectedTrades : [],
    trades         : [],
    tactics        : [],
    tacticLoading  : false,
    positions      : [],
    positionLoading: false
  },
  getters  : Object.assign({}, tradeGetters, tacticGetters, positionGetters),
  mutations: Object.assign({}, tradeMutations, tacticMutations, positionMutations),
  actions  : Object.assign({}, tradeActions, tacticActions, positionActions)

})
