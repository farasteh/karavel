export const state = () => ({
  Base: {
    image: '',
    name: '',
    last_name: '',
    job: '',
    category_job: '',
    work_job: '',
    gender: '',
    marital_status: '',
    soldier: '',
    birth_date: '',
    email: '',
    mobile: '',
    phone: '',
    site: '',
    province: '',
    city: '',
    address: '',
    comment: '',
  },
  result : {}
})

export const mutations = {
  SET_BASE_RESUME(state, Base) {
    state.Base = Base
  } ,
  GET_RESUME_RESULT (state , result) {
    state.result  = result
  } ,
  REMOVE_BASE_RESUME (state) {
    state.Base = {
      image: '',
      name: '',
      last_name: '',
      job: '',
      category_job: '',
      work_job: '',
      gender: '',
      marital_status: '',
      soldier: '',
      birth_date: '',
      email: '',
      mobile: '',
      phone: '',
      site: '',
      province: '',
      city: '',
      address: '',
      comment: '',
    }
  } ,
  CHANGE_DISABLE_CONTACT(state) {
    // state.Base.contact_status = !state.Base.contact_status
  },
  CHANGE_DISABLE_SMS(state) {
    state.Base.sms_status = !state.Base.sms_status
  }
}
export const getters = {
  Base: state => {
    return state.Base
  } ,
}

export const actions = {


  async LoadBaseResume(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/resume-base')
        .then(response => {
          state.commit('SET_BASE_RESUME', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
  async CreateBaseResume(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/resume-base', payload)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async UpdateBaseResume(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/update-insert-resume/' + payload.base.id, payload)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async UpdateBase(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/member/resume-base/' + payload.base.id, payload.base)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async LoadReultResume(state) {
    this.$axios.get('api/v1/member/resume-result')
      .then(response => {
        state.commit('GET_RESUME_RESULT', response.data.data)
      })
      .catch(error => console.log(error))
  },
  async changeContactStatus(state) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/member/resume-base/contact/change')
        .then(response => {
          state.commit('CHANGE_DISABLE_CONTACT')
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
  async changeSMSStatus(state) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/member/resume-base/sms/change')
        .then(response => {
          state.commit('CHANGE_DISABLE_SMS')
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },

}
