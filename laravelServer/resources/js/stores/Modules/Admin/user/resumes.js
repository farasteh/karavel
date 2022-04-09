import axios from 'axios'


export default {
    state: {
        resumes : []
    },
    mutations: {
        SET_RESUME_USERS : (state, resumes) => {
            state.resumes = resumes;
        }
    },
    getters: {
    },
    actions: {
        async LoadResumeUsers({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/admin/list/resumes`)
                    .then(response => {
                        commit('SET_RESUME_USERS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}

