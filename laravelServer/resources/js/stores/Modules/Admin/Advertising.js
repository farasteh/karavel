import axios from 'axios'


export default {
    state: {
        adminAdvertisings: [],
    },
    mutations: {
        SET_ADMIN_ADVERTISING : (state, adminAdvertisings)  => {
            state.adminAdvertisings = adminAdvertisings;
        } ,

    },
    getters: {
        searchedCompanyAds: (state) => ( filter ) => {
           return   state.adminAdvertisings.filter(item => {return item.status.title.includes(filter)})
        },
    },
    actions: {
        async LoadAdminAdvertisings({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get('api/v1/advertising-admin')
                    .then(response => {
                        commit('SET_ADMIN_ADVERTISING', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,


    }
}
