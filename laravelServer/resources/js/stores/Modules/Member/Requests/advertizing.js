import axios from 'axios'


export default {
    state: {
        memberAdvertizingList: [],
        memberAdvertizing: ''
    },
    mutations: {
        SET_MEMBER_ADVERTIZING : (state, memberAdvertizingList)  => {
            state.memberAdvertizingList = memberAdvertizingList;
        } ,
        SET_MEMBER_ADVERTIZING_SINGLE : (state, memberAdvertizing)  => {
            state.memberAdvertizing = memberAdvertizing;
        } ,
        PUT_COMPANY_ADVERTIZING : (state , payload ) => {

        }
    },
    getters: {
        resumeadvertizingStatusCount : (state) => (status , id ) =>{
            return state.memberAdvertizingList.filter(ad => ad.status.id == status).length
        } ,
        resumeStatusAd: (state) => (filter) => {
            return state.memberAdvertizingList.filter(item => {return filter.includes(item.status.id)});
        },
    },
    actions: {
        async LoadMemberAdvertizing({commit}) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/member/advertizing`)
                    .then(response => {
                        commit('SET_MEMBER_ADVERTIZING', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });
        },
        async LoadMemberAdvertizingSingle({commit}, payload) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/member/advertizing/${payload.id}`)
                    .then(response => {
                        commit('SET_MEMBER_ADVERTIZING_SINGLE', response.data.data)
                        resolve(response)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    });
            });

        },
    }
}
