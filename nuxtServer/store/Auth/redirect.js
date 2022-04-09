export const state = () => ({
  route  : []
})

export const mutations = {
  SET_ROUTE ( state  ,  route )  {
    state.route = route
  } ,
  DELETE_ROUTE( state , route )  {
    state.route  = []
  }
}

