export const state = () => ({
  CategoryJobs: [],
  CategoryJobsFilter: [],
})

export const mutations = {
  SET_CATEGORYJOBS(state, CategoryJobs) {
    state.CategoryJobs = CategoryJobs
  },
}
export const getters = {
  // Jobs: state => {
  //     return state.CategoryJobs
  // },
  getCategroyJobs: (state) => (id) => {
    return state.CategoryJobs.find(CategoryJobs => CategoryJobs.job === id);
  }
}

export const actions = {

  async LoadCategoryJobs(state, payload) {
    this.$axios.get('api/v1/list-jobs-category/' + payload.id)
      .then(response => {
        state.commit('SET_CATEGORYJOBS', response.data.data)
      })
      .catch(error => console.log(error))
  }

}
