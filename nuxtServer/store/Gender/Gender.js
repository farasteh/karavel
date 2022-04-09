export const state = () => ({
  Gender: [],
})

export const mutations = {
  SET_GENDER(state, Gender) {
    state.Gender = Gender
  },
}


export const actions = {
  async LoadGender(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/gender')
        .then(response => {
          state.commit('SET_GENDER', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}
