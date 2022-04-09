import Axios from "axios"

export default {
    state: {
        UpdateRecordStudy: {
            items: []
        }
    },
    mutations: {
        SET_RECORD_STUDY(state, UpdateRecordStudy) {
            state.UpdateRecordStudy.items = UpdateRecordStudy
        },
        Delete_RECORD_STUDY_RESUME ( state  , id) {
            state.UpdateRecordStudy.items.splice(id , 1)
        }
    },
    getters: {
        UpdateRecordStudy: state => {
            if(state.UpdateRecordStudy.items.length == 0 ) { 
                state.UpdateRecordStudy.items.push({
                    document: '',
                    Field_Study: '',
                    orientation: '',
                    institutes: '',
                    title_institutes: '',
                    average: '',
                    province: '',
                    city: '',
                    entering_year: '',
                    year_departure: '',
                    Studying: false,
                    type: 'create',
                })
            }
            return state.UpdateRecordStudy
        },
        doneTodosCountTest: (state, getters) => {
            return getters.UpdateRecordStudy.items.length
        }
    },
    actions: {
        async CreateRecordStudy({ commit }, payload) {
            Axios.post('api/v1/member/resume-record-study', payload)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
        },
        async LoadRecordStudy({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/resume-record-study')
                    .then(response => {
                        commit('SET_RECORD_STUDY', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },
        async CreateUpdateRecordStudy({ commit }, payload) {
            return new Promise((resolve, reject) => {
            Axios.post('api/v1/member/create-update-record-study', payload.UpdateRecordStudy)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
            });
        },
        async deleteRecordStudy( {commit} , payload ) {
            axios.delete(`api/v1/member/resume-record-study/${payload.id}`)
                .then(
                    commit( 'Delete_RECORD_STUDY_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }

    }
}
