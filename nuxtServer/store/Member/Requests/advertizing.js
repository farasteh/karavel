export const state = () => ({
  memberAdvertizingList: [],
  memberAdvertizing: ''
})

export const mutations = {
  SET_MEMBER_ADVERTIZING : (state, memberAdvertizingList)  => {
    state.memberAdvertizingList = memberAdvertizingList;
  } ,
  SET_MEMBER_ADVERTIZING_SINGLE : (state, memberAdvertizing)  => {
    state.memberAdvertizing = memberAdvertizing;
  } ,
  PUT_COMPANY_ADVERTIZING : (state , payload ) => {

  }
}


export const getters = {
    resumeadvertizingStatusCount : (state) => (status , id ) =>{
      return state.memberAdvertizingList.filter(ad => ad.status.id == status).length
    } ,
    resumeStatusAd: (state) => (filter) => {
      return state.memberAdvertizingList.filter(item => {return filter.includes(item.status.id)});
    },
}

export const actions = {
  async LoadMemberAdvertizing(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/member/advertizing`)
        .then(response => {
          state.commit('SET_MEMBER_ADVERTIZING', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  },
  async LoadMemberAdvertizingSingle(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/member/advertizing/${payload.id}`)
        .then(response => {
          state.commit('SET_MEMBER_ADVERTIZING_SINGLE', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });

  },

}


