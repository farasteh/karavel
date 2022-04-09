<template>
    <div>
        <vue-content-loading rtl :width="300" :height="40"  class="mt-3 desk-loading">
            <rect x="0" y="0" rx="5" ry="5" width="30" height="4" />
            <rect x="0" y="10" rx="5" ry="5" width="300" height="3" />
            <rect x="0" y="20" rx="5" ry="5" width="300" height="3" />
            <rect x="0" y="30" rx="5" ry="5" width="300" height="3" />
        </vue-content-loading>
    </div>
</template>
<script>

import {VueContentLoading } from 'vue-content-loading';
export default {
    components: {VueContentLoading},
}
</script>

