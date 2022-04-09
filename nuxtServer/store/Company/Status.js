export const state = () => ({
  resumeStatus: [],
})

export const mutations = {
    SET_RESUME_STATUS : (state, resumeStatus)  => {
      state.resumeStatus = resumeStatus;
    } ,
}
export const getters = {

  resumeStatus: (state) => (filter) => {
    console.log(state.resumeStatus)
    return state.resumeStatus.filter(item => {return filter.includes(item.status)});
  },
    StatusCount : (state) => (status) =>{
    return state.resumeStatus.filter(resume => resume.status == status).length
  }
}


export const actions = {
  async LoadResumeStatus(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/resumes/${payload.id}`)
        .then(response => {
          state.commit('SET_RESUME_STATUS', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,

}
