<template>
</template>

<script>
 import {mapMutations} from 'vuex'
    export default {
        methods: {
            doLogout() {
                if (this.generatedToken() == null) {
                    this.$router.push({name: 'Login'});
                } else {
                    axios.get('api/v1/logout', this.Authorization)
                        .then(() => {
                            localStorage.removeItem('token');
                            this.$router.push({name: 'Login'});
                            this.resetData()
                        })
                        .catch(()=>{
                            localStorage.removeItem('token');
                            this.$router.push({name: 'Home'});
                            this.resetData()
                        });
                }
            },
            do_redirect() {
                //location.reload();
            },
            resetData() {
                this.$store.commit('REMOVE_USER')
                this.$store.commit('REMOVE_BASE_RESUME')
                this.$store.commit('REMOVE_COMPANY_PRO')
                this.$store.commit('RESET_AUTH')
            }
        },
        mounted() {
            this.doLogout();
        } ,
        computed : {

        }
    }
</script>
