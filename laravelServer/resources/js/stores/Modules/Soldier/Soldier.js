import Axios from "axios"

export default {
    state: {
        Soldier: [],
    },
    mutations: {
        SET_SOLDIER(state, Soldier) {
            state.Soldier = Soldier
        },
    },
    getters: {
        Soldier: state => {
            return state.Soldier
        }
    },
    actions: {
        async LoadSoldier({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/soldier')
                    .then(response => {
                        commit('SET_SOLDIER', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        }
    }
}
