import axios from 'axios'


export default {
    state: {
        posibilities: [],
    },
    mutations: {
        SET_COMPANY_POSIBILITY : (state, posibilities)  => {
            state.posibilities = posibilities;
        } , 
    },
    getters: {

    },
    actions: {
        async LoadCompanyPosibilities({ commit }) {
            axios.get('api/v1/posibility/company')
                .then(response => {
                    commit('SET_COMPANY_POSIBILITY', response.data.data)
                })
                .catch(error => console.log(error))
        } , 
    }
}