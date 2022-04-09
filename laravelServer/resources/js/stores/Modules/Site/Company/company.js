import Axios from "axios"

export default {
    state: {
        siteCompanies: {},

    },
    mutations: {
        SET_SITE_COMPNY ( state , siteCompanies) {
            state.siteCompanies = siteCompanies
        } ,
        SITE_SET_AD_LIKE ( state , payload) {
            let ad = state.siteCompanies.advertisings.find(ad => ad.id == payload.id)
            ad.liked_users.push(payload.member)
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
    },
    getters: {
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
    },
    actions: {
        async LoadSiteCompany({ commit } , payload ) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/SiteCompany/' + payload.id)
                    .then(response => {
                        commit('SET_SITE_COMPNY', response.data.data)
                        resolve(response)
                    })
                    .catch(error =>  reject(error))
            });
        },
        async SiteLikeAdvertising({ commit } , payload)  {
            return new Promise((resolve, reject) => {
                Axios.post(`api/v1/member/ads/like/${payload.id}`)
                    .then(success => {
                        console.log( payload.id , payload.member)
                        commit('SITE_SET_AD_LIKE', payload )
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async SitedislikeAdvertising({ commit } , payload)  {
            return new Promise((resolve, reject) => {
                Axios.delete(`api/v1/member/ads/like/${payload.id}`)
                    .then(success => {
                        commit('SITE_REMOVE_AD_LIKE', payload)
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async SitesendResumeHome({ commit } , payload)  {
            return new Promise((resolve, reject) => {
                Axios.post(`api/v1/site/member/send-resume/${payload.id}`, payload.form)
                    .then(success => {
                        commit('SITE_ADD_RESUME_ADVERTISING', payload)
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
    }
}
