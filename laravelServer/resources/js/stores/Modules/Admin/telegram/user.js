import axios from 'axios'


export default {
    state: {
        telegramUsers : []
    },
    mutations: {
        SET_TELEGRAM_USERS : (state, telegramUsers) => {
            state.telegramUsers = telegramUsers;
        }
    },
    getters: {
    },
    actions: {
        async LoadTelegramUser({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/admin/telegram/users`)
                    .then(response => {
                        commit('SET_TELEGRAM_USERS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}

