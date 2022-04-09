export const state = () => ({
  user     : { mobile : '' , name : '' , password : '' , confirmed : ''},
  Auth     : '',
  send_sms : ''
})

export const mutations = {
    SET_AUTH : (state , Auth) => {
      state.Auth  = Auth;
    },
    SET_SMS_SEND : (state , sendSMS) =>{
      state.send_sms = sendSMS;
    },
    RESET_AUTH(state) {
      state.user = { mobile : '' , name : '' , password : '' , confirmed : ''}
      state.Auth = ''
      state.send_sms = ''
    },
  CHANGE_USER(state , form ) {
     state.user.mobile = form.mobile
      state.user.password = form.pass
  } ,
  CHANGE_PASS ( state , pass) {
      state.user.password = pass
  },
  CHANGE_MOBILE ( state , mobile) {
    state.user.mobile = mobile
  }
}


export const actions = {
  async CheckMobile( state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/login/check-mobile', payload)
        .then( success => {
          state.commit('SET_AUTH' , success.data.data);
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async CheckCodeSMS( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/login/check-code', payload)
        .then( success => {
          state.commit('SET_SMS_SEND' , success.data.data.verifyMobile);
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async LoginUser( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/login-user', payload)
        .then( success => {
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async Register( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/register', payload)
        .then( success => {
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async SendSMS( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/send-sms', payload)
        .then( success => {
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async loginSMS( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/login-sms', payload)
        .then( success => {
          resolve(success)
        })
        .catch(error => {
          reject(error)
        })
    });
  },
  async updatePassword( state , payload){
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/update-password', payload)
        .then( success => {resolve(success)})
        .catch(error => {reject(error)})
    });
  },
}
