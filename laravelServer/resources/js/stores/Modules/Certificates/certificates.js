import Axios from "axios"

export default {
    state: {
        Certificates: [],
    },
    mutations: {
        SET_CERTIFICATES(state, Certificates) {
            state.Certificates = Certificates;
        }
    },
    getters: {

    },
    actions: {
        async LoadCertificates({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/certificates')
                    .then(response => {
                        commit('SET_CERTIFICATES', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        }
    }
}
