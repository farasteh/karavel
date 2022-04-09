export const state = () => ({
  statusList: [],
})


export const mutations = {
  SET_STATUS : (state, statusList)  => {

    state.statusList = statusList;
  }
}

export const getters = {

  getStatusTitle : (state) => id => {
    let status = state.statusList.find(x => x.id == id)
    return status.title
  }
}


export const actions = {
  async LoadStatus(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/status`)
        .then(response => {
          state.commit('SET_STATUS', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,


}

