<template>
    <div style="width: 100%;">
        <div class="box-box-list-jobs-admin col-12" >
            <div class="row">
                <div class="col-6 col-md-2 center-Object">
                    <img class="company-logo"
                         :src="!company.logo ? '/images/company/no-photo.jpg': 'images/company/'+ company.logo "
                         :alt="company.name_fa">
                </div>
                <div class="col-6 col-md-3 center-Object">
                    {{company.name_fa}}
                    |
                    {{company.name_en}}
                </div>
                <div v-if="company.province" class="col-6 col-md-1 center-Object">
                    {{ company.province.title }}
                </div>
                <div class="col-6 col-md-2 center-Object text-left">
                  <a :href="company.address_site" target="_blank"> {{company.address_site}}</a>
                </div>

                <div class="col-6 col-md-2 center-Object">
                    <Button  type="primary" @click="careateModel()" >مشاهده آگهی ها</Button>
                </div>
                <div class="col-6 col-md-2 center-Object">
                    <router-link :to="{name: 'AdminCompaniesShow',params : {id:company.id}}" class="btn btn-link">
                        <Button  type="primary">
                             مشاهده جزییات
                        </Button>
                    </router-link>
                </div>
            </div>
        </div>

        <Modal v-model="modal11" width="900" footer-hide>
            <div class="row">
                <div v-if="company.advertisings.length == 0" class="text-center text-danger m-auto">هیچ آگهی برای این شرکت ثبت نشده</div>
                <BoxListAdmin v-for="advertising in company.advertisings" :key="advertising.id"
                                :contact="advertising" :place="'company'"></BoxListAdmin>

            </div>
        </Modal>
    </div>
</template>
<script>
import BoxListAdmin from "../Advertisings/Box"
export default {
    props:['company'] ,
    components: {
        'BoxListAdmin':BoxListAdmin,
    },
    data() {
        return {
            modal11  : false
        }
    },
    methods : {
        careateModel (resume) {
            this.modal11 = true
        },
    } ,
    created() {
    }
}
</script>
<style scoped>
.ivu-modal-close .ivu-icon-ios-close{
    font-size: 40px !important;
}
.company-logo {
    width: 60px ;
    height: 60px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.center-Object {
    display: flex;
    justify-content: center;
    align-items: center;
}
.ivu-modal {
    width: 580px !important;
}
.ivu-modal-body{
    padding: 25px !important;
}
</style>
