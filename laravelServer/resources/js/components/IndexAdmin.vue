<template>
    <div>
        <app-header-admin></app-header-admin>
        <div class="body-content body-content-marg">
            <div class="col-md-10 m-auto">
               <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>

export default {
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
