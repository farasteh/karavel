export const state = () => ({
  noticedCompanies: {},
})

export const mutations = {
  SET_NOTICE_COMPNY ( state , noticedCompanies) {
    state.noticedCompanies = noticedCompanies
  } ,
}


export const actions = {
  async LoadNoticeCompany(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/getNoticedCompany')
        .then(response => {
          state.commit('SET_NOTICE_COMPNY', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  },

}
