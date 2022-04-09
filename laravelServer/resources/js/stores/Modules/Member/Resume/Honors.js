import Axios from "axios"

export default {
    state: {
        HonorsResume: {
            items: []
        }
    },
    mutations: {
        SET_LOAD_HONORS(state, HonorsResume) {
            state.HonorsResume.items = HonorsResume
        } ,
        Delete_HONOR_RESUME ( state  , id) {
            state.HonorsResume.items.splice(id , 1)
        }
    },
    getters: {
        HonorsResume: state => {
            if(state.HonorsResume.items.length == 0 ) { 
                state.HonorsResume.items.push({
                    title: '',
                    date: '',
                    type :'create',
                })
                state.HonorsResume.items.push({
                    title: '',
                    date: '',
                    type :'create',
                })
            }
            return state.HonorsResume
        },
        CountHonors: (state, getters) => {
            return getters.HonorsResume.items.length
        }
    },
    actions: {
        async LoadHonorsResume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/honors-resume')
                    .then(response => {
                        commit('SET_LOAD_HONORS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        },
        async deleteHonorResume( {commit} , payload ) {
            axios.delete(`api/v1/member/honors-resume/${payload.id}`)
                .then(
                    commit( 'Delete_HONOR_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }

    }
}
