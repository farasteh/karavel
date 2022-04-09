import Axios from "axios"

export default {
    state: {

    },
    mutations: {

    },
    getters: {

    },
    actions: {
        async ReportUser({ commit },payload) {
            return new Promise((resolve, reject) => {
            Axios.post('api/v1/user/report',payload)
                .then( response => {
                    resolve(response)
                })
                .catch ( error => {
                    reject(error)
                })
            });
        }
    }
}
