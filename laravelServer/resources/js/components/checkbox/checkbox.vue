<template>
    <div class="switch-button-control">
        <div class="switch-button" :class="{ enabled: isEnabled }" @click="toggle"
             :style="{'--color': color}">
            <div style="margin: 3.6em 0 0 -145px;left: 44%;top: 10px;" class="button">
                <i v-if="loading" style="position: absolute;left: 2px;top: 3px;color: #1e88e5;" class="fas fa-circle-notch fa-spin"></i>
            </div>
        </div>
        <div class="switch-button-label">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "checkbox",
    model: {
        prop: "isEnabled",
        event: "toggle"
    },
    props: {
        isEnabled: Boolean,
        loading:{
            Boolean,
            default: true
        },
        color: {
            type: String,
            required: false,
            default: "#1E88E5"
        }
    },
    methods: {
        toggle: function() {
            this.$emit("toggle", !this.isEnabled);
        }
    }
}
</script>

<style scoped>

</style>
