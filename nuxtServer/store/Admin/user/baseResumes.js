export const state = () => ({
  baseResumesUsers : []
})

export const mutations = {
  SET_BASE_RESUME_USERS : (state, baseResumesUsers) => {
    state.baseResumesUsers = baseResumesUsers;
  }
}


export const actions = {

  async LoadBaseresumeUsers(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/admin/list/users`)
        .then(response => {
          state.commit('SET_BASE_RESUME_USERS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

}
