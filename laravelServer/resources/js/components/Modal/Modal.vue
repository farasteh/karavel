<template>
    <div>
        
    </div>
</template>
<script>
export default {

name: "AdminContractBox",
        data () {
            return {
                modal_loading: false,
            }
        },
        methods: {
            del () {
                this.modal_loading = true;
                setTimeout(() => {
                    this.modal_loading = false;
                    this.modal2 = false;
                    this.$Message.success('Successfully delete');
                }, 2000);
            }
        }
    }
</script>
<style>
</style>