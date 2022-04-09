import Axios from "axios"

export default {
    state: {
        Institutes: []
    },
    mutations: {
        SET_INSTITUTES(state, Institutes) {
            state.Institutes = Institutes
        }
    },
    getters: {
        Institutes: state => {
            return state.Institutes
        },
        getInstitutesDocumentId: (state) => (id) => {
            return state.Institutes.filter(Institutes => Institutes.document_id === id)
        }
    },

    actions: {
        async LoadInstitutes({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/instituteList')
                    .then(response => {
                        commit('SET_INSTITUTES', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
    }
}
