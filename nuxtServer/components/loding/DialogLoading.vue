<template>
    <div>
        <div v-show="show" class="ivu-modal-mask" style="z-index: 1134;"></div>
        <div v-show="show"  class="ivu-modal-wrap" style="z-index: 1134;">
            <div class="ivu-modal" style="width: 360px;margin-top: 100px;">
                <div class="ivu-modal-content" style="background: rgb(30, 136, 229) none repeat scroll 0% 0% !important">
                    <div class="ivu-modal-body">
                        <div style="text-align: center;">
                            <p style="color: #fff;font-size: 15px;">در حال ذخیره اطلاعات</p>
                            <div class="loading-dialog-model"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DialogLoading",
    props:{
        show: {
            type: Boolean,
            default: true,
        },
    }
}
</script>

<style scoped>
.loading-dialog-model{
    background: #8dbae1b3;
    width: 100%;
    height: 18px;
    margin-top: 13px;
    overflow: hidden;
    position: relative;
}
.loading-dialog-model::before{
    content: "";
    width: 40%;
    position: absolute;
    background: #fff;
    height: 100%;
    margin: auto;
    border-radius: 4px;
    bottom: 0;
    -webkit-animation: mymove2 1s infinite;
    animation: mymove2 1s infinite;
    left: 0;
}
@keyframes mymove2 {
    from {
        left:-100%
    }
    to {
        left:100%
    }
}
</style>
