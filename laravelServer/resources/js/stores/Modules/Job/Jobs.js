import Axios from "axios"

export default {
    state: {
        Jobs: [] ,
        adJobs : []
    },
    mutations: {
        SET_JOBS(state, Jobs) {
            state.Jobs = Jobs
        },
        SET_AD_JOBS(state, adJobs) {
            state.adJobs = adJobs
        }
    },
    getters: {
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

    },
    actions: {
        async LoadJobs({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/list-jobs')
                    .then(response => {
                        commit('SET_JOBS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
        async LoadAdJobs({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/get-list-jobs')
                    .then(response => {
                        commit('SET_AD_JOBS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
