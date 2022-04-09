export const state = () => ({
  route  : []
})

export const mutations = {
  SET_ROUTE(state, routeParam) {
    state.route = routeParam
  } ,
  DELETE_ROUTE(state)  {
    state.route = []
  }
}

