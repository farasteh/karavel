export const state = () => ({
  Effect: [],
})

export const mutations = {
  SET_EFFECT(state, Effect) {
    state.Effect = Effect;
  }
}


export const actions = {
  async LoadEffect(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/effect')
        .then(response => {
          state.commit('SET_EFFECT', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  }

}
