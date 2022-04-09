import axios from 'axios'


export default {
    state: {
        behavioralSkills: [],
    },
    mutations: {
        SET_COMPANY_BEHAVIORAL_SKILLS : (state, behavioralSkills)  => {
            state.behavioralSkills = behavioralSkills;
        } , 
    },
    getters: {

    },
    actions: {
        async LoadCompanyBehavioralSkills({ commit }) {
            axios.get('api/v1/behavioralSkill/company')
                .then(response => {
                    commit('SET_COMPANY_BEHAVIORAL_SKILLS', response.data.data)
                })
                .catch(error => console.log(error))
        } , 
    }
}