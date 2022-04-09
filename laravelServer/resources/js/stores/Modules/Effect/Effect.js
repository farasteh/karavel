import Axios from "axios"

export default {
    state: {
        Effect: [],
    },
    mutations: {
        SET_EFFECT(state, Effect) {
            state.Effect = Effect;
        }
    },
    getters: {

    },
    actions: {
        async LoadEffect({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/effect')
                    .then(response => {
                        commit('SET_EFFECT', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        }
    }
}
