// import Axios from "axios"
// export default {
//     state: {
//         siteProvinces: [],
//     },
//     mutations: {
//         SET_SITE_PROVINCES(state, provinces) {
//             state.siteProvinces = provinces
//         }
//     },
//     getters: {
//
//         siteProvinces : state => {
//             if(state.siteProvinces)
//             {
//                 let proveinces  = state.siteProvinces
//                 let ad = proveinces.find(ad => ad.title == 'همه استان ها')
//                 if(ad == undefined)
//                     proveinces.unshift({id : null , title  : 'همه استان ها'})
//                 return proveinces
//             }
//             return state.siteProvinces
//         } ,
//     },
//     actions: {
//         async LoadSiteProvinces({ commit }) {
//             return new Promise((resolve, reject) => {
//                 Axios.get('api/v1/province')
//                     .then(response => {
//                         commit('SET_SITE_PROVINCES', response.data.data)
//                         resolve(response)
//                     })
//                     .catch(error => reject(error))
//             })
//         }
//     }
// }
