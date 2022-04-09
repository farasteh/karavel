export const state = () => ({
  likedAds: []
})

export const mutations = {
  LOAD_LIKED_ADDS ( state , likedAds ) {
    state.likedAds = likedAds
  },
  DELETE_LIKE_ADDS(state , id)  {
    state.likedAds.splice(id, 1)
  }
}
export const getters = {
  memberSentLikedResume : state => (id , member) => {
    if(id && member && state.likedAds) {
      let ad = state.likedAds.find(ad => ad.id == id)
      return ad.resumes.includes(member)
    }
  } ,
}

export const actions = {
  async loadLikedAds( state )  {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/member/ads/like` )
        .then(res => {
          state.commit( 'LOAD_LIKED_ADDS' , res.data.data)
          resolve(res)
        }).catch(err => {
        reject(err)
      })
    });
  } ,

  async deleteLikeAds( state , payload){
    return new Promise((reject) => {
      this.$axios.delete(`api/v1/member/ads/like/${payload.ad_id}`  )
        .then(
          state.commit('DELETE_LIKE_ADDS'  , payload.index)

        ).catch(err => {
        reject(err)
      })
    });
  }

}
