import Axios from "axios"

export default {
    state: {
        CategoryJobs: [],
        CategoryJobsFilter: [],
    },
    mutations: {
        SET_CATEGORYJOBS(state, CategoryJobs) {
            state.CategoryJobs = CategoryJobs
        },
    },
    getters: {
        // Jobs: state => {
        //     return state.CategoryJobs
        // },
        getCategroyJobs: (state) => (id) => {
            return state.CategoryJobs.find(CategoryJobs => CategoryJobs.job === id);
        }
    },
    actions: {
        async LoadCategoryJobs({ commit }, payload) {
            Axios.get('api/v1/list-jobs-category/' + payload.id)
                .then(response => {
                    commit('SET_CATEGORYJOBS', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}