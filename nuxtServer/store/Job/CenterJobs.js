export const state = () => ({
  CenterJobs: [],
})

export const mutations = {
  SET_CENTERJOBS(state, CenterJobs) {
    state.CenterJobs = CenterJobs
  },
}


export const actions = {

  async LoadCenterJobs(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/center-job')
        .then(response => {
          state.commit('SET_CENTERJOBS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }

}
