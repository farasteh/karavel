export const strict = false

export const actions = {
  async nuxtServerInit({dispatch}) {
    await dispatch('User/User/LoadUser').catch(error => console.log(error))
  }
}
