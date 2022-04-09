export const state = () => ({
  Project: {
    items: []
  }
})

export const mutations = {
  SET_LOAD_PROJECT(state, Project) {
    state.Project.items = Project
  },
  Delete_PROJECT_RESUME ( state  , id) {
    state.Project.items.splice(id , 1)
  } ,
  ADD_CREATE_PROJECT(state) {
    state.Project.items.push({
      title: '',
      company: '',
      link: '',
      comment: '',
      date: '',
      type :'create',
    })
  }
}
export const getters = {
  Project: state => {
    if(state.Project.items.length == 0 ) {
      state.Project.items.push({
        title: '',
        company: '',
        link: '',
        comment: '',
        date: '',
        type :'create',
      })
    }
    return state.Project
  },
  CountProject: (state, getters) => {
    return getters.Project.items.length
  }
}

export const actions = {
  async LoadProjectResume(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/load-project')
        .then(response => {
          state.commit('SET_LOAD_PROJECT', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
  async ProjectResumeInsert(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/member/load-project', payload)
        .then(success => {
          resolve(success)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  },
  async deleteProjectResume( state , payload ) {
    this.$axios.delete(`api/v1/member/load-project/${payload.id}`)
      .then(
        state.commit( 'Delete_PROJECT_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }
}
