import Axios from "axios"

export default {
    state: {
        CertificatesResume: {
            items: []
        },
        UpdateCertificatesResume: {
            items: []
        }

    },
    mutations: {
        SET_LOAD_CERTIFICATES(state, UpdateCertificatesResume) {
            state.UpdateCertificatesResume.items = UpdateCertificatesResume
        } ,
        Delete_RECORD_STUDY_RESUME ( state  , id) {
            state.UpdateCertificatesResume.items.splice(id , 1)
        }
    },
    getters: {
        UpdateCertificatesResume: state => {
            if(state.UpdateCertificatesResume.items.length == 0 ) { 
                state.UpdateCertificatesResume.items.push({
                    certificate: '',
                    title: '',
                    Institute: '',
                    date: '',
                    type :'create',
                })
            }
            return state.UpdateCertificatesResume
        },
        CountCertificates: (state, getters) => {
            return getters.UpdateCertificatesResume.items.length
        }
    },
    actions: {
        async LoadCertificatesResume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/certificates-resume')
                    .then(response => {
                        commit('SET_LOAD_CERTIFICATES', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
        async deleteCertificateResume( {commit} , payload ) {

            axios.delete(`api/v1/member/certificates-resume/${payload.id}`)
                .then(
                    commit( 'Delete_RECORD_STUDY_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }

    }
}
