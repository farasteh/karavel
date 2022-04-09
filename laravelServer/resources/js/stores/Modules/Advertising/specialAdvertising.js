import axios from 'axios'


export default {
    state: {

    },
    mutations: {

    },
    getters: {

    },
    actions: {
        async setSpecialAdvertising({ commit }, payload) {
            return new Promise((resolve, reject) => {
            axios.post('api/v1/special-advertising', payload)
                .then(response => {resolve(response)})
                .catch(error => console.log(error));
            });
        } ,
        async DeleteSpecialAdvertising ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.delete('api/v1/special-advertising/'+payload.id)
                    .then(response => {resolve(response)})
                    .catch(({error, status}) => {reject(error)});
            });
        } ,
    }
}
