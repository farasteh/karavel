import Axios from "axios"

export default {
    state: {
        LangugeCreate: {
            items: []
        },
        UpdateLanguge: {
            items: []
        }
    },
    mutations: {
        SET_LANGAUGE(state, UpdateLanguge) {
            state.UpdateLanguge.items = UpdateLanguge
        } ,
        Delete_LANGUAGE_RESUME (state  , id) {
            state.UpdateLanguge.items.splice(id , 1)
        }
    },
    getters: {
        UpdateLanguge: state => {
            if(state.UpdateLanguge.items.length == 0 ) { 
                state.UpdateLanguge.items.push({
                    read: '',
                    write: '',
                    say: '',
                    listen: '',
                    lang_id: '',
                    type :'create',
                })
            }
            return state.UpdateLanguge
        },
        CountRecordLanguge: (state, getters) => {
            return getters.UpdateLanguge.items.length
        }
    },
    actions: {
        async LanguageJob({ commit }, payload) {
            Axios.post('api/v1/member/resume-langauge', payload)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
        },
        async LoadLangageRsume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/resume-langauge')
                    .then(response => {
                        commit('SET_LANGAUGE', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
        async UpdateLangaugeResume({ commit }, payload) {
            Axios.put('api/v1/member/resume-langauge/' + payload.Base, payload.UpdateRecordJob)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
        },
        async deleteLanguage( {commit} , payload ) {
            axios.delete(`api/v1/member/resume-langauge/${payload.id}`)
                .then(
                    commit( 'Delete_LANGUAGE_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }
    }
}
