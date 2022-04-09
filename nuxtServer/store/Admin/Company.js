export const state = () => ({
  adminCompanies: [],
  adminCompany : []
})

export const mutations = {
  SET_ADMIN_COMPANIES : (state, adminCompanies)  => {
    state.adminCompanies = adminCompanies;
  } ,
  SET_ADMIN_COMPANY : ( state ,adminCompany ) => {
    state.adminCompany = adminCompany
  } ,
  UPDATE_ADMIN_COMPANY : (state , payload) => {

  }
}

export const getters = {
  searchedCompanies: (state) => ( search ) => {
    let companies = state.adminCompanies
    if (search)
    {
      companies =  companies.filter(item =>
      {
        return item.name_fa.toLowerCase().includes(search.toLowerCase()) || item.name_en.toLowerCase().includes(search.toLowerCase())
      })
    }
    return companies
  },
    GetCompanyAdmin: (state) => ( id ) => {
    return state.adminCompanies.find(x => x.id == parseInt(id))
  },
}


export const actions = {

  async LoadAdminCompanies(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/company-admin')
        .then(response => {
          state.commit('SET_ADMIN_COMPANIES', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,
  async LoadAdminCompany(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/company-admin/${payload.id}`)
        .then(response => {
          state.commit('SET_ADMIN_COMPANY', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,
  async updateAdminCompany(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put(`api/v1/company-admin/${payload.id}` , payload.form)
        .then(response => {
          state.commit('UPDATE_ADMIN_COMPANY', payload.form)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

}
