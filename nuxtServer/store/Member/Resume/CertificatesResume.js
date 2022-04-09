export const state = () => ({
  UpdateCertificatesResume: {
    items: []
  }
})

export const mutations = {
  SET_LOAD_CERTIFICATES(state, UpdateCertificatesResume) {
    state.UpdateCertificatesResume.items = UpdateCertificatesResume
  } ,
  Delete_RECORD_STUDY_RESUME ( state  , id) {
    state.UpdateCertificatesResume.items.splice(id , 1)
  } ,
  ADD_CREATE_CERTIFICATE_RESUME (state) {
    state.UpdateCertificatesResume.items.push({
      certificate: '',
      title: '',
      Institute: '',
      date: '',
      type :'create',
    })
  }
}


export  const getters =  {
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
}

export const actions = {
  async LoadCertificatesResume(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/certificates-resume')
        .then(response => {
          state.commit('SET_LOAD_CERTIFICATES', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
  async deleteCertificateResume(state  , payload ) {

    this.$axios.delete(`api/v1/member/certificates-resume/${payload.id}`)
      .then(
        state.commit( 'Delete_RECORD_STUDY_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }

}
