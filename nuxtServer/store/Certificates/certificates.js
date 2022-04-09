export const state = () => ({
  Certificates: [],
})

export const mutations = {
  SET_CERTIFICATES(state, Certificates) {
    state.Certificates = Certificates;
  }
}


export const actions = {

  async LoadCertificates(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/certificates')
        .then(response => {
          state.commit('SET_CERTIFICATES', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  }
}
