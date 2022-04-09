import Axios from "axios"

export default {
    state: {
        Member: {
            name: '',
            last_name: '',
            email: '',
            mobile: ''
        },
    },
    mutations: {
        SET_SITE_BASE_RESUME(state, Member) {
            state.Member = Member
        }
    },
    getters: {
      
    },
    actions: {
        async LoadSiteBaseResume({ commit }) {
            Axios.get('api/v1/site/member/resume-base')
                .then(response => {
                    commit('SET_SITE_BASE_RESUME', response.data.data)
                })
                .catch(error => console.log(error))
        },
    }
}
