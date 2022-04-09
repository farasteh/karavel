import axios from 'axios'


export default {
    state: {

    },
    mutations: {

    },
    getters: {

    },
    actions: {
        async setCompanyNotice({ commit }, payload) {
            return new Promise((resolve, reject) => {
                axios.post('api/v1/company-notice', payload.form)
                    .then(response => {resolve(response)})
                    .catch(error => console.log(error));
            });
        } ,
        async DeleteCompanyNotice ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.delete('api/v1/company-notice/'+payload.id)
                    .then(response => {resolve(response)})
                    .catch(({error, status}) => {reject(error)});
            });
        } ,
        async UpdateCompanyNotice ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.put('api/v1/company-notice/'+payload.id , payload.form)
                    .then(response => {resolve(response)})
                    .catch(({error, status}) => {reject(error)});
            });
        } ,
    }
}
