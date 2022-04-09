export default {
    state: {
        name : '',
        params : '',
        query : ''
    },
    mutations: {
        SET_ROUTE(state, routeParam) {
            state.name = routeParam.name
            state.params = routeParam.params
            state.query = routeParam.query
        } ,
        DELETE_ROUTE(state)  {
            state.name = ''
            state.params = ''
            state.query = ''
        }
    },
    getters: {

    },
    actions: {
    }
}
