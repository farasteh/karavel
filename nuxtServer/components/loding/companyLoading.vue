<template>
    <div>
        <vue-content-loading rtl :width="130" :height="12"
                             class="box-list-date-home mt-4 p-0"
                             v-for="(i  , index) in list " :key="index">
            <rect x="5" y="2" rx="3" ry="3" width="120" height="3" />
            <rect x="5" y="7" rx="3" ry="3" width="120" height="3" />
        </vue-content-loading>
    </div>
</template>

<script>
import { VueContentLoading } from 'vue-content-loading';
export default   {
    name : 'company-loading',
    components : { VueContentLoading },
    data () {
        return {
            list:[
                {
                    id: 1
                },
                {
                    id: 2
                },
                {
                    id: 3
                },
                {
                    id: 4
                },
                {
                    id: 5
                } ,
            ],
        }
    }
}

</script>
