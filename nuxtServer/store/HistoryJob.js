export const state = () => ({
   HistoryList: []
})

export const mutations = {
    SET_HISTORY_LIST(state, HistoryList) {
      state.HistoryList = HistoryList;
    }
}
export const actions = {
    async LoadHistoryList(state) {
      return new Promise((resolve, reject) => {
        this.$axios.get('api/v1/history_job')
          .then(response => {
            state.commit('SET_HISTORY_LIST', response.data.data)
            resolve(response)
          })
          .catch(error => reject(error))
      });
    }
}

