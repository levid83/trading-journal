import CONFIG from '../../config.js'

const tradeStoreModule = {
  state    : {
    trade          : {},
    selectedTrades : [],
    trades         : [],
    tactics        : [],
    tacticLoading  : false,
    positions      : [],
    positionLoading: false
  },
  getters  : {
    allTrades        : (state) =>
    {
      return state.trades
    },
    allTactics       : (state) =>
    {
      return state.tactics
    },
    isTacticLoading  : (state) =>
    {
      return state.tacticLoading
    },
    allPositions     : (state) =>
    {
      return state.positions
    },
    isPositionLoading: (state) =>
    {
      return state.positionLoading
    }
  },
  mutations: {
    ALL_TRADES           : (state, trades) =>
    {
      state.trades = trades
    },
    SELECT_TRADE         : (state, idx) =>
    {
      state.selectedTrades[idx] = idx
    },
    DESELECT_TRADE       : (state, idx) =>
    {
      delete state.selectedTrades[idx]
    },
    ALL_TACTICS          : (state, tactics) =>
    {
      state.tactics = tactics
    },
    TACTICS_LOADING      : (state, status) =>
    {
      state.tacticLoading = status
    },
    UPDATE_TRADE_TACTIC  : (state, {trade, tactic}) =>
    {
      state.trades[trade].tactic_id = tactic
    },
    ALL_POSITIONS        : (state, positions) =>
    {
      state.positions = positions
    },
    POSITIONS_LOADING    : (state, status) =>
    {
      state.positionLoading = status
    },
    UPDATE_TRADE_POSITION: (state, {trade, position}) =>
    {
      state.trades[trade].position_id = position
    }
  },
  actions  : {
    allTrades ({commit}) {
      axios.get(`${CONFIG.BASE_URL}/trades`).then((response) =>
      {
        commit('ALL_TRADES', response.data.data)
      })
    },
    selectTrade ({commit}, id) {
      commit('SELECT_TRADE', id)
    },
    deselectTrade({commit}, id) {
      commit('DESELECT_TRADE', id)
    },
    allTactics({commit}){
      commit('TACTICS_LOADING', true)
      axios.get(`${CONFIG.BASE_URL}/tactics`).then((response) =>
      {
        commit('ALL_TACTICS', response.data)
        commit('TACTICS_LOADING', false)
      })
    },
    updateTradeTactic({commit}, {trade, tactic}) {
      commit('UPDATE_TRADE_TACTIC', {trade, tactic})
    },
    allPositions({commit}){
      commit('POSITIONS_LOADING', true)
      axios.get(`${CONFIG.BASE_URL}/positions`).then((response) =>
      {
        commit('ALL_POSITIONS', response.data)
        commit('POSITIONS_LOADING', false)
      })
    },
    updateTradePosition({commit}, {trade, position}) {
      commit('UPDATE_TRADE_POSITION', {trade, position})
    }
  }
}
export default tradeStoreModule