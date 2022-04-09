export const state = () => ({
  adminAdvertisings: [],
  adminAdvetising  : []
})

export const mutations = {
  SET_ADMIN_ADVERTISING : (state, adminAdvertisings)  => {
    state.adminAdvertisings = adminAdvertisings;
  } ,
  SET_ADMIN_SINGLE_ADVERTISING :  (state , advertising) => {
    state.adminAdvetising = advertising
  }
}

export const getters = {
  searchedCompanyAds: (state) => ( filter ) => {
    return   state.adminAdvertisings.filter(item => {return item.status.title.includes(filter)})
  },
}

export const actions = {


  async LoadAdminAdvertisings(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/advertising-admin')
        .then(response => {
          state.commit('SET_ADMIN_ADVERTISING', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,
  async LoadAdminAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/advertising-admin/' + payload.id)
        .then(response => {
          state.commit('SET_ADMIN_SINGLE_ADVERTISING', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  } ,

  async UpdateAdminAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/CAdvertisings/' + payload.ad.id, payload.ad)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },

}

