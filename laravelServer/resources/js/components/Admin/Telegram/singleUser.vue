<template>
    <div class="row">
        <div class="col-8">
            <p>#رزومه کارجو</p>
            <p>کد {{code}}</p>
            <p>
                <span v-if="user.gender == 2"> خانم / </span>
                <span v-if="user.gender == 3"> آقا / </span>
                <span v-if="user.birhdate">{{user.birhdate}} ساله /</span>
                <span> تخصص :  {{user.job.title}} / {{user.category.title}} </span>
                <span v-if="user.province || user.city"> / <span v-if="user.province">{{user.province.title}}</span> ,<span v-if="user.city">{{user.city.title}}</span></span>
            </p>
            <p><router-link :to="{ name : 'resumePdf'  , params : {id : user.id}}" >www.karavel.ir/resume/pdf/{{user.id}}</router-link></p>
            <p> نمره کاراول : <span>{{ user.rank }}%</span> </p>
        </div>
        <div class="col-4">
            <Button type="primary" @click="AddToChannel()">افزودن به کانال</Button>
        </div>
    </div>
</template>
<script>
import selectedPdf from '../user/users/pdf'
import Axios from "axios";
import axios from "axios";
export default {
    name : 'singleUser',
    props: ['user'] ,
    components : { selectedPdf } ,
    data(){
        return {
            id : '' ,
            result  : ''
        };
    },
    created() {

    },
    computed:{
        code () {
            return 'K' + this.user.id * 2 + 3
        }
    },
    methods:{
        AddToChannel() {
            axios.post('api/v1/telegram/post' , this.user)
        }
    }
}
</script>
<style>

</style>
