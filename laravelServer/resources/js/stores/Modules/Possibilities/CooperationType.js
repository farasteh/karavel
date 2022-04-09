import Axios from "axios"

export default {
    state: {
        CooperationType: []
    },
    mutations: {
        SET_COOPERATION_LIST_LIST(state, CooperationType) {
            state.CooperationType = CooperationType;
        }
    },
    getters: {

    },
    actions: {
        async LoadCooperationTypeList({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/cooperation_type')
                    .then(response => {
                        commit('SET_COOPERATION_LIST_LIST', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
