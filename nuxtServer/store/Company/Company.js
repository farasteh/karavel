export const state = () => ({
  Company: [],
  CompanyJobs :[]
})

export const mutations = {
  SET_COMPANY_TAGS(state, Company) {
    state.Company = Company
  } ,
  SET_COMPANY_JOBS (state , jobs) {
    state.CompanyJobs = jobs
  } ,
  REMOVE_COMPANY_PRO (state) {
    state.Company= []
    state.CompanyJobs = []
  } ,
}

export const getters = {
  Company: state => {
    return state.Company
  }
}
export const actions = {
  async LoadCompanyUser(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/getCompany')
        .then(response => {
          state.commit('SET_COMPANY_TAGS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
  async EditCompany(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/company/' + payload.id, payload)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  CREATE_ACTIVIY_COMPANY(state, payload) {
     return  this.$axios.post('api/v1/company', payload)
        .then(success => {
          console.log('success')
        })
        .catch(({ error, status }) => {
         console.log(error)
        });

  },
  loadCompanyJobs (state , payload ) {
      return  this.$axios.get(`api/v1/getCompanyJob/${payload.id}`)
        .then(response => {
          state.commit('SET_COMPANY_JOBS', response.data.data)
        })
        .catch(({ error }) => {
         console.log(error)
        });
  },

}
