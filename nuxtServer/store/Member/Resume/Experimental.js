export const state = () => ({
    UpdateLoadExperimenta: {
      items: []
    }
})

export const mutations = {
  SET_LoadExperimenta(state, UpdateLoadExperimenta) {
    state.UpdateLoadExperimenta.items = UpdateLoadExperimenta
  } ,
  Delete_EXPERIMENTAL_RESUME (state , id) {
    state.UpdateLoadExperimenta.items.splice(id , 1)
  } ,
  ADD_CREATE_EXPERIMENTAL(state) {
    state.UpdateLoadExperimenta.items.push({
      name: '',
      level: '',
      type :'create',
    })
  }
}
export  const getters = {
  UpdateExperimental: state => {
    if(state.UpdateLoadExperimenta.items.length == 0 ) {
      state.UpdateLoadExperimenta.items.push({
        name: '',
        level: '',
        type :'create',
      })
      state.UpdateLoadExperimenta.items.push({
        name: '',
        level: '',
        type :'create',
      })
    }
    return state.UpdateLoadExperimenta
  },
    CountExperimental: (state, getters) => {
    return getters.UpdateExperimental.items.length
  }
}

export const actions = {

  async SkillInsert(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/skill-insert', payload)
        .then(success => {
          resolve(success)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  },
  async LoadExperimenta(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/load-experimenta')
        .then(response => {
          state.commit('SET_LoadExperimenta', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },

  async deleteExperimental( state , payload ) {
    this.$axios.delete(`api/v1/member/experimenta/${payload.id}`)
      .then(
        state.commit( 'Delete_EXPERIMENTAL_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }
}
