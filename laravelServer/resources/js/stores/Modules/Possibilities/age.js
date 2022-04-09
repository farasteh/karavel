import Axios from "axios"

export default {
    state: {
        ageList: []
    },
    mutations: {
        SET_AGE_LIST(state, ageList) {
            state.ageList = ageList;
        }
    },
    getters: {

    },
    actions: {
        async LoadAgeList({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/age')
                    .then(response => {
                        commit('SET_AGE_LIST', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
