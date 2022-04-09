import axios from 'axios'


export default {
    state: {
        behavioralSkills: [],
    },
    mutations: {
        SET_BEHAVIORAL_SKILLS : (state, behavioralSkills)  => {
            state.behavioralSkills = behavioralSkills;
        } , 
        Delete_BEHAVIORAL_SKILLS : (state ,  id) => {
        
            state.behavioralSkills.splice( id , 1 )
        },
        Update_BEHAVIORAL_SKILLS: (state, payload) => {
            const skill = state.behavioralSkills.find(s => s.id === payload.id)
            skill.title = payload.title
        } , 
        STORE_BEHAVIORAL_SKILL : (state  , data) => {
            state.behavioralSkills.push(data)
        }
    },
    getters: {

    },
    actions: {
        async LoadBehavioralSkills({ commit }) {
            axios.get('api/v1/behavioralSkill')
                .then(response => {
                    commit('SET_BEHAVIORAL_SKILLS', response.data.data)
                })
                .catch(error => console.log(error))
        } , 
        async storeBehavioralSkill ( { commit } , payload ) {
            return new Promise((resolve, reject) => {
                axios.post('api/v1/behavioralSkill', payload)
                    .then(response => {
                        commit('STORE_BEHAVIORAL_SKILL', response.data.data.skill)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });

        } , 
        async deleteBehavioralSkill( {commit} , payload ) {
            return new Promise((resolve, reject) => {
                axios.delete(`api/v1/behavioralSkill/${payload.id}`)
                    .then( success => {
                        commit( 'Delete_BEHAVIORAL_SKILLS' , payload.index)
                        resolve(success)
                    }) 
                    .catch ( error => {
                        reject(error)
                    })
            })
        } , 
        async updateBehavioralSkill( {commit} , payload ) {
            return new Promise((resolve, reject) => {
                axios.put(`api/v1/behavioralSkill/${payload.id}` , payload)
                    .then( response => {
                        commit( 'Update_BEHAVIORAL_SKILLS' , payload )
                        resolve(response)
                    }) 
                    .catch ( error => {
                        reject(error)
                    })
            });
        }
    }
}