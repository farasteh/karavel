export const state = () => ({
  posibilities: [],
})

export const mutations = {
  SET_COMPANY_POSIBILITY : (state, posibilities)  => {
    state.posibilities = posibilities;
  } ,
}


export const actions = {

  async LoadCompanyPosibilities(state) {
    this.$axios.get('api/v1/posibility/company')
      .then(response => {
        state.commit('SET_COMPANY_POSIBILITY', response.data.data)
      })
      .catch(error => console.log(error))
  } ,

}
