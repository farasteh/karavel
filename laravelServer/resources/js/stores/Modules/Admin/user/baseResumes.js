import axios from 'axios'


export default {
    state: {
        baseResumesUsers : []
    },
    mutations: {
        SET_BASE_RESUME_USERS : (state, baseResumesUsers) => {
            state.baseResumesUsers = baseResumesUsers;
        }
    },
    getters: {
    },
    actions: {
        async LoadBaseresumeUsers({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/admin/list/users`)
                    .then(response => {
                        commit('SET_BASE_RESUME_USERS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}

