import axios from 'axios'

export default {
    state :  {
        socailNetwork : []
    },
    getters : {

    },
    mutations : {
        SET_SOCIAL_NETWOK(state , socailNetwork) {
            state.socailNetwork = socailNetwork
        }
    },
    actions : {
        async loadSocialNetwork ( {commit} ) {
            return new Promise((resolve, reject) => {
                axios.get('api/v1/social-network')
                    .then(res => {
                        commit('SET_SOCIAL_NETWOK', res.data.data)
                        resolve(res)
                    })
                    .catch(err => reject(err))
            })
        }
    }
}
