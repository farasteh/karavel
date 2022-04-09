export const state = () => ({
  telegramAdvertisings : []
})

export const mutations = {
  SET_TELEGRAM_ADVERTISINGS : (state, telegramAdvertisings) => {
    state.telegramAdvertisings = telegramAdvertisings;

  } ,
  ADD_ADVERTISING_TO_TELEGRAM : ( state , advertisingId )  => {
    var advertising = state.telegramAdvertisings.advertisings.find( x => x.id == advertisingId)
    advertising.telegram = true
  } ,
  ADD_USER_TO_TELEGRAM : (state , userId ) => {
    var user = state.telegramAdvertisings.users.find( x => x.id == userId)
    user.telegram = true
  }
}

export const getters = {
  telegramUserAds: (state) => {
    var users  = state.telegramAdvertisings.users
    var advertisings  = state.telegramAdvertisings.advertisings
    var mergedData = users.concat(advertisings);
    mergedData  = mergedData.slice().sort(function(b , a) {
      return new Date(a.created)  - new Date(b.created);
    });
    return  mergedData
  },
}


export const actions = {

  async LoadTelegramAdvertising(state) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/admin/telegram/advertisings`)
        .then(response => {
          state.commit('SET_TELEGRAM_ADVERTISINGS', response.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

  async AddAdvertisingTelegram (state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/telegram/advertising/${payload.id}`)
        .then(response => {
          state.commit('ADD_ADVERTISING_TO_TELEGRAM', payload.id)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  } ,

  async AddUserTelegram (state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/telegram/resume/${payload.id}`)
        .then(response => {
          state.commit('ADD_USER_TO_TELEGRAM', payload.id)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  }
}


