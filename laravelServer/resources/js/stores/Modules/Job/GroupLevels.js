import Axios from "axios"

export default {
    state: {
        group: []
    },
    mutations: {
        SET_GROUPLEVELS(state, group) {
            state.group = group
        }
    },
    getters: {
        group: state => {
            return state.group
        }
    },
    actions: {
        async LoadGroupLevels({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/group-levels')
                    .then(response => {
                        commit('SET_GROUPLEVELS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
