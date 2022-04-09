<template>
    <div>
        <vue-content-loading rtl :width="300" :height="80" >
            <rect x="0" y="0" rx="5" ry="5" width="300" height="6" />
            <rect x="0" y="12" rx="5" ry="5" width="200" height="6" />
            <rect x="0" y="24" rx="5" ry="5" width="250" height="6" />
            <rect x="0" y="36" rx="5" ry="5" width="278" height="6" />
            <rect x="0" y="48" rx="5" ry="5" width="260" height="6" />
            <rect x="0" y="60" rx="5" ry="5" width="300" height="6" />
            <rect x="0" y="72" rx="5" ry="5" width="150" height="6" />
        </vue-content-loading>
    </div>
</template>

<script>
    import { VueContentLoading } from 'vue-content-loading';
    export default   {
        components : { VueContentLoading }
    }

</script>
