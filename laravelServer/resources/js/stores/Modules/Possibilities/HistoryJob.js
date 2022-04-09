import Axios from "axios"

export default {
    state: {
        HistoryList: []
    },
    mutations: {
        SET_HISTORY_LIST(state, HistoryList) {
            state.HistoryList = HistoryList;
        }
    },
    getters: {

    },
    actions: {
        async LoadHistoryList({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/history_job')
                    .then(response => {
                        commit('SET_HISTORY_LIST', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
