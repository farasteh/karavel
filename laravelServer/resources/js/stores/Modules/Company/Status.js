import axios from 'axios'


export default {
    state: {
        resumeStatus: [],
    },
    mutations: {
        SET_RESUME_STATUS : (state, resumeStatus)  => {
            state.resumeStatus = resumeStatus;
        } ,

    },
    getters: {

        resumeStatus: (state) => (filter) => {
            console.log(state.resumeStatus)
           return state.resumeStatus.filter(item => {return filter.includes(item.status)});
         },
        StatusCount : (state) => (status) =>{
            return state.resumeStatus.filter(resume => resume.status == status).length
        }
    },
    actions: {
        async LoadResumeStatus({ commit } , payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/resumes/${payload.id}`)
                    .then(response => {
                        commit('SET_RESUME_STATUS', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        } ,
    }
}
