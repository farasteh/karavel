export const state = () => ({
  memberCompanyList: [],
})

export const mutations = {
  SET_MEMBER_COMPANY_LIST : (state, memberCompanyList)  => {
    state.memberCompanyList = memberCompanyList;
  } ,
}
export const actions = {
  async LoadMemberCompanylist(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/member/company`)
        .then(response => {
          state.commit('SET_MEMBER_COMPANY_LIST', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  },
}


