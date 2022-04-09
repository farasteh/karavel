export const state = () => ({
  staffList :[]
})

export const mutations = {
  SET_COMPANY_STAFF_LIST(state, staffs) {
    state.staffList = staffs
  } ,

}

export const actions = {
  async LoadCompanyStaff(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/company/staff/requests')
        .then(response => {
          state.commit('SET_COMPANY_STAFF_LIST', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
}
