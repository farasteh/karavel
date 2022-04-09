export const state = () => ({
  UpdateLanguge: {
    items: []
  }
})

export const mutations = {
  SET_LANGAUGE(state, UpdateLanguge) {
    state.UpdateLanguge.items = UpdateLanguge
  } ,
  Delete_LANGUAGE_RESUME (state  , id) {
    state.UpdateLanguge.items.splice(id , 1)
  },
  ADD_CREATE_LANGUAGE(state) {
    state.UpdateLanguge.items.push({
      read: '',
      write: '',
      say: '',
      listen: '',
      lang_id: '',
      type :'create',
    })
  }
}
export const getters = {
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
}

export const actions = {
  async LanguageJob(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/resume-langauge', payload)
        .then(success => {
          resolve(success)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    })
  },
  async LoadLangageRsume(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/resume-langauge')
        .then(response => {
          state.commit('SET_LANGAUGE', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
  async deleteLanguage(state , payload ) {
    this.$axios.delete(`api/v1/member/resume-langauge/${payload.id}`)
      .then(
        state.commit( 'Delete_LANGUAGE_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }
}
