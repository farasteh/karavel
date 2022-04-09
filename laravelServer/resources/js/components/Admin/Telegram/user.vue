<template>
    <div>
        <div class="row">
            <div class=" col-12 mb-2">
                <h2 style="font-weight: 600;font-size: 22px;">صفحه نمایش در تلگرام کارجو</h2>
            </div>
            <div class="bottom-message"></div>
            <div class="col-12">
                <v-singleUser v-for="user in users" :key="user.id" :user="user" class="my-2 p-2 bg-white" ></v-singleUser>
            </div>
        </div>
        <div>
        </div>
    </div>
</template>
<script>
import singleUser from "./singleUser"

export default {
    name : 'TelegramUser',
    components : {'v-singleUser' : singleUser } ,
    data(){
        return {
        };
    },
    created() {
        this.$store.dispatch('LoadTelegramUser')
    },
    computed:{
        users(){return  this.$store.state.telegramUser.telegramUsers} ,
    },
    methods:{
    }
}
</script>
<style>

</style>
