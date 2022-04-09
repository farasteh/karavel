import Axios from "axios"

export default {
    state: {
        Documents: []
    },
    mutations: {
        SET_DOCUMENT(state, Documents) {
            state.Documents = Documents
        }
    },
    getters: {
        Documents: state => {
            return state.Documents
        }
    },
    actions: {
        async LoadDocuments({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/document')
                    .then(response => {
                        commit('SET_DOCUMENT', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },
    }
}
