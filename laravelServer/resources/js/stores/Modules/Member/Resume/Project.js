import Axios from "axios"


export default {
    state: {
        Project: {
            items: []
        }
    },
    mutations: {
        SET_LOAD_PROJECT(state, Project) {
            state.Project.items = Project
        },
        Delete_PROJECT_RESUME ( state  , id) {
            state.Project.items.splice(id , 1)
        }
    },
    getters: {
        Project: state => {
            if(state.Project.items.length == 0 ) { 
                state.Project.items.push({
                    title: '',
                    company: '',
                    link: '',
                    comment: '',
                    date: '',
                    type :'create',
                })
            }
            return state.Project
        },
        CountProject: (state, getters) => {
            return getters.Project.items.length
        }
    },
    actions: {
        async LoadProjectResume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/load-project')
                    .then(response => {
                        commit('SET_LOAD_PROJECT', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },
        async ProjectResumeInsert({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.post('api/v1/member/load-project', payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        },
        async deleteProjectResume( {commit} , payload ) {
            axios.delete(`api/v1/member/load-project/${payload.id}`)
                .then(
                    commit( 'Delete_PROJECT_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }

    }
}
