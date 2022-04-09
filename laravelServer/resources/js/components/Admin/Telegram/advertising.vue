<template>
    <div>
        <div class="row">
            <div class=" col-12 mb-2">
                <h2 style="font-weight: 600;font-size: 22px;">صفحه نمایش در تلگرام آگهی</h2>
            </div>
            <div class="bottom-message"></div>
            <div class="col-12">
                <div v-for="advertising in advertisings" :key="advertising.id" :advertising="advertising"
                     class="my-2 p-2 bg-white">
                    <p>#استخدام گردشگری</p>
                    <p>کد {{'K' + advertising.id * 2 + 3}}</p>
                    <p>{{advertising.title}}</p>
                    <p>
                        آژانس :
                        <span>
                            {{advertising.company.name}}
                        </span>
                        (
                        <span>
                             {{advertising.province.title}} ,
                        </span>
                       <span>
                            {{advertising.city.title}}
                       </span>

                        )
                    </p>
                    <p> شغل موردنیاز :  {{advertising.job.title}} , {{advertising.category.title}}</p>
                    <p>
                        <router-link :to="{ name : 'SiteShowJobIndex' , params : {'id' : advertising.id}}">
                            www.karavel.ir/jobs/{{advertising.id}}
                        </router-link>
                    </p>
                </div>


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
    components : {'v-singleUser' : singleUser} ,
    data(){
        return {
        };
    },
    created() {
        this.$store.dispatch('LoadTelegramAdvertising')
    },
    computed:{
        advertisings(){ return  this.$store.state.telegramAdvertising.telegramAdvertisings} ,

    },
    methods:{
    }
}
</script>
<style>

</style>
