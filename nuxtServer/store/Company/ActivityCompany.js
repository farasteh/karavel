export const state = () => ({
  ActivityCompany: [],
})

export const mutations = {
  SET_ACTIVITY_COMPANY(state, ActivityCompany) {
    state.ActivityCompany = ActivityCompany
  }
}

export const getters = {
  ActivityCompany: state => {
    return state.ActivityCompany
  }
}


export const actions = {


  async LoadActivityCompany(state) {
    this.$axios.get('api/v1/activity_company')
      .then(response => {
        state.commit('SET_ACTIVITY_COMPANY', response.data.data)
      })
      .catch(error => console.log(error))
  }

}
