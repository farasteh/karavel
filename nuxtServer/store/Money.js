export const state = () => ({
   MoneyList: []
})

export const mutations = {
    SET_MONEY_LIST(state, MoneyList) {
      state.MoneyList = MoneyList;
    }
}


export const actions = {

  async LoadMoneyList(state) {
    return new Promise((resolve, reject) => {
       this.$axios.get('api/v1/money')
        .then(response => {
          state.commit('SET_MONEY_LIST', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}
