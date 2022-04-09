<template>
    <div>
        <section>

            <div class="box-search-header box-header-home"
             :style="{'background-image': 'url(' + Company.banner + ')'}">
            </div>
            <div></div>
            <div class="col-12 col-md-8 m-auto profile-company">
                <boxloading  v-if="loading"></boxloading>
               <div v-else class="row px-2">
                   <div class="header-image-show-page">
                        <img v-if="ErrorImage"  src="/images/company/no-company.png" style="cursor: pointer"  :alt="Company.name_fa">
                        <img v-else :src="Company.logo" style="cursor: pointer"  :alt="Company.name_fa" @error="imageError">
                   </div>
                   <div class="box-header-text d-flex align-items-center">
                       <div class="col-12">

                       <div class="col-12 text-dark pt-3">
                           <span style="font-size: 18px"> {{Company.name_fa}} ({{Company.name_en}}) </span></div>
                           <!--                                <span style="margin-left: 15px;">{{Company.Activity.title}}</span>-->
<!--                           <span  style="margin-left: 15px;">{{Company.Employee_count}}-->
<!--                                نفر-->
<!--                            </span>-->
<!--                           <span>{{Company.address_site}}</span>-->
                       </div>
                   </div>
               </div>
                </div>

        </section>
    </div>
</template>
<script>
import  boxloading  from '../../Loading/compnyPro';
import  headerTop  from './headerTop';
export default {
    components : { 'boxloading' : boxloading , 'v-header' : headerTop },
    props: ['Company' , 'loading'],
    data () {
        return {
            ErrorImage : false ,
        }
    },
    methods : {
        imageError ()  {
            this.ErrorImage = true
        },
    }
}
</script>
<style scoped>
.navbar .company-nav  {
    padding: .2rem 1rem !important;
}
.profile-company {
    margin-top: -5% !important
}
.box-header-home{
    background-image: url("/images/header.jpg");
    background-size: cover;
    box-shadow: none !important;
    background-position: center;
}
.box-search-header{
    height: 175px !important;
    color: #fff;
    font-size: 18px;
    display: flex !important;
    align-items: center !important;
    justify-content: center;
    flex-wrap: wrap ;
}

.loadin-select-search{
    display: flex;
    position: absolute;
    z-index: 99;
    left: 0;
    left: 95px;
    top: 10px;
}
.header-image-show-page{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: #eef4fa;
}
.header-image-show-page::before {
    content: '' ;
}
.header-image-show-page img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    box-shadow: 1px 1px 5px 1px #07010163;
}
.box-header-text{
    margin-top: 20px;
    margin-right: 15px;
    color: #fff;
}

@media screen and (max-width: 992px) {
    .profile-company {
        margin-top: -10% !important
    }
}
@media screen and (max-width: 768px) {
    .profile-company {
        margin-top: -15% !important
    }
    .header-image-show-page{
        width: 120px ;
        height: 120px;
        margin-right: 10px;
    }
}
@media screen and (max-width: 480px) {
    .profile-company {
        margin-top: -20% !important
    }
}
@media screen and (max-width: 370px) {
    .profile-company {
        margin-top: -25% !important
    }
}

</style>
