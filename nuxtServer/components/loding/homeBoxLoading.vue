<template>
    <div>
        <vue-content-loading rtl :width="130" :height="35"
             class="box-list-date-home mt-4 p-0"
             v-for="(i  , index) in list " :key="index">
            <rect x="5" y="5" rx="5" ry="5" width="120" height="5" />
            <rect x="5" y="15" rx="5" ry="5" width="120" height="5" />
            <rect x="5" y="25" rx="5" ry="5" width="120" height="5" />
        </vue-content-loading>
    </div>
</template>

<script>
import { VueContentLoading } from 'vue-content-loading';
export default   {
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
