import Axios from "axios"

export default {
    state: {
        CategoryWork: [],
    },
    mutations: {
        SET_CATEGORYWORK(state, CategoryWork) {
            state.CategoryWork = CategoryWork
        },
    },
    getters: {
        // Jobs: state => {
        //     return state.CategoryJobs
        // }
    },
    actions: {
        async LoadCategoryWork({ commit }, payload) {
            Axios.get('api/v1/list-work-category/' + payload.id)
                .then(response => {
                    commit('SET_CATEGORYWORK', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}