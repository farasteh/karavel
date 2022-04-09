import Axios from "axios"
export default {
    state: {
        ActivityCompany: [],
    },
    mutations: {
        SET_ACTIVITY_COMPANY(state, ActivityCompany) {
            state.ActivityCompany = ActivityCompany
        }
    },
    getters: {
        ActivityCompany: state => {
            return state.ActivityCompany
        }
    },
    actions: {

        async LoadActivityCompany({ commit }) {
            Axios.get('api/v1/activity_company')
                .then(response => {
                    commit('SET_ACTIVITY_COMPANY', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}