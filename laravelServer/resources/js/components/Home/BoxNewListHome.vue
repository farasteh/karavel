<template>
    <div class=" mt-4">
        <div class="box-list-date-home">
            <div class="date-box-list-home">( {{ advertising.created_at }} )</div>
            <router-link :to="{name: 'SiteShowJobIndex', params: {id: this.advertising.id}}" class="w-75">
                <h3>{{ advertising.title }}</h3>
            </router-link>
            <div class="mt-2 data-list-box">
                <span class="ml-2">
                    <i class="fas fa-tag"></i>
                    <span v-if="advertising.job">{{advertising.job.title}} ، {{advertising.category.title}}</span>
                </span>
            </div>
            <div class="mt-2 data-list-box">
                <span class="ml-2">
                    <i class="fas fa-building"></i>
                    <span v-if="advertising.Company"> {{ advertising.Company.name_fa }}</span>
                </span>
                <span>
                   <i class="fas fa-map-marker-alt"></i>
                    <span v-if="advertising.province"> {{ advertising.province.title }} </span>
                </span>
                <span class="link-list-resume" v-if="memberRole == 'Member' &&
                            $store.getters.memberSentResume(advertising.id , User.member.id)">
                    <span style="color:#777"> رزومه ارسال شده</span>
                    <span class="tick-icon-color">
                        <Icon type="md-checkmark"  class="sent-title-icon" />
                    </span>
                </span>
                <router-link v-else :to="{name: 'SiteShowJobIndex', params: {id: this.advertising.id}}" class="link-list-resume">
                    <span>ارسال رزومه</span>
                    <span>
                        <Icon type="ios-return-left" class="sent-title-icon color-link" />
                    </span>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BoxNewListHome" ,
    props :  ['advertising'] ,
    methods :  {
    },
    computed : {
       pathName() {
            var namee = this.advertising.Company.name_en
            namee = namee.toLowerCase()
            namee = namee.replace(/\s/g, '-')
            return this.advertising.Company.id + '-' + namee
        },
        memberRole() {
            return this.$store.getters.userRole
        },
        User(){ return this.$store.state.User.User;},
    }
}
</script>

<style scoped>

</style>
