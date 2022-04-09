import axios from 'axios'

export default {
    state :  {
        socialResume : {
             items : []
        }
    },
    getters : {
        socialResume: state => {
            if(state.socialResume.items.length == 0 ) { 
                state.socialResume.items.push({
                    link: '',
                    social_network: '',
                    type: 'create',
                })
                state.socialResume.items.push({
                    link: '',
                    social_network: '',
                    type: 'create',
                })
            }
            return state.socialResume
        },
        countSocialResume: (state, getters) => {
            return getters.socialResume.items.length
        }
    },
    actions : {

        async loadSocialResume( {commit} ) {
            return new Promise((resolve, reject) => {
                axios.get('api/v1/member/social-resume')
                    .then(res => {
                        commit('LOAD_SOCIAL_NETWORK_RESUME', res.data.data)
                        resolve(res)
                    }).catch(err => reject(error))
            });
        } ,

        async storeSocialresume ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.post('api/v1/member/resume-update', payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });

        } ,
        async deleteSocialResume( {commit} , payload ) {
            axios.delete(`api/v1/member/social-resume/${payload.id}`)
                .then(
                    commit( 'Delete_SOCIAL_NETWORK_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }
    },
    mutations : {
        LOAD_SOCIAL_NETWORK_RESUME(state ,  socialResume)  {
            state.socialResume.items = socialResume
        } ,
        Delete_SOCIAL_NETWORK_RESUME(state ,  id)  {
            state.socialResume.items.splice(id , 1 )
        }
    }
}
