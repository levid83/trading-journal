import {
  ALL_TRADES, ALL_TRADES_SUCCESS,
  SELECT_TRADE, DESELECT_TRADE,
  ALL_TACTICS, TACTICS_LOADING, UPDATE_TRADE_TACTIC,
  ALL_POSITIONS, POSITIONS_LOADING, UPDATE_TRADE_POSITION
} from './mutation-types'

export const tradeMutations = {
  ALL_TRADES    : (state, trades) =>
  {
    state.trades = trades
  },
  SELECT_TRADE  : (state, idx) =>
  {
    state.selectedTrades[idx] = idx
  },
  DESELECT_TRADE: (state, idx) =>
  {
    delete state.selectedTrades[idx]
  }
}

export const tacticMutations = {
  ALL_TACTICS        : (state, tactics) =>
  {
    state.tactics = tactics
  },
  TACTICS_LOADING    : (state, status) =>
  {
    state.tacticLoading = status
  },
  UPDATE_TRADE_TACTIC: (state, {trade, tactic}) =>
  {
    state.trades[trade].tactic_id = tactic
  }

}

export const positionMutations = {
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

}