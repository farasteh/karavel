

export const actions = {
  async setCompanyNotice(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/company-notice', payload.form)
        .then(response => {resolve(response)})
        .catch(error => console.log(error));
    });
  } ,
  async DeleteCompanyNotice (state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.delete('api/v1/company-notice/'+payload.id)
        .then(response => {resolve(response)})
        .catch(({error, status}) => {reject(error)});
    });
  } ,
  async UpdateCompanyNotice ( state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/company-notice/'+payload.id , payload.form)
        .then(response => {resolve(response)})
        .catch(({error, status}) => {reject(error)});
    });
  } ,

}
