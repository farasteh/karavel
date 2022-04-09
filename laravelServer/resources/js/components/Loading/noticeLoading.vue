<template>
    <div class="p-2 my-2" style="border: 1px solid #eee ; border-radius: 5px">
        <vue-content-loading rtl :width="400" :height="360" class="d-flex justify-content-center">
            <circle cx="200" cy="120" r="120" />
            <rect x="75" y="290" rx="10" ry="10" width="250" height="40" />
        </vue-content-loading>
    </div>
</template>
<script>

import {VueContentLoading } from 'vue-content-loading';
export default {
    components: {VueContentLoading},
}
</script>

