import Axios from "axios"
export default {
    state: {
        Company: [],
        CompanyJobs :[]
    },
    mutations: {
        SET_COMPANY_TAGS(state, Company) {
            state.Company = Company
        } ,
        SET_COMPANY_JOBS (state , jobs) {
            state.CompanyJobs = jobs
        } ,
        REMOVE_COMPANY_PRO (state) {
            state.Company= []
            state.CompanyJobs = []
        } ,
    },
    getters: {
        Company: state => {
            return state.ompany
        }
    },
    actions: {
        async LoadCompanyUser({ commit }) {
            Axios.get('api/v1/getCompany/')
                .then(response => {
                    commit('SET_COMPANY_TAGS', response.data.data)
                })
                .catch(error => console.log(error))
        },
        async EditCompany({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.put('api/v1/company/' + payload.id, payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        CREATE_ACTIVIY_COMPANY: ({ commit }, payload) => {
            return new Promise((resolve, reject) => {
                Axios.post('api/v1/company', payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        loadCompanyJobs : ( {commit}, payload ) => {
            return new Promise((resolve, reject) => {
                Axios.get(`api/v1/getCompanyJob/${payload.id}`)
                    .then(response => {
                        commit('SET_COMPANY_JOBS', response.data.data)
                        resolve(response)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },

    }
}
