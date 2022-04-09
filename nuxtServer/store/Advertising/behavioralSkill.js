export const state = () => ({
  behavioralSkills: [],
})

export const mutations = {
  SET_BEHAVIORAL_SKILLS : (state, behavioralSkills)  => {
    state.behavioralSkills = behavioralSkills;
  } ,
  Delete_BEHAVIORAL_SKILLS : (state ,  id) => {

    state.behavioralSkills.splice( id , 1 )
  },
  Update_BEHAVIORAL_SKILLS: (state, payload) => {
    const skill = state.behavioralSkills.find(s => s.id === payload.id)
    skill.title = payload.title
  } ,
  STORE_BEHAVIORAL_SKILL : (state  , data) => {
    state.behavioralSkills.push(data)
  }
}


export const actions = {

  async LoadBehavioralSkills(state) {
    this.$axios.get('api/v1/behavioralSkill')
      .then(response => {
        state.commit('SET_BEHAVIORAL_SKILLS', response.data.data)
      })
      .catch(error => console.log(error))
  } ,
  async storeBehavioralSkill ( state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/behavioralSkill', payload)
        .then(response => {
          state.commit('STORE_BEHAVIORAL_SKILL', response.data.data.skill)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });

  } ,
  async deleteBehavioralSkill(state, payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.delete(`api/v1/behavioralSkill/${payload.id}`)
        .then( success => {
          state.commit( 'Delete_BEHAVIORAL_SKILLS' , payload.index)
          resolve(success)
        })
        .catch ( error => {
          reject(error)
        })
    })
  } ,
  async updateBehavioralSkill( state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.put(`api/v1/behavioralSkill/${payload.id}` , payload)
        .then( response => {
          state.commit( 'Update_BEHAVIORAL_SKILLS' , payload )
          resolve(response)
        })
        .catch ( error => {
          reject(error)
        })
    });
  }

}
