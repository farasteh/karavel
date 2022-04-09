import Axios from "axios"

export default {
    state: {
        CenterJobs: [],
    },
    mutations: {
        SET_CENTERJOBS(state, CenterJobs) {
            state.CenterJobs = CenterJobs
        },
    },
    getters: {
        // Jobs: state => {
        //     return state.CategoryJobs
        // },
    },
    actions: {
        async LoadCenterJobs({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/center-job')
                    .then(response => {
                        commit('SET_CENTERJOBS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
