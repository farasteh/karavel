export const state = () => ({
  siteCompanies: {},
})

export const mutations = {
  SET_SITE_COMPNY ( state , siteCompanies) {
    state.siteCompanies = siteCompanies
  } ,
  SITE_SET_AD_LIKE ( state , payload) {
   // let ad = state.siteCompanies.advertisings.find(ad => ad.id == payload.id)
    console.log(state.siteCompanies)
   // ad.liked_users.push(payload.member)
  } ,
  SITE_REMOVE_AD_LIKE( state , payload) {
    let ad = state.siteCompanies.advertisings.find(ad => ad.id == payload.id)
    let member = ad.liked_users.indexOf(payload.member);
    ad.liked_users.splice( member , 1)
  } ,
  SITE_ADD_RESUME_ADVERTISING  ( state , payload) {
    let ad = state.siteCompanies.advertisings.find(ad => ad.id == payload.form.advertising)
    ad.resumes.push(payload.id)
  }
}

export const getters = {
  SiteLikedUsersList  : state => (id , member) => {
    if(id && member && state.siteCompanies.advertisings) {
      let ad = state.siteCompanies.advertisings.find(ad => ad.id == id)
      return ad.liked_users.includes(member)
    }
  } ,
  SitememberSentResume: state => (id , member) => {
    if(id && member && state.siteCompanies.advertisings) {
      let ad = state.siteCompanies.advertisings.find(ad => ad.id == id)
      return ad.resumes.includes(member)
    }
  } ,
}

export const actions = {

  async LoadSiteCompany(state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/SiteCompany/' + payload.id)
        .then(response => {
          state.commit('SET_SITE_COMPNY', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  },
  async SiteLikeAdvertising(state , payload)  {

      return this.$axios.post(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          console.log( payload.id , payload.member)
          state.commit('SITE_SET_AD_LIKE', payload )
        })
        .catch(({ error, status }) => {
          console.log(error)
        });

  },
  async SitedislikeAdvertising(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.delete(`api/v1/member/ads/like/${payload.id}`)
        .then(success => {
          state.commit('SITE_REMOVE_AD_LIKE', payload)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async SitesendResumeHome(state , payload)  {
    return new Promise((resolve, reject) => {
      this.$axios.post(`api/v1/site/member/send-resume/${payload.id}`, payload.form)
        .then(success => {
          state.commit('SITE_ADD_RESUME_ADVERTISING', payload)
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
}
