export const state = () => ({
  ageList: []
})

export const mutations = {
  SET_AGE_LIST(state, ageList) {
    state.ageList = ageList;
  }
}


export const actions = {

  async LoadAgeList(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/age')
        .then(response => {
          state.commit('SET_AGE_LIST', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}
