import axios from 'axios'


export default {
    state: {
        statusList: [],
    },
    mutations: {
        SET_STATUS : (state, statusList)  => {

            state.statusList = statusList;
        }
    },
    getters: {

        getStatusTitle : (state) => id => {
            let status = state.statusList.find(x => x.id == id)
            return status.title
        }

    },
    actions: {
        async LoadStatus({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/status`)
                    .then(response => {
                        commit('SET_STATUS', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,

    }
}
