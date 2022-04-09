export const state = () => ({
  APP_URL : 'https://api.karavel.ir/public'
})

export const actions = {
  generatedToken() {
   // return localStorage.getItem('token');
    return this.$cookies.get('token')
  },

  Authorized(state) {
    if (this.generatedToken() != null) {
      axios.get('api/v1/user', { headers: { Authorization: `Bearer ${this.generatedToken()}`, scope: 'kar' } })
        .then(response => {
          this.userProfile = response.data;
        })
        .catch(() => {
          return false;
        })
    } else {
      if (this.$route.name != 'Login') this.$router.push({ name: 'Login' }).catch(() => {

      });
    }
  },
  ErrorNotify() {
    this.$toast('با خطا مواجه شدید لطفا دوباره تلاش کنید.', {type: 'error'});
  } ,
  ErrorNotify2(state , message) {
    this.$toast(message, { type: 'error' });
  } ,

  SuccessAlert (state , message) {
    this.$toast(message, { type: 'success' });
  },
  ErrorAlert (state , message) {
    this.$toast(message, { type: 'error' });
  },
  SuccessNotify(state , message)
  {
    this.$toast(message, { type: 'success' });
  } ,

}
