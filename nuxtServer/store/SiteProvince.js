export const state = () => ({
  siteProvinces: [],
})

export const mutations = {
    SET_SITE_PROVINCES(state, provinces) {
      state.siteProvinces = provinces
      let ad =  state.siteProvinces.find(ad => ad.title == 'همه استان ها')
      if(ad == undefined)
        state.siteProvinces.unshift({id : null , title  : 'همه استان ها'})
    } ,
}

export const getters = {
  siteProvinces : state => {
    if(state.siteProvinces)
    {
      let proveinces  = state.siteProvinces
      let ad = proveinces.find(ad => ad.title == 'همه استان ها')
      if(ad == undefined)
        proveinces.unshift({id : null , title  : 'همه استان ها'})
      return proveinces
    }
    return state.siteProvinces
  } ,
}


export const actions = {

  async LoadSiteProvinces(state) {
      await this.$axios.get('api/v1/province')
        .then(async ( response ) => {
          await state.commit('SET_SITE_PROVINCES', response.data.data)
        })
        .catch(error => console.log(error))
  }

}
