<template>
    <div>
        <vue-content-loading rtl :width="300" :height="50" class="mt-3 desk-loading">
            <circle cx="25" cy="25" r="25" />
            <rect x="55" y="20" rx="5" ry="5" width="40" height="3" />
        </vue-content-loading>
    </div>
</template>
<script>

import {VueContentLoading } from 'vue-content-loading';
export default {
    components: {VueContentLoading},
}
</script>

