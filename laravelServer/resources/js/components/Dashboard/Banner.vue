<template>
    <div>
        <div>
            <div class="container">
                <div class="row text-">

                    <div class="col-lg-10 col-md-12 col-sm-12 m-auto">

                        <div class="box-list-jobs-info mb-4 text-center pt-2">
                            <div style="font-size: 18px;" class="font-size-3xl font-weight-bold color-grey-dark-2">
                                آپلود بنر
                            </div>
                            <p class="p-3">
                                برای شرکت خود یک بنر آپلود نمایید، تا صفحه شما در کاراول زیباتر شود.
                            </p>
                        </div>
                        <div class="card box-shadow-lg p-3">
                            <div class="card-body">
                                <div>
                                    <Form ref="formValidate">
                                        <div class="row">
                                            <FormItem class="col-md-12">
                                                <Upload
                                                    v-if="!uploaded"
                                                    :on-success="handleBannerSuccess"
                                                    type="drag"
                                                    name="img"
                                                    action="api/v1/Upload">
                                                    <div style="padding: 20px 0">
                                                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                                                        <p> بنر خود را در این قسمت بکشید یا کلیک کنید </p>
                                                    </div>
                                                </Upload>
                                                    <span>سایز پیشنهادی : 175px * 1400px</span>
                                                   <div class="banner-preview">
                                                        <img v-if="uploaded" :src="'/images/company/' + Company.banner"
                                                            :alt="Company.name_fa" >
                                                    </div>
                                                    <div class="delete-banner text-left" v-if="uploaded">
                                                        <Icon type="md-trash" @click="deleteBanner" />
                                                    </div>
                                            </FormItem>

                                            <FormItem style="margin: auto;"  class="col-md-6">
                                                <Button :loading="modal_loading" @click="uploadBanner()"
                                                        type="primary">ثبت تغییرات</Button>
                                            </FormItem>
                                        </div>
                                    </Form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data(){
        return{
            modal_loading: false ,
            uploaded : false
        }
    },
    created(){
    },
    mounted() {
        this.$store.dispatch('LoadCompanyUser')

    },
    computed:{
        user(){return this.$store.state.User.User;},
        Company(){return this.$store.state.Company.Company;},
    },
    watch:{
        Company() {
            if(this.Company.banner)  this.uploaded = true
        }
    },
    methods: {
        handleBannerSuccess (res , file) {
            this.Company.banner = res.data.data;
            this.uploaded = true
        } ,
        deleteBanner() {
            this.Company.banner = '';
            this.uploaded = false
        },
        uploadBanner () {
            this.modal_loading=true;
            this.$store.dispatch('EditCompany',this.Company)
                .then(success =>{
                    this.$notify({
                        group: 'success',
                        title: 'success',
                        text: success.data.data.message,
                    });

                })
                .catch(error =>{
                    this.$notify({
                        group: 'foo',
                        title: 'Oops',
                        text:'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید',
                    });
                })
                .finally(() =>{this.modal_loading=false;})
        },
    }
}

</script>
<style>
.ivu-btn {

    width: 100%;
}
.ivu-upload-select {
    width: 100%;
}
.ivu-col-span-12 {
    width: 100% !important;
}
.ivu-select-arrow {
    right: inherit !important;
    left: 8px !important;
}
.ivu-select-multiple .ivu-select-item-selected::after {
    right: inherit !important;
    left: 8px !important;
}
.ivu-form .ivu-form-item-label {
    float: right !important;
    font-size: 15px !important;
}
.ivu-form-item-error-tip {
    left: inherit !important;
}

.banner-preview img{
    width : 100% ;
    height : 124px
}
.delete-banner {
    font-size :  27px;
}
</style>
