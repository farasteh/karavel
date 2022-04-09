export const state = () => ({
    User: {
      Company: [],
      member: [],
    },
  loggedIn : false
})

export const mutations = {
  SET_User(state, User) {
    state.User = User;
    state.loggedIn = true
  } ,
  SET_PDF(state , pdf)  {
    if(state.User.member && state.User.member.length != 0){
      state.User.member.file = pdf
    }
  },
  REMOVE_USER (state) {
    state.User = {
      Company: [],
      member: [],
    }
  } ,
  SET_COMPANY_LOGO(state , image)  {
    state.User.Company.logo =  image
  } ,
  SET_BASE_IMAGE_PRO(state , image)  {
    state.User.member.image =  image
  }
}
export const getters = {
  userRole : ( state ) => {
    if(state.User.role == 'Admin') {
      return  'Admin'
    }
    else if(state.User.Company && state.User.Company.length == 0
          && state.User.member && state.User.member.length == 0 ) {
      return ''
    }
    else if(state.User.member == null && typeof(state.User.Company) === "undefined" )
      return 'NOTMember'
    else if (state.User.Company == null && typeof(state.User.member) === "undefined")
      return 'NOTCompany'

    else if(state.User.Company && state.User.Company.length != 0){
      return  'Company'
    }
    else if(state.User.member && state.User.member.length != 0){
      return  'Member'
    }
    else
      return ''
  } ,
  Fullname : (state) => {
    if(state.User.member)
      if(state.User.member.length != 0 )
        return state.User.member.name +  ' '  +  state.User.member.last_name
    return  ''
  }

}

export const actions = {

  async LoadUser(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/user')
        .then(response => {
          state.commit('SET_User', response.data.data)

          resolve(response)
        })
        .catch(error => {
          console.log(error)
          reject(error)
        })
    })
  }

}



