<template>
    <div>
        <div>
            <HeaderMember></HeaderMember>
        </div>
        <div class="body-content body-content-marg">
            <div class="col-md-11 m-auto">
               <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import HeaderMember from './includes/Member/HeaderMember.vue';

export default {
    components: {'HeaderMember': HeaderMember},
    metaInfo() {
        return {
            title: '',
            //     // all titles will be injected into this template
            titleTemplate: ' سامانه کاریابی در گردشگری - کاراول ',
            meta: [{
                vmid: 'description',
                name: 'description',
                content: '',
            }]
        }
    },
}
</script>

<style>
    .body-content-marg {
        margin-top: 69px;
    }
    @media only screen and (max-width: 760px) {
        .body-content-marg {
            margin-top: 90px;
        }
    }
</style>
