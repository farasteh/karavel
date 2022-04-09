export const state = () => ({
  behavioralSkills: [],
})

export const mutations = {
  SET_COMPANY_BEHAVIORAL_SKILLS : (state, behavioralSkills)  => {
    state.behavioralSkills = behavioralSkills;
  } ,
}


export const actions = {
  async LoadCompanyBehavioralSkills(state) {
    this.$axios.get('api/v1/behavioralSkill/company')
      .then(response => {
        state.commit('SET_COMPANY_BEHAVIORAL_SKILLS', response.data.data)
      })
      .catch(error => console.log(error))
  } ,

}
