export const state = () => ({
  AdvetisingList: {
    job: [],
    category: [],
    work_category: [],
    province: [],
    city: [],
    Company: {},
  },
  Advetising: {
    money: [],
    HistoryJop: [],
    document: [],
    FildStudy: [],
    Gender: [],
    Soldier: [],
    job: [],
    category: [],
    work_category: [],
    province: [],
    city: [],
    Company: {
      Activity: [],
    },
  },
  AdvertisingSimilar : '' ,
  form :  {}
})

export const mutations = {
  SET_SEARCH_FORM ( state , formData) {
    state.form = formData
  } ,
  SET_ADVERTISING_LIST(state, AdvetisingList) {
    state.AdvetisingList = AdvetisingList;
  },
  SET_ADVERTISING(state, Advetising) {
    state.Advetising = Advetising;
  } ,
  SET_ADVERTISING_SIMILAR(state , AdvertisingSimilar) {
    state.AdvertisingSimilar = AdvertisingSimilar
  },
  ADD_RESUME_ADVERTISING ( state , id ) {
    state.Advetising.resumes.push({id : id , money : '' } )
  } ,
  SET_AD_LIKE (state , payload) {

    if(state.AdvetisingList.length  > 0)
    {
      let adver = state.AdvetisingList.find(ad => ad.id == payload.id)
      if(adver) adver.liked_users.push(payload.member)
    }

    let sad = state.AdvertisingSimilar.find(s => s.id === payload.id)
    if(sad) sad.liked_users.push(payload.member)

  } ,
  REMOVE_AD_LIKE ( state , payload) {

    if(state.AdvetisingList.length > 0) {
      let ad = state.AdvetisingList.find(ad => ad.id == payload.id)
      if(ad != undefined) {
        let member = ad.liked_users.indexOf(payload.member);
        ad.liked_users.splice( member , 1)
      }
    }
    let sad = state.AdvertisingSimilar.find(s => s.id == payload.id)
    if(sad) {
      let member = sad.liked_users.indexOf(payload.member);
      sad.liked_users.splice( member , 1)
    }

  } ,
  SET_AD_LIKE_SINGLE(state , payload) {
    state.Advetising.liked_users.push(payload.member)
  } ,
  REMOVE_AD_LIKE_SINGLE ( state , payload ) {
    let member = state.Advetising.liked_users.indexOf(payload.member);
    state.Advetising.liked_users.splice( member , 1)
  } ,
  ADD_RESUME_ADVERTISING_HOME ( state , payload) {

    let ad = state.AdvetisingList.find(ad => ad.id == payload.form.advertising)
    ad.resumes.push(payload.id)
  } ,

}



export const getters = {
  HasSent : state => (resume) =>  {
    if(state.Advetising.resumes)
      if(state.Advetising.resumes.find( x => x.id == resume))
        return true
    return false
  } ,
  filterDate : state => (date , date2) =>{
    if(date2 == '')
      return state.AdvetisingList.filter(item => item.created === date)
    else
      return state.AdvetisingList.filter(item => item.created >= date2 && item.created <= date )
  },
  getTenAdvertisings : state => {
    return state.AdvetisingList.slice(0 , 10)
  },
  getSpecialAdvertising : state => {
    return state.AdvetisingList.filter(item => item.special === true )
  } ,
  moneyGet : state => (resume) =>  {
    if(state.Advetising.resumes)
      if(state.Advetising.resumes.find( x => x.id == resume)) {
        let resumssse = state.Advetising.resumes.find( x => x.id == resume)
        return resumssse.money.title
      }
  } ,
  memberLikeAd : state => (member) => {
    if(state.Advetising.liked_users )
      return state.Advetising.liked_users.includes(member)
  },
  memberSentResume : state => (id , member) => {
    if(id && member && state.AdvetisingList) {
      let ad = state.AdvetisingList.find(ad => ad.id == id)
      return ad.resumes.includes(member)
    }
  } ,
  SimilarHasSent : state => (id ,member) =>  {
    if(id && member && state.AdvertisingSimilar) {
      let ad = state.AdvertisingSimilar.find(ad => ad.id == id)
      return ad.resumes.includes(member)
    }
  } ,
  LikedUsersList : state => (id , member) => {
    if(id && member && state.AdvetisingList) {
      let ad = state.AdvetisingList.find(ad => ad.id == id)
      return ad.liked_users.includes(member)
    }
  } ,
  LikedSimilarUsersList : state => (id , member) => {
    if(id && member && state.AdvetisingList) {
      let ad = state.AdvertisingSimilar.find(ad => ad.id == id)
      return ad.liked_users.includes(member)
    }
  } ,
  filteredAdvertsings  : (state) => (filter) => {
    if(Array.isArray(state.AdvetisingList ) && state.AdvetisingList) {

      return state.AdvetisingList.filter(item => {
        return filter.co.includes(item.CooperationType.id)
      })

    }
    // console.log(state.AdvetisingList.filter(item => {return filter.includes(item.CooperationType.id)}))
    // return state.AdvetisingList.filter(item => {return filter.includes(item.CooperationType.id)});
  },
  getCityById : (state) => (id) =>{
       let ad =  state.AdvetisingList.find(x => x.province.id == id)
       if(ad)
        return ad.province
        return null
  }


}

export const actions = {

  async LoadAdvertisingList(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/user/advertising/get' , payload )
        .then(response => {
          state.commit('SET_ADVERTISING_LIST', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  },
  async LoadAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/user/advertising/' + payload.id)
        .then(response => {
          state.commit('SET_ADVERTISING', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  } ,
  async LoadAdvertisingSimilar(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/user/advertising/getSame/' + payload.id)
        .then(response => {
          state.commit('SET_ADVERTISING_SIMILAR', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  } ,
  async sendResume(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/site/member/send-resume/${payload.id}`, payload.form)
        .then(success => {
          state.commit('ADD_RESUME_ADVERTISING', payload.id)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async sendResumeHome(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/site/member/send-resume/${payload.id}`, payload.form)
        .then(success => {
          state.commit('ADD_RESUME_ADVERTISING_HOME', payload)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async LikeAdvertising( state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          state.commit('SET_AD_LIKE', payload )
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async dislikeAdvertising(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.delete(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          state.commit('REMOVE_AD_LIKE', payload)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },

  async LikeAdvertisings(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          state.commit('SET_AD_LIKE_SINGLE', payload )
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async dislikeAdvertisings(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.delete(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          state.commit('REMOVE_AD_LIKE_SINGLE', payload)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async loadAdvertisingByCity(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/user/advertising/city/${payload.id}`)
        .then(response => {
          state.commit('SET_ADVERTISING_LIST', response.data.data)
          resolve(response)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },


}
