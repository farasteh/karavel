import Axios from "axios"

export default {
    state: {
        experimentalCreate: {
            items: []
        },
        UpdateLoadExperimenta: {
            items: []
        }
    },
    mutations: {
        SET_LoadExperimenta(state, UpdateLoadExperimenta) {
            state.UpdateLoadExperimenta.items = UpdateLoadExperimenta
        } ,
        Delete_EXPERIMENTAL_RESUME (state , id) {
            state.UpdateLoadExperimenta.items.splice(id , 1)
        }
    },
    getters: {
        UpdateExperimental: state => {
            if(state.UpdateLoadExperimenta.items.length == 0 ) { 
                state.UpdateLoadExperimenta.items.push({
                    name: '',
                    level: '',
                    type :'create',
                })
                state.UpdateLoadExperimenta.items.push({
                    name: '',
                    level: '',
                    type :'create',
                })
            }
            return state.UpdateLoadExperimenta
        },
        CountExperimental: (state, getters) => {
            return getters.UpdateExperimental.items.length
        }
    },
    actions: {
        async SkillInsert({commit}, payload) {
            return new Promise((resolve, reject) => {
            Axios.post('api/v1/member/skill-insert', payload)
                .then(success => {
                    resolve(success)
                })
                .catch(({error, status}) => {
                    reject(error)
                });
            });
        },
        async LoadExperimenta({commit}) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/load-experimenta')
                    .then(response => {
                        commit('SET_LoadExperimenta', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },

        async deleteExperimental( {commit} , payload ) {
            axios.delete(`api/v1/member/experimenta/${payload.id}`)
                .then(
                    commit( 'Delete_EXPERIMENTAL_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }
    }
}
