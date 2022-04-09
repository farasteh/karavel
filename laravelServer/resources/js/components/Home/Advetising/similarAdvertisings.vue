<template>
    <div class="similar-res mb-3">
        <div class="mt-3 mb-2" v-if="Advertisings.length != 0">
            <h4>
                مشاغل مشابه
            </h4>
            <hr class="hr-style" >
        </div>
        <div class="row" >
            <div  v-if="loading" class="box-list-jobs p-3 col-6" style="padding: 15px !important;">
                <Vcl-facebook rtl ></Vcl-facebook>
            </div>
            <div  v-if="loading" class="box-list-jobs p-3 col-6" style="padding: 15px !important;">
                <Vcl-facebook rtl ></Vcl-facebook>
            </div>
            <Box v-else  v-for="(List , index) in  Advertisings " :key="index" :List="List" :User="User" :index="index" :role="role"></Box>
        </div>
    </div>
</template>
<script>
import Box from './box'
import { VclFacebook, VclList } from 'vue-content-loading';
export default {
    name:"similarAdvertisings",
    props: ['Advertisings' , 'loading' , 'User' , 'role'],
    components: {
        Box, VclFacebook
    },
    data() {
        return {

        }
    },
    methods : {

    } ,
    computed :  {

    },
}
</script>
<style>

</style>
