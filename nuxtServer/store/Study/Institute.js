export const state = () => ({
  Institutes: []
})

export const mutations = {
  SET_INSTITUTES(state, Institutes) {
    state.Institutes = Institutes
  }
}
export const getters = {
  Institutes: state => {
    return state.Institutes
  },
  getInstitutesDocumentId: (state) => (id) => {
    return state.Institutes.filter(Institutes => Institutes.document_id === id)
  }
}

export const actions = {
  async LoadInstitutes(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/instituteList')
        .then(response => {
          state.commit('SET_INSTITUTES', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
}
