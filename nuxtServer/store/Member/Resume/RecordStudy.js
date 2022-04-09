export const state = () => ({
  UpdateRecordStudy: {
    items: []
  }
})

export const mutations = {
  SET_RECORD_STUDY(state, UpdateRecordStudy) {
    state.UpdateRecordStudy.items = UpdateRecordStudy
  },
  Delete_RECORD_STUDY_RESUME ( state  , id) {
    state.UpdateRecordStudy.items.splice(id , 1)
  },
  ADD_CREATE_RECORD_STUDY (state) {
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
}

export const getters = {
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
}

export const actions = {
  async LoadRecordStudy(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/resume-record-study')
        .then(response => {
          state.commit('SET_RECORD_STUDY', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
  async CreateUpdateRecordStudy(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/create-update-record-study', payload.UpdateRecordStudy)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async deleteRecordStudy( state , payload ) {
    this.$axios.delete(`api/v1/member/resume-record-study/${payload.id}`)
      .then(
        state.commit( 'Delete_RECORD_STUDY_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }

}
