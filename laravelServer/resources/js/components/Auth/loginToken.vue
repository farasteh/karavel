<template>

</template>

<script>
export default {
    name: "loginTokenCompany",
    mounted(){
        this.getToken(this.$route.params.token);
    },
    methods:{
        getToken : function (token){
            axios.get('api/v1/autologin-company/' + token)
            .then(success => {
                localStorage.setItem('token', success.data.data.token.token);
                this.$router.push({ name: "DashboardCompany"})
            })
            .catch(error =>{
                this.$fire({
                    title: '',
                    text: error.response.data.data.massage,
                    type: "error",
                    timer: 3000
                }).then(r => {console.log(r.value);});
                this.$router.push({ name: "Home"})
            })
            .finally( () => {})

        }
    }
}
</script>

<style scoped>
</style>
