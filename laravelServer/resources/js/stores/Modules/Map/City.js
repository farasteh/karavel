import Axios from "axios"
export default {
    state: {
        citys: [],
        cityIndex: [],
        cityAll:[]
    },
    mutations: {
        SET_CITY(state, citys) {
            state.citys = citys
        },
        SET_CITY_INDEX(state,cityIndex){
            state.cityIndex[cityIndex.index] = cityIndex['response'];
        },
        SET_CITY_ALL(state,cityAll){
            state.cityAll = cityAll
        }
    },
    getters: {
        citys: state => {
            return state.provinces
        },
        getCityAll: (state) => (id) => {
            return state.cityAll.filter(index => index.province_id === id)
        }
    },
    actions: {
        async LoadCity({ commit }, payload) {
            Axios.get('api/v1/city/' + payload.id)
                .then(response => {
                    commit('SET_CITY', response.data.data)
                })
                .catch(error => console.log(error))
        },
        async LoadCityIndex({ commit }, payload) {
            Axios.get('api/v1/city/' + payload.id)
                .then(response => {
                    commit('SET_CITY_INDEX', {'response' : response.data.data , 'index' : payload.id})
                })
                .catch(error => console.log(error))
        },
        async LoadCityAll({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/city-all')
                    .then(response => {
                        commit('SET_CITY_ALL', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        }
    }
}
