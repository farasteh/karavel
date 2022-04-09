import axios from 'axios'


export default {
    state: {
        telegramAdvertisings : []
    },
    mutations: {
        SET_TELEGRAM_ADVERTISINGS : (state, telegramAdvertisings) => {
            state.telegramAdvertisings = telegramAdvertisings;
        }
    },
    getters: {
    },
    actions: {
        async LoadTelegramAdvertising({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get(`api/v1/admin/telegram/advertisings`)
                    .then(response => {
                        commit('SET_TELEGRAM_ADVERTISINGS', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        } ,

    }
}

