export const state = () => ({
    socailNetwork : []
})

export const mutations = {
    SET_SOCIAL_NETWOK(state , socailNetwork) {
      state.socailNetwork = socailNetwork
    }
}

export const actions = {
  async loadSocialNetwork ( state ) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/social-network')
        .then(res => {
          state.commit('SET_SOCIAL_NETWOK', res.data.data)
          resolve(res)
        })
        .catch(err => reject(err))
    })
  }
}
