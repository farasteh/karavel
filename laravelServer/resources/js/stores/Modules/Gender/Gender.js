import Axios from "axios"

export default {
    state: {
        Gender: [],
    },
    mutations: {
        SET_GENDER(state, Gender) {
            state.Gender = Gender
        },
    },
    getters: {
        // Jobs: state => {
        //     return state.Gender
        // }
    },
    actions: {
        async LoadGender({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/gender')
                    .then(response => {
                        commit('SET_GENDER', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
