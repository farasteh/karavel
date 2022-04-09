export const state = () => ({
  CategoryWork: [],
})

export const mutations = {
  SET_CATEGORYWORK(state, CategoryWork) {
    state.CategoryWork = CategoryWork
  },
}


export const actions = {
  async LoadCategoryWork(state, payload) {
    this.$axios.get('api/v1/list-work-category/' + payload.id)
      .then(response => {
        state.commit('SET_CATEGORYWORK', response.data.data)
      })
      .catch(error => console.log(error))
  }

}

