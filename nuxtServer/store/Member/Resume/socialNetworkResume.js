export const state = () => ({
  socialResume : {
    items : []
  }
})

export const getters = {
  socialResume: state => {
    if(state.socialResume.items.length == 0 ) {
      state.socialResume.items.push({
        link: '',
        social_network: '',
        type: 'create',
      })
      state.socialResume.items.push({
        link: '',
        social_network: '',
        type: 'create',
      })
    }
    return state.socialResume
  },
    countSocialResume: (state, getters) => {
    return getters.socialResume.items.length
  }
}

export const mutations = {
  ADD_CREATE_SOCIAL_RESUME (state) {
    state.socialResume.items.push({
      link: '',
      social_network: '',
      type: 'create',
    })
  },
  LOAD_SOCIAL_NETWORK_RESUME(state ,  socialResume)  {
    state.socialResume.items = socialResume
  } ,
  Delete_SOCIAL_NETWORK_RESUME(state ,  id)  {
    state.socialResume.items.splice(id , 1 )
  }
}

export const actions = {

  async loadSocialResume( state ) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/social-resume')
        .then(res => {
          state.commit('LOAD_SOCIAL_NETWORK_RESUME', res.data.data)
          resolve(res)
        }).catch(error => reject(error))
    });
  } ,

  async deleteSocialResume(state , payload ) {
    this.$axios.delete(`api/v1/member/social-resume/${payload.id}`)
      .then(
        state.commit( 'Delete_SOCIAL_NETWORK_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }

}
