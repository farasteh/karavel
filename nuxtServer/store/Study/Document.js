export const state = () => ({
  Documents: []
})

export const mutations = {
  SET_DOCUMENT(state, Documents) {
    state.Documents = Documents
  }
}
export const getters = {
  Documents: state => {
    return state.Documents
  }
}

export const actions = {
  async LoadDocuments(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/document')
        .then(response => {
          state.commit('SET_DOCUMENT', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
}
