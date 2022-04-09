<template>

    <tr>
        <th scope="row">{{index + 1}}</th>
        <td>{{user.name}} {{user.last_name}} <br/> %{{user.rank}}</td>
        <td>{{user.job.title}} <br/> {{user.category_job.title}}</td>
        <td>{{user.created_at}}</td>
        <td v-if="user.province || user.city"><span v-if="user.province">{{user.province.title}}</span><br/><span v-if="user.city">{{user.city.title}}</span></td>
        <td v-else></td>
        <td>
            <Button id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  class="btn-default-job" ><Icon type="ios-settings" />جزییات</Button>
            <div style="border-radius: .5rem;" class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <div style="cursor: pointer;" @click="getPDF(user.id)" class="dropdown-item">
                    <Icon class="box-icon" type="md-archive" />
                    <span>رزومه کاراولی</span>
                </div>
                <div style="cursor: pointer;"  @click="model1 = true" class="dropdown-item">
                    <Icon class="box-icon" type="md-archive" />
                    <span> رزومه متفرقه<sup> {{fileAds.length}}</sup></span>
                </div>
                <div style="cursor: pointer;" @click="model2 = true" class="dropdown-item">
                    <Icon class="box-icon" type="md-archive" />
                    <span>ارسال ها <sup> {{user.advertisings.length}} </sup> </span>
                </div>
            </div>
        </td>
        <Modal v-model="modal3" width="900" footer-hide :title="'رزومه کاراولی '+ user.name + ' ' + user.last_name">
            <selectedPdf :result="result" :id="id"></selectedPdf>
        </Modal>

        <Modal v-model="model2" width="900" footer-hide :title="' آگهی هایی که کارجو '+ user.name + ' ' + user.last_name +  ' به آنها رزومه ارسال کرده است.'">
            <div v-if="user.advertisings.length == 0" class="text-center text-danger m-auto"> این کارجو هنوز رزومه ای ارسال نکرده است. </div>
            <table v-else style="text-align: center" class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">عنوان آگهی</th>
                        <th scope="col">نام آژانس</th>
                        <th scope="col"> در تاریخ</th>
                        <th scope="col"> وضعیت رزومه</th>
                    </tr>
                    </thead>
                    <tbody style="background: #fff;">
                    <tr v-for="( ad , index )  in user.advertisings" :key="index">
                        <td>{{ad.title}}</td>
                        <td v-if="ad.company">{{ad.company.title}}</td>
                        <td>{{ad.created_at}}</td>
                        <td>{{ad.status.title}}</td>
                    </tr>
                    </tbody>
                </table>
        </Modal>

        <Modal v-model="model1" width="900" footer-hide :title="'رزومه های آپلودی کاربر ' + user.name + ' ' + user.last_name">
            <div v-if="fileAds.length == 0" class="text-center text-danger m-auto"> این کارجو هنوز رزومه متفرقه ای آپلود نکرده است </div>
            <table v-else style="text-align: center" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">عنوان آگهی</th>
                    <th scope="col"> در تاریخ</th>
                    <th scope="col"> وضعیت رزومه</th>
                    <th scope="col"> رزومه آپلودی</th>
                </tr>
                </thead>
                <tbody style="background: #fff;">
                <tr v-for="( ad , index )  in fileAds" :key="index">
                    <td>{{ad.title}}</td>
                    <td>{{ad.created_at}}</td>
                    <td>{{ad.status.title}}</td>
                    <td>
                        <a @click="openResume(ad.file)">
                            {{ad.file}}
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </Modal>
    </tr>
</template>
<script>
import selectedPdf from './pdf'
import Axios from 'axios'

export default {
    name : 'Adminuser',
    props : ['user' , 'index'],
    components:{ selectedPdf},
    data(){
        return {
            id  : '' ,
            modal3  : false ,
            result : '' ,
            model2 : false ,
            model1 : false
        };
    },
    created() {
    },
    computed:{
        fileAds() {
            return this.user.advertisings.filter(ad => ad.file !=  null)
        }
    },
    methods:{
        getPDF(id) {
            this.id = id
            this.modal3 = true
            Axios.get(`api/v1/member/resume-result-pdf/${this.id}`)
                .then(res => {
                    this.result = res.data.data
                })
                .catch(({error, status}) => {
                    console.log(error)

                })
        } ,
        openResume(file) {
            window.open(`pdfs/resume/${file}`, "_blank");
        }
    }
}
</script>
<style>
</style>
