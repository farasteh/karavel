export const state = () => ({
  UpdateRecordJob: {
    items: []
  }
})

export const mutations = {
  SET_RECORD_Job(state, UpdateRecordJob) {
    state.UpdateRecordJob.items = UpdateRecordJob
  } ,
  Delete_RECORD_JOB_RESUME ( state  , id) {
   // console.log(state.UpdateRecordJob , id)
    state.UpdateRecordJob.items.splice(id , 1)
  } ,
  ADD_CREATE_RECORDE_JOB (state) {
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
}
export const getters = {
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
}

export const actions = {
  async LoadRecordJob(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/resume-record-job')
        .then(response => {
          state.commit('SET_RECORD_Job', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
  async UpdateRecordJob(state, payload) {
    this.$axios.put('api/v1/member/resume-record-job/' + payload.Base, payload.UpdateRecordJob)
      .then(success => {
        resolve(success)
      })
      .catch(({ error, status }) => {
        reject(error)
      });
  },
  async CreateUpdateRecordJobs(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/create-update-record-jobs', payload.UpdateRecordJob)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async deleteRecordJob( state , payload ) {
    this.$axios.delete(`api/v1/member/resume-record-job/${payload.id}`)
      .then(
        state.commit( 'Delete_RECORD_JOB_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }

}
