export const state = () => ({
   Soldier: [],
})

export const mutations = {
  SET_SOLDIER(state, Soldier) {
    state.Soldier = Soldier
  },
}

export const  getters = {
  Soldier: state => {
    return state.Soldier
  }
}

export const actions = {
  async LoadSoldier(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/soldier')
        .then(response => {
          state.commit('SET_SOLDIER', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}
