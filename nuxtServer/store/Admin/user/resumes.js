export const state = () => ({
  resumes : []
})

export const mutations = {
  SET_RESUME_USERS : (state, resumes) => {
    state.resumes = resumes;
  }
}


export const actions = {

  async LoadResumeUsers(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/admin/list/resumes`)
        .then(response => {
          state.commit('SET_RESUME_USERS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

}
