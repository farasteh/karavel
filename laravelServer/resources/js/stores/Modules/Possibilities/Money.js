import Axios from "axios"

export default {
    state: {
        MoneyList: []
    },
    mutations: {
        SET_MONEY_LIST(state, MoneyList) {
            state.MoneyList = MoneyList;
        }
    },
    getters: {

    },
    actions: {
        async LoadMoneyList({ commit }) {
            Axios.get('api/v1/money')
                .then(response => {
                    commit('SET_MONEY_LIST', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}