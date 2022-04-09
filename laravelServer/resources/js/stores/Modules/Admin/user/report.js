import axios from 'axios'


export default {
    state: {
        reportUser : []
    },
    mutations: {
        SET_REPORT_USER : (state, reports) => {
            state.reportUser = reports;
            console.log(state.reportUser);
        }
    },
    getters: {
    },
    actions: {
        async LoadReportUser({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/admin/user-report`)
                    .then(response => {
                        commit('SET_REPORT_USER', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,
        async updateUserBlock({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.put(`api/v1/admin/user-block/${payload.id}` , {blocked : payload.blocked})
                    .then(response => {
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}

