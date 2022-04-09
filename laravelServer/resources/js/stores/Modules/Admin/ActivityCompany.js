import axios from 'axios'


export default {
    state: {
        activityCompanies: [],
    },
    mutations: {
        SET_ACTIVITY_COMPANIES : (state, activityCompanies)  => {
            state.activityCompanies = activityCompanies;
        } , 
        Delete_ACTIVITY_COMPANY : (state ,  id) => {
        
            state.activityCompanies.splice( id , 1 )
        },
        Update_ACTIVITY_COMPANY: (state, payload) => {
            const activity = state.activityCompanies.find(s => s.id === payload.id)
            activity.title = payload.title
        } , 
        STORE_ACTIVITY_COMPANY : (state  , data) => {
            state.activityCompanies.push(data)
        }
    },
    getters: {

    },
    actions: {
        async LoadActivityCompanies({ commit }) {
            axios.get('api/v1/activityCompany')
                .then(response => {
                    commit('SET_ACTIVITY_COMPANIES', response.data.data)
                })
                .catch(error => console.log(error))
        } , 
        async storeActivityCompany ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.post('api/v1/activityCompany', payload)
                    .then(response => {
                        commit('STORE_ACTIVITY_COMPANY', response.data.data.activity)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });

        } , 
        async deleteActivityCompany( {commit} , payload ) {
            return new Promise((resolve, reject) => {
                axios.delete(`api/v1/activityCompany/${payload.id}`)
                    .then( success => {
                        commit( 'Delete_ACTIVITY_COMPANY' , payload.index)
                        resolve(success)
                    }) 
                    .catch ( error => {
                        reject(error)
                    })
            })
        } , 
        async updateActivityCompany( {commit} , payload ) {
            return new Promise((resolve, reject) => {
                axios.put(`api/v1/activityCompany/${payload.id}` , payload)
                    .then( response => {
                        commit( 'Update_ACTIVITY_COMPANY' , payload )
                        resolve(response)
                    }) 
                    .catch ( error => {
                        reject(error)
                    })
            });
        }
    }
}