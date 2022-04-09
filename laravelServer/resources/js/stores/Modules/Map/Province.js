import Axios from "axios"
export default {
    state: {
        provinces: [],
    },
    mutations: {
        SET_PROVINCES(state, provinces) {
            state.provinces = provinces
        }
    },
    getters: {
        provinces: state => {
            return state.provinces
        } ,
        getCities : state => (id) => {
            const province =  state.provinces.find(x => x.id == id)
            if(province)
                return province.cities
        }
    },
    actions: {
        async LoadProvinces({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/province')
                    .then(response => {
                        commit('SET_PROVINCES', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            })
        }
    }
}
