export const state = () => ({
    provinces: [],
})

export const mutations = {
    SET_PROVINCES(state, provinces) {
      state.provinces = provinces
    }
}

export const getters = {
  provinces: state => {
    return state.provinces
  } ,
    SearchProvince : state => {
    // if(state.provinces)
    // {
    //     let proveinces  = state.provinces
    //     let ad = proveinces.find(ad => ad.title == 'همه')
    //     if(ad == undefined)
    //         proveinces.unshift({id : null , title  : 'همه'})
    //     return proveinces
    // }
    return state.provinces
  } ,
    getCities : state => (id) => {
    const province =  state.provinces.find(x => x.id == id)
    if(province)
      return province.cities
  } ,
  getProvinceById : state => (id) => {
    const province =  state.provinces.find(x => x.id == id)
    if(province)
      return province
  }
}


export const actions = {

  async LoadProvinces(state) {
      await this.$axios.get('api/v1/province')
        .then(async (response) => {
          await state.commit('SET_PROVINCES', response.data.data)
        })
        .catch(error => console.log(error))
  }
}
