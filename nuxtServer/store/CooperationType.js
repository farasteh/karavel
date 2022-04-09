export const state = () => ({
  CooperationType: []
})

export const mutations = {
  SET_COOPERATION_LIST_LIST(state, CooperationType) {
    state.CooperationType = CooperationType;
  }
}
export const actions = {
  async LoadCooperationTypeList(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/cooperation_type')
        .then(response => {
          state.commit('SET_COOPERATION_LIST_LIST', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }

}
