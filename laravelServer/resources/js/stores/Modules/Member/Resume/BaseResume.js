import Axios from "axios"

export default {
    state: {
        Base: {
            image: '',
            name: '',
            last_name: '',
            job: '',
            category_job: '',
            work_job: '',
            gender: '',
            marital_status: '',
            soldier: '',
            birth_date: '',
            email: '',
            mobile: '',
            phone: '',
            site: '',
            province: '',
            city: '',
            address: '',
            comment: '',
        },
        result : {}
    },
    mutations: {
        SET_BASE_RESUME(state, Base) {
            state.Base = Base
        } ,
        GET_RESUME_RESULT (state , result) {
            state.result  = result
        } ,
        REMOVE_BASE_RESUME (state) {
            state.Base = {}
        } ,
    },
    getters: {
        Base: state => {
            return state.Base
        } ,
        Day : state => {
            const Array1 = state.Base.birth_date.split("-");
            const DayArray = Array1[2].split(" ");
            return DayArray[0];
        },
        mount : state => {
            const Array1 = state.Base.birth_date.split("-");
            return Array1[1];
        },
        years : state => {
            const Array1 = state.Base.birth_date.split("-");
            return  Array1[0].substr(2,2)
        },
    },
    actions: {
        async LoadBaseResume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/resume-base')
                    .then(response => {
                        commit('SET_BASE_RESUME', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },
        async CreateBaseResume({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.post('api/v1/member/resume-base', payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async UpdateBaseResume({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.post('api/v1/member/update-insert-resume/' + payload.base.id, payload)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async UpdateBase({ commit }, payload) {
            return new Promise((resolve, reject) => {
                Axios.put('api/v1/member/resume-base/' + payload.base.id, payload.base)
                    .then(success => {
                        resolve(success)
                    })
                    .catch(({ error, status }) => {
                        reject(error)
                    });
            });
        },
        async LoadReultResume({ commit }) {
            Axios.get('api/v1/member/resume-result')
                .then(response => {
                    commit('GET_RESUME_RESULT', response.data.data)
                })
                .catch(error => console.log(error))
        }
    }
}
