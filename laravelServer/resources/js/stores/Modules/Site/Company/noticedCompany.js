import Axios from "axios"

export default {
    state: {
        noticedCompanies: {},

    },
    mutations: {
        SET_NOTICE_COMPNY ( state , noticedCompanies) {
            state.noticedCompanies = noticedCompanies
        } ,
    },
    getters: {
    },
    actions: {
        async LoadNoticeCompany({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/getNoticedCompany')
                    .then(response => {
                        commit('SET_NOTICE_COMPNY', response.data.data)
                        resolve(response)
                    })
                    .catch(error =>  reject(error))
            });
        },

    }
}
