export const state = () => ({
    Jobs: [] ,
    adJobs : [] ,
    jobCategory  : [] ,
})

export const mutations = {
  SET_JOBS(state, Jobs) {
    state.Jobs = Jobs
  },
  SET_AD_JOBS(state, adJobs) {
    state.adJobs = adJobs
  } ,
  Get_AdJob_category  (state , id){
    const ad =  state.adJobs.find( x => x.id == id)
    if(ad && id != null)
      state.jobCategory  = ad.jobCategory
  },
}

export const getters = {
    getJobcategory : (state) => (id) =>{
      const ad =  state.Jobs.find( x => x.id == id)
      if(ad)
        return ad.jobCategory
    },
    workCategories : (state) => ( job , category) =>{
      var ad =  state.Jobs.find( x => x.id == job)
      if(ad)
        var cat = ad.jobCategory.find(x => x.id == category)
      if(cat)
        return cat.work_category
    },
    getAdJobcategory : (state) => (id) =>{
      const ad =  state.adJobs.find( x => x.id == id)
      if(ad && id != null)
        return ad.jobCategory
    },
    AdworkCategories : (state) => ( job , category) =>{
      var ad =  state.adJobs.find( x => x.id == job)
      if(ad && job != null)
        var cat = ad.jobCategory.find(x => x.id == category)
      if(cat && category != null)
        return cat.work_category
    },

}

export const actions = {
  async LoadJobs(state) {
    await this.$axios.get('api/v1/list-jobs')
        .then( async  (response ) => {
          await state.commit('SET_JOBS', response.data.data)
        })
        .catch(error =>   console.log(error))
  },
  async LoadAdJobs(state) {
    await this.$axios.get('api/v1/get-list-jobs')
        .then( async ( response ) => {
          await state.commit('SET_AD_JOBS', response.data.data)
        })
        .catch(error => console.log(error))
  },

}
