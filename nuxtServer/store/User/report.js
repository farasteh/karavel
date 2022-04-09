
export const actions = {
  async ReportUser(state,payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/user/report',payload)
        .then( response => {
          resolve(response)
        })
        .catch ( error => {
          reject(error)
        })
    });
  }

}
