export const state = () => ({
  reportUser : []
})

export const mutations = {
  SET_REPORT_USER : (state, reports) => {
    state.reportUser = reports;
    console.log(state.reportUser);
  }
}


export const actions = {


  async LoadReportUser(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/admin/user-report`)
        .then(response => {
          state.commit('SET_REPORT_USER', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,
  async updateUserBlock(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put(`api/v1/admin/user-block/${payload.id}` , {blocked : payload.blocked})
        .then(response => {
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

}
