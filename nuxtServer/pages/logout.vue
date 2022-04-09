<template>
</template>

<script>
export default {
  layout : 'no-default',
  methods: {

    doLogout() {
      if (this.$cookies.get('token') == null) {
        this.$router.push({path: '/login'});
      } else {
        this.$axios.get('api/v1/logout')
          .then(() => {
            this.$cookies.remove('token')
            this.$cookies.remove('role')
            // localStorage.removeItem('token');
            // localStorage.removeItem('role');
            this.$router.push({path: '/'});
            this.resetData()
          })
          .catch(()=>{
            this.$cookies.remove('token')
            this.$cookies.remove('role')
            // localStorage.removeItem('token');
            // localStorage.removeItem('role');
            this.$router.push({path: '/'});
            this.resetData()
          });
      }
    },
    do_redirect() {
      //location.reload();
    },
    resetData() {
      this.$store.commit('User/User/REMOVE_USER')
      this.$store.commit('Member/Resume/BaseResume/REMOVE_BASE_RESUME')
      this.$store.commit('Company/Company/REMOVE_COMPANY_PRO')
      this.$store.commit('Auth/Auth/RESET_AUTH')


    }
  },
  mounted() {
    this.doLogout();
  } ,
  computed : {

  }
}
</script>
