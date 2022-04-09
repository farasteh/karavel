export const state = () => ({
  StaffList: [],
  form  : {} ,
  staff : {} ,
  similarStaffList : []
})

export const mutations = {
  SET_STAFF_SEARCH_FORM ( state , formData) {
    state.form = formData
  } ,
  SET_STAFF_LIST(state, StaffList) {
    state.StaffList = StaffList;
  },
  SET_STAFF(state , staff) {
    state.staff = staff
  } ,
  ADD_STAFF_COMPANY(state , id) {
    state.staff.companies.push(id)
  } ,
  SET_SIMILAR_STAFF_LIST (state , staffList) {
    state.similarStaffList = staffList
  }
}

export const getters = {
  companySendRequest : state => (id , company) => {
    if(id && company && state.StaffList) {
      let staff = state.StaffList.find(staff => staff.id == id)
      return staff.companies.includes(company)
    }
  } ,
  singleCompanySendRequest : state => (company) => {

    if(company && state.staff) {
      return state.staff.companies.includes(company)
    }
  } ,
  SimilarRequestHasSent : state => (id ,company) =>  {
    if(id && company && state.similarStaffList) {
      let staff = state.similarStaffList.find(st => st.id == id)
      return staff.companies.includes(company)
    }
  } ,
}

export const actions = {

  async LoadStaffList(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/user/staff/get' , payload )
        .then(response => {
          state.commit('SET_STAFF_LIST', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  },
  async LoadStaff(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/site/pdfResult/' + payload.id )
        .then(response => {
          state.commit('SET_STAFF', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  },
  async sendRequest(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/site/company/send-request/${payload.company}/${payload.resume}`)
        .then(success => {
          state.commit('ADD_STAFF_COMPANY', payload.company)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async loadSimilarStaff(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/user/staff/getSame/${payload.id}`)
        .then(response => {
          state.commit('SET_SIMILAR_STAFF_LIST', response.data.data)
          resolve(response)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },

}
