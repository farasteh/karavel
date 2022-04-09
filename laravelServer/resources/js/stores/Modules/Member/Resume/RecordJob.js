import Axios from "axios"

export default {
    state: {
        UpdateRecordJob: {
            items: []
        }
    },
    mutations: {
        SET_RECORD_Job(state, UpdateRecordJob) {
            state.UpdateRecordJob.items = UpdateRecordJob
        } ,
        Delete_RECORD_JOB_RESUME ( state  , id) {
            state.UpdateRecordJob.items.splice(id , 1)
        }
    },
    getters: {
        UpdateRecordJob: state => {
            if(state.UpdateRecordJob.items.length == 0 ) { 
                state.UpdateRecordJob.items.push({
                    job_side: '',
                    job: '',
                    center_job: '',
                    title_center_job: '',
                    cooperation_type: '',
                    group_levels: '',
                    province: '',
                    city: '',
                    start: '',
                    end: '',
                    working: false,
                    comment: '',
                    satisfying : '',
                    type : 'create',
                })
            }
            return state.UpdateRecordJob
        },
        CountRecordJobs: (state, getters) => {
            return getters.UpdateRecordJob.items.length
        } ,
        // isWorking :state => {
        //     if(state.UpdateRecordJob.items.working == 1 || state.UpdateRecordJob.items.working ==true)
        //         return true
        //     else
        //         return false
        // }
    },
    actions: {
        async CreateRecordJob({ commit }, payload) {
            Axios.post('api/v1/member/resume-record-job', payload)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
        },
        async LoadRecordJob({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/resume-record-job')
                    .then(response => {
                        commit('SET_RECORD_Job', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
        async UpdateRecordJob({ commit }, payload) {
            Axios.put('api/v1/member/resume-record-job/' + payload.Base, payload.UpdateRecordJob)
                .then(success => {
                    resolve(success)
                })
                .catch(({ error, status }) => {
                    reject(error)
                });
        },
        async CreateUpdateRecordJobs({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.post('api/v1/member/create-update-record-jobs', payload.UpdateRecordJob)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async deleteRecordJob( {commit} , payload ) {
            axios.delete(`api/v1/member/resume-record-job/${payload.id}`)
                .then(
                    commit( 'Delete_RECORD_JOB_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }
    }
}
