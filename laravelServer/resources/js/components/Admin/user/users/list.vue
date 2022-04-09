<template>
    <div>
        <div class="row">
            <div class=" col-6 mb-2">
                <h2 style="font-weight: 600;font-size: 22px;">لیست کاربران</h2>
            </div>
            <div class="bottom-message"></div>
            <div class="col-12  table-responsive">
                <table class="table text-center table-striped ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام کاربر</th>
                        <th scope="col"> تخصص </th>
                        <th scope="col"> تاریخ عضویت</th>
                        <th scope="col"> استان </th>
                        <th scope="col">جزییات</th>
                    </tr>
                    </thead>
                    <tbody style="background: #fff;">
                        <user v-for="(user , index) in Users" :key="index" :user="user" :index="index"> </user>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>

import user from "./user";

export default {
    name : 'usersLists',
    components:{ user },
    data(){
        return {
        };
    },
    created() {
        this.$store.dispatch('LoadBaseresumeUsers')
    },
    computed:{
        Users(){return  this.$store.state.BaseResumeAdmin.baseResumesUsers} ,
    },
    methods:{
    }
}
</script>
<style>
</style>
