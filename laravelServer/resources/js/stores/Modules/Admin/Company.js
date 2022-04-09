import axios from 'axios'


export default {
    state: {
        adminCompanies: [],
        adminCompany : []
    },
    mutations: {
        SET_ADMIN_COMPANIES : (state, adminCompanies)  => {
            state.adminCompanies = adminCompanies;
        } ,
        SET_ADMIN_COMPANY : ( state ,adminCompany ) => {
            state.adminCompany = adminCompany
        } ,
        UPDATE_ADMIN_COMPANY : (state , payload) => {

        }
    },
    getters: {
        searchedCompanies: (state) => ( search ) => {
            let companies = state.adminCompanies
            if (search)
            {
                companies =  companies.filter(item =>
                {
                    return item.name_fa.toLowerCase().includes(search.toLowerCase()) || item.name_en.toLowerCase().includes(search.toLowerCase())
                })
            }
            return companies
        },
        GetCompanyAdmin: (state) => ( id ) => {
           return state.adminCompanies.find(x => x.id == parseInt(id))
        },
    },
    actions: {
        async LoadAdminCompanies({ commit }) {
            return new Promise((resolve, reject) => {
            axios.get('api/v1/company-admin')
                .then(response => {
                    commit('SET_ADMIN_COMPANIES', response.data.data)
                    resolve(response)
                })
                .catch(error => reject(error))
            });
        } ,
        async LoadAdminCompany({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/company-admin/${payload.id}`)
                    .then(response => {
                        commit('SET_ADMIN_COMPANY', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,
        async updateAdminCompany({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.put(`api/v1/company-admin/${payload.id}` , payload.form)
                    .then(response => {
                        commit('UPDATE_ADMIN_COMPANY', payload.form)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}
