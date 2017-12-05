
export const tradeGetters = {
  allTrades: (state) => {
    return state.trades
  }
}

export const tacticGetters = {

  allTactics: (state) => {
    return state.tactics
  },
  isTacticLoading: (state) => {
    return state.tacticLoading
  }
}

export const positionGetters = {
  
  allPositions: (state) => {
    return state.positions
  },
  isPositionLoading: (state) => {
    return state.positionLoading
  }
}

