import Axios from "axios"
export default {
    state: {
        route  : []
    },
    mutations: {
        SET_ROUTE ( state  ,  route )  {
            state.route = route
        } ,
        DELETE_ROUTE( state , route )  {
            state.route  = []
        }
    },
    getters: {

    },
    actions: {

    }
}
