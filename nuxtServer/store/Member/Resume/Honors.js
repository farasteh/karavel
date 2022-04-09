export const state = () => ({
  HonorsResume: {
    items: []
  }
})

export const mutations = {
  SET_LOAD_HONORS(state, HonorsResume) {
    state.HonorsResume.items = HonorsResume
  } ,
  Delete_HONOR_RESUME ( state  , id) {
    state.HonorsResume.items.splice(id , 1)
  },
  ADD_CREATE_HONOR(state) {
    state.HonorsResume.items.push({
      title: '',
      date: '',
      type :'create',
    })
  }
}
export const getters = {
  HonorsResume: state => {
    if(state.HonorsResume.items.length == 0 ) {
      state.HonorsResume.items.push({
        title: '',
        date: '',
        type :'create',
      })
      state.HonorsResume.items.push({
        title: '',
        date: '',
        type :'create',
      })
    }
    return state.HonorsResume
  },
  CountHonors: (state, getters) => {
    return getters.HonorsResume.items.length
  }
}

export const actions = {
  async LoadHonorsResume(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/honors-resume')
        .then(response => {
          state.commit('SET_LOAD_HONORS', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  },
  async deleteHonorResume( state , payload ) {
    this.$axios.delete(`api/v1/member/honors-resume/${payload.id}`)
      .then(
        state.commit( 'Delete_HONOR_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }
}
