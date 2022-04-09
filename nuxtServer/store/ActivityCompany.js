// import Axios from "axios"
// export default {
//     state: {
//         company: [{
//             'phone': 'sdsdsds',
//         }],
//     },
//     mutations: {
//         SET_VIDEOS(state, company) {
//             state.company = company
//         }
//     },
//     getters: {
//         companyPage: state => {
//             return state.company
//         }
//     },
//     actions: {
//         CREATE_ACTIVIY_COMPANY: ({ commit }, payload) => {
//             return new Promise((resolve, reject) => {
//                 Axios.post('api/v1/company', payload)
//                     .then(success => {
//                         resolve(success)
//                     })
//                     .catch(({ error, status }) => {
//                         reject(error)
//                     });
//             });
//         },
//         async LoadVideos({ commit }) {
//             let response = Axios.get('api/v1/company')
//             commit('SET_VIDEOS', response.data)
//         }
//     }
// }
