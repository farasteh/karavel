<template>
    <div>
        <div class="box-list-jobs karavel-box p-3">
            <vue-content-loading rtl :width="300" :height="30" class="mt-3 px-3 desk-loading">
                <rect x="0" y="0" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="10" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="20" rx="5" ry="5" width="300" height="5" />
            </vue-content-loading>
        </div>
        <div class="box-list-jobs karavel-box p-3">
            <vue-content-loading rtl :width="300" :height="30" class="mt-3 px-3 desk-loading">
                <rect x="0" y="0" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="10" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="20" rx="5" ry="5" width="300" height="5" />
            </vue-content-loading>
        </div>
        <div class="box-list-jobs karavel-box p-3">
            <vue-content-loading rtl :width="300" :height="30" class="mt-3 px-3 desk-loading">
                <rect x="0" y="0" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="10" rx="5" ry="5" width="300" height="5" />
                <rect x="0" y="20" rx="5" ry="5" width="300" height="5" />
            </vue-content-loading>
        </div>
    </div>
</template>
<script>

import {VueContentLoading } from 'vue-content-loading';
export default {
    components: {VueContentLoading},
}
</script>

