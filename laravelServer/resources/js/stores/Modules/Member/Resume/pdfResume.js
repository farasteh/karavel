import Axios from "axios"

export default {
    state: {
        pdfThemes: {
        },
    },
    mutations: {
        SET_PDF(state, pdfThemes) {
            state.pdfThemes = pdfThemes
        }
    },
    getters: {
    },
    actions: {
        async LoadPdfThemes({ commit }) {
            Axios.get('api/v1/member/pdf-theme')
                .then(response => {
                    commit('SET_PDF', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}
