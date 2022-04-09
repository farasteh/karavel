import axios from 'axios'


export default {
    state: {
        CompanyAdvertizings: [],
        archievedAdvertisings :  [] ,
    },
    mutations: {
        SET_COMPANY_ADVERTIZING : (state, CompanyAdvertizings)  => {
            state.CompanyAdvertizings = CompanyAdvertizings;
        } ,

        PUT_COMPANY_ADVERTIZING : (state , payload ) => {

        } ,
        PUT_RESUME_STATUS : (state , payload ) => {
            let ad = state.CompanyAdvertizings.find( x => x.id == payload.id)
            const resume = ad.resumes.find(s => s.id === payload.form.resume)
            resume.status = payload.form.status
            resume.comment  = payload.form.comment
            resume.Companycomment = payload.form.Companycomment
        } ,
        SET_ARCHIEVE_ADVERTIZING ( state , archievedAdvertisings) {
            state.archievedAdvertisings  = archievedAdvertisings
        }  ,
        DELETE_COMPANY_ADVERTIZING ( state , payload) {
            let ad = state.CompanyAdvertizings.find( x => x.id == payload.id)
            let index = state.CompanyAdvertizings.indexOf(ad)
            state.archievedAdvertisings.push(ad)
            state.CompanyAdvertizings.splice(index  , 1)
        } ,
        RESTORE_COMPANY_ADVERTIZING  (state , payload) {
            let ad = state.archievedAdvertisings.find( x => x.id == payload.id)
            let index = state.archievedAdvertisings.indexOf(ad)
            state.CompanyAdvertizings.push(ad)
            state.archievedAdvertisings.splice(index  , 1)
        }
    },
    getters: {
        advertizingStatusCount : (state) => (status , id ) =>{
            const ad =  state.CompanyAdvertizings.find( adver => adver.id == id)
            return ad.resumes.filter(resume => resume.status == status).length
        },
        selectedJobsAds: (state) => (filter , search ) => {
            let advertising = state.CompanyAdvertizings
            if(filter.length != 0)
                advertising =  advertising.filter(item => {return filter.includes(item.job_id)});
            if(search)
                advertising =  advertising.filter(item => {return item.title.toLowerCase().includes(search.toLowerCase())})
            return advertising
        },
        resumesCompany: (state) => (id , filter) => {
            let ad = state.CompanyAdvertizings.find( x => x.id == id)
            if(filter.length != 0 )
                return ad.resumes.filter(item => {return filter.includes(item.status)});
            return  ad.resumes
        },

        archieveAdvertizingStatusCount : (state) => (status , id ) =>{
            const ad =  state.archievedAdvertisings.find( adver => adver.id == id)
            return ad.resumes.filter(resume => resume.status == status).length
        },
        archieveSelectedJobsAds: (state) => (filter , search ) => {
            let advertising = state.archievedAdvertisings
            if(filter.length != 0)
                advertising =  advertising.filter(item => {return filter.includes(item.job_id)});
            if(search)
                advertising =  advertising.filter(item => {return item.title.toLowerCase().includes(search.toLowerCase())})
            return advertising
        },
        archieveResumesCompany: (state) => (id , filter) => {
            let ad = state.archievedAdvertisings.find( x => x.id == id)
            if(filter.length != 0 )
                return ad.resumes.filter(item => {return filter.includes(item.status)});
            return  ad.resumes
        },

    },
    actions: {
        async LoadCompanyAdvertizing({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/Advertising` )
                    .then(response => {
                        commit('SET_COMPANY_ADVERTIZING', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,

        async updateResumeStatus( {commit} , payload ) {
            return new Promise((resolve, reject) => {
                axios.put(`api/v1/resumes/${payload.id}` , payload.form)
                    .then( response => {
                        console.log(payload)
                       // commit( 'PUT_RESUME_STATUS' , payload )
                        resolve(response)
                    })
                    .catch ( error => {
                        reject(error)
                    })
            });
        } ,
        async LoadArchieveAdvertizing({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/getArcheiveAd` )
                    .then(response => {
                        commit('SET_ARCHIEVE_ADVERTIZING', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,
        async deleteCompanyAdvertizing({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.delete('api/v1/Advertising/'+ payload.id )
                    .then(success => {
                        commit('DELETE_COMPANY_ADVERTIZING', payload)
                        resolve(success)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,
        async restoreCompanyAdvertizing({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get('api/v1/restoreAd/'+ payload.id )
                    .then(success => {
                        commit('RESTORE_COMPANY_ADVERTIZING', payload)
                        resolve(success)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,

    }
}
