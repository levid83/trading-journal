import axios from 'axios'
import {ADMIN_URL} from '../config'

import {  ALL_TRADES, ALL_TRADES_SUCCESS,
          SELECT_TRADE, DESELECT_TRADE,
          ALL_TACTICS, TACTICS_LOADING, UPDATE_TRADE_TACTIC,
          ALL_POSITIONS, POSITIONS_LOADING, UPDATE_TRADE_POSITION
} from './mutation-types'

export const tradeActions = {
  allTrades ({commit}) {
    axios.get(`${ADMIN_URL}/trades`).then((response) => {
      commit(ALL_TRADES, response.data.data)
    })
  },
  selectTrade ({commit}, id) {
    commit(SELECT_TRADE, id)
  },
  deselectTrade({commit}, id) {
    commit(DESELECT_TRADE, id)
  }
}

export const tacticActions = {
    allTactics({commit}){
      commit(TACTICS_LOADING,true)
      axios.get(`${ADMIN_URL}/tactics`).then((response) =>{
        commit(ALL_TACTICS, response.data)
        commit(TACTICS_LOADING, false)
      })
    },
    updateTradeTactic({commit}, {trade, tactic}) {
      commit(UPDATE_TRADE_TACTIC, {trade, tactic})
    }
  }

export const positionActions = {
  allPositions({commit}){
    commit(POSITIONS_LOADING,true)
    axios.get(`${ADMIN_URL}/positions`).then((response) =>{
      commit(ALL_POSITIONS, response.data)
      commit(POSITIONS_LOADING, false)
    })
  },
  updateTradePosition({commit}, {trade, position}) {
      commit(UPDATE_TRADE_POSITION, {trade, position})
  }
}