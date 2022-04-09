export const state = () => ({
  Languge: [],
})

export const mutations = {
  SET_LANGUGE(state, Languge) {
    state.Languge = Languge;
  }
}


export const actions = {
  async LoadLanguge(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/languge')
        .then(response => {
          state.commit('SET_LANGUGE', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}
