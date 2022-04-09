<template>
    <button :disabled="loading"   class="login100-form-btn">
        <span v-show="!loading">{{text}}</span>
        <span v-show="loading"><i style="font-size: 26px;color: #243d68;"   class="fas fa-circle-notch fa-spin"></i></span>
    </button>
</template>

<script>
export default {
    name: "ButtonAuth",
    props:{
        loading :{
            type : Boolean,
            default : false
        },
        text:{
            type : String,
            default: 'text'
        }
    }
}
</script>

<style scoped>

</style>
