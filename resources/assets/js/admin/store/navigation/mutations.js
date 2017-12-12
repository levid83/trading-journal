let mutations = {

  addevent(state, event) {
    let id = state.cal_events[state.cal_events.length - 1] ? state.cal_events[state.cal_events.length - 1].id + 1 : 0
    state.cal_events.push({id: id, title: event.evtname, start: event.date.from, end: event.date.to})
  },
  editevent(state, event) {
    let evt      = JSON.parse(JSON.stringify(event))
    let id_index = ''
    state.cal_events.forEach(function (currentValue, index)
    {
      if (currentValue.id == evt.id) {
        id_index = index
      }
    })
    state.cal_events[id_index].title = evt.title
    state.cal_events[id_index].start = evt.start
    state.cal_events[id_index].end   = evt.end
  },
  removeevent(state, id) {
    let id_index = ''
    state.cal_events.forEach(function (currentValue, index)
    {
      if (currentValue.id == id.evtid) {
        id_index = index
      }
    })
    state.cal_events.splice(id_index, 1)
  }
}
export default mutations
