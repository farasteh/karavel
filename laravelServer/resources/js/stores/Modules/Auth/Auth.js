import Axios from "axios"
export default {
    state: {
        user     : { mobile : '' , name : '' , password : '' , confirmed : ''},
        Auth     : '',
        send_sms : ''
    },
    mutations: {
        SET_AUTH : (state , Auth) => {
            state.Auth  = Auth;
        },
        SET_SMS_SEND : (state , sendSMS) =>{
            state.send_sms = sendSMS;
        },
        RESET_AUTH(state) {
            state.user = { mobile : '' , name : '' , password : '' , confirmed : ''}
            state.Auth = ''
            state.send_sms = ''
        }
    },
    getters: {

    },
    actions: {
        async CheckMobile({ commit }, payload) {
            return new Promise((resolve, reject) => {
                axios.post('api/v1/login/check-mobile', payload)
                    .then( success => {
                        commit('SET_AUTH' , success.data.data);
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async CheckCodeSMS({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/login/check-code', payload)
                    .then( success => {
                        commit('SET_SMS_SEND' , success.data.data.verifyMobile);
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async LoginUser({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/login-user', payload)
                    .then( success => {
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async Register({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/register', payload)
                    .then( success => {
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async SendSMS({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/send-sms', payload)
                    .then( success => {
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async loginSMS({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/login-sms', payload)
                    .then( success => {
                        resolve(success)
                    })
                    .catch(error => {
                        reject(error)
                    })
            });
        },
        async updatePassword({ commit } , payload){
            return new Promise((resolve, reject) => {
                axios.post('api/v1/update-password', payload)
                    .then( success => {resolve(success)})
                    .catch(error => {reject(error)})
            });
        },
    }
}
