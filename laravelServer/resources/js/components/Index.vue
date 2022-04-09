<template>
    <div>
        <div>
            <Header></Header>
        </div>
        <div style="margin-top: 59px;"  class="">
            <div style="margin: auto;" class="">
               <router-view></router-view>
            </div>
        </div>
        <div class="mt-4">
            <v-footer></v-footer>
        </div>
    </div>
</template>

<script>
import Header from './includes/Home/Header.vue';
import footer from './includes/Home/footer/footer';

export default {
    components: {'Header': Header , 'v-footer' : footer},
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
