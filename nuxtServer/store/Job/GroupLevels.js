export const state = () => ({
  group: []
})

export const mutations = {
  SET_GROUPLEVELS(state, group) {
    state.group = group
  }
}

export const getters = {
  group: state => {
    return state.group
  }
}

export const actions = {
  async LoadGroupLevels(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/group-levels')
        .then(response => {
          state.commit('SET_GROUPLEVELS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }

}
