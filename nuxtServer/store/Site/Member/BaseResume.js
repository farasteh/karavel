export const state = () => ({
  Member: {
    name: '',
    last_name: '',
    email: '',
    mobile: ''
  },
})

export const mutations = {
  SET_SITE_BASE_RESUME(state, Member) {
    state.Member = Member
  }
}


export const actions ={
  async LoadSiteBaseResume(state) {
  this.$axios.get('api/v1/site/member/resume-base')
    .then(response => {
      state.commit('SET_SITE_BASE_RESUME', response.data.data)
    })
    .catch(error => console.log(error))
},
}
