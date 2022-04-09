export const state = () => ({
  CompanyAdvertizings: [],
  archievedAdvertisings :  [] ,
  CompanyAdvertising : []
})

export const mutations = {
  SET_COMPANY_ADVERTIZING : (state, CompanyAdvertizings)  => {
    state.CompanyAdvertizings = CompanyAdvertizings;
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
  } ,
  SET_COMPANY_SINGLE_ADVERTISING : (state , advertising) =>  {
    state.CompanyAdvertising = advertising
  }
}

export const getters = {
  advertizingStatusCount : (state) => (status , id ) =>{
    const ad =  state.CompanyAdvertizings.find( adver => adver.id == id)
    return ad.resumes.filter(resume => resume.status == status).length
  },
    selectedJobsAds: (state) => (filter , search ) => {
    let advertising = state.CompanyAdvertizings
    if(filter.length != 0)
      advertising =  advertising.filter(item => {return filter.includes(parseInt(item.job_id))});
    if(search)
      advertising =  advertising.filter(item => {return item.title.toLowerCase().includes(search.toLowerCase())})
    return advertising
  },
    resumesCompany: (state) => (id , filter) => {
    let ad = state.CompanyAdvertizings.find( x => x.id == id)
    if(filter.length != 0 )
      return ad.resumes.filter(item => {return filter.includes(parseInt(item.status))});
    return  ad.resumes
  },

    archieveAdvertizingStatusCount : (state) => (status , id ) =>{
    const ad =  state.archievedAdvertisings.find( adver => adver.id == id)
    return ad.resumes.filter(resume => resume.status == status).length
  },
    archieveSelectedJobsAds: (state) => (filter , search ) => {
    let advertising = state.archievedAdvertisings
    if(filter.length != 0)
      advertising =  advertising.filter(item => {return filter.includes(parseInt(item.job_id))});
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

}


export const actions = {

  async LoadCompanyAdvertizing(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/Advertising` )
        .then(response => {
          state.commit('SET_COMPANY_ADVERTIZING', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,

  async updateResumeStatus( state , payload ) {
    return new Promise((resolve, reject) => {
      this.$axios.put(`api/v1/resumes/${payload.id}` , payload.form)
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
  async LoadArchieveAdvertizing(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get(`api/v1/getArcheiveAd` )
        .then(response => {
          state.commit('SET_ARCHIEVE_ADVERTIZING', response.data.data)
          resolve(response)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,
  async deleteCompanyAdvertizing(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.delete('api/v1/Advertising/'+ payload.id )
        .then(success => {
          state.commit('DELETE_COMPANY_ADVERTIZING', payload)
          resolve(success)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,
  async restoreCompanyAdvertizing(state , payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/restoreAd/'+ payload.id )
        .then(success => {
          state.commit('RESTORE_COMPANY_ADVERTIZING', payload)
          resolve(success)
        })
        .catch(({error, status}) => {
          reject(error)
        });
    });
  } ,

  async LoadCompanySingleAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/Advertising/' + payload.id)
        .then(response => {
          state.commit('SET_COMPANY_SINGLE_ADVERTISING', response.data.data)
          resolve(response)
        })
        .catch(error =>  reject(error))
    });
  } ,

  async UpdateCompanyAdvertising(state, payload) {
    return new Promise((resolve, reject) => {
      this.$axios.put('api/v1/Advertising/' + payload.ad.id, payload.ad)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },
  async CreateCompanyAdvertising(state, payload) {
    console.log(payload)
    return new Promise((resolve, reject) => {
      this.$axios.post('api/v1/Advertising' , payload.ad)
        .then(success => {
          resolve(success)
        })
        .catch(({ error, status }) => {
          reject(error)
        });
    });
  },

}
