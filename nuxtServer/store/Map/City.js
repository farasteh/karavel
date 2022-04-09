export const state = () => ({
  citys: [],
  cityIndex: [],
  cityAll:[]
})

export const mutations = {
  SET_CITY(state, citys) {
    state.citys = citys
  },
  SET_CITY_INDEX(state,cityIndex){
    state.cityIndex[cityIndex.index] = cityIndex['response'];
  },
  SET_CITY_ALL(state,cityAll){
    state.cityAll = cityAll
  }
}
export const getters = {
  citys: state => {
    return state.provinces
  },
    getCityAll: (state) => (id) => {
    return state.cityAll.filter(index => index.province_id == id)
  }
}

export const actions = {

  async LoadCity(state, payload) {
    this.$axios.get('api/v1/city/' + payload.id)
      .then(response => {
        state.commit('SET_CITY', response.data.data)
      })
      .catch(error => console.log(error))
  },
  async LoadCityIndex(state, payload) {
    this.$axios.get('api/v1/city/' + payload.id)
      .then(response => {
        state.commit('SET_CITY_INDEX', {'response' : response.data.data , 'index' : payload.id})
      })
      .catch(error => console.log(error))
  },
  async LoadCityAll(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/city-all')
        .then(response => {
          state.commit('SET_CITY_ALL', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    })
  }
}
