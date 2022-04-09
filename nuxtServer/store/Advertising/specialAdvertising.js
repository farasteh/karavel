
export const actions = {

  async setSpecialAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/special-advertising', payload)
        .then(response => {resolve(response)})
        .catch(error => console.log(error));
    });
  } ,
  async DeleteSpecialAdvertising (state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.delete('api/v1/special-advertising/'+payload.id)
        .then(response => {resolve(response)})
        .catch(({error, status}) => {reject(error)});
    });
  } ,

}


