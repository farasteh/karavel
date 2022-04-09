import Axios from "axios"

export default {
    state: {
        Languge: [],
    },
    mutations: {
        SET_LANGUGE(state, Languge) {
            state.Languge = Languge;
        }
    },
    getters: {

    },
    actions: {
        async LoadLanguge({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/languge')
                    .then(response => {
                        commit('SET_LANGUGE', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
