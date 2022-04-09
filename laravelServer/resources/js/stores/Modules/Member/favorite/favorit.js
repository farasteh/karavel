import axios from 'axios'

export default{
    state : { 
        likedAds: [] 
    }, 
    getters : {
        memberSentLikedResume : state => (id , member) => {
            if(id && member && state.likedAds) {
                let ad = state.likedAds.find(ad => ad.id == id)
                return ad.resumes.includes(member)
            }
        } ,
    },  
    mutations : {
        LOAD_LIKED_ADDS ( state , likedAds ) { 
            state.likedAds = likedAds
        }, 
        DELETE_LIKE_ADDS(state , id)  {
            state.likedAds.splice(id, 1)
        }
    }  , 
    actions : { 
        async loadLikedAds( {commit} )  {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/member/ads/like` )
                .then(res => {
                    commit( 'LOAD_LIKED_ADDS' , res.data.data)
                    resolve(res)
                }).catch(err => { 
                    reject(err)
                })
            });
        } , 

        async deleteLikeAds({commit} , payload){
            return new Promise((reject) => {
                axios.delete(`api/v1/member/ads/like/${payload.ad_id}`  )
                .then(
                    commit('DELETE_LIKE_ADDS'  , payload.index)
            
                ).catch(err => { 
                    reject(err)
                })
            });
        }
    }
}