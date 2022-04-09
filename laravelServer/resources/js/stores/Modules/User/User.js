import Axios from "axios"
import {createNavigationAbortedError} from "vue-router/src/util/errors";

export default {
    state: {
        User: {
            Company: [],
            member: [],
        },
    },
    mutations: {
        SET_User(state, User) {
            state.User = User;
        } ,
        SET_PDF(state , pdf)  {
            if(state.User.member && state.User.member.length != 0){
                state.User.member.file = pdf
            }
        },
        REMOVE_USER (state) {
            state.User = {
                Company: [],
                    member: [],
            }
        } ,
        SET_COMPANY_LOGO(state , image)  {
            state.User.Company.logo =  image
        } ,
        SET_BASE_IMAGE_PRO(state , image)  {
            state.User.member.image =  image
        }
    },
    getters: {
        userRole : ( state ) => {
            if(!state.User.member && !state.User.Company) {
                return  'Admin'
            }
            else if(state.User.Company && state.User.Company != 0){
                return  'Company'
            }
            else if(state.User.member && state.User.member.length != 0){
                return  'Member'
            }
            else
                return ''
        } ,
        Fullname : (state) => {
            if(state.User.member)
              if(state.User.member.length != 0 )
                return state.User.member.name +  ' '  +  state.User.member.last_name
          return  ''
        }
    },
    actions: {
        async LoadUser({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/user')
                    .then(response => {
                        commit('SET_User', response.data.data)
                        resolve(response)
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
        }
    }
}
